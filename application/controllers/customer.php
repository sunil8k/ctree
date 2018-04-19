<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('customer_model');
		$this->load->model('agent_model');
		$this->load->model('lead_model');	
		/*
		$this->load->model('order_model');*/
	}
	
	public function index(){
		if($this->session->userdata('id')) {
			$data = $this->lead_model->section();
			$data['countrys'] = $this->lead_model->countryList(); 
			$data['profiles'] = $this->customer_model->myProfile(); 
			$this->load->view("customer/index",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	public function login() {		
		$this->load->view("customer/login");
	}
	public function checkLogin() {
		if($this->input->get_post('type') == 'seeker') {
			$data = $this->customer_model->checkLogin();
			$controller = ($this->input->get_post('type'))?(($this->input->get_post('type') == 'seeker')?('customer'):('agent')):('welcome');
		}
		else {
			$data = $this->agent_model->checkLogin();
			$controller = ($this->input->get_post('type'))?(($this->input->get_post('type') == 'provider')?('agent'):('customer')):('welcome');
		}
		if($data[0]->id) {
			$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('mobile',$data[0]->mobile);
			$this->session->set_userdata('name',$data[0]->first_name." ".$data[0]->last_name);
			$this->session->set_userdata('type',(($data[0]->type=='seeker')?('seeker'):((($data[0]->type=='manager')?('manager'):('provider')))));
			$this->session->set_userdata('image',$data[0]->image);
			$this->session->set_userdata('id',$data[0]->id);
			if($data[0]->type=='manager') {
				$this->session->set_userdata('agent_id',$data[0]->parent_id);
			}
			else if($data[0]->type=='provider') {
				$this->session->set_userdata('agent_id',$data[0]->id);
			}
			if($data[0]->type != 'seeker')
				$this->session->set_userdata('permission',$this->agent_model->agentPermissions($data[0]->agent_id?$data[0]->agent_id:$data[0]->id));
			$this->session->set_flashdata('success', 'You have Successfully LogIn');  
			redirect($controller.'/index');
		}
		else {
			$data = $_REQUEST;
			$this->session->set_flashdata('unsuccess', 'Email or Password not correct!'); 
			$this->load->view("customer/login",$data);
		}	
	}
	
	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You are Successfully LogOut.');  
		redirect('welcome/index');
	}
	public function forgotPassword() { 
		$this->load->view('customer/forgotPassword');
	}
	public function forgot() { 
		if($this->input->get_post('type') == 'seeker') {
			if($data = $this->customer_model->forgot()) {				
				$this->session->set_flashdata('test', 'Please check your email:("'.$data->email.'") and password:("'.$data->password_text.'"), Credential has been send to your email account.'); 
			}
			else {
				$this->session->set_flashdata('unsuccess', 'Your email ID not registerd in our database.'); 
			}
		}
		else {
			if($data = $this->agent_model->forgot()) {
				$this->session->set_flashdata('test', 'Please check your email:("'.$data->email.'") and password:("'.$data->password_text.'"), Credential has been send to your email account.');
			}
			else {
				$this->session->set_flashdata('unsuccess', 'Your email ID not registerd in our database.'); 
			} 
		}
		redirect('customer/login');
	}
	
	public function register() {
		if(!$this->session->userdata('id')) {	
				$data['companys'] = $this->agent_model->company();
				$data['countrys'] = $this->agent_model->country();	
			$this->load->view("customer/register",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	
	public function save() {
		if($data = $this->customer_model->save()) {
		//print_r($data);
			/*$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('mobile',$data[0]->mobile);
			$this->session->set_userdata('name',$data[0]->first_name." ".$data[0]->last_name);
			$this->session->set_userdata('type','Customer');
			$this->session->set_userdata('image',$data[0]->image);
			$this->session->set_userdata('id',$data[0]->id);*/ 
			$this->session->set_flashdata('success', 'Please check your email and get your login credentials.'); 
			redirect('customer/login');
		}
		else {
			$data = $_REQUEST;
			$this->session->set_flashdata('unsuccess', 'Fields Require!'); 
			$this->load->view("customer/login",$data);
		}	
	}
	public function editProfile() {
		if($this->session->userdata('id')) {
			$data['countrys'] = $this->lead_model->countryList(); 
			$data['profiles'] = $this->customer_model->myProfile(); 
			$this->load->view("customer/editProfile",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	public function update() {
		if($data = $this->customer_model->update()) {
			$this->session->set_flashdata('success', 'Your data update successfully.'); 
			redirect('customer/index');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not saved!'); 
			$this->load->view("customer/login",$data);
		}	
	}
     
	function checkEmail() {
		echo $this->agent_model->checkEmail();
		die;
	}
	function checkUsername() {
		echo $this->agent_model->checkUsername();
		die;
	}
	function queries() {
		if($data['queries'] = $this->customer_model->queries()) {
			$this->load->view("customer/queries",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found!'); 
			$this->load->view("customer/queries",$data);
		}	
	}
	function myLead() {
		if($this->input->get_post('lead_id')) {
			$data = $this->customer_model->detailLead();
			$this->load->view("customer/detail",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found'); 
			$this->load->view("customer/index",$data);
		}	
	}
	
	function deal() {
		if($data['deals'] = $this->customer_model->deals()) {
			//print_r($data);die;
			$this->load->view("customer/deals",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found.'); 
			redirect("customer/queries");
		}
	}	
	function acceptBid() {
		if($this->customer_model->acceptBid()) {
			//echo $this->input->get_post('bid_id');
			$this->session->set_flashdata('success', 'You are successfully verify the bid');
			//$this->load->view("customer/deals",$data);
			redirect("customer/index");
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found.'); 
			redirect("customer/index");
		}
	}
	function changePassword() {
		$this->load->view("customer/changePassword");
	}
	function updatePassword() {
		if( $this->customer_model->updatePassword()) {
			$this->session->set_flashdata('success', 'Password Reset successfully.');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Password can not be changed.');
		}
		redirect("customer/changePassword");
	}
	function sendPinToEmail() {
		$email = $this->input->get_post('email');
		$subject = 'Your pin to validate your EmailID.';
		$pin = rand(999,999999);
		$message = 'Your pin is:'.$pin.', PLease put the value on your pin text box to verify your email ID';
		$this->customer_model->send_mail($email,$subject,$message);
		echo $pin;
		die;
	}
	function getNotifications() {
		if( $data['notifications'] = $this->agent_model->getNotifications()) {
			$this->load->view("customer/notifications",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'No data found.');
			$this->load->view("customer/notifications");
		}		
	}
function myContact() {
		if( $data['myContacts'] = $this->customer_model->myContact()) {
			$this->load->view("customer/myContact",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'No data found.');
			$this->load->view("customer/myContact");
		}	
        
}
function fullBid() {
	if($data['details'] = $this->customer_model->fullBid()) {
		$this->load->view("customer/fullBid",$data);
	}
	else {
		$this->session->set_flashdata('unsuccess', 'data not found.');
		redirect('customer/deal?lead_id='.$this->input->get-post('lead_id'));
	}
}
}
