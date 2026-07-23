<?php defined('BASEPATH') OR exit('No direct script access allowed');
 use Dompdf\Dompdf;
class Home extends CI_Controller
{

  function __construct()
  {
	  
    parent::__construct(); 
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie'); 
		$this->load->model('Home_model');
	    $this->load->library('session'); 
	    $this->load->database();
	    $this->load->library('email');
		$this->data['login_user_info']=$this->Home_model->get_login_information(); 
		$registration_id = $this->session->userdata('registration_id');
		$pass = $this->Home_model->get_taxpayer(); 
        $matched_pass = null;

		foreach ($pass as $p) {
			if ($p->user_id == $this->data['login_user_info']->id) {
				$matched_pass = $p;
				break;
			}
		}

		if ($matched_pass) {
			$result = $this->Home_model->get_taxpayer_info($matched_pass); 
			if ($this->data['login_user_info']->id == $result->user_id) {
				$this->data['resultTaxpayer'] = $result;
			}
			 $gstin = $this->data['resultTaxpayer']->gstno;
            $this->data['state_name'] = $this->Home_model->get_state_name_by_gstin($gstin);
		}
		$this->data['ip_address']=$this->Home_model->getIPAddress(); 
		//  print_r($this->data['resultTaxpayer']->gstno);die();
	 
	
  }
  public function index()
  {

		$this->data['page_title'] = 'Home'; 
		$this->data['page_name'] = 'home';
		$this->data['folder'] = 'user'; 
		$this->load->view('index',@$this->data); 
  } 
  
  public function register()
  {

		$this->data['page_title'] = 'Register'; 
		$this->data['page_name'] = 'register';
		$this->data['folder'] = 'user'; 
		
		$this->load->view('index',@$this->data); 
  } 
  
    public function save_user()
    {
        $pass_check['table'] = 'gst_user';
        $pass_check['filed'] = 'email';
        $pass_check['value'] = $this->input->post('email');
        $is_process = $this->Home_model->get_check_unique($pass_check);
    
        if ($is_process['sucess'])
        {
            // PASSWORD MATCH CHECK
            if ($this->input->post('password') != $this->input->post('confirm_password')) {
                $this->session->set_flashdata('errorsmsg', 'Password not matched');
                redirect('home/register');
            }
    
            $data['name']    = $this->input->post('name');
            $data['email']   = $this->input->post('email');
            $data['contact'] = $this->input->post('contact');
            $data['course']  = $this->input->post('course');

            $allowed_courses = array('BCOM', 'BBA', 'MBA', 'AI BSC');
            if (!in_array($data['course'], $allowed_courses, true)) {
                $this->session->set_flashdata('errorsmsg', 'Please select a valid course');
                redirect('home/register');
            }

            // SECURE PASSWORD
            $data['password'] = $this->input->post('password');
            $data['confirm_password'] = $this->input->post('confirm_password');
    
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['is_active']    = 1;
            $data['status']       = 0; // pending admin approval -- see Admin_model::get_user_list()


            if ($this->Home_model->save_user($data))
            {
            $this->session->set_flashdata('successmsg', 'Registration successful! Your account is pending admin approval.');

            // Email notifications are switched off for now (set
            // EMAIL_NOTIFICATIONS_ENABLED=true in docker/.env to turn back
            // on once real SMTP credentials are configured) -- admin
            // reviews the User List / User Approval List directly instead.
            if (getenv('EMAIL_NOTIFICATIONS_ENABLED') === 'true') {
                $admin_email = array('knowledge@practicaleduskills.com', 'academics@practicaleduskills.com');

                $subject = 'New User Registration - Approval Required';

                $message = "
                    <h3>New User Registration</h3>
                    <p>A new user has registered and is waiting for approval.</p>

                    <p><strong>Name:</strong> ".$data['name']."</p>
                    <p><strong>Email:</strong> ".$data['email']."</p>

                    <p>Please login to admin panel and approve the user.</p>
                ";

                $this->Home_model->send_mail($admin_email, $subject, $message);

                $user_subject = 'Registration Successful - Awaiting Approval';

                $user_message = "
                    <h3>Welcome, ".$data['name']."!</h3>

                    <p>Thank you for registering with us.</p>

                    <p>Your account has been created successfully and is currently
                    <strong>pending admin approval</strong>.</p>

                    <h4>Your Details:</h4>
                    <p><strong>Name:</strong> ".$data['name']."</p>
                    <p><strong>Email:</strong> ".$data['email']."</p>
                    <p><strong>Mobile:</strong> ".$data['contact']."</p>

                    <br>
                    <p>Regards,<br>Team</p>
                ";

                $this->Home_model->send_mail($data['email'], $user_subject, $user_message);
            }

            // redirect
            redirect('home/register');
                        
                        
             }
                }
                else
                {
                    $this->session->set_flashdata('errorsmsg', 'Duplicate entry of Email id');
                    redirect('home/register');
                }
            }

	public function login()
  {

	  $this->load->helper('url');
		$this->load->library('session');
		$this->data['auto_username']=get_cookie('auto_username');
		$this->data['auto_password']=get_cookie('auto_password');
 	    $this->data['page_name'] = 'login'; 
 	    $this->data['folder'] = 'user';
       	$this->data['page_title'] = $this->lang->line('login_page_title');      
		$this->load->view('index',@$this->data); 
	  
  }
  
    public function set_login() {
      
        $response = ['success' => 0]; 
        
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
    
        // Set cookies
        set_cookie('auto_username', $data['username'], 3600);
        // set_cookie('auto_password', $data['password'], 3600);
    
        $is_logged_in = $this->Home_model->get_login($data);
    
        if ($is_logged_in == 1) {
            $response['success'] = 1;
            $response['redirect'] = 1;
            $response['url'] ='dashboard';
        } elseif ($is_logged_in == 2) {
        
        $response['success'] = 0;
        $response['redirect'] = 2;
        $response['url'] = 'approval_required'; 

    } else {
           
            $response['url'] ='login';
          
        }
    
        echo json_encode($response);
   }

   public function logout()
	{ 
		$this->Home_model->logout();
		redirect('Home/login'); 
	}
	
		public function status()
   {
    	$this->data['page_title'] = 'status'; 
		$this->data['page_name'] = 'status';
		$this->data['folder'] = 'user'; 
		
		$this->load->view('index',@$this->data);
   }
	
	public function forgot_password()
    {
        	$this->data['page_title'] = 'Forgot Password'; 
    		$this->data['page_name'] = 'forgot_password';
    		$this->data['folder'] = 'user'; 
    		
    		$this->load->view('index',@$this->data);
    }




public function send_reset_link()
{
    $this->load->model('Home_model');

    $response['sucess'] = 0;

    $data['email'] = $this->input->post('email');

    $response['sucess'] = $this->Home_model->send_link_set_password($data);

    if ($response['sucess'] == 1) {
        $this->session->set_flashdata('successmsg', 'Verification Link sent on your email.');
    } else {
        $this->session->set_flashdata('errorsmsg', 'Email not found or mail failed.');
    }


    redirect('home/forgot_password');
}


public function reset_password()
{
    $user_id = base64_decode($this->uri->segment(3));
    $varification_code = base64_decode($this->uri->segment(4));

    if (!empty($user_id) && !empty($varification_code))
    {
        $passd['user_id'] = $user_id;
        $passd['varification_code'] = $varification_code;

        $check_link = $this->Home_model->check_link_set_password($passd);

        if ($check_link == 1)
        {
            $this->data['user_id'] = $user_id;
            $this->data['varification_code'] = $varification_code;
            $this->data['page_title'] = 'Reset Password'; 
            $this->data['page_name'] = 'reset_password';
            $this->data['folder'] = 'user';  

            $this->load->view('index', $this->data);
        }
        else
        {
            $this->session->set_flashdata('errorsmsg', 'Invalid or expired link.');
            redirect('home/forgot_password');
        }
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Invalid link.');
        redirect('home/forgot_password');
    }
}
  
 public function save_new_password()
{
    $data = $this->input->post();

    $data['user_id'] = base64_decode($data['user_id']);
    $data['varification_code'] = base64_decode($data['varification_code']);

    $response = $this->Home_model->save_new_password($data);

    if ($response == 1)
    {
        $this->session->set_flashdata('successmsg', 'Password reset successfully.');
        redirect('home/login');
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Password not reset.');
        redirect('home/forgot_password');
    }
}

    public function dashboard()
   {
      
      if(@$this->data['login_user_info']->id){
		$this->data['page_title'] = ''; 
		$this->data['page_name'] = 'dashboard';
		$this->data['folder'] = 'user';  
		$id=@$this->data['login_user_info']->id;
		$result = $this->Home_model->get_opening_balance_info($id);
        $this->data['result'] = $result; 
		// $pass = $this->Home_model->get_taxpayer();
		// $resultTaxpayer = $this->Home_model->get_taxpayer_info($pass); 
		// $this->data['resultTaxpayer'] = $resultTaxpayer;
		// print_r($resultTaxpayer);die();
		$this->load->view('index',@$this->data); 
      }else{
			redirect('Home/login');
		}
   } 

