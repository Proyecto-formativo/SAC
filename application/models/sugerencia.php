<?php 

class sugerencia extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function MostrarSuegerencia(){
        $sql = $this->db->get('tblsugerencia');
        return $sql;
    }
}