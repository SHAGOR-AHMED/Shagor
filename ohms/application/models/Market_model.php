<?php
class Market_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function

	public function get_market_cost(){

		$query = $this->db->select('*')->from('tbl_market_cost')->join('tbl_members','tbl_members.mem_id=tbl_market_cost.member_id')->get()->result();
		return $query;	

	}

	
}//End CI_Model

?>