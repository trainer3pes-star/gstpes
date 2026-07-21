
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
                            <span ng-switch-when="true">EXP</span>
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
        <div class="container" data-ng-init="getExportInv()">
            <div class="alert alert-msg alert-success ng-hide">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <i class="fa fa-check-circle"></i> Request accepted successfully.
            </div>
            <div class="alert alert-msg alert-danger ng-hide">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <i class="fa fa-info-circle"></i>
            </div>
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4>Exports Invoices - Summary</h4>
                    <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" style="
    margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                <div class="col-sm-12">
                    <ul class="nav nav-tabs ret-tabs">
                        <li class="active"><a data-toggle="tab">Uploaded by Taxpayer</a></li>
                    </ul>
                </div>
            </div>
            <div class="tabpane">
                <!--<div class="alert alert-msg alert-info alert-dismissible ">-->
                <!--    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
                <!--        <i class="fa fa-times"></i>-->
                <!--    </button>-->
                <!--    <i class="fa fa-info-circle"></i> No invoice found.-->
                <!--</div>-->
                <div class="row" data-ng-if="expInv.processedInvoice">
                    <div class="col-sm-12">
                        <h4 data-ng-bind="trans.LBL_PROS_INV">Processed Invoices</h4>
                    </div>
                </div>
                <div class="row" data-ng-if="expInv.processedInvoice">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            
                            <table id="example_php" class="table table-bordered table-striped col-xs-12" >
								<thead>
									<tr >
   									<th>Invoice No.</th>										 
   									<th>Invoice Date</th>										 
   									<th>GST Payment</th>		
									<th>Total Invoice Value (₹) </th>  
									<th>Total Taxable Value (₹)</th> 
									<th>Integrated Tax (₹)</th>  
									<th>Cess (₹)</th> 
									<th>Source</th> 
									<th><?php echo $this->lang->line('common_action_label');?> </th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
							
										<td><?php echo $result->invoice_no;?></td> 
										<td><?php echo date(DISPLAY_DATE,strtotime($result->date));?></td> 
										<td><?php echo $result->gst_payment;?></td> 
										<td><?php echo $result->invoice_value;?></td>
										<td><?php echo $result->taxable_value;?></td>
										<td><?php echo $result->tax;?></td>
										<td><?php echo $result->cess;?></td>
										<td></td>
										 
									   	<td> 
										
									
										<a class="btn btn-xs btn-info" href="exports_invoiceadd/<?php echo $result->invoice_id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a>
										<a class="btn btn-xs btn-danger confirm_delete" href="export_invoice_delete/<?php echo $result->invoice_id ?>" title="Delete"><i class="fa fa-trash"></i></a>

									
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
                                        <button onclick="location.href='exports_invoiceadd'" type="button" class="btn btn-primary pull-right" data-ng-click="goToAddExp()">Add Details</button>
                    <!--<button onclick="location.href='returngstr1online.php'" type="button" class="btn btn-default pull-right"Back</button>-->
                    <button onclick="location.href='returngstr1online'" type="button" class="btn btn-default pull-right" >Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