    public function dashboardNew()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'dashboardNew';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
			// $resultTaxpayer = $this->Home_model->get_taxpayer_info($pass); 
			// $this->data['resultTaxpayer'] = $resultTaxpayer;
			// print_r($resultTaxpayer);die();
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function gstnotice()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'gstnotice';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function returngstr9questionnaire()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'returngstr9questionnaire';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function gstr9offlineupload()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'gstr9offlineupload';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function returngstr9online()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'returngstr9online';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	 
	public function ledger_cashledger()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_cashledger';
			$this->data['folder'] = 'user'; 
			$id=@$this->data['login_user_info']->id;
            $result = $this->Home_model->get_opening_balance_info($id);
            $this->data['result'] = $result; 
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function ledger_cashledgerdetails()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_cashledgerdetails';
			$this->data['folder'] = 'user'; 
			$id=@$this->data['login_user_info']->id;
            $result = $this->Home_model->get_opening_balance_info($id);
            $this->data['result'] = $result; 
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function ledger_liabilityledger()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_liabilityledger';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
			// $this->data['resultTaxpayer'] = $result;
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function ledger_liabilityledgerdetails()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_liabilityledgerdetails';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
			// $this->data['resultTaxpayer'] = $result;
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function ledger_creditledger()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_creditledger';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
			// $this->data['resultTaxpayer'] = $result;
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function ledger_creditledgerdetails()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_creditledgerdetails';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
			// $this->data['resultTaxpayer'] = $result;
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function ledger_creditledgerprovisional()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'ledger_creditledgerprovisional';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
			// $this->data['resultTaxpayer'] = $result;
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/login');
			}
	} 

	public function returnannual()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'returnannual';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 


  
  
  	public function taxpayer()
    {
		    if(@$this->data['login_user_info']->id){
		    // $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
            $this->load->helper('url');
            $this->load->library('session');
        
            $this->data['page_name'] = 'taxpayer';
            $this->data['folder'] = 'user';
            $this->data['page_title'] = 'Tax Payer';
         
           
            // $this->data['result'] = $result; 
        
            $this->load->view('index', @$this->data);
		    }else{
				redirect('Home/login');
			}
		
	}
	
   public function save_taxpayer()
 	{
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['gstno']=$this->input->post('gstno');
		    $data['user_id'] = $this->data['login_user_info']->id;

		
			if($this->Home_model->save_taxpayer($data))
			{
				redirect('home/dashboard');
			}else{
				redirect('home/taxpayer');
			}
		

	}
	
	public function b2b_addInvoice()
    {
		if(@$this->data['login_user_info']->id){
            $this->load->helper('url');
            $this->load->library('session');
        
            $this->data['page_name'] = 'b2b_addInvoice';
            $this->data['folder'] = 'user';
            $this->data['page_title'] = 'Add Invoice';
			// if (@$this->uri->segment(3)) { 
			// 	$pass['id']=$this->uri->segment(3); 
			// 	$this->data['result']=$this->Home_model->get_b2b_info($pass);
			// 	$this->data['result_b2b_details']=$this->Home_model->get_b2b_details_info($pass); 
 
			// }
			// print_r($this->data['result_b2b_details']);die();
            $gstin_no = isset($_GET['gstin']) ? $_GET['gstin'] : '';
            $this->data['gstin_no'] = $gstin_no;
            $presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;
        
            $this->load->view('index', @$this->data);
		}else{
				redirect('Home/login');
			}	
		
	}
	
	public function save_b2b_addInvoice()
    {
       
        $data['gstin_no'] = $this->input->post('gstin_no');
        $data['recipient_name'] = $this->input->post('recipient_name');
        $data['invoice_no'] = $this->input->post('invoice_no');
        $data['date'] = $this->input->post('date');
        $data['invoice_value'] = $this->input->post('invoice_value');
        $data['pos_id'] = $this->input->post('pos_id');
        $data['is_deemed'] = $this->input->post('is_deemed') ? 1 : 0;
        $data['is_supply'] = $this->input->post('is_supply') ? 1 : 0;
        $data['is_diff_perc'] = $this->input->post('is_diff_perc') ? 1 : 0;
		$data['user_id'] = $this->data['login_user_info']->id;
    

        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');

        // Save main invoice
        $invoice_id = $this->Home_model->save_b2b_addInvoice($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
                if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

               
                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];
    
                $this->Home_model->save_b2b_invoice_detail($detail);
            }
    
            redirect('home/return_b2b_summary_list');
        } else {
            
            redirect('home/b2b_addInvoice');
        }
    }
    
    
	public function return_b2b_summary_list()
   {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'return_b2b_summary_list';
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 
			$id=@$this->data['login_user_info']->id;			
			$result_data=$this->Home_model->get_return_b2b_summary_list($id); 
			$this->data['results']=$result_data;
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}	
		
	}
	
	public function b2b_summary_details()
   {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'b2b_summary_details';
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
		     if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$pass['user_id']=@$this->data['login_user_info']->id;
				$this->data['results']=$this->Home_model->get_b2b_detail_info($pass); 
			} 
			// print_r($this->data['results']);die();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}	
		
	}

	public function b2b_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->b2b_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/return_b2b_summary_list');
        } else {
            redirect('home/return_b2b_summary_list');
        }
    }

	public function register_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->register_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/registered_summary_list');
        } else {
            redirect('home/registered_summary_list');
        }
    }
	
	public function registered_summary_detail()
   {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'registered_summary_detail';
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
		     if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$pass['user_id']=@$this->data['login_user_info']->id;
				$this->data['results']=$this->Home_model->get_registered_detail_info($pass); 
			} 
			// print_r($this->data['results']);die();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}	
		
	}
		 
	public function b2c_addInvoice()
    {
        if(@$this->data['login_user_info']->id){ 
		$this->load->helper('url');
            $this->load->library('session');
        
            $this->data['page_name'] = 'b2c_addInvoice';
            $this->data['folder'] = 'user';
            $this->data['page_title'] = '';
            	if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				
				$this->data['result']=$this->Home_model->get_b2c_info($pass);
				$this->data['result_b2c_details']=$this->Home_model->get_b2c_detail_info($pass); 

				// print_r($this->data['result_export_details']);exit();
				$this->data['page_title'] ='Exports- Edit Details';  
			}else{   
				 $this->data['page_title'] ='Exports- Add Details';
			} 
            $presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;
            $this->load->view('index', @$this->data);
		}else{
				redirect('Home/login');
			}	
		
	}
	
	public function save_b2c_addInvoice()
    {
        $data['id'] = $this->input->post('id');
        $data['invoice_no'] = $this->input->post('invoice_no');
        $data['date'] = $this->input->post('date');
        $data['invoice_value'] = $this->input->post('invoice_value');
        $data['pos_id'] = $this->input->post('pos_id');
        $data['is_supplies'] = $this->input->post('is_supplies') ? 1 : 0;
		 $data['user_id'] = $this->data['login_user_info']->id;
      
    

        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');

        // Save main invoice
        $invoice_id = $this->Home_model->save_b2c_addInvoice($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
               if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

               
                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];
    
                $this->Home_model->save_b2c_invoice_detail($detail);
            }
    
            redirect('home/b2c_summary');
        } else {
            
            redirect('home/b2c_addInvoice');
        }
    }
    
    public function b2c_summary()
   {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'b2c_summary'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
			$search['user_id'] = $id;
			$result_data=$this->Home_model->get_b2c_summary_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}	
	
	}
	
	public function b2c_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->b2c_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/b2c_summary');
        } else {
            redirect('home/b2c_summary');
        }
    }
    

	
	public function exports_invoiceadd()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'exports_invoiceadd';
			$this->data['folder'] = 'user';   

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_exports_invoice_info($pass);
				$this->data['result_export_details']=$this->Home_model->get_exports_invoice_detail_info($pass); 

				// print_r($this->data['result_export_details']);exit();
				$this->data['page_title'] ='Exports- Edit Details';  
			}else{   
				 $this->data['page_title'] ='Exports- Add Details';
			} 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
			
	}
	
	public function save_exports_invoiceadd()
    {
        $data['id'] = $this->input->post('id');
        $data['invoice_no'] = $this->input->post('invoice_no');
        $data['date'] = $this->input->post('date');
        $data['invoice_value'] = $this->input->post('invoice_value');
        $data['port_code'] = $this->input->post('port_code');
        $data['shipping_bill_no'] = $this->input->post('shipping_bill_no');
        $data['shipping_bill_date'] = $this->input->post('shipping_bill_date');
        $data['gst_payment'] = $this->input->post('gst_payment');
		$data['user_id'] = $this->data['login_user_info']->id;
      
        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');


        $invoice_id = $this->Home_model->save_exports_invoiceadd($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
                if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

        
                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];

    
                $this->Home_model->save_exports_invoiceadd_detail($detail);
            }
    
            redirect('home/exports_invoice_list');
        } else {
            
            redirect('home/exports_invoiceadd');
        }
    }
    
   public function exports_invoice_list()
   {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'exports_invoice_list'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
			$result_data=$this->Home_model->get_exports_invoice_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
    public function export_invoice_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->export_invoice_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/exports_invoice_list');
        } else {
            redirect('home/exports_invoice_list');
        }
    }

    
    public function b2cs_addInvoice()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'b2cs_addInvoice';
			$this->data['folder'] = 'user';  
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_b2cs_Invoice_info($pass);
				// print_r($this->data['result']);exit();
				$this->data['page_title'] ='Exports- Edit Details';  
			}else{   
				 $this->data['page_title'] ='Exports- Add Details';
			} 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
			
	}
	
	 public function save_b2cs_addInvoice()
 	{
			$data['id']=$this->input->post('id');
			$data['pos_id']=$this->input->post('pos_id');
			$data['taxable_value']=$this->input->post('taxable_value');
		  //  $data['supply_type']=$this->input->post('supply_type');
		    $data['is_diff_perc'] = $this->input->post('is_diff_perc') ? 1 : 0;
			$data['rate']=$this->input->post('rate');
			$data['tax']=$this->input->post('tax');
			$data['cess']=$this->input->post('cess');
			$data['user_id'] = $this->data['login_user_info']->id;;

			if($this->Home_model->save_b2cs_addInvoice($data))
			{
				redirect('home/b2cs_list');
			}else{
				redirect('home/b2cs_list');
			}
		

	}
	
	public function b2cs_list()
   {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'b2cs_list'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
			$result_data=$this->Home_model->get_b2cs_list($search); 
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
	public function b2cs_Invoice_delete()
	{
		if (!@$this->data['login_user_info']->id) {
			redirect('Home/login');
		}
		if (urldecode(@$this->uri->segment(3))) {
			$pass['id']=urldecode($this->uri->segment(3));
			$pass['user_id'] = $this->data['login_user_info']->id;
			if($this->Home_model->b2cs_Invoice_delete($pass)){
				$this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
			}else{
				$this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
			}

			redirect('home/b2cs_list');

		}else{
			redirect('home/b2cs_list');
		}	
	}
	
  	public function online_nil_rated_supplies()
    {
		   
		if(@$this->data['login_user_info']->id){   
            $this->load->helper('url');
            $this->load->library('session');
        
            $this->data['page_name'] = 'online_nil_rated_supplies';
            $this->data['folder'] = 'user';
            $this->data['page_title'] = '';
            $id=@$this->data['login_user_info']->id;
            $result = $this->Home_model->get_online_nil_rated_supplies_info($id);
            $this->data['result'] = $result; 
        
            $this->load->view('index', @$this->data);
		}else{
				redirect('Home/login');
			}
	
		    
		
	}
	
    public function save_online_nil_rated_supplies()
    {
        $data['id']=$this->input->post('id');
        $descriptions = (array) $this->input->post('description');
        $nil_rated = (array) $this->input->post('nil_rated_supplies');
        $exempted = (array) $this->input->post('exempted');
        $non_gst = (array) $this->input->post('non_gst_supplies');
		$user_id = $this->data['login_user_info']->id;


        $data = [];

        $row_count = min(count($descriptions), count($nil_rated), count($exempted), count($non_gst));
        for ($i = 0; $i < $row_count; $i++) {
            
            $data[] = [
                'description' => $descriptions[$i],
                'nil_rated_supplies' => $nil_rated[$i],
                'exempted' => $exempted[$i],
                'non_gst_supplies' => $non_gst[$i],
				'user_id'=> $user_id
            ];
        }
    
        if ($this->Home_model->save_online_nil_rated_supplies($data)) {
            redirect('home/online_nil_rated_supplies');
        } else {
            redirect('home/online_nil_rated_supplies');
        }
    }
    
    public function registered_noteadd()
    {
		if(@$this->data['login_user_info']->id){
            $this->load->helper('url');
            $this->load->library('session');
        
            $this->data['page_name'] = 'registered_noteadd';
            $this->data['folder'] = 'user';
            // $this->data['page_title'] = 'Add Invoice';
            $gstin_no = isset($_GET['gstin']) ? $_GET['gstin'] : '';
            $this->data['gstin_no'] = $gstin_no;
            $presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;
            $this->load->view('index', @$this->data);
		}else{
				redirect('Home/login');
			}
	
		
	}
	
	public function save_registered_noteadd()
    {
       
        $data['gstin_no'] = $this->input->post('gstin_no');
        $data['recipient_name'] = $this->input->post('recipient_name');
        $data['note_no'] = $this->input->post('note_no');
        $data['note_date'] = $this->input->post('note_date');
        $data['note_type'] = $this->input->post('note_type');
        $data['note_value'] = $this->input->post('note_value');
        $data['pos_id'] = $this->input->post('pos_id');
        $data['is_deemed'] = $this->input->post('is_deemed') ? 1 : 0;
        $data['is_supply'] = $this->input->post('is_supply') ? 1 : 0;
        $data['is_diff_perc'] = $this->input->post('is_diff_perc') ? 1 : 0;
        $data['user_id'] = $this->data['login_user_info']->id;

        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');

        // Save main invoice
        $invoice_id = $this->Home_model->save_registered_noteadd($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
                if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

               
                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];
    
                $this->Home_model->save_registered_noteadd_detail($detail);
            }
    
            redirect('home/registered_summary_list');
        } else {
            
            redirect('home/registered_noteadd');
        }
    }
    
    public function registered_summary_list()
    {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'registered_summary_list';
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;			
			$result_data=$this->Home_model->get_registered_summary_list($search); 
			$this->data['results']=$result_data;
// 			print_r($result_data);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}	
		
	}
	
	public function unregistered_noteadd()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'unregistered_noteadd';
			$this->data['folder'] = 'user';   

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_unregistered_note_info($pass);
				$this->data['result_details']=$this->Home_model->get_unregistered_note_detail_info($pass); 

				$this->data['page_title'] ='Credit/Debit Notes (Unregistered)- Edit Note';  
			}else{   
				 $this->data['page_title'] ='Credit/Debit Notes (Unregistered)- Add Note';
			} 
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
			
	}
	
	public function save_unregistered_noteadd()
    {
        $data['id'] = $this->input->post('id');
        $data['type'] = $this->input->post('type');
        $data['note_no'] = $this->input->post('note_no');
        $data['note_date'] = $this->input->post('note_date');
        $data['note_type'] = $this->input->post('note_type');
        $data['note_value'] = $this->input->post('note_value');
        $data['pos_id'] = $this->input->post('pos_id');
        $data['is_diff_perc'] = $this->input->post('is_diff_perc') ? 1 : 0;
		$data['user_id'] = $this->data['login_user_info']->id;
       
        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');

        // Save main invoice
        $invoice_id = $this->Home_model->save_unregistered_noteadd($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
               if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

               
                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];
    
                $this->Home_model->save_unregistered_noteadd_detail($detail);
            }
    
            redirect('home/unregistered_note_list');
        } else {
            
            redirect('home/unregistered_noteadd');
        }
    }
    
   public function unregistered_note_list()
   {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'unregistered_note_list'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search;
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id; 
			$result_data=$this->Home_model->get_unregistered_note_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}	
	
	}
	
   public function unregistered_note_delete()
   {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->unregistered_note_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/unregistered_note_list');
        } else {
            redirect('home/unregistered_note_list');
        }
    }
    
   public function advtax_liability_add()
   { 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'advtax_liability_add';
			$this->data['folder'] = 'user';   

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_advtax_liability_info($pass);
				$this->data['result_details']=$this->Home_model->get_advtax_liability_detail_info($pass); 

				$this->data['page_title'] ='Tax Liability (Advance Received)- Edit Details';  
			}else{   
				 $this->data['page_title'] ='Tax Liability (Advance Received)- Add Details';
			} 
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
			
	}
	
   public function save_advtax_liability()
   {
        $data['id'] = $this->input->post('id');
        $data['pos_id'] = $this->input->post('pos_id');
        $data['is_diff_perc'] = $this->input->post('is_diff_perc') ? 1 : 0;
		$data['user_id'] = $this->data['login_user_info']->id;
       
        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');

        // Save main invoice
        $invoice_id = $this->Home_model->save_advtax_liability($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
                if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

               
                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];
    
                $this->Home_model->save_advtax_liability_detail($detail);
            }
    
            redirect('home/advtax_liability_list');
        } else {
            
            redirect('home/advtax_liability_add');
        }
    }
    
    public function advtax_liability_list()
    {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'advtax_liability_list'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
			$result_data=$this->Home_model->get_advtax_liability_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
   public function advtax_liability_delete()
   {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->advtax_liability_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/advtax_liability_list');
        } else {
            redirect('home/advtax_liability_list');
        }
    }
    
    public function tax_paid_add()
   { 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'tax_paid_add';
			$this->data['folder'] = 'user';   

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_tax_paid_info($pass);
				$this->data['result_details']=$this->Home_model->get_tax_paid_detail_info($pass); 

				$this->data['page_title'] ='Tax already paid on invoices issued in the current period - Edit Details';  
			}else{   
				 $this->data['page_title'] ='Tax already paid on invoices issued in the current period - Add Details';
			} 
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
			
	}
	
   public function save_tax_paid()
   {
        $data['id'] = $this->input->post('id');
        $data['pos_id'] = $this->input->post('pos_id');
        $data['is_diff_perc'] = $this->input->post('is_diff_perc') ? 1 : 0;
		$data['user_id'] = $this->data['login_user_info']->id;
       
        $taxable_values = (array) $this->input->post('taxable_value');
        $rates = (array) $this->input->post('rate');
        $taxes = (array) $this->input->post('tax');
        $cesses = (array) $this->input->post('cess');

        // Save main invoice
        $invoice_id = $this->Home_model->save_tax_paid($data);

        if ($invoice_id) {
            $row_count = min(count($taxable_values), count($rates), count($taxes), count($cesses));
            for ($i = 0; $i < $row_count; $i++) {
                if (
                    $taxable_values[$i] === '' || 
                    (empty($taxes[$i]) && empty($cesses[$i]))
                ) {
                    continue;
                }

                $detail = [
                    'invoice_id'     => $invoice_id,
                    'rate'           => $rates[$i],
                    'taxable_value'  => $taxable_values[$i],
                    'tax'            => $taxes[$i],
                    'cess'           => $cesses[$i],
                ];
    
                $this->Home_model->save_tax_paid_detail($detail);
            }
    
            redirect('home/tax_paid_list');
        } else {
            
            redirect('home/tax_paid_add');
        }
    }
    
    public function tax_paid_list()
    {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'tax_paid_list'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
			$result_data=$this->Home_model->get_tax_paid_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
	public function tax_paid_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->tax_paid_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/tax_paid_list');
        } else {
            redirect('home/advtax_liability_list');
        }
    }
    
    public function online_ecom_add()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'online_ecom_add';
			$this->data['folder'] = 'user';  
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_online_ecom_info($pass);
				// print_r($this->data['result']);exit();
				$this->data['page_title'] ='14 - Supplies made through E-Commerce Operators - u/s 52 (TCS) - Edit Details';  
			}else{   
				 $this->data['page_title'] ='14 - Supplies made through E-Commerce Operators - u/s 52 (TCS) - Add Details';
			} 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
			
	}
	
	 public function save_online_ecom()
 	{
			$data['id']=$this->input->post('id');
			$data['gstin_no']=$this->input->post('gstin_no');
			$data['net_value']=$this->input->post('net_value');
			$data['integrated_tax']=$this->input->post('integrated_tax');
			$data['central_tax']=$this->input->post('central_tax');
			$data['state_tax']=$this->input->post('state_tax');
			$data['cess']=$this->input->post('cess');
			$data['user_id'] = $this->data['login_user_info']->id;
		   
			if($this->Home_model->save_online_ecom($data))
			{
				redirect('home/online_ecom_summary');
			}else{
				redirect('home/online_ecom_add');
			}
		

	}
	
	public function online_ecom_summary()
   {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'online_ecom_summary'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
			$result_data=$this->Home_model->get_online_ecom_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
	public function online_ecom_delete()
	{
		if (!@$this->data['login_user_info']->id) {
			redirect('Home/login');
		}
		if (urldecode(@$this->uri->segment(3))) {
			$pass['id']=urldecode($this->uri->segment(3));
			$pass['user_id'] = $this->data['login_user_info']->id;
			if($this->Home_model->online_ecom_delete($pass)){
				$this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
			}else{
				$this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
			}

			redirect('home/online_ecom_summary');

		}else{
			redirect('home/online_ecom_summary');
		}	
	}
	
	public function hsn_summary()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'hsn_summary';
			$this->data['folder'] = 'user';  
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result_data']=$this->Home_model->get_hsn_summary_info($pass);
				// print_r($this->data['result']);exit();
				$this->data['page_title'] ='12 - HSN - wise summary of outward supplies ';  
			}else{   
				 $this->data['page_title'] ='12 - HSN - wise summary of outward supplies ';
			} 
				if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
			$result_data=$this->Home_model->get_hsn_summary_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records']; 
			
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	}

	 public function save_hsn_summary()
 	{
			$data['id']=$this->input->post('id');
			$data['hsn_number']=$this->input->post('hsn_number');
			$data['description']=$this->input->post('description');
			$data['uqc']=$this->input->post('uqc');
			$data['total_quantity']=$this->input->post('total_quantity');
			$data['taxable_value']=$this->input->post('taxable_value');
			$data['rate']=$this->input->post('rate');
			$data['integrated_tax']=$this->input->post('integrated_tax');
			$data['central_tax']=$this->input->post('central_tax');
			$data['state_tax']=$this->input->post('state_tax');
			$data['cess']=$this->input->post('cess');
			$data['user_id'] = $this->data['login_user_info']->id;
		   

		
			if($this->Home_model->save_hsn_summary($data))
			{
				redirect('home/hsn_summary');
			}else{
				redirect('home/hsn_summary');
			}
		

	}
	
	public function hsn_summary_delete()
	{
		if (!@$this->data['login_user_info']->id) {
			redirect('Home/login');
		}
		if (urldecode(@$this->uri->segment(3))) {
			$pass['id']=urldecode($this->uri->segment(3));
			$pass['user_id'] = $this->data['login_user_info']->id;
			if($this->Home_model->hsn_summary_delete($pass)){
				$this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
			}else{
				$this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
			}

			redirect('home/hsn_summary');

		}else{
			redirect('home/hsn_summary');
		}	
	}
	public function online_supplies_add()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'online_supplies_add';
			$this->data['folder'] = 'user';  
			$presults=$this->Home_model->get_pos_list($pass);
            $this->data['pos_results']=$presults;

			if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_online_supplies_info($pass);
				// print_r($this->data['result']);exit();
				$this->data['page_title'] ='15 - Supplies U/s 9(5) - B2B - Edit Details';  
			}else{   
				 $this->data['page_title'] ='15 - Supplies U/s 9(5) - B2B - Add Details';
			} 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
	}

	 public function save_online_supplies()
 	{
			$data['id']=$this->input->post('id');
			$data['is_deemed'] = $this->input->post('is_deemed') ? 1 : 0;
			$data['supplier_gstin_no']=$this->input->post('supplier_gstin_no');
			$data['recipient_gstin_no']=$this->input->post('recipient_gstin_no');
			$data['document_no']=$this->input->post('document_no');
			$data['document_date']=$this->input->post('document_date');
			$data['total_value']=$this->input->post('total_value');
		   	$data['pos_id']=$this->input->post('pos_id');
			$data['user_id'] = $this->data['login_user_info']->id;

		  
			if($this->Home_model->save_online_supplies($data))
			{
				redirect('home/online_supplies_summary');
			}else{
				redirect('home/online_supplies_add');
			}
		

	}
	public function online_supplies_summary()
    {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'online_supplies_summary'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;

			$result_data=$this->Home_model->get_online_supplies_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
	public function online_supplies_delete()
	{
		if (!@$this->data['login_user_info']->id) {
			redirect('Home/login');
		}
		if (urldecode(@$this->uri->segment(3))) {
			$pass['id']=urldecode($this->uri->segment(3));
			$pass['user_id'] = $this->data['login_user_info']->id;
			if($this->Home_model->online_supplies_delete($pass)){
				$this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
			}else{
				$this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
			}

			redirect('home/online_supplies_summary');

		}else{
			redirect('home/online_supplies_summary');
		}	
	}
	
	public function document_summary()
	{ 
		if(@$this->data['login_user_info']->id){
 			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'document_summary';
			$this->data['folder'] = 'user';  
			$id=@$this->data['login_user_info']->id;
		    $this->data['result']=$this->Home_model->get_document_info($id);
// 			print_r($this->data['result']);exit();
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
			
	}
	
	public function save_document()
    {
        $is_table  = (array) $this->input->post('is_table');
        $from_serial_number = (array) $this->input->post('from_serial_number');
        $to_serial_number = (array) $this->input->post('to_serial_number');
        $total_number = (array) $this->input->post('total_number');
        $cancelled_number = (array) $this->input->post('cancelled_number');
        $net_number = (array) $this->input->post('net_number');
        $user_id = $this->data['login_user_info']->id;

        $all_data = [];

        $row_count = min(count($is_table), count($from_serial_number), count($to_serial_number), count($total_number), count($cancelled_number), count($net_number));
        for ($i = 0; $i < $row_count; $i++) {
            $detail = [
                'is_table' => $is_table[$i],
                'from_serial_number'=> $from_serial_number[$i],
                'to_serial_number'  => $to_serial_number[$i],
                'total_number'      => $total_number[$i],
                'cancelled_number'  => $cancelled_number[$i],
                'net_number'         => $net_number[$i],
                'user_id'           => $user_id,
            ];
    
            $all_data[] = $detail;
        }
    
        
        $this->Home_model->save_document($all_data);
    
        redirect('home/document_summary');
    }
    
      public function returnDashbord()
      {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returnDashbord';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
     public function returngstr1online()
     {
        if(@$this->data['login_user_info']->id){
			
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returngstr1online';
    		$this->data['folder'] = 'user'; 
			$id=@$this->data['login_user_info']->id;
            $search['user_id'] = $id;
    		$this->data['b2b_count']=$this->Home_model->get_total_return_b2b_count($search);
    		$result_export=$this->Home_model->get_exports_invoice_list($search);
    		$this->data['export_count']=$result_export['all_count'];
    		$result_b2cs=$this->Home_model->get_b2cs_list($search); 
			$this->data['b2cs_count']=$result_b2cs['all_count'];
	    	$nil_result = $this->Home_model->get_online_nil_rated_supplies_info($id);
            $this->data['nil_count'] = (!empty($nil_result) && count($nil_result) > 0) ? 1 : 0;
			$registered_result = $this->Home_model->get_registered_summary_list($search);
            $this->data['registered_count'] = count($registered_result);
			$unregistered_result=$this->Home_model->get_unregistered_note_list($search); 
			$this->data['unregistered_count']=$unregistered_result['all_count'];
			$advtax_data=$this->Home_model->get_advtax_liability_list($search); 
			$this->data['advtax_count']=$advtax_data['all_count'];
			$taxPaid_data=$this->Home_model->get_tax_paid_list($search); 
			$this->data['taxPaid_count']=$taxPaid_data['all_count'];
			$hsn_data=$this->Home_model->get_hsn_summary_list($search); 
			$this->data['hsn_count']=$hsn_data['all_count'];
			$document_result=$this->Home_model->get_document_info($id);
			$this->data['document_count'] = count($document_result);
			$ecom_data=$this->Home_model->get_online_ecom_list($search); 
			$this->data['ecom_count']=$ecom_data['all_count'];
			$supplies_data=$this->Home_model->get_online_supplies_list($search); 
			$this->data['supplies_count']=$supplies_data['all_count'];
			$b2c_data=$this->Home_model->get_b2c_summary_list($search); 
			$this->data['b2c_count']=$b2c_data['all_count'];
			

    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      }  
      
      
 private function sum_field(array $sources, $field) 
     {
        $sum = 0;
        foreach ($sources as $item) {
            $sum += isset($item->$field) ? floatval($item->$field) : 0;
        }
        return $sum;
      }


     public function returngstr1summary()
    {
		if(@$this->data['login_user_info']->id){
        $this->data['page_title'] = ''; 
        $this->data['page_name'] = 'returngstr1summary';
        $this->data['folder'] = 'user'; 
        $id=@$this->data['login_user_info']->id;
        $search['user_id'] = $id;
        $this->data['b2b_count'] = $this->Home_model->get_total_return_b2b_count($search);
        $this->data['b2btaxablevalue_count'] = $this->Home_model->get_total_b2b_taxable_value($search);
        $this->data['b2ctaxablevalue_count'] = $this->Home_model->get_total_b2cl_taxable_value($search);
        $this->data['exporttaxablevalue_count'] = $this->Home_model->get_total_exports_taxable_value($search); 
        $this->data['b2cstaxablevalue_count'] = $this->Home_model->get_total_b2cs_taxable_value($search); 
        $this->data['registered_count'] = $this->Home_model->get_total_registered_note_taxable_value($search); 
        $this->data['unregistered_count'] = $this->Home_model->get_total_unregistered_note_taxable_value($search);
        $this->data['advtaxLiability_count'] = $this->Home_model->get_total_advtaxLiability_taxable_value($search);
        $this->data['taxpaid_count'] = $this->Home_model->get_total_taxPaid_taxable_value($search);
        $this->data['hsn_count'] = $this->Home_model->get_total_hsn_taxable_value($search);
        $this->data['ecom_count'] = $this->Home_model->get_total_ecom_value($search);
        $document_result = $this->Home_model->get_document_info($id);
        $this->data['document_count'] = count($document_result);
    
       
        $taxSources = [
            $this->data['b2btaxablevalue_count'],
            $this->data['b2ctaxablevalue_count'],
            $this->data['exporttaxablevalue_count'],
            $this->data['b2cstaxablevalue_count'],
            $this->data['registered_count'],
            $this->data['unregistered_count'],
            $this->data['advtaxLiability_count'],
            $this->data['taxpaid_count'],
            $this->data['hsn_count'],
            $this->data['ecom_count']
        ];
    
        $hsnEcomSources = [
            $this->data['hsn_count'],
            $this->data['ecom_count']
        ];
    
        // Perform summation
        $this->data['total_value'] = $this->sum_field($taxSources, 'total_taxable_value') + 
                                     (isset($this->data['ecom_count']->net_value) ? floatval($this->data['ecom_count']->net_value) : 0);
    
        $this->data['integrated_tax'] = $this->sum_field($taxSources, 'integrated_value');
        $this->data['central_tax'] = $this->sum_field($hsnEcomSources, 'central_tax');
        $this->data['state_tax'] = $this->sum_field($hsnEcomSources, 'state_tax');
        $this->data['cess'] = $this->sum_field($hsnEcomSources, 'cess');
    
        $this->load->view('index', $this->data);
	 	}else{
				redirect('Home/login');
			}

    }  
      
     public function returngstr2bview()
     {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returngstr2bview';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
     public function returngstr2aview()
     {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returngstr2aview';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
      public function gstreturngstr2aviewb2b()
     {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'gstreturngstr2aviewb2b';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
      public function gstreturngstr2aviewcdn()
     {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'gstreturngstr2aviewcdn';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
      
      public function returngstr3bdetails()
     {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returngstr3bdetails';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
  
      
    public function gst_upload_gstr2b_file()
    {
        if(@$this->data['login_user_info']->id){ 
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'gst_upload_gstr2b_file';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
    } 
      
      	public function opening_balance()
    {
		   
		if(@$this->data['login_user_info']->id){ 
            $this->load->helper('url');
            $this->load->library('session');
        
            $this->data['page_name'] = 'opening_balance';
            $this->data['folder'] = 'user';
            $this->data['page_title'] = '';
            $id=@$this->data['login_user_info']->id;
            $result = $this->Home_model->get_opening_balance_info($id);
            $this->data['result'] = $result; 
            // print_r($result);die();
        
            $this->load->view('index', @$this->data);
		}else{
				redirect('Home/login');
			}
    
		
	}
	
    public function save_opening_balance()
    {
       $data['id']=$this->input->post('id');
        $data['cash_ledger_igst']=$this->input->post('cash_ledger_igst');
        $data['cash_ledger_cgst']=$this->input->post('cash_ledger_cgst');
        $data['cash_ledger_sgst']=$this->input->post('cash_ledger_sgst');
        $data['cash_ledger_cess']=$this->input->post('cash_ledger_cess');
        $data['credit_ledger_integrated_tax']=$this->input->post('credit_ledger_integrated_tax');
        $data['credit_ledger_central_tax']=$this->input->post('credit_ledger_central_tax');
        $data['credit_ledger_state_tax']=$this->input->post('credit_ledger_state_tax');
        $data['credit_ledger_cess']=$this->input->post('credit_ledger_cess');
        $data['GSTR2B_IGST']=$this->input->post('GSTR2B_IGST');
        $data['GSTR2B_CGST']=$this->input->post('GSTR2B_CGST');
        $data['GSTR2B_SGST']=$this->input->post('GSTR2B_SGST');
        $data['GSTR2B_Cess']=$this->input->post('GSTR2B_Cess'); 
        $data['b_date'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->data['login_user_info']->id;
    
        if ($this->Home_model->save_opening_balance($data)) {
            redirect('home/dashboardNew');
        } else {
            redirect('home/opening_balance');
        }
    }
    
     public function gstreturngstr2aviewisd()
      {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'gstreturngstr2aviewisd';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
      } 
      
      public function returngstr2adownload()
      {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returngstr2adownload';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
      } 
      
      public function returngstr1offlineupload()
      {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'returngstr1offlineupload';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}	
      } 
      
       public function gst_challan()
      {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'gst_challan';
    		$this->data['folder'] = 'user'; 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
      } 
      
    public function save_challan_reason()
    {
        $data['id'] = $this->input->post('id');
        $data['reason_for_challan'] = $this->input->post('reason_for_challan');
        $data['final_year'] = $this->input->post('final_year');
        $data['period'] = $this->input->post('period');
		$data['user_id'] = $this->data['login_user_info']->id;

        
      
        $data['challan_type'] = $this->input->post('challan_type') ?? '';
    
      
        if ($data['reason_for_challan'] !== 'QRMP') {
            $data['challan_type'] = '';
        }
    
        if ($this->Home_model->save_challan_reason($data)) {
            redirect('home/create_challan');
        } else {
            redirect('home/gst_challan');
        }
    }
    
    public function create_challan()
    {
        if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'create_challan';
    		$this->data['folder'] = 'user'; 
    		if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_challan_info($pass);
				// print_r($this->data['result']);exit();
				$this->data['page_title'] ='Reason For Challan';  
			}else{   
				 $this->data['page_title'] ='Reason For Challan';
			} 
    		$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	
    } 

	public function generate_reference_number()
{
    $prefix = chr(rand(65, 90)) . chr(rand(65, 90)); 
    $number = mt_rand(100000000000, 999999999999);   
    $suffix = chr(rand(65, 90));                    
    return $prefix . $number . $suffix;
}


    
    public function save_challan()
    {
        $data['id'] = $this->input->post('id');
        $data['cgst_tax'] = $this->input->post('cgst_tax');
        $data['cgst_interest'] = $this->input->post('cgst_interest');
        $data['cgst_penalty'] = $this->input->post('cgst_penalty');
        $data['cgst_fees'] = $this->input->post('cgst_fees');
        $data['cgst_other'] = $this->input->post('cgst_other');
        $data['cgst_total'] = $this->input->post('cgst_total');
        $data['igst_tax'] = $this->input->post('igst_tax');
        $data['igst_interest'] = $this->input->post('igst_interest');
        $data['igst_penalty'] = $this->input->post('igst_penalty');
        $data['igst_fees'] = $this->input->post('igst_fees');
        $data['igst_other'] = $this->input->post('igst_other');
        $data['igst_total'] = $this->input->post('igst_total');
        $data['cess_tax'] = $this->input->post('cess_tax');
        $data['cess_interest'] = $this->input->post('cess_interest');
        $data['cess_penalty'] = $this->input->post('cess_penalty');
        $data['cess_fees'] = $this->input->post('cess_fees');
        $data['cess_other'] = $this->input->post('cess_other');
        $data['cess_total'] = $this->input->post('cess_total');
        $data['sgst_tax'] = $this->input->post('sgst_tax');
        $data['sgst_interest'] = $this->input->post('sgst_interest');
        $data['sgst_penalty'] = $this->input->post('sgst_penalty');
        $data['sgst_fees'] = $this->input->post('sgst_fees');
        $data['sgst_other'] = $this->input->post('sgst_other');
        $data['sgst_total'] = $this->input->post('sgst_total');
        $data['total_challan_amount'] = $this->input->post('total_challan_amount');
        $data['mode_of_payment'] = $this->input->post('mode_of_payment');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['expiry_date'] = date('Y-m-d H:i:s', strtotime($data['created_on'] . ' +7 days'));
		$cpin = date('ymd') . mt_rand(1000000000, 9999999999); 
        $data['cpin'] = $cpin;
		$data['user_id'] = $this->data['login_user_info']->id;
		$data['reference_number'] = $this->generate_reference_number();


        // $data['status'] = $this->input->post('status');
        $data['challan_amount_total_in_words'] = $this->input->post('challan_amount_total_in_words');
    
        
        $action = $this->input->post('action');
     
         $data['status'] = ($action == 'Generate Challan') ? 2 : 1;
        $insert_id = $this->Home_model->save_challan($data);
     
    
        if ($insert_id) {
            if ($action =='Generate Challan') {
                redirect('home/challan_generated/' . $insert_id);
            } else {
              
                redirect('home/create_challan');
            }
        } else {
           
            redirect('home/create_challan');
        }
    }

	 public function make_payment($id = null)
    {
	if(@$this->data['login_user_info']->id){	
       $update_data = array(
        'status' => 3,
        'deposit_date' => date('Y-m-d H:i:s')
         );

        $this->Home_model->update_status($id, $update_data, $this->data['login_user_info']->id);
		redirect('home/challan_generated/' . $id);
	}else{
		    redirect('Home/login');
		}	
		
    }

    
   public function challan_saved()
   {
        if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'challan_saved';
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 	
			$id=@$this->data['login_user_info']->id;					
			$result_data=$this->Home_model->get_challan_saved_list($id); 
			$this->data['results']=$result_data;
			$this->load->view('index',@$this->data);
		}else{
		    redirect('Home/login');
		}

		
	}
	
	 public function challen_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->challen_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/challan_saved');
        } else {
            redirect('home/challan_saved');
        }
    }
    
    public function challan_generated()
    {
            if(@$this->data['login_user_info']->id){
    		$this->data['page_title'] = ''; 
    		$this->data['page_name'] = 'challan_generated';
    		$this->data['folder'] = 'user'; 
            if (@$this->uri->segment(3)) { 
				$pass['id']=$this->uri->segment(3); 
				$this->data['result']=$this->Home_model->get_challan_info($pass);
				// print_r($this->data['result']);exit();
			}
    		$this->load->view('index',@$this->data); 
             }else{
				redirect('Home/login');
			}

    } 
    
    public function challan_history()
    {

	    if(@$this->data['login_user_info']->id){
			$this->load->helper('url');
			$this->load->library('session');
			$this->data['page_name'] = 'challan_history'; 
			$this->data['folder'] = 'user';
			$this->data['page_title'] = ''; 			
			if(@$this->input->post('no_of_records')){
				$search['no_of_records']=$this->input->post('no_of_records');
				if($this->input->post('no_of_records')=='-1'){
					$search['pagi_number']=0;
					$search['no_of_records']=0; 
					$search['no_of_records']=-1;
				}
			}else{
				$search['no_of_records']=10;
			}			
			if(@$this->input->post('pagi_number')){
				$search['pagi_number']=$this->input->post('pagi_number');
			}else{
				$search['pagi_number']=0;
			}
			if(@$this->input->post('sort_by')){
				$search['sort_by']=$this->input->post('sort_by');
			}else{
				$search['sort_by']='id';
			}
			if(@$this->input->post('sort_order')){
				$search['sort_order']=$this->input->post('sort_order');
			}else{
				$search['sort_order']='DESC';
			}			
			if ($this->input->post('cpin')) {
                $search['cpin'] = $this->input->post('cpin');
            } else {
                $search['cpin'] = '';
            }
            if($this->input->post('from_date')){		
				$search['from_date']=$this->input->post('from_date');		
			}else{		
				$search['from_date']=date('Y-m-d');		
			}
			if($this->input->post('to_date')){		
				$search['to_date']=$this->input->post('to_date');		
			}else{		
				$search['to_date']=date('Y-m-t');		
			}
			$this->data['search'] = $search; 
			$id=@$this->data['login_user_info']->id;
			$search['user_id'] = $id;
			$result_data=$this->Home_model->get_challan_history_list($search); 
		
			$this->data['count_results']=$result_data['all_count'];
			$this->data['results']=$result_data['records'];  
// 			print_r($this->data['results']);exit();
			$this->load->view('index',@$this->data);
		}else{
				redirect('Home/login');
			}
	
	
	}
	
	public function challen_history_delete()
    {
        if (!@$this->data['login_user_info']->id) {
            redirect('Home/login');
        }
        if ($this->uri->segment(3)) {
            $pass['id'] = $this->uri->segment(3);
            $pass['user_id'] = $this->data['login_user_info']->id;

            if ($this->Home_model->challen_history_delete($pass)) {
                $this->session->set_flashdata('successmsg', $this->lang->line('common_record_delete_msg'));
            } else {
                $this->session->set_flashdata('errorsmsg', $this->lang->line('common_record_delete_error_msg'));
            }
    
            redirect('home/challan_history');
        } else {
            redirect('home/challan_history');
        }
    }
    
    
     public function download_pdf($challan_id)
    {
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    
       $data['result'] = $this->Home_model->get_challan_info($challan_id);
        $data['is_pdf'] = true; 
        
        // if (@$this->data['login_user_info']->id) {
        //     $pass = $this->Home_model->get_taxpayer();
        //     $this->data['taxpayerresults'] = $this->Home_model->get_taxpayer_info($pass);
        // }
        
        // $gstin = $this->data['taxpayerresults']->gstno;
        // $this->data['state_name'] = $this->Home_model->get_state_name_by_gstin($gstin);
        
        $data = array_merge($data, $this->data);
        
        $html = $this->load->view('user/challan_generated', $data, true);
            
        $dompdf = new Dompdf();  
        $dompdf->loadHtml($html);
        $dompdf->set_option('defaultFont', 'DejaVu Sans');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("challan_{$challan_id}.pdf", array("Attachment" => 1));
   
    }
    
     public function download_summary_pdf()
    {
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    
        $data['is_pdf'] = true; 
        $id=@$this->data['login_user_info']->id;
        $search['user_id'] = $id;
        $this->data['b2b_count'] = $this->Home_model->get_total_return_b2b_count($search);
        $this->data['b2btaxablevalue_count'] = $this->Home_model->get_total_b2b_taxable_value($search);
        $this->data['b2ctaxablevalue_count'] = $this->Home_model->get_total_b2cl_taxable_value($search);
        $this->data['exporttaxablevalue_count'] = $this->Home_model->get_total_exports_taxable_value($search); 
        $this->data['b2cstaxablevalue_count'] = $this->Home_model->get_total_b2cs_taxable_value($search); 
        $this->data['registered_count'] = $this->Home_model->get_total_registered_note_taxable_value($search); 
        $this->data['unregistered_count'] = $this->Home_model->get_total_unregistered_note_taxable_value($search);
        $this->data['advtaxLiability_count'] = $this->Home_model->get_total_advtaxLiability_taxable_value($search);
        $this->data['taxpaid_count'] = $this->Home_model->get_total_taxPaid_taxable_value($search);
        $this->data['hsn_count'] = $this->Home_model->get_total_hsn_taxable_value($search);
        $this->data['ecom_count'] = $this->Home_model->get_total_ecom_value($search);
        $document_result = $this->Home_model->get_document_info($id);
        $this->data['document_count'] = count($document_result);
    
       
        $taxSources = [
            $this->data['b2btaxablevalue_count'],
            $this->data['b2ctaxablevalue_count'],
            $this->data['exporttaxablevalue_count'],
            $this->data['b2cstaxablevalue_count'],
            $this->data['registered_count'],
            $this->data['unregistered_count'],
            $this->data['advtaxLiability_count'],
            $this->data['taxpaid_count'],
            $this->data['hsn_count'],
            $this->data['ecom_count']
        ];
    
        $hsnEcomSources = [
            $this->data['hsn_count'],
            $this->data['ecom_count']
        ];
    
        // Perform summation
        $this->data['total_value'] = $this->sum_field($taxSources, 'total_taxable_value') + 
                                     (isset($this->data['ecom_count']->net_value) ? floatval($this->data['ecom_count']->net_value) : 0);
    
        $this->data['integrated_tax'] = $this->sum_field($taxSources, 'integrated_value');
        $this->data['central_tax'] = $this->sum_field($hsnEcomSources, 'central_tax');
        $this->data['state_tax'] = $this->sum_field($hsnEcomSources, 'state_tax');
        $this->data['cess'] = $this->sum_field($hsnEcomSources, 'cess');
        
        $data = array_merge($data, $this->data);
        
        $html = $this->load->view('user/returngstr1summary', $data, true);
            
        $dompdf = new Dompdf();  
        $dompdf->loadHtml($html);
        $dompdf->set_option('defaultFont', 'DejaVu Sans');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream(" GSTR-1_Summary.pdf", array("Attachment" => 1));
   
    }

	public function gstr9_detailsiosup()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'gstr9_detailsiosup';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_outward()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_outward';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function gstr9_details_itcavail()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'gstr9_details_itcavail';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_reverseditc()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_reverseditc';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_itcinfo()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_itcinfo';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_taxpaid()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_taxpaid';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_declaredtrans()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_declaredtrans';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 
    
	public function return_gstr9_details_difftax()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_difftax';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_detailsdemandrefund()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_detailsdemandrefund';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_supcompuser()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_supcompuser';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_hsnoutward()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_hsnoutward';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_hsninward()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_hsninward';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function return_gstr9_details_latefee()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'return_gstr9_details_latefee';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 
	public function gst_returngstr1file()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'gst_returngstr1file';
			$this->data['folder'] = 'user'; 
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 

	public function trade_info()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'trade_info';
			$this->data['folder'] = 'user'; 
			// $pass = $this->Home_model->get_taxpayer();
            // $result = $this->Home_model->get_taxpayer_info($pass);
			// $this->data['resultTaxpayer'] = $result;
			// print_r($this->data['resultTaxpayer']);die();
			$this->load->view('index',@$this->data); 
			
		}else{
				redirect('Home/index');
			}
	} 
	
	  public function new_registration()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'new_registration';
			$this->data['folder'] = 'user'; 
		
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 
	
	

  public function save_new_registration()
{
    $data['i_am_a'] = $this->input->post('i_am_a');
    $data['id_state'] = $this->input->post('id_state');
    $data['district'] = $this->input->post('district');
    $data['legal_name'] = $this->input->post('legal_name');
    $data['pan'] = $this->input->post('pan');
    $data['email'] = $this->input->post('email');
    $data['mobile_number'] = $this->input->post('mobile_number');
    $data['created_date'] = date('Y-m-d H:i:s');

    $insert_id = $this->Home_model->save_new_registration($data);

    if($insert_id)
    {
        // ✅ Store ID in session
        $this->session->set_userdata('registration_id', $insert_id);

        redirect('home/new_registration_otp');
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/new_registration');
    }
}
    
    
     public function save_reference_number()
    {
       
        $data['id']=$this->input->post('id');
    	$data['trn_number'] = $this->input->post('trn_number');
        $data['captchatrn'] = $this->input->post('captchatrn');
    	if($this->Home_model->save_reference_number($data))
    	{
    	 $this->session->set_flashdata('successmsg',  $this->lang->line('common_record_save_msg'));
    	 $this->session->unset_userdata('errorsmsg');
    	 redirect('home/trn_otp');
    	}else{
    	 $this->session->set_flashdata('errorsmsg', 'Record not saved. Please try again');
    	 $this->session->unset_userdata('successmsg');
    	redirect('home/trn_otp');
	}
        
    }


	  public function new_registration_otp()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'new_registration_otp';
			$this->data['folder'] = 'user'; 
		
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 
	
	public function save_new_registration_otp()
    {
        $entered_mobile_otp = $this->input->post('mobile_otp_number');
        $entered_email_otp = $this->input->post('email_otp_number');

        // Hardcoded OTP check (12345)
        if($entered_mobile_otp == '123456'|| $entered_email_otp == '123456')
        {
            // Optional: mark OTP verified in session
            $this->session->set_userdata('otp_verified', true);

            // Redirect to next step (Step 2)
            redirect('home/verify_registration');
        }
        else
        {
            // If OTP wrong
            $this->session->set_flashdata('error', 'Invalid OTP. Please try again.');
            redirect('home/new_registration_otp');
        }
    }
     public function trn_otp()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'trn_otp';
			$this->data['folder'] = 'user'; 
		
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	} 
	
		public function save_trn_otp()
    {
        $entered_otp = $this->input->post('otp_number');

        // Hardcoded OTP check (12345)
        if($entered_otp == '123456')
        {
            // Optional: mark OTP verified in session
            $this->session->set_userdata('otp_verified', true);

            // Redirect to next step (Step 2)
            redirect('home/business_details');
        }
        else
        {
            // If OTP wrong
            $this->session->set_flashdata('error', 'Invalid OTP. Please try again.');
            redirect('home/new_registration_otp');
        }
    }
    
     public function verify_registration()
	{
		
		if(@$this->data['login_user_info']->id){
			$this->data['page_title'] = ''; 
			$this->data['page_name'] = 'verify_registration';
			$this->data['folder'] = 'user'; 
		
			$this->load->view('index',@$this->data); 
		}else{
				redirect('Home/login');
			}
	}
	

    public function my_saved_application()
  {
   if(@$this->data['login_user_info']->id){  
		$this->data['page_name'] = 'my_saved_application';
		$this->data['folder'] = 'user'; 
        $result_data=$this->Home_model->new_registration_list();  
		$this->data['results']=$result_data;
        // print_r($this->data['results']);die();
		$this->load->view('index',@$this->data);
   }else{
				redirect('Home/login');
			}
    
  } 
  
  public function promotor_list()
  {
        if(@$this->data['login_user_info']->id){
		$this->data['page_name'] = 'promotor_list';
		$this->data['folder'] = 'user';
	    $user_id=$this->data['login_user_info']->id; 
	     $registration_id = $this->session->userdata('registration_id');
        $result_data=$this->Home_model->promoter_list($user_id,$registration_id);  
		$this->data['results']=$result_data;
        // print_r($this->data['results']);die();
		$this->load->view('index',@$this->data); 
  }else{
				redirect('Home/login');
			}
    
  } 
  
  public function bank_account_list()
  {
        if(@$this->data['login_user_info']->id){
		$this->data['page_name'] = 'bank_account_list';
		$this->data['folder'] = 'user';
	    $user_id=$this->data['login_user_info']->id; 
	     $registration_id = $this->session->userdata('registration_id');
        $result_data=$this->Home_model->bank_account_list($user_id,$registration_id);  
		$this->data['results']=$result_data;
        // print_r($this->data['results']);die();
		$this->load->view('index',@$this->data); 
  }else{
				redirect('Home/login');
			}
    
  } 
  
public function business_details()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'business_details';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}
	
	public function save_business_details()
{
    $data['trade_name'] = $this->input->post('trade_name');
    $data['consitution_of_business'] = $this->input->post('consitution_of_business');
    $data['district'] = $this->input->post('district');
    $data['casual'] = $this->input->post('casual') ? 1 : 0;
    $data['composition'] = $this->input->post('composition') ? 1 : 0;
    $data['reason_to_obtain_registration'] = $this->input->post('reason_to_obtain_registration');
    $data['date_of_commencement_of_business_custom'] = $this->input->post('date_of_commencement_of_business_custom');
    $data['date_on_which_liability_to_register_arises_temp'] = $this->input->post('date_on_which_liability_to_register_arises_temp');
    $data['created_date'] = date('Y-m-d H:i:s');

    // Save main table
    $business_id = $this->Home_model->save_business_details($data);

    if($business_id)
    {
        // Get array values
        $types   = $this->input->post('existing_registration_type');
        $numbers = $this->input->post('existing_registration_number');
        $dates   = $this->input->post('existing_registration_date_custom');

        if(!empty($types))
        {
            for($i=0; $i<count($types); $i++)
            {
                $insertData = array(
                    'business_details_id'        => $business_id,
                    'existing_registration_type'  => $types[$i],
                    'existing_registration_number'=> $numbers[$i],
                    'existing_registration_date_custom'  => $dates[$i],
                    // 'created_date'       => date('Y-m-d H:i:s')
                );
               
                $this->db->insert('gst_business_details_existing_registration', $insertData);
            }
        }
        
        $trade_names = $this->input->post('additional_trade_name');

        if(!empty($trade_names))
        {
            foreach($trade_names as $name)
            {
                if(!empty($name)) // skip empty inputs
                {
                    $this->db->insert('gst_trade_name', array(
                        'b_id' => $business_id,
                        'trade_name' => $name,
                        'created_date' => date('Y-m-d H:i:s')
                    ));
                }
            }
        }

        $this->session->set_flashdata('successmsg', 'Record Saved Successfully');
        redirect('home/promoter');
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Record not saved. Please try again');
        redirect('home/business_details');
    }
}

public function promoter()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'promoter';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
    				redirect('Home/login');
    			}
}


