
    <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row" data-ng-controller="transctrl" data-ng-init="init('services')">
    <div class="col-xs-10">
    <div data-breadcrumb="" data-target="_self" data-path="//services.gst.gov.in/services/auth/dashboard" data-name="Dashboard"><ol class="breadcrumb" data-ng-controller="crumbCtrl"><li><a target="_self" href="/gst/dashboard/">Dashboard</a></li><!----><li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <!----> <!----><span ng-switch-default=""><a href="/gst/quicklinks/return/" data-ng-bind="breadcrumb.n" target="_self">Services</a></span><!----> </ng-switch></li><!----><li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <!----> <!----><span ng-switch-default=""><a href="#" data-ng-bind="breadcrumb.n" target="_self">User Services</a></span><!----> </ng-switch></li><!----><li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <!----><span ng-switch-when="true">View Notices and Orders</span><!----> <!----> </ng-switch></li><!----></ol></div>
    </div>
    </div>
    <div class="content-pane" style="min-height: 285px;">
    <!----><div ng-view=""><style>
        .ng-table th.sortable .sort-indicator {
            float: right !important;
        }
        .f-wt {
            font-weight: 600;
        }
        
        .mar-t-24 {
            margin-top: 24px !important;
        }
        
        #page-right {
            float: right !important;
            padding-right: 5px;
        }
        
        .disply {
            display: inline-block;
        }
        
        .notread {
            font-weight: bold;
        }
        
        .read {
            font-weight: normal;
        }
        input[readonly] {
            background: #FFF !important;
        }
        .nav-tabs>li.active>a {
            color: white !important;
            font-size: 16px;
            font-weight: bold;
            border-bottom: 3px solid #e9a39c !important;
            background-color: #17c4bb !important;
            border-radius: 10px 10px 0px 0px;
        }
        .nav-tabs>li>a {
            color: #575757;
            font-weight: bold;
            background-color: #DBE2EF !important;
            margin-left: 3px;
            border-radius: 10px 10px 0px 0px;
        }
    </style>
    <div class="tabpane" data-ng-init="viewNoticeOrderOnLoad()">
    
         <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="/gst/notices/">Notices and Orders</a>
            </li>
            <li>
                <a href="#">Additional Notices and Orders</a>
            </li>
        </ul>
        <br>
        <!-- CR#25793 code change end-->
        <form novalidate="" name="viewNoticeOrderForm" data-ng-submit="viewNoticeOrderSearch(viewNoticeOrder)" class="ng-pristine ng-invalid ng-invalid-required">
    
    
    
            <div class="row">
                <div class="col-xs-12">
    
                    <h4 data-ng-bind="trans.HEAD_VIEW_NOTI_ORDE">View Notices and Orders</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
    
                    <!---->
    
    
                    <!---->
                </div>
            </div>
            <!-- CR#19709 code change start-->
            <div class="row alert alert-warning ng-hide" style="padding: 0px;" data-ng-show="autoDropResp.filingStatus == 'Y'">
                <div class="col-lg-10" style="top:6px" data-ng-bind="autoDropCont">SCN (undefined) has been issued for the GSTIN (07AALCM2911N1Z6) since you have not Filed all returns. Once the due returns are Filed, proceedings will be dropped for cancellation of the GSTIN within 15 minutes. In case if it is not dropped automatically, you can click on the button to initiate drop proceeding.</div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-primary" data-ng-click="initateAutoDrop()">Initiate drop <br>proceeding</button>
                </div>
            </div>
            <div class="row">
                <!---->
            </div>
            <!-- CR#19709 code change end-->
            <!----><div class="row" ng-if="udata && udata.role == 'login'">
                <!--  code changes start -->
                <!---->
                <!----><div data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')" class="col-sm-3">
                    <label class="form-conf-label reg" data-ng-bind="trans.LBL_TYPE">Type</label>
                    <select name="type" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" data-ng-model="viewNoticeOrder.type" data-ng-required="!viewNoticeOrder.fmdt && !viewNoticeOrder.todt" required="required">
                        <option label="Select" data-ng-selected="true" data-ng-disabled="true" value="" selected="selected" disabled="disabled"></option>
                        <option value="N" label="Notice"></option>
                        <option value="O" label="Order"></option>
                    </select>
                    <span class="err ng-hide" data-ng-show="viewNoticeOrderForm.$submitted && viewNoticeOrderForm.type.$error.required" data-ng-bind="trans.ERR_ATLST_ONE">Please enter atleast one search criteria</span>
                </div><!---->
                <!--  code changes end -->
                <div class="col-sm-3">
                    <label class="form-conf-label reg" data-ng-bind="trans.LBL_ISS_PERIOD">Issuance Period</label>
    
                    <!--  code changes start -->
                    <!---->
                    <!----><div class="datepicker-icon input-group" data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')">
                        <span class="input-group-addon" data-ng-bind="trans.LBL_FROM">From</span>
                        <input name="fromDate" title="Select From Date" type="text" class="form-control date-picker ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" data-max-days="0" data-datepicker="" placeholder="DD/MM/YYYY" data-date-format="dd/mm/yyyy" id="fmdt" data-ng-model="viewNoticeOrder.fmdt" data-ng-required="viewNoticeOrder.todt" data-dtp="dtp_yhef1">
                        <span class="input-group-addon"><span class="date-picker-icon fa fa-calendar"></span></span>
                    </div><!---->
                    <!--  code changes end -->
    
                    <span class="err ng-hide" data-ng-show="viewNoticeOrderForm.$submitted && viewNoticeOrderForm.fromDate.$error.required" data-ng-bind="trans.ERR_ENTER_FROM">Please select a 'From' Date</span>
                    <!---->
                    <span class="err ng-hide" data-ng-show="toSmallerThanFrom" data-ng-bind="trans.ERR_FRMDT_GRTR">From Date cannot be greater than 'To' Date</span>
                    <!---->
                    <!---->
    
    
    
    
                </div>
    
                <div class="col-sm-3">
    
                    <label class="form-conf-label">�</label>
                    <!--  code changes start -->
                    <!---->
                    <!----><div class="datepicker-icon input-group" data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')">
                        <span class="input-group-addon" data-ng-bind="trans.LBL_TO">To</span>
                        <input name="toDate" title="Select To Date" type="text" id="todt" class="form-control date-picker ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" data-max-days="0" data-datepicker="" placeholder="DD/MM/YYYY" data-date-format="dd/mm/yyyy" data-ng-model="viewNoticeOrder.todt" data-ng-required="viewNoticeOrder.fmdt" data-dtp="dtp_BaXYp">
                        <span class="input-group-addon"><span class="date-picker-icon fa fa-calendar"></span></span>
                    
                    </div><!---->
                    <!--  code changes end -->
                    <span class="err ng-hide" data-ng-show="viewNoticeOrderForm.$submitted && viewNoticeOrderForm.toDate.$error.required" data-ng-bind="trans.ERR_ENTER_TO">Please select a 'To' Date</span>
                    <span class="err ng-hide" data-ng-show="toDateGrtThancurrent" data-ng-bind="trans.ERR_TODT_FUTURE">'TO' date cannot be a future date</span>
                    <!---->
                    <!---->
                </div>
                <div class="col-sm-2">
                    <!--  code changes start -->
                    <!----><button type="submit" class="btn btn-primary mar-t-24" id="submit" data-ng-bind="trans.LBL_SEARCH" data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')">Search</button><!---->
                    <!---->
    
                    <!--  code changes end -->
                </div>
            </div><!---->
            <div class="row">
                <div class="col-xs-12">
    
                    <!---->
                    <!---->
                    <!---->
                    <!---->
    
                </div>
            </div>
    
            <!----><div class="row" data-ng-if="finalSearch.length>0 && flag">
    
    
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
                    <!----><h4 class="" ng-if="udata && udata.role == 'login'" data-ng-bind="trans.HEAD_LIST_NOTI_DEMA">List of Notices & Orders issued by Authorities</h4><!---->
    
                    <div class="table-responsive">
    
                        <table data-ng-table="searchPagination" class="table tbl inv table-bordered ng-table"><!----><thead ng-include="templates.header"><!----> <tr class="ng-table-sort-header"> <!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable"> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Notice/Demand Order Id</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable"> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Issued By</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable"> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Type</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header "> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Notice / Order Description</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable"> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Date of Issuance</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable"> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Due Date</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header "> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Amount of Demand</span> </div><!----> <!----> </th><!----><!----><!----><th title="" ng-repeat="$column in $columns" ng-class="{
                        'sortable': $column.sortable(this),
                        'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                        'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                      }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header "> <!----><div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Download</span> </div><!----> <!----> </th><!----><!----> </tr> <tr ng-show="show_filter" class="ng-table-filters ng-hide"> <!----><!----><th data-title-text="Notice/Demand Order Id" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Issued By" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Type" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Notice / Order Description" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Date of Issuance" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Due Date" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Amount of Demand" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----><!----><th data-title-text="Download" ng-repeat="$column in $columns" ng-if="$column.show(this)" class="filter " ng-class="params.settings().filterOptions.filterLayout === 'horizontal' ? 'filter-horizontal' : ''"> <!----> </th><!----><!----> </tr> </thead>
  
                            
                            
                            
                               <tbody>
                                <!----><tr ng-repeat="detail in $data | orderBy:sortType:sortReverse" ng-class="{'read': detail.isRead == 'Y' , 'notread': detail.isRead == 'N'}" class="notread">
                                    <!--  code changes start -->
                                    <td data-title="trans.LBL_NOTICE_DEMAND_ORDER" sortable="'noticeOrderId'" data-title-text="Notice/Demand Order Id">
                                        <!---->
                                        <!----><div data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (bankrsp.bankTimeEx == 'Y' && !(detail.applnCd == 'APLAC' && detail.authStatus == 'CLR')) || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')" data-ng-bind="detail.noticeOrderId">ZA070424107244X</div><!---->
                                    </td>
                                    <!--  code changes end -->
                                    <td data-title="trans.LBL_ISSU_BY" sortable="'issuedBy'" data-ng-bind="detail.issuedBy" data-title-text="Issued By">Delhi</td>
                                    <td data-title="trans.LBL_TYPE" sortable="'type'" data-ng-bind="detail.type" data-title-text="Type">Order</td>
                                    <td data-title="trans.LBL_NOTICE_ORDER_DESC" style="width: 400px;" data-ng-bind="detail.descr" data-title-text="Notice / Order Description">Registration Certificate</td>
                                     <td data-title="trans.LBL_DATE_ISSU" sortable="'dtOfIssue'" data-title-text="Date of Issuance">24/04/2024</td>
                                    <td data-title="trans.LBL_DUE_DATE" sortable="'dueDate'" data-ng-bind="detail.dueDate" data-title-text="Due Date">NA</td>
                                    <td data-title="trans.LBL_AMOU_DEMA" data-ng-bind="detail.amount" data-title-text="Amount of Demand">NA</td>
                                    <td data-title="trans.LBL_DOWNLOAD" data-title-text="Download">
                                      <!--CR#20539 MF16 code changes--> 
                                     <div> 
                                          <!--  code changes start -->
                                             <!----><a class="btn btn-download inverseLink" data-ng-click="dwnldSuppDoc(detail)" data-ng-if="detail.applnCd!=='APL3A' && (((udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')) || isEnableDownload(detail))"><i class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Download"></i></a><!---->
                                             <!---->
                                            <!----> 
                                            <!----> 
                                     </div>
                                         <!--  code changes end  -->
                                        <!---->
    
                                   
    
                                   </td>
    
                                </tr><!----><tr ng-repeat="detail in $data | orderBy:sortType:sortReverse" ng-class="{'read': detail.isRead == 'Y' , 'notread': detail.isRead == 'N'}" class="read">
                                    <!--  code changes start -->
                                    <td data-title="trans.LBL_NOTICE_DEMAND_ORDER" sortable="'noticeOrderId'" data-title-text="Notice/Demand Order Id">
                                        <!---->
                                        <!----><div data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (bankrsp.bankTimeEx == 'Y' && !(detail.applnCd == 'APLAC' && detail.authStatus == 'CLR')) || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')" data-ng-bind="detail.noticeOrderId">ZA070422073824I</div><!---->
                                    </td>
                                    <!--  code changes end -->
                                    <td data-title="trans.LBL_ISSU_BY" sortable="'issuedBy'" data-ng-bind="detail.issuedBy" data-title-text="Issued By">Delhi</td>
                                    <td data-title="trans.LBL_TYPE" sortable="'type'" data-ng-bind="detail.type" data-title-text="Type">Order</td>
                                    <td data-title="trans.LBL_NOTICE_ORDER_DESC" style="width: 400px;" data-ng-bind="detail.descr" data-title-text="Notice / Order Description">Registration Certificate</td>
                                     <td data-title="trans.LBL_DATE_ISSU" sortable="'dtOfIssue'" data-title-text="Date of Issuance">20/04/2022</td>
                                    <td data-title="trans.LBL_DUE_DATE" sortable="'dueDate'" data-ng-bind="detail.dueDate" data-title-text="Due Date">NA</td>
                                    <td data-title="trans.LBL_AMOU_DEMA" data-ng-bind="detail.amount" data-title-text="Amount of Demand">NA</td>
                                    <td data-title="trans.LBL_DOWNLOAD" data-title-text="Download">
                                      <!--CR#20539 MF16 code changes--> 
                                     <div> 
                                          <!--  code changes start -->
                                             <!----><a class="btn btn-download inverseLink" data-ng-click="dwnldSuppDoc(detail)" data-ng-if="detail.applnCd!=='APL3A' && (((udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')) || isEnableDownload(detail))"><i class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Download"></i></a><!---->
                                             <!---->
                                            <!----> 
                                            <!----> 
                                     </div>
                                         <!--  code changes end  -->
                                        <!---->
    
                                   
    
                                   </td>
    
                                </tr><!----><tr ng-repeat="detail in $data | orderBy:sortType:sortReverse" ng-class="{'read': detail.isRead == 'Y' , 'notread': detail.isRead == 'N'}" class="read">
                                    <!--  code changes start -->
                                    <td data-title="trans.LBL_NOTICE_DEMAND_ORDER" sortable="'noticeOrderId'" data-title-text="Notice/Demand Order Id">
                                        <!---->
                                        <!----><div data-ng-if="(udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (bankrsp.bankTimeEx == 'Y' && !(detail.applnCd == 'APLAC' && detail.authStatus == 'CLR')) || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')" data-ng-bind="detail.noticeOrderId">ZA070219038006Q</div><!---->
                                    </td>
                                    <!--  code changes end -->
                                    <td data-title="trans.LBL_ISSU_BY" sortable="'issuedBy'" data-ng-bind="detail.issuedBy" data-title-text="Issued By">Delhi</td>
                                    <td data-title="trans.LBL_TYPE" sortable="'type'" data-ng-bind="detail.type" data-title-text="Type">Notice</td>
                                    <td data-title="trans.LBL_NOTICE_ORDER_DESC" style="width: 400px;" data-ng-bind="detail.descr" data-title-text="Notice / Order Description">Registration SCN</td>
                                     <td data-title="trans.LBL_DATE_ISSU" sortable="'dtOfIssue'" data-title-text="Date of Issuance">19/02/2019</td>
                                    <td data-title="trans.LBL_DUE_DATE" sortable="'dueDate'" data-ng-bind="detail.dueDate" data-title-text="Due Date">27/02/2019</td>
                                    <td data-title="trans.LBL_AMOU_DEMA" data-ng-bind="detail.amount" data-title-text="Amount of Demand">NA</td>
                                    <td data-title="trans.LBL_DOWNLOAD" data-title-text="Download">
                                      <!--CR#20539 MF16 code changes--> 
                                     <div> 
                                          <!--  code changes start -->
                                             <!----><a class="btn btn-download inverseLink" data-ng-click="dwnldSuppDoc(detail)" data-ng-if="detail.applnCd!=='APL3A' && (((udata.bnkStat == 'N' && bankrsp.bankTimeEx == 'N') || (udata.bnkStat == 'Y') || (udata.bnkStat == 'NA') || (udata.utype != 'TP') || (udata.appStatus != 'A')) || isEnableDownload(detail))"><i class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Download"></i></a><!---->
                                             <!---->
                                            <!----> 
                                            <!----> 
                                     </div>
                                         <!--  code changes end  -->
                                        <!---->
    
                                   
    
                                   </td>
    
                                </tr><!---->
                            </tbody>
                            
                        </table><div ng-table-pagination="params" template-url="templates.pagination"><!----><div ng-include="templateUrl"><!----><div class="ng-table-pager" ng-if="params.data.length"> <!----> <!----> </div><!----> </div></div>
    
                    </div>
    
                </div>
            </div><!---->
    
            <!---->
    
            <!-- CR#25793 code change start-->
            <br>
            <div class="row-sm-2">
                <h4><b><u>Note:</u></b></h4><br>
                <ol>
                    <li><p>Following Notices/Orders issued by tax authorities are available under "Notices and Orders":</p></li>
                    <ul style="list-style: disc;">
                        <li>Notice/Orders/Intimations pertaining to registration including new registration, amendment, cancellation, revocation and other communications.</li>
                        <li>Notices issued by System to return defaulters in Form GSTR-3A.</li>
                        <li>Notices pertaining to Return module comprising GST DRC-01B and GST DRC-01C.</li>
                        <li>Summary of assessment orders issued in Form GST DRC-07 where notices and other proceedings were held offline.</li>
                    </ul><br>
                    <li><p>Following Notices/Orders issued by tax authorities are available under "Additional Notices and Orders":</p></li>
                    <ul style="list-style: disc;">
                        <li>Notices /Orders pertaining to modules- Advance Ruling, Appeal, Assessment/ Adjudication, Audit, Enforcement, Prosecution and Compounding, Recovery, LUT etc.</li>
                    </ul><br>
                    <li><p>Notices/ Orders pertaining to Refund module will be shown under case details page of respective ARN of refund.Please navigate to 'Services>User Services> My application' and select ARN under Application Type as 'REFUNDS'.</p></li>
                </ol>
            </div>
            <!-- CR#25793 code change ends -->
        </form>
    </div>
    <!-- CR#20539 MF-16 code changes start -->
    <div id="suppDocPopup" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content tbl-format" style="width:600px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                     <!--  24335 changes                         -->
                     <!----> <!-- CR-25979B Changes-->
                    <!----> <!-- CR-25979B Changes-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <span>
                            <a title="Preview" href="" data-ng-click="downloadPDF(ordDetails.docId,ordDetails.applnId,ordDetails.isRead,ordDetails.noticeOrderId)" style="display:inline-block;word-break:  break-word;padding:10px;">
                            <img src="images/pdf.png">
                            </a>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="modal-header ng-hide" data-ng-show="ordDetails.suppDcxTxofr.length>0"> <!-- CR-25979B Changes-->
                    <h4 class="modal-title">Supporting Documents</h4>
                </div>
                <div class="modal-body ng-hide" data-ng-show="ordDetails.suppDcxTxofr.length>0"> <!-- CR-25979B Changes-->
                    <div class="row">
                        <!---->
                    </div>
                </div>
                <div class="modal-header ng-hide" data-ng-show="ordDetails.addtnlDocs.length>0"> <!-- CR-25979B Changes-->
                    <h4 class="modal-title">Additional Documents</h4>
                </div>
                <div class="modal-body ng-hide" data-ng-show="ordDetails.addtnlDocs.length>0"> <!-- CR-25979B Changes-->
                    <div class="row">
                        <!---->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CR#20539 MF-16 code changes end-->
    <!-- CR#19709 code changes start -->
    <div id="autoDropProceed" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content tbl-format">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <p>Drop Proceeding has been initiated sucessfully</p>
                            <button class="btn btn-primary" data-ng-click="closeDropProc()" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CR#19709 code changes end  --></div>
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

    