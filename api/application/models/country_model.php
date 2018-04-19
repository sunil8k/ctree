<?php

class country_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
	function countryList() {
		$this->db->select('id,country,country_code,status');
		$this->db->from('countrys');
		//$this->db->where('status',1);
		$query = $this->db->get();		
		//echo $this->db->last_query();
		$data = $query->result();
		return $data;
	}
}
?>
