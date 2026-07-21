<body class="hold-transition login-page" style='background-image: url("<?php echo base_url();?>dist/img/bg.jpg");background-repeat: no-repeat; background-position: center; align-items: normal;background-size: cover;'>
<div class="login-box" style="margin-left: 1%;">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><img src="<?php echo base_url().SITE_LOGO;?>" style="height:100px;" alt="<?php echo SITE_NAME;?>"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" ><?php echo $this->lang->line('login_header');?></p>
      <p class="error"></p>

      <form action="Home/set-login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control " placeholder="<?php echo $this->lang->line('login_username');?>" id="username" name="username" value="<?php echo @$auto_username?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control submit_frm" placeholder="<?php echo $this->lang->line('login_password');?>" id="password" name="password" value="<?php echo @$auto_password?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember_me" name="remember_me">
              <label for="remember">
                <?php echo $this->lang->line('login_remeber_me');?>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" id="admin_login" class="btn btn-success btn-block"><?php echo $this->lang->line('login_button');?></button>
			<input type="hidden" value="<?php echo $this->lang->line('login_js_error_msg');?>" id="js_error_invalid">			
		 </div>
          <!-- /.col -->
		  <p class="mb-1">
        <a href="Home/forgot-password">Forgot Password</a>
      </p>
        </div>
      </form> 

      
       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box --> 