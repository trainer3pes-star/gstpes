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
                            <span ng-switch-when="true">B2B</span>
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
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default ret">
                <div class="panel-body" style="font-size: 14px;">
                   <?php $this->load->view('user/trade_info', ['resultTaxpayer' => $resultTaxpayer]); ?>
                </div>
            </div>
        </div>
    </div>
    <div data-ng-controller="mainctrl" ng-view="">
        <div data-ng-init="B2bInvoice()">
            <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4 data-ng-bind="trans.LBL_B2B_INV_SUMRY">B2B Invoices - Summary</h4>
                    <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" data-ng-disabled="refbtn" style="
                    margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
               
            </div>
            <!-- Heading -->
            <div class="tabpane">
                <div class="alert alert-msg alert-info alert-dismissible  ng-hide" data-ng-show="firttimeflag" data-ng-bind="trans.ERR_NO_INV">There are no invoices to be displayed.</div>
                <div class="row">
                    <div class="col-sm-12" id="pill">
                        <div>
                            <div class="pillbutton">
                                <span>
                                   <?php if (!empty($results)) {
                                        echo '<span id="gst-display">' . htmlspecialchars($results[0]->gstin_no) . '</span>';
                                    } ?>

                               </span>
                            </div>
                            <div class="pillbutton">
                                <span data-ng-bind="obj.tradeName">XXXX XXXX XXXX</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" data-ng-if="b2binvdt.processedInvoice">
                    <div class="col-sm-12">
                        <h4 data-ng-bind="trans.LBL_PROS_INV">Processed Invoice Details</h4>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table exp inv tbl table-bordered ng-table" ng-table="listOfB2bctinInvpros" style="font-size: 14px;">

                                <thead ng-include="templates.header">

                                    <tr class="ng-table-sort-header">


                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Invoice No.</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header ">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Invoice Date</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Total Invoice Value (₹)</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Total Taxable Value (₹)</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Integrated Tax (₹)</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">Central Tax (₹)</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">State/UT Tax (₹)</span> </div>


                                        </th>



                                        <th title="" ng-repeat="$column in $columns" ng-class="{
                    'sortable': $column.sortable(this),
                    'sort-asc': params.sorting()[$column.sortable(this)]=='asc',
                    'sort-desc': params.sorting()[$column.sortable(this)]=='desc'
                  }" ng-click="sortBy($column, $event)" ng-if="$column.show(this)" ng-init="template = $column.headerTemplateURL(this)" class="header  sortable">

                                            <div ng-if="!template" class="ng-table-header" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'div'}"> <span ng-bind="$column.title(this)" ng-class="{'sort-indicator': params.settings().sortingIndicator == 'span'}" class="sort-indicator">CESS (₹)</span> </div>


                                        </th>
                                        <th>Action</th>



                                       


                                    </tr>
                                  
                                </thead>

                               <tbody class="text-center"> 
                                   <?php $i=1; foreach(@$results as $result){ ?>
                                   <tr>
                                      <td><?php echo $result->invoice_no;?></td>
                                     <td><?php echo date('d/m/Y', strtotime($result->date)); ?></td>
                                     <td><?php echo $result->invoice_value; ?></td>
                                     <td><?php echo $result->taxable_value; ?></td>
                                      <td><?php echo $result->tax; ?></td>
                                     <td><?php echo $result->central_tax; ?></td>
                                     <td><?php echo $result->state_tax; ?></td><td><?php echo $result->cess; ?></td>
                                     	<td> 
										
									
										<!-- <a class="btn btn-xs btn-info" href="<?php echo base_url('home/b2b_addInvoice'); ?>/<?php echo $result->invoice_id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a> -->
										<a class="btn btn-xs btn-danger confirm_delete" href="<?php echo base_url('home/b2b_delete/' . $result->invoice_id); ?>" title="Delete"><i class="fa fa-trash"></i></a>

									
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


                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        <button onclick="location.href='<?php echo base_url('home/return_b2b_summary_list'); ?>'"
 type="button" class="btn btn-default" >Back</button>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>