<!DOCTYPE html>
<html>
<?php  
$this->load->view('admin/header');?>
<div id="overlay"   >
		<div class="loader"></div>
	</div>
<?php 	
if(@$login_user_info->id){?>
<body > <!--ondragstart="return false;" ondrop="return false;" class="sidebar-mini layout-fixed   text-sm disable_right_click" oncontextmenu="return false"-->
<div class="wrapper">
   <?php 
   $this->load->view('admin/top_header');
   ?> 
 <?php 
 $this->load->view('admin/sidebar'); ?> 
   
	<?php 
	$this->load->view('admin/'.$folder.'/'.$page_name); 
	 $this->load->view('admin/footer');
	 ?>
</div> 
<?php 
}else{
$this->load->view('admin/'.$page_name);
}
?>

<?php 
$this->load->view('admin/load_js');
?></body>
</html>
