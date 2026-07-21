<?php
require FCPATH.'application/aws/aws-autoloader.php';
use Aws\S3\S3Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
        }


	
	
    
    public function get_login($data)
{
    $this->db->select('*');
    $this->db->from('gst_admin');
    $this->db->where('email', $data['username']);
    $this->db->where('password', $data['password']); // Use hashed password in production
    $query = $this->db->get();
    $data_rn = $query->row();

    if (!empty($data_rn) && $data_rn->id) {
        // Set session
        $admin_session['gst_admins_id'] = $data_rn->id;
        $this->session->set_userdata($admin_session);

        // Update login times in gst_admin
        $this->db->where('id', $data_rn->id);
        $this->db->update('gst_admin', array(
            'last_login' => $data_rn->current_login,
            'current_login' => date('Y-m-d H:i:s')
        ));

       
        $session_id = session_id();
        $current_login = date('Y-m-d H:i:s');
        // $ip_address = $this->input->ip_address();
         $ip_address=Admin_model::getIPAddress(); 

        // Check if a record exists
        $this->db->where('admin_id', $data_rn->id);
        $this->db->where('session_id', $session_id);
        $query = $this->db->get('gst_admin_ipdetails');
        $existing = $query->row();

        if ($existing) {
            // Update existing session entry
            $this->db->where('id', $existing->id);
            $this->db->update('gst_admin_ipdetails', array(
                'current_login' => $current_login,
               
               
            ));
        } else {
            // Insert new session entry
             
            $this->db->insert('gst_admin_ipdetails', array(
                'admin_id'       => $data_rn->id,
                'session_id'    => $session_id,
                'current_login' => $current_login,
                'ip_address'    => $ip_address
            ));
        }

        return 1;
    } else {
        return 0;
    }
}

public function getIPAddress() {  
    
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
			$ip = $_SERVER['HTTP_CLIENT_IP'];  
		}   
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
		}   
		else{  
			$ip = $_SERVER['REMOTE_ADDR'];  
		}  
		return $ip;  
	}  




