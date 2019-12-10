<?php 

  class programa extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarProgramas() {
      $sql = $this->db->query("SELECT p.codigo AS codigo, p.nombre AS nombre, n.nombre AS nivel, a.nombre AS area, p.proyectoformativo AS proyecto FROM tblprograma AS p INNER JOIN tblnivel AS n ON p.nivel = n.codigo INNER JOIN tblarea AS a ON p.area = a.codigo ORDER BY p.nombre");
      return $sql;
    }

    public function getPrograma($codigo) {
      $sql = $this->db->query("SELECT codigo, nombre, nivel, area, proyectoformativo FROM tblprograma WHERE codigo = $codigo");
      return $sql->row();
    }

    public function agregarPrograma($datos) {
      $sql = $this->db->insert('tblprograma', ['codigo' => $datos['codigo'], 'nombre' => $datos['nombre'], 'nivel' => $datos['nivel'], 'area' => $datos['area'], 'proyectoFormativo' => $datos['proyecto']]);
      return $sql;
    }

    public function editarPrograma($datos) {
      $this->db->set('nombre', $datos['nombre']);
      $this->db->set('nivel', $datos['nivel']);
      $this->db->set('area', $datos['area']);
      $this->db->set('proyectoformativo', $datos['proyecto']);
      $this->db->where('codigo', $datos['codigo']);
      $sql = $this->db->update('tblprograma');
      return $sql;
    }

    public function eliminarPrograma($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblprograma WHERE codigo = $codigo")) {
        return false;
      }

      return true;
    }
  }