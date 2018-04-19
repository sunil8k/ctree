<?php
class Section_model extends CI_Model {	 
		 /*##############################
		 #### Start Login and Logout ####
	     ###############################*/
		  
	function show() {
		$this->db->select('*');
		$this->db->from('sections');
		//$this->db->where('status',1);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	function section() {
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('status',1);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}	
	
	function checkSection() {
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('section',$this->input->get('section'));
		if($this->input->get('id'))
			$this->db->where('id != ',$this->input->get('id'));
		$query = $this->db->get();
		file_put_contents('section.txt',$this->db->last_query());
		return $query->num_rows();	
	}
	function editSection() {
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('id',$this->input->get('id'));
		$query = $this->db->get();
		return $query->row();
	}
	function save() {
		if($this->checkSection($this->input->get_post('section'))) {
			if($this->input->get_post('section_id')) {
				$data['section'] = $this->input->get_post('section');
				$data['status'] = 1;
				$this->db->where('id',$this->input->get_post('section_id'));
				if($this->db->update('sections',$data)) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				$data['section'] = $this->input->get_post('section');
				$data['html'] = $this->input->get_post('html');
				$data['status'] = 1;
				$this->db->insert('sections',$data);
				return $this->db->insert_id();
			}
		}
		else {
			return false;
		}
	}
	function active() {
		$this->db->select('status');
		$this->db->from('sections');
		$this->db->where('id',$this->input->get_post('id'));
		$query = $this->db->get();
		$data=$query->result_array();
		if($data[0]['status']==0){
			$status=1;
			$data = array('status'=>$status);
			$this->db->where('id',$this->input->get_post('id'));
			$this->db->update('sections',$data);
		}else{
			$status=0;
			$data1 = array('status'=>$status);
			$this->db->where('id',$this->input->get_post('id'));
			$this->db->update('sections',$data1);	
		}
		return true;
	}
			
	/*##########################################
	############## Delete by id ###############
	###########################################*/
	function delete(){
		$this->db->where('id',$_REQUEST['del']);
		$this->db->delete('sections');	
	}
	/*##########################################
	############## Delete by id ###############
	###########################################*/
					
		/*#############################
		 #### Sttr Change Password ####
	     ##############################*/
			function change(){
			    $old_password=$this->input->post('old_password');
				$var=$this->session->userdata('username');
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('username',$var);
				$query = $this->db->get();
				return $query->result_array();	
			}
		 /*#############################
		 #### End Change Password #####
	     ##############################*/
		
			function ajax(){
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('id', $_REQUEST['id']);
				$query = $this->db->get();
				return $query->result_array(); 
			}
		
		/************************Sales View ******************/
			
			function user_detail($id){
				$this->db->select('*');
				$this->db->from('order');
				$this->db->where('id', $id);
				$query = $this->db->get();
				if ($query->num_rows() > 0) {					
					foreach ($query->result() as $row){
					  $data[] = $row;
					}		
					return $data;
				}
			}
		
		/*#############################
		 ########## Edit User #########
	     ##############################*/
			function edit() {
				if($this->input->get_post('id')){
					$userId = $this->input->get_post('id');
					$this->db->select('*');
					$this->db->from('agents');
					$this->db->where('id', $userId);
					$query = $this->db->get();
					return $query->row_array(); 
				}
				else {
					return false;
				}
			}
			function editAdmin() {
				if($this->input->get_post('id')){
					$UserId = $this->input->get_post('id');
				}else{
					$UserId=$this->session->userdata('id');
			    }
				$this->db->select('*');
				$this->db->from('admin');
				$this->db->where('id', $UserId);
				$query = $this->db->get();
				return $query->row_array(); 
			}
			
			function edit_save()
			{
			if($this->input->get_post('id')){
				$userId = $this->input->get_post('id');
			}else{
				$userId=$this->session->userdata('id');
			}
			if($_FILES['image']['name']!=""){
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('id',$userId);
				$query = $this->db->get();
				$imageName = $query->row_array();
				
				if($imageName['image']){
					unlink($imageName['image']);
				}
				$profileAvatar =  $_FILES['image']['name'];
				if(!is_dir('../agent'))      
				mkdir('../agent');
				$createFolder = '../agent/'.$userId;
				$ext=pathinfo($profileAvatar);
				$FileName='User_'.$userId.'_'.rand().".".$ext['extension'];
				if(!is_dir($createFolder))      
				mkdir($createFolder);
				$config['upload_path'] = $createFolder;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '3000';
				$config['max_height']  = '2000';
				$this->load->library('upload', $config);
				$_FILES['image']['name']=$FileName;
				$this->upload->do_upload('image');
				$file_name=$this->upload->data();
				
				$data['image'] = $createFolder."/".$file_name['file_name'];
			}
			
			$email = $this->input->post('email'); 
			if($email){
				$data['email'] = $email;
			}
			$first_name = $this->input->post('first_name'); 
			if($first_name){
				$data['first_name'] = $first_name;
			}
			$last_name = $this->input->post('last_name'); 
			if($last_name){
				$data['last_name'] = $last_name;
			}
			
			$mobile = $this->input->post('mobile'); 
			if($mobile){
				$data['mobile'] = $mobile;
			}
			
				//$userId=$this->session->userdata('id');
				$this->db->where('id',$userId);
				$this->db->set($data);
				$this->db->update('users',$data);  
				//echo $this->db->last_query();die;
			}
			