public function save_promoter()
{
    // Load upload library
$config['upload_path']   = './uploads/promoter/';
$config['allowed_types'] = 'jpeg|jpg';
$config['max_size']      = 100; // 100KB
$config['encrypt_name']  = TRUE;

$this->load->library('upload', $config);

if (!empty($_FILES['pd_upload']['name'])) {
    if ($this->upload->do_upload('pd_upload')) {
        $uploadData = $this->upload->data();
        $data['pd_upload'] = $uploadData['file_name'];
    } else {
        $data['pd_upload'] = ''; // or handle error
    }
} else {
    $data['pd_upload'] = ''; // if not uploaded
}

    $registration_id = $this->session->userdata('registration_id');
    $data['first_name'] = $this->input->post('first_name');
    $data['middle_name'] = $this->input->post('middle_name');
    $data['last_name'] = $this->input->post('last_name');
    $data['father_middle_name'] = $this->input->post('father_middle_name');
    $data['father_first_name'] = $this->input->post('father_first_name');
    $data['father_last_name'] = $this->input->post('father_last_name');
    $data['date_of_birth_custom'] = $this->input->post('date_of_birth_custom');
     $data['mobile_number'] = $this->input->post('mobile_number');
    $data['email'] = $this->input->post('email');
    $data['gender'] = $this->input->post('gender');
    $data['telephone_std'] = $this->input->post('telephone_std');
    $data['telephone_number'] = $this->input->post('telephone_number');
    $data['designation'] = $this->input->post('designation');
    $data['director_number'] = $this->input->post('director_number');
    $data['pd_cit_ind'] = $this->input->post('pd_cit_ind');
    $data['pan'] = $this->input->post('pan');
    $data['passport'] = $this->input->post('passport');
    $data['aadhar_card'] = $this->input->post('aadhar_card');
    // $data['pd_adhar_dec'] = $this->input->post('pd_adhar_dec');
    $data['country'] = $this->input->post('country');
    $data['pin'] = $this->input->post('pin');
     $data['state'] = $this->input->post('state');
     $data['district'] = $this->input->post('district');
    $data['city'] = $this->input->post('city');
    $data['locality'] = $this->input->post('locality');
    $data['road'] = $this->input->post('road');
    $data['name_of_building'] = $this->input->post('name_of_building');
    $data['building_number'] = $this->input->post('building_number');
    $data['floor_number'] = $this->input->post('floor_number');
     $data['nearby_landmark'] = $this->input->post('nearby_landmark');
    // $data['pd_upload'] = $this->input->post('pd_upload');
    $data['selfie'] = $this->input->post('selfie');
    $data['pri_auth'] = $this->input->post('pri_auth')? 'Yes' : 'No';
    $data['created_date'] = date('Y-m-d H:i:s');
    $data['user_id'] = $this->data['login_user_info']->id;
    $data['registration_id'] = $registration_id;

      $insert_id = $this->Home_model->save_promoter($data);

    if($insert_id)
    {
        $action = $this->input->post('action');

        if($action == 'add_new')
        {
            // Stay on same page (fresh form)
            $this->session->set_flashdata('successmsg', 'Record Saved. Add New.');
            redirect('home/promoter');
        }
        else
        {
            // Go to next page
            $this->session->set_userdata('authorized_signatory_id', $insert_id);
            redirect('home/authorized_signatory');
        }
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/promoter');
    }
}

