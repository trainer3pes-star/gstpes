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
         <li class="nav-item">
            <a href="Home" class="nav-link <?php if((strtolower($controller)=='home')&&($method=='index')){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <?php echo $this->lang->line('menu_dashboard');?>
              </p>
            </a>
          </li>
		  <?php if(($this->Home_model->check_permission('2','PAdd'))||($this->Home_model->check_permission('2','PEdit'))||($this->Home_model->check_permission('2','PDelete'))||($this->Home_model->check_permission('2','PList'))||($this->Home_model->check_permission('2','PExport'))||($this->Home_model->check_permission('2','PImport'))||($this->Home_model->check_permission('2','PReadonly'))||($this->Home_model->check_permission('2','Pcontact'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='master')&&(($method=='bank_list')||($method=='user_role_list')||($method=='designation_list')||($method=='fee_type_list')||($method=='product_module_list'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='master')&&(($method=='bank_list') ||($method=='user_role_list')||($method=='designation_list')||($method=='fee_type_list')||($method=='product_module_list'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			  
			  <li class="nav-item">
                <a href="master/user-role-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='user_role_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of User Roles </p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="master/bank-list" class="nav-link <?php if((strtolower($controller)=='master')&&($method=='bank_list')){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Bank </p>
                </a>
              </li> 
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
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='user')&&(($method=='user_list')||($method=='create_user')||($method=='assign_permission'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='user_list')||($method=='create_user')||($method=='assign_permission'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<?php if($this->Home_model->check_permission('1','PAdd')){ ?>
			 <li class="nav-item">
                <a href="User/create-user" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='create_user'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User </p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('1','PList')){ ?>
			<li class="nav-item">
                <a href="User/user-list" class="nav-link <?php if((strtolower($controller)=='user')&&(($method=='user_list')||($method=='assign_permission'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Users </p>
                </a>
              </li> 
            <?php } ?> 
			</ul>
          </li>
		   <?php } ?> 
		  <?php if(($this->Home_model->check_permission('1','PAdd'))||($this->Home_model->check_permission('1','PEdit'))||($this->Home_model->check_permission('1','PDelete'))||($this->Home_model->check_permission('1','PList'))||($this->Home_model->check_permission('1','PExport'))||($this->Home_model->check_permission('1','PImport'))||($this->Home_model->check_permission('1','PReadonly'))||($this->Home_model->check_permission('1','Pcontact'))){?>
		   <li    class="nav-item has-treeview <?php if((strtolower($controller)=='product')&&(($method=='product_category_list')||($method=='create_product_category') ||($method=='create_product')||($method=='product_list'))){?>  menu-open  <?php } ?> ">
            <a href="javascript:void(0);" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='product_category_list')||($method=='create_product_category') ||($method=='create_product')||($method=='product_list'))){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Product Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			
			  
			
			
			<?php if($this->Home_model->check_permission('1','PAdd')){ ?>
			 <li class="nav-item">
                <a href="product/create-product-category" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='create_product_category'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product Category</p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('1','PList')){ ?>
			   <li class="nav-item">
                <a href="product/product-category-list" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='product_category_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of  Product Category</p>
                </a>
              </li> 
            <?php } ?> 
			<?php if($this->Home_model->check_permission('1','PAdd')){ ?>
			 <li class="nav-item">
                <a href="product/create-product" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='create_product'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product </p>
                </a>
              </li> 
			<?php } ?>
			<?php if($this->Home_model->check_permission('1','PList')){ ?>
			   <li class="nav-item">
                <a href="product/product-list" class="nav-link <?php if((strtolower($controller)=='product')&&(($method=='product_list'))){?>  active  <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of  Product </p>
                </a>
              </li> 
            <?php } ?> 
			</ul>
          </li>
		   <?php } ?> 
		  
			<li class="nav-item">
            <a href="Home/setting" class="nav-link <?php if((strtolower($controller)=='home')&&($method=='setting')){?>  active  <?php } ?>">
              <i class="nav-icon fas fa-cog "></i>
              <p>
					Setting
              </p>
            </a>
          </li> 
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
