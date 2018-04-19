<?php

class Api_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
			function show() {
				$this->db->select('*');
				$this->db->from('levels');
				$query = $this->db->get();
				return $query->result_array(); 	
			}
			function countAgency() {				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type', 'agency');
				$this->db->where('status', 0);
				$query = $this->db->get();
				$data['inactive'] = $query->num_rows();//count($query->row_array());
				///////////////////////////////////////////////
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type', 'agency');
				$this->db->where('status', 1);
				$data['active'] = $this->db->get()->num_rows();//count($query->row_array());
				return $data;
			}
			function countCustomer() {
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type', 'customer');
				$this->db->where('status', 0);
				$data['inactive'] = $this->db->get()->num_rows();
				///////////////////////////////////////////////
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type', 'customer');
				$this->db->where('status', 1);
				$data['active'] = $this->db->get()->num_rows();
				return $data;
				
			}
			function countPost() {
				$this->db->select('*');
				$this->db->from('posts');
				$this->db->where('status', 0);
				$data['inactive'] = $this->db->get()->num_rows();
				///////////////////////////////////////////////
				$this->db->select('*');
				$this->db->from('posts');
				$this->db->where('status', 1);
				$data['active'] = $this->db->get()->num_rows();
				return $data;
				
			}
			function countApplied() {
				$this->db->select('*');
				$this->db->from('post_applys');
				$this->db->where('status', 1);
				$data['active'] = $this->db->get()->num_rows();
				return $data;
				
			}
}