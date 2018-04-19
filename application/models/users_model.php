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
	function checkCustomer() {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$this->input->get_post('email'));
		$query = $this->db->get();	
		//echo $query->num_rows();die;	
		//$this->db->last_query();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			return $res[0]->id;
		}
		else {
			$pwd = rand(9999,999999);
			$data['first_name'] = $this->input->get_post('first_name');
			$data['last_name'] = $this->input->get_post('last_name');
			$data['email'] = $this->input->get_post('email');
			$data['username'] = $this->input->get_post('username');
			$data['password'] = md5($pwd);
			$data['password_text'] = $pwd;
			$data['mobile'] = $this->input->get_post('mobile');
			$data['dob'] = $this->input->get_post('dob');
			$data['gender'] = $this->input->get_post('gender');
			$data['marital'] = $this->input->get_post('marital');
			$data['address'] = $this->input->get_post('address');
			$data['country_id'] = $this->input->get_post('country');
			$data['state_id'] = $this->input->get_post('state');
			$data['city_id'] = $this->getCity($this->input->get_post('city'),$data['country_id']);
			$data['zipcode'] = $this->input->get_post('zip');
			$data['create_date'] = date('Y-m_d H:i:s');
			$data['last_update'] = date('Y-m_d H:i:s');
			$data['status'] = 1;
			if($this->db->insert('users',$data)) {
				$subject = 'CompareTree Registeration Information!';
				$message .= '<table><tr><td><h3>Congratulation!</h3></td><td></td></tr>';
				$message .= '<tr><td>You are successfully registered.</td><td></td></tr>';
				$message .= '<tr><td colspan=2>You registerd as Seekers(want a agent).</td></tr>';
				$message .= '<tr><td>Name:</td><td>'.$data['first_name'].' '.$data['last_name'] .'</td></tr>';
				$message .= '<tr><td>Username:</td><td>'.$data['username'].'</td></tr>';
				$message .= '<tr><td>Email:</td><td>'.$data['email'].'</td></tr>';
				$message .= '<tr><td>Password:</td><td>'.$pwd.'</td></tr>';
				$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
				$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
				file_put_contents('message2.txt',$message);
				$this->send_mail($this->input->get_post('email'),$subject,$message);
				return $this->db->insert_id();
			}
			else {
				return false;
			}
		}
	}
	
	function getCity($city,$country) {
		$this->db->select('id');
		$this->db->from('citys');
		$this->db->where('city', $city);
		$this->db->where('country_id', $country);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row();
		//print_r($result);
		return $result->id;
	}
	function forgot() {
		$this->db->select('email,first_name,last_name,username,password_text password');
		$table = ($this->input->get_post('type') == 'seeker')?('users'):('agents');
		$this->db->from($table);
		$this->db->where('email', $this->input->get_post('email'));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		if($query->num_rows()) {
			$data = $query->row();
			$subject = 'CompareTree Forgot Password!';
			$message .= '<table><tr><td><h3>Recovery Credentials!</h3></td><td></td></tr>';
			$message .= '<tr><td></td><td></td></tr>';
			$message .= '<tr><td colspan=2>You registerd as '.$this->input->get_post('type').'.</td></tr>';
			$message .= '<tr><td>Name:</td><td>'.$data->first_name.' '.$data->last_name .'</td></tr>';
			$message .= '<tr><td>Username:</td><td>'.$data->username.'</td></tr>';
			$message .= '<tr><td>Email:</td><td>'.$data->email.'</td></tr>';
			$message .= '<tr><td>Password:</td><td>'.$data->password.'</td></tr>';
			$message .= '<tr><td colspan=2><h4>Thanks & Regards</h4></td></tr>';
			$message .= '<tr><td colspan=2>Team CompareTree.</td></tr></table>';
			if($this->send_mail($this->input->get_post('email'),$subject,$message)) {
				return 1;
			}
			else {
				return false;
			}
		}
		else {
				return 2;
		}
	}
//////////////MAIL SEND FUNCTION DEFINED HERE///////////////////
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

        $this->email->from($from_email, 'Compare Tree Site');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
		file_put_contents('message.txt',$message);

        //Send mail
        if($this->email->send()) {
			return true;
		}
        else {
			return false;
		}
    }	
}
?>
