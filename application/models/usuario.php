<?php 

class usuario extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    //Mostrar Datos de Usuario para el perfil de instructor
    public function MostrarDatosUsuario($docuemnto){
        $sql = $this->db->get_where('tblusuario',['docID'=>$docuemnto]);
        if ($sql->result()) {
            return $sql->row();
        }
        return false;
    } 

    public function MostrarPerfil($docuemnto){
        $sql = $this->db->query("SELECT u.nombres, u.apellidos,u.correoCorporativo,u.telefonoMovil,a.clave from tblusuario as u inner join tblacceso as a on u.docID = a.docIDUsuario where u.docID =  $docuemnto");
        return $sql->row();
    }

    public function ActualizarPerfil($documento,$valores){
        $this->db->where('docID',$documento);
        $this->db->update('tblusuario',$valores);
    }

    //Actualizar Usuario Independiente del Perfil
    public function editarUsuario($datos) {
        $this->db->set('nombres', $datos['nombres']);
        $this->db->set('nombres', $datos['nombres']);
        $this->db->set('nombres', $datos['nombres']);
        $this->db->set('nombres', $datos['nombres']);
        $this->db->set('nombres', $datos['nombres']);
        $this->db->set('nombres', $datos['nombres']);
    }


    public function MostrarAprendicesDeFicha($ficha){
        $sql = $this->db->query("SELECT u.docId,u.nombres, u.apellidos,af.numFicha from tblaprendicesficha as af inner join tblusuario as u on u.docID = af.docIDaprendiz where numficha = $ficha");
        return $sql;
    }

    //Mostrar Coordinadores en la lista desplegable del modulo Area
    public function getCoordinadores() {
        $sql = $this->db->query("SELECT docID AS documento, CONCAT(nombres, ' ', apellidos) AS coordinador FROM tblusuario WHERE perfil = 2 ORDER BY CONCAT(nombres, ' ', apellidos)");
        return $sql;
    }

    //Mostrar Instructores en la lista desplegable del modulo Ficha
    public function getInstructores() {
        $sql = $this->db->query("SELECT docID AS documento, CONCAT(nombres, ' ', apellidos) AS instructor FROM tblusuario WHERE perfil = 1 ORDER BY CONCAT(nombres, ' ', apellidos)");
        return $sql;
    }

    //Mostrar Usuarios que tengan el perfil de Administrador
    public function mostrarAdministradores() {
        $sql = $this->db->query("SELECT u.docId AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS usuario, u.correoPersonal AS correopersonal, u.correoCorporativo AS correocorporativo, u.telefonoMovil AS telmovil, u.telefonoFijo AS telfijo, p.nombre AS perfil FROM tblusuario AS u INNER JOIN tblperfil AS p ON u.perfil = p.codigo WHERE u.perfil = 5 ORDER BY p.nombre");
        return $sql;
    }

    //Mostrar Administrador para edición
    public function getAdministrador($documento) {
        $sql = $this->db->query("SELECT u.docId AS documento, u.nombres AS nombres, u.apellidos AS apellidos, u.correoPersonal AS correopersonal, u.correoCorporativo AS correocorporativo, u.telefonoMovil AS telmovil, u.telefonoFijo AS telfijo, u.perfil AS perfil, a.clave AS clave FROM tblusuario AS u INNER JOIN tblacceso AS a ON u.docID = a.docIDUsuario WHERE u.docID = $documento");
        return $sql->row();
    }
    //Mostrar Usuarios que tengan el perfil de Coordinador
    //Mostrar Usuarios que tengan el perfil de Instructor
    //Mostrar Usuarios que tengan el perfil de Aprendiz

    //Agregar Administrador
    public function agregarAdministrador($datos) {
        $sql = $this->db->insert('tblusuario', ['docID' => $datos['docid'], 'nombres' => $datos['nombres'], 'apellidos' => $datos['apellidos'], 'correoPersonal' => $datos['correo_personal'], 'correoCorporativo' => $datos['correo_corporativo'], 'telefonoMovil' => $datos['tel_movil'], 'telefonoFijo' => $datos['tel_fijo'], 'perfil' => 5]);

        if ($sql) {
            $acceso = $this->db->insert('tblacceso', ['docIDUsuario' => $datos['docid'], 'clave' => $datos['password_one']]);
            return $acceso;
        }
        return false;
    }

    //Editar Administrador
    public function editarAdministrador($datos) {
        $this->db->set('nombres', $datos['nombres']);
        $this->db->set('apellidos', $datos['apellidos']);
        $this->db->set('correoCorporativo', $datos['correo_corporativo']);
        $this->db->set('correoPersonal', $datos['correo_personal']);
        $this->db->set('telefonoMovil', $datos['tel_movil']);
        $this->db->set('telefonoFijo', $datos['tel_fijo']);
        $this->db->where('docID', $datos['docid']);
        $sql = $this->db->update('tblusuario');
        
        if ($sql) {
            $this->db->where('docIDUsuario', $datos['docid']);
            $acceso = $this->db->update('tblacesso', ['clave' => $datos['password_one']]);
            return true;
        }

        return false;
    }

    
}