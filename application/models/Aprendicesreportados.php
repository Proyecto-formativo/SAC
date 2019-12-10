<?php 

class aprendicesreportados extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function IngresarAprencides($consecutivo,$aprendiz){

    $sql = $this->db->insert('tblaprendicesreportados',['consReporte'=>$consecutivo,'docIDAprendiz' =>$aprendiz]);
    }


	public function mostrarAprendicesReporte($consec){
		$sql = $this->db->query("SELECT a.consecutivoAprendizReporte, u.docID, u.nombres,u.apellidos,u.correoPersonal,u.correoCorporativo,u.telefonoMovil,
        u.telefonoFijo,a.citacion
        FROM tblusuario as u INNER JOIN tblaprendicesreportados as a 
        ON u.docID=a.docIDAprendiz INNER JOIN tblreporte as r 
        ON r.consecutivo=a.consReporte WHERE r.consecutivo=$consec");

		return $sql->result_object();
	}

	public function getFilasAp($consec){

		$sql=$this->db->query("SELECT a.consecutivoAprendizReporte FROM tblusuario as u INNER JOIN tblaprendicesreportados as a
        ON u.docID=a.docIDAprendiz INNER JOIN tblreporte as r
        ON r.consecutivo=a.consReporte WHERE r.consecutivo=$consec");

		return $sql->num_rows();

	}


        


    public function MostrarAprendicesPorReporte($consecutivoReporte){
        $sql = $this->db->query("SELECT   ar.consecutivoAprendizReporte,ar.consReporte,u.docID,CONCAT(u.nombres,' ',u.apellidos) as aprendiz,f.nroficha as ficha,p.nombre,uru.nombres as instructor from tblaprendicesreportados as ar 
        inner join tblusuario as u 
        on ar.docIDAprendiz = u.docID 
        inner join tblaprendicesficha as af
        on af.docIDAprendiz = u.docID
        inner join tblficha as f
        on f.nroficha = af.numficha
        inner join tblprograma as p
        on f.programa = p.codigo
        inner join tblreporte as r
        on r.consecutivo = ar.consReporte
        inner join tblusuario as uru
        on uru.docId = r.instructorReporte
        where consReporte = $consecutivoReporte");
        
        return $sql->result();
        
    }

    public  function citarAprendiz($consec){
        $query=$this->db->query("UPDATE `tblaprendicesreportados` SET `citacion` = '2' WHERE consecutivoAprendizReporte =$consec ");

        if ($query){
            return "Aprobacion Exitosa ";
        }else{
            return "No se pudo realizar la solicitud";
        }
    }
}


