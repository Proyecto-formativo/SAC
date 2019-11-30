<?php 
  class equipoinstructores extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function agregarEquipoInstructores($ficha, $documento, $estado) {

      for ($i=0; $i < count($ficha) ; $i++) { 
        $datos = array(
          'docIDInstructor' => $documento[$i],
          'numFicha' => $ficha[$i],
          'estado' => $estado[$i]
        );

        if (!$this->db->simple_query('INSERT INTO tblequipoinstructor VALUES('.$datos["docIDInstructor"].', '.$datos["numFicha"].', '. $datos["estado"].')')) {
          return false;
        }

      }

      return true;

    }
  }