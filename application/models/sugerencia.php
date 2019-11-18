<?php 

class sugerencia extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function MostrarSuegerencia(){
        $sql = $this->db->get('tblsugerencia');
        return $sql;
    }

    public function agregarSugerencia($nombre) {
        $sql = $this->db->insert('tblsugerencia', ['nombre' => $nombre]);

        if ($sql) {
            return true;
        }

        return false;
    }

    public function getSugerencia($codigo) {
        $this->db->where('codigo', $codigo);
        $sql = $this->db->get('tblsugerencia');
        return $sql->row();
    }

    public function editarSugerencia($codigo, $nombre) {
        $this->db->set('nombre', $nombre);
        $this->db->where('codigo', $codigo);
        
        $sql = $this->db->update('tblsugerencia');
        return $sql;
    }

    public function eliminarSugerencia($codigo) {

        if (!$this->db->simple_query("DELETE FROM tblsugerencia WHERE codigo = $codigo")) {
            return false;
        } 
        
        return true;
        
    }
}