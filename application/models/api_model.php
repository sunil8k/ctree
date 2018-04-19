<?php
class Api_model extends CI_Model {
	
	/*##################################
	####    Api Model Start Here    ####
	###################################*/
	function index() {
		return true; 
	}
	/*##################################
	####    MVR code start here     ####
	####    MSystem will use this   ####
	###################################*/
	function mvr() {
			/*GET ALL AGENT WHICH HAVE MORE THAN BRONZE AND ACTIVATE PLAN*/
			$this->db->select('a.id as agent_id, a.email, a.country_id');
			$this->db->from('agents a');
			$this->db->join('agent_plans ap','a.id = ap.agent_id');
			$this->db->where('ap.start_date <=',date("Y-m-d H:i:s"));
			$this->db->where('ap.exp_date >',date("Y-m-d H:i:s"));
			$this->db->where('a.status',1);
			$this->db->where('a.delete_status',0);
			$this->db->where('ap.status',1);
			$this->db->where('ap.plan !=','bronze');
			$query_agent = $this->db->get();
			//echo $this->db->last_query();//die;
			$agents = $query_agent->result();
			foreach($agents as $agent) {
				$this->shareLeadInfoToAgent($agent);
			}
			//print_r($agents);die;
			return true;	
	}	
	function shareLeadInfoToAgent($agent) {		
		/*LOAD AGENT MODEL START HERE*/
		$CI =& get_instance();
		$CI->load->model('agent_model');
		if($territories = $CI->agent_model->myTerritories($agent->agent_id)) {
			$agentTerritories = $territories['territories'];
		}
		/*LOAD AGENT MODEL END HERE*/
		$this->db->select('distinct(l.id) as lead_id,l.lead, l.country_id');
		$this->db->from('leads l');
		//$this->db->join('agent_lead_info ali','l.id = ali.lead_id','left outer');
		$this->db->where('l.create_date >=',date("Y-m-d H:i:s",mktime(date("H"),date('i'),date('s'),date("m"),date("d")-1,date("Y"))));
		$this->db->where('l.create_date <',date("Y-m-d H:i:s",mktime(date("H"),date('i'),date('s'),date("m"),date("d"),date("Y"))));
		$this->db->where('l.country_id',$agent->country_id);
		//$this->db->where('ali.agent_id != ',$agent->agent_id);
		$this->db->where_in('l.state_id',$agentTerritories);
		$query_lead = $this->db->get();
		//echo $this->db->last_query();die;
		if($query_lead->num_rows()) {
			$leads = $query_lead->result();
			$i = 0; $lead_name = '';
			foreach($leads as $lead) {
				if(!$this->checkAgentLeadInfo($agent->agent_id, $lead->lead_id)) {
					$data['agent_id'] = $agent->agent_id;
					$data['lead_id'] = $lead->lead_id;
					$data['open_date'] = date('Y-m-d H:i:s');
					if($this->db->insert('agent_lead_info',$data)) {
						$notification['user_id'] = $agent->agent_id;
						$notification['type_id'] = $this->db->insert_id();
						$notification['type'] = 'lead_info';
						$notification['message'] = 'You find a lead:'.($lead->lead);
						$notification['date_time'] = date('Y-m-d H:i:s');
						$notification['status'] = 0;
						if($this->db->insert('notifications',$notification)) {
							$i++;
							$lead_name .= $lead_name?", ".$lead->lead:$lead->lead;
						}
					}
				}
			}
		}
		if($i) {
			$subject = 'CompareTree Notifications!';
			$message .= '<table><tr><td><h3>Congratulation!</h3></td><td></td></tr>';
			$message .= '<tr><td>Please check you account on compareTree.</td><td></td></tr>';
			$message .= '<tr><td colspan=2>You get'.(($i)?(' '.$i):(' a')).' lead.</td></tr>';
			$message .= '<tr><td colspan=2>Your Leads: '.$lead_name.'.</td></tr>';
			$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
			$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
			//file_put_contents('share'.$i.'.txt',$agent->email.' '.$message);
			$this->send_mail($agent->email,$subject,$message);
			$subject = '';$message = ''; $i = 0; $lead_name = '';
		}
		return true;
	}
	//////////////MAIL SEND FUNCTION DEFINED HERE///////////////////
	function checkAgentLeadInfo($agent_id, $lead_id) {
		$this->db->select('id');
		$this->db->from('agent_lead_info');
		$this->db->where('agent_id',$agent_id);
		$this->db->where('lead_id',$lead_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->num_rows();
	}
	public function send_mail($to_email,$subject,$message) {
        $from_email = "info@testingoncloud.com";
        //Load email library
        $this->load->library('email');
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.testingoncloud.com';
		$config['smtp_user'] = 'info@testingoncloud.com';
		$config['smtp_pass'] = 'test@123!@#';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);

        $this->email->from($from_email, 'Compare Tree Portal');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        //Send mail
		file_put_contents('message.txt',$message);
        if($this->email->send()) {
			return true;
		}
        else {
			return false;
		}
    }
}
