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
}