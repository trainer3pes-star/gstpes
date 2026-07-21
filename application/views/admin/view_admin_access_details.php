
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
                    <li><a target="" href="">Admin</a></li>
                    <li>
                        <ng-switch on="$last">
                            <span ng-switch-default=""><a href="" target="_self">Admin Access Details</a></span>
                        </ng-switch>
                    </li>
                    
                </ol>
            </div>
        </div>
       
    </div>

    <div data-ng-controller="mainctrl" ng-view="">
        <div class="container">
            <div class="row">
                <div class="col-md-3"> <p><strong>Name:</strong> <?php echo @$results['name']; ?></p></div>
                <div class="col-md-3"> <p><strong>Email:</strong> <?php echo @$results['email']; ?></p></div>
            </div>   
        

            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4>User Access Details</h4>
                </div>
                
            </div>
            <div class="tabpane">
              
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive text-center">
                            
                            <table id="example_php" class="table table-bordered table-striped  col-xs-12" >
								<thead>
									<tr>
   									<th class="text-center">Sr</th>										 
   									<th class="text-center">Login Time</th>										 
   									<th class="text-center">Logout Time</th>		
									<th class="text-center">IP</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results['logs'] as $result){ ?>
									<tr  >
							
									    <td><?php echo $i++; ?></td>
										<td>
                                        <?php echo ($result->current_login && $result->current_login != '0000-00-00 00:00:00') 
                                            ? date('d/m/Y H:i:s', strtotime($result->current_login)) 
                                            : '-'; ?>
                                        </td>
                                        <td>
                                        <?php echo ($result->last_logout && $result->last_logout != '0000-00-00 00:00:00') 
                                            ? date('d/m/Y H:i:s', strtotime($result->last_logout)) 
                                            : '-'; ?>
                                        </td>
										<td><?php echo $result->ip_address; ?></td>
									</tr>
									<?php } ?>
								</tbody>
								 
							</table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
