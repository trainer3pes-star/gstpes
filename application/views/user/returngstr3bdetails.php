
   
    
 <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row" data-ng-controller="transctrl">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="" href="/gst/dashboard/" data-ng-bind="name">Dashboard</a></li>
                    <!---->
                    <li>
                        <ng-switch on="$last">
                            <!---->
                            <!----><span ng-switch-default=""><a href="/gst/return/dashboard" data-ng-bind="breadcrumb.n" target="_self">Returns</a></span>
                            <!---->
                        </ng-switch>
                    </li>
                    <!---->
                    <li>
                        <ng-switch on="$last">
                            <!----><span ng-switch-when="true">GSTR3B</span>
                            <!---->
                            <!---->
                        </ng-switch>
                    </li>
                    <!---->
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown" data-ng-bind="selectedLang">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    <!---->
                    <li>
                        <a data-ng-click="selectLang(language.cd)" data-ng-bind="language.nm">English</a>
                    </li>
                    <!---->
                </ul>
            </div>
        </div>
    </div>
    <!---->
    <div data-ng-controller="mainctrl" ng-view="">
        <style>
        .disablePmtTile {
            position: absolute;
            background: #eee;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.5;
            z-index: 100;
            margin: 0 15px;
            cursor: pointer;
        }

        .mt-7per {
            margin-top: 7%;
        }
        </style>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 class="pull-left mar-t-0">GSTR-3B - Monthly Return</h4>
                        <h4 class="pull-right"><span data-ng-if="(showNilQuestionaire || autoCalc2bFlag || validGSTR2BQ3BRetPrd || validInterestRtnPrd) &amp;&amp; showtiles" style="
                                                    margin-top: 1em;
                                                ">
                                <a href="#" data-toggle="modal" ng-click="showNewFacilitation()">Facilitation in filing GSTR-3B</a>
                            </span>
                            <button onclick="window.location.reload(true);" class="btn btn-sm btn-primary btn-circle " data-toggle="tooltip" title="" data-ng-click="refresh()" style="margin-top: 0px;padding: 5px;padding-left: 7px;padding-right: 7px;" data-original-title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </h4>
                        <!-- <h4><a class="pull-right" data-ng-click="refgstr3b()"><i class="fa fa-refresh" aria-hidden="true"></i></a></h4> -->
                    </div>
                </div>
                
                <!--<div name="GSTR3_Submit"></div>-->
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="panel panel-default ret">
                            <div class="panel-body">
                                <p></p>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="reg">GSTIN - 07AASCS2460H1ZO</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="reg">Legal Name - NEERAJ VINOD KAMBLE</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="reg">Status - Not Filed</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- <p class="reg">FY - 2025-26</p> -->
                                        <p class="reg">FY - XXXXX</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- <p class="reg">Return Period - May</p> -->
                                        <p class="reg">Return Period - XXXXX</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- <p class="reg">Due Date - 20/06/2025</p> -->
                                        <p class="reg">Due Date - XXXXX</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-14 col-xs-12">
                            <div class="helpwrap">
                                <div class="bar whiteside">
                                    <h4 class="text-center">Help</h4>
                                    <p>Please click on a box (tile) and enter relevant details therein. Save and click on the next box to enter relevant details. Once you have filled up the information relating to a tile, you will see gross (summary) figures on the tiles. You can view the preview by clicking on Preview button. You can click on Back button to go to previous screen anytime. Data saved by you will not be deleted.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                
                <div data-ng-if="gstr2bLiveFlag &amp;&amp; valid2Brtnprd">
                   <!-- <div class="alert alert-msg alert-danger alert-dismissible mar-t-5 mar-b-5" data-ng-if="autoPoplError &amp;&amp; !invalidRetPrd" data-ng-repeat="d in autoPoplError">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      <i class="fa fa-times"></i>
                      </button>
                      <i class="fa fa-info-circle"></i> <span>You have not filed GSTR-1 of the selected tax period. Please file the same to have auto-drafted liabilities in GSTR-3B from form GSTR-1.</span>
                   </div> -->
                   <!----><!----><!---->
                   <div class="alert alert-msg alert-danger alert-dismissible mar-t-5 mar-b-5" data-ng-if="autoPoplError &amp;&amp; !invalidRetPrd" data-ng-repeat="d in autoPoplError">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      <i class="fa fa-times"></i>
                      </button>
                      <i class="fa fa-info-circle"></i> <span>System has not generated summary of Table 3.1(d) and Table 4 of FORM GSTR-3B  on the basis of your GSTR-2B as same is not generated for the current tax period.</span>
                   </div>
                   <!----><!---->
                   <!----><!----><!----><!----><!---->
                </div>
                                  
                <div id="alert-box-custom"></div>
               
                <div class="alert alert-msg alert-danger ng-hide" data-ng-show="exdLimit_supDetails || exdLimit_supDetails_2b3b || exdLimit_InterState || exdLimit_elgitc || exdLimit_elgitc_4b">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                    </button>
                    <i class="fa fa-warning"></i> 
                    <!---->
                    <span data-ng-if="filing !='NF'">
                        <!---->
                        <span data-ng-if="exdLimit_supDetails || exdLimit_supDetails_2b3b || exdLimit_InterState">
                            For table 3.1 &amp; 3.2 - The information entered by you is at variance with the auto-populated data. The liability has been computed on the basis of the information
                            <!----><span data-ng-if="(exdLimit_supDetails || exdLimit_InterState) &amp;&amp; (!exdLimit_supDetails_2b3b)"> declared by you in your FORM GSTR-1.</span><!---->
                            <!---->
                            <!---->
                            <!----><span data-ng-if="exdLimit_elgitc || exdLimit_elgitc_4b"><br><br></span><!---->
                        </span>
                        <!---->
                        <!---->
                        <span data-ng-if="exdLimit_elgitc || exdLimit_elgitc_4b">
                            For table 4 - The information entered by you is at variance
                            <!---->
                            <!----><span data-ng-if="exdLimit_elgitc &amp;&amp; (!exdLimit_elgitc_4b)"> with the auto-populated data in table 4A.</span><!---->
                            <!----> The input tax credit has been auto-populated on the basis of the GSTR-2B generated for you. <!----><span data-ng-if="exdLimit_elgitc">Also, please note that any variance above 5% of the input tax credit is in contravention to Rule 36(4) of the CGST Rules, 2017. </span><!---->
                        </span>
                        <!---->
                    </span>
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                </div>                
                <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <!----><span class=" pull-left" data-ng-if="gstr2bLiveFlag &amp;&amp; valid2Brtnprd &amp;&amp; summaryTable!=null"><a href="#" data-ng-click="openStatusModal()">Click
                                                    here</a> for system generated summary status for GSTR-3B. </span><!---->
                                <span class="pull-right ret-t-info" style="font-size:small">
                                    <a data-ng-click="helpmanual()">Help Manual</a>
                                </span>
                            </div>
                        </div>                
                <!---->
                <!---->
                <div class="alert alert-msg alert-danger ng-hide" data-ng-show="gstr3bErrorMsg">
                    <button type="button" class="close" data-ng-click="hideAlert()" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                    <i class="fa fa-warning"></i>
                </div>
                <!--<div class="alert alert-msg alert-success" data-ng-show="gstr3bfile">
            <button type="button" class="close" data-ng-click="hideAlert()" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button>
            <i class="fa fa-check-circle"></i> GSTR-3B has been successfully filed with ARN No: <b></b>.
        </div>-->
                
                
                

                
                <div class="card">

                    <div class="row">
                        
                        <div class="col-sm-4 col-xs-12">
                            <a class="gstr3b-link" ng-href="auth/gstr3b/iosup/" data-toggle="tooltip" title="" href="iosup/" data-original-title="Details of Outward Supplies and inward supplies liable to reverse charge">
                                <div class="hd">
                                    <p class="inv">3.1 Tax on outward and reverse charge inward supplies
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Integrated Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Central Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>State/UT Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>CESS</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        
                        <div class="col-sm-4 col-xs-12">
                            <a class="gstr3b-link" ng-href="auth/gstr3b/iosup/" data-toggle="tooltip" title="" data-original-title="Details of Outward Supplies and inward supplies liable to reverse charge">
                                <div class="hd">
                                    <p class="inv">3.1.1 Supplies notified under section 9(5) of the CGST Act, 2017                    
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Integrated Tax</p>
                                            <p class="val">â‚¹0</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Central Tax</p>
                                            <p class="val">â‚¹0</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>State/UT Tax</p>
                                            <p class="val">â‚¹0</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>CESS</p>
                                            <p class="val">â‚¹0</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        
                        <div class="col-sm-4 col-xs-12">
                            <a class="gstr3b-link" ng-href="auth/gstr3b/interstatesupplies/" data-toggle="tooltip" title="" href="interstatesupplies/" data-original-title="Details of inter-State supplies made to unregistered persons, composition taxable persons and UIN holders">
                                <div class="hd">
                                    <p class="inv">3.2 Inter-state supplies
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Taxable Value</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Integrated Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        

                    </div>
                    <div class="row">
                        
                        <div class="col-sm-4 col-xs-12">
                            <a class="gstr3b-link" ng-href="auth/gstr3b/elgITC/" data-toggle="tooltip" title="" href="elgITC/" data-original-title="Eligible ITC">
                                <div class="hd">
                                    <p class="inv">4. Eligible ITC
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Integrated Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Central Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>State/UT Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>CESS</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                                                
                        <div class="col-sm-4 col-xs-12">
                            <a class="gstr3b-link" ng-href="auth/gstr3b/inwardSup/" data-toggle="tooltip" title="" href="inwardSup/" data-original-title="Values of exempt, nil-rated and non-GST inward supplies">
                                <div class="hd">
                                    <p class="inv">5. Exempt, nil and Non GST inward supplies
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Inter-state supplies</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Intra-state supplies</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        
                        <div class="col-sm-4 col-xs-12">
                            <a class="gstr3b-link" ng-href="auth/gstr3b/interestLateFee/" data-toggle="tooltip" title="" href="interestLateFee/" data-original-title="Interest &amp; late fee payable">
                                <div class="hd">
                                    <p class="inv">5.1 Interest and Late fee for previous tax period
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Integrated Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Central Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>State/UT Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>CESS</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
<!--                         <div class="col-sm-4 col-xs-4">
                            <div class="disablePmtTile-duplicate"></div>
                            <a class="gstr3b-link" ng-href="auth/gstr3b/tdsTcsCredit/" data-toggle="tooltip" title="TDS/TCS Credit">
                                <div class="hd">
                                    <p class="inv">7. TDS/TCS Credit
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Integrated Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Central Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>State/UT Tax</p>
                                            <p class="val">â‚¹0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
