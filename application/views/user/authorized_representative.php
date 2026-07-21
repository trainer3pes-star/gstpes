
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
                        <p class="date" data-ng-bind="pfilled+'%'">40%</p>
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
                <li data-ng-class="statusClass(4)" class="active  incomplete ">
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
        <?php echo form_open_multipart('home/save_authorized_representative', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form tabpane ng-pristine ng-valid-pattern ng-valid-maxlength ng-invalid' ,'enctype'=>'multipart/form-data')); ?>
            <fieldset>
                <h4 data-ng-bind="trans.LBL_DET_AUTH_REP">Details of Authorized Representative</h4>
                <!----><p data-ng-if="hasTrp" class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">indicates mandatory fields</p><!---->
                <div class="tbl-format">
                    <div class="row">
                        <div class="inner">
                            <div class="col-xs-12">
                                <label class="reg" for="bp_add" data-ng-bind="trans.LBL_HAVE_TRP">Do you have any Authorized Representative?</label>
                                <div class="switch round">
                                    <input id="as_cit_ind" name="as_cit_ind" type="checkbox">
                                    <label for="as_cit_ind">
                                        <span class="switch-on"><span data-ng-bind="trans.LBL_YES">Yes</span></span>
                                        <span class="switch-off"><span data-ng-bind="trans.LBL_NO">No</span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div data-ng-if="hasTrp" id="if-authorized-rep" style="display: none;">
                        <div class="row">
                            <div class="inner">
                                <div class="col-sm-4 col-xs-12"> 
                                        <!--  -->
                                        <legend class="reg">Type of Authorised Representative</legend>
                                        <input type="radio" name="arep_AR" id="trp" data-ng-model="rpayload.arepdtls.typAR" data-ng-checked="rpayload.arepdtls.typAR =='TRP' || !rpayload.arepdtls.typAR" value="TRP" data-radio-chbx="" data-ng-change="clearAuthRep(hasTrp, rpayload.arepdtls.typAR)" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" class="ng-pristine ng-untouched ng-valid ng-not-empty" checked="checked">
                                        <label for="trp">GST Practitioner</label> 
                                        <input type="radio" name="arep_AR" id="othrs" data-ng-model="rpayload.arepdtls.typAR" value="OTHR" data-ng-checked="rpayload.arepdtls.typAR =='OTHR'" data-radio-chbx="" data-ng-change="clearAuthRep(hasTrp, rpayload.arepdtls.typAR);enrolmentId=''" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                                        <label for="othrs">Other</label>
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': gettrprr &amp;&amp; newRegForm.ar_eid.$invalid,
                                                                           'has-success': gettrprr &amp;&amp; newRegForm.ar_eid.$valid}">
                                    <!----><label class="reg m-cir" for="ar_eid" data-ng-bind="trans.LBL_EID" data-ng-if="rpayload.arepdtls.typAR!=='OTHR'">Enrolment ID</label><!---->
                                    <!---->
                                    <fieldset data-ng-disabled="rpayload.arepdtls.typAR=='OTHR'">
                                    <div class="input-group">
                                        <input type="text" name="gst_practitioner_enrollment_id" maxlength="200" class="form-control" id="id_gst_practitioner_enrollment_id">
                                        <!-- <input name="ar_eid" id="ar_eid" type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="Enter Enrolment ID" data-ng-model="enrolmentId" maxlength="15" data-ng-keyup="newRegForm.ar_eid.$setValidity('server_err',true);" data-ng-disabled="(clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0) " autofocus="" data-ng-required="(rpayload.arepdtls.typAR != 'OTHR') &amp;&amp; (rpayload.arepdtls | numkeys).length <= 1" required="required"> -->
                                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" data-ng-click="getAuthRep(enrolmentId,rpayload.arepdtls.typAR)" data-ng-bind="trans.LBL_SEARCH" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0">Search</button>
                                    </span>
                                    </div>
                                    </fieldset>
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                        </div>
                    
                    <fieldset id="main-fieldset" disabled="disabled">
                        <div class="row">
                            <div class="inner">
                                <h5 class="col-sm-12 col-xs-12" data-ng-bind="trans.LBL_PER_NM">Name of Person</h5>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.ar_fname.$invalid,
                                                                       'has-success': enrolerr &amp;&amp; newRegForm.ar_fname.$valid}">
                                    <label class="reg" ng-class="{'m-cir':rpayload.arepdtls.typAR!='TRP'}" for="ar_fname" data-ng-bind="trans.LBL_FRST_NM">First Name</label>
                                    <input type="text" name="first_name" maxlength="200" class="form-control" id="id_first_name">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-valid-required" name="ar_fname" id="ar_fname" ng-model="rpayload.arepdtls.fn" placeholder="Enter First Name" ng-required="rpayload.arepdtls.typAR!='TRP'" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.ar_fname.$setValidity('pattern',true);" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" maxlength="99" data-ng-change="setPristine('ar_fname')"> -->
                                    <!---->
                                    <!---->
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.ar_mname.$invalid,
                                                                       'has-success': enrolerr &amp;&amp; newRegForm.ar_mname.$valid}">
                                    <label class="reg" for="ar_mname" data-ng-bind="trans.LBL_MDL_NM">Middle Name</label>
                                    <input type="text" name="middle_name" maxlength="200" class="form-control" id="id_middle_name">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" name="ar_mname" id="ar_mname" placeholder="Enter Middle Name" ng-model="rpayload.arepdtls.mn" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp;  (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.ar_mname.$setValidity('pattern',true);" data-ng-change="setPristine('ar_mname')" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" maxlength="99"> -->
                                    <!---->
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.ar_lname.$invalid,
                                                                       'has-success': enrolerr &amp;&amp; newRegForm.ar_lname.$valid}">
                                    <label class="reg" for="ar_lname" data-ng-bind="trans.LBL_LST_NM">Last Name</label>
                                    <input type="text" name="last_name" maxlength="200" class="form-control" id="id_last_name">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength" name="ar_lname" placeholder="Enter Last Name" id="ar_lname" ng-model="rpayload.arepdtls.ln" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp;  (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.ar_lname.$setValidity('pattern',true);" data-ng-change="setPristine('ar_lname')" data-ng-pattern="/^[a-zA-Z0-9\_&amp;\'\-\.\/\,()?@!#%$~*;+= ]*[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-\s]{1,99}$/" maxlength="99"> -->
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="inner">
                                <!-- <div class="col-sm-4 col-xs-12">
                            <fieldset>
                                <legend class="reg" data-ng-bind="trans.LBL_STATUS"></legend>
                                <input type="radio" name="arep_Stat" id="CA1" data-ng-model="rpayload.arepdtls.sts"
                                       data-ng-checked="rpayload.arepdtls.sts && rpayload.arepdtls.sts === ('CTA' || 'COS')" data-radio-chbx="" disabled>
                                <label for="CA1" data-ng-bind="trans.LBL_CA_CS_COA"></label>
                                <input type="radio" name="arep_Stat" id="Advocate1" data-ng-model="rpayload.arepdtls.sts"
                                       data-ng-checked="rpayload.arepdtls.sts && rpayload.arepdtls.sts=='LWR'" data-radio-chbx="" disabled>
                                <label for="Advocate1" data-ng-bind="trans.LBL_ADV_GSTPR"></label>
                                <input type="radio" name="arep_Stat" id="Others1" data-ng-model="rpayload.arepdtls.sts"
                                       data-ng-checked="rpayload.arepdtls.sts && rpayload.arepdtls.sts=='TRP'" data-radio-chbx="" disabled>
                                <label for="Others1" data-ng-bind="trans.LBL_TAX_RET_PREP"></label>
                            </fieldset>
                        </div> -->
        
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.ar_des.$invalid, 'has-success': enrolerr &amp;&amp; newRegForm.ar_des.$valid}">
                                    <label class="reg" ng-class="{'m-cir':rpayload.arepdtls.typAR!='TRP'}" for="id_designation">Designation / Status</label>
                                    <select class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" name="designation" id="id_designation" data-ng-model="rpayload.arepdtls.sts" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" ng-required="rpayload.arepdtls.typAR!='TRP'">
                                        <option value="">Select</option>
                                        <option value="cah">Chartered Accountant holding COP</option>
                                        <option value="csh">Company Secretary holding COP</option>
                                        <option value="CTA">Cost Accountant holding COP</option>
                                        <option value="lcip">Lawyer currently licensed to practise</option>
                                        <option value="re">Retired employee of Centre / State Revenue Department</option>
                                        <option value="oth">Others</option>
        
                                    </select>
                                    <!---->                         
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.ar_mbno.$invalid, 'has-success': enrolerr &amp;&amp; newRegForm.ar_mbno.$valid}">
                                    <label for="ar_mbno" class="reg" ng-class="{'m-cir':rpayload.arepdtls.typAR!='TRP'}">
                                        <i class="type-ico fa fa-mobile"></i>
                                        <span data-ng-bind="trans.LBL_MOB_NO">Mobile Number</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">+91</span>
                                        <input type="text" name="mobile_number" maxlength="15" class="form-control" id="id_mobile_number">
                                        <!-- <input class="form-control number ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-valid-required" name="ar_mbno" id="ar_mbno" maxlength="10" placeholder="Enter Mobile Number" ng-model="rpayload.arepdtls.mbno" ng-required="rpayload.arepdtls.typAR!='TRP'" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-change="newRegForm.ar_mbno.$setValidity('pattern',true);" data-ng-pattern="/^([1-9]{1}[0-9]{9})/"> -->
                                    </div>
                                    <!---->
                                    <!---->
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.ar_em.$invalid,
                                                                       'has-success': enrolerr &amp;&amp; newRegForm.ar_em.$valid}">
                                    <label for="ar_em" class="reg">
                                        <i class="fa fa-envelope-open-o"></i>
                                        <span data-ng-bind="trans.LBL_E_ADDR" ng-class="{'m-cir':rpayload.arepdtls.typAR!='TRP'}">Email Address</span>
                                    </label>
                                    <input type="text" name="email" maxlength="200" class="form-control" id="id_email">
                                    <!-- <input class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-valid-required" name="ar_em" id="ar_em" placeholder="Enter Email Address" ng-model="rpayload.arepdtls.em" ng-required="rpayload.arepdtls.typAR!='TRP'" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-change="newRegForm.ar_em.$setValidity('pattern',true);" data-ng-pattern="/^[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/" maxlength="256">                        -->
                                <!---->
                                <!---->
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="inner">
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.pan.$invalid, 'has-success': enrolerr &amp;&amp; newRegForm.pan.$valid }">
                                        <label for="pan" class="reg m-cir" data-ng-bind="trans.LBL_PAN_FF">Permanent Account Number (PAN)</label>
                                        <input type="text" name="pan" maxlength="10" class="form-control" id="id_pan">
                                        <!-- <input id="pan" name="pan" class="form-control upper-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" type="text" placeholder="Enter Permanent Account Number (PAN)" data-ng-model="rpayload.arepdtls.pan.num" data-ng-pattern="/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/" maxlength="10" required="" data-ng-change="setPristine('pan')" data-pan="" data-capitalize="toUpperCase"> -->
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <label class="reg" for="uid" data-ng-bind="trans.LBL_UID_NUM">Aadhaar Number</label>
                                        <span>
                                            <i class="fa fa-info-circle" data-toggle="modal" data-target="#adhrmdar"></i>
                                        </span>
                                        <input name="uid" id="uid" class="form-control number  ng-pristine ng-untouched ng-valid ng-empty" placeholder="Enter Aadhaar Number" data-ng-model="rpayload.arepdtls.uid.num" disabled="">
                                    </div>
                                    
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xs-12">
                                <div data-ng-show="rpayload.arepdtls.uid.num && validations.aadhar(rpayload.arepdtls.uid.num) || errors.isdecl">
                                    <h4 class="m-cir" data-ng-bind="trans.HEAD_DECLARATION"></h4>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 radio-order" data-ng-class="{'has-error' : newRegForm.as_adhar_dec.$invalid && (newRegForm.as_adhar_dec.$dirty || newRegForm.$submitted)}">
                                            <input type="checkbox" id="as_adhar_dec" name="as_adhar_dec" class="chkbx" data-ng-model="rpayload.arepdtls.uid.isdecl" data-ng-required="rpayload.arepdtls.uid.num" data-ng-true-value="'Y'" data-ng-false-value="'N'" data-ng-checked="rpayload.arepdtls.uid.isdecl==='Y'?true:false">
                                            <label for="as_adhar_dec"><span data-ng-bind="trans.HLP_AADHAR_DEC1"></span>  <span data-ng-bind="trans.HLP_AADHAR_DEC2"></span> </label>
                                            <span class="err" data-ng-if="newRegForm.$submitted && newRegForm.as_adhar_dec.$error.required" data-ng-bind="trans.ERR_MAND"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="inner">
                                <div class="col-sm-4 col-xs-12">
                                    <label for="ar_tlphnostd" class="reg">
                                        <i class="type-ico fa fa-phone"></i>
                                        <span data-ng-bind="trans.LBL_TEL_NO">Telephone Number (with STD Code)</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="col-sm-3 col-xs-3 addrow" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.tlphno.$invalid, 'has-success': enrolerr &amp;&amp; newRegForm.tlphno.$valid}">
                                            <input type="text" name="telephone_std" maxlength="4" class="form-control" id="id_telephone_std">
                                            <!-- <input type="text" id="ar_tlphnostd" name="ar_tlphnostd" class="number form-control ng-pristine ng-untouched ng-valid ng-empty" data-ng-model="rpayload.arepdtls.tlphno.stdCd" placeholder="STD " data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.ar_tlphnostd.$setValidity('pattern',true);"> -->
                                        </div>
                                        <div class="col-sm-9 col-xs-9 addrow" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.tlphno.$invalid, 'has-success': enrolerr &amp;&amp; newRegForm.tlphno.$valid}">
                                            <input type="text" name="telephone_number" maxlength="15" class="form-control" id="id_telephone_number">
                                            <!-- <input type="text" id="tlphno" name="tlphno" class="number form-control ng-pristine ng-untouched ng-valid ng-empty" data-ng-model="rpayload.arepdtls.tlphno.telNum" placeholder="Telephone Number" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.tlphno.$setValidity('pattern',true);"> -->
                                        </div>
                                        <!---->
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': enrolerr &amp;&amp; newRegForm.fxno.$invalid, 'has-success': enrolerr &amp;&amp; newRegForm.fxno.$valid}">
                                    <label for="ar_fxno" class="reg">
                                        <i class="type-ico fa fa-fax"></i>
                                        <span data-ng-bind="trans.LBL_FAX_NO">FAX Number (with STD Code)</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="col-sm-3 col-xs-3 addrow">
                                            <input type="text" name="fax_std" maxlength="4" class="form-control" id="id_fax_std">
                                            <!-- <input type="text" id="ar_fxno" name="fxnostd" class="number form-control ng-pristine ng-untouched ng-valid ng-empty" data-ng-model="rpayload.arepdtls.fxno.stdCd" placeholder="STD " data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.fxnostd.$setValidity('pattern',true);"> -->
                                        </div>
                                        <div class="col-sm-9 col-xs-9 addrow">
                                            <input type="text" name="fax_number" maxlength="15" class="form-control" id="id_fax_number">
                                            <!-- <input type="text" id="fxno" name="fxno" class="number form-control ng-pristine ng-untouched ng-valid ng-empty" data-ng-model="rpayload.arepdtls.fxno.fxNum" placeholder="Fax Number" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.ar.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD028').length == 0" data-ng-keyup="newRegForm.fxno.$setValidity('pattern',true);">  -->
                                        </div>
                                        <!---->
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </fieldset>
                    </div><!---->
                </div>
                </fieldset>
                <div class="row next-tab-nav">
                    <div class="col-xs-12 text-right">
                        <a title="Back" class="btn btn-default" href="authorized_signatory">Back</a>
                        <!-- <a title="Back" class="btn btn-default" data-ng-bind="trans.LBL_BACK" href="/gst/registration/saved-applications/">Back</a> -->
                            <!-- <button title="Back" type="button" class="btn btn-default backtab" data-ng-click="back()" data-ng-bind="trans.LBL_BACK">Back</button> -->
                        <!----><button title="Save &amp; Continue" type="submit" class="btn btn-primary nexttab2" data-ng-if="(['VAE','DFT'].indexOf(rpayload.rgdtls.aplst) &gt;= 0 &amp;&amp; !clrPayload) ||
                                        ( clrPayload &amp;&amp; ['CLR','DCL','VAE'].indexOf(clrPayload.rgdtls.aplst) &gt;= 0 &amp;&amp; (allowAllFieldsToEdit || scnDetails.ar))" data-ng-bind="trans.LBL_SAVE_CONTINUE">Save &amp; Continue</button><!---->
                                        <!--Start: Defect fix for 2088-->
                        <!---->
                                        <!--End: Defect fix for 2088-->             
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

</script>





</body></html>