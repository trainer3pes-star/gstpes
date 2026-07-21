
   

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


    
<div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <?php if (empty($is_pdf)): ?>
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
    <?php endif; ?>
    <div ng-view="">
    <div class="tabpane">
        <!---->
         <?php if (empty($is_pdf)): ?>
        <div class="alert alert-success" data-ng-if="challanData.toShow">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong data-ng-bind="trans.LBL_GEN_CHALLAN">Challan successfully generated</strong>
        </div>
        <?php endif; ?>
        <!---->
        <form class="form-horizontal  ng-pristine ng-valid" name="paymentForm" ng-submit="send()" method="post" role="form" id="paymentForm">
            <input type="hidden" name="reqjson" ng-value="reqjson">
        </form>
            <!---->
            <h4 >GST Challan</h4>
            <div class="tbl-format">
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.HEAD_CPIN">CPIN</p>
                            <span><strong><?php echo $result->cpin; ?></strong></span>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p>Challan Generation Date</p>
                            <span><strong data-ng-bind="challanData.chln_cre_dt"><?php echo date('d/m/Y H:i', strtotime($result->created_on)); ?></strong></span>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.LBL_CHLN_EXPIRYDT">Challan Expiry Date</p>
                            <span><strong data-ng-bind="challanData.chln_exp_dt"><?php echo date('d/m/Y',strtotime($result->expiry_date));?></strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12">
                            <p><strong data-ng-bind="trans.LBL_MODE_OF_PAY">Mode of Payment</strong> :- </p>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p><strong data-ng-bind="fullMode"><?php
                                            if ($result->mode_of_payment == 1) {
                                                echo "E-Payment";
                                            } elseif ($result->mode_of_payment == 2) {
                                                echo "Over The Counter";
                                            } elseif ($result->mode_of_payment == 3) {
                                                echo "NEFT/RTGS";
                                            } else {
                                                echo "N/A";
                                            }
                                          ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Details Of Taxpayer</h4>
            <div class="tbl-format">
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.LBL_GSTIN">GSTIN</p>
                            <span><strong data-ng-bind="challanData.gstin"><?php echo $resultTaxpayer->gstno;?></strong></span>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.LBL_EMAIL">Email Address</p>
                            <span><strong><?php echo $resultTaxpayer->email;?></strong></span>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.LBL_MOBNUM">Mobile Number</p>
                            <span><strong><?php echo $resultTaxpayer->contact;?></strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="inner">
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.LBL_NAME">Name</p>
                            <span><strong><?php echo ucwords($resultTaxpayer->name); ?></strong></span>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p data-ng-bind="trans.LBL_ADDR">Address</p>
                            <span><strong data-ng-bind="challanData.address"><?php echo @$state_name; ?>, India</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Details of Deposit</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:99%">
                            <thead>
                                <tr >
                                    <th>
                                        <p></p>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <span data-ng-bind="trans.HEAD_TAX">Tax</span> <span> (₹)</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <span data-ng-bind="trans.HEAD_INTR">Interest</span> <span> (₹)</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <span data-ng-bind="trans.HEAD_PENALTY">Penalty</span> <span> (₹)</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <span data-ng-bind="trans.HEAD_FEES">Fees</span> <span> (₹)</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <span data-ng-bind="trans.HEAD_OTHER">Other</span> <span> (₹)</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <span data-ng-bind="trans.HEAD_TOT">Total</span> <span> (₹)</span>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label data-ng-bind="trans.HEAD_CGST" title="Central Goods &amp; Services Tax">CGST(0005)</label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cgst_tax_amt | INR:'pay'"><?php echo $result->cgst_tax;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cgst_int_amt | INR:'pay'"><?php echo $result->cgst_interest;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cgst_pen_amt | INR:'pay'"><?php echo $result->cgst_penalty;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cgst_fee_amt | INR:'pay'"><?php echo $result->cgst_fees;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cgst_oth_amt | INR:'pay'"><?php echo $result->cgst_other;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cgst_tot_amt | INR:'pay'"><?php echo $result->cgst_total;?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label data-ng-bind="trans.HEAD_IGST" title="Integrated Goods &amp; Services Tax">IGST(0008)</label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.igst_tax_amt | INR:'pay'"><?php echo $result->igst_tax;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.igst_int_amt | INR:'pay'"><?php echo $result->igst_interest;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.igst_pen_amt | INR:'pay'"><?php echo $result->igst_penalty;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.igst_fee_amt | INR:'pay'"><?php echo $result->igst_fees;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.igst_oth_amt | INR:'pay'"><?php echo $result->igst_other;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.igst_tot_amt | INR:'pay'"><?php echo $result->igst_total;?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label data-ng-bind="trans.HEAD_CESS">CESS(0009)</label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cess_tax_amt | INR:'pay'"><?php echo $result->cess_tax;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cess_int_amt | INR:'pay'"><?php echo $result->cess_interest;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cess_pen_amt | INR:'pay'"><?php echo $result->cess_penalty;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cess_fee_amt | INR:'pay'"><?php echo $result->cess_fees;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cess_oth_amt | INR:'pay'"><?php echo $result->cess_other;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.cess_tot_amt | INR:'pay'"><?php echo $result->cess_total;?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label title="State Goods &amp; Services Tax"><span data-ng-show="sgSt" data-ng-bind="trans.LBL_SG_ST">SGST(0006)</span><span data-ng-show="utSt" data-ng-bind="trans.LBL_UT_ST" class="ng-hide">UTGST(0007)</span></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.sgst_tax_amt | INR:'pay'"><?php echo $result->sgst_tax;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.sgst_int_amt | INR:'pay'"><?php echo $result->sgst_interest;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.sgst_pen_amt | INR:'pay'"><?php echo $result->sgst_penalty;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.sgst_fee_amt | INR:'pay'"><?php echo $result->sgst_fees;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.sgst_oth_amt | INR:'pay'"><?php echo $result->sgst_other;?></label>
                                    </td>
                                    <td class="text-right">
                                        <label data-ng-bind="challanData.sgst_tot_amt | INR:'pay'"><?php echo $result->sgst_total;?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label data-ng-bind="trans.HEAD_TOT_CHLNAMT">Total Challan Amount:</label>
                                    </td>
                                    <td colspan="5">
                                        <span>  ₹</span>
                                        <label id="challan-amount-total"><?php echo $result->total_challan_amount;?></label>
                                        <!---->
                                        <label data-ng-if="challanData.total_amt"> /-</label>
                                        <!---->
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label data-ng-bind="trans.HEAD_TOTAMT_WORDS">Total Challan Amount (In Words):</label>
                                    </td>
                                    <td colspan="5">
                                        <label id="challan-amount-total-in-words"><?php echo $result->challan_amount_total_in_words;?></label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!---->
            
    <?php if ($result->mode_of_payment == 1) { ?>
<?php if (empty($is_pdf)): ?>
<div class="epay">
   <?php if ($result->status != 3) { ?>
    <div class="rowtp-mar" >
                    <div class="row">
                        <hr>
                        <div class="col-sm-3 col-xs-12">
                            <span  class="m-cir">Select Mode of E-Payment</span>
                            <ul class="dev-tab">
                                <li id="pb" value="PB">
                                  <a id="pb-button">
                                    <i class="fa fa-credit-card"></i>
                                    <span >Preferred Banks</span>
                                    <i id="pbi"></i>
                                  </a>
                                </li>
                               
                                 <li id="nb" value="NB">
                        <a id="nb-button" >
                            <i class="fa fa-credit-card"></i>
                            <span >Net Banking</span>
                            <i id="pay1t"></i>
                        </a>
                    </li>
                            </ul>
                        </div>
    <div class="col-sm-9 col-xs-12 rowtp-mar " id="net-banking-details" style="display: none;">
    <div class="col-xs-12 offset-sm-1 com-sm-1">
    <em class="m-cir" >Please select a bank</em>
    <p></p>
</div>

<div>
    <ul class="no-list bl-list">
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="UTIB"  name="bank_cd" value="UTIB" type="radio" >
            <label for="UTIB">AXIS BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="BARB"  name="bank_cd" value="BARB" type="radio" >
            <label for="BARB">BANK OF BARODA</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="BKID"  name="bank_cd" value="BKID" type="radio" >
            <label for="BKID">BANK OF INDIA</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="CNRB"  name="bank_cd" value="CNRB" type="radio" >
            <label for="CNRB">CANARA BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="CBIN"  name="bank_cd" value="CBIN" type="radio" >
            <label for="CBIN">CENTRAL BANK OF INDIA</label>
        </li>

        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="HDFC"  name="bank_cd" value="HDFC" type="radio" >
            <label for="HDFC">HDFC BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="ICIC"  name="bank_cd" value="ICIC" type="radio" >
            <label for="ICIC">ICICI BANK LIMITED</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="IBKL"  name="bank_cd" value="IBKL" type="radio" >
            <label for="IBKL">IDBI BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="IDIB"  name="bank_cd" value="IDIB" type="radio" >
            <label for="IDIB">INDIAN BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="IOBA"  name="bank_cd" value="IOBA" type="radio" >
            <label for="IOBA">INDIAN OVERSEAS BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="JAKA"  name="bank_cd" value="JAKA" type="radio" >
            <label for="JAKA">JAMMU AND KASHMIR BANK LIMITED</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="PSIB"  name="bank_cd" value="PSIB" type="radio" >
            <label for="PSIB">PUNJAB AND SIND BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="PUNB"  name="bank_cd" value="PUNB" type="radio" >
            <label for="PUNB">PUNJAB NATIONAL BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="SBIN"  name="bank_cd" value="SBIN" type="radio" >
            <label for="SBIN">STATE BANK OF INDIA</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="UCBA"  name="bank_cd" value="UCBA" type="radio" >
            <label for="UCBA">UCO BANK</label>
        </li>
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="UBIN"  name="bank_cd" value="UBIN" type="radio" >
            <label for="UBIN">UNION BANK OF INDIA</label>
        </li>

    </ul>
</div>
</div>

   <div class="col-sm-9 col-xs-12 rowtp-mar " id="prefered-banking-details" style="display: none;">
    <div class="col-xs-12 offset-sm-1 com-sm-1">
    <em class="m-cir" >Please select a bank</em>
    <p></p>
</div>
<div>
    <ul class="no-list bl-list">
        <!---->
        <li>
            <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="SBI"  name="bank_cd" value="SBI" type="radio" >
            <label for="UTIB">STATE BANK OF INDIA</label>
        </li>
        <!---->
       
    </ul>
</div>
</div>
                        <!---->
                        <!---->
                        <!---->
                    </div>
                </div>
                <div id="tnc" class="row" style="display: none;">
                    <div class="offset-sm-3 col-sm-9">
                        <input id="checkbox-tnc" type="checkbox" data-ng-model="test.termsCon" class="chkbx ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched">
                        <label for="checkbox-consent"  class="btn-link">Terms and Conditions apply.</label>
                    </div>
                   
                </div>
   <?php } ?>
    <div class="row rowtp-mar">
        <form method="post" action="<?php echo base_url('home/make_payment/'.$result->id); ?>">
        <div class="col-xs-12 text-right">
          
            <a href="<?php echo base_url('home/download_pdf/'.$result->id); ?>" class="btn btn-default" title="Download">Download</a>
        <?php if ($result->status != 3) { ?>
            <input type="submit" name="action" value="Make Payment" class="btn btn-primary sendButton"title="Make Payment" style="width: 15%;" id="payment" disabled>
         <?php } ?>
        </div>
        </form>
    </div>
</div>
 <?php if ($result->status != 3) { ?>
<div class="row">
    <div class="col-xs-12">
        <span>
            <strong>
                <span class="fa fa-info-circle"></span>
                <span data-ng-bind="trans.HLP_GRV">If amount is deducted from bank account and not reflected in electronic cash ledger, you may raise grievance under Services&gt;Payments&gt;Grievance against payment(GST PMT-07) </span>
            </strong>
        </span>
    </div>
    <div class="col-xs-12">
        <span>
            <strong>
                <span class="fa fa-info-circle"></span>
                <span data-ng-bind="trans.HLP_BANK_STATUS_EPY">*Awaiting Bank Confirmation: For e-payment mode of payment, if the maker has made a transaction and checker approval is not communicated by bank to GST System.</span>
            </strong>
        </span>
        <br>
    </div>
    <div class="col-xs-12">
        <span>
            <strong>
                <span class="fa fa-info-circle"></span>
                <span data-ng-bind="trans.HLP_BANK_STATUS_OTC">*Awaiting Bank Clearance: For OTC mode of payment, if bank has acknowledged the challan but remittance confirmation is not communicated by bank to GST System.</span>
            </strong>
        </span>
    </div>
</div>
 <?php } ?>
<?php endif; ?>
<?php } ?>

            <?php if ($result->mode_of_payment == 2) { ?>
             <div>
                <h4 data-ng-bind="trans.HLP_OTC_DTL" class="text-center">Over The Counter Details</h4>
                <div class="tbl-format">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-4 col-xs-12 ">
                                <p data-ng-bind="trans.LBL_PAY_THG">Payment through</p>
                                <span><strong data-ng-bind="challanData.sub_pay_mod">Cheque</strong></span>
                            </div>
                            <div class="col-sm-4 col-xs-12 ">
                                <p data-ng-bind="trans.LBL_BANK_NAME">Bank Name</p>
                                <span><strong data-ng-bind="challanData.bank_nam">CANARA BANK</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (empty($is_pdf)): ?>
                    <div class="col-xs-12 text-right">
                      <a href="<?php echo base_url('home/download_pdf/'.$result->id); ?>" class="btn btn-primary">Download PDF</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php }?>
             <?php if ($result->mode_of_payment == 3) { ?>
             <div>
                <h4 data-ng-bind="trans.HLP_NER" class="text-center">NEFT/RTGS</h4>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong data-ng-bind="trans.LBL_BF_DTL">Beneficiary Details</strong></p>
                    </div>
                </div>
                <div class="tbl-format">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-6 col-xs-12">
                                <p data-ng-bind="trans.LBL_IFSC_CD">IFSC Code</p>
                                <span><strong data-ng-bind="challanData.bank_cd">AIRP</strong></span>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <p data-ng-bind="trans.LBL_RMT_BK">Remitting Bank Name</p>
                                <span><strong data-ng-bind="challanData.bank_nam">AIRTEL PAYMENTS BANK LIMITED</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong data-ng-bind="trans.HEAD_TRNF_NEFT">TRANSFER OF FUNDS THROUGH NEFT</strong></p>
                    </div>
                </div>
                <div class="tbl-format">
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-6 col-xs-12">
                                <p data-ng-bind="trans.LBL_BEN_NAM">Beneficiary Name</p>
                                <span><strong>GST</strong></span>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <p data-ng-bind="trans.LBL_BNF_ACCT">Beneficiary Account No.</p>
                                <span><strong data-ng-bind="challanData.cpin">17080700191365</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="inner">
                            <div class="col-sm-6 col-xs-12">
                                <p data-ng-bind="trans.HEAD_AMT">Amount</p>
                                <span><strong ><?php echo $result->total_challan_amount;?></strong></span>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <p class="reg" data-ng-bind="trans.LBL_BNF_IFSC">Beneficiary IFSC</p>
                                <span><strong data-ng-bind="trans.LBL_RBI_IFSC">RBIS0GSTPMT</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <?php if (empty($is_pdf)): ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                        <a href="<?php echo base_url('home/download_pdf/'.$result->id); ?>" class="btn btn-primary">Download</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php } ?>
            
            

            <!---->
            <!---->
            <!---->
    </div>
    
