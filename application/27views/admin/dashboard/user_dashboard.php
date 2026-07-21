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
      <div class="container-fluid"> 
	  <div class="row center col-md-12">
		  
		<?php if(!$no_of_company_active->total){?>
		<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Your company still not approved . for quries contact to supprot@agriday.com 
                </div>
                </div>
		<?php }else{ ?>
			<div class="col-md-12">
		<div class="alert alert-success alert-dismissible"> 
                  <h5><i class="fa fa-thumbs-up"></i> Welcome to seller panel !</h5>
                  Manage your product and orders
                </div>
                </div>
		<?php }?>
		
	</div>
	
	 <div class="card"> 	   
        <div class="card-header">
          <h3 class="card-title">My Sponser Link</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body"> 
			  
			  <div class="form-group row"> 
                    <div class="col-sm-12  "> 
					<?php $slink= base_url().REGISTER_URL.'/'.base64_encode($login_user_info->id);?>
					<b class="copt_text_link"><?php echo $slink;?></b> 
					<input type="hidden"  name="sponsor_link" id="sponsor_link" value="<?php echo $slink;?>">
					<a href="<?php echo $slink;?>" target="_blank" class="btn btn-success btn-xs"  > Open link in new tab </a>
						
				   </div>
                </div>
			  
        </div>
        
      </div>
	
	
	
        <!--<div class="row load_dashboard">
			 <div class=" col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Users</b></span>
                 <span class="info-box-number"> <?php echo $result['total_users']?> </span> 
              </div> 
            </div> 
          </div> 
			<div class=" col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Contacts</b></span>
                  <span class="info-box-number"> <?php echo $result['total_contact']?> </span> 
              </div> 
            </div> 
          </div> 
			<div class=" col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Leads</b></span>
                <span class="info-box-number"> <?php echo $result['total_lead']?> </span>  
              </div> 
            </div> 
          </div> 
			
			
			
		
		
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
                <h3 class="card-title">Last 6 month leads and contacts</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                   
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              
            </div>
            
		<input type="hidden" id="month_array" value="<?php echo $result['last_month']?>">
		<input type="hidden" id="contact_array" value="<?php echo $result['last_month_contact']?>">
		<input type="hidden" id="lead_array" value="<?php echo $result['last_month_lead']?>">
		</div>
		      
		
		<div class="col-md-6"> 
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lead Type</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                 
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChartType" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              
            </div>
            

		<input type="hidden" id="lead_type_name_array" value="<?php echo $result['lead_type_name']?>">
		<input type="hidden" id="lead_type_color_array" value="<?php echo $result['lead_type_color']?>">
		<input type="hidden" id="lead_type_count_array" value="<?php echo $result['lead_type_count']?>">
		</div>
		<div class="col-md-6"> 
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Lead Status</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChartStatus" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              
            </div>
            

		<input type="hidden" id="lead_status_name_array" value="<?php echo $result['lead_status_name']?>">
		<input type="hidden" id="lead_status_color_array" value="<?php echo $result['lead_status_color']?>">
		<input type="hidden" id="lead_status_count_array" value="<?php echo $result['lead_status_count']?>">
		</div>
		<div class="col-md-6"> 
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Todays Contact Lead</h3>

                    <div class="card-tools">
                       
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                       
                    </div>
                  </div> 
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
              </div>
             
                  <div class="card-footer text-center">
                    <a href="contact/today-assign-lead-list">View All Today's Assignment</a>
                  </div> 
                </div> 
              </div>
        <div class="col-md-6"> 
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Latest Users</h3>

                    <div class="card-tools">
                       
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                       
                    </div>
                  </div> 
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
					<?php foreach($result['latest_users'] as $user){?>
					 <li>
                        <img src="<?php echo base_url();?>uploads/users/thumb/<?php echo $user->ProfilePhoto?>" alt="User Image">
                        <a class="users-list-name" href="javascript:void(0);"><?php echo $user->UserFname.' '.$user->UserLname?></a>
                        <span class="users-list-date">[ <?php echo $user->UserNumber; ?> ] </span>
                        <span class="users-list-date"><?php echo $user->TypeName; ?></span>
                        <span class="users-list-date"><?php echo date(DISPLAY_DATE,strtotime($user->CreatedDate)); ?></span>
                      </li>
					<?php } ?>
                    </ul> 
                  </div>
                  
                  <div class="card-footer text-center">
                    <a href="User/user-list">View All Users</a>
                  </div> 
                </div> 
              </div>
			  
			   <div class="col-md-6"> 
            <div class="card card-primary">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Contacts</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                   
                </div>
              </div> 
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Contact No.</th>
                      <th>Name</th>
                      <th>Email id</th>
                      <th>Mobile No.</th>
                      <th>Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($result['latest_contacts'] as $contact){?>
                    <tr> 
                      <td><?php echo $contact->ContactUniqueNumber?></td> 
                      <td><?php echo $contact->FirstName.' '.$contact->LastName ?></td> 
                      <td><?php echo $contact->EmailidPersonal?></td> 
                      <td><?php echo $contact->MobileNumber?></td> 
                      <td><?php echo date(DISPLAY_DATE,strtotime($contact->CreatedDate));?></td> 
                    </tr>
					<?php }?>
                    </tbody>
                  </table>
                </div> 
              </div>
              
              <div class="card-footer clearfix">
                <a href="contact/contact-list" class="btn btn-sm btn-info float-left">View All Contacts</a>
                
              </div> 
            </div>
            
			   </div>
			   
			   <div class="col-md-6"> 
            <div class="card card-info">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Leads</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                   
                </div>
              </div> 
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Lead No.</th>
                      <th>Name</th>
                      <th>Email id</th>
                      <th>Mobile No.</th>
                      <th>Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($result['latest_leads'] as $lead){?>
                    <tr> 
                      <td><?php echo $lead->LeadUniqueNumber?></td> 
                      <td><?php echo $lead->FirstName.' '.$lead->LastName ?></td> 
                      <td><?php echo $lead->EmailidPersonal?></td> 
                      <td><?php echo $lead->MobileNumber?></td> 
                      <td><?php echo date(DISPLAY_DATE,strtotime($lead->CreatedDate));?></td> 
                    </tr>
					<?php }?>
                    </tbody>
                  </table>
                </div> 
              </div>
              
              <div class="card-footer clearfix">
                <a href="contact/lead-list" class="btn btn-sm btn-info float-left">View All Leads</a>
                
              </div> 
            </div>
            
			   </div>
            
	</div>
	
	</div>
	 -->
	</section>
	</div>