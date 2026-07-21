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
	<?php echo form_open_multipart('admin/home/save_pwd', array('id' => 'master_frrm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
			
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('change_password_label_new');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input name="new_password" id="new_password" class="form-control required confirm_pwd password_validate" data-module="master" placeholder="" data-id="1" maxlength="15" data-msg="<?php echo $this->lang->line('change_password_label_new');?>" type="password">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('change_password_label_confirm');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input class="form-control required confirm_pwd password_validate" type="password" name="confirm_password"id="confirm_password" placeholder="" onfocusout="confirm_pwd();" >
                    </div>
                </div>
			
		 
        </div>
        <!-- /.card-body -->
        <div class="card-footer"> 
			<input type="hidden" id="id" name="id" value="<?php echo @$login_user_info->id ;?>" />
  			<input class="btn btn-block btn-info btn_validator" type="button"  value="<?php echo $this->lang->line('common_save_btn');?>"   data-frm="master_frrm" onclick="confirm_pwd();" >
			
<input type="hidden" value="<?php echo $this->lang->line('change_password_js_error_msg');?>" id="js_error_match">			
        </div>
        <!-- /.card-footer-->
      </div>
   
   <?php  echo form_close(); ?>
	<!-- /.card -->
</div>
    </section>
    <!-- /.content -->
  
  </div>
 