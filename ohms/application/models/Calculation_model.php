<?php
class Calculation_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	

	public function get_all_amount(){

		$query = $this->db->select('*')->from('tbl_paid_payment')->join('tbl_members','tbl_members.mem_id = tbl_paid_payment.member_id')->join('tbl_payment','tbl_payment.member_id = tbl_paid_payment.member_id')->get()->result();
		return $query;

	}
	

}//End Calculation_model

?>