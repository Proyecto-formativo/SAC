<?php

class acta extends CI_Model {
    function __construct(){
        $this->load->database();
    }


    public function NumeroActa($consecutivo){
        $this->db->select('*');
        $this->db->from('tblacta');
        $this->db->where('consecutivo', $consecutivo);
        $sql = $this->db->get();
        if($sql->num_rows() > 0 ){
            //return $sql->result();
            return true;
        }
        return false;
    }


    public function agregarActa($datos){
        $this->db->insert('tblacta',$datos);
    }
}