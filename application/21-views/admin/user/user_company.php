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
     <div class="col-md-2"></div>
	  <div class="col-md-8">
	<?php echo form_open_multipart('admin/User/user-company/'.$uresult->id, array('id' => 'basic_search','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  
      </div>
    </div>
	<!-- /.card -->
<div class="row">
      <!-- Default box -->
    <div class="col-md-12">
	<div class="card">
        <div class="card-header">
		 

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
		 	  	   
<?php if($this->Home_model->check_permission('1','PExport')){?>
<div class="col-sm-2" style="float:right;"> 
				<input data-frm="basic_search" type="button" name="export" id="export_excel" value="<?php echo $this->lang->line('common_export_btn');?>" class="btn btn-default" style="width:100%;float:right" />
			</div>
		  <?php } ?>
        </div>
		<?php if($this->Home_model->check_permission('1','PList')){?>
        <div class="card-body">
           <table id="example_php" class="table table-bordered table-striped col-xs-12" >
								<thead>
									<tr >
										<th>#</th>
										  
										<th> Company Name</th>
										<th> Company Type</th>
										<th> Company Logo</th>
										<th> Status</th>
										<th> Credit Facility</th>
										<th> AF</th>
										<th> View Details</th>
										<th> View Documents</th>
										<th> View Approval History</th>
										<th> Send to Bank for Approval</th>
										<th> Send Reply to Customer </th>
										  <?php  
			if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){ ?>
			<th> Update Status</th>
			<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
										<td><?php echo ($search['no_of_records']*$search['pagi_number'])+$i++ ; ?></td>
										<td><?php echo $result->company_name;?></td> 
										<td><?php echo $result->comapny_type;?></td>  
										<td>
										 <img src="<?php echo base_url();?>uploads/users/thumb/<?php echo $result->company_logo;?>" width="50px" title="<?php echo $result->company_name;?>">
										</td>  
										<td><?php if($result->status==0){ echo "Pending";}else{ echo "Approved";} ?></td>   
										<td><?php if($result->credit_facility==0){ echo "No";}else{ echo "Yes";} ?></td>   
										<td><?php echo $result->create_from;?></td>   
										 
										  
										<td><a target="_blank" class="btn btn-xs btn-success" href="User/user-detail/<?php echo $result->user_id?>"  title="View User Info "><i class="fas fa-eye "></i></a></td>
										
										<td><a class="btn btn-xs bg-fuchsia  " href="User/user-documents/<?php echo $result->user_id?>/<?php echo $result->id?>"  title="View Documents "><i class="fas fa-file "></i></a></td>
										
										<td><a  target="_blank"  class="btn btn-xs bg-lime" href="User/user-company-history/<?php echo $result->user_id?>/<?php echo $result->id?>"  title="View User Info ">  View History</a></td>
										<td>
										<?php  if($result->credit_facility=='1'){?>
										<a class="btn btn-xs btn-info send_bank_model" href="javascript:void(0);" company_id="<?php echo $result->id?>" user_id="<?php echo $result->user_id?>" data-compnay-name="<?php echo $result->company_name;?>" title="View User Info "> Send To Bank Approval</a>
										<?php } ?>
										</td>
										<td>
										<a class="btn btn-xs btn-warning btn_send_customer_model" href="javascript:void(0);" company_id="<?php echo $result->id?>" user_id="<?php echo $result->user_id?>" data-compnay-name="<?php echo $result->company_name;?>" title=" Send To Customer  "> Send To Customer  </a></td>
										 <?php  
			if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){ ?>
			<td><input type="checkbox" value="1"  data-msg="<?php echo $this->lang->line('admin_msg_status_updated');?>" data-confirm-msg="<?php echo $this->lang->line('admin_msg_status_update_confirm');?>"  class=" update_status " data-id="<?php echo $result->id?>" data-module="user_company_info"  data-filed="status" <?php if(@$result->status){?> checked <?php } ?>></td>
			<?php } ?>
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
							
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
	 
        </div>
        <!-- /.card-footer-->
		<?php }else{ ?> 
		<center><h1 style="color:red">Permission Denied</h1></center>
		<?php }?>
      </div>
	</div>
</div>
    </form> </section>
    <!-- /.content -->
  </div>
  
  