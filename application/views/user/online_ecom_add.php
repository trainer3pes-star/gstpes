
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
        <?php echo form_open_multipart('home/save_online_ecom', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
            <div class="row invsumm">
                <div class="col-sm-12 col-xs-12 taxp">
                    <h4 data-ng-bind="editHeaderforA ? trans.HEAD_ECOM_TCS_EDIT : trans.HEAD_ECOM_TCS">14 - Supplies made through E-Commerce Operators - u/s 52 (TCS) - Add Details</h4>
             </div>
            </div>
            <div class="tabpane">
                <div class="pending-records-err-msg-taba">
                    
                <div class="rettbl-format success-msg">
                    <div>
                        <div class="alert alert-msg alert-success ng-hide" data-ng-show="success_msg">
                            Request accepted successfully
                        </div>
                    </div>
                   
                        <p class="mand-text" style="padding-right: 0px;" >Indicates Mandatory Fields</p>
                </div>
           
                <div class="tbl-format rettbl-format">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="id_receipient_gst_number">GSTIN of&nbsp;e-commerce operator</label>
                            
                        <input id="gstin_no" name="gstin_no"  type="text" placeholder="Enter GSTIN"  maxlength="15" required class="form-control"value="<?php echo @$result->gstin_no?>">
                                        
                        </div>
                        
                         <div class="col-sm-4">
                            <label class="reg" for="id_receipient_gst_number">Trade/Legal Name</label>
                            
                        <input id="trade_name" name="trade_name"  type="text" class="form-control" value="" disabled>
                                        
                        </div>
                       
                         <div class="col-sm-4">
                            <label class="reg m-cir" for="taxable_value">Net value of supplies (₹)</label>
                            <input name="net_value" class="form-control text-right " id="net_value" value="<?php echo @$result->net_value?>"required >
                        </div>
                    </div>
                    <div class="row">
    
                       
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="tax">Integrated tax (₹)</label>
                            <input name="integrated_tax" class="form-control text-right " id="integrated_tax" value="<?php echo @$result->integrated_tax?>"required >
                        </div>
                        
                        <div class="col-sm-4">
                            <label class="reg m-cir" for="tax">Central tax (₹)</label>
                            <input name="central_tax" class="form-control text-right " id="central_tax" value="<?php echo @$result->central_tax?>"required >
                        </div>
                        

                        <div class="col-sm-4">
                            <label class="reg m-cir" for="tax">State/UT tax (₹)</label>
                            <input name="state_tax" class="form-control text-right " id="state_tax" value="<?php echo @$result->state_tax?>"required >
                        </div>
                        
                    </div>
                    <div class="row">
                       
                        <div class="col-sm-4">
                            <label class="reg" for="tax">Cess (₹)</label>
                            <input name="cess" class="form-control text-right " id="cess" value="<?php echo @$result->cess?>" >
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        	<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                         <a type="button" class="btn btn-default" href="<?php echo base_url('home/online_ecom_summary'); ?>">Back</a>
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

