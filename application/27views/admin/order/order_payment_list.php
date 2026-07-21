<div class="row">
	<div class="col-md-12" style="overflow: auto;">
		 <form method="post" action="product/save_product_module_stock" id="ajax_save_st" name="ajax_save_st"><table class="table table-bordered table-striped col-xs-12" >
			<tr>
				<td></td>
				<td>Payment Mode</td>
				<td>Transcation Number</td>  
				<td>Amount</td>  
				<td>Payment Status</td>  
				<td>Payment Date</td>   
				<td>Bank Name</td>   
				<td>Transcation Date </td>   
				<td>Upload File</td> 
			</tr>
			 <?php 
			foreach($results as $result){   ?> 
				 <tr>
				 <td></td>
				 <td><?php echo  strtoupper($result->payment_type);?></td>
				 <td><?php echo  $result->transaction_numer;?></td>
				 <td><?php echo  $result->payment_amount;?></td>
				 <td><?php echo  ucwords($result->payment_status);?></td>
				 <td><?php  if($result->payment_status=='paid'){ echo  date(DISPLAY_DATE_TIME,strtotime($result->payment_date)); }?></td> 
				 <td><?php  if($result->payment_type=='cheque'){  echo  $result->bank_name; }?></td> 
				 <td><?php   if($result->payment_type=='cheque'){ echo  date(DISPLAY_DATE_TIME,strtotime($result->transaction_date)); }?></td>  
			<td><?php  if($result->payment_type=='cheque'){ ?><a href="uploads/cheque/<?php echo  $result->upload_file;?>" target="_blank" title=" View Check ">View Cheque</a> <?php } ?></td>  
				 <tr>
			<?php } ?> 
			<tfoot><tr style="text-align: right;"><td colspan="14"><input type="button" class="btn_validator btn btn-info update_Stock_btn" data-frm="ajax_save_st" name="save_btn" id="save_btn" value="Update Stock" style="display:none;">
			<input type="button" name="close" value=" Close" data-dismiss="modal" aria-label="Close" class="btn btn-danger">
			</td></tr></tfoot>
		 </table>
		<input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_info->id?>"> 
		 </form>
	</div>
</div>