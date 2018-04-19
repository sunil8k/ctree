<?php

class City_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
	function cityAjax(){
		$this->db->select('city');
		$this->db->from('citys');
		$this->db->where('country_id',$this->input->get_post('country'));
		$this->db->like('city',$this->input->get_post('city'));
		$query = $this->db->get();
		return $query->result();
	}
}
?>
