<?php 

class aprendicesreportados extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function IngresarAprencides($consecutivo,$aprendiz){
        $sql = $this->db->insert('tblaprendicesreportados',['consReporte'=>$consecutivo,'docIDAprendiz' =>$aprendiz]);
    } 
}