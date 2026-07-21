     <?php
$states = array(
    "35" => "Andaman and Nicobar Islands",
    "37" => "Andhra Pradesh",
    "12" => "Arunachal Pradesh",
    "18" => "Assam",
    "10" => "Bihar",
    "04" => "Chandigarh",
    "22" => "Chhattisgarh",
    "26" => "Dadra and Nagar Haveli and Daman and Diu",
    "07" => "Delhi",
    "30" => "Goa",
    "24" => "Gujarat",
    "06" => "Haryana",
    "02" => "Himachal Pradesh",
    "01" => "Jammu and Kashmir",
    "20" => "Jharkhand",
    "29" => "Karnataka",
    "32" => "Kerala",
    "38" => "Ladakh",
    "31" => "Lakshadweep",
    "23" => "Madhya Pradesh",
    "27" => "Maharashtra",
    "14" => "Manipur",
    "17" => "Meghalaya",
    "15" => "Mizoram",
    "13" => "Nagaland",
    "21" => "Odisha",
    "97" => "Other Territory",
    "34" => "Puducherry",
    "03" => "Punjab",
    "08" => "Rajasthan",
    "11" => "Sikkim",
    "33" => "Tamil Nadu",
    "36" => "Telangana",
    "16" => "Tripura",
    "09" => "Uttar Pradesh",
    "05" => "Uttarakhand",
    "19" => "West Bengal"
);
?>
    
<div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">

    <div class="row" data-ng-controller="transctrl" data-ng-init="init('registration')">
        <div class="col-xs-10">
            <div data-breadcrumb="" data-target="_self" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="_self" href="/" data-ng-bind="name">Dashboard</a></li>
                    <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <span ng-switch-when="true">Business Details</span>  </ng-switch></li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown" data-ng-bind="selectedLang">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    
                    <li data-ng-repeat="language in languages">
                        <a data-ng-click="selectLang(language.cd)" data-ng-bind="language.nm">English</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dimmer-holder" style="display: none;">
        <div id="dimmer"></div>
    </div>
    
    <div ng-view="">
        <div data-ng-include="'/pages/registration/newrg/regtabs.html'">
            <!--<div data-ng-include="'/pages/registration/newrg/yellowtop.html'"></div>-->
            <style>
                .marqueeclr {
                    background-color: #FCF1CA;
                    color: #D80101;
                    font-size: 12px;
                }
            </style>
            <div class="marqueeclr">
                <i class="fa fa-bell"></i>
                <marquee width="95%" height="15px"><b><span data-ng-bind="trans.HLP_ADHR_MARQ1">Mobile number/e-mail id
                            linked with Aadhaar can be verified at </span><a href="https://resident.uidai.gov.in/verify-email-mobile" target="_blank" rel="noopener noreferrer">https://resident.uidai.gov.in/verify-email-mobile</a> . <span data-ng-bind="trans.HLP_ADHR_MARQ2">Please wait 45 seconds before regenerating the OTP for
                            Aadhaar authentication on GST portal.</span></b></marquee>
            </div>
            <div class="row regapp">
                <div class="col-xs-12 col-sm-12">
                    <div class="col-sm-3 col-xs-12 headapptype">
                        <p class="lbl" data-ng-bind="trans.LBL_APLTY">Application Type</p>
                        
                        <div data-ng-if="!clrPayload">
                            
                            <p class="apptype">New Registration</p>
                        </div>
                        
                    </div>
                    <div class="col-sm-3 col-xs-12 appdue">
                        <p class="lbl" data-ng-bind="trans.LBL_DUE_DATE">Due Date to Complete</p>
                        
                        <p class="date" data-ng-if="!clrPayload" data-ng-bind="rpayload.rgdtls.duedt"><?php 
                                        $created_date = $result->created_date;
                                        $expiry_date = date('j/n/Y', strtotime($created_date . ' +15 days'));
                                        echo $expiry_date;
                                    ?></p>
                        
                        
                    </div>
                    <div class="col-sm-3 col-xs-12 appmodify">
                        <p class="lbl" data-ng-bind="trans.LBL_LAST_MODIFIED">Last Modified</p>
                        
<p class="date">
<?php 
echo !empty($registration->created_date) 
    ? date('j/n/Y', strtotime($registration->created_date)) 
    : date('j/n/Y'); 
?>
</p>
                        
                        
                    </div>
                    <div class="col-sm-3 col-xs-12 appperc">
                        <p class="lbl" data-ng-bind="trans.LBL_PROFILE">Profile</p>
                        <p class="date" data-ng-bind="pfilled+'%'">50%</p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs responsive r1 reg-tabs" data-ng-class="{'adhr' : rpayload.bkacdtls}">
                <li data-ng-class="statusClass(1)" class=" complete ">
                    <a href="/gst/registration/step-1/"><span class="navicon business navicon fa fa-light fa-suitcase fa-2x" style="color:white;"></span><br>Business Details</a>
                </li>
                <li data-ng-class="statusClass(2)" class=" complete ">
                    <a href="/gst/registration/step-2/"><span class="navicon partners navicon fa fa-user-tie fa-2x"></span><br>Promoter / Partners</a>
                </li>
                <li data-ng-class="statusClass(3)" class=" complete ">
                    <a href="/gst/registration/step-3/"><span class="navicon auth-sig navicon fa fa-user-check fa-2x"></span><br>Authorized Signatory</a>
                </li>
                <li data-ng-class="statusClass(4)" class=" complete ">
                    <a href="/gst/registration/step-4/"><span class="navicon auth-sig-rep navicon fa fa-user-cog fa-2x"></span><br>Authorized
                        Representative</a>
                </li>
                <li data-ng-class="statusClass(5)" class="active  incomplete ">
                    <a><span class="navicon bplace navicon fa fa-map-marker-alt fa-2x"></span><br>Principal Place of Business</a>
                </li>
                <li data-ng-class="statusClass(6)" class=" incomplete ">
                    <a href="/gst/registration/step-6/"><span class="navicon abplace navicon fa fa-map-marker-alt fa-2x"></span><br>Additional Places of
                        Business</a>
                </li>
                <li data-ng-class="statusClass(7)" class=" incomplete ">
                    <a href="/gst/registration/step-7/"><span class="navicon goods navicon fa fa-luggage-cart fa-2x"></span><br>Goods and Services</a>
                </li>
                <li data-ng-class="statusClass(8)" data-ng-if="!rpayload.bkacdtls" class=" incomplete ">
                    <a href="/gst/registration/step-8/"><span class="navicon state navicon fa fa-id-card-alt fa-2x"></span><br>State Specific Information</a>
                </li>
                <li data-ng-class="statusClass(9)" data-ng-if="!rpayload.bkacdtls" class=" incomplete ">
                    <a href="/gst/registration/step-9/"><span class="navicon fa fa-id-card fa-2x"></span><br>Aadhaar
                        Authentication</a>
                </li>
                <li data-ng-class="statusClass(10)" data-ng-if="!rpayload.bkacdtls" class=" incomplete ">
                    <a href="/gst/registration/step-10/"><span class="navicon declaration fa fa-check-circle fa-2x"></span><br>Verification</a>
                </li>
            </ul>
            <div id="adhrmdl" class="modal fade fade-scale" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog sweet">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="m-icon m-warning pulseWarning">
                                <span class="micon-body pulseWarningIns"></span>
                                <span class="micon-dot pulseWarningIns"></span>
                            </div>
                            <h2 data-ng-bind="trans.LBL_INFORMATION">Information</h2>
                            <p data-ng-bind="trans.LBL_ADHR_WRNG">A separate process of Aadhaar authentication has been
                                implemented. You are requested to provide your Aadhaar through the link sent at your
                                Mobile No. and e-mail (furnished with registration details) on submission of the
                                registration application.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" title="OK" class="btn btn-primary" data-dismiss="modal"><span data-ng-bind="trans.LBL_OK">OK</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="adhrmdar" class="modal fade fade-scale" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog sweet">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="m-icon m-warning pulseWarning">
                                <span class="micon-body pulseWarningIns"></span>
                                <span class="micon-dot pulseWarningIns"></span>
                            </div>
                            <h2 data-ng-bind="trans.LBL_INFORMATION">Information</h2>
                            <p data-ng-bind="trans.LBL_ADHR_NOT_REQ">Aadhaar Authentication not required.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" title="OK" class="btn btn-primary" data-dismiss="modal"><span data-ng-bind="trans.LBL_OK">OK</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php echo form_open_multipart('home/save_principle_place_of_business', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form tabpane ng-pristine ng-valid-pattern ng-valid-maxlength ng-invalid' ,'enctype'=>'multipart/form-data')); ?>
            <fieldset>
            <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">indicates mandatory fields</p>
            <h4><span data-ng-bind="trans.HEAD_DTL_PP_BIZ">Details of Principal Place of Business</span></h4>
            <hr>
            <h4>
                <i class="fa fa-envelope"></i>
                <span data-ng-bind="trans.HEAD_COM_INFO">Address</span>
            </h4>
            <!-- tab initialization --->

    
            <!-- map disable for SCN start --> 
                
            <!-- map disable for SCN end -->
            
            <div class="tbl-format">
            <!-- row 1 -->
                <div class="row">
                    <div class="inner">
                    <!-- Pincode --> 
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bpsubmit &amp;&amp; newRegForm.pncd.$invalid,
                                                                       'has-success': bpsubmit &amp;&amp; newRegForm.pncd.$valid}">
                            <label class="reg m-cir" for="pncd" data-ng-bind="trans.LBL_PIN_CODE">PIN Code</label>
                            <input type="text" name="pin" maxlength="10" class="form-control" id="id_pin">
                            <!-- <input name="pncd" id="pncd" type="text" class="form-control number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="Enter PIN Code" ng-change="otherTerritoryCheck(callPincode)" ng-blur="checkPincodeSelection()" ng-focus="saveOldValues('pincode')" data-ng-model="ppbzdtls.add.pncd" required="" maxlength="6" data-ng-disabled="(!allowAllFieldsToEdit) &amp;&amp; ((!mmiVar.scnDisable3 &amp;&amp; scnDetails) || clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0 || (ppbzdtls.add.stcd ==='97'))" autocomplete="!!!!!!" data-ng-readonly="(ppbzdtls.add.stcd ==='97')"> -->
                            
                            
                    <!-- suggestion -->
                            <div class="as-results autosuggestList" id="removePincodeFocus" ng-if="true">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>      
                        </div>
                    
                    <!-- State --->
                        <div class="col-sm-4 col-xs-12">
                            <label for="bp_state" class="reg" data-ng-bind="trans.LBL_STATE">State</label>
                                                           <p><?php 
