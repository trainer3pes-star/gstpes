<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title; ?> | <?php echo SITE_NAME;?></title> 
	<BASE href="<?php echo base_url();?>"> 
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/Pe-icon-7-stroke.css" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.min.css" />

  <link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/css/select2.min.css">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <?php if($is_css==1){?>
  <link rel="stylesheet" href="assets/css/<?php echo $css_name;?>.css">
  <?php } ?>
  <style>
 
#overlay {
 position:fixed;
  display:none; width:100%;
 height:100%;
 top:0;
 left:0;
 right:0;
 bottom:0;
 background-color:rgba(0,0,0,0.5);
 z-index:1055;
 cursor:wait
}
.loader {
 border:16px solid rgb(186, 195, 78);
 border-top:16px solid #2f9a41;
 border-radius:50%;
 width:120px;
 height:120px;
 animation:spin 2s linear infinite;
 position:absolute;
 top:50%;
 left:50%;
 font-size:50px;
 color:white;
 transform:translate(-50%,-50%);
 -ms-transform:translate(-50%,-50%)
}
@keyframes spin {
 0% {
  transform:rotate(0deg)
 }
 100% {
  transform:rotate(360deg)
 }
}

</style>
  
</head>
