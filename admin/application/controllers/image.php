<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		
	} 
	public function index(){
		if($this->input->get_post('file')) {
			$dt = array_diff(scandir('assets/imageFile/'.$this->input->get_post('file')), array('..', '.'));
		}
		else {
			$dt = array_diff(scandir('assets/imageFile/file1'), array('..', '.'));
		}
		for($i=2; $i<(count($dt)+2);$i++) {
			echo $data1['results'][] = 'assets/imageFile/'.(($this->input->get_post('file'))?($this->input->get_post('file')):'file1').'/'.$dt[$i];
		}
		$this->load->view("image/list", $data1);
	} 
}