			function edit_save_admin()
			{
			if($this->input->get_post('id')){
				$userId = $this->input->get_post('id');
			}else{
				$userId=$this->session->userdata('id');
			}
			if($_FILES['image']['name']!=""){
				$this->db->select('*');
				$this->db->from('admin');
				$this->db->where('id',$userId);
				$query = $this->db->get();
				$imageName = $query->row_array();
				if($imageName['image']){
					unlink($imageName['image']);
				}
				$profileAvatar =  $_FILES['image']['name'];
				if(!is_dir('../adminAvatar'))      
				mkdir('../adminAvatar');
				$createFolder = '../adminAvatar/'.$userId;
				$ext=pathinfo($profileAvatar);
				$FileName='User_'.$userId.'_'.rand().".".$ext['extension'];
				if(!is_dir($createFolder))      
				mkdir($createFolder);
				$config['upload_path'] = $createFolder;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '3000';
				$config['max_height']  = '2000';
				$this->load->library('upload', $config);
				$_FILES['image']['name']=$FileName;
				$this->upload->do_upload('image');
				$file_name=$this->upload->data();
				
				$data['image'] = $createFolder."/".$file_name['file_name'];
				$this->session->set_userdata('image',$data['image']);
			}
			
			$email = $this->input->post('email'); 
			if($email){
				$data['email'] = $email;
			}
			$first_name = $this->input->post('first_name'); 
			if($first_name){
				$data['first_name'] = $first_name;
			}
			$last_name = $this->input->post('last_name'); 
			if($last_name){
				$data['last_name'] = $last_name;
			}
			
			$mobile = $this->input->post('mobile'); 
			if($mobile){
				$data['mobile'] = $mobile;
			}
			
				//$userId=$this->session->userdata('id');
				$this->db->where('id',$userId);
				$this->db->set($data);
				$this->db->update('admin',$data);  
				//echo $this->db->last_query();die;
			}
		/*#############################
		 ####### End Edit User ########
	     ##############################*/
		 
			 
		 function add_save() {
			 //echo "hello";die;
				$username = $this->input->post('username'); 
				$email = $this->input->post('email'); 
				$password = $this->input->post('password');
				$fname = $this->input->post('fname'); 
				$lname = $this->input->post('lname');
				$address = $this->input->post('address'); 
				$country = $this->input->post('country'); 
				$mobile = $this->input->post('mobile'); 
				$postalcode = $this->input->post('postalcode');
				$data['username'] = $username;
				$data['email'] = $email;
				$data['password'] = md5($password);
				$data['first_name'] = $fname;
				$data['last_name'] = $lname;
				//$data['image'] = $createFolder."/".$file_name['file_name'];
				$data['address'] = $address;
				$data['country_id'] = $country; 
				$data['mobile'] = $mobile;     
				$data['zipcode'] = $postalcode;
				$data['status'] = 1; 
				$this->db->insert('agents',$data); 
				
				$lastInsertID = $this->db->insert_id();
				if($_FILES['image']['name']!=""){
					$profileAvatar =  $_FILES['image']['name'];
					if(!is_dir('../agent'))      
					mkdir('../agent');
					$createFolder = '../agent/'.$lastInsertID;
					$ext=pathinfo($profileAvatar);
					$FileName='User_'.$lastInsertID.'_'.rand().".".$ext['extension'];
					if(!is_dir($createFolder))      
					mkdir($createFolder);
					$config['upload_path'] = $createFolder;
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '5000';
					$config['max_width']  = '3000';
					$config['max_height']  = '2000';
					$this->load->library('upload', $config);
					$_FILES['image']['name']=$FileName;
					$this->upload->do_upload('image');
					$file_name=$this->upload->data();
					
					$dataM['image'] = $createFolder."/".$file_name['file_name'];
					$this->db->where('id',$lastInsertID);
					$this->db->update('agents',$dataM);	
				}
			
			}
			
			
	    /*##########################################
		 ########## Publice and Unpublish ##########
	     ###########################################*/
			
			
			
		/*##########################################
		 ####### End publish and un publish ########
	     ###########################################*/
			
			
		
			
			
		
		/*###################### Forgot Password #################*/
		function forgotpassword(){
			$email = $this->input->post('email');
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email', $email);
			$result = $this->db->get();
			return $result->result_array();
			}
	
		
	
		function updatePassword(){
			$data = array('password'=>$newpassword);
			$this->db->where('email',$_REQUEST['id']);
			$this->db->update('users',$data);
		}
		/*################## End Forgot Password #################*/
 
}

?>