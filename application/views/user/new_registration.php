<!DOCTYPE html><html lang="en"><head>
    
    
<style type="text/css">

</style>

</head>
<body>
   
   

     
    
    <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row" data-ng-controller="transctrl" data-ng-init="init('registration')">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Home">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="" href="/" data-ng-bind="name">Home</a></li><!---->
                    <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <!----><span ng-switch-when="true">Registration</span><!----> <!----> </ng-switch></li><!---->
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown" data-ng-bind="selectedLang">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    <!---->
                    <li data-ng-repeat="language in languages">
                        <a data-ng-click="selectLang(language.cd)" data-ng-bind="language.nm">English</a>
                    </li><!---->
                </ul>
            </div>
        </div>
    </div>
    <div class="content-pane" style="min-height: 354px;">
        <!-- <div class="form-1">
            <tr>
    <th><label for="id_type_of_taxpayer">Type of Taxpayer:</label></th>
    <td>
      
      <select name="type_of_taxpayer" id="id_type_of_taxpayer">
  <option value="0" selected>Not Specified</option>

  <option value="1">Taxpayer</option>

  <option value="2">Tax Deductor</option>

  <option value="3">Tax Collector (e-Commerce)</option>

  <option value="4">GST Practitioner</option>

  <option value="5">Non Resident Taxable Person</option>

  <option value="6">United Nation Body</option>

  <option value="7">Consulate or Embassy of Foreign Country</option>

  <option value="8">Other Notified Person</option>

  <option value="9">Non-Resident Online Services Provider</option>

