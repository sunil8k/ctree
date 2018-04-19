<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		
	} 
	public function index(){
		$data['results'] = scandir('videoFile/file1/'); 
		print_r($data);die;
		$this->load->view("section/list", $data);
	} 
}