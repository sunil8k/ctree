<?php

class Users_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
	function section() {
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('status',1);
		$query = $this->db->get();		
		$this->db->last_query();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
		
}
?>
