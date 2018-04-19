<?php

class Api_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
			
	function register() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('mobile',trim(str_replace("+","",$this->input->post('mobile'))));
		$query = $this->db->get();
		if($query->num_rows()) {
			$res = $query->result_array();
			$this->db->where('mobile',$this->input->post('mobile'));
			if(strtotime($res[0]['last_updated']) > strtotime(date("Y-m-d H:i:s",mktime(date("H"),date("i")-3,date("s"),date("m"),date("d"),date("Y"))))) {
				$data['verification_code'] = $res[0]['verification_code'];
			}
			else {
				$data['verification_code'] = rand(100000,999999);
				$data['last_updated'] = date("Y-m-d H:i:s");
			}
			$this->sms($this->input->post('mobile'),$data['verification_code']);
			$data['email'] = $this->input->post('email');
			$this->db->update('users',$data);
			//echo $this->db->last_query();
			return $res[0]['id'];
		}
		else if($this->input->post('email') && $this->input->post('mobile')) {
			$data['email'] = $this->input->post('email');
			$data['mobile'] = trim(str_replace("+","",$this->input->post('mobile')));
			$referral_code = $data['by_referral'] = $this->input->post('referral_code');
			$data['verification_code'] = rand(100000,999999);//'123456';//
			$this->sms($this->input->post('mobile'),$data['verification_code']);
			$reff_id = $this->getUserIdByReferralCode($referral_code);
			if($reff_id)
			$data['reward'] = 600;
			else	
			$data['reward'] = 500;			
			$data['last_updated'] = date("Y-m-d H:i:s");		
			$data['referral_code'] = $this->referralCodeGenerator(8);
			$this->db->insert('users',$data);
			$user_id = $this->db->insert_id();
			$data1['type'] = 'register';
			$data1['type_id'] = $reff_id?$reff_id:0;
			$data1['user_id'] = $user_id;
			$data1['reward'] = 500;
			$data1['create_date'] = date("Y-m-d H:i:s");
			$data1['status'] = 1;
			$this->db->insert('wallet_users',$data1);
			//THIS IS ONLY FOR TESTING PURPOSE WHEN SMS WILL BE WORK THEN ITS WILL GOES TO VERIFICATION CODE
			if($referral_code && $user_id) {
				$wallet['type'] = 'referral';
				$wallet['type_id'] = $this->getUserIdByReferralCode($referral_code);
				$wallet['user_id'] = $user_id;
				$wallet['reward'] = 100;
				$wallet['create_date'] = date("Y-m-d H:i:s");
				$wallet['status'] = 1;
				if($wallet['user_id'])
				$this->db->insert('wallet_users',$wallet);
				///////////////by referral user get credit////////
				$this->db->set('reward','reward + ' .(int)(100),FALSE);
				$this->db->where('id',$wallet['type_id']);
				if($this->db->update('users')) {
					$data2['type'] = 'referral';
					$data2['type_id'] = $user_id;
					$data2['user_id'] = $wallet['type_id'];
					$data2['reward'] = 100;
					$data2['create_date'] = date("Y-m-d H:i:s");
					$data2['status'] = 1;
					$this->db->insert('wallet_users',$data2);
				}
			}
			return $user_id;
		}
		else {
			return false;
		}
		
	}
	function referralCodeGenerator($length = 10) {
		$characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function verification() {
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('mobile',$this->input->post('mobile'));
		$this->db->where('verification_code',$this->input->post('verification_code'));
		$this->db->from('users');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result_array();
		//This code for when sms working fine 
		/*if($results[0]['by_referral']) {
			$wallet['type'] = 'referral';
			$wallet['type_id'] = $results[0]['id'];
			$wallet['user_id'] = $this->getUserIdByReferralCode($referral_code);
			$wallet['reward'] = 200;
			$wallet['create_date'] = date("Y-m-d H:i:s");
			$wallet['status'] = 1;
			if($wallet['user_id'])
			$this->db->insert('wallet_users',$wallet);	
		}*/	
		return $results;
	}
	function getReferralCode() {
		$this->db->select('*');
		$this->db->where('id',$this->input->get('user_id'));
		$this->db->from('users');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function checkUser($user_id) {
		$this->db->select('*');
		$this->db->where('id',$user_id);
		$this->db->from('users');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
		return true;
		else
		return false;
	}
	function getUserIdByReferralCode($referral_code) {
		if($referral_code) {
			$this->db->select('id');
			$this->db->where('referral_code', $referral_code);
			$this->db->from('users');
			$query = $this->db->get();
			//echo $this->db->last_query();
			$data = $query->result_array(); 
			return $data[0]['id'];
		}
		else {
			return false;
		}
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
	function getPuzzle($daily_challenge=0) {
		$this->db->select('g.*, c.category');
		$this->db->from('game as g');
		$this->db->join('categorys as c','g.category_id = c.id');
		$this->db->where('g.status',1);
		$this->db->where('g.daily_challenge',$daily_challenge);
		if($daily_challenge)
		$this->db->where('g.daily_status',1);
		$this->db->order_by('g.orderby','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array(); 
	}
	function getUnlockPuzzle() {
		if($this->input->get_post('user_id')) {
			$this->db->select('g.*, ug.credit');
			$this->db->from('game as g');
			$this->db->join('categorys as c','g.category_id = c.id');
			$this->db->join('unlock_game as ug',"ug.game_id = g.id and ug.user_id = ".$this->input->get_post('user_id'), 'left outer');
			$this->db->where('g.status',1);
			$this->db->where('g.daily_challenge',0);
			$this->db->order_by('g.orderby','ASC');
			$query = $this->db->get();
			return $data = $query->result_array();
		}
		else {
			return false;
		}
		//echo $this->db->last_query();
		 
	}
	function getQuest() {
		if($this->input->get('puzzle')) {
			$this->db->select('q.*, g.game');
			$this->db->from('quests as q');
			$this->db->join('game as g','g.id = q.game_id');
			$this->db->where('g.game',$this->input->get('puzzle'));
			//$this->db->where('g.daily_challenge',0);
			$this->db->order_by('q.id','ASC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array(); 
		}
		else {
			return false;
		}
	}
	function getAnswerMatrix() {
		if($this->input->get('puzzle')) {
			$this->db->select('m.*');
			$this->db->from('matrixs as m');
			$this->db->join('game as g','m.game_id = g.id');
			$this->db->where('g.game',$this->input->get('puzzle'));
			//$this->db->where('g.daily_challenge',0);
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array(); 
		}
		else {
			return false;
		}
	}
	function getCategoryMatrix() {
		if($this->input->get('puzzle')) {
			$this->db->select('q.*');
			$this->db->from('quests as q');
			$this->db->join('game as g','q.game_id = g.id');
			$this->db->where('g.game',$this->input->get('puzzle'));
			//$this->db->where('g.daily_challenge',0);
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array(); 
		}
		else {
			return false;
		}
	}
      
	function getPuzzleId($puzzle) {
		$this->db->select('id');
		$this->db->from('game');
		$this->db->where('game',$puzzle);
		//$this->db->where('daily_challenge',0);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data[0]['id'];
	}
	function getPuzzleCost($id) {
		$this->db->select('cost');
		$this->db->from('game');
		$this->db->where('id',$id);
		//$this->db->where('daily_challenge',0);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data[0]['cost'];
	}
	function getUserCredit($user_id) {
		$this->db->select('reward');
		$this->db->from('users');
		$this->db->where('id',$user_id);
		//$this->db->where('daily_challenge',0);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data[0]['reward'];
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
						//echo $this->input->get_post('user_id');
						return $this->wallet($this->input->get_post('user_id'));
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
		//return $query->result_array(); 
	}
	function wallet($user_id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	function purchaseCredit() {
		$data['type'] = 'purchase';
		$data['type_id'] = $this->input->get_post('transaction_id');
		$data['user_id'] = $this->input->get_post('user_id');
		$data['reward'] = $this->input->get_post('reward');
		$data['create_date'] = date("Y-m-d H:i:s");
		$data['status'] = 1;			
		if($this->db->insert('wallet_users',$data)) {
			//echo $this->db->last_query();
			$this->db->set('reward','reward + ' .(int) $this->input->get_post('reward'),FALSE);
			$this->db->where('id',$this->input->get_post('user_id'));
			if($this->db->update('users')) {
				return $this->wallet($this->input->get_post('user_id'));
			}
		}
		else {
			return false;
		}
		//return $query->result_array();		
	}
	function unlockPuzzle() {
		$data['type'] = 'unlock';
		$wallet['game_id'] = $this->getPuzzleId($this->input->get_post('puzzle'));
		$wallet['user_id'] = $data['user_id'] = $this->input->get_post('user_id');
		$this->putContent('Game:'.$wallet['game_id'].'; User:'.$wallet['user_id']);
		$cost = $wallet['credit'] = $data['reward'] = $this->getPuzzleCost($wallet['game_id']);
		$credit = $this->getUserCredit($wallet['user_id']);
		$data['create_date'] = $wallet['date_time'] = date("Y-m-d H:i:s");
		$data['status'] = $wallet['status'] = 1;
		if(($cost <= $credit) && ($wallet['game_id']) && ($wallet['user_id'])) {	
			if($this->checkDuplicateEntry($wallet['user_id'], $wallet['game_id'])) {
				$this->db->insert('unlock_game',$wallet);
				$data['type_id'] = $this->db->insert_id();
				$this->db->insert('wallet_users',$data);
				$this->db->set('reward','reward - ' .(int) $cost,FALSE);
				$this->db->where('id',$this->input->get_post('user_id'));
				if($this->db->update('users')) {
					$this->db->select('id,reward');
					$this->db->from('users');
					$this->db->where('id',$this->input->get_post('user_id'));
					$query = $this->db->get();
					$data1 = $query->result_array();
					return $data1;
				}
			}
			else {
				$data['duplicate'] = 1;
				return $data;
			}
		}
		else {
			return false;
		}		
	}
	function hintPuzzle() {
		$data['type'] = 'hint';
		$hint['type'] = $this->input->get_post('hint_type');
		$hint['game_id'] = $this->getPuzzleId($this->input->get_post('puzzle'));
		$hint['user_id'] = $data['user_id'] = $this->input->get_post('user_id');
		//$this->putContent('Game:'.$wallet['game_id'].'; User:'.$wallet['user_id']);
		$cost = $hint['credit'] = $data['reward'] = $this->input->get_post('credit');
		$credit = $this->getUserCredit($hint['user_id']);
		$data['create_date'] = $hint['date_time'] = date("Y-m-d H:i:s");
		$data['status'] = $hint['status'] = 1;
		if(($cost <= $credit) && ($hint['game_id']) && ($hint['user_id'])) {	
			$this->db->insert('hint_game',$hint);
			$data['type_id'] = $this->db->insert_id();
			$this->db->insert('wallet_users',$data);
			$this->db->set('reward','reward - ' .(int) $cost,FALSE);
			$this->db->where('id',$this->input->get_post('user_id'));
			if($this->db->update('users')) {
				$this->db->select('id,reward');
				$this->db->from('users');
				$this->db->where('id',$this->input->get_post('user_id'));
				$query = $this->db->get();
				$data1 = $query->result_array();
				return $data1;
			}
		}
		else {
			return false;
		}		
	}
	function purchaseHistory() {
		$this->db->select('wu.reward, wu.create_date,');
		$this->db->from('wallet_users as wu');
		$this->db->where('wu.user_id',$this->input->get_post('user_id'));
		$this->db->where('wu.type','purchase');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
			return $query->result_array();
		else
			return false;
	}
	function referralHistory() {
		$this->db->select('wu.reward, wu.create_date, u.email, u.mobile');
		$this->db->from('wallet_users as wu');
		$this->db->join('users as u','wu.type_id = u.id');
		$this->db->where('wu.user_id',$this->input->get_post('user_id'));
		$this->db->where('wu.type','referral');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
			return $query->result_array();
		else
			return false;
	}
	function unlockHistory() {
		$this->db->select('wu.reward, wu.create_date, g.game, c.category');
		$this->db->from('wallet_users as wu');
		$this->db->join('unlock_game as ug','wu.type_id = ug.id');
		$this->db->join('game as g','ug.game_id = g.id');
		$this->db->join('categorys as c','g.category_id = c.id');
		$this->db->where('wu.user_id',$this->input->get_post('user_id'));
		$this->db->where('wu.type','unlock');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
			return $query->result_array();
		else
			return false;
	}
	function hintHistory() {
		$this->db->select('wu.reward, wu.create_date, g.game, c.category');
		$this->db->from('wallet_users as wu');
		$this->db->join('hint_game as hg','wu.type_id = hg.id');
		$this->db->join('game as g','hg.game_id = g.id');
		$this->db->join('categorys as c','g.category_id = c.id');
		$this->db->where('wu.user_id',$this->input->get_post('user_id'));
		$this->db->where('wu.type','hint');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
			return $query->result_array();
		else
			return false;
	}
	function winHistory() {
		$this->db->select('wu.reward, wu.create_date, g.game, c.category');
		$this->db->from('wallet_users as wu');
		$this->db->join('game_users as gu','wu.type_id = gu.id');
		$this->db->join('game as g','gu.game_id = g.id');
		$this->db->join('categorys as c','g.category_id = c.id');
		$this->db->where('wu.user_id',$this->input->get_post('user_id'));
		$this->db->where('wu.type','win');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
			return $query->result_array();
		else
			return false;
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	function checkDuplicateEntry($user_id, $game_id) {
		$this->db->select('*');
		$this->db->from('unlock_game');
		$this->db->where('user_id',$user_id);
		$this->db->where('game_id',$game_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows())
			return false;
		else
			return true;
	}
	function putContent($str) {
		if($str) {
			$content['content'] = $str;
			if($this->db->insert('put_content',$content)) {	
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
	function sms($mobile,$verifyCode) {
		$message = "Crosswords Verification Code:".$verifyCode;
		//echo $mobile = (string)($mobile);
		$mobile = trim(str_replace('+','',$mobile));
		if(substr($mobile,0,2)=='44'){
			$mobile = '+44'.substr($mobile,2);
		}
		else {
			$mobile = '+44'.$mobile;
		}
		
  file_put_contents('sms.txt',$mobile);
		$ch = curl_init();
		$curlConfig = array(
			CURLOPT_URL            => "http://52.9.22.124/twilio-php-master/sms.php",
			CURLOPT_POST           => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS     => array(
			'mobile' => (string)$mobile,
			'msg' => $message,
			)
		);
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
		curl_close($ch);	
	}
}
