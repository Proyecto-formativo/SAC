<?php 

class reporte extends CI_Model{
    function __construct(){
        $this->load->database();
        date_default_timezone_set('America/Bogota');
    }



    public function IngresarReporte($justificacion,$instructorReporte,$evidencia,$normasReglamentarias,$coordinador,$tipofalta,$tipoCalificcion,$sugerencia){
        $this->db->query("INSERT INTO tblreporte value(null,current_date() ,' $justificacion ',$instructorReporte,'$evidencia ',' $normasReglamentarias',$coordinador,'$tipofalta',' $tipoCalificcion',$sugerencia, 'No aprobado',null)");
    }

    public function Actualizarficha($numeroficha,$valores){
        $this->db->where('nroFicha',$numeroficha);
        $this->db->update('tblficha',$valores);
    }
    public function UltimoReporte(){
        $sql = $this->db->query("SELECT * from tblreporte order by consecutivo desc limit 1");
        return $sql->row();
    }


	/*consultas interfaz de coordinador
  */


	public function Consult_general_coor(){

		$sql = $this->db->query("SELECT af.numFicha,p.nombre,r.fecha,r.consecutivo
        FROM tblreporte AS r INNER JOIN tblaprendicesreportados AS ar 
        ON ar.consReporte=r.consecutivo 
        INNER JOIN tblaprendicesficha as af ON af.docIDAprendiz=ar.docIDAprendiz
        INNER JOIN tblficha as f ON f.nroFicha=af.numFicha
        INNER JOIN tblprograma as p ON p.codigo=f.programa 
        GROUP BY r.consecutivo ");
		return $sql;
	}

	public function Consult_especifica($consec){
		$sql=$this->db->query("SELECT r.consecutivo, area.nombre as area,r.fecha as fecha,p.nombre as programa,r.evidencia,
                                nv.nombre as nivel, af.numFicha as ficha ,su.nombre as sugerencia,
                               mu.nombre as municipio,ce.nombre as centro,se.nombre as sede
                             ,ef.nombre as 'etapa_formacion',ep.nombre as 'etapa_proyecto',
                               concat(user.nombres,' ',  user.apellidos) as 'Instructor_Reporte',
                               concat(us2.nombres,' ',  us2.apellidos) as 'Instructor_Lider',
                               r.justificacion,r.normasReglamento,r.tipoFalta,r.tipoCalificacion
                        FROM tblreporte AS r INNER JOIN tblaprendicesreportados AS ar
                                                        ON ar.consReporte=r.consecutivo
                                             INNER JOIN tblaprendicesficha as af ON af.docIDAprendiz=ar.docIDAprendiz
                                             INNER JOIN tblficha as f ON f.nroFicha=af.numFicha
                                             INNER JOIN tblprograma as p ON p.codigo=f.programa
                                             INNER JOIN tblarea as area ON p.area = area.codigo
                        
                                             INNER JOIN tblarea as areacoord ON r.docIDCoordinador=areacoord.docIDCoordinador
                                             INNER JOIN tblnivel as nv ON nv.codigo=p.nivel
                                             INNER JOIN tblmunicipio as mu ON mu.codigo=f.municipio
                                             INNER JOIN tblcentro as ce ON areacoord.centro=ce.codigo
                                             INNER JOIN tblsede as se ON se.centro=ce.codigo
                                             INNER JOIN tbletapaformacion as ef ON ef.codigo=f.etapaFormacion
                                             INNER JOIN tbletapaproyecto as ep ON ep.codigo=f.etapaProyecto
                                             INNER JOIN tblusuario as us2 ON us2.docID=f.instructorLider
                                             INNER JOIN tblusuario as user ON user.docID=r.instructorReporte
                                             INNER JOIN tblsugerencia as su ON su.codigo=r.sugerencia
                        WHERE r.consecutivo = $consec
                        GROUP BY r.consecutivo;");
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
			return "estado del Reporte ha cambiado a Aprobado";
		}else{
			return "no se pudo realizar la solicitud";
		}
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
                                WHERE a.codigo = $area AND  YEAR(r.fecha) = $year and MONTH(r.fecha) = $mouth and r.estado = 'aprobado' and r.nro_acta is null");
        if ($sql->num_rows() > 0) {
            return $sql;
        }
        return false;
    }

    public function agregarActaAreportes($acta,$consecutivo){
        $this->db->query("UPDATE tblreporte set nro_acta = '$acta' where consecutivo = $consecutivo");
    }

    public function MostrarReportePorActa($acta){
        $sql = $this->db->query("SELECT consecutivo,justificacion,normasReglamento,tipofalta,tipoCalificacion from tblreporte where nro_acta = '$acta'");
        return $sql;
    }
}
