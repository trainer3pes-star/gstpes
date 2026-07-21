
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
                            <span ng-switch-default=""><a href="" target="_self">Admin List Report</a></span>
                        </ng-switch>
                    </li>
                    
                </ol>
            </div>
        </div>
       
    </div>

    <div data-ng-controller="mainctrl" ng-view="">
        <div class="container" data-ng-init="getExportInv()">
            
            
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4>Admin List Report</h4>
                </div>
                
            </div>
            <div class="tabpane">
              
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive text-center">
                            
                            <table id="example_php" class="table table-bordered table-striped  col-xs-12" >
								<thead>
									<tr>
   									<th class="text-center">Name</th>										 
   									<th class="text-center">Email</th>										 
   									<th class="text-center">Contact</th>		
									<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){ ?>
									<tr  >
							
									    <td><?php echo $result->name; ?></td>
										<td><?php echo $result->email; ?></td> 
										<td><?php echo $result->contact; ?></td>
                                        <td><a href="view_admin_access_details/<?php echo $result->id?>">View Access Details</a></td> 
									
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
