
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
                            
                            <p class="apptype" data-ng-if="rpayload.rgdtls.aplty=='APLRG'">New Registration</p>
                        </div>
                        
                    </div>
                    <div class="col-sm-3 col-xs-12 appdue">
                        <p class="lbl" data-ng-bind="trans.LBL_DUE_DATE">Due Date to Complete</p>
                        
                        <p class="date" data-ng-if="!clrPayload" data-ng-bind="rpayload.rgdtls.duedt"> <?php 
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
                        <p class="date" data-ng-bind="pfilled+'%'">0%</p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs responsive r1 reg-tabs" data-ng-class="{'adhr' : rpayload.bkacdtls}">
                <li data-ng-class="statusClass(1)" class="active  incomplete ">
                    <a><span class="navicon business navicon fa fa-light fa-suitcase fa-2x"></span><br> Business <br>Details</a>
                </li>
                <li data-ng-class="statusClass(2)" class=" incomplete ">
                    <a href="/gst/registration/step-2/"><span class="navicon partners navicon fa fa-user-tie fa-2x"></span> <br>Promoter/<br> Partners</a>
                </li>
                <li data-ng-class="statusClass(3)" class=" incomplete ">
                    <a href="/gst/registration/step-3/"><span class="navicon auth-sig navicon fa fa-user-check fa-2x"></span><br>Authorized <br>Signatory</a>
                </li>
                <li data-ng-class="statusClass(4)" class=" incomplete ">
                    <a href="/gst/registration/step-4/"><span class="navicon auth-sig-rep navicon fa fa-user-cog fa-2x"></span> <br>Authorized <br>
                        Representative</a>
                </li>
                <li data-ng-class="statusClass(5)" class=" incomplete ">
                    <a href="/gst/registration/step-5/"><span class="navicon bplace navicon fa fa-map-marker-alt fa-2x"></span> <br>Principal Place <br>of Business</a>
                </li>
                <li data-ng-class="statusClass(6)" class=" incomplete ">
                    <a href="/gst/registration/step-6/"><span class="navicon abplace navicon fa fa-map-marker-alt fa-2x"></span> <br>Additional Places <br>of
                        Business</a>
                </li>
                <li data-ng-class="statusClass(7)" class=" incomplete ">
                    <a href="/gst/registration/step-7/"><span class="navicon goods navicon fa fa-luggage-cart fa-2x"></span><br>Goods and <br> Services</a>
                </li>
                <li data-ng-class="statusClass(8)" data-ng-if="!rpayload.bkacdtls" class=" incomplete ">
                    <a href="/gst/registration/step-8/"><span class="navicon state navicon fa fa-id-card-alt fa-2x"></span> <br>State Specific <br> Information</a>
                </li>
                <li data-ng-class="statusClass(9)" data-ng-if="!rpayload.bkacdtls" class=" incomplete ">
                    <a href="/gst/registration/step-9/"><span class="navicon fa fa-id-card fa-2x"></span> <br>Aadhaar <br>
                        Authentication</a>
                </li>
                <li data-ng-class="statusClass(10)" data-ng-if="!rpayload.bkacdtls" class=" incomplete ">
                    <a href="/gst/registration/step-10/"><span class="navicon declaration fa fa-check-circle fa-2x"></span><br> Verification</a>
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

            <?php echo form_open_multipart('home/save_business_details', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form tabpane ng-pristine ng-valid-pattern ng-valid-maxlength ng-invalid' ,'enctype'=>'multipart/form-data')); ?>
           
            <fieldset data-ng-disabled="(['DFT','VAE'].indexOf(rpayload.rgdtls.aplst) &lt; 0  &amp;&amp; !clrPayload) ||
                                    ( clrPayload &amp;&amp; ['CLR','DCL'].indexOf(clrPayload.rgdtls.aplst) &lt; 0)">
                <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">indicates mandatory fields</p>
                <h4 data-ng-bind="trans.HEAD_BUS_DT_BUS">Details of your Business</h4>
                <div class="tbl-format">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12">
                                <label for="lgnmbzpan" class="reg" data-ng-bind="trans.LBL_NM_BIZ">Legal Name of the
                                    Business</label>
                                <p><strong><?php echo isset($registration->legal_name) ? $registration->legal_name : ''; ?></strong></p>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <label for="bd_pan_num" class="reg" data-ng-bind="trans.LBL_PAN_FF">Permanent Account
                                    Number (PAN)</label>
                                <p><strong><?php echo isset($registration->pan) ? $registration->pan : ''; ?></strong></p>
                            </div>
                            <!-- CR17645 pan date changes start-->
                            <div class="col-sm-4 col-xs-12">
                                <label for="bd_pan_date_num" class="reg" data-ng-bind="trans.LBL_PAN_DATE_CREATION">Date
                                    of Creation of PAN</label>
                                    <!-- Creation date should be 15 years from today -->
                                    <p><strong>Pan date not available</strong></p>
                            </div>
                            <!-- CR17645 pan date changes end-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit &amp;&amp; !newRegForm.trdnm.$valid}">
                                <label for="id_trade_name" class="reg" data-ng-bind="trans.LBL_NM_TRADE">Trade Name </label>
                                <input id="id_trade_name" name="trade_name" data-ng-model="bd.bzdtlsbz.trdnm" class="form-control ng-pristine ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-touched" type="text" maxlength="99" data-ng-pattern="/^[a-zA-Z0-9\_&amp;'\-\.\/\,\}\]\[&quot;&quot;()?@!#%$~*;+= ]{1,99}$/" placeholder="Enter Trade Name" data-ng-change="setPristine('trdnm');newRegForm.trdnm.$setValidity('frsttade',true);setPristine('trdnmsec')" data-ng-blur="tradeChange()" data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.bd.attrDtlsFliClr |  ordinal: 'fieldId' : 'FLD002').length == 0 " autofocus="" fdprocessedid="pjts9o">
                                
                                
                                
                                
                            </div>
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit &amp;&amp; !newRegForm.bd_ConstBuss.$modelValue, 'has-success': bd_submit &amp;&amp; newRegForm.bd_ConstBuss.$modelValue}">
                                <label for="id_consitution_of_business" class="reg m-cir" data-ng-bind="trans.LBL_CNSTUTION_BIZ_REG">Constitution of Business (Select
                                    Appropriate)</label>
                                <select id="id_consitution_of_business" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="consitution_of_business" data-ng-model="bd.bzdtlsbz.cobz" data-ng-disabled="multiReg || (clrPayload &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD001').length==0 &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0)" required="" fdprocessedid="ejmf4l">                                    
                                    <option value="-1">Select</option>
                                    <option value="0">Proprietorship</option>
                                    <option value="1">Partnership</option>
                                    <option value="2">Hindu Undivided Family</option>
                                    <option value="3">Private Limited Company</option>
                                    <option value="4">Public Limited Company</option>
                                    <option value="5">Society/Club/Trust/Association of Persons</option>
                                    <option value="6">Government Department</option>
                                    <option value="7">Public Sector Undertaking</option>
                                    <option value="8">Unlimited Company</option>
                                    <option value="9">Limited Liability Partnership</option>
                                    <option value="10">Local Authority</option>
                                    <option value="11">Statutory Body</option>
                                    <option value="12">Foreign Company</option>
                                    <option value="13">Foreign Limited Liability Partnership</option>
                                    <option value="14">Others</option>
                                </select>
                                
                                
                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- CR21744-Start -->
