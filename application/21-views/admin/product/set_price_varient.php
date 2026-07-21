<div class="row">
	<div class="col-md-12" style="overflow: auto;">
		 <form method="post" action="product/save_product_module_price" id="ajax_save_mp" name="ajax_save_mp" enctype="multipart/form-data"><table class="table table-bordered table-striped col-xs-12" >
			<tr>
				<?php foreach($mresults as $mresult){?>
				<td><?php echo $mresult->module_name;?></td>
				<?php } ?>
				<td>Base Price</td>
				<td>Discount Type</td>
				<td>Discount </td>
				<td>CGST <br>(<?php echo $pro_info->cgst?>%)</td>
				<td>SGST <br>(<?php echo $pro_info->sgst?>%)</td>
				<td>IGST <br>(<?php echo $pro_info->igst?>%)</td>
				<td>Price</td>
				<td>Sell Price</td> 
				<td style="display:none">Image</td> 
				<td>Action</td>
			</tr>
			<tr>
				
					<?php foreach($mresults as $mresult){?>
						<td>
						<input type="hidden" name="module_id[]" value="<?php echo $mresult->id;?>">
						<input type ="text" class="clear_run required form-control" placeholder="<?php echo $mresult->module_name;?>" value="" maxlength="200" name="module_value[<?php echo $mresult->id;?>]" id="module_value_<?php echo $mresult->id;?>" style="width: 125px;"></td>
				<?php } ?>
				<td><input type="text" name="base_price" id="base_price" class="<?php if($pro_info->price_include_gst==0){?> required clear_fprice <?php } ?> clear_run form-control no_space no_chara no_special allow_dot" placeholder="Base Price" <?php if($pro_info->price_include_gst){?> readonly <?php } ?> style="width: 125px;"></td>
				<td> 
				<select name="discount_type" id="discount_type" class="select2">
				<option value="per">Percentage</option>
				<option value="amt">Rupees</option>
				</select>
				</td>
				<td>
				<input type="text" name="discount" id="discount" class=" clear_run form-control no_space no_chara no_special allow_dot" placeholder="Discount" style="width: 125px;" >
				</td>
				<td><input type="text" name="cgst_per" id="cgst_per" class="clear_run required form-control no_space no_chara no_special allow_dot" placeholder="CGST" value="<?php echo $pro_info->cgst;?>" style="width: 125px;" ></td>
				<td><input type="text" name="sgst_per" id="sgst_per" class="clear_run required form-control no_space no_chara no_special allow_dot" placeholder="SGST" value="<?php echo $pro_info->sgst;?>" style="width: 125px;" ></td>
				<td><input type="text" name="igst_per" id="igst_per" class="clear_run required form-control no_space no_chara no_special allow_dot" placeholder="IGST" value="<?php echo $pro_info->igst;?>"  style="width: 125px;"></td>
				<td><input type="text" name="final_price" id="final_price" class="clear_run <?php if($pro_info->price_include_gst==1){?> required clear_bprice <?php } ?> form-control no_space no_chara no_special allow_dot" placeholder="Final Price" <?php if($pro_info->price_include_gst==0){?> readonly <?php } ?> style="width: 125px;"></td>
				<td><input type="text" name="discount_price" id="discount_price" class="clear_run  form-control no_space no_chara no_special allow_dot" placeholder="Discounted Price"  readonly  style="width: 125px;" ></td>
				<td style="display:none">  <div class="form-group row"> 
					<input type="hidden" name="product_img" id="product_img" value="<?php echo @$pro_info->product_main_img ;?>" />
					<i class="small">Image Size : 645 X 555</i>
					<input data-class="pro_main_image" class="profile_photo allow_File_only  " data-file="image"  type="file"  name="photo"   name="photo" accept="  image/jpeg, image/png"/>
						<div class="col-sm-12 pro_main_image">
						<?php if(strlen(@$result->product_main_img)){ $file_name=$result->product_main_img;}else{ $file_name=$pro_info->product_main_img;}?>
							<img id="image_src" src="<?php echo base_url(); ?>uploads/product/110X124/<?php echo $file_name;?>" class="thumbimage" />	
						</div> 
                </div></td>
				<td>
				<input type="hidden" id="default_img" value="<?php echo $pro_info->product_main_img;?>">
				<input type="hidden" id="default_img_src" value="<?php echo base_url(); ?>uploads/product/110X124/<?php echo $pro_info->product_main_img;?>">
				<input type="hidden" name="pro_id" value="<?php echo $pro_info->id;?>">
				<input type="hidden" name="id" id="varient_id" class="clear_run" value="">
				<input type="button" name="save" id="saveandadd" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator ajax_btn" data-frm="ajax_save_mp" >
				</td>
				
			</tr>
			<?php 
			foreach($variations as $variation){  
				$sub_html="";
				$ex_variation=explode('@',$variation->variation_string);
				foreach($ex_variation as $ex_variation_sub){
					$val_md=explode('=>',$ex_variation_sub);
					$sub_html=$sub_html.'<td>'.$val_md[1].'</td>';
				}
				$checked="";
				if(@$variation->is_active){
					$checked=" checked ";
				}
				if($variation->discount_type=='per'){
					$discount_type="Precentage";
				}else{
					$discount_type="Rupees";
				}
				echo $rhtml='<tr style="text-align: center;" class="tr_r'.$variation->id.'">'.$sub_html.'<td>'.$variation->base_price.'</td><td>'.$discount_type.'</td><td>'.$variation->discount.'</td><td>'.$variation->cgst_per.'</td><td>'.$variation->sgst_per.'</td><td>'.$variation->igst_price.'</td><td>'.$variation->final_price.'</td><td>'.$variation->show_final_price.'</td><td style="display:none"><img src="'.base_url().'uploads/product/110X124/'.$variation->product_img.'" width="80" ></td><td><a class="btn btn-xs btn-info edit_ajax_rc " href="javascript:void(0)" title="Edit" style="font-size:0.50rem !important" data-id="'.$variation->id.'"><i class="fas fa-pencil-alt "></i></a>&nbsp;<a style="font-size:0.60rem !important" class="btn btn-xs btn-danger delete_delete_me_ajax" href="javascript:void(0)" data-id="'.$variation->id.'" data-module="user_product_variation_detail" title="Delete" data-id="'.$variation->id.'"><i class="fas fa-trash "></i></a>&nbsp;<input type="checkbox" value="1"  data-msg="Update status " data-confirm-msg="Are you sure do you want to update status ? "  class=" update_status " data-id="'.$variation->id.'" data-module="user_product_variation_detail"  data-filed="is_active" '.$checked.'></td></tr>';
			} ?>
			<tfoot id="add_saved_row">
			</tfoot>
		 </table></form>
	</div>
</div>