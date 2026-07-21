MACHINE MAKE<?php
error_reporting(0);
//include_once('../sessioncheck.php');
//$username = $_SESSION['username'];
$quatation_id = $_GET['quatation_id'];
 /* header("Content-Disposition: attachment;Filename=Quotation_$quatation_id.doc");    
  header("Content-type: application/vnd.ms-word");*/

include_once('../config.php');

$sql = "SELECT * from tbl_quatation where quatation_id = '$quatation_id' ";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$quatation_no = $row['quatation_no'];
$quatation_edition = $row['quatation_edition'];
$ard_device = $row['ard_device'];
$pwd_amt = $row['pwd_amt'];
$overload_device = $row['overload_device'];
$power_backup = $row['power_backup'];

$quatation_date = $row['quatation_date'];
$array_date1 = explode("-", $quatation_date);
$new_quatation_date = $array_date1[2]."-".$array_date1[1]."-".$array_date1[0];

$lead_id = $row['lead_id'];

$sql5 = "SELECT * from  tbl_new_leads where lead_id = '$lead_id'";
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_array($result5);
$customer_name = $row5['salutations']."".$row5['customer_name'];
$site_name = $row5['site_name'];
$contact_number = $row5['contact_no'];
$site_address = $row5['site_address'];


/*$customer_id = $row['customer_id'];
$sql3 = "SELECT * from  tbl_customer where customer_id = '$customer_id'";
$result3 = mysql_query($sql3);
$row3 = mysql_fetch_array($result3);
$customer_name = $row3['customer_name'];
$contact_number = $row3['contact_number'];

$site_id = $row['site_id'];
$sql1 = "SELECT * from  tbl_site where site_id = '$site_id'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);
$site_name = $row1['site_name'];
$site_address = $row1['site_address'];*/

$lift_type_id = $row['lift_type'];
$sql2 = "SELECT * from  tbl_lift_type where lift_type_id = '$lift_type_id'";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($result2);
$lift_type = $row2['lift_type'];

$capacity = $row['capacity'];
$speed = $row['speed'];
$car_travel = $row['car_travel'];
$no_of_stops = $row['no_of_stops'];
$no_of_openings = $row['no_of_openings'];

$cabin_type_id = $row['cabin_type'];
$sql4 = "SELECT * from  tbl_cabin_type where cabin_type_id = '$cabin_type_id'";
$result4 = mysql_query($sql4);
$row4 = mysql_fetch_array($result4);
$cabin_type = $row4['cabin_type'];

$flooring_id = $row['cabin_flooring'];
$sql5 = "SELECT * from  tbl_cabin_flooring where flooring_id = '$flooring_id'";
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_array($result5);
$flooring_name  = $row5['flooring_name'];

$ceiling_id = $row['cabin_ceiling'];
$sql6 = "SELECT * from  tbl_cabin_ceiling where ceiling_id = '$ceiling_id'";
$result6 = mysql_query($sql6);
$row6 = mysql_fetch_array($result6);
$ceiling_name = $row6['ceiling_name'];

$air_system_id = $row['cabin_air_system'];
$sql7 = "SELECT * from  tbl_air_system where air_system_id = '$air_system_id'";
$result7 = mysql_query($sql7);
$row7 = mysql_fetch_array($result7);
$air_system_name = $row7['air_system_name'];

$car_door_id = $row['car_enterance'];
$sql8 = "SELECT * from  tbl_car_door_type where car_door_id = '$car_door_id'";
$result8 = mysql_query($sql8);
$row8 = mysql_fetch_array($result8);
$car_enterance1 = $row8['car_door_type'];
$car_enterance = $car_enterance1."";

$door_type_id = $row['landing_enterance'];
$sql9 = "SELECT * from  tbl_landing_door_type where door_type_id = '$door_type_id'";
$result9 = mysql_query($sql9);
$row9 = mysql_fetch_array($result9);
$landing_enterance1 = $row9['door_type'];
$landing_enterance = $landing_enterance1."s";

