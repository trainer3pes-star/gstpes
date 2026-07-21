
        <!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Sign Up</h2>
                                <ul>
                                    <li>
                                        <a href="index.php">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Register </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-register-area section-space-y-axis-100">
                <div class="container login-form">
                    <div class="row">
                        
                        <div class="col-lg-12 pt-10 pt-lg-0">
						 <?php echo form_open_multipart('Home/save_user', array('id' => 'register_frm','name' => 'register_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?> 
                                <div class="">
                                    <div class="row bgtitle">
                                        <div class="col-md-12 col-12">
                                            <h4 class="login-title mb-5">Get Register Now</h4>
                                        </div>
                                      <!--   <div class="col-md-6 col-12" style="text-align: right;">
                                            
                                        </div> -->
                                        </div>
                                    <div class="row mt-6">
                                        <div class="col-md-6 col-12">
                                            <label>Role <span class="required_label">*</span></label>
                                            <select name="role_id" id="role_id" class="form-control select2 required run_time_role">
											<option value="0">Select Role</option>
											<?php foreach($role_lists as $role_list){?>
											<option value="<?php echo $role_list->id?>"><?php echo $role_list->name?></option>
											<?php } ?>
											</select>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <label> First Name <span class="required_label">*</span></label>
                                            <input type="text" placeholder="First Name" name="fname" id="fname" class="form-control no_number required no_special no_space">
                                        </div>
										<div class="col-md-3 col-12">
                                            <label> Last Name <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Last Name" name="lname" id="lname" class="form-control no_number no_space required no_special">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>User Designation(if registerd as company) <span class="required_label">*</span></label>
                                            <select name="designation_id" id="designation_id" class="form-control select2 required">
											<option value="">Select Designation</option>
											<?php foreach($designation_lists as $designation_list){?>
											<option value="<?php echo $designation_list->id?>"><?php echo $designation_list->name?></option>
											<?php } ?>
											</select>
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Personal Mobile No. <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Personal Mobile No" name="mobile" id="mobile" class="form-control required no_space no_special no_chara" maxlength="10">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Personal Email Id <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Personal Email Id" name="email" id="email" class="form-control required no_space email_validate">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Address Line 1 <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Address Line 1" name="address_one" id="address_one" class="form-control required    " maxlength="200">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Address Line 2  </label>
                                            <input type="text" placeholder="Address Line 2" name="address_two" id="address_two" class="form-control      " maxlength="200">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Near by landmark <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Near by landmark" name="near_landmark" id="near_landmark" class="form-control required    " maxlength="200">
                                            
                                        </div>
										<div class="col-md-6 col-12">
											<input type="hidden" name="country_id" value="<?php echo $country_id;?>">
                                            <label>State <span class="required_label">*</span></label>
                                            <select name="state_id" id="state_id" class="form-control select2 required call_run_time" data-ref="district_id" data-tb="district" data-select="">
											<option value="">Select State</option>
											<?php foreach($state_lists as $state_list){?>
											<option value="<?php echo $state_list->state_id?>"><?php echo $state_list->name?></option>
											<?php } ?>
											</select>
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>District <span class="required_label">*</span></label>
                                            <select name="district_id" id="district_id" class="form-control select2 required call_run_time" data-ref="city_id" data-tb="cities" data-select="" >
											<option value="">Select District</option> 
											</select>
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>City <span class="required_label">*</span></label>
                                            <select name="city_id" id="city_id" class="form-control select2 required ">
											<option value="">Select City</option> 
											</select>
                                        </div>
                                        
										<div class="col-md-6 col-12">
                                            <label>Pincode <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Pincode" name="pincode" id="pincode" class="form-control required no_space no_special no_chara    " maxlength="7">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Password <span class="required_label">*</span></label>
                                            <input type="password" placeholder="Password" name="password" id="password" class="form-control required password_validate  " maxlength="12">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Confirm Password <span class="required_label">*</span></label>
                                            <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" class="form-control required  password_validate same_to_same" data-input="password" maxlength="12" data-msg="Password and confirm password not match">
                                            
                                        </div> 
										
										
								<!--		<div class="col-12 col-md-12" style="padding-top:2%;">
                                            <input type="button" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0 btn_validator" data-frm="register_frm" value="Register"> 
                                        </div> -->
                                        
                                    </div>
                              
                                   
							  </div>
							  
                             
							
                                <div class="company_other" style="display:none;">
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label>Company Type <span class="required_label">*</span></label>
                                            <select name="company_type_id" id="company_type_id" class="form-control select2 nrequired run_time_company_type">
											<option value="0">Select Company Type</option>
											<?php foreach($company_type_lists as $company_type_list){?>
											<option value="<?php echo $company_type_list->id?>"><?php echo $company_type_list->comapny_type?></option>
											<?php } ?>
											</select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                             <label>Do you want credit facility? <span class="required_label">*</span></label>
                                            <select name="credit_facility" id="credit_facility" class="form-control select2 nrequired">
											<option value="">Select Select</option>
											<option value="1">Yes</option>
											<option value="0">No</option>
											 
											</select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label> Company/Firm Name <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Company/Firm Name" name="company_name" id="company_name" class="form-control no_number nrequired no_special  ">
                                            
                                        </div>
                                        <div class="col-md-3 col-12">
                                             <label>Logo</label>
                                            <input type="file" name="logo" id="logo" placeholder="Company Logo" class="profile_photo allow_File_only " data-file="image"  accept="  image/jpeg, image/png"  data-class="com_logo" >
                                        </div>
                                        <div class="col-md-3 col-12 com_logo">
                                            <?php $file_name="no_image.png";?>
											<img src="<?php echo base_url(); ?>uploads/product/thumb/<?php echo $file_name;?>" class="thumbimage" />	
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Company email id <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Company Email Id" name="company_email" id="company_email" class="form-control nrequired no_space email_validate">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Company Mobile number <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Company Mobile number" class="form-control nrequired no_space no_special no_chara" maxlength="10" name="company_mobile" id="company_mobile">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Company Website</label>
                                            <input type="text" placeholder="Company Website" class="form-control   no_space    "   name="company_website" id="company_website">
                                        </div>
										<div class="col-md-6">
                                            <label>Company  GST No. <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Company  GST No." class="form-control nrequired no_space no_special  " maxlength="200" name="company_gst_no" id="company_gst_no">
                                        </div>
										<div class="col-md-6">
                                            <label>Shop Act No. <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Shop Act No." class="form-control nrequired no_space no_special  " maxlength="200" name="shop_act_no" id="shop_act_no">
                                        </div><div class="col-md-6">
                                            <label>Company License No. <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Company License No." class="form-control nrequired no_space no_special  " maxlength="200" name="company_license_no" id="company_license_no">
                                        </div>
											<div class="col-md-6 col-12">
                                            <label>Address Line 1 <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Address Line 1" name="company_address_one" id="company_address_one" class="form-control nrequired    " maxlength="200">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Address Line 2  </label>
                                            <input type="text" placeholder="Address Line 2" name="company_address_two" id="company_address_two" class="form-control      " maxlength="200">
                                            
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>Near by landmark <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Near by landmark" name="company_near_landmark" id="company_near_landmark" class="form-control nrequired    " maxlength="200">
                                            
                                        </div>
										<div class="col-md-6 col-12">
										<input type="hidden" name="company_country_id" value="<?php echo $country_id;?>">
                                            <label>State <span class="required_label">*</span></label>
                                            <select name="company_state_id" id="company_state_id" class="form-control select2 nrequired call_run_time" data-ref="company_district_id" data-tb="district" data-select="">
											<option value="">Select State</option>
											<?php foreach($state_lists as $state_list){?>
											<option value="<?php echo $state_list->state_id?>"><?php echo $state_list->name?></option>
											<?php } ?>
											</select>
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>District <span class="required_label">*</span></label>
                                            <select name="company_district_id" id="company_district_id" class="form-control select2 nrequired call_run_time" data-ref="company_city_id" data-tb="cities" data-select="" >
											<option value="">Select District</option> 
											</select>
                                        </div>
										<div class="col-md-6 col-12">
                                            <label>City <span class="required_label">*</span></label>
                                            <select name="company_city_id" id="company_city_id" class="form-control select2 nrequired">
											<option value="">Select City</option> 
											</select>
                                        </div>
                                        
										<div class="col-md-6 col-12">
                                            <label>Pincode <span class="required_label">*</span></label>
                                            <input type="text" placeholder="Pincode" name="company_pincode" id="company_pincode" class="form-control nrequired no_space no_special no_chara    " maxlength="7">
                                            
                                        </div>
										
									  </div>
                                </div>
								 <br>
								 
								 <div class="company_documnet_other" style="display:none;">
                                    
                                    <div class="row">
                                       
                                         
                                        
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>KYC documents of proprietor(Aadhar, Pancard)<span class="required_label">*</span></label>
											<div class="col-md-4" style="float:left;"> 
											<select name="kyc_doc_type" id="kyc_doc_type" class="form-control">
											<option value="Aadhar">Aadhar</option>
											<option value="Pancard">Pancard</option>
											</select>
											</div>
											<div class="col-md-8" style="float:left;">  
                                            <input type="file" name="kyc_file" id="kyc_file" placeholder="KYC Document" class="file_1_f file_2_f file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  >
											</div>
                                        </div>
										  
                                        
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>Company shop act/registration<span class="required_label">*</span></label>
                                            <input type="file" name="shop_registration" id="shop_registration" placeholder="Shop registration" class=" requiredd allow_File_only file_1_f file_2_f file_3_f" data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
                                        
										
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>License(For either Pesticides, Fertilizers, Seeds OR all licenses)<span class="required_label">*</span></label>
                                            <input type="file" name="license[]" id="license" placeholder="License" class="file_1_f file_2_f file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"  multiple  >
                                        </div>
                                        
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>Shop address proof(Electricity bill or some valid document)<span class="required_label">*</span></label>
                                            <input type="file" name="address_proof" id="address_proof" placeholder="Shop address proof" class="file_1_f file_2_f file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div> 
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>Bank passbook OR last 1 year statement<span class="required_label">*</span></label>
                                            <input type="file" name="bank_passbook" id="bank_passbook" placeholder="Bank passbook OR last 1 year statement" class=" requiredd allow_File_only file_1_f file_2_f file_3_f" data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>GST certificate<span class="required_label">*</span></label>
                                            <input type="file" name="gst_certificate" id="gst_certificate" placeholder="GST certificate" class="file_2_f file_1_f file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
										<div class="col-md-6 col-12 file_2 file_n">
                                             <label>Partnership deed<span class="required_label">*</span></label>
                                            <input type="file" name="partnership_deed" id="partnership_deed" placeholder="Partnership deed" class=" requiredd allow_File_only file_2_f  " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
										<div class="col-md-6 col-12 file_2 file_3 file_n">
                                             <label>Company pan card<span class="required_label">*</span></label>
                                            <input type="file" name="pan_card" id="pan_card" placeholder="Company pan card" class=" file_2_f file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
										<div class="col-md-6 col-12 file_3 file_n">
                                             <label>Din numbers copy<span class="required_label">*</span></label>
                                            <input type="file" name="din_copy" id="din_copy" placeholder="Din numbers copy" class=" file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
										<div class="col-md-6 col-12 file_3 file_n">
                                             <label>AOA/MOA(Article of association/Memorandum of association) <span class="required_label">*</span></label>
                                            <input type="file" name="aoa_copy" id="aoa_copy" placeholder="AOA/MOA" class="file_3_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
                                        <div class="col-md-6 col-12 file_1 file_2 file_3 file_n">
                                             <label>Source/supply/principle certificate(From seller AND if Buyer then the Agriday will provide them)<span class="required_label">*</span></label>
                                            <input type="file" name="principle_certificate" id="principle_certificate" placeholder="Source/supply/principle certificate" class="file_3_f file_1_f file_2_f requiredd allow_File_only " data-file="image"  accept="  image/jpeg, image/png , application/pdf"   >
                                        </div>
                                        
										
                                      </div>
                                </div>
                                                    

						  </form>
                             
                        </div>
                        
						 
							<div class="col-md-4 col-12" style=""> </div>
							<div class="col-md-4 col-12" style="">
								<input type="button" class="btn btn-custom-size-register btn-secondary btn-primary-hover rounded-0 btn_validator"  data-frm="register_frm" value="SUBMIT"> 
							</div>
							<div class="col-md-4 col-12" style=""> </div>
							
						 
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
