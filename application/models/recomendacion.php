<?php 

  class recomendacion extends CI_Model {

    function __construct() {
      $this->load->database();
    }

    public function mostrarRecomendaciones() {

      $sql = $this->db->get('tblrecomendacion');
      return $sql;

    }

    public function getRecomendacion($codigo) {
      $this->db->where('codigo', $codigo);
      $sql = $this->db->get('tblrecomendacion');
      return $sql->row();
    }

    public function agregarRecomendacion($nombre) {

      $sql = $this->db->insert('tblrecomendacion', ['nombre' => $nombre]);

      if ($sql) {
        return true;
      } 

      return false;
    }

    public function editarRecomendacion($codigo, $nombre) {

      $this->db->set('nombre', $nombre);
      $this->db->where('codigo', $codigo);

      $sql = $this->db->update('tblrecomendacion');

      return $sql;
    }

    public function eliminarRecomendacion($codigo) {

      if (!$this->db->simple_query("DELETE FROM tblrecomendacion WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
  }
?>