<main class="main-content">
	<div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-lg-12">
					<div class="breadcrumb-item">
						<h2 class="breadcrumb-heading">Search Categories</h2>
						<ul>
							<li> <a href="Home">Home <i class="pe-7s-angle-right"></i></a> </li>
							<?php 
								foreach($breadcomes as $breadcome){
							?>
							<li> <a href="<?php echo CATEGORY_LIST.'/'.base64_decode($breadcome->category_name);?>"><?php echo $breadcome->category_name;?> <i class="pe-7s-angle-right"></i></a> </li> 
								<?php } ?>
							<li>Category List</li> 
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="shop-area section-space-y-axis-100">
		<div class="container">
		<form method="post" name="admin_frm" id="admin_frm" class="search_frm" action="<?php echo CATEGORY_LIST;?>">
			<div class="row"> 
				<div class="col-lg-3">
					<div class="card"> 
						<article class="filter-group">
							<header class="card-header">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_product" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
									<h5 class="title">Search Category </h5> </a>
							</header>
							<div class="filter-content collapse show" id="collapse_product" style="">
								<div class="card-body">
									<div class="pb-3">
										<div class="input-group">
											<input type="text" class="form-control submit_change" placeholder="Search By Category" name="search_query" id="search_query" value="<?php echo $search['search_query']?>">
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
										<div style="text-align:right"> <a href="<?php echo CATEGORY_LIST;?>">Clear All</a></div>
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
						
					</div>
					<!-- card.// -->
				</div>
				<div class="col-lg-9">
					<?php if(count($results)){?>
					 <div class="tab-content text-charcoal pt-8">
						<div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
							<div class="product-grid-view row">
							<?php foreach($results as $result){ 
							$href=CATEGORY_LIST.'/'.base64_encode($result->id);
							if($result->total_cnt>1){
								$href=PRODUCT_LIST.'/'.base64_encode($result->id);
							}
							?>
							 <div class="col-lg-3 col-sm-6 pt-6">
									<div class="product-item">
										<div class="product-img img-zoom-effect"> 
											<a href="<?php echo $href?>"> <img class="img-full" src="uploads/product/110X124/<?php echo $result->category_main_img;?>" alt="<?php echo $result->category_name;?>"> </a> 
										 
										</div>
										<div class="product-content"> <a class="product-name" href="<?php echo $href?>" title="<?php echo $result->category_name;?>" ><?php  echo substr($result->category_name,0,15);if(strlen($result->category_name)>15){ echo '..';} ?></a>
											<div class="price-box pb-1"> <span title="<?php echo $result->short_notes;?>"  > 
<?php  echo substr($result->short_notes,0,35);if(strlen($result->short_notes)>35){ echo '..';} ?>
											 </span> </div>
											 
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
									<span>  No Category Found    </span> 
								</li> 
							</ul>
					</div>
					
					<?php  } ?>
				</div>
			
			</div></form>
		</div>
	</div>
</main>