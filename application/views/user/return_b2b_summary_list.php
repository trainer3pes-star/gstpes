

    
<div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb" >
                    <li><a target="" href="dashboard.php">Dashboard</a></li>
                    <li>
                        
                            <span><a href="returnDashbord.php" target="_self">Returns</a></span>
                        
                    </li>
                    <li>
                    
                            <span ><a href="returngstr1online.php">GSTR1</a></span>
                        
                    </li>
                    <li>
                        
                            <span >B2B</span>
                        
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
        <div class="row">
            <div class="alert alert-msg alert-danger ng-hide">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <i class="fa fa-info-circle"></i> <strong>Error!</strong> A problem has been occurred while submitting your data.
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default ret">
                        <div class="panel-body">
                             <?php $this->load->view('user/trade_info', ['resultTaxpayer' => $resultTaxpayer]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row invsumm">
              <div class="col-xs-12 col-sm-8 ">
                <h4 data-ng-bind="trans.LBL_B2B_INVOICES_GSTR1">4A, 4B, 6B, 6C - B2B, SEZ, DE Invoices</h4>
              </div>
              <div class="col-sm-4 taxp">
                <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" data-ng-disabled="refbtn" style="
                                margin-left: 5px;">
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-ng-click="help('sum')">
                  <span>Help</span>&nbsp; <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>
              </div>
              <ul class="nav nav-tabs ret-tabs">
                <li class="active">
                  <a data-toggle="tab" tabindex="0" href="javascript:void(0);" data-ng-bind="trans.LBL_REC_CNT">Recipient wise count</a>
                </li>
                <!-- <li><a data-toggle="tab" tabindex="0" ng-click="navInvSummary('/b2bInvSummary')">Document wise details</a></li><li><a data-toggle="tab" tabindex="0" ng-click="navInvSummary('/b2bRecPending')">Pending record details</a></li> -->
              </ul>
            </div>
            
<div class="tabpane">
  <alert-message ng-show="showMsg &amp;&amp; !invLimitExeeded" title="" type="msg alert-" message="" class="ng-hide">
    <div class="alert alert-msg alert-">
      <a class="close" data-dismiss="alert" aria-label="close">×</a>
      <strong></strong> .
    </div>
  </alert-message>
  <alert-message ng-show="showMsg &amp;&amp; invLimitExeeded" title="" type="msg alert-" message="" class="ng-hide">
    <div class="alert alert-msg alert-">
      <a class="close" data-dismiss="alert" aria-label="close">×</a>
      <strong></strong> .
    </div>
  </alert-message>
  <!---->
  <div class="btn-toolbar" data-ng-show="cnt.b2bCptSummary">
    <button onclick="location.href='b2b_addInvoice'" type="button" class="btn btn-primary pull-left">Add Record</button>
    <button type="button" class="btn btn-primary pull-right" style="margin-left:5px" data-toggle="modal" data-target="#ewbModal" title="To import EWB data into B2B Section">Import EWb Data</button>
  </div>
  
  
  
   <div class="col-md-12">
	<div class="card">
       
	
        <div class="card-body" id="doublescroll">
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
                        $gstin_invoice_counts = array();
                        
                       
                        foreach ($results as $result) {
                            $gstin = $result->gstin_no;
                            $invoice_id = $result->invoice_id;
                        
                            if (!isset($gstin_invoice_counts[$gstin])) {
                                $gstin_invoice_counts[$gstin] = array();
                            }
                        
                           
                            $gstin_invoice_counts[$gstin][$invoice_id] = true;
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
                            <td>Regular</td>
                            <td><a href="<?php echo base_url('home/b2b_summary_details/' . $result->gstin_no); ?>"><?php echo count($gstin_invoice_counts[$result->gstin_no]); ?></a></td>
                            <td></td>
                            <!-- <td>
                                <a class="btn btn-xs btn-info" href="b2b_addInvoice/<?php echo $result->id; ?>?gstin=<?php echo $result->gstin_no; ?>" title="Add">Add</a>
                            </td> -->
                            <td class="text-center" title="Add Note">
                                            <a href="b2b_addInvoice/<?php echo $result->id; ?>?gstin=<?php echo $result->gstin_no; ?>"  type="button" style="background-color:green; color:white;padding:6px">
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


  