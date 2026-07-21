<div class="row">
	<div class="col-md-12" style="overflow: auto;">
		 <form method="post" action="product/save_product_module_stock" id="ajax_save_st" name="ajax_save_st"><table class="table table-bordered table-striped col-xs-12" >
			<tr>
				<?php foreach($mresults as $mresult){?>
				<td><?php echo $mresult->module_name;?></td>
				<?php } ?>
				<td>Current Stock</td>
				<td>New Add Stock</td>  
				<td>Mark Defect Stock</td>  
				<td>Total Inward Stock</td>  
				<td>Total sell Stock</td>   
				<td>Total Defect Stock</td>   
				<td>Total Stock</td>   
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
				echo $rhtml='<tr style="text-align: center;" class="tr_r'.$variation->id.'">'.$sub_html.'<td><b>'.$variation->current_stock.'</b></td><td><input type="text" name="input_stock['.$variation->id.']" id ="input_stock_'.$variation->id.'" value="" class="form-control no_char no_space no_special value_chnaged"></td><td><input type="text" name="input_defect['.$variation->id.']" id ="input_defect_'.$variation->id.'" value="" class="form-control no_char no_space no_special value_chnaged"></td><td>'.($variation->inward_quantity).'</td><td>'.$variation->sell_quantity.'</td><td> '.$variation->defect_quantity.'</td><td><b>'.($variation->inward_quantity+$variation->defect_quantity).'</b></td> </tr>';
			} ?> 
			<tfoot><tr style="text-align: right;"><td colspan="9"><input type="button" class="btn_validator btn btn-info update_Stock_btn" data-frm="ajax_save_st" name="save_btn" id="save_btn" value="Update Stock" style="display:none;">
			<input type="button" name="close" value=" Close" data-dismiss="modal" aria-label="Close" class="btn btn-danger">
			</td></tr></tfoot>
		 </table>
		<input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_info->id?>"> 
		 </form>
	</div>
</div>