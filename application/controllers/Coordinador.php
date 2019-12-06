<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coordinador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso','reporte','aprendicesreportados']);
		$this->load->library(['form_validation']);
		$this->load->helper(['validarPerfil']);
		//$this->load->library('pdf');
	}
	public function index(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$dinamica[] = $this->load->view('content/defecto/informacion_sistema','',true);
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
			$dinamica[] = $this->load->view('content/defecto/configuraciones',['datos'=>$datos],true);
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
				$dinamica[] = $this->load->view('content/defecto/configuraciones',$datos,true);
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
				$dinamica[] = $this->load->view('content/defecto/configuraciones',['datos'=>$datos,'mensaje'=>$mensaje],true);
				$this->Plantilla_Coordinador($dinamica);
			}
		}else{
			show_404();
		}
	}

	//LISTA TODOS LOS REPORTES
	public function reportes(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$id=$this->session->userdata("documento");
			$reporte=$this->reporte->Consult_general_coor($id);
			$caso="todos";
			$dinamica= $this->load->view('content/Coordinador/reportes',['reporte'=>$reporte,'caso'=>$caso],true);
			$menu=$this->load->view('content/Coordinador/menu',[],true);
			$c=array($dinamica,$menu);
			$this->Plantilla_Coordinador($c);
		}else{
			show_404();
		}
	}

	//lista reportes en los que se ha citado al menos un aprendiz
	public function aprobados(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$id=$this->session->userdata("documento");
			$reporte=$this->reporte->Consult_aprobados($id);
			$caso="aprobados";
			$dinamica= $this->load->view('content/Coordinador/reportes',['reporte'=>$reporte,'caso'=>$caso],true);
			$menu=$this->load->view('content/Coordinador/menu',[],true);
			$c=array($dinamica,$menu);
			$this->Plantilla_Coordinador($c);
		}else{
			show_404();
		}
	}

	//muestra los reeportes que no se han aprobado, no ha sido citado ninguno de los aprendices en el reporte
	public function cancelados(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$id=$this->session->userdata("documento");
			$reporte=$this->reporte->Consult_cancelados($id);
			$caso="cancelados";
			$dinamica= $this->load->view('content/Coordinador/reportes',['reporte'=>$reporte,'caso'=>$caso],true);
			$menu=$this->load->view('content/Coordinador/menu',[],true);
			$c=array($dinamica,$menu);
			$this->Plantilla_Coordinador($c);
		}else{
			show_404();
		}
	}

	//recoge datos necesarios en la vista verReporte de coordinador
	public function verReportes($consec){
	if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2){
		$datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
		//$consec =  $_POST["id"];
		$Matriz=$this->reporte->Consult_especifica($consec);
		$ficha=$Matriz[0]->ficha;
		$equipo=$this->reporte->equipoInstructores($ficha);
		$cordi=$this->reporte->nombreCordi($ficha);
		$ar=$this->aprendicesreportados->mostrarAprendicesReporte($consec);
		$noms=$this->aprendicesreportados->getFilasAp($consec);

		$asunto[]=" Citación a descargos al comité de evaluación y seguimiento";
		$asunto[]="Una de las principales labores de los instructores y la coordinación académica, es velar por el desarrollo adecuado de su proceso formativo. Teniendo en cuenta su desempeño ";
		$asunto[]="y lo establecido en el manual del aprendiz.";
		$asunto[]="Lo invitamos a presentar descargos ante el comité de evaluación y seguimiento a realizarse el próximo (fecha Comité) ";
		$asunto[]="en el Sena sede ";
		$dinamica[] = $this->load->view('content/Coordinador/verReporte',['datos'=>$datos,'reporte'=>$Matriz,
			'filas'=>$noms,'ver'=>$ar,'equipo'=>$equipo,'cordi'=>$cordi,'asunto'=>$asunto],true);
		$this->Plantilla_Coordinador($dinamica);
	}
}

    // para aprobar reportes desde el boton aprobarreportes color anaranjando, se encuentra comentado tambien
	/*public function aprobarReporte($consec){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2){
			//$datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
			$aprobar=$this->reporte->aprobarRep($consec);
			$dinamica[] = $this->load->view('content/Coordinador/reporteAprobado',['reporte'=>$aprobar,'n'=>$consec],true);
			$this->Plantilla_Coordinador($dinamica);
		}
	}*/

	//llamado por un ajax trae correo de un aprendiz de la base de datos
	public function correo_aprendiz(){
		$id=$_POST['id'];
		$correo=$this->usuario->nombreycorreoAprendiz($id);
		$email=$correo[0]->correoCorporativo;
		echo $email;
	}

	//llamado por un ajax trae nombre de un aprendiz del modelo repor
	public function nombre_aprendiz(){
		$id=$_POST['id'];
		$nombre=$this->usuario->nombreycorreoAprendiz($id);
		$nombre=$nombre[0]->nombre;
		echo $nombre;
	}



	public function mail(){
		$email=$_POST['mail'];
		$cons=$_POST['cons'];
		$reporte=$_POST['reporte'];

		$estadocitacion=$this->aprendicesreportados->citarAprendiz($cons);
		$aprobarRepo=$this->reporte->aprobarRep($reporte);

		$email_to = $email;
		$email_subject = "contacto de venta: Nuevo cliente";
		$email_message = "detalles del formulario de contacto:\n\n";
		$email_message .= "nombre: sergio torres\n";
		$email_message .= "apellido: sergio torres\n";
		$email_message .= "E-mail: fdmontoya0@misena.edu.co \n";
		$email_message .= "telefono: sergio torres\n";
		$email_message .= "comentarios: comentarios del mensaje x \n\n";

		$mail = "frayjes10@gmail.com";
		$header = "From: " . $mail . "\r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
		$header .= "Mime-Version: 1.0  \r\n";
		$header .= "Content-Type: text/plain";

		if (mail('$email_to', $email_subject, $email_message, $header)) {

			echo "enviado correctamente";
		} else {
			echo "no se pudo enviar el correo debido a problemas de conexion";
		}

	}

	}
