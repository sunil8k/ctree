<?php
class Users_model extends CI_Model {	 
	/*##############################
	#### Start Login and Logout ####
	###############################*/
		  
	function login(){				
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
		if($username && $password){
			$this->load->helper('form');
			$this->db->select('*');
			$this->db->from('admin');
		}
		$this->db->where('username', $username);
		$this->db->where('password',md5($password));
		$this->db->where('type !=','customer');
		$this->db->where('status',1);
		$this->db->where('is_delete',0);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array(); 
	}
			
	/*#############################
	 #### End Login and Logout ####
	 ##############################*/
	 /*##################################
	 #### Show player grid with paging ####
	 ###################################*/
	 
	function player() {
		$query = $this->db->get('users');		
		if ($query->num_rows() > 0) {					
			foreach ($query->result() as $row){
			  $data[] = $row;
			}
			return $data;
		}
		return false;
	}
	/*##################################
	#### End player grid with paging ####
	###################################*/
	////////////////////////////////////////Old Stories////////////////////////////////////////// 
	function show() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('is_delete',0);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {					
			foreach ($query->result() as $row){
			  $data[] = $row;
			}
			return $data;
		}
		return false;
	}
	/*#############################
	#### Sttr Change Password ####
	##############################*/
	function change(){
		$old_password=$this->input->post('old_password');
		$var=$this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$var);
		$query = $this->db->get();
		//echo $this->db->last_query();
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
	
	/******************************************/
		
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
			$UserId = $this->input->get_post('id');
		}else{
			$UserId=$this->session->userdata('id');
		}
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $UserId);
		$query = $this->db->get();
		return $query->row_array(); 
	}
	function editAdmin()
	{
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
			unlink('../'.$imageName['image']);
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
		
		$data['image'] = 'userAvatar/'.$userId."/".$file_name['file_name'];print_r($file_name);
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
	$marital = $this->input->post('marital'); 
	if($marital){
		$data['marital'] = $marital;
	}		
	$data['is_delete'] = $this->input->get_post('is_delete')?1:0;
	$data['status'] = $this->input->post('status')?1:0;
	
		//$userId=$this->session->userdata('id');
		$this->db->where('id',$userId);
		$this->db->set($data);
		$this->db->update('users');  
		//echo $this->db->last_query();die;
		return true;
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
		 
	function add_save() { echo "test";die;
		$username = $this->input->post('username'); 
		$email = $this->input->post('email'); 
		$password = $this->input->post('password');
		$fname = $this->input->post('fname'); 
		$lname = $this->input->post('lname');
		$address = $this->input->post('address'); 
		$country = $this->input->post('country'); 
		$mobile = $this->input->post('mobile'); 
		$postalcode = $this->input->post('postalcode');
		$userType = $this->input->post('user_type'); 
		
		$data['username'] = $username;
		$data['email'] = $email;
		$data['password'] = md5($password);
		$data['fname'] = $fname;
		$data['lname'] = $lname;
		//$data['image'] = $createFolder."/".$file_name['file_name'];
		$data['address'] = $address;
		$data['country'] = $country; 
		$data['mobile'] = $mobile;     
		$data['postalcode'] = $postalcode;
		$data['userType'] = $userType;
		$data['status'] = 1; 
		
		$this->db->insert('users',$data); 
		
		$lastInsertID = $this->db->insert_id();
		
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
			$this->db->update('users',$dataM);	
		}
		
		$level = $this->input->post('level');
		if($level){
			$this->db->select('*');
			$this->db->from('promo_levels');
			$this->db->where('id', $level);
			$result = $this->db->get();
			$discount = $result->result_array(); 
			$promoCode = 'SU'.$lastInsertID.'PL'.$level;
		
			$data1['promo_id']=$level;
			$data1['user_id']=$lastInsertID;
			$data1['discount']=$discount[0]['discount'];
			$data1['promo_code']=$promoCode;
			$data1['status']=1;
			$this->db->insert('promo_users',$data1);
		}
	}
	/*##########################################
	########## Publice and Unpublish ##########
	###########################################*/
	function active() {
		$this->db->select('status');
		$this->db->from('users');
		$this->db->where('id', $_REQUEST['id']);
		$query = $this->db->get();
		$data9=$query->result_array();
		if($data9[0]['status']==0){
			$status=1;
			$data = array('status'=>$status);
			$this->db->where('id',$_REQUEST['id']);
			$this->db->update('users',$data);
		}else{
			$status=0;
			$data1 = array('status'=>$status);
			$this->db->where('id',$_REQUEST['id']);
			$this->db->update('users',$data1);	
		}
	}
	/*##########################################
	####### End publish and un publish ########
	###########################################*/
	
	
	/*##########################################
	############## Delete by id ###############
	###########################################*/
	function delete(){
		$data['is_delete'] = 1;
		$data['last_update'] = date('Y-m-d H:i:s');
		$this->db->where('id',$this->input->get_post('del'));
		$this->db->update('users',$data);	
	}
	/*##########################################
	############## Delete by id ###############
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