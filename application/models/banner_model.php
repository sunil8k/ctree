<?php
class Banner_model extends CI_Model {
	
	function index() {
		return true; 
	}
	/*##################################
	####                            ####
	###################################*/
	function myBanner() {
			/*GET ALL AGENT WHICH HAVE MORE THAN BRONZE AND ACTIVATE PLAN*/
			$this->db->select('*');
			$this->db->from('banners');
			$this->db->where('agent_id',$this->session->userdata('agent_id'));
			$query_agent = $this->db->get();
			//echo $this->db->last_query();//die;
			$data['banner'] = $query_agent->result();
			return $data;
	}
	function save() {
		/*GET ALL AGENT WHICH HAVE MORE THAN BRONZE AND ACTIVATE PLAN*/		
		$agentId = $data['agent_id'] = $this->session->userdata('agent_id');
		$data['banner'] = $this->input->get_post('banner');
		$data['status'] = $this->input->get_post('status');
		
		if($_FILES['bannerImg']['name']!=""){
			/*$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id',$userId);
			$query = $this->db->get();
			$imageName = $query->row_array();
			
			if($imageName['image']){
				unlink('../'.$imageName['image']);
			}*/
			$banner =  $_FILES['bannerImg']['name'];
			$createFolder = 'banners/'.$agentId;
			$ext=pathinfo($banner);
			$FileName='Agent_'.$agentId.'_'.rand().".".$ext['extension'];
			if(!is_dir($createFolder))      
			mkdir($createFolder);
			$config['upload_path'] = $createFolder;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['max_width']  = '3000';
			$config['max_height']  = '2000';
			$this->load->library('upload', $config);
			$_FILES['bannerImg']['name']=$FileName;
			$this->upload->do_upload('bannerImg');
			$file_name=$this->upload->data();
			
			$data['url'] = base_url().'banners/'.$agentId."/".$file_name['file_name'];
			
			//////////////////////
			try {
				$this->generateThumbnail('http://localhost'.$data['url'], 100, 50, 65);
			}
			catch (ImagickException $e) {
				echo $e->getMessage().'imagic';
			}
			catch (Exception $e) {
				echo $e->getMessage().'image';
			}
			//////////////////////
			$this->db->insert('banners',$data);
			die;
			return $data;
		}
		else {
			return false;	
		}
	}
	function update() {
		/*GET ALL AGENT WHICH HAVE MORE THAN BRONZE AND ACTIVATE PLAN*/	
		if($this->input->get_post('banner_id')) {	
			$agentId = $data['agent_id'] = $this->session->userdata('agent_id');
			if($this->input->get_post('banner'))
			$data['banner'] = $this->input->get_post('banner');
			if($this->input->get_post('status'))
			$data['status'] = $this->input->get_post('status');
			if($_FILES['bannerImg']['name']!=""){
				$this->db->select('*');
				$this->db->from('banners');
				$this->db->where('agent_id',$agentId);
				$this->db->where('id',$this->input->get_post('banner_id'));
				$query = $this->db->get();
				$bannerData = $query->row();
				
				if($imageName['image']){
					unlink('../'.$bannerData->url);
				}
				$banner =  $_FILES['bannerImg']['name'];
				$createFolder = 'banners/'.$agentId;
				$ext=pathinfo($banner);
				$FileName='Agent_'.$agentId.'_'.rand().".".$ext['extension'];
				if(!is_dir($createFolder))      
				mkdir($createFolder);
				$config['upload_path'] = $createFolder;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '3000';
				$config['max_height']  = '2000';
				$this->load->library('upload', $config);
				$_FILES['banner']['name']=$FileName;
				$this->upload->do_upload('bannerImg');
				$file_name=$this->upload->data();
				
				$data['url'] = base_url().'banners/'.$agentId."/".$file_name['file_name'];
				$this->db->set($data);
				$this->db->where('id',$this->input->get_post('banner_id'));
				$this->db->update('banners',$data);
				return true;
			}
			else {
				$this->db->set($data);
				$this->db->where('id',$this->input->get_post('banner_id'));
				$this->db->where('agent_id',$agentId);
				$this->db->update('banners',$data);
				return true;	
			}
		}
		else {
			return false;
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////
	/////////////////////iMAGICK FUNCTION FOR CREATE THUMB IMAGE//////////////////////////	
	function generateThumbnail($img, $width, $height, $quality = 90) {
		if (is_file($img)) {
			echo realpath($img);die;
			$imagick = new Imagick(realpath($img));
			$imagick->setImageFormat('jpeg');
			$imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
			$imagick->setImageCompressionQuality($quality);
			$imagick->thumbnailImage($width, $height, false, false);
			$filename_no_ext = reset(explode('.', $img));
			if (file_put_contents('banners/thumb/'.$filename_no_ext . '.jpg', $imagick) === false) {
				throw new Exception("Could not put contents.");
			}
			return true;
		}
		else {
			throw new Exception("No valid image provided with {$img}.");
		}
	}
}