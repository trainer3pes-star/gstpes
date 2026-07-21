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
	 <div class="col-md-10">
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
      <!-- Default box -->
	  <?php echo form_open_multipart('admin/user/save-company', array('id' => 'admin_user_basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
	  <div class=" row">
    <div class="col-md-8">
			
	  <div class="card">
	  
        <div class="card-header">
          <h3 class="card-title">Company Info</h3> 
        </div> 
       <div class="card-body">
				  <div class="row">
                                        <div class="col-md-6 col-12 form-group row">
                                            <label>Company Type <label class="required_label">*</label></label>
                                            <select name="company_type_id" id="company_type_id" class="form-control select2 required run_time_company_type">
											<option value="0">Select Company Type</option>
											<?php foreach($company_type_lists as $company_type_list){?>
											<option <?php if($result->company_type_id==$company_type_list->id){?> selected  <?php } ?> value="<?php echo $company_type_list->id?>"><?php echo $company_type_list->comapny_type?></option>
											<?php } ?>
											</select>
                                        </div>
                                        <div class="col-md-6 col-12 form-group row">
                                             <label>Do you want credit facility? <label class="required_label">*</label></label>
                                            <select name="credit_facility" id="credit_facility" class="form-control select2 required">
											<option value="">Select Select</option>
											<option value="1" <?php if($result->credit_facility=='1'){?> selected  <?php } ?>>Yes</option>
											<option value="0" <?php if($result->credit_facility=='0'){?> selected  <?php } ?>>No</option>
											 
											</select>
                                        </div>
                                        <div class="col-md-6 col-12 form-group row">
                                            <label> Company/Firm Name <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Company/Firm Name" name="company_name" id="company_name" class="form-control no_number required no_special  " value="<?php echo $result->company_name?>">
                                            
                                        </div>
                                        <div class="col-md-3 col-12">
                                             <label>Logo <label class="required_label">&nbsp;</label></label>
                                            <input type="file" name="logo" id="logo" placeholder="Company Logo" class="profile_photo allow_File_only form-control " data-file="image"  accept="  image/jpeg, image/png"  data-class="com_logo" >
                                        </div>
                                        <div class="col-md-3 col-12 com_logo">
                                            <?php 
											if($result->company_logo){
												$file_name=$result->company_logo;
											}else{
												$file_name="no_image.png";
											}?>
											<input type="hidden" name="company_logo" value="<?php echo $result->company_logo?>" />
											<img src="<?php echo base_url(); ?>uploads/users/thumb/<?php echo $file_name;?>" class="thumbimage" />
											
                                        </div>
                                        <div class="col-md-6 col-12 form-group row">
                                            <label>Company email id <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Company Email Id" name="company_email" id="company_email" class="form-control required no_space email_validate" value="<?php echo $result->company_email?>">
                                        </div>
                                        <div class="col-md-6  col-12 form-group row">
                                            <label>Company Mobile number <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Company Mobile number" class="form-control required no_space no_special no_chara" maxlength="10" name="company_mobile" id="company_mobile" value="<?php echo $result->company_mobile?>">
                                        </div>
                                        <div class="col-md-6  col-12 form-group row">
                                            <label>Company Website</label>
                                            <input type="text" placeholder="Company Website" class="form-control   no_space    "   name="company_website" id="company_website"  value="<?php echo $result->company_website?>">
                                        </div>
										<div class="col-md-6  col-12 form-group row">
                                            <label>Company  GST No. <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Company  GST No." class="form-control required no_space no_special  " maxlength="200" name="company_gst_no" id="company_gst_no"  value="<?php echo $result->company_gst_no?>">
                                        </div>
										<div class="col-md-6  col-12 form-group row">
                                            <label>Shop Act No. <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Shop Act No." class="form-control required no_space no_special  " maxlength="200" name="shop_act_no" id="shop_act_no"  value="<?php echo $result->shop_act_no?>">
                                        </div><div class="col-md-6  col-12 form-group row">
                                            <label>Company License No. <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Company License No." class="form-control required no_space no_special  " maxlength="200" name="company_license_no" id="company_license_no"  value="<?php echo $result->company_license_no?>">
                                        </div>
											<div class="col-md-6 col-12 form-group row">
                                            <label>Address Line 1 <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Address Line 1" name="company_address_one" id="company_address_one" class="form-control required    " maxlength="200"  value="<?php echo $result->company_address_one?>">
                                            
                                        </div>
										<div class="col-md-6 col-12 form-group row">
                                            <label>Address Line 2  </label>
                                            <input type="text" placeholder="Address Line 2" name="company_address_two" id="company_address_two" class="form-control      " maxlength="200"  value="<?php echo $result->company_address_two?>">
                                            
                                        </div>
										<div class="col-md-6 col-12 form-group row">
                                            <label>Near by landmark <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Near by landmark" name="company_near_landmark" id="company_near_landmark" class="form-control required    " maxlength="200"  value="<?php echo $result->company_near_landmark?>">
                                            
                                        </div>
										<div class="col-md-6 col-12 form-group row">
										<input type="hidden" name="company_country_id" value="<?php echo $country_id;?>">
                                            <label>State <label class="required_label">*</label></label>
                                            <select name="company_state_id" id="company_state_id" class="form-control select2 required call_run_time <?php if($result->id){ ?> call_run_time_auto <?php } ?>" data-ref="company_district_id" data-tb="district" data-select="<?php echo $result->company_district_id?>">
											<option value="">Select State</option>
											<?php foreach($state_lists as $state_list){?>
											<option value="<?php echo $state_list->state_id?>" <?php if($result->company_state_id==$state_list->state_id){?> selected <?php } ?>><?php echo $state_list->name?></option>
											<?php } ?>
											</select>
                                        </div>
										<div class="col-md-6 col-12 form-group row">
                                            <label>District <label class="required_label">*</label></label>
                                            <select name="company_district_id" id="company_district_id" class="form-control select2 required call_run_time <?php if($result->id){ ?> call_run_time_auto <?php } ?>" data-ref="company_city_id" data-tb="cities" data-select="<?php echo $result->company_city_id?>" >
											<option value="">Select District</option> 
											</select>
                                        </div>
										<div class="col-md-6 col-12 form-group row">
                                            <label>City <label class="required_label">*</label></label>
                                            <select name="company_city_id" id="company_city_id" class="form-control select2 required ">
											<option value="">Select City</option> 
											</select>
                                        </div>
                                        
										<div class="col-md-6 col-12 form-group row">
                                            <label>Pincode <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Pincode" name="company_pincode" id="company_pincode" class="form-control required no_space no_special no_chara    " maxlength="7"  value="<?php echo $result->company_pincode?>">                                            
                                        </div>
										<div class="col-md-12 form-group row" style="text-align: center;"> 
			<input type="hidden" id="user_id" name="user_id" value="<?php echo @$result->user_id ;?>" />
			<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" /> 
  			<input type="button" name="save" id="save" value="<?php echo $this->lang->line('common_save_btn');?>" class="btn btn-info btn_validator" data-frm="admin_user_basic_frm"  style="width:200px;" />
      </div>
                                                                          </div>
			  
        </div> 
      </div>
   
	<!-- /.card -->
</div> 

<div class="col-md-4">
	<div class="card"> 	   
         <div class="card-header">
          <h3 class="card-title">Documents</h3>
 
        </div>
        <div class="card-body">
		 <?php
			$doc_array=array();
		 foreach($company_docs as $company_doc){
			$doc_array[$company_doc->document_name][]= $company_doc->file_name;
			 
		 }  ?>
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>KYC documents of proprietor(Aadhar, Pancard)<label class="required_label">*</label></label> 
											<div class="col-md-12 kyc_input_d" style="float:left;"> 
											<select name="kyc_doc_type" id="kyc_doc_type" class="form-control">
											<option value="Aadhar">Aadhar</option>
											<option value="Pancard">Pancard</option>
											</select>
											</div>
											<div class="col-md-12 kyc_input_d" style="float:left;">  
                                            <input type="file" name="kyc_file" id="kyc_file" placeholder="KYC Document" class="file_1_f file_2_f file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf" data-ufile="<?php echo $doc_array['kyc_file'][0]?>" >
											</div>
											<?php if($doc_array['kyc_file'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['kyc_file'][0]?>"   > <?php echo $doc_array['kyc_file'][0]?></a>
											<?php } ?>
										</div>
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>Company shop act/registration<label class="required_label">*</label></label>
											  
											  <div class="col-md-12 kyc_input_d" style="float:left;"> 
                                            <input type="file" name="shop_registration" id="shop_registration" placeholder="Shop registration" class=" requiredd up_filen form-control  allow_File_only file_1_f file_2_f file_3_f" data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['shop_registration'][0]?>" ></div>
											 <?php if($doc_array['shop_registration'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['shop_registration'][0]?>"   > <?php echo $doc_array['shop_registration'][0]?></a>
											<?php } ?>
                                        </div>
                                        
										
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>License(For either Pesticides, Fertilizers, Seeds OR all licenses)<label class="required_label">*</label></label>
                                            <input type="file" name="license[]" id="license" placeholder="License" class="file_1_f file_2_f file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  multiple data-ufile="<?php echo implode(',',$doc_array['license'])?>"  >
											
											 <?php foreach($doc_array['license'] as $license ){?>
											 <div class="col-md-12">
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $license?>"   > <?php echo $license?> 
											</a>
											<input type="hidden" name="license_hidden[]" class="license_hidden" value="<?php echo $license?>">
											<a href="javascript:void(0);" title="Delete" style="color:red"  class="delete_file_run"> Delete </a>
 											</div>
											<?php } ?>
                                        </div>
                                        
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>Shop address proof(Electricity bill or some valid document)<label class="required_label">*</label></label>
                                            <input type="file" name="address_proof" id="address_proof" placeholder="Shop address proof" class="file_1_f file_2_f file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   data-ufile="<?php echo $doc_array['address_proof'][0]?>"  >
											 <?php if($doc_array['address_proof'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['address_proof'][0]?>"   > <?php echo $doc_array['address_proof'][0]?></a>
											<?php } ?>
                                        </div> 
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>Bank passbook OR last 1 year statement<label class="required_label">*</label></label>
                                            <input type="file" name="bank_passbook" id="bank_passbook" placeholder="Bank passbook OR last 1 year statement" class=" requiredd up_filen form-control  allow_File_only file_1_f file_2_f file_3_f" data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['bank_passbook'][0]?>"   >
											
											 <?php if($doc_array['bank_passbook'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['bank_passbook'][0]?>"   > <?php echo $doc_array['bank_passbook'][0]?></a>
											<?php } ?>
                                        </div>
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>GST certificate<label class="required_label">*</label></label>
                                            <input type="file" name="gst_certificate" id="gst_certificate" placeholder="GST certificate" class="file_2_f file_1_f file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['gst_certificate'][0]?>" >
											
											 <?php if($doc_array['gst_certificate'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['gst_certificate'][0]?>"   > <?php echo $doc_array['gst_certificate'][0]?></a>
											<?php } ?>
                                        </div>
										<div class="form-group row file_2 file_n">
                                             <label>Partnership deed<label class="required_label">*</label></label>
                                            <input type="file" name="partnership_deed" id="partnership_deed" placeholder="Partnership deed" class=" requiredd up_filen form-control  allow_File_only file_2_f  " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   data-ufile="<?php echo $doc_array['partnership_deed'][0]?>" >
											
											 <?php if($doc_array['partnership_deed'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['partnership_deed'][0]?>"   > <?php echo $doc_array['partnership_deed'][0]?></a>
											<?php } ?>
                                        </div>
										<div class="form-group row file_2 file_3 file_n">
                                             <label>Company pan card<label class="required_label">*</label></label>
                                            <input type="file" name="pan_card" id="pan_card" placeholder="Company pan card" class=" file_2_f file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['pan_card'][0]?>"    >
											 <?php if($doc_array['pan_card'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['pan_card'][0]?>"   > <?php echo $doc_array['pan_card'][0]?></a>
											<?php } ?>
                                        </div>
										<div class="form-group row file_3 file_n">
                                             <label>Din numbers copy<label class="required_label">*</label></label>
                                            <input type="file" name="din_copy" id="din_copy" placeholder="Din numbers copy" class=" file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['din_copy'][0]?>"      >
											
											 <?php if($doc_array['din_copy'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['din_copy'][0]?>"   > <?php echo $doc_array['din_copy'][0]?></a>
											<?php } ?>
                                        </div>
										<div class="form-group row file_3 file_n">
                                             <label>AOA/MOA(Article of association/Memorandum of association) <label class="required_label">*</label></label>
                                            <input type="file" name="aoa_copy" id="aoa_copy" placeholder="AOA/MOA" class="file_3_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['aoa_copy'][0]?>"    >
											 <?php if($doc_array['aoa_copy'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['aoa_copy'][0]?>"   > <?php echo $doc_array['aoa_copy'][0]?></a>
											<?php } ?>
                                        </div>
                                        <div class="form-group row file_1 file_2 file_3 file_n">
                                             <label>Source/supply/principle certificate(From seller AND if Buyer then the Agriday will provide them)<label class="required_label">*</label></label>
                                            <input type="file" name="principle_certificate" id="principle_certificate" placeholder="Source/supply/principle certificate" class="file_3_f file_1_f file_2_f requiredd up_filen form-control  allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  data-ufile="<?php echo $doc_array['principle_certificate'][0]?>"   >
											
											 <?php if($doc_array['principle_certificate'][0]){?>
											<a   title="View Document" target="_blank" href="<?php echo base_url()?>uploads/document/<?php echo $doc_array['principle_certificate'][0]?>"   > <?php echo $doc_array['principle_certificate'][0]?></a>
											<?php } ?>
                                        </div>
                                        
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
	 
</div>	   
		</div>

<?php  echo form_close(); ?>
    </section>
    <!-- /.content -->
  
  </div>
 