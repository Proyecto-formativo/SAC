<?php 

  class reporteseguimientoaprendiz extends CI_Model {

    function __construct() {
      $this->load->database();
    }

    public function mostrarreporteseguimientoaprendiz() {

      $sql = $this->db->get('tblreporteseguimientoaprendiz');
      return $sql;
    }



    public function agregar($datos) {
      if($this->db->insert('tblreporteseguimientoaprendiz', $datos)){
          return true;
        }
        return false;

    }

    public function mostrarDstosPorNumeroReporte($numeroreporte){
      $sql = $this->db->query("SELECT rsa.consReporte as reporte,rsa.informeEquipoEjecutor,rsa.descargosAprendiz,reco.nombre as recomendaciones,concat(u.nombres,' ',u.apellidos) as 	nombres,u.docID as documento from tblreporteseguimientoaprendiz as rsa
      inner join tblaprendicesreportados as ar
      on rsa.consAprendizReporte = ar.consecutivoAprendizReporte
      inner join tblusuario as u
      on u.docID = ar.docIDAprendiz
      inner join tblrecomendacion as reco
      on reco.codigo = rsa.recomendacion
      where rsa.consReporte = $numeroreporte;");

      return $sql->result();

    }
}