// public function authorized_signatory()
// {
//     $registration_id = $this->session->userdata('registration_id');

//     if($registration_id)
//     {
//         $this->data['registration'] = $this->Home_model->get_registration($registration_id);
//     }

//     $this->data['page_title'] = '';
//     $this->data['page_name'] = 'authorized_signatory';
//     $this->data['folder'] = 'user';

//     $this->load->view('index', $this->data);
// }

public function authorized_signatory()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');
    $user_id = $this->data['login_user_info']->id;

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    // ✅ FETCH PROMOTER DATA
    $this->data['promoter'] = $this->Home_model->get_promoter_list($user_id, $registration_id);

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'authorized_signatory';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function save_authorized_signatory()
{
     $registration_id = $this->session->userdata('registration_id');
    $data['primary_authorised_signatory'] = 
    $this->input->post('primary_authorised_signatory') ? 1 : 0;
    $data['first_name'] = $this->input->post('first_name');
    $data['middle_name'] = $this->input->post('middle_name');
    $data['last_name'] = $this->input->post('last_name');
    $data['father_middle_name'] = $this->input->post('father_middle_name');
    $data['father_first_name'] = $this->input->post('father_first_name');
    $data['father_last_name'] = $this->input->post('father_last_name');
    $data['date_of_birth_custom'] = $this->input->post('date_of_birth_custom');
     $data['mobile_number'] = $this->input->post('mobile_number');
    $data['email'] = $this->input->post('email');
    $data['gender'] = $this->input->post('gender');
    $data['telephone_std'] = $this->input->post('telephone_std');
    $data['telephone_number'] = $this->input->post('telephone_number');
    $data['designation'] = $this->input->post('designation');
    $data['director_number'] = $this->input->post('director_number');
    $data['pd_cit_ind'] = $this->input->post('pd_cit_ind');
    $data['pan'] = $this->input->post('pan');
    $data['passport'] = $this->input->post('passport');
    // $data['aadhar_card'] = $this->input->post('aadhar_card');
    // $data['pd_adhar_dec'] = $this->input->post('pd_adhar_dec');
    $data['country'] = $this->input->post('country');
    $data['pin'] = $this->input->post('pin');
     $data['state'] = $this->input->post('state');
     $data['district'] = $this->input->post('district');
    $data['city'] = $this->input->post('city');
    $data['locality'] = $this->input->post('locality');
    $data['road'] = $this->input->post('road');
    $data['name_of_building'] = $this->input->post('name_of_building');
    $data['building_number'] = $this->input->post('building_number');
    $data['floor_number'] = $this->input->post('floor_number');
     $data['nearby_landmark'] = $this->input->post('nearby_landmark');
    $data['as_upload_photo'] = $this->input->post('as_upload_photo');
    $data['as_upload_sign'] = $this->input->post('as_upload_sign');
    $data['selfie'] = $this->input->post('selfie');
    $data['as_up_type'] = $this->input->post('as_up_type');
    $data['created_date'] = date('Y-m-d H:i:s');
     $data['user_id'] = $this->data['login_user_info']->id;
    $data['registration_id'] = $registration_id;

    $insert_id = $this->Home_model->save_authorized_signatory($data);

    
        if($insert_id)
    {
        $action = $this->input->post('action');

        if($action == 'add_new')
        {
            // Stay on same page (fresh form)
            $this->session->set_flashdata('successmsg', 'Record Saved. Add New.');
            redirect('home/authorized_signatory');
        }
        else
        {
            // Go to next page
            $this->session->set_userdata('authorized_signatory_id', $insert_id);
            redirect('home/authorized_representative');
        }
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/authorized_signatory');
    }
}

 public function authorized_signatory_list()
  {
      if(@$this->data['login_user_info']->id){
        
		$this->data['page_name'] = 'authorized_signatory_list';
		$this->data['folder'] = 'user';
	    $user_id=$this->data['login_user_info']->id; 
	     $registration_id = $this->session->userdata('registration_id');
        $result_data=$this->Home_model->authorized_signatory_list($user_id,$registration_id);  
		$this->data['results']=$result_data;
        // print_r($this->data['results']);die();
		$this->load->view('index',@$this->data); 
  }else{
				redirect('Home/login');
			}
    
  } 

