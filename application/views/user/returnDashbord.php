
    
    <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <h1>GST Demo Dashboard for GST Return Filing Training</h1>
    <div class="row" data-ng-controller="transctrl" data-ng-init="init('returns')">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="" href="/gst/dashboard/new/" data-ng-bind="name">Dashboard</a></li>
                    <!---->
                    <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()">
                        <ng-switch on="$last">
                            <!----><span ng-switch-when="true">Returns</span>
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
        .offline_btn {
            padding-left: 15px;
            padding-right: 15px;
        }

        .content-pane-returns {
            background-color: white;
            padding: 0px 15px 30px 15px;
        }

        .retpad {
            padding-bottom: 195px;
        }

        .srchbtn {
            margin-top: 25px;
        }
        </style>
        <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
            <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">Ã—</a><strong></strong> .</div>
        </alert-message>
        <form name="dashboard" novalidate="" data-ng-init="finprd()" data-ng-submit="returnPrd(finyr,reqmonth)" class="ng-pristine ng-valid ng-valid-required">
            <div class="content-pane-returns">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>File Returns</h4>
                        <hr>
                    </div>
                </div>
                
<!--                 <marquee class="mark ng-hide" data-ng-if="ret_prd_flag">
                    The dashboard will be made available shortly to the taxpayers who have opted out from the composition scheme by filing intimation in Form GST CMP-04 stating the effective date of withdrawal between 1st July to 30th Sep 2017.
                </marquee>
 -->
                <marquee class="mark" data-ng-if="(!((ret_prd_flag && quarterEditFlag) || gstr2aFlag =='GSTR2A') && (udata.utype =='TP' || udata.utype =='NT')) && servers.GST_RETURNS_R1_URL.substr(2,4) != 'trng'">
                    <!-- <span data-ng-show="gstr2aFlag =='GSTR2A'"> GSTR-2A can now be downloaded in excel/CSV format for your reference and further use. </span> -->
                    <span> Nil return for GSTR-1, GSTR-3B and CMP-08 can now be filed through SMS.</span>
                </marquee>
                 <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">Indicates Mandatory Fields</p>
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <label for="fin" class="reg m-cir" data-ng-bind="trans.LBL_FIN_YR">Financial Year</label>
                        <select id="year-value" name="fin" class="form-control ng-pristine ng-not-empty ng-valid ng-valid-required ng-touched" data-ng-model="finyr" data-ng-options="item.year for item in years" value="item.year" data-ng-change="hidedata()" required="">
                            <option label="2024-25" value="2024">2024-25</option>
                            <option label="2023-24" value="2023">2023-24</option>
                            <option label="2022-23" value="2022">2022-23</option>
                            <option label="2021-22" value="2021">2021-22</option>
                            <option label="2020-21" value="2020">2020-21</option>
                            <option label="2019-20" value="2019">2019-20</option>
                            <option label="2018-19" value="2018">2018-19</option>
                            <option label="2017-18" value="2017">2017-18</option>
                        </select>
                        <span class="err ng-hide" data-ng-show="dashboard.$submitted && dashboard.fin.$error.required" data-ng-bind="trans.ERR_MANDATORY">It is a mandatory field; cannot be left blank.</span>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <label for="mon" class="reg m-cir" data-ng-bind="trans.LBL_RTN_FIL_PRD">Quarter</label>
                        <select id="quarter-value" name="mon" class="form-control ng-pristine ng-not-empty ng-valid ng-valid-required ng-touched" data-ng-model="reqmonth" data-ng-options="item.month for item in reqmonths" value="item.value" required="">
                            <option label="Quarter 1 (Apr - Jun)" value="q1" selected="">Quarter 1 (Apr - Jun)</option>
                            <option label="Quarter 2 (Jul - Sep)" value="q2">Quarter 2 (Jul - Sep)</option>
                            <option label="Quarter 3 (Oct - Dec)" value="q3">Quarter 3 (Oct - Dec)</option>
                            <option label="Quarter 4 (Jan - Mar)" value="q4">Quarter 4 (Jan - Mar)</option>

                        </select>
                        <span class="err ng-hide" data-ng-show="dashboard.$submitted && dashboard.mon.$error.required" data-ng-bind="trans.ERR_MANDATORY">It is a mandatory field; cannot be left blank.</span>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <label for="mon" class="reg m-cir" data-ng-bind="trans.LBL_RTN_FIL_PRD">Period</label>
                        <select id="month-value" name="mon" class="form-control ng-pristine ng-not-empty ng-valid ng-valid-required ng-touched" data-ng-model="reqmonth" data-ng-options="item.month for item in reqmonths" value="item.value" required="">
                            <option label="April" value="4">April</option>
                            <option label="May" value="5">May</option>
                            <option label="June" value="6">June</option>
                        </select>
                        <span class="err ng-hide" data-ng-show="dashboard.$submitted && dashboard.mon.$error.required" data-ng-bind="trans.ERR_MANDATORY">It is a mandatory field; cannot be left blank.</span>
                    </div>
                   <div class="col-sm-3 col-xs-12">
    <button id="submit-button" class="btn btn-primary srchbtn" type="submit">Search</button>
