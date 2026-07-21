
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
                            <span ng-switch-when="true"> Supplies through ECO</span>
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
            <div class="row invsumm" data-ng-init="getEcomoptDetails();subEcoAInvoice();">
                <div class="col-xs-12 col-sm-8 ">
                    <h4 data-ng-bind="trans.LBL_ECOM_OPT_INVOICE_R1">14 - Supplies made through E-Commerce Operators</h4>
                </div>
                <div class="col-sm-4 taxp">
                    <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-disabled="refbtn" data-ng-click="refreshSupeco()" style="margin-left: 5px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-ng-click="help()">
                        <span>Help</span>&nbsp;
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </button>
                </div>
                <ul class="nav nav-tabs ret-tabs">
                    <li class="active"><a data-toggle="tab" tabindex="0" data-ng-bind="trans.LBL_CLCT_TAX">Liable to collect tax u/s 52 (TCS)</a></li>
                    <li><a data-toggle="tab" tabindex="1" ng-click="page('auth/gstr1/ecomopt/lipaytax')" data-ng-bind="trans.LBL_PAY_TAX">Liable to pay tax u/s 9(5)</a></li>
                </ul>
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
   									<th>GSTIN of e-commerce operator</th>										 
   									<th>Net value of supplies (₹) </th>										 
									<th>Integrated Tax (₹)</th> 
									<th>Central tax (₹)</th>
									<th>State/UT Tax (₹)</th> 
									<th>CESS (₹)</th>  
									<th><?php echo $this->lang->line('common_action_label');?> </th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
							
									   
										<td><?php echo $result->gstin_no;?></td> 
										<td><?php echo $result->net_value;?></td> 
										<td><?php echo $result->integrated_tax;?></td>
										<td><?php echo $result->central_tax;?></td>
										<td><?php echo $result->state_tax;?></td>
							        	<td><?php echo $result->cess;?></td>
									   	<td>
										<a class="btn btn-xs btn-info" href="online_ecom_add/<?php echo $result->id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a>
										<a class="btn btn-xs btn-danger confirm_delete" href="online_ecom_delete/<?php echo $result->id ?>" title="Delete"><i class="fa fa-trash"></i></a>
										</td> 
										
										 
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
                            
                        </div>
                    </div>
                </div>
                
                
                
                <div class="btn-toolbar">
                    <button onclick="location.href='online_ecom_add'" type="button" class="btn btn-primary pull-right">Add Record</button>
                    <button onclick="location.href='returngstr1online'" type="button" class="btn btn-default pull-right">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
