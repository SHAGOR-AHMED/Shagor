<?php
class Payment_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function


	public function get_all_payment(){

		$query = $this->db->select('*')->from('tbl_payment')->join('tbl_members','tbl_members.mem_id = tbl_payment.member_id')->get()->result();
		return $query;	

	}
	

}//End CI_Model
?>