
    

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
                    <li><a target="" href="/gst/dashboard/">Dashboard</a></li>
                    <li>
                     
                            <span ><a href="/gst/return/dashboard/" target="_self">Returns</a></span>
                     
                    </li>
                    <li>
                   
                            <span ><a href="/gst/return/gstr1/online/">GSTR-1/FF</a></span>
                    
                    </li>
                    <li>
                       
                            <span >B2CS</span>
                       
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    
                    <li>
                        <a >English</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    
    <div >
        <!-- Content -->
        <div data-ng-init="b2cstype()">
            <alert-message ng-show="showMsg &amp;&amp; ecom" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>
            <alert-message ng-show="showMsg &amp;&amp; nonecom" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>

            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4 data-ng-bind="trans.HEAD_B2C">7 - B2C (Others)</h4><button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" data-ng-disabled="refbtn" style="margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-ng-click="help()" style="
                        margin-top: 0px; margin-right: 5px;">
                        <span>Help</span>&nbsp;
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </button>
                </div>
               
            </div>
            <form name="b2cs.AddInv" data-accessible-form="" class="ng-pristine ng-valid" autocomplete="off" novalidate="">
                <div class="tabpane">
                    
                        <div class="alert alert-msg alert-info alert-dismissible  ng-hide" data-ng-show="firttimeflag" data-ng-bind="trans.ERR_NO_REC">There are no records to be displayed.</div>
                    

                   
                    
                    <div class="row" data-ng-show="nonecom &amp;&amp; resp.processedInvoice">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-lg-4">
                                    <h4 data-ng-bind="trans.LBL_PRO_RCD">Processed Records</h4>
                                </div>
                                <div class="col-lg-4 pull-right">
                                    <div class="form-group pull-right" style="display: inline-flex;">
                                        <div class="col-lg-9"><label class="form-label">Records Per Page : </label></div>
                                        <div class="col-lg-3" style="padding-left: 0;margin-left: -0.7em;"><select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" style="min-width: 5em;border: 1px solid;" ng-model="obj.recPerPageProc" data-ng-change="changeRecordsPerpagePrs()" ng-options="item as item for item in recordsPerpageOptions" value="item">
                                                <option label="10" value="number:10" selected="selected">10</option>
                                                <option label="20" value="number:20">20</option>
                                                <option label="50" value="number:50">50</option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12">
                            <div class="table-responsive">
                                 <table id="example_php" class="table table-bordered table-striped col-xs-12" >
								<thead>
									<tr >
   									<th>Place of Supply (Name of State)</th>										 
   									<th>Rate (%)</th>										 
   									<th>Total Taxable Value </th>		
									<th>Integrated Tax (₹)</th>  
									<th>Central tax (₹)</th> 
									<th>State/UT Tax (₹)</th>  
									<th>Cess (₹)</th> 
									<th> Applicable percentage(%)</th> 
									<th><?php echo $this->lang->line('common_action_label');?> </th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
							
										<td><?php echo $result->state_id . ' - ' . $result->state_name; ?></td> 
										<td><?php echo $result->rate;?></td> 
										<td><?php echo $result->taxable_value;?></td>
										<td><?php echo $result->tax;?></td>
										<td></td>
										<td></td>
										<td><?php echo $result->cess;?></td>
										<td><?php echo ($result->is_diff_perc == 1) ? 'Yes' : 'No'; ?></td>

										 
									   	<td> 
										
									
										<a class="btn btn-xs btn-info" href="b2cs_addInvoice/<?php echo $result->id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a>
										<a class="btn btn-xs btn-danger confirm_delete" href="b2cs_Invoice_delete/<?php echo $result->id ?>" title="Delete"><i class="fa fa-trash"></i></a>

									
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
                        
                        <button type="button" class="btn btn-primary pull-right" style="margin-left:5px" data-toggle="tooltip" title="To import EWB data into B2Cs Section">Import EWb Data</button>
                        <a class="btn btn-xs btn-primary  pull-right" href="b2cs_addInvoice" style="margin-left:5px">Add Record</a> 
                        <button onclick="location.href='returngstr1online'" type="button" class="btn btn-default pull-right" >Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


        </div>
    </div>
   


        
        