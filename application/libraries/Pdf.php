<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

use Dompdf\Dompdf;

use Dompdf\Options;

class Pdf{ 

	public function __construct(){

		require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
		$options = new Options();

		$options->set('isRemoteEnabled', TRUE); 
		$options->set('enable_html5_parser', TRUE); 

		$pdf = new DOMPDF($options); 

		$CI = & get_instance();

		$CI->dompdf = $pdf; 

	} 

} ?>