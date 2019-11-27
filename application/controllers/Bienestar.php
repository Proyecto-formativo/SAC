<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bienestar extends CI_Controller {
    public $sw = true;
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso','area','reporte','municipio','aprendicesreportados','reporteseguimientoaprendiz','sugerencia','acta','compromisos']);
		$this->load->library(['form_validation']);
		$this->load->helper(['validarPerfil','validarActa']);
	}

	public function index(){
        if ($this->session->userdata("is_logged") && $this->session->userdata('perfil') == 3) {
            $dinamica = $this->load->view('content/defecto/informacion_sistema','',true);
		    $this->Plantilla_Bienestar($dinamica);
        }else{
            show_404();
        }
        
    }

    /**
     * Plantilla_Bienestar
     * 
     * se crea la plantilla para mostrar la interfaz del Bienestar
     */
    public function Plantilla_Bienestar($dinamica){
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 3) {
            $datos = [
                'header' => $this->load->view('extra/header','',true),
                'footer' => $this->load->view('extra/footer','',true),
                'dinamica' => $dinamica,
            ];
            $this->load->view("bienestar_plantilla",$datos);
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
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 3) {
            $datos = $this->usuario->MostrarPerfil($this->session->userdata('documento'));
            $dinamica = $this->load->view('content/defecto/configuraciones',['datos'=>$datos],true);
            $this->Plantilla_Bienestar($dinamica);
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
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 3) {
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
                $this->Plantilla_Bienestar($dinamica);
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
                $this->Plantilla_Bienestar($dinamica);
            }

        }else{
            show_404();
        }
    }

    public function ActaComite($mensaje = null){
 
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 3) {
            $datos  =  $this->area->mostrarAreas();
            
            $dinamica = $this->load->view('content/Bienestar/listaArea',['datos'=>$datos,'mensaje'=>$mensaje],true);
		    $this->Plantilla_Bienestar($dinamica);
        }else{
            show_404();
        }
    }

    public function crearActa(){
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 3) {

            
            /**
             * 
             * se valida el codigo del area con el if
             * 
             */
            
            $codigo = $this->input->post("codigoArea");
            $area = $this->input->post("nombreArea");
            $coordinador = $this->input->post("coordinador");
            if ($codigo == 0 || $codigo == "") {
                return show_404();
            }

            /**
             * validar si hay reportes aprobados por el coordinador
             * $sql = $this->reporte->MostrarReporteAprobado($codigo);
             *var_export($sql);
             */
            
            

            if($valoresDeLosReportes = $this->reporte->MostrarReporteAprobado($codigo)){
                /**
                 * lista de los municipios para mostrar en la acta
                 */
                $municipio = $this->municipio->mostrarMunicipios();

                /**
                 * la sugerencia es para los descargos del aprendiz
                 */
                $sugerencia = $this->sugerencia->MostrarSuegerencia();


                /**
                 * 
                 * crear la vista de los descargos de los aprendices
                 */
                $datos = [];
                foreach ($valoresDeLosReportes as $valoresReportes) {
                    $valores = $this->aprendicesreportados->MostrarAprendicesPorReporte($valoresReportes->consecutivo);
                    array_push($datos , $valores);
                }
                //var_export($datos);
                
                $descargos = $this->load->view("content/bienestar/vistaDescargosAprendices",['datos'=>$datos],true);

                $dinamica = $this->load->view('content/Bienestar/acta',['codigo'=>$codigo,'nombreArea'=>$area,'coordinador'=>$coordinador,'municipio'=>$municipio,'valoresDeLosReportes'=>$valoresDeLosReportes,'descargos'=>$descargos,'sugerencia'=>$sugerencia],true);
                $this->Plantilla_Bienestar($dinamica);
            }else{
                $mensaje ="const Toast = Swal.mixin({
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
                    icon: 'info',
                    title: 'No se puede generar el acta ya que los reportes no fueron aprobados por el coordinador o no hay generados por el mes '
                })";
                $this->ActaComite($mensaje);
            }
        }else{
            show_404();
        }
    }

    public function ingresarActa(){
        // falta no se sabe si se agrega centro a la acta echo "<br> *******************".$this->input->post('centro');


        // if (  $this->acta->NumeroActa($this->input->post('NumroActa'))  ) {
        //     echo "no se puede ya existe";
        // }else{
        //     echo "se puede hacer la insercion";
        // }

        $this->form_validation->set_error_delimiters("","");

        $this->form_validation->set_rules(acta_rules());
        if ($this->form_validation->run() === false) {
            /***
             * 
             * 
             * mensaje de error de que todos los datos son requeridos
             * para el ingreso del acta
             * 
             */
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
            title: 'Todos los datos del acta son requeridos, favor volver a intentar correctamente'
        })";
        }else if($this->acta->NumeroActa($this->input->post('NumroActa')) ){
            /***
             * 
             * 
             * mensaje de error de que todos los datos son requeridos
             * para el ingreso del acta
             * 
             */
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
            title: 'Numero de acta ya existente favor volver a intentar con un numero de acta diferente'
        })";
        }else{

            $NombresAsistentes = $this->IngresarArchivos('NombresAsistentes');
            $NombreInvitados = $this->IngresarArchivos('NombreInvitados');
            if ($NombresAsistentes === false || $NombreInvitados === false) {
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
                    title: 'el archivo es requerido para generar el acta'
                })";
            }else{
                $valores = [
                    "consecutivo" => $this->input->post('NumroActa'),
                    "municipio" => $this->input->post('municipio'),
                    "fecha" => $this->input->post('date'),
                    "horaInicio" => $this->input->post('hora_inicio'),
                    "horaFin" => $this->input->post('hora_fin'),
                    "sede" => $this->input->post('sede'),
                    "temas" => $this->input->post('temas'),
                    "area" =>  $this->input->post('area'),
                    "objetivo" => $this->input->post('ObjetivosReunion'),
                    "temasTratar" => $this->input->post('Temas_a_Tratar'),
                    "desarrolloReunion" => $this->input->post('Desarrollo'),
                    "conclusiones" => $this->input->post('concluciones'),
                    "archivoAsistentes" => $NombresAsistentes,
                    "archivoInvitados" => $NombreInvitados
                ];
                $this->acta->agregarActa($valores);
        
                $array = json_decode($this->input->post('Listas_Compromisos'));
                foreach ($array as $value) {
                    $this->compromisos->agregar($this->input->post('NumroActa'),$value[0],$value[1],$value[2]);
                }
    
                $valores = $this->reporte->MostrarReportesDelArea($this->input->post('area'));
                foreach ($valores->result() as $reporte) {
                   $this->reporte->agregarActa($this->input->post('NumroActa'),$reporte->consecutivo);
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
                    title: 'Acta agregada correctamente'
                })";
            }
        }   
        $this->actaIngresada($mensaje);
    }
    public function actaIngresada($mensaje){
        $this->ActaComite($mensaje);
    }

    public function IngresarArchivos($archivo){
        
        /**
         * se crea la ruta del fichero para enviar la evidencia del acta
         */
        $ruta = 'assets/documentos/';
        $config = [
            'upload_path' => './assets/documentos/',
            'allowed_types' => 'docx|jpg|png|txt|doc|pdf|rar|zip',
        ];
        $this->load->library('upload',$config);
        if ($this->upload->do_upload($archivo)) {
            $dato = ['upload_data' =>$this->upload->data()];
            $NombreInvitados = $ruta.$dato['upload_data']['file_name'];
            //var_export($this->upload->data());
            //echo $NombreInvitados;
            return $NombreInvitados;
            
        }

        return false;
    }


    public function filtroMunicipio(){
        if ($this->session->userdata("is_logged")  && $this->session->userdata('perfil') == 3) {    
            $municipio =  $_POST["municipio"];
            $datos = $this->municipio->filtroMostrarsedeYcentro($municipio);
            //var_export($datos->result());
            if ($municipio = null){
                $this->load->view("content/Bienestar/vista_municipio_filtro");
            }elseif ($datos){
                $this->load->view("content/Bienestar/vista_municipio_filtro",['datos'=>$datos]);
            }else{
                $this->load->view("content/Bienestar/vista_municipio_filtro");   
            }    
        }else{
            show_404();
        }
    }

    public function ingresoDescargosAprendiz(){
        $datos = JSON_decode($_POST["valores"]);
        $valores = [
            'consReporte' => $datos->consReporte,
            'consAprendizReporte'=> $datos->consAprendizReporte,
            'informeEquipoEjecutor'=> $datos->informeEquipoEjecutor,
            'descargosAprendiz'=> $datos->descarosAprendiz,
            'recomendacion' => $datos->Recomendacion,
        ];
        /**
         * si la peticion da correcta de valida en el javascript de los descargos
         * del aprendiz 
         */
        $this->reporteseguimientoaprendiz->agregar($valores);
        
        
    }
}