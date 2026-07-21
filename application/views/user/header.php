<!DOCTYPE html><html lang="en"><head>

<title>GST Education</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
         
        <!-- Mobile menu toggle button -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Center-aligned logo -->
            <!--<a class="navbar-brand" href="/">-->
            <!--    <img alt="Brand" src="images/logo.png" class="img-responsive center-block" width="200" height="74">-->
            <!--</a>-->
            
        </div>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                
                <!--<li style="padding: 10px 5px;">-->
                <!--    <a href="/upgrade/#pricing" class="btn btn-success" style="padding: 8px 20px;-->
                <!--               border-radius: 4px;-->
                <!--               border:none;-->
                <!--               color:#fafafa;-->
                <!--               font-weight:600;-->
                <!--               background-color: #df153a;-->
                <!--               transition: background-color 0.3s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#a12d43'; this.style.transform='scale(1.10)'; this.style.borderBottom='none'" onmouseout="this.style.backgroundColor='#c43651'; this.style.transform='scale(1)'; this.style.borderBottom=''">-->
                <!--        🚀 Get Premium Access Now!</a>-->
                <!--</li>-->
                
                    <?php if (empty($login_user_info)) { ?>
        <li style="padding: 10px 5px;">                
            <a href="<?php echo base_url('admin/login'); ?>">Admin Login / Register</a>
        </li>
    <?php } else { ?>
        

<li style="padding: 10px 5px;">                
                    
                    <div class="dropdown " style="display: inline-block;margin-left: 10px;margin-top: 10px;color: #333;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" style="color: #333;text-decoration: none;">
                            <?php echo $login_user_info->name;?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" style="background-color: #e1e1eb;border-radius: 4px;min-width: 200px;color: #333;">
                            <!-- <li>
                                <a href="/contact/" style="padding: 10px 20px; display: block; text-decoration: none;">Get Help</a>
                            </li> -->
                            
                            <li role="separator" class="divider" style="margin: 0;"></li>
                            <li>
                                <!-- <a href="logout" style="padding: 10px 20px; display: block; text-decoration: none;">Logout</a> -->
                                <a href="<?php echo base_url('home/logout'); ?>" style="padding: 10px 20px; display: block; text-decoration: none;">Logout</a>

                            </li>
                        </ul>
                    </div>

                    
                </li>

    <?php } ?>

            </ul>
        </div>
    </div>
</nav>
    <nav class="bottom-navbar">
    <div class="container-fluid red-box">
        <p>This is a simulation. Please use this website for Educational purposes only. This is not affiliated with, endorsed by, or authorized by gst.demo.in or the Government of India</p>
    </div>
