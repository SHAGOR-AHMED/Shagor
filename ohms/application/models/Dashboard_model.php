<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	//Function Or Method Construct
	public function __construct(){
		parent::__construct();
	}//Function
	
	//Function Or Method to Update/Edit Database
	public function notice_detail($id = ''){
		$query = "select * from `notice` where `id`='".$id."'";
		$result = $this->db->query($query);
		$noticeList = $result->result();
		return $noticeList;
	}//Function
	
	//Function Or Method to Update/Edit Database
	public function get_current_notice($limit=""){
		if($limit != ''){
			$limit = ' limit 0,'.$limit;			
		}
		$query = "select * from `tbl_notices` Order by notice_id DESC ".$limit;
		//$query = "select * from `tbl_notices` where curdate() between from_date and to_date Order by id DESC ".$limit;
		$result = $this->db->query($query);
		$noticeList = $result->result();
		return $noticeList;
	}//Function
	
}