<?php 
  class area extends CI_Model {

    function __construct() {
      $this->load->database();
    }

    public function mostrarAreas() {
      $sql = $this->db->query("SELECT a.codigo AS codigo, a.nombre AS nombre, c.nombre AS centro, CONCAT(u.nombres, ' ', u.apellidos) AS coordinador FROM tblarea AS a INNER JOIN tblcentro AS c ON a.centro = c.codigo INNER JOIN tblusuario AS u ON a.docIDCoordinador = u.docID ORDER BY a.nombre");
      return $sql;
    }

    public function getArea($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblarea');
      return $sql->row();
    }

    public function agregarArea($datos) {
      $sql = $this->db->insert('tblarea', ['codigo' => $datos['codigo_area'], 'nombre' => $datos['nombre'], 'centro' => $datos['codigo_centro'], 'docIDCoordinador' => $datos['docid_coordinador']]);
      return $sql;
    }

    public function editarArea($datos) {
      $this->db->set('nombre', $datos['nombre']);
      $this->db->set('centro', $datos['codigo_centro']);
      $this->db->set('docIDCoordinador', $datos['docid_coordinador']);
      $this->db->where('codigo', $datos['codigo_area']);
      $sql = $this->db->update('tblarea');
      return $sql;
    }

    public function eliminarArea($codigo) {
      
      if (!$this->db->simple_query("DELETE FROM tblarea WHERE codigo = $codigo")) {
        return false;
      }

      return true;
    }


  }