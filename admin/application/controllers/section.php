<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("section_model");
		$this->load->model("permission_model");
		$this->load->helper('text');
	} 
	public function index(){
		$data['title'] = 'Compare Tree New Agent Add Form';
		$data['meta_title'] = 'Your meta title';
		$data['meta_description'] = 'Your meta description';
		$data['meta_keywords'] = 'Your meta keywords';
		$this->permission_model->permission();
		$data["results"] = $this->section_model->show();
		$this->load->view("section/list", $data);
	} 
	function active(){
		$view=$this->input->get_post('view');
		if($this->input->get_post('id')){
			$this->section_model->active();
			$this->session->set_flashdata('success', 'Operation complete Successfully!');
			redirect('section/'.$view);
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
			redirect('section/'.$view);
		}
	}
	function delete(){
		$view=$this->input->get_post('view');
		if($this->input->get_post('del')){
			$this->section_model->delete();
			$this->session->set_flashdata('success', 'Section Delete Successfully!');
			redirect('section/'.$view);
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
			redirect('section/'.$view);
		}
	}
	function addSection(){
		$this->load->view('section/add');
	}
	function editSection(){
		$result = $this->section_model->editSection();
		$this->load->view('section/edit',$result);
	}	
	function checkSection() {
		if($this->section_model->checkSection()) {
			echo "No";
		}
		else {
			echo "Yes";
		}
		die;
	}
	function save() {
		if($this->section_model->save()) {
			$this->session->set_flashdata('success', 'Operation complete Successfully.');
			redirect('section/index');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
			redirect('section/add');
		}
	}
}