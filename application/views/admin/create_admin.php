
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Mobile menu toggle button -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Center-aligned logo -->
            <a class="navbar-brand" href="/">
                <!-- <img alt="Brand" src="<?php echo base_url();?>assets/images/logo.png" class="img-responsive center-block" width="200" height="74"> -->
            </a>
            
        </div>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                
              
                
                <li style="padding: 10px 5px;">                
                    
                    <a href="login">Login / Register</a>
                    
                </li>
            </ul>
        </div>
    </div>
</nav>
    

    



<div class="container">
    <div class="row">
        <div class="col-md-10">
     <?php if($this->session->flashdata('errorsmsg')): ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-ban"></i> <?php echo $this->lang->line('common_error'); ?> !</h5>
  <?php echo $this->session->flashdata('errorsmsg'); ?>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('successmsg')): ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> <?php echo $this->lang->line('common_success'); ?> !</h5>
  <?php echo $this->session->flashdata('successmsg'); ?>
</div>
<?php endif; ?>
</div>
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Create Admin</h1>
             <?php echo form_open_multipart('admin/save_admin', array('id' => 'user_basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                

                
                <div class="form-group">
                    <label for="id_full_name" class="col-sm-4 control-label">Full name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" maxlength="100" class="form-control animate-on-focus" required="" id="id_full_name">
                        
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="id_email" class="col-sm-4 control-label">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control animate-on-focus" required="" id="id_email">
                        
                        
                    </div>
                </div>
                
                  <div class="form-group">
                    <label for="id_mobile_number" class="col-sm-4 control-label">Mobile number:</label>
                   <div class="col-sm-8">
                    <input type="text" 
                        name="contact" 
                        class="form-control animate-on-focus" 
                        required 
                        id="contact"
                        minlength="10" 
                        maxlength="10" 
                        pattern="\d{10}" 
                        title="Enter exactly 10 digits"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                 </div>

                </div>
                
                <!-- <div class="form-group">
                    <label for="id_password1" class="col-sm-4 control-label">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" autocomplete="new-password" class="form-control animate-on-focus" required="" id="password">
                        
                        
                    </div>
                </div>
                 -->
                
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        	<input type="submit" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="user_basic_frm"  style="width:200px;" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <p>Already have an account? <a href="login">Login here</a></p>
                    </div>
                </div>
            <?php  echo form_close(); ?>
        </div>
    </div>
</div>



    
   
    

<script>
document.addEventListener("DOMContentLoaded", function () {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');

    confirmPassword.addEventListener('input', function () {
        if (confirmPassword.value !== password.value) {
            confirmPassword.setCustomValidity("Passwords do not match.");
        } else {
            confirmPassword.setCustomValidity(""); // Clear error
        }
    });

    password.addEventListener('input', function () {
        // Reset confirmation validation when password is changed
        if (confirmPassword.value !== password.value) {
            confirmPassword.setCustomValidity("Passwords do not match.");
        } else {
            confirmPassword.setCustomValidity("");
        }
    });
});
</script>





