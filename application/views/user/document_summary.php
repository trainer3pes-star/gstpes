
    
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
                            <span ng-switch-when="true">Documents Issued</span>
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
        <div data-ng-init="getDocDetails()">
            <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>
            <?php echo form_open_multipart('home/save_document', array('id' => 'basic_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                <div class="row invsumm">
                    <div class="col-xs-12 col-sm-12 taxp">
                        <h4>Documents issued during the tax period </h4>
                        <button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" style="
                    margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                </div>
                <!-- Heading -->
                <div class="tabpane">
                    <div class="row">
                        <span class="col-xs-12 col-sm-12">
                        Note: Kindly click on save button after any modification( add, edit, delete) to save the changes</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">

                                    <div>
                                        <table class="table inv exp tbl table-bordered">
                                            <caption>
                                                <h4>1. Invoices for outward supply</h4>
                                                </caption>
                                                 
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center">No.</th>
                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>
                                                    <th rowspan="2" class="text-center m-cir">Total number</th>
                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>
                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>
                                                    <th rowspan="2" class="text-center">Action</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">From</th>
                                                    <th class="text-center">To</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-table-body1">
                                           <?php $i = 1; ?>
                                        <?php foreach ($result as $doc): ?>
                                            <?php if ($doc->is_table == 1): ?>
                                                <tr>
                                        <td class="text-center"><?= $i++; ?>
                                            <input name="is_table[]" type="hidden" class="form-control" value="<?php echo $doc->is_table ?>">
                                        </td>
                                        <td><input name="from_serial_number[]" class="form-control" maxlength="16" value="<?php echo $doc->from_serial_number ?>" required></td>
                                        <td><input name="to_serial_number[]" class="form-control" maxlength="16" value="<?php echo $doc->to_serial_number ?>" required></td>
                                        <td><input name="total_number[]" class="form-control total_number" value="<?php echo $doc->total_number ?>" maxlength="10" required></td>
                                        <td><input name="cancelled_number[]" class="form-control cancelled_number" value="<?php echo $doc->cancelled_number ?>" maxlength="10" required></td>
                                        <td><input name="net_number[]" class="form-control net_number" value="<?php echo $doc->net_number ?>" readonly></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                             </tbody>

                                        </table>
                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-1" >Add Document</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div>
                                        <table class="table inv exp tbl table-bordered">
                                            <caption>
                                                <h4>2. Invoices for inward supply from unregistered person</h4></caption>
                                                 
                                             <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center">No.</th>
                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>
                                                    <th rowspan="2" class="text-center m-cir">Total number</th>
                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>
                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>
                                                    <th rowspan="2" class="text-center">Action</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">From</th>
                                                    <th class="text-center">To</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-table-body2">
                                            <?php $i = 1; ?>
                                        <?php foreach ($result as $doc): ?>
                                            <?php if ($doc->is_table == 2): ?>
                                                <tr>
    <td class="text-center"><?= $i++; ?>
        <input name="is_table[]" type="hidden" class="form-control" value="<?php echo $doc->is_table ?>">
    </td>
    <td><input name="from_serial_number[]" class="form-control" maxlength="16" value="<?php echo $doc->from_serial_number ?>" required></td>
    <td><input name="to_serial_number[]" class="form-control" maxlength="16" value="<?php echo $doc->to_serial_number ?>" required></td>
    <td><input name="total_number[]" class="form-control total_number2" value="<?php echo $doc->total_number ?>" maxlength="10" required></td>
    <td><input name="cancelled_number[]" class="form-control cancelled_number2" value="<?php echo $doc->cancelled_number ?>" maxlength="10" required></td>
    <td><input name="net_number[]" class="form-control net_number2" value="<?php echo $doc->net_number ?>" readonly></td>
    <td class="text-center">
        <button type="button" class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>
    </td>
</tr>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                         </tbody>

                                        </table>
                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-2" >Add Document</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>3. Revised Invoice</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-3" data-ng-hide="(x.docs.length!=0)" class="ng-hide">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                    
                                                
<!--                                                    <tr id="div-documents-3" class="ng-hide"></tr><tr id="documents-form-8" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-7-type_of_document_issued" name="form-7-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3" selected="selected">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-7-from_serial_number_of_invoice" id="id_form-7-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-7-to_serial_number_of_invoice" id="id_form-7-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-7-total_number_of_invoice" id="id_form-7-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-7-cancelled_number_of_invoice" id="id_form-7-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-7-net_number_of_invoice" id="id_form-7-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-7-id" name="form-7-id" type="hidden">-->
<!--</tr>-->
<!--<tr id="documents-form-3" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-2-type_of_document_issued" name="form-2-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3" selected="selected">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-2-from_serial_number_of_invoice" id="id_form-2-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-2-to_serial_number_of_invoice" id="id_form-2-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-2-total_number_of_invoice" id="id_form-2-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-2-cancelled_number_of_invoice" id="id_form-2-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-2-net_number_of_invoice" id="id_form-2-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-2-id" name="form-2-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-3" data-ng-click="addDetails(x)" data-type_of_document_issued="3">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>4. Debit Note</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-4" data-ng-hide="(x.docs.length!=0)" class="ng-hide">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                    
                                                
<!--                                                    <tr id="div-documents-4" class="ng-hide"></tr><tr id="documents-form-4" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-3-type_of_document_issued" name="form-3-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4" selected="selected">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-3-from_serial_number_of_invoice" id="id_form-3-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-3-to_serial_number_of_invoice" id="id_form-3-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-3-total_number_of_invoice" id="id_form-3-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-3-cancelled_number_of_invoice" id="id_form-3-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-3-net_number_of_invoice" id="id_form-3-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-3-id" name="form-3-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-4" data-ng-click="addDetails(x)" data-type_of_document_issued="4">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>5. Credit Note</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-5" data-ng-hide="(x.docs.length!=0)" class="ng-hide">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                    
                                                
<!--                                                    <tr id="div-documents-5" class="ng-hide"></tr><tr id="documents-form-7" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-6-type_of_document_issued" name="form-6-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5" selected="selected">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-6-from_serial_number_of_invoice" id="id_form-6-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-6-to_serial_number_of_invoice" id="id_form-6-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-6-total_number_of_invoice" id="id_form-6-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-6-cancelled_number_of_invoice" id="id_form-6-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-6-net_number_of_invoice" id="id_form-6-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-6-id" name="form-6-id" type="hidden">-->
<!--</tr>-->
<!--<tr id="documents-form-5" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-4-type_of_document_issued" name="form-4-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5" selected="selected">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-4-from_serial_number_of_invoice" id="id_form-4-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-4-to_serial_number_of_invoice" id="id_form-4-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-4-total_number_of_invoice" id="id_form-4-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-4-cancelled_number_of_invoice" id="id_form-4-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-4-net_number_of_invoice" id="id_form-4-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-4-id" name="form-4-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-5" data-ng-click="addDetails(x)" data-type_of_document_issued="5">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>6. Receipt voucher</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-1" data-ng-hide="(x.docs.length!=0)">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                    
                                                
<!--                                                    <tr id="div-documents-6" class="ng-hide"></tr><tr id="documents-form-6" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-5-type_of_document_issued" name="form-5-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6" selected="selected">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-5-from_serial_number_of_invoice" id="id_form-5-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-5-to_serial_number_of_invoice" id="id_form-5-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-5-total_number_of_invoice" id="id_form-5-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-5-cancelled_number_of_invoice" id="id_form-5-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-5-net_number_of_invoice" id="id_form-5-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-5-id" name="form-5-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-6" data-ng-click="addDetails(x)" data-type_of_document_issued="6">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>7. Payment Voucher</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-7" data-ng-hide="(x.docs.length!=0)">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                    
                                                
<!--                                                    <tr id="div-documents-7" class="ng-hide"></tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-7" data-ng-click="addDetails(x)" data-type_of_document_issued="7">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>8. Refund voucher</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-8" data-ng-hide="(x.docs.length!=0)" class="ng-hide">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                    
                                                
<!--                                                    <tr id="div-documents-8" class="ng-hide"></tr><tr id="documents-form-10" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-9-type_of_document_issued" name="form-9-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8" selected="selected">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-9-from_serial_number_of_invoice" id="id_form-9-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-9-to_serial_number_of_invoice" id="id_form-9-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-9-total_number_of_invoice" id="id_form-9-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-9-cancelled_number_of_invoice" id="id_form-9-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-9-net_number_of_invoice" id="id_form-9-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-9-id" name="form-9-id" type="hidden">-->
<!--</tr>-->
<!--<tr id="documents-form-9" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-8-type_of_document_issued" name="form-8-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8" selected="selected">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-8-from_serial_number_of_invoice" id="id_form-8-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-8-to_serial_number_of_invoice" id="id_form-8-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-8-total_number_of_invoice" id="id_form-8-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-8-cancelled_number_of_invoice" id="id_form-8-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-8-net_number_of_invoice" id="id_form-8-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-8-id" name="form-8-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-8" data-ng-click="addDetails(x)" data-type_of_document_issued="8">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>9. Delivery Challan for job work</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-9" data-ng-hide="(x.docs.length!=0)">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                
<!--                                                    <tr id="div-documents-9" class="ng-hide"></tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-9" data-ng-click="addDetails(x)" data-type_of_document_issued="9">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>10. Delivery Challan for supply on approval</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-10" data-ng-hide="(x.docs.length!=0)">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                
<!--                                                    <tr id="div-documents-10" class="ng-hide"></tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-10" data-ng-click="addDetails(x)" data-type_of_document_issued="10">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>11. Delivery Challan in case of liquid gas</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-11" data-ng-hide="(x.docs.length!=0)" class="ng-hide">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                
<!--                                                    <tr id="div-documents-11" class="ng-hide"></tr><tr id="documents-form-12" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-11-type_of_document_issued" name="form-11-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11" selected="selected">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-11-from_serial_number_of_invoice" id="id_form-11-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-11-to_serial_number_of_invoice" id="id_form-11-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-11-total_number_of_invoice" id="id_form-11-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-11-cancelled_number_of_invoice" id="id_form-11-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-11-net_number_of_invoice" id="id_form-11-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-11-id" name="form-11-id" type="hidden">-->
<!--</tr>-->
<!--<tr id="documents-form-11" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-10-type_of_document_issued" name="form-10-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11" selected="selected">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-10-from_serial_number_of_invoice" id="id_form-10-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-10-to_serial_number_of_invoice" id="id_form-10-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-10-total_number_of_invoice" id="id_form-10-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-10-cancelled_number_of_invoice" id="id_form-10-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-10-net_number_of_invoice" id="id_form-10-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-10-id" name="form-10-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-11" data-ng-click="addDetails(x)" data-type_of_document_issued="11">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
<!--                                    <div data-ng-repeat="x in docDetails.doc_det" data-ng-init="outer=$index">-->
<!--                                        <table class="table inv exp tbl table-bordered">-->
<!--                                            <caption>-->
<!--                                                <h4>12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</h4></caption>-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th rowspan="2" class="text-center">No.</th>-->
<!--                                                    <th colspan="2" class="text-center m-cir">Sr. No.</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Total number</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Cancelled</th>-->
<!--                                                    <th rowspan="2" class="text-center m-cir">Net issued</th>-->
<!--                                                    <th rowspan="2" class="text-center">Action</th>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <th class="text-center">From</th>-->
<!--                                                    <th class="text-center">To</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
                                                
<!--                                                    <tr id="no-docs-12" data-ng-hide="(x.docs.length!=0)" class="ng-hide">-->
<!--                                                        <td colspan="7">-->
<!--                                                            <div class="alert alert-msg alert-info alert-dismissible">-->
<!--                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">-->
<!--                                                                    <i class="fa fa-times"></i>-->
<!--                                                                </button>No docs found.</div>-->
<!--                                                        </td>-->
<!--                                                    </tr>-->
                                                
<!--                                                    <tr id="div-documents-12" class="ng-hide"></tr><tr id="documents-form-14" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-13-type_of_document_issued" name="form-13-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12" selected="selected">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-13-from_serial_number_of_invoice" id="id_form-13-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-13-to_serial_number_of_invoice" id="id_form-13-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-13-total_number_of_invoice" id="id_form-13-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-13-cancelled_number_of_invoice" id="id_form-13-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-13-net_number_of_invoice" id="id_form-13-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-13-id" name="form-13-id" type="hidden">-->
<!--</tr>-->
<!--<tr id="documents-form-13" class="document-form-row">-->
<!--    <td class="text-center serial-number">1</td>-->
<!--    <td class="ng-hide">-->
<!--        <select id="id_form-12-type_of_document_issued" name="form-12-type_of_document_issued">-->
<!--            <option value="1">1. Invoices for outward supply</option>-->
<!--            <option value="2">2. Invoices for inward supply from unregistered person</option>-->
<!--            <option value="3">3. Revised Invoice</option>-->
<!--            <option value="4">4. Debit Note</option>-->
<!--            <option value="5">5. Credit Note</option>-->
<!--            <option value="6">6. Receipt voucher</option>-->
<!--            <option value="7">7. Payment Voucher</option>-->
<!--            <option value="8">8. Refund voucher</option>-->
<!--            <option value="9">9. Delivery Challan for job work</option>-->
<!--            <option value="10">10. Delivery Challan for supply on approval</option>-->
<!--            <option value="11">11. Delivery Challan in case of liquid gas</option>-->
<!--            <option value="12" selected="selected">12. Delivery Challan in cases other than by way of supply (excluding at S no. 9 to 11)</option>-->
<!--        </select>-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-12-from_serial_number_of_invoice" id="id_form-12-from_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="from" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" maxlength="16" required="" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-12-to_serial_number_of_invoice" id="id_form-12-to_serial_number_of_invoice" class="form-control newinv formedit ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" title="to" maxlength="16" required="" data-ng-pattern="/^[a-zA-Z0-9\/\-]*$/" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-12-total_number_of_invoice" id="id_form-12-total_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="totnum" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-12-cancelled_number_of_invoice" id="id_form-12-cancelled_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" title="cancel" required="" maxlength="10" value="">-->
<!--    </td>-->
<!--    <td class="text-center">-->
<!--        <input name="form-12-net_number_of_invoice" id="id_form-12-net_number_of_invoice" class="form-control newinv formedit number ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" title="net_issue" required="" disabled="" value="">-->
<!--    </td>-->
<!--    <td class="text-center newinv">-->
<!--        <button type="button" tabindex="0" href="javascript:void(0);" class="btn btn-sm btn-danger" data-conf-click="delDoc($index,x)" title="Delete">-->
<!--            <i class="fa fa-trash"></i><span class="sr-only">text</span></button>-->
<!--    </td>-->
<!--    <input id="id_form-12-id" name="form-12-id" type="hidden">-->
<!--</tr>-->

<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-sm-12 text-right">-->
<!--                                                <button type="button" class="btn btn-primary add-document-button" id="add-document-12" data-ng-click="addDetails(x)" data-type_of_document_issued="12">Add Document</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <hr>-->
<!--                                    </div>-->
                               <span class="err ng-hide">Please fill all the mandatory fields</span>
                                <span class="err ng-hide">Please enter authorised characters only.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 text-right next-tab-nav">
                            <button onclick="location.href='returngstr1online.php'" type="button" class="btn btn-default" data-ng-click="page('auth/gstr1/')">Back</button>
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
// 1. Invoices for outward supply
$(document).ready(function () {
    let rowCount = 0;

    $('#add-document-1').click(function () {
        rowCount++;

        let newRow = `<tr class="document-form-row">
            <td class="text-center serial-number">` + rowCount + `</td>
            <td class="text-center">
                 <input type="hidden" name="is_table[]" value="1">
                <input name="from_serial_number[]" class="form-control" maxlength="16" required>
            </td>
            <td class="text-center">
                <input name="to_serial_number[]" class="form-control" maxlength="16" required>
            </td>
            <td class="text-center">
                <input name="total_number[]" class="form-control" maxlength="10" required>
            </td>
            <td class="text-center">
                <input name="cancelled_number[]" class="form-control" maxlength="10" required>
            </td>
            <td class="text-center">
                <input name="net_number[]" class="form-control" disabled>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>
            </td>
        </tr>`;

        $('#invoice-table-body1').append(newRow);
    });

    // Remove row
    $('#invoice-table-body1').on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        updateSerialNumbers();
    });

    function updateSerialNumbers() {
        rowCount = 0;
        $('#invoice-table-body1 tr').each(function () {
            rowCount++;
            $(this).find('.serial-number').text(rowCount);
        });
    }
});

