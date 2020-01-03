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
        c.nombre as centro,
        m.nombre as municipio
        from tblacta as a
        inner join tblsede as s
        on s.codigo = a.sede
        inner join tblarea as are
        on are.codigo = a.area
        inner join tblcentro as c
        on c.codigo = a.centro
        inner join tblmunicipio as m 
        on m.codigo = s.municipio
        where a.consecutivo = '$consecutivo'");
        return $sql->row();
    }

    public function agregarActa($datos){
        $this->db->insert('tblacta',$datos);
    }


    public function mostrarActasPorArea($codigoArea){
        $sql = $this->db->query("SELECT a.consecutivo,a.fecha,a.horaInicio,a.horaFin from tblacta as a where a.area = $codigoArea");
        return $sql;
    }

    
}