<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("market_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}

	public function index(){

	}

	public function Add_market(){

		$data['title'] = "OHMS | Add New Record";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_market');
		$this->load->view('backend/template_footer');
		
	}

	public function Show_market(){

		$data['title'] = "OHMS | See All List";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['market_cost'] = $this->market_model->get_market_cost();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_market');
		$this->load->view('backend/template_footer');
		
	}

	public function save_market_cost(){

		$data['member_id'] = $this->input->post('member_id');
		$data['market_date'] = $this->input->post('market_date');
		$data['market_cost'] = $this->input->post('market_cost');

		$result = $this->market_model->commonInsert('tbl_market_cost', $data);

		if($result){

			$msg = 'Market cost has been save successfully.!!';
			$message = $this->msg($msg);
			redirect('Market/Add_market');

		}else{

			$msg = 'Failed to Save.!!';
			$message = $this->msg($msg);
			redirect('Market/Add_market');

		}

	}//save_market_cost

	
}//CI_Controller

?>