<?php

class Category_model extends CI_Model {
	
	/*##################################
	#### Show user grid with paging ####
	########## and dropdown ############
	###################################*/
	
	public $arr = Array();
	function show() {
		$query = $this->db->get('categorys');		
		if ($query->num_rows() > 0) {					
			foreach ($query->result() as $row){
			  $data[] = $row;
			}
			return $data;
		}
		return false;
	}
	function category($id=NULL) {		
		$this->db->select('*');
		$this->db->from('categorys');
		if($id)
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function category1($id=NULL) {		
		$this->db->select('*');
		$this->db->from('categorys');
		$this->db->where('id', $id?$id:0);
		$this->db->where('status', 1);
		$query = $this->db->get();
		$parent = $query->result();
		return $parent[0]->parent_id;
	}
	
	function categoryArray($parent_id) {
		$parent_id = $this->category1($parent_id);
		
		if($parent_id) {
			$this->arr[] = $parent_id;
			$this->categoryArray($parent_id);			 
		}
		else {
			return $this->arr;
		}
	}
	
	function addCategory() {
		$data['category'] = $this->db->get('categorys');	
		if ($query->num_rows() > 0) {					
			foreach ($query->result() as $row){
			  $data[] = $row;
			}
			return $data;
		}
		return false;
	}
	function editCategory($id) {
		$this->db->select('*');
			$this->db->from('categorys');
			$this->db->where('id', $id?$id:0);/*
			$this->db->where('leaf', 0);*/
			$query = $this->db->get();
			return $query->result();
	}
	function saveCategory() {
		$data['category'] = $this->input->get_post('category');
		$this->db->set($data);
		$this->db->insert('categorys',$data); 	
		return true;
	}
	function updateCategory() {
		
		$category_id = $this->input->get_post('category_id');
		$data['category'] = $this->input->get_post('category');
		$this->db->where('id',$category_id);
		$this->db->set($data);
		if($this->db->update('categorys',$data)) {			
			return true;
		}
		else {	
			return false;
		}
	}
			
			
			
	    /*##########################################
		 ########## Publice and Unpublish ##########
	     ###########################################*/
			function active()
			{
				
				$this->db->select('status');
				$this->db->from('categorys');
				$this->db->where('id', $_REQUEST['id']);
				$query = $this->db->get();
				$data9=$query->result_array();
				if($data9[0]['status']==0){
					$status=1;
					$data = array('status'=>$status);
					$this->db->where('id',$_REQUEST['id']);
					$this->db->update('categorys',$data);
				}else{
					$status=0;
					$data1 = array('status'=>$status);
					$this->db->where('id',$_REQUEST['id']);
					$this->db->update('categorys',$data1);	
				}
			}
			
			
			
		/*##########################################
		 ####### End publish and un publish ########
	     ###########################################*/
			
			
		/*##########################################
		 ############## Delete by id ###############
	     ###########################################*/
			function delete(){
				//$this->db->where('id',$_REQUEST['del']);
				//$this->db->delete('users');	
				$this->db->where('id',$this->input->get_post('del'));
				if($this->db->delete('categorys')) {	
					return true;
				}
				else {
					return false;	
				}
			}
		/*##########################################
		 ############## Delete by id ###############
	     ###########################################*/
			
			
}

?>