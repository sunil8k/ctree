<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('city_model');
		/*
		$this->load->model('order_model');*/
	}
	
	public function cityAjax(){
		//$data = $this->city_model->cityAjax();
		$results = $this->city_model->cityAjax(); 
		//print_r($results);
		foreach($results as $res) {
			$str[] = $res->city;
		}
		file_put_contents('city.txt',json_encode($str));
		echo json_encode($str);die;
		// echo "welcome to Betchas admin panal :";
	}
}
