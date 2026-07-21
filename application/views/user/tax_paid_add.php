
    
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
        <?php echo form_open_multipart('home/save_tax_paid', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
            <div class="row invsumm">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="mar-b-0 pull-left mar-t-0">Tax already paid on invoices issued in the current period - Add Details</h4>
                </div>
            </div>
            <div class="tabpane">
                
                <span>Note: Declare the amount of advance for which tax has already been paid receipt of consideration in an earlier period and invoices issued in the current period for the supplies</span>
                <p class="mand-text">Indicates Mandatory Fields</p>
                <div class="tbl-format rettbl-format" style="border-bottom: none;">
                    <div class="row" style="padding-top:0.5em;padding-bottom: 1em;">
                         <div class="col-sm-4">
                            <label class="reg m-cir" for="id_place_of_supply"><span>POS</span>
                                <i class="fa fa-info-circle" ></i></label>
                           <select name="pos_id" id="pos_id" class=" form-control select2 required" style="width:100%;" required> 
								<option value="">Select</option>
								<?php foreach(@$pos_results as $presult){?>
									<option data-state-id="<?php echo $presult->state_id; ?>" value="<?php echo $presult->id;?>" <?php if(@$result->pos_id==$presult->id){?> selected <?php } ?>><?php echo $presult->state_id . ' - ' . $presult->state_name; ?></option>
								<?php }?>
							</select> 
                        </div>
                        <div class="col-sm-4">
                            <label class="reg" for="id_supply_type" >Supply Type</label>
                            <input class="form-control" id="id_supply_type" name="supply_type" value="<?php echo @$result->supply_type?>"  disabled="">
                        </div>
                         <input type="hidden" id="gstin_state_code" value="<?php echo substr(@$resultTaxpayer->gstno, 0, 2); ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                           <br>
                           <input type="checkbox" class="chkbx" name="is_diff_perc" id="is_diff_perc" value="1" 
                                <?php echo (@$result->is_diff_perc == 1) ? 'checked' : ''; ?>>
                            <label for="is_diff_perc">
                                Is the supply eligible to be taxed at a differential percentage (%) of the
                                existing rate of tax, as notified by the Government?
                            </label>
                       </div>                       
                   </div>
                </div>
               <div>
                        
                       
                         <fieldset id="item-details-integrated" style="">
                        <div class="rettbl-format">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <h4 class="no-mar">Item details</h4>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table exp inv tbl table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center">
                                                        Rate (%)</th>
                                                    <th rowspan="2" class="text-center m-cir">Taxable
                                                        value (₹)</th>
                                                    <th colspan="3" class="text-center">Amount of Tax</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center m-cir">Integrated tax
                                                        (₹)</th>
                                                    <th class="text-center">Cess (₹)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    //  rates (used in rows)
                                    $rates = ['0%', '0.1%', '0.25%', '1%', '1.5%', '3%', '5%', '6%', '7.5%', '12%', '18%', '28%'];
                                    
                                    foreach ($rates as $index => $rate_value):
                                        // Check if this is the rate to patch
                                        $isMatch = ($rate_value == @$result_details->rate);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $rate_value; ?>
                                            <input name="rate[]" type="hidden" value="<?php echo $rate_value; ?>">
                                        </td>
                                        
                                        <td class="text-center">
                                            <input id="taxable_value<?php echo $index; ?>" name="taxable_value[]" class="form-control"
                                                value="<?php echo $isMatch ? @$result_details->taxable_value : ''; ?>">
                                        </td>
                                        
                                        <td class="text-center">
                                            <input id="tax<?php echo $index; ?>" name="tax[]" class="form-control"
                                                value="<?php echo $isMatch ? @$result_details->tax : ''; ?>" readonly>
                                        </td>
                                        
                                        <td class="text-center">
                                            <input id="cess<?php echo $index; ?>" name="cess[]" class="form-control"
                                                value="<?php echo $isMatch ? @$result_details->cess : ''; ?>" readonly>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </fieldset>
                      
                        
                    </div>
                <div class="row">
                    < <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        	<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                        <a type="button" class="btn btn-default" href="<?php echo base_url('home/tax_paid_list'); ?>">Back</a>
                        <button type="submit" class="btn btn-primary accpt">Save</button>
                    </div>
                </div>
            </div>
        <?php  echo form_close(); ?>
        
    </div>
</div>

        </div>
    </div>
</div>

