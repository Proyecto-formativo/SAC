<?php 

  class sede extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarSedes() {
      $sql = $this->db->query('SELECT s.codigo AS codigo, s.nombre AS nombre, c.nombre AS centro, m.nombre AS municipio FROM tblsede AS s INNER JOIN tblcentro AS c ON s.centro = c.codigo INNER JOIN tblmunicipio AS m ON s.municipio = m.codigo ORDER BY s.nombre');
      return $sql;
    }

    public function getSede($codigo) {
      $sql = $this->db->query("SELECT s.codigo AS codigo, s.nombre AS nombre, c.nombre AS centro, c.codigo AS codigo_centro, m.codigo AS codigo_municipio FROM tblsede AS s INNER JOIN tblcentro AS c ON s.centro = c.codigo INNER JOIN tblmunicipio AS m ON s.municipio = m.codigo WHERE s.codigo = $codigo");
      return $sql->row();
    }

    public function agregarSede($datos) {
      $sql = $this->db->insert('tblsede', ['codigo' => $datos['codigo_sede'], 'nombre' => $datos['nombre'], 'centro' => $datos['codigo_centro'], 'municipio' => $datos['municipio']]);
      return $sql;
    }

    public function editarSede($datos) {
      $this->db->set('nombre', $datos['nombre']);
      $this->db->set('centro', $datos['codigo_centro']);
      $this->db->set('municipio', $datos['municipio']);
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