
    <nav class="navbar navbar-default">
  
    <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb">
                    <li><a target="" href="/gst/dashboard/new/">Dashboard</a></li>
                    <li>
                        <span ng-switch-default=""><a href="/gst/quicklinks/payment/" target="_self">Payment</a></span>
                    </li>
                    <li>
                        <span>Challan Reason</span>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">

                    <li>
                        <a data-ng-click="selectLang(language.cd)">English</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div ng-view="">
         <?php echo form_open_multipart('home/save_challan_reason', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
        <div class="tabpane">
            <div class="row">
                <div class="col-sm-8">
                    <h4 data-ng-bind="trans.HEAD_RSN_FR_CHLN">Reason For Challan</h4>
                </div>
                <div class="col-sm-4 text-right">
                    <button type="button" class="btn btn-primary btn-sm margin-0" data-toggle="modal" data-target="#helpModal" title="HELP">
                        HELP <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <hr>
            <!---->

            <p class="mand-text">indicates mandatory fields</p>

            <div class="row">
  <!-- Radio Button -->
  <div class="col-md-3 text-right">
    <strong class="m-cir">Reason For Challan</strong> :
  </div>
  <div class="col-md-4 col-sm-12 col-xs-12">
    <input type="radio" id="qrmp" name="reason_for_challan" class="form-radio" value="QRMP">
    <label for="qrmp" class="reg">Monthly payment for quarterly return</label>
    <br>
    <input type="radio" id="aop" name="reason_for_challan" class="form-radio" value="AOP">
    <label for="aop" class="reg">Any other payment</label>
  </div>
</div>

            <!---->
            <div class="row ng-hide" style="margin-top:20px;margin-bottom:20px;"id="select-period">
              <div class="col-md-3"></div>
              <div class="col-md-3 col-xs-12">
                <label for="final_year" class="reg m-cir">Financial Year</label>
                <select name="final_year" class="form-control" >
                  <option value="" disabled="">Select</option>
                  <!---->
                  <option  value="2024-25">2024-25</option>
                  <!---->
                  <option  value="2023-24">2023-24</option>
                  <!---->
                  <option  value="2022-23">2022-23</option>
                  <!---->
                  <option  value="2021-22">2021-22</option>
                  <!---->
                  <option  value="2020-21">2020-21</option>
                  <!---->
                </select>
              </div>
              <div class="col-md-3 col-xs-12">
                <label for="period" class="reg m-cir">Period</label>
                <select name="period"  class="form-control" >
                  <option value="" disabled="">Select</option>
                  <!---->
                  <option  value="042022">April</option>
                  <!---->
                  <option  value="052022">May</option>
                  <!---->
                </select>
              </div>
            </div>
            <div class="row ng-hide" style="margin-top:20px;margin-bottom:20px;"  id="select-type">
              <div class="col-md-3 text-right">
                <strong class="m-cir">Challan Type</strong> :
              </div>
              <div class="col-md-4 col-xs-12">
                <input type="radio" id="challan35" name="challan_type" class="form-radio" value="QRMP35">
                <label for="challan35" class="reg">35 % Challan</label>
                <br>
                <input type="radio" id="challanSA" name="challan_type" class="form-radio" value="QRMP">
                <label for="challanSA" class="reg">Challan on self-assessment basis</label>
              </div>
            </div>
            <!---->
            <div  id="alert-div-1" class="alert alert-info  ng-hide">
              <i class="fa fa-info-circle"></i>
              <span >Interest will be levied, as per Law, in case of payment made through other than 35% challan.</span>
            </div>
            <!---->

            <div class="alert alert-info  ng-hide">
              <i class="fa fa-info-circle"></i>
              <span >As per Law, no interest shall be levied for the selected month if payment is made by 25th of the next month or the extended date, if any</span>
            </div>
            <div class="row">
                <div class="col-xs-6 text-left">
                    <!----><button id="ledger-button" class="btn btn-primary" type="button" title="View Ledger Balance">
                        View Ledger Balance 
                        <i id="ledger-up" class="fa fa-chevron-down ng-hide"></i>
                        <i id="ledger-down" class="fa fa-chevron-down"></i>
                    </button><!---->
                </div>
              
                 <div class="col-xs-6 text-right">
                     
                  <button type="submit" class="btn btn-primary" id="proceedBtn" disabled>Proceed</button>
                </div>
            </div>
            <!---->

            <div id="ledger-data" data-ng-if="isLedgerVisible" class="row ng-hide">
                    <div class="col-xs-12">
                        <!---->
                        <!---->
                        <!----><div data-ng-if="!(isErrorInGetCashLedger || isErrorInGetCreditLedger) && (cashLedger && creditLedger)">
                            <p><b>Ledger Balance as on date : 01/04/2025</b></p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" data-ng-bind="trans.LBL_TYP_LDGR">Type of Ledger</th>
                                            <th colspan="5" style="text-align:center" data-ng-bind="trans.LBL_AVL_BAL">Available Balance (â‚¹)</th>
                                        </tr>
                                        <tr>
                                            <td data-ng-bind="trans.LBL_ITAX">Integrated Tax (â‚¹)</td>
                                            <td data-ng-bind="trans.LBL_CTAX">Central Tax (â‚¹)</td>
                                            <!----><td data-ng-if="!utgstFlag" data-ng-bind="trans.LBL_STAX">State Tax (â‚¹)</td><!---->
                                            <!---->
                                            <td data-ng-bind="trans.LBL_CES">CESS (â‚¹)</td>
                                            <td data-ng-bind="trans.LBL_TOT">Total  (â‚¹)</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-ng-bind="trans.HEAD_CASH_LEDGER">Electronic Cash Ledger </td>
                                            <td data-ng-bind="cashLedger.igst.tot | INR">100</td>
                                            <td data-ng-bind="cashLedger.cgst.tot | INR">100</td>
                                            <td data-ng-bind="cashLedger.sgst.tot | INR">0</td>
                                            <td data-ng-bind="cashLedger.cess.tot | INR">0</td>
                                            <td>
                                                <a class="inverseLink" data-toggle="modal" data-target="#balanceModal" data-ng-bind="cashLedger.tot_rng_bal | INR"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-ng-bind="trans.HEAD_CREDIT_LEDGER">Electronic Credit Ledger</td>
                                            <td data-ng-bind="creditLedger.igst_bal | INR">0</td>
                                            <td data-ng-bind="creditLedger.cgst_bal | INR">20</td>
                                            <td data-ng-bind="creditLedger.sgst_bal | INR">20.00</td>
                                            <td data-ng-bind="creditLedger.cess_bal | INR">0</td>
                                            <td data-ng-bind="creditLedger.total_bal | INR"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!---->
                    </div>
                </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-xs-12">
                    <!-- <p><b data-ng-bind="trans.LBL_NOTE"></b>: <span data-ng-bind="trans.HLP_TXT_REASON"></span></p> -->
                    <p><b data-ng-bind="trans.LBL_NOTE">Note</b>:
                        <span data-ng-bind="trans.HELP_TEXT_LINE_1">For taxpayer filing GSTR-3B on quarterly basis:</span>
                    </p>
                    <p data-ng-bind="trans.HELP_TEXT_POINT_1">1. To make payment for the first (M1) and second (M2) months of the quarter, please select reason as â€˜Monthly Payment for Quarterly Returnâ€™ and the relevant period (financial year, month) and choose whether to pay through 35% challan or self-assessment challan. </p>
                    <p data-ng-bind="trans.HELP_TEXT_POINT_2">2. To make payment for the third month of the Quarter (M3), please use â€˜Create Challanâ€™ option in payment Table-6 of Form GSTR-3B Quarterly. An auto-populated challan amounting to liabilities for the quarter net off credit utilization and existing cash balance can be generated and used to offset liabilities. </p>
                    <div>
                        <a href="">Click here</a>  for navigation to â€˜Return Dashboardâ€™ and prepare GSTR-3B Quarterly. Filing of GSTR-3B Quarterly available in the third month of the quarter is mandatory.
                    </div>
             
                    <div><b>*</b>For adding cash to Electronic Cash Ledger, already established procedure may be followed.</div>
                </div>
            </div>
        </div>
        
        <?php  echo form_close(); ?>
    </div>
</div>

<div class="modal" id="warningModal">
    <div class="modal-dialog sweet">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" data-ng-click="onCloseModal()">Ã—</button>
            </div>
            <div class="modal-body">
                <div class="m-icon m-warning pulseWarning">
                    <span class="micon-body pulseWarningIns"></span>
                    <span class="micon-dot pulseWarningIns"></span>
                </div>
                <h2 data-ng-bind="trans.LBL_WAR">Warning</h2>
                <p data-ng-bind="modalErrorMsg" id="warning-modal-message">Your filing preference is Monthly for selected period. Do you want to continue with reason as 'Any other payment'?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" title="Yes" data-ng-click="onModalYes()" data-ng-bind="trans.LBL_YES" onclick="location.href='/gst/challan/create/'">Yes</button>
                <button type="button" class="btn btn-default" title="No" data-ng-click="onModalNo()" data-ng-bind="trans.LBL_NO" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal to display cash balance minor head wise details -->
<div class="modal fade bs-example-modal-md" id="balanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button>
                <h4>
                    Cash Balance as on   04-07-2022
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 data-ng-bind-template="Integrated Tax (â‚¹)">Integrated Tax (â‚¹)</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Tax">Tax</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.igst.tx | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Interest">Interest</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.igst.intr | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Penalty">Penalty</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.igst.pen | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Fee">Fee</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.igst.fee | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Others">Others</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.igst.oth | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Total">Total</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.igst.tot | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 data-ng-bind-template="Central Tax (â‚¹)">Central Tax (â‚¹)</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Tax">Tax</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cgst.tx | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Interest">Interest</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cgst.intr | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Penalty">Penalty</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cgst.pen | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Fee">Fee</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cgst.fee | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Others">Others</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cgst.oth | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Total">Total</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cgst.tot | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <!----><h4 data-ng-if="!utgstFlag" data-ng-bind-template="State Tax (â‚¹)">State Tax (â‚¹)</h4><!---->
                        <!---->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Tax">Tax</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.sgst.tx | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Interest">Interest</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.sgst.intr | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Penalty">Penalty</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.sgst.pen | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Fee">Fee</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.sgst.fee | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Others">Others</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.sgst.oth | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Total">Total</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.sgst.tot | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 data-ng-bind-template="CESS (â‚¹)">CESS (â‚¹)</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Tax">Tax</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cess.tx | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Interest">Interest</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cess.intr | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Penalty">Penalty</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cess.pen | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Fee">Fee</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cess.fee | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Others">Others</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cess.oth | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind-template="Total">Total</label>
                            </div>
                            <div class="col-sm-12">
                                <label class="reg" data-ng-bind="cashLedger.cess.tot | INR">0.00</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-ng-bind="trans.HEAD_OK">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal to display help content -->
<div id="helpModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">Ã—</button>
                <h4 class="modal-title" data-ng-bind="trans.LBL_HELP_TITLE">Monthly tax payments under QRMP scheme</h4>
            </div>
            <div class="modal-body">
                <span data-ng-bind="trans.CHLN_RSN_TEXT">The reason for challan can be selected from the Reason for Challan page (Services -> Payments -> Create Challan). This page displays reason as Monthly payment for quarterly return and Any other payment.</span>
                <ul>
                    <li data-ng-bind="trans.CHLN_RSN_TEXT_1">For taxpayer filing GSTR-3B on quarterly basis and intending to make payment for first and second months of the quarter, please select reason as Monthly Payment for quarterly return.</li>
                    <li data-ng-bind="trans.CHLN_RSN_TEXT_2">Please select the Financial year and period from the dropdown and select challan type as 35%challan or Challan on self-assessment basis.</li>
                </ul>
                <span data-ng-bind="trans.CHLN_RSN_HEAD_1">35% Challan</span>
                <ul>
                    <li data-ng-bind="trans.CHLN_RSN_HELP_1">35% of the tax liability paid from cash ledger in GSTR-3B for the preceding quarter where the return is furnished quarterly shall be auto-populated which needs to be paid.</li>
                    <li data-ng-bind="trans.CHLN_RSN_HELP_2">100% of the tax liability paid from cash ledger in GSTR-3B return for the preceding month where the return is furnished monthly shall be auto-populated which needs to be paid.</li>
                    <li data-ng-bind="trans.CHLN_RSN_HELP_3">Please note that when taxpayer exercises 35% challan option, No interest shall be levied for the selected month if payment is made by 25th of the next month or the extended date, if any.</li>
                </ul>
                <span data-ng-bind="trans.CHLN_RSN_HEAD_2">Challan on Self-Assessment Basis</span>
                <ul>
                    <li data-ng-bind="trans.CHLN_RSN_HELP_4">Taxpayer can self-assess his current month's liability (net of Input Tax credit) and shall generate challan for the same.</li>
                    <li data-ng-bind="trans.CHLN_RSN_HELP_5">Interest will be levied on payment made through 'Challan on self-assessment basis' (other than 35% challan) in case of delayed payment (after due date of 25th of next month or the extended date, if any) or short payment.</li>
                </ul>
                <b data-ng-bind="trans.CHLN_RSN_HEAD_3">Note:</b>ï¿½<span data-ng-bind="trans.CHLN_RSN_HELP_6">For taxpayers whose AATO is greater than â‚¹5Cr., the filing preference shall be monthly only, and they will not be able to generate challan with 'Monthly payment for quarterly return' reason.</span>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary margin-0" data-dismiss="modal" data-ng-bind="trans.BTN_CLOSE">close</button>
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
$('#challan-delete-modal').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

$("#ledger-button").on("click",function(){
    $("#ledger-data").toggleClass("ng-hide");
    $("#ledger-up").toggleClass("ng-hide");
    $("#ledger-down").toggleClass("ng-hide");
});
$("#qrmp").change(function() {
    if($(this).is(":checked")){
        $("#select-period").toggleClass("ng-hide");
        $("#select-type").toggleClass("ng-hide");
        $("#proceed-button").prop("disabled", true);
    }
});
$("#challan35").change(function() {
    if($(this).is(":checked")){
        $("#alert-div-1").toggleClass("ng-hide");
        $("#alert-div-2").addClass("ng-hide");
        $("#proceed-button").prop("disabled", false);
        $("#warning-modal-message").text("You selected Monthly payment, do you want to continue?");
    }
});
$("#challanSA").change(function() {
    if($(this).is(":checked")){        
        $("#alert-div-1").addClass("ng-hide");
        $("#alert-div-2").toggleClass("ng-hide");
        $("#proceed-button").prop("disabled", false);
        $("#warning-modal-message").text("You selected Monthly payment, do you want to continue?");

    }
});

$("#aop").change(function() {
    if($(this).is(":checked")){        
        $("#select-period").addClass("ng-hide");
        $("#select-type").addClass("ng-hide");
        $("#alert-div-1").addClass("ng-hide");
        $("#alert-div-2").addClass("ng-hide");
        $("#proceed-button").prop("disabled", false);
        $("#proceed-button").attr("onclick", "location.href='/gst/challan/create/'");
        $("#proceed-button").removeAttr("data-toggle");
        $("#proceed-button").removeAttr("data-target");
        // $("#warning-modal-message").text("Your filing preference is Monthly for selected period. Do you want to continue with reason as 'Any other payment'?");
    }
});


  document.addEventListener("DOMContentLoaded", function () {
    const proceedBtn = document.getElementById("proceedBtn");
    const reasonRadios = document.querySelectorAll('input[name="reason_for_challan"]');
    const challanSection = document.getElementById("select-type");
    const challanRadios = document.querySelectorAll('input[name="challan_type"]');

    function checkFormState() {
      const selectedReason = document.querySelector('input[name="reason_for_challan"]:checked');
      const selectedChallan = document.querySelector('input[name="challan_type"]:checked');

      if (!selectedReason) {
        proceedBtn.disabled = true;
        challanSection.style.display = "none";
        return;
      }

      if (selectedReason.value === "QRMP") {
        challanSection.style.display = "block";
        proceedBtn.disabled = !selectedChallan;
      } else {
        challanSection.style.display = "none";
        proceedBtn.disabled = false;
      }
    }

    reasonRadios.forEach(radio => {
      radio.addEventListener("change", function () {
        // Clear Challan selection on reason change
        challanRadios.forEach(c => c.checked = false);
        checkFormState();
      });
    });

    challanRadios.forEach(radio => {
      radio.addEventListener("change", checkFormState);
    });
  });
</script>
