<?php 

class etapaformacion extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function mostrarEtapaFormacion(){
        $sql = $this->db->get('tbletapaformacion');
        return $sql;
    }
}