
   
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
                            <span ng-switch-when="true">EXP</span>
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
        <div class="container content-wrapper" data-ng-init="editData()">
             <?php echo form_open_multipart('home/save_exports_invoiceadd', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
              
                <div class="row invsumm">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 class="pull-left ng-hide">Exports- Edit Details</h4>
                        <h4 class="pull-left" data-ng-hide="isEditPage">Exports- Add Details</h4>
                    </div>
                </div>
                <div class="tabpane">
                    <div class="alert alert-msg alert-danger ng-hide">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <i class="fa fa-times"></i>
                        </button>
                        <i class="fa fa-info-circle"></i><strong>Error!</strong>
                        <p>Action has already been taken and the invoice is present in pending list please take further actions in pending version until it gets processed</p>
                    </div>
                    <!---->
                    <p class="mand-text">Indicates Mandatory Fields</p>
                    <div class="tbl-format rettbl-format">
                        <div class="row">
                             <div class="col-sm-4" >
                            <label class="reg m-cir" for="id_invoice_number">Invoice
                                no.</label>
                            <input type="text" name="invoice_no" class="form-control" id="invoice_no" value="<?php echo @$result->invoice_no?>"  maxlength="16" required>
                            
                        </div>
                            <div class="col-sm-4" >
                            <label class="reg m-cir" for="id_invoice_date" data-ng-bind="trans.LBL_INVOICE_DATE">Invoice
                                date</label>
                            <div class="datepicker-icon input-group">
                                <input type="date" name="date" class="form-control" id="date" value="<?php echo isset($result->date) ? date('Y-m-d', strtotime($result->date)) : ''; ?>" placeholder="DD/MM/YYYY" required>
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>

                            
                        </div>
                             <div class="col-sm-4">
                            <label class="reg" for="id_total_invoice_value" >Port Code
                              </label>
                            <input name="port_code" class="form-control text-right" id="port_code" value="<?php echo @$result->port_code;?>" maxlength="6">
                        </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-4">
                            <label class="reg" for="id_total_invoice_value" >Shipping Bill No./Bill of Export No. 
                              </label>
                            <input name="shipping_bill_no" class="form-control text-right" id="shipping_bill_no" value="<?php echo @$result->shipping_bill_no?>">
                        </div>
                           <div class="col-sm-4" >
                            <label class="reg" for="id_invoice_date">Shipping Bill Date/Bill of Export Date</label>
                            <div class="datepicker-icon input-group">
                               <input type="date" name="shipping_bill_date" class="form-control" id="shipping_bill_date"
                               value="<?php echo isset($result->shipping_bill_date) ? date('Y-m-d', strtotime($result->shipping_bill_date)) : ''; ?>"
                               placeholder="DD/MM/YYYY" required>

                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>
                            
                        </div>
                            <div class="col-sm-4">
                            <label class="reg m-cir" for="id_total_invoice_value" >Total invoice
                                value (₹)</label>
                            <input name="invoice_value" class="form-control text-right" id="invoice_value" value="<?php echo @$result->invoice_value?>">
                        </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-4">
                            <label class="reg" for="id_total_invoice_value" >Supply Type</label>
                            <input name="supply_type" class="form-control text-right" id="supply_type" value="<?php echo @$result->supply_type?>" disabled>
                        </div>
                           <div class="col-sm-4">
                            <label class="reg m-cir" for="gst_pay">GST Payment</label>
                            <select class="form-control newinv formedit" name="gst_payment" required>
                                <option value="With Payment of Tax" <?php echo (@$result->gst_payment == 'With Payment of Tax') ? 'selected' : ''; ?>>With Payment of Tax</option>
                                <option value="Without Payment of Tax" <?php echo (@$result->gst_payment == 'Without Payment of Tax') ? 'selected' : ''; ?>>Without Payment of Tax</option>
                            </select>
                        </div>

                            
                        </div>
                       
                    </div>
                    <!---->
                   <fieldset id="" style="">
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
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                        	<input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                       <a type="button" class="btn btn-default" href="<?php echo base_url('home/exports_invoice_list'); ?>">Back</a>
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
<script>
document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll("tbody tr");

    rows.forEach((row, index) => {
        const taxableInput = row.querySelector('input[name="taxable_value[]"]');
        const taxInput = row.querySelector('input[name="tax[]"]');
        const rateInput = row.querySelector('input[name="rate[]"]');

        taxableInput.addEventListener("input", () => {
            const taxableValue = parseFloat(taxableInput.value) || 0;
            const rateStr = rateInput.value.replace('%', '');
            const rate = parseFloat(rateStr) || 0;

            const tax = (taxableValue * rate) / 100;
            taxInput.value = tax.toFixed(2);
        });
    });
});


</script>




