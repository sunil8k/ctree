<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('customer_model');
		$this->load->model('agent_model');
		$this->load->model('lead_model');
		$this->load->model('banner_model');	
	}	
	public function index(){
		if($this->session->userdata('id')) {
			$data = $this->lead_model->section();
			$data['countrys'] = $this->lead_model->countryList(); 
			$data['profiles'] = $this->agent_model->myProfile(); 
			$this->load->view("agent/index",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	/*SHOW LOGIN VIEW START*/
	function login() {
		$data['agent'] = 1;
		$this->load->view("agent/login",$data);
	}
	/*SHOW LOGIN VIEW END*/
	/*CHECK LOGIN FUNCTIONALITY START*/	
	public function checkLogin() {
		if($this->input->get_post('type') == 'seeker') {
			$data = $this->customer_model->checkLogin();
			$controller = ($this->input->get_post('type'))?(($this->input->get_post('type') == 'seeker')?('customer'):('agent')):('welcome');
		}
		else {
			$data = $this->agent_model->checkLogin();
			$controller = ($this->input->get_post('type'))?(($this->input->get_post('type') == 'agent')?('agent'):('seeker')):('welcome');
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
	/*CHECK LOGIN FUNCTIONALITY START*/
	/*SHOW REGISTER VIEW START*/
	public function register() {
		if(!$this->session->userdata('id')) {
				$data['companys'] = $this->agent_model->company();
				$data['countrys'] = $this->agent_model->country();	
			$this->load->view("agent/register", $data);
		}
		else {
			redirect('welcome/index');
		}
	}
	/*SHOW REGISTER VIEW END*/
	/*SHOW USERS START*/
	function users() {
		if($this->session->userdata('id') && ($this->session->userdata('type')=='provider')) {	
			$data['users'] = $this->agent_model->users();
			$this->load->view("agent/users", $data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'You are not authorised to view this section.');  
			redirect('welcome/index');
		}
	}
	function addUser() {
		if($data = $this->agent_model->addUser()) {
			$this->load->view("agent/addUser", $data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'You have no permission to perform this task.');  
			redirect('agent/users');
		}
	}
	function editUser() {
		if($data['profiles'] = $this->agent_model->editUser($this->input->get_post('userId'))) {
			$this->load->view("agent/editUser", $data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'You have no permission to perform this task.');  
			redirect('agent/users');
		}
	}
	function saveUser() {
		if($data = $this->agent_model->saveUser()) {
			redirect("agent/users", $data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'You have no permission to perform this task.');  
			redirect('agent/users');
		}
	}
	function updateUser() {
		if($data = $this->agent_model->updateUser()) {
			$this->session->set_flashdata('success', 'You have successfully update user profile.');  
			redirect("agent/users", $data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'You can not update user profile.');  
			redirect('agent/users');
		}
	}
	function checkUser() {
		if($this->agent_model->checkUser($this->input->get_post('username'))) {
			echo "Username not Available";die;
		}
		else {
			echo "Available.";die;
		}
	}
	function checkUserEmail() {
		if($this->agent_model->checkUserEmail($this->input->get_post('email'))) {
			echo "Email not Available";die;
		}
		else {
			echo "Available.";die;
		}
	}
	function deleteUser() {
		if($this->session->userdata('id') && ($this->session->userdata('type')=='provider') && ($this->input->get_post('userId'))) {
			if($this->agent_model->deleteUser($this->input->get_post('userId'))) {
				$this->session->set_flashdata('success', 'User deleted successfully.'); 	
				redirect('agent/users');
			}
			else {
				$this->session->set_flashdata('unsuccess', 'User can not deleted.');  
				redirect('agent/users');
			}
			
		}
		else {
			$this->session->set_flashdata('unsuccess', 'User can not deleted.');  
			redirect('agent/users');
		}
	}
	/*SHOW USERS START*/
	/*REGISTER SAVE FUNCTION FOR AGNET START*/
	public function save() {
		if($data = $this->agent_model->save()) {
			$this->session->set_flashdata('success', 'Please check your email and get Login credentials.'); 
			redirect('agent/login');
		}
		else {
			$data = $_REQUEST;
			$this->session->set_flashdata('unsuccess', 'Fields Require!'); 
			$this->load->view("customer/login",$data);
		}	
	}
	/*REGISTER SAVE FUNCTION FOR AGNET END*/
	/*SHOW EDIT PROFILE VIEW AGNET START*/
	public function editProfile() {
		if($this->session->userdata('id')) {
			$data['countrys'] = $this->lead_model->countryList(); 
			$data['profiles'] = $this->agent_model->myProfile(); 
			$this->load->view("agent/editProfile",$data);
		}
		else {
			redirect('welcome/index');
		}
	}
	/*SHOW EDIT PROFILE VIEW AGNET START*/
	/*UPDATE AGNET PROFILE DATA START*/
	public function update() {
		if($data = $this->agent_model->update()) {
			$this->session->set_flashdata('success', 'Your data update successfully.'); 
			redirect('agent/index');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not saved!'); 
			$this->load->view("customer/login",$data);
		}	
	}
	/*UPDATE AGNET PROFILE DATA END*/
	function getCompaney() {
		$data = $this->agent_model->getCompaney();
		echo json_encode($data);die;
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
		if($data['queries'] = $this->agent_model->queries()) {
			$this->load->view("agent/queries",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found.'); 
			$this->load->view("agent/queries",$data);
		}	
	}
	function bid() {
		if($this->input->get_post('lead_id') && $this->agent_model->updateAgentLeadInfo()) {
			$this->session->set_flashdata('success', 'Your bid generate Successfully.');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Your bid generated.'); 
		}	
		redirect('agent/mybid');
	}
	function bidDetail() {
		if($this->input->get_post('lead_id')) {
			$this->agent_model->addLead();
			$data['agentLeads'] = $this->agent_model->bidDetail();
			$data['companies'] = $this->agent_model->getCompanies($this->input->get_post('lead_id'));
			//print_r($data);die;
			$this->load->view("agent/detail",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found'); 
			$this->load->view("agent/detail");
		}	
	}
	function myBid() {
		if($data['bids'] = $this->agent_model->myBid()) {
			$this->load->view("agent/myBid",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found.'); 
			redirect("agent/index");
		}
	}
	function myContact() {
		if($data['myContacts'] = $this->agent_model->myContact()) {
			$this->load->view("agent/myContact",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found.'); 
			$this->load->view("agent/myContact");
		}
	}
	function changePassword() {
		$this->load->view("agent/changePassword");
	}
	function updatePassword() {
		if( $this->agent_model->updatePassword()) {
			$this->session->set_flashdata('success', 'Password Reset successfully.');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Password can not be changed.');
		}
		redirect("agent/changePassword");
	}
    function getNotifications() {
		if( $data['notifications'] = $this->agent_model->getNotifications()) {
			$this->load->view("agent/notifications",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'No data found.');
			redirect("agent/index");
		}		
	}
	function customerDetail() {
		if( $data['customerDetails'] = $this->agent_model->customerDetail()) {
			$this->load->view("agent/customerDetail",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'No data found.');
			$this->load->view("agent/customerDetail");
		}	
	}
	function myPlans() {
		if( $data['plans'] = $this->agent_model->myPlans()) {
			$this->load->view("agent/myPlan",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'No data found.');
			redirect("agent/index");
		}	
	}
	/*REMOVE BY AGNET DECLINED BID "START"*/
	function removeDeclineBid() {
		if($this->agent_model->removeDeclineBid()) {
			$this->session->set_flashdata('success', 'Your decline bid removed successfully.');
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Bid can not be removed.');
		}
		redirect("agent/myBid");
	}
	/*REMOVE BY AGNET DECLINED BID "END"*/
	/*SHOW AGNET TERRITORIES SCREEN "START"*/
	function myTerritories() {
		$data['territories'] = $this->agent_model->getTerritories();
		if($data['myTerritories'] = $this->agent_model->myTerritories()) {
			$this->load->view("agent/myTerritories",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', 'Data not found.');
			$this->load->view("agent/myTerritories",$data);
		}
	}
	/*SHOW AGNET TERRITORIES SCREEN "END"*/
	/*SHOW AGNET TERRITORIES SCREEN "START"*/
	function updateTerritories() {
		$data = $this->agent_model->updateTerritories();
		if(!$data['error']) {
			$this->session->set_userdata('permission',$this->agent_model->agentPermissions($this->session->userdata('agent_id')));
			$this->session->set_flashdata('success', $data['message']);
		}
		else {
			$this->session->set_flashdata('unsuccess', $data['message']);
		}
		redirect("agent/myTerritories");
	}
	/*SHOW AGNET TERRITORIES SCREEN "END"*/
	/*SHOW AGNET BANNER "START"*/
	function myBanner() {		
		$data = $this->banner_model->myBanner();
		if(!$data) {
			$this->session->set_flashdata('unsuccess', 'Data not found.');
			redirect("agent/myBanner");
		}
		$this->load->view("agent/myBanner",$data);
	}
	function addBanner() {		
		
		$this->load->view("agent/addBanner",$data);
	}
	function saveBanner() {		
		$data = $this->banner_model->save();
		if(!$data['error']) {
			$this->session->set_userdata('permission',$this->agent_model->agentPermissions($this->session->userdata('agent_id')));
			$this->session->set_flashdata('success', $data['message']);
			redirect("agent/myBanner",$data);
		}
		else {
			$this->session->set_flashdata('unsuccess', $data['message']);
			redirect("agent/myBanner");
		}
	}
	/*SHOW AGNET BANNER "END"*/
	
	
}
