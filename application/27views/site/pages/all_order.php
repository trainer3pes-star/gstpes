<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">All Orders</h2>
                                <ul>
                                    <li>
                                        <a href="Home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>All Orders </li>
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
						
						<form method="post" name="admin_frm" id="admin_frm" class="search_frm" action="<?php echo ALL_ORDER;?>">
		
                           <?php if(count($results)){?>
					<div class="product-topbar">
						<ul> 
							<li class="page-count">

							<span><?php echo ($search['no_of_records']*$search['pagi_number'])+(count($results));?></span> Product Found of <span><?php echo $count_results;?></span> </li>
							<li class="short">
								<select class="nice-select wide rounded-0 submit_change" name="show_select" id="sort_by">
									<option value="1" <?php if($search['show_select']==1){?> selected <?php } ?>>Show All Order</option>
									<option value="2" <?php if($search['show_select']==2){?> selected <?php } ?>>Show Pending</option>
									<option value="3" <?php if($search['show_select']==3){?> selected <?php } ?>>Show Dispatched</option>
									<option value="4" <?php if($search['show_select']==4){?> selected <?php } ?>>Show Delivered</option>
									<option value="5" <?php if($search['show_select']==5){?> selected <?php } ?>>Show Returned</option>
									<option value="6" <?php if($search['show_select']==6){?> selected <?php } ?>>Show Cancelled</option>
								</select>
							</li>
							<li class="short">
								<select class="nice-select wide rounded-0 submit_change" name="sort_by_select" id="sort_by"> 
									<option value="1" <?php if($search['sort_by_select']==1){?> selected <?php } ?>>Sort by Latest</option>
									<option value="2" <?php if($search['sort_by_select']==2){?> selected <?php } ?>>Sort by Older</option> 
								</select>
							</li>
						</ul>
					</div>
					<div class="tab-content text-charcoal pt-8">
						<div class="tab-pane fade show active" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
							<div class="product-list-view row">
							<?php foreach($results as $result){  ?>
							 <div class="col-12 pt-6">
									<div class="product-item">
										<div class="product-img img-zoom-effect"> 
											<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>"> <img class="img-full" src="uploads/product/263X238/<?php echo $result->product_main_img;?>" alt="<?php echo $result->pro_name;?>"> </a> 
											 
										</div>
										<div class="product-content row">
										<div class="col-8">
										<a class="product-name" href="<?php echo DETAIL_ORDER?>/<?php echo base64_encode($result->order_id)?>" title="Order Detail" >#<?php echo $result->order_number;?></a>
										<a class="product-name" href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>" title="<?php echo $result->pro_name;?>" ><?php  echo substr($result->pro_name,0,15);if(strlen($result->pro_name)>15){ echo '..';} ?></a>
										<span class="product-name"><?php echo $result->value?></span>
										 <div class="price-box pb-1"> <span class="new-price"><i class="<?php echo SIGN_ICON?>"></i> <?php echo $result->show_final_price;?></span> </div>
										<span class="product-name">Status :
										<?php 
										$show_track=1;
										$show_cancelled=0;
										$show_returned=0;
										if(($result->is_seller_approved==0)&&($result->is_cancelled==0)){?>
										<?php echo "Pending. On - ".date(DISPLAY_DATE, strtotime($result->order_date));
											$show_cancelled=1;
											$show_track=1;
										?>
										<?php }else{
											if($result->is_cancelled==1){
												//$show_track=0;
												$show_cancelled=0;
												echo "Cancelled . On - ".date(DISPLAY_DATE, strtotime($result->cancelled_date));
											}elseif($result->is_returned==1){
												//$show_track=0;
												echo "Returned . On -" .date(DISPLAY_DATE, strtotime($result->returned_date));
											}elseif($result->is_delivered==1){
												//$show_track=0;
												echo "Delivered  . On - ".date(DISPLAY_DATE, strtotime($result->delivered_date));
												$show_returned=1;
											}elseif($result->mark_as_dispatched==1){
												$show_cancelled=1;
												echo "Dispatched . On - ".date(DISPLAY_DATE, strtotime($result->dispatched_date));
											}
										} ?>
										</span>
										<?php if($show_track){?> 
										<a href="#0" class="master_model_call" other="<?php echo $result->pro_name;?> - <?php echo $result->value?>" data-call-to="get_track_history" title="View Track History"  data-id="<?php echo $result->id;?>"> View Tarck History</a>
										<?php } ?>
										</div>
										<div class="col-4"  > 
												<ul>
													<li class="add-to-cart available_stock_outer_div" >
                                        <a class="btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0  product_added_cart assign_detail_id"   href="javascript:void(0);"  data-id="<?php echo $result->product_id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->seller_id;?>" >Buy Again</a>
                                    </li>
									<?php if($show_cancelled){?>
									<li>
										<a class="btn btn-custom-size lg-size btn-danger btn-secondary-hover rounded-0 master_model_call"  href="#0" other="<?php echo $result->pro_name;?> - <?php echo $result->value?>" data-call-to="cancel_product" title="Cancel Product"  data-id="<?php echo $result->id;?>"> Cancel Product</a>
									</li>
									<?php } ?>
									<?php if($show_returned){?>
									<li>
										<a class="btn btn-custom-size lg-size btn-warning btn-secondary-hover rounded-0 master_model_call" href="#0" other="<?php echo $result->pro_name;?> - <?php echo $result->value?>" data-call-to="return_product" title="Return Product"  data-id="<?php echo $result->id;?>"> Return Product</a>
									</li>
									<?php } ?>
												</ul> 
										
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
