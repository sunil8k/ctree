<?php

class Game_model extends CI_Model {
	
/*##################################
#### Show user grid with paging ####
########## and dropdown ############
###################################*/
	
	function show() {
		$this->db->select('g.*,c.category');
		$this->db->from('game g');
		$this->db->join('categorys c', 'g.category_id = c.id');
		$this->db->where('daily_challenge',0);
		$this->db->order_by('g.orderby','desc');
		$query = $this->db->get();
		return $query->result();
	}
	function dailyChallenge() {
		$this->db->select('g.*,c.category');
		$this->db->from('game g');
		$this->db->join('categorys c', 'g.category_id = c.id');
		$this->db->where('daily_challenge',1);
		$this->db->order_by('g.orderby','desc');
		$query = $this->db->get();
		return $query->result();
	}
	function add($id=Null) {
		$this->db->select('*');
		$this->db->from('categorys');
		if($id)
		$this->db->where('id',$id);
		else
		$this->db->where('status',1);		
		$query = $this->db->get();
		return $query->result_array();
	}
	function edit($id) {
		$this->db->select('*');
		$this->db->from('game');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function edit_save() {
		$id = $this->input->post('id');
		$title = $this->input->post('title'); 
		if($title){
			$data['title'] = $title;
		}
		echo $post = $this->input->post('post'); die;
		if($post){
			$data['post'] = $post;
		}
		$this->db->where('id',$id);
		$this->db->set($data);
		$this->db->update('posts',$data); 
		return true; 
	}
/*
##############################
######## End User grid #########
######### and dropdown #########
###############################*/
	function ajax(){		
		$this->db->select('p.*, u.first_name, u.last_name, u.mobile, u.email');
		$this->db->from('users u');
		$this->db->join('posts p', 'u.id = p.user_id');
		$this->db->where('p.id', $this->input->get_post('post_id'));
		$query = $this->db->get();
		return $query->result_array(); 
	}
	function active(){	
		$game_id = $this->input->get_post('id');
		$status = $this->checkStatus($game_id);
		$data['status'] = ($status[0]['status']?0:1);
		$this->db->set($data);
		$this->db->where('id',$game_id);
		$this->db->update('game');
		//echo $this->db->last_query();die;
		return true;
	}
	function checkStatus($id) {
		$this->db->select('status');
		$this->db->from('game');
		$this->db->where('id', $id);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	function dailyStatus($id) {
		$this->db->set('daily_status',0);
		$this->db->update('game');
		$this->db->set('daily_status',1);
		$this->db->where('id', $id);
		$this->db->update('game');
		
		return true;
	}
	function delete($id){
		$this->db->where('id',$id);
		if($this->db->delete('game')) {
			return true;
		}
		else {
			return false;
		}
	}
	function get_game_id() {
		$data['id'] = $this->input->get_post('id');
		$data['game'] = $this->input->get_post('game');
		$data['cost'] = $this->input->get_post('cost');
			$data['daily_challenge'] = $this->input->get_post('daily_challenge')?$this->input->get_post('daily_challenge'):0;
		$data['category_id'] = $this->input->get_post('category');
		$data['last_updated'] = date('Y-m-d H:i:s');
		$data['status'] = 1;
		if($data['id']) {	
			$game_id = $data['id'];
			$this->db->set($data);
			$this->db->where('id',$data['id']);
			$this->db->update('game');
		}
		else {
			$data['game'] = $this->input->get_post('game');
			$data['cost'] = $this->input->get_post('cost');
			echo $data['daily_challenge'] = $this->input->get_post('daily_challenge')?$this->input->get_post('daily_challenge'):0;
			$data['category_id'] = $this->input->get_post('category');
			$data['last_updated'] = date('Y-m-d H:i:s');
			$data['status'] = 1;
			$this->db->insert('game',$data);
			$game_id = $this->db->insert_id();
			$dt['orderby'] = $game_id;
			$this->db->set($dt);
			$this->db->where('id',$game_id);
			$this->db->update('game');
		}
		return $game_id;
	}
	function quest() {	
		
		$cross = 'x';
		$dass = '-';	
		$hass = '#';	
		$data_quest['game_id'] = $data['game_id'] = $this->input->get_post('game_id');
		$data['category'] = $data['category'] = $this->input->get_post('category');
		$data_quest['question'] = $data['question'] = ucwords($this->input->get_post('question'));
		$data_quest['answer'] = $data['answer'] = strtoupper($this->input->get_post('answer'));
		$data_quest['serial'] = $data['serial'] = $this->input->get_post('serial');
		$data_quest['type'] = $data['type'] = $this->input->get_post('type');
		$data_quest['min_row'] = $data['min_row'] = $this->input->get_post('min_row');
		$data_quest['min_col'] = $data['min_col'] = $this->input->get_post('min_col');
		$data_quest['max_row'] = $data['max_row'] = $this->input->get_post('max_row');
		$data_quest['max_col'] = $data['max_col'] = $this->input->get_post('max_col');
		$data_quest['title'] = $data['title'] = $data['type'].$hass.$data['min_row'].$dass.$data['max_row'].$cross.$data['min_col'].$dass.$data['max_col'];
		$data_quest['status'] = 1;
		
		$quest_id = $this->checkQuest($data['game_id'],$data['title']);
		if($this->input->get_post('task')=='add') {
			if($this->checkcells($data['game_id'],$quest_id,$data['min_row'],$data['max_row'],$data['min_col'],$data['max_col'],$data['type'],$data['answer'])=='TRUE1') {
				return 'error';
			}
			else {
				if($quest_id) {
					$this->db->set($data_quest);
					$this->db->where('id',$quest_id);
					$this->db->update('quests');
					$this->setMatrix($data['game_id'],$quest_id,$data['min_row'],$data['max_row'],$data['min_col'],$data['max_col'],$data['type'],$data['answer']);
					return true;
				}
				else {
					if($this->db->insert('quests', $data_quest)) {
						$quest_id = $this->db->insert_id();
						$this->setMatrix($data['game_id'],$quest_id,$data['min_row'],$data['max_row'],$data['min_col'],$data['max_col'],$data['type'],$data['answer']);
						
						return true;
					}		
				}
			}
		}
		else {
			if($quest_id) {
					$this->db->set($data_quest);
					$this->db->where('id',$quest_id);
					$this->db->update('quests');
					$this->setMatrix($data['game_id'],$quest_id,$data['min_row'],$data['max_row'],$data['min_col'],$data['max_col'],$data['type'],$data['answer']);
					return true;
				}
				else {
					if($this->db->insert('quests', $data_quest)) {
						$quest_id = $this->db->insert_id();
						$this->setMatrix($data['game_id'],$quest_id,$data['min_row'],$data['max_row'],$data['min_col'],$data['max_col'],$data['type'],$data['answer']);
						
						return true;
					}		
				}
		}
	}
	function setMatrix($g_id,$q_id,$mnr,$mxr,$mnc,$mxc,$type,$answer) {
		$i = 0;
		if($type=="row") {
			$row = $mxr; 
			for($col=$mnc;$col<=$mxc;$col++) {
				$value = strtoupper(substr($answer,$i,1));
				$this->checkMatrix($g_id,$q_id,$row,$col,$value);
				$i++;
			}
		}
		else {
			$col = $mxc;
			for($row=$mnr;$row<=$mxr;$row++) {
				$value = substr($answer,$i,1);
				$this->checkMatrix($g_id,$q_id,$row,$col,$value);
				$i++;
			}
		}
	}
	function checkMatrix($game_id,$quest_id,$row,$col,$value) {
		$data['game_id'] = $game_id;
		$data['quest_id'] = $quest_id;
		$data['row'] = $row;
		$data['col'] = $col;
		$data['value'] = $value;
		$this->db->select('*');
		$this->db->from('matrixs');
		$this->db->where('game_id', $game_id);
		$this->db->where('quest_id', $quest_id);
		$this->db->where('row', $row);
		$this->db->where('col', $col);
		$query = $this->db->get();
		$res = $query->result_array();		
		if(count($res)) {			
			$this->db->set($data);
			$this->db->where('game_id', $game_id);
			$this->db->where('quest_id', $quest_id);
			$this->db->where('row', $row);
			$this->db->where('col', $col);
			$this->db->update('matrixs');
		}
		else {
			$this->db->insert('matrixs',$data);
		}
		
	}
	////////////////////////////////////////////////////////////////////
	/////////////////check cell repeated value//////////////////////////
	function checkCells($g_id,$q_id,$mnr,$mxr,$mnc,$mxc,$type,$answer) {
		$i = 0;
		$error = 0;
		if($type=="row") {
			$row = $mxr; 
			for($col=$mnc;$col<=$mxc;$col++) {
				$value = strtoupper(substr($answer,$i,1));
				if($this->checkcell($g_id,$q_id,$row,$col,$value)=='TRUE') {
					$error = 1;
				}
				$i++;
			}
		}
		else {
			$col = $mxc;
			for($row=$mnr;$row<=$mxr;$row++) {
				$value = substr($answer,$i,1);
				if($this->checkcell($g_id,$q_id,$row,$col,$value)=='TRUE'){
					$error = 1;
				}
				$i++;
			}
		}
		if($error) {
		return 'TRUE1'; }
		else {
		return false; }
	}
	function checkcell($game_id,$quest_id,$row,$col,$value) {
		$this->db->select('*');
		$this->db->from('matrixs');
		$this->db->where('game_id', $game_id);
		$this->db->where('row', $row);
		$this->db->where('col', $col);
		$query = $this->db->get();
		$res = $query->result_array();	
		if(count($res)) {
			if($res[0]['value'] && strtoupper($res[0]['value'])!=strtoupper($value)) {
				return 'TRUE';
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
		
	}
	///////////////////////////////////////////////////////////////////////
	////////////////////end check repeated value///////////////////////////
	function checkQuest($game_id,$title) {
		$this->db->select('id');
		$this->db->from('quests');
		$this->db->where('game_id', $game_id);
		$this->db->where('title', $title);
		$query = $this->db->get();
		$res = $query->result_array();		
		if(count($res)) {			
			return $res[0]['id'];
		}
		else {
			return false;
		}
	}
	function addPuzzle() {
		$this->db->from('game');
		$this->db->where('id', $this->input->get_post('game_id'));
		$query = $this->db->get();		
		$data['game'] = $query->result_array();	
		
		$this->db->from('categorys');
		$this->db->where('id', $this->input->get_post('category_id'));
		$query = $this->db->get();		
		$data['category'] = $query->result_array();	
		return $data;
	}
	function getGameData() {
		$this->db->select('row as r,col as c,value as v');
		$this->db->from('matrixs');
		$this->db->where('game_id', $this->input->get_post('game_id'));
		$query = $this->db->get();		
		$data['matrix'] = $query->result_array();
		$this->db->select('*');
		$this->db->from('quests');
		$this->db->where('game_id', $this->input->get_post('game_id'));
		$query = $this->db->get();		
		$data['group'] = $query->result_array();
		return  $data;	
	}
	function deleteBlock($game_id, $category_id, $quest_id) {
		$this->db->where('game_id',$game_id);
		$this->db->where('quest_id',$quest_id);
		if($this->db->delete('matrixs')) {
			$this->db->where('id',$quest_id);
			if($this->db->delete('quests')) {
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
	function resetGame($game_id) {
		$this->db->where('game_id',$game_id);
		if($this->db->delete('matrixs')) {
			$this->db->where('game_id',$game_id);
			if($this->db->delete('quests')) {
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
 
	function getAnswerMatrix() {
		$this->db->select('m.*');
		$this->db->from('matrixs as m');
		$this->db->join('game as g','m.game_id = g.id');
		$this->db->where('g.game',$this->input->get('puzzle'));
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function changeOrder() {
		$id = $this->input->get_post('id');
		$orderby = $this->getOrderById($id);
		$this->db->select('*');
		$this->db->from('game');
		if($this->input->get_post('flow')=="up") {
			$this->db->where('orderby <',$orderby);	
			$this->db->order_by('orderby','DESC');		
		}
		else {
			$this->db->where('orderby >',$orderby);
			$this->db->order_by('orderby','ASC');			
		}
		if($this->input->get_post('daily')) {
			$this->db->where('daily_challenge',1);
		}
			//$this->db->where('status',1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$dt = $query->result_array();
		$orderby2 = $dt[0]['orderby'];
		$id2 = $dt[0]['id'];
		
		if($id and $id2 and $orderby and $orderby2) {
			$data['orderby'] = $orderby2;
			$this->db->set($data);
			$this->db->where('id',$id);
			$this->db->update('game');
			echo $this->db->last_query();
			$data['orderby'] = ($orderby);
			$this->db->set($data);
			$this->db->where('id',$id2);
			$this->db->update('game');
			echo $this->db->last_query();
			//die;
			return true;
		}
		else {
			return false;			
		}
	}
	function getOrderById($id) {
		$this->db->select('orderby');
		$this->db->from('game');
		$this->db->where('id',$this->input->get('id'));
		$query = $this->db->get();
		$data = $query->result_array(); 
		return $data[0]['orderby'];
	}
}

?>