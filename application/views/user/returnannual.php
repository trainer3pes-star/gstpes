
<div class="container py-5">
    <div class="mypage">
        <div class="row" data-ng-controller="transctrl" data-ng-init="init('returns')">
            <div class="col-xs-10">
                <div data-breadcrumb="" name="Dashboard">
                    <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                        <li><a target="" href="/gst/dashboard/new/" data-ng-bind="name">Dashboard</a></li>
                        <!---->
                        <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()">
                            <ng-switch on="$last">
                                <!----><span ng-switch-when="true">Annual Return</span>
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
                        <li data-ng-repeat="language in languages">
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
            .content-pane-returns {
                background-color: white;
                padding: 0px 15px 30px 15px;
            }
    
            .disableTable {
                pointer-events: none;
                background: #eee;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                opacity: 0.5;
                cursor: not-allowed;
            }
    
            .retpad {
                padding-bottom: 195px;
            }
    
            .srchbtn {
                margin-top: 25px;
            }
    
            .helpwrap {
                width: 100%;
                padding: 0px;
            }
    
            .bar {
                float: left;
                width: 100%;
                /* must never add up to more than 100% */
            }
    
            .whiteside {
                background-color: #FFFAF0;
                padding: 10px;
                color: black;
            }
    
            .text-left {
                text-align: left;
            }
            </style>
            <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">�</a><strong></strong> .</div>
            </alert-message>
            <div id="alert" class="alert alert-info" data-ng-if="!formdata.isEnableTile &amp;&amp; !formdata.isAllPerdsFiled &amp;&amp; tile9onlyEnable" data-ng-bind="trans.MSG_PREV_FIL_R9">
            To file your annual return, filing of all GSTR-1 and GSTR-3B returns are mandatory. File your pending GSTR-1/3B return(s) and try again
            </div>
            <!---->
            <!---->
            <!---->
            <!---->
            <!---->
            <div class="content-pane-returns">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 data-ng-bind="trans.LBL_ANNUAL_DASH_HEAD_GSTR9">File Annual Returns</h4>
                        <hr>
                    </div>
                </div>
                <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">Indicates Mandatory Fields</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="finyr" class="reg m-cir" data-ng-bind="trans.LBL_FIN_YR">Financial Year</label>
                            <select id="year-value" class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" name="finyr" data-ng-model="finyr" data-ng-options="item.year for item in years" required="" data-ng-change="clearForms()">
                                <option label="2023-24" value="2023" selected="selected">2023-24</option>
                                <option label="2022-23" value="2023">2022-23</option>
                                <option label="2021-22" value="2022">2021-22</option>
                                <option label="2020-21" value="2021">2020-21</option>
                                <option label="2019-20" value="2019">2019-20</option>
                                <option label="2018-19" value="2018">2018-19</option>
                            </select>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <button id="submit-button" class="btn btn-primary srchbtn" type="submit">Search</button>
                        </div>
                    </div>
                <!---->
                
                <!---->
            </div>
            <!---->
            <div class="card text-center" id="return-detail"><div class="row" data-ng-repeat="y in forms">
        <div class="row ng-hide" data-ng-show="tileBothEnable">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary mt-2per">
                    <div class="panel-body whiteside" style="text-align:left;">
                        <h4 class="text-center" style="font-weight:bold;text-decoration:underline;" data-ng-bind="trans.LBL_HELP">Help</h4>
                        <h5>1.If you have remained under composition for part of the year and normal for remaining part of the year, then both GSTR-9 and GSTR-9A are required to be filed<p><span style="visibility: hidden;">sp</span>for the relevant period.</p></h5>
                        <!-- <h5 data-ng-bind="trans.LBL_HLP_TXT_R9_R9A_2"></h5> -->
                        <h5 data-ng-bind="trans.LBL_HLP_TXT_R9_R9A_3">2.GSTR 9/GSTR 9A can be prepared online and filed online. It can also be prepared on Offline Tool and then uploaded on the Portal and filed.</h5>
                        <h5 data-ng-bind="trans.LBL_HLP_TXT_R9_R9A_4">3.Annual return in form GSTR-9 is required to be filed by every taxpayer registered as normal taxpayer at any time during the relevant financial year.</h5>
                        <h5 data-ng-bind="trans.LBL_HLP_TXT_R9_R9A_5">4.Annual return in form GSTR-9A is required to be filed by every taxpayer if opted composition scheme for any period  during the relevant financial year.</h5>
                        <h5 data-ng-bind="trans.LBL_HLP_TXT_R9_R9A_6">5.All applicable statements in Forms GSTR-1 and returns in Form GSTR 3B of the financial year shall have been filed before filing GSTR-9.</h5>
                        <h5 data-ng-bind="trans.LBL_HLP_TXT_R9_R9A_7">6.All applicable returns in Form GSTR-4 shall have been filed for the relevant financial year before filing  Annual Return in Form GSTR-9A.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-ng-show="tile9onlyEnable &amp;&amp; !tileBothEnable">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary mt-2per">
                    <div class="panel-body whiteside" style="text-align:left;">
                        <h4 class="text-center" style="font-weight:bold;text-decoration:underline;" data-ng-bind="trans.LBL_HELP">Help</h4>
                        <h5>1.<b>�NIL�</b> GSTR-9 RETURN can be filed, if you have </h5>
                        <ul>
                            <li>Not made any outward supply (commonly known as sale); AND</li>
                            <li>Not received any inward supplies (commonly known as purchase) of goods/services; AND</li>
                            <li>No liability of any kind; AND</li>
                            <li>Not claimed any Credit during the Financial Year; AND</li>
                            <li>Not received any order creating demand; AND</li>
                            <li>Not claimed any refund.</li>
                        </ul>
                        <h5><span style="visibility: hidden;">space</span>during the Financial Year</h5>
                        <!-- <h5></h5> -->
                        <h5>2.GSTR-9 can be filed online. It can also be prepared on Offline Tool and then uploaded on the Portal and filed.</h5>
                        <h5>3.Annual return in form GSTR-9 is required to be filed by every taxpayer registered as normal taxpayer during the relevant financial year. </h5>
                        <h5>4.All applicable statements in Forms GSTR-1 and returns in Form GSTR 3B of the financial year shall have been filed before filing GSTR-9.</h5>
                        <h5>5.In case you are required to file GSTR-9C (Reconciliation statement and Certification); shall be enabled on the dashboard post filing of GSTR-9.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ng-hide" data-ng-show="tile9aonlyEnable &amp;&amp; !tileBothEnable">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary mt-2per">
                    <div class="panel-body whiteside" style="text-align:left;">
                        <h4 class="text-center" style="font-weight:bold;text-decoration:underline;" data-ng-bind="trans.LBL_HELP">Help</h4>
                        <h5>Annual return in Form GSTR-9A is required to be filed by every registered taxpayer who has availed composition scheme during the relevant financial year. </h5>
                        <h5>All returns in Form GSTR-4 for the relevant period shall be filed for the relevant financial year before the user can prepare/file Annual Return in form GSTR-9A.</h5>
                        <h5>Annual return in Form GSTR-9A once filed cannot be revised.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            <ol>
                <li class="text-left" data-ng-bind="trans.LBL_HLP_TXT_R9A_DASH_4">Annual return in Form GSTR-9 once filed cannot be revised.</li>
                <li class="text-left">Computation of ITC based on GSTR-2A was auto-populated by the System based on GSTR-1 filed by your corresponding suppliers upto 28/02/2019. Next update of ITC based on GSTR-2A will happen soon. If you have some missing credits in GSTR-2A, you may like to wait till next update. </li>
            </ol>
        </div>
    
        <!---->
        <!---->
        <!---->
        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                <div class="hd">
                    <p class="inv" data-ng-bind="trans[x.return_ty]">Annual Return</p>
                    <p class="inv">GSTR9</p>
                    <!-- data-ng-bind="x.return_ty==='GSTR9A'?'GSTR-9A':x.return_ty" -->
                </div>
            
            <!---->
            <div class="ct" data-ng-if="(x.status==='NF' || x.status==='RTF')">
                <p class="f-wt">Due Date - <span>30/12/2025</span></p>
                <div class="row">
                    <div class="col-sm-5 col-xs-5">
                        <button type="button" class="btn btn-primary offline_btn"  onclick="location.href='returngstr9questionnaire'">PREPARE-ONLINE</button>
                        <!-- data-ng-bind="trans.LBL_ITC01_MSG17" -->
                    </div>
                    <div class="col-sm-5 col-xs-5">
                        <button type="button" class="btn btn-primary offline_btn"  onclick="location.href='gstr9offlineupload'">Prepare Offline</button>
                    </div>
                </div>
            </div>
            <!---->
            <!---->
        </div>
        <!---->
        <!---->
        <!---->
        <!-- <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4 disableTable"> -->
        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4 disableTable">
                <div class="hd">
                    <p class="inv" data-ng-bind="trans[x.return_ty]">Reconciliation Statement</p>
                    <p class="inv">GSTR 9C</p>
                    <!-- data-ng-bind="x.return_ty==='GSTR9A'?'GSTR-9A':x.return_ty" -->
                </div>
            
            <!---->
            <div class="ct" data-ng-if="(x.status==='NF' || x.status==='RTF')">
                <p class="f-wt">Due Date - <span>30/12/2025</span></p>
                <div class="row">
                    <div class="col-sm-5 col-xs-5">
                        <button type="button" class="btn btn-primary offline_btn" data-ng-click="page_rtp(x.return_ty,x.due_dt,x.status)">INITIATE-FILING</button>
                        <!-- data-ng-bind="trans.LBL_ITC01_MSG17" -->
                    </div>
                    <div class="col-sm-5 col-xs-5">
                        <button type="button" class="btn btn-primary offline_btn" data-ng-click="offlinepath(x.return_ty,x.status)" data-ng-bind="trans.LBL_ITC01_MSG18" data-ng-disabled="x.return_ty==='GSTR9'">Prepare Offline</button>
                    </div>
                </div>
            </div>
            <!---->
            <!---->
        </div>
        <!---->
        <!---->
        <!--  <div class="col-sm-4" style="padding:0px !important;float:right;" data-ng-repeat="x in y.returns" data-ng-if="x.return_ty == 'GSTR9A'">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary mt-2per">
                        <div class="panel-body whiteside" style="text-align:left;background-color: #2c4e86;color: white;">
                            <h4 class="text-center" style="color:white;" data-ng-bind="trans.LBL_HELP"></h4>
                            <ul>
                                <li data-ng-bind="trans.LBL_HLP_TXT_R9A_1"></li>
                                <li data-ng-bind="trans.LBL_HLP_TXT_R9A_2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
        <br>
        <div class="col-sm-12 col-xs-12" style="margin-top:20px;" data-ng-show="tile9onlyEnable &amp;&amp; !tileBothEnable">
            <div class="panel panel-primary mt-2per">
                <div class="panel-heading text-center" data-ng-bind="trans.IMP_MESSAGE">Important Message</div>
                <div class="panel-body" style="text-align:left;">
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_23">Prepare Online:-</p>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_25">Steps to be taken:</p>
                    <ul>
                        <li data-ng-bind="trans.LBL_DASH_TXT_26">Click on 'Prepare Online';</li>
                        <li data-bind-unsafe-html="trans.LBL_HLP_TXT_R9A_3"><span>Select from the questionnaire page, whether you wish to file NIL Annual return;</span></li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_4_NEW">You may download the draft system generated GSTR-9, summary of GSTR-1 and summary of GSTR-3B from GSTR-9 dashboard for your reference;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_5_NEW">If number of records/lines are less than or equal to 500 records per table (Table 17 and Table 18), then you may use this facility;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_6_NEW">Fill in the details in different tables and click on �Compute Liabilities�; and</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9_DSC">Click on �Proceed to file� and �File GSTR-9� with DSC/EVC.</li>
                        <li data-ng-bind="trans.LBL_R9R9A_HLP_53_NEW">Additional liability, if any declared in this return can be paid through Form GST DRC-03 by selecting �Annual Return� from the dropdown in the said form. Such liability can be paid only through cash.</li>
                    </ul>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_30">Prepare Offline:-</p>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_HLP_TXT_R9A_5_NEW_BOTH">If number of records/lines either in Table-17 or Table-18 are more than 500 records per table, then you can prepare your return by using the offline utility only and the same can be subsequently uploaded on Common Portal. </p>
                    <p data-ng-bind="trans.LBL_HLP_TXT_R9A_OFFLINE">You can download the GSTR-9 offline tool from the �Downloads� section in the pre-login page on the portal and installed it on your computer.</p>
                    <ul>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_PREPARE_OFFLINE">Click on �Prepare Offline�;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_DOWNLOAD">Click on �Download� to download auto-drafted GSTR-9 details, if any;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_FOLLOW">Follow instructions in �GSTR-9 offline tool� to add details and generate JSON file for upload; and</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_UPLOAD">Click on �Upload� to upload JSON file and file the return with help of instruction available on GSTR-9 dashboard.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 ng-hide" style="margin-top:20px;" data-ng-show="tileBothEnable">
            <div class="panel panel-primary mt-2per">
                <div class="panel-heading text-center" data-ng-bind="trans.IMP_MESSAGE">Important Message</div>
                <div class="panel-body" style="text-align:left;">
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_23">Prepare Online:-</p>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_25">Steps to be taken:</p>
                    <ul>
                        <li data-ng-bind="trans.LBL_DASH_TXT_26">Click on 'Prepare Online';</li>
                        <li data-bind-unsafe-html="trans.LBL_HLP_TXT_R9A_3"><span>Select from the questionnaire page, whether you wish to file NIL Annual return;</span></li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_4_NEW">You may download the draft system generated GSTR-9, summary of GSTR-1 and summary of GSTR-3B from GSTR-9 dashboard for your reference;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_4_ADD">You may download the draft system generated GSTR-9A, summary of GSTR-4 from GSTR-9A dashboard for your reference;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_5_NEW">If number of records/lines are less than or equal to 500 records per table (Table 17 and Table 18), then you may use this facility;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_6_NEW_R9">Fill in the details in different tables and click on �Compute Liabilities�;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_6_ADD">Facility to preview draft (PDF or Excel) can be used to check the details filled up in the tables.</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_7_ADD">Click on �Proceed to file� and �File GSTR-9 or File GSTR-9A� with DSC/EVC;</li>
                        <li data-ng-bind="trans.LBL_R9R9A_HLP_53_NEW">Additional liability, if any declared in this return can be paid through Form GST DRC-03 by selecting �Annual Return� from the dropdown in the said form. Such liability can be paid only through cash.</li>
                    </ul>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_30">Prepare Offline:-</p>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_HLP_TXT_R9A_8_ADD">If number of records/lines are more than 500 records per table in either Table 17 or Table 18, then you can prepare your return by using the offline utility and subsequently upload on GST Common Portal and then file.</p>
                    <p data-ng-bind="trans.LBL_HLP_TXT_R9A_9_ADD">You can download the GSTR-9 or GSTR-9A offline tool from the �Downloads� section in the pre-login page on the Portal and installed it on your computer.</p>
                    <ul>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_PREPARE_OFFLINE">Click on �Prepare Offline�;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_11_ADD">Click on �Download� to download auto-drafted GSTR-9 or GSTR-9A details, if any;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_12_ADD">Follow instructions in �GSTR-9 offline tool� or �GSTR-9A offline tool� to add details and generate JSON file for upload; and</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_13_ADD">Click on �Upload� to upload JSON file and file the return with the help of instructions available on GSTR-9 or GSTR-9A dashboard.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 ng-hide" style="margin-top:20px;" data-ng-show="tile9aonlyEnable &amp;&amp; !tileBothEnable">
            <div class="panel panel-primary mt-2per">
                <div class="panel-heading text-center" data-ng-bind="trans.IMP_MESSAGE">Important Message</div>
                <div class="panel-body" style="text-align:left;">
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_23">Prepare Online:-</p>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_25">Steps to be taken:</p>
                    <ul>
                        <li data-ng-bind="trans.LBL_DASH_TXT_26">Click on 'Prepare Online';</li>
                        <li data-bind-unsafe-html="trans.LBL_HLP_TXT_R9A_3"><span>Select from the questionnaire page, whether you wish to file NIL Annual return;</span></li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_1_NEW_1">You may download the draft of system computed GSTR-9A and summary of GSTR-4 for your reference;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_2_NEW_2">Based on the information available in the System, details have been filled up in different tables. The same can be edited if you intend to change the values.;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_3_NEW_3">Click on Compute Liability; and</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_4_NEW_4">Click on �Proceed to file� and �File GSTR-9A� with DSC/EVC.</li>
                        <li data-ng-bind="trans.LBL_R9R9A_HLP_53">Additional liability, if any declared in this return can be paid through Form GST DRC-03 by selecting �Annual Return� from the dropdown in the said form. Such liability can be paid through cash only.</li>
                    </ul>
                    <p style="font-weight:bold;" data-ng-bind="trans.LBL_DASH_TXT_30">Prepare Offline:-</p>
                    <p data-ng-bind="trans.LBL_HLP_TXT_R9A_9_NEW_9">Download the GSTR-9A offline tool from the �Downloads� section in the pre-login page on the portal.</p>
                    <ul>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_5_NEW_5">Follow instructions in �GSTR-9A offline tool� to add details and generate JSON file for upload;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_6_NEW_6">Click on �Prepare Offline� and then click on �Download� tab to download JSON file to import into the offline tool to auto-populate the system computed details of GSTR-9A.</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_7_NEW_7">Click on �Prepare Offline� and select �Upload� to upload JSON file and file the return with the help of instructions available on GSTR-9A dashboard;</li>
                        <li data-ng-bind="trans.LBL_HLP_TXT_R9A_8_NEW_8">The uploaded file can be downloaded again by clicking on �Prepare Offline� and then click on �Download� tab to download JSON file with the details as updated by you.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!---->
    </div>
    
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Simple animation for the card when page loads
        $(".card").hide().fadeIn(1000);
        
        // Staggered animation for benefit items
        $(".benefit-item").each(function(index) {
            $(this).delay(300 * index).animate({opacity: 1}, 500);
        });
    });
</script>

