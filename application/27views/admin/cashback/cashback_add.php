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
	  <?php echo form_open_multipart('admin/master/save-cashback', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class=" row">
    <div class="col-md-6">
			
	  <div class="card">
	  
        <div class="card-header">
          <h3 class="card-title"><?php echo $page_title;?></h3>
 
        </div>
       <div class="card-body">
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Cashback Title<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required    " name="cashback_title" id="cashback_title" maxlength="200"  value="<?php echo @$result->cashback_title?>">
				   </div>
                </div> 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Start Date<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required    " name="from_date" id="from_date" maxlength="200"  value="<?php echo @$result->from_date?>">
				   </div>
                </div> 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">End Date<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required    " name="to_date" id="to_date" maxlength="200"  value="<?php echo @$result->to_date?>">
				   </div>
                </div>  
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Discount Type In <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-4">
						<input type ="radio" name="discount_type" value="amt" <?php if(@$result->id){  if(@$result->discount_type=='amt'){?> checked <?php } }else{ ?> checked <?php } ?>> In Amount
				   </div>
				    <div class="col-sm-4">
						<input type ="radio" name="discount_type" value="per" <?php if(@$result->discount_type=='per'){?> checked <?php } ?>> In Percentage
				   </div>
                </div> 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount/Percentage<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required  no_space no_chara no_special  " name="amount" id="amount" maxlength="200"  value="<?php echo @$result->amount?>">
				   </div>
                </div> 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Min Purchase Price<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required  no_space no_chara no_special  " name="min_purchase_amount" id="min_purchase_amount" maxlength="200"  value="<?php echo @$result->min_purchase_amount?>">
				   </div>
                </div>  
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Upper Bound Limit<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required  no_space no_chara no_special  " name="upper_bound_limit" id="upper_bound_limit" maxlength="200"  value="<?php echo @$result->upper_bound_limit?>">
				   </div>
                </div>  
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Remark</label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control      " name="remark" id="remark" maxlength="200"  value="<?php echo @$result->remark?>">
				   </div>
                </div> 
				 
				   
			  
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Is Active <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="is_active" id="is_active" class=" form-control select2 " style="width:100%;"> 
							<option value="1" <?php if(@$result->is_active=='1'){?> selected <?php } ?>><?php echo $this->lang->line('common_active_label');?></option>
							<option value="0" <?php if(@$result->is_active=='0'){?> selected <?php } ?>><?php echo $this->lang->line('common_inactive_label');?></option>
						</select> 
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Use Time <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="use_time" id="use_time"   class=" form-control select2 show_hide_respective" style="width:100%;"> 
						<option value="1" <?php if(@$result->use_time==1){ ?> selected <?php } ?>> One Time Use</option> 
						<option value="2" <?php if(@$result->use_time==2){ ?> selected <?php } ?>> Multi  Time Use</option> 
						</select> 
				   </div>
                </div>	
				 <div class="form-group row  user_time_div" style="display:none;" >
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Multi Use Time <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="multi_user_time" id="multi_user_time" class=" form-control select2 " style="width:100%;"> 
						<option value="1" <?php if(@$result->multi_user_time==1){ ?> selected <?php } ?>> One Time For one User</option> 
						<option value="2" <?php if(@$result->multi_user_time==2){ ?> selected <?php } ?>> Multi  Time For One User</option> 
						</select> 
				   </div>
                </div>	
				 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Cashback For <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="cashback_for" id="cashback_for" class=" form-control select2 cashback_for " style="width:100%;"> 
						<option value="1" <?php if(@$result->cashback_for==1){ ?> selected <?php } ?>> All Category</option> 
						<option value="2" <?php if(@$result->cashback_for==2){ ?> selected <?php } ?>> Specific Categories</option> 
						<option value="3" <?php if(@$result->cashback_for==3){ ?> selected <?php } ?>> Specific Products</option> 
						</select> 
				   </div>
                </div>	
				
				<div class="form-group row category_div" style="display:none;" >
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Categories <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">  
						<select name="category_id[]" id="category_id" class=" form-control select2 "  multiple  style="width:100%;"> 
						<?php foreach($categories as $category){?>
						<option value="<?php echo $category->id;?>" <?php if(in_array($category->id,explode(',',$assign_categories->category_id))){?> selected <?php } ?>><?php echo $category->category_name;?></option> 
						<?php } ?>
						</select> 
				   </div>
                </div>	
				<div class="form-group row product_div" style="display:none;" >
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Products <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="product_id[]" id="product_id" class=" form-control select2  "  multiple  style="width:100%;"> 
						<?php foreach($products as $product){?>
						<option value="<?php echo $product->id;?>" <?php if(in_array($product->id,explode(',',$assign_products->product_id))){?> selected <?php } ?> ><?php echo $product->pro_name;?></option> 
						<?php } ?>
						</select> 
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
 