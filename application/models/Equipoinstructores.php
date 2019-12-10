<?php 
  class equipoinstructores extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarEquipoInstructores() {
      $sql = $this->db->query("SELECT f.nroFicha AS ficha, GROUP_CONCAT(CONCAT(u.nombres, ' ', u.apellidos) SEPARATOR ',  ') AS instructores FROM tblusuario AS u INNER JOIN tblequipoinstructor AS ei ON u.docID = ei.docIDInstructor INNER JOIN tblficha AS f ON ei.numFicha = f.nroFicha GROUP BY f.nroFicha");
      return $sql;
    }

    public function getEquipoInstructores($nroficha) {
      $sql = $this->db->query("SELECT u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS instructor, f.nroFicha AS nroficha, e.nombre AS estado FROM tblusuario AS u INNER JOIN tblequipoinstructor AS ei ON u.docID = ei.docIDInstructor INNER JOIN tblestadoinstructor AS e ON ei.estado = e.codigo INNER JOIN tblficha AS f ON ei.numFicha = f.nroFicha WHERE f.nroFicha = $nroficha");
      return $sql;
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

    public function eliminarInstructorFicha($documento, $ficha) {
      $sql = $this->db->delete('tblequipoinstructor', ['docIDInstructor' => $documento, 'numFicha' => $ficha]);
      return $sql;
    }
  }