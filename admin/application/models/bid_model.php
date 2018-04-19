<?php
class Bid_model extends CI_Model {	 
	function index() {
		$this->db->select('ld.id,ld.lead,ld.sku,ld.create_date,usr.first_name,usr.last_name,usr.email,usr.mobile,cat.category,sec.section,ld.status');
		$this->db->from('leads ld');
		$this->db->join('users usr','ld.customer_id = usr.id');
		$this->db->join('categorys cat','ld.category_id = cat.id');
		$this->db->join('sections sec','ld.section_id = sec.id');
		$this->db->where('usr.is_delete',0);
		$query = $this->db->get();
		//echo $this->db->last_query();		
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
	}
	function ajax(){
		$this->db->select("ld.id lead_id,ld.lead,ld.sku,ld.create_date as created, ld.status,usr.id as customer_id,CONCAT_WS( ' ',`usr`.`first_name`,`usr`.`last_name` ) as customer_name,usr.email,usr.mobile,cat.category,sec.section,lc.*");
		$this->db->from('leads ld');
		$this->db->join('users usr','ld.customer_id = usr.id');
		$this->db->join('categorys cat','ld.category_id = cat.id');
		$this->db->join('sections sec','ld.section_id = sec.id');
		$this->db->join('lead_contacts lc','lc.lead_id = ld.id');
		$this->db->where('ld.id',$this->input->get_post('id'));
		$query = $this->db->get();
		/*echo $ajax = $this->db->last_query();
		file_put_contents('ajax.txt',$ajax);die;*/
		$result['lead'] = $query->row();
		$this->db->select('*');
		$this->db->from('lead_details');
		$this->db->where('lead_id',$this->input->get_post('id'));
		$query = $this->db->get();
		$result['details'] = $query->result();
		return $result;
	}
	function edit() {
		if($this->input->get_post('id')){
			$userId = $this->input->get_post('id');
			$this->db->select('*');
			$this->db->from('agents');
			$this->db->where('id', $userId);
			$query = $this->db->get();
			return $query->row_array(); 
		}
		else {
			return false;
		}
	}
	function successBid() {
		$this->db->select('ali.amount, ali.id bid_id, ali.bid_date, l.id lead_id, l.lead, l.sku,a.id agent_id, a.first_name, a.last_name,  a.username, a.mobile, a.email, l.customer_id');
		$this->db->from('agent_lead_info ali');
		$this->db->join('agents a','ali.agent_id = a.id');
		$this->db->join('leads l','ali.lead_id = l.id');
		$this->db->where('ali.is_success',1);
		$query = $this->db->get();
		if($query->num_rows()){
			return $query->result();
		}
		else{
			return false;
		}
	}
	/*###################### activation end ##############*/
	function active() {
		$this->db->select('status');
		$this->db->from('leads');
		$this->db->where('id',$this->input->get_post('id'));
		$query = $this->db->get();
		$data=$query->result_array();
		$this->db->set('status',($data[0]['status']?0:1));
		$this->db->where('id',$this->input->get_post('id'));
		if($this->db->update('leads',$data2)){
			return true;
		}
		else{
			return false;
		}
	}
	/*###################### activation end ##############*/
	/*###################### Delete by id start ##############*/
	function delete(){
		$data['delete_status'] = 1;
		$this->db->where('id',$this->input->get_post('del'));
		$this->db->update('leads',$data);	
	}
	/*###################### Delete by id end ##############*/
}

?>