// 2. Invoices for inward supply from unregistered person
$(document).ready(function () {
    let rowCount = 0;

    $('#add-document-2').click(function () {
        rowCount++;

        let newRow = `<tr class="document-form-row">
        
            <td class="text-center serial-number">` + rowCount + `</td>
            <td class="text-center">
                 <input type="hidden" name="is_table[]" value="2">
                <input name="from_serial_number[]" class="form-control" maxlength="16" required>
            </td>
            <td class="text-center">
                <input name="to_serial_number[]" class="form-control" maxlength="16" required>
            </td>
            <td class="text-center">
                <input name="total_number[]" class="form-control" maxlength="10" required>
            </td>
            <td class="text-center">
                <input name="cancelled_number[]" class="form-control" maxlength="10" required>
            </td>
            <td class="text-center">
                <input name="net_number[]" class="form-control" disabled>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>
            </td>
        </tr>`;

        $('#invoice-table-body2').append(newRow);
    });

    // Remove row
    $('#invoice-table-body2').on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        updateSerialNumbers();
    });

    function updateSerialNumbers() {
        rowCount = 0;
        $('#invoice-table-body2 tr').each(function () {
            rowCount++;
            $(this).find('.serial-number').text(rowCount);
        });
    }
});

function updateNetNumber(row) {
        const total = parseInt(row.find('.total_number').val()) || 0;
        const cancelled = parseInt(row.find('.cancelled_number').val()) || 0;
        const net = total - cancelled;
        row.find('.net_number').val(net);
    }

  
    $(document).on('input', '.total_number, .cancelled_number', function () {
        const row = $(this).closest('tr');
        updateNetNumber(row);
    });

   
    $('tr').each(function () {
        updateNetNumber($(this));
    });

    function updateNetNumber2(row) {
        let total = parseInt(row.find('.total_number2').val()) || 0;
        let cancelled = parseInt(row.find('.cancelled_number2').val()) || 0;
        let net = total - cancelled;
        row.find('.net_number2').val(net);
    }

    
    $(document).on('input', '.total_number2, .cancelled_number2', function () {
        let row = $(this).closest('tr');
        updateNetNumber2(row);
    });

    
    $('tr').each(function () {
        updateNetNumber2($(this));
    });

</script>


    


