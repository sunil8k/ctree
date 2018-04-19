<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('users_model');
		$this->load->model('lead_model');	
		/*
		$this->load->model('order_model');*/
	}
	
	public function index(){
		$data = $this->lead_model->section();
		$data['countrys'] = $this->lead_model->countryList(); 
		$this->load->view("leads/index",$data);
		// echo "welcome to Betchas admin panal :";
	}
	public function ajax2() {
		$data = $this->lead_model->parentCategory($this->input->get_post('id'));
		//file_put_contents('cat.txt',json_encode($data));
		if(count($data)) {
			$idd = rand(100,9999);
			?>
			<div class="rmDiv" id="aaatext<?php echo $idd;?>">
			<label for="exampleInputPassword1"><em class="star_red">*</em>Category :</label>
			<select name="parent[]" class="form-control" id="<?php echo $idd;?>" onchange="parentCategory(this.value,'<?php echo $idd;?>');">
			<option value="0">Parent Category</option>
			<?php foreach($data as $cat) {?>
                <option value="<?php echo $cat->id;?>"><?php echo $cat->category;?></option>
                <?php 
			} ?>
            </select>
            <span class="php-error" id="parent_msg[]" style="color:#f00;"></span>
            </div>
            <?php
		}	
	}
	public function fillState() {
		$data = $this->lead_model->fillState($this->input->get_post('id'));
		//file_put_contents('cat.txt',json_encode($data));
		if(count($data)) {
			?>
			<option value="0">Parent Category</option>
			<?php foreach($data as $state) {?>
                <option value="<?php echo $state->id;?>"><?php echo $state->state;?></option>
                <?php 
			} ?>
            <?php
		}	
	}
		 /*public function myindex(){ 
		
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
		 }*/
       
}
