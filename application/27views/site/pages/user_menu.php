  <?php  
		$controller=strtolower($this->router->fetch_class()); 
		$method=strtolower($this->router->fetch_method()); 
	?>
 <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if($method=='my_account'){?> active <?php } ?>"   href="<?php echo MY_ACCOUNT?>"  >Dashboard</a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link <?php if($method=='all_order'){?> active <?php } ?>"  href="<?php echo ALL_ORDER?>" >All Orders</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link <?php if($method=='my_wishlist'){?> active <?php } ?>"  href="<?php echo MY_WISHLIST?>" >My Wishlist</a>
                                </li><li class="nav-item">
                                    <a class="nav-link"  href="<?php echo MY_CASHBACK?>" >My Cashback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($method=='my_wallet'){?> active <?php } ?>"  href="<?php echo MY_WALLET?>" >My Wallet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="<?php echo ACCOUNT_DETAILS?>" > Account Details </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="<?php echo SEND_GIFT_COUPON?>" > Send Gift Coupon </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="<?php echo SENT_GIFT_COUPON_LIST?>" > Sent Gift Coupon List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="<?php echo MY_GIFT_COUPON_LIST?>" > My Gift Coupon List</a>
                                </li>
                                 
                                <li class="nav-item">
                                    <a class="nav-link" href="Home/logout"  >Logout</a>
                                </li>
                            </ul>
                      