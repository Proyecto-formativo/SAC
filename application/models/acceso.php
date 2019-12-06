<?php 

class acceso extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function verificarLogin($docuemnto,$contraseña){
        $sql = $this->db->get_where('tblacceso',['docIDUsuario'=>$docuemnto,'clave' =>$contraseña]);
        if ($sql->result()) {
            return $sql->row();
        }
        return false;
    } 

    public function verificarDocuemnto($docuemnto){
        $sql = $this->db->get_where('tblacceso',['docIDUsuario'=>$docuemnto]);
        if ($sql->result()) {
            return $sql->row();
        }
        return false;
    } 

    public function ActualizarContraseña($documento,$valores){
        $this->db->where('docIDUsuario',$documento);
        $this->db->update('tblacceso',$valores);
    }

}