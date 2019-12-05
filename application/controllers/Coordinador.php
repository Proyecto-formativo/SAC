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

		$asunto[]=" Citación a descargos al comité de evaluación y seguimineto";
		$asunto[]="Una de las principales labores de los instructores y la coordinación académica, es velar por el desarrollo adecuado de su proceso formativo. Teniendo en cuenta su desempeño ";
		$asunto[]="y lo establecido en el manual del aprendiz.";
		$asunto[]="Lo invitamos a presentar descargos ante el comité de evaluación y seguimiento a realizarce el próximo (fecha Comitè) ";
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

	/*public function pdf()
	{

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

		$this->fpdf->Ln(34);
		$this->fpdf->SetFont('Arial', '', 14);
		$this->fpdf->Cell(65, 10, '', 0, 0, 'L');
		$this->fpdf->SetTextColor(65, 65, 255);
		$this->fpdf->Cell(2, -6, 'teste 2',0, 0, 'C');

		$this->fpdf->Ln(15);//salto de linea (especifica altura del salto)
		$this->fpdf->SetFont('Arial', 'U', 14);//establece fuente,tipo(I=italica,U=subrayada,""=normal),tamaño
		$this->fpdf->Cell(65, 10, '', 0, 0, 'L');//imprime Una celda : ancho, alto,texto,borde(numero :0=sin borde; 1= marco /cadena: L,T,R,B), posicion(0:derecha/1:comienzo sig linea/ 2:abajo), align(L,C,R), fondo(true/false),
		$this->fpdf->SetTextColor(65, 65, 255);
		$this->fpdf->Cell(2, -6, $san, 0, 0, 'C');

		$this->fpdf->Ln(15);//salto de linea (especifica altura del salto)
		$this->fpdf->SetFont('Arial', '', 14);//establece fuente,tipo(I=italica,U=subrayada,""=normal),tamaño
		$this->fpdf->Cell(65, 10, '', 0, 0, 'L');//imprime Una celda : ancho, alto,texto,borde(numero :0=sin borde; 1= marco /cadena: L,T,R,B), posicion(0:derecha/1:comienzo sig linea/ 2:abajo), align(L,C,R), fondo(true/false),
		$this->fpdf->SetTextColor(65, 65, 255);
		$this->fpdf->Cell(2, -6, 'otra lista de texto', 1, 'C');



		echo $this->fpdf->Output('Bibliotecafpdf.pdf', 'D');
	}*/

	public function correo_aprendiz(){
		$id=$_POST['id'];
		$correo=$this->reporte->ajax_correo($id);
		$email=$correo[0]->correoCorporativo;
		echo $email;
	}
	public function nombre_aprendiz(){
		$id=$_POST['id'];
		$nombre=$this->reporte->ajax_correo($id);
		$nombre=$nombre[0]->nombre;
		echo $nombre;
	}



	public function mail(){
		$email=$_POST['mail'];

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
			echo "no se pudo enviar el correo";
		}


	}

	}
