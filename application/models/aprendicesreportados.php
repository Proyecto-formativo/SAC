<?php 

class aprendicesreportados extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function IngresarAprencides($consecutivo,$aprendiz){
        $sql = $this->db->insert('tblaprendicesreportados',['consReporte'=>$consecutivo,'docIDAprendiz' =>$aprendiz]);
    }


	public function mostrarAprendicesReporte($consec){
		$sql = $this->db->query("SELECT a.consecutivoAprendizReporte, u.docID, u.nombres,u.apellidos,u.correoPersonal,u.correoCorporativo,u.telefonoMovil,u.telefonoFijo 
FROM tblusuario as u INNER JOIN tblaprendicesreportados as a 
ON u.docID=a.docIDAprendiz INNER JOIN tblreporte as r 
ON r.consecutivo=a.consReporte WHERE r.consecutivo=$consec");

		return $sql->result_object();
	}

	public function getFilasAp($consec)
	{

		$sql=$this->db->query("SELECT a.consecutivoAprendizReporte FROM tblusuario as u INNER JOIN tblaprendicesreportados as a
ON u.docID=a.docIDAprendiz INNER JOIN tblreporte as r
ON r.consecutivo=a.consReporte WHERE r.consecutivo=$consec");

		return $sql->num_rows();

	}

}