<!--                         <div class="col-sm-4 col-xs-12">
                            
                            <div ng-class="{'disablePmtTile': (!disable3BSub || !disableAll3BF) }" ng-click="showPmtInformation()" class="disablePmtTile"></div>
                            
                            <a class="gstr3b-link"  id="gstr3b_6_payment_closed"  ng-href="auth/gstr3b/payment/" data-toggle="tooltip" title="Payment of Tax" >
                                <div class="hd">
                                    <p class="inv">6. Payment of tax
                                    </p>
                                </div>
                                <div class="ct">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Balance Liability</p>
                                            <p class="val">â‚¹0.0</p>

                                        </div>
                                        <div class="col-sm-6">
                                            <p>Paid through Cash</p>
                                            <p class="val">â‚¹0.0</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Paid through Credit</p>
                                            <p class="val">â‚¹0.0</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                    </div>
                    <div class="row">

                        <div class="col-sm-12 col-xs-12">
                            <div class="panel panel-primary mt-2per">
                                <div class="panel-heading text-center">Important Message</div>
                                <div class="panel-body">Once you have filled the relevant tables, please follow the following steps for filing:-
                                    <ul>
                                        <li>Please click on 'Save GSTR3B' on the summary page.</li>
                                        <li>You may download and preview/save the draft GSTR-3B.</li>
                                        <li>Click on 'Proceed to payment' to offset your liabilities.</li>
                                        <li>In case of insufficient cash balance to set off the liabilities, challan creation facility has been provided on the same screen.</li>
                                        <li>After setting off liabilities, GSTR-3B can be filed by attaching DSC/EVC.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>
                

