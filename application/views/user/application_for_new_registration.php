

    
<div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <!-- <div class="form">
        
    </div> -->
    <div class="row" data-ng-controller="transctrl" data-ng-init="init('registration')">
        <div class="col-xs-10">
            <div data-breadcrumb="" data-target="_self" name="Dashboard">
                <ol class="breadcrumb" data-ng-controller="crumbCtrl">
                    <li><a target="_self" href="/" data-ng-bind="name">Dashboard</a></li>
                    <li data-ng-repeat="breadcrumb in breadcrumbs.getAll()"><ng-switch on="$last"> <span ng-switch-when="true">Application For New Registration </span> </ng-switch></li>
                </ol>
            </div>
        </div>
       
    </div>
   <div class="tabpane ng-pristine ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" name="newRegForm" id="newRegForm" data-ng-submit="verifyDetails()" data-accessible-form="" autocomplete="off" novalidate="">
            <div name="staus_msg"></div>

<div class="container mt-4">
    <div class="alert d-flex align-items-start shadow-sm" style="font-weight:bold;"role="alert">
        
        <!-- Icon -->
        <div class="me-2">
            <i class="fa fa-check-circle fa-2x text-success"></i> SUCCESS
        </div>

        <!-- Content -->
        <div>

            <p class="mb-2">Thank you for submission.</p>
            <small>
                System will verify / validate the information submitted after which 
                acknowledgement will be sent in next 15 minutes.
            </small>
        </div>

    </div>
</div><br>
<img src="<?php echo base_url('assets/images/acknowledgment.png'); ?>" alt="Submit Message" width="1100px">

        </div>
        
    </div>
    </div>
    </div>