</select>
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_state">State:</label></th>
    <td>
      
      <input type="text" name="state" maxlength="200" required id="id_state">
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_district">District:</label></th>
    <td>
      
      <input type="text" name="district" maxlength="200" required id="id_district">
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_legal_name">Name:</label></th>
    <td>
      
      <input type="text" name="legal_name" maxlength="200" required id="id_legal_name">
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_email">Email:</label></th>
    <td>
      
      <input type="text" name="email" maxlength="200" id="id_email">
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_mobile_number">Mobile Number:</label></th>
    <td>
      
      <input type="text" name="mobile_number" maxlength="15" id="id_mobile_number">
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_address">Address:</label></th>
    <td>
      
      <input type="text" name="address" maxlength="1000" id="id_address">
      
      
    </td>
  </tr>

  <tr>
    <th><label for="id_pan">Pan Number of the taxpayer:</label></th>
    <td>
      
      <input type="text" name="pan" maxlength="20" required id="id_pan">
      
      
        
      
    </td>
  </tr>
        </div>
        <div class="form-2">
            <tr>
    <th><label for="id_trn_number">TRN Number:</label></th>
    <td>
      
      <input type="text" name="trn_number" maxlength="20" required id="id_trn_number">
      
      
        
      
    </td>
  </tr>
        </div> -->
        <!---->
        <div ng-view="">
                <div class="row">
                    <div class="col-lg-offset-5 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12">
                        <div class="contain">
                            <ul class="progressbar">
                                <li class="z1 step-on">
                                    <p><span class="circle on-page">1</span><span hidden="" class="circle"></span></p>
                                    <span data-ng-bind="trans.LBL_USRCRED">User Credentials</span>
                                </li>
                                <li class="z2">
                                    <p><span class="circle not-active">2</span><span hidden="" class="circle"></span>
                                    </p>
                                    <span data-ng-bind="trans.LBL_OTP_VERIFY">OTP Verification</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-2 col-md-offset-3 col-md-6 col-sm-8 col-xs-12">
                        <!---->
                        <!---->
                        <!---->
                        <p></p>
                        <h4 data-ng-bind="trans.HEAD_REG_OVERVIEW">New Registration</h4>
                        <hr>
                        <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">indicates mandatory fields</p>
                        <div class="row">
                            <div class="col-xs-12">
                                <fieldset>
                                    <input type="radio" name="typ" id="radionew" data-ng-model="typ" value="N" data-ng-checked="typ=='N'" data-ng-change="checkTrn()" class="ng-pristine ng-valid ng-not-empty ng-valid-parse ng-touched" checked="checked">
                                    <label for="radionew" data-ng-bind="trans.HEAD_REG_OVERVIEW">New
                                        Registration</label>
                                    <input type="radio" name="typ" id="radiotrn" data-ng-model="typ" value="T" data-ng-checked="typ=='T'" data-ng-change="checkTrn()" class="ng-pristine ng-valid ng-not-empty ng-touched">
                                    <label for="radiotrn" data-ng-bind="trans.LBL_TRN">Temporary Reference Number
                                        (TRN)</label>
                                </fieldset>
                            </div>
                        </div>
                        <!---->
                        <!---->
                        <?php echo form_open_multipart('home/save_new_registration', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                            
                            <fieldset id="new-reg" class="" data-ng-if="typ=='N'" style="display: block;">
                                <div class="row">
                                    <div class="col-xs-12" >
                                        <label class="reg m-cir" for="id_type_of_taxpayer" >I am
                                            a</label>
                                       <select id="i_am_a" name="i_am_a" class="form-control">
    <option value="">Select</option>

    <option value="taxpayer">Taxpayer</option>
    <option value="tax_deductor">Tax Deductor</option>
    <option value="tax_collector(e-commerce)">Tax Collector (e-Commerce)</option>
    <option value="gst_practitioner">GST Practitioner</option>
    <option value="non_resident_taxable_person">Non Resident Taxable Person</option>
    <option value="united_nation_body">United Nation Body</option>
    <option value="consulate_or_embassy_of_foreign_country">Consulate or Embassy of Foreign Country</option>
    <option value="other_notified_person">Other Notified Person</option>
    <option value="non-resident_online_services_provider">Non-Resident Online Services Provider</option>
</select>

                                        <!---->
                                        <!---->
                                    </div>
                                </div>
                                <!--State-->
                                <!---->
                                <div class="row" data-ng-if="plogin.applnType != 'REGOI'">
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.applnState.$invalid, 'has-success': form_submitted &amp;&amp; preg.applnState.$valid}">
                                        <label data-ng-class="plogin.applnType != 'REGOI' ? 'reg m-cir' : 'reg'" for="id_state" data-ng-bind="trans.LBL_STATE_UT" class="reg m-cir">State /
                                            UT</label>
                                       <select id="id_state" name="id_state" class="form-control">
    <option value="">Select State</option>

    <option value="35">Andaman and Nicobar Islands</option>
    <option value="37">Andhra Pradesh</option>
    <option value="12">Arunachal Pradesh</option>
    <option value="18">Assam</option>
    <option value="10">Bihar</option>
    <option value="04">Chandigarh</option>
    <option value="22">Chhattisgarh</option>
    <option value="26">Dadra and Nagar Haveli and Daman and Diu</option>
    <option value="07">Delhi</option>
    <option value="30">Goa</option>
    <option value="24">Gujarat</option>
    <option value="06">Haryana</option>
    <option value="02">Himachal Pradesh</option>
    <option value="01">Jammu and Kashmir</option>
    <option value="20">Jharkhand</option>
    <option value="29">Karnataka</option>
    <option value="32">Kerala</option>
    <option value="38">Ladakh</option>
    <option value="31">Lakshadweep</option>
    <option value="23">Madhya Pradesh</option>
    <option value="27">Maharashtra</option>
    <option value="14">Manipur</option>
    <option value="17">Meghalaya</option>
    <option value="15">Mizoram</option>
    <option value="13">Nagaland</option>
    <option value="21">Odisha</option>
    <option value="97">Other Territory</option>
    <option value="34">Puducherry</option>
    <option value="03">Punjab</option>
    <option value="08">Rajasthan</option>
    <option value="11">Sikkim</option>
    <option value="33">Tamil Nadu</option>
    <option value="36">Telangana</option>
    <option value="16">Tripura</option>
    <option value="09">Uttar Pradesh</option>
    <option value="05">Uttarakhand</option>
    <option value="19">West Bengal</option>
