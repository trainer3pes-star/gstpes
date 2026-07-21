
  
  

<div class="container py-5">
   <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row" data-ng-controller="transctrl" data-ng-init="init('registration')">
        <div class="col-xs-10">
            <div data-breadcrumb="" data-target="_self" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="_self" href="/" data-ng-bind="name">Dashboard</a></li>
                    <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <span ng-switch-when="true">Promoter List</span>  </ng-switch></li>
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
    <div class="dimmer-holder" style="display: none;">
        <div id="dimmer"></div>
    </div>
    <div class="content-pane" data-ng-controller="dashboardctrl" style="min-height: 444px;">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <!---->
                <h4 data-ng-bind="trans.HEAD_MY_SAVEDAPP">Bank Account List</h4>
                <!---->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!---->
                <div class="table-responsive" data-ng-if="savedata &amp;&amp; savedata.length &gt; 0">
                    <table class="table table-vertical-align thead-dark table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="15%" class="vrtcl-midl text-center">Account Number</th>
                                <th class="vrtcl-midl text-center">Types Of Account</th>
                                <th class="vrtcl-midl text-center">Bank IFSC Code</th>
                                <th class="vrtcl-midl text-center">Proof of Details of bank Accounts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!---->
                            <?php $i=1; foreach(@$results as $result){ ?>
                            <tr ng-repeat="x in savedata track by $index" class="vrtcl-midl text-center">
                           <td>
                                <?php echo $result->account_number; ?>
                            </td>
                                                        <td>
                                <?php echo $result->type_of_account; ?>
                            </td>
                            <td>
                                <?php echo $result->ifsc_code;?>
                            </td>
                            <td>
                                <?php echo $result->proof_of_details_of_bank_account;?>
                            </td>
                           
                            


                               
                            </tr><!---->
                            	<?php } ?>
                        </tbody>
                    </table>
                    
                                <div class="row next-tab-nav">
                
            </div>
            <div class="row next-tab-nav">
                <div class="col-xs-12 text-right">
                    <a title="Back" class="btn btn-default" href="bank_account">Back</a>
                </div>
            </div>
                </div><!---->
            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">Ã—</button>
                        <h4 class="modal-title">Causes of Validation Error</h4>
                    </div>
                    <div class="modal-body">
                        <!----><span ng-if="!valErrmsg">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped ">
                                        <tbody><!---->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <i class="fa fa-info-circle"></i> <span>To Modify your application please </span>
                            <a data-ng-click="editSavedapp(appldtls)">
                                <span>Click Here</span>
                                <i class="fa fa-external-link-square"></i></a>
                            <span> Or you can Edit it from dashboard by closing this window</span>
                        </span><!---->
                        <!---->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">Ã—</button>
                        <h4 class="modal-title">Meaning of status</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <table class="table table-striped ">
                                    <tbody>
                                        <tr>
                                            <td><strong>Draft</strong></td>
                                            <td>Form is saved, but not submitted. Submit within 15 days of first time
                                                save.</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Pending for Validation</strong></td>
                                            <td>Form submitted. Data is being validated from CBDT/MCA/UIDAI as the case
                                                may be. Check after some time.</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Validation Error</strong></td>
                                            <td>PAN details are not matching with Income-tax database or CIN/DIN not
                                                matching with MCA database or Aadhaar not matching with Aadhaar
                                                database. Email sent with details of error. Please Rectify and Re-submit
                                                form on Portal.</td>
                                        </tr>
                                        <!---->
                                        <!---->
                                        <!---->
                                        <tr ng-if="formname =='APLTC'||'ATCFC'">
                                            <td><strong>Pending for Aadhaar e-KYC Authentication</strong></td>
                                            <td>The link for Aadhaar authentication has been sent on email id of Primary
                                                Authorized signatory. Kindly do the e-KYC of respective individual.</td>
                                        </tr><!---->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>


        </div>
    </div>

</div>
