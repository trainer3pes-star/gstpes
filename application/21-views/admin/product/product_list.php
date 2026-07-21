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
	<?php echo form_open_multipart('admin/product/product-list', array('id' => 'basic_search','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class="card"> 	   
        <div class="card-header">
          <h3 class="card-title">Search Product  </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
           <div class="form-group row"> 
                    <div class="col-sm-6">
					<label for="inputEmail3" class="col-sm-12 col-form-label">Product Name / Code / HSN Code </label>
						<input type="text" class="form-control" name="search_query" id="search_query" value="<?php echo $search['search_query']?>">
				   </div>
				    
				   <div class="col-sm-2">
					<label for="inputEmail3" class="col-sm-12 col-form-label"><?php echo $this->lang->line('common_status_label');?> </label>
						<select name="is_published" id="is_published" class="select2 form-control" style="width:100%;">
							<option value="-1" <?php if($search['is_published']=='-1'){?> selected <?php } ?>><?php echo $this->lang->line('common_all');?></option>
							<option value="1" <?php if($search['is_published']=='1'){?> selected <?php } ?>><?php echo $this->lang->line('common_active_label');?></option>
							<option value="0" <?php if($search['is_published']=='0'){?> selected <?php } ?>><?php echo $this->lang->line('common_inactive_label');?></option>
						</select> 
				   </div>
				   <div class="col-sm-4">
					<label for="inputEmail3" class="col-sm-12 col-form-label">Product Category</label>
					 
					<select name="product_category_id" id="product_category_id" class=" form-control select2 " style="width:100%;"> 
						<option value="0"  ><?php echo $this->lang->line('common_all');?></option>
						<?php foreach($parent_category as $parent_cat){?>
						<option value="<?php echo $parent_cat->id?>" <?php if(@$search['product_category_id']==$parent_cat->id){?> selected <?php } ?>><?php echo $parent_cat->category_name;?></option>
						<?php } ?>
						</select> 
					 
						 
				   </div>
				 </div>
					 
			<div class="form-group row">
                  <div class="col-sm-3"> 
				 
						<select name="is_scheme" id="is_scheme" class="select2 form-control" style="width:100%;">
							<option value="-1" <?php if($search['is_scheme']=='-1'){?> selected <?php } ?>><?php echo $this->lang->line('common_all');?> Products</option>
							<option value="1" <?php if($search['is_scheme']=='1'){?> selected <?php } ?>>   Schemed Product</option>
							<option value="0" <?php if($search['is_scheme']=='0'){?> selected <?php } ?>>Non Schemed Product</option>
						</select>
			</div>   
                    
				   <div class="col-sm-3"> 
				<input type="submit" name="search" id="search" value="<?php echo $this->lang->line('common_search_btn');?>" class="btn btn-danger" style="width:100%;float:right" />
			</div>
			<div class="col-sm-3"> 
				<a style="float:right;width:100%" class="btn btn-success" href="product/product-list"><?php echo $this->lang->line('common_reset_btn');?></a>
			</div>
			<?php if($this->Home_model->check_permission('1','PAdd')){?>
			<div class="col-sm-3"> 
				<a style="float:right;width:100%" class="btn btn-secondary" href="product/create-product">Create Product</a>
			</div>
			<?php } ?>
                </div>
        </div>
         
      </div>
	 
      </div>
    </div>
	<!-- /.card -->
<div class="row">
      <!-- Default box -->
    <div class="col-md-12">
	<div class="card">
        <div class="card-header">
		
           <div class="col-xs-2" style="float:left;"><select name="no_of_records" class="select2" style="width:100%"  onchange="$('#pagi_number').val(0);$('#basic_search').submit()">
					<option value="10" <?php if(@$search['no_of_records']==10){?> selected="selected" <?php }?> >10</option>
					<option value="25" <?php if(@$search['no_of_records']==25){?> selected="selected" <?php }?> >25</option>
					<option value="50" <?php if(@$search['no_of_records']==50){?> selected="selected" <?php }?>>50</option>
					<option value="100" <?php if(@$search['no_of_records']==100){?> selected="selected" <?php }?>>100</option>
					<option value="500" <?php if(@$search['no_of_records']==500){?> selected="selected" <?php }?>>500</option>
					<option value="1000" <?php if(@$search['no_of_records']==1000){?> selected="selected" <?php }?>>1000</option>
					<option value="-1" <?php if(@$search['no_of_records']=='-1'){?> selected="selected" <?php }?>><?php echo $this->lang->line('common_all');?></option>
					</select></div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
		 	  	   
<?php if($this->Home_model->check_permission('1','PExport')){?>
<div class="col-sm-2" style="float:right;"> 
				<input data-frm="basic_search" type="button" name="export" id="export_excel" value="<?php echo $this->lang->line('common_export_btn');?>" class="btn btn-default" style="width:100%;float:right" />
			</div>
		  <?php } ?>
		  
		  <?php if($this->Home_model->check_permission('1','PExport')){?>
<div class="col-sm-2" style="float:right;"> 
				<input data-frm="basic_search" type="button" data-module="product_master" data-filed="is_approve" data-action="1"   id="approve_product" value="Approve Product" class="btn btn-success chnage_run_status" style="width:100%;float:right" />
			</div>
		<div class="col-sm-2" style="float:right;"> 
				<input data-frm="basic_search" data-module="product_master" data-filed="is_approve" type="button" data-action="-1" id="reject_product" value="Reject Product" class="btn btn-danger chnage_run_status" style="width:100%;float:right" />
			</div> 
			<input type="hidden" name="module" value="" id="module">
			<input type="hidden" name="field" value="" id="field">
			<input type="hidden" name="assign_val" value="" id="assign_val">
		  <?php } ?>
		  
        </div>
		<?php if($this->Home_model->check_permission('product_list')){?>
        <div class="card-body">
           <table id="example_php" class="table table-bordered table-striped col-xs-12" >
								<thead>
									<tr >
										<th>#</th>
										<th><input type="checkbox" class="check_all_check" title="Check All"></th>
										 
   <th> Pro. Name
 <i style="cursor:pointer" class="fas fa-arrow-circle-up sorting_btn"  data-frm="basic_search" data-filed="category_name" data-type="ASC"></i>
 <i style="cursor:pointer" class="fas fa-arrow-circle-down sorting_btn"  data-frm="basic_search" data-filed="category_name" data-type="DESC"></i>
   </th>
										 
										<th> Pro. Code</th>
										<th> Pro. HSN </th>
										<th> Category Name</th>
										<th> CGST</th>
										<th> SGST</th>
										<th> IGST</th>
										<th> Inclusive GST</th>
										<th> Scheme Product</th>
										<th> Is Featured</th>
										<th> New Arrival </th>
										<th> Subsidized</th>
										 
										<th>Seller Margin </th> 
										<th>Show Home Page</th> 
										<th><?php echo $this->lang->line('common_ispublished_label');?> </th>
										<th> Created Date
 <i style="cursor:pointer" class="fas fa-arrow-circle-up sorting_btn"  data-frm="basic_search" data-filed="CreatedDate" data-type="ASC"></i>
 <i style="cursor:pointer" class="fas fa-arrow-circle-down sorting_btn"  data-frm="basic_search" data-filed="CreatedDate" data-type="DESC"></i>
   </th> 
										<th>Is Approved</th> 
										<th>Created By</th> 
										
										 
										<th><?php echo $this->lang->line('common_action_label');?> </th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
										<td><?php echo ($search['no_of_records']*$search['pagi_number'])+$i++ ; ?></td>
										<td><?php if($result->is_approve!=1){?> <input type="checkbox" name="select_id[]" class="sub_checkbox_check" title="Check All" value="<?php echo $result->id;?>"><?php } ?></td> 
										<td><?php echo $result->pro_name;?></td> 
										<td><?php echo $result->pro_code;?></td> 
										<td><?php echo $result->hsn_code;?></td>  
										<td><?php echo $result->product_category_name;?></td>  
										<td><?php echo $result->cgst.'%';?></td>  
										<td><?php echo $result->sgst.'%';?></td>  
										<td><?php echo $result->igst.'%';?></td>  
										<td><?php if($result->price_include_gst){ echo "Yes";}else{ echo "No";}?></td>  
										<td>
										<?php if($result->is_scheme_product){ echo "Yes";
										$data_msg="<p><b>From Date - ".date(DISPLAY_DATE,strtotime($result->scheme_start_date))."</b></p><p><b>To Date -".date(DISPLAY_DATE,strtotime($result->scheme_start_date))." </b></p><p> <img src='".base_url()."uploads/product/thumb/".$result->scheme_banner."' class='thumbimage' />	</p>";
										
										?>
										<span class="badge badge-warning  toastsDefaultTopLeft" data-msg="<?php echo $data_msg;?>" data-title="Scheme   Details" style="cursor:pointer">
										<i class="fa fa-info scheme_info " ></i> 
										</span>
										<?php }else{ echo "No";}?> 
										
										
										</td>  
										<td><input type="checkbox" value="1"  data-msg="Update featured " data-confirm-msg="Are you sure do you want to update featured ? "  class=" update_status " data-id="<?php echo $result->id?>" data-module="product_master"  data-filed="featured_product" <?php if(@$result->featured_product){?> checked <?php } ?>></td>
										<td><input type="checkbox" value="1"  data-msg="Update New arrival " data-confirm-msg="Are you sure do you want to update as new arraival ? "  class=" update_status " data-id="<?php echo $result->id?>" data-module="product_master"  data-filed="new_arrival" <?php if(@$result->new_arrival){?> checked <?php } ?>></td>
										<td><?php if($result->is_subsidized){ echo "Yes";}else{ echo "No";}?></td>  
										
										
										<td><?php echo $result->seller_standard_margin;?>%</td>   
										<td><input type="checkbox" value="1"  data-msg="Update on home page " data-confirm-msg="Are you sure do you want to update on home page"  class=" update_status " data-id="<?php echo $result->id?>" data-module="product_master"  data-filed="show_home_page" <?php if(@$result->show_home_page){?> checked <?php } ?>></td>
										
										<td><input type="checkbox" value="1"  data-msg="<?php echo $this->lang->line('admin_msg_status_updated');?>" data-confirm-msg="<?php echo $this->lang->line('admin_msg_status_update_confirm');?>"  class=" update_status " data-id="<?php echo $result->id?>" data-module="product_master"  data-filed="is_active" <?php if(@$result->is_active){?> checked <?php } ?>></td>
										
										<td><?php echo date(DISPLAY_DATE,strtotime($result->created_date));?></td> 
										<td><?php if($result->is_approve==1){ echo "Yes";}elseif($result->is_approve==0){ echo "Pending";}elseif($result->is_approve=='-1'){ echo "Rejected ";}?></td>
										  
										<td><?php echo $result->username;?></td> 
										<td> 
										<a title="Product Detail" class="btn btn-default btn-xs  "  href="Product/product-detail/<?php echo $result->id?>"  ><i class="fas fa-eye"></i> </a>
										<?php if($this->Home_model->check_permission('save_product')){?> 
										<a class="btn btn-xs btn-info" href="product/create-product/<?php echo $result->id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a>
										<?php } ?>
										 
										<?php if($this->Home_model->check_permission('delete_product')){?>	
										<a class="btn btn-xs btn-danger confirm_delete" href="product/delete-product/<?php echo $result->id?>" title="Delete"><i class="fa fa-trash"></i></a>
										<?php } ?> 
										</td> 
										 
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
							
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
		
          <b> 
<?php 
$p_f=$search['no_of_records']*$search['pagi_number']+1;
$p_t=($search['no_of_records']*$search['pagi_number'])+($i-1);
$p_a=$count_results;
$pg_str=str_replace('$1',$p_f,$this->lang->line('common_pagination'));
$pg_str=str_replace('$2',$p_t,$pg_str);
$pg_str=str_replace('$3',$p_a,$pg_str);
echo $pg_str;
?>
		   </b>
				  <?php
				  
				   $no_of_btn1=$count_results/$search['no_of_records'];
				   $no_of_btn= round($no_of_btn1);
				 if($no_of_btn1>$no_of_btn){
				 	$no_of_btn++;
				 }
				  ?>
				 	<div class="pagination col-xs-12" style=" float: right;">
					<?php for($h=0;$h<$no_of_btn;$h++){ $p=$h+1;?>
					<button class="btn  btn-sm pagination_btn <?php if($search['pagi_number']==$h) { echo 'btn-info'; }else{ echo 'btn-default'; }?>" value="<?php echo $h;?>"  data-frm="basic_search"><?php echo $p;?></button>
					<?php } ?>
 					<input type="hidden" name="pagi_number"  id="pagi_number" value="<?php if(@$_POST['pagi_number']){ echo $_POST['pagi_number'];}else{ echo '0';}?>" />
					<input type="hidden" name="sort_by"  id="sort_by" value="<?php if(@$_POST['sort_by']){ echo $_POST['sort_by'];}else{ echo 'id';}?>" />
					<input type="hidden" name="sort_order"  id="sort_order" value="<?php if(@$_POST['sort_order']){ echo $_POST['sort_order'];}else{ echo 'desc';}?>" />
					</div>
        </div>
        <!-- /.card-footer-->
		<?php }else{ ?> 
		<center><h1 style="color:red">Permission Denied</h1></center>
		<?php }?>
      </div>
	</div>
</div>


   <div class="modal fade modal-default " id="master_product_note_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Note</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><textarea style="width:100%" name="approve_note" id="approve_note" maxlength="255"></textarea></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_close_btn');?></button>
              <button type="button" class="btn btn-info"  id='save_product_note'><?php echo $this->lang->line('common_save_close_btn');?></button> 
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  
  
    </form> </section>
    <!-- /.content -->
  </div>
 
 