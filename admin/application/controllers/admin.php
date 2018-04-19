<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model("users_model");
		$this->load->model("admin_model");
		$this->load->model("permission_model");
		$this->load->helper('text');
	}
	/*LIST BACKEND USERS*/ 
	function index(){
		$this->permission_model->permission();
		$data["results"] = $this->admin_model->show();
		$this->load->view("admin/list", $data);
	}
	/*AJAX VIEW BACKEND USERS IN POPUP*/ 
	function view(){
		$this->load->database();
		$data['results'] = $this->admin_model->ajax();
		$this->load->view('admin/preView',$data);
		
	} 
	function active(){
		$this->permission_model->permission();
		if($this->input->get_post('id')){
			$this->admin_model->active();
			$this->session->set_flashdata('success', 'Operation complete Successfully!');
			redirect('admin/index');
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Operation not complete!');
			redirect('admin/index');
		}
	}	 
	function delete(){
		$view=$this->input->get_post('view');
		if($this->input->get_post('id')){
			$this->admin_model->delete();
			$this->session->set_flashdata('successful', 'Admin user Deleted Successfully!');
			redirect('admin/index');
		}
		else{
			$this->session->set_flashdata('unsuccess', 'Admin user can not deleted');
			redirect('admin/index');
		}
	}	
		
		
