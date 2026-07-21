

     
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
                            <span ng-switch-when="true">B2CS</span>
                        </ng-switch>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="lang dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                <ul class="dropdown-menu lang-dpdwn">
                    <!---->
                    <li data-ng-repeat="language in languages">
                        <a data-ng-click="selectLang(language.cd)">English</a>
                    </li>
                    <!---->
                </ul>
            </div>
        </div>
    </div>
    <!---->
    <div data-ng-controller="mainctrl" ng-view="">
        
            <?php echo form_open_multipart('home/save_b2cs_addInvoice', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                <div class="row invsumm">
                    <!---->
                    <!---->
                    <div data-ng-if="!rateEditable" class="col-sm-12 col-xs-12 taxp">
                        <h4>B2CS- Add Details</h4>
                        <span data-toggle="modal" data-target="#b2csModal"><a href="#" type="button" title="Help" data-toggle="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i></a></span>
                    </div>
                    <!---->
                </div>
                <!-- Heading -->
                <div class="tabpane">
                    <!---->
                    <p class="mand-text">Indicates Mandatory Fields</p>

                    <div class="tbl-format rettbl-format" style="font-size: 14px;">
                    
                        <div class="row pb-4" style="padding: 1em;">
                           
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
                            <label class="reg m-cir" for="taxable_value">Taxable value (₹)</label>
                            <input name="taxable_value" class="form-control text-right taxable-value"  value="<?php echo @$result->taxable_value?>" >
                        </div>
                            <div class="row">
                               <div class="col-sm-4">
                            <label class="reg" for="id_supply_type" >Supply Type</label>
                            <input class="form-control" id="id_supply_type" name="supply_type" value="<?php echo @$result->supply_type?>"  disabled="">
                        </div>
                         <input type="hidden" id="gstin_state_code" value="<?php echo substr(@$resultTaxpayer->gstno, 0, 2); ?>">
                            </div>
                        </div>
                        <div class="row" style="padding: 1em;">
                            <div class="col-sm-8">
                                <br>
                              <input type="checkbox" class="chkbx" name="is_diff_perc" id="is_diff_perc" value="1" 
                                <?php echo (@$result->is_diff_perc == 1) ? 'checked' : ''; ?>>
                            <label for="is_diff_perc">
                                Is the supply eligible to be taxed at a differential percentage (%) of the
                                existing rate of tax, as notified by the Government?
                            </label>

                            </div>
                            <!---->
                        </div>
                        <div class="row" style="padding: 1em;">
                            
                                        <div class="col-sm-4">
                <label class="reg m-cir" for="rate">Rate</label>
                <?php $selected_rate = isset($result->rate) ? $result->rate : '';
                    ?>
                                    <select class="form-control rate" name="rate" required>
                                        
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
                            
                         
                           
                        </div>
                      
                        <div class="row tax-cess-wrapper" style="padding: 1em; display: none;">
                    <div class="col-sm-4">
                        <label class="reg m-cir">Integrated Tax (₹)</label>
                        <input class="form-control tax" name="tax" type="text" value="<?php echo @$result->tax?>" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label class="reg">CESS (₹)</label>
                        <input class="form-control cess" name="cess" type="text" value="<?php echo @$result->cess?>" readonly>
                    </div>
                </div>
                
                                        <!---->
                                    </div>
                    <!--<div data-ng-include="'/pages/returns/template.html'"></div>-->
                    <div class="row">
                         <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        	<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                        <a type="button" class="btn btn-default" href="<?php echo base_url('home/b2cs_list'); ?>">Back</a>
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
   
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const taxableInput = document.querySelector('.taxable-value');
        const rateSelect = document.querySelector('.rate');
        const taxField = document.querySelector('.tax');
        const cessField = document.querySelector('.cess');

        function calculateTax() {
            const taxableValue = parseFloat(taxableInput.value) || 0;
            const rate = parseFloat(rateSelect.value) || 0;

            // Integrated tax calculation
            const taxAmount = (taxableValue * rate) / 100;
            taxField.value = taxAmount.toFixed(2);

            // CESS logic (optional - change if needed)
            const cessAmount = 0; // You can define CESS % if applicable
            cessField.value = cessAmount.toFixed(2);
        }

        taxableInput.addEventListener('input', calculateTax);
        rateSelect.addEventListener('change', calculateTax);
    });
    
  
    $('#pos_id').on('change', function () {
        let selected = $(this).val();
        if (selected) {
            $('.tax-cess-wrapper').slideDown(); // Show tax and cess fields
        } else {
            $('.tax-cess-wrapper').slideUp();   // Hide if POS is deselected
        }
    });

    // Trigger change on page load to patch visibility if POS was already selected
    $('#pos_id').trigger('change');

</script>



