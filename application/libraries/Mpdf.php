<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 // require_once('mpdf/mpdf.php');
// echo APPPATH.'third_party/mpdf/mpdf.php';


class Mpdf  
{
	public function __construct()
	{

	    $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');

        // include_once APPPATH.'/third_party/mpdf/mpdf.php';
        // $param = '"c","A4-L","","",10,10,10,10,6,3';   
        // return new cmPDF($param);
	}
	function load($param=NULL)
    {
       
        // include_once APPPATH.'/mpdf/mpdf.php';
        
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"c","A4-L","","",10,10,10,10,6,3';   
            // $param = "'en-GB-x','', 0, '', 0, 0, 0, 0, 0, 0";

            // $param = '"en-GB-x","A4","","",10,10,10,10,6,3';                
        }

         
        return new mPDF($param);
        // return new mPDF();
    }
}


?>