<!DOCTYPE html>
<html lang="en">
<?php  
    $this->load->view('user/top_header');
    
    // Load 'header' only if not login or register
    if ($page_name !== 'login' && $page_name !== 'register' && $page_name !== 'forgot_password' && $page_name !== 'reset_password' && $page_name !== 'approval_required' &&  $page_name !== 'create_admin'
    && $page_name !== 'user_list_report' &&  $page_name !== 'admin_list_report'&&  $page_name !== 'user_approval_list'&&  $page_name !== 'user_unapprove_list' && $page_name !== 'IP_list' && $page_name !== 'view_user_access_details' && $page_name !== 'view_admin_access_details' && $page_name !== 'user_passwords') {
        $this->load->view('user/header');
    }
     if ( $page_name == 'user_list_report' || $page_name == 'admin_list_report' || $page_name == 'user_approval_list' || $page_name == 'user_unapprove_list' || $page_name == 'IP_list' ||  $page_name == 'view_user_access_details'|| $page_name == 'view_admin_access_details' || $page_name == 'user_passwords') {
        $this->load->view('admin/header');
    }
    
?>
<body>
    <?php 
       

        $this->load->view($folder.'/'.$page_name); 
        $this->load->view('user/footer');
        // $this->load->view('user/load_js');
    ?> 
</body>
</html>
