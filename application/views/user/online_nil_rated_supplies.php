
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
                            <span ng-switch-when="true">NIL RATED</span>
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
        <div class="container">
            <alert-message ng-show="showMsg" title="" type="msg alert-" message="" class="ng-hide">
                <div class="alert alert-msg alert-"><a class="close" data-dismiss="alert" aria-label="close">×</a><strong></strong> .</div>
            </alert-message>
           <?php echo form_open_multipart('home/save_online_nil_rated_supplies', array('id' => 'tax_frm','class'=>'form-horizontal adminex-form' ,'enctype'=>'multipart/form-data')); ?>
                <div class="row invsumm">
                    <div class="col-xs-12 col-sm-8">
                        <h4>8A, 8B, 8C, 8D - Nil Rated Supplies</h4>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h4><button class="btn btn-primary btn-circle btn-sm pull-right" data-toggle="tooltip" title="Refresh" data-ng-click="refresh()" style="
    margin-top: 0px;"><i class="fa fa-refresh" aria-hidden="true"></i></button></h4>
                    </div>
                </div>
                <div class="tabpane">
                    <h4>Item Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table inv exp tbl table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Nil Rated Supplies (₹)</th>
                                            <th class="text-center">Exempted(Other than Nil rated/non-GST supply) (₹)</th>
                                            <th class="text-center">Non-GST Supplies (₹)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                     
                              <?php if (!empty($result)) : ?>
                                <?php foreach ($result as $index => $row) : ?>
                                  <tr>
                                    <td>
                                      <?= $row->description ?>
                                      <input type="hidden" name="description[]" value="<?= $row->description ?>">
                                    </td>
                                    <td class="currency">
                                      <input type="number" name="nil_rated_supplies[]" value="<?= $row->nil_rated_supplies ?>" step="0.01" required>
                                    </td>
                                    <td class="currency">
                                      <input type="number" name="exempted[]" value="<?= $row->exempted ?>" step="0.01" required>
                                    </td>
                                    <td class="currency">
                                      <input type="number" name="non_gst_supplies[]" value="<?= $row->non_gst_supplies ?>" step="0.01" required>
                                    </td>
                                  </tr>
                                <?php endforeach; ?>
                              <?php else : ?>
                                <!-- Show default static rows if no data in DB -->
                                <tr>
                                  <td>Intra-state supplies to registered person
                                    <input type="hidden" name="description[]" value="Intra-state supplies to registered person">
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="nil_rated_supplies[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="exempted[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="non_gst_supplies[]" step="0.01" required>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Intra-state supplies to unregistered person
                                    <input type="hidden" name="description[]" value="Intra-state supplies to unregistered person">
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="nil_rated_supplies[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="exempted[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="non_gst_supplies[]" step="0.01" required>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Inter-state supplies to registered person
                                    <input type="hidden" name="description[]" value="Inter-state supplies to registered person">
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="nil_rated_supplies[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="exempted[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="non_gst_supplies[]" step="0.01" required>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Inter-state supplies to unregistered person
                                    <input type="hidden" name="description[]" value="Inter-state supplies to unregistered person">
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="nil_rated_supplies[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="exempted[]" step="0.01" required>
                                  </td>
                                  <td class="currency">
                                    <input type="number" name="non_gst_supplies[]" step="0.01" required>
                                  </td>
                                </tr>
                              <?php endif; ?>


                               </tbody>

                                   
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar">
                        
                        <input type="hidden" id="id" name="id" value="<?php echo @$result->id ;?>" />
                        <button type="submit" class="btn btn-primary pull-right accpt">Save</button>
                        <button onclick="location.href='returngstr1online'" type="button" class="btn btn-default pull-right">Back</button>
                    </div>
                </div>
              <?php  echo form_close(); ?>
        </div>
    </div>
</div>

        </div>
    </div>
</div>






