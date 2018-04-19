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
		
		$this->load->model('users_model');
		$leads['customer_id'] = $this->users_model->checkCustomer();
		$leads['section_id'] = $this->input->get_post('section_id');
		$leads['category_id'] = $this->getCategory($_REQUEST['parent']);
		$leads['country_id'] = $this->input->get_post('country');
		$leads['state_id'] = $this->input->get_post('state');
		$leads['city_id'] = $this->getCity($this->input->get_post('city'),$this->input->get_post('country'));
		$leads['lead'] = $this->input->get_post('note');
		$leads['create_date'] = date('Y-m-d H:i:s');
		$leads['last_update'] = date('Y-m-d H:i:s');
		$leads['is_active'] = 0;
		$leads['status'] = 1;
		if($this->db->insert('leads',$leads)) {
			$lead_id = $this->db->insert_id();
			$contact['lead_id'] = $lead_id;
			$contact['email'] = $this->input->get_post('email');
			$contact['mobile'] = $this->input->get_post('mobile');
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
		/*//print_r($detail);
		die;
		$leads['customer_id'];
		$deails[];*/
		return true;
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
}
?>