<!--                 <div class="row">
                    <div class="inner">
                        
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <input id="checkbox-gstr3b" type="checkbox" class="chkbx ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="dscCheckbox" required="" name="dscCheckbox" data-ng-model="dscCheckbox" data-ng-disabled="filing!='FRZ'" data-ng-click="dsclist()"  disabled="disabled" >
                            <label for="checkbox16"><span data-ng-bind="trans.LBL_DECLARATION_GSTR3B">I/We hereby solemnly affirm and declare that the information given herein above is true and correct to the best of my knowledge and belief and nothing has been concealed therefrom.</span></label>
                        </div>
                        
                    </div>
                </div>
                <div class="row mar-b ng-hide" id="gstr3b-signatory" data-ng-show="dscCheckbox">
                    <div class="inner">
                        <div class="col-xs-12 col-sm-6">
                            <label for="VeriAuth" class="reg m-cir" data-ng-bind="trans.LBL_AUTHORISED_SIGNATORY">Authorised Signatory</label>
                            <select id="gstr3b-signatory-selectbox" name="pandsc" data-ng-model="DscAuth" id="DscAuth" class="form-control mar-t-0 ng-pristine ng-untouched ng-valid ng-empty" data-ng-options="sig.firstName+' '+sig.lastName for sig in asgs" data-ng-disabled="filing!='FRZ'">
                                <option value="" data-ng-bind="trans.HLP_SELCT">Select</option>
                                <option label="Neeraj Vinod Kamble" value=1>NEERAJ VINOD KAMBLE</option>
                            </select>
                        </div>
                    </div>
                </div> -->