</nav>
    <div class="gst-demo-navbar">
    <header class="main-header">
        <div class="skip">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="skip list-inline">
                            <li><a tabindex="-1" class="accessible" href="">Skip to Main Content</a></li>
                            <li class="high-low"><i class="fa fa-adjust"></i></li>
                            <li class="fresize f-up">A<sup>+</sup></li>
                            <li class="fresize f-down">A<sup>-</sup></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row branding">
                <div class="col-xs-12">
                    <a href="" title="Goods and Services Tax Home">                        
                        <img class="gst-logo" src="<?php echo base_url();?>assets/images/emblem_of_India_white.svg" alt="Goods and Services Tax Home" style="vertical-align:middle; position:relative;margin-top:-10px;margin-left: 13px;width: 62px;height: 72px;">
                    </a>
                    <h1 class="site-title"><a href="">Goods and Services Tax<br><span class="subtitle">Government of India, States and Union Territories</span></a></h1>
                    <ul class="list-inline mlinks">
                        <li style="font-size:11px">
                            <a target="_self" href="<?php echo base_url('home/register'); ?>" class="button"> Register</a>
                        </li>
                        <li>
                            <a target="_self" href="<?php echo base_url('home/login'); ?>" class="button"> Login</a>
                        </li>
                    </ul>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!---->
    <nav class="navbar navbar-default collapsed" style="top: auto;min-height: 0;">
        <div class="container">
            <div id="main" class="navbar-collapse collapse" aria-expanded="false">
                <ul class="nav navbar-nav" link="" style="float:left">
                    <li class="menuList active">
                        
                            <a target="_self" href="<?php echo base_url('home/dashboardNew'); ?>" class="nav_home" style="color: #fff;font-weight: 700;">Home</a>
                        
                       
                    </li>
                    <li class="dropdown">
                        <a style="color:#fff;font-weight:400;" class="dropdown-toggle" 
                        data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="">Services <span class="caret"></span></a>
                        <ul class="dropdown-menu smenu custom_dropdown" role="menu">
                            <li class="has-sub">
                                <!-- <a target="_self" href="" >Registration</a> -->
                                <a target="_self" href="">Registration</a>
                                <ul class="isubmenu serv">
                                    <li>
                                        <a target="_self" href="<?php echo base_url('home/new_registration'); ?>">New Registration</a>
                                    </li>
                                    <li data-ng-hide="udata.utype=='TR'">
                                        <a target="_self" href="">Application for Filing Clarifications</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Core Fields</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Amendment of Registration Core Fields</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Core Fields</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Non - Core Fields</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Amendment of Registration Non - Core Fields</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Non - Core Fields</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Non - Core Fields</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Non - Core Fields</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Amendment of Registration Core Fields</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Application to Opt for composition Levy</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Application for Withdrawal from Composition Levy</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="<?php echo base_url('home/track_application_status'); ?>">Track Application Status</a>
                                        <!--<a target="_self" href="" >Track Application Status</a>-->
                                        <!--<a target="_self" href="">Track Application Status</a>-->
                                    </li>
                                    <li >
                                        <a href="" target="_self">Stock intimation for opting Composition Levy</a>
                                    </li>
                                    <li >
                                        <a href="" target="_self">Application for Cancellation of Registration</a>
                                    </li>
                                    <li class="">
                                        <a href="" target="_self">Application for Cancellation of Registration</a>
                                    </li>
                                    <li class="">
                                        <a href="" target="_self">Application for Extension of Registration period by Casual/Non Resident Taxable Person</a>
                                    </li>
                                    <li class="ng-hide"><a target="_self" href="">Application for Revocation of Cancelled Registration</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="">Ledgers</a>
                                <ul class="isubmenu leg post">
                                    <li>
                                        <a target="_self"  href="<?php echo base_url('home/ledger_cashledger'); ?>">Electronic Cash Ledger</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="<?php echo base_url('home/ledger_creditledger'); ?>" >Electronic Credit Ledger</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="<?php echo base_url('home/ledger_liabilityledger'); ?>">Electronic Liability Ledger</a>
                                    </li>
                                    <li data-ng-hide="udata.utype == 'UN' || udata.utype == 'TC'">
                                        <a target="_self" href="">Payment towards Demand</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-sub ng-hide">
                                <a target="_self" href="">Ledgers</a>
                                <ul class="isubmenu leg post">
                                    <li>
                                        <a target="_self" href="cash-ledger">Electronic Cash Ledger</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="quicklinks">Returns</a>
                                <ul class="isubmenu ret post">
                                    <li>
                                        <a target="_self" href="<?php echo base_url('home/returnDashbord'); ?>">Returns Dashboard</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">View e-Filed Returns</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">Track Return Status</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">Transition Forms</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">ITC Forms</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="annual">Annual Return</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">TDS and TCS credit received </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="" class="ng-hide">Payments</a>
                                <a target="_self" href="" class="ng-hide">Payments</a>
                                <a target="_self" href="">Payments</a>
                                <ul class="isubmenu pay post">
                                    <li>
                                        <a target="_self"  href="<?php echo base_url('home/gst_challan'); ?>"class="">Create Challan</a>
                                       
                                    </li>
                                    <li>
                                        
                                        <a target="_self" href="<?php echo base_url('home/challan_saved'); ?>">Saved Challans</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="<?php echo base_url('home/challan_history'); ?>">Challan History</a>
                                        <a target="_self" href="" class="ng-hide">Track Payment Status</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Application for Deferred Payment/Payment in Instalments</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Instalment Calendar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="" class="ng-hide">User Services</a>
                                <a target="_self" href="">User Services</a>
                                <ul class="isubmenu oth">
                                    <li class="">
                                        <a target="_self" href="my_saved_application">My Saved Applications</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">My Applications</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">View/Download Certificates</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">View Notices and Orders</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">View My Submissions</a>
                                    </li>
                                    <li class="ng-hide">
                                        <a target="_self" href="">Register / Update DSC</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Contacts</a>
                                    </li>
                                    <li ng-hide="udata && (udata.role == 'login' || udata.role == 'panLogin' || udata.utype=='UN' || udata.utype=='O')" class="ng-hide">
                                        <a target="_self" href="contact.php">Contacts</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Holiday List</a>
                                    </li>
                                    <li ng-hide="udata && (udata.role == 'login' || udata.role == 'panLogin')" class="ng-hide">
                                        <a target="_self" href="">Holiday List</a>
                                    </li>
                                    <li ng-hide="udata && (udata.role == 'login' || udata.role == 'panLogin')" class="ng-hide">
                                        <a target="_self" href="">Search Office Addresses</a>
                                    </li>
                                    <li ng-show="udata && (udata.role == 'login' || udata.role == 'panLogin' || udata.utype=='UN' ||udata.utype=='O')" class="">
                                        <a target="_self" href="">Feedback</a>
                                    </li>
                                    <li ng-show="udata && (udata.role == 'login' || udata.role == 'panLogin' || udata.utype=='UN' ||udata.utype=='O')" class="">
                                        <a target="_self" href="">Grievance / Complaints</a>
                                    </li>
                                    <li data-ng-hide="udata && (udata.role == 'login' || udata.role == 'panLogin' || udata.utype== 'TPCAEX'|| udata.utype== 'NREX')" class="ng-hide">
                                        <!-- <li data-ng-hide="udata.utype=='TR'">-->
                                        <a target="_self" href="">Generate User Id for Advance Ruling</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Furnish Letter of Undertaking (LUT)</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">View My Submitted LUTs</a>
                                    </li>
                                    <li ng-hide="udata && udata.role == 'login'" class="ng-hide">
                                        <a target="_self" href="">Locate GST Practitioner (GSTP)</a>
                                    </li>
                                    <li ng-show="udata && (udata.role == 'login' ||udata.utype=='O')" class="">
                                        <a target="_self" href="">Locate GST Practitioner (GSTP)</a>
                                    </li>
                                    <li ng-show="udata && (udata.role == 'login' || udata.role == 'panLogin') && (udata.utype== 'TP' || udata.utype=='NR'||udata.utype== 'TD'||udata.utype== 'TS'||udata.utype== 'O' || udata.utype== 'TPCAEX'||udata.utype== 'NREX') && udata.utype!='UN'" class="">
                                        <a target="_self" href="">Engage / Disengage GST Practitioner (GSTP)</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">ITC02-Pending for action</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">View Additional Notices/Orders</a>
                                    </li>
                                    <li class="">
                                        <a target="_self" href="">Cause List</a>
                                    </li>
                                    <li ng-hide="udata && (udata.role == 'login' || udata.role == 'panLogin')" class="ng-hide">
                                        <a target="_self" href="">Cause List</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-sub" data-ng-show="udata && udata.role == 'login'">
                                <a>Refunds</a>
                                <ul class="isubmenu ref post" data-ng-class="{'ref': !udata,'ref post': udata && udata.role == 'login'}">
                                    <li class="has-sub">
                                        <a target="_self" href="">Application for Refund</a>
                                    </li>
                                     <li class="has-sub">
                                        <a target="_self" href="">Refund pre-application form</a>
                                    </li>
                                    <li class="has-sub">
                                        <a target="_self" href="">My Saved/Filed Applications</a>
                                    </li>
                                    <li class="has-sub">
                                        <a target="_self" href="" class="">Track Application Status</a>
                                        <a target="_self" href="track_application_status" class="ng-hide">Track Application Status</a>
                                    </li>
                                    <li class="has-sub">
                                        <a target="_self" href="">Track status of invoice data to be shared with ICEGATE</a>
                                    </li>
                                       
                                         <li class="has-sub">
                                        <a target="_self" href="">Intimation on account of Refund not received</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a target="_self" style="color:#fff;font-weight:400;">GST Law</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="" style="color:#fff;font-weight:400;">
                                        Downloads <span class="caret"></span>
                                        </a>
                        <ul class="dropdown-menu smenu down pre" role="menu">
                            <li class="has-sub">
                                <a target="_self">Offline Tools</a>
                                <ul class="isubmenu down">
                                    <li>
                                        <a target="_self" href="">Returns Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">Tran-1 Offline Tools</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">Tran-2 Offline Tools</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR3B Offline Utility</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">ITC01 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">ITC03 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">ITC04 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GST ARA 01 - Application for Advance Ruling</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR 4 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR 6 Offline Tool With Amendments</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR 11 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR7 Offline Utility</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR8 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR10 Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR-9A Offline Tool</a>
                                    </li>
                                    <li>
                                        <a target="_self" href="">GSTR-9C Offline Tool</a>
                                    </li>
                                </ul>
                            </li>
                            <!---->
                            <li class="has-sub">
                                <a target="_self">Proposed Return documents</a>
                                <ul class="isubmenu down" style="margin-left: -8.7em">
                                    <li>
                                        <a target="_self">New GST Return - Normal</a>
                                    </li>
                                    <li>
                                        <a target="_self">New GST Return - Sahaj</a>
                                    </li>
                                    <li>
                                        <a target="_self">New GST Return - Sugam</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown drpdwn">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="" style="color:#fff;font-weight:400;">Search Taxpayer <span class="caret"></span></a>
                        <ul class="dropdown-menu smenu searchtxp post ng-hide" role="menu">
                            <li class="has-sub">
                                <a target="_self" href="">Search by GSTIN/UIN</a>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="">Search by PAN</a>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="">Search Composition Taxpayer</a>
                            </li>
                        </ul>
                        <ul class="dropdown-menu smenu searchtxp" role="menu" ng-hide="udata && udata.role == 'login'">
                            <li class="has-sub">
                                <a target="_self" href="">Search by GSTIN/UIN</a>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="">Search by PAN</a>
                            </li>
                            <li class="has-sub">
                                <a target="_self" href="">Search Composition Taxpayer</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown drpdwn">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="" style="color:#fff;font-weight:400;">Help and Taxpayer Facilities <span class="caret"></span></a>
                        <ul class="dropdown-menu smenu helpmenu" role="menu">
                            <li class="has-sub">
                                <a target="_blank" href="">System Requirements</a>
                            </li>
                            <li class="has-sub">
                                <a target="_blank" href="">User Manuals, Videos and FAQs</a>
                            </li>
                            <li class="has-sub">
                                <a target="_blank" href="">Documents Required for Registration</a>
                            </li>
                            <li class="has-sub">
                                <a data-popup="true" target="_self" href="">GST Media</a>
                            </li>
                            <li class="has-sub ng-hide"><a target="_self" href="">Site Map</a></li>
                            <li class="has-sub"><a target="_self" href="">Site Map</a></li>
                        </ul>
                    </li>
                    <li>
                        <a style="color:#fff;font-weight:400;" target="_self" href="ewaybill.html">e-Invoice </a>
                    </li>
                    <li class="mnav"><a target="_self" href="">Login</a></li>
                    <li class="mnav"><a target="_self" href="">MyProfile</a></li>
                    <li class="mnav"><a target="_self" href="">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

</body>
</html>