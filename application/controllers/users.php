<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('users_model');	
		/*
		$this->load->model('order_model');*/
	}
	
	public function index() { 
		$data['sections'] = $this->users_model->section();
		$this->load->view("welcome/index",$data);			
		// echo "welcome to Betchas admin panal :";
	}
	public function signup() {
		$this->load->view("users/signup");
		// echo "welcome to Betchas admin panal :";
	}
	public function new_index() { 
		$this->load->view("welcome/new_index");
		// echo "welcome to Betchas admin panal :";
	}
	public function quickView() { 
		$this->load->view("welcome/quickview");
		// echo "welcome to Betchas admin panal :";
	}
	
	public function forgotPassword() { 
		$this->load->view('users/forgot');
	}
	
	public function forgot() { 
	$data = $this->users_model->forgot();
		if($data == 1) {
			$this->session->set_flashdata('success', 'Please check your email id, credential sent there.'); 
		}
		else if($data == 2) {
			$this->session->set_flashdata('unsuccess', 'Your are not registerd as '.$this->input->get_post('type'));
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Email can not be send. Please try again.');
		}
		redirect('customer/login');
	}
       
}