public function authorized_representative()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'authorized_representative';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
    				redirect('Home/login');
    			}
    }

public function save_authorized_representative()
{

    $data['as_cit_ind'] = $this->input->post('as_cit_ind') ? 'Yes' : 'No';
    $data['created_date'] = date('Y-m-d H:i:s');

    $insert_id = $this->Home_model->save_authorized_representative($data);

    if($insert_id)
    {

        redirect('home/principle_place_of_business');
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/authorized_representative');
    }
}

public function principle_place_of_business()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'principle_place_of_business';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

// public function save_principle_place_of_business()
// {
//     $data['pin'] = $this->input->post('pin');
//     $data['district'] = $this->input->post('district');
//     $data['city'] = $this->input->post('city');
//     $data['locality'] = $this->input->post('locality');
//     $data['road'] = $this->input->post('road');
//     $data['name_of_building'] = $this->input->post('name_of_building');
//     $data['building_number'] = $this->input->post('building_number');
//     $data['floor_number'] = $this->input->post('floor_number');
//     $data['nearby_landmark'] = $this->input->post('nearby_landmark');
//     $data['latitude'] = $this->input->post('latitude');
//     $data['longitude'] = $this->input->post('longitude');
//     $data['sector_or_unit'] = $this->input->post('sector_or_unit');
//     $data['commissionerate'] = $this->input->post('commissionerate');
//     $data['division'] = $this->input->post('division');
//     $data['ranges'] = $this->input->post('ranges');
//     $data['office_email'] = $this->input->post('office_email');
//     $data['office_telephone_std'] = $this->input->post('office_telephone_std');
//     $data['office_telephone'] = $this->input->post('office_telephone');
//     $data['office_mobile_number'] = $this->input->post('office_mobile_number');
//     $data['office_fax_std'] = $this->input->post('office_fax_std');
//     $data['office_fax'] = $this->input->post('office_fax');
//     $data['nature_of_premises'] = $this->input->post('nature_of_premises');
//     $data['proof_of_principal_of_business'] = $this->input->post('proof_of_principal_of_business');
//     $data['bp_upload'] = $this->input->post('bp_upload');
//     $choices = $this->input->post('nature_of_business_choices');

