

    
<div class="container py-5">
   <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
     <?php if (empty($is_pdf)): ?>
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
                            <span ng-switch-when="true"><a href="/gst/return/gstr1/online/">GSTR-1/FF</a></span>
                        </ng-switch>
                    </li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-when="true">Summary</span>
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
    <?php endif; ?>
    <div>
        <div id="mai">
             <?php if (empty($is_pdf)): ?>
            <div class="row" style="margin-right:auto;">
                <!-- <button class="btn btn-primary btn-circle btn-sm pull-right" data-ng-controller="simctrl"
                    ng-click="openNav()" ng-click="closeNav()" style="margin:0px;margin-right: 50px;">
                    HELP
                    <i class="fa fa-question-circle"></i>
                </button> -->
                <button class="btn btn-primary btn-circle btn-sm pull-right" data-ng-click="getSummary()" fdprocessedid="eyln4n">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </button>
            </div>
           <?php endif; ?>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default ret">
                        <div class="panel-body" style="padding: 5px 15px;font-size:14px;">
                            <?php $this->load->view('user/trade_info', ['resultTaxpayer' => $resultTaxpayer]); ?>
                        </div>
                    </div>
                </div>
            </div>
    
    
    
            <div id="summary-content" class="tabpane" style="min-height: 263px !important">
                 <?php if (empty($is_pdf)): ?>
                <div class="col-sm-12 head padding10x10">
                    <button class="btn btn-new col-sm-12 pull-left" data-ng-click="tog =!tog" style="border-radius: 0em; text-align: left;" fdprocessedid="3vdhoi">Consolidated Summary
                        <span data-ng-hide="!tog" class="pull-right ng-hide">
                            <i class="fa fa-fw fa-chevron-down"></i>
                        </span>
                        <span data-ng-show="!tog" class="pull-right">
                            <i class="fa fa-fw fa-chevron-up"></i>
                        </span>
                    </button>
                </div>
                <?php endif; ?>
                <div class="alert-msg alert-danger ng-hide" style="margin: 5% 1% -2% 1%; padding: 10px;" data-ng-show="rtfErrMsgShow" data-ng-bind="rtfErrMsg"></div>
    
                <div class="panel-body" data-ng-show="!tog">
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
    
                            <table border="1" style=" border-collapse: collapse;"class="table table-bordered table-responsive">
                              <?php if (!empty($is_pdf)) { ?>

                     <thead style="background:#F8F8F8;">
                            <tr style="background-color:#c9ece1; color: black;">
                                <th style="border:1px solid #000;" colspan="2">Description</th>
                                <th style="border:1px solid #000;">No. of records</th>
                                <th style="border:1px solid #000;" >Document Type</th>
                                <th style="border:1px solid #000;" >Value (₹)</th>
                                <th style="border:1px solid #000;">Integrated tax (₹)</th>
                                <th style="border:1px solid #000;">Central tax (₹)</th>
                                <th style="border:1px solid #000;">State/UT tax (₹)</th>
                                <th style="border:1px solid #000;">Cess (₹)</th>
                            </tr>
                        </thead>
                              <?php } ?>
                              <?php if (empty($is_pdf)) { ?>
                                <thead style="background:#F8F8F8 ">
                                    <tr style="background-color:#c9ece1; color: black;">
    
                                        <th class="text-center verticalCenter" style="display: table-cell; min-width: 24em;" rowspan="2" colspan="2">Description
                                            <span> [Expand All <i class="fa fa-fw fa-chevron-down"></i>
                                                ]</span>
                                            <span  style="color: #005b9f" class="ng-hide"> [Collapse All <i class="fa fa-fw fa-chevron-up"></i>
                                                ]</span>
                                        </th>
                                        <th class="text-center verticalCenter" rowspan="2" >No. of records</th>
                                        <th class="text-center verticalCenter" style="padding-left: 19px;padding-right: 19px;" rowspan="2" >Document Type</th>
    
                                        <th class="text-center verticalCenter" rowspan="2" >Value (₹)</th>
                                        <th class="text-center verticalCenter">Integrated tax (₹)</th>
                                        <th class="text-center verticalCenter" >Central tax (₹)</th>
                                        <th class="text-center verticalCenter" >State/UT tax (₹)</th>
                                        <th class="text-center verticalCenter" >Cess (₹)</th>
                                    </tr>
                                </thead>
                               <?php } ?>
                                <tbody>
    
                                    <!-- 4A - B2B SUM -->
    
                                    <tr data-ng-if="b2b4bdat">
                                        <td class="antiqueWhite" colspan="9" >4A - Taxable outward supplies made to registered persons (other than reverse charge supplies) - B2B Regular</td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center"><?php echo @$b2b_count;?></td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right"><?php echo @$b2btaxablevalue_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$b2btaxablevalue_count->integrated_value;?></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    
                                    
    
                                    <!-- 4B - B2B SUMM -->
    
                                    <tr data-ng-if="b2b4bdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_4B_B2B">4B - Taxable outward supplies made to registered persons attracting tax on reverse charge - B2B Reverse charge</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2b4bdat">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2b4bdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr data-ng-if="b2b4bdat &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!b2b4bdat.cpty_sum || b2b4bdat.cpty_sum.length == 0) &amp;&amp; b2b4bdat.ttl_rec == 0" class="ng-hide">
                                        <td colspan="9">
                                            <div data-ng-click="collapseSummary('b2b4bShow');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="b2b4bShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="b2b4bShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
                        
                                    <!-- 5A-B2CL SUMM -->
                                    <tr data-ng-if="b2cldat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_5A_B2CL">5A - Taxable outward inter-state supplies made to unregistered persons (where invoice value is more than Rs.2.5 lakh) - B2CL (Large)</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2cldat &amp;&amp; !IFF">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2cldat.ttl_rec"><?php echo @$b2ctaxablevalue_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right"><?php echo @$b2ctaxablevalue_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$b2ctaxablevalue_count->integrated_value;?></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
    
                                    <!-- 6A - EXP SUM -->
    
                                    <tr data-ng-if="expdat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_6A_EXP">6A - Exports</td>
                                    </tr>
                                    <tr class="" data-ng-if="expdat &amp;&amp; !IFF">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="expdat.ttl_rec"><?php echo @$exporttaxablevalue_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right"><?php echo @$exporttaxablevalue_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$exporttaxablevalue_count->integrated_value;?></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="expdat &amp;&amp; !IFF" data-ng-repeat="sec in expdat.sub_sections | orderBy : 'typ.length'">
                                        <td colspan="2" class="subsec" data-ng-bind="sec.typ">EXPWP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
    
                                    </tr>
                                    <tr data-ng-if="expdat &amp;&amp; !IFF" data-ng-repeat="sec in expdat.sub_sections | orderBy : 'typ.length'">
                                        <td colspan="2" class="subsec" data-ng-bind="sec.typ">EXPWOP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        
                                        <td class="verticalCenter greyCell text-right" data-ng-if="sec.typ=='EXPWOP'">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
    
                                    </tr>
    
                                    <!-- 6B - SEZ DEVELOPER -->
    
                                    <tr data-ng-if="b2bwpdat || b2bwopdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_6B_SEZ">6B - Supplies made to SEZ unit or SEZ developer - SEZWP/SEZWOP</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bwpdat || b2bwopdat">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bwpdat">
                                        <td colspan="2" class="subsec" data-ng-bind="trans.LBL_SUM_SEZWP">SEZWP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2bwpdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bwopdat">
                                        <td colspan="2" class="subsec" data-ng-bind="trans.LBL_SUM_SEZWOP">SEZWOP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2bwopdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                    </tr>
                                    <tr data-ng-if="(b2bwpdat || b2bwopdat) &amp;&amp; !isCptyLimitExceeded" data-ng-hide="((!b2bwpdat.cpty_sum &amp;&amp; !b2bwopdat.cpty_sum) || (b2bwpdat.cpty_sum.length == 0 &amp;&amp; b2bwopdat.cpty_sum.length == 0)) &amp;&amp; (b2bwpdat.ttl_rec == 0 &amp;&amp; b2bwopdat.ttl_rec == 0)" class="ng-hide">
                                        <td colspan="9">
                                            <div data-ng-click="collapseSummary('b2b6bShow');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="b2b6bShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="b2b6bShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    
    
                                    <!-- 6C - DEEMED EXPORTS -->
                                    <tr data-ng-if="b2b6cdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_6C_DEXP">6C - Deemed Exports - DE</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2b6cdat">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2b6cdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr data-ng-if="b2b6cdat &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!b2b6cdat.cpty_sum || b2b6cdat.cpty_sum.length == 0) &amp;&amp; b2b6cdat.ttl_rec == 0" class="ng-hide">
                                        <td colspan="9">
                                            <div data-ng-click="collapseSummary('b2b6cShow');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="b2b6cShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="b2b6cShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
    
                                    <!-- 7 - B2CS SUM -->
                                    <tr data-ng-if="b2csdat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_7_B2CS">7 - Taxable supplies (Net of debit notes and credit notes) to unregistered persons other than the supplies covered in Table 5 - B2CS (Others)</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2csdat &amp;&amp; !IFF">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2csdat.ttl_rec"><?php echo @$b2cstaxablevalue_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right"><?php echo @$b2cstaxablevalue_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$b2cstaxablevalue_count->integrated_value;?></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="b2csdat &amp;&amp; !IFF &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!b2csdat.cpty_sum || b2csdat.cpty_sum.length == 0) &amp;&amp; b2csdat.ttl_rec == 0">
                                        <td colspan="9">
                                            <div data-ng-click="collapseSummary('b2csShow');getSummary('L')">POS wise summary
                                                <span data-ng-hide="b2csShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="b2csShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    
                                    <!-- 8 - NIL SUM -->
                                    <tr data-ng-if="nildat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_8_NIL">8 - Nil rated, exempted and non GST outward supplies</td>
                                    </tr>
                                    <tr class="" data-ng-if="nildat &amp;&amp; !IFF">
                                        <td colspan="4">Total</td>
                                        <td class="verticalCenter text-right">86.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                    </tr>
                                    <tr data-ng-if="nildat &amp;&amp; !IFF">
                                        <td colspan="4" class="subsec">Nil</td>
                                        <td class="verticalCenter text-right">60.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                    </tr>
                                    <tr data-ng-if="nildat &amp;&amp; !IFF">
                                        <td colspan="4" class="subsec">Exempted</td>
                                        <td class="verticalCenter text-right">26.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                    </tr>
                                    <tr data-ng-if="nildat &amp;&amp; !IFF">
                                        <td colspan="4" class="subsec">Non-GST</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                    </tr>
    
                                    <!-- 9A - AMENDMENT B2B REG -->
                                    <tr data-ng-if="b2ba4adat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9A_B2B">9A - Amendment to taxable outward supplies made to registered person in returns of earlier tax periods in table 4 - B2B Regular</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2ba4adat">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2ba4adat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2ba4adat">
                                        <td colspan="2">Net differential amount (Amended - Original)</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <!-- 9A - AMENDMENT B2B REVERSE -->
                                    <tr data-ng-if="b2ba4bdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9A_B2B_REV">9A - Amendment to taxable outward supplies made to registered person in returns of earlier tax periods in table 4 - B2B Reverse charge</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2ba4bdat">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2ba4bdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2ba4bdat">
                                        <td colspan="2">Net differential amount (Amended - Original)</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <!-- 9A - B2CLA SUM -->
                                    <tr data-ng-if="b2cladat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9A_B2CL">9A - Amendment to Inter-State supplies made to unregistered person (where invoice value is more than Rs.2.5 lakh) in returns of earlier tax periods in table 5 - B2CL (Large)</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2cladat &amp;&amp; !IFF">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2cladat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2cladat &amp;&amp; !IFF">
                                        <td colspan="2">Net differential amount (Amended - Original)</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
    
                                    <!-- 9A - AMEND TABLE 6A -->
                                    <tr data-ng-if="expadat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_6A_AMD_EXP">9A - Amendment to Export supplies in returns of earlier tax periods in table 6A (EXPWP/EXPWOP)</td>
                                    </tr>
                                    <tr class="" data-ng-if="expadat &amp;&amp; !IFF">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="expadat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="expadat &amp;&amp; !IFF">
                                        <td colspan="2">Net differential amount (Amended - Original) - Total</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <tr data-ng-if="expadat &amp;&amp; !IFF" data-ng-repeat="sec in expadat.sub_sections | orderBy : 'typ.length'">
                                        <td colspan="2" class="subsec" data-ng-bind="sec.typ">EXPWP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                    </tr>
                                    <tr data-ng-if="expadat &amp;&amp; !IFF" data-ng-repeat="sec in expadat.sub_sections | orderBy : 'typ.length'">
                                        <td colspan="2" class="subsec" data-ng-bind="sec.typ">EXPWOP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
                                    </tr>
    
                                    <!-- 9A - AMEND TABLE 6B -->
                                    <tr data-ng-if="b2bawpdat || b2bawopdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_6B_AMD_SEZ">9A - Amendment to supplies made to SEZ unit or SEZ developer in returns of earlier tax periods in table 6B (SEZWP/SEZWOP) </td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bawpdat || b2bawopdat">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bawpdat || b2bawopdat">
                                        <td colspan="2">Net differential amount (Amended - Original) - Total</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bawpdat">
                                        <td colspan="2" class="subsec" data-ng-bind="trans.LBL_SUM_SEZWP">SEZWP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2bawpdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2bawopdat">
                                        <td colspan="2" class="subsec" data-ng-bind="trans.LBL_SUM_SEZWOP">SEZWOP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2bawopdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                    </tr>
    
                                    <!-- 9A - AMEND TABLE 6C -->
                                    <tr data-ng-if="b2ba6cdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_6C_AMD_DE">9A - Amendment to Deemed Exports in returns of earlier tax periods in table 6C (DE)</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2ba6cdat">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2ba6cdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Invoice</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr> 
                                    <tr class="" data-ng-if="b2ba6cdat">
                                        <td colspan="2">Net differential amount (Amended - Original)</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr> 
    
                                    <!-- 9B - CDNR -->
                                    <tr data-ng-if="cdnrdat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9B_CDNR">9B - Credit/Debit Notes (Registered) - CDNR</td>
                                    </tr>
                                    <tr class="" data-ng-if="cdnrdat">
                                        <td colspan="2">
                                            <div data-ng-click="collapseSummary('cdnShow')">Total - Net off debit/credit notes (Debit notes - Credit notes)
                                                <span data-ng-hide="cdnShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="cdnShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnrdat.ttl_rec"><?php echo @$registered_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Note</td>
                                        
                                        <td class="verticalCenter text-right"><?php echo @$registered_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$registered_count->integrated_value;?></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        
                                    </tr>
                                    <tr data-ng-if="cdnr4adat" data-ng-show="cdnShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LBL_SUM_9B_CDNR_B2B">Credit / Debit notes issued to registered person for taxable outward supplies in table 4 other than table 6 - B2B Regular</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnr4adat" data-ng-show="cdnShow">
                                        <td colspan="2" class="sub_subsec">Net Total (Debit notes – Credit notes)
                                        </td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnr4adat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        
                                    </tr>
                                    <tr data-ng-if="cdnr4adat &amp;&amp; !isCptyLimitExceeded" data-ng-hide="((!cdnr4adat.cpty_sum || cdnr4adat.cpty_sum.length == 0) &amp;&amp; cdnr4adat.ttl_rec == 0) || !cdnShow" class="ng-hide">
                                        <td colspan="9" class="sub_subsec">
                                            <div data-ng-click="collapseSummary('cdnrShow');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="cdnrShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="cdnrShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
    
                                    <tr data-ng-if="cdnr4bdat" data-ng-show="cdnShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LBL_SUM_9B_CDNR_B2B_REV">Credit / Debit notes issued to registered person for taxable outward supplies in table 4 other than table 6 - B2B Reverse charge</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnr4bdat" data-ng-show="cdnShow">
                                        <td colspan="2" class="sub_subsec">Net Total (Debit notes – Credit notes)
                                        </td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnr4bdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="cdnr4bdat &amp;&amp; !isCptyLimitExceeded" data-ng-hide="((!cdnr4bdat.cpty_sum || cdnr4bdat.cpty_sum.length == 0) &amp;&amp; cdnr4bdat.ttl_rec == 0) || !cdnShow" class="ng-hide">
                                        <td colspan="9" class="sub_subsec">
                                            <div data-ng-click="collapseSummary('cdnrShow1');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="cdnrShow1">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="cdnrShow1" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
    
                                    <tr data-ng-if="cdnrwpdat || cdnrwopdat" data-ng-show="cdnShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LBL_SUM_9B_CDNR_SEZ">Credit / Debit notes issued to registered person for taxable outward supplies in table 6B - SEZWP/SEZWOP</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnrwpdat || cdnrwopdat" data-ng-show="cdnShow">
                                        <td colspan="2" class="sub_subsec">Net Total (Debit notes – Credit notes)
                                        </td>
                                        <td class="verticalCenter text-center">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="(cdnrwpdat || cdnrwopdat) &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(((!cdnrwpdat.cpty_sum &amp;&amp; !cdnrwopdat.cpty_sum) || (cdnrwpdat.cpty_sum.length == 0 &amp;&amp; cdnrwopdat.cpty_sum.length == 0)) &amp;&amp; (cdnrwpdat.ttl_rec == 0 &amp;&amp; cdnrwopdat.ttl_rec == 0))  || !cdnShow" class="ng-hide">
                                        <td colspan="9" class="sub_subsec">
                                            <div data-ng-click="collapseSummary('cdnr6bShow');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="cdnr6bShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="cdnr6bShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    
    
                                    <tr data-ng-if="cdnr6cdat" data-ng-show="cdnShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LBL_SUM_9B_CDNR_DE">Credit / Debit notes issued to registered person for taxable outward supplies in table 6C - DE</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnr6cdat" data-ng-show="cdnShow">
                                        <td colspan="2" class="sub_subsec">Net Total (Debit notes – Credit notes)
                                        </td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnr6cdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="cdnr6cdat &amp;&amp; !isCptyLimitExceeded" data-ng-hide="((!cdnr6cdat.cpty_sum || cdnr6cdat.cpty_sum.length == 0) &amp;&amp; cdnr6cdat.ttl_rec == 0)  || !cdnShow" class="ng-hide">
                                        <td colspan="9" class="sub_subsec">
                                            <div data-ng-click="collapseSummary('cdnr6cShow');getSummary('L')">Recipient wise summary
                                                <span data-ng-hide="cdnr6cShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="cdnr6cShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                     
    
                                    <!-- 9B - CDNUR -->
                                    <tr data-ng-if="cdnurdat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9B_CDNUR">9B - Credit/Debit Notes (Unregistered) - CDNUR</td>
                                    </tr>
                                    <tr class="" data-ng-if="cdnurdat &amp;&amp; !IFF">
                                        <td colspan="2">Total - Net off debit/credit notes (Debit notes - Credit notes)</td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnurdat.ttl_rec"><?php echo @$unregistered_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right"><?php echo @$unregistered_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$unregistered_count->integrated_value;?></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="cdnurdat &amp;&amp; !IFF">
                                        <td colspan="9">
                                            <div data-ng-click="collapseSummary('urTypShow')">Unregistered Type
                                                <span data-ng-hide="urTypShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="urTypShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-ng-show="urTypShow" data-ng-if="cdnurdat &amp;&amp; !IFF" data-ng-repeat="sec in cdnurdat.sub_sections | orderBy : 'typ.length'" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="sec.typ">B2CL</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
    
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                    </tr><tr data-ng-show="urTypShow" data-ng-if="cdnurdat &amp;&amp; !IFF" data-ng-repeat="sec in cdnurdat.sub_sections | orderBy : 'typ.length'" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="sec.typ">EXPWP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
    
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                    </tr><tr data-ng-show="urTypShow" data-ng-if="cdnurdat &amp;&amp; !IFF" data-ng-repeat="sec in cdnurdat.sub_sections | orderBy : 'typ.length'" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="sec.typ">EXPWOP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
    
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
                                    </tr>
    
                                    <!-- 9C - CDNRA -->
                                    <tr data-ng-if="cdnradat">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9C_CDNRA">9C - Amended Credit/Debit Notes (Registered) - CDNRA</td>
                                    </tr>
                                    <tr class="" data-ng-if="cdnradat">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnradat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="cdnradat">
                                        <td colspan="2">
                                            <div data-ng-click="collapseSummary('cdnraShow')">Net Differential amount (Net Amended Debit notes - Net Amended Credit notes) - Total
                                                <span data-ng-hide="cdnraShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="cdnraShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr data-ng-if="cdnra4adat" data-ng-show="cdnraShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LBL_SUM_9C_CDNRA_B2B">Amended Credit / Debit notes issued to registered person for taxable outward supplies in table 4 other than table 6 - B2B Regular</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnra4adat" data-ng-show="cdnraShow">
                                        <td colspan="2" class="sub_subsec">Net total (Net Amended Debit notes - Net Amended Credit notes)</td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnra4adat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
    
                                    <tr data-ng-if="cdnra4bdat" data-ng-show="cdnraShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LB_SUM_9C_CDNRA_B2B_REV">Amended Credit / Debit notes issued to registered person for taxable outward supplies in table 4 other than table 6 - B2B Reverse charge</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnra4bdat" data-ng-show="cdnraShow">
                                        <td colspan="2" class="sub_subsec">Net total (Net Amended Debit notes - Net Amended Credit notes)</td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnra4bdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
    
                                    <tr data-ng-if="cdnrawpdat || cdnrawopdat" data-ng-show="cdnraShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LB_SUM_9C_CDNRA_SEZ">Amended Credit / Debit notes issued to registered person for taxable outward supplies in table 6B - SEZWP/SEZWOP</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnrawpdat || cdnrawopdat" data-ng-show="cdnraShow">
                                        <td colspan="2" class="sub_subsec">Net total (Net Amended Debit notes - Net Amended Credit notes)</td>
                                        <td class="verticalCenter text-center">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
                                    <tr data-ng-if="cdnra6cdat" data-ng-show="cdnraShow" class="ng-hide">
                                        <td colspan="9" class="subsec subHeading" data-ng-bind="trans.LBL_SUM_9C_CDNRA_DE">Amended Credit / Debit notes issued to registered person for taxable outward supplies in table 6C - DE</td>
                                    </tr>
                                    <tr class="ng-hide" data-ng-if="cdnra6cdat" data-ng-show="cdnraShow">
                                        <td colspan="2" class="sub_subsec">Net total (Net Amended Debit notes - Net Amended Credit notes)</td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnra6cdat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
    
                                    <!-- 9C - CDNURA -->
                                    <tr data-ng-if="cdnuradat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_9C_CDNURA">9C - Amended Credit/Debit Notes (Unregistered) - CDNURA</td>
                                    </tr>
                                    <tr class="" data-ng-if="cdnuradat &amp;&amp; !IFF">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="cdnuradat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="cdnuradat &amp;&amp; !IFF">
                                        <td colspan="2">Net Differential amount (Net Amended Debit notes - Net Amended Credit notes) - Total</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr data-ng-if="cdnuradat &amp;&amp; !IFF">
                                        <td colspan="9">
                                            <div data-ng-click="collapseSummary('uraTypShow')">Unregistered Type
                                                <span data-ng-hide="uraTypShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="uraTypShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-ng-show="uraTypShow" data-ng-if="cdnuradat &amp;&amp; !IFF" data-ng-repeat="sec in cdnuradat.sub_sections | orderBy : 'typ.length'" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="sec.typ">B2CL</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
    
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                    </tr><tr data-ng-show="uraTypShow" data-ng-if="cdnuradat &amp;&amp; !IFF" data-ng-repeat="sec in cdnuradat.sub_sections | orderBy : 'typ.length'" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="sec.typ">EXPWP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
    
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                        <td class="verticalCenter text-right" data-ng-if="sec.typ!='EXPWOP'">0.00</td>
                                        
                                    </tr><tr data-ng-show="uraTypShow" data-ng-if="cdnuradat &amp;&amp; !IFF" data-ng-repeat="sec in cdnuradat.sub_sections | orderBy : 'typ.length'" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="sec.typ">EXPWOP</td>
                                        <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Note</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
    
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                        
                                        <td class="verticalCenter greyCell" data-ng-if="sec.typ=='EXPWOP'"></td>
                                    </tr>
    
                                    <!-- 10 - B2CS -->
                                    <tr data-ng-if="b2csadat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_10_B2C">10 - Amendment to taxable outward supplies to unregistered person in returns for earlier tax periods in table 7 - B2C (Others)</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2csadat &amp;&amp; !IFF">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="b2csadat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="b2csadat &amp;&amp; !IFF">
                                        <td colspan="2">Net differential amount (Amended - Original)</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <!-- 11A - AT -->
                                    <tr data-ng-if="attdat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_11A_AT">11A(1), 11A(2) - Advances received for which invoice has not been issued (tax amount to be added to the output tax liability) (Net of Refund Vouchers)</td>
                                    </tr>
                                    <tr class="" data-ng-if="attdat &amp;&amp; !IFF">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="attdat.ttl_rec"><?php echo @$advtaxLiability_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right"><?php echo @$advtaxLiability_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$advtaxLiability_count->integrated_value;?></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
    
                                    <!-- 11B - TXPD -->
                                    <tr data-ng-if="txpdat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_11B_AT">11B(1), 11B(2) - Advance amount received in earlier tax period and adjusted against the supplies being shown in this tax period in Table Nos. 4, 5, 6 and 7</td>
                                    </tr>
                                    <tr class="" data-ng-if="txpdat &amp;&amp; !IFF">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="txpdat.ttl_rec"><?php echo @$taxpaid_count->total_records;?></td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right"><?php echo @$taxpaid_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right"><?php echo @$taxpaid_count->integrated_value;?></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
    
                                    </tr>
    
                                    <!-- 11A - ATA -->
                                    <tr data-ng-if="atadat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_11A_ATA">11A - Amendment to advances received in returns for earlier tax periods in table 11A(1), 11A(2)</td>
                                    </tr>
                                    <tr class="" data-ng-if="atadat &amp;&amp; !IFF">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="atadat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="atadat &amp;&amp; !IFF">
                                        <td colspan="2">Net differential</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <!-- 11B - TXPDA -->
                                    <tr data-ng-if="txpadat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_11B_ATA">11B - Amendment to advances adjusted in returns for earlier tax periods in table 11B(1), 11B(2)</td>
                                    </tr>
                                    <tr class="" data-ng-if="txpadat &amp;&amp; !IFF">
                                        <td colspan="2">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="txpadat.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="txpadat &amp;&amp; !IFF">
                                        <td colspan="2">Net differential</td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <!-- 12 - HSN -->
                                    <tr data-ng-if="hsndat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_HSN">12 - HSN-wise summary of outward supplies</td>
                                    </tr>
                                    <tr class="" data-ng-if="hsndat &amp;&amp; !IFF">
                                        <td colspan="2">Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="hsndat.ttl_rec"><?php echo @$hsn_count->total_records;?></td>
                                        <td class="verticalCenter text-center">NA</td>
                                        <td class="verticalCenter text-right lightgreyCell"><?php echo @$hsn_count->total_taxable_value;?></td>
                                        <td class="verticalCenter text-right lightgreyCell"><?php echo @$hsn_count->integrated_value;?></td>
                                        <td class="verticalCenter text-right lightgreyCell"><?php echo @$hsn_count->central_tax;?></td>
                                        <td class="verticalCenter text-right lightgreyCell"><?php echo @$hsn_count->state_tax;?></td>
                                        <td class="verticalCenter text-right lightgreyCell"><?php echo @$hsn_count->cess;?></td>
    
                                    </tr>
    
                                    <!-- 13 - DOC ISSUED -->
                                    <tr data-ng-if="docdat &amp;&amp; !IFF">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_DOC_ISSUED">13 - Documents issued</td>
                                    </tr>
                                    <tr class="verticalCenter" data-ng-if="docdat &amp;&amp; !IFF">
                                        <td colspan="2">
                                            <div data-ng-click="collapseSummary('diShow')">Net issued documents
                                                <span data-ng-hide="diShow">
                                                    <i class="fa fa-fw fa-chevron-down"></i>
                                                </span>
                                                <span data-ng-show="diShow" class="ng-hide">
                                                    <i class="fa fa-fw fa-chevron-up"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td colspan="1" class="verticalCenter text-center" data-ng-bind="docdat.net_doc_issued"><?php echo @$document_count;?></td>
                                        <td colspan="1" class="verticalCenter text-center">All Documents</td>
                                        <td colspan="5" class="verticalCenter text-center"></td>
                                    </tr>
                                    <tr data-ng-show="diShow" data-ng-if="docdat &amp;&amp; !IFF" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="trans.LBL_DOCISS">Documents issued</td>
                                        <td class="verticalCenter text-center" data-ng-bind="docdat.ttl_doc_issued">8.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                    </tr>
                                    <tr data-ng-show="diShow" data-ng-if="docdat &amp;&amp; !IFF" class="ng-hide">
                                        <td colspan="2" class="verticalCenter subsec" data-ng-bind="trans.LBL_DOCCAN">Documents cancelled</td>
                                        <td class="verticalCenter text-center" data-ng-bind="docdat.ttl_doc_cancelled">7.00</td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
                                        <td class="verticalCenter greyCell"></td>
    
                                    </tr>

                                    
 								<!-- Table 14 SUM-->
                                <tr data-ng-if="supecodat &amp;&amp; !IFF &amp;&amp; ecomOptEnabled">
                                    <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_14_SUPECO">14 - Supplies made through E-Commerce Operators</td>
                                </tr>
                                <tr class="" data-ng-if="supecodat &amp;&amp; !IFF &amp;&amp; ecomOptEnabled">
                                    <td colspan="2">Total</td>
                                    <td class="verticalCenter text-center" data-ng-bind="supecodat.ttl_rec"><?php echo @$ecom_count->total_records;?></td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell"><?php echo @$ecom_count->net_value;?></td>
                                    <td class="verticalCenter text-right lightgreyCell"><?php echo @$ecom_count->integrated_value;?></td>
                                    <td class="verticalCenter text-right lightgreyCell"><?php echo @$ecom_count->central_tax;?></td>
                                    <td class="verticalCenter text-right lightgreyCell"><?php echo @$ecom_count->state_tax;?></td>
                                    <td class="verticalCenter text-right lightgreyCell"><?php echo @$ecom_count->cess;?></td>
                                </tr>
                                <tr data-ng-if="supecodat &amp;&amp; !IFF &amp;&amp; ecomOptEnabled" data-ng-repeat="sec in supecodat.sub_sections | orderBy : 'sec_nm.length'">
                                    <td colspan="2" data-ng-if="sec.sec_nm=='SUPECOM_14A'" data-ng-bind="trans.LBL_SUM_14_SUPECO_14A">(a) Liable to collect tax u/s 52</td>
                                    
                                    <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr><tr data-ng-if="supecodat &amp;&amp; !IFF &amp;&amp; ecomOptEnabled" data-ng-repeat="sec in supecodat.sub_sections | orderBy : 'sec_nm.length'">
                                    
                                    <td colspan="2" data-ng-if="sec.sec_nm!='SUPECOM_14A'" data-ng-bind="trans.LBL_SUM_14_SUPECO_14B">(b) Liable to pay tax u/s 9(5)</td>
                                    <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>

                                    <!-- Table 14A SUM-->
                                <tr data-ng-if="supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled">
                                    <td class="antiqueWhite" colspan="9" data-ng-bind="trans.LBL_SUM_14_SUPECO_AMEND">14A - Amended Supplies made through E-Commerce Operators</td>
                                </tr>
                                <tr class="" data-ng-if="supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled">
                                    <td colspan="2">Amended amount - Total</td>
                                    <!-- <td colspan="2">Amended amount - Total</td> -->
                                    <td class="verticalCenter text-center" data-ng-bind="supecoAmendData.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>
                                <tr class="" data-ng-if="supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled">
                                    <td colspan="2">Net differential amount (Amended - Original)</td>
                                    <!-- <td colspan="2">Amended amount - Total</td> -->
                                    <td class="verticalCenter text-center" data-ng-bind="supecoAmendData.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>
                                <tr data-ng-if="supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled">
                                    <td colspan="9" data-ng-bind="trans.LBL_SUM_14_SUPECO_14A">(a) Liable to collect tax u/s 52</td>
                                </tr>
                                <tr data-ng-if="sec.sec_nm=='SUPECOMA_14A' &amp;&amp; supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled" data-ng-repeat="sec in supecoAmendData.sub_sections | orderBy : 'sec_nm.length'">
                                    <td colspan="2" class="subsec">Amended amount - Total</td>
                                    <!-- <td colspan="2" data-ng-if="sec.sec_nm!='SUPECOM_14A'" data-ng-bind="trans.LBL_SUM_14_SUPECO_14B"></td> -->
                                    <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>
                                <tr data-ng-if="sec.sec_nm=='SUPECOMA_14A' &amp;&amp; supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled" data-ng-repeat="sec in supecoAmendData.sub_sections | orderBy : 'sec_nm.length'">
                                    <td colspan="2" class="subsec">Net differential amount (Amended - Original)</td>
                                    <!-- <td colspan="2" data-ng-if="sec.sec_nm!='SUPECOM_14A'" data-ng-bind="trans.LBL_SUM_14_SUPECO_14B"></td> -->
                                    <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>
                                <tr data-ng-if="supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled">
                                    <td colspan="9" data-ng-bind="trans.LBL_SUM_14_SUPECO_14B">(b) Liable to pay tax u/s 9(5)</td>
                                </tr>
                                <tr data-ng-if="sec.sec_nm=='SUPECOMA_14B' &amp;&amp;  supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled" data-ng-repeat="sec in supecoAmendData.sub_sections | orderBy : 'sec_nm.length'">
                                    <td colspan="2" class="subsec">Amended amount - Total</td>
                                    <!-- <td colspan="2" data-ng-if="sec.sec_nm!='SUPECOM_14A'" data-ng-bind="trans.LBL_SUM_14_SUPECO_14B"></td> -->
                                    <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>
                                <tr data-ng-if="sec.sec_nm=='SUPECOMA_14B' &amp;&amp;  supecoAmendData &amp;&amp; !IFF &amp;&amp; ecomaOptEnabled" data-ng-repeat="sec in supecoAmendData.sub_sections | orderBy : 'sec_nm.length'">
                                    <td colspan="2" class="subsec">Net differential amount (Amended - Original)</td>
                                    <!-- <td colspan="2" data-ng-if="sec.sec_nm!='SUPECOM_14A'" data-ng-bind="trans.LBL_SUM_14_SUPECO_14B"></td> -->
                                    <td class="verticalCenter text-center" data-ng-bind="sec.ttl_rec">0</td>
                                    <td class="verticalCenter text-center">Net Value</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                    <td class="verticalCenter text-right lightgreyCell">0.00</td>
                                </tr>

                               
								<!-- TABLE 15 -->
                                   <tr data-ng-if="ecomb2b || ecomb2breg || ecomb2bde || ecomb2bswp || ecomb2bswop || ecomb2bunreg">
                                    <!-- <tr class="" > -->
                                       <td class="antiqueWhite" data-ng-if="!IFF" colspan="9" data-ng-bind="trans.HEAD_VIEWSUMM_SUP_15_EDIT">15 - Supplies U/s 9(5)</td>
                                       
                                   </tr>
                                   <tr class="" data-ng-if="ecomb2b"> 
                                       <td colspan="2">Total</td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2b.ttl_rec">0</td>
                                       <td class="verticalCenter text-center" data-ng-if="!IFF">Document / Net Value</td>
                                       
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr class="" data-ng-if="ecomb2breg">
                                       <td colspan="2">    - For Register Recipients -Regular<br><span>Total</span></td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2breg.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr data-ng-if="ecomb2breg &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!ecomb2breg.cpty_sum || ecomb2breg.cpty_sum.length == 0) &amp;&amp; (ecomb2breg.ttl_rec == 0)" class="ng-hide">
                                       <td colspan="9">
                                           <div data-ng-click="collapseSummary('ecomShow');getSummary('L')">Recipient wise summary
                                               <span data-ng-hide="ecomShow">
                                                   <i class="fa fa-fw fa-chevron-down"></i>
                                               </span>
                                               <span data-ng-show="ecomShow" class="ng-hide">
                                                   <i class="fa fa-fw fa-chevron-up"></i>
                                               </span>
                                           </div>
                                       </td>
                                   </tr>
                                   
                                   <tr class="" data-ng-if="ecomb2bde">
                                       <td colspan="2">    - For Register Recipients -DE<br><span>Total</span></td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2bde.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr data-ng-if="ecomb2bde &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!ecomb2bde.cpty_sum || ecomb2bde.cpty_sum.length == 0) &amp;&amp; (ecomb2bde.ttl_rec == 0)" class="ng-hide">
                                       <td colspan="9">
                                           <div data-ng-click="collapseSummary('ecomShowDe');getSummary('L')">Recipient wise summary
                                               <span data-ng-hide="ecomShowDe">
                                                   <i class="fa fa-fw fa-chevron-down"></i>
                                               </span>
                                               <span data-ng-show="ecomShowDe" class="ng-hide">
                                                   <i class="fa fa-fw fa-chevron-up"></i>
                                               </span>
                                           </div>
                                       </td>
                                   </tr>
                                   
                                   <tr class="" data-ng-if="ecomb2bswp">
                                       <td colspan="2">   - For Register Recipients -SEZWP<br><span>Total</span></td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2bswp.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr data-ng-if="ecomb2bswp &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!ecomb2bswp.cpty_sum || ecomb2bswp.cpty_sum.length == 0) &amp;&amp; (ecomb2bswp.ttl_rec == 0)" class="ng-hide">
                                       <td colspan="9">
                                           <div data-ng-click="collapseSummary('ecomShowSwp');getSummary('L')">Recipient wise summary
                                               <span data-ng-hide="ecomShowSwp">
                                                   <i class="fa fa-fw fa-chevron-down"></i>
                                               </span>
                                               <span data-ng-show="ecomShowSwp" class="ng-hide">
                                                   <i class="fa fa-fw fa-chevron-up"></i>
                                               </span>
                                           </div>
                                       </td>
                                   </tr>
                                   
                                   <tr class="" data-ng-if="ecomb2bswop">
                                       <td colspan="2">   - For Register Recipients -SEZWOP<br><span>Total</span></td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2bswop.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                   </tr>
                                   <tr data-ng-if="ecomb2bswop &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!ecomb2bswop.cpty_sum || ecomb2bswop.cpty_sum.length == 0) &amp;&amp; (ecomb2bswop.ttl_rec == 0)" class="ng-hide">
                                       <td colspan="9">
                                           <div data-ng-click="collapseSummary('ecomShowSwop');getSummary('L')">Recipient wise summary
                                               <span data-ng-hide="ecomShowSwop">
                                                   <i class="fa fa-fw fa-chevron-down"></i>
                                               </span>
                                               <span data-ng-show="ecomShowSwop" class="ng-hide">
                                                   <i class="fa fa-fw fa-chevron-up"></i>
                                               </span>
                                           </div>
                                       </td>
                                   </tr>
                                   
                                   <tr class="" data-ng-if="ecomb2bunreg &amp;&amp; !IFF">
                                        <td colspan="2">   - For Unregistered Recipients<br><span>Total</span></td>
                                           <td class="verticalCenter text-center" data-ng-bind="ecomb2bunreg.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Net Value</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
								    <tr data-ng-if="ecomb2bunreg &amp;&amp; !isCptyLimitExceeded" data-ng-hide="(!ecomb2bunreg.cpty_sum || ecomb2bunreg.cpty_sum.length == 0) &amp;&amp; (ecomb2bunreg.ttl_rec == 0)" class="ng-hide">
                                    <td colspan="9">
                                        <div data-ng-click="collapseSummary('ecomb2bunregshow');getSummary('L')">POS wise summary
                                            <span data-ng-hide="ecomb2bunregshow">
                                                <i class="fa fa-fw fa-chevron-down"></i>
                                            </span>
                                            <span data-ng-show="ecomb2bunregshow" class="ng-hide">
                                                <i class="fa fa-fw fa-chevron-up"></i>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
  								<!-- TABLE 15A -->
                                    <tr data-ng-if="ecomb2ba || ecomb2bareg || ecomb2bade || ecomb2baswp || ecomb2baswop || ecomb2baunreg">
                                        <td class="antiqueWhite" colspan="9" data-ng-bind="trans.HEAD_VIEWSUMM_SUP_15A_IFF">15A (I) - Amended Supplies U/s 9(5) - For Registered Recipients</td>
                                    </tr>
                                    <tr class="" data-ng-if="ecomb2ba"> 
                                        <td colspan="2" style="padding-left: 68px;">Amended amount - Total</td>
                                        <td class="verticalCenter text-center" data-ng-bind="ecomb2baTotalRec">0</td>
                                        <td class="verticalCenter text-center">Document</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
                                    <tr class="" data-ng-if="ecomb2ba"> 
                                     <td colspan="2" style="padding-left: 68px;">Net differential amount (Amended - Original)</td>
                                     <td class="verticalCenter text-center" data-ng-bind="ecomb2baTotalRec">0</td>
                                     <td class="verticalCenter text-center">Document</td>
                                     <td class="verticalCenter text-right">0.00</td>
                                     <td class="verticalCenter text-right">0.00</td>
                                     <td class="verticalCenter text-right">0.00</td>
                                     <td class="verticalCenter text-right">0.00</td>
                                     <td class="verticalCenter text-right">0.00</td>
                                 </tr>
                                   <tr class="" data-ng-if="ecomb2bareg">
                                       <td colspan="2" style="padding-left: 68px;">-Regular</td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2bareg.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr class="" data-ng-if="ecomb2bade">
                                       <td colspan="2" style="padding-left: 68px;">-DE</td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2bade.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr class="" data-ng-if="ecomb2baswp">
                                       <td colspan="2" style="padding-left: 68px;">-SEZWP</td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2baswp.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter text-right">0.00</td>
                                   </tr>
                                   <tr class="" data-ng-if="ecomb2baswop">
                                       <td colspan="2" style="padding-left: 68px;">-SEZWOP</td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2baswop.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Document</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                       <td class="verticalCenter greyCell"></td>
                                   </tr>
                                <tr data-ng-if="ecomb2baunreg">
                                    <td class="antiqueWhite" data-ng-if="!IFF" colspan="9" data-ng-bind="trans.HEAD_VIEWSUMM_SUP_15A_UNREG">15A (II) - Amended Supplies U/s 9(5) - For Unregistered Recipients</td>
                                </tr>
                                <tr class="" data-ng-if="ecomb2baunreg &amp;&amp; !IFF">
                                       <td colspan="2" style="padding-left: 68px;">Amended amount - Total</td>
                                       <td class="verticalCenter text-center" data-ng-bind="ecomb2baunreg.ttl_rec">0</td>
                                       <td class="verticalCenter text-center">Net Value</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                       <td class="verticalCenter text-right">0.00</td>
                                </tr>
                                    <tr class="" data-ng-if="ecomb2baunreg &amp;&amp; !IFF">
                                        <td colspan="2" style="padding-left: 68px;">Net differential amount (Amended - Original)</td>
                                        <td class="verticalCenter text-center" data-ng-bind="ecomb2baunreg.ttl_rec">0</td>
                                        <td class="verticalCenter text-center">Net Value</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                        <td class="verticalCenter text-right">0.00</td>
                                    </tr>
    
                                    <!-- TOTAL LIABILITY -->
                                    <tr style="background-color:#c9ece1; color: black; font-weight: bold;" data-ng-if="ttldat">
                                        <td colspan="4" data-ng-bind="trans.LBL_SUM_TOT_LIAB">Total Liability (Outward supplies other than Reverse charge)</td>
                                        <!-- <td class="verticalCenter text-center"></td>
                                        <td class="verticalCenter text-center"></td> -->
                                        <td class="verticalCenter text-right"><?php echo number_format(@$total_value); ?></td>
                                        <td class="verticalCenter text-right"><?php echo number_format(@$integrated_tax); ?></td>
                                        <td class="verticalCenter text-right"><?php echo number_format(@$central_tax); ?></td>
                                        <td class="verticalCenter text-right"><?php echo number_format(@$state_tax); ?></td>
                                        <td class="verticalCenter text-right"><?php echo number_format(@$cess); ?></td>
                                    </tr>
                                </tbody>
                            </table>
        
                        </div>
                    </div>
                </div>
               <?php if (empty($is_pdf)): ?>
                <div class="row" style="margin-top: -2%;margin-right: 16px;">
                    <div class="pull-right">
                        <button type="button" onclick="location.href='returngstr1online'" class="btn btn-default">Back</button>

                        <!--<button  type="button" class="btn btn-primary" title="">-->
                        <!--    <span >DOWNLOAD SUMMARY (PDF)</span>-->
                            
                        <!--</button>-->
                         <a href="<?php echo base_url('home/download_summary_pdf'); ?>" class="btn btn-primary">DOWNLOAD SUMMARY (PDF)</a>
                        <button type="button" class="btn btn-primary" onclick="location.href='gst_returngstr1file'">File Statement</button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>

</div>


