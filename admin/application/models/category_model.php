<?php

class Category_model extends CI_Model {
	
	public $arr = Array();
	public $str = '';
	function show() {
		$this->db->select('c.*,s.section');
		$this->db->from('categorys c');
		$this->db->join('sections s','s.id = c.section_id');
		$this->db->order_by('s.section','desc');
		$query = $this->db->get();		
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
		//echo $this->db->last_query();
		return $query->result();
	}
	function category_ed($id=NULL) {		
		$this->db->select('*');
		$this->db->from('categorys');
		if($id)
		$this->db->where('parent', $id);
		else
		$this->db->where('parent', 0);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	function parentCategory($id=NULL) {		
		$this->db->select('*');
		$this->db->from('categorys');
		if($id)
		$this->db->where('parent', $id);
		else
		$this->db->where('parent', 0);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	function sectionCategory($id=NULL) {		
		$this->db->select('*');
		$this->db->from('categorys');
		$this->db->where('section_id', $id);
		$this->db->where('parent', 0);
		$query = $this->db->get();
		file_put_contents('cat1.txt',$this->db->last_query());
		//echo $this->db->last_query();die;
		return $query->result();
	}
	function reccurChildCat($id,$data) {
		$this->db->select('id,parent');
		$this->db->from('categorys');
		$this->db->where('id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		//echo "%R".count($results)."R%";
		if(count($results)) {
			if($results[0]->parent) {
				$this->str .= ",".$results[0]->parent;
				$results[0]->parent_cat = $this->reccurChildCat($results[0]->parent,$data);
			}
			else {
			}
		}
	}
	function getChildCategory($id) {
		$data = array();
		$this->db->select('*');
		$this->db->from('categorys');
		$this->db->where('id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		if(count($results)) {
			if($results[0]->parent) {
				$this->str .= $results[0]->parent;
				$this->reccurChildCat($results[0]->parent,$data);
				return array_reverse (explode(",",$this->str));
			}	
		}
		else {
			return 'ok';
		}
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
		$dt = $this->input->get_post('parent');
		$nm = (count($dt) - 1);
		$data['parent'] = $dt[$nm]?$dt[$nm]:0;
		$data['category'] = $this->input->get_post('category');
		$data['section_id'] = $this->input->get_post('section');
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
	/*######## Publice and Unpublish ##########*/
	function active() {
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
		}
		else{
			$status=0;
			$data1 = array('status'=>$status);
			$this->db->where('id',$_REQUEST['id']);
			$this->db->update('categorys',$data1);	
		}
	}
	/*###### End publish and un publish #######*/
	/*####### Delete by id ####################*/
	function delete(){	
		$this->db->where('id',$this->input->get_post('del'));
		if($this->db->delete('categorys')) {	
			return true;
		}
		else {
			return false;	
		}
	}
	/*############ Delete by id ###############*/
}

?>