echo isset($registration->id_state) && isset($states[$registration->id_state]) 
     ? $states[$registration->id_state] 
     : ''; 
?></p>
                            
                        
                        </div>
                    
                    <!-- District -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bpsubmit &amp;&amp; newRegForm.dst.$invalid,
                                                                       'has-success': bpsubmit &amp;&amp; newRegForm.dst.$valid}">
                            <label class="reg m-cir" data-ng-class="{'m-cir':((ppbzdtls.add.stcd &amp;&amp; ppbzdtls.add.stcd != '97'))}" for="dst" data-ng-bind="trans.LBL_DISTRICT">District</label>
                            <!--<select class="form-control" name="dst" id="dst"  data-ng-model="ppbzdtls_dist" data-ng-disabled="(clrPayload) || (ppbzdtls.add.stcd ==='97')"  data-ng-required="(ppbzdtls.add.stcd != '97')">
                                <option value="">Select</option>
                                <option data-ng-repeat="dt in bp_dst" data-ng-bind="dt.n" value="" data-ng-if="ppbzdtls.add.stcd"></option>
                            </select>-->
                            <input type="text" name="district" maxlength="50" class="form-control" id="id_district" >
                            <!-- <input id="dst" name="dst" type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" data-ng-model="mmiVar.ppbzdtls_dist" ng-change="otherTerritoryCheck(callDistrict)" ng-blur="checkDistrictSelection()" ng-focus="saveOldValues('district')" placeholder="Enter District Name" autocomplete="!!!!!!" data-ng-disabled="(!mmiVar.scnDisable3 &amp;&amp; scnDetails &amp;&amp; !allowAllFieldsToEdit)||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0 || (ppbzdtls.add.stcd ==='97')" data-ng-required="(ppbzdtls.add.stcd != '97')" required="required"> -->
                            
                            
                            
                            
                        <!--suggestion-->
                            <div class="as-results autosuggestList" ng-if="true" id="removeDistrictFocus">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row 2 -->
                <div class="row">
                    <div class="inner">
                    <!-- City/Village -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':bpsubmit &amp;&amp; newRegForm.loc.$invalid,
                            'has-success': bpsubmit &amp;&amp; newRegForm.loc.$valid}">
                            <label class="reg m-cir" for="loc" data-ng-bind="trans.LBL_LAV_NO">City / Town / Village</label>
                            <input type="text" name="city" maxlength="50" class="form-control" id="id_city" >
                            <!-- <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" id="loc" name="loc" maxlength="60" placeholder="Enter City / Town / Village" ng-change="otherTerritoryCheck(callCity)" data-ng-model="ppbzdtls.add.loc" ng-focus="saveOldValues('city')" ng-blur="checkCitySelection()" data-ng-pattern="/^[a-zA-Z0-9 \/_\-\,\.]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,60}$/" autocomplete="!!!!!!" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97')||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" required="" disabled="disabled"> -->
                            
                            
                            
                        <!--suggestion-->
                            <div class="as-results autosuggestList" id="removeCityFocus" ng-if="true">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>
                        
                        </div>
                    <!-- Locality/Sublocality -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pd_locality.$invalid,
                                                                   'has-success': pdsubmit &amp;&amp; newRegForm.pd_locality.$valid}">
                                    <label class="reg" for="pd_locality" data-ng-bind="trans.LBL_LOSUBL">Locality/Sub Locality</label>
                                    <input type="text" name="locality" maxlength="50" class="form-control" id="id_locality" >
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" maxlength="60" id="ppbzdtls_locality" name="ppbzdtls_locality" placeholder="Enter Locality / Sublocality" autocomplete="!!!!!!" ng-change="otherTerritoryCheck(callLocality)" data-ng-model-options="{ debounce: 50 }" ng-focus="closeSuggestion('locality')" data-ng-model="mmiVar.ppbzdtls_locality" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97') ||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" disabled="disabled"> -->
                                    
                                    <!--<span class="err" data-ng-if="pdsubmit && newRegForm.pd_locality.$error.required" data-ng-bind="trans.ERR_TWN_REQ"></span>-->
                                    
                                <!--suggestion-->
                                      
                                  <div class="as-results autosuggestList" id="removeLocalityFocus" ng-if="mmiVar.showLocality">
                                        <ul class="as-list">
                                            
                                        </ul>
                                  </div>
                                </div>
                    <!-- Road/Street -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{ 'has-error':bpsubmit &amp;&amp; newRegForm.st.$invalid,
                            'has-success': bpsubmit &amp;&amp; newRegForm.st.$valid}">
                            <label class="reg m-cir" for="st" data-ng-bind="trans.LBL_RSL_NO">Road / Street</label>
                            <input type="text" name="road" maxlength="50" class="form-control" id="id_road" >
                            <!-- <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" id="st" name="st" maxlength="60" placeholder="Enter Road / Street / Lane" data-ng-model-options="{ debounce: 50 }" autocomplete="!!!!!!" ng-change="otherTerritoryCheck(callRoad)" ng-focus="closeSuggestion('road')" data-ng-model="ppbzdtls.add.st" data-ng-pattern="/^[a-zA-Z0-9 \/_\-\,\.]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,60}$/" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97')||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" required="" disabled="disabled"> -->
                            
                            
                            <!--suggestion-->
                            <div class="as-results autosuggestList" id="removeRoadFocus" ng-if="mmiVar.showRoad">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- row 3 -->
                <div class="row">
                    <div class="inner">
                    <!-- Building name -->
                        <div class="col-sm-4 col-xs-12">
                            <label class="reg" for="bp_bdname" data-ng-bind="trans.LBL_NM_BULD">Name of the Premises / Building</label>
                            <input type="text" name="name_of_building" maxlength="50" class="form-control" id="id_name_of_building">
                            <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" id="bp_bdname" name="bp_bdname" maxlength="60" placeholder="Enter Name of Premises / Building" autocomplete="!!!!!!" data-ng-model-options="{ debounce: 50 }" ng-change="otherTerritoryCheck(callBuilding)" ng-focus="closeSuggestion('building')" data-ng-model="ppbzdtls.add.bnm" data-ng-pattern="/^[a-zA-Z0-9 \/_\-\,\.]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,60}$/" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97')||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" disabled="disabled"> -->
                            
                            
                            <!--suggestion-->
                            <div class="as-results autosuggestList" id="removeBuildingFocus" ng-if="mmiVar.showBuilding">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>
                        </div>
                    <!-- building no -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' : bpsubmit &amp;&amp; newRegForm.bno.$invalid, 
                            'has-success' : bpsubmit &amp;&amp; newRegForm.bno.$valid}">
                            <label class="reg m-cir" for="bno" data-ng-bind="trans.LBL_BFD_NO">Building No. / Flat No.</label>
                            <input type="text" name="building_number" maxlength="50" class="form-control" id="id_building_number" >
                            <!-- <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" id="bno" name="bno" maxlength="60" placeholder="Enter Building No. / Flat No. / Door No." data-ng-model-options="{ debounce: 50 }" autocomplete="!!!!!!" ng-change="otherTerritoryCheck(callBuilding_no)" ng-focus="closeSuggestion('building_no')" data-ng-model="ppbzdtls.add.bno" data-ng-pattern="/^[a-zA-Z0-9 \/_\-\,\.]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,60}$/" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97')||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" autofocus="" required="" disabled="disabled"> -->
                            
                            
                        <!--suggestion-->
                            <div class="as-results autosuggestList" id="removeBuilding_noFocus" ng-if="mmiVar.showBuildingNumber">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>
                        </div>
                    <!-- Floor no -->
                        <div class="col-sm-4 col-xs-12">
                            <label class="reg" for="bp_flrnum" data-ng-bind="trans.LBL_FLR_NO">Floor No.</label>
                            <input type="text" name="floor_number" maxlength="10" class="form-control" id="id_floor_number" >
                            <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" id="bp_flrnum" name="bp_flrnum" maxlength="60" placeholder="Enter Floor No." autocomplete="!!!!!!" data-ng-model="ppbzdtls.add.flno" ng-focus="closeSuggestion('all')" data-ng-pattern="/^[a-zA-Z0-9\-\\\/\.\, ]{1,60}$/" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97')||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" disabled="disabled"> -->
                            
                            
                        </div>
                    
                        
                    
                    </div>
                </div>
                <!-- row 4 -->
                <div class="row">
                    <div class="inner">
                    <!-- Nearby landmark -->
                        <div class="col-sm-4 col-xs-12">
                                        <label class="reg" for="ppbzdtls_landmark" data-ng-bind="trans.LBL_NLAND">Nearby Landmark</label>
                                        <input type="text" name="nearby_landmark" maxlength="100" class="form-control" id="id_nearby_landmark" >
                                        <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" maxlength="60" id="ppbzdtls_landmark" name="ppbzdtls_landmark" placeholder="Enter Nearby Landmark" autocomplete="!!!!!!" data-ng-model-options="{ debounce: 50 }" ng-change="otherTerritoryCheck(callLandmark)" data-ng-model="mmiVar.ppbzdtls_landmark" data-ng-change="setPristine('ppbzdtls_landmark')" data-ng-disabled="ppbzdtls.add.pncd==''||ppbzdtls.add.pncd==null||( mmiVar.ppbzdtls_dist=='' &amp;&amp; ppbzdtls.add.stcd != '97') || ( mmiVar.ppbzdtls_dist==null &amp;&amp; ppbzdtls.add.stcd != '97')||mmiVar.ppbzdtls_state==''||mmiVar.ppbzdtls_state==null||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0" disabled="disabled">  -->
                                        
                        <!--suggestion-->
                            <div class="as-results autosuggestList" id="removeLandmarkFocus" ng-if="mmiVar.showLandmark">
                                <ul class="as-list">
                                    
                                </ul>
                            </div>
                        </div>
                    <!-- Latitude -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bpsubmit &amp;&amp; newRegForm.bp_latitude.$invalid,
                                                                       'has-success': bpsubmit &amp;&amp; newRegForm.bp_latitude.$valid}">
                            <label class="reg" for="bp_latitude" data-ng-bind="trans.LBL_LATITUDE">Latitude</label>
                            <input type="text" name="latitude" maxlength="50" class="form-control" id="id_latitude" >
                            <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" readonly="readonly" name="bp_latitude" ng-pattern="/^[0-9]{1,6}\.[0-9]{2,20}?$/" id="bp_latitude" data-ng-model="ppbzdtls.add.lt" maxlength="27" placeholder="Enter Latitude" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0"> -->
                         
                        </div>
                    <!-- longitude -->
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bpsubmit &amp;&amp; newRegForm.bp_longitude.$invalid,
                                                                       'has-success': bpsubmit &amp;&amp; newRegForm.bp_longitude.$valid}">
                            <label class="reg" for="bp_longitude" data-ng-bind="trans.LBL_LONGITUDE">Longitude</label>
                            <input type="text" name="longitude" maxlength="50" class="form-control" id="id_longitude">
                            <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" readonly="readonly" name="bp_longitude" id="bp_longitude" ng-pattern="/^[0-9]{1,6}\.[0-9]{2,20}?$/" maxlength="27" data-ng-model="ppbzdtls.add.lg" placeholder="Enter Longitude" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD029').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD044').length == 0"> -->
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12">
                            
                        </div>
                        
                        <div class="col-sm-4 col-xs-12">
                            <center><button id="reset-address" type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp;Reset Address</button></center>
                        </div>
                        
                    </div>
                </div>
                <!--CR#11908 Changes Start-->
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12">
                            
                                <label for="bd_sj" class="reg" data-ng-bind="trans.LBL_STAT_JURD">State Jurisdiction</label>                    
                                <p id="state-jurisdiction">ward</p>
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' : bpsubmit &amp;&amp; !newRegForm.stjdno.$valid,
                                                                   'has-success':bpsubmit &amp;&amp; newRegForm.stjdno.$valid }">
                                <label for="stj" class="reg m-cir" data-ng-class="{'m-cir':((ppbzdtls.add.stcd &amp;&amp; ppbzdtls.add.stcd != '97'))}">
                                    <span data-ng-bind="trans.LBL_WARD_SECTOR">Sector / Circle / Ward /Charge / Unit</span>
                                    <span>
                                        <i class="fa fa-info-circle" data-toggle="tooltip" title="Kindly select correct Jurisdiction."> </i>
                                    </span>
                                </label>
                                <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="id_sector_or_unit" name="sector_or_unit" required="required"><option value="">Select</option><option value="WARD">WARD 105</option></select>
                                
                                
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="inner">
                            <div class="col-xs-12">
                                <h5>
                                    <span data-ng-bind="trans.LBL_CNTR_JURD + ' ('">Center Jurisdiction (</span>
                                    <i class="fa fa-info-circle"></i> <span data-ng-bind="trans.HLP_CENTRE_JURISDICTION_REFER">Refer the</span>
                                        <a data-popup="true" title="Center Jurisdiction" href="https://cbec-gst.gov.in/know-your-jurisdiction.html" tabindex="-1">
                                          
                                        <span data-ng-bind="trans.HLP_CENTRE_JURISDICTION_LINK">link</span>
                                     <i class="fa fa-external-link-square"></i></a>
                                    <span data-ng-bind="trans.HLP_CENTRE_JURISDICTION+ ' )'">for Center Jurisdiction )</span>
                                </h5>
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                <label for="id_commissionerate" class="reg m-cir">Commissionerate</label>
                                <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="commissionerate" id="id_commissionerate" required="required">
                                 <option value="">Select</option>
                                <option value="AN">Andaman and Nicobar Islands</option>
                                <option value="AP">Andhra Pradesh</option>
                                <option value="AR">Arunachal Pradesh</option>
                                <option value="AS">Assam</option>
                                <option value="BR">Bihar</option>
                                <option value="CH">Chandigarh</option>
                                <option value="CG">Chhattisgarh</option>
                                <option value="DN">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="DL">Delhi</option>
                                <option value="GA">Goa</option>
                                <option value="GJ">Gujarat</option>
                                <option value="HR">Haryana</option>
                                <option value="HP">Himachal Pradesh</option>
                                <option value="JK">Jammu and Kashmir</option>
                                <option value="JH">Jharkhand</option>
                                <option value="KA">Karnataka</option>
                                <option value="KL">Kerala</option>
                                <option value="LA">Ladakh</option>
                                <option value="LD">Lakshadweep</option>
                                <option value="MP">Madhya Pradesh</option>
                                <option value="MH">Maharashtra</option>
                                <option value="MN">Manipur</option>
                                <option value="ML">Meghalaya</option>
                                <option value="MZ">Mizoram</option>
                                <option value="NL">Nagaland</option>
                                <option value="OD">Odisha</option>
                                <option value="OT">Other Territory</option>
                                <option value="PY">Puducherry</option>
                                <option value="PB">Punjab</option>
                                <option value="RJ">Rajasthan</option>
                                <option value="SK">Sikkim</option>
                                <option value="TN">Tamil Nadu</option>
                                <option value="TS">Telangana</option>
                                <option value="TR">Tripura</option>
                                <option value="UP">Uttar Pradesh</option>
                                <option value="UK">Uttarakhand</option>
                                <option value="WB">West Bengal</option>
                                    </select> 

                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <label for="id_division" class="reg m-cir">Division</label>
                                <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="id_division" name="division"  required="required"><option value="">Select</select>
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <label for="id_range" class="reg m-cir">Range</label>
                                <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="ranges" id="id_range"  required="required"><option value="">Select</option></select>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                <!-- CR#11908 Changes End -->
            </div>
            <h4>
                <i class="fa fa-address-card"></i>
                <span data-ng-bind="trans.HEAD_CNCT">Contact Information</span>
            </h4>
            <div class="tbl-format">
                <div class="row">
                   
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' : bpsubmit &amp;&amp; newRegForm.bp_email.$invalid, 
                                                                       'has-success' : bpsubmit &amp;&amp; newRegForm.bp_email.$valid}">
                            <label for="bp_email" class="reg m-cir">
                            <i class="fa fa-envelope-open-o"></i>
                            <span data-ng-bind="trans.LBL_OE_ADDR">Office Email Address</span>
                            </label>
                            <input type="text" name="office_email" maxlength="50" class="form-control" id="id_office_email">
                            <!-- <input id="bp_email" maxlength="254" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-email ng-valid-required ng-valid-pattern ng-valid-maxlength" type="email" placeholder="Enter Email Address" name="bp_email" data-ng-model="ppbzdtls.contdtls.em" value="rpayload.rgdtls.em" data-ng-pattern="/^[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD045').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD046').length == 0" required=""> -->
        
                            
                            
                            
                        </div>
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' : bpsubmit &amp;&amp; newRegForm.tlphno.$invalid}">
                            <label for="tlphnoStd" class="reg">
                            <i class="type-ico fa fa-phone"></i>
                            <span data-ng-bind="trans.LBL_OTEL_ADDR">Office Telephone Number (with STD Code)</span>
                            </label>
                            <div class="input-group">
                                <div class="col-sm-3 col-xs-3 addrow">
                                    <!-- <input type="text" id="tlphnoStd" name="tlphnoStd" class="number form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" placeholder="STD" data-ng-model="ppbzdtls.contdtls.tlphno.stdCd" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD045').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD046').length == 0" maxlength="8"> -->
                                    <input type="text" name="office_telephone_std" maxlength="50" class="form-control" id="id_office_telephone_std">
                                </div>
                                <div class="col-sm-9 col-xs-9 addrow">
                                    <!-- <input type="text" id="tlphno" name="tlphno" class="number form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" placeholder="Enter Telephone Number" data-ng-model="ppbzdtls.contdtls.tlphno.telNum" data-ng-pattern="/^[0-9]*$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD045').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD046').length == 0" maxlength="16"> -->
                                    <input type="text" name="office_telephone" maxlength="50" class="form-control" id="id_office_telephone">
                                           
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' : bpsubmit &amp;&amp; newRegForm.bp_mobile.$invalid,
                                                                       'has-success' : bpsubmit &amp;&amp; newRegForm.bp_mobile.$valid}">
                            <label for="bp_mobile" class="reg m-cir">
                            <i class="type-ico fa fa-mobile"></i>
                            <span data-ng-bind="trans.LBL_MOB_NO">Mobile Number</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">+91</span>
                                <input type="text" name="office_mobile_number" maxlength="50" class="form-control" id="id_office_mobile_number">
                                <!-- <input id="bp_mobile" type="text" class="number form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required ng-valid-pattern ng-valid-maxlength" aria-describedby="basic-addon1" placeholder="Enter Mobile Number" name="bp_mobile" data-ng-model="ppbzdtls.contdtls.mbno" data-ng-pattern="/^[1-9]{1}[0-9]{9}$/" maxlength="10" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD045').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD046').length == 0" required=""> -->
        
                                      <!-- data-ng-pattern="validations.formats.mobile" maxlength="10" required>
        
                                       data-ng-pattern="validations.formats.mobile" maxlength="10" required readonly>-->
        
                            </div>
                            
                            
                            <p class="err" data-ng-bind="buspErrors.mbno.message"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' :  bpsubmit &amp;&amp; newRegForm.fxno.$invalid}">
                            <label for="fxnostd" class="reg">
                            <i class="type-ico fa fa-fax"></i>
                      <span data-ng-bind="trans.LBL_OFAX_NO">Office FAX Number (with STD Code)</span>
                            </label>
                            <div class="input-group">
                                <div class="col-sm-3 col-xs-3 addrow">
                                    <!-- <input type="text" id="fxnostd" name="fxnostd" class="number form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" placeholder="STD" data-ng-model="ppbzdtls.contdtls.fxno.stdCd" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD045').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD046').length == 0" maxlength="8"> -->
                                    <input type="text" name="office_fax_std" maxlength="50" class="form-control" id="id_office_fax_std">
                                </div>
                                <div class="col-sm-9 col-xs-9 addrow">
                                    <!-- <input type="text" id="fxno" name="fxno" class="number form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" placeholder="Enter Fax Number" data-ng-model="ppbzdtls.contdtls.fxno.fxNum" data-ng-pattern="/^[0-9]*$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD045').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD046').length == 0" maxlength="16"> -->
                                    <input type="text" name="office_fax" maxlength="50" class="form-control" id="id_office_fax">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="tbl-format">
                <div class="row">
                     <p class="help-block">
                         <span>
                            <i class="fa fa-info-circle"></i>
                             <i><span data-ng-bind="trans.LBL_UPLOAD_MULTI_DOC"></span>
                             </i>
                         </span>
                    </p>
                    <div class="inner">
                        <div class="col-sm-6 col-xs-12" data-ng-class="{'has-error' : bpsubmit &amp;&amp; newRegForm.bp_buss_poss.$invalid,
                                                                       'has-success' : bpsubmit &amp;&amp; newRegForm.bp_buss_poss.$valid}">
                            <h4 class="m-cir">
                                <i class="fa fa-building"></i>
                                <span data-ng-bind="trans.HEAD_NP_PREMISES">Nature of possession of premises</span>
                            </h4>
                            <label class="reg" for="id_nature_of_premises" data-ng-bind="trans.LBL_PLZ_SELECT">Please Select</label>
                            <select name="nature_of_premises" class="form-control" id="id_nature_of_premises">
  <option value="-1" selected="">Select</option>

  <option value="1">Consent</option>

  <option value="2">Leased</option>

  <option value="3">Others</option>

  <option value="4">Own</option>

  <option value="5">Rented</option>

  <option value="6">Shared</option>

