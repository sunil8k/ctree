<?php 
class permission extends CI_Controller {	
	public function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->model("permission_model");
	}	
	public function index(){ 
		/*$data['customer']= $this->api_model->countCustomer();
		$data['agency']= $this->api_model->countAgency();
		$data['post']= $this->api_model->countPost();
		$data['applied']= $this->api_model->countApplied();*/
		$this->load->view("welcome/index");
	}
	public function accessDeny(){ 
		$this->load->view("permission/index");
	
	}
	
	public function editPermission() {
		$data['results'] = $this->permission_model->editPermission();
		
		$this->load->view("permission/showPermission",$data);
	}
}