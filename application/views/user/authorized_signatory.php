
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
                    <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <span ng-switch-when="true">Authorized Signatory</span>  </ng-switch></li>
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
                        
                        <p class="date" ><?php 
                                        $created_date = $registration->created_date;
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
                        <p class="date" data-ng-bind="pfilled+'%'">30%</p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs responsive r1 reg-tabs" data-ng-class="{'adhr' : rpayload.bkacdtls}">
                <li data-ng-class="statusClass(1)" class="complete ">
                    <a href="/gst/registration/step-1/"><span class="navicon business navicon fa fa-light fa-suitcase fa-2x" style="color:white;"></span><br>Business Details</a>
                </li>
                <li data-ng-class="statusClass(2)" class="complete ">
                    <a href="/gst/registration/step-2/"><span class="navicon partners navicon fa fa-user-tie fa-2x"></span><br>Promoter / Partners</a>
                </li>
                <li data-ng-class="statusClass(3)" class="active  incomplete ">
                    <a><span class="navicon auth-sig navicon fa fa-user-check fa-2x"></span><br>Authorized Signatory</a>
                </li>
                <li data-ng-class="statusClass(4)" class=" incomplete ">
                    <a href="/gst/registration/step-4/"><span class="navicon auth-sig-rep navicon fa fa-user-cog fa-2x"></span><br>Authorized
                        Representative</a>
                </li>
                <li data-ng-class="statusClass(5)" class=" incomplete ">
                    <a href="/gst/registration/step-5/"><span class="navicon bplace navicon fa fa-map-marker-alt fa-2x"></span><br>Principal Place of Business</a>
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
        <?php echo form_open_multipart('home/save_authorized_signatory', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form tabpane ng-pristine ng-valid-pattern ng-valid-maxlength ng-invalid' ,'enctype'=>'multipart/form-data')); ?>

            <p data-ng-show="showForm" class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">indicates mandatory fields</p>
            
            <h4 data-ng-repeat="x in promoter | filter:{c: rpayload.bzdtls.bzdtlsbz.cobz}" data-ng-if="rpayload.bzdtls.bzdtlsbz.cobz">
                <span data-ng-bind="trans.LBL_DET_PRO">Details of Authorized Signatory </span>
            </h4>
            <hr>
            <div data-ng-show="!showForm" class="ng-hide">
                <div class="row">
                    <div class="col-xs-12" data-ng-if="(!rpayload.opdtls || rpayload.opdtls.length 10 || rpayload.opdtls.length  0)">
                        <div class="alert alert-warning">
                            
                            <p data-ng-bind="trans.HLP_NO_DATA" data-ng-if="!rpayload.opdtls || rpayload.opdtls.length  0 ">You do not have any submitted applications</p>
                        </div>
                    </div>
                    
                    <div class="col-xs-12">
                        <div name="staus_msg"></div>
                        
                    </div>
                </div>
                <div class="row next-tab-nav">
                    <div class="col-xs-12 text-right">
                        <a title="Back" class="btn btn-default" data-ng-bind="trans.LBL_BACK" href="auth/newappl/business">Back</a>
                        <button title="Add New" type="button" class="btn btn-primary" data-ng-click="addPromoter('new')" data-ng-bind="trans.LBL_SAVE_ADDNEW" data-ng-if="(['DFT','VAE'].indexOf(rpayload.rgdtls.aplst) &gt;= 0 &amp;&amp; !clrPayload) || allowAllFieldsToEdit" data-ng-disabled="rpayload.opdtls.length &gt;=10 || (rpayload.opdtls.length&gt;=1 &amp;&amp; rpayload.bzdtls.bzdtlsbz.cobz 'PRO')">Add New</button>
                        <a title="Continue" class="btn btn-primary" href="auth/newappl/authsignatory" data-ng-bind="trans.LBL_CONTINUE">Continue</a>
                    </div>
                </div>
            </div>
            <div data-ng-show="showForm">
                <!--  -->
                <input type="checkbox" name="primary_authorised_signatory" id="id_primary_authorised_signatory" class="chkbx ng-pristine ng-untouched ng-valid ng-empty" >
                <label for="id_primary_authorised_signatory">Primary Authorized Signatory</label>

                <fieldset> 
                    <h4>
                        <i class="fa fa-user"></i>
                        <span data-ng-bind="trans.HEAD_PER_DET">Personal Information</span>
                    </h4>
                    <div class="tbl-format">
                        <div class="row">
                            <div class="inner">
                                <h5 class="col-xs-12" data-ng-bind="trans.LBL_PER_NM">Name of Person</h5>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.fnm.$valid,  'has-success': pdsubmit &amp;&amp; newRegForm.fnm.$valid}">
                                    <label for="id_first_name" class="reg m-cir" data-ng-bind="trans.LBL_FRST_NM">First Name</label>
                                    <input type="text" name="first_name" maxlength="200" class="form-control" id="id_first_name"  value="<?php echo !empty($promoter->first_name) ? $promoter->first_name : ''; ?>">
                                    <!-- <input id="id_first_name" name="first_name" class="form-control ng-pristine ng-valid ng-not-empty ng-valid-required ng-valid-pattern ng-valid-maxlength ng-touched" type="text" required="" data-ng-model="pd.fn" placeholder="Enter First Name" maxlength="99" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" autofocus="" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD068')| ordinal: 'eid' : pd.eid).length  0" data-ng-change="setPristine('fnm')"> -->
                                     
                                    
                                    
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.pd_mname.$valid}">
                                    <label for="id_middle_name" class="reg" data-ng-bind="trans.LBL_MDL_NM">Middle Name</label>
                                    <input type="text" name="middle_name" maxlength="200" class="form-control" id="id_middle_name"  value="<?php echo !empty($promoter->middle_name) ? $promoter->middle_name : ''; ?>">
                                    <!-- <input id="id_middle_name" name="middle_name" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" type="text" placeholder="Enter Middle Name" data-ng-model="pd.mn" maxlength="99" data-ng-change="setPristine('pd_mname')" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD068')| ordinal: 'eid' : pd.eid).length  0"> -->
                                    
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.pd_lname.$valid}">
                                    <label for="id_last_name" class="reg" data-ng-bind="trans.LBL_LST_NM">Last Name</label>
                                    <input type="text" name="last_name" maxlength="200" class="form-control" id="id_last_name" value="<?php echo !empty($promoter->last_name) ? $promoter->last_name : ''; ?>">>
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-pattern ng-valid-maxlength" name="last_name" maxlength="99" id="id_last_name" type="text" placeholder="Enter Last Name" data-ng-change="setPristine('pd_lname')" data-ng-model="pd.ln" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD068')| ordinal: 'eid' : pd.eid).length  0"> -->
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="inner">
                                <h5 class="col-sm-12 col-xs-12" data-ng-bind="trans.LBL_FTHR_NM">Name of Father</h5>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.ffname.$valid, 'has-success': pdsubmit &amp;&amp; newRegForm.ffname.$valid}">
                                    <label for="id_father_first_name" class="reg m-cir" data-ng-bind="trans.LBL_FRST_NM">First Name</label>
                                    <input type="text" name="father_first_name" maxlength="200" class="form-control" id="id_father_first_name" value="<?php echo !empty($promoter->father_first_name) ? $promoter->father_first_name : ''; ?>">
                                    <!-- <input id="id_father_first_name" name="father_first_name" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" type="text" required="" data-ng-model="pd.fhfn" placeholder="Enter First Name" maxlength="99" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0" data-ng-change="setPristine('ffname')"> -->
                                    
                                    
                                    
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.pd_fmname.$valid}">
                                    <label for="id_father_middle_name" class="reg" data-ng-bind="trans.LBL_MDL_NM">Middle Name</label>
                                    <input type="text" name="father_middle_name" maxlength="200" class="form-control" id="id_father_middle_name" value="<?php echo !empty($promoter->father_middle_name) ? $promoter->father_middle_name : ''; ?>">
                                    <!-- <input id="id_father_middle_name" name="father_middle_name" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" type="text" placeholder="Enter Middle Name" data-ng-model="pd.fhmn" maxlength="99" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" data-ng-change="setPristine('pd_fmname')" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0"> -->
                                    
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.pd_flname.$valid}">
                                    <label for="id_father_last_name" class="reg" data-ng-bind="trans.LBL_LST_NM">Last Name</label>
                                    <input type="text" name="father_last_name" maxlength="200" class="form-control" id="id_father_last_name" value="<?php echo !empty($promoter->father_last_name) ? $promoter->father_last_name : ''; ?>">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" name="father_last_name" maxlength="99" id="id_father_last_name" type="text" placeholder="Enter Last Name" data-ng-model="pd.fhln" data-ng-change="setPristine('pd_flname')" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0"> -->
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="inner">
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.dob.$valid, 'has-success': pdsubmit &amp;&amp; newRegForm.dob.$valid}">
                                    <label for="id_date_of_birth_custom" class="reg m-cir" data-ng-bind="trans.LBL_DOB">Date of Birth</label>
                                    <div class="datepicker-icon input-group">
                                        <!-- <input class="form-control date-picker ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="date_of_birth" data-datepicker="" data-ng-model="pd.dob" id="id_date_of_birth" data-date-format="dd/mm/yyyy" placeholder="YYYY/MM/DD" data-max-days="-1" data-min-years="150" required="" type="text"> -->
                                        <!--  -->
                                        <input type="date" name="date_of_birth_custom" class="form-control" required="" id="id_date_of_birth_custom" value="<?php echo !empty($promoter->date_of_birth_custom) ? $promoter->date_of_birth_custom : ''; ?>">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.mbno.$valid,   'has-success': pdsubmit &amp;&amp; newRegForm.mbno.$valid}">
                                    <label for="id_mobile_number" class="reg m-cir">
                                        <i class="type-ico fa fa-mobile"></i>
                                        <span data-ng-bind="trans.LBL_MOB_NO">Mobile Number</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="pd_mob">+91</span>
                                        <input type="text" name="mobile_number" maxlength="15" class="form-control" id="id_mobile_number" value="<?php echo !empty($promoter->mobile_number) ? $promoter->mobile_number : ''; ?>">
                                        <!-- <input id="id_mobile_number" name="mobile_number" type="text" class="number form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength" placeholder="Enter Mobile Number" aria-describedby="pd_mob" data-ng-pattern="/^[1-9]{1}[0-9]{9}$/" data-ng-minlength="10" maxlength="10" data-ng-model="pd.mbno" data-ng-change="setPristine('mbno')" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0" required=""> -->
    
                                </div>                                                          
                                
                                
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; newRegForm.em.$invalid,'has-success':pdsubmit &amp;&amp; newRegForm.em.$valid &amp;&amp; newRegForm.em.$dirty}">
                                <label for="id_email" class="reg m-cir">
                                    <i class="fa fa-envelope-open-o"></i>
                                    <span data-ng-bind="trans.LBL_E_ADDR">Email Address</span>
                                </label>
                                <input type="text" name="email" maxlength="200" class="form-control" id="id_email"value="<?php echo !empty($promoter->email) ? $promoter->email : ''; ?>">
                                <!-- <input name="email" id="id_email" class="form-control ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" type="email" placeholder="Enter Email Address" data-ng-model="pd.em" data-ng-pattern="/^[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/" maxlength="254" required="" data-ng-change="setPristine('em')" data-ng-disabled="(clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; isMigratedMail !='Y' &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0)"> -->
                                
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12 radio-order" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.gd.$valid, 'has-success': pdsubmit &amp;&amp; newRegForm.gd.$valid}">
                                <fieldset data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0">
                                    <legend class="reg m-cir" data-ng-bind="trans.LBL_GENDR">Gender</legend>
                                    <?php $g = isset($promoter->gender) ? (string)$promoter->gender : ''; ?>

                                <input type="radio" name="gender" id="id_gender_1" value="0" <?= ($g === '0') ? 'checked' : ''; ?>>
                                <label for="id_gender_1">
                                    <i class="type-ico fa fa-male"></i> Male
                                </label>
                                
                                <input type="radio" name="gender" id="id_gender_2" value="1" <?= ($g === '1') ? 'checked' : ''; ?>>
                                <label for="id_gender_2">
                                    <i class="type-ico fa fa-female"></i> Female
                                </label>
                                
                                <input type="radio" name="gender" id="id_gender_3" value="2" <?= ($g === '2') ? 'checked' : ''; ?>>
                                <label for="id_gender_3">
                                    <i class="type-ico fa fa-street-view"></i> Others
                                </label>
                                </fieldset>
                                <span class="err ng-hide" data-ng-show="pdsubmit &amp;&amp; newRegForm.gd.$error.required" data-ng-bind="trans.ERR_GEND_REQ">Gender is required</span>
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; !newRegForm.tlphno.$valid, 'has-success': pdsubmit &amp;&amp; newRegForm.tlphno.$valid}">
                                <label for="telstd" class="reg">
                                    <i class="type-ico fa fa-phone"></i>
                                    <span data-ng-bind="trans.LBL_TEL_NO">Telephone Number (with STD Code)</span>
                                </label>
                                <div class="input-group">
                                    <div class="col-sm-3 col-xs-3 addrow">
                                        <input type="text" name="telephone_std" maxlength="4" class="form-control" id="id_telephone_std"value="<?php echo !empty($promoter->telephone_std) ? $promoter->telephone_std : ''; ?>">
                                        <!-- <input type="text" id="id_telephone_std" name="telephone_std" class="number form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="STD" data-ng-model="pd.tlphno.stdCd" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0" data-ng-change="setPristine('tlphno')"> -->
                                    </div>
                                    <div class="col-sm-9 col-xs-9 addrow">
                                        <input type="text" name="telephone_number" maxlength="15" class="form-control" id="id_telephone_number" value="<?php echo !empty($promoter->telephone_number) ? $promoter->telephone_number : ''; ?>">
                                        <!-- <input type="text" id="id_telephone_number" name="telephone_number" class="number form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern" placeholder="Enter Telephone Number" data-ng-model="pd.tlphno.telNum" data-ng-pattern="/^[0-9]*$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD008')| ordinal: 'eid' : pd.eid).length  0" data-ng-change="setPristine('tlphno')"> -->
                                    </div>
                                </div>
                                
                                
                            </div>                       
                        </div>
                    </div>
                </div>                    
                <h4>
                    <i class="fa fa-id-card"></i>
                    <span data-ng-bind="trans.HEAD_ID_INF">Identity Information</span>
                </h4>
                <div class="tbl-format">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.dg.$invalid, 'has-success': pdsubmit &amp;&amp; newRegForm.dg.$valid}">
                                <label for="id_designation" class="reg m-cir" data-ng-bind="trans.LBL_DESGN">Designation / Status</label>
                                <input type="text" name="designation" maxlength="100" class="form-control" id="id_designation" value="<?php echo !empty($promoter->designation) ? $promoter->designation : ''; ?>">
                                <!-- <input id="id_designation" name="designation" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" placeholder="Enter Designation" data-ng-model="pd.dg" maxlength="25" required="" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD010')| ordinal: 'eid' : pd.eid).length  0" data-ng-change="setPristine('dg')"> -->
                                
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.din.$invalid,
                            'has-success': pdsubmit &amp;&amp; newRegForm.din.$valid &amp;&amp; newRegForm.din.$dirty}">
                                <label for="id_director_number" class="reg" data-ng-class="{'m-cir':((rpayload.bzdtls.bzdtlsbz.cobz &amp;&amp; (rpayload.bzdtls.bzdtlsbz.cobz = 'PVT' || rpayload.bzdtls.bzdtlsbz.cobz = 'PUB' ||   rpayload.bzdtls.bzdtlsbz.cobz = 'PSU' || rpayload.bzdtls.bzdtlsbz.cobz = 'ULC' || rpayload.bzdtls.bzdtlsbz.cobz = 'LLP' ))  )}" data-ng-bind="trans.LBL_DIN_NUM">Director Identification Number</label>
                                <span>
                                    <i class="fa fa-info-circle" data-toggle="tooltip" title="Director Identification number is mandatory, if constitution of business is: &lt;br&gt;
                                    I. Public Limited Company (or)&lt;br&gt;
                                    II. Private Limited Company (or)&lt;br&gt;
                                    III. Public Sector Undertaking (or)&lt;br&gt;
                                    IV. Unlimited Company (or)&lt;br&gt;
                                    V. Limited Liability Partnership
                                    "> </i>
                                </span>
                                <input type="text" name="director_number" maxlength="50" class="form-control" id="id_director_number" value="<?php echo !empty($promoter->director_number) ? $promoter->director_number : ''; ?>">
                                <!-- <input id="id_director_number" name="director_number" class="number form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-valid-required" type="text" placeholder="Enter DIN Number" data-ng-model="pd.din.num" maxlength="8" data-ng-pattern="/^[0-9]{8}$/" data-ng-change="setPristine('din')" data-ng-required="(rpayload.bzdtls.bzdtlsbz.cobz &amp;&amp; (rpayload.bzdtls.bzdtlsbz.cobz = 'PVT' || rpayload.bzdtls.bzdtlsbz.cobz = 'PUB' ||   rpayload.bzdtls.bzdtlsbz.cobz = 'PSU' || rpayload.bzdtls.bzdtlsbz.cobz = 'ULC' || rpayload.bzdtls.bzdtlsbz.cobz = 'LLP'))" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD010')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD009')| ordinal: 'eid' : pd.eid).length  0"> -->
                                
                                
                                
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <label for="pd_cit_ind" class="reg" data-ng-bind="trans.LBL_CIT_IND">Are you a citizen of India?</label>
                                <div class="switch round">
                                    <input id="pd_cit_ind" name="pd_cit_ind" type="checkbox"  class="ng-pristine ng-untouched ng-valid ng-not-empty" checked="checked">
                                    <label for="pd_cit_ind">
                                        <span class="switch-on"><span >Yes</span></span>
                                        <span class="switch-off"><span>No</span></span>
                                    </label>
                                </div>
                            </div>
    
                        </div>
                    </div>
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pan.$invalid, 'has-success':pdsubmit &amp;&amp; newRegForm.pan.$valid}">
                                <label for="id_pan" class="reg  m-cir" ng-class="{'m-cir': pd.isasg 'Y' || pd.iscitind 'Y'}" data-ng-bind="trans.LBL_PAN_FF">Permanent Account Number (PAN)</label>
                                <input type="text" name="pan" maxlength="10" class="form-control" id="id_pan" value="<?php echo !empty($promoter->pan) ? $promoter->pan : ''; ?>">
                                <!-- <input id="id_pan" name="pan" class="form-control upper-input ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required ng-valid-pattern ng-valid-maxlength" type="text" placeholder="Enter Permanent Account Number (PAN)" data-ng-model="pd.pan.num" data-ng-pattern="/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/" data-ng-required="pd.isasg 'Y' || pd.iscitind 'Y'" data-capitalize="" data-ng-change="setPristine('pan')" maxlength="10" data-pan="" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD010')| ordinal: 'eid' : pd.eid).length  0" required="required"> -->
                                
                                
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; newRegForm.ppno.$invalid, 'has-success': pdsubmit &amp;&amp; newRegForm.ppno.$valid}">
                                <label for="id_passport" class="reg" ng-class="{'m-cir': pd.iscitind !='Y'}" data-ng-bind="trans.LBL_PASS_NUM">Passport Number (In case of Foreigner)</label>
                                <input type="text" name="passport" maxlength="20" class="form-control" id="id_passport" value="<?php echo !empty($promoter->passport) ? $promoter->passport : ''; ?>">
                                <!-- <input class="form-control upper-input ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-valid-required" id="id_passport" name="passport" data-ng-model="pd.ppno" placeholder="Enter Passport Number" data-ng-required="newRegForm.pd_cit_ind.$modelValue !='Y'" maxlength="15" ng-pattern="/^[A-PR-WYZa-pr-wyz][0-9]\d\s?\d{4}[0-9]$/" data-ng-change="setPristine('ppno')" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD010')| ordinal: 'eid' : pd.eid).length  0" data-capitalize="toUpperCase"> -->
                                
                                
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.uid.$invalid}">
                                <label class="reg" for="id_aadhar_card" data-ng-bind="trans.LBL_UID_NUM">Aadhaar Number</label>
                                <span>
                                    <i class="fa fa-info-circle" data-toggle="modal" data-target="#adhrmdl"></i>
                                </span>
                                
                                <input name="aadhar_card" id="id_aadhar_card" class="form-control number  ng-pristine ng-untouched ng-valid ng-empty" placeholder="Enter Aadhaar Number" data-ng-model="pd.uid.num" disabled="">
                                
                            </div>
                        </div>
                    </div>
                    <div data-ng-show="pd.uid.num &amp;&amp; validations.aadhar(pd.uid.num)" class="ng-hide">
                        <h4 class="m-cir" data-ng-bind="trans.HEAD_DECLARATION">Declaration</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 radio-order" data-ng-class="{'has-error' : newRegForm.pd_adhar_dec.$invalid
                                                                        &amp;&amp; (newRegForm.pd_adhar_dec.$dirty || pdsubmit)}">
                                <input type="checkbox" id="pd_adhar_dec" name="pd_adhar_dec" class="chkbx ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" data-ng-model="pd.uid.isdecl" data-ng-required="pd.uid.num" data-ng-true-value="'Y'" data-ng-false-value="'N'" data-ng-checked="pd.uid.isdecl='Y'?true:false" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD010')| ordinal: 'eid' : pd.eid).length  0">
                                <label for="pd_adhar_dec"><span data-ng-bind="trans.HLP_AADHAR_DEC1">I on behalf of the holder of Aadhaar number &lt;</span>  <span data-ng-bind="trans.HLP_AADHAR_DEC2">&gt; give consent to “Goods and Services Tax Network” to obtain my details from UIDAI for the purpose of authentication. “Goods and Services Tax Network” has informed me that identity information would only be used for validating identity of the Aadhaar holder and will be shared with Central Identities Data Repository only for the purpose of authentication.</span> </label>                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <h4>
                    <i class="fa fa-envelope"></i>
                    <span data-ng-bind="trans.HEAD_RES_ADDR">Residential Address</span>
                </h4>
                  
                        <!-- <div class="MapPinCodeSearchBox exp_cl_sear" style="top:10px;background-color:white">
                            <i class="material-icons search-to"><img style="height: 25px;width: 25px;" src="/uiassets/images/icons/pin1.jpg"/></i> 
                            <input class="searchBox gnx_cls_number" style="width:65px" id="onMapPinCodeSerachId" name="PIN" type="text" placeholder="Pin Code" ng-model="mapPincode" ng-change="callMapPincode()" > 
                            
                            <div class="as-results" id="as-results-onMapPinCodeSerachId" ng-if="showMapPinCode" style="display: list-item;height: relative;position:absolute;top:-10px;background-blend-mode: overlay">
                                <ul class="as-list" style="position: relative; margin-top: 38px;">
                                    <li   ng-repeat="pins in suggestionMapPincode"  ng-click="selectMapPincode(pins.placeName)"><span><strong></strong></span>
                                            <br></li>
                                </ul>
                            </div>
                            
                             &nbsp;<i id="pinSearchCloseIcon" class="material-icons close" onclick="$('#onMapPinCodeSerachId').val('');"><img src="/uiassets/images/icons/close.png" style="width:12px;height:10px"></i>
                         </div> -->
                                             
                    
                    <!-- map tile end--->
                    
                    <!-- map disable for SCN start --> 
                    
                    <!-- map disable for SCN end --> 
                    <div class="tbl-format">  <!--this div showing feilds as table format-->
                    
                        <!-- row 1 -->
                        <div class="row"> 
                            <div class="inner">
                                <!--Country--->
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pd_cntry.$invalid,
                                                                   'has-success': pdsubmit &amp;&amp; newRegForm.pd_cntry.$valid}">
                                    <label for="pd_cntry " class="reg m-cir " data-ng-bind="trans.LBL_COUNTRY">Country</label>
                                    
                                    <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" ng-change="changeMessage()" name="country" id="id_country " data-ng-model="pd.rsad.cnty" data-ng-change="addDtlRst('pat')" required="" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0">
                                        <option value="">Select</option>
                                        <option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IND" selected="selected">India</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AFG">Afghanistan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ALB">Albania</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="DZA">Algeria</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ASM">American Samoa</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AND">Andorra</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AGO">Angola</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AIA">Anguilla</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ATA">Antarctica</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ATG">Antigua and Barbuda</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ARG">Argentina</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ARM">Armenia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ABW">Aruba</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AUS">Australia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AUT">Austria</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="AZE">Azerbaijan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BHS">Bahamas</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BHR">Bahrain</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BGD">Bangladesh</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BRB">Barbados</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BLR">Belarus</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BEL">Belgium</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BLZ">Belize</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BEN">Benin</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BMU">Bermuda</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BTN">Bhutan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BOL">Bolivia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BIH">Bosnia and Herzegovina</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BWA">Botswana</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BRA">Brazil</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IOT">British Indian Ocean Territory</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VGB">British Virgin Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BRN">Brunei</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BGR">Bulgaria</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BFA">Burkina Faso</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BDI">Burundi</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KHM">Cambodia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CMR">Cameroon</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CAN">Canada</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CPV">Cape Verde</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CYM">Cayman Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CAF">Central African Republic</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TCD">Chad</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CHL">Chile</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CHN">China</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CXR">Christmas Island</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CCK">Cocos Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="COL">Colombia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="COM">Comoros</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="COK">Cook Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CRI">Costa Rica</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="HRV">Croatia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CUB">Cuba</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CUW">Curacao</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CYP">Cyprus</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CZE">Czech Republic</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="COD">Democratic Republic of the Congo</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="DNK">Denmark</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="DJI">Djibouti</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="DMA">Dominica</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="DOM">Dominican Republic</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TLS">East Timor</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ECU">Ecuador</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="EGY">Egypt</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SLV">El Salvador</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GNQ">Equatorial Guinea</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ERI">Eritrea</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="EST">Estonia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ETH">Ethiopia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="FLK">Falkland Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="FRO">Faroe Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="FJI">Fiji</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="FIN">Finland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="FRA">France</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PYF">French Polynesia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GAB">Gabon</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GMB">Gambia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GEO">Georgia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="DEU">Germany</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GHA">Ghana</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GIB">Gibraltar</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GRC">Greece</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GRL">Greenland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GRD">Grenada</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GUM">Guam</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GTM">Guatemala</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GGY">Guernsey</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GIN">Guinea</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GNB">Guinea-Bissau</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GUY">Guyana</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="HTI">Haiti</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="HND">Honduras</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="HKG">Hong Kong</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="HUN">Hungary</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ISL">Iceland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IDN">Indonesia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IRN">Iran</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IRQ">Iraq</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IRL">Ireland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="IMN">Isle of Man</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ISR">Israel</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ITA">Italy</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CIV">Ivory Coast</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="JAM">Jamaica</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="JPN">Japan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="JEY">Jersey</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="JOR">Jordan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KAZ">Kazakhstan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KEN">Kenya</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KIR">Kiribati</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="XKX">Kosovo</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KWT">Kuwait</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KGZ">Kyrgyzstan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LAO">Laos</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LVA">Latvia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LBN">Lebanon</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LSO">Lesotho</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LBR">Liberia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LBY">Libya</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LIE">Liechtenstein</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LTU">Lithuania</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LUX">Luxembourg</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MAC">Macao</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MKD">Macedonia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MDG">Madagascar</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MWI">Malawi</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MYS">Malaysia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MDV">Maldives</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MLI">Mali</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MLT">Malta</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MHL">Marshall Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MRT">Mauritania</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MUS">Mauritius</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MYT">Mayotte</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MEX">Mexico</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="FSM">Micronesia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MDA">Moldova</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MCO">Monaco</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MNG">Mongolia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MNE">Montenegro</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MSR">Montserrat</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MAR">Morocco</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MOZ">Mozambique</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MMR">Myanmar</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NAM">Namibia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NRU">Nauru</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NPL">Nepal</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NLD">Netherlands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ANT">Netherlands Antilles</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NCL">New Caledonia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NZL">New Zealand</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NIC">Nicaragua</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NER">Niger</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NGA">Nigeria</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NIU">Niue</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PRK">North Korea</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MNP">Northern Mariana Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="NOR">Norway</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="OMN">Oman</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PAK">Pakistan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PLW">Palau</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PSE">Palestine</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PAN">Panama</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PNG">Papua New Guinea</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PRY">Paraguay</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PER">Peru</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PHL">Philippines</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PCN">Pitcairn</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="POL">Poland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PRT">Portugal</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="PRI">Puerto Rico</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="QAT">Qatar</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="COG">Republic of the Congo</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="REU">Reunion</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ROU">Romania</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="RUS">Russia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="RWA">Rwanda</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="BLM">Saint Barthelemy</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SHN">Saint Helena</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KNA">Saint Kitts and Nevis</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LCA">Saint Lucia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="MAF">Saint Martin</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SPM">Saint Pierre and Miquelon</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VCT">Saint Vincent and the Grenadines</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="WSM">Samoa</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SMR">San Marino</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="STP">Sao Tome and Principe</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SAU">Saudi Arabia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SEN">Senegal</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SRB">Serbia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SYC">Seychelles</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SLE">Sierra Leone</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SGP">Singapore</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SXM">Sint Maarten</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SVK">Slovakia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SVN">Slovenia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SLB">Solomon Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SOM">Somalia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ZAF">South Africa</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="KOR">South Korea</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SSD">South Sudan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ESP">Spain</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="LKA">Sri Lanka</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SDN">Sudan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SUR">Suriname</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SJM">Svalbard and Jan Mayen</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SWZ">Swaziland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SWE">Sweden</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="CHE">Switzerland</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="SYR">Syria</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TWN">Taiwan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TJK">Tajikistan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TZA">Tanzania</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="THA">Thailand</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TGO">Togo</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TKL">Tokelau</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TON">Tonga</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TTO">Trinidad and Tobago</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TUN">Tunisia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TUR">Turkey</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TKM">Turkmenistan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TCA">Turks and Caicos Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="TUV">Tuvalu</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VIR">U.S. Virgin Islands</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="UGA">Uganda</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="UKR">Ukraine</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ARE">United Arab Emirates</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="GBR">United Kingdom</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="USA">United States</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="URY">Uruguay</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="UZB">Uzbekistan</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VUT">Vanuatu</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VAT">Vatican</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VEN">Venezuela</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="VNM">Vietnam</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="WLF">Wallis and Futuna</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ESH">Western Sahara</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="YEM">Yemen</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ZMB">Zambia</option><option data-ng-repeat="z in country" ng-selected="z.c  country[0].c" data-ng-bind="z.n" value="ZWE">Zimbabwe</option>
                                    </select>
                                    
                                    <!-- <input id="pd_cntry" name="pd_cntry" class="form-control"  data-ng-init="pd.rsad.cnty='IND'" value="India" ng-if="pd.iscitind'Y'" required readonly> -->
                                    
                                    
                                </div>
                                
                                <!--Pincode--->
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; newRegForm.pncd.$invalid,
                                                                       'has-success': pdsubmit &amp;&amp; newRegForm.pncd.$valid}">
                                    <label class="reg m-cir" for="id_pin" data-ng-bind="(pd.rsad.cnty'IND') ? trans.LBL_PIN_CODE : 'ZIP Code'">PIN Code</label>
                                    <input type="text" name="pin" maxlength="10" class="form-control" id="id_pin"  value="<?php echo !empty($promoter->pin) ? $promoter->pin : ''; ?>">
                                    <!-- <input name="pin" id="id_pin" type="text" class="form-control  ng-pristine ng-untouched number ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" ng-class="{'number':pd.rsad.cnty'IND'}" placeholder="Enter PIN Code" data-ng-model="pd.rsad.pncd" ng-blur="checkPincodeSelection()" required="" ng-change="countryCheck(callPincode)" autocomplete="!!!!!!" ng-focus="saveOldValues('pincode')" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" maxlength="6"> -->
                                    
                                                                 
                                                                 
                                    
                                    
                                    <!-- suggestion -->
                                    <div class="as-results autosuggestList" id="removePincodeFocus" ng-if="true">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                                
                                <!--State--->
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; newRegForm.pd_state.$invalid,
                                                                       'has-success': pdsubmit &amp;&amp; newRegForm.pd_state.$valid}">
                                    <label for="id_state" class="reg m-cir" data-ng-bind="trans.LBL_STATE">State</label>                                
                                    
                                    <input type="text" name="state" maxlength="50" class="form-control" id="id_state"  value="<?php echo !empty($promoter->state) ? $promoter->state : ''; ?>">
                                    <!-- <input id="id_state" name="state" type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" data-ng-model="mmiVar.pd_state" placeholder="Enter State Name" required="" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" maxlength="99" ng-change="countryCheck(callState)" autocomplete="!!!!!!" ng-blur="checkStateSelection()" ng-focus="saveOldValues('state')"> -->
                                    
                                    
                                    
                                    
                                    <!-- suggestion -->
                                    <div class="as-results autosuggestList" id="removeStateFocus" ng-if="true">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                        <div class="row">
                        <!-- row 2 -->
                            <div class="inner">
                                <!-- district for country equals india-->
                                <div ng-if="(pd.rsad.cnty'IND') ? true : false" class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit &amp;&amp; newRegForm.dst.$invalid,
                                                                       'has-success': pdsubmit &amp;&amp; newRegForm.dst.$valid}">
                                    <label class="reg m-cir" data-ng-class="{'m-cir':((pd.rsad.stcd &amp;&amp; pd.rsad.stcd != '97'))}" for="id_district" data-ng-bind="trans.LBL_DISTRICT">District</label>
                                    <input type="text" name="district" maxlength="50" class="form-control" id="id_district" value="<?php echo !empty($promoter->district) ? $promoter->district : ''; ?>">
                                    <!-- <input id="id_district" name="district" type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" data-ng-model="mmiVar.pd_dist" ng-change="countryCheck(callDistrict)" ng-blur="checkDistrictSelection()" ng-focus="saveOldValues('district')" placeholder="Enter District Name" autocomplete="!!!!!!" required="" disabled="disabled"> -->
                                    
                                    
                                    
                                    
                                    <!--suggestion-->
                                     <div class="as-results autosuggestList" ng-if="true" id="removeDistrictFocus">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                <!-- district for country not-equals india-->
                                
                                <!-- city ---->
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pd_locality.$invalid,
                                                                   'has-success': pdsubmit &amp;&amp; newRegForm.pd_locality.$valid}">
                                    <label class="reg m-cir" for="id_city" data-ng-bind="trans.LBL_LAV_NO">City / Town / Village</label>
                                    <input type="text" name="city" maxlength="50" class="form-control" id="id_city"  value="<?php echo !empty($promoter->city) ? $promoter->city : ''; ?>">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="id_city" name="city" type="text" placeholder="Enter City / Town / Village" data-ng-model="pd.rsad.loc" required="" ng-change="countryCheck(callCity)" ng-focus="saveOldValues('city')" ng-blur="checkCitySelection()" autocomplete="!!!!!!" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" disabled="disabled"> -->
                                    
                                    
                                    
                                    
                                    <!--suggestion-->
                                    <div class="as-results autosuggestList" id="removeCityFocus" ng-if="true">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- locality/sublocality -->
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pd_locality.$invalid,
                                                               'has-success': pdsubmit &amp;&amp; newRegForm.pd_locality.$valid}">
                                <label class="reg" for="id_locality" data-ng-bind="trans.LBL_LOSUBL">Locality/Sub Locality</label>
                                <input type="text" name="locality" maxlength="50" class="form-control" id="id_locality" value="<?php echo !empty($promoter->locality) ? $promoter->locality : ''; ?>">                            <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" maxlength="60" id="id_locality" name="locality" ng-change="countryCheck(callLocality)" placeholder="Enter Locality / Sublocality" data-ng-model="mmiVar.pd_locality" data-ng-model-options="{ debounce: 50 }" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" autocomplete="!!!!!!" ng-focus="closeSuggestion('locality')" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" disabled="disabled"> -->
                                
                                <!--<span class="err" data-ng-if="pdsubmit && newRegForm.pd_locality.$error.required" data-ng-bind="trans.ERR_TWN_REQ"></span>-->
                                
            
                                <!--suggestion-->
                                  
                              <div class="as-results autosuggestList" id="removeLocalityFocus" ng-if="mmiVar.showLocality">
                                    <ul class="as-list">
                                        
                                    </ul>
                              </div>
                                
                            </div>
                            <!--    <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit && newRegForm.pd_cntry.$invalid,
                                                                   'has-success': pdsubmit && newRegForm.pd_cntry.$valid}">
                                    <label for="pd_cntry " class="reg m-cir " data-ng-bind="trans.LBL_COUNTRY"></label>
                                    <select class="form-control " name="pd_cntry " id="pd_cntry " data-ng-model="pd.rsad.cnty" data-ng-change="addDtlRst('pat')" required data-ng-disabled="clrPayload && ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 && ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0">
                                        <option value="">Select</option>
                                        <option data-ng-repeat="z in country" data-ng-bind="z.n" value=" "></option>
                                    </select>
                                    <!-- <input id="pd_cntry" name="pd_cntry" class="form-control"  data-ng-init="pd.rsad.cnty='IND'" value="India" ng-if="pd.iscitind'Y'" required readonly> 
                                    <span class="err" data-ng-if="pdsubmit && newRegForm.pd_cntry.$error.required" data-ng-bind="trans.ERR_CON_REQ"></span>
                                    <span class="err" data-ng-if="assubmit && newRegForm.cnty.$error.serverr" data-ng-bind="errors.cnty"></span>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                        <!--- row 3 --> 
                            <div class="inner">
                            <!-- Road/Street -->
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pd_road.$invalid,
                                                                   'has-success': pdsubmit &amp;&amp; newRegForm.pd_road.$valid}">
                                    <label class="reg m-cir" for="id_road" data-ng-bind="trans.LBL_RSL_NO">Road / Street</label>
                                    <input type="text" name="road" maxlength="50" class="form-control" id="id_road" value="<?php echo !empty($promoter->road) ? $promoter->road : ''; ?>">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" id="id_road" ng-change="countryCheck(callRoad)" name="road" placeholder="Enter Road / Street / Lane" data-ng-model="pd.rsad.st" data-ng-model-options="{ debounce: 50 }" data-ng-pattern="/^[a-zA-Z0-9  \/_\-\,\.!#$%&amp;'*+\/=?^_`{|}~-\s]{1,120}$/" maxlength="120" ng-focus="closeSuggestion('road')" autocomplete="!!!!!!" required="" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" disabled="disabled"> -->
                                    
                                    
                                    
                                    <!--suggestion-->
                                    <div class="as-results autosuggestList" id="removeRoadFocus" ng-if="mmiVar.showRoad">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': pdsubmit && newRegForm.pd_state.$invalid,
                                                                       'has-success': pdsubmit && newRegForm.pd_state.$valid}">
                                    <label for="pd_state" class="reg m-cir" data-ng-bind="trans.LBL_STATE"></label>
                                    <select ng-if="pd.rsad.cnty'IND'" class="form-control" name="pd_state" id="pd_state" required data-ng-model="pd.rsad.stcd" data-ng-change="loadDistrict(pd.rsad.stcd, 'pr_dst', 'pd.rsad.dst','pd.rsad.pncd');" data-ng-disabled="clrPayload && ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 && ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0">
                                        <option value="">Select</option>
                                        <option data-ng-repeat="st in state" data-ng-bind="st.n" value=""></option>
                                    </select>
                                    <input id="pd_state" name="pd_state" class="form-control" data-ng-model="pd.rsad.stcd" ng-if="pd.rsad.cnty!='IND'" placeholder="" required data-ng-disabled="clrPayload && ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 && ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" maxlength="99" >
                                    <p class="err" data-ng-if="pdsubmit && newRegForm.pd_state.$error.required" data-ng-bind="trans.ERR_ST_REQ"></p>
                                    <p class="err" data-ng-if="errors.state" data-ng-bind="errors.state"></p>
                                </div> -->
                                
                                <!-- Building name -->
                                <div class="col-sm-4 col-xs-12">
                                    <label class="reg" for="id_name_of_building" data-ng-bind="trans.LBL_NM_BULD">Name of the Premises / Building</label>
                                    <input type="text" name="name_of_building" maxlength="50" class="form-control" id="id_name_of_building" value="<?php echo !empty($promoter->name_of_building) ? $promoter->name_of_building : ''; ?>">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" maxlength="60" data-ng-change="countryCheck(callBuilding)" id="id_name_of_building" name="name_of_building" placeholder="Enter Name of Premises / Building" ng-focus="closeSuggestion('building')" data-ng-model="pd.rsad.bnm" data-ng-model-options="{ debounce: 50 }" autocomplete="!!!!!!" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" disabled="disabled"> -->
                                    <!--suggestion-->
                                    <div class="as-results autosuggestList" id="removeBuildingFocus" ng-if="mmiVar.showBuilding">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                <!-- Building number --->
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error':pdsubmit &amp;&amp; newRegForm.pd_bdnum.$invalid,
                                                                   'has-success': pdsubmit &amp;&amp; newRegForm.pd_bdnum.$valid}">
                                    <label class="reg m-cir" for="id_building_number" data-ng-bind="trans.LBL_BFD_NO">Building No. / Flat No.</label>
                                    <input type="text" name="building_number" maxlength="50" class="form-control" id="id_building_number"  value="<?php echo !empty($promoter->building_number) ? $promoter->building_number : ''; ?>">                                <!-- <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" id="id_building_number" name="building_number" ng-change="countryCheck(callBuilding_no)" placeholder="Enter Building No. / Flat No. / Door No." data-ng-model="pd.rsad.bno" data-ng-model-options="{ debounce: 50 }" maxlength="60" ng-focus="closeSuggestion('building_no')" autocomplete="!!!!!!" data-ng-pattern="/^[a-zA-Z0-9 \/_\-\,\.]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,60}$/" required="" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" disabled="disabled"> -->
                                    
                                    <!--<span class="err" data-ng-if="pdsubmit && newRegForm.pd_bdnum.$error.pattern" data-ng-bind="trans.ERR_INV_CHAR"></span>-->
                                    
                                    <!--suggestion-->
                                    <div class="as-results autosuggestList" id="removeBuilding_noFocus" ng-if="mmiVar.showBuildingNumber">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        <!-- extra row we added -->
                    <div class="row">
                            <div class="inner">
                            <!-- Floor no. --->
                                <div class="col-sm-4 col-xs-12">
                                    <label class="reg" for="id_floor_number" data-ng-bind="trans.LBL_FLR_NO">Floor No.</label>
                                    <input type="text" name="floor_number" maxlength="10" class="form-control" id="id_floor_number" value="<?php echo !empty($promoter->floor_number) ? $promoter->floor_number : ''; ?>">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" ng-focus="closeSuggestion('all')" maxlength="60" id="id_floor_number" name="floor_number" placeholder="Enter Floor No." data-ng-model="pd.rsad.flno" data-ng-pattern="/^[a-zA-Z0-9\-\\\/\.\, ]{1,60}$/" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" autocomplete="!!!!!!" disabled="disabled"> -->
                                    
                                </div>
                                <!-- Nearby Landmark --->
                                <div class="col-sm-4 col-xs-12">
                                    <label class="reg" for="id_nearby_landmark" data-ng-bind="trans.LBL_NLAND">Nearby Landmark</label>
                                    <input type="text" name="nearby_landmark" maxlength="100" class="form-control" id="id_nearby_landmark" value="<?php echo !empty($promoter->nearby_landmark) ? $promoter->nearby_landmark : ''; ?>">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" ng-change="countryCheck(callLandmark)" maxlength="60" id="id_nearby_landmark" name="nearby_landmark" data-ng-model="mmiVar.pd_landmark" data-ng-model-options="{ debounce: 50 }" ng-focus="closeSuggestion('landmark')" data-ng-disabled="pd.rsad.pncd''||pd.rsad.pncdnull||mmiVar.pd_dist''||mmiVar.pd_distnull||mmiVar.pd_state''||mmiVar.pd_statenull||clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" placeholder="Enter Nearby Landmark" autocomplete="!!!!!!" disabled="disabled"> -->
    
                                    
                                    
                                    <!--suggestion-->
                                    <div class="as-results autosuggestList" id="removeLandmarkFocus" ng-if="mmiVar.showLandmark">
                                        <ul class="as-list">
                                            
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="inner">
                                <div class="col-sm-4 col-xs-12">
                                    
                                </div>
                                
                                <div class="col-sm-4 col-xs-12">
                                    <center><button id="reset-address" type="button" ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD011')| ordinal: 'eid' : pd.eid).length  0 &amp;&amp; ((scnDetails.pp.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD012')| ordinal: 'eid' : pd.eid).length  0" ng-click="clearFieldValues(1)" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp;Reset Address</button></center>
                                </div>
                                
                            </div>
                        </div>
                    </div>
    
                <h4>
                    <i class="fa fa-cloud-upload"></i>
                    <span data-ng-bind="trans.HEAD_DOC_UP">Document Upload</span>
                </h4>
                <fieldset data-ng-disabled="clrPayload">
                    <div class="tbl-format">
                        <div class="row">
                            <div class="inner">
                                <!---->
                            </div>
                        </div>
                        <div class="row">
                            <div class="inner">
                                <fieldset data-ng-disabled="(rpayload.bzdtls.bzdtlsbz.cobz &amp;&amp; rpayload.bzdtls.bzdtlsbz.cobz=='PRO' &amp;&amp; as.isasg &amp;&amp; as.isasg =='Y') ||
                                            ( clrPayload &amp;&amp; ['CLR','DCL','VAE'].indexOf(clrPayload.rgdtls.aplst) &lt; 0)">
                                    
                                    <!----><div class="col-xs-12 col-sm-8" data-ng-if="!clrPayload &amp;&amp; !as.isNewSignatoryDetailsAfterSCN &amp;&amp; (!as.dcupdtls || as.dcupdtls.length == 0 || !(checkArrayElement(as.dcupdtls, 'LOAU', 'ty',true)
                            || checkArrayElement(as.dcupdtls, 'CRBC', 'ty',true) || checkArrayElement(as.dcupdtls, 'CPPT', 'ty',true) || 
                            checkArrayElement(as.dcupdtls, 'CPVD', 'ty',true) || checkArrayElement(as.dcupdtls, 'NMEA', 'ty', true) ||
                            checkArrayElement(as.dcupdtls, 'RESP', 'ty', true) || checkArrayElement(as.dcupdtls, 'POAY', 'ty', true)
                            || checkArrayElement(as.dcupdtls, 'CPAN', 'ty', true) || checkArrayElement(as.dcupdtls, 'OTHD', 'ty', true) 
                            || checkArrayElement(as.dcupdtls, 'OTSD', 'ty', true)))">
                                        <label class="reg m-cir" for="as_upload_sign2" data-ng-bind="trans.LBL_DOC_AUTH_SIG"> Proof of details of authorized signatory</label>
                                        <select class="form-control ng-pristine ng-valid ng-empty ng-touched" data-ng-model="as.up_type" name="as_up_type" id="as_up_type" data-ng-disabled="clrPayload">
                                            <option value="">Select</option>
                                            <!----><option data-ng-repeat="doc in docTypes" value="LOAU" data-ng-bind="doc.n">Letter of Authorisation</option><!----><option data-ng-repeat="doc in docTypes" value="CRBC" data-ng-bind="doc.n">Copy of resolution passed by BoD / Managing Committee</option><!---->
                                        </select>
                                        <p class="err" data-ng-bind="errors.docerr"></p>
                                        <span class="help-block">
                                    <p class="help-block">
                                        <i class="fa fa-info-circle"></i> 
                                        <span data-ng-bind="trans.HLP_FILE_FORM">File with PDF or JPEG format is only allowed.</span>
                                        </p>
                                        <p class="help-block">
                                            <i class="fa fa-info-circle"></i>
                                            <span data-ng-bind="trans.HLP_MAX_FILE_SIZE">Maximum file size for upload is </span>1 MB
                                        </p>
                                        </span>
            
                                        <data-file-model data-id="as_upload_sign" data-name="as_upload_sign" data-doc-type="as.up_type" data-ng-model="as.dcupdtls" data-max-files="2" data-mandatory="true" data-appln-id="applnId" class="ng-pristine ng-untouched ng-valid ng-empty">
                                            <!-- <input id="tr_upload" name="tr_upload" type="file" accept=".jpeg,.pdf" data-max-size="5242880"> -->
                                            <input id="as_upload_sign" name="as_upload_sign" type="file" accept=".jpeg,.pdf" data-max-size="1048576">
                                            <p class="err" data-ng-bind="errVar"></p><div class="progress ng-hide" data-ng-show="uploading"><div class="progress-bar" ng-class="{&quot;progress-bar-danger&quot; : uploadFailed, &quot;progress-bar-success&quot; : uploadSuccess}" role="progressbar" style="width:"></div></div><!----></data-file-model>
                                        <!----><span data-ng-if="!(rpayload.bzdtls.bzdtlsbz.cobz &amp;&amp; rpayload.bzdtls.bzdtlsbz.cobz=='PRO' &amp;&amp; as.isasg &amp;&amp; as.isasg =='Y')">
                                        <!---->
                                    </span><!---->
                                    </div><!---->
                                    <!---->
                                </fieldset>
            
                                <!----><div class="col-sm-8 col-xs-12" data-ng-if="!clrPayload &amp;&amp; !as.isNewSignatoryDetailsAfterSCN &amp;&amp; (!as.dcupdtls || as.dcupdtls.length == 0 || !checkArrayElement(as.dcupdtls, 'PHOT', 'ty', true))">
                                    <label class="reg m-cir" for="as_upload_photo2"><span data-ng-bind="trans.LBL_PER_PHOTO">Upload Photograph (of person whose information has been given above)</span></label>
                                    <span class="help-block">
                                   <p class="help-block">
                                    <i class="fa fa-info-circle"></i> 
                                    <span data-ng-bind="trans.HLP_FILE_PHOTO_FORM">Only JPEG file format is allowed</span>
                                    </p>
                                    <p class="help-block">
                                        <i class="fa fa-info-circle"></i>
                                        <span data-ng-bind="trans.HLP_MAX_FILE_SIZE">Maximum file size for upload is </span>100 KB
                                    </p>
                                    </span>
                                    <data-file-model data-id="as_upload_photo" data-name="as_upload_photo" data-doc-type="'PHOT'" data-ng-model="as.dcupdtls" data-max-files="2" data-mandatory="true" data-appln-id="applnId" class="ng-pristine ng-untouched ng-valid ng-empty">
                                        
                                        <input id="as_upload_photo" name="as_upload_photo" type="file" accept=".jpeg" data-max-size="102400">
                                        <p class="err" data-ng-bind="errVar"></p><div class="progress ng-hide" data-ng-show="uploading"><div class="progress-bar" ng-class="{&quot;progress-bar-danger&quot; : uploadFailed, &quot;progress-bar-success&quot; : uploadSuccess}" role="progressbar" style="width:"></div></div><!----></data-file-model>
                                    <!---->
                                    <img ng-src="//static.gst.gov.in/uiassets/images/loading.gif" alt="Loading" id="upload_progress" style="display:none" src="//static.gst.gov.in/uiassets/images/loading.gif">
                                </div><!---->
                                <!----><div class="col-sm-4 col-xs-12" data-ng-if="!clrPayload &amp;&amp; !as.isNewSignatoryDetailsAfterSCN &amp;&amp; (!as.dcupdtls || as.dcupdtls.length == 0 || !checkArrayElement(as.dcupdtls, 'PHOT', 'ty', true))">
                                    <div class="row">
                                        <div class="col-xs-2 selfie-seprator">
                                            <div class="vseparator">
                                                <div class="line"></div>
                                                <div class="wordwrapper">
                                                    <div class="word" data-ng-bind="trans.LBL_OR">OR</div>
                                                </div>
                                            </div>
                                            <div class="hseparator upload" data-ng-bind="trans.LBL_OR">OR</div>
                                        </div>
                                        <div class="col-xs-10">
                                            <data-photo-model id="selfie" name="selfie" data-appl-id="35452861" data-doc-type="PHOT" data-callback="upcamera(resp)"><div class="col-xs-12 text-center"><div class="vsc-controller vsc-nosource"></div><button ng-click="openCamera()" id="takePhoto" title="Take Picture" type="button" class="btn btn-primary" data-ng-if="(videoStreams | numkeys).length  0 &amp;&amp; !captured"><i class="fa fa-camera"></i> Take Picture</button><p data-ng-if="(videoStreams | numkeys).length  0 &amp;&amp; !captured" style="font-size: 12px;"><span class="fa fa-info-circle">
                                            </span>You can use your device camera to take selfie photograph.</p><video id="videoselfie" name="selfie" width="240" height="200" autoplay="" data-ng-show="(videoStreams | numkeys).length &gt; 0 &amp;&amp; !captured" style="display: none;"></video><canvas id="canvasselfie" width="240" height="200" data-ng-show="captured" style="display: none;"></canvas></div><div class="col-xs-12 text-center" id="button-camera-list" style="display: none;"><button class="btn btn-primary" ng-click="captureCamera()" type="button" data-ng-show="!captured &amp;&amp; (videoStreams | numkeys).length &gt; 0">Capture</button><button type="button" ng-click="tryagain()" class="btn btn-primary " data-ng-show="captured">Try Again</button><button type="button" ng-click="upload()" data-ng-show="captured" class="btn btn-primary">Upload</button><p class="err" data-ng-bind="err"></p></div></data-photo-model>
    
                                            <!-- <data-photo-model id="selfie" name="selfie" data-appl-id="27933566" data-doc-type="PHOT" data-callback="authUpcamera(resp)"><div class="col-xs-12 text-center"><div class="vsc-controller vsc-nosource"></div><button ng-click="openCamera()" title="Take Picture" type="button" class="btn btn-primary" data-ng-if="(videoStreams | numkeys).length == 0 &amp;&amp; !captured"><i class="fa fa-camera"></i> Take Picture</button><p data-ng-if="(videoStreams | numkeys).length == 0 &amp;&amp; !captured"><span class="fa fa-info-circle">You can use your device camera to take selfie photograph.</span></p><video id="videoselfie" name="selfie" width="240" height="200" autoplay="" data-ng-show="(videoStreams | numkeys).length > 0 &amp;&amp; !captured" class="ng-hide"></video><canvas id="canvasselfie" width="240" height="200" data-ng-show="captured" class="ng-hide"></canvas></div><div class="col-xs-12 text-center"><button class="btn btn-primary ng-hide" ng-click="captureCamera()" type="button" data-ng-show="!captured &amp;&amp; (videoStreams | numkeys).length > 0">Capture</button><button type="button" ng-click="tryagain()" class="btn btn-primary ng-hide" data-ng-show="captured">Try Again</button><button type="button" ng-click="upload()" data-ng-show="captured" class="btn btn-primary ng-hide">Upload</button><p class="err" data-ng-bind="err"></p></div></data-photo-model> -->
                                        </div>
                                    </div>
                                </div><!---->
                            </div>
                        </div>
                    </div>
                    </fieldset>
            </fieldset>
            <div class="row next-tab-nav">
                
            </div>
            <div class="row next-tab-nav">
                <div class="col-xs-12 text-right">
                     <div class="col-xs-12 text-right">
                    <a title="Back" class="btn btn-default" href="promoter">Back</a>
                    <!-- <a title="Back" class="btn btn-default" data-ng-bind="trans.LBL_BACK" href="/gst/registration/saved-applications/">Back</a> -->
                    <button title="Show List" type="button" class="btn btn-default" onclick="goToList()">Show List</button>
<button type="submit" name="action" value="add_new" class="btn btn-primary">
    Add New
</button>

<button type="submit" name="action" value="save_continue" class="btn btn-primary">
    Save & Continue
</button>
                </div>
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">�</span></button>
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
    <script>
function goToList() {
    window.location.href = "<?= base_url('home/authorized_signatory_list'); ?>";
}
</script>
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
    
          $("#reset-address").click(function() {

        // Clear country dropdown
        $("#id_country").val("");

        // Agar state/district bhi clear karna ho
        $("#id_state").val("");
        $("#id_district").val("");
        $("#id_pin").val("");
         $("#id_city").val("");
        $("#id_locality").val("");
        $("#id_road").val("");
         $("#id_name_of_building").val("");
        $("#id_building_number").val("");
        $("#id_floor_number").val("");
        $("#id_nearby_landmark").val("");

    });

</script>




