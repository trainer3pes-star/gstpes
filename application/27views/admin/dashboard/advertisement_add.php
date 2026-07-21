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
			  <li class="breadcrumb-item"><a href="Home/advertisement-list"><?php echo $this->lang->line('menu_advertisement_list');?></a></li>
              <li class="breadcrumb-item active"><?php echo $page_title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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
				 <?php echo form_open_multipart('admin/Home/save-advertisement', array('id' => 'master_frrm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	<div class="col-md-12">
<div class="row">
      <!-- Default box -->
	 
    <div class="col-md-6">
	  <div class="card"> 	   
        <div class="card-header">
          <h3 class="card-title"><?php echo $page_title;?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
           <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('language');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="language_id" id="language_id" class=" form-control select2 " style="width:100%;"  > 
		<?php foreach($languages as $language){?>
			<option value="<?php echo $language->id?>" <?php if($language->id == $result->language_id) echo 'selected="selected"'; ?>><?php echo $language->language_name;?></option>
		<?php } ?>
		</select> 
				   </div>
                </div>
           <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_title_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input   type="text" class="form-control required no_special  set_alais " name="name" id="name" value="<?php echo @$result->name?>">
				   </div>
                </div> 
				
			<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('admin_advertisement_description_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<textarea  class="form-control required      "  maxlength="255"  name="description" id="description" ><?php echo @$result->description?></textarea>
				   </div>
                </div>
				
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('admin_link_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input   type="text" class="form-control required  " name="ref_link" id="ref_link" maxlength="255" value="<?php echo @$result->ref_link?>">
				   </div>
                </div> 
			 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('admin_advertisement_from_date_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
					 	<input type="text" autocomplete="off" class="form-control singledate pull-left required"  readonly name="from_date" id="from_date" value="<?php if($result->from_date){ echo date('d-m-Y',strtotime($result->from_date)); }?>">
				   </div>
                </div> 
			 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('admin_advertisement_to_date_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
					 	<input type="text" autocomplete="off" class="form-control singledate pull-left required" readonly name="to_date" id="to_date" value="<?php if($result->to_date){ echo date('d-m-Y',strtotime($result->to_date)); }?>">
				   </div>
                </div> 
			 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_status_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="is_published" id="is_published_frm" class=" form-control select2 " style="width:100%;"> 
											<option value="1" <?php if(@$result->is_published=='1'){?> selected <?php } ?>><?php echo $this->lang->line('common_active_label');?></option>
											<option value="0" <?php if(@$result->is_published=='0'){?> selected <?php } ?>><?php echo $this->lang->line('common_inactive_label');?></option>
										</select> 
				   </div>
                </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="master_frrm"  style="<?php if(@$result->id){?> width:50%; <?php }else{ ?> width:100%; <?php  } ?>float:left" />
			<?php if(@$result->id){?>
			<a style="float:right;width:40%" class="btn btn-secondary" href="Home/pages-list"><?php echo $this->lang->line('common_close_btn');?></a>
			<?php } ?>
        </div>
        <!-- /.card-footer-->
      </div>
	  
      </div>
	
<div class="col-md-4">
<div class="card"> 	   
         
        <div class="card-body">
				 
           <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label"><?php echo $this->lang->line('common_image_lable');?> </label>
                    <div class="col-sm-11">
					<input type="hidden" name="banner" value="<?php echo @$result->banner ;?>" />
					<input data-class="profile" class="profile_photo allow_File_only <?php if(!$result->banner){?>required <?php } ?> up_file" data-file="image"  type="file"  name="photo" accept="image/gif, image/jpeg, image/png"/>
						<div class="col-sm-12 profile">
						<?php if(strlen(@$result->banner)){ $file_name=$result->banner;}else{ $file_name="no.png";}?>
							<img src="<?php echo base_url(); ?>uploads/adver/thumb/<?php echo $file_name;?>" class="thumbimage" />
						</div>
				   </div>
				    <div class="col-sm-1">
				   <a class="badge badge-danger cust-tooltip" title="<?php echo $this->lang->line('common_image_title');?>" style="color:#fff" >
          <i class="fas fa-question"></i>
        </a>
                </div>
				
			 
			 
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
	
</div>
</div>
	
	    </div></form> 
	<!-- /.card -->    </section>
    <!-- /.content -->
  </div>
 