<?php
  class areascentro extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function areasCentro($centro) {
      $sql = $this->db->query("SELECT c.codigo AS codigocentro, a.codigo AS codigoarea,c.nombre AS centro, a.nombre AS area FROM tblcentro AS c INNER JOIN tblareascentro AS ac ON c.codigo = ac.codigocentro INNER JOIN tblarea AS a ON ac.codigoarea = a.codigo WHERE c.codigo = '$centro'");
      return $sql;
    }

    public function mostrarAreasCentro() {
      $sql = $this->db->query("SELECT c.codigo AS codigocentro, c.nombre AS centro, GROUP_CONCAT(a.nombre SEPARATOR ',  ') AS areas FROM tblcentro AS c INNER JOIN tblareascentro AS ac ON c.codigo = ac.codigocentro INNER JOIN tblarea AS a ON ac.codigoarea = a.codigo GROUP BY c.codigo, c.nombre");
      return $sql;
    }

    public function agregarAreasCentro($centro, $areas) {

      for ($i=0; $i < count($areas); $i++) { 

        if (!$this->db->simple_query("INSERT INTO tblareascentro VALUES('$centro', '$areas[$i]')")) {
          return false;
        }

      }

      return true;
    }

    public function eliminarAreasCentro($centro, $area) {
      $sql = $this->db->query("DELETE FROM tblareascentro WHERE codigocentro = '$centro' AND codigoarea = '$area'");
      return $sql;
    }
  }