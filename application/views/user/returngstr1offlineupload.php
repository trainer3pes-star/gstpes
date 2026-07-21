
    
<div class="container py-5">
   <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage" style="font-size:14px ;">
<div class="row" data-ng-controller="transctrl" data-ng-init="init('returns')">
<div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="" href="/gst/dashboard/" data-ng-bind="name">Dashboard</a></li>
                    <!---->
                    <li>
                        <ng-switch on="$last">
                            <!---->
                            <!----><span ng-switch-default=""><a href="/gst/return/dashboard/" data-ng-bind="breadcrumb.n" target="_self">Returns</a></span>
                            <!---->
                        </ng-switch>
                    </li>
                    <!---->
                    <li>
                        <ng-switch on="$last">
                            <!----><span ng-switch-when="true">GSTR</span>
                            <!---->
                            <!---->
                        </ng-switch>
                    </li>
                    <!---->
                </ol>
            </div>

</div>
<div class="col-xs-2">
<div class="lang dropdown">
<span class="dropdown-toggle" data-toggle="dropdown" data-ng-bind="selectedLang">English</span>
<ul class="dropdown-menu lang-dpdwn">
<!----><li data-ng-repeat="language in languages">
<a data-ng-click="selectLang(language.cd)" data-ng-bind="language.nm">English</a>
</li><!---->
</ul>
</div>
</div>
</div>
<!----><div data-ng-controller="mainctrl" ng-view=""><div class="myPage" data-ng-init="offline()">
    <div class="row invsumm">
        <div class="col-xs-12 col-sm-12 taxp">
               <h4>Offline Upload and Download for GSTR1</h4>
               <a class="pull-right" data-ng-click="refresh()"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs ret-tabs">
              <li data-ng-class="{'active':atab}" class="active"><a ng-click="page('auth/gstr/offlineupload')" tabindex="0" data-ng-bind="trans.TTL_UPLD">Upload</a></li>
               <li data-ng-class="{'active':!atab}"><a href="/gst/return/gstr1/offline/download/" data-toggle="tab" ng-click="page('auth/gstr/offlinedownload')" tabindex="0">Download</a></li>
            </ul>
        </div>
    </div>
    <div class="tabpane">
        <div id="submit-json" class="ng-hide alert alert-msg alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button>
            <i class="fa fa-check-circle"></i>
            Your JSON file has been uploaded successfully. The validation process may take up to 15 minutes. Please revisit accordingly. .
            <!-- Your JSON file has been uploaded successfully. The GST Systems will now validate uploaded data for the following:'GSTIN of buyers'; 'Duplicate Invoices' ; 'Reference of Credit/Debit notes' ; 'Tax amount calculated' ; 'Date of transaction' etc. It may take up to 15 minutes to do validation. Please come back after 15 minutes. -->
        </div>
        <div class="alert alert-msg alert-danger alert-dismissible ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button>
            <i class="fa fa-info-circle"></i> No offline transaction for the given return period
        </div><!---->
         <!---->
        <div name="staus_msg"></div>
        <div class="row">
        <div class="col-sm-12 col-xs-12">
        <marquee>In case uploaded data (invoice data or other record) fails validation, an Error File will be created on the online portal for only those records which fail. Please download the error file and view it in the Offline tool to correct the same. After making required correction, please prepare JSON file following the same process as that for regular invoice data upload and submit the JSON file on the GST portal. The JSON file will be validated again and will be taken in by the system if found OK.</marquee>
        </div>
        </div>

        <div class="row">
                <center>
                    <h4 class="col-xs-12 col-sm-12" style="padding-right:13%;" data-ng-bind="trans.LBL_INV_UPLD">Invoice Upload</h4>
                     <div class="col-sm-12 col-xs-12">


    <input id="offline_file" name="offline_file" type="file">
    <p class="err ng-hide" data-ng-bind="errVar">
        JSON file is only allowed
    </p>
    <div class="progress ng-hide">
        <div class="progress-bar" ng-class="{&quot;progress-bar-danger&quot; : uploadFailed, &quot;progress-bar-success&quot; : uploadSuccess}" role="progressbar" style="width:">
        </div>
    </div>


                    </div>
                    </center>
                    </div>

        <!---->
<div class="row">
    <h4 class="col-xs-12 col-sm-12 text-center" data-ng-bind="trans.LBL_UPLD_HIST">Upload History</h4>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table tbl inv table-bordered exp ng-table" data-ng-table="rev">
                <thead>
                    <tr>
                        <th class="text-center" data-ng-bind="trans.LBL_DATE">Date</th>
                        <th class="text-center" data-ng-bind="trans.HEAD_TIME">Time</th>
                        <th class="text-center" data-ng-bind="trans.HEAD_REFID">Reference id</th>
                        <th class="text-center" data-ng-bind="trans.HEAD_STATUS">Status</th>
                        <th class="text-center" data-ng-bind="trans.HEAD_ERR_REP">Error Report</th>
                    </tr>
                    <tr>
                    </tr>
                </thead>
                
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
    </div>
</div>


        <div class="row">
            <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                   <button class="btn btn-default"  data-ng-bind="trans.LBL_BACK" onclick="location.href='returnDashbord'">Back to File Returns</button>
            </div>
        </div>
    </div>
</div>
      </div>
</div>

        </div>
    </div>

</div>
