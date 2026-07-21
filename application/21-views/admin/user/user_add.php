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
	  <?php echo form_open_multipart('admin/user/save-user', array('id' => 'admin_user_basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class=" row">
    <div class="col-md-6">
			
	  <div class="card">
	  
        <div class="card-header">
          <h3 class="card-title">Basic Info</h3>
 
        </div>
       <div class="card-body">
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">First Name <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required   no_space  no_special no_number " name="f_name" id="f_name" value="<?php echo @$result->f_name?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required   no_space  no_special no_number " name="l_name" id="l_name" value="<?php echo @$result->l_name?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Mobile Number<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required no_special no_space no_chara   " name="mobile" id="mobile" value="<?php echo @$result->mobile?>" maxlength="10">
				   </div>
                </div>
				
<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Select Role<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="role_id" id="role_id" class=" form-control select2 required" style="width:100%;"> 
						<option value="0"> Select Role</option>
						<?php foreach($roles as $role){ 
							?>
						<option value="<?php echo $role->id?>" <?php if(@$result->role_id==$role->id){?> selected <?php } ?>><?php echo $role->name;?></option>
						<?php }  ?>
						</select> 
				   </div>
                </div>	
				  
			  
        </div> 
      </div>
   
	<!-- /.card -->
</div> 

<div class="col-md-6">
	<div class="card"> 	   
         <div class="card-header">
          <h3 class="card-title">Login Info</h3>
 
        </div>
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input  type="text" class="form-control required   no_space email_valide " name="email" id="email" value="<?php echo @$result->email?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Password <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input type="password" placeholder="Password" name="password" id="password" class="form-control required password_validate  " maxlength="12" value="<?php echo base64_decode($result->org_password)?>">
				   </div>
                </div>
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Confirm Password <label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" class="form-control required  password_validate same_to_same" data-input="password" maxlength="12" data-msg="Password and confirm password not match" value="<?php echo base64_decode($result->org_password)?>">
				   </div>
                </div>
			 
			 
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
	 
</div>	  
    <div class="col-md-12">
			
	  <div class="card">
	  <?php $assign_per=explode(',',$assign_per->permission_id); 
	  ?>
        <div class="card-header">
          <h3 class="card-title">Select User Assign Permission </h3>
		 <div class="col-sm-3" style="float:right"> 
	   <label for="inputEmail3" class="col-sm-12 col-form-label"><input type="checkbox"  value="1" class="check_all"> Check All </label>
        </div> 
        </div>
       <div class="card-body"> 
	   <div class="row col-md-12">
	   <?php foreach($permissions as $permission){?>
	   <div class="col-sm-3"> 
	   <label for="inputEmail3" class="col-sm-12 col-form-label"><input type="checkbox" name="permission_ids[<?php echo $permission->id;?>]" class="sub_checkbox"  value="<?php echo $permission->function_name;?>" <?php if(in_array($permission->id,@$assign_per)){?> checked <?php } ?>> <?php echo $permission->display_name;?> </label>
        </div>  
	   <?php } ?>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="text-align: center;"> 
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
			<input type="hidden" id="profile_photo" name="profile_photo" value="<?php echo @$result->profile_photo ;?>" />
  			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="admin_user_basic_frm"  style="width:200px;" />
      </div>
        <!-- /.card-footer-->
      </div>
   
	<!-- /.card -->
</div> 

		</div>

<?php  echo form_close(); ?>
    </section>
    <!-- /.content -->
  
  </div>
 