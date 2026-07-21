<body class="hold-transition login-page" style='background-image: url("<?php echo base_url();?>dist/img/bg.jpg");background-repeat: no-repeat; background-position: right; min-height: 404.4px;background-color: #3b3f48;align-items: normal;'>
<div class="login-box" style="margin-left: 1%;">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><img src="<?php echo base_url().SITE_LOGO;?>" style="height:100px;" alt="<?php echo SITE_NAME;?>"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $this->lang->line('forgot_password_header');?></p>
 <p class="error" style="text-align: center;color: black;font-weight: bold;"></p>
      <form action="Home/set-new_password" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control " placeholder="<?php echo $this->lang->line('login_username');?>" id="username" name="username" value="<?php echo @$auto_username?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="button" id="forgot_btn" class="btn btn-success btn-block"><?php echo $this->lang->line('forgot_button');?></button>
			<input type="hidden" value="<?php echo $this->lang->line('login_js_error_msg');?>" id="js_error_invalid">			
		 </div>
          <!-- /.col -->
		  <p class="mb-1">
        <a href="Home/index"><?php echo $this->lang->line('login_page_title');?></a>
      </p>
        </div>
      </form> 

      
       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box --> 