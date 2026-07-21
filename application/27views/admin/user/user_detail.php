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
              <li class="breadcrumb-item"><a href="User/site-user-list">Site User List</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
			
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url();?>uploads/users/thumb/<?php echo $result->profile_photo?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $result->name?></h3>

                <p class="text-muted text-center"><?php echo $result->role_name?>
				<br>
				<?php echo $result->desination_name?>
				<br>
				<?php if($result->is_active==1){?>
				Actived Account
				<br>
					<input type="button"  class="update_status_btn btn btn-success" data-id="<?php echo $result->id?>" data-module="user"  data-msg="<?php echo $this->lang->line('admin_msg_status_updated');?>" data-confirm-msg="<?php echo $this->lang->line('admin_msg_status_update_confirm');?>"  data-checked="0"   data-filed="is_active" value="Block User"> 
					 
				<?php }else{ ?>
				Inactived Account<br>
					<input type="button"  class="update_status_btn btn btn-danger" data-id="<?php echo $result->id?>" data-module="user"  data-msg="<?php echo $this->lang->line('admin_msg_status_updated');?>" data-confirm-msg="<?php echo $this->lang->line('admin_msg_status_update_confirm');?>"  data-checked="1"    data-filed="is_active" value="Unblock User">
				<?php } ?>
				
				</p> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas  fa-user-secret"></i> Contact Info</strong>

                <p class="text-muted">
				<?php echo $result->email; ?><br>
				<?php echo $result->mobile; ?>
				</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
				<?php $add_info=$this->User_model->get_user_address_info($result->id); 
				echo $add_info->address_one." ,";
				if(strlen($add_info->address_two)){
					echo "<br>".$add_info->address_one." ,";
				}
				echo "<br>".$add_info->near_landmark." ,";
				echo "<br>".$add_info->city_name." , ".$add_info->district_name." , ".$add_info->state_name." , ".$add_info->country_name." , ".$add_info->pincode;
				?> </p>
 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
				<?php 
				$k=0;
				foreach($company_lists as $company_list){?>
                  <li class="nav-item bg-indigo"><a class="nav-link <?php if($k==0){?> active <?php } ?>" href="#tab_<?php echo $company_list->id?>" data-toggle="tab"><?php echo $company_list->company_name?></a></li> 
				<?php $k++; } ?>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
				<?php
				$k=0;
				foreach($company_lists as $company_list){?>
                  <div class="<?php if($k==0){?> active <?php } ?> tab-pane" id="tab_<?php echo $company_list->id?>">
				  <div class="col-md-12">
				  <h5>About Company</h5>
				  </div>
                    <div class="col-md-12">
						<div class="row">
				<div class="col-md-12" style="text-align: right;margin-bottom: 15px;">
				<a class="btn btn-xs bg-lime" href="User/user-company-history/<?php echo $company_list->user_id?>/<?php echo $company_list->id?>" target="_blank"  title="View User Info ">  View History</a>
						<?php if($company_list->status==1){?>
					<input type="button"  class="update_status_btn btn btn-success" data-id="<?php echo $company_list->id?>" data-module="user_company_info"  data-msg="<?php echo $this->lang->line('admin_msg_status_updated');?>" data-confirm-msg="<?php echo $this->lang->line('admin_msg_status_update_confirm');?>"  data-checked="0"   data-filed="status" value="Block Company"> 
					 
				<?php }else{ ?>
					<input type="button"  class="update_status_btn btn btn-danger" data-id="<?php echo $company_list->id?>" data-module="user_company_info"  data-msg="<?php echo $this->lang->line('admin_msg_status_updated');?>" data-confirm-msg="<?php echo $this->lang->line('admin_msg_status_update_confirm');?>"  data-checked="1"    data-filed="status" value="Unblock Company">
				<?php } ?>
				</div>
							<div class="col-md-6">
								<label>Company Name :</label> <?php echo $company_list->company_name;?>
							</div>
							<div class="col-md-6">
								<label>Company Type :</label> <?php echo $company_list->comapny_type;?>
							</div>
							<div class="col-md-6">
								<label>Required credit facility? :</label> <?php if($company_list->credit_facility==1){ echo "Yes"; }else{ echo "No"; }?>
							</div>
							<div class="col-md-6">
								<label>Company Email Id :</label> <?php echo $company_list->company_email;?>
							</div>
							<div class="col-md-6">
								<label>Company Mobile Number :</label> <?php echo $company_list->company_mobile;?>
							</div>
							<div class="col-md-6">
								<label>Company Website :</label> <?php echo $company_list->company_website;?>
							</div>
							<div class="col-md-6">
								<label>Company GST No :</label> <?php echo $company_list->company_gst_no;?>
							</div>
							<div class="col-md-6">
								<label>Shop Act No :</label> <?php echo $company_list->shop_act_no;?>
							</div>
							<div class="col-md-6">
								<label> License  No :</label> <?php echo $company_list->company_license_no;?>
							</div>
							<div class="col-md-6">
								<label> Address Line 1 :</label> <?php echo $company_list->company_address_one;?>
							</div>
							<div class="col-md-6">
								<label> Address Line 2 :</label> <?php echo $company_list->company_address_two;?>
							</div>
							<div class="col-md-6">
								<label> Near by landmark :</label> <?php echo $company_list->company_near_landmark;?>
							</div>
							<div class="col-md-6">
								<label> State  :</label> <?php echo $company_list->state_name;?>
							</div>
							<div class="col-md-6">
								<label> District :</label> <?php echo $company_list->district_name;?>
							</div>
							<div class="col-md-6">
								<label> City :</label> <?php echo $company_list->city_name;?>
							</div>
							<div class="col-md-6">
								<label> Pincode :</label> <?php echo $company_list->company_pincode;?>
							</div>
						</div>
					</div>
                   <div class="col-md-12">
				   <hr>
				  <h5>Documents</h5>
				  </div>
				  <?php $documents=$this->User_model->get_company_document_list($result->id,$company_list->id);  ?>
				  <div class="col-md-12">
					<div class="row">
						<?php foreach($documents as $document){?>
						<div class="col-md-4">
							<a target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $document->file_name?>"><div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="color:#000"><?php echo ucwords(str_replace('_',' ',$document->document_name));?></span>
                 
              </div>
              <!-- /.info-box-content -->
            </div>
							</a>
							
						</div>
						<?php } ?>
					</div>
				  </div>
				  </div>
                  <!-- /.tab-pane -->
				<?php $k++; } ?>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  </div>
 