</div>
                </div>
                <!---->
                <div class="row">
                  <div class="col-sm-12 col-xs-12">
                    <p style="background-color:beige">If you are Micro, Small or Medium Enterprise (MSME) <a data-ng-click="openmsme()">Click here</a> to submit your interest for availing Mudra Loan upto 10 Lacs or MSME Loan upto 5 Cr. under respective loan schemes. </p>
                  </div>
                </div>
                <div class="row retpad" data-ng-if="!ret_prd_flag">
                <hr>
<!--                     <div class="col-sm-10" id="notice">
                        <b>Note:</b> If the composition scheme is not applicable to you, please ignore the below message.
                        <br>
                        <div style="margin-left:5%;">
                            Dashboard for filing returns in Form GSTR-4 for the second quarter (July to Sep) is available to:
                            <br>
                            <ul>
                                <li>
                                    The migrated taxpayers who have opted to pay tax under composition scheme by filing intimation in Form GST CMP-01 before 16 August 2017.
                                </li>
                                <li>The taxpayers who have obtained new registration in GST regime and opted to pay tax under composition scheme while filing application in Form GST REG-01
                                </li>
                            </ul>
                            The dashboard will be made available shortly to:
                            <ul>
                                <li>
                                    The taxpayers who have opted out from the composition scheme by filing intimation in Form GST CMP-04 stating the effective date of withdrawal between 1st July to 30th Sep 2017.</li>
                            </ul>
                        </div>
                    </div>
 -->
                 </div>
            </div>
            <!---->
            <!-- <div class="card text-center" id="return-detail">
            </div> -->
        </form>
    </div>
</div>

<div class="card text-center" id="return-detail" style=" display: none;">
    <div class="row" data-ng-repeat="y in user" >
    <div class="alert alert-msg alert-info alert-dismissible mar-t-5 mar-b-5 infoalign" data-ng-if="enableGstr3bQuarterly &amp;&amp; gstr_userType!='CA' &amp;&amp; gstr_userPref =='M' &amp;&amp; disableinfo" style="font-size:14px;">
      <button type="button" class="close" data-ng-click="closefunc('info')">
        <i class="fa fa-times"></i>
      </button>
      <i class="fa fa-info-circle"></i>
      <span>You have selected to file the return on monthly frequency, GSTR-1 and GSTR-3B shall be required to be filed for each month of the quarter.</span>
    </div>
    <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4" data-ng-repeat="x in y.returns">
        <!-- <div > -->
        <div>
            <a>
                <div class="hd">
                    <p class="inv">Details of outward supplies of goods or services</p>
                    <p data-ng-bind="x.return_ty">GSTR1</p>
                </div>
            </a>
            <div class="ct">
                
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        
                            
                            <button type="button" class="btn btn-primary offline_btn smallbutton" onclick="location.href='returngstr1online'">Prepare Online</button>
                            

                        
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        
                            
                            <button type="button" class="btn btn-primary pull-right smallbutton" data-toggle="tooltip" title="" data-original-title="" onclick="location.href='returngstr1offlineupload'">Prepare Offline</button>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>  -->
    </div>
    <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4" data-ng-repeat="x in y.returns">
        <!-- <div > -->
        <div>
            <a>
                <div class="hd">
                    <p class="inv">Auto Drafted details (For view only)</p>
                    <p data-ng-bind="x.return_ty" disabled="">GSTR2A</p>
                </div>
            </a>
            <div class="ct">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="" data-ng-disabled="generate" onclick="location.href='returngstr2aview'">View</button>
                        
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary pull-right" onclick="location.href='returngstr2adownload'">Download</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>  -->
    </div>
    <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4" data-ng-repeat="x in y.returns">
        <!-- <div > -->
        <div>
            <a>
                <div class="hd">
                    <p class="inv">Auto Drafted ITC Statement for the month</p>
                    <p data-ng-bind="x.return_ty" disabled="">GSTR2B</p>
                </div>
            </a>
            <div class="ct">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary"  onclick="location.href='returngstr2bview'">View</button>
                        
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary pull-right" onclick="location.href='returngstr2bview'">Download</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>  -->
    </div> 
    <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4" data-ng-repeat="x in y.returns">
        <!-- <div > -->
        <div>
            <a>
                <div class="hd">
                    <p class="inv">Auto - drafted ITC Statement for the quarter</p>
                    <p data-ng-bind="x.return_ty" disabled="">GSTR2B</p>
                    <p data-ng-if="x.return_ty=='GSTR2BQ'" class="khakhi" data-ng-bind="'Quarterly View'" style="color:khaki;">Quarterly View</p>
                </div>
            </a>
            <div class="ct">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="" data-ng-disabled="generate" onclick="location.href='returngstr2bview'">View</button>
                        
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary pull-right" onclick="location.href='returngstr2bview'">Download</button>
                        
                    </div>
                    <div class="col-sm-12 col-xs-12" style="margin-bottom: 0;">
                        <!--<button type="button" class="btn btn-danger" title="⭐ Premium Feature" onclick="location.href='/gst/opening-balance/'">Change Opening Balance ⭐</button>-->
                        <!--<button type="button" class="btn btn-danger" title="⭐ Premium Feature" onclick="location.href='/gst/upload-gstr2b-file/'">Upload GSTR2B Json File ⭐</button>-->
                        <button type="button" class="btn btn-danger"  onclick="location.href='opening_balance'">Change Opening Balance ⭐</button> 
                        <button type="button" class="btn btn-danger"  onclick="location.href='gst_upload_gstr2b_file'">Uload GSTR2B Json File ⭐ </button> 
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>  -->
    </div>        

    <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4" data-ng-repeat="x in y.returns">
        <!-- <div > -->
        <div>
            <a>
                <div class="hd">
                    <p class="inv">Monthly Return</p>
                    <p data-ng-bind="x.return_ty">GSTR3B</p>
                </div>
            </a>
            <div class="ct">
                
                <!-- <p class="f-wt" >Due Date - <span>25/05/2025</span></p> -->
                
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary offline_btn smallbutton" data-toggle="tooltip" title="" onclick="location.href='returngstr3bdetails'">Prepare Online</button>
                        
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        
                        <button type="button" class="btn btn-primary offline_btn smallbutton" data-toggle="tooltip" title="" onclick="location.href='">Prepare Offline</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>  -->
    </div>


