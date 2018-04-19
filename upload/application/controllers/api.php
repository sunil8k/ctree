<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("api_model");/*
		$this->load->model("users_model");*/
	}	
	function register() {
		$user_id = $this->api_model->register();
		if($user_id) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('100');
			$str['response']['user_id'] = $user_id;
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('101');
		}
		
		echo json_encode($str);
		die;
	}
	function verification() {
		$data = $this->api_model->verification();
		if($data[0]['id']) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('100');
			$str['response']['user_id'] = $data[0]['id'];
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('101');
		}
		
		echo json_encode($str);
		die;
	}
	function resendOTP() {
		$user_id = $this->api_model->register();
		if($user_id) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('500');
			$str['response']['user_id'] = $user_id;
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		
		echo json_encode($str);
		die;
	}
	function referralCode() {
		$data = $this->api_model->getReferralCode();
		if(count($data)) {			
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('502');
			$str['response']['user_id'] = $data[0]['id'];
			$str['response']['referral_code'] = $data[0]['referral_code'];
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		
		echo json_encode($str);
		die;
	}
	function myProfile() {
		$data = $this->api_model->myProfile();
		if(!empty($data[0]['id'])) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('100');
			$str['response']['profile']['user_id'] = $data[0]['id'];
			$str['response']['profile']['first_name'] = $data[0]['first_name'];
			$str['response']['profile']['last_name'] = $data[0]['last_name'];
			$str['response']['profile']['email'] = $data[0]['email'];
			$str['response']['profile']['country_code'] = $data[0]['country_code'];
			$str['response']['profile']['mobile'] = $data[0]['mobile'];
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('101');
		}
		
		echo json_encode($str);
		die;
	}
	function updateProfile() {
		$user_id = $this->api_model->updateProfile();
		if($user_id) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('100');
			$str['response']['user_id'] = $user_id;
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('101');
		}
		
		echo json_encode($str);
		die;
	}
	
	function puzzle_old() {
		$results = $this->api_model->getPuzzle();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$str['response']['puzzle_name'][] = $result['game'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		
		echo json_encode($str);
		die;
	}
	
	function puzzle() {
		$results = $this->api_model->getPuzzle();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$str['response']['puzzle_name'][] = $result['game'];
			$str['response']['puzzle_cost'][] = (int)$result['cost'];
			$str['response']['puzzle_category'][] = $result['category'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		
		echo json_encode($str);
		die;
	}
	function puzzleCost() {
		$results = $this->api_model->getPuzzle();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$str['response']['puzzle_cost'][] = $result['cost'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		
		echo json_encode($str);
		die;
	}
	function puzzleCategory() {
		$results = $this->api_model->getPuzzle();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$str['response']['puzzle_category'][] = $result['category'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		
		echo json_encode($str);
		die;
	}
	function puzzleQuestionAnswer() {
		if($this->input->get_post('puzzle')) {
			$results = $this->api_model->getQuest();
			$results1 = $this->api_model->getAnswerMatrix();
			if(count($results) && count($results1)) {			
				$str['status'] = "Success";
				foreach($results as $result) {
					$str['response']['question'][] = $result['question'];
					$str['response']['answer'][] = $result['answer'];
					$str['response']['category_array'][] = $result['serial'];
				}
				foreach($results1 as $result1) {
					$matrix[$result1['row']][$result1['col']] = $result1['value']?$result1['value']:"";
				}
				if(count($matrix)) {
					for($i=0;$i<=12;$i++) {
						for($j=0;$j<=12;$j++) {
							$str['response']['matrix'][$i][$j] = $matrix[$i][$j]?$matrix[$i][$j]:"";
						}
					}
				}
			}
			else {
				$str['status'] = "Failed";
				$str['msg'] = $this->textMessage('503');
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('503');
		}
		
		echo json_encode($str);
		die;
	}
	function puzzleQuestion() {
		$results = $this->api_model->getQuest();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$str['response']['question'][] = $result['question'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('503');
		}
		
		echo json_encode($str);
		die;
	}
	function puzzleAnswer() {
		$results = $this->api_model->getQuest();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$str['response']['answer'][] = $result['answer'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('503');
		}
		
		echo json_encode($str);
		die;
	}
	function puzzleCategoryArray() {
		$results = $this->api_model->getQuest();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			//$str['response']['category_array'][] = $result['title'];
			$str['response']['category_array'][] = $result['serial'];
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('503');
		}
		
		echo json_encode($str);
		die;
	}
	function fullAnswerMatrix() {
		$results = $this->api_model->getAnswerMatrix();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
			$matrix[$result['row']][$result['col']] = $result['value']?$result['value']:"";
			}
			for($i=0;$i<=12;$i++) {
				for($j=0;$j<=12;$j++) {
					$str['response']['matrix'][$i][$j] = $matrix[$i][$j]?$matrix[$i][$j]:"";
				}
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('503');
		}
		
		echo json_encode($str);
		die;
	}
	function categoryMatrix() {
		$results = $this->api_model->getCategoryMatrix();
		if(count($results)) {			
			$str['status'] = "Success";
			foreach($results as $result) {
				for($i=0;$i<=12;$i++) {
					for($j=0;$j<=12;$j++) {
						if((($result['min_row']<=$i) && ($result['max_row']>=$i)) && (($result['min_col']<=$j) && ($result['max_col']>=$j))) {
							//$matrix[$i][$j][] = $result['title']?$result['title']:"";
							$matrix[$i][$j][] = $result['serial']?$result['serial']:"";
						}
					}
				}
			}
			for($i=0;$i<=12;$i++) {
				for($j=0;$j<=12;$j++) {
					$str['response']['matrix'][$i][$j][0] = $matrix[$i][$j][0]?$matrix[$i][$j][0]:"";
					$str['response']['matrix'][$i][$j][1] = $matrix[$i][$j][1]?$matrix[$i][$j][1]:($matrix[$i][$j][0]?$matrix[$i][$j][0]:"");
					$str['response']['matrix'][$i][$j][2] = $matrix[$i][$j][2]?$matrix[$i][$j][2]:($matrix[$i][$j][0]?$matrix[$i][$j][0]:"");
					$str['response']['matrix'][$i][$j][3] = $matrix[$i][$j][3]?$matrix[$i][$j][3]:($matrix[$i][$j][1]?$matrix[$i][$j][1]:($matrix[$i][$j][0]?$matrix[$i][$j][0]:""));
				}
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('503');
		}
		
		echo json_encode($str);
		die;
	}
	function winPuzzle() {
		$results = $this->api_model->winPuzzle();
		if(count($results)) {			
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('200');
			$str['response']['user_id'] = $user_id;
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('201');
		}
		
		echo json_encode($str);
		die;
	}
	function wallet() {
		$results = $this->api_model->wallet($this->input->get_post('user_id'));
		if(count($results)) {			
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('200');
			$str['response']['user_id'] = $results[0]['id'];
			$str['response']['reward'] = $results[0]['reward'];
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('201');
		}
		
		echo json_encode($str);
		die;
	}
	function textMessage($code) {
		switch($code) {
			case '100':
			return 'Login Successfully.';
			case '101':
			return 'Login Failed. UserName or Password Wrong.';
			case '111':
			return 'you are successfully registerd.';
			case '112':
			return 'Registration Failed. Please Try Again.';
			case '113':
			return 'Registration Failed. Username Allready Stored.';
			case '114':
			return 'Registration Failed. Email Allready Store.';
			case '200':
			return 'Reward Add Successfully.';
			case '201':
			return 'Can Not Add Successfully.';
			case '300':
			return 'Point Subtract Successfully.';
			case '301':
			return 'Can Not Subtract Successfully.';
			case '400':
			return 'Point Get Successfully.';
			case '401':
			return 'Can Not Get Point.';
			case '500':
			return 'Resend OTP to your mobile';
			case '501':
			return 'This Email and Mobile is Not Registered.';
			case '502':
			return 'Referral Code Send Successfully.';
			case '503':
			return 'Game not available';
			case '600':
			return 'Successful Update.';
			case '601':
			return 'Failed Update.';
			case '602':
			return 'User Not Available in Our Database.';
			case '603':
			return 'Failed.';
			case '604':
			return 'Data Successfully Access.';
			case '700':
			return 'Get Reward Successfully.';
			case '701':
			return 'Failed.';
		}
		return false;
	}
	
	function postData() {		
		$this->load->view("api/postData", $data);
	}
	function execute() {		
		$method = $this->input->get_post('method');
		$this->$method();
		die;
	}
}
