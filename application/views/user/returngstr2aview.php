
    
<div class="container py-5">
    <div class="row justify-content-center">
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
            <style>
            .impcol {
                color: red;
            }
            </style>
            <div class="myPage" data-ng-init="initPreview()">
                <div class="row invsumm">
                    <div class="col-xs-12 col-sm-12">
                        <h4>GSTR2A - AUTO DRAFTED DETAILS</h4>
                    </div>
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
                <div class="card">
                    <div class="row">
                        <div class="row panContainer">
                            <div class="col-sm-12">
                                <h4 class="no-mar disp-in">PART-A</h4>
                                <span class="pull-right ret-t-info"><span class="impcol">**</span> Important Notice: If the invoices are more than 500 . Please check <a data-ng-click="callpopup()" data-toggle="modal" data-target="#confirmDlg">here</a></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="gstreturngstr2aviewb2b" >
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="B2B Invoices">B2B Invoices</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="gstreturngstr2aviewcdn">
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="Credit/Debit Notes">Credit/Debit Notes</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <a>
                                <!--data-ng-click="page('/auth/gstr2/preview/b2bacounterpreview')" -->
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="Ammendments to B2B INVOICES">Ammendments to B2B INVOICES</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a>
                                <!--data-ng-click="page('/auth/gstr2/preview/cdnacounterpreview')"-->
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="Ammendments to Credit/Debit Notes">Ammendments to Credit/Debit Notes</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="row panContainer">
                                <h4>PART-B - ISD Credits</h4>
                            </div>
                            
                                <a href="ISD_Invoices">
                                <!--data-ng-click="page('/auth/gstr2/preview/isd')"-->
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="ISD Credits">ISD Credits</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="row panContainer">
                                <h4>PART-C - TDS Credits</h4>
                            </div>
                           
                        
                                <!--data-ng-click="page('/auth/gstr2/preview/tds')"-->
                                                            <a href="TDS_credit_received">
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="TDS Credits">TDS Credits</p>
                                </div>
                                
                            </a>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="row panContainer">
                                <h4>PART-D - TCS Credits</h4>
                            </div>
                            <a>
                                <!--data-ng-click="page('/auth/gstr2/preview/tcs')"-->
                                <a href="TCS_credit_received">
                                <div class="hd tile2a">
                                    <p class="inv" data-toggle="tooltip" title="TCS Credits">TCS Credits</p>
                                </div></a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="padding-top:20px;">
                        <div class="text-right">
                            <button class="btn btn-default" onclick="location.href='returnDashbord'">Back</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <style type="text/css">
            .panContainer {
                /*background: #f5f5f5;
            margin: 0;
            margin-bottom: 15px;*/
                margin: 0;
                margin-bottom: 15px;
                #border: 1px solid #ddd;
            }
    
            .panWell {
                /*color: #fff;
            background-color: #2c4e86;
            border-color: #2c4e86;*/
                background-color: #f4f4f6;
                border: 0;
                #border-bottom: 1px solid #ddd;
                font-weight: bold;
            }
    
            .tile2a {
                height: 70px !important;
            }
    
            .card .hd.tile2a > .inv {
                text-align: center;
            }
            </style>
        </div>
    </div>
    <div id="confirmDlg" class="modal fade" role="dialog">
        <div class="modal-dialog sweet">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="m-icon m-warning pulseWarning"><span class="micon-body pulseWarningIns"></span><span class="micon-dot pulseWarningIns"></span></div>
                    <h2>Information</h2>
                    <p>The number of Invoices/Records that can be viewed online for a table /section in Form GSTR-2A e.g. B2B, CDN etc.  is restricted to 500 invoice/record items only which can be comfortably browsed online. Taxpayer having invoices/records more than the said limit, may please use the  ”Offline Utility tool” available on the portal for viewing invoice data. Please download the data ( Prepare Offline &gt; Download Tab &gt; Generate File) and view it in the Offline Tool. This download feature will be made available shortly</p>
                </div>
                <div class="modal-footer"><a class="btn btn-default" data-dismiss="modal" ng-click="cancelcallback()">Cancel</a><a class="btn btn-primary" ng-click="callback()" target="_blank" href="">OK</a></div>
            </div>
        </div>
    </div>
    
            </div>
        </div>
    </div>
</div>


  