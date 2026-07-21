<main class="main-content">
	<div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-lg-12">
					<div class="breadcrumb-item">
						<h2 class="breadcrumb-heading">Search Products</h2>
						<ul>
							<li> <a href="Home">Home <i class="pe-7s-angle-right"></i></a> </li>
							<li>Product List</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="shop-area section-space-y-axis-100">
		<div class="container">
		<form method="post" name="admin_frm" id="admin_frm" class="search_frm" action="<?php echo PRODUCT_LIST;?>">
			<div class="row"> 
				<div class="col-lg-3">
					<div class="card"> 
						<article class="filter-group">
							<header class="card-header">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_product" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Search Product </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_product" style="">
								<div class="card-body">
									<div class="pb-3">
										<div class="input-group">
											<input type="text" class="form-control submit_change" placeholder="Search By Product Name" name="search_query" id="search_query" value="<?php echo $search['search_query']?>">
											<div class="input-group-append">
												<button class="btn btn-light" type="button"><i class="fa fa-search submit_frm"></i></button>
											</div>
										</div>
									</div>
									
									
								</div>
								<!-- card-body.// -->
							</div>
						</article>
						<!-- filter-group  .// -->
						<article class="filter-group">
							<header class="card-header">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_cat" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Categories </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_cat" style="">
								<div class="card-body"> 
										<div style="text-align:right"> <a href="<?php echo PRODUCT_LIST;?>">Clear All</a></div>
										<?php   
										foreach(array_reverse($categories) as $key=>$category){ 
											 echo "<ul class='list-menu'><li>";$sub_str++;	
											for($s=0;$s<count($category);$s++){
												if($s>0){
													echo  '<li>'.$category[$s]['html'].'</li>'  ;
												}else{
													echo  $category[$s]['html']  ;
												}
											}
											
										}
										for($j=0;$j<=$sub_str;$j++){
											echo"</li></ul>";
										}
										
										?> 
										<input type="hidden" name="category_id"  id="category_id" value="<?php echo $search['category_id'];?>">
								</div>
								<!-- card-body.// -->
							</div>
						</article>
						<article class="filter-group">
							<header class="card-header">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_type" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Product Type </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_type" style="">
								 
								<div class="card-body">
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input submit_frm " <?php if(in_array('1',$search['is_subsidized'] )){?> checked <?php } ?> value="1" name="is_subsidized[]">
										<div class="custom-control-label">Subsidized </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input submit_frm" value="0" <?php if(in_array('0',$search['is_subsidized'])){?> checked <?php } ?> name="is_subsidized[]">
										<div class="custom-control-label">Non Subsidized </div>
									</label> 
								</div>
								<!-- card-body.// -->
							 
								<!-- card-body.// -->
							</div>
						</article>
						
						<!-- filter-group .// -->
						<article class="filter-group">
							<header class="card-header">
								<a href="#." data-toggle="collapse" data-target="#collapse_price" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Price range </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_price" style="">
								<div class="card-body">
									 
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Min</label>
											<input class="form-control   submit_change" placeholder="0" type="number" min="0" name="min_price" value="<?php echo $search['min_price']?>"> </div>
										<div class="form-group text-right col-md-6">
											<label>Max</label>
											<input class="form-control submit_change  " placeholder="1,0000" type="number" min="0" name="max_price"value="<?php echo $search['max_price']?>"> </div>
									</div>
									<!-- form-row.// -->
									<button class="btn btn-block btn-primary submit_frm">Apply</button>
								</div>
								<!-- card-body.// -->
							</div>
						</article>
						<!-- filter-group .// -->
						<article class="filter-group">
							<header class="card-header">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_dis" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Discount </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_dis" style="">
								 	 	 
								<div class="card-body">
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="submit_frm custom-control-input"  <?php if(in_array('0-10',$search['discount'] )){?> checked <?php } ?> value="0-10" name="discount[]">
										<div class="custom-control-label"> 0% To 10% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="submit_frm custom-control-input" value="11-20" <?php if(in_array('11-20',$search['discount'] )){?> checked <?php } ?> name="discount[]">
										<div class="custom-control-label"> 11% To 20% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="submit_frm custom-control-input" value="21-30" name="discount[]" <?php if(in_array('21-30',$search['discount'] )){?> checked <?php } ?>>
										<div class="custom-control-label"> 21% To 30% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="submit_frm custom-control-input" value="31-40" name="discount[]" <?php if(in_array('31-40',$search['discount'] )){?> checked <?php } ?>>
										<div class="custom-control-label"> 31% To 40% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="submit_frm custom-control-input" value="41-50" name="discount[]" <?php if(in_array('41-50',$search['discount'] )){?> checked <?php } ?>>
										<div class="custom-control-label"> 41% To 50% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="submit_frm custom-control-input" value="51-100" name="discount[]" <?php if(in_array('51-100',$search['discount'] )){?> checked <?php } ?>>
										<div class="custom-control-label">  51% To Above </div>
									</label>
								</div>
								<!-- card-body.// -->   
							</div>
						</article>
						<?php foreach($modules as $module){
							$values=$this->Product_model->get_values_of_modules($module->id);
							?>
						<article class="filter-group">
							<header class="card-header">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_<?php echo $module->id?>" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title"><?php echo $module->module_name?> </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse__<?php echo $module->id?>" style="">
								<div class="card-body">
								<?php foreach($values as $value){
									$opt_val=$module->id.'=>'.$value->value;
									?>
									<label class="checkbox-btn">
										<input type="checkbox" name="values[]" value="<?php echo $opt_val;?>" class="submit_frm" <?php if(in_array($opt_val,$search['values'] )){?> checked <?php } ?>> <span class="btn btn-light"> <?php echo $value->value; ?> </span> </label>
								<?php } ?>
								</div>
								<!-- card-body.// -->
							</div>
						</article>
						<!-- filter-group .// --> 
						<?php } ?>
					</div>
					<!-- card.// -->
				</div>
				<div class="col-lg-9">
					<?php if(count($results)){?>
					<div class="product-topbar">
						<ul>
							<li class="product-view-wrap">
								<ul class="nav" role="tablist">
									<li class="grid-view" role="presentation">
										<a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true"> <i class="fa fa-th"></i> </a>
									</li>
								 
								</ul>
							</li>
							
							<li class="page-count">

							<span><?php echo ($search['no_of_records']*$search['pagi_number'])+(count($results));?></span> Product Found of <span><?php echo $count_results;?></span> </li>
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
						<div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
							<div class="product-grid-view row">
							<?php foreach($results as $result){   ?>
							 <div class="col-lg-4 col-sm-6 pt-6">
									<div class="product-item">
										<div class="product-img img-zoom-effect"> 
											<a href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>"> <img class="img-full" src="uploads/product/263X238/<?php echo $result->product_main_img;?>" alt="<?php echo $result->pro_name;?>"> </a> 
											<div class="product-add-action">
												<ul>
													<li>
														<a   href="javascript:void(0);" class="product_added_cart"    data-id="<?php echo $result->pro_id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->user_id;?>" > <i class="pe-7s-cart"></i> </a>
													</li>
													<!--<li>
														<a href="compare.php"> <i class="pe-7s-shuffle"></i> </a>
													</li>-->
													<li>
													<a  <?php if($login_user_info->id){?> href="javascript:void(0);" class=" add_to_wishlist main_product_wishlist wish_pro_<?php echo $result->detail_id;?>" <?php }else{ ?>   href="<?php echo LOGIN_URL ?>"  <?php } ?> data-id="<?php echo $result->pro_id;?>" data-did="<?php echo $result->detail_id;?>" data-sid="<?php echo $result->user_id;?>">
														 <?php if($result->wishlist_id){?>
														 <i class="fa fa-heart"></i>
														 <?php }else{?>
															<i class="pe-7s-like"></i>
														 <?php } ?>
													</a>
													 
													</li>
												</ul>
											</div>
										</div>
										<div class="product-content"> <a class="product-name" href="<?php echo PRODUCT_DETAIL?>/<?php echo $result->pro_alt?>/<?php echo base64_encode($result->detail_id)?>" title="<?php echo $result->pro_name;?>" ><?php  echo substr($result->pro_name,0,15);if(strlen($result->pro_name)>15){ echo '..';} ?></a>
											<div class="price-box pb-1"> <span class="new-price"><i class="<?php echo SIGN_ICON?>"></i> <?php echo $result->show_final_price;?></span> </div>
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
				</div>
			
			</div></form>
		</div>
	</div>
</main>