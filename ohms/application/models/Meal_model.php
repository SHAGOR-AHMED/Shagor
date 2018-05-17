<?php
class Meal_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_meal(){

		$query = $this->db->select('*')->from('tbl_meal')->join('tbl_members','tbl_members.mem_id=tbl_meal.member_id')->get()->result();
		return $query;	

	}

	public function member_meal_by_id($Memberid){

		//$query = $this->db->select('*')->from('tbl_meal')->where('member_id', $Memberid)->get()->result();
		$query = $this->db->select('*')->select_sum('total')->from('tbl_meal')->join('tbl_members', 'tbl_members.mem_id = member_id')->where('member_id', $Memberid)->get()->result();
		return $query;

	}

	
}//End CI_Model

?>