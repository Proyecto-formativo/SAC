<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso', 'sugerencia', 'recomendacion', 'municipio', 'etapaformacion', 'etapaproyecto', 'estadoinstructor', 'estadoaprendiz', 'centro', 'sede']);
		$this->load->library(['form_validation']);
        $this->load->helper(['validarPerfil']);
        $this->load->database();
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

    /*

    ===================================================================================================

    */

    /*==== Control Administracion Recomendación ==== */
    public function recomendacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
            $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarRecomendacion() {

        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $this->form_validation->set_rules('recomendacion', 'Recomendación', 'trim|required|alpha');
            
            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/recomendacion/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);

            } else {

                $nombre = $this->input->post('recomendacion');
                $resultado = $this->recomendacion->agregarRecomendacion($nombre);

                if ($resultado) {
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
                    $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
                    $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
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
                        title: 'Recomendación no agregada'
                    })";
                    $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
                    $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }


    }

    public function editarRecomendacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('recomendacion', 'Recomendación', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['recomendacion'] = $this->recomendacion->getRecomendacion($codigo);
                $dinamica = $this->load->view('content/Administrador/recomendacion/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('recomendacion');

                $resultado = $this->recomendacion->editarRecomendacion($codigo, $nombre);

                if ($resultado) {
                    $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
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
                        title: 'Recomendación Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
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
                        title: 'Recomendación no Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function eliminarRecomendacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $codigo = $this->input->post('codigo');
            $resultado = $this->recomendacion->eliminarRecomendacion($codigo);

            if ($resultado) {
                $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
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
                    title: 'Recomendación eliminida'
                })";

                $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['recomendaciones'] = $this->recomendacion->mostrarRecomendaciones();
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
                    title: 'La Recomendación no puede ser eliminada porque hay registros asociados a esta'
                })";

                $dinamica = $this->load->view('content/Administrador/recomendacion/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }
        } else {
            show_404();
        }
    }

    // Cargar Vistas Formularios Recomendacion
    public function FrmAgregarRecomendacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/recomendacion/agregar', '',true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarRecomendacion($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['recomendacion'] = $this->recomendacion->getRecomendacion($codigo);
            $dinamica = $this->load->view('content/Administrador/recomendacion/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }
    // Fin Cargar Vistas Formularios Recomendacion
    /*==== Control Administracion Recomendación ==== */


    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Municpio ==== */
    public function municipio() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['municipios'] = $this->municipio->mostrarMunicipios();
            $dinamica = $this->load->view('content/Administrador/municipio/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarMunicipio() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|numeric|min_length[3]|max_length[5]|is_unique[tblmunicipio.codigo]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/municipio/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->municipio->agregarMunicipio($codigo, $nombre);

                if ($resultado) {
                    $data['municipios'] = $this->municipio->mostrarMunicipios();
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
                        title: 'Municipio agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/municipio/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
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
                        title: 'El codigo del municipio ya existe, porfavor verifique'
                    })";
                    $dinamica = $this->load->view('content/Administrador/municipio/agregar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }

        } else {
            show_404();
        }
    }

    public function editarMunicipio() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $this->FrmEditarMunicipio($codigo);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->municipio->editarMunicipio($codigo, $nombre);

                if ($resultado) {
                    $data['municipios'] = $this->municipio->mostrarMunicipios();
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
                        title: 'Municipio editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/municipio/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['municipios'] = $this->municipio->mostrarMunicipios();
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
                        title: 'Municipio no editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/municipio/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function eliminarMunicipio() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $codigo = $this->input->post('codigo');
            $resultado = $this->municipio->EliminarMunicipio($codigo);

            if ($resultado) {
                $data['municipios'] = $this->municipio->mostrarMunicipios();
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
                    title: 'Municipio eliminido'
                })";

                $dinamica = $this->load->view('content/Administrador/municipio/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['municipios'] = $this->municipio->mostrarMunicipios();
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
                    title: 'El municipio no puede ser eliminado porque hay registros asociados a este'
                })";

                $dinamica = $this->load->view('content/Administrador/municipio/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }

        } else {
            show_404();
        }
    }

    // Vistas Formulario Municipio
    public function FrmAgregarMunicipio() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/municipio/agregar', '', true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarMunicipio($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['municipio'] = $this->municipio->getMunicipio($codigo);
            $dinamica = $this->load->view('content/Administrador/municipio/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        }
    }
    /*==== Fin Control Administracion Municpio ==== */

    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Etapa Formación ==== */
     public function etapaformacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
            $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarEtapaFormacion() {

        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/etapaformacion/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $nombre = $this->input->post('nombre');

                $resultado = $this->etapaformacion->agregarEtapaFormacion($nombre);

                if ($resultado) {
                    $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
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
                        title: 'Etapa Formación agregada'
                    })";
                    
                    $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
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
                        title: 'Etapa Formación no agregada'
                    })";
                    
                    $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function editarEtapaFormacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['etapaformacion'] = $this->etapaformacion->getEtapaFormacion($codigo);
                $dinamica = $this->load->view('content/Administrador/etapaformacion/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->etapaformacion->editarEtapaFormacion($codigo, $nombre);

                if ($resultado) {
                    $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
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
                        title: 'Etapa Formación editada'
                    })";
                    
                    $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
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
                        title: 'Etapa Formación no editada'
                    })";
                    
                    $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function eliminarEtapaFormacion() {

        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $codigo = $this->input->post('codigo');
            $resultado = $this->etapaformacion->eliminarEtapaFormacion($codigo);

            if ($resultado) {
                $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
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
                    title: 'Etapa Formación eliminada'
                })";
                
                $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['etapasformacion'] = $this->etapaformacion->mostrarEtapaFormacion();
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
                    title: 'No se puede eliminar la Etapa Formacion porque hay registros asociados a esta'
                })";
                
                $dinamica = $this->load->view('content/Administrador/etapaformacion/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }
        } else {
            show_404();
        }
        

    }

    // Carga de Vistas Formularios Etapa Formación
    public function FrmAgregarEtapaFormacion() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/etapaformacion/agregar', '', true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarEtapaFormacion($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['etapaformacion'] = $this->etapaformacion->getEtapaFormacion($codigo);
            $dinamica = $this->load->view('content/Administrador/etapaformacion/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }
    /*==== Fin Control Administracion Etapa Formación ==== */

    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Etapa Proyecto ==== */

    public function etapaproyecto() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaproyecto();
            $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarEtapaProyecto() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/etapaproyecto/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);
            } else {

                $nombre = $this->input->post('nombre');

                $resultado = $this->etapaproyecto->agregarEtapaProyecto($nombre);

                if ($resultado) {
                    $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaProyecto();
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
                        title: 'Etapa Proyecto Agregada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaProyecto();
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
                        title: 'Etapa Proyecto no Agregada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        }
    }

    public function editarEtapaProyecto() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['etapaproyecto'] = $this->etapaproyecto->getEtapaProyecto($codigo);
                $dinamica = $this->load->view('content/Administrador/etapaproyecto/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->etapaproyecto->editarEtapaProyecto($codigo, $nombre);

                if ($resultado) {
                    $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaProyecto();
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
                        title: 'Etapa Proyecto Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaProyecto();
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
                        title: 'Etapa Proyecto no Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
        
    }

    public function eliminarEtapaProyecto() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $codigo = $this->input->post('codigo');
            $resultado = $this->etapaproyecto->eliminarEtapaProyecto($codigo);

            if ($resultado) {
                $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaProyecto();
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
                    title: 'Etapa Proyecto eliminada'
                })";
                
                $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['etapasproyecto'] = $this->etapaproyecto->mostrarEtapaProyecto();
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
                    title: 'No se puede eliminar la Etapa Proyecto porque hay registros asociados a esta'
                })";
                
                $dinamica = $this->load->view('content/Administrador/etapaproyecto/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }
        } else {
            show_404();
        }
    }

    // Carga de Vistas Formularios Etapa Proyecto
    public function FrmAgregarEtapaProyecto() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/etapaproyecto/agregar', '', true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarEtapaProyecto($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['etapaproyecto'] = $this->etapaproyecto->getEtapaProyecto($codigo);
            $dinamica = $this->load->view('content/Administrador/etapaproyecto/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    /* ==== Fin Control Administracion Etapa Proyecto ==== */

    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Estado Instructor ==== */
    public function estadoinstructor() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
            $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarEstadoInstructor() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/estadoinstructor/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $nombre = $this->input->post('nombre');
                $resultado = $this->estadoinstructor->agregarEstadoInstructor($nombre);

                if ($resultado) {
                    $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
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
                        title: 'Estado Instructor Agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
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
                        title: 'Estado Instructor no Agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function editarEstadoInstructor() {

        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['estadoInstructor'] = $this->estadoinstructor->getEstadoInstructor($codigo);
                $dinamica = $this->load->view('content/Administrador/estadoinstructor/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->estadoinstructor->editarEstadoInstructor($codigo, $nombre);

                if ($resultado) {
                    $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
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
                        title: 'Estado Instructor Editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
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
                        title: 'Estado Instructor no Editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }

        } else {
            show_404();
        }
    }

    public function eliminarEstadoInstructor() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $codigo = $this->input->post('codigo');
            $resultado = $this->estadoinstructor->eliminarEstadoInstructor($codigo);

            if ($resultado) {
                $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
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
                    title: 'Estado Instructor eliminado'
                })";
                
                $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['estadoInstructores'] = $this->estadoinstructor->mostrarEstadoInstructores();
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
                    title: 'No se puede eliminar el Estado del Instructor porque hay registros asociados a este'
                })";
                
                $dinamica = $this->load->view('content/Administrador/estadoinstructor/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }

        } else {
            show_404();
        }
    }

    //Carga de Vistar Formularios Estado Instructor
    public function FrmAgregarEstadoInstructor() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/estadoinstructor/agregar', '', true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarEstadoInstructor($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['estadoInstructor'] = $this->estadoinstructor->getEstadoInstructor($codigo);
            $dinamica = $this->load->view('content/Administrador/estadoinstructor/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    /*==== Fin Control Administracion Estado Instructor ==== */

    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Estado Aprendiz ==== */
    public function estadoaprendiz() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
            $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarEstadoAprendiz() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/estadoaprendiz/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $nombre = $this->input->post('nombre');
                $resultado = $this->estadoaprendiz->agregarEstadoAprendiz($nombre);

                if ($resultado) {
                    $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
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
                        title: 'Estado Aprendiz Agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
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
                        title: 'Estado Aprendiz no Agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function editarEstadoAprendiz() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['estadoAprendiz'] = $this->estadoaprendiz->getEstadoAprendiz($codigo);
                $dinamica = $this->load->view('content/Administrador/estadoaprendiz/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->estadoaprendiz->editarEstadoAprendiz($codigo, $nombre);

                if ($resultado) {
                    $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
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
                        title: 'Estado Aprendiz Editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
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
                        title: 'Estado Aprendiz no Editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }

        } else {
            show_404();
        }
    }

    public function eliminarEstadoAprendiz() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $codigo = $this->input->post('codigo');
            $resultado = $this->estadoaprendiz->eliminarEstadoAprendiz($codigo);

            if ($resultado) {
                $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
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
                    title: 'Estado Aprendiz eliminado'
                })";
                
                $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['estadoAprendices'] = $this->estadoaprendiz->mostrarEstadoAprendices();
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
                    title: 'No se puede eliminar el Estado del Aprendiz porque hay registros asociados a este'
                })";
                
                $dinamica = $this->load->view('content/Administrador/estadoaprendiz/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }

        } else {
            show_404();
        }
    }

    // Carga de Vistas Formularios Estado Aprendiz
    public function FrmAgregarEstadoAprendiz() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/estadoaprendiz/agregar', '', true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarEstadoAprendiz($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['estadoAprendiz'] = $this->estadoaprendiz->getEstadoAprendiz($codigo);
            $dinamica = $this->load->view('content/Administrador/estadoaprendiz/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }
    /*==== Fin Control Administracion Estado Aprendiz ==== */

    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Centros ==== */
    public function centros() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['centros'] = $this->centro->mostrarCentros();
            $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarCentro() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {

            $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|numeric|is_unique[tblcentro.codigo]|max_length[8]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $dinamica = $this->load->view('content/Administrador/centro/agregar', '', true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->centro->agregarCentro($codigo, $nombre);

                if ($resultado) {
                    $data['centros'] = $this->centro->mostrarCentros();
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
                        title: 'Centro Agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);

                } else {
                    $data['centros'] = $this->centro->mostrarCentros();
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
                        title: 'Centro no Agregado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }

            }
            
        } else {
            show_404();
        }
    }

    public function editarCentro() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['centro'] = $this->centro->getCentro($codigo);
                $dinamica = $this->load->view('content/Administrador/centro/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $codigo = $this->input->post('codigo');
                $nombre = $this->input->post('nombre');

                $resultado = $this->centro->editarCentro($codigo, $nombre);

                if ($resultado) {
                    $data['centros'] = $this->centro->mostrarCentros();
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
                        title: 'Centro Editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                } else {
                    $data['centros'] = $this->centro->mostrarCentros();
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
                        title: 'Estado no Editado'
                    })";
                    $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
                
            }
        }
    }

    public function eliminarCentro() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $codigo = $this->input->post('codigo');
            $resultado = $this->centro->eliminarCentro($codigo);

            if ($resultado) {
                $data['centros'] = $this->centro->mostrarCentros();
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
                    title: 'Centro eliminado'
                })";
                
                $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $data['centros'] = $this->centro->mostrarCentros();
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
                    title: 'No se puede eliminar el Centro porque hay registros asociados a este'
                })";
                
                $dinamica = $this->load->view('content/Administrador/centro/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }
        }
    }

    //Carga de Vistas Formularios Centro
    public function FrmAgregarCentro() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $dinamica = $this->load->view('content/Administrador/centro/agregar', '', true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarCentro($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['centro'] = $this->centro->getCentro($codigo);
            $dinamica = $this->load->view('content/Administrador/centro/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    /*==== FinControl Administracion Centros ==== */

    /* 
    
        ==================================================================================================

    */

    /*==== Control Administracion Sede ==== */
    public function sedes() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['sedes'] = $this->sede->mostrarSedes();
            $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function agregarSede() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|numeric|is_unique[tblsede.codigo]|max_length[10]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['centros'] = $this->centro->mostrarCentros();
                $dinamica = $this->load->view('content/Administrador/sede/agregar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $datos = array(
                    'codigo_sede' => $this->input->post('codigo'),
                    'nombre' => $this->input->post('nombre'),
                    'codigo_centro' => $this->input->post('centro')
                );

                $resultado = $this->sede->agregarSede($datos);

                if ($resultado) {
                    $data['sedes'] = $this->sede->mostrarSedes();
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
                        title: 'Sede Agregada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);

                } else {
                    $data['sedes'] = $this->sede->mostrarSedes();
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
                        title: 'Sede no Agregada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }

        } else {
            show_404();
        }
    }

    public function editarSede() {

        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            
            $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');

            if ($this->form_validation->run() == false) {
                $codigo = $this->input->post('codigo');
                $data['sede'] = $this->sede->getSede($codigo);
                $data['centros'] = $this->centro->mostrarCentros();
                $dinamica = $this->load->view('content/Administrador/sede/editar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            } else {
                $datos = array(
                    'codigo_sede' => $this->input->post('codigo'),
                    'nombre' => $this->input->post('nombre'),
                    'codigo_centro' => $this->input->post('centro')
                );

                $resultado = $this->sede->editarSede($datos);

                if ($resultado) {
                    $data['sedes'] = $this->sede->mostrarSedes();
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
                        title: 'Sede Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);

                } else {
                    $data['sedes'] = $this->sede->mostrarSedes();
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
                        title: 'Sede no Editada'
                    })";
                    $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
                    $this->Plantilla_Administrador($dinamica);
                }
            }
        } else {
            show_404();
        }
    }

    public function eliminarSede() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $codigo = $this->input->post('codigo');
            $resultado = $this->sede->eliminarSede($codigo);

            if ($resultado) {
                $data['sedes'] = $this->sede->mostrarSedes();
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
                    title: 'Sede Eliminada'
                })";
                $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);

            } else {
                $data['sedes'] = $this->sede->mostrarSedes();
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
                    title: 'No se puede eliminar la Sede porque hay registros asociados a esta'
                })";
                $dinamica = $this->load->view('content/Administrador/sede/listar', $data, true);
                $this->Plantilla_Administrador($dinamica);
            }
        }
    }

    //Carga de Vistas Formularios Sede
    public function FrmAgregarSede() {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['centros'] = $this->centro->mostrarCentros();
            $dinamica = $this->load->view('content/Administrador/sede/agregar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }

    public function FrmEditarSede($codigo) {
        if ($this->session->userdata('is_logged') && $this->session->userdata('perfil') == 5) {
            $data['sede'] = $this->sede->getSede($codigo);
            $data['centros'] = $this->centro->mostrarCentros();
            $dinamica = $this->load->view('content/Administrador/sede/editar', $data, true);
            $this->Plantilla_Administrador($dinamica);
        } else {
            show_404();
        }
    }
    /*==== Fin Control Administracion Sede ==== */



}