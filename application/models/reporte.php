<?php 

class reporte extends CI_Model{
    function __construct(){
        $this->load->database();
        date_default_timezone_set('America/Bogota');
    }



    public function IngresarReporte($justificacion,$instructorReporte,$evidencia,$normasReglamentarias,$coordinador,$tipofalta,$tipoCalificcion,$sugerencia){
        $this->db->query("INSERT INTO tblreporte value(null,current_date() ,' $justificacion ',$instructorReporte,'$evidencia ',' $normasReglamentarias',$coordinador,'$tipofalta',' $tipoCalificcion',$sugerencia, 'No aprobado',null)");
    }

    public function Actualizarficha($numeroficha,$valores){
        $this->db->where('nroFicha',$numeroficha);
        $this->db->update('tblficha',$valores);
    }
    public function UltimoReporte(){
        $sql = $this->db->query("SELECT * from tblreporte order by consecutivo desc limit 1");
        return $sql->row();
    }

    public function MostrarReporteAprobado($area){
        $year = date('Y');
        $mouth = date('m');
        $sql = $this->db->query("SELECT r.consecutivo, r.fecha, a.nombre, p.nombre 
                                FROM tblreporte AS r INNER JOIN tblusuario AS u 
                                ON r.instructorReporte = u.docID 
                                INNER JOIN tblequipoinstructor AS ei 
                                ON u.docID = ei.docIDInstructor 
                                INNER JOIN tblficha AS f 
                                ON ei.numFicha = f.nroFicha 
                                INNER JOIN tblprograma AS p 
                                ON f.programa = p.codigo 
                                INNER JOIN tblarea AS a 
                                ON p.area = a.codigo 
                                WHERE a.codigo = $area AND  YEAR(r.fecha) = $year and MONTH(r.fecha) = $mouth and r.estado = 'aprobado' and r.nro_acta is null ");
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
        return false;
    }

    public function MostrarReportesDelArea($area){
        $year = date('Y');
        $mouth = date('m');
        $sql = $this->db->query("SELECT r.consecutivo as consecutivo
                                FROM tblreporte AS r INNER JOIN tblusuario AS u 
                                ON r.instructorReporte = u.docID 
                                INNER JOIN tblequipoinstructor AS ei 
                                ON u.docID = ei.docIDInstructor 
                                INNER JOIN tblficha AS f 
                                ON ei.numFicha = f.nroFicha 
                                INNER JOIN tblprograma AS p 
                                ON f.programa = p.codigo 
                                INNER JOIN tblarea AS a 
                                ON p.area = a.codigo 
                                WHERE a.codigo = $area AND  YEAR(r.fecha) = $year and MONTH(r.fecha) = $mouth and r.estado = 'aprobado' and r.nro_acta is null");
        if ($sql->num_rows() > 0) {
            return $sql;
        }
        return false;
    }

    public function agregarActaAreportes($acta,$consecutivo){
        $this->db->query("UPDATE tblreporte set nro_acta = '$acta' where consecutivo = $consecutivo");
    }

    public function MostrarReportePorActa($acta){
        $sql = $this->db->query("SELECT consecutivo,justificacion,normasReglamento,tipofalta,tipoCalificacion from tblreporte where nro_acta = '$acta'");
        return $sql;
    }
}