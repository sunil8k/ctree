<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bid extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("lead_model");
		$this->load->model("bid_model");
		$this->load->model("permission_model");
		$this->load->helper('text');
	} 
	public function index(){
		$this->permission_model->permission();
		$data['title'] = 'Compare Tree Leads List';
		$data["results"] = $this->lead_model->index();
		$this->load->view("bid/index", $data);
	} 
	function successBid() {
		$this->permission_model->permission();
		$data['title'] = 'Compare Tree Success Bid List';
		$data["results"] = $this->bid_model->successBid();
		$this->load->view("bid/successBid", $data);
	}
	function active(){
		$this->permission_model->permission();
		if($this->lead_model->active()){
			$this->session->set_flashdata('success', 'Operation complete Successfully!');
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
		}
		redirect('leads/index');
	}
	function delete(){
		$this->permission_model->permission();
		if($this->lead_model->delete()){
			$this->session->set_flashdata('successful', 'User Deleted Successfully!');
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
		}
		redirect('leads/index');
	}
	function view(){
		$this->permission_model->permission();
		$data = $this->lead_model->ajax();
		$this->load->view('lead/preView',$data);
	}	
	/*#########################################################################*/
}