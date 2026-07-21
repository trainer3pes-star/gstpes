<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">My Wishlist</h2>
                                <ul>
                                    <li>
                                        <a href="Home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>My Wishlist</li>
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
						
						<form method="post" name="admin_frm" id="admin_frm" class="search_frm" action="<?php echo MY_WISHLIST;?>">
								
						 <?php if(count($results)){?>
                            <div class="col-lg-12">
							 <div class="col-md-12">
<div class="alert alert-danger alert-dismissible"  <?php if(@strlen($this->session->flashdata('errorsmsg'))){?> style="display:block" <?php }else{?> style="display:none" <?php } ?>>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> <?php echo $this->lang->line('common_error');?> !</h5>
                 <?php echo $this->session->flashdata('errorsmsg') ?> 
                </div>
				<div class="alert alert-success alert-dismissible" <?php if(@strlen($this->session->flashdata('successmsg'))){?> style="display:block" <?php }else{?> style="display:none" <?php } ?>>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i><?php echo $this->lang->line('common_success');?> ! </h5>
                  <?php echo $this->session->flashdata('successmsg') ?> 
                </div>
                </div>
							<div class="product-topbar">
						<ul> 
							<li class="page-count">

							<span><?php echo ($search['no_of_records']*$search['pagi_number'])+(count($results));?></span> Product Found of <span><?php echo $count_results;?></span> </li>
							
							<li class="short">
								<select class="nice-select wide rounded-0 submit_change" name="sort_by_select" id="sort_by"> 
									<option value="1" <?php if($search['sort_by_select']==1){?> selected <?php } ?>>Sort by Latest</option>
									<option value="2" <?php if($search['sort_by_select']==2){?> selected <?php } ?>>Sort by Older</option> 
								</select>
							</li>
						</ul>
					</div>
								
                                    <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product_remove">remove</th>
                                                <th class="product-thumbnail">Images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="product-price">Unit Price</th>
                                                <th class="product-stock-status">Stock Status</th>
                                                <th class="cart_btn">add to cart</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($results as $result){?>
                                             <tr>
                                                <td class="product_remove">
                                                    <a href="user/remove_from_wishlist/<?php echo $result->id?>" class="remove_wishlist">
                                                        <i class="pe-7s-close" title="Remove"></i>
                                                    </a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="javascript:void(0)">
                                                        <img src="uploads/product/110X124/<?php echo $result->product_main_img?>" alt="<?php echo $result->pro_name?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
												<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>"><?php echo $result->pro_name?></a><br>
												 [ <a href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>"><?php echo $result->value?></a> ]
												
												</td>
                                                <td class="product-price"><span class="amount">RS. <?php echo $result->show_final_price?></span></td>
                                                <td class="product-stock-status">
												<?php if($result->current_stock){?>
												<span class="in-stock">in stock</span>
												<?php }else{ ?>
												<span class="in-stock text-danger">out stock</span>
												<?php } ?>
												</td>
                                                <td class="cart_btn"> <?php if($result->current_stock){?>
												  <a class="  product_added_cart  "   href="javascript:void(0);"  data-id="<?php echo $result->product_id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->seller_id;?>" >Add to Cart</a>
												<?php } ?>
												</td>
                                            </tr>
                                          
										<?php } ?>
									  </tbody>
                                    </table>
                                </div>
                          

                                </div> 
							<?php 
$p_f=$search['no_of_records']*$search['pagi_number']+1;
$p_t=($search['no_of_records']*$search['pagi_number'])+($i-1);
$p_a=$count_results;
 $no_of_btn1=$count_results/$search['no_of_records'];
				   $no_of_btn= round($no_of_btn1);
				 if($no_of_btn1>$no_of_btn){
				 	$no_of_btn++;
				 } ?>
					<div class="pagination-area pt-10">
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center"> 
								<?php for($h=0;$h<$no_of_btn;$h++){ $p=$h+1;?>
								<li data-frm="admin_frm"   data-value="<?php echo $h;?>"  class="page-item  pagination_a_btn pagination_btn_custom <?php if($search['pagi_number']==$h) { echo 'active active_btn_pag'; }?>"><a class="page-link "href="javascript:void(0);" ><?php echo $p;?></a></li> 
								<?php } ?>
								<input type="hidden" name="pagi_number"  id="pagi_number" value="<?php if(@$_POST['pagi_number']){ echo $_POST['pagi_number'];}else{ echo '0';}?>" /> 
							</ul>
						</nav>
					</div>
				
					<?php }else{ ?>
							<div class="product-topbar">
							<ul> 
								<li class="page-count"> 
									<span>  No Product Found    </span> 
								</li> 
							</ul>
					</div>
					
					<?php  } ?>	
						</form>	
 					   </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
