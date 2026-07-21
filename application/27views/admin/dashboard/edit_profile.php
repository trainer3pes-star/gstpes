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
	  <?php echo form_open_multipart('admin/home/save_profile', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class=" row">
    <div class="col-md-6">
			
	  <div class="card">
	  
        <div class="card-header">
          <h3 class="card-title"><?php echo $page_title;?></h3>
 
        </div>
       <div class="card-body">
           <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">First Name<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input data-id="<?php echo @$result->id?>" data-module="User" type="text" class="form-control required no_special no_space  " name="f_name" id="f_name" value="<?php echo @$result->f_name?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input data-id="<?php echo @$result->id?>" data-module="User" type="text" class="form-control required no_special no_space  " name="l_name" id="l_name" value="<?php echo @$result->l_name?>">
				   </div>
                </div>
			<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_email_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input data-id="<?php echo @$result->id?>" data-module="User" readonly type="text" class="form-control required email_valide no_space  " name="email" id="email" value="<?php echo @$result->email?>">
				   </div>
                </div>
			<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('common_phone_label');?><label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input data-id="<?php echo @$result->id?>" data-module="User"  type="text" maxlength="15" class="form-control required  no_chara no_space no_special   " name="mobile" id="mobile" value="<?php echo @$result->mobile?>">
				   </div>
                </div> 
				 
			  
        </div>
        <!-- /.card-body -->
        <div class="card-footer"> 
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
  			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="basic_frm"  style="width:100%;float:right" />
<input type="hidden" value="<?php echo $this->lang->line('change_password_js_error_msg');?>" id="js_error_match">			
        </div>
        <!-- /.card-footer-->
      </div>
   
	<!-- /.card -->
</div> 
<div class="col-md-6">
	<div class="card"> 	   
         
        <div class="card-body">
				  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $this->lang->line('user_profile_photo_label');?> </label>
                    <div class="col-sm-8">
					<input type="hidden" name="profile_photo" value="<?php echo @$result->profile_photo ;?>" />
					<input data-class="profile" class="profile_photo allow_File_only" data-file="image"  type="file"  name="photo" accept="image/gif, image/jpeg, image/png"/>
						<div class="col-sm-12 profile">
						<?php if(strlen(@$result->profile_photo)){ $file_name=$result->profile_photo;}else{ $file_name="avatar.jpg";}?>
							<img src="<?php echo base_url(); ?>uploads/users/thumb/<?php echo $file_name;?>" class="thumbimage" />
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
 