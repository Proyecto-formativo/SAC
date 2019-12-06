<?php 

class compromisos extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function agregar($consActa,$actividad,$responsable,$fecha){
        $this->db->insert('tblcompromisos',['consActa'=>$consActa,'actividad'=>$actividad,'responsable'=>$responsable,'fecha'=>$fecha]);

    }

    public function MostrarCompromisosConsecutivoActa($acta){
        $this->db->select('*');
        $this->db->from('tblcompromisos');
        $this->db->where('consActa', $acta);
        $sql = $this->db->get();
        return $sql;
    }
} 