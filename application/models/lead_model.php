<?php
class Lead_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
	
	function section() {
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('id',$this->input->get_post('section'));
		$query = $this->db->get();		
		//echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			$data['sectionHtml'] = $query->result();
			$this->db->select('*');
			$this->db->from('categorys');
			$this->db->where('section_id',$data['sectionHtml'][0]->id);
			$this->db->where('parent',0);
			$q = $this->db->get();		
			//echo $this->db->last_query();
			if ($q->num_rows() > 0) {
				$data['results'] = $q->result();
				//print_r($data);die;
				return $data;
			}
		}
		return false;
	}	 
	function countryList() {
		$this->db->select('*');
		$this->db->from('countrys');
		$this->db->where('status',1);
		$query = $this->db->get();		
		//echo $this->db->last_query();
		$data = $query->result();
		return $data;
	}
	function fillState($id) {
		$this->db->select('*');
		$this->db->from('states');
		$this->db->where('status',1);
		$this->db->where('country_id',$id);
		$query = $this->db->get();		
		//echo $this->db->last_query();
		$data = $query->result();
		return $data;
	}
	function parentCategory($id=NULL) {		
		$this->db->select('*');
		$this->db->from('categorys');
		if($id)
		$this->db->where('parent', $id);
		else
		$this->db->where('parent', 0);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}	
	function leadSave() {
		/*$customer['email'] = $this->input->get_post('email');
		$customer['mobile'] = $this->input->get_post('mobile');
		$customer['first_name'] = $this->input->get_post('first_name');
		$customer['last_name'] = $this->input->get_post('last_name');
		$customer['gender'] = $this->input->get_post('gender');
		$customer['marital'] = $this->input->get_post('marital');*/
		if($this->session->userdata('id')) {
			$this->db->select('id,email,username,mobile');
			$this->db->from('users');
			$this->db->where('id',$this->session->userdata('id'));
			$userQuery = $this->db->get();
			$users = $userQuery->row();
			
			$contact['email'] = $users->email;//$this->input->get_post('email');
			$contact['mobile'] = $users->mobile;//$this->input->get_post('mobile');
			$leads['customer_id'] = $this->session->userdata('id');
		}
		else {
			$contact['email'] = $this->input->get_post('email');
			$contact['mobile'] = $this->input->get_post('mobile');
			$this->load->model('users_model');
			$leads['customer_id'] = $this->users_model->checkCustomer();
		}
			
			$leads['section_id'] = $this->input->get_post('section_id');
			$leads['category_id'] = $this->getCategory($_REQUEST['parent']);
			$leads['country_id'] = $this->input->get_post('country');
			$leads['state_id'] = $this->input->get_post('state');
			$leads['city_id'] = $this->getCity($this->input->get_post('city'),$this->input->get_post('country'));
			$leads['lead'] = $this->input->get_post('note');
			$leads['create_date'] = date('Y-m-d H:i:s');
			$leads['last_update'] = date('Y-m-d H:i:s');
			$leads['is_active'] = 1;
			$leads['status'] = 1;
			if($this->db->insert('leads',$leads)) {
				$lead_id = $this->db->insert_id();
				$contact['lead_id'] = $lead_id;
				$contact['first_name'] = $this->input->get_post('first_name');
				$contact['last_name'] = $this->input->get_post('last_name');
				$contact['gender'] = $this->input->get_post('gender');
				$contact['marital'] = $this->input->get_post('marital');
				$contact['address'] = $this->input->get_post('address');
				$contact['country'] = $this->getCountry($this->input->get_post('country'));
				$contact['state'] = $this->getState($this->input->get_post('state'));
				$contact['city'] = $this->input->get_post('city');
				$contact['zip'] = $this->input->get_post('zip');
				if($this->db->insert('lead_contacts',$contact)) {
					$i = 1;
					foreach($this->input->get_post('parent') as $v) {
						$data['lead_id'] = $lead_id;
						$data['lead_key'] = 'category_'.$i;
						$data['lead_value'] = $this->getCatName($v);
						$this->db->insert('lead_details',$data);
						$i++;
					}
					$detail['price'] = $this->input->get_post('price');
					$detail['model'] = $this->input->get_post('model');
					$detail['quantity'] = $this->input->get_post('quantity');
					$detail['notes'] = $this->input->get_post('note');
					
					foreach($detail as $k=>$v) {
						$data['lead_id'] = $lead_id;
						$data['lead_key'] = $k;
						$data['lead_value'] = $v;
						$this->db->insert('lead_details',$data);
					}
				}
			}
			$leadSku['sku'] = 'CUS'.$leads['customer_id'].'SEC'.$leads['section_id'].'LED'.$lead_id;
			$this->db->set('sku',$leadSku['sku']);
			$this->db->where('id',$lead_id);
			$this->db->update('leads');
			$this->shareLeadInfoToAgent($lead_id);
			return true;
	}
	function shareLeadInfoToAgent($lead_id) {
		/*get valid agent to the lead*/
		$this->db->select('a.id as agent_id,a.email,(SELECT distinct(ap.agent_id) FROM agent_plans as ap WHERE ap.agent_id = a.id and start_date<"'.date("Y-m-d H:i:s").'" and exp_date<"'.date("Y-m-d H:i:s").'" and ap.plan != "bronze") as sendStatus,(SELECT distinct(ap.agent_id) FROM agent_plans as ap WHERE ap.agent_id = a.id and  ap.plan != "bronze") as diffPlan');
		$this->db->from('agents a');
		$this->db->join('lead_contacts lc','a.zipcode = lc.zip');
		$this->db->where('lc.lead_id',$lead_id);
		$this->db->where('a.type','provider');
		$query_agent = $this->db->get();
		//echo $this->db->last_query();die;
		if($query_agent->num_rows()) {
			$agents = $query_agent->result();
			//$i = 0;$i++;
			foreach($agents as $agent) { 
				if(($agent->sendStatus && $agent->diffPlan) or !$agent->diffPlan) {
					$data['agent_id'] = $agent->agent_id;
					$data['lead_id'] = $lead_id;
					$data['open_date'] = date('Y-m-d H:i:s');
					if($this->db->insert('agent_lead_info',$data)) {
						$notification['user_id'] = $agent->agent_id;
						$notification['type_id'] = $this->db->insert_id();
						$notification['type'] = 'lead_info';
						$notification['message'] = 'You find a lead info.';
						$notification['date_time'] = date('Y-m-d H:i:s');
						$notification['status'] = 0;
						if($this->db->insert('notifications',$notification)) {
							$subject = 'CompareTree Notifications!';
							$message .= '<table><tr><td><h3>Congratulation!</h3></td><td></td></tr>';
							$message .= '<tr><td>Please check you account on compareTree.</td><td></td></tr>';
							$message .= '<tr><td colspan=2>You earn a lead.</td></tr>';
							$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
							$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
							//file_put_contents('share'.$i.'.txt',$agent->email.' '.$message);
							$this->send_mail($agent->email,$subject,$message);
							$subject = '';$message = '';
						}
					}
				}
			}
			return true;
		}
		else {
			return false;
		}
	}
	function getCategory($parent) {
		foreach($parent as $val) {
			if($val) $ret = $val;
		}
		return $ret;
	}
	function getCity($city,$country) {
		$this->db->select('id');
		$this->db->from('citys');
		$this->db->where('city', $city);
		$this->db->where('country_id', $country);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row();
		//print_r($result);
		return $result->id;
	}
	function getCatName($category_id) {
		$this->db->select('category');
		$this->db->from('categorys');
		$this->db->where('id', $category_id);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row();
		//print_r($result);
		return $result->category;
	}
	function getCountry($country) {
		$this->db->select('country');
		$this->db->from('countrys');
		$this->db->where('id', $country);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row();
		//print_r($result);
		return $result->country;
	}
	function getState($state) {
		$this->db->select('state');
		$this->db->from('states');
		$this->db->where('id', $state);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row();
		//print_r($result);
		return $result->state;
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
}
?>
