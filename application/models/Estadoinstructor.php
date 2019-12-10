<?php 

  class estadoinstructor extends CI_Model {

    function __construct() {
      $this->load->database();
    }

    public function mostrarEstadoInstructores() {
      $sql = $this->db->get('tblestadoinstructor');
      return $sql;
    }

    public function getEstadoInstructor($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblestadoinstructor');
      return $sql->row();
    }

    public function agregarEstadoInstructor($nombre) {
      $sql = $this->db->insert('tblestadoinstructor', ['nombre' => $nombre]);
      return $sql;
    }

    public function editarEstadoInstructor($codigo, $nombre) {
      $this->db->set('nombre', $nombre);
      $this->db->where('codigo', $codigo);
      $sql = $this->db->update('tblestadoinstructor');
      return $sql;
    }

    public function eliminarEstadoInstructor($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblestadoinstructor WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
  }