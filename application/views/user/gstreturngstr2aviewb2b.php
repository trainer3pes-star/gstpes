
     
    
   <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
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
                            <span ng-switch-when="true">GSTR2A</span>
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
        <div class="myPage" data-ng-init="b2bpreview()">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_GSTIN">GSTIN - </span>
                                    <span data-ng-bind="dsbModel.gstin">07AASCS2460H1ZO</span>
                                </div>
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_LEGAL_NAME">Legal Name - </span>
                                    <span data-ng-bind="dsbModel.bsname">CA MANINDER SINGH</span>
                                </div>
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_TRADE_NAME">Trade Name - </span>
                                    <span data-ng-bind="dsbModel.tname">CA MANINDER SINGH</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_FY">FY - </span>
                                    <span data-ng-bind="dsbModel.fy">XXXX</span>
                                </div>
                                <div class="col-sm-3">
                                    <span data-ng-bind="trans.LBL_RETURN_PERIOD">Return Period - </span>
                                    <span data-ng-bind="dsbModel.ret_period">XXXXX</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12">
                    <h4 data-ng-bind="trans.LBL_B2B_INVOICE_SUPPLIER">B2B Invoices - Supplier Details</h4>
                </div>
            </div>

            <div class="tabpane">
                <div name="staus_msg"></div>
                <div class="row" data-ng-if="tab2ahide || emptyobj">
                            <div class="col-sm-4 col-md-4"></div>
                            <div class="col-sm-3 col-md-3" style="margin-top:5px;">
                                <span style="padding-left:90px;">
                                            Display/Hide Columns:</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                    <div ng-dropdown-multiselect="" events="multiSelectEvents" options="dropdownList" checkboxes="true" selected-model="selectedItems" extra-settings="myDropdownModelsettings"><div class="multiselect-parent btn-group dropdown-multiselect" ng-class="{open: open}"><div ng-transclude="toggleDropdown" ng-click="toggleDropdown()"><toggle-dropdown>
                                            <span class="btn btn-default custom-trigger" style="margin: 0px 0px 20px 0px!important;">+1  
                                                <span class="caret"></span>
                                            </span>
                                        </toggle-dropdown></div><!----></div></div>
                            </div>
                             <div class=" col-sm-4 col-sm-4 ">
                                <span class="form-control pull-right" style="width: 77%;">
                                    <input placeholder="Search..." name="search" ng-model="docsearch" data-ng-change="documentGlobalFilter('b2b',docsearch)" type="text" style="border:none;width: 79%;margin-bottom:6px;" ng-mouseover="showsrchmsg=true" ng-mouseleave="showsrchmsg=false" maxlength="32" autocomplete="off" class="ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength">
                                        
                                    <!---->
                                    <i class="fa fa-search" style="float:right;margin-top: 4px"></i><br>
                                    <!---->
                                </span>
                                <span class="pull-right" style="margin-top: 5px;padding-right: 7px">
                                    Search: </span>
                            </div>
                        </div>

            <div class="table-responsive" data-ng-if="tab2ahide">
                <table class="table tbl inv table-bordered exp ng-table" data-ng-table="supplrtbl">
                    <thead>
                        <tr>
                            <th>GSTIN of Supplier</th>
                            <!---->
                            <th data-ng-if="!supname">Supplier Name</th>
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <th data-ng-if="!filstat &amp;&amp; isIFFprd">GSTR-1/IFF/GSTR-5 Filing status</th>
                            <!---->
                            <!---->
                            <th data-ng-if="!fildat &amp;&amp; isIFFprd">GSTR-1/IFF/GSTR-5 Filing Date</th>
                            <!---->
                            <!---->
                            <th data-ng-if="!filprd &amp;&amp; isIFFprd ">GSTR-1/IFF/GSTR-5 Filing Period</th>
                            <!---->
                            <!---->
                            <th data-ng-if="!fil3bstat">GSTR-3B filing status</th>
                            <!---->
                            <!---->
                        </tr>
                    </thead>
                    <!-- <tbody data-ng-repeat="s in $data">
                                <tr>
                                    <td data-title="'GSTIN of Supplier'"><a data-ng-href="" data-ng-click="preb2b(s.stin,0,s)" class="inverseLink"></a></td>
                                    <td data-title="'Supplier Name'"></td>
                                    <td data-title="'GSTR-1/5 Filing status'"></td>
                                    <td data-title="'GSTR-1/5 Filing Date'"></td>
                                    <td data-title="'GSTR-1/5 Filing Period'"></td>
                                    <td data-title="'GSTR-3B filing status'"></td>
                                    <td data-title="'Effective date of cancellation'"></td>  
                                </tr>
                            </tbody> -->
                    <tbody>
                        <!---->
                        <tr data-ng-repeat="s in $data">
                            <td class="text-center"><a data-ng-href="" data-ng-click="preb2b(s.stin,0,s)" class="inverseLink">07AAACB2894G1ZP</a></td>
                            <!---->
                            <td class="text-center" data-ng-if="!supname">Bharti Airtel Limited</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filstat">Y</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fildat">11-Mar-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filprd">Feb-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fil3bstat">N</td>
                            <!---->
                            <!---->
                        </tr>
                        <!---->
                        <tr data-ng-repeat="s in $data">
                            <td class="text-center"><a data-ng-href="" data-ng-click="preb2b(s.stin,0,s)" class="inverseLink">07AABCM9407D1ZO</a></td>
                            <!---->
                            <td class="text-center" data-ng-if="!supname">SHREE MARUTI COURIER SERVICES PVT.LTD.</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filstat">Y</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fildat">11-Mar-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filprd">Feb-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fil3bstat">N</td>
                            <!---->
                            <!---->
                        </tr>
                        <!---->
                        <tr data-ng-repeat="s in $data">
                            <td class="text-center"><a data-ng-href="" data-ng-click="preb2b(s.stin,0,s)" class="inverseLink">07AAIFJ7705K1Z2</a></td>
                            <!---->
                            <td class="text-center" data-ng-if="!supname">JK ENTERPRICES</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filstat">Y</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fildat">11-Mar-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filprd">Feb-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fil3bstat">N</td>
                            <!---->
                            <!---->
                        </tr>
                        <!---->
                        <tr data-ng-repeat="s in $data">
                            <td class="text-center"><a data-ng-href="" data-ng-click="preb2b(s.stin,0,s)" class="inverseLink">07EGDPS3066R1ZL</a></td>
                            <!---->
                            <td class="text-center" data-ng-if="!supname">SUNNY TELECOM</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filstat">Y</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fildat">13-Mar-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!filprd">Feb-2025</td>
                            <!---->
                            <!---->
                            <td class="text-center" data-ng-if="!fil3bstat">N</td>
                            <!---->
                            <!---->
                        </tr>
                        <!---->
                    </tbody>
                </table>
                <div ng-table-pagination="params" template-url="templates.pagination">
                    <!---->
                    <div ng-include="templateUrl">
                        <!---->
                        <div class="ng-table-pager" ng-if="params.data.length">
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-sm-12" style="padding-top:20px;">
                        <div class="text-right">
                            <button class="btn btn-default" data-ng-click="page('/auth/gstr2/preview')" data-ng-bind="trans.LBL_BACK">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
        .prdMarker {
            font-size: 14px;
            line-height: 1.6;
            position: absolute;
            right: 0;
            top: 0;
        }
        </style>
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


    </div>
