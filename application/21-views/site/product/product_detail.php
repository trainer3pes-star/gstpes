<!-- Begin Main Content Area  -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading"><?php echo $result->pro_name?></h2>
                                <ul>
                                    <li>
                                        <a href="index.php">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
									<?php foreach($breadcomes as $breadcome){ ?>
							<li> <a href="<?php echo CATEGORY_LIST.'/'.base64_decode($breadcome->id);?>"><?php echo $breadcome->category_name;?> <i class="pe-7s-angle-right"></i></a> </li> 
								<?php } ?>
                                    <li><?php echo $result->pro_name?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="single-product-area section-space-top-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-product-img">
                                <div class="swiper-container single-product-slider">
                                    <div class="swiper-wrapper">
                                        
										<?php 
										
										foreach($images as $image){?><div class="swiper-slide">
                                            <a href="javascript:void(0)" class="single-img">
                                                <img class="img-full" src="uploads/product/530X480/<?php echo $image->imeges?>" alt="<?php echo $result->pro_name?>">
                                            </a> </div>
										<?php } ?>
                                       
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="swiper-container single-product-thumbs pt-6">
                                    <div class="swiper-wrapper">
									<?php foreach($images as $image){?>
                                        <a href="javascript:void(0)" class="swiper-slide">
                                            <img class="img-full" src="uploads/product/110X124/<?php echo $image->imeges?>" alt="<?php echo $result->pro_name?>"> 
                                        </a>
                                    <?php } ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-9 pt-lg-0">
                            <div class="single-product-content">
                                <h2 class="title"><?php echo $result->pro_name?></h2>
                                <div class="price-box pb-1 discount_price_div <?php if($result->discount_amount==0){?> hide <?php }else{ ?> show <?php } ?>">
                                    <span class="new-price text-danger "><span class="show_final_price"><?php echo $result->show_final_price?></span> Rs</span>
                                    <span class="old-price text-primary "><span class="final_price"><?php echo $result->final_price?></span> Rs</span>
                                </div>
								<div class="price-box pb-1 sigle_price_div <?php if($result->discount_amount==0){?> show <?php }else{ ?> hide <?php } ?>">
                                    <span class="new-price text-danger  "><span class="show_final_price"><?php echo $result->final_price?></span> Rs</span> 
                                </div>
                                <div class="rating-box-wrap pb-7">
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="fa fa-star apply_raing star_1"></i></li>
                                            <li><i class="fa fa-star apply_raing star_2"></i></li>
                                            <li><i class="fa fa-star apply_raing star_3"></i></li>
                                            <li><i class="fa fa-star apply_raing star_4"></i></li>
                                            <li><i class="fa fa-star-o apply_raing star_5"></i></li>
                                        </ul>
                                    </div>
                                    <div class="review-status ps-4">
                                        <a href="javascript:void(0)">( <span class="no_of_ratings">1</span> Customer Review )</a>
                                    </div>
                                </div>
								<?php if(strlen($result->pro_code)){?>
                                <p class="short-desc mb-6"> 
								<span class="title">Product Code :</span>
								<?php echo $result->pro_code?>
                                </p>
								<?php } ?>
								<?php  
								if(strlen($result->company_name)){?>
                                <p class="short-desc mb-6"> 
								<span class="title">Company Name :</span>
								<?php echo $result->company_name?>
                                </p>
								<?php } ?>
								
                                <div class="selector-wrap color-option pb-2"> 
                                    <select class="nice-select wide rounded-0 assign_rescpective_detail" name="detail_id" id="detail_id"  > 
									<?php foreach($variations as $variation){?>
                                        <option  <?php if($variation->variation_detail_id==$result->detail_id){?> selected <?php } ?> value="<?php echo $variation->variation_detail_id;?>" data-discount_amount="<?php echo $variation->discount_amount;?>" data-final_price="<?php echo $variation->final_price;?>" data-show_final_price="<?php echo $variation->show_final_price;?>" data-current_stock="<?php echo $variation->current_stock;?>" data-total_rating="<?php echo $variation->total_rating;?>" data-total_review_added="<?php echo $variation->total_review_added;?>"><?php echo $variation->value;?></option> 
									<?php } ?>
                                    </select>
                                </div> 
                                <ul class="quantity-with-btn pb-7">
                                    <li class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box no_chara no_space no_spacial set_min_val" min="1" value="1" id="cart_quantity" name="cart_quantity" type="text">
                                        </div>
                                    </li>
                                    <li class="add-to-cart available_stock_outer_div" <?php if($result->current_stock){?> <?php }else{ ?>  style="display:none;" <?php }?>>
                                        <a class="btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0  product_added_cart assign_detail_id"   href="javascript:void(0);"  data-id="<?php echo $result->id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->user_id;?>" >Add to cart</a>
                                    </li>
									<li class="notify_outer_div"  <?php if($result->current_stock){?>  style="display:none;"  <?php }else{ ?> <?php }?>>
                                        <a   class="btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0 assign_detail_id"  <?php if($login_user_info->id){?> href="javascript:void(0);" <?php }else{ ?> href="<?php echo LOGIN_URL ?>"  <?php } ?> data-id="<?php echo $result->id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->user_id;?>" >Notify Me</a>
                                    </li>
                                    <li class="wishlist-btn-wrap">
                                        <a  <?php if($login_user_info->id){?> href="javascript:void(0);" class="btn rounded-0 add_to_wishlist main_product_wishlist assign_detail_id wish_pro_<?php echo $result->detail_id;?>" <?php }else{ ?> class="btn rounded-0 " href="<?php echo LOGIN_URL ?>"  <?php } ?> data-id="<?php echo $result->id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->user_id;?>">
                                            <?php if($result->wishlist_id){?>
											<i class="fa fa-heart"></i>
											<?php }else{ ?>
											<i class="pe-7s-like"></i>
											<?php } ?>
											
											
                                        </a>
                                    </li>  
									
									<li class="available_stock_outer_div"  <?php if($result->current_stock){?> <?php }else{ ?>  style="display:none;" <?php }?>>
                                       
                                        <i class="pe-7s-check"></i> <span class="show_stock" ><?php echo $result->current_stock;?></span> in stock 
                                    </li>
									
                                </ul>
                                <div class="product-category text-matterhorn pb-2">
                                    <span class="title">Categories :</span>
                                    <ul>
									<?php foreach($breadcomes as $breadcome){ ?>
                                        <li>
                                            <a href="javascript:void(0)"><?php echo $breadcome->category_name;?> </a>
                                        </li> 
									<?php } ?>
                                    </ul>
                                </div>
								<?php if(strlen($result->method_application)){?>
                                <p class="short-desc mb-6"> 
								<b>Method of Application : </b>
								<?php echo $result->method_application;?>
                                </p>
								<?php } ?>
								<?php if(strlen($result->dosage)){?>
								<p class="short-desc mb-6"> 
								<b>Dosage : </b>
								<?php echo $result->dosage;?>
                                </p>
								<?php } ?>
								<?php if(strlen($result->recommended_crop)){?>
								<p class="short-desc mb-6"> 
								<b>Recommended Crop : </b>
								<?php echo $result->recommended_crop;?>
                                </p>
								<?php } ?>
								<?php if(strlen($result->pest_disease_weed)){?>
								<p class="short-desc mb-6"> 
								<b>Targeted Pest / Disease / Weed : </b>
								<?php echo $result->pest_disease_weed;?>
                                </p>
								<?php } ?>
                                <div class="social-link align-items-center">
                                    <span class="title pe-3">Share:</span>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                         
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-tab-area section-space-top-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav product-tab-nav product-tab-style-2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="active btn btn-custom-size" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
                                        Description
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="btn btn-custom-size" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
                                        Reviews
                                    </a>
                                </li>
                                <!--<li class="nav-item" role="presentation">
                                    <a class="btn btn-custom-size" id="shipping-tab" data-bs-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">
                                        Shipping
                                    </a>
                                </li>-->
                            </ul>
                            <div class="tab-content product-tab-content">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="product-description-body">
                                        <p class="short-desc mb-0">
										<?php echo $result->pro_description;?>
										</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="product-review-body">
                                        <h4 class="heading mb-5">3 Review Items</h4>
                                        <ul class="user-info-wrap">
                                            <li>
                                                <ul class="user-info">
                                                    <li class="user-avatar">
                                                        <img src="assets/images/brand/1-5.png" alt="User Image">
                                                    </li>
                                                    <li class="user-comment">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="pe-7s-star"></i></li>
                                                                <li><i class="pe-7s-star"></i></li>
                                                                <li><i class="pe-7s-star"></i></li>
                                                                <li><i class="pe-7s-star"></i></li>
                                                                <li><i class="pe-7s-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="meta">
                                                            <span><strong>Payal -</strong> March 15, 2021</span>
                                                        </div>
                                                        <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est eget, viverra auctor sem. Vivamus maximus enim vitae urna porta, ut euismod nibh lacinia ellentesque at diam voluptas quas nisi, culpa in accusantium“</p>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="feedback-area pt-5">
                                            <h2 class="heading mb-1">Add a review</h2>
                                            <p class="short-desc mb-3">Your email address will not be published.</p>
                                            <div class="rating-box">
                                                <span>Your rating</span>
                                                <ul class="ps-4">
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                </ul>
                                            </div>
                                            <form class="feedback-form pt-8" action="#">
                                                <div class="group-input">
                                                    <div class="form-field me-md-6 mb-6 mb-md-0">
                                                        <input type="text" name="name" placeholder="Your Name*" class="input-field">
                                                    </div>
                                                    <div class="form-field me-md-6 mb-6 mb-md-0">
                                                        <input type="text" name="email" placeholder="Your Email*" class="input-field">
                                                    </div>
                                                    <div class="form-field">
                                                        <input type="text" name="number" placeholder="Phone number" class="input-field">
                                                    </div>
                                                </div>
                                                <div class="form-field mt-6">
                                                    <textarea name="message" placeholder="Message" class="textarea-field"></textarea>
                                                </div>
                                                <div class="button-wrap mt-8">
                                                    <button type="submit" value="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover btn-lg rounded-0" name="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                    <div class="product-shipping-body">
                                        <h4 class="title">Shipping</h4>
                                        <p class="short-desc mb-4">The item will be shipped from China. So it need 15-20 days to deliver. Our product is good with reasonable price and we believe you will worth it. So please wait for it patiently! Thanks.Any question please kindly to contact us and we promise to work hard to help you to solve the problem</p>
                                        <h4 class="title">About return request</h4>
                                        <p class="short-desc mb-4">If you don't need the item with worry, you can contact us then we will help you to solve the problem, so please close the return request! Thanks</p>
                                        <h4 class="title">Guarantee</h4>
                                        <p class="short-desc mb-0">If it is the quality question, we will resend or refund to you; If you receive damaged or wrong items, please contact us and attach some pictures about product, we will exchange a new correct item to you after the confirmation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-slider-area section-space-top-95 section-space-bottom-100">
                <div class="container">
                    <div class="section-title text-center pb-55">
                        <span class="sub-title text-primary">You Can Be Love It</span>
                        <h2 class="title mb-0">Related Products</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-slider-holder swiper-arrow">
                                <div class="swiper-container product-slider border-issue">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.php">
                                                        <img class="img-full" src="assets/images/product/medium-size/1-9-270x300.jpg" alt="Product Images">
                                                    </a>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.php">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.php">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content texx">
                                                    <a class="product-name" href="single-product.php">Lemon Juice</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">80.00 Rs</span>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.php">
                                                        <img class="img-full" src="assets/images/product/medium-size/1-11-270x300.jpg" alt="Product Images">
                                                    </a>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.php">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.php">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content texx">
                                                    <a class="product-name" href="single-product.php">Cow Milk & Meat</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">80.00 Rs</span>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.php">
                                                        <img class="img-full" src="assets/images/product/medium-size/1-11-270x300.jpg" alt="Product Images">
                                                    </a>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.php">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.php">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content texx">
                                                    <a class="product-name" href="single-product.php">Black Pepper Grains</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">80.00 Rs</span>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.php">
                                                        <img class="img-full" src="assets/images/product/medium-size/1-12-270x300.jpg" alt="Product Images">
                                                    </a>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.php">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.php">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content texx">
                                                    <a class="product-name" href="single-product.php">Peanut Big Bean</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">80.00 Rs</span>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                            <li><i class="pe-7s-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here  -->