// $data['nature_of_business_choices'] = !empty($choices) 
//     ? implode(',', $choices) 
//     : '';
//     $data['bp_add'] = $this->input->post('bp_add') ? 'Yes' : 'No';
//     $data['created_date'] = date('Y-m-d H:i:s');

//     $insert_id = $this->Home_model->save_principle_place_of_business($data);

//     if ($insert_id) {
//         redirect('home/additional_place_of_business');
//     } else {
//         $this->session->set_flashdata('errorsmsg', 'Record not saved.');
//         redirect('home/principle_place_of_business');
//     }
// }

public function save_principle_place_of_business()
{
    $data['pin'] = $this->input->post('pin');
    $data['district'] = $this->input->post('district');
    $data['city'] = $this->input->post('city');
    $data['locality'] = $this->input->post('locality');
    $data['road'] = $this->input->post('road');
    $data['name_of_building'] = $this->input->post('name_of_building');
    $data['building_number'] = $this->input->post('building_number');
    $data['floor_number'] = $this->input->post('floor_number');
    $data['nearby_landmark'] = $this->input->post('nearby_landmark');
    $data['latitude'] = $this->input->post('latitude');
    $data['longitude'] = $this->input->post('longitude');
    $data['sector_or_unit'] = $this->input->post('sector_or_unit');
    $data['commissionerate'] = $this->input->post('commissionerate');
    $data['division'] = $this->input->post('division');
    $data['ranges'] = $this->input->post('ranges');
    $data['office_email'] = $this->input->post('office_email');
    $data['office_telephone_std'] = $this->input->post('office_telephone_std');
    $data['office_telephone'] = $this->input->post('office_telephone');
    $data['office_mobile_number'] = $this->input->post('office_mobile_number');
    $data['office_fax_std'] = $this->input->post('office_fax_std');
    $data['office_fax'] = $this->input->post('office_fax');
    $data['nature_of_premises'] = $this->input->post('nature_of_premises');
    $data['proof_of_principal_of_business'] = $this->input->post('proof_of_principal_of_business');
    $data['bp_upload'] = $this->input->post('bp_upload');

    $choices = $this->input->post('nature_of_business_choices');
    $data['nature_of_business_choices'] = !empty($choices) ? implode(',', $choices) : '';

    
    $bp_add = $this->input->post('bp_add') ? 'Yes' : 'No';
    $data['bp_add'] = $bp_add;

    $data['created_date'] = date('Y-m-d H:i:s');

    $insert_id = $this->Home_model->save_principle_place_of_business($data);

    if ($insert_id) {

        if($bp_add == 'No'){
            
            redirect('home/good_service');
        } else {
            
            redirect('home/additional_place_of_business');
        }

    } else {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/principle_place_of_business');
    }
}

