<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
		public function __construct(){
			parent:: __construct();
			$this->load->model('users_model');	
			/*
			$this->load->model('order_model');*/
		}
	
		 public function index(){ 
		 $data['sections'] = $this->users_model->section();
		    $this->load->view("welcome/index",$data);			
		 // echo "welcome to Betchas admin panal :";
		 }
		 public function myindex(){ 
		
		    $this->load->view("welcome/myindex");
		 // echo "welcome to Betchas admin panal :";
		 }
		 public function new_index(){ 
		    $this->load->view("welcome/new_index");
		 // echo "welcome to Betchas admin panal :";
		 }
		 public function quickView(){ 
		    $this->load->view("welcome/quickview");
		 // echo "welcome to Betchas admin panal :";
		 }
       
}
