<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
	
	function __construct() {
		 parent:: __construct();
		 $this->load->database();
		 $this->load->model("ads_model");
		 //$this->load->library("page");
		 $this->load->helper('text');
	}
	
/*
################################################################################
########################## Show user grid with paging ##########################
################################################################################
*/
	
	public function index(){
		$data["results"] = $this->ads_model->show();
		$this->load->view("ads/list", $data);
	}	
	function add(){
		$data['result'] = $_REQUEST;
		$this->load->view('ads/add',$data);
	}	
	function save(){
		if($this->ads_model->save()) {
			$this->session->set_flashdata('success', 'Ads saved successfully.');
			redirect("ads");
		}
		else {
			$data['result'] = $_REQUEST;
			$this->load->view('ads/add',$data);			
		}
	}	
	function view(){
		$data['results'] = $this->ads_model->ajax();
		$this->load->view('ads/preView',$data);
	}
	
	function active(){
		$chkStatus = $this->ads_model->checkStatus($this->input->get_post('id'));
		$msg = ($chkStatus[0]['status']?('deactivate'):('activate'));
		if($data['results'] = $this->ads_model->active()) {
			$this->session->set_flashdata('success', 'Ads '.$msg.' Successfully');
					  redirect("ads");
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Ads '.$msg.' Successfully');
					  redirect("ads");
		}
	}
	function delete(){
		if($data['results'] = $this->ads_model->delete($this->input->get_post('id'))) {
			$this->session->set_flashdata('success', 'Ads delete Successfully');
					  redirect("ads");
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Ads can not be deleted Successfully');
					  redirect("ads");
		}
	}	

}