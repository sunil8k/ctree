<?php

class Quest_model extends CI_Model {
	
/*##################################
#### Show user grid with paging ####
########## and dropdown ############
###################################*/
	
	function show() {
		$this->db->select('q.*,g.game,c.category');
		$this->db->from('game g');
		$this->db->join('categorys c', 'g.category_id = c.id');
		$this->db->join('quests q', 'q.game_id = g.id');
		$this->db->order_by('g.last_updated','desc');
		$query = $this->db->get();
		return $query->result();
	}
 
}

?>