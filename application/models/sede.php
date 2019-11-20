<?php 

  class sede extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarSedes() {
      $sql = $this->db->query('SELECT s.codigo AS codigo, s.nombre AS nombre, c.nombre AS centro FROM tblsede AS s INNER JOIN tblcentro AS c ON s.centro = c.codigo ORDER BY s.nombre');
      return $sql;
    }

    public function getSede($codigo) {
      $sql = $this->db->query("SELECT s.codigo AS codigo, s.nombre AS nombre, c.nombre AS centro, c.codigo AS codigo_centro FROM tblsede AS s INNER JOIN tblcentro AS c ON s.centro = c.codigo WHERE s.codigo = $codigo");
      return $sql->row();
    }

    public function agregarSede($datos) {
      $sql = $this->db->insert('tblsede', ['codigo' => $datos['codigo_sede'], 'nombre' => $datos['nombre'], 'centro' => $datos['codigo_centro']]);
      return $sql;
    }

    public function editarSede($datos) {
      $this->db->set('nombre', $datos['nombre']);
      $this->db->set('centro', $datos['codigo_centro']);
      $this->db->where('codigo', $datos['codigo_sede']);
      $sql = $this->db->update('tblsede');
      return $sql;
    }

    public function eliminarSede($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblsede WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
  }