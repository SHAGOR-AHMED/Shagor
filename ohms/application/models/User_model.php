<?php
class User_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_users(){

		$query = $this->db->select('*')->from('user')->get()->result();
		return $query;		

	}

	public function user_edit($id = ''){

		$query = $this->db->select('*')->from('user')->where('id', $id)->get()->row();
		return $query;
	}

	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('id', $userID)->update('user');
		return $query;
	}

	public function Delete_User($UserId){

		$data = array('id'=>$UserId);
		$photo = $this->db->get_where('user',$data)->row();
		unlink($photo->photo);
		$result = $this->db->where('id',$UserId)->delete('user');
		return $result;
	}

//========================= Member ==========================//

	public function get_members(){

		$query = $this->db->select('*')->from('tbl_members')->get()->result();
		return $query;		
	}
    public function MembersDetails($MemID){

        $query = $this->db->select('*')->from('tbl_members')->where('mem_id',$MemID)->get()->row();
        return $query;
    }

	public function Select_Member_by_id($MemberId){

		$query = $this->db->select('*')->from('tbl_members')->where('mem_id', $MemberId)->get()->row();
		return $query;
	}

	public function Update_Member_by_id($member_id,$data){

		if(isset($member_id) && $member_id != ''){

			$data = array('mem_id' => $member_id);
			$prev_info = $this->db->get_where("tbl_members",$data)->row();

			if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
				unlink($prev_info->image);
			}
		}

		if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){

			$photo_name = $_FILES['photo']['name'];
		
			$config['upload_path'] = 'assets/backend/uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
			$config['max_size']	= 1024;
			$config['max_width'] = 2000;
			$config['max_height'] = 1000;
			$config['file_name'] = $photo_name;
			$config['overwrite'] = TRUE;

			//print_r($config);exit();

			$this->load->library('upload', $config);
			
			$path = $photo_name;
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if(empty($path) && empty($ext)){
				//$photo = e(post('photo'));
			}else{
				if ( ! $this->upload->do_upload('photo')){
					$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
					$dt['message'] = $status;
		            $this->session->set_userdata($dt);
		            redirect(current_url());
				}
				$data['photo'] = $config['upload_path'].$photo_name;
				//$this->db->set('image', $photo);
				
			}
		}

		//print_r($data);exit;

		$result = $this->db->where('mem_id',$member_id)->update('tbl_members', $data);
		return $result;

	}//Update_Member

	public function Delete_Member($MemberId){

		$data = array('mem_id'=>$MemberId);
		$photo = $this->db->get_where('tbl_members',$data)->row();
		unlink($photo->photo);
		$result = $this->db->where('mem_id',$MemberId)->delete('tbl_members');
		return true;
	}

//======================= End Member =======================//


	public function get_user_group(){
		$query = $this->db->get('user_group');
		$groupList = $query->result();
		$groups[0] = "-- Select Group --";
			foreach($groupList as $group){
				$groups[$group->id] = $group->name;
			}//Foreach
	
		$group_name = $groups;
		return $group_name;
	}//Function

	
	
	//Function or Method User check
	public function check_ajax_exists($id,$user_name,$email,$submit){
	
		$user_id = $this->session->userdata('user_id');
		$created_by = $updated_by = $user_id;
		$created_datetime = $updated_datetime = date("Y-m-d h:i:s");
		
		//query for user exists value check
		$query_user = "select id from `user` where `user_name`='$user_name' and id<>'$id'";
		$result_user = $this->db->query($query_user);
		if($result_user->num_rows > 0){
			echo '1';
		}
		
		$query_email = "select id from `user` where `email`='$email' and id<>'$id'";
		$query_email = $this->db->query($query_email);
		if($query_email->num_rows > 0){
			echo '3';
		}
		
	}//Function
	

}//End CI_Model
?>