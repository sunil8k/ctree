<?php

class Api_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
			
	function register() {
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('mobile',$this->input->post('mobile'));
		$query = $this->db->get();
		//echo $query->num_rows();
		if($query->num_rows()) {
			$res = $query->result_array();
			$this->db->where('email',$this->input->post('email'));
			$this->db->where('mobile',$this->input->post('mobile'));
			$data['verification_code'] = rand(100000,999999);
			$this->db->update('users',$data);
			/*echo $res[0]['id'];
			die;*/
			return $res[0]['id'];
		}
		else if($this->input->post('email') && $this->input->post('mobile')) {
			$data['email'] = $this->input->post('email');
			$data['mobile'] = $this->input->post('mobile');
			$data['verification_code'] = rand(100000,999999);
			$this->db->insert('users',$data);
			
			return $this->db->insert_id();
			
		}
		else {
			return false;
		}
	}
	function verification() {
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('mobile',$this->input->post('mobile'));
		$this->db->where('verification_code',$this->input->post('verification_code'));
		$this->db->from('users');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 	
	}
	function getReferralCode() {
		$this->db->select('*');
		$this->db->where('email',$this->input->get('email'));
		$this->db->from('users');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function myProfile() {
		$this->db->select('*');
		$this->db->where('id',$this->input->get('user_id'));
		$this->db->from('users');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function updateProfile() {
		if($this->input->post('user_id')) {
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['country_code'] = $this->input->post('country_code');
			$data['mobile'] = $this->input->post('mobile');
			$data['verification_code'] = rand(100000,999999);
			$this->db->where('id',$this->input->post('user_id'));
			$this->db->update('users',$data);
			/*echo $this->db->last_query();
			echo $res[0]['id'];
			die;*/
			return $this->input->post('user_id');
		}
		else {
			return false;
		}
	}
	function getPuzzle() {
		$this->db->select('g.*, c.category');
		$this->db->from('game as g');
		$this->db->join('categorys as c','g.category_id = c.id');
		$this->db->where('g.status',1);
		$this->db->order_by('g.game','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function getQuest() {
		$this->db->select('q.*, g.game');
		$this->db->from('quests as q');
		$this->db->join('game as g','g.id = q.game_id');
		$this->db->where('g.game',$this->input->get('puzzle'));
		$this->db->order_by('q.id','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function getAnswerMatrix() {
		$this->db->select('m.*');
		$this->db->from('matrixs as m');
		$this->db->join('game as g','m.game_id = g.id');
		$this->db->where('g.game',$this->input->get('puzzle'));
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function getCategoryMatrix() {
		$this->db->select('q.*');
		$this->db->from('quests as q');
		$this->db->join('game as g','q.game_id = g.id');
		$this->db->where('g.game',$this->input->get('puzzle'));
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function winPuzzle() {
		$dt['type'] = 'win';
		$data['taken_time'] = $this->input->get_post('time');
		$data['game_id'] = $this->getPuzzleId($this->input->get_post('puzzle'));
		$dt['user_id'] = $data['user_id'] = $this->input->get_post('user_id');
		$dt['reward'] = $data['reward'] = $this->input->get_post('reward');
		$dt['create_date'] = $data['play_datetime'] = date("Y-m-d H:i:s");
		$dt['status'] = $data['status'] = 1;
		if($this->db->insert('game_users',$data)) {
			if($dt['type_id'] = $this->db->insert_id()) {			
				if($this->db->insert('wallet_users',$dt)) {
					$this->db->set('reward','reward + ' .(int) $this->input->get_post('reward'),FALSE);
					$this->db->where('id',$this->input->get_post('user_id'));
					if($this->db->update('users')) {
						return true;
					}
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
		return $query->result_array(); 
	}
	function getPuzzleId($puzzle) {
		$this->db->select('id');
		$this->db->from('game');
		$this->db->where('game',$puzzle);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data[0]['id'];
	}
	function wallet($user_id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
}