</div>



        </div>
    </div>
<?php if (!empty($is_pdf)) { ?>
    <style>
        table, th, td {
            border: 1px solid #000;
            border-collapse: collapse;
            text-align: center;
            font-family: 'DejaVu Sans', sans-serif;
            padding: 5px;
            text-align: center;
        }
         
    </style>
<?php } ?>

<script>

    // When Net Banking is clicked
    $('#nb-button').on('click', function () {
        $('#net-banking-details').show();
        $('#prefered-banking-details').hide();
        
       
    });

    // When Preferred Banks is clicked
    $('#pb-button').on('click', function () {
        $('#net-banking-details').hide();
        $('#prefered-banking-details').show();
       
    });

    $('#pb-button, #nb-button').on('click', function () {
        $('#tnc').show(); 
    });
    
    // Enable or disable the payment button based on checkbox state
    $('#checkbox-tnc').on('change', function () {
        if ($(this).is(':checked')) {
            $('#payment').prop('disabled', false);
        } else {
            $('#payment').prop('disabled', true);
        }
    });

document.getElementById('payment').addEventListener('click', function() {
    // Hide all elements with class 'e_pay'
    var elements = document.querySelectorAll('.e_pay');
    elements.forEach(function(el) {
        el.style.display = 'none';
    });
});


</script>



    



