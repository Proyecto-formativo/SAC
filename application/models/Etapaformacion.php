<?php 

class etapaformacion extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function mostrarEtapaFormacion(){
        $sql = $this->db->get('tbletapaformacion');
        return $sql;
    }

    public function getEtapaFormacion($codigo) {
        $this->db->where('codigo', $codigo);
        $sql = $this->db->get('tbletapaformacion');
        return $sql->row();
    }

    public function agregarEtapaFormacion($nombre) {
        $sql = $this->db->insert('tbletapaformacion', ['nombre' => $nombre]);
        return $sql;
    }

    public function editarEtapaFormacion($codigo, $nombre) {
        $this->db->set('nombre', $nombre);
        $this->db->where('codigo', $codigo);
        $sql = $this->db->update('tbletapaformacion');
        return $sql;
    }

    public function eliminarEtapaFormacion($codigo) {

      if (!$this->db->simple_query("DELETE FROM tbletapaformacion WHERE codigo = $codigo")) {
        return false;
      } 
        
      return true;
    }
}