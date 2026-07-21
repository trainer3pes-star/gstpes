
    
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
                            <span ng-switch-when="true">GSTR</span>
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
        <div class="myPage">
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4 ng-if="!gst2aoff">Offline  Download for GSTR2A</h4>
                    <a class="pull-right" data-ng-click="offline()"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="tabpane">
                <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                    <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
                </alert-message>
                <div name="staus_msg"></div>
                <div class="row">
                    <h4 class="col-xs-12 col-sm-12 text-center" data-ng-bind="trans.LBL_INV_DNLD">Download data for GSTR2A</h4>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        <button type="button" class="btn btn-primary" data-ng-click="download()" data-ng-bind="trans.LB_GEN_FIL">Generate File</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        <button type="button" class="btn btn-default" data-ng-bind="trans.LBL_BACK" data-ng-click="page('/auth/dashboard')" onclick="location.href='returnDashbord'">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

</div>
