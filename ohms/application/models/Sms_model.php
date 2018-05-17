<?php
class Sms_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_sms_configuration(){

		$query = $this->db->select('*')->from('sms_configuration')->get()->row();
		return $query;		

	}

	public function update_config($id, $data){

		$query = $this->db->where('id', $id)->update('sms_configuration', $data);
		return $query;	

	}

	public function send_sms_model($mobile='',$message=''){
				
		$query = "select * from `sms_configuration` where `id`='1'";
		$result = $this->db->query($query);
		$smsConfList = $result->result();
		$sms_conf = $smsConfList[0];
		
		$sms_user = $sms_conf->sms_user_name;
		$sms_password = $sms_conf->sms_password;
		$sms_port = $sms_conf->sms_port;
		$sms_gateway = $sms_conf->sms_gateway;
		
		
		$xml = '<?xml version=\"1.0\";encoding=\"UTF-8\"?>'.
		'<request>'.
		'<authUser>'.$sms_user.'</authUser>'.
		'<authAccess>'.$sms_password.'</authAccess>'.
		'<destination>'.$mobile.'</destination>'.
		'<text>'.$message.'</text>'.
		'<requestId>10</requestId>'.
		'</request>';
		
		$url = $sms_conf->sms_gateway;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		return $output;

	}//send_sms_model

	public function get_student_mobile($receipent_id){

		$add_cond = "";
		
		$query = $this->db->query('SELECT count(*) as counter FROM tbl_members '.$add_cond.' ORDER BY mem_id ASC');

		$all_mobile = $query->result();
		if(!empty($all_mobile)){
			echo $all_mobile[0]->counter;
		}
	
	}//get student mobile no

	public function save_all_groupSms($groupSmsArr){

		$receipent_type = $groupSmsArr['receipent_type'];
		$message = $groupSmsArr['message'];
		
		$add_cond = "";
		$user_id = $this->session->userdata('user_id');
		
		$sql  = " INSERT INTO `group_sms`(`receipent_type`, `mobile`, `message`,`created_by`,`created_datetime`)
				 SELECT '$receipent_type', mobile,'$message','$user_id',now() FROM tbl_members $add_cond";
		$query = $this->db->query($sql);
		
		
		$sql_mobile = " SELECT mobile FROM tbl_members $add_cond";
		$query = $this->db->query($sql_mobile);
		$output = '';
		if(!empty($query->result())){
			foreach($query->result() as $mobiles){
				$output .= $this->send_sms_model($mobiles->mobile,$message);
			}
		}
		
		if($query){
			return $output;
		}
		return false;

	}//save_all_groupSms


}//End CI_Model
?>