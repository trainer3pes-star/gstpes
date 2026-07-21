
<style type="text/css">

div#add-details img {
    width: 20px;
}
.headcard {
    text-align: left;
    box-shadow: 4px 4px 10px rgb(153, 149, 149);
    border-top-left-radius: 0.5em;
    border-top-right-radius: 0.5em;
    background-color: #2c4e86;
    font-size: 1.09em;
    font-weight: bold;
    height: 4em;
    padding-left: 0.2em;
    padding-right: 0.2em;
    color: white;
    padding-top: 0.5em;
    margin-top: 0.7em;
    /* background-image: linear-gradient(#f1f4ff, white); */
}
.newcard {
    text-align: center;
    box-shadow: 4px 4px 10px rgb(153, 149, 149);
    border-bottom-left-radius: 0.5em;
    border-bottom-right-radius: 0.5em;
    background-color: white;
    font-size: large;
    font-weight: bold;
    border: 1px solid grey;
    /* height: 4.5em; */
    padding-left: 0.2em;
    padding-right: 0.2em;
    padding-top: 1em;
    padding-bottom: 1em;
    background-image: linear-gradient(#f1f4ff, white);
}
.card-title, .tile-title {
    white-space: normal;          /* Allow text wrapping */
    word-wrap: break-word;        /* Break long words */
    overflow: visible;            /* Don't hide overflow */
    display: block;               /* Ensure it takes up its own line */
    height: auto !important;      /* Allow height to expand */
    line-height: 1.2;             /* Optional: improve readability */
}

</style>


    
<div class="container py-5">
    <div class="mypage">
        <div class="row" data-ng-controller="transctrl" data-ng-init="init('returns')">
            <div class="col-xs-10">
                <div data-breadcrumb="" name="Dashboard">
                    <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                        <li><a target="" href="/gst/dashboard/" data-ng-bind="name">Dashboard</a></li>
                        <li>
                            <ng-switch on="$last">
                                <span ng-switch-default=""><a href="/gst/return/dashboard/" data-ng-bind="breadcrumb.n" target="_self">Returns</a></span>
                            </ng-switch>
                        </li>
                        <li>
                            <ng-switch on="$last">
                                <span ng-switch-when="true">GSTR-1/FF</span>
                            </ng-switch>
                        </li>
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
        <div data-ng-controller="mainctrl" ng-view="">
            <div data-ng-init="getGSTR1Summ()" class="col-lg-12">
                <form name="gstr1" id="" class="ng-pristine ng-valid">
                    <div class="row" style="background-color: #17c4bb; color: white ">
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <h4 class="pull-left" ng-if="formNameNew!='GSTR1-A' &amp;&amp; IFF==false" data-ng-bind="trans.HDR_GSTR1" style="padding-top: 0.3em;font-weight: bold;">GSTR-1 -
                                Details of outward supplies of goods or services</h4>
    
    
                            <!-- <a class="pull-right" data-ng-click="page('auth/gstr1/pending/action/summary')" data-ng-bind="trans.LBL_CHK_PROS"></a> -->
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <h4>
                                <button onclick="window.location.reload(true);" class="btn btn-primary btn-circle btn-sm pull-right" title="Refresh" data-ng-click="refresh()" data-ng-disabled="refbtn" style="
                                    margin-top: 0px;">
                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                </button>
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" style="margin-top: 0px;margin-right:10px" data-ng-click="help()">
                                        <span>Help</span>&nbsp;
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    </button>
                                    <a ng-if="IFF==false" data-download="true" class="btn btn-primary btn-sm pull-right" target="_blank" href="//tutorial.gst.gov.in/downloads/E-invoice_Advisory_GSTR-1_v2.pdf" style="margin-top: 0px;margin-right:10px" rel="noopener noreferrer">e-Invoice
                                        Advisory</a>
                                </div>
                            </h4>
    
                        </div>
                    </div>
    
                    <!-- <div class="alert alert-msg alert-info alert-dismissible " data-ng-if="message">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    <i class="fa fa-times"></i>
                                </button>
                                <i class="fa fa-info-circle"></i> 
                            </div> -->
    
                </form>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body" style="font-size:14px">
                            <p class="mand-text" data-ng-bind="trans.HLP_MAND_FIELD">Indicates Mandatory Fields</p>
                             <?php $this->load->view('user/trade_info', ['resultTaxpayer' => $resultTaxpayer]); ?>

                        </div>
                    </div>
                </div>
            </div>
         
            <!--
                         <marquee onmouseover="this.stop();" onmouseout="this.start();">The number of Invoices/Records that can be viewed and entered online for a table /section in Form GSTR-1 e.g. B2B, B2CL etc.  is restricted to 500 invoice/record items only which can be comfortably browsed online. Taxpayer having invoices/records more than the said limit, may please use the  ”Offline Utility tool” available on the portal for viewing/modifying invoice data. Please download the data ( Prepare Offline &gt; Download Tab &gt; Generate File) and view it in the Offline Tool. This download feature will be made available shortly. For further details on modifying the invoice using Offline Tool, please visit <a data-ng-href="" target="_blank"><b>here</b></a></marquee>-->
            <!-- <div class="alert alert-msg alert-info alert-dismissible " >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <i class="fa fa-times"></i>
                        </button>
                        <i class="fa fa-info-circle"></i> 
                    </div>  -->
            <div id="alert-box-custom"></div>
            
    
            <!-- <div class="row">
                 <div class="col-lg-42 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="no-mar disp-in" data-ng-bind="trans.HDR_GSTR2">GSTR-1 - Invoice Details</h4>
                    <span class="pull-right ret-t-info"><span class="impcol">**</span> Important Notice: If the invoices are more than 500 . Please check <a data-ng-click="callpopup()" data-toggle="modal" data-target="#confirmDlg">here</a></span>
                </div> 
            </div> -->
            <div data-ng-if="IFF==false" class="row card">
                <div class="col-xs-12">
                    <div class="row" style="background-color:#ffffff">
                        <div class="panel-default bgWhite">
                            <input type="checkbox" class="chkbx ng-pristine ng-untouched ng-valid ng-empty" id="nilCheckbox" name="nilCheckbox" data-ng-model="nil.nilCheckbox" data-ng-click="nilFiling()" data-ng-disabled="nilBoxDisable || fil_stat=='FIL' || isGstpUser=='Y'">
                            <label>File Nil GSTR-1</label>
                        </div>
                        
                        <div id="onnilcheckbox" style="border: 1px solid #2c4e86;padding: 8px;font-size:14px;display:none;" data-ng-if="showNilFilingNote">
                            <h5 style="color:#00f !important;"><i><strong data-ng-bind="trans.NIL_FIL_NOTE">Note: NIL Form
                                        GSTR-1 can be filed by you if you have:</strong></i></h5>
                            <ol style="color:#00f !important;" type="a">
                                <li><span data-ng-bind="trans.NIL_FIL_NOTE_1">No Outward Supplies (including supplies on
                                        which tax is to be charged on reverse charge basis, zero rated supplies and deemed
                                        exports) during the month or quarter for which the form is being filed for</span>
                                </li>
                                <li><span data-ng-bind="trans.NIL_FIL_NOTE_2">No Amendments to be made to any of the
                                        supplies declared in an earlier form</span></li>
                                <li><span data-ng-bind="trans.NIL_FIL_NOTE_3">No Credit or Debit Notes to be declared /
                                        amended</span></li>
                                <li><span data-ng-bind="trans.NIL_FIL_NOTE_4">No details of advances received for services
                                        is to be declared or adjusted</span></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12" id="add-record-details-box">
                    <div class="row">
                        <button type="button" class="btn btn-primary col-xs-12 btn-lg text-left" style="text-align: left; border-radius: 0em; padding: 0.5em;font-size: 18px;" data-ng-click="showAddRecDetails = !showAddRecDetails" id="add-button">ADD RECORD DETAILS <span class="text-right pull-right">
                                <i id="add-up" class="fa fa-fw fa-chevron-down ng-hide" data-ng-hide="showAddRecDetails"></i>
                                <i id="add-down" class="fa fa-fw fa-chevron-up" data-ng-show="showAddRecDetails"></i>
                            </span>
                        </button>
                    </div>
    
                    <div id="add-details" data-ng-if="showAddRecDetails" class="row">
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="return_b2b_summary_list">
                                    <div class="headcard" data-toggle="tooltip" title="Taxable outward supplies made to registered 
                                        &lt;br&gt;persons (including UIN-holders)" >
                                        <div class="text-center">4A, 4B, 6B, 6C
                                            - B2B, SEZ, DE Invoices</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.b2b.proc_cnt || totalCountSummary.sec_count.b2b.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.b2b.pen_cnt || totalCountSummary.sec_count.b2b.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span><?php echo ($b2b_count > 0) ? $b2b_count : 0; ?></span>&nbsp;

                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a href="b2c_summary" >
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.b2cl.err_cnt &amp;&amp; totalCountSummary.sec_count.b2cl.err_cnt &gt; 0)}" data-original-title="Taxable Outward Supplies to a
                                                    &lt;br&gt; unregistered person where Place of Supply
                                                        &lt;br&gt; ( State Code) is other than the
                                                            &lt;br&gt; state where supplier is located
                                                                &lt;br&gt; ( Inter-State Supplies) and Invoice
                                                                    &lt;br&gt; value is more than Rs. 2.5 Lakh">
                                        <div class="text-center" data-ng-bind="trans.LBL_B2C_INVOICES">5A - B2C (Large)
                                            Invoices</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.b2cl.proc_cnt || totalCountSummary.sec_count.b2cl.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.b2cl.pen_cnt || totalCountSummary.sec_count.b2cl.err_cnt)" data-original-title="Processed Records">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span><?php echo ($b2c_count > 0) ? $b2c_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a href="exports_invoice_list">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.exp.err_cnt &amp;&amp; totalCountSummary.sec_count.exp.err_cnt &gt; 0)}" data-original-title="Supplies Exported">
                                        <div class="text-center" data-ng-bind="trans.LBL_EXPORTS_INVOICES">6A - Exports
                                            Invoices</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.exp.proc_cnt || totalCountSummary.sec_count.exp.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.exp.pen_cnt || totalCountSummary.sec_count.exp.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span><?php echo ($export_count > 0) ? $export_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
    
                            <div class="col-lg-3" ng-if="!showHidenewret">
                                <a href="b2cs_list">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.b2cs.err_cnt &amp;&amp; totalCountSummary.sec_count.b2cs.err_cnt &gt; 0)}" data-original-title="Taxable Supplies(Net of debit notes and credit notes) 
                                                                                        &lt;br&gt;to unregistered persons other than the supplies 
                                                                                            &lt;br&gt;covered in Table 5">
                                        <div class="text-center" data-ng-bind="trans.LBL_B2C_S">7 - B2C (Others)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" >
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span ><?php echo ($b2cs_count > 0) ? $b2cs_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
    
                        </div>
                        <div class="row">
    
                            <div class="col-lg-3">
                                <a href="online_nil_rated_supplies">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.nil.err_cnt &amp;&amp; totalCountSummary.sec_count.nil.err_cnt &gt; 0)}" data-original-title="Nil rated,  Exempted  and Non GST outward supplies">
                                        <div class="text-center" data-ng-bind="trans.HEAD_NIL">8A, 8B, 8C, 8D - Nil Rated
                                            Supplies</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.nil.proc_cnt || totalCountSummary.sec_count.nil.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.nil.pen_cnt || totalCountSummary.sec_count.nil.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.nil.proc_cnt"> <span ><?php echo $nil_count; ?></span>&nbsp;</span>&nbsp;
                                            </span>
     
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
    
                            <div class="col-lg-3">
                                <a href="registered_summary_list" >
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.cdnr.err_cnt &amp;&amp; totalCountSummary.sec_count.cdnr.err_cnt &gt; 0)}" data-original-title="Details of Credit / Debit Notes issued to registered taxpayers">
                                        <div class="text-center" data-ng-bind="trans.LBL_CRED_DEBT_NOTES_REG">9B - Credit /
                                            Debit Notes (Registered)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.cdnr.proc_cnt || totalCountSummary.sec_count.cdnr.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.cdnr.pen_cnt || totalCountSummary.sec_count.cdnr.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span ><?php echo $registered_count; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="unregistered_note_list" data-ng-click="page_gstr1_summ( 'auth/gstr1/cdn/unregistered/summary',totalCountSummary.sec_count.cdnur.proc_cnt,totalCountSummary.sec_count.cdnur.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="Details of Credit/Debit Notes for unregistered user" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.cdnur.err_cnt &amp;&amp; totalCountSummary.sec_count.cdnur.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.LBL_CREDIT_DEBIT_NOTES_UNREG1">9B -
                                            Credit / Debit Notes (Unregistered)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.cdnur.proc_cnt || totalCountSummary.sec_count.cdnur.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.cdnur.pen_cnt || totalCountSummary.sec_count.cdnur.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                 <span ><?php echo ($unregistered_count > 0) ? $unregistered_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
    
                            <div class="col-lg-3">
                                <a href="advtax_liability_list" >
                                    <div class="headcard" data-toggle="tooltip" title="Advance amount received in the tax period&lt;br&gt;for which invoice has not been issued&lt;br&gt;(tax amount to be added to output tax liability)." data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.at.err_cnt &amp;&amp; totalCountSummary.sec_count.at.err_cnt &gt; 0)}">
                                        <div class="text-center tile-title" data-ng-bind="trans.TITLE_TAX_LIABILITY">11A(1), 11A(2) -
                                            Tax Liability (Advances Received)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.at.proc_cnt || totalCountSummary.sec_count.at.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.at.pen_cnt || totalCountSummary.sec_count.at.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span ><?php echo ($advtax_count > 0) ? $advtax_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
    
                        </div>
                        <div class="row">
    
                            <div class="col-lg-3">
                                <a href="tax_paid_list" data-ng-click="page_gstr1_summ( 'auth/gstr1/txpd/summary',totalCountSummary.sec_count.txpd.proc_cnt,totalCountSummary.sec_count.txpd.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="Advance amount received in earlier tax period&lt;br&gt;and adjusted against the supplies being shown in&lt;br&gt;this tax period in Table Nos. 4,5,6 and 7." data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.txpd.err_cnt &amp;&amp; totalCountSummary.sec_count.txpd.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.TITLE_TAX_PAID1">11B(1), 11B(2) -
                                            Adjustment of Advances</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.txpd.proc_cnt || totalCountSummary.sec_count.txpd.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.txpd.pen_cnt || totalCountSummary.sec_count.txpd.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                 <span ><?php echo ($taxPaid_count > 0) ? $taxPaid_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                            </div>
    
    
                            <div class="col-lg-3">
                                <a href="hsn_summary" >
                                    <div class="headcard" data-toggle="tooltip" title="12 - HSN - wise summary of outward supplies" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.hsn.err_cnt &amp;&amp; totalCountSummary.sec_count.hsn.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.TITLE_HSN_SAC">12 - HSN-wise summary of
                                            outward supplies</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.hsn.proc_cnt || totalCountSummary.sec_count.hsn.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.hsn.pen_cnt || totalCountSummary.sec_count.hsn.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                 <span ><?php echo ($hsn_count > 0) ? $hsn_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="hsndat.ttl_rec"></span> -->
                            </div>
    
    
                            <div class="col-lg-3">
                                <a href="document_summary" data-ng-click="page_gstr1_summ('auth/gstr1/document/summary',totalCountSummary.sec_count.doc.proc_cnt,0)">
                                    <div class="headcard" data-toggle="tooltip" title="13 - Documents issued during the tax period " data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.doc.err_cnt &amp;&amp; totalCountSummary.sec_count.doc.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.TITLE_DOC">13 - Documents Issued</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.doc.proc_cnt || totalCountSummary.sec_count.doc.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.doc.pen_cnt || totalCountSummary.sec_count.doc.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span ><?php echo ($document_count > 0) ? $document_count : 0; ?></span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                    data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3" >
                                <a href="online_ecom_summary" >
                                <div class="headcard" data-toggle="tooltip" title="" data-original-title="Details of the supplies made through e-commerce operators&lt;br&gt;on which e-commerce operators are liable to collect tax&lt;br&gt;under section 52 of the Act or liable to pay tax u/s 9(5)&lt;br&gt;[Supplier to report]">
                                    <div class="text-center" data-ng-bind="trans.TITLE_ECOM_OPT_14">14 - Supplies made through ECO</div>
                                    <br>
                                </div>
                                   <div class="newcard">
                                           <div>
                                           <span class="processed" title="Processed Records" data-toggle="tooltip">
                                               <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span ><?php echo ($ecom_count > 0) ? $ecom_count : 0; ?></span>&nbsp;
                                           </span>
                                           
                                           
                                       </div>
                                   </div>
                               </a>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" data-ng-if="ecomOptEnabled">
                                <a href="online_supplies_summary">
                                    <div class="headcard" data-toggle="tooltip" title="" data-original-title="Details of the supplies made through e-commerce&lt;br&gt; operators on which e-commerce operator is liable &lt;br&gt; to pay tax u/s 9(5) [e-commerce operator to report]">
                                        <div class="text-center" data-ng-bind="trans.TITLE_SUP_15">15 - Supplies U/s 9(5)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                        <span class="processed" title="Processed Records" data-toggle="tooltip">
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                               <span ><?php echo ($supplies_count > 0) ? $supplies_count : 0; ?></span>&nbsp;
                                        </span>
                                        
                                        
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
    
                </div>
                <div class="col-xs-12" id="amend-record-details-box">
                    <div class="row">
                        <button type="button" class="btn btn-primary col-xs-12 btn-lg text-left" style="text-align: left; border-radius: 0em; padding: 0.5em;font-size: 18px;" data-ng-click="showAmendRecDetails = !showAmendRecDetails" id="amend-button">AMEND RECORD
                            DETAILS <span class="text-right pull-right">
                                <i id="amend-up" class="fa fa-fw fa-chevron-down" data-ng-hide="showAmendRecDetails"></i>
                                <i id="amend-down" class="fa fa-fw fa-chevron-up ng-hide" data-ng-show="showAmendRecDetails"></i>
                            </span>
                        </button>
                    </div>
                    <div id="showAmendRecDetails" class="row ng-hide">
                        <div class="row">
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ( 'auth/gstr1/b2b/amendment/summary',totalCountSummary.sec_count.b2ba.proc_cnt,totalCountSummary.sec_count.b2ba.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.b2ba.err_cnt &amp;&amp; totalCountSummary.sec_count.b2ba.err_cnt &gt; 0)}" data-original-title="Amendments to details of Outward Supplies to a registered person of earlier tax periods">
                                        <div class="text-center" data-ng-bind="trans.LBL_AMNDED_B2B_INV">9A - Amended B2B
                                            Invoices</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.b2ba.proc_cnt || totalCountSummary.sec_count.b2ba.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.b2ba.pen_cnt || totalCountSummary.sec_count.b2ba.err_cnt)" data-original-title="Processed Records">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.b2ba.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                        data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ( 'auth/gstr1/b2cl/amendment/summary',totalCountSummary.sec_count.b2cla.proc_cnt,totalCountSummary.sec_count.b2cla.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="Amendment to taxable Outward Supplies to an unregistered person of earlier tax periods 
                                            &lt;br&gt; where Place of Supply(State Code) is other than the State where supplier is located (Inter-state supplies) 
                                                &lt;br&gt; and Invoice value is more than Rs 2.5 lakh (optional in respect of other supplies) 
                                                    &lt;br&gt; and Invoices issued against Advance Received in earlier periods" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.b2cla.err_cnt &amp;&amp; totalCountSummary.sec_count.b2cla.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.LBL_AMNDD_B2C_INV">9A - Amended B2C
                                            (Large) Invoices</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.b2cla.proc_cnt || totalCountSummary.sec_count.b2cla.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.b2cla.pen_cnt || totalCountSummary.sec_count.b2cla.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4  -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.b2cla.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                        data-ng-bind="b2bdat.ttl_rec"></span>  -->
                            </div>
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ('auth/gstr1/export/amendment/summary',totalCountSummary.sec_count.expa.proc_cnt,totalCountSummary.sec_count.expa.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.expa.err_cnt &amp;&amp; totalCountSummary.sec_count.expa.err_cnt &gt; 0)}" data-original-title="Amendment to Supplies Exported">
                                        <div class="text-center" data-ng-bind="trans.LBL_AMEND_EXP_INV">9A - Amended Exports
                                            Invoices</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.expa.proc_cnt || totalCountSummary.sec_count.expa.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.expa.pen_cnt || totalCountSummary.sec_count.expa.err_cnt)" data-original-title="Processed Records">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.expa.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                        data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ('auth/gstr1/cdn/registered/amendment/summary',totalCountSummary.sec_count.cdnra.proc_cnt,totalCountSummary.sec_count.cdnra.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.cdnra.err_cnt &amp;&amp; totalCountSummary.sec_count.cdnra.err_cnt &gt; 0)}" data-original-title="Amendment to Details of Credit / Debit Notes issued to registered taxpayer in earlier tax periods">
                                        <div class="text-center" data-ng-bind="trans.LBL_AMENDED_CREDIT_DEBIT_NOTES_REG">9C
                                            - Amended Credit/Debit Notes (Registered)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.cdnra.proc_cnt || totalCountSummary.sec_count.cdnra.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.cdnra.pen_cnt || totalCountSummary.sec_count.cdnra.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.cdnra.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ( 'auth/gstr1/cdn/unregistered/amendment/summary',totalCountSummary.sec_count.cdnura.proc_cnt,totalCountSummary.sec_count.cdnura.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.cdnura.err_cnt &amp;&amp; totalCountSummary.sec_count.cdnura.err_cnt &gt; 0)}" data-original-title="Amendment to Details of Credit / Debit Notes issued to unregistered taxpayer in earlier tax periods">
                                        <div class="text-center" data-ng-bind="trans.LBL_AMENDED_CREDIT_DEBIT_NOTES_UNREG">
                                            9C - Amended Credit/Debit Notes (Unregistered)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.cdnura.proc_cnt || totalCountSummary.sec_count.cdnura.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.cdnura.pen_cnt || totalCountSummary.sec_count.cdnura.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.cdnura.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                        data-ng-bind="cdnradat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ( '/auth/gstr1/b2cs/amendment/summary',totalCountSummary.sec_count.b2csa.proc_cnt,totalCountSummary.sec_count.b2csa.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="Amendment to Taxable Supplies (Net of debit notes and credit notes) to unregistered persons other than the supplies covered in Table 5." data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.b2csa.err_cnt &amp;&amp; totalCountSummary.sec_count.b2csa.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.LBL_AMD_B2C">10 - Amended B2C(Others)
                                        </div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.b2csa.proc_cnt || totalCountSummary.sec_count.b2csa.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.b2csa.pen_cnt || totalCountSummary.sec_count.b2csa.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.b2csa.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                        data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ('auth/gstr1/advtax/amendment/summary',totalCountSummary.sec_count.ata.proc_cnt,totalCountSummary.sec_count.ata.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="Consolidated Statement of Advances Received/Advance&lt;br&gt; adjusted in the current tax period/ Amendments of information &lt;br&gt; furnished in earlier tax period" data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.ata.err_cnt &amp;&amp; totalCountSummary.sec_count.ata.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.AMEND_TAX_LIAB">11A - Amended Tax
                                            Liability (Advances Received)</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.ata.proc_cnt || totalCountSummary.sec_count.ata.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.ata.pen_cnt || totalCountSummary.sec_count.ata.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.ata.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                                <!-- <span class="numb" data-toggle="tooltip" title=""
                                        data-ng-bind="b2bdat.ttl_rec"></span> -->
                            </div>
                            <div class="col-lg-3">
                                <a data-ng-click="page_gstr1_summ( '/auth/gstr1/txpd/amendment/summary',totalCountSummary.sec_count.txpda.proc_cnt,totalCountSummary.sec_count.txpda.pen_cnt)">
                                    <div class="headcard" data-toggle="tooltip" title="Advance amount received in earlier tax period
                                                                                                                &lt;br&gt;and adjusted against the supplies being shown in
                                                                                                                    &lt;br&gt;this tax period in Table Nos. 4,5,6 and 7." data-ng-class="{'errorHeadCard': (totalCountSummary.sec_count.txpda.err_cnt &amp;&amp; totalCountSummary.sec_count.txpda.err_cnt &gt; 0)}">
                                        <div class="text-center" data-ng-bind="trans.TTL_TXPDA">11B - Amendment of
                                            Adjustment of Advances</div>
                                        <br>
                                    </div>
                                    <div class="newcard">
                                        <div>
                                            <span class="processed" title="Processed Records" data-toggle="tooltip" data-ng-hide="(!totalCountSummary.sec_count.txpda.proc_cnt || totalCountSummary.sec_count.txpda.proc_cnt == 0) &amp;&amp; (totalCountSummary.sec_count.txpda.pen_cnt || totalCountSummary.sec_count.txpda.err_cnt)">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i>4 -->
                                                <img ng-src="//static.gst.gov.in/uiassets/images/processed.png" class="bigicon" src="//static.gst.gov.in/uiassets/images/processed.png">
                                                <span data-ng-bind="totalCountSummary.sec_count.txpda.proc_cnt">0</span>&nbsp;
                                            </span>
    
    
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-if="!IFF" class="col-lg-12 alert alert-msg alert-info" style="font-size: 14px;">
                <i class="fa fa-info"></i> The taxpayers for whom e-invoicing is not applicable may ignore the
                sections/options related to e-invoice download. The downloaded file would be blank in case taxpayer is not
                e-invoicing or when e-invoices reported to IRP are yet to be processed by GST system
            </div>
            <div class="row" ng-if="ENABLE_EINVOICE &amp;&amp; IFF==false">
                <div class="col-sm-12">
                    <button class="btn btn-primary pull-left col-xs-12 btn-lg text-left" style="text-align: left; border-radius: 0em; padding: 0.5em;font-size: 18px;" data-ng-click="getdownloadHistory(0)" id="e-inv-button">E-INVOICE DOWNLOAD HISTORY
                        <span id="e-inv-down" data-ng-hide="tog4" class="text-right pull-right">
                            <i class="fa fa-fw fa-chevron-down"></i>
                        </span>
                        <span id="e-inv-up" data-ng-show="tog4" class="text-right pull-right ng-hide">
                            <i class="fa fa-fw fa-chevron-up"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div id="e-inv-details" class="row tabpane ng-hide" data-ng-show="tog4" ng-if="ENABLE_EINVOICE &amp;&amp; IFF==false" style="margin-left: 0; margin-right: 0;">
                
                
                <div ng-if="!(excelURLs &amp;&amp; excelURLs.length&gt;0)">
                    <div class="col-md-12">
                        <div class="alert alert-msg alert-info">
                            <i class="fa fa-info-circle"></i> No files available for download
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="row">
                <div class="inner">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <input id="submit-checkbox" type="checkbox" class="chkbx ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="submitCheckbox" required="" name="submitCheckbox" data-ng-model="submitCheckbox" >
                        <label for="submitCheckbox"><span data-ng-bind="trans.SUB_DECL">I acknowledge that I have reviewed
                                the details of the preview and the information is correct and would like to submit the
                                details. I am aware that no changes can be made after submit.</span></label>
                         <span class="err" data-ng-show="" data-ng-bind="trans.ERR_MANDATORY"></span>
                    </div>
                </div>
            </div> -->
            <div class="row mar-b">
                <div class="col-sm-12 text-right">
                    <a type="button" class="btn btn-default" href="returnDashbord" target="_self" data-ng-bind="trans.LBL_BACK">Back</a>
                    
                    <button id="download-button" type="button" class="btn btn-primary">DOWNLOAD
                        DETAILS FROM E-INVOICES (EXCEL)</button>
                    <button id="reset-button" type="button" class="btn btn-primary">RESET</button>
                    
                    <button id="submit-gstr1" onclick="location.href='returngstr1summary'" type="button" class="btn btn-primary">GENERATE SUMMARY</button>
                    
                </div>
            </div>
            <!--         <div class="row">
                <div class="inner">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <input id="signatory-checkbox" type="checkbox" class="chkbx ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="dscCheckbox" required="" name="dscCheckbox" data-ng-model="dscCheckbox" data-ng-click="dsclist()"  disabled="disabled" >
                        <label for="dscCheckbox"><span data-ng-bind="trans.LBL_DECLARATION">I/We hereby solemnly affirm and declare that the information given herein above is true and correct to the best of my/our knowledge and belief and nothing has been concealed therefrom.</span></label>
                    </div>
                </div>
            </div> -->
            <!--         <div class="row mar-b ng-hide" id="gstr1-signatory" data-ng-show="dscCheckbox">
                <div class="inner">
                    <div class="col-xs-12 col-sm-6">
                        <label for="VeriAuth" class="reg m-cir" data-ng-bind="trans.LBL_AUTHORISED_SIGNATORY">Authorised Signatory</label>
                        <select id="gstr1-signatory-selectbox" name="pandsc" data-ng-model="DscAuth" id="DscAuth" class="form-control mar-t-0 ng-pristine ng-untouched ng-valid ng-empty" data-ng-options="sig.firstName+' '+sig.lastName for sig in asgs" data-ng-disabled="filing!='FRZ'">
                            <option value="" data-ng-bind="trans.HLP_SELCT">Select</option>
                            <option label="Vivek" value="1">VIVEK</option>
                        </select>
                    </div>
                </div>
            </div> -->
            <!--         <div class="row mar-b">
                <div class="col-sm-12 text-right">
                    <button id="file_gstr1_dsc" type="button" class="btn btn-primary" data-ng-click="fileGstrAction()" data-ng-bind="trans.BTN_FILE_GSTR1" disabled="disabled">File GSTR-1 with DSC</button>
                    <button id="file_gstr1_evc" type="button" class="btn btn-primary" data-ng-click="fileWithEvc()" data-ng-bind="trans.BTN_FILE_EVC_GSTR1" data-toggle="modal" data-target="#EvcModal" disabled="disabled">File GSTR-1 with EVC</button>
                </div>
            </div> -->
            <div class="modal fade fade-scale" id="EvcModal" role="dialog" data-ng-show="ModalFlag">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="EvcModalLabel">Enter One Time Password</h4>
                        </div>
                        <p class="alert err  alert-danger ng-hide" id="alertMsg" data-ng-show="alertMsgOtp"></p>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-8 has-success" data-ng-class="{'has-error':reqFlag || notValidOtp,'has-success':!reqFlag || !notValidOtp}">
                                    <label class="reg" for="otp">Your OTP has been sent to your mobile no and email. Please
                                        enter your OTP here</label>
                                    <input name="otp" class="form-control ng-dirty ng-valid-parse ng-valid-required ng-touched ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" autocomplete="off" id="otp" data-ng-model="otp" required="">
                                    <span id="otp-verify-error" class="err ng-hide" data-ng-show="reqFlag || notValidOtp" data-ng-bind="trans.ERR_EVC_OTP">Please enter correct OTP which has been sent to
                                        your registered Email ID and Mobile number.</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-ng-click="validateOtpGSTR3B()" style="margin-top: 0;" id="otp_verify" data-return="gstr1">Verify</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal fade" id="submit-gstr1-modal" role="dialog">
                <div class="modal-dialog sweet">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="m-icon m-warning pulseWarning"><span class="micon-body pulseWarningIns"></span><span
                                    class="micon-dot pulseWarningIns"></span></div>
                            <p>You are about to submit GSTR-1. Would you like to proceed? No changes can be made to in
                                return after submitting</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button id="submit-gstr1" type="button" class="btn btn-primary" data-ng-click="validateOtp()"
                                style="margin-top: 0;">Proceed</button>
                        </div>
                    </div>
                </div>
            </div> -->
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





</body></html>