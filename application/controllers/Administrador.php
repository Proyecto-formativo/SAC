<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['usuario','acceso', 'sugerencia', 'recomendacion', 'municipio', 'etapaformacion']);
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

    /*==== Control Administracion Municpio ==== */
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
    /*==== Fin Control Administracion Municpio ==== */

    
}