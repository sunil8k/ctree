<?php

class city_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
	function cityList() {
		$this->db->select('id,city,status');
		$this->db->from('citys');
		$this->db->where('country_id',$this->input->get_post('country_id'));
		if($this->input->get_post('search'))
		$this->db->like('city',$this->input->get_post('search'));
		$query = $this->db->get();		
		//echo $this->db->last_query();
		$data = $query->result();
		return $data;
	}
}
?>
