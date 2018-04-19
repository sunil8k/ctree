<?php
class Api extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("apis_model");
		$this->load->model("users_model");
	}
	function postData() {		
		$this->load->view("api/postData", $data);
	}
	function login() {
		$data = $this->apis_model->login();
		/*print_r($data);
		die;*/
		if(!empty($data[0]['id'])) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('100');
			$str['response'][0]['user_id'] = $data[0]['id'];
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('101');
		}
		
		echo json_encode($str);
		die;
	}
	
	function signup() {
		if($this->apis_model->checkData('users', 'username', $this->input->get_post('username'))) {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('113');	
			echo json_encode($str);
			die;
		}
		if($this->apis_model->checkData('users', 'email', $this->input->get_post('email'))) {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('114');
			echo json_encode($str);
			die;	
		}
		if($user_id = $this->apis_model->signup()) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('111');
			$str['response'][0]['user_id'] = $user_id;
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('112');
		}
		echo json_encode($str);
		die;
	}
	public function addPoint(){
		$data['user_id'] =  $this->input->get_post('user_id');
		$data['point'] =  $this->input->get_post('point');
		if($this->apis_model->addPoint($data)) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('200');
			$str['response'][0]['point'] = $this->apis_model->getData('users','point','id',$data['user_id']);;
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('201');
		}
		echo json_encode($str);
		die;
	}
	public function subtractPoint(){
		$data['user_id'] =  $this->input->get_post('user_id');
		$data['point'] =  $this->input->get_post('point');
		if($this->apis_model->subtractPoint($data)) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('300');
			$str['response'][0]['point'] = $this->apis_model->getData('users','point','id',$data['user_id']);
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('301');
		}
		echo json_encode($str);
		die;
	}
	public function myPoint(){
		$data['user_id'] =  $this->input->get_post('user_id');
		$data = $this->apis_model->getData_all('users','id',$data['user_id']);
		
		if(count($data)) {
			$str['status'] = "Success";
			$str['msg'] = $this->textMessage('400');
			$str['response'][0]['point'] = $data['point'];
			$str['response'][0]['dogup_index'] = $data['dogup_index'];
			$str['response'][0]['swordup_index'] = $data['swordup_index'];
			$str['response'][0]['shovelup_index'] = $data['shovelup_index'];
			$str['response'][0]['shieldup_index'] = $data['shieldup_index'];
			$str['response'][0]['user_id'] = $data['user_id'];
		}	
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('401');
		}
		echo json_encode($str);
		die;
	}
	public function forgotPassword() {
		$data['email'] =  $this->input->get_post('email');
		if($this->apis_model->checkData('users','email',$data['email'])) {
			if($this->apis_model->forgot($data['email'])) {				
				$str['status'] = "Success";
				$str['msg'] = $this->textMessage('500');
				$str['response'][0]['email'] = $data['email'];
			}
			else {
				$str['status'] = "Failed";
				$str['msg'] = $this->textMessage('502');
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('501');
		}
		echo json_encode($str);
		die;
		
	}
	
	public function upgrades(){
		if($this->apis_model->checkData('users', 'id', $this->input->get_post('user_id'))) {
			if($this->apis_model->upgrade()) {
				$str['status'] = "Success";
				$str['msg'] = $this->textMessage('600');
			}
			else {
				$str['status'] = "Failed";
				$str['msg'] = $this->textMessage('601');
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('602');
		}
		
		echo json_encode($str);
		die;
	 }
	
	function set() {
		if($this->apis_model->checkData('users', 'id', $this->input->get_post('user_id'))) {
			if($this->apis_model->update()) {
				$str['status'] = "Success";
				$str['msg'] = $this->textMessage('600');
			}
			else {
				$str['status'] = "Failed";
				$str['msg'] = $this->textMessage('601');
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('602');
		}
		
		echo json_encode($str);
		die;
	}
	function get() {
		if($this->apis_model->checkData('users', 'id', $this->input->get_post('user_id'))) {
			
			if($val=$this->apis_model->getData('users',$this->input->get_post('key'),'id',$this->input->get_post('user_id'))) {
				$str['status'] = "Success";
				$str['msg'] = $this->textMessage('604');
				$str['response'][0][$this->input->get_post('key')] = $val;
			}
			else {
				$str['status'] = "Failed";
				$str['msg'] = $this->textMessage('603');
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('603');
		}
		
		echo json_encode($str);
		die;
	}
		
	function setShield() {
		if($this->apis_model->checkData('users', 'id', $this->input->get_post('user_id'))) {
			if($this->apis_model->update()) {
				$str['status'] = "Success";
				$str['msg'] = $this->textMessage('600');
			}
			else {
				$str['status'] = "Failed";
				$str['msg'] = $this->textMessage('601');
			}
		}
		else {
			$str['status'] = "Failed";
			$str['msg'] = $this->textMessage('602');
		}
		
		echo json_encode($str);
		die;
	}
	 
	public function index(){
		$data['level_id'] =  $this->input->get_post('level_id');
		$data['levels'] = $this->level_model->show($this->input->get_post('level_id'));
		if($data['level_id']) {
			$data['settings'] = $this->setting_model->show($this->input->get_post('level_id'));
		}		
		$this->load->view("games/setting", $data);
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
			return 'Point Add Successfully.';
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
			return 'Check your Email. Password has been send to the your mail.';
			case '501':
			return 'This Email is Not Registered.';
			case '502':
			return 'Mail Not Send Due to Server Problem.';
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
		}
		return $func." and ".$level;
	}
}
