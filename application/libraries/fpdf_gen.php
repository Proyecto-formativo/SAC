<?php
if (!defined('BASEPATH')) exit('No direct scripts access allowed');
class fpdf_gen{
    public function __construct(){
        require_once APPPATH. 'third_party/fpdf/fpdf.php';

        $pdf = new FPDF();
        $pdf->addPage();

        $CI=& get_instance();
        $CI->fpdf=$pdf;
    } 
}