public function additional_place_of_business()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'additional_place_of_business';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
    				redirect('Home/login');
    			}
}

public function save_additional_place_of_business()
{
    $count = $this->input->post('number_of_additional_places');

    // Save in DB (optional)
    $data['number_of_additional_places'] = $count;
    $data['created_date'] = date('Y-m-d H:i:s');
    $this->Home_model->save_additional_place_of_business($data);

    // 🔥 IMPORTANT: Store in session
    $this->session->set_userdata('total_additional', $count);
    $this->session->set_userdata('current_additional', 1);

    // Redirect to form
    redirect('home/additional_places_of_business');
}

public function additional_places_of_business()
{
    if(@$this->data['login_user_info']->id){

        $current = $this->session->userdata('current_additional');
        $total   = $this->session->userdata('total_additional');

        // If no additional → normal flow
        if(!$total){
            $this->data['step_info'] = '';
        } else {
            // If completed all
            if($current > $total){
                redirect('home/good_service');
            }

            // Show step info
            $this->data['step_info'] = "Additional Place $current of $total";
        }

        $registration_id = $this->session->userdata('registration_id');

        if($registration_id){
            $this->data['registration'] = $this->Home_model->get_registration($registration_id);
        }

        $this->data['page_name'] = 'additional_places_of_business';
        $this->data['folder'] = 'user';

        $this->load->view('index', $this->data);

    } else {
        redirect('Home/login');
    }
}

