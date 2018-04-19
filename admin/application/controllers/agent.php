<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("agent_model");
		$this->load->model("permission_model");
		$this->load->helper('text');
	} 
	public function index(){
		$data['title'] = 'Compare Tree New Agent Add Form';
		$data['meta_title'] = 'Your meta title';
		$data['meta_description'] = 'Your meta description';
		$data['meta_keywords'] = 'Your meta keywords';
		$this->permission_model->permission();
		$data["results"] = $this->agent_model->show();
		$this->load->view("agent/list", $data);
	}
	public function addAgent(){
		$this->permission_model->permission();
		$data['countrys'] = $this->agent_model->getCountrys();
		$this->load->view('agent/addAgent',$data);		
    }
	function saveAgent() {
		$this->permission_model->permission();
		if($this->agent_model->saveAgent()) {
			$this->session->set_flashdata('success', 'Profile Add successfully!');	
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Profile can not Added!');
		}
		redirect('agent/index');
	}
	function editAgent() {
		$this->permission_model->permission();
		$data["result"] = $this->agent_model->editAgent();
		$data["countrys"] = $this->agent_model->getCountrys();
		$data["states"] = $this->agent_model->state($data["result"]->country_id);
		$this->load->view("agent/editAgent", $data);
	}
	function updateAgent(){
		$this->permission_model->permission();
		if($this->agent_model->updateAgent()) {
			$this->session->set_flashdata('success', 'Profile edit successfully!');	
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Profile can not edited!');
		}
		redirect('agent/index');
	}
	function active(){
		$this->permission_model->permission();
		$view=$this->input->get_post('view');
		if($this->input->get_post('id')){
			$this->agent_model->active();
			$this->session->set_flashdata('success', 'Operation complete Successfully!');
			redirect('agent/'.$view);
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
			redirect('agent/'.$view);
		}
	}
	function delete(){
		$this->permission_model->permission();
		$view=$this->input->get_post('view');
		if($this->input->get_post('del')){
			$this->agent_model->delete();
			$this->session->set_flashdata('successful', 'User Deleted Successfully!');
			redirect('agent/'.$view);
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
			redirect('agent/'.$view);
		}
	}
	function view(){
		$this->permission_model->permission();
		$data['results11'] = $this->agent_model->ajax();
		//print_r($data);
		$this->load->view('agent/preView',$data);
	}
	function state(){
		$states = $this->agent_model->state();
		$str1 = '';
		$str = '<option value=0>Select State</option>';
		foreach($states as $state) {
			$str1 = (trim($this->input->get_post('selected')) == trim($state->id) )?('selected'):('tet');
			$str .= '<option value='.$state->id.' '.$str1.'>'.$state->state.'</option>';
			$str1 = '';
		}
		echo $str;die;
	}
	function getCity(){
		$str = $this->agent_model->getCity();		
		echo json_encode($str);die;
	}
	function checkEmail(){
		if($this->agent_model->checkEmail()!=0){
			$this->form_validation->set_message('email_msg', 'Email already exist!');   
			echo '0';die;
		}
		else {
			echo 1;die;
		}
	}
	function checkUsername(){
		if($this->agent_model->checkUsername()!=0){
			$this->form_validation->set_message('username_msg', 'Username already exist!');   
			echo '0';die;
		}
		else {
			echo 1;die;
		}
	}	
}