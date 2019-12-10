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
        $sql = $this->db->query(" SELECT a.consecutivo,
        m.nombre as municipio,
        a.fecha,
        a.horaInicio,
        a.horaFin,
        s.nombre as sede,
        a.temas,
        are.nombre as area,
        a.objetivo,
        a.temasTratar,
        a.desarrolloReunion,
        a.conclusiones,
        c.nombre as centro 
        from tblacta as a
        inner join tblmunicipio as m 
        on m.codigo = a.municipio 
        inner join tblsede as s
        on s.codigo = a.sede
        inner join tblarea as are
        on are.codigo = a.area
        inner join tblcentro as c
        on c.codigo = a.centro
        where a.consecutivo = '$consecutivo'");
        return $sql->row();
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