$light_fitting = $row['light_fitting'];
$car_flatform = $row['car_flatform'];
$shafts_width = $row['shafts_width'];
$shafts_depth = $row['shafts_depth'];
$req_machine_room = $row['req_machine_room'];
$machine_make = $row['machine_make'];
$req_drive = $row['req_drive'];
$main_supply_system = $row['main_supply_system'];
$auxl_supply_system = $row['auxl_supply_system'];
$control_panel = $row['control_panel'];
$signals = $row['signals'];
$standerd_feaures = $row['standerd_feaures'];
$rate = $row['rate'];
$lift_qnty = $row['lift_qnty'];
$total_lift_amt = $lift_qnty * $rate;
$fabricated_structure =$row['fabricated_structure'];
$discount =$row['discount'];
$bamboo_scaf_amt =$row['bamboo_scaf_amt'];
$electrical_work_amt =$row['electrical_work_amt'];
$final_amount =$row['final_amount'];
$pit_depth =$row['pit_depth'];
$floors_designations =$row['floors_designations'];
$gst_show =$row['gst_show'];

if($req_machine_room == "LMR")
{
	$car_travel1 = $car_travel/1000;
	$req_machine_room_name = "Machine Mounted roof of top of machine room slab.";
}
else
{
	$car_travel1 = $car_travel/1000;
	$req_machine_room_name = "Machine Room Less.";
}

if($fabricated_structure =="0.00")
{
	$fabricated_rate = "-";
	$total_fabricated = "-";
}
else
{
	$fabricated_rate = $fabricated_structure;
	$total_fabricated = $fabricated_structure * $lift_qnty;
}

if($ard_device =="0.00")
{
	$ard_rate = "-";
	$total_ard = "-";
}
else
{
	$ard_rate = $ard_device;
	$total_ard = $ard_device * $lift_qnty;
}

if($pwd_amt =="0.00")
{
	$pwd_rate = "-";
	$total_pwd =  "-";
}
else
{
	$pwd_rate = $pwd_amt;
	$total_pwd =  $pwd_amt * $lift_qnty;
}

if($overload_device =='0.00')
{
	$overload_rate = "-";
	$total_overload = "-";
}
else
{
	$overload_rate = $overload_device;
	$total_overload = $overload_device * $lift_qnty;
}
if($power_backup =='0.00')
{
	$power_backup_rate = "-";
	$total_power_backup = "-";
}
else
{
	$power_backup_rate = $power_backup;
	$total_power_backup = $power_backup * $lift_qnty;
}
	
$year = date("Y"); 
$next_year = date('Y', strtotime('+1 year'));

$financial_year = $year ."-".$next_year;

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

<table style='border:0px !important; width:100%;'>
<tr>
	<td style='border: 0px; width:50%;text-align:left;'><strong>FT/AVK/$quatation_no/$financial_year/$quatation_edition</strong></td>
	<td style='border: 0px; width:50%;text-align:right;'>Date: $new_quatation_date</td>
</tr>
</table>
<p><strong>To,</strong><br> 
$site_name.<br>
$site_address.
</p>
<p><strong>Kind Attn.: <u>$customer_name ($contact_number).</u> </strong></p>
<p><strong>Sub.: Supply, Installation and Commissioning of $lift_type at your site. </strong></p>
<p><strong>Respected sir,</strong></p>
<p>We are pleased to submit our offer for the supply, installation & commissioning of lift at your site.
We undertake this opportunity to introduce ourselves as one of the fastest growing elevators manufacturing
company in Maharashtra.
<br>Manufacturing is not at all a difficult task for us since we are having qualified and experienced engineers. Based
on our prompt & highly quality service Philosophy, we started supply & installation of new lifts.
Yearly contract for old lifts, Modernizations, upgradation, Reconditioning of lifts under maintenance.<br>
<strong>Highlights -</strong></p>
<ul>
<li>Rationalized price variation</li>
<li>Early delivery</li>
<li>Most economical in price</li>
<li>Round the clock service after sales made available</li>
<li>Confirms to Indian standard and national building cod. To serve as a reference we offer following
options in our elevators.</li>
<li>Single speed</li>
<li>Two speed lift</li>
<li>Variable speed lift.</li>
<li>Glass/Capsule type of lifts.</li>
<li>Hydraulic lifts.</li>
<li>Car with MS/SS/Wooden Swing Doors.</li>
<li>MS/SS/Automatic Doors, Wooden swing doors.</li>
<li>Advanced technology based microprocessor control panel.</li>
</ul>
<p>These options are applicable for PASSENGER, HOSPITAL, GOOD, CAR and SERVICE LIFTS (Dumb
water) we hope that our offer is in line with your requirement & hence wait for your valuable phone call to
furnish further details.<br>
Thanking you & assuring you  the best services at all time.</p>

