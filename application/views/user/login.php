
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
                    
                    <a href="register">Login/ Register</a>
                    
                </li>
            </ul>
        </div>
    </div>
</nav>
    

    


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <h1 class="text-center">Welcome Back!</h1>
                </div>
                <div class="panel-body">
                    <form id="login_frm" class="custom-validation" method="post" >
                     
                        <div class="form-group">
                            <label for="id_email" class="col-sm-3 control-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control animate-on-focus" required="" id="username">
                                
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="id_password" class="col-sm-3 control-label">Password:</label>
                            <div class="col-sm-9">
                                <input type="text" name="password" class="form-control animate-on-focus" required="" id="password">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary" >Login</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center">New to our GST Demo? <a href="register">Sign up here</a></p>
                    <p class="text-center">Forgot your password? <a href="<?php echo base_url('home/forgot_password'); ?>">Reset it here</a></p>
                    <p class="text-center">Need help? <a href="">We're here for you</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#login_frm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'set_login',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
               

                if (response.success == 1) {
                    window.location.href = response.url;
                } else {
                    alert("Invalid Username and Password");
                    window.location.href = response.url;
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert('Server error. Please try again.');
            }
        });
    });
});
</script>



    
   
    
    






