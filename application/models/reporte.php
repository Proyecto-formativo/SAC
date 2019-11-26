<?php 

class reporte extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function IngresarReporte($justificacion,$instructorReporte,$evidencia,$normasReglamentarias,$coordinador,$tipofalta,$tipoCalificcion,$sugerencia){
        $this->db->query("INSERT INTO tblreporte value(null,current_date() ,' $justificacion ',$instructorReporte,'$evidencia ',' $normasReglamentarias',$coordinador,'$tipofalta',' $tipoCalificcion',$sugerencia, 'No aprobado')");
    }

    public function Actualizarficha($numeroficha,$valores){
        $this->db->where('nroFicha',$numeroficha);
        $this->db->update('tblficha',$valores);
    }
    public function UltimoReporte(){
        $sql = $this->db->query("SELECT * from tblreporte order by consecutivo desc limit 1");
        return $sql->row();
    }
}