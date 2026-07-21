<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Payment Methods</h2>
                                <ul>
                                    <li>
                                        <a href="home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo CART_VIEW?>">Cart <i class="pe-7s-angle-right"></i></a>
                                    </li> 
                                    <li>
                                        <a href="<?php echo CHECKOUT_SHIP?>">Shipping Address <i class="pe-7s-angle-right"></i></a>
                                    </li> 
									<li>Payment Method</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-area section-space-y-axis-100">
                <div class="container">
                         
                         <div class="row">
						  <form action="cart/set_payment" method="post"  id="pay_frm" name="pay_frm" enctype="multipart/form-data">
						    <div class="your-order">
                                <h3>Set Payment Method</h3>
                                 
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                            <div class="card">
											 <div class="card-header" id="#wallet-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)"  >
														<?php 
														$is_only_wallet=0;
														if($cart_data['sub_total']<=$wallet_amount){
															$is_only_wallet=1;
														}?>
                                                           <input type="checkbox" name="use_wallet" id="use_wallet" value="1" class="" <?php if($_SESSION['cart']['use_wallet']){?> checked <?php } ?> data-only-use="<?php echo $is_only_wallet;?>" data-amount="<?php echo $wallet_amount;?>"> Use Wallet - <?php echo  SIGN_ICON. ' ' .$wallet_amount;?>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)"  data-radio="online_payment" class="set_raiod_check" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                           <input type="radio" name="payment_method" value="online" id="online_payment" class="payment_radio" <?php if($_SESSION['cart']['payment_method']=='online'){?> checked <?php } ?>> Online Payment
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                            ID as the payment
                                                            reference. Your order won’t be shipped until the funds have cleared in
                                                            our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" data-radio="cheque_payment"  class="collapsed set_raiod_check" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                           <input type="radio" name="payment_method" value="cheque" id="cheque_payment" class="payment_radio" <?php if($_SESSION['cart']['payment_method']=='cheque'){?> checked <?php } ?>>  Cheque Payment
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                            ID as the payment
                                                            reference. Your order won’t be shipped until the funds have cleared in
                                                            our account.</p>
															
														  <div class="row">
															<div class="col-md-12">
																<div class="checkout-form-list">
																	<label>Bank Name <span class="required_label">*</span></label>
																	<input placeholder="Bank Name " type="text" name="bank_name" id="bank_name" class="form-control required no_special no_number" value="<?php echo @$_SESSION['cart']['cheque_d']['bank_name'];?>">
																</div>
															</div>
															
															<div class="col-md-12">
																<div class="checkout-form-list">
																	<label> Check/Transaction Number <span class="required_label">*</span></label>
																	<input placeholder="" type="text" name="transaction_number" id="transaction_number" class="form-control required no_special  no_space" value="<?php echo @$_SESSION['cart']['cheque_d']['transaction_number'];?>">
																</div>
															</div>
															<div class="col-md-12">
																<div class="checkout-form-list">
																	<label>  Check/Transaction Date <span class="required_label">*</span></label>
																	<input placeholder="" type="date" name="transaction_date" id="transaction_date" class="form-control required no_special no_number datepicker" value="<?php echo @$_SESSION['cart']['cheque_d']['transaction_date'];?>">
																</div>
															</div>
															<div class="col-md-12">
																<div class="checkout-form-list">
																	<label>  Upload Photo Copy  <span class="required_label">*</span></label>
																	<input   type="file" name="upload_file" id="upload_file" class="form-control <?php if(strlen($_SESSION['cart']['cheque_d']['upload_file'])==0){?> required <?php } ?> allow_File_only"  value="" data-file="image" accept="image/gif, image/jpeg, image/png">
																	<?php if(strlen($_SESSION['cart']['cheque_d']['upload_file'])){?>
																	<a href="uploads/cheque/<?php echo $_SESSION['cart']['cheque_d']['upload_file']?>" target="_blank" title=" View Check ">View Cheque</a>
																	<?php } ?>
																</div>
															</div>
															
															</div>
										
                                                    </div>
                                                </div>
                                            </div>
											<?php if($setting->cod_apply_for_user_type==$login_user_info->role_id){?>
											<?php if($setting->cod_apply_for_min_amount>=$cart_data['total_amount']){?>
                                            <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" data-radio="cod_payment"  class="collapsed set_raiod_check" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                                            <input type="radio" name="payment_method" value="cod" id="cod_payment" class="payment_radio" <?php if($_SESSION['cart']['payment_method']=='cod'){?> checked <?php } ?>>   Cash On Delivery ( COD )
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                            ID as the payment
                                                            reference. Your order won’t be shipped until the funds have cleared in
                                                            our account.</p>
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>
											<?php } ?>
										</div>
                                        <div class="order-button-payment">
                                            <input value="set Method" id="set_payment_method" type="button">
                                        </div>
                                    </div>
                                </div>
                           
						   </div>
                        
			  </form>
			  </div>
              
			   </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
