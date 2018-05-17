<?php
class Notice_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function


	public function get_all_notices(){

		$query = $this->db->select('*')->from('tbl_notices')->get()->result();
		return $query;	

	}

	public function get_notices_by_id($NoticeID){

		$query = $this->db->select('*')->from('tbl_notices')->where('notice_id', $NoticeID)->get()->row();
		return $query;		
	}

	public function save_update($notice_id,$data){

		$query = $this->db->where('notice_id', $notice_id)->update('tbl_notices', $data);
		return $query;	
	}

	public function inactive_notice($NoticeID){

		$query = $this->db->set('status', 0)->where('notice_id', $NoticeID)->update('tbl_notices');
		return $query;	
	}

	public function active_notice($NoticeID){

		$query = $this->db->set('status', 1)->where('notice_id', $NoticeID)->update('tbl_notices');
		return $query;	
	}
	

}//End CI_Model
?>