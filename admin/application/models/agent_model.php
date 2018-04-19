<?php
class Agent_model extends CI_Model {	 
	function show() {
		$this->db->select('*');
		$this->db->from('agents');
		$this->db->where('delete_status',0);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {
		return $query->result();
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
		$this->db->from('agents');
		$this->db->where('id', $_REQUEST['id']);
		$query = $this->db->get();
		return $query->result_array(); 
	}
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
	function editAgent() {
		if($this->input->get_post('id')){
			$userId = $this->input->get_post('id');
			$this->db->select('ag.*,c.city');
			$this->db->from('agents ag');
			$this->db->join('citys c','ag.city_id = c.id');
			$this->db->where('ag.id', $userId);
			$query = $this->db->get();
			return $query->row(); 
		}
		else {
			return false;
		}
	}
	function updateAgent() {
		if($userId = $this->input->get_post('id')) {
			if($_FILES['image']['name']!=""){
				$this->db->select('*');
				$this->db->from('agents');
				$this->db->where('id',$userId);
				$query = $this->db->get();
				$imageName = $query->row_array();
				if($imageName['image']){
					unlink('../'.$imageName['image']);
				}
				$profileAvatar =  $_FILES['image']['name'];
				if(!is_dir('../agent'))      
				mkdir('../agent');
				$createFolder = '../agent/'.$userId;
				$ext=pathinfo($profileAvatar);
				$FileName='agent_'.$userId.'_'.rand().".".$ext['extension'];
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
				$data['image'] = 'agent/'.$userId."/".$file_name['file_name'];
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
			$username = $this->input->post('username'); 
			if($username){
				$data['username'] = $username;
			}
			$gender = $this->input->post('gender'); 
			if($gender){
				$data['gender'] = $gender;
			}
			$address = $this->input->post('address'); 
			if($address){
				$data['address'] = $address;
			}
			$country = $this->input->post('country'); 
			if($country){
				$data['country_id'] = $country;
			}
			$state = $this->input->post('state'); 
			if($state){
				$data['state_id'] = $state;
			}
			$city = $this->input->post('city'); 
			if($city){
				$data['city_id'] = $this->getCityId($city,$country);
			}
			$zipcode = $this->input->post('zipcode'); 
			if($zipcode){
				$data['zipcode'] = $zipcode;
			}
			$data['status'] = $status?$status:1;
			$data['delete_status'] = $delete_status?$delete_status:0;
			$data['last_update'] = date('Y-m-d H:i:s');
			//$userId=$this->session->userdata('id');
			$this->db->where('id',$userId);
			$this->db->set($data);
			if($this->db->update('agents')) {
				//echo $this->db->last_query();die;
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
	/*#############################
	####### Start Add User ########
	##############################*/
	function saveAgent() {
	 //echo "hello";die;
		$username = $this->input->post('username'); 
		$email = $this->input->post('email'); 
		$password = $this->input->post('password');
		$gender = $this->input->post('gender');
		$first_name = $this->input->post('first_name'); 
		$last_name = $this->input->post('last_name');
		$address = $this->input->post('address'); 
		$country = $this->input->post('country'); 
		$state = $this->input->post('state'); 
		$city = $this->input->post('city'); 
		$mobile = $this->input->post('mobile'); 
		$zipcode = $this->input->post('zipcode');
		$data['username'] = $username;
		$data['email'] = $email;
		$data['password'] = md5($password);
		$data['gender'] = ($gender);
		$data['first_name'] = $first_name;
		$data['last_name'] = $last_name;
		//$data['image'] = $createFolder."/".$file_name['file_name'];
		$data['address'] = $address;
		$data['country_id'] = $country; 
		$data['state_id'] = $state; 
		$data['city_id'] = $this->getCityId($city,$country); 
		$data['mobile'] = $mobile;     
		$data['zipcode'] = $zipcode;
		$data['last_update'] = date('Y-m-d H:i:s'); 
		$data['create_date'] = date('Y-m-d H:i:s');
		$data['status'] = 1; 
		//print_r($data);die;
		$this->db->insert('agents',$data); 
		$lastInsertID = $this->db->insert_id();
		if($_FILES['image']['name']!=""){
			$profileAvatar =  $_FILES['image']['name'];
			if(!is_dir('../agent'))      
			mkdir('../agent');
			$createFolder = '../agent/'.$lastInsertID;
			$ext=pathinfo($profileAvatar);
			$FileName='Agent_'.$lastInsertID.'_'.rand().".".$ext['extension'];
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
			$dataM['image'] = 'agent/'.$lastInsertID.'/'.$file_name['file_name'];
			$this->db->where('id',$lastInsertID);
			$this->db->update('agents',$dataM);	
		}
		return $lastInsertID;
	}
	/*##########################################
	########## Publice and Unpublish ##########
	###########################################*/
	function active() {
		$this->db->select('status');
		$this->db->from('agents');
		$this->db->where('id', $_REQUEST['id']);
		$query = $this->db->get();
		$data9=$query->result_array();
		if($data9[0]['status']==0){
			$status=1;
			$data = array('status'=>$status);
			$this->db->where('id',$_REQUEST['id']);
			$this->db->update('agents',$data);
		}else{
			$status=0;
			$data1 = array('status'=>$status);
			$this->db->where('id',$_REQUEST['id']);
			$this->db->update('agents',$data1);	
		}
	}
	function delete(){
		$data['delete_status'] = 1;
		$this->db->where('id',$_REQUEST['del']);
		$this->db->update('agents',$data);	
	}
	function getCountrys() {
		$this->db->select('id,country');
		$this->db->from('countrys');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function state($country_id=NULL) {
		if(($country_id) or ($this->input->get_post('country_id')) ) {
			$this->db->select('id,state');
			$this->db->from('states');
			$this->db->where('country_id',($country_id)?($country_id):($this->input->get_post('country_id')));
			$query = $this->db->get();
			//$q = $this->db->last_query();
		
			return $query->result();
		}
		else {
			return false;
		}
	}
	function getCity() {
		$this->db->select('id,city');
		$this->db->from('citys');
		$this->db->where('country_id',$this->input->get_post('country_id'));
		$this->db->like('city',$this->input->get_post('city'));
		$query = $this->db->get();
		$q = $this->db->last_query();
		file_put_contents('city.txt',$q);
		return $query->result();
	}
	function getCityId($city,$country_id) {
		$this->db->select('id');
		$this->db->from('citys');
		$this->db->where('country_id',$country_id);
		$this->db->where('city',$this->input->get_post('city'));
		$query = $this->db->get();
		if($query->num_rows()) {
			return $query->row()->id;
		}
		else {
			$data['country_id'] = $country_id;
			$data['state_id'] = $this->input->get_post('state');
			$data['city'] = $city;
			$data['status'] = 1;
			$this->db->insert('citys',$data);
			return $this->db->insert_id();
		}
	}
	function checkEmail() {
		$this->db->select('email');
		$this->db->from('agents');
		$this->db->where('email',$this->input->get_post('email'));
		$query = $this->db->get();
		return $query->num_rows();
	}
	function checkUsername() {
		$this->db->select('username');
		$this->db->from('agents');
		$this->db->where('username',$this->input->get_post('username'));
		$query = $this->db->get();
		return $query->num_rows();
	}
}

?>