public function logout()
{
    $admin_id = $this->session->userdata('gst_admins_id');
    $session_id = session_id();

    if ($admin_id) {
        // Update the logout_time in gst_admin_Ipdetail
        $this->db->where('admin_id', $admin_id);
        $this->db->where('session_id', $session_id);
        $this->db->update('gst_admin_ipdetails', [
            'last_logout' => date('Y-m-d H:i:s')
        ]);
    }

    // Clear session
    $this->session->unset_userdata('gst_admins_id');
    $this->session->sess_destroy();

    return true;
}


    
    public function get_login_information()
	{
		if($this->session->userdata('gst_admins_id')){
			$this->db->select('*');
			$this->db->from('gst_admin');
			$this->db->where('id',$this->session->userdata('gst_admins_id'));
			$query = $this->db->get();
			return $data_rn= $query->row();
		}else{
			return false;
		}
	}

    public function get_userIp_list()
    {
        $this->db->select('uip.*, u.name,u.email,u.contact'); 
        $this->db->from('gst_user_ipdetails uip');
        $this->db->join('gst_user u', 'u.id = uip.user_id', 'left');
        $this->db->order_by('uip.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }

public function get_user_list($limit, $start)
{
    $this->db->select('u.*');
    $this->db->from('gst_user u');
    $this->db->where('u.status', 0); // same condition
    $this->db->order_by('u.id', 'ASC');
    $this->db->limit($limit, $start);

    return $this->db->get()->result();
}
    
  public function count_users()
{
    $this->db->where('status', 0); // only pending
    return $this->db->count_all_results('gst_user');
}

public function get_user_approval_list($limit, $start)
{
    $this->db->select('u.*');
    $this->db->from('gst_user u');
    $this->db->where('u.status', 1); // same condition
    $this->db->order_by('u.id', 'ASC');
    $this->db->limit($limit, $start);

    return $this->db->get()->result();
}
    
  public function count_users_approval()
{
    $this->db->where('status', 1); // only pending
    return $this->db->count_all_results('gst_user');
}

public function get_user_unapprove_list($limit, $start)
{
    $this->db->select('u.*');
    $this->db->from('gst_user u');
    $this->db->where('u.status', 2); // same condition
    $this->db->order_by('u.id', 'ASC');
    $this->db->limit($limit, $start);

    return $this->db->get()->result();
}
    
  public function count_users_unapprove_list()
{
    $this->db->where('status', 2); // only pending
    return $this->db->count_all_results('gst_user');
}

   public function get_user_access_details_info($data)
{
    $this->db->select('uip.*, u.name, u.email, u.contact');
    $this->db->from('gst_user_ipdetails uip');
    $this->db->join('gst_user u', 'u.id = uip.user_id', 'left');
    $this->db->where('uip.user_id', $data['id']);
    $this->db->order_by('uip.id', 'desc'); // optional: latest first
    $query = $this->db->get();
    $results = $query->result();

    // Prepare response
    $response = [
        'name'    => '',
        'email'   => '',
        'contact' => '',
        'logs'    => [],
    ];

    if (!empty($results)) {
        $response['name']    = $results[0]->name;
        $response['email']   = $results[0]->email;
        $response['contact'] = $results[0]->contact;

        foreach ($results as $row) {
            $response['logs'][] = (object)[
                'id'            => $row->id,
                'ip_address'    => $row->ip_address,
                'current_login' => $row->current_login,
                'last_logout'   => $row->last_logout,
                'session_id'    => $row->session_id
            ];
        }
    }

    return $response;
}

public function send_mail($to, $subject, $body)
{
    $this->load->library('email');

    // Basic email configuration
   $config1=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html'
		);

    $this->email->initialize($config1);
    $this->email->from('testerqr110@gmail.com', 'GST Demo'); 
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($body);

   $mail = $this->email->send();
}

    

public function save_admin($data)
{ 
    if ($data['name'] != "" && $data['email'] != "") 
    {
        // Save admin first
        $this->db->insert('gst_admin', array(
            'id' => NULL,
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'password' => $data['password'],
            'created_date' => $data['created_date'],
            'type' => $data['type'],
        ));

        $id = $this->db->insert_id(); 

       
        $asubject1 = 'GST Demo - ' . $data['name'];
        $abody = "Your admin account has been created.<br><br><strong>Username:</strong> " . $data['email'] . "<br><strong>Password:</strong> " . $data['password'];

        $mail_to_admin = $this->Admin_model->send_mail($data['email'], $asubject1, $abody);

        return $id;  
    } 
    else 
    {
        return 0; 
    }
}





 function get_check_unique($data)
	{
			$this->load->library('session');
			$this->db->select('*');
			$this->db->from($data['table']);
			$this->db->where($data['filed'],@$data['value']);
			if(@$data['other_column']){
				$this->db->where($data['other_column'],$data['other_value']);
			}
 			$query = $this->db->get();
			$data_rn= $query->row();
			$return_d['sucess']=1;
			if(@$data_rn->id){
				if($data['record_id']){
					if($data['record_id']==$data_rn->id){
						$return_d['sucess']=1;
					}else{
					$return_d['sucess']=0;
					}
				}else{
					$return_d['sucess']=0;
				}
			}
			return $return_d;
	}    

    public function get_admin_list()
    {
        $this->db->select('a.*'); 
        $this->db->from('gst_admin a');
        $this->db->order_by('a.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }

     public function get_admin_access_details_info($data)
{
    $this->db->select('uip.*, u.name, u.email, u.contact');
    $this->db->from('gst_admin_ipdetails uip');
    $this->db->join('gst_admin u', 'u.id = uip.admin_id', 'left');
    $this->db->where('uip.admin_id', $data['id']);
    $this->db->order_by('uip.id', 'desc'); // optional: latest first
    $query = $this->db->get();
    $results = $query->result();

    // Prepare response
    $response = [
        'name'    => '',
        'email'   => '',
        'contact' => '',
        'logs'    => [],
    ];

    if (!empty($results)) {
        $response['name']    = $results[0]->name;
        $response['email']   = $results[0]->email;
        $response['contact'] = $results[0]->contact;

        foreach ($results as $row) {
            $response['logs'][] = (object)[
                'id'            => $row->id,
                'ip_address'    => $row->ip_address,
                'current_login' => $row->current_login,
                'last_logout'   => $row->last_logout,
                'session_id'    => $row->session_id
            ];
        }
    }

    return $response;
}




}