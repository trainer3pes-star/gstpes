<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">My Account</h2>
                                <ul>
                                    <li>
                                        <a href="Home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>My Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-page-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
							<?php echo $this->load->view('site/pages/user_menu');?>
						</div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
								<div class="col-lg-12">
                                    <div class="myaccount-dashboard">
                                        <p>Hello <b><?php echo $login_user_info->name?></b> ,</p>
                                        <p><?php echo WELCOME_MESSAGE?></p>
                                    </div>
                                </div> 
								</div> 
							</div>
							
							
							<div class="shipping-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
				<?php if($login_user_info->role_id!=6){?>
                    <div class="col-lg-6 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-img" style="background-color: #bac34e; border-radius: 54px;font-size: 34px;width: 50px;text-align: center;color: #fff;">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="shipping-content"><a href="Home/switch_to_seller" title="Switch to seller account " >
                                <h5 class="title">Switch To Seller Account</h5>
                                <p class="short-desc mb-0">Manage your seller account</p></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>     
				</div>
            </div>
        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
