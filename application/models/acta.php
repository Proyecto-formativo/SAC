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

    public function mostrarDatosActa($consecutivo){
        $this->db->select('*');
        $this->db->from('tblacta');
        $this->db->where('consecutivo', $consecutivo);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function agregarActa($datos){
        $this->db->insert('tblacta',$datos);
    }


    public function mostrarActasPorArea($codigoArea){
        $sql = $this->db->query("SELECT a.consecutivo,m.nombre as municipio ,a.fecha,a.horaInicio,a.horaFin from tblacta as a 
        inner join tblsede as s
        on a.sede = s.codigo
        inner join tblcentro as  cent
        on s.centro = cent.codigo
        inner join tblarea as are
        on cent.codigo = are.centro
        inner join tblmunicipio as m
        on m.codigo = a.municipio 
         where are.codigo = $codigoArea
         order by a.consecutivo desc");
        return $sql;
    }

    
}