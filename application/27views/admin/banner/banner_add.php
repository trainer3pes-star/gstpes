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
	  <?php echo form_open_multipart('admin/home/save-banner', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class=" row">
    <div class="col-md-6">
			
	  <div class="card">
	  
        <div class="card-header">
          <h3 class="card-title"><?php echo $page_title;?></h3>
 
        </div>
       <div class="card-body">
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Banner Heading<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required    " name="banner_heading" id="banner_heading" maxlength="200"  value="<?php echo @$result->banner_heading?>">
				   </div>
                </div> 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Banner Info<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required    " name="banner_info" id="banner_info" maxlength="200"  value="<?php echo @$result->banner_info?>">
				   </div>
                </div> 
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Banner Link<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required    " name="banner_link" id="banner_link" maxlength="200"  value="<?php echo @$result->banner_link?>">
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Is Active<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="is_active" id="is_active" class=" form-control select2 " style="width:100%;"> 
							<option value="1" <?php if(@$result->is_active=='1'){?> selected <?php } ?>><?php echo $this->lang->line('common_active_label');?></option>
							<option value="0" <?php if(@$result->is_active=='0'){?> selected <?php } ?>><?php echo $this->lang->line('common_inactive_label');?></option>
						</select> 
				   </div>
                </div>
<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Banner Type</label>
                    <div class="col-sm-8">
						<select name="banner_type" id="banner_type" class=" form-control select2 " style="width:100%;"> 
						<option value="top_slider"> Home Top Slider</option> 
						</select> 
				   </div>
                </div>	
				 
				
				  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"> Banner  <br><i class="small">Image Size : 1920 X 680</i></label>
                    <div class="col-sm-8">
					<input type="hidden" name="banner_img" value="<?php echo @$result->banner_img ;?>" />
					<input data-class="profile" class=" <?php if($result->id){}else{?> required <?php } ?>  profile_photo allow_File_only up_file" data-file="image"  type="file"  name="photo" accept="image/gif, image/jpeg, image/png"/>
						<div class="col-sm-12 profile">
						<?php if(strlen(@$result->banner_img)){ $file_name=$result->banner_img;}else{ $file_name="no_image.jpg";}?>
							<img src="<?php echo base_url(); ?>uploads/banner/thumb/<?php echo $file_name;?>" class="thumbimage" />
						</div>
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
 