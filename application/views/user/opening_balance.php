
<div class="container" style="font-size:14px;">
    <div class="mypage">
        <div class="row">
            <div class="col-xs-10">
                <div data-breadcrumb="" name="Dashboard">
                    <ol class="breadcrumb">
                        <li><a target="" href="/gst/dashboard/new/">Dashboard</a></li>
                        <li>
                            <span>Change Opening Balance &amp; GSTR2B Values</span>
                        </li>
                    </ol>
                </div>
            </div>
    
            <div class="col-xs-2">
                <div class="lang dropdown">
                    <span class="dropdown-toggle" data-toggle="dropdown">English</span>
                    <ul class="dropdown-menu lang-dpdwn">
                        <!---->
                        <li>
                            <a data-ng-click="selectLang(language.cd)">English</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div ng-view="">
            <div class="tabpane">
                <div class="row" style="padding: 1em;">
                    <h1 style="padding-bottom: 1em; color:#2c4e86;font-weight: 700;">Change Opening Balance &amp; GSTR2B Values</h1>
                    
                    <div class="alert alert-info" style="margin-bottom: 2em;">
                        <h4><strong>Premium Feature: Simplified GST Filing</strong></h4>
                        <p>TaxDemoPortal's exclusive feature allows you to easily modify opening balances and GSTR2B values for accurate GSTR3B filing. As a premium user, you get:</p>
                        <ul style="margin-top: 1em;">
                            <li>Quick and hassle-free balance adjustments</li>
                            <li>Real-time updates for GSTR3B calculations</li>
                            <li>Error-free tax filing experience</li>
                            <li>24/7 priority support for any queries</li>
                        </ul>
                    </div>
                    <div class="premium-badge" style="margin-bottom: 20px;">
                        <span class="badge" style="background: #ffd700; color: #000; padding: 5px 10px;">
                            <i class="fa fa-star"></i> Premium Feature
                        </span>
                    </div>
                
                    <!-- <form id="gst-demo-opening-balance" action="/gst/opening-balance/" method="post"> -->
                        
    
                      <?php echo form_open_multipart('home/save_opening_balance', array('id' => 'tax_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                  <div id="div_id_opening_igst" class="form-group row">
                       <label for="id_opening_igst" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening cash ledger - IGST<span class="asteriskField">*</span>
                    </label> 
                    <div class="col-lg-4"> <input type="number" name="cash_ledger_igst" value="<?php echo !empty($result->cash_ledger_igst) ? $result->cash_ledger_igst : '0.00'; ?>"
                    step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_igst"> </div> </div> 
                    <div id="div_id_opening_cgst" class="form-group row"> 
                    <label for="id_opening_cgst" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening cash ledger - CGST<span class="asteriskField">*</span> </label> 
                    <div class="col-lg-4"> <input type="number" name="cash_ledger_cgst" value="<?php echo !empty($result->cash_ledger_cgst) ? $result->cash_ledger_cgst : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_cgst"> </div> </div> 
                    <div id="div_id_opening_sgst" class="form-group row"> <label for="id_opening_sgst" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening cash ledger - SGST<span class="asteriskField">*</span> 
                    </label> <div class="col-lg-4"> <input type="number" name="cash_ledger_sgst" value="<?php echo !empty($result->cash_ledger_sgst) ? $result->cash_ledger_sgst : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_sgst"> </div> </div> <div id="div_id_opening_cess" class="form-group row"> <label for="id_opening_cess" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening cash ledger - Cess<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="cash_ledger_cess" value="<?php echo !empty($result->cash_ledger_cess) ? $result->cash_ledger_cess : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_cess"> </div> </div> <div id="div_id_opening_credit_ledger_it" class="form-group row"> <label for="id_opening_credit_ledger_it" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening Credit Ledger - Integrated Tax<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="credit_ledger_integrated_tax" value="<?php echo !empty($result->credit_ledger_integrated_tax) ? $result->credit_ledger_integrated_tax : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_credit_ledger_it"> </div> </div> <div id="div_id_opening_credit_ledger_central" class="form-group row"> <label for="id_opening_credit_ledger_central" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening Credit Ledger - Central Tax<span class="asteriskField">*</span> 
                    </label> <div class="col-lg-4"> <input type="number" name="credit_ledger_central_tax" value="<?php echo !empty($result->credit_ledger_central_tax  ) ? $result->credit_ledger_central_tax : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_credit_ledger_central"> </div> </div> <div id="div_id_opening_credit_ledger_state" class="form-group row"> <label for="id_opening_credit_ledger_state" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening Credit Ledger - State Tax<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="credit_ledger_state_tax" value="<?php echo !empty($result->credit_ledger_state_tax) ? $result->credit_ledger_state_tax : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_credit_ledger_state"> </div> </div> <div id="div_id_opening_credit_ledger_cess" class="form-group row"> <label for="id_opening_credit_ledger_cess" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    Opening Credit Ledger - Cess<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="credit_ledger_cess" value="<?php echo !empty($result->credit_ledger_cess) ? $result->credit_ledger_cess : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_opening_credit_ledger_cess"> </div> </div> <div id="div_id_gstr2b_igst" class="form-group row"> <label for="id_gstr2b_igst" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    GSTR2B - IGST<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="GSTR2B_IGST" value="<?php echo !empty($result->GSTR2B_IGST) ? $result->GSTR2B_IGST : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_gstr2b_igst"> </div> </div> <div id="div_id_gstr2b_cgst" class="form-group row"> <label for="id_gstr2b_cgst" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    GSTR2B - CGST<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="GSTR2B_CGST" value="<?php echo !empty($result->GSTR2B_CGST) ? $result->GSTR2B_CGST : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_gstr2b_cgst"> </div> </div> <div id="div_id_gstr2b_sgst" class="form-group row"> <label for="id_gstr2b_sgst" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    GSTR2B - SGST<span class="asteriskField">*</span> </label> <div class="col-lg-4"> <input type="number" name="GSTR2B_SGST" value="<?php echo !empty($result->GSTR2B_SGST) ? $result->GSTR2B_SGST : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_gstr2b_sgst"> </div> </div> <div id="div_id_gstr2b_cess" class="form-group row"> <label for="id_gstr2b_cess" class="col-form-label col-lg-3 offset-md-2 requiredField">
                    GSTR2B - Cess<span class="asteriskField">*</span> </label> 
                    <div class="col-lg-4"> <input type="number" name="GSTR2B_Cess" value="<?php echo !empty($result->GSTR2B_Cess) ? $result->GSTR2B_Cess : '0.00'; ?>" step="0.01" class="input-sm numberinput form-control text-right" required="" id="id_gstr2b_cess"> </div> </div> <div class="form-group row None"> <div class="aab col-lg-3 offset-md-2"></div> <div class="col-lg-4"> 
                    <!--<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-primary" id="submit-id-submit"> </div>-->
                  
    <!--</div> -->
    <!--</form>-->
    
                         <div class="form-group">
                            <div class="aab controls col-lg-2"></div>
                            <div class="controls col-lg-6 text-center">
                                 <input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                              
                                <button type="submit" class="btn btn-primary ">Submit</button>
                              
                            </div>
                        </div>
                    <?php  echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    
    
    
            </div>