<!--                 <div class="row mar-b">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-default" data-ng-click="goToPage('/returns/auth/dashboard')" data-ng-bind="trans.LBL_BACK" onclick="location.href='/gst/return/gstr3b/'">Back</button>
                        
                            
                            <button type="button" class="btn btn-primary bottom-button" ng-click="saveGSTR3B()" data-ng-disabled="disableAll3BF || !showOrgSaveBtn" id="save_gstr3b_button">SAVE GSTR3B</button>
                            
                        <button id="submit-button" type="button" class="btn btn-primary bottom-button" data-ng-disabled="true" data-ng-bind="trans.BTN_SUBMIT"   data-toggle="modal" data-target="#preview_gstr3b_modal" >PREVIEW AND SUBMIT GSTR3B</button>
                        <button id="reset-button" type="button" class="btn btn-primary bottom-button" data-ng-disabled="true" data-ng-bind="trans.BTN_SUBMIT"   onclick="location.href='/gst/return/gstr3b/retry/'" >RESET</button>
                        
                        <button id="file_gstr3b_dsc" type="button" class="btn btn-primary bottom-button" data-ng-disabled="true" data-ng-bind="trans.BTN_FILE_GSTR_3B" disabled="disabled">File GSTR-3B with DSC</button>
                        <button id="file_gstr3b_evc" type="button" class="btn btn-primary bottom-button" data-ng-disabled="true" data-ng-bind="trans.BTN_FILE_EVC_GSTR3B" disabled="disabled">File GSTR-3B with EVC</button>
                    </div>
                </div> -->
                </div>
                <div class="row mar-b">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-default" data-ng-click="goToPage('/returns/auth/dashboard')" data-ng-bind="trans.LBL_BACK" onclick="location.href='/gst/return/gstr3b/'">Back</button>
                        <button id="payment-button" type="button" class="btn btn-danger bottom-button" ng-click="saveGSTR3B()" data-ng-disabled="disableAll3BF || !showOrgSaveBtn" data-original-title="Click here to download GSTR-3B system generated PDF">SYSTEM GENERATED GSTR-3B</button>
                        
                        <button type="button" class="btn btn-primary bottom-button" ng-click="saveGSTR3B()" data-ng-disabled="disableAll3BF || !showOrgSaveBtn" id="save_gstr3b_button">SAVE GSTR3B</button>
                        

                        