</div></div>
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
    $(document).ready(function () {
        // Set default selections to current date
        function setDefaultDate() {
            try {
                var currentDate = new Date();
                var currentMonth = currentDate.getMonth() + 1; // JavaScript months are 0-11
                var calendarYear = currentDate.getFullYear();
                
                console.log("Current date - Year:", calendarYear, "Month:", currentMonth);
                
                // For GST, financial year runs from April to March
                var financialYearStart;
                if (currentMonth >= 1 && currentMonth <= 3) {
                    financialYearStart = calendarYear - 1;
                } else {
                    financialYearStart = calendarYear;
                }
                
                console.log("Financial Year Start:", financialYearStart);
                
                // Check if the financial year exists in dropdown, if not add it
                if (!$("#year-value option[value='" + financialYearStart + "']").length) {
                    var nextYear = financialYearStart + 1;
                    var fyLabel = financialYearStart + "-" + (nextYear % 100);
                    $("#year-value").prepend('<option label="' + fyLabel + '" value="' + financialYearStart + '">' + fyLabel + '</option>');
                    console.log("Added new financial year option:", fyLabel);
                }
                
                // Set the financial year
                $("#year-value").val(financialYearStart);
                console.log("Financial year set to:", $("#year-value").val());
                
                // Determine current quarter based on month
                var currentQuarter;
                if (currentMonth >= 4 && currentMonth <= 6) currentQuarter = "q1";
                else if (currentMonth >= 7 && currentMonth <= 9) currentQuarter = "q2";
                else if (currentMonth >= 10 && currentMonth <= 12) currentQuarter = "q3";
                else if (currentMonth >= 1 && currentMonth <= 3) currentQuarter = "q4";
                
                console.log("Current quarter:", currentQuarter);
                
                // Set quarter dropdown
                $("#quarter-value").val(currentQuarter);
                
                // DIRECTLY update month options based on current quarter
                if (currentQuarter == "q1") {
                    $("#month-value").html('<option label="April" value="4">April</option><option label="May" value="5">May</option><option label="June" value="6">June</option>');
                } else if (currentQuarter == "q2") {
                    $("#month-value").html('<option label="July" value="7">July</option><option label="August" value="8">August</option><option label="September" value="9">September</option>');
                } else if (currentQuarter == "q3") {
                    $("#month-value").html('<option label="October" value="10">October</option><option label="November" value="11">November</option><option label="December" value="12">December</option>');
                } else if (currentQuarter == "q4") {
                    $("#month-value").html('<option label="January" value="1">January</option><option label="February" value="2">February</option><option label="March" value="3">March</option>');
                }
                
                console.log("Month options set for quarter", currentQuarter, ":", $("#month-value").html());
                
                // Set current month if it's in this quarter
                if ($("#month-value option[value='" + currentMonth + "']").length) {
                    $("#month-value").val(currentMonth);
                    console.log("Month set to current month:", currentMonth);
                } else {
                    console.log("Current month not in selected quarter, using first month");
                    $("#month-value").prop('selectedIndex', 0);
                    console.log("Month set to:", $("#month-value").val());
                }
            } catch (e) {
                console.error("Error setting default date:", e);
            }
        }
        
        // Call the function to set defaults
        setDefaultDate();
        
        $("#year-value").change(function () {
            console.log("Year changed to:", $(this).val());
            // When year changes, we don't need to change the month options
            // Just trigger quarter change to update months based on selected quarter
            $("#quarter-value").trigger("change");
        });

       
    });
     $('#return-detail').hide();

        $('#submit-button').on('click', function(e) {
            e.preventDefault();
            $('#return-detail').show();
        });
    
</script>



</body></html>