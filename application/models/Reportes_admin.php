<?php 
  class reportes_admin extends CI_Model {
    function __construct() {
      $this->load->database();
    }

    //Consulta Aprendices Citados por fecha
    public function apr_cit_fecha ($fecha_inicial, $fecha_final) {
      $sql = $this->db->query("SELECT ar.consReporte ,ar.documento, ar.aprendiz, ir.fecha, ar.programa, ar.ficha, ar.municipio, ar.area, ir.instructor, ar.recomendacion

      FROM 

      (SELECT r.consecutivo AS consReporte, r.fecha AS fecha, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS instructor FROM tblreporte AS r INNER JOIN tblusuario AS u ON r.instructorReporte = u.docID) AS ir

      INNER JOIN 

      (SELECT ar.consReporte AS consReporte, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS aprendiz, f.nroFicha AS ficha, p.nombre AS programa, m.nombre AS municipio, a.nombre AS area, r.nombre AS recomendacion FROM tblrecomendacion AS r INNER JOIN tblreporteseguimientoaprendiz AS rsa ON r.codigo = rsa.recomendacion INNER JOIN tblaprendicesreportados AS ar ON rsa.consAprendizReporte = ar.consecutivoAprendizReporte INNER JOIN tblusuario AS u ON ar.docIDAprendiz = u.docID INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha INNER JOIN tblmunicipio AS m ON f.municipio = m.codigo INNER JOIN tblprograma AS p ON f.programa = p.codigo INNER JOIN tblarea AS a ON p.area = a.codigo) AS ar

      ON ir.consReporte = ar.consReporte

      WHERE ir.fecha BETWEEN '$fecha_inicial' AND '$fecha_final'

      ORDER BY ar.consReporte");

      return $sql;
      
    }

    //Consulta Aprendices citados por area
    public function apr_cit_area ($area) {
      $sql = $this->db->query("SELECT ar.consReporte ,ar.documento, ar.aprendiz, ir.fecha, ar.programa, ar.ficha, ar.municipio, ar.area, ir.instructor, ar.recomendacion

      FROM 

      (SELECT r.consecutivo AS consReporte, r.fecha AS fecha, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS instructor FROM tblreporte AS r INNER JOIN tblusuario AS u ON r.instructorReporte = u.docID) AS ir

      INNER JOIN 

      (SELECT ar.consReporte AS consReporte, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS aprendiz, f.nroFicha AS ficha, p.nombre AS programa, m.nombre AS municipio, a.nombre AS area, r.nombre AS recomendacion FROM tblrecomendacion AS r INNER JOIN tblreporteseguimientoaprendiz AS rsa ON r.codigo = rsa.recomendacion INNER JOIN tblaprendicesreportados AS ar ON rsa.consAprendizReporte = ar.consecutivoAprendizReporte INNER JOIN tblusuario AS u ON ar.docIDAprendiz = u.docID INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha INNER JOIN tblmunicipio AS m ON f.municipio = m.codigo INNER JOIN tblprograma AS p ON f.programa = p.codigo INNER JOIN tblarea AS a ON p.area = a.codigo) AS ar

      ON ir.consReporte = ar.consReporte

      WHERE ar.area LIKE '%$area%'

      ORDER BY ar.consReporte");

      return $sql;
      
    }

    //Consulta cantidad de citaciones realizadas por instructor
    public function cant_ci_inst() {
      $sql = $this->db->query("SELECT COUNT(r.consecutivo) AS cantidad_citaciones, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS instructor, (SELECT YEAR(current_date())) AS cur_year FROM tblreporte AS r INNER JOIN tblusuario AS u ON r.instructorReporte = u.docID WHERE YEAR(r.fecha) = (SELECT YEAR(current_date())) GROUP BY u.docID ORDER BY COUNT(r.consecutivo) DESC");
      return $sql;
    }

    //Consulta cantidad aprendices citados por centro
    public function cant_ci_centro() {
      $sql = $this->db->query("SELECT COUNT(u.docID) AS cantidad_citaciones, c.nombre AS centro, (SELECT YEAR(current_date())) AS cur_year FROM tblrecomendacion AS r INNER JOIN tblreporteseguimientoaprendiz AS rsa ON r.codigo = rsa.recomendacion INNER JOIN tblaprendicesreportados AS ar ON rsa.consAprendizReporte = ar.consecutivoAprendizReporte INNER JOIN tblusuario AS u ON ar.docIDAprendiz = u.docID INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha INNER JOIN tblmunicipio AS m ON f.municipio = m.codigo INNER JOIN tblprograma AS p ON f.programa = p.codigo INNER JOIN tblarea AS a ON p.area = a.codigo INNER JOIN tblcentro AS c ON a.centro = c.codigo INNER JOIN tblreporte AS re ON ar.consReporte = re.consecutivo WHERE YEAR(re.fecha) = (SELECT YEAR(current_date())) GROUP BY c.nombre");
      return $sql;
    }

    //Aprendices citados
    public function aprendices_citados() {
      $sql = $this->db->query("SELECT ar.consReporte ,ar.documento, ar.aprendiz, ir.fecha, ar.programa, ar.ficha, ar.municipio, ar.area, ir.instructor, ar.recomendacion

      FROM 

      (SELECT r.consecutivo AS consReporte, r.fecha AS fecha, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS instructor FROM tblreporte AS r INNER JOIN tblusuario AS u ON r.instructorReporte = u.docID) AS ir

      INNER JOIN 

      (SELECT ar.consReporte AS consReporte, u.docID AS documento, CONCAT(u.nombres, ' ', u.apellidos) AS aprendiz, f.nroFicha AS ficha, p.nombre AS programa, m.nombre AS municipio, a.nombre AS area, r.nombre AS recomendacion FROM tblrecomendacion AS r INNER JOIN tblreporteseguimientoaprendiz AS rsa ON r.codigo = rsa.recomendacion INNER JOIN tblaprendicesreportados AS ar ON rsa.consAprendizReporte = ar.consecutivoAprendizReporte INNER JOIN tblusuario AS u ON ar.docIDAprendiz = u.docID INNER JOIN tblaprendicesficha AS af ON u.docID = af.docIDAprendiz INNER JOIN tblficha AS f ON af.numFicha = f.nroFicha INNER JOIN tblmunicipio AS m ON f.municipio = m.codigo INNER JOIN tblprograma AS p ON f.programa = p.codigo INNER JOIN tblarea AS a ON p.area = a.codigo) AS ar

      ON ir.consReporte = ar.consReporte

      ORDER BY ar.consReporte	;");
      return $sql;
    }
  }