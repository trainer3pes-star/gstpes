<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Cart Detail</h2>
                                <ul>
                                    <li>
                                        <a href="home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="user/update_cart" name="cart_frm" id="cart_frm" method="post">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product_remove">remove</th>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="product-price">Unit Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$sub_total=0;
										foreach($cart_products as $cart_product){?>
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="javascript:void(0)" class="delete_from_cart" data-id='<?php echo $cart_product->id;?>'>
                                                        <i class="pe-7s-close" title="Remove from cart"></i>
                                                    </a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="javascript:void(0)">
                                                        <img src="uploads/product/110X124/<?php echo $cart_product->product_main_img?>" alt="<?php echo $cart_product->pro_name?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
												<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $cart_product->pro_alt?>/<?php echo base64_encode($cart_product->detail_id)?>"><?php echo $cart_product->pro_name?></a><br>
												 [ <a href="<?php echo PRODUCT_DETAIL?>/<?php echo $cart_product->pro_alt?>/<?php echo base64_encode($cart_product->detail_id)?>"><?php echo $cart_product->value?></a> ]
												
												</td>
                                                <td class="product-price"><span class="amount">RS. <?php echo $cart_product->show_final_price?></span></td>
                                                <td class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box no_chara no_space no_spacial set_min_val" value="<?php echo $cart_product->quantity?>" min="1"  id="cart_quantity_<?php echo $cart_product->id;?>" name="cart_quantity[<?php echo $cart_product->id;?>]" type="text">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">RS. <?php 
												$sub_total=$sub_total+($cart_product->show_final_price*$cart_product->quantity);
												
												echo ($cart_product->show_final_price*$cart_product->quantity);?></span></td>
                                            </tr>
										<?php } ?>
                                         </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text no_space" name="coupon_code" value="" placeholder="Coupon code" type="text">
												 <?php if($login_user_info->id){?> 
												 <input class="button mt-xxs-30" name="apply_coupon" id="apply_coupon" value="Apply coupon" type="button">
												 <?php }else{ ?>
												 <a href="<?php echo LOGIN_URL?>" class="btn btn-info" title="Apply coupon" >Apply coupon</a>
												 <?php } ?>
                                                
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update And Checkout" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Subtotal <span>RS. <?php echo $sub_total?></span></li> 
												<?php if($cart_data['total_coupon_discount']>0) {?>
												<li>Discount (<?php echo @$_SESSION['cart']['coupon']['code']?>) <span>RS. <?php echo $cart_data['total_coupon_discount']?></span></li>
												<?php }?>
												<li>Total <span>RS. <?php echo $sub_total-$cart_data['total_coupon_discount']?></span></li>
                                            </ul>
                                            <a   href="<?php echo CHECKOUT_SHIP ?>" >Proceed to checkout</a>
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
