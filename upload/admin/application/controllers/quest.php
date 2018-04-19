<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quest extends CI_Controller {
	
	function __construct() {
		 parent:: __construct();
		 $this->load->database();
		 $this->load->model("quest_model");
		 $this->load->model("category_model");
		 //$this->load->library("page");
		 $this->load->helper('text');
	}
	
/*
################################################################################
########################## Show user grid with paging ##########################
################################################################################
*/
	
	public function index(){
		$data["results"] = $this->quest_model->show();
		
		$this->load->view("quest/index", $data);
	}

}