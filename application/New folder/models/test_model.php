<?php

class Customer_model extends CI_Model {
	
	/*##################################
	#### Show user grid with paging ####
	########## and dropdown ############
	###################################*/
	function checkLogin() {
		if($this->input->get_post('email') && $this->input->get_post('password')) {
			$this->db->select('first_name,last_name,username,password,email,mobile,image,status');
			$this->db->from('users');
			$this->db->where('email',$this->input->get_post('email'));
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
			$data['email'] = $this->input->get_post('email');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['gender'] = $this->input->get_post('gender');
			$data['marital'] = $this->input->get_post('marital');
			$this->db->insert('users',$data);
			return $this->db->insert_id();
		}
	}
		
}
?>
