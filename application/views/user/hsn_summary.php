

    
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
                            <span ng-switch-when="true">HSN</span>
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
    
    <div class="my-page-custom" data-ng-controller="gstr1hsnctrl" data-ng-init="hsnfunc()">
        <alert-message ng-show="showMsg" title="" type="msg alert-success" message="Request accepted successfully" class="ng-hide"><div class="alert alert-msg alert-success"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> Request accepted successfully.</div></alert-message>
        <div class="row invsumm">
            <div class="col-xs-12 col-sm-12 taxp">
                <h4 data-ng-bind="trans.TITLE_HSN">12 - HSN - wise summary of outward supplies</h4><button class="btn btn-primary btn-circle btn-sm pull-right" data-ng-click="refresh()" data-toggle="tooltip" title="Refresh" style="
                margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                <button type="button" style="margin-top: 0px; margin-right: 5px" class="btn btn-primary btn-sm pull-right" data-ng-click="help()">
                    <span>Help</span>&nbsp;
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    
        <div class="tabpane aqua-blue" style="
    font-size: 14px;
">
            <div class="row">
                <span class="col-xs-12 col-sm-12">Note:
                    <ol>
                        <li data-ng-bind="trans.CLICK_OUTSIDE_TO_ENABLE_FIELDS">In case there are no suggestions for any HSN, then after typing the required HSN; click on description/UQC to enable other fields.</li>
                        <li data-ng-bind="trans.LBL_DRP_MANUAL">Please select HSN from the search results dropdown only. In case HSN entered is not available, you can enter HSN manually</li>
                        <li data-ng-bind="trans.LBL_SAVE_ALERT_HSN">Kindly click on save button after any modification( add, edit) to save the changes</li>
                    </ol>
                </span>
            </div>
            
                
            <div class="rettbl-format">
               
                <?php echo form_open_multipart('home/save_hsn_summary', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                   
                    <div class="row" style="padding: 2em;">
                        
    
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 data-ng-bind="trans.ADD_EDIT_DET">Add/Edit Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <a data-ng-controller="gstr1summctrl" data-ng-click="ewbPage('auth/gstr/ewbofflinedownload','HSN')">
                                    <button type="button" class="btn btn-primary pull-right" style="margin: 0;" data-toggle="tooltip" title="Download HSN Excel">Download HSN Excel</button>
                                </a>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                           
                            
                             <div class="col-sm-4" style="max-height: 79px;">
                            <label class="reg m-cir" for="id_hsn_number">HSN</label>
                            
                        <input id="hsn_number" name="hsn_number"  type="text" placeholder="Enter Product Name as in Master/HSN Code/Description"  maxlength="15" required class="form-control"value="<?php echo @$result_data->hsn_number?>">
                                        
                        </div>
    
                            <div class="col-sm-4">
                                <label class="reg ">Description</label>
                                <input id="description" name="description"  type="text"  class="form-control"value="<?php echo @$result_data->description?>">
                            </div>
    
                            <div class="col-sm-4" >
                                <label class="m-cir reg" >Product name as in Master</label>
                              <input id="product_name" name="product_name"  type="text"  class="form-control"value="<?php echo @$result_data->product_name?>" disabled>
                                        
                            </div>
    
                            
    
                        </div>
                    
                        <div class="row" data-ng-if="usrmstrenabled">
                            <div class="col-sm-4" data-ng-hide="hsnNotfromMstr">
                                <button type="button" class="btn btn-primary ng-hide" style="margin-left: 16px;" data-ng-show="hideaddmstrBtn" data-ng-click="showProdMaster(savequan)">Add to Master
                                </button>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-sm-4" >
                            <label class="m-cir reg" for="id_uqc">UQC</label>
                           <?php
                            $uqc_list = [
                                "BAG-BAGS", "BAL-BALE", "BDL-BUNDLES", "BKL-BUCKLES", "BOU-BILLION OF UNITS", "BOX-BOX", 
                                "BTL-BOTTLES", "BUN-BUNCHES", "CAN-CANS", "CBM-CUBIC METERS", "CCM-CUBIC CENTIMETERS", 
                                "CMS-CENTIMETERS", "CTN-CARTONS", "DOZ-DOZENS", "DRM-DRUMS", "GGK-GREAT GROSS", "GMS-GRAMMES", 
                                "GRS-GROSS", "GYD-GROSS YARDS", "KGS-KILOGRAMS", "KLR-KILOLITRE", "KME-KILOMETRE", 
                                "MLT-MILILITRE", "MTR-METERS", "MTS-METRIC TON", "NOS-NUMBERS", "PAC-PACKS", "PCS-PIECES", 
                                "PRS-PAIRS", "QTL-QUINTAL", "ROL-ROLLS", "SET-SETS", "SQF-SQUARE FEET", "SQM-SQUARE METERS", 
                                "SQY-SQUARE YARDS", "TBS-TABLETS", "TGM-TEN GROSS", "THD-THOUSANDS", "TON-TONNES", 
                                "TUB-TUBES", "UGS-US GALLONS", "UNT-UNITS", "YDS-YARDS", "OTH-OTHERS"
                            ];
                            ?>

                            <select name="uqc" class="form-control" required id="uqc" disabled>
                                <option value="">Select</option>
                                <?php foreach ($uqc_list as $uqc): ?>
                                    <option value="<?php echo $uqc; ?>" <?php echo (@$result_data->uqc == $uqc) ? 'selected' : ''; ?>>
                                        <?php echo $uqc; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            
                            </div>
    
                            <div class="col-sm-4">
                                <label class="m-cir reg " for="id_total_quantity">Total Quantity</label>
                                <input id="total_quantity" name="total_quantity"  type="text"  class="form-control text-right" value="<?php echo @$result_data->total_quantity?>" disabled required>
                                
                            </div>
    
                            <div class="col-sm-4">
                                <label class="m-cir reg " for="id_total_taxable_value">Total taxable value (₹)</label>
                                
                                 <input id="taxable_value" name="taxable_value"  type="text"  class="form-control text-right" value="<?php echo @$result_data->taxable_value?>" disabled required>
                                
                            </div>
                        
                            
                        </div>
    
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="m-cir reg" for="id_rate">Rate (%)</label>
                                               <?php $selected_rate = isset($result_data->rate) ? $result_data->rate : '';
                    ?>
                                    <select class="form-control rate" name="rate" id="rate" required disabled>
                                        
                        <option value="" disabled>Select</option>
                        <option value="0.0" <?= ($selected_rate == '0.0') ? 'selected' : '' ?>>0.0</option>
                        <option value="0.25" <?= ($selected_rate == '0.25') ? 'selected' : '' ?>>0.25</option>
                        <option value="3.0" <?= ($selected_rate == '3.0') ? 'selected' : '' ?>>3.0</option>
                        <option value="5.0" <?= ($selected_rate == '5.0') ? 'selected' : '' ?>>5.0</option>
                        <option value="12.0" <?= ($selected_rate == '12.0') ? 'selected' : '' ?>>12.0</option>
                        <option value="18.0" <?= ($selected_rate == '18.0') ? 'selected' : '' ?>>18.0</option>
                        <option value="28.0" <?= ($selected_rate == '28.0') ? 'selected' : '' ?>>28.0</option>
                    </select>
                                
                            </div>
    
                            <div class="col-sm-4">
                            <label class="reg m-cir" for="tax">Integrated tax (₹)</label>
                            <input name="integrated_tax" class="form-control text-right " id="integrated_tax" value="<?php echo @$result_data->integrated_tax?>"required disabled>
                        </div>
                        
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="tax">Central tax (₹)</label>
                            <input name="central_tax" class="form-control text-right " id="central_tax" value="<?php echo @$result_data->central_tax?>"required disabled>
                        </div>
                            
                        </div>
    
                        <div class="row">
                            <div class="col-sm-4">
                            <label class="reg m-cir" for="tax">State/UT tax (₹)</label>
                            <input name="state_tax" class="form-control text-right " id="state_tax" value="<?php echo @$result_data->state_tax?>"required disabled>
                        </div>
    
                             <div class="col-sm-4">
                            <label class="reg" for="tax">Cess (₹)</label>
                            <input name="cess" class="form-control text-right " id="cess" value="<?php echo @$result_data->cess?>" disabled>
                        </div>
                        </div>
    
                        <div class="row mar-b">
                            <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                                
                                <button type="button" class="btn btn-default" msg="All details entered in the fields will be deleted, do you want to continue?" disabled="disabled">RESET</button>
                                
                                <!--<button id="submit-button" type="submit" class="btn btn-primary" >ADD</button>-->
                                <input type="hidden" id="id" name="id" value="<?php echo @$result_data->id ;?>" />
                
                                 <button type="submit" id="submit-button" class="btn btn-primary">ADD</button>
                                <button type="button" class="btn btn-primary" style="font-size: 110%;" data-toggle="tooltip" title="" data-original-title="Click here to automatically populate HSN data from e-Invoices into GSTR-1" disabled="disabled">Import HSN Data from e-Invoices</button>
                                
                            
                            </div>
                        </div>
                    </div>
    
    
    
                <?php  echo form_close(); ?>
            </div>

            
            <div class="rettbl-format" >
                <h4 class="col-xs-4 col-sm-4" >Added/Edited Invoices to be saved</h4>
                <form class="form-inline">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Search : </label>
                                <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" style="width:10em;/* font-family: FontAwesome; */" name="searchadd" ng-model="obj.searchTextAdd" data-ng-change="customGlobalFilter('add')" placeholder="🔎 Search">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Records Per Page : </label>
                                <select class="form-control " style="width: 10em" ng-model="obj.recPerPageAdd" data-ng-change="changeRecordsPerpageAdd()" ng-options="item as item for item in recordsPerpageOptions" value="item"><option label="10" value="number:10" selected="selected">10</option><option label="20" value="number:20">20</option><option label="50" value="number:50">50</option></select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="table-responsive">
                        <table id="example_php" class="table table-bordered table-striped  col-xs-12" >
								<thead>
									<tr>
                                    <th class="text-center" rowspan="2" data-ng-bind="trans.HEAD_SR_NO">Sr No.</th>
                                    <th class="text-center" rowspan="2">HSN
                                        <!--<i class="fa fa-sort" aria-hidden="true" ng-click="sortColumnAdd(&quot;hsn_sc&quot;)"></i>-->
                                    </th>
                                    <th class="text-center" rowspan="2" data-ng-bind="trans.LBL_LED_DESC">Description</th>
                                    <th class="text-center" rowspan="2" data-ng-bind="trans.LBL_UQC">UQC</th>
                                    <th class="text-center" rowspan="2" data-ng-bind="trans.LBL_QUANTITY">Total Quantity</th>
                                    <th class="text-center" rowspan="2" data-ng-bind="trans.HEAD_TOTAL_TAXABLE_VALUE">Total taxable value (₹)</th>
                                    <th class="text-center" rowspan="2" data-ng-bind="trans.LBL_RATE">Rate (%)</th>
                                    <th class="text-center" colspan="4" data-ng-bind="trans.LBL_TAX_AMT">Amount of tax</th>
                                    <th class="text-center" rowspan="2" colspan="2"><?php echo $this->lang->line('common_action_label');?> </th>
                                </tr>
                                <tr>
    
                                    <th class="text-center" data-ng-bind="trans.LBL_INTE_TAX">Integrated Tax (₹)</th>
                                    <th class="text-center" data-ng-bind="trans.LBL_CENT_TAX">Central tax (₹)</th>
                                    <th class="text-center" data-ng-bind="trans.LBL_STATEUT_TAX">State/UT Tax (₹)</th>
                                    <th class="text-center" data-ng-bind="trans.LBL_CESS_TAX">Cess (₹)</th>
    
                                </tr>
								</thead>
								<tbody>
								    
									<?php $i = 1; foreach(@$results as $result) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
										<td><?php echo $result->hsn_number;?></td>
										<td><?php echo $result->description;?></td>
										<td><?php echo $result->uqc;?></td>
										<td><?php echo $result->total_quantity;?></td>
										<td><?php echo $result->taxable_value;?></td>
										<td><?php echo $result->rate;?></td>
										<td><?php echo $result->integrated_tax;?></td>
										<td><?php echo $result->central_tax;?></td>
										<td><?php echo $result->state_tax;?></td>
							        	<td><?php echo $result->cess;?></td>
									   	<td>
										<a class="btn btn-xs btn-info" href="hsn_summary/<?php echo $result->id?>" title="Edit"><i class="fas fa-pencil-alt "></i></a>
										<a class="btn btn-xs btn-danger confirm_delete" href="hsn_summary_delete/<?php echo $result->id ?>" title="Delete"><i class="fa fa-trash"></i></a>
										</td> 
										
										 
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                            <button type="button" class="btn btn-primary" data-ng-bind="trans.LBL_SAVE" data-ng-click="saveconf()" data-ng-if="savehsnflag" data-ng-disabled="disable_btn('f')">Save</button>
                            <button type="button" class="btn btn-primary" data-ng-bind="trans.LBL_RESET" msg="All records entered in the table will be deleted, do you want to continue?" data-conf-click="deleteHsnData()">RESET</button>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-sm-12 col-xs-12 text-right next-tab-nav" data-ng-if="(hsndata.length > 0 || phsndata.length > 0) &amp;&amp; (processedData.length == 0 || phsnDataTable.settings().dataset.length > 0)">
                <button type="button" class="btn btn-primary" data-ng-disabled="!obj.deleteSelected[processedDataTable.page()] || disable_btn('f')" title="Please select atleast one record in processed table to enable delete" data-conf-click="deleteSelectedRows(processedDataTable.data,'prs',processedDataTable.page())" msg="Selected records entered in the table will be deleted, do you want to continue?" disabled="disabled">Delete</button>
               <button type="button" class="btn btn-default" onclick="location.href='returngstr1online'">Back</button>
 
                <!-- <button type="button" class="btn btn-default" data-ng-bind="trans.LBL_BACK" data-ng-click="backConf()" data-ng-if="(hsndata.length > 0 || phsndata.length > 0) &amp;&amp; (processedData.length == 0 || phsnDataTable.settings().dataset.length > 0)">Back</button> -->
            </div>            

            
            <div class="row"></div>
        </div>
    
    
    
      
        
    </div>
</div>



        </div>
    </div>

</div>


<script>
    $('#description').on('focus click change', function() {
        const hsn = $('#hsn_number').val().trim();

        if (hsn !== '') {
            $('#uqc, #total_quantity, #taxable_value, #rate, #integrated_tax, #central_tax, #state_tax, #cess').prop('disabled', false);
        } else {
            $('#uqc, #total_quantity, #taxable_value, #rate, #integrated_tax, #central_tax, #state_tax, #cess').prop('disabled', true);
        }
    });
</script>



