<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading"><i class="fa fa-check-circle" style="color: green;"></i> Order placed , thank you !</h2>
                                <ul>
                                    
                                    <li>Confirmation will be sent to your email</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                        <div class="col-12">
						Shipping to , <b><?php echo $ship_info->fname.' '.$ship_info->lname;?></b> , <?php echo  $ship_info->address_one;?> <?php echo  $ship_info->address_two;?> <?php echo  $ship_info->near_landmark;?> , <br> <?php echo  $ship_info->city_name;?> , <?php echo  $ship_info->district_name;?> , <?php echo  $ship_info->state_name;?>, <?php echo  $ship_info->country_name;?>, <?php echo  $ship_info->pincode;?>
						</div>
						<?php foreach($order_products as $order_product){  ?>
						<div class="row">
						
						<div class="col-4"> 
						<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $order_product->pro_alt?>/<?php echo base64_encode($order_product->detail_id)?>">
<?php echo $order_product->pro_name;?><br>(<?php echo $order_product->value;?>)</a><br> 							
						<?php

						echo date(ESTIMATED_DATE,strtotime($order_product->estimated_date));?><br>
						Estimated Delivery Date
						</div>
						<div class="col-8">
<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $order_product->pro_alt?>/<?php echo base64_encode($order_product->detail_id)?>"> <img src="uploads/product/110X124/<?php echo $order_product->product_main_img;?>" alt="<?php echo $order_product->pro_name;?>">

 </a> 						
						</div>
						</div>
						<?php } ?>
						 <div class="col-12">
							<a href="<?php echo MY_ORDER?>" title="Your Orders" >Your Orders ></a>
						 <div>
 			  </div>
 			  </div>
            </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