<div id="trade_name_container">
    <div class="row trade_row">
        <div class="col-sm-5 col-xs-12">
            <label class="reg">Additional Trade Name</label>
            <input type="text" name="additional_trade_name[]" class="form-control" placeholder="Enter Trade Name">
        </div>

        <div class="col-xs-12 col-sm-6">
            <button type="button" class="btn btn-primary addtrade">
                <i class="fa fa-plus"></i> Add
            </button>

            <button type="button" class="btn btn-danger removetrade">
                <i class="fa fa-times"></i> Cancel
            </button>
        </div>
    </div>
</div>
                    
                    <!-- CR21744 -End -->
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12">
                                <label for="bd_states" class="reg">Name of the
                                    State</label>
                                <p><?php 
echo isset($registration->id_state) && isset($states[$registration->id_state]) 
     ? $states[$registration->id_state] 
     : ''; 
?></p>
                                
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <label class="reg m-cir" d for="district">District</label>
                                <!-- <select
                                    class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
                                    name="district" id="id_district" data-ng-model="bd.bzdtlsbz.dst"
                                    data-ng-disabled="clrPayload &amp;&amp; !allowAllFieldsToEdit || (bd.bzdtlsbz.stcd ==='97') &amp;&amp; (!dstFlag)"
                                    data-ng-required="(bd.bzdtlsbz.stcd != '97' &amp;&amp; (rpayload.rgdtls.aplst != 'APV'))"
                                    required="required" fdprocessedid="u09ppr">
                                    <option value="">Select</option>
                                    
                                    
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLCEN"  selected=""  >
                                        Central Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLEAS"  selected=""  >
                                        East Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLNED"  selected=""  >
                                        North East Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLNEW"  selected=""  >
                                        New Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLNRD"  selected=""  >
                                        North Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLNWD"  selected=""  >
                                        North West Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLSED"  selected=""  >
                                        South East Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLSHA"  selected=""  >
                                        Shahdara</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLSOD"  selected=""  >
                                        South Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLSWD"  selected=""  >
                                        South West Delhi</option>
                                    <option data-ng-repeat="district in bd_dst" data-ng-bind="district.n" value="DLWED"  selected=""  >
                                        West Delhi</option>

                                    
                                </select> -->
                                <select class="form-control" name="district" id="id_district" required="required"><option value="">Select</option></select>                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <!--
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12">
                        
                            <label for="bd_sj" class="reg" data-ng-bind="trans.LBL_STAT_JURD"></label>                  
                            <p></p>
                            <p class="err" data-ng-if="errors.statejurdlist" data-ng-bind="errors.statejurdlist"></p>
                        </div>
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error' : bd_submit && !newRegForm.stjdno.$valid,
                                                               'has-success':bd_submit && newRegForm.stjdno.$valid }">
                            <label for="stj" class="reg" data-ng-class="{'m-cir':((bd.bzdtlsbz.stcd && bd.bzdtlsbz.stcd != '97'))}" data-ng-bind="trans.LBL_WARD_SECTOR"></label>
                            <select class="form-control" id="stj" name="stjdno" data-ng-model="bd.bzdtlsbz.sj.stjdno" data-ng-disabled="(clrPayload || (bd.bzdtlsbz.stcd ==='97')) && ((!cjFlag || !rangeFlag || !divFlag) && rpayload.rgdtls.aplst != 'APV') && (!sjFlag)" data-ng-required="(bd.bzdtlsbz.stcd != '97')">
                                <option value="">Select</option>
                                <option data-ng-repeat="sjur in statejurdlist | orderBy:'sjur.n'" data-ng-bind="sjur.n" value=""></option>
                            </select>
                            <p class="err" data-ng-if="bd_submit && newRegForm.stjdno.$error.required" data-ng-bind="trans.ERR_STJUR_REQ"></p>
                            <p class="err" data-ng-if="errors.statejurdlist" data-ng-bind="errors.statejurdlist"></p>
                        </div>
                        
                    </div>
                </div>
                -->
                    <!--
                <div class="row">
                    <div class="inner">
                        <div class="col-xs-12">
                            <h5>
                                <span data-ng-bind="trans.LBL_CNTR_JURD + ' ('"></span>
                                <i class="fa fa-info-circle"></i> <span data-ng-bind="trans.HLP_CENTRE_JURISDICTION_REFER"></span>
                                    <a data-popup="true" title="" href="https://cbec-gst.gov.in/know-your-jurisdiction.html" tabindex="-1">
                                      
                                    <span data-ng-bind="trans.HLP_CENTRE_JURISDICTION_LINK"></span>
                                </a>
                                <span data-ng-bind="trans.HLP_CENTRE_JURISDICTION+ ' )'"></span>
                            </h5>
                        </div>
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit && !newRegForm.comrtcd.$valid,
                                                                   'has-success': bd_submit && newRegForm.comrtcd.$valid}">
                            <label for="comcd" class="reg" data-ng-class="{'m-cir':(rpayload.rgdtls.aplst != 'APV')}" data-ng-bind="trans.LBL_COMMISSIONATE"></label>
                            <select class="form-control" name="comrtcd" id="comcd" data-ng-model="bd.bzdtlsbz.cj.comrtcd" data-ng-change="loadDivisionCode(bd.bzdtlsbz.cj.comrtcd,'bd.bzdtlsbz.cj.divsncd','bd.bzdtlsbz.cj.rangecd')" data-ng-disabled="clrPayload && (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0 && !cjFlag" data-ng-required="(rpayload.rgdtls.aplst != 'APV')">
                                <option value="">Select</option>
                                <option data-ng-repeat="x in commission |  orderBy:'n'" data-ng-bind="x.n" value=""></option>
                            </select> 
                            <p class="err" data-ng-if="bd_submit && newRegForm.comrtcd.$error.required && (rpayload.rgdtls.aplst != 'APV')" data-ng-bind="trans.ERR_COMM_REQ"></p>
                            <p class="err" data-ng-if="!errors.commission && !commission">Loading..</p>
                            <p class="err" data-ng-if="errors.commission && !commission" data-ng-bind="errors.commission"></p>
                        </div>
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit && !newRegForm.divsncd.$valid,
                                                                   'has-success': bd_submit && newRegForm.divsncd.$valid}">
                            <label for="divcd" class="reg" data-ng-class="{'m-cir':(rpayload.rgdtls.aplst != 'APV')}" data-ng-bind="trans.LBL_DIVISION"></label>
                            <select class="form-control" id="divcd" name="divsncd" data-ng-model="bd.bzdtlsbz.cj.divsncd" data-ng-change="loadRangeCode(bd.bzdtlsbz.cj.divsncd,'bd.bzdtlsbz.cj.rangecd')" data-ng-disabled="clrPayload && (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0 && !divFlag" data-ng-required="(rpayload.rgdtls.aplst != 'APV')">
                                <option value="">Select</option>
                                <option data-ng-repeat="x in divsncd" data-ng-bind="x.n" value=""></option>
                            </select>
                            <p class="err" data-ng-if="bd_submit && newRegForm.divsncd.$error.required && (rpayload.rgdtls.aplst != 'APV')" data-ng-bind="trans.ERR_DIV_REQ"></p>
                            <p class="err" data-ng-if="errors.divsncd" data-ng-bind="errors.divsncd"></p>
                        </div>
                        <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit && !newRegForm.rangecd.$valid,
                                                                   'has-success': bd_submit && newRegForm.rangecd.$valid}">
                            <label for="rgcd" class="reg" data-ng-class="{'m-cir':(rpayload.rgdtls.aplst != 'APV')}" data-ng-bind="trans.LBL_RANGE"></label>
                            <select class="form-control" name="rangecd" id="rgcd" data-ng-model="bd.bzdtlsbz.cj.rangecd" data-ng-disabled="clrPayload && (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0 && !rangeFlag" data-ng-required="(rpayload.rgdtls.aplst != 'APV')">
                                <option value="">Select</option>
                                <option data-ng-repeat="x in rangecd" data-ng-bind="x.n" value=""></option>
                            </select>
                            <p class="err" data-ng-if="!errors.rangecd && !rangecd && bd.bzdtlsbz.cj.divsncd">Loading..</p>
                            <p class="err" data-ng-if="bd_submit && newRegForm.rangecd.$error.required && (rpayload.rgdtls.aplst != 'APV')" data-ng-bind="trans.ERR_RANGE_REQ"></p>
                            <p class="err" data-ng-if="errors.rangecd && !rangecd" data-ng-bind="errors.rangecd"></p>
                        </div>
                    </div>
                </div>
                
                -->
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12">
                                <label class="reg" for="casual">
                                    <span class="reg " for="casual " data-ng-bind="trans.LBL_CASUAL_DEALER">Are you
                                        applying for registration as a casual taxable person?</span>
                                    <span>
                                        <i class="fa fa-info-circle" data-toggle="tooltip" title="Casual Dealers cannot opt for composition">
                                        </i>
                                        
                                    </span>
                                </label>
                                <div class="switch round">
                                    <input id="casual" type="checkbox" name="casual" data-ng-model="bd.bzdtlsbz.iscasdl" data-radio-chbx="" 
                                    data-ng-checked="(bd.bzdtlsbz.iscasdl=='Y')?true:false" data-ng-click="isCasual(bd.bzdtlsbz.iscasdl);"
                                    ng-disabled="rpayload.srn || bd.bzdtlsbz.isopcmp=='Y' || (clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0) || rpayload.rgdtls.cpin || (bd.bzdtlsbz.rslibrg=='ISDN') || bd.bzdtlsbz.rslibrg ==='SDEV' || bd.bzdtlsbz.rslibrg ==='SEZU'" class="ng-pristine ng-untouched ng-valid ng-empty">
                                    <label for="casual" title="Casual and Composition cannot be selected together">
                                        <span class="switch-on"><span data-ng-bind="trans.LBL_YES">Yes</span></span>
                                        <span class="switch-off"><span data-ng-bind="trans.LBL_NO">No</span></span>
                                    </label>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="row ">
                        <div class="inner ">
                            <div class="col-sm-6 col-xs-12 ">
                                <label>
                                    <span class="reg " for="as_fname " data-ng-bind="trans.LBL_COMP">Option For
                                        Composition</span>
                                    <span>
                                        <i class="fa fa-info-circle" data-toggle="tooltip" title="Following Taxpayers cannot Opt for Composition Scheme: &lt;br&gt;
                                a.  Casual Taxable person &lt;br&gt;
                                b.  Person opted for ISD Only &lt;br&gt;
                                c.  Another Taxpayer or Application for Registration exists &lt;br&gt;
                                in the system with same PAN but not opted for Composition &lt;br&gt;
                                d.  Reason for Registration is Inter-State supply &lt;br&gt;
                                e.  Reason for Registration is Supplying goods through E-Commerce operator  &lt;br&gt;
                                f.  Person who has not filled any goods in Details of Top 5 Goods dealing in. &lt;br&gt;
                                g.  Reason for Registration is SEZ unit or SEZ Developer. &lt;br&gt;
                                "> </i>
                                    </span>
                                    <!-- Multiple Reg -->
                                    
                                </label>
                                <div class="switch round">
                                    <input id="composition" type="checkbox" name="composition" data-ng-model="bd.bzdtlsbz.isopcmp" data-radio-chbx="" data-ng-checked="(bd.bzdtlsbz.isopcmp=='Y')?true:false " data-ng-click="isComposition(bd.bzdtlsbz.isopcmp)" data-ng-disabled="multiReg || bd.bzdtlsbz.iscasdl=='Y' || bd.bzdtlsbz.rslibrg=== 'ECOM' || bd.bzdtlsbz.rslibrg ==='INSS' || bd.bzdtlsbz.rslibrg ==='ISDN' || bd.bzdtlsbz.rslibrg ==='SDEV' || bd.bzdtlsbz.rslibrg ==='SEZU'|| (clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0) || flagy " class="ng-pristine ng-untouched ng-valid ng-empty">
                                    <label for="composition">
                                        <span class="switch-on"><span>Yes</span></span>
                                        <span class="switch-off"><span>No</span></span>
                                    </label>
                                    
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit &amp;&amp; !newRegForm.bd_rslib.$valid,
                                                                   'has-success': bd_submit &amp;&amp; newRegForm.bd_rslib.$valid}">
                                <label>
                                    <span class="reg m-cir" data-ng-class="{'m-cir':(rpayload.rgdtls.aplst != 'APV')}" for="bd_rsl" data-ng-bind="trans.LBL_RSN_LIBLTY_REG">Reason to obtain
                                        registration</span>
                                    <span>
                                        
                                    </span>
                                </label>
                                <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="id_reason_to_obtain_registration" name="reason_to_obtain_registration" data-ng-model="bd.bzdtlsbz.rslibrg" data-ng-disabled="bd.bzdtlsbz.iscasdl=='Y' || (clrPayload &amp;&amp; !allowAllFieldsToEdit &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0)" data-ng-required="(rpayload.rgdtls.aplst != 'APV')" data-ng-change="resetSez(bd.bzdtlsbz.rslibrg)" required="required" fdprocessedid="dsdgu">
                                    <option value="-1">Select</option>
                                    <option value="0">Crossing the Threshold</option>
                                    <option value="1">Inter-State supply</option>
                                    <option value="2">Liability to pay as recipient of goods or services</option>
                                    <option value="3">Transfer / Succession of business</option>
                                    <option value="4">Death of the Proprietor</option>
                                    <option value="5">De-merger</option>
                                    <option value="6">Change in constitution of business</option>
                                    <option value="7">Merger /Amalgamation</option>
                                    <option value="8">E-Commerce Operator</option>
                                    <option value="9">Selling through e-Commerce portal</option>
                                    <option value="10">Voluntary Basis</option>
                                    <option value="11">Input Service Distributor only</option>
                                    <option value="12">Supplies on behalf of other taxable Person</option>
                                    <option value="13">SEZ Unit</option>
                                    <option value="14">SEZ Developer</option>
                                    <option value="15">Others</option>
                                    <option value="16">Corporate Debtor undergoing the Corporate Insolvency Resolution Process with IRP/RP</option>                                                                
                                </select>
                                
                                
                            </div>
                            
                            
                            <div class="col-sm-4 col-xs-12" data-ng-class="{'has-error': bd_submit &amp;&amp; !newRegForm.bd_cmbz.$valid,
                                                                   'has-success': bd_submit &amp;&amp; newRegForm.bd_cmbz.$valid}">
                                <label class="reg m-cir" data-ng-class="{'m-cir':(rpayload.rgdtls.aplst != 'APV')}" for="id_date_of_commencement_of_business_custom" data-ng-bind="trans.LBL_DT_CMENCMNT_BIZ">Date of commencement of
                                    Business</label>
                                <div class="datepicker-icon input-group">
                                    <span class="input-group-addon" data-ng-bind="trans.LBL_FRM">From</span>
                                    <!-- <input type="text" id="id_date_of_commencement_of_business_custom" name="date_of_commencement_of_business_custom"
                                        class="form-control date-picker ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                        data-datepicker="" data-max-days="0" data-min-years="150"
                                        placeholder="DD/MM/YYYY" required="required"
                                        > -->
                                        <input type="date" name="date_of_commencement_of_business_custom" class="form-control date-picker" required="" id="id_date_of_commencement_of_business_custom">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                                
                                
                                
                                
                                
                                
                            </div>
                            
                            <div class="div_date_on_which_liability_to_register_arises col-sm-4 col-xs-12">
                                <label class="reg m-cir" for="id_date_on_which_liability_to_register_arises_temp" data-ng-bind="trans.LBL_DT_LIBLTY_REG">Date on which
                                    liability to register arises</label>
                                
                                <div class="datepicker-icon input-group">
                                    <input id="id_date_on_which_liability_to_register_arises_temp" name="date_on_which_liability_to_register_arises_temp" type="date" class="form-control date-picker ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="DD/MM/YYYY" data-ng-model="bd.bzdtlsbz.librgdt">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>                                
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="inner"id="existing_registration_section">
                            <h4 class="">
                                Indicate Existing Registrations</h4>
                            <div class="col-xs-12 col-sm-3">
                                <label for="id_existing_registration_type" class="">Type of
                                    Registration</label>
                                <select id="id_existing_registration_type"  class="form-control">
                                    <option value="-1" "="">Select</option>
                                    <option value="0">GSTIN</option>
                                    <option value="1">Temporary ID</option>
                                    <option value="2">Registration Number under Value Added Tax</option>
                                    <option value="3">Central Sales Tax Registration Number</option>
                                    <option value="4">Central Excise Registration Number</option>
                                    <option value="5">Service Tax Registration Number</option>
                                    <option value="6">Importer/Exporter Code Number</option>
                                    <option value="7">Entry Tax Registration Number</option>
                                    <option value="8">Entertainment Tax Registration Number</option>
                                    <option value="9">Hotel And Luxury Tax Registration Number</option>
                                    <option value="10">Corporate Identity Number / Foreign Company Registration Number</option>
                                    <option value="11">Limited Liability Partnership / Foreign Limited Liability Partnership Identification Number
                                    </option>
                                    <option value="12">Registration number under Medicinal and Toilet Preparations (Excise Duties) Act</option>
                                    <option value="13">Registration under Shops and Establishment Act</option>
                                    <option value="14">Others (Please specify)</option>
                                </select>
                                
                            </div>
                            
                            <div class="col-xs-12 col-sm-3">
                                <label for="id_existing_registration_number" class="">Registration
                                    No.</label>
                                <input id="id_existing_registration_number"type="text" class="form-control" placeholder="">
                                
                                
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <label for="id_existing_registration_date_custom" class="">Date of
                                    Registration</label>
                                <div class="datepicker-icon input-group">
                                        <input type="date" class="form-control" id="id_existing_registration_date_custom">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                                
                                
                                
                                
                                
                            </div>
                            <div class="col-xs-12 col-sm-3 pull-right" style="margin-top: 9px;">
                                <button title="Add" name="addexist" class="btn btn-primary-1 btn-primary rowtp-mar" type="button">
                                    <i class="fa fa-plus"></i>
                                    <span class="col-xs-hidden">Add</span>
                                </button>
                                
                                <button title="Cancel" name="addexist" class="btn btn-default rowtp-mar" type="button">
                                    <i class="fa fa-times"></i>
                                    <span class="col-xs-hidden">Cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                         <div id="existing_registration_rows"></div>
                    <div id="details_existing_registration_type_2" style="display:none;">
                        
                          <label for="id_existing_registration_type">Existing Registration Type:</label>
                          
                            <select name="existing_registration_type_2" id="id_existing_registration_type">
                              <option value="-1" selected="">Select</option>
                              <option value="0">GSTIN</option>
                              <option value="1">Temporary ID</option>
                              <option value="2">Registration Number under Value Added Tax</option>
                              <option value="3">Central Sales Tax Registration Number</option>
                              <option value="4">Central Excise Registration Number</option>
                              <option value="5">Service Tax Registration Number</option>
                              <option value="6">Importer/Exporter Code Number</option>
                              <option value="7">Entry Tax Registration Number</option>
                              <option value="8">Entertainment Tax Registration Number</option>
                              <option value="9">Hotel And Luxury Tax Registration Number</option>
                              <option value="10">Corporate Identity Number / Foreign Company Registration Number</option>
                              <option value="11">Limited Liability Partnership / Foreign Limited Liability Partnership Identification Number
                              </option>
                              <option value="12">Registration number under Medicinal and Toilet Preparations (Excise Duties) Act</option>
                              <option value="13">Registration under Shops and Establishment Act</option>
                              <option value="14">Others (Please specify)</option>
                            </select>
                          
                        
                        
                          <label for="id_existing_registration_number">Existing Registration Number:</label>
                          
                            <input type="text" name="existing_registration_number_2" maxlength="200" id="id_existing_registration_number">
                          
                        
                        
                          <label for="id_existing_registration_date_custom">Existing Registration Date:</label>
                          
                            <input type="text" name="existing_registration_date_custom" id="id_existing_registration_date_custom">
                          
                        
                        
                          <label for="id_existing_registration_file_2">Existing registration file 2:</label>
                          
                            <input type="file" name="existing_registration_file_2" id="id_existing_registration_file_2">
                          
                        
                        </div>
                    
                    
                </div>
                <!-- <h4 data-ng-bind="trans.HEAD_DOC_UP" data-ng-if="((cobzDocMapping | ordinal : 'c' : bd.bzdtlsbz.cobz)[0].n).split(',').length > 0"></h4> -->
                <!--  CR-17296 changes (start) -->
                
                <h4 class="doc" style="display: none;">Document Upload</h4>
                
                
                <!--  CR-17296 changes (end) -->
                <div class="tbl-format doc" style="display: none;" data-ng-if="((cobzDocMapping | ordinal : 'c' : bd.bzdtlsbz.cobz)[0].n).split(',').length &gt; 0 || (bd.bzdtlsbz.trdnm || checkArrayElement(bd.bzdtlsbz.dcupdtls, 'SDTN', 'ty', true))">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-8 col-xs-12">
                                
                                
                            </div>
                           
                        </div>
                    </div>
                    
                </div>
                
                <!-- CR21744-Start-Document upload -->
                <div class="tbl-format doc" style="display: none;" data-ng-if="!clrPayload &amp;&amp; bd.bzdtlsbz &amp;&amp; bd.bzdtlsbz.trdnm &amp;&amp; (!bd.bzdtlsbz.dcupdtls || bd.bzdtlsbz.dcupdtls.length == 0 ||(bd.bzdtlsbz.trdnm &amp;&amp; !checkArrayElement(bd.bzdtlsbz.dcupdtls, 'SDTN', 'ty', true)))">
                    <fieldset data-ng-disabled="clrPayload">
                        <div class="row">
                            <div class="inner">
                                <div class="col-sm-6 col-xs-12">
                                    <label class="reg"><span>Document for Trade Name</span></label>
                                    <!--data-ng-bind="trans.LBL_PER_PHOTO"-->
                                    <span class="help-block">
                                        <p class="help-block">
                                            <i class="fa fa-info-circle"></i>
                                            <span data-ng-bind="trans.HLP_FILE_FORM">File with PDF or JPEG format is only
                                                allowed.</span>
                                        </p>
                                        <p class="help-block">
                                            <i class="fa fa-info-circle"></i>
                                            <span data-ng-bind="trans.HLP_MAX_FILE_SIZE">Maximum file size for upload is </span>5 MB
                                        </p>
                                    </span>
                                    <data-file-model data-ng-disabled="clrPayload" data-id="tr_upload" data-name="tr_upload" data-doc-type="'SDTN'" data-ng-model="bd.bzdtlsbz.dcupdtls" data-max-files="3" data-appln-id="applnId" class="ng-pristine ng-untouched ng-valid ng-empty">
                                        <input id="tr_upload" name="tr_upload" type="file" accept=".jpeg,.pdf" data-max-size="5242880">
                                        <p class="err" data-ng-bind="errVar"></p>
                                        <div class="progress ng-hide" data-ng-show="uploading">
                                            <div class="progress-bar" ng-class="{&quot;progress-bar-danger&quot; : uploadFailed, &quot;progress-bar-success&quot; : uploadSuccess}" role="progressbar" style="width:"></div>
                                        </div>
                                    </data-file-model>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                
                
                <!-- CR21744-End-Document upload -->
            </fieldset>
            <div class="row next-tab-nav">
                <div class="col-xs-12 text-right">
                    <button class="btn btn-default" type="button" data-ng-bind="trans.LBL_BACK" onclick="window.location.href='/registration/auth/dashboard'" fdprocessedid="afalaa">Back</button>
                    <button title="Save &amp; Continue" type="submit" class="btn btn-primary" data-ng-if="(['DFT','VAE'].indexOf(rpayload.rgdtls.aplst) &gt;= 0 &amp;&amp; !clrPayload) ||
                                    ( clrPayload &amp;&amp; ['CLR','DCL'].indexOf(clrPayload.rgdtls.aplst) &gt;= 0 &amp;&amp; (allowAllFieldsToEdit || scnDetails.bd)) ||(cjFlag || divFlag || rangeFlag) || (dstFlag || sjFlag)" data-ng-bind="trans.LBL_SAVE_CONTINUE" fdprocessedid="ei8cwl">Save &amp;
                        Continue</button>
                    
                </div>
            </div>
        </form>
        <!-- CR#9636 changes -->
        <div id="compinfo" class="modal fade fade-scale" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog sweet">
                <div class="modal-content">
                    <div class="modal-body">
                        <form name="myForm" class="ng-pristine ng-invalid ng-invalid-required">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 data-ng-bind="trans.LBL_CONFIRMATION">Confirmation</h2>
                                    <p data-ng-bind="trans.COMP_MSG">Manufacturers of the below mentioned commodities
                                        are not allowed to opt for levy of Composition. Kindly confirm that you are not
                                        in the business of manufacturing any or/all of the below mentioned commodities
                                        or else de-select 'Opt for Composition' from your application.</p>
                                </div>
                            </div>
                            
                            <div data-ng-include="'/pages/registration/compinfomsg.html'">
                                <div class="row">
                                    <div class="table-responsive col-xs-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Tariff item, subheading, heading or Chapter</th>
                                                    <th>Description</th>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>2105 00 00</td>
                                                    <td>Ice cream and other edible ice, whether or not containing cocoa.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>2106 90 20</td>
                                                    <td>Pan masala</td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>24</td>
                                                    <td>All goods, i.e. Tobacco and manufactured tobacco substitutes
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>2202 10 10</td>
                                                    <td>Aerated Water</td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>6815</td>
                                                    <td>Fly ash bricks; Fly ash aggregates; Fly ash blocks</td>
                                                </tr>
                                                <tr>
                                                    <td>6.</td>
                                                    <td>6901 00 10 </td>
                                                    <td>Bricks of fossil meals or similar siliceous earths </td>
                                                </tr>
                                                <tr>
                                                    <td>7.</td>
                                                    <td>6904 10 00</td>
                                                    <td>Building bricks </td>
                                                </tr>
                                                <tr>
                                                    <td>8.</td>
                                                    <td>6905 10 00 </td>
                                                    <td>Earthen or roofing tiles</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="checkbox" class="chkbx ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="comp_decl" required="" name="comp_decl" data-ng-model="comp_declr" data-radio-chkbx="" data-ng-checked="(comp_declr=='Y')?true:false">
                                    <label class="reg f_size" for="comp_decl"><span data-ng-bind="trans.COMP_DECL_MSG">Confirmed that I/we am/are not in the
                                            business of manufacturing of any of the commodities mentioned above.</span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" title="CONFIRM" class="btn btn-primary" data-dismiss="modal" data-ng-disabled="myForm.$invalid" data-ng-click="clickConfirm()" disabled="disabled"><span data-ng-bind="trans.LBL_COMP_CONFIRM">CONFIRM</span></button>
                                <button type="button" title="CANCEL" class="btn btn-primary" data-dismiss="modal" data-ng-click="clickCancel()"><span data-ng-bind="trans.LBL_CANCEL_CAPSON">CANCEL</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<script>
