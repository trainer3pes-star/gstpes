 <?php 
		$controller=strtolower($this->router->fetch_class()); 
		$controller=strtolower($this->router->fetch_class()); 
		$method=strtolower($this->router->fetch_method()); 
	?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a target="_blank" href="<?php echo base_url()?>" class="brand-link" style="background-color:#fff;color:#000">
 
      <img src="<?php echo base_url().SITE_LOGO;?>"
           alt="<?php echo SITE_NAME;?>"
           class="brand-image   elevation-3"  style="opacity: .8">
      <span class="brand-text font-weight-dark"><?php echo SITE_NAME;?></span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>uploads/users/thumb/<?php echo $login_user_info->profile_photo;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a data-toggle="modal" data-target="#modal-sm"  href="javascript:void(0);"  class="d-block"><?php echo ucfirst($login_user_info->name); ?>  </a>
		  
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			<?php if($this->Home_model->check_permission('index')){?>
         <li class="nav-item">
            <a href="Home" class="nav-link <?php if((strtolower($controller)=='home')&&($method=='index')){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <?php echo $this->lang->line('menu_dashboard');?>
              </p>
            </a>
          </li>
			<?php }?>
		 <?php if(($this->Home_model->check_permission('company_list'))||($this->Home_model->check_permission('save_company'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='home')&&(($method=='banner_list')||($method=='create_banner'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='home')&&(($method=='banner_list')||($method=='create_banner'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-image "></i>
              <p>
                Banner Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<?php  ?>
			<?php  
			if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){ if($this->Home_model->check_permission('save_banner')){?>
			 <li class="nav-item">
                <a href="Home/create-banner" class="nav-link <?php if((strtolower($controller)=='home')&&(($method=='create_banner'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Banner </p>
                </a>
              </li> 
			<?php } }?>
			<?php if($this->Home_model->check_permission('banner_list')){ ?>
			<li class="nav-item">
                <a href="Home/banner-list" class="nav-link <?php if((strtolower($controller)=='home')&&(($method=='banner_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Banners </p>
                </a>
              </li> 
            <?php } ?>   
			</ul>
          </li>
		   <?php }?>

		  <?php if(($this->Home_model->check_permission('user_role_list'))||($this->Home_model->check_permission('save_user_role'))||($this->Home_model->check_permission('bank_list'))||($this->Home_model->check_permission('save_bank'))||($this->Home_model->check_permission('designation_list'))||($this->Home_model->check_permission('save_designation'))||($this->Home_model->check_permission('fee_type_list'))||($this->Home_model->check_permission('save_fee_type'))||($this->Home_model->check_permission('product_module_list'))||($this->Home_model->check_permission('save_product_module'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='master')&&(($method=='bank_list')||($method=='user_role_list')||($method=='designation_list')||($method=='fee_type_list')||($method=='product_module_list'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='master')&&(($method=='bank_list') ||($method=='user_role_list')||($method=='designation_list')||($method=='fee_type_list')||($method=='product_module_list'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			  <?php if(($this->Home_model->check_permission('user_role_list'))||($this->Home_model->check_permission('save_user_role'))){?>
			  <li class="nav-item">
                <a href="master/user-role-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='user_role_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of User Roles </p>
                </a>
              </li>
			  <?php } ?>
			   <?php if(($this->Home_model->check_permission('bank_list'))||($this->Home_model->check_permission('save_bank'))){?>
			  <li class="nav-item">
                <a href="master/bank-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='bank_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Bank </p>
                </a>
              </li> 
			   <?php } ?>
			  <li class="nav-item">
                <a href="master/designation-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='designation_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Designation </p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="master/fee-type-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='fee_type_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Fee Type </p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="master/product-module-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='product_module_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Product Module </p>
                </a>
              </li>
              
			</ul>
          </li>
		  <?php } ?>
		    
		    		   <?php if(($this->Home_model->check_permission('1','PAdd'))||($this->Home_model->check_permission('1','PEdit'))||($this->Home_model->check_permission('1','PDelete'))||($this->Home_model->check_permission('1','PList'))||($this->Home_model->check_permission('1','PExport'))||($this->Home_model->check_permission('1','PImport'))||($this->Home_model->check_permission('1','PReadonly'))||($this->Home_model->check_permission('1','Pcontact'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='user')&&(($method=='admin_user_list')||($method=='create_admin_user')||($method=='site_user_list')||($method=='user_detail')||($method=='user_company_history')||($method=='user_company'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='admin_user_list')||($method=='create_admin_user')||($method=='site_user_list'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<?php if($this->Home_model->check_permission('1','PAdd')){ ?>
			 <li class="nav-item">
                <a href="User/create-admin-user" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='create_admin_user'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Admin User </p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('1','PList')){ ?>
			<li class="nav-item">
                <a href="User/admin-user-list" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='admin_user_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Admin Users </p>
                </a>
              </li> 
            <?php } ?> 
			<?php if($this->Home_model->check_permission('1','PList')){ ?>
			<li class="nav-item">
                <a href="User/site-user-list" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='site_user_list')||($method=='user_detail')||($method=='user_company_history')||($method=='user_company'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Site Users </p>
                </a>
              </li> 
            <?php } ?> 
			</ul>
          </li>
		   <?php } ?> 
		    <?php if(($this->Home_model->check_permission('company_list'))||($this->Home_model->check_permission('save_company'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='user')&&(($method=='company_list')||($method=='create_company'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='company_list')||($method=='create_company'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-industry "></i>
              <p>
                Company Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<?php  ?>
			<?php  
			if(($login_user_info->role_id > '1')&&($login_user_info->role_id < '6')){ if($this->Home_model->check_permission('save_company')){?>
			 <li class="nav-item">
                <a href="User/create-company" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='create_company'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Company </p>
                </a>
              </li> 
			<?php } }?>
			<?php if($this->Home_model->check_permission('company_list')){ ?>
			<li class="nav-item">
                <a href="User/company-list" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='company_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of companies </p>
                </a>
              </li> 
            <?php } ?>   
			</ul>
          </li>
		   <?php } 
		   if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){  
		   
		   ?> 
		<?php if(($this->Home_model->check_permission('save_product_category'))||($this->Home_model->check_permission('product_category_list'))||($this->Home_model->check_permission('save_product'))||($this->Home_model->check_permission('product_list'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='product')&&(($method=='product_category_list')||($method=='create_product_category') ||($method=='create_product')||($method=='product_list')||($method=='product_detail'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='product_category_list')||($method=='create_product_category') ||($method=='create_product')||($method=='product_list')||($method=='product_detail'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Product Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			
			  
			
			
			<?php if($this->Home_model->check_permission('save_product_category')){ ?>
			 <li class="nav-item">
                <a href="product/create-product-category" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='create_product_category'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product Category</p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('product_category_list')){ ?>
			   <li class="nav-item">
                <a href="product/product-category-list" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='product_category_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of  Product Category</p>
                </a>
              </li> 
            <?php } ?> 
			<?php if($this->Home_model->check_permission('save_product')){ ?>
			 <li class="nav-item">
                <a href="product/create-product" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='create_product'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product </p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('import_product')){ ?>
			 <li class="nav-item">
                <a href="product/import-product" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='import_product'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Product </p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('product_list')){ ?>
			   <li class="nav-item">
			<a href="product/product-list" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='product_list')||($method=='product_detail'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of  Product </p>
                </a>
              </li> 
            <?php } ?>  
			 
			</ul>
          </li>
		   <?php } }?> 
		   <?php 		  
		   if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){  
		   
		   ?> 
		<?php if(($this->Home_model->check_permission('save_cashback'))||($this->Home_model->check_permission('cashback_list'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='master')&&(($method=='cashback_list')||($method=='create_cashback'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php  if((strtolower($controller)=='master')&&(($method=='cashback_list')||($method=='create_cashback'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Cashback Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			
			  
			
			
			<?php if($this->Home_model->check_permission('save_cashback')){ ?>
			 <li class="nav-item">
                <a href="master/create-cashback" class="nav-link <?php if((strtolower($controller)=='master')&&(($method=='create_cashback'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Cashback</p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('cashback_list')){ ?>
			   <li class="nav-item">
                <a href="master/cashback-list" class="nav-link <?php if((strtolower($controller)=='master')&&(($method=='cashback_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of  Cashback</p>
                </a>
              </li> 
            <?php } ?>  
			 
			</ul>
          </li>
		   <?php } }?> 
		 <?php 		  
		   if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){   ?>
<?php if(($this->Home_model->check_permission('save_coupon'))||($this->Home_model->check_permission('coupon_list'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='master')&&(($method=='coupon_list')||($method=='create_coupon'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php  if((strtolower($controller)=='master')&&(($method=='coupon_list')||($method=='create_coupon'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Coupon Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			
			  
			
			
			<?php if($this->Home_model->check_permission('save_coupon')){ ?>
			 <li class="nav-item">
                <a href="master/create-coupon" class="nav-link <?php if((strtolower($controller)=='master')&&(($method=='create_coupon'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Coupon</p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('coupon_list')){ ?>
			   <li class="nav-item">
                <a href="master/coupon-list" class="nav-link <?php if((strtolower($controller)=='master')&&(($method=='coupon_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of  Coupon</p>
                </a>
              </li> 
            <?php } ?>  
			 
			</ul>
          </li>
		   <?php } }?> 
				   
		   <?php 
if(($login_user_info->role_id > '1')&&($login_user_info->role_id < '6')){  
if(($this->Home_model->check_permission('mark_as_my_product'))||($this->Home_model->check_permission('mark_as_my_product_save'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='product')&&(($method=='mark_as_my_product')||($method=='my_product_list')||($method=='product_detail'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='product')&&( ($method=='mark_as_my_product')||($method=='my_product_list')||($method=='product_detail'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                My Product Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			
			<?php if($this->Home_model->check_permission('save_product')){ ?>
			 <li class="nav-item">
                <a href="product/create-product" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='create_product'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product </p>
                </a>
              </li> 
			<?php } ?>  
			 
			<?php if($this->Home_model->check_permission('mark_as_my_product')){ ?>
			   <li class="nav-item">
                <a href="product/mark-as-my-product" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='mark_as_my_product'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mark as My product </p>
                </a>
              </li> 
            <?php } ?>
			
			<?php if($this->Home_model->check_permission('my_product_list')){ ?>
			   <li class="nav-item">
                <a href="product/my-product-list" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='my_product_list')||($method=='product_detail'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> My products List </p>
                </a>
              </li> 
            <?php } ?>
			</ul>
          </li>
		   <?php }
		   ?>
	<?php if(($this->Home_model->check_permission('seller_rejected_order_list'))||($this->Home_model->check_permission('seller_pending_order_list'))||($this->Home_model->check_permission('seller_approved_order_list'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='order')&&(($method=='seller_pending_order_list')||($method=='seller_approved_order_list')||($method=='seller_rejected_order_list'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_pending_order_list')||($method=='seller_approved_order_list')||($method=='seller_rejected_order_list'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Order Management 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
			
			<?php if($this->Home_model->check_permission('seller_pending_order_list')){ ?>
			 <li class="nav-item" >
                <a href="order/seller-pending-order-list" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_pending_order_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Pending Orders</p>
                </a>
              </li> 
			<?php } ?>
			 
			<?php if($this->Home_model->check_permission('seller_approved_order_list')){ ?>
			 <li class="nav-item">
                <a href="order/seller-approved-order-list" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_approved_order_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  Approved Orders</p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('seller_rejected_order_list')){ ?>
			 <li class="nav-item">
                <a href="order/seller-rejected-order-list" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_rejected_order_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  Rejected Orders</p>
                </a>
              </li> 
			<?php } ?> 
		  
			</ul>
          </li>
		   <?php } }?> 
				 
	    
		   
		   		 <?php 		  
		   if(($login_user_info->role_id == '1')||($login_user_info->role_id > '6')){   ?>
<?php if(($this->Home_model->check_permission('pending_order'))||($this->Home_model->check_permission('payment_approved_order'))||($this->Home_model->check_permission(''))||($this->Home_model->check_permission('dispatched_order'))||($this->Home_model->check_permission('delivered_order'))||($this->Home_model->check_permission('returned_order'))||($this->Home_model->check_permission('rejected_order'))||($this->Home_model->check_permission('cancelled_order'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='order')&&(($method=='pending_order')||($method=='payment_approved_order')||($method=='seller_approved_order')||($method=='seller_pending_order')||($method=='seller_rejected_order')||($method=='admin_approved_order')||($method=='dispatched_order')||($method=='delivered_order')||($method=='returned_order')||($method=='rejected_order')||($method=='cancelled_order'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='pending_order')||($method=='payment_approved_order')||($method=='seller_approved_order')||($method=='seller_pending_order')||($method=='seller_rejected_order')||($method=='admin_approved_order')||($method=='dispatched_order')||($method=='delivered_order')||($method=='returned_order')||($method=='rejected_order')||($method=='cancelled_order'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Order Management 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
			
			<?php if($this->Home_model->check_permission('pending_order')){ ?>
			 <li class="nav-item" style="display:none;">
                <a href="order/pending-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='pending_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Orders</p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('payment_approved_order')){ ?>
			 <li class="nav-item">
                <a href="order/payment-approved-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='payment_approved_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  Placed Orders</p>
                </a>
              </li> 
			<?php } ?><?php if($this->Home_model->check_permission('seller_pending_order')){ ?>
			 <li class="nav-item">
                <a href="order/seller-pending-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_pending_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seller Pending Orders</p>
                </a>
              </li> 
			  
			<?php } ?>
			<?php if($this->Home_model->check_permission('seller_approved_order')){ ?>
			 <li class="nav-item">
                <a href="order/seller-approved-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_approved_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seller Approved Orders</p>
                </a>
              </li> 
			  
			<?php } ?>
			<?php if($this->Home_model->check_permission('seller_rejected_order')){ ?>
			 <li class="nav-item">
                <a href="order/seller-rejected-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='seller_rejected_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seller Rejected Orders</p>
                </a>
              </li> 
			<?php } ?> 
			
			<?php if($this->Home_model->check_permission('dispatched_order')){ ?>
			 <li class="nav-item">
                <a href="order/dispatched-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='dispatched_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dispatched Orders</p>
                </a>
              </li> 
			<?php } ?> 
			<?php if($this->Home_model->check_permission('delivered_order')){ ?>
			 <li class="nav-item">
                <a href="order/delivered-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='delivered_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delivered Orders</p>
                </a>
              </li> 
			<?php } ?> 
			
			<?php if($this->Home_model->check_permission('returned_order')){ ?>
			 <li class="nav-item">
                <a href="order/returned-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='returned_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Returned Orders</p>
                </a>
              </li> 
			<?php } ?> 
			
			
			<?php if($this->Home_model->check_permission('cancelled_order')){ ?>
			 <li class="nav-item">
                <a href="order/cancelled-order" class="nav-link <?php if((strtolower($controller)=='order')&&(($method=='cancelled_order'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled Orders</p>
                </a>
              </li> 
			<?php } ?> 
			 
			</ul>
          </li>
		   <?php } }?> 
				 
		  <?php if($this->Home_model->check_permission('1','PList')){ ?>
			<!-- <li class="nav-item">
            <a href="Home/setting" class="nav-link <?php if((strtolower($controller)=='home')&&($method=='setting')){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-cog "></i>
              <p>
					Setting
              </p>
            </a>
          </li>  -->
		  <?php } ?>
		  <li class="nav-item">
            <a href="Home/edit-profile" class="nav-link <?php if((strtolower($controller)=='home')&&($method=='edit_profile')){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                <?php echo $this->lang->line('menu_edit_profile');?>
              </p>
            </a>
          </li> 
		 <li class="nav-item">
            <a href="Home/change-password" class="nav-link <?php if((strtolower($controller)=='home')&&($method=='change_password')){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                <?php echo $this->lang->line('menu_change_password');?>
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="Home/logout" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>
                <?php echo $this->lang->line('menu_logout');?>
              </p>
            </a>
          </li>
		  </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
