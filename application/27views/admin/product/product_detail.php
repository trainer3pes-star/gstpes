 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
			 <li class="breadcrumb-item"><a href="Home"><?php echo $this->lang->line('dashboard_page_title');?></a></li>
              <li class="breadcrumb-item active"><?php echo $page_title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $result->pro_name;?></h3>
              <div class="col-12">
                <img id="run_time_chnage_image" src="<?php echo base_url().'uploads/product/'.$result->product_main_img?>" class="product-image" alt="<?php echo $result->pro_name;?>">
              </div>
              <div class="col-12 product-image-thumbs">
			  <div class="product-image-thumb  "><img  class="show_run_image" src="<?php echo base_url().'uploads/product/110X124/'.$result->product_main_img?>" alt="<?php echo $result->pro_name;?>"  data-img="<?php echo base_url().'uploads/product/'.$result->product_main_img?>"></div> 
			  <?php foreach($img_results as $img_result){?>
                <div class="product-image-thumb  "><img class="show_run_image" src="<?php echo base_url().'uploads/product/110X124/'.$img_result->imeges?>" alt="<?php echo $result->pro_name;?>"  data-img="<?php echo base_url().'uploads/product/'.$img_result->imeges?>"> </div> 
			  <?php } ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
			<?php  if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){  ?>
			<select id="select_seller" class="form-control select2">
			<option data-url="Product/product-detail/<?php echo $result->id;?>" >Select User</option>
				<?php foreach($assign_users as $assign_user){?>
				<option data-url="Product/product-detail/<?php echo $result->id;?>/<?php echo $assign_user->id;?>" value="<?php echo $assign_user->id;?>" <?php if($uid==$assign_user->id){?> selected <?php } ?> ><?php echo $assign_user->name;?></option>
				<?php } ?>
			</select>
			<?php } ?>
              <h3 class="my-3"><?php echo $result->pro_name;?> - <?php echo $result->pro_code;?></h3>
              <p>Category - <?php echo $result->category_name;?></p>
              <p>Company - <?php echo $result->company_name;?></p>
              <p>Method of Application - <?php echo $result->method_application;?></p>
              <p>Dosage - <?php echo $result->dosage;?></p>
              <p>Seller Margin - <?php echo $result->seller_standard_margin.'%';?></p>

              <hr>
               <?php 
			   $module_name=array();
			   foreach($assign_modules  as $assign_module){
				   $module_name[]=$assign_module->module_name;
			   }?>
              <h4 class="mt-3"><?php echo implode('-',$module_name);?>  </h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
			  <?php foreach($variations as $variation){
				  $dis_ribbin="";
				  if($variation->discount_amount){
					  if($variation->discount_type=='per'){
						  $dis_ribbin=$variation->discount_amount.' % OFF';
					  }else{
						 $dis_ribbin=$variation->discount_amount.' /- OFF'; 
					  }
				  }
				  if($variation->product_img==""){
					  $variation->product_img=$result->product_main_img;
				  }
				  ?>
                <label class="btn btn-default text-center btn-success auto_update" data-fprice="<?php echo $variation->final_price;?>" data-sfprice="<?php echo $variation->show_final_price;?>"  data-dprice="<?php echo $variation->discount_amount;?>" data-cgst="<?php echo $variation->cgst_per;?>" data-sgst="<?php echo $variation->sgst_per;?>" data-igst="<?php echo $variation->igst_per;?>" data-discountlable="<?php echo $dis_ribbin?>" data-img="<?php echo base_url().'uploads/product/'.$variation->product_img?>">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <?php echo $variation->value;?>
                </label>
			  <?php } ?>
              </div>

              <div class="bg-gray py-2 px-3 mt-4 show_here_data" style="display:none;">
                <h2 class="mb-0">
                  RS<span class="show_final_price"></span> &nbsp;
                   <del><span class="final_price"></span></del>
				   
                </h2><span class="discount_ribbon"></span>
                <h4 class="mt-0">
                  <small>CGST: <span class="cgst_per"></span>% </small>
                  <small>SGST: <span class="cgst_per"></span>% </small>
                  <small>IGST: <span class="cgst_per"></span>% </small>
                </h4>
              </div>
 
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Recommended Crop</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Targeted Pest / Disease / Weed</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">  <?php echo $result->pro_description;?> </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><?php echo $result->recommended_crop;?> </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> <?php echo $result->pest_disease_weed;?> </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
 
 
  <div class="modal fade" id="modal-llg">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Scheme Product Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body scheme_product_body">
              
            </div>
            <div class="modal-footer justify-content-between"> 
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     