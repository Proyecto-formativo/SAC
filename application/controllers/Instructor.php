<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso','ficha','etapaformacion','etapaproyecto','sugerencia','reporte','aprendicesreportados']);
		$this->load->library(['form_validation']);
		$this->load->helper(['validarPerfil','validarFicha']);
	}

	public function index(){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
            $dinamica = $this->load->view('content/defecto/informacion_sistema','',true);
		    $this->Plantilla_instructor($dinamica);
        }else{
            show_404();
        }
        
		
    }
    /**
     * Plantilla_instructor
     * 
     * se crea la plantilla para mostrar la interfaz del instructor
     */
    public function Plantilla_instructor($dinamica){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
            $datos = [
                'header' => $this->load->view('extra/header','',true),
                'footer' => $this->load->view('extra/footer','',true),
                'dinamica' => $dinamica,
            ];
            $this->load->view("instructor_plantilla",$datos);
        }else{
            show_404();

        }

    }
    
    /**
     * reporte
     * 
     * se mostrara el reporte que quiere generar el instructor
     */
    public function reporte($mensaje = null){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
            $fichasDelInstructor = $this->ficha->mostrarPorInstructor($this->session->userdata("documento"));
            $dinamica = $this->load->view('content/instructor/reporte',['fichas'=> $fichasDelInstructor,"mensaje" => $mensaje],true);
            $this->Plantilla_instructor($dinamica);
        }else{
            show_404();
        }
    }

    public function EnviarReporte(){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
            $this->form_validation->set_error_delimiters('','');
            $this->form_validation->set_rules(ficha_rules());
            if($this->form_validation->run() == false){
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
                        icon: 'error',
                        title: 'Todos los campos son requeridos'
                      })";
                
                $this->reporte($mensaje);
            }else if ($this->input->post("aprendices") == null)  {
                $mensaje =  "                    
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
                        icon: 'error',
                        title: 'No se puede generar un reporte si no ha seleccionado aprendices'
                      })";
                $this->reporte($mensaje);
            }else{
                /**
                 * se crea la ruta del fichero para enviar la evidencia del reporte
                 */
                $ruta = 'assets/documentos/';
                $config = [
                    'upload_path' => './assets/documentos/',
                    'allowed_types' => 'docx|jpg|png|txt|doc|pdf|rar|zip',
                ];
                $this->load->library('upload',$config);

                if ($this->upload->do_upload('evidencia')) {


                    if ($this->upload->data()["file_size"] > 6155.39) {
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
                                icon: 'error',
                                title: 'El tama単o del archivo es demaciado grande solo se aceptan '
                            })";
                    }else{
                        /**
                         * 
                         *se crea un array llamada valores para enviar los datos que se van a actualizar de la ficha y le pasamos el parametro
                         *del numero de ficha para saber a que ficha se va a actualizar
                         */
                        $valores = [
                            'etapaFormacion' => $this->input->post("etapaformacion"),
                            'etapaProyecto' => $this->input->post("etapaproyecto"),
                        ];
                        $this->ficha->Actualizarficha($this->input->post("ficha"),$valores);



                        /**
                         * datos del reporte
                         * 
                         * 
                         */
                        $justificacion = $this->input->post("justificacion");
                        $instructorReporte = $this->session->userdata("documento");
                        $normasReglamentarias = $this->input->post("normasReglamentarias");
                        $ficha = $this->input->post("ficha");
                        $tipofalta = $this->input->post("tipofalta");
                        $tipoCalificcion = $this->input->post("tipocalificacion");
                        $sugerencia = $this->input->post("sugerencia");
                        
                        $dato = ['upload_data' =>$this->upload->data()];
                        $evidencia = $ruta.$dato['upload_data']['file_name'];

                        $this->reporte->IngresarReporte($justificacion,$instructorReporte,$evidencia,$normasReglamentarias,$ficha,$tipofalta,$tipoCalificcion,$sugerencia);
                        
                        
                        /**
                         * agregando aprendices por reporte
                         */
                        $aprendices = $this->input->post("aprendices");
                        $sql = $this->reporte->UltimoReporte();
                        for ($i=0; $i < count($aprendices); $i++) { 
                            $this->aprendicesreportados->IngresarAprencides($sql->consecutivo,$aprendices[$i]);
                        }
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
                                title: 'Reporte enviado correctamente'
                            })";
                    }
                }else{
                    $mensaje =  "                    
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
                            icon: 'error',
                            title: 'La evidencia es requerida, favor repetir el procediminto correspondiente'
                          })";
                }
                $this->reporte($mensaje);
            }
        }else{
            show_404();
        }
    }

    public function traerdatosficha(){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
            $ficha =  $_POST["numeroficha"];
 
            $datosFicha = $this->ficha->mostrarficha($ficha);

            if ($datosFicha != false) {
                $etapaformacion = $this->etapaformacion->mostrarEtapaFormacion();
                $etapaproyecto = $this->etapaproyecto->mostrarEtapaproyecto();
                $AprendicesDelNumeroFicha = $this->usuario->MostrarAprendicesDeFicha($ficha);
                $sugerencia = $this->sugerencia->MostrarSuegerencia();
                $this->load->view('content/instructor/peticionFichaCorrecta',['datosFicha'=>$datosFicha,
                                                                            'etapaformacion'=> $etapaformacion,
                                                                            'etapaproyecto'=> $etapaproyecto,
                                                                            'AprendicesDelNumeroFicha'=> $AprendicesDelNumeroFicha,
                                                                            'sugerencia' => $sugerencia ]);
            }else{
                $this->load->view('content/instructor/peticionFichaInCorrecta');
            }
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
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
            $datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
            $dinamica = $this->load->view('content/defecto/configuraciones',['datos'=>$datos],true);
            $this->Plantilla_instructor($dinamica);
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
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 1) {
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
                $this->Plantilla_instructor($dinamica);
            }else{
                $valores = [
                    'nombres' => $nombre,
                    'apellidos' => $Apellido,
                    'correoCorporativo' => $Correo,
                    'telefonoMovil' => $Celular
                ];
                $this->usuario->ActualizarPerfil($this->session->userdata("documento"),$valores);
                $this->acceso->ActualizarContrasena($this->session->userdata("documento"),['clave' => $password]);
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
                $this->Plantilla_instructor($dinamica);
            }

        }else{
            show_404();
        }
    }
}