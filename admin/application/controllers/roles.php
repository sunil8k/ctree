<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("users_model","admin_model","role_model");
		//$this->load->library("page");
		$this->load->helper('text');
	}
	/*##############################
	#### Start Cheching Roles & Permissions ####
	###############################*/
	function checkPermissions() {
		echo $this->uri->segment(2);
		die;
	}
}