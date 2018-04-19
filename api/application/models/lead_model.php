<?php

class Lead_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
	function section() {
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('id',$this->input->get_post('section'));
		$query = $this->db->get();		
		//echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			$data['sectionHtml'] = $query->result();
			$this->db->select('*');
			$this->db->from('categorys');
			$this->db->where('section_id',$data['sectionHtml'][0]->id);
			$this->db->where('parent',0);
			$q = $this->db->get();		
			//echo $this->db->last_query();
			if ($q->num_rows() > 0) {
				$data['results'] = $q->result();
				//print_r($data);die;
				return $data;
			}
		}
		return false;
	}	 
	function countryList() {
		$this->db->select('*');
		$this->db->from('countrys');
		$this->db->where('status',1);
		$query = $this->db->get();		
		//echo $this->db->last_query();
		$data = $query->result();
		return $data;
	}
	function fillState($id) {
		$this->db->select('*');
		$this->db->from('states');
		$this->db->where('status',1);
		$this->db->where('country_id',$id);
		$query = $this->db->get();		
		//echo $this->db->last_query();
		$data = $query->result();
		return $data;
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
}
?>
