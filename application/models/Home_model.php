<?php
require FCPATH.'application/aws/aws-autoloader.php';
use Aws\S3\S3Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
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

    public function send_mail($to, $subject, $body, $files = NULL)
    {
        $this->load->library('email');
    
        $smtp_user = getenv('SMTP_USER') ?: 'gsteducationportal@gmail.com';

        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => $smtp_user,
            'smtp_pass' => getenv('SMTP_PASS') ?: '',
            'smtp_crypto' => 'ssl',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'crlf'      => "\r\n"
        );

        $this->email->initialize($config);

        // IMPORTANT: use same email as smtp_user
        $this->email->from($smtp_user, 'GST');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);
    
        if ($files) {
            $this->email->attach($files);
        }
    
        if ($this->email->send()) {
            return true;
        } else {
            log_message('error', 'send_mail failed to ' . (is_array($to) ? implode(',', $to) : $to) . ': ' . $this->email->print_debugger(array('headers')));
            return false;
        }
    }
	
		public function send_link_set_password($data = FALSE)
	{
			
		$this->db->select('*');
		$this->db->from('gst_user');
		$this->db->where('email', $data['email']);
		$query = $this->db->get();
		$data_rn= $query->row();
		if($data_rn->id)
		{
			$varification_code = rand(000000,999999);
			$data['varification_code']=$varification_code;
			$expires = date('Y-m-d H:i:s', strtotime('+30 minutes'));

			$this->db->where('id', $data_rn->id); // update query
     		$this->db->update('gst_user', array('varification_code' =>$varification_code, 'varification_code_expires' => $expires));
     		 // echo $this->db->last_query();

    //  		$data['settings']=$this->Home_model->get_setting(); 
     		$data['user_data']=$data_rn;

            $user_id = base64_encode($data_rn->id);
            $varification_code = base64_encode($varification_code);

            $data['reset_link'] = base_url('home/reset_password/'.$user_id.'/'.$varification_code);
			$asubject1='GST- Reset Password link';
			$abody = $this->load->view('emails/reset_password_mail',$data,true);
			$mail_to_admin=$this->Home_model->send_mail($data['user_data']->email, $asubject1, $abody );
			
         if($mail_to_admin){
                return 1;
            } else {
                return 0;
            }
            			
		}
		
			
			 
	}
	
	public function check_link_set_password($data = FALSE)
	{
			
		$this->db->select('*');
		$this->db->from('gst_user');
		$this->db->where('id', $data['user_id']);
		$this->db->where('varification_code', $data['varification_code']);
		$query = $this->db->get();
		$data_rn= $query->row();
		if($data_rn && $data_rn->id)
		{
			if (empty($data_rn->varification_code_expires) || strtotime($data_rn->varification_code_expires) < time()) {
				return 0; // expired
			}
			return 1;
		}else{
			return 0;
		}
	}
	
