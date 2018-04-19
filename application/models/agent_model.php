<?php

class Agent_model extends CI_Model {
	
	function checkLogin() {
		if($this->input->get_post('username') && $this->input->get_post('password')) {
			$this->db->select('a.id, a.parent_id, a.type, a.first_name,a.last_name,a.username,a.password,a.email,a.mobile,a.image,a.status');
			$this->db->from('agents a');
			$this->db->where('a.username',$this->input->get_post('username'));
			$this->db->where('a.password',md5($this->input->get_post('password')));
			$this->db->where('a.status',1);
			$this->db->where('a.delete_status',0);
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
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
	function agentPermissions($id) {
		$this->db->select('plan,no_of_company,no_of_quote,no_of_user,no_of_territory,last_territory_update,report_panel,agent_assistent,is_picture');
		$this->db->from('agent_plans');
		$this->db->where('agent_id',$id);
		$this->db->where('start_date <= ',date('Y-m-d H:i:s'));
		$this->db->where('exp_date >= ',date('Y-m-d H:i:s'));
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		/*echo $this->db->last_query();die;*/
		if($query->num_rows()) {
			return $query->row();
		}
		else {
			$this->db->select('plan,no_of_company,no_of_quote,no_of_user,no_of_territory,report_panel,agent_assistent,is_picture');
			$this->db->from('plans');
			$this->db->where('plan','Bronze');
			$query = $this->db->get();
			return $query->row();
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
			$data['company_id'] = $this->input->get_post('company');
			$data['status'] = 1;
			$this->db->insert('agents',$data);
			if($agent_id = $this->db->insert_id()) {
				$data_plan['agent_id'] = $agent_id;
				$plan = $this->getPlanData($this->input->get_post('plan'));
				$data_plan['start_date'] = date('Y-m_d H:i:s');
				$data_plan['exp_date'] = '0000-00-00 00-00-00';
				$data_plan['amount'] = 100;
				$data_plan['status'] = 0;
				$data_plan['no_of_company'] = $plan->no_of_company;
				$data_plan['no_of_quote'] = $plan->no_of_quote;
				$data_plan['no_of_user'] = $plan->no_of_user;
				$data_plan['no_of_territory'] = $plan->no_of_territory;
				$data_plan['report_panel'] = $plan->report_panel;
				$data_plan['agent_assistent'] = $plan->agent_assistent;
				$data_plan['is_picture'] = $plan->is_picture;
				$this->db->insert('agent_plans',$data_plan);				
				
				$data_payment['agent_id'] = $agent_id;
				$data_payment['card'] = $this->input->get_post('card');
				$data_payment['card_type'] = $this->input->get_post('card_type');
				$data_payment['card_number'] = $this->input->get_post('card_number');
				$data_payment['card_name'] = $this->input->get_post('card_name');
				$data_payment['cvv'] = $this->input->get_post('cvv');
				$data_payment['exp'] = $this->input->get_post('exp');
				$data_plan['last_date'] = date('Y-m_d H:i:s');
				$data_plan['status'] = 1;
				$this->db->insert('agent_payment_info',$data_payment);				
				
				$data_doc['agent_id'] = $agent_id;
				$data_doc['certificate'] = $this->fileUpload('certificate', $agent_id);
				$data_doc['dl'] = $this->fileUpload('dl', $agent_id);
				$data_doc['doc'] = $this->fileUpload('image', $agent_id);
				$this->db->insert('agent_docs',$data_doc);
				
				$subject = 'CompareTree Registeration Information!';
				$message .= '<table><tr><td><h3>Congratulation!</h3></td><td></td></tr>';
				$message .= '<tr><td>You are successfully registered.</td><td></td></tr>';
				$message .= '<tr><td colspan=2>You registerd as Agent(Agency).</td></tr>';
				$message .= '<tr><td>Name:</td><td>'.$data['first_name'].' '.$data['last_name'] .'</td></tr>';
				$message .= '<tr><td>Username:</td><td>'.$data['username'].'</td></tr>';
				$message .= '<tr><td>Email:</td><td>'.$data['email'].'</td></tr>';
				$message .= '<tr><td>Password:</td><td>'.$pwd.'</td></tr>';
				$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
				$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
				$this->send_mail($this->input->get_post('email'),$subject,$message);
				return true;
				
			}
			else {
				return false;
			}
		}else {
			return false;
		}
	}
	/* Agents user manager functionality start here*/
	function users() {
		if($this->session->userdata('type')) {
			$this->db->select('*');
			$this->db->from('agents');
			$this->db->where('parent_id',$this->session->userdata('id'));
			$query = $this->db->get();
			return $query->result();
		}
		else {
			return false;
		}
	}
	function checkAddUserPermission() {
		if($this->session->userdata('type')=='provider' && $this->session->userdata('permission')->no_of_user) {
			$this->db->select('id');
			$this->db->from('agents');
			$this->db->where('parent_id',$this->session->userdata('id'));
			$query = $this->db->get();
			if(($query->num_rows())<($this->session->userdata('permission')->no_of_user)) {
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
	function addUser() {
		if($this->checkAddUserPermission()) {
			return true;
		}
		else {
			return false;
		}
	}
	function saveUser() {
		if($this->checkAddUserPermission()) {
			$data['parent_id'] = $this->session->userdata('id');
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['username'] = $this->input->get_post('username');
			$data['password'] = md5(trim($this->input->get_post('password')));
			$data['password_text'] = $this->input->get_post('password');
			$data['type'] = 'manager';
			$data['email'] = $this->input->get_post('email');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['gender'] = $this->input->get_post('gender');
			$data['create_date'] = date("Y-m-d H:i:s");
			$data['status'] = 1;
			$this->db->insert('agents',$data);
			return true;
		}
		else {
			return false;
		}
	}
	function updateUser() {
		if($this->input->get_post('id')) {
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['username'] = $this->input->get_post('username');
			if($this->input->get_post('password')) {
				$data['password'] = md5(trim($this->input->get_post('password')));
				$data['password_text'] = $this->input->get_post('password');
			}
			$data['email'] = $this->input->get_post('email');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['gender'] = $this->input->get_post('gender');
			$data['last_update'] = date("Y-m-d H:i:s");
			$this->db->where('id',$this->input->get_post('id'));
			$this->db->where('parent_id',$this->session->userdata('id'));
			$this->db->set($data);
			
			$this->db->update('agents');
			return true;
		}
		else {
			return false;
		}
	}
	function checkUser($username) {
		$this->db->select('id');
		$this->db->from('agents');
		$this->db->where('username',$username);
		$query = $this->db->get();
		if($query->num_rows()) {
			return true;
		}
		else {
			return false;	
		}
	}
	function checkUserEmail($email) {
		$this->db->select('id');
		$this->db->from('agents');
		$this->db->where('email',$email);
		$query = $this->db->get();
		if($query->num_rows()) {
			return true;
		}
		else {
			return false;	
		}
	}
	function editUser($userId) {
		//echo "Test";die;
		$this->db->select('id, first_name, last_name, username, email, mobile, gender, status');
		$this->db->from('agents');
		$this->db->where('id',$userId);
		$query = $this->db->get();
		if($data = $query->row()) {
			//print_r($data);die;
			return $data;
		}
		else {
			return false;	
		}
	}
	function deleteUser($userId) {
		//echo "Test";die;
		$this->db->where('id',$userId);
		$this->db->where('parent_id',$this->session->userdata('id'));
		if($this->db->delete('agents')) {
			return true;
		}
		else {
			return false;	
		}
	}
	/* Agents user manager functionality end here*/
	function getPlanData($plan) {
		$str = $plan?$plan:'Bronze';
		$this->db->select('id');
		$this->db->from('plans');
		$this->db->where('plan',$plan);
		$query = $this->db->get();
		return $query->row();
	}
	function getCity($city,$country) {
		$this->db->select('c.id');
		$this->db->from('citys c');
		$this->db->join('countrys cntr','c.country_id = cntr.id');
		$this->db->like('c.city',$city);
		$this->db->where('cntr.id',$country);
		$query = $this->db->get();
		$city = $query->row();
		return $city->id;
	}
	function fileUpload($file, $userId) {
		if($_FILES[$file]['name']!=""){
			$profileAvatar =  $_FILES[$file]['name'];
			if(!is_dir('admin/assets/agent'))      
			mkdir('admin/assets/agent');
			$createFolder = 'admin/assets/agent/'.$userId;
			$ext=pathinfo($profileAvatar);
			$FileName='agent_'.$userId.'_'.rand().".".$ext['extension'];
			if(!is_dir($createFolder))      
			mkdir($createFolder);
			$config['upload_path'] = $createFolder;
			$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|odt';
			$config['max_size']	= '5000';
			$config['max_width']  = '3000';
			$config['max_height']  = '2000';
			$this->load->library('upload', $config);
			$_FILES[$file]['name']=$FileName;
			$this->upload->do_upload($file);
			$file_name=$this->upload->data();
			return $createFolder."/".$file_name['file_name'];
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
			$this->db->set($data);
			$this->db->where('id',$this->input->get_post('id'));
			if($this->db->update('agents',$data)) {
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
	function forgot() {
		if($this->input->get_post('email')) {
			$this->db->select('id, first_name, last_name, email, username, mobile, password_text,status');
			$this->db->from('agents');
			$this->db->where('email',$this->input->get_post('email'));
			$query = $this->db->get();
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
	function mailForgot() {
		return true;
	}
	function company() {
		$this->db->select('*');
		$this->db->from('companys');
		$this->db->where('status',1);
		$query = $this->db->get();
		if($data = $query->result()){
			return $data;
		}
		else {
			return 0;
		}
	}
	function country() {
		$this->db->select('*');
		$this->db->from('countrys');
		$this->db->where('status',1);
		$query = $this->db->get();
		if($data = $query->result()){
			return $data;
		}
		else {
			return 0;
		}
	}
	function getCompaney() {
		$this->db->select('*');
		$this->db->from('companys');
		$this->db->where('id',$this->input->get_post('id'));
		$query = $this->db->get();
		if($data = $query->row()){
			return $data;
		}
		else {
			return 0;
		}
	}
	function checkEmail() {
		$this->db->select('*');
		$this->db->from('agents');
		$this->db->where('email',$this->input->get_post('email'));
		$query = $this->db->get();
		if($query->num_rows()){
			return 'not Available';
		}
		else {
			return 'Available';
		}
	}
	function checkUsername() {
		$this->db->select('*');
		$this->db->from('agents');
		$this->db->where('username',$this->input->get_post('username'));
		$query = $this->db->get();
		if($query->num_rows()){
			return 'not Available';
		}
		else {
			return 'Available';
		}
	}
		 
	function myProfile() {
		$this->db->select('a.*,c.city,cntr.country');
		$this->db->from('agents a');
		$this->db->join('countrys cntr','a.country_id = cntr.id','LEFT OUTER');
		$this->db->join('citys c','a.city_id = c.id','LEFT OUTER');
		$this->db->where('a.id',$this->session->userdata('id'));
		$query = $this->db->get();	
		//echo $this->db->last_query();die;
		return $query->row();
	}
	function queries() {				
		$this->db->select('l.*,ali.bid_status,ali.is_success,ali.open_date as datetime');
		$this->db->from('leads l');
		$this->db->join('lead_contacts lc','l.id = lc.lead_id');
		$this->db->join('agent_lead_info ali','l.id = ali.lead_id','LEFT OUTER');
		$this->db->where('ali.agent_id',$this->session->userdata('agent_id'));
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
	function addLead() {
		if($this->input->get_post('lead_id')) {
			if(!$this->checkAddLead($this->input->get_post('lead_id'))) {
				$data['agent_id'] = $this->session->userdata('id');
				$data['lead_id'] = $this->input->get_post('lead_id');
				$data['amount'] = 0;
				$data['open_date'] = date('Y-m-d H:i:s');
				$data['bid_status'] = 'open';
				$this->db->insert('agent_lead_info',$data);
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
	function bidDetail() {
		if($this->session->userdata('id') && $this->input->get_post('lead_id')) {
			$this->db->select('l.*,s.section');
			$this->db->from('leads l');
			$this->db->join('sections s','l.section_id = s.id');
			$this->db->where('l.id', $this->input->get_post('lead_id'));
			$query = $this->db->get();
			$data['leads'] = $query->row();
			
			$this->db->select('*');
			$this->db->from('lead_details');
			$this->db->where('lead_id', $this->input->get_post('lead_id'));
			$query = $this->db->get();
			$data['details'] = $query->result();
			
			$this->db->select('abd.*, com.company');
			$this->db->from('agent_bid_info abd');
			$this->db->join('companys com','abd.company_id = com.id','LEFT OUTER');
			$this->db->where('abd.lead_id', $this->input->get_post('lead_id'));
			$this->db->where('abd.agent_id', $this->session->userdata('id'));
			$this->db->order_by('abd.id','DESC');
			$query = $this->db->get();
			$data['leadInfo'] = $query->result();
			
			$this->db->select('abd.*');
			$this->db->from('agent_bid_info abd');
			$this->db->where('abd.lead_id', $this->input->get_post('lead_id'));
			$this->db->where('abd.agent_id', $this->session->userdata('id'));
			$query = $this->db->get();
			$data['bidCount'] = $query->num_rows();
			//echo json_encode($data['leadInfo']);die;
			$this->db->select('company_id');
			$this->db->from('agents');
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get();
			$data['company_id'] = $query->row()->company_id;
			$data['companies'] = $this->getCompanies($this->input->get_post('lead_id'));
			return $data;
		}
		else {
			return false;
		}
		
	}
	function getCompanies($lead_id) {//echo $this->session->userdata('permission')->plan;die;
		$this->db->select('company_id');
		$this->db->from('agent_bid_info');
		$this->db->where('agent_id', $this->session->userdata('id'));
		$this->db->where('lead_id', $lead_id);
		$q = $this->db->get();
		$data = $q->result();
		foreach($data as $dt) {
			$company[] = $dt->company_id;
		}
		//print_r($data);die;
		//////////////////////////////////////////
		$this->db->select('c.id,c.company');
		$this->db->from('companys c');
		if($this->session->userdata('permission')->plan != 'Platinum') {
			$this->db->where_in('c.id NOT', $company);
		}
			$this->db->where_in('c.status', 1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function checkAddLead($lead_id) {
		$this->db->select('*');
		$this->db->from('agent_lead_info');
		$this->db->where('lead_id',$lead_id);
		$this->db->where('agent_id',$this->session->userdata('id'));
		$query = $this->db->get();
		return $query->num_rows();
	}
	function checkAgentLeadInfo($lead_id) {
		$this->db->select('*');
		$this->db->from('agent_lead_info');
		$this->db->where('lead_id',$lead_id);
		$this->db->where('agent_id',$this->session->userdata('id'));
		$query = $this->db->get();
		return $query->row();
	}
	function checkAgentBidInfo($lead_id,$agent_id,$company_id=NULL) {
		//print_r($this->session->userdata('permission'));
		$no_of_company = $this->session->userdata('permission')->no_of_company;
		if(($this->session->userdata('permission')->plan) == 'Bronze') {
			$this->db->select('*');
			$this->db->from('agent_bid_info');
			$this->db->where('lead_id',$lead_id);
			$this->db->where('agent_id',$agent_id);
			$query = $this->db->get();
			return $query->num_rows();
		}
		else if(($this->session->userdata('permission')->plan) == 'Platinum') {
			return 0;
		}
		else {
			$q = "select COUNT(id) as cnt FROM agent_bid_info WHERE agent_id = '".$agent_id."' and lead_id = '".$lead_id."' and company_id  = '".$this->input->get_post('company_id')."' GROUP BY company_id having cnt >= '".($this->session->userdata('permission')->no_of_company)."'";
			$query = $this->db->query($q);
			return $query->num_rows();
		}
		
	}
	function updateAgentLeadInfo() {
		if(!$this->checkAgentBidInfo($this->input->get_post('lead_id'),$this->session->userdata('id'),$this->input->get_post('company_id'))) {
			$data['amount'] = $this->input->get_post('amount');
			$data['bid_date'] = date('Y-m-d H:i:s');
			$data['bid_status'] = 'bid';
			$this->db->set($data);
			$this->db->where('agent_id',$this->session->userdata('id'));
			$this->db->where('lead_id',$this->input->get_post('lead_id'));
			if($this->db->update('agent_lead_info')) {
				$data1['amount'] = $this->input->get_post('amount');
				$data1['bid_date'] = date('Y-m-d H:i:s');
				$data1['company_id'] = $this->input->get_post('company_id');
				$data1['bid_status'] = 'bid';
				$data1['agent_id'] = $this->session->userdata('id');
				$data1['lead_id'] = $this->input->get_post('lead_id');
				$this->db->insert('agent_bid_info',$data1);
				
				$this->db->select('l.lead,u.email,u.id,u.first_name,u.last_name');
				$this->db->from('leads l');
				$this->db->join('users u','l.customer_id = u.id');
				$this->db->where('l.id',$this->input->get_post('lead_id'));
				$customerQuery = $this->db->get();
				if($customerQuery->num_rows()) {
					$row = $customerQuery->row();
					///////////////////////////Send Message Notifications////////////////////////////
					$subject = 'CompareTree Notification!';
					$message .= '<table><tr><td><h3>Hi '.$row->first_name.' '.$row->last_name.'</h3></td><td></td></tr>';
					$message .= '<tr><td>You get a info from an agency on your requirement('.$row->lead.').</td><td></td></tr>';
					$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
					$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
					$this->send_mail($row->email,$subject,$message);
					////////////////Notification saved in DataBase///////////////////////////////////
					$data2['user_id'] = $row->id;
					$data2['user_type'] = 'customer';
					$agent_lead_info = $this->checkAgentLeadInfo($this->input->get_post('lead_id'));
					$data2['type_id'] = $agent_lead_info->id;
					$data2['message'] = 'You get a info from an agency on your requirement('.$row->lead.').';
					$data2['type'] = 'bid_info';
					$data2['date_time'] = date('Y-m-d H:i:s');
					$this->db->insert('notifications',$data2);
				}
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
	function myBid() {
		$this->db->select('abi.*,l.lead,l.sku');
		$this->db->from('agent_bid_info abi');
		$this->db->join('leads l','abi.lead_id = l.id');
		$this->db->where('abi.agent_id',$this->session->userdata('agent_id'));
		$this->db->where('abi.bid_status !=','open');
		$this->db->where('abi.is_delete',0);
		$this->db->order_by('abi.bid_status','DESC');
		$query = $this->db->get();
		if($query->num_rows()) {
			return $query->result();
		}
		else {
			return false;	
		}
	}
	function myContact() {
		$this->db->select('u.*');
			$this->db->from("mycontact m");
			$this->db->join("users u","m.user_id = u.id");
			$this->db->where("m.agent_id",$this->session->userdata('id'));
			$query = $this->db->get();
			return $query->result();
	}
	function updatePassword() {
		if($id = $this->session->userdata('id')) {
			$this->db->select('*');
			$this->db->from("agents");
			$this->db->where("id",$id);
			$this->db->where("password",md5($this->input->get_post('password_old')));
			$query = $this->db->get();;
			if($query->num_rows()) {
				$data['password'] = md5($this->input->get_post('password'));
				$data['password_text'] = $this->input->get_post('password');
				$this->db->set($data);
				$this->db->where('id',$id);
				$this->db->update('agents');
				return true;
			}
			else {
				return false;
			}
		}
		else {
			redirect('agent/login');
		}
	}
	function getNotifications() {
		if($id = $this->session->userdata('id')) {
			$this->db->select('*');
			$this->db->from("notifications");
			$this->db->where("user_id",$this->session->userdata('agent_id'));
			$this->db->order_by("id",'Desc');
			$query = $this->db->get();;
			$result = $query->result();
			$this->db->set('status',1);
			$this->db->where("user_id",$this->session->userdata('agent_id'));
			$this->db->update('notifications');
			return $result;
		}
		else {
			return false;
		}
	}
	function customerDetail() {
		$this->db->select('*');
		$this->db->from("users");
		$this->db->where("id",$this->input->get_post('customer_id'));
		$query = $this->db->get();;
		return $query->result();
	}
	function myplans() {
		$this->db->select('*');
		$this->db->from("plans");
		$this->db->where("status",1);
		$query = $this->db->get();
		return $query->result();
	}
	/*REMOVE BY AGNET DECLINED BID "START"*/
	function removeDeclineBid() {
		if($this->input->get_post('bid_id')) {
			$data['is_delete'] = 1;
			$this->db->set($data);
			$this->db->where('id',$this->input->get_post('bid_id'));
			if($this->db->update('agent_bid_info')) {
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
	/*REMOVE BY AGNET DECLINED BID "END"*/
	/*###############################################*/
	/*SHOW AGNET TERRITORIES SCREEN "START"*/
	function myTerritories($id=NULL) {
		if($this->session->userdata('id')) {
			$this->db->select('territory_id,default_territory');
			$this->db->from('agent_territorys');
			$this->db->where('agent_id',(($id)?($id):($this->session->userdata('agent_id'))));
			$query = $this->db->get();
			//echo $this->db->last_query();
			if($data = $query->result()) {
				foreach($data as $dt) {
					$res['territories'][] = $dt->territory_id;
					$res['default_territory'][$dt->territory_id] = $dt->default_territory;
				}
				return $res;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}		
	}
	/*SHOW AGNET TERRITORIES SCREEN "END" ########////////////////*/
	/*//////////////#####################/////////////////////////*/
	/*GET AGNET'S ALL TERRITORIES "START"*/
	function getTerritories() {
		if($this->session->userdata('id')) {
			$this->db->select('s.id,s.state as territory');
			$this->db->from('states s');
			$this->db->join('agents a','a.country_id = s.country_id');
			$this->db->where('a.id',$this->session->userdata('agent_id'));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			if($data = $query->result()) {
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
	function getTerritoryById($territory_id) {
		$this->db->select('s.state as territory');
		$this->db->from('states s');
		$this->db->where('s.id',$territory_id);
		$query = $this->db->get();
		return $query->row()->state;
	}
	function removeAgentTerritory($agent_id) {
		$this->db->where('agent_id',$agent_id);
		if($this->db->delete('agent_territorys')) {
			return 1;
		}
		else {
			return 0;
		}
	}
	/*GET AGNET'S ALL TERRITORIES "END" ########////////////////*/
	/*//////////////#####################/////////////////////////*/
	function updateTerritories() {
		$sess = $this->session->userdata('permission');
		$terrNo = $this->input->get_post('territory');
		if($this->session->userdata('id')) {
			if(($sess->last_territory_update) < (time())) {
				if(($sess->no_of_territory) >= count($terrNo)) {
					if(in_array($this->input->get_post('default_territory'),$terrNo) and $this->removeAgentTerritory($this->session->userdata('agent_id'))) {
						for($i=0;$i<count($terrNo);$i++) {
							$data['agent_id'] = $this->session->userdata('id');
							$data['territory_id'] = $terrNo[$i];
							$data['territory'] = $this->getTerritoryById($terrNo[$i]);
							$data['default_territory'] = (($this->input->get_post('default_territory')==$terrNo[$i])?(1):(0));
							$data['status'] = 1;
							$this->db->insert('agent_territorys',$data);
						}
						$agentPlan['last_territory_update'] = (int)(time()+120);//(24*60*60);
						$this->db->set($agentPlan);			
						$this->db->where('start_date <=',date('Y-m-d H:i:s'));
						$this->db->where('exp_date >',date('Y-m-d H:i:s'));	
						$this->db->where('agent_id',$this->session->userdata('id'));						
						$this->db->update('agent_plans');
						$return['message'] = 'Territories update successfully.';
						$return['error'] = 0;						
					}
					else {
						$return['message'] = 'Notice:Please choose your correct territories';
						$return['error'] = 1;
					}
				}
				else {
					$return['message'] = 'Notice:You can add only '.$sess->no_of_territory.' territories';
					$return['error'] = 1;
				}				
			}
			else {
				$return['message'] = 'Notice:You can not update territories because 24Hr not complete from last update.';
				$return['error'] = 1;
			}			
		}
		else {
			$return['message'] = 'Error: Data not updated.';
			$return['error'] = 1;
		}	
		return $return;
	}
	////////////// AGENT AERRITORIES END HERE///////////////////////
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
		//file_put_contents('message.txt',$message);
        if($this->email->send()) {
			return true;
		}
        else {
			return false;
		}
    }
}
?>
