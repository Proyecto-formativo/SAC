<?php 

class etapaproyecto extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function mostrarEtapaproyecto(){
        $sql = $this->db->get('tbletapaproyecto');
        return $sql;
    }

    public function getEtapaProyecto($codigo) {
        $this->db->where('codigo', $codigo);
        $sql = $this->db->get('tbletapaproyecto');
        return $sql->row();
    }

    public function agregarEtapaProyecto($nombre) {
        $sql = $this->db->insert('tbletapaproyecto', ['nombre' => $nombre]);
        return $sql;
    }

    public function editarEtapaProyecto($codigo, $nombre) {
        $this->db->set('nombre', $nombre);
        $this->db->where('codigo', $codigo);
        $sql = $this->db->update('tbletapaproyecto');
        return $sql;
    }

    public function eliminarEtapaProyecto($codigo) {

        if (!$this->db->simple_query("DELETE FROM tbletapaproyecto WHERE codigo = $codigo")) {
            return false;
        } 
            
        return true;
    }
}