</select>
                            <!-- <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="bp_buss_poss" id="bp_buss_poss" required="" data-ng-model="ppbzdtls.psnt" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD047').length == 0 &amp;&amp; (scnDetails.ppb.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD048').length == 0"> 
                                <option value="">Select</option>
                                <option data-ng-repeat="nt in natposreg" data-ng-bind="nt.n" value="CON">Consent</option><option data-ng-repeat="nt in natposreg" data-ng-bind="nt.n" value="LES">Leased</option><option data-ng-repeat="nt in natposreg" data-ng-bind="nt.n" value="OTH">Others</option><option data-ng-repeat="nt in natposreg" data-ng-bind="nt.n" value="OWN">Own</option><option data-ng-repeat="nt in natposreg" data-ng-bind="nt.n" value="REN">Rented</option><option data-ng-repeat="nt in natposreg" data-ng-bind="nt.n" value="SHA">Shared</option>
                            </select> -->
                            
                            <p></p>
                        </div>
                        <div data-ng-if="!(clrPayload &amp;&amp; ((scnDetails.ppb.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD050').length &gt; 0  || (scnDetails.ppb.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD051').length &gt; 0 ))">
                        
                        <div class="col-sm-6 col-xs-12" data-ng-if="!clrPayload &amp;&amp; ((!(ppbzdtls.dcupdtls |filter:docTypeFilter) || (ppbzdtls.dcupdtls |filter:docTypeFilter).length &lt; 2))">
                            <h4 class="m-cir">
                                <i class="fa fa-cloud-upload"></i>
                                <span data-ng-bind="trans.HEAD_DOC_UP">Document Upload</span>
                            </h4>
                            <label class="reg m-cir" for="id_proof_of_principal_of_business" data-ng-bind="trans.LBL_DOC_BUSS_PLACE">Proof of Principal Place of Business</label>
                            <select name="proof_of_principal_of_business" class="form-control" id="id_proof_of_principal_of_business">
  <option value="-1" selected="">Select</option>

  <option value="1">Consent Letter</option>

  <option value="2">Electricity Bill</option>

  <option value="3">Legal ownership document</option>

  <option value="4">Municipal Khata Copy</option>

  <option value="5">Property Tax Receipt</option>