<!--                         <button type="button" class="btn btn-primary bottom-button" ng-click="saveGSTR3B()" data-ng-disabled="disableAll3BF || !showOrgSaveBtn" disabled="disabled">RESET GSTR3B</button> -->
                        <button id="preview-draft-button" type="button" class="btn btn-primary bottom-button" data-ng-disabled="true" data-ng-bind="trans.BTN_SUBMIT" onclick="location.href='/gst/return/gstr3b/preview-draft/'" disabled="disabled">PREVIEW DRAFT GSTR3B</button>
                        <button id="payment-button" type="button" class="btn btn-primary bottom-button" data-ng-disabled="true" data-ng-bind="trans.BTN_SUBMIT" onclick="location.href='/gst/return/gstr3b/details/payment/new/'">PROCEED TO PAYMENT</button>
                        
                    </div>
                </div>
                <div class="modal fade fade-scale ng-hide" id="EvcModal" role="dialog" data-ng-show="ModalFlag">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button>
                                <h4 class="modal-title" id="EvcModalLabel">Enter One Time Password</h4></div>
                            <p class="alert err  alert-danger ng-hide" id="alertMsg" data-ng-show="alertMsgOtp"></p>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-8 has-success" data-ng-class="{'has-error':reqFlag || notValidOtp,'has-success':!reqFlag || !notValidOtp}">
                                        <label class="reg" for="otp">Your OTP has been sent to your mobile no and email. Please enter your OTP here</label>
                                        <input name="otp" class="form-control ng-dirty ng-valid-parse ng-valid-required ng-touched ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" autocomplete="off" id="otp" data-ng-model="otp" required="">
                                        <span id="otp-verify-error" class="err ng-hide" data-ng-show="reqFlag || notValidOtp" data-ng-bind="trans.ERR_EVC_OTP">Please enter correct OTP which has been sent to your registered Email ID and Mobile number.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" data-ng-click="validateOtpGSTR3B()" style="margin-top: 0;" id="otp_verify">Verify</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
            </div>
        </div>
    </div>
</div>
<div class="modal" id="preview_gstr3b_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row" style="text-align: center;">
                    <h5 class="col-xs-12"><b>Summary of GSTR-3B(before submission)<div class="pull-right">GSTIN : 07AASCS2460H1ZO</div></b></h5></div>
                <div class="table-responsive">
                    <table class="table tbl inv exp table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Integrated Tax (â‚¹)</th>
                                <th>Central Tax (â‚¹)</th>
                                <th>State/UT Tax (â‚¹)</th>
                                <th>CESS (â‚¹)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Total liability (Other than reverse charge) (as per 3.1a + 3.1b)</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <th>Total liability (Reverse Charge) (as per 3.1d)</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <th>Total Interest (as per 5.1)</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <th>Net ITC available [as per 4(C)]</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="color: red">The above table is the summary of information filled by you in the form. If it is incorrect, please press CANCEL and edit the information in the relevant section of the form.</p>
                <p><b>Once you click CONFIRM &amp; SUBMIT, your GSTR-3B will be submitted and respective liabilities/input credits will be reflected  in the respective ledgers. You will NOT be able to make any further modifications.<b></b></b>
                </p>
            </div>
            <div class="modal-footer"><a class="btn btn-default" data-dismiss="modal" ng-click="cancelcallback()">Cancel</a><a id="submit_gstr3b_button" class="btn btn-primary" ng-click="callback()" target="_blank" style="margin-top: 0;">Proceed</a></div>
        </div>
    </div>
</div>
<!-- <div class="modal"  id="preview_gstr3b_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="m-icon m-warning pulseWarning"><span class="micon-body pulseWarningIns"></span><span class="micon-dot pulseWarningIns"></span></div>
                <h2>Warning</h2>
                <p>Once submitted, no modifications will be allowed. Entries with respect to liabilities and input credits will get reflected in the respective ledgers. Are you sure, you want to Submit?</p>
            </div>
            <div class="modal-footer"><a class="btn btn-default" data-dismiss="modal" ng-click="cancelcallback()">Cancel</a><a id="submit_gstr3b_button" class="btn btn-primary" ng-click="callback()" target="_blank" style="margin-top: 0;">Proceed</a></div>
        </div>
    </div>
</div> -->

<div class="modal" id="filed_gstr3b_modal">
</div>

