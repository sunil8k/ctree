<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('customer_model');
		$this->load->model('agent_model');
		$this->load->model('lead_model');	
		/*
		$this->load->model('order_model');*/
	}
	
	public function index(){
		if($this->session->userdata('id')) {
			//$data = $this->lead_model->section();
			$data['countrys'] = $this->lead_model->countryList(); 
			$data['myProfile'] = $this->customer_model->myProfile();
			$this->load->view("customer/index",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	public function login() {		
		$this->load->view("customer/login");
	}
	public function checkLogin() {
		if($this->input->get_post('type') == 'seeker') {
			$data = $this->customer_model->checkLogin();
			$controller = ($this->input->get_post('type'))?(($this->input->get_post('type') == 'seeker')?('customer'):('agent')):('welcome');
		}
		else {
			$data = $this->agent_model->checkLogin();
			$controller = ($this->input->get_post('type'))?(($this->input->get_post('type') == 'seeker')?('customer'):('agent')):('welcome');
		}
		if($data[0]->id) {
			$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('mobile',$data[0]->mobile);
			$this->session->set_userdata('name',$data[0]->first_name." ".$data[0]->last_name);
			$this->session->set_userdata('type',(($this->input->get_post('type')=='seeker')?('seeker'):('provider')));
			$this->session->set_userdata('image',$data[0]->image);
			$this->session->set_userdata('id',$data[0]->id);
			$this->session->set_flashdata('success', 'You have Successfully LogIn');  
			redirect($controller.'/index');
		}
		else {
			$data = $_REQUEST;
			print_r($data);
			$this->session->set_flashdata('unsuccess', 'Email or Password not correct!'); 
			$this->load->view("customer/login",$data);
		}	
	}
	
	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You are Successfully LogOut.');  
		redirect('welcome/index');
	}
	public function forgotPassword() { 
		$this->load->view('customer/forgotPassword');
	}
	public function forgot() { 
		if($this->input->get_post('type') == 'seeker') {
			if($data = $this->customer_model->forgot()) {				
				$this->session->set_flashdata('test', 'Please check your email:("'.$data->email.'") and password:("'.$data->password_text.'"), Credential has been send to your email account.'); 
			}
			else {
				$this->session->set_flashdata('unsuccess', 'Your email ID not registerd in our database.'); 
			}
		}
		else {
			if($data = $this->agent_model->forgot()) {
				$this->session->set_flashdata('test', 'Please check your email:("'.$data->email.'") and password:("'.$data->password_text.'"), Credential has been send to your email account.');
			}
			else {
				$this->session->set_flashdata('unsuccess', 'Your email ID not registerd in our database.'); 
			} 
		}
		redirect('customer/login');
	}
	
	public function register() {
		if(!$this->session->userdata('id')) {		
			$this->load->view("customer/register");
		}
		else {
			redirect('welcome/index');
		}
	}
	
	public function save() {
		if($data = $this->customer_model->save()) {
		//print_r($data);
			/*$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('mobile',$data[0]->mobile);
			$this->session->set_userdata('name',$data[0]->first_name." ".$data[0]->last_name);
			$this->session->set_userdata('type','Customer');
			$this->session->set_userdata('image',$data[0]->image);
			$this->session->set_userdata('id',$data[0]->id);
			$this->session->set_flashdata('success', 'You have Successfully LogIn'); */ 
			redirect('customer/index');
		}
		else {
			$data = $_REQUEST;
			$this->session->set_flashdata('unsuccess', 'Fields Require!'); 
			$this->load->view("customer/login",$data);
		}	
	}
	function myProfile() {
		$data = $this->customer_model->myProfile();
		print_r($data);die;
	}
					  
}
