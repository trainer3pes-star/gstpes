<?php $class_product_app=array('-1'=>'#ff9494','1'=>'#94ffc2','0'=>'#94faff','3'=>'#2F9596','4'=>'#36a164','5'=>'#c15656');?>
<div class="row">
<div class="col-md-12"><span style="background-color:<?php echo $class_product_app[0];?>;margin-right: 10px;margin-left: 10px;padding-left: 10px;padding-right: 10px;"> Pending   </span> <span style="background-color:<?php echo $class_product_app[1];?>;margin-right: 10px;margin-left: 10px;padding-left: 10px;padding-right: 10px;"> Approved   </span> <span style="background-color:<?php echo $class_product_app[-1];?>;margin-right: 10px;margin-left: 10px;padding-left: 10px;padding-right: 10px;"> Rejected   </span>
 <span style="color: #fff;background-color:#2F9596;margin-right: 10px;margin-left: 10px;padding-left: 10px;padding-right: 10px;"> Dispatched   </span>
  <span style="color: #fff;background-color:#36a164;margin-right: 10px;margin-left: 10px;padding-left: 10px;padding-right: 10px;"> Delivered   </span>
   <span style="color: #fff;background-color:#c15656;margin-right: 10px;margin-left: 10px;padding-left: 10px;padding-right: 10px;"> Returned   </span> 
</div>
	<div class="col-md-12" style="overflow: auto;">
			
		 <form method="post" action="product/save_product_module_stock" id="ajax_save_st" name="ajax_save_st"><table class="table table-bordered table-striped col-xs-12" >
		 
			<tr>
				<td>#</td>
				<td>Product Name</td>
				<td>Code</td>  
				<td>HSN</td>  
				<td>Image</td>  
				<td>Qty</td>   
				<td>Price</td>   
				<td>Discount</td>   
				<td>Counpoun Discount</td>   
				<td>Base Price</td>   
				<td>GST </td>   
				<td>SGST</td>   
				<td>IGST</td>    
				<td>Final Price</td>   
			</tr>
			 <?php 
			 $j=0;
			 $total_base=0;
			 $total_cgst=0;
			 $total_sgst=0;
			 $total_igst=0;
			 $total_final=0;
			foreach($results as $result){
				if($result->is_apply_igst==1){
					$result->apply_cgst_price=0;
					$result->apply_sgst_price=0;
				}else{
					$result->apply_igst_price=0;
				}
				if($result->mark_as_dispatched==1){
					$result->is_seller_approved=3;
				}
				if($result->is_delivered==1){
					$result->is_seller_approved=4;
				}
				if($result->is_returned==1){
					$result->is_seller_approved=5;
				}
				
				?> 
				 <tr style="background-color:<?php echo $class_product_app[$result->is_seller_approved];?>; <?php if($result->is_seller_approved>2){?> color:#fff;<?php } ?>" >
				 <td><?php echo ++$j;?></td>
				 <td><?php echo  $result->pro_name;?></td>
				 <td><?php echo  $result->pro_code;?></td>
				 <td><?php echo  $result->hsn_code;?></td>
				 <td><img src="<?php echo base_url().'uploads/product/110X124/'.$result->product_main_img?>" width="50"></td>
				 <td><?php echo  $result->quantity;?></td>
				 <td><?php echo  $result->final_price;?></td> 
				 <td><?php echo  $result->discount_amount ;
				 $str="";
				 if($result->discount_amount){
					 $str=$result->discount;
					 if($result->discount_type=='per'){
						$str=$str.' % OFF';
					 }else{
						 $str=$str.' Rs. OFF';
					 }
					 echo "<br>".$str;
				 }
				 
				 ?></td> 
				 <td><?php echo  $result->coupon_discount_amount_single;?></td> 
				 <td><?php echo  $result->apply_base_price; $total_base=$total_base+$result->apply_base_price;?></td> 
				 <td><?php echo  $result->apply_cgst_price; $total_cgst=$total_cgst+$result->apply_cgst_price;?></td> 
				 <td><?php echo  $result->apply_sgst_price; $total_sgst=$total_sgst+$result->apply_sgst_price;?></td> 
				 <td><?php echo  $result->apply_igst_price; $total_igst=$total_igst+$result->apply_igst_price;?></td> 
				 <td><?php echo  $result->apply_final_price*$result->quantity; $total_final=($total_final+($result->apply_final_price*$result->quantity));?></td> 
				 
				 </tr>
			<?php } ?> 
			
			 <tr>
				 <td></td>
				 <td> </td>
				 <td> </td> 
				 <td> </td> 
				 <td> </td> 
				 <td> </td> 
				 <td> </td> 
				 <td> </td> 
				 <td> </td> 
				 <td><?php echo    $total_base ;?></td> 
				 <td><?php echo   $total_cgst ;?></td> 
				 <td><?php echo   $total_sgst ;?></td> 
				 <td><?php echo  $total_igst ;?></td> 
				 <td><?php echo   $total_final ?></td> 
				 </tr>
			
			<tfoot><tr style="text-align: right;"><td colspan="14"><input type="button" class="btn_validator btn btn-info update_Stock_btn" data-frm="ajax_save_st" name="save_btn" id="save_btn" value="Update Stock" style="display:none;">
			<input type="button" name="close" value=" Close" data-dismiss="modal" aria-label="Close" class="btn btn-danger">
			</td></tr></tfoot>
		 </table>
		<input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_info->id?>"> 
		 </form>
	</div>
</div>