
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="<?php echo base_url();?>" target="_blank" ><?php echo SITE_NAME;?></a>.</strong> <?php echo $this->lang->line('common_all');?> rights
    reserved.
  </footer>

   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <input type="hidden" id="js_error_mandatory_msg" value="<?php echo $this->lang->line('common_error_mandatory_msg');?>"> 
    
	
  <div class="modal fade" id="modal-llg">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="dy_scheme_product_title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body scheme_product_body">
              
            </div>
            <div class="modal-footer justify-content-between"> 
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     
   <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $this->lang->line('common_hello_label');?> <?php echo ucfirst($login_user_info->name); ?>  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo $this->lang->line('common_popup_msg');?></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_no');?></button>
			   <a href ="Home/change-password" type="button" class="btn btn-danger"><?php echo $this->lang->line('change_password_title');?></a>
              <a href ="Home/logout" type="button" class="btn btn-primary"><?php echo $this->lang->line('common_yes');?></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
   <div class="modal fade" id="feed_back_model">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $this->lang->line('common_feedback_label');?> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><textarea style="width:100%" name="feedback" id="feedback" maxlength="255"></textarea></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_close_btn');?></button>
              <button type="button" class="btn btn-info"  id='save_feedback'><?php echo $this->lang->line('common_save_close_btn');?></button>
			<input id="review_hidden_id" name="review_hidden_id" value="" type="hidden">
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	    
   <div class="modal fade" id="comment_back_model">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Comment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><textarea style="width:100%" name="comment" id="comment" maxlength="255"></textarea></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_close_btn');?></button>
              <button type="button" class="btn btn-info"  id='save_comment'><?php echo $this->lang->line('common_save_close_btn');?></button>
			<input id="record_id_pending" name="record_id" value="" type="hidden">
			<input id="record_action" name="record_action" value="" type="hidden">
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	 
	 
	 <div class="modal fade modal-default " id="master_run_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     	<div class="modal-dialog modal-lg " >
                <div class="modal-content" >
                   <div class="modal-header">
                   
                    <h5 class="modal-title run_time_title" >&nbsp;</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                 
                  <div class="modal-body ajax_master_run" >
				   
           
         
                </div> 
              </div>
    </div>
	</div>
	
	
	
      
   <div class="modal fade" id="send_bank_model">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Send To Bank Approval </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form method="post"  id="send_bank_approval" name="send_bank_approval" action="User/send_to_bank_approval">
            <div class="modal-body">
			<p>
			<b>Company Name : <span id="com_name"></span></b><br>
			<b>Customer Name : <?php echo $uresult->name;?></b>
			</p>
              <p>
			  Select Bank : <br>
			  <select name="bank_ids[]" id="bank_ids" class="form-control select2" > 
				<?php foreach($bannk_results as $bannk_result){?>
					<option value="<?php echo $bannk_result->id?>"><?php echo $bannk_result->bank_name?></option>
				<?php } ?>
			  </select>
			  </p>
              <p>
			  Comment :<br>
			  <textarea style="width:100%" name="comment" id="comment" maxlength="255"></textarea></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_close_btn');?></button>
              <button type="button" class="btn btn-info"  id='se_to_banks' data-frm="send_bank_approval"><?php echo $this->lang->line('common_save_close_btn');?></button>
			<input id="send_user_id" name="user_id" value="" type="hidden">
			<input id="send_company_id" name="company_id" value="" type="hidden">
			<input id="com_name" name="com_name" value="" type="hidden">
			<input id="cust_name" name="cust_name" value="<?php echo $uresult->name;?>" type="hidden">
			</div>
			</form>
		  </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	
 
      
   <div class="modal fade" id="send_customer_model">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Send To Customer </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form method="post"  id="send_customer_approval" name="send_customer_approval" action="User/send_customer_approval">
            <div class="modal-body">
			<p>
			<b>Company Name : <span id="com_name1"></span></b><br>
			<b>Customer Name : <?php echo $uresult->name;?></b>
			</p>
              <p>
			  Select Status  : <br>
			  <select name="status" id="status" class="form-control select2" > 
				<option value="0">Pending(Query) </option>
				<option value="1">Approved </option>
				<option value="2">Rejected </option>
				
			  </select>
			  </p>
              <p>
			  Comment :<br>
			  <textarea style="width:100%" name="comment" id="cust_comment" maxlength="255"></textarea></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_close_btn');?></button>
              <button type="button" class="btn btn-info"  id='se_to_customer' data-frm="send_customer_approval"><?php echo $this->lang->line('common_save_close_btn');?></button>
			<input id="sendc_user_id" name="user_id" value="" type="hidden">
			<input id="sendc_company_id" name="company_id" value="" type="hidden">
			<input id="com_name" name="com_name" value="" type="hidden">
			<input id="cust_name" name="cust_name" value="<?php echo $uresult->name;?>" type="hidden">
			</div>
			</form>
		  </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	