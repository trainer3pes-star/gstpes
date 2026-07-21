<div class="row">
                                <div class="col-sm-3">
                                    <p class="reg">GSTIN - <?php echo $resultTaxpayer->gstno;?></p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="reg">Legal Name - <?php echo $resultTaxpayer->name;?></p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="reg">Trade Name - <?php echo $resultTaxpayer->name;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- <p class="reg">FY - 2025-26</p> -->
                                    <p class="reg">FY - XXXXX</p>
                                </div>
                                <div class="col-sm-3">
                                    <!-- <p class="reg">Tax Period - April</p> -->
                                    <p class="reg">Tax Period - XXXXX</p>
                                </div>
                                <div class="col-sm-3">
                                    <span class="reg">Status - Not Filed</span>
                                </div>
                                <div class="col-sm-3 ng-hide">
                                    <span class="reg" data-ng-bind="trans.LBL_STATUS">Status - </span><a data-ng-click="page_gstr1_summ('auth/gstr1/submit/error')">Error in submission</a>
                                </div>
                                <div class="col-sm-3">
                                    <!-- <p class="reg">Due Date - 05/04/2025</p> -->
                                    <p class="reg">Due Date - XXXXX</p>
                                </div>
                            </div>