</select>
                            <!-- <select class="form-control ng-pristine ng-untouched ng-valid ng-empty" data-ng-model="ppbzdtls.up_type" name="bp_up_type" id="bp_up_type" data-ng-disabled="clrPayload">
                                <option value="">Select</option>
                                
                            </select> -->
                        <!--    data-ng-if="
                                (ppbzdtls.psnt=='OWN' && (doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB')) ||
                                (ppbzdtls.psnt=='LES' && (doc.c=='RLAT' || doc.c=='TAXR' || doc.c=='CMUK' ||doc.c=='ELCB')) ||
                                (ppbzdtls.psnt=='REN' && (doc.c=='RLAT' || doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB')) || 
                                (ppbzdtls.psnt=='CON' &&(doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB') || doc.c=='CNLR') || 
                                (ppbzdtls.psnt=='SHA' && (doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB' || doc.c=='CNLR')) ||
                                 (ppbzdtls.psnt=='OTH' && (doc.c=='CNLR' || doc.c=='CMUK' || doc.c=='ELCB' || doc.c=='APGA' || doc.c=='APLA'))" -->
                        <!--    data-ng-if="
                                (ppbzdtls.psnt=='OWN' && (doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB')) ||
                                (ppbzdtls.psnt=='LES' && (doc.c=='RLAT' || doc.c=='TAXR' || doc.c=='CMUK' ||doc.c=='ELCB')) ||
                                (ppbzdtls.psnt=='REN' && (doc.c=='RLAT' || doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB')) || 
                                (ppbzdtls.psnt=='CON' &&(doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB') || doc.c=='CNLR') || 
                                (ppbzdtls.psnt=='SHA' && (doc.c=='TAXR' || doc.c=='CMUK' || doc.c=='ELCB' || doc.c=='CNLR')) ||
                                 (ppbzdtls.psnt=='OTH' && (doc.c=='CNLR' || doc.c=='CMUK' || doc.c=='ELCB' || doc.c=='APGA' || doc.c=='APLA'))" -->
                            <span class="help-block">
                                <p class="help-block">
                                    <i class="fa fa-info-circle"></i> 
                                    <span data-ng-bind="trans.HLP_FILE_FORM">File with PDF or JPEG format is only allowed.</span>
                                </p>                        
                                <p class="help-block">
                                    <i class="fa fa-info-circle"></i> 
                                    <span data-ng-bind="trans.HLP_MAX_FILE_SIZE">Maximum file size for upload is </span> 1 MB
                                </p>
                            </span>
                            <data-upload-model data-id="bp_upload" data-name="bp_upload" data-doc-type="ppbzdtls.up_type" data-ng-model="ppbzdtls.dcupdtls" data-max-files="3" data-mandatory="true" data-appln-id="applnId" class="ng-pristine ng-untouched ng-valid ng-empty"><div data-ng-if="ngModel.length &lt; maxFiles || !ngModel">
                                <input id="bp_upload" name="bp_upload" type="file" accept=".jpeg,.pdf" data-max-size="1048576">
                                <p class="err" data-ng-bind="errVar"></p><div class="progress ng-hide" data-ng-show="uploading"><div class="progress-bar" ng-class="{&quot;progress-bar-danger&quot; : uploadFailed, &quot;progress-bar-success&quot; : uploadSuccess}" role="progressbar" style="width:"></div></div></div></data-upload-model>   <!-- #17646 Hbase changes-->
                            
                        </div>
                      </div>
                    </div>
                </div>
                
            </div>
                
                
                
            <h4 class="m-cir">
                <i class="fa fa-truck"></i>
                <span data-ng-bind="trans.HEAD_NB_BIZ">Nature of Business Activity being carried out at above mentioned premises</span>
            </h4>            
            <div class="tbl-format">
                <div class="row">
                    <div class="inner">
                        <ul class="list-child-inline">
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_0" name="nature_of_business_choices[]" type="checkbox" value="1">
                                    <label for="id_nature_of_business_choices_0">Bonded Warehouse</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_1" name="nature_of_business_choices[]" type="checkbox" value="2">
                                    <label for="id_nature_of_business_choices_1">Factory / Manufacturing</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_2" name="nature_of_business_choices[]" type="checkbox" value="3">
                                    <label for="id_nature_of_business_choices_2">Leasing Business</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_3" name="nature_of_business_choices[]" type="checkbox" value="4">
                                    <label for="id_nature_of_business_choices_3">Retail Business</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_4" name="nature_of_business_choices[]" type="checkbox" value="5">
                                    <label for="id_nature_of_business_choices_4">Works Contract</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_5" name="nature_of_business_choices[]" type="checkbox" value="6">
                                    <label for="id_nature_of_business_choices_5">EOU / STP / EHTP</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_6" name="nature_of_business_choices[]" type="checkbox" value="7">
                                    <label for="id_nature_of_business_choices_6">Import</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_7" name="nature_of_business_choices[]" type="checkbox" value="8">
                                    <label for="id_nature_of_business_choices_7">Office / Sale Office</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_8" name="nature_of_business_choices[]" type="checkbox" value="9">
                                    <label for="id_nature_of_business_choices_8">Warehouse / Depot</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_9" name="nature_of_business_choices[]" type="checkbox" value="10">
                                    <label for="id_nature_of_business_choices_9">Others (Please Specify)</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_10" name="nature_of_business_choices[]" type="checkbox" value="11">
                                    <label for="id_nature_of_business_choices_10">Export</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_11" name="nature_of_business_choices[]" type="checkbox" value="12">
                                    <label for="id_nature_of_business_choices_11">Supplier of Services</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_12" name="nature_of_business_choices[]" type="checkbox" value="13">
                                    <label for="id_nature_of_business_choices_12">Recipient of Goods or Services</label>
                                </li>
                            
                                <li>
                                    <input class="chkbx" id="id_nature_of_business_choices_13" name="nature_of_business_choices[]" type="checkbox" value="14">
                                    <label for="id_nature_of_business_choices_13">Wholesale Business</label>
                                </li>
                            
                        </ul>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="inner">
                        
                    </div>
                </div>
            </div>
            <div class="tbl-format">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="reg" for="bp_add" data-ng-bind="trans.LBL_ALSO_ADD_BUS">Have Additional Place of Business</label>
                        <div class="switch round">
                            <input id="bp_add" name="bp_add" type="checkbox" data-ng-model="ppbzdtls.hasaddl" data-ng-checked="(ppbzdtls.hasaddl=='Y')?true:false" data-radio-chbx="" data-ng-click="checkAdditional($event)" data-ng-disabled="(clrPayload &amp;&amp; !allowAllFieldsToEdit)" class="ng-pristine ng-untouched ng-valid ng-empty">
                            <label for="bp_add">
                                <span class="switch-on"><span data-ng-bind="trans.LBL_YES">Yes</span></span>
                                <span class="switch-off"><span data-ng-bind="trans.LBL_NO">No</span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            </fieldset>
            <div class="row">
                <div class="col-xs-12 next-tab-nav text-right">
                    <a title="Back" class="btn btn-default" data-ng-bind="trans.LBL_BACK" href="authorized_representative">Back</a>
                    <!-- <a title="Back" class="btn btn-default" data-ng-bind="trans.LBL_BACK" href="/gst/registration/saved-applications/">Back</a> -->
                    <!-- <button title="Back" class="btn btn-default" data-ng-click="back()" data-ng-bind="trans.LBL_BACK">Back</button> -->
                    <button title="Save &amp; Continue" type="submit" class="btn btn-primary" data-ng-if="(['VAE','DFT'].indexOf(rpayload.rgdtls.aplst) &gt; -1 &amp;&amp; !clrPayload) ||
                                        ( clrPayload &amp;&amp; ['CLR','DCL','VAE'].indexOf(clrPayload.rgdtls.aplst) &gt;= 0 &amp;&amp; (allowAllFieldsToEdit || scnDetails.ppb))" data-ng-bind="trans.LBL_SAVE_CONTINUE">Save &amp; Continue</button>
                    
                </div>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>

    <div id="gst-course-modal" class="modal fade" tabindex="-1" role="dialog">
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">ï¿½</span></button>
                    <!-- <h4 class="modal-title">Take our premium course to use GST DEMO Website</h4> -->
                    <h4 class="modal-title">Please login to view GST Simulation</h4>
                </div>
                <div class="modal-body">
                    <p>To use our demo portal (simulation)... <a href="/user/login/">Login Now</a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        
</div><!-- /.modal -->
<div id="challan-delete-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div class="m-icon m-warning pulseWarning"><span class="micon-body pulseWarningIns"></span><span class="micon-dot pulseWarningIns"></span></div>
            <h2>Warning</h2>
            <p>Are you sure you want to delete this challan?</p>
        </div>
        <div class="modal-footer"><a class="btn btn-default" data-dismiss="modal" ng-click="cancelcallback()">Cancel</a><a class="btn btn-primary btn-ok" ng-click="callback()" target="_blank">Proceed</a></div>
    </div>
</div>

    <script type="text/javascript">
        var sc_project = 12875655;
        var sc_invisible = 1;
        var sc_security = "6dc86be0"; 
        
    </script>
    <script type="text/javascript" src="js/counter.js" async=""></script>
    <!-- <script type="text/javascript" src="https://delan5sxrj8jj.cloudfront.net/html/js/jquery-1.10.2.min.df6173bad698.js"></script> -->
    <script type="text/javascript" src="js/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/base.js"></script>
    <script type="text/javascript" src="js/base_1.js"></script>
    
<script tyoe="text/javascript">
    $(document).ready(function () {
        $("#radiotrn").click(function () {
            $("#new-reg").hide();
            $("#trn").show();
        });

        $("#radionew").click(function () {
            $("#new-reg").show();
            $("#trn").hide();
        });
    });

    var statesAndDistricts = {
        "35": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "YSR Kadapa"],
        "37": ["Anjaw", "Changlang", "East Kameng", "East Siang", "Kamle", "Kra Daadi", "Kurung Kumey", "Lepa Rada", "Lohit", "Longding", "Lower Dibang Valley", "Lower Siang", "Lower Subansiri", "Namsai", "Pakke Kessang", "Papum Pare", "Shi Yomi", "Siang", "Tawang", "Tirap", "Upper Dibang Valley", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang"],
        "18" : ['Baksa', 'Barpeta', 'Biswanath', 'Bongaigaon', 'Cachar', 'Charaideo', 'Chirang', 'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Goalpara', 'Golaghat', 'Hailakandi', 'Hojai', 'Jorhat', 'Kamrup Metropolitan', 'Kamrup', 'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Majuli', 'Morigaon', 'Nagaon', 'Nalbari', 'Dima Hasao', 'Sivasagar', 'Sonitpur', 'South Salmara-Mankachar', 'Tinsukia', 'Udalguri', 'West Karbi Anglong'] ,
        "10" : ['Araria', 'Arwal', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'East Champaran (Motihari)', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Kaimur (Bhabua)', 'Katihar', 'Khagaria', 'Kishanganj', 'Lakhisarai', 'Madhepura', 'Madhubani', 'Munger (Monghyr)', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia (Purnea)', 'Rohtas', 'Saharsa', 'Samastipur', 'Saran', 'Sheikhpura', 'Sheohar', 'Sitamarhi', 'Siwan', 'Supaul', 'Vaishali', 'West Champaran'] ,
        "04" : ['Chandigarh'] ,
        "22" : ['Balod', 'Baloda Bazar', 'Balrampur', 'Bastar', 'Bemetara', 'Bijapur', 'Bilaspur', 'Dantewada (South Bastar)', 'Dhamtari', 'Durg', 'Gariyaband', 'Janjgir-Champa', 'Jashpur', 'Kabirdham (Kawardha)', 'Kanker (North Bastar)', 'Kondagaon', 'Korba', 'Korea (Koriya)', 'Mahasamund', 'Mungeli', 'Narayanpur', 'Raigarh', 'Raipur', 'Rajnandgaon', 'Sukma', 'Surajpur  ', 'Surguja'] ,
        "26" : ['Dadra & Nagar Haveli'] ,
        "07" : ['Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East  Delhi', 'North West  Delhi', 'Shahdara', 'South Delhi', 'South East Delhi', 'South West  Delhi', 'West Delhi'] ,
        "30" : ['North Goa', 'South Goa'] ,
        "24" : ['Ahmedabad', 'Amreli', 'Anand', 'Aravalli', 'Banaskantha (Palanpur)', 'Bharuch', 'Bhavnagar', 'Botad', 'Chhota Udepur', 'Dahod', 'Dangs (Ahwa)', 'Devbhoomi Dwarka', 'Gandhinagar', 'Gir Somnath', 'Jamnagar', 'Junagadh', 'Kachchh', 'Kheda (Nadiad)', 'Mahisagar', 'Mehsana', 'Morbi', 'Narmada (Rajpipla)', 'Navsari', 'Panchmahal (Godhra)', 'Patan', 'Porbandar', 'Rajkot', 'Sabarkantha (Himmatnagar)', 'Surat', 'Surendranagar', 'Tapi (Vyara)', 'Vadodara', 'Valsad'] ,
        "06" : ['Ambala', 'Bhiwani', 'Charkhi Dadri', 'Faridabad', 'Fatehabad', 'Gurgaon', 'Hisar', 'Jhajjar', 'Jind', 'Kaithal', 'Karnal', 'Kurukshetra', 'Mahendragarh', 'Mewat', 'Palwal', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa', 'Sonipat', 'Yamunanagar'] ,
        "02" : ['Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kullu', 'Lahaul & Spiti', 'Mandi', 'Shimla', 'Sirmaur (Sirmour)', 'Solan', 'Una'] ,
        "01" : ['Anantnag', 'Bandipore', 'Baramulla', 'Budgam', 'Doda', 'Ganderbal', 'Jammu', 'Kargil', 'Kathua', 'Kishtwar', 'Kulgam', 'Kupwara', 'Leh', 'Poonch', 'Pulwama', 'Rajouri', 'Ramban', 'Reasi', 'Samba', 'Shopian', 'Srinagar', 'Udhampur'] ,
        "20" : ['Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'East Singhbhum', 'Garhwa', 'Giridih', 'Godda', 'Gumla', 'Hazaribag', 'Jamtara', 'Khunti', 'Koderma', 'Latehar', 'Lohardaga', 'Pakur', 'Palamu', 'Ramgarh', 'Ranchi', 'Sahibganj', 'Seraikela-Kharsawan', 'Simdega', 'West Singhbhum'] ,
        "29" : ['Bagalkot', 'Ballari (Bellary)', 'Belagavi (Belgaum)', 'Bengaluru (Bangalore) Rural', 'Bengaluru (Bangalore) Urban', 'Bidar', 'Chamarajanagar', 'Chikballapur', 'Chikkamagaluru (Chikmagalur)', 'Chitradurga', 'Dakshina Kannada', 'Davangere', 'Dharwad', 'Gadag', 'Hassan', 'Haveri', 'Kalaburagi (Gulbarga)', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysuru (Mysore)', 'Raichur', 'Ramanagara', 'Shivamogga (Shimoga)', 'Tumakuru (Tumkur)', 'Udupi', 'Uttara Kannada (Karwar)', 'Vijayapura (Bijapur)', 'Yadgir'] ,
        "32" : ['Alappuzha', 'Ernakulam', 'Idukki', 'Kannur', 'Kasaragod', 'Kollam', 'Kottayam', 'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thiruvananthapuram', 'Thrissur', 'Wayanad'] ,
        "38" : ['Kargil', 'Leh Ladakh'],
        "31" : ['Agatti', 'Amini', 'Androth', 'Bithra', 'Chethlath', 'Kavaratti', 'Kadmath', 'Kalpeni', 'Kilthan', 'Minicoy'] ,
        "23" : ['Agar Malwa', 'Alirajpur', 'Anuppur', 'Ashoknagar', 'Balaghat', 'Barwani', 'Betul', 'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia', 'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore', 'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur', 'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Raisen', 'Rajgarh', 'Ratlam', 'Rewa', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur', 'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha'] ,
        "27" : ['Ahmednagar', 'Akola', 'Amravati', 'Aurangabad', 'Beed', 'Bhandara', 'Buldhana', 'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondia', 'Hingoli', 'Jalgaon', 'Jalna', 'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai Suburban', 'Nagpur', 'Nanded', 'Nandurbar', 'Nashik', 'Osmanabad', 'Palghar', 'Parbhani', 'Pune', 'Raigad', 'Ratnagiri', 'Sangli', 'Satara', 'Sindhudurg', 'Solapur', 'Thane', 'Wardha', 'Washim', 'Yavatmal'] ,
        "14" : ['Bishnupur', 'Chandel', 'Churachandpur', 'Imphal East', 'Imphal West', 'Jiribam', 'Kakching', 'Kamjong', 'Kangpokpi', 'Noney', 'Pherzawl', 'Senapati', 'Tamenglong', 'Tengnoupal', 'Thoubal', 'Ukhrul'] ,
        "17" : ['East Garo Hills', 'East Jaintia Hills', 'East Khasi Hills', 'North Garo Hills', 'Ri Bhoi', 'South Garo Hills', 'South West Garo Hills ', 'South West Khasi Hills', 'West Garo Hills', 'West Jaintia Hills', 'West Khasi Hills'] ,
        "15" : ['Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip'] ,
        "13" : ['Dimapur', 'Kiphire', 'Kohima', 'Longleng', 'Mokokchung', 'Mon', 'Peren', 'Phek', 'Tuensang', 'Wokha', 'Zunheboto'] ,
        "21" : ['Angul', 'Balangir', 'Balasore', 'Bargarh', 'Bhadrak', 'Boudh', 'Cuttack', 'Deogarh', 'Dhenkanal', 'Gajapati', 'Ganjam', 'Jagatsinghapur', 'Jajpur', 'Jharsuguda', 'Kalahandi', 'Kandhamal', 'Kendrapara', 'Kendujhar (Keonjhar)', 'Khordha', 'Koraput', 'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nayagarh', 'Nuapada', 'Puri', 'Rayagada', 'Sambalpur', 'Sonepur', 'Sundargarh'] ,
        "97" : [],        
        "34" : ['Karaikal', 'Mahe', 'Pondicherry', 'Yanam'] ,
        "03" : ['Amritsar', 'Barnala', 'Bathinda', 'Faridkot', 'Fatehgarh Sahib', 'Fazilka', 'Ferozepur', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana', 'Mansa', 'Moga', 'Muktsar', 'Nawanshahr (Shahid Bhagat Singh Nagar)', 'Pathankot', 'Patiala', 'Rupnagar', 'Sahibzada Ajit Singh Nagar (Mohali)', 'Sangrur', 'Tarn Taran'] ,
        "08" : ['Ajmer', 'Alwar', 'Banswara', 'Baran', 'Barmer', 'Bharatpur', 'Bhilwara', 'Bikaner', 'Bundi', 'Chittorgarh', 'Churu', 'Dausa', 'Dholpur', 'Dungarpur', 'Hanumangarh', 'Jaipur', 'Jaisalmer', 'Jalore', 'Jhalawar', 'Jhunjhunu', 'Jodhpur', 'Karauli', 'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sawai Madhopur', 'Sikar', 'Sirohi', 'Sri Ganganagar', 'Tonk', 'Udaipur'] ,
        "11" : ['East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'] ,
        "33" : ['Ariyalur', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kanchipuram', 'Kanyakumari', 'Karur', 'Krishnagiri', 'Madurai', 'Nagapattinam', 'Namakkal', 'Nilgiris', 'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Salem', 'Sivaganga', 'Thanjavur', 'Theni', 'Thoothukudi (Tuticorin)', 'Tiruchirappalli', 'Tirunelveli', 'Tiruppur', 'Tiruvallur', 'Tiruvannamalai', 'Tiruvarur', 'Vellore', 'Viluppuram', 'Virudhunagar'] ,
        "36" : ['Adilabad', 'Bhadradri Kothagudem', 'Hyderabad', 'Jagtial', 'Jangaon', 'Jayashankar Bhoopalpally', 'Jogulamba Gadwal', 'Kamareddy', 'Karimnagar', 'Khammam', 'Komaram Bheem Asifabad', 'Mahabubabad', 'Mahabubnagar', 'Mancherial', 'Medak', 'Medchal', 'Nagarkurnool', 'Nalgonda', 'Nirmal', 'Nizamabad', 'Peddapalli', 'Rajanna Sircilla', 'Rangareddy', 'Sangareddy', 'Siddipet', 'Suryapet', 'Vikarabad', 'Wanaparthy', 'Warangal (Rural)', 'Warangal (Urban)', 'Yadadri Bhuvanagiri'] ,
        "16" : ['Dhalai', 'Gomati', 'Khowai', 'North Tripura', 'Sepahijala', 'South Tripura', 'Unakoti', 'West Tripura'] ,
        "05" : ['Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pauri Garhwal', 'Pithoragarh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar', 'Uttarkashi'] ,
        "09" : ['Agra', 'Aligarh', 'Allahabad', 'Ambedkar Nagar', 'Amethi (Chatrapati Sahuji Mahraj Nagar)', 'Amroha (J.P. Nagar)', 'Auraiya', 'Azamgarh', 'Baghpat', 'Bahraich', 'Ballia', 'Balrampur', 'Banda', 'Barabanki', 'Bareilly', 'Basti', 'Bhadohi', 'Bijnor', 'Budaun', 'Bulandshahr', 'Chandauli', 'Chitrakoot', 'Deoria', 'Etah', 'Etawah', 'Faizabad', 'Farrukhabad', 'Fatehpur', 'Firozabad', 'Gautam Buddha Nagar', 'Ghaziabad', 'Ghazipur', 'Gonda', 'Gorakhpur', 'Hamirpur', 'Hapur (Panchsheel Nagar)', 'Hardoi', 'Hathras', 'Jalaun', 'Jaunpur', 'Jhansi', 'Kannauj', 'Kanpur Dehat', 'Kanpur Nagar', 'Kanshiram Nagar (Kasganj)', 'Kaushambi', 'Kushinagar (Padrauna)', 'Lakhimpur - Kheri', 'Lalitpur', 'Lucknow', 'Maharajganj', 'Mahoba', 'Mainpuri', 'Mathura', 'Mau', 'Meerut', 'Mirzapur', 'Moradabad', 'Muzaffarnagar', 'Pilibhit', 'Pratapgarh', 'RaeBareli', 'Rampur', 'Saharanpur', 'Sambhal (Bhim Nagar)', 'Sant Kabir Nagar', 'Shahjahanpur', 'Shamali (Prabuddh Nagar)', 'Shravasti', 'Siddharth Nagar', 'Sitapur', 'Sonbhadra', 'Sultanpur', 'Unnao', 'Varanasi'] ,
        "19" : ['Alipurduar', 'Bankura', 'Birbhum', 'Burdwan (Bardhaman)', 'Cooch Behar', 'Dakshin Dinajpur (South Dinajpur)', 'Darjeeling', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Kalimpong', 'Kolkata', 'Malda', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'Paschim Medinipur (West Medinipur)', 'Purba Medinipur (East Medinipur)', 'Purulia', 'South 24 Parganas', 'Uttar Dinajpur (North Dinajpur)']
    };

    $('#id_state').change(function () {
        var state = $(this).val();
        var districts = statesAndDistricts[state];

        $('#id_district').empty();
        $('#id_district').append($('<option>', {value: "",text: "Select"}));

        $.each(districts, function (index, district) {
            $('#id_district').append($('<option>', {
                value: district,
                text: district
            }));
        });
    });
    $("#id_type_of_taxpayer").change(function () {
        if ($(this).val() === "1") {
            $("#panHelper").show();
            $("#helpBlock").show();
        } else {
            $("#panHelper").hide();
            $("#helpBlock").hide();
        }
    });
    const panCardCodes = document.querySelectorAll('.pan-card-code');

    document.querySelector('#id_pan').addEventListener('input', function() {
    const inputLength = this.value.length;
    for (let i = 0; i < inputLength; i++) {
        panCardCodes[i].classList.add('success');
    }
    for (let i = inputLength; i < panCardCodes.length; i++) {
        panCardCodes[i].classList.remove('success');
    }
    });
    
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    $("#reset-address").on("click", function() {
        $("#id_pin").val("");
    });

});
</script>

<script>
$(document).ready(function () {

    $('#id_commissionerate').change(function () {

        var stateCode = $(this).val(); // e.g. MH
        var stateName = $("#id_commissionerate option:selected").text(); // e.g. Maharashtra

        var options = '<option value="">Select</option>';

        if (stateCode !== '') {

            options += '<option value="' + stateCode + '-N">' + stateName.toUpperCase() + ' NORTH</option>';
            options += '<option value="' + stateCode + '-S">' + stateName.toUpperCase() + ' SOUTH</option>';
            options += '<option value="' + stateCode + '-E">' + stateName.toUpperCase() + ' EAST</option>';
            options += '<option value="' + stateCode + '-W">' + stateName.toUpperCase() + ' WEST</option>';
        }

        $('#id_division').html(options);
    });

});
</script>

<script>
$(document).ready(function () {

    $('#id_commissionerate').change(function () {

        var stateCode = $(this).val(); // e.g. MH
        var stateName = $("#id_commissionerate option:selected").text(); // e.g. Maharashtra

        var options = '<option value="">Select</option>';

        if (stateCode !== '') {

            options += '<option value="' + stateCode + '-N-R">' + stateName.toUpperCase() + ' NORTH RANG</option>';
            options += '<option value="' + stateCode + '-S-R">' + stateName.toUpperCase() + ' SOUTH RANG</option>';
            options += '<option value="' + stateCode + '-E-R">' + stateName.toUpperCase() + ' EAST RANG</option>';
            options += '<option value="' + stateCode + '-W-R">' + stateName.toUpperCase() + ' WEST RANG</option>';
        }

        $('#id_range').html(options);
    });

});
</script>