public function save_new_password($data)
{
    
    $this->db->where('id', $data['user_id']);
    $this->db->where('varification_code', $data['varification_code']);
    $user = $this->db->get('gst_user')->row();

    if (!$user) {
        return 0;
    }
    if (empty($user->varification_code_expires) || strtotime($user->varification_code_expires) < time()) {
        return 0; // expired
    }

    // Stored plain text by design -- see get_login() for why.
    $this->db->where('id', $data['user_id']);
    $this->db->update('gst_user', array(
        'password' => $data['password'],
        'confirm_password' => $data['password'],
        'varification_code' => NULL,
        'varification_code_expires' => NULL
    ));

    return ($this->db->affected_rows() > 0) ? 1 : 0;
}


	public function save_user($data)
	{ 
	
		$this->db->insert('gst_user', array('id' => NULL ,'name' => $data['name'],'email'=>$data['email'],'contact'=>$data['contact'],'course'=>$data['course'],'password'=>$data['password'],'confirm_password'=>$data['confirm_password'],'created_date'=>$data['created_date'],'is_active'=>$data['is_active'],'status'=>$data['status']));
		$id=$this->db->insert_id(); 
 		return $id; 
	}
	
	public function save_taxpayer($data)
	{ 	

		if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_taxpayer', array( 'name'=>$data['name'],'gstno'=>$data['gstno'],'user_id'=>$data['user_id']));
			$id=$data['id'];
		}else{ 
			$this->db->insert('gst_taxpayer', array('id' => NULL ,'name' => $data['name'],'gstno'=>$data['gstno'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 


 		return $id; 
	}
	
//   public function get_taxpayer_info($data)
//     {
      
//         $this->db->select('*');
//         $this->db->from('gst_taxpayer');
//         $this->db->where('id', $data[0]->id);
//         $query = $this->db->get();
//         // print_r($query->row());die();
//         return $query->row(); 
//     }
    
    public function get_taxpayer_info($data)
    {
       
        $this->db->select('gst_taxpayer.*, gst_user.name as username, gst_user.email, gst_user.contact, gst_user.current_login');
        $this->db->from('gst_taxpayer');
        $this->db->join('gst_user', 'gst_user.id = gst_taxpayer.user_id', 'left');
        $this->db->where('gst_taxpayer.user_id', $data->user_id);
        
        $query = $this->db->get();
        // print_r($query->row());die();
        return $query->row(); 
    }

    
    public function get_taxpayer()
    {
        $this->db->select('*');
        $this->db->from('gst_taxpayer');
        $query = $this->db->get();
        return $query->result();
    }
    
//     public function get_login($data)
// {
//     $this->db->select('*');
//     $this->db->from('gst_user');
//     $this->db->where('email', $data['username']);
//     $this->db->where('password', $data['password']);
//     $this->db->where('is_active', 1);
//     $query = $this->db->get();
//     $data_rn = $query->row();

//     if (!empty($data_rn) && $data_rn->id) {
//         // Set session
//         $user_session['gst_users_id'] = $data_rn->id;
//         $this->session->set_userdata($user_session);

//         // Update login times in gst_user
//         $this->db->where('id', $data_rn->id);
//         $this->db->update('gst_user', array(
//             'last_login' => $data_rn->current_login,
//             'current_login' => date('Y-m-d H:i:s')
//         ));

       
//         $session_id = session_id();
//         $current_login = date('Y-m-d H:i:s');
//         // $ip_address = $this->input->ip_address();
//          $ip_address=Home_model::getIPAddress(); 

//         // Check if a record exists
//         $this->db->where('user_id', $data_rn->id);
//         $this->db->where('session_id', $session_id);
//         $query = $this->db->get('gst_user_ipdetails');
//         $existing = $query->row();

//         if ($existing) {
//             // Update existing session entry
//             $this->db->where('id', $existing->id);
//             $this->db->update('gst_user_ipdetails', array(
//                 'current_login' => $current_login,
               
               
//             ));
//         } else {
//             // Insert new session entry
             
//             $this->db->insert('gst_user_ipdetails', array(
//                 'user_id'       => $data_rn->id,
//                 'session_id'    => $session_id,
//                 'current_login' => $current_login,
//                 'ip_address'    => $ip_address
//             ));
//         }

//         return 1;
//     } else {
//         return 0;
//     }
// }

 public function get_login($data)
{
    $this->db->select('*');
    $this->db->from('gst_user');
    $this->db->where('email', $data['username']);
    // $this->db->where('status', 1);
    $this->db->where('is_active', 1);
    

    $query = $this->db->get();
    $data_rn = $query->row();

    if (!empty($data_rn) && $data_rn->id)
    {
         if ($data_rn->status != 1) {
            return 2; // approval required
        }
        $input_password = $data['password'];
        $db_password = $data_rn->password;

        
        if (
            password_verify($input_password, $db_password) // hashed
            || $input_password == $db_password            // plain
        )
        {
           

            // Passwords are stored in plain text by design (admin needs to
            // be able to view/tell students their password directly) -- do
            // not rehash a plaintext match into a bcrypt hash here.


            $this->session->set_userdata([
                'gst_users_id' => $data_rn->id
            ]);

            
            $this->db->where('id', $data_rn->id);
            $this->db->update('gst_user', [
                'last_login' => $data_rn->current_login,
                'current_login' => date('Y-m-d H:i:s')
            ]);
            
             $session_id = session_id();
        $current_login = date('Y-m-d H:i:s');
        // $ip_address = $this->input->ip_address();
         $ip_address=Home_model::getIPAddress(); 

        // Check if a record exists
        $this->db->where('user_id', $data_rn->id);
        $this->db->where('session_id', $session_id);
        $query = $this->db->get('gst_user_ipdetails');
        $existing = $query->row();

        if ($existing) {
            // Update existing session entry
            $this->db->where('id', $existing->id);
            $this->db->update('gst_user_ipdetails', array(
                'current_login' => $current_login,
               
               
            ));
        } else {
            // Insert new session entry
             
            $this->db->insert('gst_user_ipdetails', array(
                'user_id'       => $data_rn->id,
                'session_id'    => $session_id,
                'current_login' => $current_login,
                'ip_address'    => $ip_address
            ));
        }


            return 1;
        }
    }

    return 0;
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
    $user_id = $this->session->userdata('gst_users_id');
    $session_id = session_id();

    if ($user_id) {
        // Update the logout_time in gst_user_Ipdetail
        $this->db->where('user_id', $user_id);
        $this->db->where('session_id', $session_id);
        $this->db->update('gst_user_ipdetails', [
            'last_logout' => date('Y-m-d H:i:s')
        ]);
    }


    // Clear session
    $this->session->unset_userdata('gst_users_id');
    $this->session->sess_destroy();

    return true;
}


    
    public function get_login_information()
	{
		if($this->session->userdata('gst_users_id')){
			$this->db->select('*');
			$this->db->from('gst_user');
			$this->db->where('id',$this->session->userdata('gst_users_id'));
			$query = $this->db->get();
			return $data_rn= $query->row();
		}else{
			return false;
		}
	}

   
	
	public function get_pos_list($data)
	{
	  
		$this->db->select('*');
		$this->db->from('gst_pos');
		$this->db->order_by('id', 'ASC'); 
		$query = $this->db->get();
// 		echo  $this->db->last_query(); 
		return $data_rn= $query->result();
	}
	
	public function save_b2b_addInvoice($data)
	{ 	
			$this->db->insert('gst_invoice_master', array('id' => NULL ,'gstin_no' => $data['gstin_no'],'recipient_name' => $data['recipient_name'],'invoice_no'=>$data['invoice_no'],
			'date'=>$data['date'],'invoice_value'=>$data['invoice_value'],'pos_id'=>$data['pos_id'],'is_deemed'=>$data['is_deemed'],
			'is_supply'=>$data['is_supply'],'is_diff_perc'=>$data['is_diff_perc'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
 	    	return $id; 
	}
	
	public function save_b2b_invoice_detail($data)
    {
        $this->db->trans_start();
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->delete('gst_invoice_details');
        $this->db->insert('gst_invoice_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function get_return_b2b_summary_list($id)
    {
        $this->db->select('d.*, m.gstin_no,m.invoice_no,m.invoice_value,m.recipient_name,m.user_id'); 
        $this->db->from('gst_invoice_details d');
        $this->db->join('gst_invoice_master m', 'm.id = d.invoice_id', 'left');
        $this->db->where('user_id', $id);
        $this->db->order_by('d.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }

	
    public function get_total_b2b_taxable_value($data)
    {
        $this->db->select('
            SUM(taxable_value) AS total_taxable_value,
            SUM(tax) AS total_tax_value,
            (SUM(taxable_value) - SUM(tax)) AS integrated_value
        ');
        $this->db->from('gst_invoice_details i');
        $this->db->join('gst_invoice_master m', 'm.id = i.invoice_id', 'left');
        $this->db->where("m.user_id", $data['user_id']);
        $query = $this->db->get();
        return $query->row(); 
    }
    
    public function get_total_b2cl_taxable_value($data)
    {
        $this->db->select('
            COUNT(*) AS total_records,
            SUM(taxable_value) AS total_taxable_value,
            SUM(tax) AS total_tax_value,
            (SUM(taxable_value) - SUM(tax)) AS integrated_value,m.user_id
        ');
        $this->db->from('gst_b2cinvoice_details b2cl');
        $this->db->join('gst_b2cinvoice_master m', 'm.id = b2cl.invoice_id', 'left');
        $this->db->where("m.user_id", $data['user_id']);
        $query = $this->db->get();
        return $query->row(); 
    }

   

     public function get_total_registered_note_taxable_value($data)
{
    $this->db->select('
        COUNT(i.id) AS total_records,
        SUM(i.taxable_value) AS total_taxable_value,
        SUM(i.tax) AS total_tax_value,
        (SUM(i.taxable_value) - SUM(i.tax)) AS integrated_value
    ');
    $this->db->from('gst_registerednote_details i');
    $this->db->join('gst_registerednote m', 'm.id = i.invoice_id', 'left');
    $this->db->where('m.user_id', $data['user_id']);
    
    $query = $this->db->get();
    return $query->row();
}

    
   public function get_total_unregistered_note_taxable_value($data)
{
    $this->db->select('
        COUNT(d.id) AS total_records,
        SUM(d.taxable_value) AS total_taxable_value,
        SUM(d.tax) AS total_tax_value,
        (SUM(d.taxable_value) - SUM(d.tax)) AS integrated_value
    ');
    $this->db->from('gst_unregisterednote_details d');
    $this->db->join('gst_unregisterednote m', 'm.id = d.invoice_id', 'left');
    $this->db->where('m.user_id', $data['user_id']);
    
    $query = $this->db->get();
    return $query->row(); 
}

    
   
    public function get_total_b2cs_taxable_value($data)
{
    $this->db->select('
        COUNT(*) AS total_records,
        SUM(taxable_value) AS total_taxable_value,
        SUM(tax) AS total_tax_value,
        (SUM(taxable_value) - SUM(tax)) AS integrated_value
    ');
    $this->db->from('gst_b2cs');
    $this->db->where('user_id', $data['user_id']); 
    $query = $this->db->get();
    return $query->row(); 
}

    
     public function get_total_advtaxLiability_taxable_value($data)
{
    $this->db->select('
        COUNT(d.id) AS total_records,
        SUM(d.taxable_value) AS total_taxable_value,
        SUM(d.tax) AS total_tax_value,
        (SUM(d.taxable_value) - SUM(d.tax)) AS integrated_value
    ');
    $this->db->from('gst_advtaxliability_details d');
    $this->db->join('gst_advtaxliability m', 'm.id = d.invoice_id', 'left');
    $this->db->where('m.user_id', $data['user_id']);

    $query = $this->db->get();
    return $query->row(); 
}

    
   public function get_total_taxPaid_taxable_value($data)
{
    $this->db->select('
        COUNT(d.id) AS total_records,
        SUM(d.taxable_value) AS total_taxable_value,
        SUM(d.tax) AS total_tax_value,
        (SUM(d.taxable_value) - SUM(d.tax)) AS integrated_value
    ');
    $this->db->from('gst_taxpaid_details d');
    $this->db->join('gst_taxpaid m', 'm.id = d.invoice_id', 'left');
    $this->db->where('m.user_id', $data['user_id']);

    $query = $this->db->get();
    return $query->row(); 
}

    
   public function get_total_hsn_taxable_value($data)
{
    $this->db->select('
        COUNT(*) AS total_records,
        SUM(taxable_value) AS total_taxable_value,
        SUM(integrated_tax) AS total_tax_value,
        SUM(central_tax) AS central_tax,
        SUM(state_tax) AS state_tax,
        SUM(cess) AS cess,
        (SUM(taxable_value) - SUM(integrated_tax)) AS integrated_value
    ');
    $this->db->from('gst_hsn');
    $this->db->where('user_id', $data['user_id']); // apply user_id filter

    $query = $this->db->get();
    return $query->row(); 
}

    
    public function get_total_ecom_value($data)
{
    $this->db->select('
        COUNT(*) AS total_records,
        SUM(net_value) AS net_value,
        SUM(integrated_tax) AS total_tax_value,
        SUM(central_tax) AS central_tax,
        SUM(state_tax) AS state_tax,
        SUM(cess) AS cess,
        (SUM(net_value) - SUM(integrated_tax)) AS integrated_value
    ');
    $this->db->from('gst_onlineecom');
    $this->db->where('user_id', $data['user_id']); // Apply user_id filter

    $query = $this->db->get();
    return $query->row(); 
}

    

    public function get_total_return_b2b_count($data)
    {
    	$this->db->from('gst_invoice_master');
        $this->db->where("user_id", $data['user_id']);
    	return $this->db->count_all_results(); 
    }

	
	public function save_b2c_addInvoice($data)
	{ 	
			
 	    	if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_b2cinvoice_master', array('invoice_no'=>$data['invoice_no'],
			'date'=>$data['date'],'invoice_value'=>$data['invoice_value'],'pos_id'=>$data['pos_id'],'is_supplies'=>$data['is_supplies']));
				$id=$data['id'];
		}else{ 
			$this->db->insert('gst_b2cinvoice_master', array('id' => NULL ,'invoice_no'=>$data['invoice_no'],
			'date'=>$data['date'],'invoice_value'=>$data['invoice_value'],'pos_id'=>$data['pos_id'],'is_supplies'=>$data['is_supplies'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	}
	
		public function save_b2c_invoice_detail($data)
    {
        $this->db->trans_start();
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->delete('gst_b2cinvoice_details');
        $this->db->insert('gst_b2cinvoice_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function get_b2c_summary_list($data = false, $lang_id = 1)
    {
        // Pagination 
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];
        }
    
        $subquery = "(SELECT MAX(id) AS max_id FROM gst_b2cinvoice_details GROUP BY invoice_id)";
        
        $this->db->select("ed.*, e.invoice_no, e.date, e.invoice_value, e.pos_id, p.state_id,p.state_name");
        $this->db->from("gst_b2cinvoice_details AS ed");
        $this->db->join("gst_b2cinvoice_master AS e", "ed.invoice_id = e.id", "inner");
        $this->db->join("gst_pos AS p", "e.pos_id = p.id", "left"); // Join with gst_pos
    
        $this->db->where("ed.id IN $subquery", null, false);
        $this->db->where('e.user_id', $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']);
    
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);
        }
    
        $query = $this->db->get();
        $results['records'] = $query->result();
    
        $this->db->from("gst_b2cinvoice_details AS ed");
          $this->db->join("gst_b2cinvoice_master AS e", "ed.invoice_id = e.id", "inner");

        $this->db->where("ed.id IN $subquery", null, false);
       if (!empty($data['user_id'])) {
        $this->db->where("e.user_id", $data['user_id']);
    }
        $query2 = $this->db->get();
        $results['all_count'] = $query2->num_rows();
    
        return $results;
    }

    
     public function get_b2c_info($data) 
	{
	  
	    $this->db->select('*');
        $this->db->from('gst_b2cinvoice_master');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $data_rn= $query->row();
        return $data_rn;  
	}
     public function get_b2b_info($data) 
	{
	  
	    $this->db->select('*');
        $this->db->from('gst_invoice_master');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $data_rn= $query->row();
        return $data_rn;  
	}

    //  public function get_b2b_detail_info($data)
    // {
       
    //     $invoice_id = is_array($data) ? $data['id'] : $data;
    
    //     $this->db->select('*');
    //     $this->db->from('gst_invoice_details');
    //     $this->db->where('invoice_id', $invoice_id);
    //     $this->db->order_by('id', 'DESC');
    //     $this->db->limit(1);
    
    //     $query = $this->db->get();
    //     return $query->row(); 
    // }
	
   public function get_b2c_detail_info($data)
    {
       
        $invoice_id = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('*');
        $this->db->from('gst_b2cinvoice_details');
        $this->db->where('invoice_id', $invoice_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
    
        $query = $this->db->get();
        return $query->row(); 
    }


    
    public function get_b2b_detail_info($data)
    {
        // print_r($data);die();
        $gst_no = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('d.*, m.invoice_no, m.date, m.gstin_no, m.recipient_name,m.invoice_value,'); 
        $this->db->from('gst_invoice_details d');
        $this->db->join('gst_invoice_master m', 'm.id = d.invoice_id', 'left'); // join on invoice_id
        $this->db->where('m.gstin_no', $gst_no);
         $this->db->where('m.user_id', $data['user_id']);
        $this->db->order_by('d.id', 'DESC');
    
        $query = $this->db->get();
        return $query->result(); 
    }

    public function get_registered_detail_info($data)
    {
        // print_r($data);die();
        $gst_no = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('d.*, m.*'); 
        $this->db->from('gst_registerednote_details d');
        $this->db->join('gst_registerednote m', 'm.id = d.invoice_id', 'left'); // join on invoice_id
        $this->db->where('m.gstin_no', $gst_no);
        $this->db->where('m.user_id', $data['user_id']);
        $this->db->order_by('d.id', 'DESC');
    
        $query = $this->db->get();
        return $query->result(); 
    }

    public function b2b_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_invoice_master')->row()) {
            return false; // not found, or doesn't belong to this user
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_invoice_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_invoice_master');

        return true;

    }

    public function register_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_registerednote')->row()) {
            return false;
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_registerednote_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_registerednote');

        return true;

    }

    public function b2c_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_b2cinvoice_master')->row()) {
            return false;
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_b2cinvoice_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_b2cinvoice_master');

        return true;

    }

    
    public function save_exports_invoiceadd($data)
	{ 	
	    
	    	if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_exportinvoice', array('invoice_no'=>$data['invoice_no'],
			'date'=>$data['date'],'invoice_value'=>$data['invoice_value'],'port_code'=>$data['port_code'],'shipping_bill_no'=>$data['shipping_bill_no'],
			'shipping_bill_date'=>$data['shipping_bill_date'],'gst_payment'=>$data['gst_payment']));
				$id=$data['id'];
		}else{ 
			$this->db->insert('gst_exportinvoice', array('id' => NULL ,'invoice_no'=>$data['invoice_no'],
			'date'=>$data['date'],'invoice_value'=>$data['invoice_value'],'port_code'=>$data['port_code'],'shipping_bill_no'=>$data['shipping_bill_no'],
			'shipping_bill_date'=>$data['shipping_bill_date'],'gst_payment'=>$data['gst_payment'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
    public function save_exports_invoiceadd_detail($data)
    {
        $this->db->trans_start();
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->delete('gst_exportsinvoice_details');
        $this->db->insert('gst_exportsinvoice_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

	public function get_exports_invoice_list($data = false, $lang_id = 1)
    {
        // Pagination 
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];
        }
        $subquery = "(SELECT MAX(id) AS max_id FROM gst_exportsinvoice_details GROUP BY invoice_id)";
    
        $this->db->select("ed.*, e.invoice_no, e.date, e.port_code, e.shipping_bill_no, e.shipping_bill_date, e.invoice_value, e.supply_type, e.gst_payment,
            e.source, e.IRN, e.IRN_date");
        $this->db->from("gst_exportsinvoice_details AS ed");
        $this->db->join("gst_exportinvoice AS e", "ed.invoice_id = e.id", "inner");
    
        $this->db->where("ed.id IN $subquery", null, false);
         $this->db->where("e.user_id", $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']);
    
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);
        }
    
        $query = $this->db->get();
        $results['records'] = $query->result();
    
        $this->db->from("gst_exportsinvoice_details AS ed");
        $this->db->where("ed.id IN $subquery", null, false);
        $this->db->join("gst_exportinvoice AS e", "ed.invoice_id = e.id", "inner");
        $this->db->where("e.user_id", $data['user_id']);
        $query2 = $this->db->get();
        $results['all_count'] = $query2->num_rows();
    
        return $results;
    }
    
  public function get_total_exports_taxable_value($data)
{
    $this->db->select('
        COUNT(*) AS total_records,
        SUM(ed.taxable_value) AS total_taxable_value,
        SUM(ed.tax) AS total_tax_value,
        (SUM(ed.taxable_value) - SUM(ed.tax)) AS integrated_value
    ');
    $this->db->from('gst_exportsinvoice_details AS ed');
    $this->db->join('gst_exportinvoice AS m', 'm.id = ed.invoice_id', 'left');
    $this->db->where('ed.id IN (
        SELECT MAX(id) FROM gst_exportsinvoice_details GROUP BY invoice_id
    )', null, false); // Raw SQL for subquery
    $this->db->where('m.user_id', $data['user_id']); // Filter by user

    $query = $this->db->get();
    return $query->row();  
}

    
   
    
    public function export_invoice_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_exportinvoice')->row()) {
            return false;
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_exportsinvoice_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_exportinvoice');
        return true;

    }
  
    public function get_exports_invoice_info($data)
	{
	  
	    $this->db->select('*');
        $this->db->from('gst_exportinvoice');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $data_rn= $query->row();
        return $data_rn;  
	}
	
   public function get_exports_invoice_detail_info($data)
    {
       
        $invoice_id = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('*');
        $this->db->from('gst_exportsinvoice_details');
        $this->db->where('invoice_id', $invoice_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
    
        $query = $this->db->get();
        return $query->row(); 
    }

   
    
     public function save_b2cs_addInvoice($data)
	{ 	
	    
	    	if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_b2cs', array('pos_id'=>$data['pos_id'],
			'taxable_value'=>$data['taxable_value'],'is_diff_perc'=>$data['is_diff_perc'],'rate'=>$data['rate'],
			'tax'=>$data['tax'],'cess'=>$data['cess']));
				$id=$data['id'];
		}else{ 
			$this->db->insert('gst_b2cs', array('id' => NULL ,'pos_id'=>$data['pos_id'],
			'taxable_value'=>$data['taxable_value'],'is_diff_perc'=>$data['is_diff_perc'],'rate'=>$data['rate'],
			'tax'=>$data['tax'],'cess'=>$data['cess'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
    public function get_b2cs_list($data = false, $lang_id = 1)
    { 
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];    
        }
    
        $this->db->select("b2cs.*, gst_pos.state_id as state_id,gst_pos.state_name as state_name"); 
        $this->db->from('gst_b2cs b2cs');
        $this->db->join('gst_pos', 'b2cs.pos_id = gst_pos.id', 'left'); 
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);   
        }
        $this->db->where("b2cs.user_id", $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']); 
        $query = $this->db->get(); 
    
        $results['records'] = $query->result(); 
    
        // Count total rows
        $this->db->from('gst_b2cs b2cs');
        $this->db->join('gst_pos', 'b2cs.pos_id = gst_pos.id', 'left');
         $this->db->where("b2cs.user_id", $data['user_id']);
        $query2 = $this->db->get(); 
        $results['all_count'] = $query2->num_rows();
    
        return $results; 
    }
    
    public function get_b2cs_Invoice_info($data)
    {
        $this->db->select('b.*,p.state_id as state_id, p.state_name as state_name');
        $this->db->from('gst_b2cs b');
        $this->db->join('gst_pos p', 'b.pos_id = p.id', 'left'); 
        $this->db->where('b.id', $data['id']);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    public function b2cs_Invoice_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_b2cs');
        return $this->db->affected_rows() > 0;
    }
    
	
	public function save_online_nil_rated_supplies($data)
    {
       $user_id = isset($data[0]['user_id']) ? $data[0]['user_id'] : 0;

        $this->db->trans_start();
        // Delete existing records only for this user
        $this->db->where('user_id', $user_id);
        $this->db->delete('gst_onlinenil');
        $this->db->insert_batch('gst_onlinenil', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    
    public function get_online_nil_rated_supplies_info($id)
    {
      
        $this->db->select('*');
        $this->db->from('gst_onlinenil');
        $this->db->where("user_id", $id);
        $query = $this->db->get();
        return $query->result(); 
    }
    
    	public function save_registered_noteadd($data)
	{ 	
			$this->db->insert('gst_registerednote', array('id' => NULL ,'gstin_no' => $data['gstin_no'],'recipient_name' => $data['recipient_name'],'note_no'=>$data['note_no'],
			'note_date'=>$data['note_date'],'note_type'=>$data['note_type'],'note_value'=>$data['note_value'],'pos_id'=>$data['pos_id'],'is_deemed'=>$data['is_deemed'],
			'is_supply'=>$data['is_supply'],'is_diff_perc'=>$data['is_diff_perc'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
 	    	return $id; 
	}
	
	public function save_registered_noteadd_detail($data)
    {
        $this->db->trans_start();
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->delete('gst_registerednote_details');
        $this->db->insert('gst_registerednote_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function get_registered_summary_list($data)
	{
		$this->db->select('*');
		$this->db->from('gst_registerednote');
        $this->db->where("user_id", $data['user_id']);
		$this->db->order_by('id', 'ASC'); 
		$query = $this->db->get();
		return $data_rn= $query->result();
	}
	
	public function save_unregistered_noteadd($data)
	{ 	
	    
	    	if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_unregisterednote', array('is_diff_perc'=>$data['is_diff_perc'],
			'type'=>$data['type'],'note_no'=>$data['note_no'],'note_date'=>$data['note_date'],'note_type'=>$data['note_type'],
			'note_value'=>$data['note_value'],'pos_id'=>$data['pos_id']));
				$id=$data['id'];
		}else{ 
			$this->db->insert('gst_unregisterednote', array('id' => NULL ,'is_diff_perc'=>$data['is_diff_perc'],
			'type'=>$data['type'],'note_no'=>$data['note_no'],'note_date'=>$data['note_date'],'note_type'=>$data['note_type'],
			'note_value'=>$data['note_value'],'pos_id'=>$data['pos_id'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
	public function save_unregistered_noteadd_detail($data)
    {
        $this->db->trans_start();
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->delete('gst_unregisterednote_details');
        $this->db->insert('gst_unregisterednote_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function get_unregistered_note_list($data = false, $lang_id = 1)
    {
        // Pagination
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];
        }
    
        $subquery = "(SELECT MAX(id) AS max_id FROM gst_unregisterednote_details GROUP BY invoice_id)";
    
        $this->db->select("ud.*, u.is_diff_perc, u.type, u.note_no, u.note_date, u.note_type, 
            u.note_value, u.pos_id, u.supply_type, u.source, u.INR, u.INR_date");
        $this->db->from("gst_unregisterednote_details AS ud");
        $this->db->join("gst_unregisterednote AS u", "ud.invoice_id = u.id", "inner");
    
        $this->db->where("ud.id IN $subquery", null, false);
        $this->db->where("u.user_id", $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']);
    
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);
        }
    
        $query = $this->db->get();
        $results['records'] = $query->result();
    
        // Count total
        $this->db->from("gst_unregisterednote_details AS ud");
        $this->db->join("gst_unregisterednote AS u", "ud.invoice_id = u.id", "inner");
        $this->db->where("ud.id IN $subquery", null, false);
         $this->db->where("u.user_id", $data['user_id']);
        $query2 = $this->db->get();
        $results['all_count'] = $query2->num_rows();
    
        return $results;
    }

    public function get_unregistered_note_info($data)
	{
	  
	    $this->db->select('*');
        $this->db->from('gst_unregisterednote');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $data_rn= $query->row();
        return $data_rn;  
	}
	
    public function get_unregistered_note_detail_info($data)
    {
       
        $invoice_id = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('*');
        $this->db->from('gst_unregisterednote_details');
        $this->db->where('invoice_id', $invoice_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
    
        $query = $this->db->get();
        return $query->row(); 
    }
    
    public function unregistered_note_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_unregisterednote')->row()) {
            return false;
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_unregisterednote_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_unregisterednote');

        return true;

    }
    
    public function save_advtax_liability($data)
	{ 	
	    
	   if(@$data['id']){ 
		$this->db->where('id', $data['id']); 
		$this->db->update('gst_advtaxliability', array('is_diff_perc'=>$data['is_diff_perc'],'pos_id'=>$data['pos_id']));
		$id=$data['id'];
		}else{ 
			$this->db->insert('gst_advtaxliability', array('id' => NULL ,'is_diff_perc'=>$data['is_diff_perc'],'pos_id'=>$data['pos_id'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
	public function save_advtax_liability_detail($data)
    {
        $this->db->trans_start();
        if (@$data['invoice_id']) {
            $this->db->where('invoice_id', $data['invoice_id']);
            $this->db->delete('gst_advtaxliability_details');
        }
        $this->db->insert('gst_advtaxliability_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    
    public function get_advtax_liability_list($data = false, $lang_id = 1)
    {
        // Pagination
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];
        }
    
        $subquery = "(SELECT MAX(id) AS max_id FROM gst_advtaxliability_details GROUP BY invoice_id)";
    
        $this->db->select("ud.*, u.is_diff_perc, u.pos_id, u.supply_type, p.state_id,p.state_name,u.user_id");
        $this->db->from("gst_advtaxliability_details AS ud");
        $this->db->join("gst_advtaxliability AS u", "ud.invoice_id = u.id", "inner");
        $this->db->join("gst_pos AS p", "u.pos_id = p.id", "left");
    
        $this->db->where("ud.id IN $subquery", null, false);
        $this->db->where("u.user_id", $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']);
    
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);
        }
    
        $query = $this->db->get();
        $results['records'] = $query->result();
    
        // Count total
        $this->db->from("gst_advtaxliability_details AS ud");
        $this->db->join("gst_advtaxliability AS u", "ud.invoice_id = u.id", "inner");
        $this->db->where("ud.id IN $subquery", null, false);
         $this->db->where("u.user_id", $data['user_id']);
        $query2 = $this->db->get();
        $results['all_count'] = $query2->num_rows();
    
        return $results;
    }
    
    public function get_advtax_liability_info($data)
	{
	  
	    $this->db->select('*');
        $this->db->from('gst_advtaxliability');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $data_rn= $query->row();
        return $data_rn;  
	}
	
    public function get_advtax_liability_detail_info($data)
    {
       
        $invoice_id = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('*');
        $this->db->from('gst_advtaxliability_details');
        $this->db->where('invoice_id', $invoice_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
    
        $query = $this->db->get();
        return $query->row(); 
    }
    
    public function advtax_liability_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_advtaxliability')->row()) {
            return false;
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_advtaxliability_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_advtaxliability');

        return true;
    
    }
    
     public function save_tax_paid($data)
	{ 	
	    
	   if(@$data['id']){ 
		$this->db->where('id', $data['id']); 
		$this->db->update('gst_taxpaid', array('is_diff_perc'=>$data['is_diff_perc'],'pos_id'=>$data['pos_id']));
		$id=$data['id'];
		}else{ 
			$this->db->insert('gst_taxpaid', array('id' => NULL ,'is_diff_perc'=>$data['is_diff_perc'],'pos_id'=>$data['pos_id'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
	public function save_tax_paid_detail($data)
    {
        $this->db->trans_start();
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->delete('gst_taxpaid_details');
        $this->db->insert('gst_taxpaid_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function get_tax_paid_list($data = false, $lang_id = 1)
    {
        // Pagination
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];
        }
    
        $subquery = "(SELECT MAX(id) AS max_id FROM gst_taxpaid_details GROUP BY invoice_id)";
    
        $this->db->select("ud.*, u.is_diff_perc, u.pos_id, u.supply_type, p.state_id,p.state_name,u.user_id");
        $this->db->from("gst_taxpaid_details AS ud");
        $this->db->join("gst_taxpaid AS u", "ud.invoice_id = u.id", "inner");
        $this->db->join("gst_pos AS p", "u.pos_id = p.id", "left");
    
        $this->db->where("ud.id IN $subquery", null, false);
         $this->db->where("u.user_id", $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']);
    
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);
        }
    
        $query = $this->db->get();
        $results['records'] = $query->result();
    
        // Count total
        $this->db->from("gst_taxpaid_details AS ud");
        $this->db->join("gst_taxpaid AS u", "ud.invoice_id = u.id", "inner");
        $this->db->where("ud.id IN $subquery", null, false);
        $this->db->where("u.user_id", $data['user_id']);
        $query2 = $this->db->get();
        $results['all_count'] = $query2->num_rows();
    
        return $results;
    }
    
     public function get_tax_paid_info($data)
	{
	  
	    $this->db->select('*');
        $this->db->from('gst_taxpaid');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $data_rn= $query->row();
        return $data_rn;  
	}
	
    public function get_tax_paid_detail_info($data)
    {
       
        $invoice_id = is_array($data) ? $data['id'] : $data;
    
        $this->db->select('*');
        $this->db->from('gst_taxpaid_details');
        $this->db->where('invoice_id', $invoice_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
    
        $query = $this->db->get();
        return $query->row(); 
    }
    
    public function tax_paid_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        if (!$this->db->get('gst_taxpaid')->row()) {
            return false;
        }
        $this->db->where('invoice_id',$data['id']);
        $this->db->delete('gst_taxpaid_details');
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_taxpaid');

        return true;
    
    }
    
    public function save_online_ecom($data)
	{ 	
	    	if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_onlineecom', array('gstin_no'=>$data['gstin_no'],'net_value'=>$data['net_value'],'integrated_tax'=>$data['integrated_tax'],'central_tax'=>$data['central_tax'],
			'state_tax'=>$data['state_tax'],'cess'=>$data['cess']));
				$id=$data['id'];
		}else{ 
			$this->db->insert('gst_onlineecom', array('id' => NULL ,'gstin_no'=>$data['gstin_no'],'net_value'=>$data['net_value'],'integrated_tax'=>$data['integrated_tax'],'central_tax'=>$data['central_tax'],
			'state_tax'=>$data['state_tax'],'cess'=>$data['cess'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
	public function get_online_ecom_list($data = false, $lang_id = 1)
    { 
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];    
        }
    
        $this->db->select("e.*"); 
        $this->db->from('gst_onlineecom e');
        $this->db->where("e.user_id", $data['user_id']);
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);   
        }
    
        $this->db->order_by($data['sort_by'], $data['sort_order']); 
        $query = $this->db->get(); 
    
        $results['records'] = $query->result(); 
    
        // Count total rows
        $this->db->from('gst_onlineecom e');
         $this->db->where("e.user_id", $data['user_id']);
        $query2 = $this->db->get(); 
        $results['all_count'] = $query2->num_rows();
    
        return $results; 
    }
    
    public function get_online_ecom_info($data)
    {
        $this->db->select('e.*');
        $this->db->from('gst_onlineecom e');
        $this->db->where('e.id', $data['id']);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    public function online_ecom_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_onlineecom');
        return $this->db->affected_rows() > 0;
    }
    
    public function save_hsn_summary($data)
	{ 	
	   
	    
	    	if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_hsn', array('hsn_number'=>$data['hsn_number'],'description'=>$data['description'],
			'uqc'=>$data['uqc'],'total_quantity'=>$data['total_quantity'],'taxable_value'=>$data['taxable_value'],'rate'=>$data['rate'],'integrated_tax'=>$data['integrated_tax'],'central_tax'=>$data['central_tax'],
			'state_tax'=>$data['state_tax'],'cess'=>$data['cess']));
			$id=$data['id'];
		}else{ 
			$this->db->insert('gst_hsn', array('id' => NULL ,'hsn_number'=>$data['hsn_number'],'description'=>$data['description'],
			'uqc'=>$data['uqc'],'total_quantity'=>$data['total_quantity'],'taxable_value'=>$data['taxable_value'],'rate'=>$data['rate'],'integrated_tax'=>$data['integrated_tax'],'central_tax'=>$data['central_tax'],
			'state_tax'=>$data['state_tax'],'cess'=>$data['cess'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}

    public function get_hsn_summary_list($data = false, $lang_id = 1)
    { 
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];    
        }
    
        $this->db->select("h.*"); 
        $this->db->from('gst_hsn h');
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);   
        }
        $this->db->where("h.user_id", $data['user_id']);
        $this->db->order_by($data['sort_by'], $data['sort_order']); 
        $query = $this->db->get(); 
    
        $results['records'] = $query->result(); 
    
        // Count total rows
        $this->db->from('gst_hsn h');
        $this->db->where("h.user_id", $data['user_id']);
        $query2 = $this->db->get(); 
        $results['all_count'] = $query2->num_rows();
    
        return $results; 
    }
    
     public function get_hsn_summary_info($data)
    {
        $this->db->select('h.*');
        $this->db->from('gst_hsn h');
        $this->db->where('h.id', $data['id']);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    public function hsn_summary_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_hsn');
        return $this->db->affected_rows() > 0;
    }
    
    public function save_online_supplies($data)
	{ 	
		if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_online_supplies', array('is_deemed'=>$data['is_deemed'],'supplier_gstin_no'=>$data['supplier_gstin_no'],
			'recipient_gstin_no'=>$data['recipient_gstin_no'],'document_no'=>$data['document_no'],'document_date'=>$data['document_date'],'total_value'=>$data['total_value'],
			'pos_id'=>$data['pos_id']));
			$id=$data['id'];
		}else{ 
			$this->db->insert('gst_online_supplies', array('id' => NULL ,'is_deemed'=>$data['is_deemed'],'supplier_gstin_no'=>$data['supplier_gstin_no'],
			'recipient_gstin_no'=>$data['recipient_gstin_no'],'document_no'=>$data['document_no'],'document_date'=>$data['document_date'],'total_value'=>$data['total_value'],
			'pos_id'=>$data['pos_id'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 
 		return $id; 
	    
	}
	
	public function get_online_supplies_list($data = false, $lang_id = 1)
    { 
        if ($data['no_of_records'] == '-1') {
            $limit_from = 0;
            $limit_to = "";
        } else {
            $limit_from = $data['no_of_records'] * $data['pagi_number'];
            $limit_to = $data['no_of_records'];    
        }
    
        $this->db->select("s.*,p.state_id,p.state_name"); 
        $this->db->from('gst_online_supplies s');
        $this->db->join("gst_pos AS p", "s.pos_id = p.id", "left");
        $this->db->where("s.user_id", $data['user_id']);
        if ($data['no_of_records'] != '-1') {
            $this->db->limit($limit_to, $limit_from);   
        }
    
        $this->db->order_by($data['sort_by'], $data['sort_order']); 
        $query = $this->db->get(); 
    
        $results['records'] = $query->result(); 
    
        // Count total rows
        $this->db->from('gst_online_supplies s');
         $this->db->where("s.user_id", $data['user_id']);
        $query2 = $this->db->get(); 
        $results['all_count'] = $query2->num_rows();
    
        return $results; 
    }
    
    public function get_online_supplies_info($data)
    {
        $this->db->select('s.*');
        $this->db->from('gst_online_supplies s');
        $this->db->where('s.id', $data['id']);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    public function online_supplies_delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_online_supplies');
        return $this->db->affected_rows() > 0;
    }
    
     public function save_document($data)
    {
        if (!is_array($data) || empty($data)) {
            return false;
        }
    
        $user_id = isset($data[0]['user_id']) ? $data[0]['user_id'] : 0;
        $this->db->trans_start();
        $this->db->where('user_id', $user_id);
        $this->db->delete('gst_document');
        $this->db->insert_batch('gst_document', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    
    public function get_document_info($id)
    {
        $this->db->select('d.*');
        $this->db->from('gst_document d');
        $this->db->where('d.user_id', $id);
        $query = $this->db->get();
        return $query->result(); 
        
    }
    
    public function save_opening_balance($data)
	{ 	
        // print_r($data);exit();
        if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_opening_balance', array('cash_ledger_igst'=>$data['cash_ledger_igst'],
			'cash_ledger_cgst'=>$data['cash_ledger_cgst'],'cash_ledger_sgst'=>$data['cash_ledger_sgst'],'cash_ledger_cess'=>$data['cash_ledger_cess'],
			'credit_ledger_integrated_tax'=>$data['credit_ledger_integrated_tax'],'credit_ledger_central_tax'=>$data['credit_ledger_central_tax'],
			'credit_ledger_state_tax'=>$data['credit_ledger_state_tax'],'credit_ledger_cess'=>$data['credit_ledger_cess'],
			'GSTR2B_IGST'=>$data['GSTR2B_IGST'],'GSTR2B_CGST'=>$data['GSTR2B_CGST'],'GSTR2B_SGST'=>$data['GSTR2B_SGST'],'GSTR2B_Cess'=>$data['GSTR2B_Cess'],
             'b_date'=>$data['b_date']));
			$id=$data['id'];
		}else{ 
			$this->db->insert('gst_opening_balance', array('id' => NULL ,'cash_ledger_igst'=>$data['cash_ledger_igst'],
			'cash_ledger_cgst'=>$data['cash_ledger_cgst'],'cash_ledger_sgst'=>$data['cash_ledger_sgst'],'cash_ledger_cess'=>$data['cash_ledger_cess'],
			'credit_ledger_integrated_tax'=>$data['credit_ledger_integrated_tax'],'credit_ledger_central_tax'=>$data['credit_ledger_central_tax'],
			'credit_ledger_state_tax'=>$data['credit_ledger_state_tax'],'credit_ledger_cess'=>$data['credit_ledger_cess'],
			'GSTR2B_IGST'=>$data['GSTR2B_IGST'],'GSTR2B_CGST'=>$data['GSTR2B_CGST'],'GSTR2B_SGST'=>$data['GSTR2B_SGST'],'GSTR2B_Cess'=>$data['GSTR2B_Cess'],
             'b_date'=>$data['b_date'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
		} 


 		return $id; 
	        //  $this->db->truncate('gst_opening_balance');
			// $this->db->insert('gst_opening_balance', array('id' => NULL ,'cash_ledger_igst'=>$data['cash_ledger_igst'],
			// 'cash_ledger_cgst'=>$data['cash_ledger_cgst'],'cash_ledger_sgst'=>$data['cash_ledger_sgst'],'cash_ledger_cess'=>$data['cash_ledger_cess'],
			// 'credit_ledger_integrated_tax'=>$data['credit_ledger_integrated_tax'],'credit_ledger_central_tax'=>$data['credit_ledger_central_tax'],
			// 'credit_ledger_state_tax'=>$data['credit_ledger_state_tax'],'credit_ledger_cess'=>$data['credit_ledger_cess'],
			// 'GSTR2B_IGST'=>$data['GSTR2B_IGST'],'GSTR2B_CGST'=>$data['GSTR2B_CGST'],'GSTR2B_SGST'=>$data['GSTR2B_SGST'],'GSTR2B_Cess'=>$data['GSTR2B_Cess'],
            //  'b_date'=>$data['b_date'],'user_id'=>$data['user_id']));
			// $id=$this->db->insert_id(); 
 		    //  return $id; 
	    
	}
	
	  
public function get_opening_balance_info($id)
{
    $this->db->select('*');
    $this->db->from('gst_opening_balance');
    $this->db->where('user_id', $id); // apply WHERE clause
    $query = $this->db->get();
    return $query->row(); 
}

    
    public function save_challan_reason($data)
	{ 	

			$this->db->insert('gst_challan_reason', array('id' => NULL ,'reason_for_challan'=>$data['reason_for_challan'],
			'final_year'=>$data['final_year'],'period'=>$data['period'],'challan_type'=>$data['challan_type'],'user_id'=>$data['user_id']));
			$id=$this->db->insert_id(); 
 		     return $id; 
	    
	}
	
	 public function save_challan($data)
	{ 	
	    
	    if(@$data['id']){ 
			$this->db->where('id', $data['id']); 
			$this->db->update('gst_challan_details', array('cgst_tax'=>$data['cgst_tax'],
			'cgst_interest'=>$data['cgst_interest'],'cgst_penalty'=>$data['cgst_penalty'],'cgst_fees'=>$data['cgst_fees'],'cgst_other'=>$data['cgst_other'],'igst_tax'=>$data['igst_tax'],'igst_interest'=>$data['igst_interest'],
			'igst_penalty'=>$data['igst_penalty'],'igst_fees'=>$data['igst_fees'],'igst_other'=>$data['igst_other'],'cess_tax'=>$data['cess_tax'],'cess_interest'=>$data['cess_interest'],'cess_penalty'=>$data['cess_penalty'],
			'cess_fees'=>$data['cess_fees'],'cess_other'=>$data['cess_other'],'sgst_tax'=>$data['sgst_tax'],'sgst_interest'=>$data['sgst_interest'],'sgst_penalty'=>$data['sgst_penalty'],'sgst_fees'=>$data['sgst_fees'],
			'sgst_other'=>$data['sgst_other'],'mode_of_payment'=>$data['mode_of_payment'],'cgst_total'=>$data['cgst_total'],'igst_total'=>$data['igst_total'],'cess_total'=>$data['cess_total'],'sgst_total'=>$data['sgst_total'],'status'=>$data['status'],
			'total_challan_amount'=>$data['total_challan_amount'],'challan_amount_total_in_words'=>$data['challan_amount_total_in_words']));
			$id=$data['id'];
		}else{ 
		$this->db->insert('gst_challan_details', array('id' => NULL ,'cgst_tax'=>$data['cgst_tax'],
			'cgst_interest'=>$data['cgst_interest'],'cgst_penalty'=>$data['cgst_penalty'],'cgst_fees'=>$data['cgst_fees'],'cgst_other'=>$data['cgst_other'],'igst_tax'=>$data['igst_tax'],'igst_interest'=>$data['igst_interest'],
			'igst_penalty'=>$data['igst_penalty'],'igst_fees'=>$data['igst_fees'],'igst_other'=>$data['igst_other'],'cess_tax'=>$data['cess_tax'],'cess_interest'=>$data['cess_interest'],'cess_penalty'=>$data['cess_penalty'],
			'cess_fees'=>$data['cess_fees'],'cess_other'=>$data['cess_other'],'sgst_tax'=>$data['sgst_tax'],'sgst_interest'=>$data['sgst_interest'],'sgst_penalty'=>$data['sgst_penalty'],'sgst_fees'=>$data['sgst_fees'],
			'sgst_other'=>$data['sgst_other'],'mode_of_payment'=>$data['mode_of_payment'],'cgst_total'=>$data['cgst_total'],'igst_total'=>$data['igst_total'],'cess_total'=>$data['cess_total'],'sgst_total'=>$data['sgst_total'],
			'created_on'=>$data['created_on'],'expiry_date'=>$data['expiry_date'],'status'=>$data['status'],'total_challan_amount'=>$data['total_challan_amount'],'challan_amount_total_in_words'=>$data['challan_amount_total_in_words'],'cpin'=>$data['cpin'],
            'user_id'=>$data['user_id'],'reference_number'=>$data['reference_number']));
			$id=$this->db->insert_id();
		} 
 		return $id; 

	    
	}

     public function update_status($id, $data, $user_id = null)
    {
        $this->db->where('id', $id);
        if ($user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        return $this->db->update('gst_challan_details', $data);
    }
	
	public function get_challan_info($data)
    {
        $this->db->select('c.*');
        $this->db->from('gst_challan_details c');
        $this->db->where('c.id', $data['id']);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_challan_saved_list($id)
    {
        $this->db->select('*');
        $this->db->from('gst_challan_details');
        $this->db->where('status', 1); 
        $this->db->where('user_id', $id);
        $this->db->order_by('id', 'ASC'); 
        $query = $this->db->get();
        return $query->result();
    }

	
	public function challen_delete($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_challan_details');
        return $this->db->affected_rows() > 0;

    }
    
    public function get_challan_history_list($data=false,$lang_id=1)
	{ 
		if($data['no_of_records']=='-1'){
			$limit_from=0;
			$limit_to="";
		}else{
			$limit_from=$data['no_of_records']*$data['pagi_number'];
			$limit_to=$data['no_of_records'];	
		} 
		$this->db->select("*"); 
		$this->db->from('gst_challan_details'); 
        $this->db->where_in('status', [2, 3]); 
        $this->db->where('user_id',$data['user_id']); 
		
		$where="1";
        if (!empty($data['cpin'])) {
        $this->db->like('cpin', $data['cpin']);
        }
         if (strlen($data['from_date'])) {
            $this->db->where('date(created_on) >=', date('Y-m-d', strtotime($data['from_date'])));
        }
    
        if (strlen($data['to_date'])) {
            $this->db->where('date(created_on) <=', date('Y-m-d', strtotime($data['to_date'])));
        }
		if($where!='1'){
		$this->db->where($where);  
		}
		if($data['no_of_records']!='-1'){
		$this->db->limit(  $limit_to , $limit_from);   
		}  
		$this->db->order_by($data['sort_by'], $data['sort_order']); 
		$query = $this->db->get(); 
		$results['records']= $query->result(); 
		//echo  $this->db->last_query(); 
		$this->db->from('gst_challan_details');
         $this->db->where('user_id',$data['user_id']);
		if($where!='1'){
		$this->db->where($where);  
		}
		$query2 = $this->db->get(); 
		$results['all_count']=$query2->num_rows();
		return $results; 
	}
	
	public function challen_history_delete($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('gst_challan_details');
        return $this->db->affected_rows() > 0;

    }
    
    public function get_state_name_by_gstin($gstin)
    {
        $state_code = substr($gstin, 0, 2);
        $this->db->select('state_name');
        $this->db->from('gst_pos');
        $this->db->where('state_id', $state_code);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row()->state_name;
        } else {
            return 'Unknown State';
        }
    }

   public function get_registration($id)
  {
    return $this->db->where('id', $id)
                    ->get('gst_new_registration')
                    ->row();
}

 public function get_authorized_signatory($id)
  {
    return $this->db->where('id', $id)
                    ->get('gst_authorized_signatory')
                    ->row();
}
   
    	public function save_new_registration($data)
	{ 
	
		$this->db->insert('gst_new_registration', array('id' => NULL ,'i_am_a' => $data['i_am_a'],'id_state'=>$data['id_state'],'district'=>$data['district'],'legal_name'=>$data['legal_name'],'pan'=>$data['pan'],'email'=>$data['email'],'mobile_number'=>$data['mobile_number'],'created_date'=>$data['created_date']));
		$id=$this->db->insert_id(); 
 		return $id; 
	}
	
		public function save_reference_number($data)
	{ 
	
		$this->db->insert('gst_temporary_reference_number', array('id' => NULL ,'trn_number' => $data['trn_number'],'captchatrn'=>$data['captchatrn']));
		$id=$this->db->insert_id(); 
 		return $id; 
	}
	
	 public function new_registration_list()
    {
        $this->db->select('r.*'); 
        $this->db->from('gst_new_registration r');
        $this->db->order_by('r.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }
    
    	 public function promoter_list($user_id,$registration_id)
    {
        $this->db->select('r.*'); 
        $this->db->from('gst_promoter r');
         $this->db->where('r.user_id', $user_id);
         $this->db->where('r.registration_id', $registration_id);
        $this->db->order_by('r.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }
    
     public function bank_account_list($user_id,$registration_id)
    {
        $this->db->select('r.*'); 
        $this->db->from('gst_bank_account r');
         $this->db->where('r.user_id', $user_id);
         $this->db->where('r.registration_id', $registration_id);
        $this->db->order_by('r.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }
    
     public function authorized_signatory_list($user_id,$registration_id)
    {
        $this->db->select('r.*'); 
        $this->db->from('gst_authorized_signatory r');
         $this->db->where('r.user_id', $user_id);
         $this->db->where('r.registration_id', $registration_id);
        $this->db->order_by('r.id', 'ASC'); 
    
        $query = $this->db->get();
        return $query->result(); 
    }
    
    public function save_business_details($data)
	{ 
	
		$this->db->insert('gst_business_details', array('id' => NULL ,'trade_name' => $data['trade_name'],'consitution_of_business'=>$data['consitution_of_business'],'district'=>$data['district'],'casual'=>$data['casual'],'composition'=>$data['composition'],'reason_to_obtain_registration'=>$data['reason_to_obtain_registration'],'date_of_commencement_of_business_custom'=>$data['date_of_commencement_of_business_custom'],'date_on_which_liability_to_register_arises_temp'=>$data['date_on_which_liability_to_register_arises_temp'],'created_date'=>$data['created_date']));
		$id=$this->db->insert_id(); 
 		return $id; 
	}
	
	public function save_promoter($data)
   {
    $this->db->insert('gst_promoter', array(
        'id' => NULL,
        'first_name' => $data['first_name'],
        'middle_name' => $data['middle_name'],
        'last_name' => $data['last_name'],
        'father_middle_name' => $data['father_middle_name'],
        'father_first_name' => $data['father_first_name'],
        'father_last_name' => $data['father_last_name'],
        'date_of_birth_custom' => $data['date_of_birth_custom'],
        'mobile_number' => $data['mobile_number'],
        'email' => $data['email'],
        'gender' => $data['gender'],
        'telephone_std' => $data['telephone_std'],
        'telephone_number' => $data['telephone_number'],
        'designation' => $data['designation'],
        'director_number' => $data['director_number'],
        'pd_cit_ind' => $data['pd_cit_ind'],
        'pan' => $data['pan'],
        'passport' => $data['passport'],
        'aadhar_card' => $data['aadhar_card'],
        // 'pd_adhar_dec' => $data['pd_adhar_dec'],
        'country' => $data['country'],
        'pin' => $data['pin'],
        'state' => $data['state'],
        'district' => $data['district'],
        'city' => $data['city'],
        'locality' => $data['locality'],
        'road' => $data['road'],
        'name_of_building' => $data['name_of_building'],
        'building_number' => $data['building_number'],
        'floor_number' => $data['floor_number'],
        'nearby_landmark' => $data['nearby_landmark'],
        'pd_upload' => $data['pd_upload'],
        'selfie' => $data['selfie'],
        'pri_auth' => $data['pri_auth'],
        'created_date' => $data['created_date'],
        'user_id'=>$data['user_id'],
        'registration_id'=>$data['registration_id'],
    ));

    $id = $this->db->insert_id();
    return $id;
}
   
   public function save_authorized_signatory($data)
   {
    $this->db->insert('gst_authorized_signatory', array(
        'id' => NULL,
        'primary_authorised_signatory' => $data['primary_authorised_signatory'],
        'first_name' => $data['first_name'],
        'middle_name' => $data['middle_name'],
        'last_name' => $data['last_name'],
        'father_middle_name' => $data['father_middle_name'],
        'father_first_name' => $data['father_first_name'],
        'father_last_name' => $data['father_last_name'],
        'date_of_birth_custom' => $data['date_of_birth_custom'],
        'mobile_number' => $data['mobile_number'],
        'email' => $data['email'],
        'gender' => $data['gender'],
        'telephone_std' => $data['telephone_std'],
        'telephone_number' => $data['telephone_number'],
        'designation' => $data['designation'],
        'director_number' => $data['director_number'],
        'pd_cit_ind' => $data['pd_cit_ind'],
        'pan' => $data['pan'],
        'passport' => $data['passport'],
        // 'aadhar_card' => $data['aadhar_card'],
        'country' => $data['country'],
        'pin' => $data['pin'],
        'state' => $data['state'],
        'district' => $data['district'],
        'city' => $data['city'],
        'locality' => $data['locality'],
        'road' => $data['road'],
        'name_of_building' => $data['name_of_building'],
        'building_number' => $data['building_number'],
        'floor_number' => $data['floor_number'],
        'nearby_landmark' => $data['nearby_landmark'],
        'as_upload_photo' => $data['as_upload_photo'],
        'as_upload_sign' => $data['as_upload_sign'],
        'selfie' => $data['selfie'],
        'as_up_type' => $data['as_up_type'],
        'created_date' => $data['created_date'],
        'user_id'=>$data['user_id'],
        'registration_id'=>$data['registration_id'],
    ));

    $id = $this->db->insert_id();
    return $id;
}

public function save_authorized_representative($data)
{
    $this->db->insert('gst_authorized_representative', $data);

    if ($this->db->affected_rows() > 0) {
        return $this->db->insert_id();
    } else {
        return false;
    }
}

public function save_principle_place_of_business($data)
{
    $this->db->insert('gst_principle_place_of_business', array(
        'id' => NULL,
        'pin' => $data['pin'],
        'district' => $data['district'],
        'city' => $data['city'],
        'locality' => $data['locality'],
        'road' => $data['road'],
        'name_of_building' => $data['name_of_building'],
        'building_number' => $data['building_number'],
        'floor_number' => $data['floor_number'],
        'nearby_landmark' => $data['nearby_landmark'],
        'latitude' => $data['latitude'],
        'longitude' => $data['longitude'],
        'sector_or_unit' => $data['sector_or_unit'],
        'commissionerate' => $data['commissionerate'],
        'division' => $data['division'],
        'ranges' => $data['ranges'],
        'office_email' => $data['office_email'],
        'office_telephone_std' => $data['office_telephone_std'],
        'office_telephone' => $data['office_telephone'],
        'office_mobile_number' => $data['office_mobile_number'],
        'office_fax_std' => $data['office_fax_std'],
        'office_fax' => $data['office_fax'],
        'nature_of_premises' => $data['nature_of_premises'],
        'proof_of_principal_of_business' => $data['proof_of_principal_of_business'],
        'bp_upload' => $data['bp_upload'],
        'nature_of_business_choices' => $data['nature_of_business_choices'],
        'bp_add' => $data['bp_add'],
        'created_date' => $data['created_date']
    ));

    $id = $this->db->insert_id();
    return $id;
}

public function save_additional_place_of_business($data)
{
    $this->db->insert('gst_additional_place_of_business', $data);

    if ($this->db->affected_rows() > 0) {
        return $this->db->insert_id();
    } else {
        return false;
    }
}

public function get_authorized_signatories() {
        $this->db->select('id, first_name, middle_name, last_name');
        $this->db->from('gst_authorized_signatory');
        $query = $this->db->get();
        // print_r($query->result());die();
        return $query->result();
        
    }
    
    public function get_promoter_list($user_id, $registration_id)
{
    $this->db->from('gst_promoter');
    $this->db->where('user_id', $user_id);
    $this->db->where('registration_id', $registration_id);
    $this->db->where('pri_auth', 'Yes');

    return $this->db->get()->row();
}

public function save_bank_account($data)
   {
    $this->db->insert('gst_bank_account', array(
        'id' => NULL,
        'account_number' => $data['account_number'],
        'type_of_account' => $data['type_of_account'],
        'ifsc_code' => $data['ifsc_code'],
        'proof_of_details_of_bank_account' => $data['proof_of_details_of_bank_account'],
        'pd_upload' => $data['pd_upload'],
        'created_date' => $data['created_date'],
        'user_id'=>$data['user_id'],
        'registration_id'=>$data['registration_id'],
    ));

    $id = $this->db->insert_id();
    return $id;
}

	

}