

   
 
<div class="container py-5">
    <div class="content-wrapper">
          <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
      <div class="row">
        <div class="col-xs-10">
            <div data-breadcrumb="" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="" href="/gst/dashboard/">Dashboard</a></li>
                    <li>
                      
                            <span ><a href="/gst/return/dashboard/" target="_self">Returns</a></span>
                        
                    </li>
                    <li>
                       
                            <span ><a href="/gst/return/gstr1/online/">GSTR-1/IFF</a></span>
                      
                    </li>
                    <li>
                      
                            <span >CDNR</span>
                       
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    
                    <li>
                        <a>English</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div  >
        <div class="container content-wrapper">
             <?php echo form_open_multipart('home/save_registered_noteadd', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                

                <input type="hidden" name="csrfmiddlewaretoken" value="">
                <div class="row invsumm">
                    
                    <div  class="col-sm-12 col-xs-12">
                        <h4>Credit/Debit Notes (Registered)- Add Note</h4>
                    </div>
                    
                    
                </div>
                <div class="tabpane">
                    <div>
                        <div class="alert alert-msg alert-success ng-hide" data-ng-show="success_msg">
                            <!-- <i class="fa fa-check-circle"></i> -->
                            Request accepted successfully
                        </div>
                    </div>
                    
                    
                    
                    <div class="rettbl-format" style="margin-top: -20px;">
                        <div class="row">
                            <div class="col-sm-8" style="padding-left: 0px;"><a href="/gst/return/gstr1/online/b2b/summary/" >
                                    <i class="fa fa-arrow-circle-left" style="font-size: xx-large; color: #17c4bb;"></i></a>
                            </div>
                            <div class="col-sm-4" style="padding-right: 0px;">
                                <span class="mand-text pull-right">Indicates Mandatory
                                    Fields</span>
                            </div>
                        </div>
                    </div>
                    <div class="tbl-format rettbl-format" style="font-size:14px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <input type="checkbox" class="chkbx" id="is_deemed" name="is_deemed" value="1">
                           <label for="is_deemed">Deemed Exports</label>
                            </div>
                            <div class="col-sm-4">
                                <br>
                                <input type="checkbox" class="chkbx" id="SEZexpay" name="SEZexpay" disabled="disabled">
                                <label for="SEZexpay">SEZ Supplies with payment</label>
                            </div>
                            <div class="col-sm-4">
                                <br>
                                <input type="checkbox" class="chkbx " id="SEZexwpay" name="SEZexwpay"  disabled="disabled">
                                <label for="SEZexwpay" >SEZ Supplies without
                                    payment</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <input type="checkbox" class="chkbx" id="is_supply"  name="is_supply" value="1">
                            <label for="rev_charge">Supply attract reverse
                                charge</label>
                            </div>
                            <div class="col-sm-4">
                                <br>
                                <input type="checkbox" class="chkbx " id="WRBexpay" name="WRBexpay"   disabled="disabled">
                                <label for="WRBexpay">Intra-State Supplies attracting
                                    IGST</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <br>
                                <input type="checkbox" class="chkbx" name="is_diff_perc" id="is_diff_perc" value="1">
                            <label for="rate_flag">Is the supply eligible to be taxed at a differential percentage (%)
                                of the
                                existing rate of tax, as notified by the Government?</label>
                            </div>
                            
                        </div>
                        <div class="row">
                             <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_gst_number">Recipient
                                GSTIN/UIN</label>
                            
                                        <input id="gstin_no" name="gstin_no"  type="text" placeholder="Search by recipient name as in master or enter GSTIN"  maxlength="15" required class="form-control"
                                     value="<?php echo isset($gstin_no) ? htmlspecialchars($gstin_no) : ''; ?>">
                                        
                        </div>
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_name">Recipient
                                Name</label>
                                <!--<input type="text" name="receipient_name" class="form-control formedit  ng-hide" id="id_receipient_name">-->
                            <input type="text" class="form-control formedit" id="id_receipient_name_to_show" name="recipient_name" readonly>
                        </div>
                            <div class="col-sm-4" data-ng-if="usrmstrenabled">
                                <label class="reg" for="u_name" data-ng-bind="trans.LBL_SUPP_RECIP_NAME">Name as in
                                    Master</label>
                                <input type="text" name="sup_name" class="form-control formedit ng-pristine ng-untouched ng-valid ng-empty" id="sup_name" title="" data-ng-model="supRespName" disabled="">
                            </div>
                            
                        </div>
                        <div class="row" data-ng-if="gstinRecordAdd" id="gstinRecordAdd" style="display: none;">
                            <div class="col-sm-6">
                                <span class="reg">GSTIN not present in master/ GSTIN is selected as supplier only.</span>
                                <br>
                                <button type="button" class="btn btn-primary" data-ng-click="showSupMaster()">Add to Master
                                </button>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            
                            <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_gst_number">Debit/Credit Note No.</label>
                            
                                        <input id="note_no" name="note_no"  type="text" placeholder=""   required class="form-control"value="">
                                        
                             </div>
                            
                            
                            <div class="col-sm-4" >
                            <label class="reg m-cir" for="id_invoice_date" data-ng-bind="trans.LBL_INVOICE_DATE">Debit/Credit Note Date</label>
                            <div class="datepicker-icon input-group">
                                <input type="date" name="note_date" class="form-control" id="note_date"  placeholder="DD/MM/YYYY" required>
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>
                            </div>
                           
                             <div class="col-sm-4">
                            <label class="reg m-cir" for="gst_pay">Note Type</label>
                            <select class="form-control newinv formedit" name="note_type" required>
                                 <option value="" selected="selected">Select</option>
                                <option value="0" <?php echo (@$result->note_type == '0') ? 'selected' : ''; ?>>Credit</option>
                                <option value="1" <?php echo (@$result->note_type == '1') ? 'selected' : ''; ?>>Debit</option>
                            </select>
                        </div>

                            
                        </div>
                        <div class="row">
                                        
                            <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_gst_number">Note value (₹)</label>
                            
                                        <input id="note_value" name="note_value"  type="text" placeholder=""   required class="form-control"value="">
                                        
                             </div>
                            <div class="col-sm-4">
                            <label class="reg m-cir" for="id_place_of_supply"><span>POS</span>
                                <i class="fa fa-info-circle" ></i></label>
                           <select name="pos_id" id="pos_id" class=" form-control select2 required" style="width:100%;" required> 
								<option value="">Select</option>
								<?php foreach(@$pos_results as $presult){?>
									<option  data-state-id="<?php echo $presult->state_id; ?>" value="<?php echo $presult->id;?>" <?php if(@$result->pos_id==$presult->id){?> selected <?php } ?>><?php echo $presult->state_id . ' - ' . $presult->state_name; ?></option>
								<?php }?>
							</select> 
                        </div>
                             <div class="col-sm-4">
                            <label class="reg" for="id_supply_type" >Supply Type</label>
                            <input class="form-control" id="id_supply_type" name="supply_type"  disabled="">
                        </div>
                         <input type="hidden" id="gstin_state_code" value="<?php echo substr(@$resultTaxpayer->gstno, 0, 2); ?>">
                           
                        </div>
                        
                        <div  class="row">
                            
                             <div class="col-sm-4">
                            <label class="reg" for="source" >Source</label>
                            <input class="form-control" id="source" name="source"  disabled="">
                        </div>
                            <div class="col-sm-4">
                                <label class="reg" for="irn">IRN</label>
                                <input class="form-control ng-pristine ng-untouched" name="IRN"  disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="reg" for="irngendate">IRN
                                    date</label>
                                <input class="form-control ng-pristine ng-untouched " name="IRN_date"  disabled="">
                            </div>
                        </div>
                    </div>
                    
                    <div data-ng-include="'/pages/returns/gstr1/template.html'">
                      
                       <fieldset id="item-details-integrated" style="display:none">
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
                                // Example rates (used in rows)
                                $rates = ['0%', '0.1%', '0.25%', '1%', '1.5%', '3%', '5%', '6%', '7.5%', '12%', '18%', '28%'];
                                
                                foreach ($rates as $index => $rate_value):
                                    // Check if this is the rate to patch
                                    $isMatch = ($rate_value == @$result_export_details->rate);
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $rate_value; ?>
                                        <input name="rate[]" type="hidden" value="<?php echo $rate_value; ?>">
                                    </td>
                                    
                                    <td class="text-center">
                                        <input id="taxable_value<?php echo $index; ?>" name="taxable_value[]" class="form-control"
                                            value="<?php echo $isMatch ? @$result_export_details->taxable_value : ''; ?>">
                                    </td>
                                    
                                    <td class="text-center">
                                        <input id="tax<?php echo $index; ?>" name="tax[]" class="form-control"
                                            value="<?php echo $isMatch ? @$result_export_details->tax : ''; ?>" readonly>
                                    </td>
                                    
                                    <td class="text-center">
                                        <input id="cess<?php echo $index; ?>" name="cess[]" class="form-control"
                                            value="<?php echo $isMatch ? @$result_export_details->cess : ''; ?>" readonly>
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
                        <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                             <input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                            <a type="button" class="btn btn-default" href="<?php echo base_url('home/registered_summary_list'); ?>">Back</a>
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

</div>

