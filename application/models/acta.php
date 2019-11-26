<?php

class acta extends CI_Model {
    function __construct(){
        $this->load->database();
    }


    public function agregarActa($datos){
        $this->db->insert('tblacta',$datos);
    }
}