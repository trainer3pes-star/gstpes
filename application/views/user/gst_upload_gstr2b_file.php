
   
  <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            

<div class="mypage">
    <div class="row">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb">
                    <li><a target="" href="/gst/dashboard/new/">Dashboard</a></li>
                    <li>
                        <span>Upload GSTR2B Json File</span>
                    </li>
                </ol>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    <!---->
                    <li>
                        <a data-ng-click="selectLang(language.cd)">English</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div ng-view="">
        <div class="tabpane">
            <div class="row" style="padding: 1em;">
                <h1 style="padding-bottom: 1em; color:#2c4e86;font-weight: 700;">Upload GSTR2B Json File</h1>
                
                <div class="alert alert-info" style="margin-bottom: 2em;">
                    <h4><strong>Premium Feature: Simplified GST Filing</strong></h4>
                    <p>TaxDemoPortal's exclusive feature allows you to easily modify opening balances and GSTR2B values for accurate GSTR3B filing. As a premium user, you get:</p>
                    <ul style="margin-top: 1em;">
                        <li>Quick and hassle-free balance adjustments</li>
                        <li>Real-time updates for GSTR3B calculations</li>
                        <li>Error-free tax filing experience</li>
                        <li>24/7 priority support for any queries</li>
                    </ul>
                </div>

                <!-- Add the upload form -->
                <div class="upload-section" style="max-width: 600px; margin: 0 auto; text-align: center;">
                    <div class="premium-badge" style="margin-bottom: 20px;">
                        <span class="badge" style="background: #ffd700; color: #000; padding: 5px 10px;">
                            <i class="fa fa-star"></i> Premium Feature
                        </span>
                    </div>
                    
                    <form id="gstr2bUploadForm" enctype="multipart/form-data">
                        <input type="hidden" name="csrfmiddlewaretoken" value="hLtakFe2seBAFPxqUP5ZFihe5MUChZ1K3VYULZihLsYRJQ2eMEYEkCof6h3h8qBB">
                        <div class="form-group">
                            <div class="upload-box" style="border: 2px dashed #ccc; padding: 20px; margin-bottom: 20px; background: #f9f9f9;">
                                <label for="gstr2bFile" style="display: block; margin-bottom: 10px;">
                                    <i class="fa fa-cloud-upload" style="font-size: 40px; color: #428bca;"></i>
                                    <br>
                                    Click to select GSTR2B JSON File
                                </label>
                                <input type="file" class="form-control" id="gstr2bFile" accept=".json" required="" style="display: none;">
                                <div id="selectedFileName" style="margin-top: 10px; color: #666;"></div>
                            </div>
                        </div>
                    </form>

                    <div id="uploadStatus" style="margin-top: 20px; display: none;">
                        <!-- Status messages will appear here -->
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                    <!-- <a class="btn btn-primary" href="/gst/return/dashboard/">File GSTR3B</a> -->
                    <a class="btn btn-default" href="/gst/return/dashboard/">Back</a>
                </div>
            </div>
        </div>
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
