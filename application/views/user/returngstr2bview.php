

    
   <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div _ngcontent-aii-c0="" class="bread-trans">
    <app-breadcrumb _ngcontent-aii-c0="" _nghost-aii-c3="">
        <div _ngcontent-aii-c3="" class="container">
            <div _ngcontent-aii-c3="" class="col-md-12 noPaddingLR">
                <div _ngcontent-aii-c3="" class="col-md-9 breadcrumb">
                    <ul _ngcontent-aii-c3="" class="noPaddingLR">
                        <!---->
                        <li _ngcontent-aii-c3="" class="breadcrumb-item">
                            <!----><a _ngcontent-aii-c3="" class="breadcrumb-font" href="/gst/dashboard/"> Dashboard </a>
                            <!---->
                            <!---->
                        </li>
                        <li _ngcontent-aii-c3="" class="breadcrumb-item">
                            <!----><a _ngcontent-aii-c3="" class="breadcrumb-font" href="/gst/return/dashboard/"> Returns </a>
                            <!---->
                            <!---->
                        </li>
                        <li _ngcontent-aii-c3="" class="breadcrumb-item ng-star-inserted">
                            <!---->
                            <!---->
                            <!----><span _ngcontent-aii-c3="" class="breadcrumb-font ng-star-inserted"> GSTR-2B</span></li>
                    </ul>
                </div>
                <div _ngcontent-aii-c3="" class="col-md-3 marginT10">
                    <div _ngcontent-aii-c3="" class="lang dropdown"><span _ngcontent-aii-c3="" class="dropdown-toggle" data-toggle="dropdown">English</span>
                        <ul _ngcontent-aii-c3="" class="dropdown-menu lang-dpdwn">
                            <!---->
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">English</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Hindi</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Tamil</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Bengali</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Gujurati</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Kannada</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Malayalam</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Marathi</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Odiya</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Punjabi</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Telugu</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Urdu</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Konakani</a></li>
                            <li _ngcontent-aii-c3=""><a _ngcontent-aii-c3="">Assamese</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </app-breadcrumb>
