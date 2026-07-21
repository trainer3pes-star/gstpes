 <div class="content-wrapper"> 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $this->lang->line('dashboard_page_title');?></h1>
          </div> 
          
        </div> 
      </div> 
    </div>  
	<section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button> 
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
<div class="container-fluid"> <div class="row ">
	<?php if($this->Home_model->check_permission('1','PList')){ ?>
	 <div class=" col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Users</b></span>
                 <span class="info-box-number"> <?php echo $result['total_users']?> </span> 
              </div> 
            </div> 
          </div> 
	<?php } ?>
	<?php if($this->Home_model->check_permission('4','PList')){ ?>
	<div class=" col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Contacts</b></span>
                  <span class="info-box-number"> <?php echo $result['total_contact']?> </span> 
              </div> 
            </div> 
          </div> 
	<?php } ?>	
	
	<?php if($this->Home_model->check_permission('5','PList')){ ?>
	<div class=" col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Leads</b></span>
                <span class="info-box-number"> <?php echo $result['total_lead']?> </span>  
              </div> 
            </div> 
          </div> 
	<?php } ?>	
	<?php if($this->Home_model->check_permission('5','Pcontact')){ ?>	
	
	
		
		
			<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-black elevation-1"><i class="fas fa-phone-alt"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>Todays </b> </span> 
                   <span class="info-box-number"><b>  Call Leads : </b><?php echo $result['today_call_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Call   : </b><?php echo $result['today_done_call_lead']?> </span>  
                   <span class="info-box-number"><b>  Pending Call   : </b><?php echo $result['today_pending_call_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-phone-alt"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>Tomorrow </b> </span> 
                   <span class="info-box-number"><b>  Call Leads : </b><?php echo $result['tomarrow_call_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Call   : </b><?php echo $result['tomarrow_done_call_lead']?> </span>  
                   <span class="info-box-number"><b>  Pending Call   : </b><?php echo $result['tomarrow_pending_call_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-phone-alt"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>This Week   </b>  </span> 
                   <span class="info-box-number"><b>  Call Leads : </b><?php echo $result['week_call_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Call   : </b><?php echo $result['week_done_call_lead']?> </span>  
                   <span class="info-box-number"><b> Pending Call   : </b><?php echo $result['week_pending_call_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-phone-alt"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>This Month   </b> </span> 
                   <span class="info-box-number"><b>  Call Leads : </b><?php echo $result['month_call_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Call   : </b><?php echo $result['month_done_call_lead']?> </span>  
                   <span class="info-box-number"><b>  Pending Call   : </b><?php echo $result['month_pending_call_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-black elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>Todays </b> </span> 
                   <span class="info-box-number"><b>  Mail Leads : </b><?php echo $result['today_mail_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Mail   : </b><?php echo $result['today_done_mail_lead']?> </span>  
                   <span class="info-box-number"><b>  Pending Mail   : </b><?php echo $result['today_pending_mail_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>Tomorrow </b> </span> 
                   <span class="info-box-number"><b>  Mail Leads : </b><?php echo $result['tomarrow_mail_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Mail   : </b><?php echo $result['tomarrow_done_mail_lead']?> </span>  
                   <span class="info-box-number"><b>  Pending Mail   : </b><?php echo $result['tomarrow_pending_mail_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>This Week   </b>  </span> 
                   <span class="info-box-number"><b>  Mail Leads : </b><?php echo $result['week_mail_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Mail   : </b><?php echo $result['week_done_mail_lead']?> </span>  
                   <span class="info-box-number"><b> Pending Mail   : </b><?php echo $result['week_pending_mail_lead']?> </span>  
              </div> 
            </div> 
          </div> 
		<div class=" col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                   <span class="info-box-number"><b>This Month   </b> </span> 
                   <span class="info-box-number"><b>  Mail Leads : </b><?php echo $result['month_mail_lead']?> </span> 
                   <span class="info-box-number"><b>  Done Mail   : </b><?php echo $result['month_done_mail_lead']?> </span>  
                   <span class="info-box-number"><b>  Pending Mail   : </b><?php echo $result['month_pending_mail_lead']?> </span>  
              </div> 
            </div> 
          </div> 
	 
	
	
	
		<div class="col-md-12"> 
		   <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Todays Contact Lead</h3>

                    <div class="card-tools">
                       
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                       
                    </div>
                  </div>
                  <!-- /.card-header -->
                   <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Lead id</th>
                      <th>Name</th>
                      <th>Email id</th>
                      <th>Mobile No.</th> 
										<th>Last Remark </th> 
										<th>Connect By  </th>  
										 
                    </tr>
                    </thead>
                    <tbody>
					<?php   foreach(@$result['latest_assigments'] as $aresult){   ?>	<tr   >
										 
										<td><?php echo $aresult->LeadUniqueNumber;?></td>
										<td><?php echo $aresult->FirstName.' '.$aresult->LastName;?></td>  
										<td><?php echo $aresult->EmailidPersonal;?></td>  
										<td><?php echo $aresult->MobileNumber;?></td>   
										<td><?php echo $aresult->CustomRemark;?></td>  
										<td><?php echo $aresult->ContactBy;?></td> 
 <td>  
									</tr>
									<?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
             
                  <div class="card-footer text-center">
                    <a href="contact/today-assign-lead-list">View All Today's Assignment</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
       
		</div>
	<?php } ?>
	</div></div>
   </section>
	</div>