<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->helper(['validarLogin']);
		$this->load->model(['acceso','usuario']);
	}
	
	public function index(){
		if ($this->session->userdata("is_logged")) {
			$this->ControlarPerfil();
		}else{
			$this->plantillaLogin();
		} 

	}
	/**
	 * para validar el ingreso del usuario al sistema
	 * 
	 */
	public function validar(){
		$this->form_validation->set_error_delimiters('','');
		$documento = $this->input->post('documento');
		$contraseña = $this->input->post('contrasena');

		$this->form_validation->set_rules(login_rules());

		if ($this->form_validation->run() === false) {
			$datos = [
				'documentovalidar' => form_error('documento'),
				'contrasenavalidar' => form_error('contrasena'),
				'valor_documento' => $documento,
				'valor_contrasena' => $contraseña
			];
			$this->plantillaLogin($datos);
		}else{
			if($this->acceso->verificarLogin($documento,$contraseña) == false){
				
				$datos = [
					'mensaje' => "const Toast = Swal.mixin({
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
						title: 'Verificar Credenciales'
					  })",
					'valor_documento' => $documento
				];
				$this->plantillaLogin($datos);
			}else{
				$sesion =$this->usuario->MostrarDatosUsuario($documento);

				//var_export($sesion);

				$datos = [
					'is_logged' => TRUE,
					'documento' => $sesion->docID,
					'perfil' => $sesion->perfil,
					'nombre' => $sesion->nombres,
				];
				$this->session->set_userdata($datos);
				$this->session->set_flashdata('msg',"const Toast = Swal.mixin({
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
					title: 'Bienvenido $sesion->nombres'})");
				  // llamamos a la funcion ControlarPerfil una vez el usuario sea verificado 
				$this->ControlarPerfil();
				echo $sesion->perfil;

			}
		}
	}

	/**
	 * 
	 * se crea una funcion para redireccionar el usuario a su respectivo perfil
	 */
	public function ControlarPerfil(){
		switch ($this->session->userdata('perfil')) {
			case 1:
				redirect(base_url('Instructor'));
				break;
			case 2:
				redirect(base_url('Coordinador'));
				break;
			case 3:
				redirect(base_url('Bienestar'));
				break;
			case 5:
				redirect(base_url('Administrador'));
				break;
		}
	}

	/**
	 * sel uso de esta funcion es para la reutilizacion del codigo y mostrar la vista de
	 * login 
	 */
	public function plantillaLogin($datos = null){
		$this->load->view('extra/header');
		$this->load->view('login',$datos);
		$this->load->view('extra/footer');
	}

	public function logout(){
		$datos = ['documento','is_logged'];
		$this->session->unset_userdata($datos);
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
