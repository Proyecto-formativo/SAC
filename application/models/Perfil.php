<?php

  class perfil extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    public function mostrarPerfiles() {
      $this->db->order_by('nombre');
      $sql = $this->db->get('tblperfil');
      return $sql;
    }
  }