<div class="modal fade ng-hide" id="newFacilitationModal" role="dialog" data-ng-show="newFacilitationFlag" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="modal-title text-primary text-center">Facilitation in filing GSTR-3B</h4>
                    </div>

                    <p data-ng-bind="trans.DASHBOARD3B_2">The taxpayers who have opted to file GSTR-1 on monthly basis, the following new features are made available:</p>
                    <!---->
                    <!----><ul data-ng-if="valid2Brel2rtnprd">
                        <li><span>The system computed summary of GSTR-3B is available on the basis of filed GSTR-1 and GSTR 2B. It can be downloaded by clicking on 'SYSTEM GENERATED GSTR-3B' button.</span></li>
                        <li><span>The summary is generated for tables 3.1 (a), (b), (c), (e) and table 3.2 from filed GSTR-1.</span></li>
                        <li><span>Table 3.1(d) and 4(A)(1), (3), (4), (5) and 4(B)(2) is auto-drafted based on GSTR-2B.</span></li>
                        <li><span data-ng-bind="trans.DASHBOARD3B_5">The values so auto-drafted may be used to fill in relevant tables in FORM GSTR-3B.</span></li>
                    </ul><!---->
                    <p><b>Note: </b><span>This summary is generated for information and guidance purposes only. Please enter correct values, after due verification.</span></p>
                </div>

            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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

<!--<div class="modal fade fade-scale in" id="statustable" role="dialog" style="display: block; padding-right: 15px;">-->
<div class="modal fade " id="statustable" role="dialog" style="display: block; padding-right: 15px;">
    <div class="modal-dialog" style="width:870px!important;">
        <div class="modal-content" style="width:850px!important;">
            <div class="modal-body">
                        <!----><div>
                            <div class="row" style="margin-left: auto;">
                                <h4>System generated summary for GSTR-3B:</h4>
                            </div>
                        <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table tbl inv table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">
                                                GSTR-3B Table
                                            </th>
                                            <th class="text-center">
                                                Source Form
                                            </th>
                                            <th class="text-center">
                                                Form status
                                            </th>
                                            <th class="text-center">
                                                Summary status
                                            </th>
                                            <th class="text-center">
                                              Advisory
                                            </th>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                3.1(a, b, c, e), 3.2<br>
                                                Liability
                                            </td>
                                            <td class="text-center">
                                                GSTR-1 
                                               
                                            </td>
                                            
                                            <td  class="table-danger text-center status">
                                                Not Filed
                                            </td>
                                            <td class="table-danger text-center summary">
                                                No
                                            </td>
                                            <td rowspan="3" class="wid40">
                                            System has not generated summary of Table 3.1 (a, b, c, e) and Table 3.2 of FORM GSTR-3B based on your GSTR-1 as it is not filed by you for the current return period. System has not generated summary of Table 3.1(d) and Table 4 of FORM GSTR-3B based on your GSTR-2B generated for the current return period. You may continue to save or file your FORM GSTR-3B. If error persists, quote error number &lt;RT-R2BR3B-1108&gt; when you contact customer care for quick resolution.
                                            </td>
                                            

                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                3.1(d)<br>
                                                Reverse Charge
                                            </td>
                                            <td class="text-center">
                                                GSTR-2B
                                              
                                            </td>
                                            
                                            <td  class="table-danger text-center status">
                                                Not Generated
                                            </td>
                                            <td  class="table-danger text-center summary">
                                                No
                                            </td>
                                            

                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                4A(1, 3, 4, 5), 4B(2)<br>
                                                Input Tax Credit
                                            </td>
                                            <td class="text-center">
                                                GSTR-2B
                                              
                                            </td>
                                            
                                            <td class="table-danger text-center status">
                                                Not Generated
                                            </td>
                                            <td class="table-danger text-center summary">
                                                No
                                            </td>
                                            

                                        </tr>
                                      
                                    </tbody>

                                </table>
                            </div>
                        <div class="pull-right" style="display: block; padding: 0%;">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >CLOSE</button>

                        </div>
                        </div>
                    </div>
                </div><!---->   
            </div>
        </div>
    </div>
</div>


