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
			function login() {
				$username = $this->input->get_post('username');
				$password = $this->input->get_post('pass');
				if($username && $password){
					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('username', $username);
					$this->db->where('password',md5($password));
					$this->db->where('userType','member');
				}
				$query = $this->db->get();
				return $query->result_array();
			}
			function signup() {
				$data['username'] = $this->input->get_post('username');
				
				$data['password'] = md5($this->input->get_post('pass'));
				$data['backup_password'] = ($this->input->get_post('pass'));
				$data['email'] = $this->input->get_post('email');
				$data['fname'] = $this->input->get_post('fname');
				$data['lname'] = $this->input->get_post('lname');
				$data['mobile'] = $this->input->get_post('mobile');
				$data['gender'] = $this->input->get_post('gender')=="M"?1:0;
				$data['dob'] = date("Y-m-d",strtotime($this->input->get_post('dob')));
				$data['date_time'] = date("Y-m-d H:i:s");
				$data['userType'] = 'member';
				$data['status'] = 1;
				$data['last_online'] = date("Y-m-d H:i:s");
					if($this->db->insert('users',$data)) {
						return $this->db->insert_id();
					}
					else {
						return false;
					}
			}
			function addPoint($dt) {
				$old_point = $this->getData('users','point','id',$dt['user_id']);
				if($this->checkData('users','id',$dt['user_id']) && $dt['user_id']) {
					$this->db->where('id', $dt['user_id']);
					$this->db->set('point', $old_point+$dt['point']);
					$this->db->update('users');
					return true;
				
				}
				else {
					return false;
				}
			}
			function subtractPoint($dt) {
				$old_point = $this->getData('users','point','id',$dt['user_id']);
				if($this->checkData('users','id',$dt['user_id']) && $dt['user_id']) {
					$this->db->where('id', $dt['user_id']);
					$this->db->set('point', $old_point-$dt['point']);
					$this->db->update('users');
					return true;
				
				}
				else {
					return false;
				}
			}
			function forgot($email) {
				$data['password'] = $this->getData('users','backup_password','email',$email);
				$data['username'] = $this->getData('users','username','email',$email);
				$data['email'] = $email;
				if($this->sendMail($data)) {
					return true;
				}
				else {
					return false;
				}
				
			}
			function getData($table, $r, $f, $v) {
				$this->db->select('*');
				$this->db->from($table);
				$this->db->where($f, $v);
				$query = $this->db->get();
				$val = $query->row();
				return $val->$r;
					
			}
			function getData_all($table, $f, $v) {
				$this->db->select('*');
				$this->db->from($table);
				$this->db->where($f, $v);
				$query = $this->db->get();
				$val = $query->row();
				return $val;
					
			}
			function checkData($table, $f, $v) {
				$this->db->select('*');
				$this->db->from($table);
				$this->db->where($f, $v);
				$query = $this->db->get();
				if(count($query->result_array())) {
					return true;
				}
				else {
					return false;
				}
			}
			function sendMail($data){			
			
				$templateContent = '<table><tbody><tr><td><strong>Hi</strong></td></tr><tr><td style=\"\">\r\nYou have received this e-mail because you are register on Mile Find Game.</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"\">\r\n    </td>\r\n  </tr>\r\n  <tr>\r\n   <td align=\"\">\r\n    <p>\r\n    <strong>Username : </strong>'.$data['username'].'  <br />\r\n     <strong>Password : </strong>'.$data['password'].'</p>\r\n      </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n<p><strong>Thanks & Regards </strong>\r\n <br>Team Mile Find Game.</p>\r\n';
           
				$message=stripcslashes($templateContent);
			    $config['protocol'] = 'mail';
				$config['mailtype'] = 'html';
			    $this->load->library('email',$config);
				$this->email->from('sunil@valuesinfotech.com', 'Mine Find App');
				$this->email->to($data['email']);
				$this->email->subject('Forgot Password');
				$this->email->message($message);
				if($this->email->send()){
				   return true;
				}else{
				   return false;
		        }
		}
		/*##################################
		#### User Upgrade Planes ####
		########## ############
		###################################*/
		
		function upgrade() {
			$data['dogup_index'] = $this->input->get_post('dogup_index');
			$data['swordup_index'] =  $this->input->get_post('swordup_index');
			$data['shovelup_index'] =  $this->input->get_post('shovelup_index');
			$data['shieldup_index'] =  $this->input->get_post('shieldup_index');
			$this->db->where('id', $this->input->get_post('user_id'));
			if($this->db->update('users',$data)) {
				//echo $this->db->last_query();
				return true;
			}
			else {
				return false;
			}
		}
		
		/*##################################
		#### User Upgrade Planes ####
		########## ############
		###################################*/
		
		
		/*##################################
		#### User Update Planes ####
		########## ############
		###################################*/
		
		function Update() {
			$key = $this->input->get_post('key');
			$value =  $this->input->get_post('value');
			//$data[$key] =  {$key}. "+'". $value."'");
			//$data['shieldup_index'] =  $this->input->get_post('shieldup_index');
			$this->db->set($key, $key.'+'.$value, false);
			$this->db->where('id', $this->input->get_post('user_id'));
			if($this->db->update('users',$data)) {
				//echo $this->db->last_query();
				return true;
			}
			else {
				return false;
			}
		}
		
		
		/*##################################
		#### User Update Planes ####
		########## ############
		###################################*/
		
		/*##################################
		#### shield Update From Coin ####
		########## ############
		###################################*/
		
}
?>
