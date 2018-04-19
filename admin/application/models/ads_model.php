<?php
class Ads_model extends CI_Model {
	
/*##################################
#### Show user grid with paging ####
########## and dropdown ############
###################################*/
	
	function show() {
		$this->db->select('*');
		$this->db->from('ads');
		$query = $this->db->get();
		return $query->result();
	}
	function save() {			
		if($_FILES['ads']['name']){
			$adsFile =  $_FILES['ads']['name'];
			if(!is_dir('assets/ads'))      
			mkdir('assets/ads');
			$FileName= rand()."_".$adsFile;
			if(move_uploaded_file($_FILES['ads']['tmp_name'],'assets/ads/'.$FileName)) {
				$data['url'] = "http://".$_SERVER['HTTP_HOST'].'/crosswords/admin/assets/ads/'.$FileName;
			}
		}
		$title = $this->input->post('title'); 
		if($title){
			$data['title'] = $title;
		}
		$url = $this->input->post('url'); 
		if($url){
			$data['url'] = $url;
		}
		$this->db->set($data);
		if($this->db->insert('ads',$data)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function delete($id){
		$this->db->where('id',$id);
		$res = $this->db->delete('ads');
		return true;
	}
/*
##############################
######## End User grid #########
######### and dropdown #########
###############################*/
	function ajax(){		
		$this->db->select('*');
		$this->db->from('ads');
		$this->db->where('id', $this->input->get_post('id'));
		$query = $this->db->get();
		return $query->result_array(); 
	}
	function active(){	
		$id = $this->input->get_post('id');
		$status = $this->checkStatus($id);
		$data['status'] = ($status[0]['status']?0:1);
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('ads');
		return true;
	}
	function checkStatus($id) {
		$this->db->select('status');
		$this->db->from('ads');
		$this->db->where('id', $id);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
 
}

?>