################################################### ADD USER ####################################################

	function addUser(){
		$this->permission_model->permission();
		$this->load->view('admin/add');
	}	
	function saveUser(){
		$view = $this->input->get_post('view');
		$this->form_validation->set_rules('username','User Name','required');
		$this->form_validation->set_rules('image','Profile Image','file_type[image/jpeg|image/gif|image/png]|file_max_size[500]|callback_handle_upload');
		//$this->form_validation->set_rules('email','Email','valid_email|xss_clen|required|valid_emails|callback_email_check');
		$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean');
		$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean');
		$this->form_validation->set_rules('address','Address','required|trim|xss_clean');
		$this->admin_model->add_save();
		/****************** Email Send to New User *************/ 
		$username = $this->input->post('username'); 
		$email = $this->input->post('email'); 
		$password = $this->input->post('password');
		$message = '<table align="left" border="0" style="font-family: Verdana, Geneva, sans-serif;font-size: 11px;border-width:medium; border:solid; border-spacing:10;border-color:#CCCCCC" width="625">
			<tbody>
				<tr>
					<td valign="">
						<img alt="" src="/assets/images/logo.png" style="width: 100px; height: 100px;" />
					</td>
				</tr>
				<tr>
					<td align="justify">
						<p>
						Dear User,<br />
						<br />
						User Name - '.$username.'</p>
						<p>
						E-Mail - '.$email.'</p>
						<p>Password - '.$password.'</p>
						<div><strong>Thanks & Regards <br />Team Campare Tree</strong></div>
					</td>
				</tr>
			</tbody>
		</table>';
		
		$config['protocol'] = 'mail';
		$this->load->library('email',$config);
		$this->email->initialize(array('mailtype' => 'html','validate' => TRUE,));
		$this->email->from('sunil@agreedtechnologies.net', 'Caompare Tree');
		$this->email->to($email);
		$this->email->subject('Successfully registered in iMemet');
		$this->email->message($message);
		if($this->email->send()){ 
		}
		else{
			echo "Mail Not Send";
		}
		$this->session->set_flashdata('success', 'Profile Create successfully!');
		if(!$view)
		$view ='';
		redirect('admin/'.$view);
	}
	public function editUser(){
		$result['data']=$this->admin_model->edit();
		$this->load->view('admin/edit',$result);
	}
	public function saveEdit(){	
		$result = $this->admin_model->edit_save(); 
		if($result) {
		$this->session->set_flashdata('success', 'Profile updated successfully!');
		redirect('admin/index');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Profile can not updated successfully!');
			redirect('admin/index');
		}
	}
		public function saveEditAdmin(){
			echo $View = $this->input->get_post('view');//die;
			//$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('image','Image','file_type[image/jpeg|image/gif|image/png]|file_max_size[500]|callback_handle_upload');
			
				if($this->form_validation->run() == FALSE){
					$result['data']=$this->users_model->editAdmin();
				    $this->load->view('users/edit',$result);
					
				}
				else {
					$this->users_model->edit_save_admin(); 
					 $this->session->set_flashdata('success', 'Profile updated successfully!');
					 if($View){
						 redirect('users/'.$View);
					 }else{
						 redirect('users/editAdmin');
					 }
				}
		}
		
		
		 public function handle_upload(){ 
			  $file = $_FILES['image']['name'];
			  if($file!='') {
				  $info = pathinfo($file);
				  $file_name =  basename($info['extension'],'.'.$file);
				  $arr = array('gif','jpg','png');
				  if (in_array($file_name, $arr)){
					  return true;
					  }elseif($file==""){
						  $this->form_validation->set_message('handle_upload', "You must upload an image!");
						  return false;
					  }else {
						  $this->form_validation->set_message('handle_upload', "You must upload an valid image!");
					  return false;
				  }
				  return false;
			  }else {
				return true;  
			  }
		  }
		
		
		  public function email_check(){
             if($this->users_model->checkEmail()!=0){
				  $this->form_validation->set_message('email_check', 'Email already exist!');   
				 return FALSE;
			 }
			  
			  	  return TRUE;
		 }
		
		/***********************
		 *** End Edit user ***
	     ***********************/
		  public function checkEmail(){
             if($this->users_model->emailCheck()){
				 echo  "No";  
			 }else{ 
			  	 echo "Yes";
		      }
		  }
		 
		 
	 /*##################### Forgot Password #######################*/
		public function forgotPassword(){
	        $this->load->view('forgotPassword');
        }
		
		
		public function saveforgot(){
			if($data=$this->users_model->forgotPassword()){
				$data1=$this->users_model->token($data[0]['email'],$data[0]['fname']);
				
				redirect("users/forgotPassword?check=1");
			}else{
			$this->session->set_flashdata('unsuccess', 'Invalid email !'); 	
			redirect("users/forgotPassword");
			}
        }
		
		
		public function forgotChange(){
			    $token = $this->input->get_post('token');
				$string = base64_decode($token);
				$explod =  explode("#",$string);
				$email = $explod[0]; 
				$token1 = $explod[1]; 
				if($this->users_model->checkToken($email,$token1)){
					$this->load->view('forgotChangPassword');
				}else{
					redirect("users/forgotPassword?mail=1");
				}
			
		}
		
		public function isChangepassword(){
			$newpassword=$this->input->post('newpassword');
			$confirmpassword=$this->input->post('confirmpassword');
			if(!empty($newpassword) and !empty($confirmpassword)){
				if($newpassword == $confirmpassword){
					$email=$this->input->post('email');
					$data['password'] = md5($newpassword);
					$data['token'] = "";
					$this->db->where('email',$email);
					$this->db->update('users',$data);
					redirect("users/login");
				}else{
					redirect("users/forgotChange?status=0");
				}
			}else{
				redirect("users/forgotChange");
			}
		}
		
		/*##################### Forgot Password #######################*/
		
	
		function deleteUser(){
			$res = $this->users_model->deleteUser($_REQUEST['id']);	
			if($res == 1){
				$this->session->set_flashdata('delete','Customer has been removed.');
				redirect('users/frentUser');
			}
		}
		
/******************************* Permissions ****************************/
		public function permission() {
			$data['results'] = $this->permission_model->getPermission();
			$this->load->view("permission/permission",$data);
		}
/******************************* End Permissions ****************************/
	function sendMail() {
		$config['protocol'] = 'mail';
		$this->load->library('email',$config);
		$this->email->initialize(array(
		'mailtype' => 'html',
		'validate' => TRUE,
		));
		$this->email->from('ip-172-31-1-255.us-west-1.compute.internal', 'Test');
		$this->email->to('sunkumar88@gmail.com');
		$this->email->subject('Message that i found');
		$this->email->message('Hello Message');
		if($this->email->send()){
			echo "send";
		}else{
			//redirect('users/composeMail'); 
			echo "Mail Not Send";
		}
	}
}