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
    <div class="col-md-6">
	<?php echo form_open_multipart('admin/product/save_import_product', array('id' => 'master_frrm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
			
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product Category <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="category_id" id="category_id" class="form-control select2">  
						<?php foreach($parent_category as $parent_cat){?>
						<option data-margin="<?php echo $parent_cat->seller_standard_margin?>" value="<?php echo $parent_cat->id?>" <?php if(@$result->category_id==$parent_cat->id){?> selected <?php } ?> data-module="<?php echo $parent_cat->module_id?>"><?php echo $parent_cat->category_name;?></option>
						<?php } ?>					
						</select>
                    </div>
                </div>
				<div class="form-group row show_me "  >
                    <label for="inputEmail3" class="col-sm-4 col-form-label"> </label>
                    <div class="col-sm-8">
					<a href="javascript:void(0);" class="btn download_import_product   btn-warning"><?php echo $this->lang->line('language_download_csv_file');?></a>
				</div>
               </div>
			   
			    <div class="form-group row show_me" >
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('language_upload_csv_file');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
					 	<input data-file="xls"  type="file" class=" allow_File_only required up_file   " data-msg ="Required" name="csv_file" id="csv_file" value=""  accept=".xls">
					    </div>
                </div>
			
			
		 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">  
  			 <input type="button"  name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator   "   data-frm="master_frrm"  style="width:100%;float:right; " />
        </div>
        <!-- /.card-footer-->
      </div>
   
   <?php  echo form_close(); ?>
	<!-- /.card -->
</div>
    </section>
    <!-- /.content -->
  
  </div>
 