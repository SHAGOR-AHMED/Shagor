<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calculation extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("calculation_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}
	

	public function index(){

		$data['title'] = "Show All Calculation";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['all_amount'] = $this->calculation_model->get_all_amount();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_calculation');
		$this->load->view('backend/template_footer');

	}

	
}//CI_Controller

?>