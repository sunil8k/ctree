<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {	
	public function __construct(){
		parent:: __construct();
		$this->load->model('users_model');
		$this->load->model('api_model');
	}	
	public function index(){ 
		/*$data['customer']= $this->api_model->countCustomer();
		$data['agency']= $this->api_model->countAgency();
		$data['post']= $this->api_model->countPost();
		$data['applied']= $this->api_model->countApplied();*/
		$this->load->view("welcome/index");
	}
	public function new_index(){ 
		$this->load->view("welcome/new_index");
	}
	public function quickView(){ 
		$this->load->view("welcome/quickview");
	} 
}