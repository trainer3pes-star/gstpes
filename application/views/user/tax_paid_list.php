
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
                            <span ng-switch-when="true"><a href="/gst/return/gstr1/online/">GSTR1</a></span>
                        </ng-switch>
                    </li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-when="true">Adjustment of Advances</span>
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
        <div class="container" data-ng-init="getTaxpaidDetails()">
            <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4>Tax already paid on invoices issued in the current period - Summary</h4>
                    <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" style="
           margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="tabpane">
                
               <div class="row">
                    <div class="col-sm-12">
                        <h4 data-ng-bind="trans.LBL_PROS_INV">Processed Records</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive text-center">
                            
                            <table id="example_php" class="table table-bordered table-striped  col-xs-12" >
								<thead>
									<tr >
   									<th>Place of Supply (Name of State)</th>										 
   									<th>Supply Type</th>										 
   									<th>Gross Advance Received (excluding tax) (₹)</th>		
									<th>Integrated Tax (₹)</th> 
									<th>Central tax (₹)</th>
									<th>State/UT Tax (₹)</th> 
									<th>CESS (₹)</th>  
									<th>Applicable percentage(%)</th> 
									<th><?php echo $this->lang->line('common_action_label');?> </th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
							
									    <td><?php echo $result->state_id.' - '.$result->state_name; ?></td>
										<td></td> 
										<td><?php echo $result->taxable_value;?></td> 
										<td><?php echo $result->tax;?></td>
										<td></td>
										<td></td>
							        	<td><?php echo $result->cess;?></td>
									    <td><?php echo ($result->is_diff_perc == 1) ? 'Yes' : 'No'; ?></td>

									
										 
									   	<td> 
										
									
										<a class="btn btn-xs btn-info" href="tax_paid_add/<?php echo $result->invoice_id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a>
										<a class="btn btn-xs btn-danger confirm_delete" href="tax_paid_delete/<?php echo $result->invoice_id ?>" title="Delete"><i class="fa fa-trash"></i></a>

									
										</td> 
										
										 
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
                            <div ng-table-pagination="params" template-url="templates.pagination">

                                <div ng-include="templateUrl">

                                    <div class="ng-table-pager" ng-if="params.data.length">


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="btn-toolbar">
                    <button onclick="location.href='tax_paid_add'" type="button" class="btn btn-primary pull-right" data-ng-click="goToAddExp()">Add state wise details</button>
                    <button onclick="location.href='returngstr1online'" type="button" class="btn btn-default pull-right" data-ng-click="page('/auth/gstr1')">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
