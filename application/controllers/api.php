<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("api_model");
		$this->load->model("agent_model");
	}	
	function index() {
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
	function mvrRUN() {
		if($this->api_model->mvr($this->session->userdata('id'))) {
			die;
		}
		else {
			die;
		}
	}
	
}
