<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	
		 function __construct() {
				 parent:: __construct();
				 $this->load->database();
				 $this->load->model("category_model");
				 $this->load->helper('text');
		 }
		 
		 /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
		 public function index(){
			  $data["results"] = $this->category_model->show();
			  $data['user_type'] = $this->session->userdata('user_type');
			  $this->load->view("category/category", $data);
		 }
		  
		 public function addCategory(){
			  $this->load->view("category/addCategory");
		 }
		
		public function save(){
			if($this->category_model->saveCategory()) {
				redirect("category/index");
			}
			else {
				$this->load->view("category/addCategory");
			}
		}
		  
		public function editCategory(){			
			$data["results"] = $this->category_model->category($this->input->get_post('id'));
			$this->load->view("category/editCategory", $data);
		} 
		public function update() {
			if($this->category_model->updateCategory()) {
				redirect("category/index");
			}
			else {		
				$this->load->view("category/editCategory");
			}
		}
		 
		 public function ajax() {
			 $level = $this->input->get_post('level');
			 $data = $this->category_model->category($this->input->get_post('category_id'));
			 if(count($data)) { ?>			
				<label for="exampleInputPassword1"><em class="star_red">*</em> Parent Category :</label>
                <select name="parent_<?php echo $level;?>" id="parent_<?php echo $level;?>"  class="form-control" onchange="parentCategory('<?php echo ($level+1);?>',this.value);">
                    <option value="0">Parent Category</option>
                    <?php foreach($data as $cat) {?>
                    	<option value="<?php echo $cat->id;?>"><?php echo $cat->category;?></option>
                    <?php } ?>
                </select>
                <span class="php-error" id="parent_<?php echo $level;?>_msg" style="color:#f00;"></span>
                <?php
			 }
		 }
		 public function ajax1() {
			 $level = $this->input->get_post('level');
			 //echo "eee".$this->input->get_post('category_id');
			 $data = $this->category_model->parentCategory($this->input->get_post('category_id'));
			 if(count($data)) {
			 ?>
			<label for="exampleInputPassword1"><em class="star_red">*</em> Parent Category :</label>
                                            <select name="parent_<?php echo $level;?>" id="parent_<?php echo $level;?>"  class="form-control" onchange="parentCategory('<?php echo ($level+1);?>',this.value);">
                                              <option value="0">Parent Category</option>
                                              <?php foreach($data as $cat) {?>
                                              <option value="<?php echo $cat->id;?>"><?php echo $cat->category;?></option>
											  <?php } ?>
                                            </select>
                                            <span class="php-error" id="parent_<?php echo $level;?>_msg" style="color:#f00;"></span>
                                            <?php
			 }
			 
		 }
		 function active(){
			if($this->input->get_post('id')){
				$this->category_model->active();
				$this->session->set_flashdata('success', 'Operation complete Successfully!');
				redirect('category/category');
			}
			else{
				$this->session->set_flashdata('unsuccess', 'Operation not complete!');
				redirect('category/category');
			}
		 }
		 
		  function delete(){
			  if($this->input->get_post('del')){
			    $this->category_model->delete();
				 $this->session->set_flashdata('successful', 'Category Deleted Successfully!');
					redirect('category/category');
			  }else{
				  $this->session->set_flashdata('unsuccess', 'Operation not complete!');
					redirect('category/category');
			  }
		 }
		 	
}