<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
		 function __construct() {
				 parent:: __construct();
				 $this->load->database();
				 $this->load->model("users_model","admin_model");
				 //
				 $this->load->model("permission_model");
				 $this->load->helper('text');
		 }
		  /*##############################
		 #### Start Login and Logout ####
	     ###############################*/
		 
		 public function login(){
			$this->load->view("login");			
		 }
		
		 public function saveLogin(){
			if($data=$this->users_model->login()){
				$this->session->set_userdata('username',$data[0]['username']);
				$this->session->set_userdata('name',$data[0]['first_name']." ".$data[0]['last_name']);
				$this->session->set_userdata('type',$data[0]['type']);
				$this->session->set_userdata('image',$data[0]['image']);
				$this->session->set_userdata('id',$data[0]['id']);
				//$this->session->set_userdata('image',$data[0]['image']);
				$this->session->set_userdata('language_id',1);
				redirect('welcome/index');
			}
			$this->session->set_flashdata('unsuccess', 'Invalid Email or Password !');
			redirect('users/login'); 
			
		 }
		
		public function logout(){
			
			$this->session->sess_destroy();
			redirect('users/login');    
		}
		
		/*#############################
		 #### End Login and Logout ####
	     ##############################*/
		 
		 
		 
		/***********************
		 *** Change password ***
	     ***********************/
		 
		
		 public function changepassword(){
			 if($this->input->post()){
				  $data=$this->users_model->change();	
				  if($data[0]['password']==md5($this->input->post('old_password'))){
					  $dt['password'] = md5($this->input->post('password'));
					  $dt['password_text'] = $this->input->post('password');
					  $username = $this->session->userdata('username');
					  $this->db->where('username',$username);
					  $this->db->set($dt);
					  $this->db->update('admin');
					  $this->session->set_flashdata('success', 'Password Changed Successfully!');
					   redirect("users/changePassword");				  }else{
					  $this->session->set_flashdata('unsuccess', 'Old Password Did Not Match!');
					  redirect("users/changePassword");
				  }
			 }
			 $this->load->view("users/changePassword");
		 }
		 
        /*************************
		 ***End Change password***
	     *************************/
	   
		 /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
		 public function index(){
			 $this->permission_model->permission();
			  $data["results"] = $this->users_model->show();
			  $this->load->view("users/userList", $data);
		 } 
		 function active(){
			 $view=$this->input->get_post('view');
			  if($this->input->get_post('id')){
			    $this->users_model->active();
				 $this->session->set_flashdata('success', 'Operation complete Successfully!');
					redirect('users/'.$view);
			  }else{
				  $this->session->set_flashdata('unsuccess', 'Operation not complete!');
					redirect('users/'.$view);
			  }
		 }
		 
		 function delete(){
			 $view=$this->input->get_post('view');
			  if($this->input->get_post('del')){
			    $this->users_model->delete();
				 $this->session->set_flashdata('successful', 'User Deleted Successfully!');
					redirect('users/'.$view);
			  }else{
				  $this->session->set_flashdata('unsuccess', 'Operation not complete!');
					redirect('users/'.$view);
			  }
		 }
		 
		 
		
	   
		function view(){
			$this->load->database();
			$this->load->model('users_model');
			$data['results11'] = $this->users_model->ajax();
			$this->load->view('users/preView',$data);
			
	    }	
		
		
################################################### ADD USER ####################################################

		public function addUser(){
			$view = $this->input->get_post('view');
	        $this->load->view('users/addUser',$result);
        }
		
		public function saveUser(){
			$view = $this->input->get_post('view');
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('image','Profile Image','file_type[image/jpeg|image/gif|image/png]|file_max_size[500]|callback_handle_upload');
			//$this->form_validation->set_rules('email','Email','valid_email|xss_clen|required|valid_emails|callback_email_check');
			$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean');
			$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean');
			$this->form_validation->set_rules('address','Address','required|trim|xss_clean');
			
				if($this->form_validation->run() == FALSE){
					$result['lavels']=$this->users_model->promoLevel();
			        $result['data']=$this->users_model->findCountry();
				    $this->load->view('users/addUser',$result);
				}else {
				
					 $this->users_model->add_save(); 
					 /****************** Email Send to New User *************/ 
				$username = $this->input->post('username'); 
				$email = $this->input->post('email'); 
				$password = $this->input->post('password');
				$message = '<table align="left" border="0" style="font-family: Verdana, Geneva, sans-serif;font-size: 11px;border-width:medium; border:solid; border-spacing:10;border-color:#CCCCCC" width="625">
						<tbody>
							<tr>
								<td valign="">
									<img alt="" src="http://localhost/compareTree/assets/images/logo.png" style="width: 100px; height: 100px;" /></td>
							</tr>
							<tr>
								<td align="justify">
									
									<p>
										Dear User,<br />
										<br />
										User Name - '.$username.'</p>
									 <p>
										E-Mail - '.$email.'</p>
									<p>
										Password - '.$password.'</p>
									<div><strong>Thanks & Regards <br />
                                          Team iMemet</strong></div>
								</td>
							</tr>
						</tbody>
					</table>';
					
				$config['protocol'] = 'mail';
				$this->load->library('email',$config);
				$this->email->initialize(array(
				'mailtype' => 'html',
				'validate' => TRUE,
				));
				$this->email->from('sunil@label9420.net', 'iMemet');
				$this->email->to($email);
				$this->email->subject('Successfully registered in iMemet');
				$this->email->message($message);
				if($this->email->send()){
					//redirect('users/outBoxMail'); 
				}else{
					//redirect('users/composeMail'); 
					echo "Mail Not Send";
				}
				
				/****************** Email Send to New User *************/ 
					 $this->session->set_flashdata('success', 'Profile Create successfully!');
					 if(!$view)
					 	$view ='';
					 redirect('users/'.$view);
					//redirect('welcome');
				}
		}

################################################## END USER ADD ###################################################		
		
		
		/***********************
		 *** Start Edit user ***
	     ***********************/
		
		public function editUser(){
			$result['data']=$this->users_model->edit();
			//$result['data12']=$this->users_model->findCountry();
	        $this->load->view('users/edit',$result);
        }
		public function editAdmin(){
			$result['data']=$this->users_model->editAdmin();
			//$result['data12']=$this->users_model->findCountry();
	        $this->load->view('users/editAdmin',$result);
        }
		
		public function saveEdit(){
			$View = $this->input->get_post('view');//die;
			//$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('image','Image','file_type[image/jpeg|image/gif|image/png]|file_max_size[500]|callback_handle_upload');
			
				if($this->form_validation->run() == FALSE){
					$result['data']=$this->users_model->edit();
				    $this->load->view('users/edit',$result);
					
				}
				else {
					$this->users_model->edit_save(); 
					 $this->session->set_flashdata('success', 'Profile updated successfully!');
					 if($View){
						 redirect('users/'.$View);
					 }else{
						 redirect('users/saveEdit');
					 }
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
		
/******************************* My Kick-back ****************************/
	/*	function myKickBack(){
			$data["results"] = $this->users_model->selesKickback();
	        $this->load->view('users/myKickback',$data);
		}*/

/******************************* End My Kick-back ****************************/
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