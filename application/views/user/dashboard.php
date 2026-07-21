<!DOCTYPE html><html lang="en"><head>
    

<style type="text/css">
    [data-ng-view] {
    padding: 0 15px 15px 15px
    }

    @media screen and (max-width: 480px) {
        [data-ng-view] {
            padding:0px
        }
    }
    .rowtp-mar {
        margin-top: 20px
    }
    .dash-content {
        background: #fff;
        float: left;
        width: 72%;
        display: inline-block
    }

    @media screen and (max-width: 768px) {
        .dash-content {
            width:100%
        }
    }

    .wbg {
        background: #fff
    }

    .dash-tables ul {
        background: #17c4bb;
        padding: 15px;
        margin-bottom: 0
    }

    .dash-tables ul li {
        list-style: none;
        display: inline-block
    }

    .dash-tables ul li p {
        font-family: Arial;
        color: #0b1e59;
        font-weight: 500;
        margin: 0
    }

    .dash-tables ul li p.lbl {
        font-size: 12px
    }

    .dash-tables ul li p.ttl {
        font-size: 24px
    }

    @media screen and (max-width: 991px) {
        .dash-tables ul li p.ttl {
            font-size:18px
        }
    }

    @media screen and (max-width: 680px) {
        .dash-tables ul li p.ttl {
            font-size:14px
        }
    }

    .dash-tables ul li:first-child {
        width: 30%
    }

    @media screen and (max-width: 551px) {
        .dash-tables ul li:first-child {
            width:48%
        }
    }

    .dash-tables ul li:nth-child(2) {
        width: 20%
    }

    @media screen and (max-width: 551px) {
        .dash-tables ul li:nth-child(2) {
            width:48%
        }
    }

    .dash-tables ul li:nth-child(3),.dash-tables ul li:nth-child(4) {
        width: 20%
    }

    @media screen and (max-width: 551px) {
        .dash-tables ul li:nth-child(3),.dash-tables ul li:nth-child(4) {
            width:47%
        }
    }

    .dash-tables ul li:nth-child(5) {
        width: 7%
    }

    @media screen and (max-width: 551px) {
        .dash-tables ul li:nth-child(5) {
            width:2%
        }
    }

    @media screen and (max-width: 600px) {
        .dash-tables ul li:nth-child(5) {
            width:3%
        }
    }

    .dash-tables ul li:nth-child(5) a {
        text-align: center;
        color: #0b1e59
    }

    .dash-tables ul li:nth-child(5) a i {
        font: normal normal normal 14px/1 FontAwesome
    }

    .dash-tables ul li:nth-child(5) a i:before {
        content: "\f106";
        font-size: 50px
    }

    @media screen and (max-width: 600px) {
        .dash-tables ul li:nth-child(5) a i:before {
            content:"\f106";
            font-size: 30px
        }
    }

    .dash-tables ul li:nth-child(5) a.collapsed i:before {
        content: "\f107";
        font-size: 50px
    }

    @media screen and (max-width: 600px) {
        .dash-tables ul li:nth-child(5) a.collapsed i:before {
            content:"\f107";
            font-size: 30px
        }
    }

    .dash-tables ul li a.down {
        color: #0b1e59;
        font-size: 12px
    }

    .dash-tables ul li a.down i {
        padding: 1px 4px 1px 6px;
        border-radius: 50%;
        background: #0b1e59;
        color: #fff
    }

    .dp-widgt {
        padding: 5% 8%
    }

    .dp-con-widgt-ttl {
        padding: 1.5%;
        border-bottom: 1px solid gray
    }

    .dp-con-widgt-ttl h4 {
        font-family: Arial;
        display: inline-block;
        font-size: 24px;
        color: black;
        font-weight: 500;
        padding-right: 20px;
        border-right: 1px solid gray
    }

    .dp-con-widgt-ttl a {
        color: #1976d2;
        font-weight: 600;
        vertical-align: super
    }

    .dp-con-widgt-ttl .dropdown {
        display: inline-block;
        padding: 0 10px
    }

    .dp-con-widgt-ttl .dropdown:after {
        content: "\f107";
        font: normal normal normal 14px/1 FontAwesome;
        vertical-align: super
    }
    .dp-con-widgt {
        padding: 1.5%
    }

    .dp-con-ftr {
        border-top: 1px solid gray;
        text-align: center
    }

    .dp-con-ftr p {
        margin: 10px 0
    }
    .profile {
        float: right;
        width: 25%;
        display: inline-block
    }

    @media screen and (max-width: 768px) {
        .profile {
            display:none
        }
    }
    .dash-pane {
        background: #fff
    }

    .dash-pane:first-child {
        margin-bottom: 40px
    }

    .dp-widgt {
        padding: 5% 8%
    }
    .dp-btns {
        text-align: center;
        margin: 30px 0
    }

    .dp-btns div {
        display: inline-block
    }

    .dp-con-ftr {
        border-top: 1px solid gray;
        text-align: center
    }

    .dp-con-ftr p {
        margin: 10px 0
    }
    ul.notif {
        padding-left: 0
    }

    ul.notif li {
        list-style: none
    }

    ul.notif li p {
        font-size: 12px;
        margin: 0
    }
    .tbl-search {
        text-align: right;
        padding: 10px 5px
    }

    .tbl-search * {
        display: inline-block
    }

    .tbl-search input {
        width: 200px
    }

    .dash-tables ul li p.ttl {
        font-size: 20px !important
    }

    .dash-tables ul li p.lbl {
        font-size: 16px !important
    }

    .dash-tables ul li:first-child {
        padding-bottom: 10px
    }
