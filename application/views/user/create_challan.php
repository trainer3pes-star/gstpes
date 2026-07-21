
<style>
    <style type="text/css">
.tbl-format {
    border-top: 1px solid #cccccc;
    border-bottom: 1px solid #cccccc
}

.tbl-format .row {
    margin: 0
}

.tbl-format .row .inner div[class*='col-'] {
    padding-bottom: 20px;
    padding-top: 10px
}

.tbl-format .row .inner div[class*='col-'].has-error {
    padding-bottom: 0px
}

.tbl-format .row:nth-child(odd) {
    background-color: #f7f7f7
}

.tbl-format .row:nth-child(even) {
    background-color: #fff
}

.tbl-format:last-child {
    border-bottom: none
}

.tabpane {
    background-color: #fff;
    padding: 20px;
    min-height: 380px !important;
    height: auto
}

.tabpane.tds {
    padding: 20px 0px
}

.tabpane h4 {
    font-family: arial;
    color: #0b1e59
}

.tabpane h4.ptitle {
    font-weight: 600
}

.breadcrumb {
    padding: 8px 15px 8px 0;
    margin-bottom: 0px;
    list-style: none;
    border-radius: 0px
}

.breadcrumb>li {
    display: inline-block
}

.breadcrumb>li+li:before {
    font-family: FontAwesome;
    content: "\f105";
    padding: 0 5px;
    color: #ccc
}

.breadcrumb>.active {
    color: #777
}

@media screen and (max-width: 350px) {
    .breadcrumb {
        display:none
    }
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 0px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    -webkit-transition: border-color ease-in-out 0.15s,box-shadow ease-in-out 0.15s;
    -o-transition: border-color ease-in-out 0.15s,box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s,box-shadow ease-in-out 0.15s
}

.form-control:focus {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(102,175,233,0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(102,175,233,0.6)
}

input {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    text-align: right;
}

input:focus {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}

.dev-tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 100%;
    background-color: #f1f1f1;
    border-bottom: 4px solid #ddd;
    border-right: 0px solid #ddd;
    border-top: 4px solid #ddd;
    border-left: 4px solid #ddd
}

.dev-tab>li {
    text-align: left;
    border-bottom: 3px solid #ddd;
    border-right: 2px solid #ddd
}

.dev-tab>li>a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none
}

.dev-tab>li>active>a {
    border-left: 2px solid #ffff00
}

.dev-tab>li:last-child {
    border-bottom: none
}

