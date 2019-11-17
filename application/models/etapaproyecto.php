<?php 

class etapaproyecto extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function mostrarEtapaproyecto(){
        $sql = $this->db->get('tbletapaproyecto');
        return $sql;
    }
}