</select>

                                        <!---->
                                        <!---->
                                        <!---->
                                        <!--CR#15249 Changes -->
                                        <!---->

                                    </div>
                                </div><!---->
                                <!--District-->
                                <!---->
                                <div class="row" data-ng-if="plogin.applnType != 'REGOI' &amp;&amp; plogin.applnType != 'APLTC' &amp;&amp; plogin.applnType != 'APLTD' &amp;&amp; !(plogin.applnType == 'APLOT' || plogin.applnType == 'APLUN' || plogin.applnType == 'APLEM')">
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.applnDistr.$invalid, 
                                                        'has-success': form_submitted &amp;&amp; preg.applnDistr.$valid}">
                                        <label class="reg" data-ng-class="{'m-cir':((plogin.stCd &amp;&amp; plogin.stCd != '97'))}" for="id_district" data-ng-bind="trans.LBL_DISTRICT">District</label>
                                        <select class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="district" id="id_district" data-ng-model="plogin.dtCd" data-ng-change="setPristine('applnDistr')" data-ng-required="(plogin.stCd != '97') &amp;&amp; plogin.applnType!='REGOI'" data-ng-disabled="plogin.stCd ==='97' || plogin.applnType=='REGOI'" autofocus="" required="required">
                                            <option value="">Select</option>
                                            <!---->
                                        </select>
                                        <!---->
                                        <!---->
                                    </div>
                                </div><!---->
                                   <!---->
                                <div class="row">
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.lgnmbzpan.$invalid,
                    '			has-success': form_submitted &amp;&amp; preg.lgnmbzpan.$valid}">
                                        <label for="id_legal_name" class="reg m-cir">
                                            <!----><span data-ng-if="(plogin.applnType !== 'APLNR' &amp;&amp; plogin.applnType !== 'RTTR1' &amp;&amp; plogin.applnType !== 'REGOI' &amp;&amp; !((plogin.applnType == 'APLOT' || plogin.applnType == 'APLUN' || plogin.applnType == 'APLEM')))" data-ng-bind="(plogin.applnType !== 'APLTD' &amp;&amp; plogin.applnType !== 'APLTC') ? trans.LBL_NM_BIZ :
                            ((plogin.applnType=='APLTD')? trans.LBL_NM_TDS: trans.LBL_NM_TCS)">Legal Name of the
                                                Business</span><!---->
                                            <!---->
                                            <!-- Start 2398 -->
                                            <!----><span class="help" data-ng-if="(plogin.applnType !== 'APLNR' &amp;&amp; plogin.applnType !== 'RTTR1' &amp;&amp; plogin.applnType !== 'REGOI' &amp;&amp; !(plogin.applnType == 'APLOT' || plogin.applnType == 'APLUN' || plogin.applnType == 'APLEM'))" data-ng-bind="(plogin.pt == 'T') ? trans.LBL_NM_BIZ_TAN_HLP : trans.LBL_NM_BIZ_PAN_HLP">(As
                                                mentioned in PAN)</span><!---->
                                            <!--End 2398 -->
                                            <!---->
                                            <!---->
                                            <!---->
                                            <!---->
                                        </label>

                                        <!---->
                                        <!----><input type="text" name="legal_name" id="id_legal_name" data-ng-change="setPristine('lgnmbzpan')" data-ng-if="(plogin.applnType !== 'APLNR' &amp;&amp; plogin.applnType !== 'RTTR1' &amp;&amp; plogin.applnType !== 'REGOI') &amp;&amp; !(plogin.applnType == 'APLOT' || plogin.applnType == 'APLUN' || plogin.applnType == 'APLEM')" placeholder="Enter Legal Name of Business" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" data-ng-model="plogin.lgBzName" data-ng-pattern="/^[a-zA-Z0-9\_&amp;'\-\.\/\,\}\]\[&quot;&quot;()?@!#%$~*;+= ]{1,99}$/" maxlength="99" autofocus="" required="" data-ng-disabled="disPan"><!---->
                                        <!---->
                                        <!---->
                                        <!---->

                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                </div>
                                <!---->
                                <div class="row" data-ng-if="(plogin.applnType !== 'APLNR')">
                                    <!---->
                                    <!---->
                                    <div class="col-xs-12" data-ng-if="plogin.applnType !== 'REGOI' &amp;&amp; !(plogin.applnType === 'APLUN' || plogin.applnType === 'APLEM' || plogin.applnType === 'APLOT')">
                                        <label class="reg m-cir" for="id_pan" data-ng-bind="(plogin.pt == 'T') ? trans.LBL_TAN_FF : trans.LBL_PAN_FF">Permanent
                                            Account Number (PAN)</label>
                                        <div class="has-feedback" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.pan_card.$invalid, 'has-success': form_submitted &amp;&amp; preg.pan_card.$valid}">
                                            <input class="form-control upper-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" name="pan" id="id_pan" placeholder="Enter Permanent Account Number (PAN)" type="text" maxlength="10" data-ng-pattern="/^[a-zA-Z]{4}[0-9]{5}[a-zA-Z]{1}$/" data-capitalize="toUpperCase" data-ng-change="setPristine('pan_card')" required="">

                                        </div>
                                        <span id="helpBlock" class="help-block" style="display: block;">
                                            <i class="fa fa-info-circle"></i>
                                            <span data-ng-bind="trans.HLP_APPLY_PAN_LINK1">If you don't have PAN, Click</span>
                                            <a class="link" data-popup="true" href="https://tin.tin.nsdl.com/pan/" tabindex="-1"> <span data-ng-bind="trans.HLP_HERE">here</span> </a>
                                            <span data-ng-bind="trans.HLP_TO_APPLY">to apply</span>
                                        </span>
                                        <div id="panHelper" style="display: block;">
                                            <span>Eg:</span>
                                            <!----><span ng-repeat="i in alpha track by $index">
                                                <!----><code class="pan-card-code pan-card-code-1" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^[a-zA-Z]{1}',$index + 1, plogin.id)]" data-ng-bind="i">A</code><!---->
                                                <!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!----><code class="pan-card-code pan-card-code-2" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^[a-zA-Z]{1}',$index + 1, plogin.id)]" data-ng-bind="i">B</code><!---->
                                                <!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!----><code class="pan-card-code pan-card-code-3" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^[a-zA-Z]{1}',$index + 1, plogin.id)]" data-ng-bind="i">C</code><!---->
                                                <!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!----><code class="pan-card-code pan-card-code-4" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^[a-zA-Z]{1}',$index + 1, plogin.id)]" data-ng-bind="i">D</code><!---->
                                                <!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!----><code class="pan-card-code pan-card-code-5" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^[a-zA-Z]{1}',$index + 1, plogin.id)]" data-ng-bind="i">E</code><!---->
                                                <!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!---->
                                                <!----><code class="pan-card-code pan-card-code-6" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^\\d{1}',$index + 1, plogin.id)]" data-ng-bind="i">1</code><!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!---->
                                                <!----><code class="pan-card-code pan-card-code-7" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^\\d{1}',$index + 1, plogin.id)]" data-ng-bind="i">2</code><!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!---->
                                                <!----><code class="pan-card-code pan-card-code-8" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^\\d{1}',$index + 1, plogin.id)]" data-ng-bind="i">3</code><!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!---->
                                                <!----><code class="pan-card-code pan-card-code-9" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^\\d{1}',$index + 1, plogin.id)]" data-ng-bind="i">4</code><!---->
                                            </span><!----><span ng-repeat="i in alpha track by $index">
                                                <!----><code class="pan-card-code pan-card-code-10" data-ng-class="{true:'success', false:'failure', '':''}[isPanCharValid('^[a-zA-Z]{1}',$index + 1, plogin.id)]" data-ng-bind="i">X</code><!---->
                                                <!---->
                                            </span><!---->
                                        </div>                                    
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                    </div><!---->




                                    <!---->

                                </div><!---->
                                <!--<div class="row" data-ng-if="plogin.applnType == 'REGOI'">
                        
                        <div class="col-xs-12" data-ng-class="{'has-error': form_submitted && preg.tin_num.$invalid,
                                                'has-success': form_submitted && preg.tin_num.$valid}">
                                <label class="reg m-cir" for="tin_num"> TIN Number</label>
                                <input class="form-control upper-input" id="tin_num" data-ng-model="plogin.tin" name="tin_num" placeholder="" type="text" maxlength="10" data-ng-pattern="validations.formats.tin" data-ng-disabled="disPan" data-capitalize="" required data-ng-change="setPristine('tin_num')">
                                <p class="err" data-ng-if="form_submitted && preg.tin_num.$error.required" data-ng-bind="trans.ERR_PAN_AUTH_REQ"></p>
                                <p class="err" data-ng-if="form_submitted && preg.tin_num.$error.pattern" data-ng-bind="trans.ERR_INV_CHAR"></p>
                                <span class="err" data-ng-if="errors.message" data-ng-bind="errors.message"></span>
        
                            </div>
                        </div>-->
                                <!---->

                                <div class="row">
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.email.$invalid,
                                                'has-success': form_submitted &amp;&amp; preg.email.$valid}">
                                        <label class="reg m-cir" for="id_email"><span data-ng-bind="(plogin.applnType !== 'APLNR' &amp;&amp; plogin.applnType !== 'REGOI' &amp;&amp; plogin.applnType !== 'APLUN'
                                                    &amp;&amp; plogin.applnType !== 'APLEM' &amp;&amp; plogin.applnType !== 'APLOT' )? trans.LBL_E_ADDR : trans.LBL_E_ADDR_AUTH_SIG">Email
                                                Address</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="ba2"><i class="fa fa-envelope"></i></span>
                                           <input
            type="email"
            id="id_email"
            name="email"
            class="form-control"
            placeholder="Enter Email Address"
            required
            oninput="validateEmail()"
        >
                                        </div>
                                        <span id="email_error" class="text-danger" style="display:none;">
        Enter a valid Email Address
    </span>
                                        <span class="err ng-hide" data-ng-show="form_submitted &amp;&amp; preg.email.$error.required" data-ng-bind="trans.ERR_EMAIL_REQ">Email Address is required</span>
                                        <span class="err ng-hide" data-ng-show="form_submitted &amp;&amp; preg.email.$error.pattern" data-ng-bind="trans.ERR_VALID_EMAIL">Enter valid Email Address</span>
                                        <span class="help-block"><i class="fa fa-info-circle"></i> <span data-ng-bind="trans.HLP_OTP_MAIL_HELP">OTP will be sent to this Email
                                                Address</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.mobile.$invalid, 
                                                'has-success': form_submitted &amp;&amp; preg.mobile.$valid}">
                                        <label data-ng-class="plogin.applnType !== 'REGOI'? 'reg m-cir' : 'reg'" for="id_mobile_number" class="reg m-cir"><span data-ng-bind="(plogin.applnType !== 'APLNR' &amp;&amp; plogin.applnType !== 'REGOI' &amp;&amp; plogin.applnType !== 'APLUN'
                                                    &amp;&amp; plogin.applnType !== 'APLEM' &amp;&amp; plogin.applnType !== 'APLOT')?trans.LBL_MOB_NO : trans.LBL_MOB_NO_AUTH_SIG">Mobile
                                                Number</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="ba">+91</span>
                                          <input
        id="id_mobile_number"
        name="mobile_number"
        type="text"
        class="form-control"
        placeholder="Enter Mobile Number"
        maxlength="10"
        required
        oninput="validateMobile(this)"
        onkeypress="return isNumber(event)"
    >
                                        </div>
                                        <!---->
                                        <!---->
                                        <span class="help-block"><i class="fa fa-info-circle"></i> <span data-ng-bind="trans.HLP_OTP_MOBILE_HELP">Separate OTP will be sent to this
                                                mobile number</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <!---->
                                    <!---->
                                </div>
                                <!---->
                                <!---->
                               
                                <div class="row">
                                    <div class="col-xs-12">
        
                                        <button type="submit" class="btn btn-block btn-primary" name="">Proceed</button>
                                        
                                        <!---->
        
                                    </div>
                                </div>
                            </fieldset><!---->
                        <?php  echo form_close(); ?>
                      
                      
                      
                      
                      
                      
                      
                      
                        <?php echo form_open_multipart('home/save_reference_number', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                            <fieldset id="trn" style="display: none;" data-ng-if="typ=='T'">
                                <div class="row">
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.trn.$invalid, 
                                                        'has-success': form_submitted &amp;&amp; preg.trn.$valid}">
                                        <label class="reg m-cir" for="id_trn_number" data-ng-bind="trans.LBL_TRN">Temporary Reference Number (TRN)</label>
                                        <input class="form-control upper-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" name="trn_number" id="id_trn_number" placeholder="Enter Temporary Reference Number (TRN)" type="text" data-ng-change="setPristine('trn')" maxlength="15" data-ng-pattern="/[0-9]{12}(T|t)(R|r)(N|n)$/" required="">
                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                    <div class="col-xs-12" data-ng-class="{'has-error': form_submitted &amp;&amp; preg.captchatrn.$invalid, 
                                                        'has-success': form_submitted &amp;&amp; preg.captchatrn.$valid}">
                                        <label class="reg m-cir" for="captchatrn" data-ng-bind="trans.LBL_CAPTCHA">Type the characters you see in
                                            the image below</label>
                                        <input class="form-control number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength" id="captchatrn" name="captchatrn" data-ng-model="plogin.captcha" data-ng-change="setPristine('captchatrn')" placeholder="Enter characters as displayed in the CAPTCHA image" data-ng-pattern="/^([0-9]){6}$/" data-ng-minlength="6" maxlength="6" required="">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div data-captcha="" data-captcha-object="captchaObj"><!---->
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <th rowspan="2"><img id="imgCaptcha" ng-src="/services/captcha?rnd=0.14770013329729892" class="captcha" src="../assets/images/captcha.png"></th>
                                                                <th><button type="button" ng-click="play()" ng-disabled="playingCap"><i class="fa fa-volume-up"></i></button></th>
                                                            </tr>
                                                            <tr>
                                                                <td><button type="button" ng-click="refreshCaptcha()" ng-disabled="playingCap"><i class="fa fa-refresh"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="err ng-hide" ng-show="captchaErr" data-ng-bind="captchaErr"></p>
                                                </div>
                                                
                                                <!---->
                                                <!---->
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
        
                                      <button type="submit" class="btn btn-block btn-primary" name="">Proceed</button>
                                        <!---->
        
                                    </div>
                                </div>
                            </fieldset>
                        
                       <?php  echo form_close(); ?>
                        <!-- <div class="row">
                            <div class="col-xs-12">

                                <button type="submit" data-ng-hide="plogin.applnType &amp;&amp; plogin.applnType == 'REGOI' "
                                    class="btn btn-block btn-primary" >Proceed</button>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!--<div class="row" data-ng-if="checksave">
        <div class="col-sm-12">
            <p class="alert alert-danger"> <span data-ng-bind="trans[errors.multiReg]"></span>. <span>Click <a href='auth/dashboard' target="_self">here</a> to go to dashboard</span></p>
        </div>
    </div>-->
            <div class="modal fade bs-example-modal-md" id="popUpOtp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                <div class="modal-dialog modal-md" role="document">

                    <div class="modal-content">

                        <div class="modal-header">



                            <h4 class="modal-title text-center" id="myModalLabel"><strong>NOTE</strong></h4>


                        </div>

                        <div class="modal-body">
                            Information submitted above is subject to online verification before proceeding to fill up
                            Part-B. Mobile number and Email address should be of the Primary Authorized Signatory filing
                            the application.

                        </div>

                        <div class="modal-footer">



                            <button type="button" class="btn btn-primary" data-ng-click="destroyModal()" data-ng-bind="trans.LBL_OK">OK</button>

                        </div>

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

    <style>
    .footer-links {
        list-style-type: none;
        padding-left: 0;
    }
    
    .footer-links li {
        display: block;
        margin-bottom: 8px;
        font-size: 1.2em;
    }
    
    .footer-links a {
        text-decoration: none;
    }
    
    .footer-links a:hover {
        color: #c74718;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    </style>



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

   // When State changes
document.getElementById("id_state").addEventListener("change", function () {
    var stateCode = this.value;
    var districtSelect = document.getElementById("id_district");

    // Clear old districts
    districtSelect.innerHTML = '<option value="">Select District</option>';

    // If districts exist for selected state
    if (statesAndDistricts[stateCode]) {
        statesAndDistricts[stateCode].forEach(function (district) {
            var option = document.createElement("option");
            option.value = district;
            option.text = district;
            districtSelect.appendChild(option);
        });
    }
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
function validateEmail() {
    var email = document.getElementById("id_email").value;
    var error = document.getElementById("email_error");

    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (email === "") {
        error.style.display = "none";
        return;
    }

    if (!emailPattern.test(email)) {
        error.style.display = "block";
    } else {
        error.style.display = "none";
    }
}

function isNumber(evt) {
    var charCode = evt.which ? evt.which : evt.keyCode;
    // Allow backspace, delete
    if (charCode === 8 || charCode === 46) return true;
    // Allow only numbers
    if (charCode < 48 || charCode > 57) return false;
    return true;
}

function validateMobile(input) {
    var error = document.getElementById("mobile_error");
    var mobilePattern = /^[1-9][0-9]{9}$/;

    // Remove non-numeric characters (for paste)
    input.value = input.value.replace(/[^0-9]/g, '');

    if (input.value === "") {
        error.style.display = "none";
        return;
    }

    if (!mobilePattern.test(input.value)) {
        error.style.display = "block";
    } else {
        error.style.display = "none";
    }
}
</script>


<script>
function refreshCaptcha() {
    document.getElementById("captcha_img").src =
        "captcha.php?" + Math.random();
}

function validateCaptcha() {
    var captcha = document.getElementById("captcha_input").value;

    if (captcha.length !== 6) {
        document.getElementById("captcha_error").style.display = "block";
        return false;
    }
    return true;
}
</script>

</body></html>