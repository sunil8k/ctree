<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	
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
			$data = $this->lead_model->section();
			$data['countrys'] = $this->lead_model->countryList(); 
			$this->load->view("agent/index",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	
	public function register() {
		if(!$this->session->userdata('id')) {		
			$this->load->view("agent/register");
		}
		else {
			redirect('welcome/index');
		}
	}
	
	public function save() {
		if($data = $this->agent_model->save()) {
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
     
					  
}
