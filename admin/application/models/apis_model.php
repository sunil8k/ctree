<?php

class Apis_model extends CI_Model {
	
	     /*##################################
		 #### Show user grid with paging ####
		 ########## and dropdown ############
	     ###################################*/
		 
			function level() {
				
				$this->db->select('*');
				$this->db->from('levels');				
				$this->db->where('level_status', 1);
				$query = $this->db->get();
				$i = 0;
				foreach($query->result_array() as $level) {
					$data[$i]['level_id'] = $level['id'];
					$data[$i]['level'] = $level['level'];
					$data[$i]['target'] = $level['target_point'];
					$data[$i]['lifecount'] = $level['live'];
					/*########## Fill the Level Data ############*/
					$this->db->select('b.id as block_id, s.*,b.*');
					$this->db->from('settings s');
					$this->db->join('blocks b','s.block_id = b.id');	
					//$this->db->order_by('b.block_name', 'ASC');				
					$this->db->where('s.level_id', $level['id']);
					$settings = $this->db->get();
					$k = 0;
					foreach($settings->result_array() as $setting) {
						/*$data[$i]['data'][$k]['block_id'] = $setting['block_id'];
						$data[$i]['data'][$k]['block_image'] = $setting['image']?($_SERVER['HTTP_HOST']."/game/".$setting['image']):("");*/
						$data[$i]['data'][$k]['block_name'] = $setting['block_name'];
						$data[$i]['data'][$k]['frequency'] = $setting['value'];
						$k++;
					}
					$i++;
					/*########## Fill the Level Data ############*/
				}
				return $data;
			} 
			
}
?>
