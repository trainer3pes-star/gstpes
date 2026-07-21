<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Home" class="nav-link"> <?php echo $this->lang->line('menu_dashboard');?></a>
      </li>
	  <?php if(($login_user_info->role_id > '1')&&($login_user_info->role_id < '6')){   ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url().MY_ACCOUNT?>" class="nav-link bg-danger">Switch To Buyer panel</a>
      </li>
	  <?php } ?>
    </ul>

   <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Home/logout" class="nav-link">Logout</a>
      </li>
    </ul>  

    </nav>
 