$(document).ready(function(){

    $(".btn-primary-1").click(function(){

        var type = $("#id_existing_registration_type").val();
        var typeText = $("#id_existing_registration_type option:selected").text();
        var number = $("#id_existing_registration_number").val();
        var date = $("#id_existing_registration_date_custom").val();

        if(type == "-1" || number == "" || date == ""){
            alert("Please fill all fields");
            return false;
        }

        var newRow = `
        <div class="row appended-row" style="margin-top:10px;">
            <div class="col-sm-3">
                <input type="hidden" name="existing_registration_type[]" value="`+type+`">
                <input type="text" class="form-control" value="`+typeText+`" readonly>
            </div>

            <div class="col-sm-3">
                <input type="hidden" name="existing_registration_number[]" value="`+number+`">
                <input type="text" class="form-control" value="`+number+`" readonly>
            </div>

            <div class="col-sm-3">
                <input type="hidden" name="existing_registration_date_custom[]" value="`+date+`">
                <input type="text" class="form-control" value="`+date+`" readonly>
            </div>

            <div class="col-sm-3">
                <button type="button" class="btn btn-danger removeRow">Remove</button>
            </div>
        </div>`;

        $("#existing_registration_rows").append(newRow);

        // Clear fields
        $("#id_existing_registration_type").val("-1");
        $("#id_existing_registration_number").val("");
        $("#id_existing_registration_date_custom").val("");

    });

    $(document).on("click",".removeRow",function(){
        $(this).closest(".appended-row").remove();
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

var districtDropdown = document.getElementById("id_district");

// loop all states
for (var stateCode in statesAndDistricts) {

    var districts = statesAndDistricts[stateCode];

    // loop districts of each state
    for (var i = 0; i < districts.length; i++) {

        var option = document.createElement("option");
        option.value = districts[i];
        option.text  = districts[i];

        districtDropdown.appendChild(option);
    }
}

$(document).on('click', '.addtrade', function () {

    var html = `
    <div class="row trade_row">
        <div class="col-sm-5 col-xs-12">
            <input type="text" name="additional_trade_name[]" class="form-control" placeholder="Enter Trade Name">
        </div>

        <div class="col-xs-12 col-sm-6">
    <button type="button" class="btn btn-primary addtrade">
        <i class="fa fa-plus"></i> Add
    </button>

    <button type="button" class="btn btn-danger removetrade">
        <i class="fa fa-times"></i> Cancel
    </button>
</div>
    </div>`;

    $('#trade_name_container').append(html);
});

$(document).on('click', '.removetrade', function () {
    $(this).closest('.trade_row').remove();
});
</script>






