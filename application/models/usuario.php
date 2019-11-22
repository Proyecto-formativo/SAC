<?php 

class usuario extends CI_Model{
    function __construct(){
        $this->load->database();
    }

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


    public function MostrarAprendicesDeFicha($ficha){
        $sql = $this->db->query("SELECT u.docId,u.nombres, u.apellidos,af.numFicha from tblaprendicesficha as af inner join tblusuario as u on u.docID = af.docIDaprendiz where numficha = $ficha");
        return $sql;
    }

    public function getCoordinadores() {
        $sql = $this->db->query("SELECT docID AS documento, CONCAT(nombres, ' ', apellidos) AS coordinador FROM tblusuario WHERE perfil = 2 ORDER BY CONCAT(nombres, ' ', apellidos)");
        return $sql;
    }

    public function getInstructores() {
        $sql = $this->db->query("SELECT docID AS documento, CONCAT(nombres, ' ', apellidos) AS instructor FROM tblusuario WHERE perfil = 1 ORDER BY CONCAT(nombres, ' ', apellidos)");
        return $sql;
    }
}