.dev-tab>active {
    border-right: 0px !important
}
.input-disabled {
    cursor: not-allowed;
    background-color: #eee;
    opacity: 1;
}
</style>
</style>
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
                        <span>Create Challan</span>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    <!---->
                    <li>
                        <a data-ng-click="selectLang(language.cd)">English</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div ng-view="">
        <div class="tabpane">
        <div id="challan-alert"></div>
           <?php echo form_open_multipart('home/save_challan', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
            
            <div id="alert">
            </div>
            <ul class="nav nav nav-tabs tp-tabs">
                <li class="active col-xs-12 col-sm-4"><a  href="<?php echo base_url('home/gst_challan'); ?>"title="Create Challan" style="border-top-color: black; border-left-color: black;border-right-color: black;"><span>Create Challan</span></a></li>
                <li class="col-xs-12 col-sm-4">
                    <a  href="<?php echo base_url('home/challan_saved'); ?>" title="Saved Challan">
                        <span>Saved Challan</span></a>
                </li>
                <li class="col-xs-12 col-sm-4"><a href="<?php echo base_url('home/challan_history'); ?>"  title="Challan History"><span>Challan History</span></a></li>
            </ul>
            <h4 class="rowtp-mar mar-b-0"></h4>
            <div data-ng-if="challanData.chln_rsn && IS_CHALLAN_REASON_ENABLED">
              <div class="row">
                <div class="col-sm-4 col-xs-12">
                  <h4 data-ng-bind="trans.HEAD_RSN_FR_CHLN">Reason For Challan</h4>
                </div>
                <!---->
                <div class="col-sm-8 col-xs-12" data-ng-if="isApplicableForReason" style="padding-top: 10px; text-align: right;">
                  <!---->
                  <!-- <a data-ng-if="isDisplayEditReasonLink" href="/gst/challan/" id="edit-reason-link" title="Edit Reason" data-ng-click="navigateToChallanReason()" data-ng-bind="trans.LBL_EDIT_RSN">Edit Reason</a> -->
                  <!---->
                  <!---->
                </div>
                <!---->
              </div>
              <div class="tbl-format">
                <div class="row">
                  <div class="inner">
                    <div class="col-sm-4 col-xs-12">
                      <p data-ng-bind="trans.LBL_REASON">Reason</p>
                      <!---->
                      <!---->
                      <!---->
                      <span data-ng-if="challanData.chln_rsn === 'AOP'">
                        <strong data-ng-bind="trans.LBL_AOP">Any other payment</strong>
                      </span>
                      <!---->
                    </div>
                    <!---->
                    <!---->
                  </div>
                </div>
              </div>
            </div>
            
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <h4>Details of Deposit</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table style="width:99%" class="table tbl inv table-bordered exp" id="challan-table">
                                <thead>
                                    <tr>
                                        <th style="width:14%">
                                            <p></p>
                                        </th>
                                        <th style="width:14%">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                   
                                                    <label>Tax</label>
                                                    <label>
                                                        (
                                                        <i class="fa fa-inr" araia-hidden="true"></i>)
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="width:14%">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <label>Interest</label>
                                                    <label>
                                                        (
                                                        <i class="fa fa-inr" araia-hidden="true"></i>)
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="width:14%">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <label>Penalty</label>
                                                    <label>
                                                        (
                                                        <i class="fa fa-inr" araia-hidden="true"></i>)
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="width:14%">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <label>Fees</label>
                                                    <label>
                                                        (
                                                        <i class="fa fa-inr" araia-hidden="true"></i>)
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="width:14%">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <label>Other</label>
                                                    <label>
                                                        (
                                                        <i class="fa fa-inr" araia-hidden="true"></i>)
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <label>Total</label>
                                                    <label>
                                                        (
                                                        <i class="fa fa-inr" araia-hidden="true"></i>)
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label title="Central Goods & Services Tax">CGST(0005)</label>
                                        </td>
                                        <td><input type="number" name="cgst_tax" value="<?php echo (isset($result->cgst_tax) && $result->cgst_tax !== '') ? $result->cgst_tax : '0'; ?>"
                                        step="0.01" required="" id="id_cgst_tax"></td>
                                        <td><input type="number" name="cgst_interest" value="<?php echo (isset($result->cgst_interest) && $result->cgst_interest !== '') ? $result->cgst_interest : '0'; ?>" step="0.01" required="" id="id_cgst_interest"></td>
                                        <td><input type="number" name="cgst_penalty"value="<?php echo (isset($result->cgst_penalty) && $result->cgst_penalty !== '') ? $result->cgst_penalty : '0'; ?>" step="0.01" required="" id="id_cgst_penalty"></td>
                                        <td><input type="number" name="cgst_fees"value="<?php echo (isset($result->cgst_fees) && $result->cgst_fees !== '') ? $result->cgst_fees : '0'; ?>" step="0.01" required="" id="id_cgst_fees"></td>
                                        <td><input type="number" name="cgst_other" value="<?php echo (isset($result->cgst_other) && $result->cgst_other !== '') ? $result->cgst_other : '0'; ?>" step="0.01" required="" id="id_cgst_other"></td>

                                        <td width="15%">
                                            <input id="cgst_total" name="cgst_total" class="form-control textbox text-right" type="text"  readonly   value="<?php echo (isset($result->cgst_total) && $result->cgst_total !== '') ? $result->cgst_total : '0'; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label title="Integrated Goods & Services Tax">IGST(0008)</label>
                                        </td>
                                        <td><input type="number" name="igst_tax" value="<?php echo (isset($result->igst_tax) && $result->igst_tax !== '') ? $result->igst_tax : '0'; ?>" step="0.01" required="" id="id_igst_tax"></td>
                                        <td><input type="number" name="igst_interest" value="<?php echo (isset($result->igst_interest) && $result->igst_interest !== '') ? $result->igst_interest : '0'; ?>" step="0.01" required="" id="id_igst_interest"></td>
                                        <td><input type="number" name="igst_penalty"  value="<?php echo (isset($result->igst_penalty) && $result->igst_penalty !== '') ? $result->igst_penalty : '0'; ?>" step="0.01" required="" id="id_igst_penalty"></td>
                                        <td><input type="number" name="igst_fees" value="<?php echo (isset($result->igst_fees) && $result->igst_fees !== '') ? $result->igst_fees : '0'; ?>" step="0.01" required="" id="id_igst_fees"></td>
                                        <td><input type="number" name="igst_other" value="<?php echo (isset($result->igst_other) && $result->igst_other !== '') ? $result->igst_other : '0'; ?>" step="0.01" required="" id="id_igst_other"></td>
                                        <td>
                                            <input id="igst_total" name="igst_total" class="form-control textbox text-right" type="text"  totalfire="" value="<?php echo (isset($result->igst_total) && $result->igst_total !== '') ? $result->igst_total : '0'; ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>CESS(0009)</label>
                                        </td>
                                        <td><input type="number" name="cess_tax" type="text"  totalfire="" value="<?php echo (isset($result->cess_tax) && $result->cess_tax !== '') ? $result->cess_tax : '0'; ?>" step="0.01" required="" id="id_cess_tax"></td>
                                        <td><input type="number" name="cess_interest" value="<?php echo (isset($result->cess_interest) && $result->cess_interest !== '') ? $result->cess_interest : '0'; ?>" step="0.01" required="" id="id_cess_interest"></td>
                                        <td><input type="number" name="cess_penalty" value="<?php echo (isset($result->cess_penalty) && $result->cess_penalty !== '') ? $result->cess_penalty : '0'; ?>" step="0.01" required="" id="id_cess_penalty"></td>
                                        <td><input type="number" name="cess_fees" value="<?php echo (isset($result->cess_fees) && $result->cess_fees !== '') ? $result->cess_fees : '0'; ?>" step="0.01" required="" id="id_cess_fees"></td>
                                        <td><input type="number" name="cess_other"  value="<?php echo (isset($result->cess_other) && $result->cess_other !== '') ? $result->cess_other : '0'; ?>" step="0.01" required="" id="id_cess_other"></td>
                                        <td>
                                            <input id="cess_total" name="cess_total" class="form-control textbox text-right" type="text"  value="<?php echo (isset($result->cess_total) && $result->cess_total !== '') ? $result->cess_total : '0'; ?>"readonly >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label title="State Goods & Services Tax"><span data-ng-show="sgSt">SGST(0006)</span><span data-ng-show="utSt" class="ng-hide">UTGST(0007)</span></label>
                                        </td>
                                        <td><input type="number" name="sgst_tax" value="<?php echo (isset($result->sgst_tax) && $result->sgst_tax !== '') ? $result->sgst_tax : '0'; ?>" step="0.01" required="" id="id_sgst_tax"></td>
                                        <td><input type="number" name="sgst_interest" value="<?php echo (isset($result->sgst_interest) && $result->sgst_interest !== '') ? $result->sgst_interest : '0'; ?>" step="0.01" required="" id="id_sgst_interest"></td>
                                        <td><input type="number" name="sgst_penalty"  value="<?php echo (isset($result->sgst_penalty) && $result->sgst_penalty !== '') ? $result->sgst_penalty : '0'; ?>" step="0.01" required="" id="id_sgst_penalty"></td>
                                        <td><input type="number" name="sgst_fees" value="<?php echo (isset($result->sgst_fees) && $result->sgst_fees !== '') ? $result->sgst_fees : '0'; ?>" step="0.01" required="" id="id_sgst_fees"></td>
                                        <td><input type="number" name="sgst_other" value="<?php echo (isset($result->sgst_other) && $result->sgst_other !== '') ? $result->sgst_other : '0'; ?>" step="0.01" required="" id="id_sgst_other"></td>
                                        <td>
                                            <input id="sgst_total" class="form-control textbox text-right" name="sgst_total" value="<?php echo (isset($result->sgst_total) && $result->sgst_total !== '') ? $result->sgst_total : '0'; ?>" type="text"  totalfire="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                  <label>Total Challan Amount:</label>
                                </td>
                                <td colspan="5">
                                  <span id="challan-amount-total"></span>
                                  <input type="hidden" id="challan-amount-total_val" name="total_challan_amount" class="form-control" value="<?php echo (isset($result->total_challan_amount) && $result->total_challan_amount !== '') ? $result->total_challan_amount : '0'; ?>">
                                 
                                </td>



                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label>Total Challan Amount (In Words):</label>
                                        </td>
                                        <td colspan="5">
                                            <label id="challan-amount-total-in-words"></label>
                                            <input type="hidden" id="challan-amount-total-in-words-val" name="challan_amount_total_in_words" class="form-control"value="<?php echo $result->challan_amount_total_in_words; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <strong> <!----></strong>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <h4 class="m-cir">Payment Modes</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <ul class="dev-tab" name="payMode">
                        <li id="pay1" class=""><a  data-value="1" class="type-of-payment"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>E-Payment</span><i id="pay1t"></i></a></li>
                        <li id="pay2"><a  data-value="2" class="type-of-payment"><i class="fa fa-money" aria-hidden="true"></i> <span>Over The Counter</span><i id="pay2t"></i></a></li>
                        <li id="pay3"><a  data-value="3" class="type-of-payment"><i class="fa fa-globe" aria-hidden="true"></i> <span>NEFT/RTGS</span> <i id="pay3t"></i></a></li>
                        <input class="hidden" type="number" id="id_mode_of_payment" name="mode_of_payment" value="0">
                    </ul>
                    <!---->
                    <!---->
                    <span class="err"></span>
                </div>
                <!---->
                <!---->
                <!---->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right pad-b-20">
                        <a name="gstgenerate" href="gst_challan" id="edit-reason" class="btn btn-primary sendButton" style="width: 20%;">EDIT REASON</a>
                        	<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                        	<!--<input type="hidden" name="challan_reason_id" value="<?php echo @$challan_reason_id; ?>">-->

                        <!--<input type="hidden" name="status" value="1">-->

                        <!-- Save Button -->
                        <input type="submit" name="action" value="save" class="btn btn-default" title="Save" id="save" style="width: 10%;">
                        
                        <!-- Generate Challan Button -->
                        <input type="submit" name="action" value="Generate Challan" class="btn btn-primary sendButton"title="Generate Challan" style="width: 20%;" id="forEpay" disabled>


                    </div>
                </div>
            </div>
           	<?php  echo form_close(); ?>
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


function number2text(value) {
    var fraction = Math.round(frac(value)*100);
    var f_text  = "";

    if(fraction > 0) {
        f_text = "and "+convert_number(fraction)+" Paise";
    }

    return convert_number(value)+" Rupee "+f_text+" Only";
}

function frac(f) {
    return f % 1;
}

function convert_number(number)
{
    if ((number < 0) || (number > 999999999))
    {
        return "NUMBER OUT OF RANGE!";
    }
    var Gn = Math.floor(number / 10000000);  /* Crore */
    number -= Gn * 10000000;
    var kn = Math.floor(number / 100000);     /* lakhs */
    number -= kn * 100000;
    var Hn = Math.floor(number / 1000);      /* thousand */
    number -= Hn * 1000;
    var Dn = Math.floor(number / 100);       /* Tens (deca) */
    number = number % 100;               /* Ones */
    var tn= Math.floor(number / 10);
    var one=Math.floor(number % 10);
    var res = "";

    if (Gn>0)
    {
        res += (convert_number(Gn) + " Crore");
    }
    if (kn>0)
    {
            res += (((res=="") ? "" : " ") +
            convert_number(kn) + " Lakh");
    }
    if (Hn>0)
    {
        res += (((res=="") ? "" : " ") +
            convert_number(Hn) + " Thousand");
    }

    if (Dn)
    {
        res += (((res=="") ? "" : " ") +
            convert_number(Dn) + " Hundred");
    }


    var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen","Nineteen");
    var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eighty", "Ninety");

    if (tn>0 || one>0)
    {
        if (!(res==""))
        {
            res += " and ";
        }
        if (tn < 2)
        {
            res += ones[tn * 10 + one];
        }
        else
        {

            res += tens[tn];
            if (one>0)
            {
                res += ("-" + ones[one]);
            }
        }
    }

    if (res=="")
    {
        res = "zero";
    }
    return res;
}
   $(document).ready(function() {



$("#id_cgst_tax,#id_cgst_interest,#id_cgst_penalty,#id_cgst_fees,#id_cgst_other,#id_igst_tax,#id_igst_interest,#id_igst_penalty,#id_igst_fees,#id_igst_other,#id_sgst_tax,#id_sgst_interest,#id_sgst_penalty,#id_sgst_fees,#id_sgst_other,#id_cess_tax,#id_cess_interest,#id_cess_penalty,#id_cess_fees,#id_cess_other").change(function(){

    var total_amount = Number($("#id_cgst_tax").val()) + Number($("#id_cgst_interest").val()) + Number($("#id_cgst_penalty").val()) + Number($("#id_cgst_fees").val()) + Number($("#id_cgst_other").val()) + Number($("#id_igst_tax").val()) + Number($("#id_igst_interest").val()) + Number($("#id_igst_penalty").val()) + Number($("#id_igst_fees").val()) + Number($("#id_igst_other").val()) + Number($("#id_sgst_tax").val()) + Number($("#id_sgst_interest").val()) + Number($("#id_sgst_penalty").val()) + Number($("#id_sgst_fees").val()) + Number($("#id_sgst_other").val()) + Number($("#id_cess_tax").val()) + Number($("#id_cess_interest").val()) + Number($("#id_cess_penalty").val()) + Number($("#id_cess_fees").val()) + Number($("#id_cess_other").val());

    $('#challan-amount-total').html(" ₹ "  + total_amount + " /-");
    $('#challan-amount-total_val').val(total_amount);
    amount_in_words = number2text(total_amount);
    $('#challan-amount-total-in-words').html("Rupees " + amount_in_words);
    $('#challan-amount-total-in-words-val').val(amount_in_words);
   


    var total_cgst = Number($("#id_cgst_tax").val()) + Number($("#id_cgst_interest").val()) + Number($("#id_cgst_penalty").val()) + Number($("#id_cgst_fees").val()) + Number($("#id_cgst_other").val());

    $('#cgst_total').val(total_cgst);

    var total_igst = Number($("#id_igst_tax").val()) + Number($("#id_igst_interest").val()) + Number($("#id_igst_penalty").val()) + Number($("#id_igst_fees").val()) + Number($("#id_igst_other").val());

    $('#igst_total').val(total_igst);

    var total_sgst = Number($("#id_sgst_tax").val()) + Number($("#id_sgst_interest").val()) + Number($("#id_sgst_penalty").val()) + Number($("#id_sgst_fees").val()) + Number($("#id_sgst_other").val());

    $('#sgst_total').val(total_sgst);

    var total_cess = Number($("#id_cess_tax").val()) + Number($("#id_cess_interest").val()) + Number($("#id_cess_penalty").val()) + Number($("#id_cess_fees").val()) + Number($("#id_cess_other").val());

    $('#cess_total').val(total_cess);
});

$( ".type-of-payment" ).click(function() {
    $("#forEpay").removeAttr("disabled");
    value = $(this).data("value");
    console.log(value);
    $("#pay1t").remove();
    $(this).append("<i id=\"pay1t\" class=\"fa fa-check fa-wd pull-right\" style=\"color: green;\"></i>");
    $("#id_mode_of_payment").attr("value",value);
});



});
   $(document).ready(function(){
    var val = $("#challan-amount-total_val").val();
    if (val !== '') {
        $("#challan-amount-total").html("₹ " + val + " /-");
    }
});

$(document).ready(function(){
    var val = $("#challan-amount-total-in-words-val").val();
    if (val !== '') {
        $("#challan-amount-total-in-words").html(val);
    }
});




</script>

