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
	<?php echo form_open_multipart('admin/order/dispatched-order', array('id' => 'basic_search','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class="card"> 	   
        <div class="card-header">
          <h3 class="card-title">Search Order  </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
           <div class="form-group row"> 
                    <div class="col-sm-6">
					<label for="inputEmail3" class="col-sm-12 col-form-label">Order No. / Cust. Name / Mobile /Email </label>
						<input type="text" class="form-control" name="search_query" id="search_query" value="<?php echo $search['search_query']?>">
				   </div>
				     
				   <div class="col-sm-6">
					<label for="inputEmail3" class="col-sm-12 col-form-label">Seller</label>
					 
					<select name="seller_id" id="seller_id" class=" form-control select2 " style="width:100%;"> 
						<option value="0"  ><?php echo $this->lang->line('common_all');?></option>
						<?php foreach($seller_rss as $seller_rs){?>
						<option value="<?php echo $seller_rs->order_id?>" <?php if(@$search['seller_id']==$seller_rs->order_id){?> selected <?php } ?>><?php echo $seller_rs->name;?></option>
						<?php } ?>
						</select> 
					 
						 
				   </div>
				 </div>
					 
			<div class="form-group row">
                   <div class="col-sm-3">
					<label for="inputEmail3" class="col-sm-12 col-form-label">From Date</label>
						<input type="text" class="form-control" name="from_date" id="from_date" value="<?php echo $search['from_date']?>">
				   </div>
                    <div class="col-sm-3">
					<label for="inputEmail3" class="col-sm-12 col-form-label">To Date</label>
						<input type="text" class="form-control" name="to_date" id="to_date" value="<?php echo $search['to_date']?>">
				   </div>
                    
				   <div class="col-sm-3"> 
				   <label for="inputEmail3" class="col-sm-12 col-form-label">&nbsp;</label>
				<input type="submit" name="search" id="search" value="<?php echo $this->lang->line('common_search_btn');?>" class="btn btn-danger" style="width:100%;float:right" />
			</div>
			<div class="col-sm-3"> 
			 <label for="inputEmail3" class="col-sm-12 col-form-label">&nbsp;</label>
				<a style="float:right;width:100%" class="btn btn-success" href="order/dispatched-order"><?php echo $this->lang->line('common_reset_btn');?></a>
			</div> 
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
				<input  type="button"  id="mark_as_delivered" value="Mark As Delivered" class="btn btn-success  " style="width:100%;float:right" />
			</div>
		 
		  <?php } ?>
		  
        </div>
		<?php if($this->Home_model->check_permission('product_list')){?>
        <div class="card-body">
           <table id="example_php" class="table table-bordered table-striped col-xs-12" >
								<thead>
									<tr >
										<th>#</th>
										<th><input type="checkbox" class="check_all_check" title="Check All"></th>
										 
   <th> Order Number
 <i style="cursor:pointer" class="fas fa-arrow-circle-up sorting_btn"  data-frm="basic_search" data-filed="order_number" data-type="ASC"></i>
 <i style="cursor:pointer" class="fas fa-arrow-circle-down sorting_btn"  data-frm="basic_search" data-filed="order_number" data-type="DESC"></i>
   </th>
										 
										<th> Order Date </th>  
										<th> Payment Status </th> 
										<th> Customer Name</th>
										<th> Mobile</th>
										<th> Email</th>
										<th> Payment Mode</th>
										<th> Cart Amount </th>
										<th> Wallet Amount</th> 
										<th> Is Coupon Used</th>
										<th> Total Products</th> 
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
										<td><?php echo ($search['no_of_records']*$search['pagi_number'])+$i++ ; ?></td>
										<td><?php if($result->is_admin_approve!=1){?> <input type="checkbox" name="order_id[]" class="sub_checkbox_check" title="Check All" value="<?php echo $result->order_id;?>"><?php } ?></td> 
										<td><?php echo $result->order_number;?></td> 
										<td><?php echo date(DISPLAY_DATE_TIME,strtotime($result->order_date));?></td> 
										<td><?php echo ucwords($result->payment_status);?></td>  
										<td><?php echo $result->name;?></td>  
										<td><?php echo $result->mobile;?></td>  
										<td><?php echo $result->email;?></td>  
										<td><?php echo $result->payment_mode;?></td>  
										<td><a  href="javascript:void(0);" class="order_payment_popup" data-id="<?php echo $result->order_id?>"><?php echo $result->total_cart_amount;?></a></td>  
										<td><?php echo $result->wallet_amount_used;?></td>  
										 <td>
										<?php if($result->coupon_id){ echo "Yes";
										if($result->coupon_type=='per'){
											$dtype=" %";
										}else{
											$dtype=" Rs.";
										}
										$data_msg="<p><b>Coupon Code - ".$result->coupon_code."</b></p><p><b>Coupon Discount - ".$result->org_coupon_amt.' '.$dtype."</b></p><p><b> Total Discount - ".$result->coupon_discount."</b>	</p>";
										
										?>
										<span class="badge badge-warning  toastsDefaultTopLeft" data-msg="<?php echo $data_msg;?>"  data-title="Coupon Info" style="cursor:pointer">
										<i class="fa fa-info scheme_info " ></i> 
										</span>
										<?php }else{ echo "No";}?> 
										
										</td>
										<td><a  href="javascript:void(0);" class="order_detail_popup" data-seller-id="" data-id="<?php echo $result->order_id?>"><?php echo $result->total_product;?></td>  
										 
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


   <div class="modal fade modal-default " id="master_order_note_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Note</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><textarea style="width:100%" name="reject_note" id="reject_note" maxlength="255"></textarea></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('common_close_btn');?></button>
              <button type="button" class="btn btn-info"  id='save_order_reject_note'><?php echo $this->lang->line('common_save_close_btn');?></button> 
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	   <input type="hidden" name="return_to" value="dispatched-order">

  
  
    </form> </section>
    <!-- /.content -->
  </div>
  