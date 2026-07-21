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



.popup-trigger {
  display: block;
  width: 170px;
  right: 2rem;
  margin: 3em auto;
  text-align: center;
  color: #FFF;
  font-size: 18px;
  padding:1rem 2rem;
  text-decoration:none;
  font-weight: bold;
  text-transform: uppercase;
  border-radius: 50em;
  background: #35a785;
  box-shadow: 0 3px 0 rgba(0, 0, 0, 0.07);
  transition:300ms all;
}

.popup-trigger:hover {
    opacity:.8;
}

.popup {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  z-index: 1000;
  width: 100%;
  background-color: rgba(94, 110, 141, 0.9);
  opacity: 0;
  visibility: hidden;
  transition:500ms all;

}

.popup.is-visible {
  opacity: 1;
  visibility: visible;
 transition:1s all;
}

.popup-container {
  transform:translateY(-50%);
  transition:500ms all;
  position: relative;
  width: 40%;
  margin: 2em auto;
  top: 5%;
  padding:1rem;
  background: #FFF;
  border-radius: .25em .25em .4em .4em;
  text-align: center;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.is-visible .popup-container {
  transform:translateY(0);
  transition:500ms all;
}

.popup-container .popup-close {
  position: absolute;
  top: 8px;
  font-size:0;
  right: 8px;
  width: 30px;
  height: 30px;
}


.popup-container .popup-close::before,
.popup-container .popup-close::after {
  content: '';
  position: absolute;
  top: 12px;
  width: 14px;
  height: 3px;
  background-color: #8f9cb5;
}

.popup-container .popup-close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 8px;
}

.popup-container .popup-close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  right: 8px;
}


.popup-container .popup-close:hover:before,
.popup-container .popup-close:hover:after {
  background-color:#35a785;
  transition:300ms all;
}

</style>
  
</head>
