<?php 

class ficha extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function mostrarficha($numeroficha){
        $sql = $this->db->query("SELECT fc.nroficha,a.nombre as area,concat(uc.nombres,' ',uc.apellidos) as NombreCoordinador,uc.docID as CodigoCoordinador, p.nombre as programa,p.codigo as 'codigoprograma',p.proyectoFormativo as 'proformativo',n.nombre as nivel, m.nombre as municipio,fc.horaInicio as horai,fc.horaFin as horaf,etaF.nombre as etaformacion,etaP.nombre as etapaproyecto,concat (u.nombres,' ',u.apellidos) as lider from tblficha as fc
        inner join tblprograma as p
        on fc.programa = p.codigo
        inner join tblarea as a
        on p.area = a.codigo
        inner join tblmunicipio as m
        on fc.municipio = m.codigo
        inner join tbletapaProyecto as etaP
        on fc.etapaproyecto = etaP.codigo
        inner join tbletapaformacion as etaF
        on fc.etapaformacion = etaF.codigo
        inner join tblusuario as u
        on u.docID = fc.instructorLider
        inner join tblnivel as n
        on n.codigo = p.nivel
        inner join tblusuario as uc
        on a.docIDCoordinador = uc.docID
        where fc.nroficha = '$numeroficha'
        limit 1");

        if ($sql->result()) {
            return $sql->row();
        }
        return false;
    }

    public function Actualizarficha($numeroficha,$valores){
        $this->db->where('nroFicha',$numeroficha);
        $this->db->update('tblficha',$valores);
    }
}