<br>
<br>
<br>
<h2 style='text-align:center; text-decoration:underline'><u>TECHINICAL SPECIFICATIONS</u></h2>

<table class='table' style=''>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>TYPE</strong></td>
	<td style='border:1px solid black;padding:7px;'>$lift_type</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>CAPACITY</strong></td>
	<td style='border:1px solid black; padding:7px;'>$capacity</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>SPEED</strong></td>
	<td style='border:1px solid black;padding:7px;'>About $speed m/sec</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%;padding:7px;'><strong>CAR TRAVEL</strong></td>
	<td style='border:1px solid black;padding:7px;'>$floors_designations Rises about $car_travel1 Mts.</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%;padding:7px;'><strong>NO. OF STOPS</strong></td>
	<td style='border:1px solid black;padding:7px;'>0$no_of_stops Nos.</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%;padding:7px;'><strong>NO. OF OPENINGS</strong></td>
	<td style='border:1px solid black;padding:7px;'>0$no_of_openings Nos.</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%;padding:7px;'><strong>CAR ENCLOSER</strong></td>
	<td style='border:1px solid black;padding:7px;'>$cabin_type, $flooring_name, $ceiling_name, $air_system_name, $light_fitting</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>CAR ENTRANCE</strong></td>
	<td style='border:1px solid black;padding:7px;'>$car_enterance </td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>LANDING ENTRANCE</strong></td>
	<td style='border:1px solid black;padding:7px;'>$landing_enterance</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>CAR PLATFORM</strong></td>
	<td style='border:1px solid black;padding:7px;'>$car_flatform</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>AVAILABLE SHAFT</strong></td>
	<td style='border:1px solid black;padding:7px;'>$shafts_width mm Width, $shafts_depth mm Depth</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>REQUIRED MACHINE ROOM</strong></td>
	<td style='border:1px solid black;padding:7px;'>$req_machine_room_name</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>MACHINE MAKE</strong></td>
	<td style='border:1px solid black;padding:7px;'> Geared Machine placed Top of Hoist way.</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>REQUIRED DRIVE</strong></td>
	<td style='border:1px solid black;padding:7px;'>Required- YES. V3F Drive.</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>MAIN SUPPLY SYSTEM</strong></td>
	<td style='border:1px solid black;padding:7px;'>$main_supply_system</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>AUXL SUPPLY SYSTEM</strong></td>
	<td style='border:1px solid black;padding:7px;'>$auxl_supply_system</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>CONTROL PANEL</strong></td>
	<td style='border:1px solid black;padding:7px;'> Microprocessor Based Down Collective Auto Control Panel.</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>SIGNALS</strong></td>
	<td style='border:1px solid black;padding:7px;'>$signals</td>
</tr>
<tr>
	<td style='border:1px solid black; width:100%; padding:7px;'><strong>STANDARD FEATURES</strong></td>
	<td style='border:1px solid black;padding:7px;'>$standerd_feaures</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style='text-align:center;'>DESCRIPTION OF COMPONENTS</h2>
<p><strong>1. MACHINE SET WITH INDUCTION MOTOR </strong>: Single wrap traction as per standard design induction Electro Mechanical Brake, Steel worm, Bronze Gear, Steel sheave, shaft and Induction of star winding, Double squirrel gauge, and bush type. Worm & worm shaft from Greaves Cotton & Co.Ltd. (David Brown)Motor &Machine Units specially designed for heavy duty lift from Sharp, Neeta, Raman, Heena, Pushpak and Cama.</p>

<p><strong>2. WIRE ROPES</strong> : Traction Steel Elevators ropes of 13 mm diameter of USHA MARTIN Industries Ltd. Mumbai.</p>

<p><strong>3. WIRES & CABLES</strong>  : I.S.I. mark Standard quality.(POLYCAB / FINOLEX).</p>

<p><strong>4. CONTROL PANEL</strong> : The Control Panel will be operated on 110 Volts DC with solid state Components for Trouble free & noiseless operation with maximum Efficiency & longer life. This will be mounted on floor or wall with phase Reversal & overload protection etc.</p>

<p><strong>5. BOTTOM SIL</strong> : JINDAL ALLUMINIUM Ltd.</p>

<p><strong>6. CAR ENCLOSURE</strong> : As PER your choice. (M.S.POWDER COATED / S.S.)</p>

