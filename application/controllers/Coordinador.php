<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso','reporte','aprendicesreportados']);
		$this->load->library(['form_validation']);
		$this->load->helper(['validarPerfil']);
	}

	public function index(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$dinamica = $this->load->view('content/defecto/informacion_sistema','',true);
			$this->Plantilla_Coordinador($dinamica);
		}else{
			show_404();
		}

	}

	/**
	 * Plantilla_Coordinador
	 *
	 * se crea la plantilla para mostrar la interfaz del Coordinador
	 */
	public function Plantilla_Coordinador($dinamica){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$datos = [
				'header' => $this->load->view('extra/header','',true),
				'footer' => $this->load->view('extra/footer','',true),
				'dinamica' => $dinamica,
			];
			$this->load->view("coordinador_plantilla",$datos);
		}else{
			show_404();

		}

	}
	/**
	 * configuraciones
	 *
	 *
	 * se mostrara la informacion del usuario
	 */
	public function configuraciones(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
			$dinamica = $this->load->view('content/defecto/configuraciones',['datos'=>$datos],true);
			$this->Plantilla_Coordinador($dinamica);
		}else{
			show_404();
		}
	}

	/**
	 * actualizarPerfil
	 *
	 * se verificara cuando el usuario desee actualizar su informacion
	 *
	 */
	public function actualizarPerfil(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$this->form_validation->set_error_delimiters("","");
			$nombre = $this->input->post("nombre");
			$Apellido = $this->input->post("Apellido");
			$Correo = $this->input->post("Correo");
			$Celular = $this->input->post("Celular");
			$password = $this->input->post("password");

			$this->form_validation->set_rules(Perfil_rules());

			if($this->form_validation->run() === false){
				$datos = [
					'nombre' => form_error('nombre'),
					'apellido' => form_error('Apellido'),
					'Correo' => form_error('Correo'),
					'Celular' => form_error('Celular'),
					'password' => form_error('password'),
					'valor_nombre' => $nombre,
					'valor_apellido' => $Apellido,
					'valor_Correo' => $Correo,
					'valor_Celular' => $Celular,
					'valor_password' => $password,
				];
				$dinamica = $this->load->view('content/defecto/configuraciones',$datos,true);
				$this->Plantilla_Coordinador($dinamica);
			}else{
				$valores = [
					'nombres' => $nombre,
					'apellidos' => $Apellido,
					'correoCorporativo' => $Correo,
					'telefonoMovil' => $Celular
				];
				$this->usuario->ActualizarPerfil($this->session->userdata("documento"),$valores);
				$this->acceso->ActualizarContraseña($this->session->userdata("documento"),['clave' => $password]);
				$datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
				$mensaje = "
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast.fire({
                    icon: 'success',
                    title: 'Actualizacion Exitosa'
                })";
				$dinamica = $this->load->view('content/defecto/configuraciones',['datos'=>$datos,'mensaje'=>$mensaje],true);
				$this->Plantilla_Coordinador($dinamica);
			}

		}else{
			show_404();
		}
	}
 

	public function reportes(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$reporte=$this->reporte->Consult_general_coor();
			$dinamica = $this->load->view('content/Coordinador/reportes',['reporte'=>$reporte],true);

			$this->Plantilla_Coordinador($dinamica);

		}else{
			show_404();
		}
	}



	public function verReportes($consec){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2){
			$datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
			//$consec =  $_POST["id"];
			$Matriz=$this->reporte->Consult_especifica($consec);
			$ar=$this->aprendicesreportados->mostrarAprendicesReporte($consec);
			$noms=$this->aprendicesreportados->getFilasAp($consec);

			$dinamica = $this->load->view('content/Coordinador/verReporte',['datos'=>$datos,'reporte'=>$Matriz,
				'filas'=>$noms,'ver'=>$ar],true);

			$this->Plantilla_Coordinador($dinamica);
		}
	}
}
