<?php 

class reporte extends CI_Model{
    function __construct(){
        $this->load->database();
        date_default_timezone_set('America/Bogota');
    }
 


	public function IngresarReporte($justificacion,$instructorReporte,$evidencia,$normasReglamentarias,$coordinador,$tipofalta,$tipoCalificcion,$sugerencia){
		$this->db->query("INSERT INTO tblreporte value(null,current_date() ,' $justificacion ',$instructorReporte,'$evidencia ',' $normasReglamentarias',$coordinador,'$tipofalta',' $tipoCalificcion',$sugerencia, 'No aprobado',null,null)");
	}

    public function Actualizarficha($numeroficha,$valores){
        $this->db->where('nroFicha',$numeroficha);
        $this->db->update('tblficha',$valores);
    }
    public function UltimoReporte(){
        $sql = $this->db->query("SELECT * from tblreporte order by consecutivo desc limit 1");
        return $sql->row();
    }

 
    public function MostrarReporteAprobado($area){
        $year = date('Y');
        $mouth = date('m');
        $sql = $this->db->query("SELECT r.consecutivo, r.fecha, a.nombre, p.nombre 
                                FROM tblreporte AS r INNER JOIN tblusuario AS u 
                                ON r.instructorReporte = u.docID 
                                INNER JOIN tblequipoinstructor AS ei 
                                ON u.docID = ei.docIDInstructor 
                                INNER JOIN tblficha AS f 
                                ON ei.numFicha = f.nroFicha 
                                INNER JOIN tblprograma AS p 
                                ON f.programa = p.codigo 
                                INNER JOIN tblarea AS a 
                                ON p.area = a.codigo 
                                WHERE a.codigo = $area AND  YEAR(r.fecha) = $year and MONTH(r.fecha) = $mouth and r.estado = 'aprobado' and r.nro_acta is null ");
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
        return false;
    }
 
    public function MostrarReportesDelArea($area){
        $year = date('Y');
        $mouth = date('m');
        $sql = $this->db->query("SELECT r.consecutivo as consecutivo
                                FROM tblreporte AS r INNER JOIN tblusuario AS u 
                                ON r.instructorReporte = u.docID 
                                INNER JOIN tblequipoinstructor AS ei 
                                ON u.docID = ei.docIDInstructor 
                                INNER JOIN tblficha AS f 
                                ON ei.numFicha = f.nroFicha 
                                INNER JOIN tblprograma AS p 
                                ON f.programa = p.codigo 
                                INNER JOIN tblarea AS a 
                                ON p.area = a.codigo 
                                WHERE a.codigo = $area AND  YEAR(r.fecha) = $year and MONTH(r.fecha) = $mouth and r.estado = 'aprobado'  and r.nro_acta is null ");
        if ($sql->num_rows() > 0) {
            return $sql;
        }
        return false;
    }

    public function agregarActa($acta,$consecutivo){
        $this->db->query("UPDATE tblreporte set nro_acta = '$acta' where consecutivo = $consecutivo");
    }
	/*consultas interfaz de coordinador
  */



	public function Consult_general_coor($doc){

	$sql = $this->db->query("SELECT r.consecutivo, r.fecha, f.nroFicha AS numFicha, r.estado,p.nombre FROM tblreporte AS r INNER JOIN tblaprendicesreportados AS ar ON r.consecutivo = ar.consReporte INNER JOIN tblusuario AS u ON ar.docIDAprendiz = u.docID INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha INNER JOIN tblprograma AS p ON f.programa = p.codigo INNER JOIN tblarea AS a ON p.area = a.codigo WHERE a.docIDCoordinador = '$doc' GROUP BY r.consecutivo");
		return $sql;
	}
	public function Consult_aprobados($doc){

		$sql = $this->db->query("SELECT af.numFicha,p.nombre,r.fecha,r.consecutivo,r.estado
        FROM tblreporte AS r INNER JOIN tblaprendicesreportados AS ar 
        ON ar.consReporte=r.consecutivo         
        INNER JOIN tblaprendicesficha as af ON af.docIDAprendiz=ar.docIDAprendiz
        INNER JOIN tblficha as f ON f.nroFicha=af.numFicha
        INNER JOIN tblprograma as p ON p.codigo=f.programa
        INNER JOIN tblarea as area ON p.area = area.codigo
    	INNER JOIN tblarea as acor ON r.docIDCoordinador=acor.docIDCoordinador       
        WHERE acor.docIDCoordinador=$doc and r.estado='Aprobado'
        GROUP BY r.consecutivo ORDER BY r.consecutivo DESC ");
		return $sql;
	}
	public function Consult_cancelados($doc){

		$sql = $this->db->query("SELECT af.numFicha,p.nombre,r.fecha,r.consecutivo,r.estado
        FROM tblreporte AS r INNER JOIN tblaprendicesreportados AS ar 
        ON ar.consReporte=r.consecutivo         
        INNER JOIN tblaprendicesficha as af ON af.docIDAprendiz=ar.docIDAprendiz
        INNER JOIN tblficha as f ON f.nroFicha=af.numFicha
        INNER JOIN tblprograma as p ON p.codigo=f.programa
        INNER JOIN tblarea as area ON p.area = area.codigo
    	INNER JOIN tblarea as acor ON r.docIDCoordinador=acor.docIDCoordinador       
        WHERE acor.docIDCoordinador=$doc  and r.estado='No aprobado'
        GROUP BY r.consecutivo ORDER BY r.consecutivo DESC ");
		return $sql;
	}

    public function Consult_especifica($consec){
		$sql=$this->db->query("SELECT af.numFicha as ficha,p.nombre as programa,r.fecha,r.consecutivo,r.estado,r.evidencia,
		se.nombre as sede, area.nombre as area,ce.nombre as centro, nv.nombre as nivel
         ,su.nombre as sugerencia, mu.nombre as municipio ,ef.nombre as 'etapa_formacion',
         ep.nombre as 'etapa_proyecto', user.correoCorporativo as mailpro,r.observaciones,concat(user.nombres,' ',  user.apellidos) as 
         'Instructor_Reporte', concat(us2.nombres,' ',  us2.apellidos) as 'Instructor_Lider',
         r.justificacion,r.normasReglamento,r.tipoFalta,r.tipoCalificacion
		
        
        FROM tblreporte AS r INNER JOIN tblaprendicesreportados AS ar 
        ON ar.consReporte=r.consecutivo         
        INNER JOIN tblaprendicesficha as af ON af.docIDAprendiz=ar.docIDAprendiz
        INNER JOIN tblficha as f ON f.nroFicha=af.numFicha
        INNER JOIN tblprograma as p ON p.codigo=f.programa
        INNER JOIN tblsede as se ON se.codigo=f.sede
        INNER JOIN tblarea as area ON area.codigo=p.area
        INNER JOIN tblcentro as ce ON ce.codigo=se.centro
        INNER JOIN tblnivel as nv ON nv.codigo=p.nivel
        INNER JOIN tblsugerencia as su ON su.codigo=r.sugerencia
        INNER JOIN tblmunicipio as mu ON mu.codigo=se.municipio
        INNER JOIN tbletapaformacion as ef ON ef.codigo=f.etapaFormacion
        INNER JOIN tbletapaproyecto as ep ON ep.codigo=f.etapaProyecto
        INNER JOIN tblusuario as us2 ON us2.docID=f.instructorLider
        INNER JOIN tblusuario as user ON user.docID=r.instructorReporte
        WHERE r.consecutivo=$consec
        GROUP BY r.consecutivo");
		return $sql->result_object();
	}


	public function getNumReportes(){
		$sql=$this->db->query("SELECT consecutivo from tblreporte");

		return $sql->num_rows();
	}

	//peticion a la base de dato
	public  function aprobarRep($consec){
		$query=$this->db->query("UPDATE `tblreporte` SET `estado` = 'Aprobado' WHERE `tblreporte`.`consecutivo` =$consec ");
		if ($query){
			return "Aprobacion Exitosa ";
		}else{
			return "No se pudo realizar la solicitud";
		}
    }
    



    public function agregarActaAreportes($acta,$consecutivo){
        $this->db->query("UPDATE tblreporte set nro_acta = '$acta' where consecutivo = $consecutivo");
    }

    public function MostrarReportePorActa($acta){
        $sql = $this->db->query("SELECT consecutivo,justificacion,normasReglamento,tipofalta,tipoCalificacion from tblreporte where nro_acta = '$acta'");
        return $sql;
    }
	


	public function equipoInstructores($ficha){
		$sql=$this->db->query("SELECT concat(u.nombres,' ',  u.apellidos) as nombre from tblusuario as u
        inner join tblequipoinstructor t on u.docID = t.docIDInstructor where numFicha=$ficha");
		return $sql;
	}


	public function nombreCordi($ficha){
		$sql=$this->db->query("SELECT concat(u.nombres,' ', u.apellidos)as cordi, p.proyectoFormativo as pf from tblusuario as u inner join tblarea as a 
        on u.docID=a.docIDCoordinador inner join tblprograma as p on p.area=a.codigo inner JOIN tblficha
        as f on f.programa=p.codigo where f.nroFicha=$ficha");
		return $sql->result_object();
	}

   //agregar observaciones al reporte en el perfil Coordinador
   public function agregar_observacion($reporte,$observaciones){
    $this->db->query("UPDATE tblreporte SET observaciones='$observaciones' WHERE consecutivo=$reporte");
    return;
    }
}