<p><strong>7. DOOR</strong> : Automatic Doors. / M.S. Collapsible / M.S. Swing / Telescopic Door. Manufactured locally from Standard Concern.</p>

<p><strong>8. SAFETY DEVICE</strong> : Provided to stop the lift whenever excessive descending speed is attained.Manufactured locally from Standard Concern.</p>

<p><strong>9. ELECTRO MECHANICAL LOCKS</strong> : An Electro-mechanical contact will be provided for the car & landing gates. This contact is designed to prevent movement of the car from a landing unless the door or gate is in the closed position as defined in I.S.I.codes.</p>

<p><strong>10. T Guides</strong> : Steel T Guides will be heavy duty T Section Steel Guide machined thought out the length of the shaft complete with fish plates, firmly fixed on M.S.brackets with guide clips & will be furnished for the Car & Counter Weight.</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style='text-align:center;'>COMMERCIAL TERMS</h2>
<p><strong>A) <u>PRICE</u>:</strong></p>
<p>We are pleased to offer FORCE TECHNOLOGIES make $lift_type.<br>
[As per specification as above and inclusive of supply erection and commissioning of $lift_type]</p>
<br>
<table class='table'>
<tr style='background:#c3c3c3;'>
	<td style='border:1px solid black; width:100%'><strong>Sr.No.</strong></td>
	<td style='border:1px solid black; width:100%'><strong>Description</strong></td>
	<td style='border:1px solid black; width:100%'><strong>Rate</strong></td>
	<td style='border:1px solid black; width:100%'><strong>QTY</strong></td>
	<td style='border:1px solid black; width:100%'><strong>Amount</strong></td>
</tr>
<tr>
	<td style='font-weight:bold;text-align:center;'>1)</td>
	<td style='font-weight:bold;'>$lift_type - $floors_designations</td>
	<td style='font-weight:bold;text-align:right;'>$rate</td>
	<td style='font-weight:bold;text-align:center;'>$lift_qnty</td>
	<td style='font-weight:bold; text-align:right;'>$total_lift_amt</td>
</tr>
<tr>
	<td style='font-weight:bold;'></td>
	<td style='font-weight:bold;'>AS per below specification :-</td>
	<td style='font-weight:bold;'></td>
	<td style='font-weight:bold;'></td>
	<td style='font-weight:bold;'></td>
</tr>
<tr>   
	<td style='font-weight:bold;text-align:center;'>a</td>
	<td style='font-weight:bold;'>ARD (Automatic Rescue Device)</td>
	<td style='font-weight:bold;text-align:right;'>$ard_rate</td>
	<td style='font-weight:bold;text-align:center;'>
	";
	if($ard_device =="0.00")
	{
		$html .=" - ";
	}
	else
	{
		$html .="$lift_qnty ";
	}
	$html .="
	</td>
	<td style='font-weight:bold;text-align:right;'>$total_ard</td>
</tr>
<tr>
	<td style='font-weight:bold;text-align:center;'>b</td>
	<td style='font-weight:bold;'>PWD Charges (papers Provide By Client )</td>
	<td style='font-weight:bold;text-align:right;'>$pwd_rate</td>
	<td style='font-weight:bold;text-align:center;'>
	";
	if($pwd_amt =="0.00")
	{
		$html .=" - ";
	}
	else
	{
		$html .="$lift_qnty ";
	}
	$html .="
	</td>
	<td style='font-weight:bold;text-align:right;'>$total_pwd</td>
</tr>
<tr>
	<td style='font-weight:bold;text-align:center;'>c</td>
	<td style='font-weight:bold;'>Overload Device</td>
	<td style='font-weight:bold;text-align:right;'>$overload_rate</td>
	<td style='font-weight:bold;text-align:center;'>
	";
	if($overload_device =="0.00")
	{
		$html .=" - ";
	}
	else
	{
		$html .="$lift_qnty ";
	}
	$html .="
	</td>
	<td style='font-weight:bold;text-align:right;'>$total_overload</td>
</tr>
<tr>
	<td style='font-weight:bold;text-align:center;'>d</td>
	<td style='font-weight:bold;'>Power Backup</td>
	<td style='font-weight:bold;text-align:right;'>$power_backup_rate</td>
	<td style='font-weight:bold;text-align:center;'>
	";
	if($power_backup =="0.00")
	{
		$html .=" - ";
	}
	else
	{
		$html .="$lift_qnty ";
	}
	$html .="
	</td>
	<td style='font-weight:bold;text-align:right;'>$total_power_backup</td>
