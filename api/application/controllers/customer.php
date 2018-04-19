<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('customer_model');
	}
	public function checkLogin() {
		if($this->input->post('email') && $this->input->post('password')) {
			if($data = $this->customer_model->checkLogin()) {
				$this->session->set_userdata('email',$data[0]['email']);
				$this->session->set_userdata('mobile',$data[0]['mobile']);
				$this->session->set_userdata('name',$data[0]['first_name']." ".$data[0]['last_name']);
				$this->session->set_userdata('type',$data[0]['type']);
				$this->session->set_userdata('image',$data[0]['image']);
				$this->session->set_userdata('id',$data[0]['id']);
				redirect('customer/index');
			}
			else {
				$data = $_POST;
				$this->load->view("customer/login",$data);
			}
		}
		else {
			
		}
	}
       
}
