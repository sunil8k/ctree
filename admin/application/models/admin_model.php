<?php
class Admin_model extends CI_Model {
	/*LIST BACKEND USERS*/ 
	function show() {
		$type='subadmin';
		$this->db->select('*');
		$this->db->from('admin a');
		$this->db->where('a.type', $type);
		$this->db->where('a.is_delete', 0);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {			
			return $query->result();
		}
		return false;
	}
	function ajax(){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id', $this->input->get_post('id'));
		$query = $this->db->get();
		return $query->result_array(); 
	}
	function active() {
		$this->db->select('status');
		$this->db->from('admin');
		$this->db->where('id',$this->input->get_post('id'));
		$query = $this->db->get();
		$data=$query->row();
		$data = array('status'=>$data->status?0:1);
		$this->db->where('id',$this->input->get_post('id'));
		$this->db->update('admin',$data);
		//echo $this->db->last_query();//die;
		return true;
	}
	function delete(){	
		$data['is_delete'] = 1;
		if($this->input->get_post('id')) {
			$this->db->where('id',$this->input->get_post('id'));
			if($this->db->update('admin',$data)) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function add_save() {
		$username = $this->input->post('username'); 
		$email = $this->input->post('email'); 
		$password = $this->input->post('password');
		$fname = $this->input->post('fname'); 
		$lname = $this->input->post('lname');
		$mobile = $this->input->post('mobile'); 
		$userType = 'subadmin'; 
		$data['username'] = $username;
		$data['email'] = $email;
		$data['password'] = md5($password);
		$data['password_text'] = ($password);
		$data['first_name'] = $fname;
		$data['last_name'] = $lname;
		$data['mobile'] = $mobile;     
		$data['type'] = $userType;
		$data['create_date'] = date("Y-m-d H:i:s");
		$data['status'] = 1;	
		$this->db->insert('admin',$data); 
		if($lastInsertID = $this->db->insert_id()) {
			for($i=1;$i<=6;$i++) {
				$q = "INSERT INTO `permissions` ( `admin_id`, `module_id`, `show_perm`, `add_perm`, `edit_perm`, `delete_perm`, `all_perm`, `status`) VALUES ( '".$lastInsertID."', '".$i."', '1', '0', '0', '0', '0', '1')";
				$this->db->query($q);
			}
		}
		if($_FILES['image']['name']!=""){
			$profileAvatar =  $_FILES['image']['name'];
			if(!is_dir('../userAvatar'))      
				mkdir('../userAvatar');
			$createFolder = '../userAvatar/'.$lastInsertID;
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
			$this->db->update('admin',$dataM);	
		}
	}
	/*#############################
	########## Edit User #########
	##############################*/
	function edit() {
		if($this->input->get_post('id')){
			$userId = $this->input->get_post('id');
		}
		else{
			$userId=$this->session->userdata('id');
		}
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id', $userId);
		$query = $this->db->get();
		return $query->row_array(); 
	}
	
	function edit_save() {
		if($userId = $this->input->get_post('id')){	
			if($_FILES['image']['name']!=""){
				$this->db->select('*');
				$this->db->from('admin');
				$this->db->where('id',$userId);
				$query = $this->db->get();
				$imageName = $query->row_array();
				if($imageName){
					unlink($imageName['image']);
				}
				$profileAvatar =  $_FILES['image']['name'];
				if(!is_dir('../userAvatar'))      
					mkdir('../userAvatar');
				$createFolder = '../userAvatar/'.$userId;
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
			$gender = $this->input->post('gender'); 
			if($gender){
				$data['gender'] = $gender;
			}
			$this->db->where('id',$userId);
			$this->db->set($data);
			if($this->db->update('admin',$data)) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	/*#############################
	####### End Edit User ########
	##############################*/
	function profileImage(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query->row_array();
	}	
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
	function findCountry(){
		$this->db->select('*');
		$this->db->from('country');
		$this->db->order_by("name", "asc");
		$result = $this->db->get();
		return $result->result_array();	
	}	
	/*##############################################
	 ############## CheckEmail by Id ###############
	 ###############################################*/
	function checkEmail(){
		$email = $this->input->get_post('email'); 
		$id = $this->input->get_post('id'); 
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		
		$this->db->where('id !=',$id);
		$result = $this->db->get();
		return $result->num_rows(); 
	}
	/*##############################################
	 ############ End CheckEmail by Id #############
	 ###############################################*/
	function emailCheck(){
		$id = $this->session->userdata('id'); 
		$email = $this->input->get_post('email'); 
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('id !=',$id);
		$result = $this->db->get();
		//return $result->result(); 
		return $result->num_rows(); 
	}
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