public function save_additional_places_of_business()
{
    $data['pin'] = $this->input->post('pin');
    $data['district'] = $this->input->post('district');
    $data['city'] = $this->input->post('city');
    $data['locality'] = $this->input->post('locality');
    $data['road'] = $this->input->post('road');
    $data['name_of_building'] = $this->input->post('name_of_building');
    $data['building_number'] = $this->input->post('building_number');
    $data['floor_number'] = $this->input->post('floor_number');
    $data['nearby_landmark'] = $this->input->post('nearby_landmark');
    $data['latitude'] = $this->input->post('latitude');
    $data['longitude'] = $this->input->post('longitude');
    $data['sector_or_unit'] = $this->input->post('sector_or_unit');
    $data['commissionerate'] = $this->input->post('commissionerate');
    $data['division'] = $this->input->post('division');
    $data['ranges'] = $this->input->post('ranges');
    $data['office_email'] = $this->input->post('office_email');
    $data['office_telephone_std'] = $this->input->post('office_telephone_std');
    $data['office_telephone'] = $this->input->post('office_telephone');
    $data['office_mobile_number'] = $this->input->post('office_mobile_number');
    $data['office_fax_std'] = $this->input->post('office_fax_std');
    $data['office_fax'] = $this->input->post('office_fax');
    $data['nature_of_premises'] = $this->input->post('nature_of_premises');
    $data['proof_of_principal_of_business'] = $this->input->post('proof_of_principal_of_business');
    $data['bp_upload'] = $this->input->post('bp_upload');
    $choices = $this->input->post('nature_of_business_choices');

$data['nature_of_business_choices'] = !empty($choices) 
    ? implode(',', $choices) 
    : '';
    $data['bp_add'] = $this->input->post('bp_add') ? 'Yes' : 'No';
    $data['created_date'] = date('Y-m-d H:i:s');

 $insert_id = $this->Home_model->save_principle_place_of_business($data);

    if ($insert_id) {

        $total   = $this->session->userdata('total_additional');
        $current = $this->session->userdata('current_additional');

        if($total){ // additional flow

            $current++;
            $this->session->set_userdata('current_additional', $current);

            if($current <= $total){
                
                redirect('home/additional_places_of_business');
            } else {
                
                $this->session->unset_userdata('total_additional');
                $this->session->unset_userdata('current_additional');

                redirect('home/good_service');
            }

        } else {
            redirect('home/additional_place_of_business');
        }

    } else {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/additional_places_of_business');
    }
}

public function goods_and_service()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'goods_and_service';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
    				redirect('Home/login');
    			}
}

public function good_service()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'good_service';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
    				redirect('Home/login');
    			}
}

public function approval_required()
{
   
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'approval_required';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);

}

public function state_specific_information()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'state_specific_information';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
    
}




public function aadhaar_authentication()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'aadhaar_authentication';
    $this->data['folder'] = 'user';
    
    $user_id=$this->data['login_user_info']->id; 
	     $registration_id = $this->session->userdata('registration_id');
        $result_data=$this->Home_model->authorized_signatory_list($user_id,$registration_id);  
		$this->data['results']=$result_data;

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function verification()
{
    if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');
    // print_r($registration_id);die();

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
        
    }
    
     $authorized_signatory_id = $this->session->userdata('authorized_signatory_id');
    //  print_r($authorized_signatory_id);die();

    if($authorized_signatory_id)
    {
    $this->data['authorized'] = $this->Home_model->get_authorized_signatory($authorized_signatory_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'verification';
    $this->data['folder'] = 'user';
    $user_id=$this->data['login_user_info']->id; 
	     $registration_id = $this->session->userdata('registration_id');
    $this->data['authorized_signatories'] = $this->Home_model->authorized_signatory_list($user_id,$registration_id);  
    $this->load->view('index', $this->data);
}else{
				redirect('Home/login');
			}
}

public function get_signatory_details()
{
    if (!@$this->data['login_user_info']->id) {
        header('Content-Type: application/json');
        http_response_code(401);
        echo json_encode(['error' => 'Not authenticated']);
        return;
    }

    $id = $this->input->post('id');
    $user_id = $this->data['login_user_info']->id;

    $this->db->where('id', $id);
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('gst_authorized_signatory');

    header('Content-Type: application/json');
    echo json_encode($query->row());
}

public function application_for_new_registration()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'application_for_new_registration';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
    
}

public function track_application_status()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'track_application_status';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function bank_account()
{

        if(@$this->data['login_user_info']->id){
    $registration_id = $this->session->userdata('registration_id');

    if($registration_id)
    {
        $this->data['registration'] = $this->Home_model->get_registration($registration_id);
    }

    $this->data['page_title'] = '';
    $this->data['page_name'] = 'bank_account';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
    				redirect('Home/login');
	}
}



public function save_bank_account()
{
    // Load upload library
$config['upload_path']   = './uploads/promoter/';
$config['allowed_types'] = 'jpeg|jpg';
$config['max_size']      = 100; // 100KB
$config['encrypt_name']  = TRUE;

$this->load->library('upload', $config);

if (!empty($_FILES['pd_upload']['name'])) {
    if ($this->upload->do_upload('pd_upload')) {
        $uploadData = $this->upload->data();
        $data['pd_upload'] = $uploadData['file_name'];
    } else {
        $data['pd_upload'] = ''; // or handle error
    }
} else {
    $data['pd_upload'] = ''; // if not uploaded
}

    $registration_id = $this->session->userdata('registration_id');
    $data['account_number'] = $this->input->post('account_number');
    $data['type_of_account'] = $this->input->post('type_of_account');
    $data['ifsc_code'] = $this->input->post('ifsc_code');
    $data['proof_of_details_of_bank_account'] = $this->input->post('proof_of_details_of_bank_account');
    $data['created_date'] = date('Y-m-d H:i:s');
    $data['user_id'] = $this->data['login_user_info']->id;
    $data['registration_id'] = $registration_id;

      $insert_id = $this->Home_model->save_bank_account($data);

    if($insert_id)
    {
        $action = $this->input->post('action');

        if($action == 'add_new')
        {
            // Stay on same page (fresh form)
            $this->session->set_flashdata('successmsg', 'Record Saved. Add New.');
            redirect('home/bank_account');
        }
        else
        {
            // Go to next page
            $this->session->set_userdata('authorized_signatory_id', $insert_id);
            redirect('home/aadhaar_authentication');
        }
    }
    else
    {
        $this->session->set_flashdata('errorsmsg', 'Record not saved.');
        redirect('home/bank_account');
    }
}

public function ISD_Invoices()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'ISD_Invoices';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function TDS_credit_received()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'TDS_credit_received';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function TCS_credit_received()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'TCS_credit_received';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function gstreturngstr2aviewcdn2()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'gstreturngstr2aviewcdn2';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}

public function gstreturngstr2aviewcdn3()
{
    if(@$this->data['login_user_info']->id){
    $this->data['page_title'] = '';
    $this->data['page_name'] = 'gstreturngstr2aviewcdn3';
    $this->data['folder'] = 'user';

    $this->load->view('index', $this->data);
    }else{
				redirect('Home/login');
			}
}





      
      

   





}

?>