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
	<?php echo form_open_multipart('admin/product/mark-as-my-product', array('id' => 'basic_search','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
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
				    <div class="col-sm-4">
					<label for="inputEmail3" class="col-sm-12 col-form-label">Product Category</label>
					 
					<select name="product_category_id" id="product_category_id" class=" form-control select2 " style="width:100%;"> 
						<option value="0"  ><?php echo $this->lang->line('common_all');?></option>
						<?php foreach($parent_category as $parent_cat){?>
						<option value="<?php echo $parent_cat->id?>" <?php if(@$search['product_category_id']==$parent_cat->id){?> selected <?php } ?>><?php echo $parent_cat->category_name;?></option>
						<?php } ?>
						</select> 
					 
						 
				   </div>
					  <div class="col-sm-2"> 
				<input type="submit" name="search" id="search" value="<?php echo $this->lang->line('common_search_btn');?>" class="btn btn-success" style="width:100%;float:right" />
			 
				<a style="float:right;width:100%" class="btn btn-danger" href="product/mark-as-my-product"><?php echo $this->lang->line('common_reset_btn');?></a>
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
        <div class="card-header" style="font-size: 13px;">
		
           <div class="col-md-1" style="float:left;"><select name="no_of_records" class="select2" style="width:100%"  onchange="$('#pagi_number').val(0);$('#basic_search').submit()">
					<option value="10" <?php if(@$search['no_of_records']==10){?> selected="selected" <?php }?> >10</option>
					<option value="25" <?php if(@$search['no_of_records']==25){?> selected="selected" <?php }?> >25</option>
					<option value="50" <?php if(@$search['no_of_records']==50){?> selected="selected" <?php }?>>50</option>
					<option value="100" <?php if(@$search['no_of_records']==100){?> selected="selected" <?php }?>>100</option>
					<option value="500" <?php if(@$search['no_of_records']==500){?> selected="selected" <?php }?>>500</option>
					<option value="1000" <?php if(@$search['no_of_records']==1000){?> selected="selected" <?php }?>>1000</option>
					<option value="-1" <?php if(@$search['no_of_records']=='-1'){?> selected="selected" <?php }?>><?php echo $this->lang->line('common_all');?></option>
					</select></div>
			<div class="col-md-1" style="float:left;"> <input type="checkbox" class="check_all_check"> Check All</div>
			<div class="col-md-2" style="float:left;text-align: right;">  <label class="label ">  <i class="far fa-circle nav-icon bg-gray"></i> Subsidized	</label> </div>
			<div class="col-md-1" style="float:left;">  <label class="label "> 	<i class="far fa-circle nav-icon bg-teal"></i>   Scheme </label> </div>
			<div class="col-md-2" style="float:left;">  <label class="label  "> <i class="far fa-circle nav-icon bg-purple"></i>  	Subsidized / Scheme </label></div>
			
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
		 	  	     
		<div class="col-sm-2" style="float:right;">  
		<select name="user_company_id[]" id="user_company_id"  placeholder="Select Company" multiple  class=" form-control select2_placeholder    " style="width:100%;"> 
						 
						<?php  
						foreach($user_companies as $user_company){?>
						<option value="<?php echo $user_company->id?>"  ><?php echo $user_company->company_name;?></option>
						<?php } ?>
						</select> 
		</div>
		<div class="col-sm-2" style="float:right;"> 
				<input data-frm="basic_search" type="button" name="save_pro" id="save_pro" value="Mark As My Product" class="btn btn-info" style="width:100%;float:right;font-size: 14px;" />
			</div> 
        </div>
		<?php if($this->Home_model->check_permission('mark_as_my_product')){?>
        <div class="card-body row"> 
          	<?php $i=1;
			 //bg-gray //bg-teal //bg-teal
			
			foreach(@$results as $result){ $class_name=""; 
			if(($result->is_scheme_product)&&($result->is_subsidized)){ $class_name="bg-purple disabled "; }elseif($result->is_subsidized){ $class_name="bg-gray disabled "; 
			}elseif($result->is_scheme_product){ $class_name="bg-teal disabled "; } 
			 ?>
			<div class="col-md-3 <?php echo $class_name;?>"><input type="checkbox" class="sub_checkbox_check" name="assign_pro[]" id="" value="<?php echo $result->id?>"> <?php echo $result->pro_name?>
			<br><small><?php echo $result->product_category_name?></small></div> 
			<?php $i++;}?>
							
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
					<input type="hidden" name="user_id"  id="user_id" value="<?php echo $login_user_info->id;?>" />
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
    </form> </section>
    <!-- /.content -->
  </div>
 
  