</div>
<div _ngcontent-aii-c0="" class="container">
    <router-outlet _ngcontent-aii-c0=""></router-outlet>
    <app-gstr2b _nghost-aii-c5="">
        <div _ngcontent-aii-c5="" class="container">
            <div _ngcontent-aii-c5="" class="row invsumm">
                <div _ngcontent-aii-c5="" class="col-xs-12 taxp" data-target="#userdetails" data-toggle="collapse"> GSTR-2B- AUTO-DRAFTED ITC STATEMENT <i _ngcontent-aii-c5="" class="fa fa-minus pull-right"></i></div>
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
        </div>
        <br _ngcontent-aii-c5="">
        <div _ngcontent-aii-c5="" class="container">
            <div _ngcontent-aii-c5="" class="tabpane">
                <ul _ngcontent-aii-c5="" class="nav nav-tabs">
                    <li _ngcontent-aii-c5="" class="nav-item"><a _ngcontent-aii-c5="" data-toggle="pill" class="nav-link">SUMMARY</a></li>
                    <li _ngcontent-aii-c5="" class="active"><a _ngcontent-aii-c5="" data-toggle="pill" class="active">ALL TABLES</a></li>
                    <li _ngcontent-aii-c5="" class="pull-right"><a _ngcontent-aii-c5="" data-backdrop="static" data-keyboard="false" data-toggle="modal" href="#cutoffDtModal">View Advisory</a></li>
                </ul>
                <div _ngcontent-aii-c5="" class="empty"></div>
                <div _ngcontent-aii-c5="">
                    <router-outlet _ngcontent-aii-c5=""></router-outlet>
                    <app-all-tables _nghost-aii-c9="" class="ng-star-inserted">
                        <div _ngcontent-aii-c9="" class="tab-content ">
                            <br _ngcontent-aii-c9="">
                            <div _ngcontent-aii-c9="" class="row">
                                <div _ngcontent-aii-c9="" class="">
                                    <div _ngcontent-aii-c9="" class="row" style="margin-left: 8px;">
                                        <div _ngcontent-aii-c9="" class="col-md-3">
                                            <div _ngcontent-aii-c9="" id="myTabDD" role="tablist">
                                                <div _ngcontent-aii-c9="" class="dropdown">
                                                    <button _ngcontent-aii-c9="" aria-expanded="false" aria-haspopup="true" class="btn btn-custom dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" style="margin:2px 0px 2px 0px;font-weight:bolder;" type="button">Select table to view details&nbsp; <i _ngcontent-aii-c9="" class="fa fa-chevron-down"></i></button>
                                                    <div _ngcontent-aii-c9="" aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="width:580px; padding-left:5px;">
                                                        <!---->
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Taxable inward supplies received from registered person - B2B </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Amendments to previously filed invoices by supplier - B2BA </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Debit/Credit notes(Original) - B2B CDNR </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Amendments to previously filed Credit/Debit notes by supplier - B2B CDNRA </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">ISD Credits </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Amendments ISD Credits received - ISDA </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Import of goods from overseas on bill of entry - IMPG </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                        <!----><a _ngcontent-aii-c9="" class="dropdown-item ng-star-inserted" style="cursor: pointer;">Import of goods from SEZ units/developers on bill of entry - IMPGSEZ </a>
                                                        <br _ngcontent-aii-c9="" class="ng-star-inserted">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div _ngcontent-aii-c9="" class="col-md-9" style="padding-right: 35px;">
                                            <div _ngcontent-aii-c9="" class="dropdown">
                                                <div _ngcontent-aii-c9="" class=" btn-custom1" style="margin:2px 0px 2px 0px;font-weight:bolder;">Taxable inward supplies received from registered person - B2B <span _ngcontent-aii-c9="" class="pull-right"><button _ngcontent-aii-c9="" class="btn-help">HELP <i _ngcontent-aii-c9="" class="fa fa-question-circle" style="color: white;margin-left: 3px;"></i></button>&nbsp;&nbsp; </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div _ngcontent-aii-c9="">
                                <router-outlet _ngcontent-aii-c9=""></router-outlet>
                                <app-b2b _nghost-aii-c10="" class="ng-star-inserted">
                                    <block-ui _ngcontent-aii-c10="">
                                        <div _ngcontent-aii-c10="" class="">
                                            <div _ngcontent-aii-c10="" class="tabpane">
                                                <div _ngcontent-aii-c10="" class="row">
                                                    <div _ngcontent-aii-c10="" class="empty"></div>
                                                    <hr _ngcontent-aii-c10="" style="margin:0px;">
                                                    <div _ngcontent-aii-c10="" class="row">
                                                        <div _ngcontent-aii-c10="" class="col-md-10 ">
                                                            <!---->
                                                            <ul _ngcontent-aii-c10="" class="nav nav-pills ng-star-inserted" id="myTab" role="tablist">
                                                                <li _ngcontent-aii-c10="" class="nav-item"><a _ngcontent-aii-c10="" aria-controls="suppsumm" class="nav-link border-right" data-toggle="tab" href="#suppsumm" id="sup" role="tab" aria-expanded="false">Supplier wise Details</a></li>
                                                                <li _ngcontent-aii-c10="" class="nav-item active"><a _ngcontent-aii-c10="" aria-controls="docdet" class="nav-link border-right" data-toggle="tab" href="#docdet" id="doc" role="tab" aria-expanded="true">Document Details</a></li>
                                                            </ul>
                                                        </div>
                                                        <!---->
                                                        <div _ngcontent-aii-c10="" class="col-sm-2 col-md-2 form-inline ng-star-inserted" style="margin-top:18px;"><a _ngcontent-aii-c10="" data-toggle="modal" href="javascript:void(0)">Download Excel <i _ngcontent-aii-c10="" class="fa fa-download"></i></a></div>
                                                    </div>
                                                    <hr _ngcontent-aii-c10="" style="margin:0px;">
                                                    <div _ngcontent-aii-c10="" class="tab-content ">
                                                        <!---->
                                                        <!---->
                                                        <div _ngcontent-aii-c10="" aria-labelledby="docdet-tab" id="docdet" role="tabpanel" class="tab-pane border-0 ng-star-inserted active">
                                                            <div _ngcontent-aii-c10="" class="">
                                                                <div _ngcontent-aii-c10="" class="empty"></div>
                                                                <!---->
                                                                <div _ngcontent-aii-c10="" class="row form-inline ng-star-inserted">
                                                             

                                                        </div>
                                                        <!---->
                                                        <!---->
                                                        <div _ngcontent-aii-c10="" class="row ng-star-inserted" id="pill" hidden="">
                                                            <div _ngcontent-aii-c10="" class="col-md-12 col-sm-12">
                                                                <div _ngcontent-aii-c10="" class="pillbutton"> <a _ngcontent-aii-c10=""><i _ngcontent-aii-c10="" class="fa fa-close"></i></a></div>
                                                                <!---->
                                                                <div _ngcontent-aii-c10="" class="pillbutton ng-star-inserted"> </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                        <div _ngcontent-aii-c10="" class="row ng-star-inserted">
                                                            <div _ngcontent-aii-c10="" class="col-sm-12 pull-left">
                                                                <!---->
                                                                <div _ngcontent-aii-c10="" class="table-responsive ng-star-inserted">
                                                                    <table _ngcontent-aii-c10="" class="table table-bordered ">
                                                                        <thead _ngcontent-aii-c10="">
                                                                            <tr _ngcontent-aii-c10="">
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="">S.NO. </th>
                                                                                <!---->
                                                                                <th _ngcontent-aii-c10="" class="org ng-star-inserted" nowrap="" style="cursor: pointer;">GSTIN of supplier <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;"> Trade/legal
                                                                                    <br _ngcontent-aii-c10=""> name <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Invoice number <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Invoice type <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Invoice
                                                                                    <br _ngcontent-aii-c10="">Date <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Invoice
                                                                                    <br _ngcontent-aii-c10=""> Value (â‚¹) <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Place of
                                                                                    <br _ngcontent-aii-c10=""> supply <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Supply Attract
                                                                                    <br _ngcontent-aii-c10="">Reverse Charge <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;"> Total Taxable
                                                                                    <br _ngcontent-aii-c10=""> Value (â‚¹) <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width:3%; cursor: pointer;">Integrated
                                                                                    <br _ngcontent-aii-c10="">Tax (â‚¹) <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width:13%;cursor: pointer;">Central
                                                                                    <br _ngcontent-aii-c10="">Tax (â‚¹) <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width:13%;cursor: pointer;">State/UT
                                                                                    <br _ngcontent-aii-c10="">Tax (â‚¹) <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width: 9%;cursor: pointer;">Cess (â‚¹) <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width: 9%;cursor: pointer;cursor: pointer;">
                                                                                    <!---->
                                                                                    <!----><span _ngcontent-aii-c10="" class="ng-star-inserted"> GSTR-1/IFF/GSTR-5 </span>
                                                                                    <br _ngcontent-aii-c10=""> Period <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width: 9%;cursor: pointer;">
                                                                                    <!---->
                                                                                    <!----><span _ngcontent-aii-c10="" class="ng-star-inserted"> GSTR-1/IFF/GSTR-5 Filing </span>
                                                                                    <br _ngcontent-aii-c10=""> Date <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width: 9%;cursor: pointer;">ITC Availability <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="width: 9%;cursor: pointer;">Reason <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;" hidden=""> Applicable % of
                                                                                    <br _ngcontent-aii-c10="">Tax Rate <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;">Source <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;" hidden="">IRN <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                                <th _ngcontent-aii-c10="" class="org" nowrap="" style="cursor: pointer;" hidden=""> IRN date <span _ngcontent-aii-c10=""><!----><i _ngcontent-aii-c10="" class="fa fas fa-sort-asc ng-star-inserted"></i></span><span _ngcontent-aii-c10=""><!----></span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody _ngcontent-aii-c10="">
                                                                            <!---->
                                                                            <!---->
                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">1</td>
                                                                                <!---->
                                                                                <td _ngcontent-aii-c10="" class="rev ng-star-inserted" nowrap="">07AABCM9407D1ZO </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> SHREE MARUTI COURIER SERVICES PVT.LTD.</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">3833202110000903 <a _ngcontent-aii-c10="" id="downfa991ddc0e78ac6411dee4a358f323509c432ad63338258f0b54a13795e1c497"><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-down"></i></a><a _ngcontent-aii-c10="" id="upfa991ddc0e78ac6411dee4a358f323509c432ad63338258f0b54a13795e1c497" hidden=""><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-up"></i></a></td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Regular </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">03/02/2025 </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 70.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Delhi </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">No </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">59.32</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">5.34</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">5.34</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Feb'21 </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> 11/03/2025</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Yes </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-right" nowrap="" hidden=""> 100%</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev " nowrap="" hidden="" title=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="" hidden=""> </td>
                                                                            </tr>
                                                                            <tr _ngcontent-aii-c10="" class="itemData ng-star-inserted" id="fa991ddc0e78ac6411dee4a358f323509c432ad63338258f0b54a13795e1c497" hidden="">
                                                                                <td _ngcontent-aii-c10="" colspan="1"></td>
                                                                                <td _ngcontent-aii-c10="" colspan="5">
                                                                                    <table _ngcontent-aii-c10="" class="table table-bordered">
                                                                                        <thead _ngcontent-aii-c10="" class="thead-light">
                                                                                            <tr _ngcontent-aii-c10="">
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Tax Rate (%) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Taxable Value (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Integrated Tax (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Central Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">State/UT Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Cess (â‚¹) </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody _ngcontent-aii-c10="">
                                                                                            <!---->
                                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                                <td _ngcontent-aii-c10="">18</td>
                                                                                                <td _ngcontent-aii-c10="">59.32</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                                <td _ngcontent-aii-c10="">5.34</td>
                                                                                                <td _ngcontent-aii-c10="">5.34</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td _ngcontent-aii-c10="" colspan="13"></td>
                                                                            </tr>
                                                                            <!---->
                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">2</td>
                                                                                <!---->
                                                                                <td  class="rev ng-star-inserted" nowrap="">07AABCM9407D1ZO </td>
                                                                                <td class="rev text-left" nowrap=""> SHREE MARUTI COURIER SERVICES PVT.LTD.</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">3833202110000964 <a _ngcontent-aii-c10="" id="downe44694d2e86576ae845bfa5816c244672797fb8a63ada3710f84e37e3451172a"><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-down"></i></a><a _ngcontent-aii-c10="" id="upe44694d2e86576ae845bfa5816c244672797fb8a63ada3710f84e37e3451172a" hidden=""><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-up"></i></a></td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Regular </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">19/02/2025 </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 70.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Delhi </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">No </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">59.32</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">5.34</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">5.34</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Feb'21 </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> 11/03/2025</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Yes </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-right" nowrap="" hidden=""> 100%</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev " nowrap="" hidden="" title=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="" hidden=""> </td>
                                                                            </tr>
                                                                            <tr _ngcontent-aii-c10="" class="itemData ng-star-inserted" id="e44694d2e86576ae845bfa5816c244672797fb8a63ada3710f84e37e3451172a" hidden="">
                                                                                <td _ngcontent-aii-c10="" colspan="1"></td>
                                                                                <td _ngcontent-aii-c10="" colspan="5">
                                                                                    <table _ngcontent-aii-c10="" class="table table-bordered">
                                                                                        <thead _ngcontent-aii-c10="" class="thead-light">
                                                                                            <tr _ngcontent-aii-c10="">
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Tax Rate (%) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Taxable Value (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Integrated Tax (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Central Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">State/UT Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Cess (â‚¹) </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody _ngcontent-aii-c10="">
                                                                                            <!---->
                                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                                <td _ngcontent-aii-c10="">18</td>
                                                                                                <td _ngcontent-aii-c10="">59.32</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                                <td _ngcontent-aii-c10="">5.34</td>
                                                                                                <td _ngcontent-aii-c10="">5.34</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td _ngcontent-aii-c10="" colspan="13"></td>
                                                                            </tr>
                                                                            <!---->
                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">3</td>
                                                                                <!---->
                                                                                <td _ngcontent-aii-c10="" class="rev ng-star-inserted" nowrap="">07AAACB2894G1ZP </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> Bharti Airtel Limited</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">FT2107I005482863 <a _ngcontent-aii-c10="" id="downfad8e699d8c45dde975473241596efaaa442fa1af5e6aedbc47bfb7ae05186fd"><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-down"></i></a><a _ngcontent-aii-c10="" id="upfad8e699d8c45dde975473241596efaaa442fa1af5e6aedbc47bfb7ae05186fd" hidden=""><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-up"></i></a></td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Regular </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">12/02/2025 </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 588.82</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Delhi </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">No </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">499.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">44.91</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">44.91</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Feb'21 </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> 11/03/2025</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Yes </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-right" nowrap="" hidden=""> 100%</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev " nowrap="" hidden="" title=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="" hidden=""> </td>
                                                                            </tr>
                                                                            <tr _ngcontent-aii-c10="" class="itemData ng-star-inserted" id="fad8e699d8c45dde975473241596efaaa442fa1af5e6aedbc47bfb7ae05186fd" hidden="">
                                                                                <td _ngcontent-aii-c10="" colspan="1"></td>
                                                                                <td _ngcontent-aii-c10="" colspan="5">
                                                                                    <table _ngcontent-aii-c10="" class="table table-bordered">
                                                                                        <thead _ngcontent-aii-c10="" class="thead-light">
                                                                                            <tr _ngcontent-aii-c10="">
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Tax Rate (%) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Taxable Value (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Integrated Tax (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Central Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">State/UT Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Cess (â‚¹) </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody _ngcontent-aii-c10="">
                                                                                            <!---->
                                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                                <td _ngcontent-aii-c10="">18</td>
                                                                                                <td _ngcontent-aii-c10="">499.00</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                                <td _ngcontent-aii-c10="">44.91</td>
                                                                                                <td _ngcontent-aii-c10="">44.91</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td _ngcontent-aii-c10="" colspan="13"></td>
                                                                            </tr>
                                                                            <!---->
                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">4</td>
                                                                                <!---->
                                                                                <td _ngcontent-aii-c10="" class="rev ng-star-inserted" nowrap="">07AAIFJ7705K1Z2 </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> JK ENTERPRICES</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">M/20-21/304 <a _ngcontent-aii-c10="" id="downa6eb42395cbc1fbe6901bd9ec325b116f3282df649e044af026eba998d5453b7"><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-down"></i></a><a _ngcontent-aii-c10="" id="upa6eb42395cbc1fbe6901bd9ec325b116f3282df649e044af026eba998d5453b7" hidden=""><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-up"></i></a></td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Regular </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">07/02/2025 </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 2,832.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Delhi </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">No </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">2,400.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">216.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">216.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Feb'21 </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> 11/03/2025</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Yes </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-right" nowrap="" hidden=""> 100%</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev " nowrap="" hidden="" title=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="" hidden=""> </td>
                                                                            </tr>
                                                                            <tr _ngcontent-aii-c10="" class="itemData ng-star-inserted" id="a6eb42395cbc1fbe6901bd9ec325b116f3282df649e044af026eba998d5453b7" hidden="">
                                                                                <td _ngcontent-aii-c10="" colspan="1"></td>
                                                                                <td _ngcontent-aii-c10="" colspan="5">
                                                                                    <table _ngcontent-aii-c10="" class="table table-bordered">
                                                                                        <thead _ngcontent-aii-c10="" class="thead-light">
                                                                                            <tr _ngcontent-aii-c10="">
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Tax Rate (%) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Taxable Value (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Integrated Tax (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Central Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">State/UT Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Cess (â‚¹) </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody _ngcontent-aii-c10="">
                                                                                            <!---->
                                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                                <td _ngcontent-aii-c10="">18</td>
                                                                                                <td _ngcontent-aii-c10="">2,400.00</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                                <td _ngcontent-aii-c10="">216.00</td>
                                                                                                <td _ngcontent-aii-c10="">216.00</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td _ngcontent-aii-c10="" colspan="13"></td>
                                                                            </tr>
                                                                            <!---->
                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">5</td>
                                                                                <!---->
                                                                                <td _ngcontent-aii-c10="" class="rev ng-star-inserted" nowrap="">07EGDPS3066R1ZL </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> SUNNY TELECOM</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">10305 <a _ngcontent-aii-c10="" id="downbafcd6b43a2a202fa58fccfea9f583814098f7976fa3d22384b84054c5a1f3ed"><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-down"></i></a><a _ngcontent-aii-c10="" id="upbafcd6b43a2a202fa58fccfea9f583814098f7976fa3d22384b84054c5a1f3ed" hidden=""><i _ngcontent-aii-c10="" class="fa fa-fw fa-chevron-up"></i></a></td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Regular </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">16/02/2025 </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 13,750.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">Delhi </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="">No </td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">11,652.54</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">1,048.73</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap="">1,048.73</td>
                                                                                <td _ngcontent-aii-c10="" class="text-right" nowrap=""> 0.00</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Feb'21 </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> 13/03/2025</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> Yes </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-left" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev text-right" nowrap="" hidden=""> 100%</td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev " nowrap="" hidden="" title=""> </td>
                                                                                <td _ngcontent-aii-c10="" class="rev" nowrap="" hidden=""> </td>
                                                                            </tr>
                                                                            <tr _ngcontent-aii-c10="" class="itemData ng-star-inserted" id="bafcd6b43a2a202fa58fccfea9f583814098f7976fa3d22384b84054c5a1f3ed" hidden="">
                                                                                <td _ngcontent-aii-c10="" colspan="1"></td>
                                                                                <td _ngcontent-aii-c10="" colspan="5">
                                                                                    <table _ngcontent-aii-c10="" class="table table-bordered">
                                                                                        <thead _ngcontent-aii-c10="" class="thead-light">
                                                                                            <tr _ngcontent-aii-c10="">
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Tax Rate (%) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Taxable Value (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Integrated Tax (â‚¹)</th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Central Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">State/UT Tax (â‚¹) </th>
                                                                                                <th _ngcontent-aii-c10="" class="text-center" rowspan="2">Cess (â‚¹) </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody _ngcontent-aii-c10="">
                                                                                            <!---->
                                                                                            <tr _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                                                <td _ngcontent-aii-c10="">18</td>
                                                                                                <td _ngcontent-aii-c10="">11,652.54</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                                <td _ngcontent-aii-c10="">1,048.73</td>
                                                                                                <td _ngcontent-aii-c10="">1,048.73</td>
                                                                                                <td _ngcontent-aii-c10="">0.00</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td _ngcontent-aii-c10="" colspan="13"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!---->
                                                                    <pagination-controls _ngcontent-aii-c10="" class="ng-star-inserted">
                                                                        <pagination-template>
                                                                            <!---->
                                                                           
                                                                        </pagination-template>
                                                                    </pagination-controls>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div _ngcontent-aii-c10="" class="row">
                                <div _ngcontent-aii-c10="" class="col-sm-12 col-xs-12 text-right " style="margin-bottom:-20px;">
                                    <a _ngcontent-aii-c10="">
                                        <button _ngcontent-aii-c10="" class="btn btn-default" type="button">Back to Summary</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div _ngcontent-aii-c10="" class="modal" id="filter">
                            <div _ngcontent-aii-c10="" class="modal-center">
                                <div _ngcontent-aii-c10="" class="modal-dialog">
                                    <div _ngcontent-aii-c10="" class="modal-content" style="width: 725px;">
                                        <div _ngcontent-aii-c10="" class="content-pane-returns">
                                            <div _ngcontent-aii-c10="" class="col-sm-12 pull-left head">
                                                <div _ngcontent-aii-c10="" class="row top" style="background-color: #17C4BB;">
                                                    <div _ngcontent-aii-c10="" class="col-xs-12 col-sm-12 taxp" id="modal-title">
                                                        <button _ngcontent-aii-c10="" class="close" data-dismiss="modal" style="margin-top: 8px;" type="button"> Ã— </button>
                                                        <h4 _ngcontent-aii-c10="" style="padding-left:10px;"> Apply filter</h4></div>
                                                </div>
                                            </div>
                                            <div _ngcontent-aii-c10="" class="tabpane">
                                                <div _ngcontent-aii-c10="" class="row" style="margin-top:30px;">
                                                    <table _ngcontent-aii-c10="" class="table table-borderless" id="table" style="width: fit-content;">
                                                        <thead _ngcontent-aii-c10=""></thead>
                                                        <tbody _ngcontent-aii-c10="">
                                                            <tr _ngcontent-aii-c10="">
                                                                <td _ngcontent-aii-c10="" class="filterHeader"><span _ngcontent-aii-c10="">Invoice Date :</span></td>
                                                                <td _ngcontent-aii-c10=""> From
                                                                    <p-calendar _ngcontent-aii-c10="" dateformat="dd/mm/yy" placeholder="dd/mm/yyyy" class="ng-tns-c13-0 ng-untouched ng-pristine ng-valid"><span class="ng-tns-c13-0 ui-calendar"><!----><input autocomplete="off" type="text" class="ng-tns-c13-0 ui-inputtext ui-widget ui-state-default ui-corner-all ng-star-inserted" readonly="" placeholder="dd/mm/yyyy"><!----><!----><!----></span></p-calendar> To
                                                                    <p-calendar _ngcontent-aii-c10="" dateformat="dd/mm/yy" placeholder="dd/mm/yyyy" class="ng-tns-c13-1 ng-untouched ng-pristine ng-valid"><span class="ng-tns-c13-1 ui-calendar"><!----><input autocomplete="off" type="text" class="ng-tns-c13-1 ui-inputtext ui-widget ui-state-default ui-corner-all ng-star-inserted" readonly="" placeholder="dd/mm/yyyy"><!----><!----><!----></span></p-calendar>
                                                                </td>
                                                            </tr>
                                                            <tr _ngcontent-aii-c10="">
                                                                <td _ngcontent-aii-c10="" class="filterHeader"><span _ngcontent-aii-c10="">Invoice type :</span></td>
                                                                <td _ngcontent-aii-c10="">
                                                                    <div _ngcontent-aii-c10="" class="form-group">
                                                                        <select _ngcontent-aii-c10="" class="form-control pcal ng-untouched ng-pristine ng-valid">
                                                                            <option _ngcontent-aii-c10="" value="">Select</option>
                                                                            <option _ngcontent-aii-c10="" value="R">Regular</option>
                                                                            <option _ngcontent-aii-c10="" value="DE">Deemed Export</option>
                                                                            <option _ngcontent-aii-c10="" value="SEWP">SEZ supplies with payment of tax</option>
                                                                            <option _ngcontent-aii-c10="" value="SEWOP">SEZ supplies without payment of tax </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr _ngcontent-aii-c10="">
                                                                <td _ngcontent-aii-c10="" class="filterHeader"><span _ngcontent-aii-c10="">Supply Attract Reverse Charge :</span></td>
                                                                <td _ngcontent-aii-c10="">
                                                                    <div _ngcontent-aii-c10="" class="form-group">
                                                                        <select _ngcontent-aii-c10="" class="form-control pcal ng-untouched ng-pristine ng-valid">
                                                                            <option _ngcontent-aii-c10="" value="">Select</option>
                                                                            <option _ngcontent-aii-c10="" value="Yes">Yes</option>
                                                                            <option _ngcontent-aii-c10="" value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr _ngcontent-aii-c10="">
                                                                <td _ngcontent-aii-c10="" class="filterHeader">
                                                                    <!---->
                                                                    <!----><span _ngcontent-aii-c10="" class="ng-star-inserted"> GSTR-1/IFF/GSTR-5 Filing Date: </span></td>
                                                                <td _ngcontent-aii-c10="">From
                                                                    <p-calendar _ngcontent-aii-c10="" dateformat="dd/mm/yy" placeholder="dd/mm/yyyy" class="ng-tns-c13-2 ng-untouched ng-pristine ng-valid"><span class="ng-tns-c13-2 ui-calendar"><!----><input autocomplete="off" type="text" class="ng-tns-c13-2 ui-inputtext ui-widget ui-state-default ui-corner-all ng-star-inserted" readonly="" placeholder="dd/mm/yyyy"><!----><!----><!----></span></p-calendar> To
                                                                    <p-calendar _ngcontent-aii-c10="" dateformat="dd/mm/yy" placeholder="dd/mm/yyyy" class="ng-tns-c13-3 ng-untouched ng-pristine ng-valid"><span class="ng-tns-c13-3 ui-calendar"><!----><input autocomplete="off" type="text" class="ng-tns-c13-3 ui-inputtext ui-widget ui-state-default ui-corner-all ng-star-inserted" readonly="" placeholder="dd/mm/yyyy"><!----><!----><!----></span></p-calendar>
                                                                </td>
                                                            </tr>
                                                            <tr _ngcontent-aii-c10="">
                                                                <td _ngcontent-aii-c10="" class="filterHeader"><span _ngcontent-aii-c10="">ITC Availability :</span></td>
                                                                <td _ngcontent-aii-c10="">
                                                                    <div _ngcontent-aii-c10="" class="form-group">
                                                                        <select _ngcontent-aii-c10="" class="form-control pcal ng-untouched ng-pristine ng-valid">
                                                                            <option _ngcontent-aii-c10="" value="">Select</option>
                                                                            <option _ngcontent-aii-c10="" value="Yes">Yes</option>
                                                                            <option _ngcontent-aii-c10="" value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr _ngcontent-aii-c10="">
                                                                <td _ngcontent-aii-c10="" class="filterHeader"><span _ngcontent-aii-c10="">Applicable % of Tax Rate :</span></td>
                                                                <td _ngcontent-aii-c10="">
                                                                    <div _ngcontent-aii-c10="" class="form-group">
                                                                        <select _ngcontent-aii-c10="" class="form-control pcal ng-untouched ng-pristine ng-valid">
                                                                            <option _ngcontent-aii-c10="" value="">Select</option>
                                                                            <option _ngcontent-aii-c10="" value="65">65</option>
                                                                            <option _ngcontent-aii-c10="" value="100">100</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div _ngcontent-aii-c10="" class="row" style="margin-top: -25px">
                                                    <div _ngcontent-aii-c10="" class="col-sm-12 col-xs-12 text-right next-tab-nav">
                                                        <a _ngcontent-aii-c10="">
                                                            <button _ngcontent-aii-c10="" class="btn btn-default" data-dismiss="modal" type="button"> Back </button>
                                                        </a>
                                                        <a _ngcontent-aii-c10="">
                                                            <button _ngcontent-aii-c10="" class="btn btn-primary" type="button">Reset</button>
                                                        </a>
                                                        <a _ngcontent-aii-c10="">
                                                            <button _ngcontent-aii-c10="" class="btn btn-primary" data-dismiss="modal" type="button">Apply</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <block-ui-content>
                            <div class="block-ui-wrapper block-ui-main">
                                <!---->
                                <div class="block-ui-spinner ng-star-inserted">
                                    <div class="loader"></div>
                                    <!---->
                                </div>
                                <!---->
                            </div>
                        </block-ui-content>
                        </block-ui>
                        </app-b2b>
                </div>
            </div>
            </app-all-tables>
        </div>
</div>
</div>
<div _ngcontent-aii-c5="" class="modal" id="cutoffDtModal">
    <div _ngcontent-aii-c5="" class="modal-center">
        <div _ngcontent-aii-c5="" class="modal-dialog">
            <div _ngcontent-aii-c5="" class="modal-content" style="width: 837px;margin-left:-60px;overflow-y: auto;">
                <div _ngcontent-aii-c5="" class="content-pane-returns" style="margin-top: 10px;">
                    <div _ngcontent-aii-c5="" class="col-sm-12 pull-left head">
                        <div _ngcontent-aii-c5="" class="row">
                            <div _ngcontent-aii-c5="" class="row top" style="width: 805px;background-color: #17C4BB;">
                                <div _ngcontent-aii-c5="" class="col-xs-12 col-sm-12 taxp" id="modal-title">
                                    <button _ngcontent-aii-c5="" class="close" data-dismiss="modal" type="button">Ã—</button>
                                    <h4 _ngcontent-aii-c5="" style="margin-left:10px;"> Cut-off dates considered for GSTR-2B</h4></div>
                            </div>
                        </div>
                    </div>
                    <div _ngcontent-aii-c5="" class="cutoff-tabpane">
                        <!---->
                        <div _ngcontent-aii-c5="" class="row">
                            <div _ngcontent-aii-c5="" class="col-sm-12 col-xs-12 text-right next-tab-nav" style="margin-top: -10px;">
                                <button _ngcontent-aii-c5="" class="btn btn-default" data-dismiss="modal" type="button">Back</button><a _ngcontent-aii-c5="" class="btn btn-primary"> DOWNLOAD ADVISORY </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</app-gstr2b>
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
<footer class="">
    <div class="expbtn">
        <i class="fa fa-angle-up" title="Expand/Collapse Footer"></i>
    </div>
    <div class="ifooter " id="demo">
        <!-- <div class="f1 menuList" data-ng-show="!expanded" id="siteDis" data-toggle="tooltip" data-placement="top"
            data-ng-class="{'disabled' :udata.disableMenu}" data-original-title="" title="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-mobile">
                        <a class="fhead" data-ng-href="" 
                            data-ng-class="{'disabledanchor' :udata.disableMenu}"
                            href="" >About GST</a>
                        <ul>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >GST Council Structure</a></li>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >GST History</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-mobile">
                        <a class="fhead" data-ng-href="" 
                            data-ng-class="{'disabledanchor' :udata.disableMenu}"
                            href="" >Website Policies</a>
                        <ul>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Website Policy</a></li>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Terms and Conditions</a></li>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Hyperlink Policy</a></li>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Disclaimer</a></li>
                        </ul>

                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-mobile">
                        <a class="fhead" data-ng-href="" 
                            data-ng-class="{'disabledanchor' :udata.disableMenu}"
                            href="" >Related Sites</a>
                        <ul>
                            <li><a data-popup="true" data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Central
                                    Board
                                    of Indirect Taxes and Customs</a></li>
                            <li><a data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >State
                                    Tax Websites</a></li>
                            <li><a data-popup="true" data-ng-href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >National
                                    Portal</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 help no-mobile">
                        <a class="fhead"
                            data-ng-href="" 
                            target="_self" data-ng-class="{'disabledanchor' :udata.disableMenu}"
                            href="" >Help and
                            Taxpayer
                            Facilities</a>
                        <ul>
                            <li> <a data-ng-href=""  target="_self"
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >System
                                    Requirements</a></li>
                            <li> <a data-ng-href=""  target="_self"
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >GST Knowledge Portal</a></li>
                            <li> <a data-popup="true" href="" 
                                    target="_blank" data-ng-class="{'disabledanchor' :udata.disableMenu}">GST Media</a>
                            </li>


                            
                            
                            
                            <li data-ng-if="!udata"><a data-ng-href="" 
                                    target="_self" data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Site Map</a></li>
                            <li><a data-ng-href=""  target="_self"
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Grievance Nodal Officers
                                </a>
                            </li>
                            <li><a data-popup="true" data-ng-href="" 
                                    target="_blank" data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >Free Accounting and Billing
                                    Services</a></li>
                            <li><a data-popup="true" data-ng-href=""  target="_blank"
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"
                                    href="" >GST Suvidha Providers</a></li>

                        </ul>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 cont no-mobile scl">
                        <a class="fhead" data-ng-href="" 
                            data-ng-class="{'disabledanchor' :udata.disableMenu}"
                            href="" >Contact Us</a>
                        <ul>
                            <li>
                                <span class="contact">Help Desk Number: <br>1800-103-4786</span>
                            </li>
                            <li>
                                <span class="contact">Log/Track Your Issue:<br></span><a data-popup="true" href=""
                                    
                                    title="Grievance Redressal Portal for GST" target="_blank"
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}">Grievance Redressal
                                    Portal for GST</a>
                            </li>
                            <li class="social">
                                <a data-popup="true" href="" 
                                    title="Facebook" data-ng-class="{'disabledanchor' :udata.disableMenu}"><i
                                        class="fa fa-facebook-square"></i>.</a>
                                <a data-popup="true" href="" 
                                    title="Youtube" data-ng-class="{'disabledanchor' :udata.disableMenu}"><i
                                        class="fa fa-youtube-play"></i>.</a>
                                <a data-popup="true" href="" 
                                    data-ng-class="{'disabledanchor' :udata.disableMenu}"><i class="fa fa-twitter"
                                        title="Twitter"></i>.</a>
                                <a data-popup="true" href="" 
                                    title="Linkedin" data-ng-class="{'disabledanchor' :udata.disableMenu}"><i
                                        class="fa fa-linkedin"></i>.</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="f2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Â© 2025 </p>
                        <p>Site Last Updated on 29/03/2025</p>
                        <!-- <p>Designed & Developed by <a href="https://www.teachoo.com">Teachoo</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="f3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="site">Site best viewed at 1024 x 768 resolution in Internet Explorer 10+, Google
                            Chrome 49+, Firefox 45+ and Safari 6+</p>
                    </div>
                </div>
            </div>
        </div>
 