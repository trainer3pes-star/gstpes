<style>
.login-form .hint-text {
    color: #777;
    padding-bottom: 15px;
    text-align: center;
  	font-size: 13px; 
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.login-btn {        
    font-size: 15px;
    font-weight: bold;
}
.or-seperator {
    margin: 20px 0 10px;
    text-align: center;
    border-top: 1px solid #ccc;
}
.or-seperator i {
    padding: 0 10px;
    background: #f7f7f7;
    position: relative;
    top: -11px;
    z-index: 1;
}
.social-btn .btn {
    margin: 10px 0;
    font-size: 15px;
    text-align: left; 
    line-height: 24px;       
}
.social-btn .btn i {
    float: left;
    margin: 4px 15px  0 5px;
    min-width: 15px;
}
.input-group-addon .fa{
    font-size: 18px;
}
</style>

 
 <!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Sign In</h2>
                                <ul>
                                    <li>
                                        <a href="index.php">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Login </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
			<div class="about-banner different-bg-position section-space-y-axis-100" data-bg-image="assets/images/2-1.jpg" style="background-image: url(assets/images/2-1.jpg);">
                <div class="container">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <form action="Home/set-login" method="post">
                                <div class="login-form">
									<div class="row bgtitle">
										<h4 class="loginSocial-title">Login</h4>
									</div>
									<p class="error"></p>
                                    <div class="row mt-7">
                                        <div class="col-lg-12">
                                            <label>Email Address*</label>
                                            <input type="text" name="username" id="username" class="form-control required no_space email_validate" placeholder="Email Address" value="<?php echo $auto_username;?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Password</label>
                                             <input type="password" placeholder="Password" name="password" id="password" class="form-control required  " value="<?php echo $auto_password;?>">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box">
                                                <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pt-1 mt-md-0">
                                            <div class="forgotton-password_info">
                                                <a href="#"> Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-5">
                                             
											<input type="button"  id="site_login" name="site_login" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" value="Login"> 
											<input type="hidden" value="<?php echo $this->lang->line('login_js_error_msg');?>" id="js_error_invalid">	
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
						


						<div class="col-lg-6">
                            <form action="Home/set-login" method="post">
                                <div class="login-form">
									<div class="row bgtitle">
										<h4 class="loginSocial-title">Login with</h4>
									</div>
									<p class="error"></p>
									<div class="row mt-7">
										<form action="/examples/actions/confirmation.php" method="post">
											<div class="text-center social-btn">
												<a href="#" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
												<a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>
												<a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
											</div>
											<div class="or-seperator"><i>or</i></div>
											<div class="form-group">
												<button type="submit" class="btn btn-success btn-block login-btn">Sign Up</button>
											</div>
										</form>
									</div>
                                </div>
                            </form>
                        </div>
						
						
						
                       
                    </div>
                </div>
            </div> 
        </main>
        <!-- Main Content Area End Here -->