</tr>
<tr>
	<td style='font-weight:bold;text-align:center;'>e</td>
	<td style='font-weight:bold;'>Fabricated Structure</td>
	<td style='font-weight:bold;text-align:right;'>$fabricated_rate</td>
	<td style='font-weight:bold;text-align:center;'>
	";
	if($fabricated_structure =="0.00")
	{
		$html .=" - ";
	}
	else
	{
		$html .="$lift_qnty ";
	}
	$html .="
	</td>
	<td style='font-weight:bold;text-align:right;'>$total_fabricated</td>
</tr>
";
if($bamboo_scaf_amt !="")
{
$html .="
<tr>
	<td style='font-weight:bold;text-align:center;'>f</td>
	<td style='font-weight:bold;'>Bamboo Scaffolding </td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:right;'> "; if($bamboo_scaf_amt == 0){$html .="-"; } else { $html .=" $bamboo_scaf_amt ";} $html .=" </td>
</tr>
";
}
if($electrical_work_amt !="")
{
$html .="
<tr>
	<td style='font-weight:bold;text-align:center;'>g</td>
	<td style='font-weight:bold;'>Electrical Work</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:right;'>"; if($electrical_work_amt == 0){$html .="-"; } else { $html .=" $electrical_work_amt ";} $html .="</td>
</tr>
";
}
if($bamboo_scaf_amt !="" and $electrical_work_amt =="")
{
	$i= "h";
}
else if($electrical_work_amt !="" and $bamboo_scaf_amt =="")
{
	$i="h";
}
else if($electrical_work_amt !="" and $bamboo_scaf_amt !="")
{
	$i="i";
}
else
{
	$i="f";
}
//$i=6;
if($gst_show == "yes")
{
$sql8 = "SELECT * from tbl_tax_add_to_quat where quatation_id = '$quatation_id' ";
$result8 = mysql_query($sql8);
$count = mysql_num_rows($result8);
if($count > 0)
{
$row8 = mysql_fetch_array($result8);
$tax_id = $row8['tax_id'];
$tax_amount = $row8['tax_amount'];
$sql9 = "SELECT * from tbl_tax_detail where tax_id = '$tax_id' ";
$result9 = mysql_query($sql9);
$row9 = mysql_fetch_array($result9);
$tax_name = $row9['tax_name'];
$html .="<tr>
	<td style='font-weight:bold;text-align:center;'>$i</td>
	<td style='font-weight:bold;'>$tax_name</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:right;'>$tax_amount</td>
</tr>
";
$total_tax += $tax_amount;
}
}
$total_amount = $total_lift_amt + $fabricated_structure + $total_ard + $total_pwd + $total_overload + $total_tax;
$html .="<tr>
	<td style='font-weight:bold;text-align:center;'>$i</td>
	<td style='font-weight:bold;'>Total Amount</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:center;'>-</td>
	<td style='font-weight:bold;text-align:right;'></td>
</tr>
";
$html .="
</table>
<br>
<p style='color:red;'><strong>Note: GST applicable as per norms.</strong></p>
<p><strong>B) <u>Payment Terms</u>: </strong></p>
<p><strong>1.</strong> 50% of value of the interest free advance along with your valued purchase order.<br>
<strong>2.</strong> 30% After material delivery at site.<br>
<strong>3.</strong> 10% on Installation completion before handing over.<br>
<strong>4.</strong> 10% After PWD Licence Issuing.</p>
<p><strong>C) <u>PRICE ESCALATION</u>: </strong>Along with we will try to maintain the price as per our offer. We will be
compelled to revise our price, only if cost of raw material increase due to market fluctuations.</p>
<p><strong>D) <u>OVERDUES</u>: </strong>In the event of any payment outstanding for more than a fortnight from the due date,
we reserve the right to claim interest at 24%.</p>
<p><strong>E) <u>STORAGE& ACCOMODATION</u>: </strong>To accomodate lift material you will have to arrange a room having area not
less than 40 sq.m. Per lift. Lock & key to be provided to us until installation of the lift.</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style='text-align:center;'>SCHEDULE OF INSTALLATION</h2>
<p>
1. The approved building plans having all details of the pit & machine room to be furnished by you within 10 days from the date of receipt of your order.<br>

