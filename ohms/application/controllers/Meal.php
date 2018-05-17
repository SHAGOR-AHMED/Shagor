<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meal extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("meal_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}
	

	public function index(){

	}

	//============================ Manage Meal ===========================================//
	
	public function Add_meal(){

		$data['title'] = "OHMS | Add New Record";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_meal');
		$this->load->view('backend/template_footer');
		
	}

	public function Show_meal(){

		$data['title'] = "OHMS | See All List";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['all_meal'] = $this->meal_model->get_meal();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_meal');
		$this->load->view('backend/template_footer');
		
	}

	public function save_meal(){

		$data['member_id'] = $this->input->post('member_id');
		$data['date'] = $this->input->post('date');
		$data['morning'] = $this->input->post('morning');
		$data['lunch'] = $this->input->post('lunch');
		$data['dinner'] = $this->input->post('dinner');
		$data['total'] = $data['morning']+$data['lunch']+$data['dinner'];

		$result = $this->meal_model->commonInsert('tbl_meal',$data);

		if($result){

			$msg = 'Meal has been save successfully';
			$message = $this->msg($msg);
			redirect('Meal/Add_meal');

		}else{

			$msg = 'Failed to Save';
			$message = $this->msg($msg);
			redirect('Meal/Add_meal');

		}

	}//save_meal

	public function ShowIndividualMeal(){

		$data['title'] = "OHMS | See Individual List";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/show_member_meal');
		$this->load->view('backend/template_footer');
	}
	
	
	public function show_member_meal(){

		$Memberid = $this->input->post('member_id');
						
		$data['Meal'] = $this->meal_model->member_meal_by_id($Memberid);
		$data['Total_Market'] = $this->db->select_sum('market_cost')->from('tbl_market_cost')->get()->row();
		$data['Total_Meal'] = $this->db->select_sum('total')->from('tbl_meal')->get()->row();
		$data['title'] = "OHMS | See Individual List";
		//$this->debug($data);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/show_member_meal');
		$this->load->view('backend/template_footer');
			
	}

	
}//CI_Controller

?>