

    
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
        <div class="myPage" data-ng-init="cdnpreview()">
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
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12">
                    <h4 data-ng-bind="trans.LBL_CDN_INVOICE_SUPPLIER">Credit/Debit Notes - Supplier Details</h4>
                </div>
            </div>

            <div class="tabpane">

                               <div class="row">
    <div class="col-md-12 text-center">
        <center><img src="<?php echo base_url('assets/images/credit_debit2.jpg'); ?>" 
             alt="TCS Invoice" 
             class="img-responsive" 
             style="max-width:100%; height:auto;"></center>
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

        .upprcase {
            text-transform: uppercase;
        }
        </style>
    </div>
</div>

        </div>
    </div>