2. After that the layout drawing will be supplied by us within one month.<br>

3. Approval of layout drawing &finalization of all details by you within one week.<br>

4. After the site i.e. the pit, the shaft& machine room should be made available by you along three phase power supply in machine room within one week.<br>

5. The installation work will be completed within 4-8 week after completion of above work.<br>

6. We shall not be responsible for delay in installation of lift in following cases.</p>
<ul style='list-style-type: lower-alpha;'>
<li>If the payments are not made as per the terms.</li>
<li>If the three phase supply in the machine room is not provided in time.</li>
<li>If the necessary builder work is not completed in time.</li>
<li>If the formalities of licensing are delayed.</li>
<li>In the events of strikes, lookouts, power shortage/ failure, fire, destruction, theft, floods, riot, war, civil
commotion, breakdown or act of god or any other reasons beyond our control.</li>
</ul>
</p>
<p><strong><u>SURPLUS MATERIALS</u>: </strong><br>
Any surplus materials as well as tools & tackles will be our property but under you care until such time the same is removed by us at the earliest convenience.</p>

<p><strong><u>WARRANTEE</u>: </strong><br>
<u>All components of lifts are guaranteed for any manufacturing defect for a period of 12 months from date of supply and commissioning but not exceeding 12 calendar months.</u></p>

<p><strong><u>ARBITRATION</u>: </strong><br>
Arbitration in the event of any dispute arising between the parties in the respect of this contract, the same be conveyed to either party in writing. The same shall be referred to arbitration in accordance with provisions of Indian Arbitration Act. All Proceedings legal or amicable related to this contract shall be jurisdiction of Pune only.</p>

<p><strong><u>CANCELLATION OF CONTRACT</u>: </strong><br>
In the event of cancellation of contract we shall charge you as follows:<br>
<ul style='list-style-type: decimal;'>
<li>10% of contract value if the order is canceled before the general arrangement drawing is submitted for
approval.</li>
<li>20% of contract value will be charged if the order is cancelled within one month after the appovroval of
G.A. Drawing.</li>
<li>50% of contract value will be charged if the contract is cancelled after receipt of consignment of
material on site.90% of contract value will be charged if the order is cancelled after receipt of second
consignment of material on site.</li>
</ul>
</p>
<h2 style='text-align:center;'>WORK IN SCOPE OF CLIENT</h2>
<br>
<p><strong>1. Store to be provided for material onsite by you. If Store Room is Not Provided client is fully responsible for any theft or misplace of material.</strong></p>

<p><strong>2. Civil Work like Door frame fixing, Pocket Holes, Buffer column & Miscellaneous Work by client.</strong></p>

<p><strong>3. Scaffolding, Electrical cabling and prevision of lighting points in lift shaft & machine room is in Client scope.</strong></p>

<p><strong>4. If the Three phase power supply is not available within Ten Days from date of receipt of material at your site, the payment should not be withheld, as it is within the scope of lift.</strong></p>

<p><strong>5. For the Lift License customer need to provide all the documents such as Owner applications, RCC & Architect certificate, Approved Plan copy & other if requested by the competent Authority. These Documents are mandatory for the License Process.</strong></p>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style='text-align:left;'>Accepted & Signed by both parties to make this offer a legal &
valid contract binding on both parties.</h2>
<br>
<br>
<br>
<p><strong>To,</strong><br> 
$site_name.<br>
$site_address.
</p>
<p><strong>Kind Attn.: <u>$customer_name ($contact_number).</u> </strong></p>
<br>
<p><strong>For & on behalf of the Purchaser/Builder. </strong></p>

<table style='border:0px !important; width:70%;'>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Name</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Signature</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Status</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Place & Date</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
</table>
<br>
<p><strong>For Force Technologies.</strong></p>
<table style='border:0px !important; width:70%;'>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Name</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Signature</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Status</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
<tr>
	<td style='border: 0px; width:30%;text-align:left;'><strong>Place & Date</strong></td>
	<td style='border: 0px; width:70%;text-align:left;'><strong><hr></strong></td>
</tr>
</table>
<br>
<br>
<br>
<h2 style='text-align:center;'><u>YOUR SATISFACTION IS OUR AIM</u></h2>
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


$mpdf->Output('FT'.$quatation_no.' '.$site_name.' '.$quatation_edition.'.pdf','D');

exit;

//==============================================================
//==============================================================
//==============================================================

?>