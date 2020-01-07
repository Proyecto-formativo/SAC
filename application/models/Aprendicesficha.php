<?php 
  class aprendicesficha extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarAprendicesFicha() {
      $sql = $this->db->query("SELECT GROUP_CONCAT(CONCAT(u.nombres, ' ', u.apellidos) SEPARATOR ',  ') AS aprendiz, f.nroFicha AS nroficha, p.nombre AS programa FROM tblusuario AS u INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha INNER JOIN tblprograma AS p ON f.programa = p.codigo GROUP BY f.nroFicha");
      return $sql;
    }

    public function agregarAprendicesFicha($ficha, $documento, $estado) {

      for ($i=0; $i < count($ficha) ; $i++) { 
        $datos = array(
          'docIDAprendiz' => $documento[$i],
          'numFicha' => $ficha[$i],
          'estado' => $estado[$i]
        );

        if (!$this->db->simple_query('INSERT INTO tblaprendicesficha VALUES('.$datos["docIDAprendiz"].', '.$datos["numFicha"].', '. $datos["estado"].')')) {
          return false;
        }

      }

      return true;

    }

    public function editarEstadoAprendices($documentos, $estados, $ficha) {

      for ($i=0; $i < count($documentos); $i++) { 
        $datos = array(
          'docIDAprendiz' => $documentos[$i],
          'numFicha' => $ficha,
        );

        $this->db->set('estado', $estados[$i]);
        $this->db->where($datos);
        $this->db->update('tblaprendicesficha');
  
      }

      return true;
    }

    public function getAprendicesFicha($nroficha) {
      $sql = $this->db->query("SELECT u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS aprendiz, f.nroFicha AS nroficha, e.nombre AS estado, e.codigo AS codigoestado FROM tblusuario AS u INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblestadoaprendiz AS e ON af.estado = e.codigo INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha WHERE f.nroFicha = $nroficha");
      return $sql;
    }

    public function eliminarAprendizFicha($documento, $ficha) {
      $sql = $this->db->delete('tblaprendicesficha', ['docIDAprendiz' => $documento, 'numFicha' => $ficha]);
      return $sql;
    }

  }