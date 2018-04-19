<?php
class Permission_model extends CI_Model {
	
/*##################################
#### Show Sub Admin Permissions ####
########## ------------ ############
###################################*/
	
	function permission() {
		if($this->session->userdata('type')=="admin")
		return true;
		$act = $this->uri->segment(2)?$this->uri->segment(2):'index';
		$this->db->select('*');
		$this->db->from('permissions as perms');
		$this->db->join('modules as modl','modl.id = perms.module_id');
		$this->db->join('activitys as act','modl.id = act.module_id');
		$this->db->where('modl.module',$this->uri->segment(1));
		if($this->session->userdata('id'))
		$this->db->where('perms.admin_id',$this->session->userdata('id'));
		$this->db->where('act.activity',$act);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$res = $query->row_array();
		//print_r($res);die;
		$res['type']."_perm";//die;
		if(!$res[$res['type']."_perm"]){
		redirect("permission/accessDeny");
		}
		return true;
	}
	function getPermission() {
		$this->db->select('perms.*,modl.module');
		$this->db->from('permissions as perms');
		$this->db->join('modules as modl','modl.id = perms.module_id');
		$this->db->where('perms.admin_id',$this->input->get_post('id'));
		$query = $this->db->get();
		$results = $query->result();
		return $results;
	}
	function editPermission() {
		$status = $this->input->get_post('status')?0:1;
		if($this->input->get_post('col') == 'all_perm') {
			$this->db->set('show_perm',$status);
			$this->db->set('add_perm',$status);
			$this->db->set('edit_perm',$status);
			$this->db->set('delete_perm',$status);
			$this->db->set('all_perm',$status);
			$this->db->where('id',$this->input->get_post('id'));
			$this->db->update('permissions');
		}
		else {
			$this->db->set($this->input->get_post('col'),$status);
			$this->db->where('id',$this->input->get_post('id'));
			$this->db->update('permissions');
			
			$this->db->select('*');
			$this->db->from('permissions');
			$this->db->where('id',$this->input->get_post('id'));
			$query = $this->db->get();
			file_put_contents('perm.txt',$this->db->last_query());
			//echo $this->db->last_query();
			$results1 = $query->row();
			if($results1->show_perm && $results1->add_perm && $results1->edit_perm && $results1->delete_perm) {
				$this->db->set('all_perm',1);
				$this->db->where('id',$this->input->get_post('id'));
				$this->db->update('permissions');
			}
			else {				
				$this->db->set('all_perm',0);
				$this->db->where('id',$this->input->get_post('id'));
				$this->db->update('permissions');
			}
			
		}
		
		$this->db->select('perms.*,modl.module');
		$this->db->from('permissions as perms');
		$this->db->join('modules as modl','modl.id = perms.module_id');
		$this->db->where('perms.admin_id',$this->input->get_post('admin_id'));
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		return $results;
	}
}
?>