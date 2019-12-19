<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coordinador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso','reporte','aprendicesreportados','reportes_admin','area']);
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

			$asunto[]=" Citaci贸n a descargos al comit茅 de evaluaci贸n y seguimiento";
			$asunto[]="Una de las principales labores de los instructores y la coordinaci贸n acad茅mica, es velar por el desarrollo adecuado de su proceso formativo. Teniendo en cuenta su desempe帽o ";
			$asunto[]="y lo establecido en el manual del aprendiz.";
			$asunto[]="Lo invitamos a presentar descargos ante el comit茅 de evaluaci贸n y seguimiento a realizarse el pr贸ximo (fecha Comit茅) ";
			$asunto[]="en el Sena sede ";
			$dinamica[] = $this->load->view('content/Coordinador/verReporte',['datos'=>$datos,'reporte'=>$Matriz,
				'filas'=>$noms,'ver'=>$ar,'equipo'=>$equipo,'cordi'=>$cordi,'asunto'=>$asunto],true);
			$this->Plantilla_Coordinador($dinamica);
		}
	}


	public function aprobarReporte($consec){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2){
			//$datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
			//$consec =  $_POST["id"];
			$aprobar=$this->reporte->aprobarRep($consec);
			$dinamica[] = $this->load->view('content/Coordinador/reporteAprobado',['reporte'=>$aprobar,'n'=>$consec],true);
			$this->Plantilla_Coordinador($dinamica);
		}
	}

	public function pdf(){

        $otra="otro texto";
		$san="prueba pdf";

		$this->load->library('fpdf_gen');
		$pdf = new FPDF("L", "mm", "A4");

		$dinamica[] = $this->load->view('content/Coordinador/otro', [], true);
		$this->Plantilla_Coordinador($dinamica);
		$this->fpdf->setAuthor('f de mont');
		$this->fpdf->SetTitle('biblioteca de codei', 0);
		$this->fpdf->AliasNbPages('(np)');
		$this->fpdf->SetAutoPageBreak(false);
		$this->fpdf->SetMargins(8, 8, 8, 8);
		$this->fpdf->SetFont('Arial', 'I', 35);

		$this->fpdf->Ln(4);
		$this->fpdf->Cell(95, 10, '', 0, 0, 'L');
		$this->fpdf->SetTextColor(0, 0, 255);
		$this->fpdf->Cell(2, -6, 'Titulo de Documento', 0, 0, 'C');

	}


	//Aprendices citados por fecha
	public function reporte_comite_evaluacion() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/aprendices_citados/generar', '', true);
			$this->Plantilla_Coordinador($dinamica);
		} else {
			show_404();
		}
	}

	public function rac_params() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			
			$this->form_validation->set_rules('fecha_inicial', 'Fecha Inicial', 'required');
			$this->form_validation->set_rules('fecha_final', 'Fecha Final', 'required');

			if ($this->form_validation->run() == false) {
				$this->reporte_comite_evaluacion();
			} else {
				$fecha_inicial = $this->input->post('fecha_inicial');
				$fecha_final = $this->input->post('fecha_final');
				$data['reporte_seguimiento_aprendiz'] = $this->reportes_admin->apr_cit_fecha($fecha_inicial, $fecha_final);
				$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/aprendices_citados/listar', $data, true);
				$this->Plantilla_Coordinador($dinamica);
			}
		} else {
			show_404();
		}
	}

	//Aprendices citados por área
	public function apr_c_area() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			$data['areas'] = $this->area->mostrarAreas();
			$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/apr_c_area/generar', $data, true);
			$this->Plantilla_Coordinador($dinamica);
		} else {
			show_404();
		}
	}

	public function raca_param() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			
			$area = $this->input->post('area');
			$data['aprendices_citados_area'] = $this->reportes_admin->apr_cit_area($area);
			$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/apr_c_area/listar', $data, true);
			$this->Plantilla_Coordinador($dinamica);
		} else {
			show_404();
		}
	}

	//Cantidad de citaciones realizadas por instructor
	public function cant_ci_inst() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			$data['cant_ci_inst'] = $this->reportes_admin->cant_ci_inst();
			$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/cantidad_ri/listar', $data, true);
			$this->Plantilla_Coordinador($dinamica);
		} else {
			show_404();
		}
	}

	//Cantidad de aprendices citados por centro
	public function cant_ci_centro() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			$data['cant_ci_centro'] = $this->reportes_admin->cant_ci_centro();
			$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/cantidad_aprc/listar', $data, true);
			$this->Plantilla_Coordinador($dinamica);
		} else {
			show_404();
		}
	}

	//Aprendices citados a comité
	public function aprendices_citados() {
		if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 2) {
			$data['aprendices_citados'] = $this->reportes_admin->aprendices_citados();
			$dinamica[] = $this->load->view('content/Coordinador/reportes_admin/aprendiz_citado/listar', $data, true);
			$this->Plantilla_Coordinador($dinamica);
		} else {
			show_404();
		}
	}

	//___________________cordinador
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
		$de=$_POST['de'];
		$cons=$_POST['cons'];
		$reporte=$_POST['reporte'];
		$asunto=$_POST['asunto'];
		$mensaje=$_POST['mensaje'];


		$email_to = $email;
		$email_subject = "contacto de venta: Nuevo cliente";
		$email_message = "detalles del formulario de contacto:\n\n";
		$email_message .= "nombre: sergio torres\n";
		$email_message .= "apellido: sergio torres\n";
		$email_message .= "E-mail: fdmontoya0@misena.edu.co \n";
		$email_message .= "telefono: sergio torres\n";
		$email_message .= "comentarios: comentarios del mensaje x \n\n";

		//$mail = "frayjes10@gmail.com";
		//$header = "From: " . $mail . "\r\n";
		//$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
		//$header .= "Mime-Version: 1.0  \r\n";
		//$header .= "Content-Type: text/plain";

		// Load PHPMailer library_____________________
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'frayjes10@gmail.com';
		$mail->Password = 'matias-123';
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('info@example.com', $de);
		$mail->addReplyTo('info@example.com', 'sistema SAC');

		// Add a recipient
		$mail->addAddress($email);

		// Add cc or bcc
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = $asunto;

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = $mensaje;
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo false;
		}else{
			echo "true";
			$estadocitacion=$this->aprendicesreportados->citarAprendiz($cons);
			$aprobarRepo=$this->reporte->aprobarRep($reporte);

		}



	}


	public function enviar_observaciones(){
		$observaciones=$_POST['obser'];
		$reporte=$_POST['reporte'];
		$mail=$_POST['mail'];
		$de=$_POST['de'];

       $this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'frayjes10@gmail.com';
		$mail->Password = 'matias-123';
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('info@example.com', $de);
		$mail->addReplyTo('info@example.com', 'sistema SAC');

		// Add a recipient
		$mail->addAddress("fdmontoya0@misena.edu.co");

		// Add cc or bcc
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');
		// Email subject
		$mail->Subject ="Observaciones de reportes a comite";

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = $observaciones;
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo "no se pudo realizar la acción";
		}else{
			//echo "true";
			$res=$this->reporte->agregar_observacion($reporte,$observaciones);
			echo "acción realizada correctamente";

		}
	}

	public function nuevos(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2) {
			$id=$this->session->userdata("documento");
			$reporte=$this->reporte->Consult_nuevos($id);
			$caso="cancelados";
			$dinamica= $this->load->view('content/Coordinador/reportes',['reporte'=>$reporte,'caso'=>$caso],true);
			$menu=$this->load->view('content/Coordinador/menu',[],true);
			$c=array($dinamica,$menu);
			$this->Plantilla_Coordinador($c);
		}else{
			show_404();
		}
	}

	public function cancelarReporte(){
		if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 2){
			$consec=$_POST["reporte"];
			$aprobar=$this->reporte->cancelarRep($consec);
		
		}
	}
}

