
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
        <?php echo form_open_multipart('home/save_online_supplies', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
            <div class="row invsumm">
                <!----><div data-ng-if="!edit" class="col-sm-12 col-xs-12 taxp" style="margin-bottom:10px">
                    <h4 data-ng-bind="trans.HEAD_SUP_15_B2B_ADD">15 - Supplies U/s 9(5) - B2B - Add Details</h4>
                </div><!---->
                <!---->
                <!---->
            </div>
              <div class="tabpane">
                <div>
                    <div class="alert alert-msg alert-success ng-hide" data-ng-show="success_msg">
                        Request accepted successfully.
                    </div>
                </div>
                <!---->
                <!---->
                <!---->
    
                <div class="rettbl-format" style="margin-top: -20px;">
                    <div class="row">
                        <div class="col-sm-8" style="padding-left: 0px;"><a href="/gst/return/gstr1/online/supplies/summary/" data-ng-click="resetDirective('Y');historyback();">
                            <i class="fa fa-arrow-circle-left" style="font-size: xx-large; color: #17c4bb;"></i></a>
                        </div>
                        <div class="col-sm-4" style="padding-right: 0px;">
                            <span class="mand-text pull-right" data-ng-bind="trans.HLP_MAND_FIELD">Indicates Mandatory Fields</span>
                        </div>
                    </div>
                </div>
                <div class="tbl-format rettbl-format">
                    <div class="row">
                        <div class="col-sm-4">
                            <br>
                           <input type="checkbox" class="chkbx" id="is_deemed" name="is_deemed" value="1">
                           <label for="is_deemed">Deemed Exports</label>

                        </div>
    
                        <div class="col-sm-4">
                            <br>
                            <input type="checkbox" class="chkbx ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" id="SEZexpay" name="SEZexpay" data-ng-model="sup15r2r[0].inv[0].inv_typ" data-ng-checked="sup15r2r[0].inv[0].inv_typ=='SEWP' &amp;&amp; sezTyp==='SEZ'" data-ng-true-value="'SEWP'" data-ng-false-value="'R'" data-ng-required="(sezTyp==='SEZ' &amp;&amp; sup15r2r[0].inv[0].inv_typ!=='SEWOP')" data-ng-disabled="b2bnewview || sezopDisable()" data-ng-change="matchpos(sup15r2r[0].inv[0].pos,sup15r2r[0].inv[0].inv_typ);uncheckbox(sup15r2r[0].inv[0].inv_typ,sup15r2r[0].inv[0].rchrg)" disabled="disabled">
                            <label for="SEZexpay" data-ng-bind="trans.LBL_SEZ_SUP_R1">SEZ Supplies with payment</label>
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <input type="checkbox" class="chkbx ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" id="SEZexwpay" name="SEZexwpay" data-ng-model="sup15r2r[0].inv[0].inv_typ" data-ng-checked="sup15r2r[0].inv[0].inv_typ=='SEWOP ' &amp;&amp; sezTyp==='SEZ'" data-ng-true-value="'SEWOP'" data-ng-false-value="'R'" data-ng-disabled="b2bnewview || sezopDisable()" data-ng-required="(sezTyp==='SEZ' &amp;&amp; sup15r2r[0].inv[0].inv_typ!=='SEWP')" data-ng-change="matchpos(sup15r2r[0].inv[0].pos,sup15r2r[0].inv[0].inv_typ);uncheckbox(sup15r2r[0].inv[0].inv_typ,sup15r2r[0].inv[0].rchrg)" disabled="disabled">
                            <label for="SEZexwpay" data-ng-bind="trans.LBL_SEZ_WPAY">SEZ Supplies without payment</label>
                        </div> 
                    </div>
                    <div class="row">
                      
                       
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_gst_number">Supplier GSTIN/UIN</label>
                            
                                        <input id="supplier_gstin_no" name="supplier_gstin_no"  type="text" placeholder="Enter Supplier GSTIN/UIN"  maxlength="15" required class="form-control"
                                     value="<?php echo @$result->supplier_gstin_no?>">
                                        
                        </div>
                       
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_name">Supplier Name</label>
                            <input type="text" class="form-control formedit" id="s_name" name="s_name" value="<?php echo @$result->s_name?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient">Recipient
                                GSTIN/UIN</label>
                            
                                        <input id="recipient_gstin_no" name="recipient_gstin_no"  type="text" placeholder="Enter Recipient
                                GSTIN/UIN"  maxlength="15" required class="form-control"
                                     value="<?php echo @$result->recipient_gstin_no?>">
                                        
                        </div>
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_name">Recipient
                                Name</label>
                            <input type="text" class="form-control formedit" id="r_name" name="r_name" readonly value="<?php echo @$result->r_name?>">
                        </div>
    
                        
                         
                        <div class="col-sm-4" >
                            <label class="reg m-cir" for="inv_no">Document number</label>
                            <input type="text" name="document_no" class="form-control" id="document_no" maxlength="16" value="<?php echo @$result->document_no?>" required>
                            
                        </div>
                    </div>
    
                    <div class="row">
                        
                        
                         <div class="col-sm-4" >
                            <label class="reg m-cir" for="invdate">Document date</label>
                            <div class="datepicker-icon input-group">
                                <input type="date" name="document_date" class="form-control" id="document_date" value="<?php echo isset($result->document_date) ? date('Y-m-d', strtotime($result->document_date)) : ''; ?>" placeholder="DD/MM/YYYY" required>
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
    

                          <div class="col-sm-4">
                            <label class="reg m-cir" for="id_total_invoice_value" >Total value of supplies made (₹)</label>
                            <input name="total_value" class="form-control text-right" id="total_value" value="<?php echo @$result->total_value?>" required>
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
    
                    </div> 
    
                    <div class="row">
                         <div class="col-sm-4">
                            <label class="reg" for="id_supply_type" >Supply Type</label>
                            <input class="form-control" id="id_supply_type" name="supply_type" value="<?php echo @$result->supply_type?>" disabled="">
                        </div>
                        <input type="hidden" id="gstin_state_code" value="<?php echo substr(@$resultTaxpayer->gstno, 0, 2); ?>">
                        </div> 
                </div>
                <!---->
    
                <!----><div class="row" data-ng-if="!edit">
                    <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        <a type="button" class="btn btn-default" href="<?php echo base_url('home/online_supplies_summary'); ?>">Back</a>
                        	<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                        <button type="submit" class="btn btn-primary accpt">Save</button>
                    </div>
                </div><!---->
                <!---->
            </div>
        <?php  echo form_close(); ?>
       
    </div>
</div>

        </div>
    </div>
</div>
