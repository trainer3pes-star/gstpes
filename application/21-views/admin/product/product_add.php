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
	 <div class="col-md-10">
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
      <!-- Default box -->
	  <?php echo form_open_multipart('admin/product/save-product', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class=" row">
    <div class="col-md-6">
			
	  <div class="card">
	  
        <div class="card-header">
          <h3 class="card-title"><?php echo $page_title;?></h3>
 
        </div>
       <div class="card-body">
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Name<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required no_special       " name="pro_name" id="pro_name" value="<?php echo @$result->pro_name?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Code <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required no_special no_space     " name="pro_code" id="pro_code" value="<?php echo @$result->pro_code?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">HSN Code <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required no_special no_space     " name="hsn_code" id="hsn_code" value="<?php echo @$result->hsn_code?>">
				   </div>
                </div>
				<div class="form-group row" >
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Company Name</label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control    " name="company_name" id="company_name" value="<?php echo @$result->company_name?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Method of Application</label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control           " name="method_application" id="method_application" value="<?php echo @$result->method_application?>">
				   </div>
                </div>
				
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Dosage</label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control   " name="dosage" id="dosage" value="<?php echo @$result->dosage?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Recommended Crop</label>
                    <div class="col-sm-8">
						<textarea class="form-control " name="recommended_crop" id="recommended_crop"  ><?php echo @$result->recommended_crop?></textarea>
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Targeted Pest / Disease / Weed</label>
                    <div class="col-sm-8">
						<textarea class="form-control " name="pest_disease_weed" id="pest_disease_weed"  ><?php echo @$result->pest_disease_weed?></textarea>
				   </div>
                </div>
				
<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Specification<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">  
						<select name="module_id[]" id="module_id"  multiple class=" form-control select2 required  " style="width:100%;"> 
						 
						<?php foreach($modules as $module){?>
						<option value="<?php echo $module->id?>" <?php if(in_array($module->id,$module_rs)){?> selected <?php } ?>><?php echo $module->module_name;?></option>
						<?php } ?>
						</select> 
				   </div>
                </div>	
				
				
				 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Is Scheme Product </label>
                    <div class="col-sm-8">
						<select name="is_scheme_product" id="is_scheme_product" class="  form-control select2 is_scheme_select" style="width:100%;"> 
							<option value="0" <?php if(@$result->is_scheme_product=='0'){?> selected <?php } ?>>No</option>
							<option value="1" <?php if(@$result->is_scheme_product=='1'){?> selected <?php } ?>>Yes</option>
						</select> 
				   </div>
                </div>
				<div class="form-group row scheme_div" style="display:none;">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Scheme Start Date<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="date" class="form-control   no_special no_chara no_space   scheme_input   " name="scheme_start_date" id="scheme_start_date" value="<?php echo @$result->scheme_start_date?>">
				   </div>
                </div>
				<div class="form-group row scheme_div" style="display:none;">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Scheme End Date<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="date" class="form-control   no_special no_chara no_space   scheme_input   " name="scheme_end_date" id="scheme_end_date" value="<?php echo @$result->scheme_end_date?>">
				   </div>
                </div>
				
				 <div class="form-group row scheme_div" style="display:none;">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Scheme Image <label style="color:#FF0000">*</label> </label>
                    <div class="col-sm-8">
					<input type="hidden" name="scheme_banner" value="<?php echo @$result->scheme_banner ;?>" />
					<input data-class="pro_scheme_image" class=" profile_photo allow_File_only <?php if($result->scheme_banner){}else{ ?>scheme_input <?php } ?>" data-file="image"  type="file"  name="sphoto" accept="  image/jpeg, image/png"/>
						<div class="col-sm-12 pro_scheme_image">
						<?php if(strlen(@$result->scheme_banner)){ $file_name=$result->scheme_banner;}else{ $file_name="no_image.png";}?>
							<img src="<?php echo base_url(); ?>uploads/product/110X124/<?php echo $file_name;?>" class="thumbimage" />	
						</div>
				   </div>
                </div>
				<?php if(($login_user_info->role_id > '1')&&($login_user_info->role_id < '6')){   ?>
						
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Under Company <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">  
						<select name="user_company_id[]" id="user_company_id"  multiple class=" form-control select2 required  " style="width:100%;"> 
						 
						<?php 
						$user_company_ids=explode(',',$result->user_company_id);
						foreach($user_companies as $user_company){?>
						<option value="<?php echo $user_company->id?>" <?php if(in_array($user_company->id,$user_company_ids)){?> selected <?php } ?>><?php echo $user_company->company_name;?></option>
						<?php } ?>
						</select> 
				   </div>
                </div>	
				<?php } ?>
		
				    
			  
        </div>
        <!-- /.card-body -->
        <div class="card-footer"> 
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
  			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="basic_frm"  style="width:100%;float:right" />
      </div>
        <!-- /.card-footer-->
      </div>
   
	<!-- /.card -->
</div> 
<div class="col-md-6">
	<div class="card"> 	   
         
        <div class="card-body">
		 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Is Active<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="is_active" id="is_active" class=" form-control select2 " style="width:100%;"> 
							<option value="1" <?php if(@$result->is_active=='1'){?> selected <?php } ?>><?php echo $this->lang->line('common_active_label');?></option>
							<option value="0" <?php if(@$result->is_active=='0'){?> selected <?php } ?>><?php echo $this->lang->line('common_inactive_label');?></option>
						</select> 
				   </div>
                </div>
<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Category<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="category_id" id="category_id" data-assign-to="module_id"  class=" form-control select2 required apply_margin assign_auto_modules" style="width:100%;"> 
						<option value="0" data-margin=""> Select Product Category</option>
						<?php foreach($parent_category as $parent_cat){?>
						<option data-margin="<?php echo $parent_cat->seller_standard_margin?>" value="<?php echo $parent_cat->id?>" <?php if(@$result->category_id==$parent_cat->id){?> selected <?php } ?> data-module="<?php echo $parent_cat->module_id?>"><?php echo $parent_cat->category_name;?></option>
						<?php } ?>
						</select> 
				   </div>
                </div>	
				 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Agriday Margin %<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required no_special no_space no_chara   " name="seller_standard_margin" id="seller_standard_margin" value="<?php echo @$result->seller_standard_margin?>">
				   </div>
                </div>

<div class="form-group row">
				<div class="col-sm-4">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">CGST<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-12">
						<input  type="text" class="form-control required no_special no_space no_chara allow_dot  " name="cgst" id="cgst" value="<?php echo @$result->cgst?>">
				   </div>
				   </div>
				   <div class="col-sm-4">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">SGST<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-12">
						<input  type="text" class="form-control required no_special no_space no_chara allow_dot  " name="sgst" id="sgst" value="<?php echo @$result->sgst?>">
				   </div>
				   </div>
				   <div class="col-sm-4">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">IGST<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-12">
						<input  type="text" class="form-control required no_special no_space no_chara allow_dot  " name="igst" id="igst" value="<?php echo @$result->igst?>">
				   </div>
				   </div>
                </div>
		
<div class="form-group row">
				<div class="col-sm-3 text-center">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">  Inclusive GST</label>
                    <div class="col-sm-12">
						<input  type="checkbox"   name="price_include_gst" id="price_include_gst" <?php if(@$result->price_include_gst){?> checked  <?php }?> value="1">
				   </div>
				   </div>
				   <div class="col-sm-3 text-center">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">Is Featured  </label>
                    <div class="col-sm-12">
						<input  type="checkbox"   name="featured_product" id="featured_product" <?php if(@$result->featured_product){?> checked  <?php }?> value="1">
				   </div>
				   </div>
				   <div class="col-sm-3 text-center">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">New Arrival</label>
                    <div class="col-sm-12 ">
						<input  type="checkbox"   name="new_arrival" id="new_arrival" <?php if(@$result->new_arrival){?> checked  <?php }?> value="1">
				   </div>
				   </div>
				   <div class="col-sm-3 text-center">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">Is Subsidized</label>
                    <div class="col-sm-12 ">
						<input  type="checkbox"   name="is_subsidized" id="is_subsidized" <?php if(@$result->is_subsidized){?> checked  <?php }?> value="1">
				   </div>
				   </div>
                </div>
				
				  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Main Image <label style="color:#FF0000">*</label><br><i class="small">Image Size : 645 X 555</i></label>
                    <div class="col-sm-8">
					<input type="hidden" name="product_main_img" value="<?php echo @$result->product_main_img ;?>" />
					<input data-class="pro_main_image" class="profile_photo allow_File_only <?php if($result->product_main_img){}else{ ?>required <?php } ?>" data-file="image"  type="file"  name="photo" accept="  image/jpeg, image/png"/>
						<div class="col-sm-12 pro_main_image">
						<?php if(strlen(@$result->product_main_img)){ $file_name=$result->product_main_img;}else{ $file_name="no_image.png";}?>
							<img src="<?php echo base_url(); ?>uploads/product/110X124/<?php echo $file_name;?>" class="thumbimage" />	
						</div>
				   </div>
                </div>
				
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Other Image <br><i class="small">Image Size : 645 X 555</i></label>
                    <div class="col-sm-8"> 
					<input data-class="other_img" class="profile_photo allow_File_only" data-file="image"  type="file"  name="other_photo[]" multiple accept="  image/jpeg, image/png"/>
						<div class="col-sm-12 other_img">
						<?php if(count($img_results)){ foreach($img_results as $img_result){ $file_name=$img_result->imeges; ?>
							<div class='thumb_outer_div'>
							<img src="<?php echo base_url(); ?>uploads/product/110X124/<?php echo $file_name;?>" class="thumbimage" />
							<a class='delete_me'>Delete</a>
							<input type='hidden' name='hidden_img_name[]' value='<?php echo $file_name;?>'>
							<input type='hidden' name='hidden_img_id[]' value='<?php echo $img_result->id;?>'>
							</div>
						<?php }}else{ ?>
							<img src="<?php echo base_url(); ?>uploads/product/110X124/no_image.png" class="thumbimage" />	
						<?php } ?>
						</div>
				   </div>
                </div>
			<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">Product Description<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-12">
						<textarea class="form-control editor_class required " name="pro_description" id="editor1"  ><?php echo @$result->pro_description?></textarea>
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">PDF File 1</label>
                    <div class="col-sm-8">
							<input  class="  allow_File_only" data-file="image"  type="file"  name="pdf_one" id="pdf_one"   accept=" .pdf"/>
							<input type="hidden" name="pdf_file_one" value="<?php echo $result->pdf_file_one;?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">PDF File 2</label>
                    <div class="col-sm-8">
						<input  class="  allow_File_only" data-file="image"  type="file"  name="pdf_two" id="pdf_two"   accept=" .pdf"/>
						<input type="hidden" name="pdf_file_two" value="<?php echo $result->pdf_file_two;?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">PDF File 3</label>
                    <div class="col-sm-8">
						<input  class="  allow_File_only" data-file="image"  type="file"  name="pdf_three" id="pdf_three"   accept=" .pdf"/>
						<input type="hidden" name="pdf_file_three" value="<?php echo $result->pdf_file_three;?>">
				   </div>
                </div>
	 
			 
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
	 
</div>	  
 </div>

<?php  echo form_close(); ?>
    </section>
    <!-- /.content -->
  
  </div>
 