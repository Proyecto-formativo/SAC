<?php 
  class municipio extends CI_Model {

    function __construct() {
      $this->load->database();
    }

    public function mostrarMunicipios() {
      $sql = $this->db->get('tblmunicipio');
      return $sql;
    }

    public function getMunicipio($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblmunicipio');
      return $sql->row();
    }

    public function agregarMunicipio($codigo, $nombre) {

      if (!$this->db->insert('tblmunicipio', ['codigo' => $codigo, 'nombre' => $nombre])) {
        return false;
      }
      
      return true;
    }

    public function editarMunicipio($codigo, $nombre) {

      $this->db->set('nombre', $nombre);
      $this->db->where('codigo', $codigo);

      $sql = $this->db->update('tblmunicipio');

      return $sql;

    }

    public function eliminarMunicipio($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblmunicipio WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
  }
?>