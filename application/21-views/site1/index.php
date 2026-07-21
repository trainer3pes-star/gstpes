<!DOCTYPE html>
<html lang="zxx">
<?php  
$this->load->view('site/header');?>
<body ondragstart="return false;" ondrop="return false;" class="sidebar-mini layout-fixed   text-sm disable_right_click" oncontextmenu="return false">
<div id="overlay"><div class="loader"></div></div>
    <div class="main-wrapper">
		 <?php 
   $this->load->view('site/top_header');
   ?> 
<?php 
	$this->load->view('site/'.$folder.'/'.$page_name); 
	 $this->load->view('site/footer');
	 ?>
    </div>
 
</body>
<?php 
$this->load->view('site/load_js');
?>
</html>