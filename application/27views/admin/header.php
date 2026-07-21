<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page_title; ?> | <?php echo SITE_NAME;?></title>
   
  <BASE href="<?php echo base_url();?>admin/"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/ekko-lightbox/ekko-lightbox.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="shortcut icon" href="<?php echo base_url();?>uploads/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url();?>uploads/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/summernote/summernote-bs4.css">
 <style>

.card-body{overflow-x: auto;}
.delete_me {

    text-align: center;
    display: block;
	cursor:pointer;

}
.thumbimage {
    float: left;
    max-width: 100px;
    position: relative;
    padding: 5px;
    max-height: 100px;
    width: 80px;
    height: 80px;
}
.thumb_outer_div {
    padding: 1%;
    float: left;
    border: 1px solid;
    margin: 1%;
}.chat_ul li:nth-of-type(2n+1) {
    background-color: rgba(0,0,0,.05);
}
.chat_ul{
	list-style: disclosure-closed;
}
.unread {
    font-weight: bold;
}.chat_ul li {
    padding-top: 10px;
    padding-left: 10px;
    padding-bottom: 10px;
	cursor:pointer;
}
.chat_date {
    font-size: 12px;
    color: #cccc41;
}
#overlay_chat{position:absolute;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,0.5);z-index:1055;cursor:wait}.loader_chat{border:4px solid #f3f3f3;border-top:4px solid #ffc107;border-radius:50%;width:30px;height:30px;animation:spin 2s linear infinite;position:absolute;top:50%;left:50%;font-size:50px;color:white;transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%)}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}

.tr_assign.selected {
    background: aqua !important;
}
.card-body > .table > thead > tr > th{
	background-color:#c5c5c5;
}
 </style>
 
  </head>
  