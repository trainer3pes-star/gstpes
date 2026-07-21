<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Pending Orders</h2>
                                <ul>
                                    <li>
                                        <a href="Home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Pending Orders </li>
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
						<form method="post" name="admin_frm" id="admin_frm" class="search_frm" action="<?php echo PENDING_ORDER;?>">
		
                           <?php if(count($results)){?>
					<div class="product-topbar">
						<ul> 
							<li class="page-count">

							<span><?php echo ($search['no_of_records']*$search['pagi_number'])+(count($results));?></span> Product Found of <span><?php echo $count_results;?></span> </li>
							<li class="short">
								<select class="nice-select wide rounded-0 submit_change" name="show_select" id="sort_by">
									<option value="1" <?php if($search['show_select']==1){?> selected <?php } ?>>Show All Order</option>
									<option value="2" <?php if($search['sort_by_select']==2){?> selected <?php } ?>>Show Pending</option>
									<option value="3" <?php if($search['sort_by_select']==3){?> selected <?php } ?>>Show Dispatched</option>
									<option value="4" <?php if($search['sort_by_select']==4){?> selected <?php } ?>>Show Delivered</option>
									<option value="5" <?php if($search['sort_by_select']==5){?> selected <?php } ?>>Show Returned</option>
									<option value="6" <?php if($search['sort_by_select']==6){?> selected <?php } ?>>Show Cancelled</option>
								</select>
							</li>
							<li class="short">
								<select class="nice-select wide rounded-0 submit_change" name="sort_by_select" id="sort_by">
									<option value="1" <?php if($search['sort_by_select']==1){?> selected <?php } ?>>Sort by Default</option>
									<option value="2" <?php if($search['sort_by_select']==2){?> selected <?php } ?>>Sort by Popularity</option>
									<option value="3" <?php if($search['sort_by_select']==3){?> selected <?php } ?>>Sort by Rated</option>
									<option value="4" <?php if($search['sort_by_select']==4){?> selected <?php } ?>>Sort by Latest</option>
									<option value="5" <?php if($search['sort_by_select']==5){?> selected <?php } ?>>Sort by High Price</option>
									<option value="6" <?php if($search['sort_by_select']==6){?> selected <?php } ?>>Sort by Low Price</option>
								</select>
							</li>
						</ul>
					</div>
					<div class="tab-content text-charcoal pt-8">
						<div class="tab-pane fade show active" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
							<div class="product-list-view row">
							<?php foreach($results as $result){   ?>
							 <div class="col-12 pt-6">
									<div class="product-item">
										<div class="product-img img-zoom-effect"> 
											<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>"> <img class="img-full" src="uploads/product/263X238/<?php echo $result->product_main_img;?>" alt="<?php echo $result->pro_name;?>"> </a> 
											 
										</div>
										<div class="product-content row">
										<div class="col-8">
										<a class="product-name" href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>" title="<?php echo $result->pro_name;?>" ><?php  echo substr($result->pro_name,0,15);if(strlen($result->pro_name)>15){ echo '..';} ?></a>
										<span class="product-name"><?php echo $result->value?></span>
										 
										</div>
										<div class="col-4" style="text-align:right">
										<div class="price-box pb-1"> <span class="new-price"><i class="<?php echo SIGN_ICON?>"></i> <?php echo $result->show_final_price;?></span> </div>
										
										</div>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
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
