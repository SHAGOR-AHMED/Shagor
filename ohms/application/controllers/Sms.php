<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("sms_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}

	public function index(){

		echo "SMS has been send Successfully.!!";
	}
	

	public function sms_configuration(){

		$data['title'] = "OHMS | SMS Configuration";
		$data['message'] = $this->session->flashdata('message');
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['smsConf'] = $this->sms_model->get_sms_configuration();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/sms_configuration_form');
		$this->load->view('backend/template_footer');
		
	}

	public function individual_sms(){

		$data['title'] = "OHMS | Send SMS by Individual";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/specific_sms_form');
		$this->load->view('backend/template_footer');
		
	}

	public function group_sms(){

		$data['title'] = "OHMS | Send SMS by Group";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/group_sms_form');
		$this->load->view('backend/template_footer');
		
	}

	public function save_configuration(){

		$id = $this->input->post('id');
		$data['sms_gateway'] = $this->input->post('sms_gateway');
		$data['sms_user_name'] = $this->input->post('sms_user_name');
		$data['sms_port'] = $this->input->post('sms_port');

		$result = $this->sms_model->update_config($id, $data);

		if($result){

			$msg = 'SMS Configuration has been updated successfully.!!';
			$message = $this->msg($msg);
			redirect('Sms/sms_configuration');

		}else{

			$msg = 'Failed to updated.!!';
			$message = $this->msg($msg);
			redirect('Sms/sms_configuration');

		}

	}//save_configuration

	public function display_mobile_no($val = null){

		$data = $this->db->select('mem_id,mobile')->from('tbl_members')->where('mem_id', $val)->get()->row();

        $MobileNo = $data->mobile;

        if ($data) {
            echo $MobileNo;
        } else {
            echo 0;
        }

	}//display_mobile_no

	public function send_sms(){

		$mobile = $this->input->post('mobile');
		$message = $this->input->post('message');
		$output = $this->sms_model->send_sms_model($mobile,$message);
		// echo $output;
		$msg = $output;
		$message = array('message' => $msg);
		$this->session->set_flashdata($message);
		//redirect('student');
		echo 1;

	}//send_sms

	public function preview_group_sms(){

		$receipent_id = $this->input->post('receipent_id');
		$this->sms_model->get_student_mobile($receipent_id);

	}//preview group sms

	public function save_group_sms(){
		if($this->input->post()){
			$groupSmsArr = $this->input->post();
			
			$output = $this->sms_model->save_all_groupSms($groupSmsArr);
			if($output){
				#message
				$msg = $output;
				$message = array('message' => $msg);
				$this->session->set_flashdata($message);
				#end Message
				redirect('Sms/group_sms');
			}
		}

	}//save_group_sms

	
}//CI_Controller

?>