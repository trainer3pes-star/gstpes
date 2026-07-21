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
			  <li class="breadcrumb-item"><a href="Home/pages-list"><?php echo $this->lang->line('menu_page_list');?></a></li>
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
<div class="row">
      <!-- Default box -->
	   <div class="col-md-12">
	   
       
	 
    <div class="col-md-6">
	<?php echo form_open_multipart('admin/Home/save-setting', array('id' => 'master_frrm_two','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class="card"> 	   
        <div class="card-header">
          <h3 class="card-title">Default Setting</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body"> 
			  
			  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"> Databse Backup @12 AM<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-7">
						  <input type="checkbox" name="take_db_backup_1"  value="1" <?php if(@$result->take_db_backup_1==1){?> checked <?php } ?> data-bootstrap-switch>
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"> Databse Backup @8 AM<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-7">
						  <input type="checkbox" name="take_db_backup_2" value="1" <?php if(@$result->take_db_backup_2==1){?> checked <?php } ?> data-bootstrap-switch  data-on-color="success">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"> Databse Backup @4 PM<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-7">
						  <input type="checkbox" name="take_db_backup_3" value="1" <?php if(@$result->take_db_backup_3==1){?> checked <?php } ?> data-bootstrap-switch data-on-color="danger" >
				   </div>
                </div>
				
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"> </label>
                    <div class="col-sm-7">
						  <a href="Cron/get_back_up_download" class="btn btn-small btn-warning">Take Backup and download</a>
				   </div>
                </div>
				 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="master_frrm_two"  style="  width:100%; " />
			 
        </div>
        <!-- /.card-footer-->
      </div>
	  </form>
      </div>
	   
	    </div>
	    </div>
	    </div>
	<!-- /.card -->    </section>
    <!-- /.content -->
  </div>
 