.facebook-button {
    color: #fff;
    background-color: #3a5795;
    padding: 0;
    border-radius: 5px;
    border-color: #3a5795;
    margin-bottom: .5em;
    text-transform:capitalize;
}

.gmail-button {
    color: white;
    background-color: #d14836;
    border-radius: 5px;
    padding: 0;
    margin-bottom: 1em;
    border-color: #d14836;
    text-transform:capitalize;
}

.sign-in-button {
    width: 50%;
    margin: 0 auto;
    margin-top: 1em
}

</style>

</head>
<body>
 

     
    
    <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
            <div class="mypage">
                <h1>GST Demo Dashboard for GST Return Filing Training</h1>
                <p>For your help, we have made a GST Demo. It is a copy of the GST website which works same as original GST Website. You can practice your returns here</p>
                <div class="row" data-ng-controller="transctrl" data-ng-init="init('services')">
                    <div class="col-xs-10">
                    </div>
                    <div class="col-xs-2">
                    </div>
                </div>
                <div class="content-pane" style="min-height: 423.75px;">
                    <!---->
                    <div data-ng-view="">
                        <style>
                        .notread {
                            font-weight: bold;
                        }
            
                        .read {
                            font-weight: normal;
                        }
            
                        .dp-con-widgt-ttl a {
                            vertical-align: bottom !important;
                        }
                        </style>
                        <div class="row rowtp-mar">
                            <!--  <p name="status_msg" class="alert"></p> -->
                            <div class="col-xs-12">
                                <div class="dash-content">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="dp-con-widgt-ttl">
                                                <h4 data-ng-bind="trans.HEAD_LEDG_BALA">Ledger Balance</h4>
                                                <span>
                                        <strong data-ng-bind="todayDt"><?php 
                                            echo date('d/m/Y', strtotime($result->b_date)); 
                                        ?>
                                        </strong>
                                            </span>
                                                <!-- <a alt="Downld" id="downld" data-ng-click="downloadFn()" data-target="#gst-course-modal"><span data-ng-bind="trans.LBL_DOWNLOAD">Download</span> <i class="arw-ryt fa fa-angle-right"></i></a> -->
                                            </div>
                                            <div class="dp-con-widgt" data-ng-init="dashboardLedgerBalance()">
                                                <div class="table-responsive">
                                                    <table class="table table-striped dptbl">
                                                        <thead style="background-color:#d6d6d6;">
                                                            <tr>
                                                                <th style="width:30%"></th>
                                                                <th class="text-center">
                                                                    <label>IGST (₹)</label>
                                                                </th>
                                                                <th class="text-center">
                                                                    <label>CGST(₹)</label>
                                                                </th>
                                                                <th class="text-center">
                                                                    <label>SGST (₹)</label>
                                                                </th>
                                                                <th class="text-center">
                                                                    <label>CESS (₹)</label>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!---->
                                                            <tr data-ng-repeat="item in responseArray">
                                                                <td>
                                                                    <label data-ng-bind="item.typeOfCash">Electronic Liability Register (Return related)</label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.igst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.cgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.sgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.cess_tot_bal">0</label>
                                                                </td>
                                                            </tr>
                                                            <!---->
                                                            <tr data-ng-repeat="item in responseArray">
                                                                <td>
                                                                    <label data-ng-bind="item.typeOfCash">Electronic Cash Ledger</label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.igst_tot_bal"><?php echo $result->cash_ledger_igst;?></label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.cgst_tot_bal"><?php echo $result->cash_ledger_cgst;?></label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.sgst_tot_bal"><?php echo $result->cash_ledger_sgst;?></label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.cess_tot_bal"><?php echo $result->cash_ledger_cess;?></label>
                                                                </td>
                                                            </tr>
                                                            <!---->
                                                            <tr data-ng-repeat="item in responseArray">
                                                                <td>
                                                                    <label data-ng-bind="item.typeOfCash">Electronic Credit Ledger</label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.igst_tot_bal"><?php echo $result->credit_ledger_integrated_tax;?></label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.cgst_tot_bal"><?php echo $result->credit_ledger_central_tax;?></label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.sgst_tot_bal"><?php echo $result->credit_ledger_state_tax;?></label>
                                                                </td>
                                                                <td class="currency">
                                                                    <label data-ng-bind="item.cess_tot_bal"><?php echo $result->credit_ledger_cess;?></label>
                                                                </td>
                                                            </tr>
                                                            <!---->
                                                            <tr data-ng-repeat="item in responseArray">
            
                                                                <td>
                                                                    <label data-ng-bind="item.typeOfCash">Electronic Credit Reversal and Re-claimed Statement</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.igst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.cgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.sgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.cess_tot_bal">0</label>
                                                                </td>
                                                            </tr>
                                                            <tr data-ng-repeat="item in responseArray">
            
                                                                <td>
                                                                    <label data-ng-bind="item.typeOfCash">RCM Liability/ITC Statement</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.igst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.cgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.sgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.cess_tot_bal">0</label>
                                                                </td>
                                                            </tr>
                                                            <tr data-ng-repeat="item in responseArray">
            
                                                                <td>
                                                                    <label data-ng-bind="item.typeOfCash">Negative liability statement - Regular Taxpayers</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.igst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.cgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.sgst_tot_bal">0</label>
                                                                </td>
                                                                <td class="currency wordwrapp">
                                                                    <label data-ng-bind="item.cess_tot_bal">0</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 dp-btns">
                                                        <div>
                                                            <!-- <a type="button" class="btn btn-primary"  onclick="location.href='/gst/return/dashboard/'" ><span data-ng-bind="trans.LBL_FILE_RETUR">File Returns </span><i class="fa fa-angle-right"></i></a> -->
                                                            <a type="button" class="btn btn-primary" href="returnDashbord"><span >File Returns </span><i class="fa fa-angle-right"></i></a>
                                                        </div>
                                                        <div>
                                                            <!-- <a type="button" class="btn btn-primary pad-l-50 pad-r-50"  onclick="location.href='/gst/challan/'" ><span data-ng-bind="trans.LBL_PAY_TAX">Pay tax </span><i class="fa fa-angle-right"></i></a> -->
                                                            <a type="button" class="btn btn-primary pad-l-50 pad-r-50" href="gst_challan"><span >Pay tax </span><i class="fa fa-angle-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="col-xs-12 dp-btns">
                                                        <div>
                                                            <button type="button" class="btn btn-danger pad-l-50 pad-r-50"><span title="Retry">Retry</span></button>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    
                                                    <div class="col-xs-12 dp-btns">
                                                        <div>
                                                            <button type="button" class="btn btn-danger pad-l-50 pad-r-50" onclick="location.href='opening_balance'"><span title="Change Opening Balance">Change Opening Balance and GSTR2B Values</span></button>
                                                        </div>
                                                    </div>
                                                    
            
                                                </div>
                                            </div>
                                            <div class="dp-con-ftr">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile">
                                    <div class="dash-pane">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="dp-widgt">
                                                    <p class="tp-dash-ttl"><strong data-ng-bind="busName"><?php echo ucwords($resultTaxpayer->name); ?></strong></p>
                                                    <p class="tp-dash-gstin"><strong data-ng-bind="uid"><?php echo $resultTaxpayer->gstno;?></strong></p>
                                                    <!-- <a alt="vp" target="_self" class="tp-pfl-lnk" ng-click="viewUserFn()" data-target="#gst-course-modal" ><span data-ng-bind="trans.LBL_VW_PROF">View Profile</span> <i class="arw-ryt fa fa-angle-right"></i></a> -->
                                                    <a alt="vp" target="_self" class="tp-pfl-lnk" ng-click="viewUserFn()" onclick="location.href='taxpayer'"><span>View Profile</span> <i class="arw-ryt fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash-pane">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <ul class="nav nav-tabs tp-tabs">
                                                    <li class="active"><a alt="notice" data-toggle="tab" href="#home" style="padding-left: 4px;">Notices/Orders</a></li>
                                                    <li><a alt="menu1" data-toggle="tab" href="#menu1">Saved Forms</a></li>
                                                </ul>
                                                <div class="tab-content dp-widgt">
                                                    <div id="home" class="tab-pane fade in active pad-b-130">
                                                      <ul class="notif" ng-repeat="notice in notices track by $index ">
                                                        <li ng-show="$index
                                                                &lt;5" ng-class="{'read': notice.isRead == 'Y' , 'notread': notice.isRead == 'N'}" class="notread">
                                                          <!---->
                                                          <!---->
                                                          <a class="link" data-ng-click="getGSTR3A(notice.appDefId,notice.noticeOrderId,notice.dtOfIssue,notice.pdfDownloadURL)" data-ng-if="notice.applnCd=='APL3A'" data-ng-bind="notice.descr">Notice to return defaulter u/s 46 for not filing return</a>
                                                          <!---->
                                                        </li>
                                                        <!---->
                                                      </ul>
                                                      <!---->
                                                      <ul class="notif" ng-repeat="notice in notices track by $index ">
                                                        <li ng-show="$index
                                                                    &lt;5" ng-class="{'read': notice.isRead == 'Y' , 'notread': notice.isRead == 'N'}" class="notread">
                                                          <!---->
                                                          <!---->
                                                          <a class="link" data-ng-click="getGSTR3A(notice.appDefId,notice.noticeOrderId,notice.dtOfIssue,notice.pdfDownloadURL)" data-ng-if="notice.applnCd=='APL3A'" data-ng-bind="notice.descr">Notice to return defaulter u/s 46 for not filing return</a>
                                                          <!---->
                                                        </li>
                                                        <!---->
                                                      </ul>
                                                      <!---->
                                                      <ul class="notif" ng-repeat="notice in notices track by $index ">
                                                        <li ng-show="$index
                                                                        &lt;5" ng-class="{'read': notice.isRead == 'Y' , 'notread': notice.isRead == 'N'}" class="read">
                                                          <!---->
                                                          <a class="link" data-ng-click="noticedwld(notice)" data-ng-bind="notice.descr" data-ng-if="notice.applnCd!=='APL3A'">Registration SCN</a>
                                                          <!---->
                                                          <!---->
                                                        </li>
                                                        <!---->
                                                      </ul>
                                                      <!---->
            
                                                    </div>
                                                    <div id="menu1" class="tab-pane fade pad-b-50">
                                                        <p>No record found</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-show="showTurnover" class="showTurnover">
                                  <div>
                                    <span class="atv">View Turnover Details of 07AXNPS2483B2Z9</span>
                                    <span class="getAggTurn">
                                      <a class="link_id" ng-click="advisoryLink()">Advisory</a>
                                    </span>
                                    <div class="finyear"> Financial Year <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" data-ng-change="changeYear(selectedFinYear)" data-ng-model="selectedFinYear" data-ng-options="fin for fin in finYears">
                                        <option label="2019-20" value="string:2019-20">2019-20</option>
                                        <option label="2020-21" value="string:2020-21">2020-21</option>
                                        <option label="2021-22" value="string:2021-22">2021-22</option>
                                        <option label="2022-23" value="string:2022-23">2022-23</option>
                                        <option label="2023-24" value="string:2022-23" selected="selected">2023-24</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div ng-show="isTableShow" class="tableAATOCls">
                                    <!---->
                                    <div class="table_container">
                                      <!---->
                                      <div class="table_container" ng-if="isNonSlabFlag &amp;&amp; !responseVal.filingFlag">
                                        <div class="table12" style="width: 419px;">
                                            <!----><div class="aato_head" ng-if="finDispltBTn">
                                                <span class="">Final Turnover : <span>₹ 56,63,840.27</span></span>                                    
                                            </div><!---->
                                            <!----><div class="aato_head" ng-if="finDispltBTn">
                                                <span class="">Final Aggregate Turnover : <span>₹ 56,63,840.27</span></span>                                    
                                            </div><!---->
                                        </div>
                                        <div class="tableRs">(Amount in ₹)</div>
                                        <table class="table inv table-bordered exp table-striped ng-table">
                                          <thead class="hhd">
                                            <tr class="tableTrHei">
                                              <th class="text-center headerWidth">
                                                <label></label>
                                              </th>
                                              <th class="headerWidth">
                                                <label>Estimated</label>
                                              </th>
                                              <th class="headerWidth">
                                                <label>Based on Returns Filed</label>
                                              </th>
                                              <!---->
                                              <!---->
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr class="tableTrHei">
                                              <td class="">
                                                <label>Turnover</label>
                                              </td>
                                              <td class="rightCls">
                                                <label>
                                                  <span> 31,22,488.00</span>
                                                  <!---->
                                                  <div ng-if="(responseAgg.gstinEstTo != null) &amp;&amp; strtToBtn">
                                                    <a ng-click="viewUpdateFunc()" type="button" class="btn btn-primary btn-sm margin-0 aato-btn">
                                                      <span>View/Update</span>
                                                    </a>
                                                  </div>
                                                  <!---->
                                                </label>
                                              </td>
                                              <td class="rightCls">
                                                <label> 31,22,488.00</label>
                                              </td>
                                              <!---->
                                              <!---->
                                            </tr>
                                            <tr class="tableTrHei">
                                              <td>
                                                <label>Aggregate Turnover (PAN Based)</label>
                                              </td>
                                              <td class="rightCls">
                                                <label> 31,22,488.00</label>
                                              </td>
                                              <td class="rightCls">
                                                <label> 31,22,488.00</label>
                                              </td>
                                              <!---->
                                              <!---->
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <!---->
                                      <!---->
                                      <div style="clear:both"></div>
                                      <div class="turnoverChng">
                                        <!---->
                                        <div class="getAggTurn">
                                          <a class="link_id" ng-click="getAggTurnOvrMethodology()">Click here</a> to know Turnover Calculation Methodology <p style="margin-top: 10px;">In case of any discrepancy in the turnover displayed, please lodge your grievance at <a class="link_id" href="#" target="_blank" rel="noopener noreferrer">https://selfservice.gstsystem.in/</a>
                                          </p>
                                        </div>
                                        <!---->
                                        <div class="noteSec" ng-if="responseAgg.filingDate &amp;&amp; isNonSlabFlag">
                                          <p class="noteCls">Note: The values displayed above are as 20/04/2024. Turnover value is updated dynamically as per filing of Returns. Aggregate Turnover is updated dynamically based upon the filings done by all GSTINs under the PAN. Final Turnover &amp; Aggregate Turnover will be made available post tax-officer's verification 01/07/2024. </p>
                                        </div>
                                        <!---->
                                      </div>
                                      <!-- <div>
                                        <a type="button" data-ng-show="udata.regType=='CO' || udata.regType=='NT'" class="btn btn-default pad-l-50 pad-r-50 back" href="/gst/dashboard/">
                                          <span data-ng-bind="trans.LBL_BACK">BACK</span>
                                        </a>
                                      </div> -->
                                    </div>
                                  </div>
                                </div>
            
                            </div>
                        </div>
                        <style>
                            .disabled {
                                cursor: not-allowed !important;
                                opacity: 0.6;
                            }
            
                            table {
                                table-layout: fixed;
                            }
            
                            .table_container {
                                /* width: 100%; */
                                overflow: hidden;
                                float: left;
                            }
            
                            
                            .tableAATOCls .table.inv>thead>tr th {
                                text-align: -webkit-left !important;
                            }
            
                            .tableAATOCls table {
                                table-layout: auto !important;
                            }
                            
                            .table-bordered>tbody>tr>td {
                                border: 2px solid #ddd;
                            }
            
                            .table-bordered>thead>tr>th{
                                border: 2px solid #ddd;
                            }
            
                            .rightCls {
                                text-align: right;
                            }
            
                            .tableRs {
                                float: right;
                                font-weight: bold;
                            }
                            
                            .dash-main-container {
                                width: 100%;
                                float: left
                            }
            
                            .showTurnover {
                                width: 75%;
                                margin-top: 10px;
                                float: left;
                            }
                            
                            .titleDiv {
                               margin-bottom: 10px;
                            }
            
                            .aato-btn {
                                text-transform:initial !important;
                            }
            
                            .aato_head {
                                padding: 10px;
                                font-weight: bold;
                                background-color: #d6d6d6;
                                margin-bottom: 10px;
                            }
            
                            .finyear {
                                margin-bottom: 10px;
                                margin-top: 10px;
                                font-weight: bold;
                            }
            
                            .finyear .form-control {
                                width: 136px;
                                display: inline-block;
                            }
            
                            .link_id {
                                text-decoration: underline;
                                /* font-style: italic; */
                                font-weight: bold;
                            }
            
                            .noteSec {
                                clear: both;
                                display: block;
                                margin-bottom: 15px;
                                font-weight: bold;
                                color: red;
                            }
            
                            .getAggTurn {
                                font-weight: bold;
                                padding-left: 5px;
                                margin-bottom: 10px;
                            }
            
                            .atv {
                                font-size: 16px;
                                font-weight: bold;
                                color: black;
                                display: inline-block;
                                border-right: 2px solid gray;
                                padding-right: 10px;
                            }
            
                            .noteCls {
                                text-align: justify;
                                text-justify: inter-word;
                            }
                        </style>
            
                        <script>
                        $(document).on('click', '.disabled', function() {
                            return false;
                        });
                        </script>
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


    






</body></html>