<?php
error_reporting(0);
//include_once('../sessioncheck.php');
//$username = $_SESSION['username'];
//$quatation_id = $_GET['quatation_id'];
 /* header("Content-Disposition: attachment;Filename=Quotation_$quatation_id.doc");    
  header("Content-type: application/vnd.ms-word");*/

include_once('../config.php');

$generated_key = $_GET['generated_key'];

$sql1 = "SELECT * from  tbl_purchase_order where generated_key = '$generated_key'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);
$order_date = $row1['order_date'];
$vendor_id = $row1['vendor_id'];
$site_id = $row1['site_id'];
$po_no = $row1['po_no'];

$sql4 = "SELECT * from  tbl_site  where site_id= '$site_id';";
$result4 = mysql_query($sql4);
$row4 = mysql_fetch_array($result4);
$site_name = $row4['site_name'];
$site_address = $row4['site_address'];

$sql2 = "SELECT * from  tbl_vendor_detail where vendor_id = '$vendor_id'";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($result2);
$vendor_firm_name = $row2['vendor_firm_name'];
$vendor_address = $row2['address'];

$array_date1 = explode("-", $order_date);
$new_order_date = $array_date1[2]."-".$array_date1[1]."-".$array_date1[0];
$date = date('d-m-y'); 
$html = "
<style>
.table{
    border-left: thin solid;
    border-right: thin solid;
    border-bottom: thin solid #000000;
    border-top: thin solid;
}

.table{
    margin-top: 10px;
    margin-bottom: 10px;
    border-collapse: collapse;
}

table tr {
    border-bottom: 1px solid black;
}
table td {
    border: 1px solid black;
}

table tr:last-child { 
    border-bottom: none; 
}
</style>
<h2 style='text-align:center; text-decoration:underline'></h2>

<table style='border:1px solid black !important; width:100%;'>
<tr>
	<td style='border: 1px solid black; width:50%;text-align:center;'><strong>Purchase Order</strong></td>
</tr>
</table>
<br>
<table style='border:0px !important; width:100%;'>
<tr>
	<td style='border: 0px; width:25%;text-align:left;'><strong>Company Phone</strong></td>
	<td style='border: 0px; width:45%;text-align:left;'>: 020-65349349/7755971250</td>
	<td style='border: 0px; width:15%;text-align:right;'><strong>Dated As</strong></td>
	<td style='border: 0px; width:15%;text-align:right;'>: $new_order_date</td>
</tr>
<tr>
	<td style='border: 0px; width:25%;text-align:left;'><strong>Website</strong></td>
	<td style='border: 0px; width:35%;text-align:left;'>: www.forcetechnologies.in</td>
	<td style='border: 0px; width:25%;text-align:right;'><strong></strong></td>
	<td style='border: 0px; width:15%;text-align:right;'></td>
</tr>
<tr>
	<td style='border: 0px; width:25%;text-align:left;'><strong>Email</strong></td>
	<td style='border: 0px; width:45%;text-align:left;'>: sales@forcetechnologies.in</td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:25%;text-align:left;'><strong>Company Address</strong></td>
	<td style='border: 0px; width:45%;text-align:left;'>: 5/4,Muktai Prestige ,Raikar Nagar,</td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:25%;text-align:left;'><strong></strong></td>
	<td style='border: 0px; width:45%;text-align:left;'>  Above Hotel Murali Pure Veg, Dhayari,Pune 411041</td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:25%;text-align:left;'><strong>State</strong></td>
	<td style='border: 0px; width:45%;text-align:left;'>: Maharashtra</td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
	<td style='border: 0px; width:15%;text-align:left;'><strong></strong></td>
</tr>
</table>
<br>
<table style='border:0px !important; width:100%;'>
<tr>
	<td style='border: 0px; width:40%;text-align:left;'><strong>To:</strong></td>
	<td style='border: 0px; width:40%;text-align:left;'><strong>Ship To:</strong></td>
	<td style='border: 0px; width:20%;text-align:left;'><strong>P.O.NUMBER:</strong></td>
</tr>
<tr>
	<td style='border: 0px; width:40%;text-align:left;font-size:12px;'>$vendor_firm_name</td>
	<td style='border: 0px; width:40%;text-align:left;font-size:12px;'>$site_name</td>
	<td style='border: 0px; width:20%;text-align:left;font-size:12px;'> FT0$po_no<strong></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:40%;text-align:left;font-size:12px;'>$vendor_address</td>
	<td style='border: 0px; width:40%;text-align:left;font-size:12px;'>$site_address</td>
	<td style='border: 0px; width:20%;text-align:left;font-size:12px;'><strong></strong></td>
</tr>
</table>
<br>
<h3 style='text-align:center; text-decoration:underline'><u>Purchase Order Detail</u></h3>
<table class='table'>
<tr style='background:#c3c3c3;'>
	<td style='border:1px solid black; width:10%'><strong> Sr.No.</strong></td>
	<td style='border:1px solid black; width:30%'><strong> QTY</strong></td>
	<td style='border:1px solid black; width:30%'><strong> Unit</strong></td>
	<td style='border:1px solid black; width:30%'><strong> Description</strong></td>
</tr>
	";
	$i = 1;
	$sql = "SELECT * from  tbl_purchase_order where generated_key = '$generated_key'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$material_name = $row['material_name'];
		$quantity = $row['quantity'];
		$sql1 = "SELECT * from  tbl_material_detail where material_type = '$material_name'";
		$result1 = mysql_query($sql1);
		$row1 = mysql_fetch_array($result1);
		$material_unit = $row1['material_unit'];
		
	$html .="
<tr>
	<td style='font-weight:bold;text-align:center; width:10%'>$i</td>
	<td style='text-align:left;width:30%'>  $quantity</td>
	<td style='text-align:left;width:30%'>  $material_unit</td>
	<td style='text-align:left;width:30%'>  $material_name</td>
</tr>
	";
		$i++;
	}
	$html .="
</table>
<br>
";
//==============================================================
//==============================================================
//==============================================================
include("mpdf.php");

$mpdf=new mPDF('utf-8', 'A4', '', '', '15', '15', '40', '40'); 
$mpdf->SetHTMLHeader('<img src="header.png"/>');
//$mpdf->setFooter('{PAGENO}');

$mpdf->SetHTMLFooter('<p align="right">Page {PAGENO} of {nb}</p><img src="footer.png"/>');

//$mpdf->setFooter("");

//$mpdf->setAutoTopMargin = 'stretch';
//$mpdf->SetFooter('Document Title|Center Text|{PAGENO}');

$mpdf->WriteHTML($html);

$mpdf->Output('PO'.$po_no.'-'.$date.'.pdf','D');

exit;

//==============================================================
//==============================================================
//==============================================================

?>