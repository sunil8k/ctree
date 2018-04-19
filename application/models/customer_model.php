<?php
class Customer_model extends CI_Model {
	
	/*##################################
	#### Show user grid with paging ####
	########## and dropdown ############
	###################################*/
	function checkLogin() {
		if($this->input->get_post('username') && $this->input->get_post('password')) {
			$this->db->select('id,first_name,last_name,username,password,email,mobile,image,status');
			$this->db->from('users');
			$this->db->where('username',$this->input->get_post('username'));
			$this->db->where('password',md5($this->input->get_post('password')));
			$query = $this->db->get();
			/*echo $this->db->last_query();
			die;*/
			if($results = $query->result()) {
				return $results;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function forgot() {
		if($this->input->get_post('email')) {
			$this->db->select('id, first_name, last_name, email, username, mobile, password_text,status');
			$this->db->from('users');
			$this->db->where('email',$this->input->get_post('email'));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			if($data = $query->row()){
				if($this->mailForgot()) {
					
					return $data;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function checkCustomer() {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$this->input->get_post('email'));
		$query = $this->db->get();	
		//echo $query->num_rows();die;	
		//$this->db->last_query();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			return $res[0]->id;
		}
		else {
$pwd = rand(9999,999999);
			$data['email'] = $this->input->get_post('email');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['username'] = $this->input->get_post('username');
			$data['password'] = md5($pwd);
			$data['password_text'] = $pwd;
			$data['mobile'] = $this->input->get_post('mobile');
			$data['dob'] = $this->input->get_post('dob');
			$data['gender'] = $this->input->get_post('gender');
			$data['marital'] = $this->input->get_post('marital');
			$data['address'] = $this->input->get_post('address');
			$data['country_id'] = $this->input->get_post('country');
			$data['state_id'] = $this->input->get_post('state');
			$data['city_id'] = $this->getCity($this->input->get_post('city'),$data['country_id']);
			$data['zipcode'] = $this->input->get_post('zip');
			$data['create_date'] = date('Y-m_d H:i:s');
			$data['last_update'] = date('Y-m_d H:i:s');
			$data['status'] = 1;
			$this->db->insert('users',$data);
			/////////////////////EMAIL SEND TO CUSTOMER/////////////////////////////////////
			$subject = 'CompareTree Registeration Information!';
			$message .= '<table><tr><td><h3>Congratulation!</h3></td><td></td></tr>';
			$message .= '<tr><td>You are successfully registered.</td><td></td></tr>';
			$message .= '<tr><td colspan=2>You registerd as Seekers(want a agent).</td></tr>';
			$message .= '<tr><td>Name:</td><td>'.$data['first_name'].' '.$data['last_name'] .'</td></tr>';
			$message .= '<tr><td>Username:</td><td>'.$data['username'].'</td></tr>';
			$message .= '<tr><td>Email:</td><td>'.$data['email'].'</td></tr>';
			$message .= '<tr><td>Password:</td><td>'.$pwd.'</td></tr>';
			$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
			$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
			$this->send_mail($this->input->get_post('email'),$subject,$message);
			return $this->db->insert_id();
		}
	}
	function mailForgot() {
		return true;
	}
	
	
	function checkEmail() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$this->input->get_post('email'));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		//echo $query->num_rows();
		if($query->num_rows()){
			return 'not Available';
		}
		else {
			return 'Available';
		}
	}
	function checkUsername() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username',$this->input->get_post('username'));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		//echo $query->num_rows();
		if($query->num_rows()){
			return 'not Available';
		}
		else {
			return 'Available';
		}
	}
	function save() {
		if($this->input->get_post('email') && $this->input->get_post('username')) {
			$pwd = rand(9999,999999);
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['email'] = $this->input->get_post('email');
			$data['username'] = $this->input->get_post('username');
			$data['password'] = md5($pwd);
			$data['password_text'] = $pwd;
			$data['mobile'] = $this->input->get_post('mobile');
			$data['dob'] = $this->input->get_post('dob');
			$data['gender'] = $this->input->get_post('gender');
			$data['marital'] = $this->input->get_post('marital');
			$data['address'] = $this->input->get_post('address');
			$data['country_id'] = $this->input->get_post('country');
			$data['state_id'] = $this->input->get_post('state');
			$data['city_id'] = $this->getCity($this->input->get_post('city'),$data['country_id']);
			$data['zipcode'] = $this->input->get_post('zip');
			$data['create_date'] = date('Y-m_d H:i:s');
			$data['last_update'] = date('Y-m_d H:i:s');
			$data['status'] = 1;
			//$data['term'] = $this->input->get_post('term');
			if($this->db->insert('users',$data)) {
				$subject = 'CompareTree Registeration Information!';
				$message .= '<table><tr><td><h3>Congratulation!</h3></td><td></td></tr>';
				$message .= '<tr><td>You are successfully registered.</td><td></td></tr>';
				$message .= '<tr><td colspan=2>You registerd as Seekers(want a agent).</td></tr>';
				$message .= '<tr><td>Name:</td><td>'.$data['first_name'].' '.$data['last_name'] .'</td></tr>';
				$message .= '<tr><td>Username:</td><td>'.$data['username'].'</td></tr>';
				$message .= '<tr><td>Email:</td><td>'.$data['email'].'</td></tr>';
				$message .= '<tr><td>Password:</td><td>'.$pwd.'</td></tr>';
				$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
				$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
				$this->send_mail($this->input->get_post('email'),$subject,$message);
				return $this->db->insert_id();
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function update() {
		if($this->input->get_post('id')) {
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['dob'] = $this->input->get_post('dob');
			$data['gender'] = $this->input->get_post('gender');
			$data['marital'] = $this->input->get_post('marital');
			$data['address'] = $this->input->get_post('address');
			$data['country_id'] = $this->input->get_post('country');
			$data['state_id'] = $this->input->get_post('state');
			$data['city_id'] = $this->getCity($this->input->get_post('city'),$data['country_id']);
			$data['zipcode'] = $this->input->get_post('zipcode');
			//$data['term'] = $this->input->get_post('term');
			$this->db->set($data);
			$this->db->where('id',$this->input->get_post('id'));
			if($this->db->update('users',$data)) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function getCity($city,$country) {
		$this->db->select('c.id');
		$this->db->from('citys c');
		$this->db->join('countrys cntr','c.country_id = cntr.id');
		$this->db->like('c.city',$city);
		$this->db->where('cntr.id',$country);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$city = $query->row();
		return $city->id;
	}	 
	function myProfile() {
		$this->db->select('u.*,c.city,cntr.country');
		$this->db->from('users u');
		$this->db->join('countrys cntr','u.country_id = cntr.id');
		$this->db->join('citys c','u.city_id = c.id','LEFT OUTER');
		$this->db->where('u.id',$this->session->userdata('id'));
		$query = $this->db->get();	
		//echo $query->num_rows();die;	
		//echo $this->db->last_query();die;
		return $query->row();
	}
	
	function queries() {
		
		$this->db->select('l.*');
		$this->db->from('leads l');/*
		$this->db->join('sections s','l.section_id = s.id');
		$this->db->join('lead_contacts lc','l.id = lc.lead_id');*/
		$this->db->where('l.customer_id',$this->session->userdata('id'));
		$this->db->order_by('l.id','DESC');
		$query = $this->db->get();	
		//echo $this->db->last_query();die;
		if($query->num_rows()) {
			return $query->result();			
		}
		else {
			return false;
		}
	}
	function detailLead() {
		if($this->session->userdata('id') && $this->input->get_post('lead_id')) {
			$this->db->select('l.sku, l.lead,l.create_date start_date,s.section, lc.*');
			$this->db->from('leads l');
			$this->db->join('sections s','l.section_id = s.id');
			$this->db->join('lead_contacts lc','l.id = lc.lead_id');
			$this->db->where('l.id', $this->input->get_post('lead_id'));
			$query = $this->db->get();
			$data['leads'] = $query->row();
			
			$this->db->select('*');
			$this->db->from('lead_details');
			$this->db->where('lead_id', $this->input->get_post('lead_id'));
			$query = $this->db->get();
			$data['details'] = $query->result();
			
			return $data;
		}
		else {
			return false;
		}
		
	}
	function deals() {
		//echo "test";die;
		if($this->session->userdata('id') && $this->input->get_post('lead_id')) {
			$this->db->select('l.sku,l.lead,l.create_date start_date, abi.*, comp.company');
			$this->db->from('leads l');
			$this->db->join('agent_bid_info abi','l.id = abi.lead_id');
			$this->db->join('companys comp','abi.company_id = comp.id','LEFT OUTER');
			$this->db->where('l.id', $this->input->get_post('lead_id'));
			$this->db->where('abi.bid_status != ', 'open');
			$this->db->order_by('abi.amount', 'ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$data = $query->result();
			
			return $data;
		}
		else {
			return false;
		}
	}
	function getAgentBidInfo($id) {
		$this->db->select('ali.*,l.customer_id as user_id');
		$this->db->from("agent_lead_info ali");
		$this->db->join("leads l","ali.lead_id = l.id");
		$this->db->where("ali.id",$id);
		//echo $this->db->last_query();die;
		$q = $this->db->get();
		return $q->row();
	}
	function getEmailByAgentBidInfo($id) {		
		$this->db->select('a.email');
		$this->db->from("agent_lead_info ali");
		$this->db->join("agents a",'ali.agent_id = a.id');
		$this->db->where("ali.id",$id);
		//echo $this->db->last_query();die;
		$q = $this->db->get();
		return $q->row()->email;
	}
	function checkAgentLeadInfo($lead_id,$agent_id) {
		$this->db->select('*');
		$this->db->from('agent_lead_info');
		$this->db->where('lead_id',$lead_id);
		$this->db->where('agent_id',$agent_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	function acceptBid() {
		$acceptData['bid_status'] = 'decline';
		$acceptData['is_success'] = 0;
		$this->db->set($acceptData);
		$this->db->where('id !=',$this->input->get_post('bid_id'));
		$this->db->where('lead_id',$this->input->get_post('lead_id'));
		$this->db->update('agent_bid_info');
		
		
		$acceptData['bid_status'] = 'success';
		$acceptData['is_success'] = 1;
		$this->db->set($acceptData);
		$this->db->where('id',$this->input->get_post('bid_id'));
		$this->db->update('agent_bid_info');
		
		$this->db->set($acceptData);
		$this->db->where('lead_id',$this->input->get_post('lead_id'));
		$this->db->where('agent_id',$this->input->get_post('agent_id'));
		$this->db->update('agent_lead_info');		
		
		$dt['status'] = 0;
		$this->db->set($dt);
		$this->db->where('id',$this->input->get_post('lead_id'));
		$this->db->update('leads');
		
		///////////////Add contact to the user and agency START/////////////
		$agentBidInfo = $this->getAgentBidInfo($this->input->get_post('bid_id'));
		$contactData['user_id'] = $agentBidInfo->customer_id;
		$contactData['agent_id'] = $agentBidInfo->agent_id;
		$contactData['status'] = 1;		
		$this->db->insert('mycontact',$contactData);
		///////////////Add contact to the user and agency END //////////////
		///////////////SEND SUCCESS MESSAGE//////////////////
		$email = $this->getEmailByAgentBidInfo($this->input->get_post('bid_id'));
		$sub = 'Bid Accept Info';
		$mess = 'Check your account, Your bid accepted by customer.';
		$this->send_mail($email,$sub,$mess);
		///////////////SEND SUCCESS MESSAGE END//////////////////
		
		$acceptData1['bid_status'] = 'decline';
		$acceptData1['is_success'] = 0;
		$this->db->set($acceptData1);
		$this->db->where('lead_id',$this->input->get_post('lead_id'));
		$this->db->where('agent_id !=',$this->input->get_post('agent_id'));
		$this->db->where('is_success',0);
		$this->db->update('agent_lead_info');
		
		
		///////////////SEND DECLINE MESSAGE//////////////////
		
		$this->db->select('a.email,a.id,ali.lead_id');
		$this->db->from("agent_lead_info ali");
		$this->db->join("agents a",'ali.agent_id = a.id');
		$this->db->where("ali.is_success",0);
		$this->db->where("ali.lead_id",$agentBidInfo->lead_id);
		//echo $this->db->last_query();die;
		$query1 = $this->db->get();
		$agents = $query1->result();
		foreach($agents as $agent) {
			$agent_email[] = $agent->email;
			$data1['user_id'] = $agent->id;
			$data1['user_type'] = 'agent';
			$agent_lead_info = $this->checkAgentLeadInfo($agent->lead_id,$agent->id);
			$data1['type_id'] = $agent_lead_info->id;
			$data1['message'] = 'Check your account, Your bid declined by customer.';
			$data1['type'] = 'bid_decline_info';
			$data1['date_time'] = date('Y-m-d H:i:s');
			$this->db->insert('notifications',$data1);
		}
		$sub = 'Bid Decline Info';
		$mess = 'Check your account, Your bid declined by customer.';
		$this->send_mail($agent_email,$sub,$mess);
		///////////////SEND DECLINE MESSAGE END//////////////////
		return true;
	}
	function updatePassword() {
		if($id = $this->session->userdata('id')) {
			$this->db->select('*');
			$this->db->from("users");
			$this->db->where("id",$id);
			$this->db->where("password",md5($this->input->get_post('password_old')));
			$query = $this->db->get();
			if($query->num_rows()) {
				$data['password'] = md5($this->input->get_post('password'));
				$data['password_text'] = $this->input->get_post('password');
				$this->db->set($data);
				$this->db->where('id',$id);
				$this->db->update('users');
				return true;
			}
			else {
				return false;
			}
		}
		else {
			redirect('customer/login');
		}
	}
	function getNotifications() {
		if($id = $this->session->userdata('id')) {
			$this->db->select('*');
			$this->db->from("notifications");
			$this->db->where("user_id",$this->session->userdata('id'));
			$this->db->where("user_type",'customer');
			$this->db->order_by("id",'Desc');
			$query = $this->db->get();;
			$result = $query->result();
			$this->db->set('status',1);
			$this->db->where("user_id",$this->session->userdata('id'));
			$this->db->where("user_type",'customer');
			$this->db->update('notifications');
			return $result;
		}
		else {
			return false;
		}
	}
	function myContact() {
		$this->db->select('a.*');
		$this->db->from("mycontact m");
		$this->db->join("agents a","m.agent_id = a.id");
		$this->db->where("m.user_id",$this->session->userdata('id'));
		$query = $this->db->get();
		return $query->result();
	}
	//////////////MAIL SEND FUNCTION DEFINED HERE///////////////////
	public function send_mail($to_email,$subject,$message) {
        $from_email = "info@testingoncloud.com";
        //Load email library
        $this->load->library('email');
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.testingoncloud.com';
		$config['smtp_user'] = 'info@testingoncloud.com';
		$config['smtp_pass'] = 'test@123!@#';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);

        $this->email->from($from_email, 'Compare Tree Portal');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        //Send mail
        if($this->email->send()) {
			return true;
		}
        else {
			return false;
		}
    }
	function fullBid() {
		if($id = $this->session->userdata('id') && $this->input->get_post('bid_id') && $this->input->get_post('lead_id')) {
			$this->db->select('l.lead,ld.lead_value amount,l.create_date lead_date,l.sku,a.*,ali.amount bidAmount,ali.bid_date,ali.bid_status,c.city,cntr.country');
			$this->db->from("agent_lead_info ali");
			$this->db->join("agents a",'ali.agent_id = a.id');
			$this->db->join("leads l",'ali.lead_id = l.id');
			$this->db->join("lead_details ld",'l.id = ld.lead_id');
			$this->db->join("citys c",'a.city_id = c.id','OUTER LEFT');
			$this->db->join("countrys cntr",'a.country_id = cntr.id','OUTER LEFT');
			$this->db->where("ali.agent_id",$this->input->get_post('agent_id'));
			$this->db->where("ali.lead_id",$this->input->get_post('lead_id'));
			$this->db->where("ld.lead_key",'price');
			$query = $this->db->get();
			//echo $this->db->last_query();
			$result = $query->row();
			return $result;
		}
		else {
			return false;
		}
	}
}
?>
