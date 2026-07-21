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
                        <div class="col-lg-6 col-lg-offset-3">
                            <form action="Home/set-login" method="post">
                                <div class="login-form">
                                <!--    <h4 class="login-title">Login</h4> -->
								<br>
									<p class="error"></p>
                                    <div class="row">
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
											<input type="hidden" value="<?php echo $pre_url;?>" id="previous_url" name="previous_url">	
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div> 
        </main>
        <!-- Main Content Area End Here -->
