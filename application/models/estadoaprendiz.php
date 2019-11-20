<?php 

  class estadoaprendiz extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarEstadoAprendices() {
      $sql = $this->db->get('tblestadoaprendiz');
      return $sql;
    }

    public function getEstadoAprendiz($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblestadoaprendiz');
      return $sql->row();
    }

    public function agregarEstadoAprendiz($nombre) {
      $sql = $this->db->insert('tblestadoaprendiz', ['nombre' => $nombre]);
      return $sql;
    }

    public function editarEstadoAprendiz($codigo, $nombre) {
      $this->db->set('nombre', $nombre);
      $this->db->where('codigo', $codigo);
      $sql = $this->db->update('tblestadoaprendiz');
      return $sql;
    }

    public function eliminarEstadoAprendiz($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblestadoaprendiz WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
  }