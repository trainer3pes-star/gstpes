<div class="row">
  <form action="user/return_detail_product" method="post"  id="can_frm" name="can_frm">
	<div class="col-lg-12 col-12">
	<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Action<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="return_action" id="return_action" class=" form-control select2 required" style="width:100%;"> 
						<option value="refund"> Return And Refund</option>
						 
						</select> 
				   </div>
                </div>
		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Select Reason<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<select name="reason_id" id="reason_id" class=" form-control select2 required" style="width:100%;"> 
						<option value="0"> Select Reason</option>
						<?php foreach($cann_reasons as $cann_reason){ 
							?>
						<option value="<?php echo $cann_reason->id?>" ><?php echo $cann_reason->reasons;?></option>
						<?php }  ?>
						</select> 
				   </div>
                </div>

		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Brief Description<label style="color:#FF0000">*</label></label>
                    <div class="col-sm-8">
						<textarea class="form-control required" name="description" id="description"  ><?php echo @$result->description?></textarea>
				   </div>
                </div>
				
		<div class="form-group row">
                     
                    <div class="col-sm-6">
						<input type="button" name="close_return_product_btn" id="close_return_product_btn" value="Closes" class="btn btn-danger  "  style="width:100%;float:right" />
				   </div><div class="col-sm-6">
						<input type="hidden" name="detail_id" id="cart_detail_id" value="">
						<input type="button" name="return_product_btn" id="return_product_btn" value="Return Product" class="btn btn-success btn_validator" data-frm="can_frm"  style="width:100%;float:right" />
				   </div>
                </div>
				
	</div>
 </form>
 </div>