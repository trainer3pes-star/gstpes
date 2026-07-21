 <!-- Begin Main Content Area -->
  <style>
  .modal-backdrop.in{
  background: rgb(0, 0, 0);
  opacity: 0.99 !important;
  filter: Alpha(Opacity=90) !important;         
}
</style>
  <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading"><?php echo $bank_info->bank_name;?>   Verification </h2>
                                <ul>
                                    <li>
                                        <a href="Home/index">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li><?php echo $company_info->company_name;?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-area section-space-y-axis-100 mark_opacity" id="main_bak_data" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="frequently-area  open_otp_auto"><!-- -->
                                <h2 class="heading mb-0">Bank verification </h2>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="frequently-item">
                                                    <ul>
                                                        <li class="has-sub active open">
                                                            <a class="cus_a" href="javascript:void(0)">Company Information
                                                                <i class="pe-7s-angle-down"></i>
                                                            </a>
                                                            <ul class="frequently-body" style="display: block;">
                                                                <li>
                                                                   <table class="table" >
																	<tr>
																		<td>Contact Name</td>
																		<td><?php echo $user_info->name;?></td>
																	</tr>
																	<tr>
																		<td>Compnay Name</td>
																		<td><?php echo $company_info->company_name;?></td>
																	</tr>
																	<tr>
																		<td>Compnay Email</td>
																		<td><?php echo $company_info->company_email;?></td>
																	</tr>
																	<tr>
																		<td>Compnay Mobile</td>
																		<td><?php echo $company_info->company_mobile;?></td>
																	</tr>
																	<tr>
																		<td>Compnay Website</td>
																		<td><?php echo $company_info->company_website;?></td>
																	</tr>
																	<tr>
																		<td>GST No</td>
																		<td><?php echo $company_info->company_gst_no;?></td>
																	</tr>
																	<tr>
																		<td>Compnay Website</td>
																		<td><?php echo $company_info->shop_act_no;?></td>
																	</tr>
																	<tr>
																		<td>Shop Act No</td>
																		<td><?php echo $company_info->company_website;?></td>
																	</tr>
																	<tr>
																		<td>License No</td>
																		<td><?php echo $company_info->company_license_no;?></td>
																	</tr>
																	<tr>
																		<td>Address Line 1</td>
																		<td><?php echo $company_info->company_address_one;?></td>
																	</tr>
																	<tr>
																		<td>Address Line 2</td>
																		<td><?php echo $company_info->company_address_two;?></td>
																	</tr>
																	<tr>
																		<td>Near by Landmark</td>
																		<td><?php echo $company_info->company_near_landmark;?></td>
																	</tr>
																	<tr>
																		<td>District</td>
																		<td><?php echo $company_info->district_name;?></td>
																	</tr>
																	<tr>
																		<td>State</td>
																		<td><?php echo $company_info->state_name;?></td>
																	</tr>
																	<tr>
																		<td>City</td>
																		<td><?php echo $company_info->city_name;?></td>
																	</tr>
																	<tr>
																		<td>Pincode</td>
																		<td><?php echo $company_info->company_pincode;?></td>
																	</tr>
																   </table>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                         
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="frequently-item">
                                                    <ul> 
													<li class="has-sub   open">
                                                            <a class="cus_a" href="javascript:void(0)">Documents
                                                                <i class="pe-7s-angle-down"></i>
                                                            </a>
                                                            <ul class="frequently-body" style="display: block;">
                                                                <li>
                                                                   <table class="table" >
																  <?php foreach($documents as $document){?>
																	<tr>
																		<td><?php echo ucwords(str_replace('_',' ',$document->document_name));?></td>
																		<td> 
																		<a class="btn btn-success btn-sm" title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $document->file_name?>"   ><i class="fa fa-eye" aria-hidden="true"></i></a>
																		</td>
																	</tr>
																  <?php } ?>
																	</table>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									 <div class="col-md-4">
                                        <div class="row">
										<div class="feedback-area pt-5">
                                            <h1 class="heading mb-1">Add a comment</h1>
                                             
                                            <form class="feedback-form pt-8" action="Home/save_bank_comment" id="bank_comm_frm" id="bank_comm_frm"> 
												
                                                    <div class="form-field mb-6  row">
													<div class="col-md-12"><label>Status</label></div>
													<div class="col-md-12">
                                                      <select name="bank_status" id="bank_status" class="select2 input-field">
													  <option value="0">Pending (Query)</option>
													  <option value="1">Approved</option>
													  <option value="2">Rejected</option>
													  </select>
                                                    </div> 
                                                    </div> 
                                                <div class="form-field mt-6">
                                                    <textarea name="bank_comment" id="bank_comment" placeholder="Comment" class="textarea-field"></textarea>
                                                </div>
                                                <div class="button-wrap mt-8">
													<input type="hidden" name="rc_id" value="<?php echo $record->id?>">
													<input type="hidden" name="bank_name" value="<?php echo $bank_info->bank_name?>">
                                                    <button type="button"  id="send_bak_comment" value="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover   rounded-0" name="submit" data-frm="bank_comm_frm">Submit</button>
													 
													
													 <a type="button" class="btn btn-custom-size btn-primary btn-secondary-hover lg-size  rounded-0" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">View History</a>
						
                                                </div>
                                            </form>
                                        </div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
		 
	  </main>
        <!-- Main Content Area End Here -->

    
   <div class="modal fade  " id="otp_model">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Enter OTP </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 
              </button>
            </div>
			<form method="post"  id="otp_frm" name="otp_frm" action="Home/varify_otp">
            <div class="modal-body"> 
              <p>
			  OTP :<br>
			  <input   name="input_otp" id="input_otp" type="text" value="" class="form-control"></p>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-danger" style="float:left"  id='resend-bt-otp-bt' data-frm="otp_frm">Resend OTP</button>
              <button type="button" class="btn btn-info" style="float:right"  id='bt-otp-bt' data-frm="otp_frm">Enter OTP</button>
			<input id="bank_rc_id" name="bank_rc_id" value="<?php echo $record->id?>" type="hidden"> 
			</div>
			</form>
		  </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 
<div class="fixed">

<div class=" col-md-4">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> View History
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body auto_fixed">
                    <ul class="chat " id="append_view_history">
						<?php foreach($comment_historys as $comment_history){ ?>
						 <?php if($comment_history->added_by==1){?>
                        <li class="left clearfix" style="margin-bottom: 10px;"><span class="chat-img pull-left">
                            <div class="img-circle green_bg" > A</div>
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo SITE_NAME;?></strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo date('d-m-Y H:i A',strtotime($comment_history->created_date));?></small>
                                </div>
                                <p><?php echo $comment_history->comment;?>
                                </p>
                            </div>
                        </li>
						 <?php }
						 if($comment_history->added_by==2){?>
						<li class="right clearfix" style="margin-bottom: 10px;"><span class="chat-img pull-right">
                            <div class="img-circle red_bg" > B</div>
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo date('d-m-Y H:i A',strtotime($comment_history->created_date));?></small>
                                    <strong class="pull-right primary-font"><?php echo $bank_info->bank_name;?></strong>
                                </div>
                                <p>
                                   <?php echo $comment_history->comment;?>
                                </p>
                            </div>
                        </li>
						<?php }} ?>
					</ul>
                </div> </div>
            </div>
        </div>
    </div>
</div>

</div>

<style>
div.fixed {
  position: fixed;
  bottom: 0;
  left: 0; 
width:100%;  
}
.auto_fixed{ max-height:400px; overflow:scroll }
</style>
   