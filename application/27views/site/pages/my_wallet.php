<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">My Wallet</h2>
                                <ul>
                                    <li>
                                        <a href="Home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>My Wallet</li>
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
                        <div class="col-lg-9" style="background-image: url('assets/images/account/cartoon-wallet.jpg');background-position: center center;">
                        <div class="col-lg-3 col-md-6"></div>
                        <div class="col-lg-6 col-md-6" style="padding-top:14%">
                            <div class="shipping-item">
                                
                                <div class="shipping-content">
                                    <h3 class="title">Current Balance</h3> 
                                    <h1 class="title">Rs. <?php echo $wallet_amount;?>/-</h1> 
                                </div>
                            </div>
                        </div> 
						 
						 
						</div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
