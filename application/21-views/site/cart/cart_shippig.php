<!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">Shipping Detail</h2>
                                <ul>
                                    <li>
                                        <a href="home">Home <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo CART_VIEW?>">Cart <i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Shipping Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-area section-space-y-axis-100">
                <div class="container">
                         <div class="row">
						 <?php foreach($user_addresss as $user_address){?>
							<div class="col-md-4">
								 
								<?php echo $user_address->fname.' '.$user_address->lname;?><br>
								<?php echo $user_address->address_one;?> , <br>
								<?php
								if(strlen($user_address->address_two)){
									echo $user_address->address_two.' , <br>';
								}?>
								<?php
								if(strlen($user_address->near_landmark)){
									echo $user_address->near_landmark.' , <br>';
								}
								echo $user_address->country_name.' , '.$user_address->state_name.' , '.$user_address->district_name.' <br> '.$user_address->city_name.' , '.$user_address->pincode;
								echo "<br>".$user_address->mobile;

								?><br>
								<?php  
								if($user_address->set_default==0){ 
								
								?>
								<a href="cart/set-default/<?php echo $user_address->id?>">Set Default</a>
								<?php  if($_SESSION['cart']['ship_id']!=$user_address->id){?>
								<a class="confirm_delete" href="cart/delete-address/<?php echo $user_address->id?>">Delete</a>
								<?php }} ?>
								<?php if($_SESSION['cart']['ship_id']!=$user_address->id){?>
								<a href="cart/use-address/<?php echo $user_address->id?>">Deliver to this address</a>
								<?php }else{ ?>
								<a href="javascript:void(0);"> <i class="pe-7s-check"></i> Deliver to this address</a>
								<?php } ?>
							</div>
						 <?php } ?>
						 </div>
                         <div class="row">
						  <form action="cart/save_shpping" method="post"  id="ship_frm" name="ship_frm">
                        <div class="col-lg-6 col-12">
                           
                                <div class="checkbox-form accordionchkout">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required_label">*</span></label>
                                                <input type="text" placeholder="First Name" name="fname" id="fname"  data-ref-input="ship_fname" class="input_ship form-control no_number required no_special no_space" value="<?php echo $bill_address->fname?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required_label">*</span></label>
                                                <input type="text" placeholder="Last Name" name="lname" id="lname"  data-ref-input="ship_lname" class="input_ship form-control no_number no_space required no_special" value="<?php echo $bill_address->lname?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                 <label>Personal Mobile No. <label class="required_label">*</label></label>
                                                <input type="text" maxlength="10" placeholder="Personal Mobile No" name="mobile" id="mobile"  data-ref-input="ship_mobile"  class="input_ship form-control required no_space no_special no_chara" maxlength="10" value="<?php echo $bill_address->mobile?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                               <label>Personal Email Id <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Personal Email Id" name="email" id="email"  data-ref-input="ship_email"  class="input_ship form-control required no_space email_validate"  value="<?php echo $bill_address->email?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address Line 1 <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Address Line 1" name="address_one" id="address_one"  data-ref-input="ship_address_one"   class="input_ship form-control required    " maxlength="200"  value="<?php echo $bill_address->address_one?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                             <label>Address Line 2  </label>
                                            <input type="text" placeholder="Address Line 2" name="address_two" id="address_two"  data-ref-input="ship_address_two"  class="input_ship form-control      " maxlength="200"  value="<?php echo $bill_address->address_two?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                           <label>Near by landmark <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Near by landmark" name="near_landmark" id="near_landmark" class="input_ship form-control required    "  data-ref-input="ship_near_landmark"   maxlength="200"  value="<?php echo $bill_address->near_landmark?>">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <input type="hidden" name="country_id" value="<?php echo $country_id;?>">
                                            <label>State <label class="required_label">*</label></label>
                                            <select name="state_id" id="state_id" class="form-control select2 required call_run_time select_ship <?php if($bill_address->id){?> auto_call_this <?php } ?>"  data-ref-input="ship_state_id"  data-ref="district_id" data-tb="district" data-select="<?php echo $bill_address->district_id?>">
											<option value="">Select State</option>
											<?php foreach($state_lists as $state_list){?>
											<option value="<?php echo $state_list->state_id?>" <?php if($state_list->state_id==$bill_address->state_id){?> selected <?php } ?>><?php echo $state_list->name?></option>
											<?php } ?>
											</select>
                                            </div>
                                        </div> 
										
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                             <label>District <label class="required_label">*</label></label>
                                            <select name="district_id" id="district_id" class="form-control select2 required call_run_time select_ship <?php if($bill_address->id){?> auto_call_this <?php } ?>"  data-ref-input="ship_district_id" data-ref="city_id" data-tb="cities" data-select="<?php echo $bill_address->city_id?>" >
											<option value="">Select District</option> 
											<?php 
											$district_lists=$this->Home_model->get_district_list($bill_address->state_id); 
											foreach($district_lists as $district_list){?>
											<option value="<?php echo $district_list->id?>" <?php if($district_list->id==$bill_address->district_id){?> selected <?php } ?>><?php echo $district_list->name?></option>
											<?php } ?>
											</select>
                                            </div>
                                        </div> 
										
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                               <label>City <label class="required_label">*</label></label>
                                            <select name="city_id" id="city_id" class="form-control select2 required select_ship"  data-ref-input="ship_city_id" >
											<option value="">Select City</option> 
											<?php 
											$city_lists=$this->Home_model->get_city_list($bill_address->district_id); 
											foreach($city_lists as $city_list){?>
											<option value="<?php echo $city_list->id?>" <?php if($city_list->id==$bill_address->city_id){?> selected <?php } ?>><?php echo $city_list->name?></option>
											<?php } ?>
											</select>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                               <label>Pincode <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Pincode" name="pincode" id="pincode" data-ref-input="ship_pincode" class="input_ship form-control required no_space no_special no_chara    " maxlength="7"   value="<?php echo $bill_address->pincode?>">
                                            
                                            </div>
                                        </div> 
                                        
								   </div>
                                  

								  </div>
                           
                        </div>
                        <div class="col-lg-6 col-12">
                               <div class="different-address checkbox-form accordionchkout">
                                        <div class="ship-different-title accordionchkout">
                                            <h3>
                                                <label>Ship to a different address?</label>
                                                <input id="ship-box" type="checkbox" value="1" class="check_diff_ship" <?php if(@$ship_address->id){ ?> checked <?php } ?>>
                                            </h3>
                                        </div>
                                        <div id="ship-box-info" class="row" >
                                            <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required_label">*</span></label>
                                                <input type="text" placeholder="First Name" name="ship_fname" id="ship_fname" class="form-control no_number required no_special no_space"  value="<?php echo $ship_address->fname?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required_label">*</span></label>
                                                <input type="text" placeholder="Last Name" name="ship_lname" id="ship_lname" class="form-control no_number no_space required no_special"  value="<?php echo $ship_address->lname?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                 <label>Personal Mobile No. <label class="required_label">*</label></label>
                                                <input type="text" placeholder="Personal Mobile No" name="ship_mobile" id="ship_mobile" class="form-control required no_space no_special no_chara" maxlength="10"   value="<?php echo $ship_address->mobile?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                               <label>Personal Email Id <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Personal Email Id" name="ship_email" id="ship_email" class="form-control required no_space email_validate"  value="<?php echo $ship_address->email?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address Line 1 <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Address Line 1" name="ship_address_one" id="ship_address_one" class="form-control required    " maxlength="200"   value="<?php echo $ship_address->address_one?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                             <label>Address Line 2  </label>
                                            <input type="text" placeholder="Address Line 2" name="ship_address_two" id="ship_address_two" class="form-control      " maxlength="200"  value="<?php echo $ship_address->address_two?>">
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                           <label>Near by landmark <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Near by landmark" name="ship_near_landmark" id="ship_near_landmark" class="form-control required    " maxlength="200"  value="<?php echo $ship_address->near_landmark?>">
                                            
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <input type="hidden" name="ship_country_id" value="<?php echo $country_id;?>">
                                            <label>State <label class="required_label">*</label></label>
                                            <select name="ship_state_id" id="ship_state_id" class="form-control select2 required call_run_time" data-ref="ship_district_id" data-tb="district" data-select=""  style="width:100%">
											<option value="">Select State</option>
											<?php foreach($state_lists as $state_list){?>
											<option value="<?php echo $state_list->state_id?>" <?php if($state_list->state_id==$ship_address->state_id){?> selected <?php } ?>><?php echo $state_list->name?></option>
											<?php } ?>
											</select>
                                            </div>
                                        </div> 
										
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                             <label>District <label class="required_label">*</label></label>
                                            <select name="ship_district_id" id="ship_district_id" class="form-control select2 required call_run_time" data-ref="ship_city_id" data-tb="cities" data-select=""  style="width:100%">
											<option value="">Select District</option> 
											<?php 
											$district_lists=$this->Home_model->get_district_list($ship_address->state_id); 
											foreach($district_lists as $district_list){?>
											<option value="<?php echo $district_list->id?>" <?php if($district_list->id==$ship_address->district_id){?> selected <?php } ?>><?php echo $district_list->name?></option>
											<?php } ?>
											</select>
                                            </div>
                                        </div> 
										
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                               <label>City <label class="required_label">*</label></label>
                                            <select name="ship_city_id" id="ship_city_id" class="form-control select2 required " style="width:100%">
											<option value="">Select City</option> 
											<?php 
											$city_lists=$this->Home_model->get_city_list($ship_address->district_id); 
											foreach($city_lists as $city_list){?>
											<option value="<?php echo $city_list->id?>" <?php if($city_list->id==$ship_address->city_id){?> selected <?php } ?>><?php echo $city_list->name?></option>
											<?php } ?>
											</select>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                               <label>Pincode <label class="required_label">*</label></label>
                                            <input type="text" placeholder="Pincode" name="ship_pincode" id="ship_pincode" class="form-control required no_space no_special no_chara    " maxlength="7"    value="<?php echo $ship_address->pincode?>">
                                            
                                            </div>
                                        </div> 
                                        
                                        </div>
                                        
										<div class="order-notes">
                                            <div class="checkout-form-list checkout-form-list-2">
                                                <label>Order Notes</label>
                                                <textarea id="checkout-mess"name="order_note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."><?php echo $_SESSION['cart']['order_note'];?></textarea>
                                            </div>
                                        </div>
										 <div class="col-md-12">
										  <div class="checkout-form-list">
										  <input type="hidden" name="ship_id" value="<?php echo @$ship_address->id;?>">
										  <input type="hidden" name="bill_id" value="<?php echo @$bill_address->id;?>">
										<input class="btn btn-success btn_validator" name="update_cart" data-frm="ship_frm" value="Save And Next" type="button">
										</div>
										</div>
                                    </div>
                               
                        </div>
               </form>
			  </div>
              
			   </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
