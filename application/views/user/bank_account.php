
 <style>
     p.note {
    background: #ffb6c14d;
    border-radius: 4px;
    padding: 12px;
    margin-top:0.7em;
}
 </style>
    
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

    
    <div ng-view="">
        <div data-ng-include="'/pages/registration/newrg/regtabs.html'">
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
                        <p class="date" data-ng-bind="pfilled+'%'">85%</p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs responsive r1 reg-tabs" data-ng-class="{'adhr' : rpayload.bkacdtls}">
                <li data-ng-class="statusClass(1)" class="complete ">
                    <a><span class="navicon business navicon fa fa-light fa-suitcase fa-2x"></span><br> Business <br>Details</a>
                </li>
                <li data-ng-class="statusClass(2)" class=" complete ">
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
                <li class=" active  incomplete ">
                    <a href="/gst/registration/step-9/"><span class="navicon fa fa-id-card fa-2x"></span> <br>Bank <br>
                        Accounts</a>
                </li>
                    <li class=" incomplete ">
                    <a href="/gst/registration/step-10/"><span class="navicon fa fa-id-card fa-2x"></span> <br>Aadhaar <br>
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

           <?php echo form_open_multipart('home/save_bank_account', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form tabpane ng-pristine ng-valid-pattern ng-valid-maxlength ng-invalid' ,'enctype'=>'multipart/form-data')); ?>
           
            <fieldset data-ng-disabled="(['DFT','VAE'].indexOf(rpayload.rgdtls.aplst) &lt; 0  &amp;&amp; !clrPayload) ||
                                    ( clrPayload &amp;&amp; ['CLR','DCL'].indexOf(clrPayload.rgdtls.aplst) &lt; 0)">
                <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">indicates mandatory fields</p>
                <h4 data-ng-bind="trans.HEAD_BUS_DT_BUS">Details of Bank Accounts (s)</h4>
                 
                <div class="tbl-format" >
                     <h4>
                        <i class="fa fa-user"></i>
                        <span data-ng-bind="trans.HEAD_PER_DET">Details of Bank Accounts (s)</span>
                    </h4>
              
                     <div class="row" style="    background-color: #f7f7f7;">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12">
                                <label for="account_number"  class="reg m-cir">Account Number</label>
                                <input id="account_number" name="account_number" class="form-control
                                ng-pristine ng-valid ng-empty ng-valid-pattern ng-valid-maxlength ng-touched" type="text" maxlength="99" 
                                 placeholder="Enter Account Number">
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <label for="id_consitution_of_business"  class="reg m-cir">Type Of Account</label>
                                <select id="id_consitution_of_business" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="type_of_account" data-ng-model="bd.bzdtlsbz.cobz" data-ng-disabled="multiReg || (clrPayload &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD001').length==0 &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0)" required="" fdprocessedid="ejmf4l">                                    
                                    <option value="-1">Select</option>
                                    <option value="Proprietorship">Proprietorship</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Hindu Undivided Family">Hindu Undivided Family</option>
                                    <option value="Private Limited Company">Private Limited Company</option>
                                </select>
                                
                                
                            </div>
                            
                            
                        </div>
                    </div>
                    
           
                    <div class="row">
                        <div class="inner">
                           
                            
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="inner"id="existing_registration_section">
                            <div class="col-xs-12 col-sm-3">
                                <label for="ifsc_code"  class="reg m-cir"> Bank IFSC Code</label>
                                <input id="ifsc_code" name="ifsc_code" type="text" class="form-control" placeholder="Enter Bank IFSC Code">
                            </div>
                              <div class="col-xs-12 col-sm-3" >
                              
<button type="submit" name="" value="" class="btn btn-primary" style="margin-top: 1.8em;">
   Get Address
</button>
                            </div>
                              <div class="col-xs-12 col-sm-3">
                                <p class="note">
                                    i don't know your IFSC?<br>
                                    <a href="#">click</a> here to find your bank
                                </p>
                            </div>
                        </div>
                    </div>
                         <div id="existing_registration_rows"></div>
                 
                 
                    
                    
                </div>
                <!-- <h4 data-ng-bind="trans.HEAD_DOC_UP" data-ng-if="((cobzDocMapping | ordinal : 'c' : bd.bzdtlsbz.cobz)[0].n).split(',').length > 0"></h4> -->
                <!--  CR-17296 changes (start) -->
                
                <h4 class="doc" style="display: none;">Document Upload</h4>
                
                
                <!--  CR-17296 changes (end) -->
                <div class="tbl-format doc" style="display: none;">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-8 col-xs-12">
                                
                                
                            </div>
                           
                        </div>
                    </div>
                    
                </div>
                
                <!-- CR21744-Start-Document upload -->
                
                <h4>
                    <i class="fa fa-cloud-upload"></i>
                    <span data-ng-bind="trans.HEAD_DOC_UP">Document Upload</span>
                </h4>
                <div class="tbl-format doc" style="">
                    <fieldset data-ng-disabled="clrPayload">
                        <div class="row">
                            <div class="inner">
                                   
                                <div class="col-sm-6 col-xs-12">
                                     <label for="proof_of_details_of_bank_account"  class="reg m-cir">Proof of Details of bank Accounts</label>
                                <select id="proof_of_details_of_bank_account" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="proof_of_details_of_bank_account" data-ng-model="bd.bzdtlsbz.cobz" data-ng-disabled="multiReg || (clrPayload &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD001').length==0 &amp;&amp; (scnDetails.bd.attrDtlsFliClr | ordinal: 'fieldId' : 'FLD002').length == 0)" required="" fdprocessedid="ejmf4l">                                    
                                    <option value="">Select</option>
                                    <option value="Proprietorship">Proprietorship</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Hindu Undivided Family">Hindu Undivided Family</option>
                                    <option value="Private Limited Company">Private Limited Company</option>
                                </select>
                                 
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
                                        <input id="pd_upload" name="pd_upload" type="file" accept=".jpeg,.pdf" data-max-size="5242880">
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
                                       <a title="Back" class="btn btn-default" href="state_specific_information">Back</a>
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


<script>
function goToList() {
    window.location.href = "<?= base_url('home/bank_account_list'); ?>";
}
</script>




