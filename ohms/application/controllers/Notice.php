<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("notice_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}
	

	public function index(){

	}
	

	public function AddNotices(){

		$data['title'] = "OHMS | Add New Notice";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_notices');
		$this->load->view('backend/template_footer');
		
	}

	public function Notices(){

		$data['title'] = "OHMS | See All Notices";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$data['all_notices'] = $this->notice_model->get_all_notices();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_notices');
		$this->load->view('backend/template_footer');
		
	}

	public function save_notices(){

		$data['purpose_notice'] = $this->input->post('purpose_notice');
		$data['notices'] = $this->input->post('notices');  

		$result = $this->notice_model->commonInsert('tbl_notices',
				$data);

		if($result){

			$msg = 'Notices has been save successfully.!!';
			$message = $this->msg($msg);
			redirect('Notice/AddNotices');

		}else{

			$msg = 'Failed to Save Notice.!!';
			$message = $this->msg($msg);
			redirect('Notice/AddNotices');

		}

	}//save_notices

	public function edit_notice($NoticeID=''){

		$data['title'] = "OHMS | Edit Notices";
		$data['notices'] = $this->notice_model->get_notices_by_id($NoticeID);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_notices');
		$this->load->view('backend/template_footer');
	}

	public function update_notices(){

		$notice_id = $this->input->post('notice_id');
		$data['purpose_notice'] = $this->input->post('purpose_notice');
		$data['notices'] = $this->input->post('notices');  

		$result = $this->notice_model->save_update($notice_id,$data);

		if($result){

			$msg = 'Notices has been updated successfully.!!';
			$message = $this->msg($msg);
			redirect('Notice/Notices');

		}else{

			$msg = 'Failed to Update.!!';
			$message = $this->msg($msg);
			redirect('Notice/Notices');

		}
	}

	public function Inactive_notice($NoticeID=''){

		$result = $this->notice_model->inactive_notice($NoticeID);

		if($result){

			$msg = 'Notices has been Inactive.!!';
			$message = $this->msg($msg);
			redirect('Notice/Notices');

		}else{

			$msg = 'Failed to Inactive Notice.!!';
			$message = $this->msg($msg);
			redirect('Notice/Notices');

		}
	}

	public function Active_notice($NoticeID=''){

		$result = $this->notice_model->active_notice($NoticeID);

		if($result){

			$msg = 'Notices has been Active.!!';
			$message = $this->msg($msg);
			redirect('Notice/Notices');

		}else{

			$msg = 'Failed to Active Notice.!!';
			$message = $this->msg($msg);
			redirect('Notice/Notices');

		}
	}

	public function get_details(){

		$NoticeID = $this->input->post('id');
		$data['get_notices'] = $this->db->select('*')->from('tbl_notices')->where('notice_id', $NoticeID)->get()->row();
		$this->load->view('backend/notice_details', $data);

	}

	
}//CI_Controller

?>