<?php

  class nivel extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarNiveles() {
      $this->db->order_by('nombre');
      $sql = $this->db->get('tblnivel');
      return $sql;
    }

    public function getNivel($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblnivel');
      return $sql->row();
    }

    public function agregarNivel($nombre) {
      $sql = $this->db->insert('tblnivel', ['nombre' => $nombre]);
      return $sql;
    }

    public function editarNivel($codigo, $nombre) {
      $this->db->set('nombre', $nombre);
      $this->db->where('codigo', $codigo);
      $sql = $this->db->update('tblnivel');
      return $sql;
    }

    public function eliminarNivel($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblnivel WHERE codigo = $codigo")) {
        return false;
      }

      return true;
    }

    
  }