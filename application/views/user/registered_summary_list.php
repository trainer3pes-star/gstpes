
  
  

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
                    <li><a target="" href="/gst/dashboard/">Dashboard</a></li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-default=""><a href="/gst/return/dashboard/" target="_self">Returns</a></span>
                        </ng-switch>
                    </li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-when="true"><a href="/gst/return/gstr1/online/">GSTR-1/FF</a></span>
                        </ng-switch>
                    </li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-when="true">CDNR</span>
                        </ng-switch>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    
                    <li data-ng-repeat="language in languages">
                        <a data-ng-click="selectLang(language.cd)">English</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    
    <div data-ng-controller="mainctrl" ng-view="">
        <div class="container" data-ng-init="getCDNotes()">
            <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4>9B - Credit / Debit Notes (Registered)</h4>
                    <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" style="
    margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                <div class="col-sm-12">
                    <ul class="nav nav-tabs ret-tabs">
                        <li class="active"><a data-ng-click="page('auth/gstr1/cdn/registered/summary')" data-toggle="tab" tabindex="0">Recipient wise count</a></li>
                    </ul>
                </div>
            </div>
            <div class="tabpane">
                <div class="alert alert-msg alert-info ng-hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                    <!-- <i class="fa fa-info-circle"></i> -->There are no records to be displayed.
                </div>
                
                <div class="row" data-ng-if="cdn.pendingInvoice">
                    <div class="col-sm-12">
                        <button onclick="location.href='registered_noteadd'" type="button" class="btn btn-primary pull-left" >Add Record</button>
                    </div>
                    <div class="col-sm-12">
                        <h4 data-ng-bind="trans.LBL_PEND_INV">Record Details</h4>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          
                             <table id="example_php" class="table table-bordered text-center table-striped col-xs-12" >
								<thead>
									<tr>
   									<th>Recipient Details </th>										 
   									<th>Trade/Legal Name</th>										 
   									<th>Taxpayer Type</th>		
									<th>Processed Records</th>  
									<th>Pending/Errored Invoices</th> 
									<th>Add Invoice</th>
									
									</tr>
								</thead>
								<tbody>
                                   <?php 
                                    $gstin_counts = array();
                                    foreach ($results as $result) {
                                        $gstin = $result->gstin_no;
                                        if (isset($gstin_counts[$gstin])) {
                                            $gstin_counts[$gstin]++;
                                        } else {
                                            $gstin_counts[$gstin] = 1;
                                        }
                                    }
                                    
                                    $printed_gstin = array(); 
                                    ?>
                                    <?php foreach($results as $result) { 
                                        if (in_array($result->gstin_no, $printed_gstin)) {
                                            continue; 
                                        }
                                        $printed_gstin[] = $result->gstin_no;
                                    ?>
                                    <tr>
                                        <td><?php echo $result->gstin_no; ?></td> 
                                        <td><?php echo $result->recipient_name; ?></td> 
                                        <td></td>
                                        <td><a href="registered_summary_detail/<?php echo $result->gstin_no; ?>"><?php echo $gstin_counts[$result->gstin_no]; ?></a></td>
                                        <td></td>
                                        <td class="text-center" title="Add Note">
                                            <a href="registered_noteadd/<?php echo $result->id; ?>?gstin=<?php echo $result->gstin_no; ?>"  type="button" style="background-color:green; color:white;padding:6px">
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </td>
                                       
                                    </tr>
                                    <?php } ?>

								</tbody>
								 
							</table>
                        </div>                               
                    </div>
                </div>

                
                
                
                <div class="btn-toolbar">
                    
                    <button onclick="location.href='returngstr1online'" type="button" class="btn btn-default pull-right">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>

</div>
