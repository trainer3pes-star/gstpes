<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Send Gift Coupon</h2>
                                <ul>
                                    <li>
                                        <a href="Home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Send Gift Coupon</li>
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
                                <div class="">
                                    <div class="myaccount-details">
                                        <form action="User/confirm_send_gift_coupon" method="POST" id="send_gift_coupon" name="send_gift_coupon" class="myaccount-form" enctype="multipart/form-data" style="border: 0px solid #dee2e6;padding: 0px;"> 
                                            <div class="myaccount-form-inner">
                                                
                                                <div class="single-input single-input-half">
                                                    <label>Send To Name*</label>
                                                    <input type="text" class="form-control required no_special no_number" name="sent_to_name" id="name" value="" >
                                                    <span style="color:red;"></span>
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label>Email*</label>
                                                    <input type="email" class="form-control required email_valide" id="email" name="sent_to_email" value="" >
                                                    <span style="color:red;"></span>
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label>Mobile*</label>
                                                    <input type="text" class="form-control required no_chara no_space no_special mobile_vali" name="sent_to_mobile" id="mobile" maxlength="10" minlength="10" value="" >
                                                    <span style="color:red;"></span>
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label>Amount*</label>
                                                    <input type="text" class="form-control required no_chara no_special allow_dot decimal_amt_val" name="amount" value="" >
                                                    <span style="color:red;"></span>
                                                </div>
                                                <div class="single-input">
                                                    <label>Note*</label>
                                                    <textarea class="form-control required" id="note" name="note" ></textarea>
                                                    <span style="color:red;"></span>
                                                </div>
                                                
                                               <div class="single-input1">
                                                <label> <input type="checkbox" name="gift_check" id="gift_check1" value="1" style="display: inline;"> Use Wallet Amount  : </label> <?php echo $wallet_amount;?>                                                </div>
                                                <div class="single-input"> 
                                                    <input type="hidden" name="send_by" value="<?php echo $login_user_info->id;?>">
                                                    <input type="hidden" name="send_by_name" value="<?php echo $login_user_info->name;?>">
                                                    <input type="button" class="btn   btn-secondary btn-primary  btn_validator" value="SUBMIT" name="submit" data-frm="send_gift_coupon">
                                                         
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
