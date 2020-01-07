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
					'nombre' => $sesion->nombres ." ". $sesion->apellidos,
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
	 * para cargar la vista de recuperar contraseña
	 */

	/**
	 * sel uso de esta funcion es para la reutilizacion del codigo y mostrar la vista de
	 * login 
	 */
	public function plantillaLogin($datos = null){
		$this->load->view('extra/header');
		$this->load->view('login', $datos);
		$this->load->view('extra/footer');
	}

	public function logout(){
		$datos = ['documento','is_logged'];
		$this->session->unset_userdata($datos);
		$this->session->sess_destroy();
		redirect(base_url());
	}


	public function recuperar(){

		$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_rules(recuperar_rules());
		if ($this->form_validation->run() === false) {
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
					title: 'Todos los datos son requeridos para recuperar la contraseña, favor verificar'
				  })",
			];
			$this->plantillaLogin($datos);
		}elseif($this->acceso->verificarDocuemnto($this->input->post("docuemntoVerificacion"))){
			/**
			 * se actualiza la contraseña del usuario por una random
			 * y se enviara al correo que el usuario digito
			 */
			$newpass = substr(md5(microtime()),1,10);
			$this->acceso->ActualizarContrasena($this->input->post("docuemntoVerificacion"),['clave'=>$newpass]);

			/**
			 * se crea el mensaje para ser enviado al correo del usuario
			 */


			// cargar libreria PHPMailer
			$this->load->library('phpmailer_lib');

			// PHPMailer object
			$mail = $this->phpmailer_lib->load();

			//configuracion SMTP
			$mail->isSMTP();
			$mail->Host     = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'aprendicescitados@gmail.com';
			$mail->Password = 'Sena123456';
			$mail->SMTPSecure = 'ssl';
			$mail->Port     = 465;

			$mail->setFrom('info@example.com', 'SAC');
			$mail->addReplyTo('info@example.com', 'sistema SAC');

			// Add a recipient
			//consultar nombre y correo del usuario
			$doc=$this->input->post("docuemntoVerificacion");
			$cor=$this->usuario->nombreycorreoAprendiz($doc);

			$mail->addAddress($cor[0]->correoCorporativo);

			// Add cc or bcc
			$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');

			// asunto del correo
			$asunto="recuperar clave de acceso";
			$mail->Subject =$asunto ;

			// establecer email con formato html
			$mail->isHTML(true);

			// contenido del mail
			$mensaje="<h3>El usuario ".$cor[0]->nombre ." identificado con el numero de documento: <p style='color:black;font-size: 17px; display: inline-flex;margin: 0;padding: 0'>".$doc ."</p> ha solicitado un cambio de contraseña <br> La nueva contraseña asignada es:<h1 style='color:blue'>".$newpass."</h1></h3>";
			$mailContent = $mensaje;
			//$mailContent.= "se le asigno una nueva contraseña: ".$newpass;
			$mail->Body = $mailContent;

			/**
			 * se detienen los error mientras se revisa al subir a u servidor
			 */

			// enviar correo

			if($mail->send()){
				$msj='Revisa tu correo';
			}else{
				$msj= "no se pudo realizar la acción";

			}
			//------

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
					icon: 'success',
					title: 'Revisa tu correo' 
				  })",
			];
			$this->plantillaLogin($datos);
		}else{
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
					title: 'No se reconose el documento, favor verificar el docuemnto'
				  })",
			];
			$this->plantillaLogin($datos);
		}
	}

}
