<!DOCTYPE html><html lang="en"><head>


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
            <a href="<?php echo base_url('admin/login'); ?>">Login / Register</a>
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
                               <a href="<?php echo base_url('admin/logout'); ?>" style="padding: 10px 20px; display: block; text-decoration: none;">Logout</a>
                            </li>
                        </ul>
                    </div>

                    
                </li>

    <?php } ?>

            </ul>
        </div>
    </div>
</nav>
    

    <div class="gst-demo-navbar">
    
    <!---->
    <nav class="navbar navbar-default collapsed" style="top: auto;min-height: 0;">
        <div class="container">
            <div id="main" class="navbar-collapse collapse" aria-expanded="false">
                <ul class="nav navbar-nav" link="" style="float:left">
                    <li class="menuList active">
    <a href="<?php echo base_url('admin/user_list_report'); ?>" 
       class="nav_home" 
       style="color: #fff;font-weight: 700;">
       User List
    </a>
</li>

<li class="menuList">
    <a href="<?php echo base_url('admin/user_approval_list'); ?>" 
       class="nav_home" style="color: #fff;font-weight: 700;">
       User Approval List
    </a>
</li>

<li class="menuList">
    <a href="<?php echo base_url('admin/user_unapprove_list'); ?>" 
       class="nav_home" style="color: #fff;font-weight: 700;">
       User Unapproval List
    </a>
</li>

                    <li class="menuList ">
                        
                            <a target="_self" href="ip_list" class="" style="color: #fff;font-weight: 700;">IP List</a>
                        
                    </li>
                    <?php if (($login_user_info->type==1)) { ?>
                    <li class="menuList ">
                        
                            <a target="_self" href="admin_list_report" class="" style="color: #fff;font-weight: 700;">Admin List</a>
                        
                    </li>
                      <?php } ?>
                      <?php if (($login_user_info->type==1)) { ?>
                    <li class="menuList ">
                        
                            <a target="_self" href="create_admin" class="" style="color: #fff;font-weight: 700;">Create Sub Admin</a>
                        
                    </li>
                      <?php } ?>
                    
                </ul>
            </div>
        </div>
    </nav>
</div>

</body>
</html>