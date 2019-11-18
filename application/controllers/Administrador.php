<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso', 'sugerencia']);
		$this->load->library(['form_validation']);
		$this->load->helper(['validarPerfil']);
	}

	public function index(){
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/defecto/informacion_sistema','',true);
		    $this->Plantilla_Administrador($dinamica);
        }else{
            show_404();
        }
        
    }

    /**
     * Plantilla_Administrador
     * 
     * se crea la plantilla para mostrar la interfaz del Administrador
     */
    public function Plantilla_Administrador($dinamica){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 5) {
            $datos = [
                'header' => $this->load->view('extra/header','',true),
                'footer' => $this->load->view('extra/footer','',true),
                'dinamica' => $dinamica,
            ];
            $this->load->view("administrador_plantilla",$datos);
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
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 5) {
            $datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
            $dinamica = $this->load->view('content/defecto/configuraciones',['datos'=>$datos],true);
            $this->Plantilla_Administrador($dinamica);
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
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 5) {
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
                $this->Plantilla_Administrador($dinamica);
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
                $this->Plantilla_Administrador($dinamica);
            }

        }else{
            show_404();
        }
    }

    public function lodelsebas(){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/lodelsebas','',true);
		    $this->Plantilla_Administrador($dinamica);
        }else{
            show_404();
        }
    }

    /*Control ==== Administracion Sugerencia ==== */
    public function sugerencia(){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 5) {
            $data['sugerencias'] = $this->sugerencia->MostrarSuegerencia();
            $dinamica = $this->load->view('content/Administrador/sugerencia/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        }else{
            show_404();
        }
    }

    public function FrmAgregarSugerencia() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/sugerencia/agregar', '',true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarSugerencia() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $this->form_validation->set_rules('sugerencia', 'Sugerencia','trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/sugerencia/agregar', '',true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $nombre = $this->input->post('sugerencia');
                $resultado = $this->sugerencia->agregarSugerencia($nombre);

                if ($resultado) {
                    $data['sugerencias'] = $this->sugerencia->MostrarSuegerencia();
                    $data['mensaje'] = "const Toast = Swal.mixin({
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
                        title: 'Sugerencia Agregada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/sugerencia/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function FrmEditarSugerencia($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['sugerencia'] = $this->sugerencia->getSugerencia($codigo);
            $dinamica = $this->load->view('content/Administrador/sugerencia/editar',$data,true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function editarSugerencia() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('sugerencia');

            $this->form_validation->set_rules('sugerencia', 'Sugerencia', 'trim|required');

            if ($this->form_validation->run() == false) {
                
                $data['sugerencia'] = $this->sugerencia->getSugerencia($codigo);
                $dinamica = $this->load->view('content/Administrador/sugerencia/editar',$data,true);
                $this->Plantilla_Administrador($dinamica);

            } else {

                $resultado = $this->sugerencia->editarSugerencia($codigo, $nombre);
                
                if ($resultado) {
                    $data['sugerencias'] = $this->sugerencia->MostrarSuegerencia();
                    $data['mensaje'] = "const Toast = Swal.mixin({
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
                        title: 'Sugerencia Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/sugerencia/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
               
            }
        }
    }

    public function eliminarSugerencia() {

        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $codigo = $this->input->post('codigo');

            $resultado = $this->sugerencia->eliminarSugerencia($codigo);
            

            if ($resultado) {
                $data['sugerencias'] = $this->sugerencia->MostrarSuegerencia();
                $data['mensaje'] = "const Toast = Swal.mixin({
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
                    title: 'Sugerencia Eliminada'
                })";
                $dinamica = $this->load->view('content/Administrador/sugerencia/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['sugerencias'] = $this->sugerencia->MostrarSuegerencia();
                $data['mensaje'] = "const Toast = Swal.mixin({
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
                    icon: 'error',
                    title: 'La Sugerencia no se puede eliminar porque hay registros asociados a esta'
                })";
                $dinamica = $this->load->view('content/Administrador/sugerencia/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }

            
        }

        
        
    }
    // Fin Control Administracion Sugerencia
}