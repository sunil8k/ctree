<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("lead_model");
		$this->load->model("permission_model");
		$this->load->helper('text');
	} 
	public function index(){
		$this->permission_model->permission();
		$data['title'] = 'Compare Tree Leads List';
		$data["results"] = $this->lead_model->index();
		$this->load->view("lead/index", $data);
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
		$data = $this->lead_model->ajax();
		$this->load->view('lead/preView',$data);
	}
	function edit(){
		$data = $this->lead_model->edit();
		//print_r($data);die;
		$this->load->view('lead/edit',$data);
	}
	function update(){
		//echo "tester";die;
		if($this->lead_model->update()) {
			//print_r($data);die;
			redirect('leads/edit?id='.$this->input->get_post('id'));
		}
		else {
			redirect('leads/edit?id='.$this->input->get_post('id'));
		}
	}	
	/*#########################################################################*/
}