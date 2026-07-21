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
											<input type="text" class="form-control submit_frm" placeholder="Search By Product Name" name="search_query" id="search_query">
											<div class="input-group-append">
												<button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
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
										<input type="hidden" name="category_id"  id="category_id" value="">
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
										<input type="checkbox"  class="custom-control-input submit_frm " value="1" name="is_subsidized_yes">
										<div class="custom-control-label">Subsidized </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input submit_frm" value="0" name="is_subsidized_no">
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
											<input class="form-control submit_frm  assign_price" placeholder="0" type="number" min="0" name="min_price"> </div>
										<div class="form-group text-right col-md-6">
											<label>Max</label>
											<input class="form-control assign_price submit_frm" placeholder="1,0000" type="number" min="0" name="max_price"> </div>
									</div>
									<!-- form-row.// -->
									<button class="btn btn-block btn-primary">Apply</button>
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
										<input type="checkbox"  class="custom-control-input"   value="0-10" name="discount[]">
										<div class="custom-control-label"> 0% To 10% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input" value="11-20" name="discount[]">
										<div class="custom-control-label"> 11% To 20% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input" value="21-30" name="discount[]">
										<div class="custom-control-label"> 21% To 30% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input" value="31-40" name="discount[]">
										<div class="custom-control-label"> 31% To 40% </div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox"  class="custom-control-input" value="41-50" name="discount[]">
										<div class="custom-control-label"> 41% To 50% </div>
									</label>
								</div>
								<!-- card-body.// -->   
							</div>
						</article>
						
						<article class="filter-group">
							<header class="card-header">
								<a href="#." data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Sizes </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_4" style="">
								<div class="card-body">
									<label class="checkbox-btn">
										<input type="checkbox"> <span class="btn btn-light"> XS </span> </label>
									<label class="checkbox-btn">
										<input type="checkbox"> <span class="btn btn-light"> SM </span> </label>
									<label class="checkbox-btn">
										<input type="checkbox"> <span class="btn btn-light"> LG </span> </label>
									<label class="checkbox-btn">
										<input type="checkbox"> <span class="btn btn-light"> XXL </span> </label>
								</div>
								<!-- card-body.// -->
							</div>
						</article>
						<!-- filter-group .// --> 
					</div>
					<!-- card.// -->
				</div>
				<div class="col-lg-9">
					<div class="product-topbar">
						<ul>
							<li class="product-view-wrap">
								<ul class="nav" role="tablist">
									<li class="grid-view" role="presentation">
										<a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true"> <i class="fa fa-th"></i> </a>
									</li>
								 
								</ul>
							</li>
							<li class="page-count"> <span>23</span> Product Found of <span>50</span> </li>
							<li class="short">
								<select class="nice-select wide rounded-0" name="sort_by" id="sort_by">
									<option value="1">Sort by Default</option>
									<option value="2">Sort by Popularity</option>
									<option value="3">Sort by Rated</option>
									<option value="4">Sort by Latest</option>
									<option value="5">Sort by High Price</option>
									<option value="6">Sort by Low Price</option>
								</select>
							</li>
						</ul>
					</div>
					<div class="tab-content text-charcoal pt-8">
						<div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
							<div class="product-grid-view row">
							<?php foreach($results as $result){?>
							 <div class="col-lg-3 col-sm-6 pt-6">
									<div class="product-item">
										<div class="product-img img-zoom-effect">
											<a href="single-product.php"> <img class="img-full" src="assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images"> </a>
											<div class="product-add-action">
												<ul>
													<li>
														<a href="cart.php"> <i class="pe-7s-cart"></i> </a>
													</li>
													<li>
														<a href="compare.php"> <i class="pe-7s-shuffle"></i> </a>
													</li>
													<li>
														<a href="wishlist.php"> <i class="pe-7s-like"></i> </a>
													</li>
												</ul>
											</div>
										</div>
										<div class="product-content"> <a class="product-name" href="single-product.php">Cow Milk & Meat</a>
											<div class="price-box pb-1"> <span class="new-price">80.00 Rs</span> </div>
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
					<div class="pagination-area pt-10">
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous"> <span class="fa fa-chevron-left"></span> </a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next"> <span class="fa fa-chevron-right"></span> </a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			
			</div></form>
		</div>
	</div>
</main>