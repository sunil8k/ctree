<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Game extends CI_Controller {	
	function __construct() {
		 parent:: __construct();
		 $this->load->database();
		 $this->load->model("game_model");
		 $this->load->model("category_model");
		 //$this->load->library("page");
		 $this->load->helper('text');
	}	
/*
################################################################################
########################## Show user grid with paging ##########################
################################################################################
*/
	public function index(){
		$data["results"] = $this->game_model->show();
		$this->load->view("game/index", $data);
	}
	public function dailyChallenge(){
		$data["results"] = $this->game_model->dailyChallenge();
		$this->load->view("game/daily_challenge", $data);
	}
	
	public function add(){
		$data["results"] = $this->game_model->add();
		$this->load->view("game/add", $data);
	}
	public function applied(){
		$id = $this->input->get_game('id');
		$data["results"] = $this->game_model->applied($id);
		$this->load->view("game/applied", $data);
	}
	function view(){
		error_reporting(0);
		$data = array();
		$results = $this->game_model->getAnswerMatrix();
		if(count($results)) {			
			foreach($results as $result) {
				$matrix[$result['row']][$result['col']] = $result['value']?$result['value']:"";
			}
			for($i=0;$i<=12;$i++) {
				for($j=0;$j<=12;$j++) {					
					$str['results'][$i][$j] = $matrix[$i][$j]?$matrix[$i][$j]:"";
				}
			}
		}
		$this->load->view('game/preView',$str);
	}
	function applyView(){
		$id = $this->input->get_game('apply_id');
		$data['results'] = $this->game_model->applyView($id);
		$data['agencys'] = $this->game_model->getAgency($id);
		$this->load->view('game/applyView',$data);
	}
	function edit(){
		$id = $this->input->get_post('id');
		$data['results'] = $this->game_model->edit($id);
		$data["categorys"] = $this->category_model->show();
		$this->load->view('game/edit',$data);
	}
	function update(){
		$View = $this->input->get_game('view');
		$this->game_model->edit_save(); 
		$this->session->set_flashdata('success', 'game updated successfully!');
		if($View){
			redirect('game/'.$View);
		}
		else{
			redirect('game/saveEdit');
		}
	}
	function active(){
		$chkStatus = $this->game_model->checkStatus($this->input->get_post('id'));
		$msg = ($chkStatus[0]['status']?('deactivate'):('activate'));
		if($data['results'] = $this->game_model->active()) {
			$this->session->set_flashdata('success', 'game '.$msg.' Successfully');
			if($this->input->get_post('daily')) {
				redirect("game/dailyChallenge");
			}
			else {
				redirect("game");
			}
		}
		else {
			$this->session->set_flashdata('unsuccess', 'game '.$msg.' Successfully');
			if($this->input->get_post('daily')) {
				redirect("game/dailyChallenge");
			}
			else {
				redirect("game");
			}
		}
	}	
	function delete(){
		$id = $this->input->get_post('del');
		if($this->game_model->delete($id)) {
			$this->session->set_flashdata('success', 'game deleted successfully');
			if($this->input->get_post('daily')) {
				redirect("game/dailyChallenge");
			}
			else {
				redirect("game");
			}
		}
		else {
			$this->session->set_flashdata('unsuccess', 'game can not deleted, Try Again');
			if($this->input->get_post('daily')) {
				redirect("game/dailyChallenge");
			}
			else {
				redirect("game");
			}
		}
	}	
	function saveGame() {
		if($game_id = $this->game_model->get_game_id()) {
			$this->session->set_flashdata('success', 'game saved successfully.');
			redirect('game/addPuzzle/?game_id='.$game_id.'&category_id='.$this->input->get_post('category'));
		}
		else {
			$this->session->set_flashdata('unsuccess', 'game can not saved, Try Again');
			redirect('game/add');
		}
	}
	function addAns() {		
		$response = $this->game_model->quest();
		echo $response;
		
		die;	
	}
	public function addPuzzle(){
		$data["results"] = $this->game_model->addPuzzle();
		$data["results"]['cat'] = $this->game_model->add($this->input->get_post('category_id'));
		$this->load->view("game/addPuzzle", $data);
	}
	public function getGameData() {
		$data = $this->game_model->getGameData();
		echo (json_encode($data));
		die;
	}
	function deleteBlock() {
		$quest_id = $this->input->get_post('quest_id');
		$game_id = $this->input->get_post('game_id');
		$category_id = $this->input->get_post('category');
		if($this->game_model->deleteBlock($game_id, $category_id, $quest_id)) {
			echo 1;
		}
		else {
			echo 0;
		}
	}
	function resetPuzzle() {
		$game_id = $this->input->get_post('game_id');
		if($this->game_model->resetGame($game_id)) {
			echo 1;
		}
		else {
			echo 0;
		}
	}
	function changeOrder() {
		$this->game_model->changeOrder();
		if($this->input->get_post('daily')) {
			redirect("game/dailyChallenge");
		}
		else {
			redirect("game");
		}
		
	}
	function dailyStatus() {
		$msg = ($chkStatus[0]['status']?('deactivate'):('activate'));
		if($this->game_model->dailyStatus($this->input->get_post('id'))) {
			$this->session->set_flashdata('success', 'game as daily'.$msg.' Successfully');
			redirect("game/dailyChallenge");
		}
		else {
			$this->session->set_flashdata('unsuccess', 'game as daily'.$msg.' Successfully');
			redirect("game/dailyChallenge");
		}
	}
}