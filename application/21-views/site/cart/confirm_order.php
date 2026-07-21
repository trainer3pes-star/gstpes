<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Confirm Order</h2>
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
                                    <li>
                                        <a href="<?php echo CHECKOUT_PAYMET?>">Payment Method <i class="pe-7s-angle-right"></i></a>
                                    </li> 
									<li>Confirm Order</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="checkout-area section-space-y-axis-100">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-lg-6 col-12">
                             <div class="coupon-accordion">
                                <h3><span id="showlogin">Shipping Address</span></h3>
                                <div id="checkout-login" class="coupon-content" style="display: block;">
                                    <div class="coupon-info">
                                        <p><?php echo $ship_address->fname.' '.$ship_address->lname;?></p>
                                        <p><?php echo $ship_address->mobile;?></p>
                                        <p><?php echo $ship_address->email;?></p>
                                        <p><?php echo $ship_address->address_one;?></p>
										<?php if(strlen($ship_address->address_two)){?>
                                        <p><?php echo $ship_address->address_two;?></p>
										<?php } ?>
										<p><?php echo $ship_address->near_landmark ;?> , </p>
										<p><?php echo $ship_address->pincode.' , '.$ship_address->city_name;?></p>
										<p><?php echo $ship_address->district_name.' , '.$ship_address->state_name.' , '.$ship_address->country_name;?></p>
										<p><a href="<?php echo CHECKOUT_SHIP?>">Change</a> <a href="<?php echo CHECKOUT_SHIP?>/edit">Edit</a> </p>
                                    </div>
                                </div>
                                <h3><span id="showcoupon">Billing Address</span></h3>
                                <div id="checkout_coupon" class="coupon-content" style="display: block;">
                                    <div class="coupon-info">
                                         <p><p><?php echo $bill_address->fname.' '.$bill_address->lname;?></p>
                                        <p><?php echo $bill_address->mobile;?></p>
                                        <p><?php echo $bill_address->email;?></p>
                                        <p><?php echo $bill_address->address_one;?></p>
										<?php if(strlen($bill_address->address_two)){?>
                                        <p><?php echo $bill_address->address_two;?></p>
										<?php } ?>
										<p><?php echo $bill_address->near_landmark ;?> , </p>
										<p><?php echo $bill_address->pincode.' , '.$bill_address->city_name;?></p>
										<p><?php echo $bill_address->district_name.' , '.$bill_address->state_name.' , '.$bill_address->country_name;?></p>
										<p>  <a href="<?php echo CHECKOUT_SHIP?>/edit">Edit</a> </p>
                                    </div>
                                </div>
                            </div>
                        
						</div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-name">Qty</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($cart_products as $cart_product){?>
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> <a href="<?php echo PRODUCT_DETAIL?>/<?php echo $cart_product->pro_alt?>/<?php echo base64_encode($cart_product->detail_id)?>"><?php echo $cart_product->pro_name?></a><br>
												 [ <a href="<?php echo PRODUCT_DETAIL?>/<?php echo $cart_product->pro_alt?>/<?php echo base64_encode($cart_product->detail_id)?>"><?php echo $cart_product->value?></a> ]
												 </td>
													<td class="cart-product-name" style="text-align: center;">  <strong class="product-quantity">
                                                    × <?php echo $cart_product->quantity?></strong></td>
                                                <td class="cart-product-total" style="text-align: center;"><span class="amount">
												<?php 
												$sub_total=$sub_total+($cart_product->show_final_price*$cart_product->quantity);
												
												echo ($cart_product->show_final_price*$cart_product->quantity);?> Rs</span></td>
                                            </tr>
										<?php } ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
												<td></td>
                                                <td style="text-align: center;"><span class="amount"><?php echo $sub_total?> Rs</span></td>
                                            </tr>
											<?php if($cart_data['total_coupon_discount']>0) {?>
											<tr class="cart-subtotal">
                                                <th>Discount (<?php echo @$_SESSION['cart']['coupon']['code']?>)</th>
												<td></td>
                                                <td style="text-align: center;"><span class="amount"><?php echo $cart_data['total_coupon_discount']?> Rs</span></td>
                                            </tr>
												 <?php }?>
                                            <tr class="order-total">
                                                <th>Order Total</th>
												<td></td>
                                                <td    style="text-align:center"><strong><span class="amount"><?php echo $order_total=$sub_total-$cart_data['total_coupon_discount']?> Rs</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
										 <?php if($_SESSION['cart']['use_wallet']){ ?>
                                            <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                            Use Wallet  - <?php echo $used_wallet?> RS.
                                                        </a>
														<span><a href="<?php echo CHECKOUT_PAYMET?>">Change</a></span>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                                    <div class="card-body"> 
                                                        <p> Your wallet Amount - <?php echo $wallet_amount;?></p>
														<p> Using wallet Amount - <?php echo $used_wallet;?></p>
														<?php if($remain_wallet>0){?>
														<p> Remaining wallet Amount - <?php echo $remain_wallet;?></p>
														<?php } ?>
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>
											
                                            <div class="card"> 
											<?php 
											if($other_payment>0){
											if($_SESSION['cart']['payment_method']=='online'){?>
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                           Online Payment - <?php echo $other_payment; ?> RS.
                                                        </a>
														<span><a href="<?php echo CHECKOUT_PAYMET?>">Change</a></span>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse  " data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                            ID as the payment
                                                            reference. Your order won’t be shipped until the funds have cleared in
                                                            our account.</p>
                                                    </div>
                                                </div>
                                            <?php }elseif($_SESSION['cart']['payment_method']=='cheque'){?>
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                           Cheque Payment - <?php echo $other_payment; ?> RS.
                                                        </a>
														<span><a href="<?php echo CHECKOUT_PAYMET?>">Change</a></span>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse  " data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Bank Name - <?php echo $_SESSION['cart']['cheque_d']['bank_name'];?></p>
                                                        <p>Transaction Number - <?php echo $_SESSION['cart']['cheque_d']['transaction_number'];?></p>
                                                        <p>Transaction Date - <?php echo $_SESSION['cart']['cheque_d']['transaction_date'];?></p>
                                                        <p>Upload Photo Copy - <a href="uploads/cheque/<?php echo $_SESSION['cart']['cheque_d']['upload_file']?>" target="_blank" title=" View Check ">View Cheque</a></p>
                                                    </div>
                                                </div>
                                            <?php }elseif($_SESSION['cart']['payment_method']=='cod'){?>
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                           Cash On Delivery ( COD ) - <?php echo $other_payment; ?> RS.
                                                        </a>
														<span><a href="<?php echo CHECKOUT_PAYMET?>">Change</a></span>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse  " data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                            ID as the payment
                                                            reference. Your order won’t be shipped until the funds have cleared in
                                                            our account.</p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php } ?>
											</div>
											
										</div>
                                        <div class="order-button-payment">
                                            <input value="Place order" class="<?php if($_SESSION['cart']['payment_method']=='online'){?> call_online <?php } ?>" type="button" id="place_order_btn">
											 
                                        </div>
                                    </div>
                                </div>
                           
						   </div>
                        </div>
                    </div>
                </div>
            </div>
       
	   </main>
	   
	   <?php if($_SESSION['cart']['payment_method']=='online'){?>
        <!-- Main Content Area End Here --><script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="<?php echo $retur_url ; ?>" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    <input type="hidden" name="unique_number"  id="unique_number" value="<?php echo $unique_number;?>" >
    <input type="hidden" name="online_payable_amount"  id="online_payable_amount" value="<?php echo $other_payment;?>" >
</form>
<script> 
var options = <?php echo $json?>;
 
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};
 
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        alert("Payment Cancelled or not done . Please try again ");
    }, 
    escape: true, 
    backdropclose: false
}; 
var rzp = new Razorpay(options); 
</script>

	   <?php } ?>