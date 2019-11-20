<?php 

  class centro extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarCentros() {
      $sql = $this->db->get('tblcentro');
      return $sql;
    }

    public function getCentro($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblcentro');
      return $sql->row();
    }

    public function agregarCentro($codigo, $nombre) {

      if(!$this->db->insert('tblcentro', ['codigo' => $codigo, 'nombre' => $nombre])) {
        return false;
      }
      return true;
    }

    public function editarCentro($codigo, $nombre) {

      $this->db->set('nombre', $nombre);
      $this->db->where('codigo', $codigo);
      $sql = $this->db->update('tblcentro');
      return $sql;
    }

    public function eliminarCentro($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblcentro WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
  }