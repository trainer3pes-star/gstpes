<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

  function __construct()
  {
	  
    parent::__construct(); 
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie'); 
        $this->load->model('Admin_model');
        $this->load->library('session'); 
        $this->load->library('email');
        $this->data['login_user_info']=$this->Admin_model->get_login_information(); 
        
        $this->data['ip_address']=$this->Admin_model->getIPAddress(); 
		//  print_r( $this->data['login_user_info']);die();
	 
	
  }

  public function IP_list()
  {
    if (@$this->data['login_user_info']->type==1 || @$this->data['login_user_info']->type==2) {
		$this->data['page_name'] = 'IP_list';
		$this->data['folder'] = 'admin'; 
        $result_data=$this->Admin_model->get_userIp_list(); 
		$this->data['results']=$result_data;
        // print_r($this->data['results']);die();
		$this->load->view('index',@$this->data); 
     } else {
        redirect('admin/login');
    }
  } 

  public function user_list_report()
{
    if (@$this->data['login_user_info']->type==1 || @$this->data['login_user_info']->type==2) {

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/user_list_report');
        $config['total_rows'] = $this->Admin_model->count_users();
        $config['per_page'] = 40;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;

$config['full_tag_open']   = '<ul class="pagination justify-content-center">';
$config['full_tag_close']  = '</ul>';

$config['first_link']      = 'First';
$config['last_link']       = 'Last';

$config['first_tag_open']  = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_tag_open']   = '<li class="page-item">';
$config['last_tag_close']  = '</li>';

$config['next_link']       = 'Next';
$config['next_tag_open']   = '<li class="page-item">';
$config['next_tag_close']  = '</li>';

$config['prev_link']       = 'Previous';
$config['prev_tag_open']   = '<li class="page-item">';
$config['prev_tag_close']  = '</li>';

$config['cur_tag_open']    = '<li class="page-item active"><a class="page-link">';
$config['cur_tag_close']   = '</a></li>';

$config['num_tag_open']    = '<li class="page-item">';
$config['num_tag_close']   = '</li>';

$config['attributes']      = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $offset = ($page - 1) * $config['per_page'];

        $this->data['results'] = $this->Admin_model->get_user_list($config['per_page'], $offset);
        $this->data['pagination'] = $this->pagination->create_links();
        // print_r($this->data['pagination']);die();

        $this->data['page_name'] = 'user_list_report';
        $this->data['folder'] = 'admin';

        $this->load->view('index', $this->data);

    } else {
        redirect('admin/login');
    }
}
  
  public function user_approval_list()
  {
    if (@$this->data['login_user_info']->type==1 || @$this->data['login_user_info']->type==2) {
    
            $this->load->library('pagination');
    
            $config['base_url'] = base_url('admin/user_approval_list');
            $config['total_rows'] = $this->Admin_model->count_users_approval();
            $config['per_page'] = 40;
            $config['uri_segment'] = 3;
            $config['use_page_numbers'] = TRUE;
    
            $config['full_tag_open']   = '<ul class="pagination justify-content-center">';
            $config['full_tag_close']  = '</ul>';
            
            $config['first_link']      = 'First';
            $config['last_link']       = 'Last';
            
            $config['first_tag_open']  = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            
            $config['last_tag_open']   = '<li class="page-item">';
            $config['last_tag_close']  = '</li>';
            
            $config['next_link']       = 'Next';
            $config['next_tag_open']   = '<li class="page-item">';
            $config['next_tag_close']  = '</li>';
            
            $config['prev_link']       = 'Previous';
            $config['prev_tag_open']   = '<li class="page-item">';
            $config['prev_tag_close']  = '</li>';
            
            $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link">';
            $config['cur_tag_close']   = '</a></li>';
            
            $config['num_tag_open']    = '<li class="page-item">';
            $config['num_tag_close']   = '</li>';
            
            $config['attributes']      = array('class' => 'page-link');
    
            $this->pagination->initialize($config);
    
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
            $offset = ($page - 1) * $config['per_page'];
    
            $this->data['results'] = $this->Admin_model->get_user_approval_list($config['per_page'], $offset);
            $this->data['pagination'] = $this->pagination->create_links();
            // print_r($this->data['pagination']);die();
    
            $this->data['page_name'] = 'user_approval_list';
            $this->data['folder'] = 'admin';
    
            $this->load->view('index', $this->data);
    
        } else {
            redirect('admin/login');
        }
  } 
  
  public function user_unapprove_list()
  {
     if (@$this->data['login_user_info']->type==1 || @$this->data['login_user_info']->type==2) {

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/user_unapprove_list');
        $config['total_rows'] = $this->Admin_model->count_users_unapprove_list();
        $config['per_page'] = 40;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;

        $config['full_tag_open']   = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First';
        $config['last_link']       = 'Last';
        
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_tag_open']   = '<li class="page-item">';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = 'Next';
        $config['next_tag_open']   = '<li class="page-item">';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = 'Previous';
        $config['prev_tag_open']   = '<li class="page-item">';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close']   = '</a></li>';
        
        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']   = '</li>';
        
        $config['attributes']      = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $offset = ($page - 1) * $config['per_page'];

        $this->data['results'] = $this->Admin_model->get_user_unapprove_list($config['per_page'], $offset);
        $this->data['pagination'] = $this->pagination->create_links();
        // print_r($this->data['pagination']);die();

        $this->data['page_name'] = 'user_unapprove_list';
        $this->data['folder'] = 'admin';

        $this->load->view('index', $this->data);

    } else {
        redirect('admin/login');
    }
  } 
  
  public function approve_users()
{
    $this->load->database();

    $ids = $this->input->post('ids');
    $ids = explode(',', $ids);

    if (!empty($ids)) {
        $this->db->where_in('id', $ids);
        $this->db->update('gst_user', ['status' => 1]);

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}

public function unapprove_users()
{
    $this->load->database();

    $ids = $this->input->post('ids');
    $ids = explode(',', $ids);

    if (!empty($ids)) {
        $this->db->where_in('id', $ids);
        $this->db->update('gst_user', ['status' => 2]);

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}

  public function view_user_access_details()
  {

		$this->data['page_name'] = 'view_user_access_details';
		$this->data['folder'] = 'admin'; 
    if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['results']=$this->Admin_model->get_user_access_details_info($pass);
        // print_r($this->data['results']);die();
			}
		$this->load->view('index',@$this->data); 
  } 


   public function create_admin()
  {

		$this->data['page_name'] = 'create_admin';
		$this->data['folder'] = 'admin'; 
		$this->load->view('index',@$this->data); 
  } 

  private function generate_random_password($length = 6) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $password;
}


  public function save_admin(){ 
  		 
		$pass_check['table']='gst_admin';
		$pass_check['filed']='email';
		$pass_check['value']=$this->input->post('email');
    
		$is_process=$this->Admin_model->get_check_unique($pass_check);
	
		if($is_process['sucess'])
		{ 
				$data['id']=$this->input->post('id');
				$data['name']=$this->input->post('name'); 
				$data['email']=$this->input->post('email');  
				$data['contact']=$this->input->post('contact');  
				$data['password'] = $this->generate_random_password(6); 
				$data['created_date']=date('Y-m-d H:i:s');
        $data['type']=2;
				if($this->Admin_model->save_admin($data))
				{
				
					 $this->session->set_flashdata('successmsg',  $this->lang->line('common_record_save_msg'));
					  $this->session->unset_userdata('errorsmsg');
				
				      redirect('admin/login');
				}else{
					 $this->session->set_flashdata('errorsmsg', 'Record not saved. Please try again');
					  $this->session->unset_userdata('successmsg');
					redirect('admin/create_admin');
				}
			 
		}else{			
			$this->session->set_flashdata('errorsmsg','Duplicate entry of Email id' );
			  $this->session->unset_userdata('successmsg');
			if($this->input->post('id')){
				redirect('admin/create_admin/'.$this->input->post('id'));
			}else{
			redirect('admin/create_admin'); 
			}
		}
		
	}

  public function login()
  {

	  $this->load->helper('url');
		$this->load->library('session');
		$this->data['auto_username']=get_cookie('auto_username');
 	  $this->data['page_name'] = 'login';
 	  $this->data['folder'] = 'admin';   
		$this->load->view('index',@$this->data); 
	  
  }
  
    public function set_admin_login() {
      
        $response = ['success' => 0]; 
        
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');

        // Remember the username only -- never cache the password itself.
        set_cookie('auto_username', $data['username'], 3600);

        $is_logged_in = $this->Admin_model->get_login($data);

        if ($is_logged_in == 1) {
            $response['success'] = 1;
            $response['redirect'] = 1;
            $response['url'] ='user_list_report';
        } elseif ($is_logged_in == 3) {
            $response['message'] = 'Too many failed attempts. Account locked for 15 minutes.';
            $response['url'] ='login';
        } else {
            $response['url'] ='login';
        }

        echo json_encode($response);
   }

   public function logout()
	{ 
		$this->Admin_model->logout();
		redirect('home/index'); 
	}


   public function admin_list_report()
{
     
    if (@$this->data['login_user_info']->type==1) {
      
        $this->data['page_name'] = 'admin_list_report';
        $this->data['folder'] = 'admin'; 
        $result_data = $this->Admin_model->get_admin_list(); 
        $this->data['results'] = $result_data;
        $this->load->view('index', $this->data); 
    } else {
        redirect('admin/login');
    }
}


  public function view_admin_access_details()
  {

		$this->data['page_name'] = 'view_admin_access_details';
		$this->data['folder'] = 'admin'; 
    if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['results']=$this->Admin_model->get_admin_access_details_info($pass);
        // print_r($this->data['results']);die();
			}
		$this->load->view('index',@$this->data); 
  } 
  
  public function change_user_status() {
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $this->db->where('id', $id);
    $this->db->update('gst_user', ['is_active' => $status]);

    echo json_encode(['success' => 1]);
}
 


}

?>