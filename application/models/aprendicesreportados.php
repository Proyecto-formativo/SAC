<?php 

class aprendicesreportados extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function IngresarAprencides($consecutivo,$aprendiz){
        $sql = $this->db->insert('tblaprendicesreportados',['consReporte'=>$consecutivo,'docIDAprendiz' =>$aprendiz]);
    } 


    public function MostrarAprendicesPorReporte($consecutivoReporte){
        $sql = $this->db->query("SELECT  ar.consecutivoAprendizReporte,ar.consReporte,u.docID,u.nombres,f.nroficha as ficha,p.nombre from tblaprendicesreportados as ar 
        inner join tblusuario as u 
        on ar.docIDAprendiz = u.docID 
        inner join tblaprendicesficha as af
        on af.docIDAprendiz = u.docID
        inner join tblficha as f
        on f.nroficha = af.numficha
        inner join tblprograma as p
        on f.programa = p.codigo
        where consReporte = $consecutivoReporte");
        
        return $sql->result();
    }
}