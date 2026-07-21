
<div class="container py-5">
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
        <div class="myPage" data-ng-init="isdpreview()">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_GSTIN">GSTIN - </span>
                                    <span data-ng-bind="dsbModel.gstin">27CDCDC1235D1Z6</span>
                                </div>
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_LEGAL_NAME">Legal Name - </span>
                                    <span data-ng-bind="dsbModel.bsname">VIRAJ KULKARNI</span>
                                </div>
                                <div class="col-sm-3">
                                    <span class="reg" data-ng-bind="trans.LBL_TRADE_NAME">Trade Name - </span>
                                    <span data-ng-bind="dsbModel.tname">VIRAJ KULKARNI</span>
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
                    <h4>ISD Invoices-Supplier Details</h4>
                </div>
            </div>

            <div class="tabpane">
                <div name="staus_msg">
                    <alert-message data-title="" data-type="info" data-message="No Invoices found for the provided Inputs">
                        <div class="alert alert-info"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> No Invoices found for the provided Inputs.</div>
                    </alert-message>
                </div>

                <div class="row">
                    <div class="col-sm-12" style="padding-top:20px;">
                        <div class="text-right">
                            <button class="btn btn-default" onclick="location.href='returnDashbord'">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 