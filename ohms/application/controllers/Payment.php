<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("payment_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}

	public function index(){

	}
	

	//====================== Payment ==============================================//

	public function Add_payment(){

		$data['title'] = "OHMS | Add Payment";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_payment');
		$this->load->view('backend/template_footer');
		
	}

	public function ShowPaymentHistory(){

		$data['title'] = "OHMS | Show Payment Recor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['all_payment'] = $this->payment_model->get_all_payment();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_payment');
		$this->load->view('backend/template_footer');
		
	}

	public function save_payment(){

		$data['member_id'] = $this->input->post('member_id');
		$data['payment_date'] = $this->input->post('payment_date');
		$data['seat_rent'] = $this->input->post('seat_rent');
		$data['meal_cost'] = $this->input->post('meal_cost');
		$data['other_cost'] = $this->input->post('other_cost');
		$data['total_payment'] = $data['seat_rent']+$data['meal_cost']+$data['other_cost'];

	    $payment_for = $this->input->post('payment_for');
    	$data['payment_for'] = implode(",", $payment_for);

		$result = $this->payment_model->commonInsert('tbl_payment',$data);

		if($result){

			$msg = 'Payment has been save successfully.!!';
			$message = $this->msg($msg);
			redirect('Payment/Add_payment');

		}else{

			$msg = 'Failed to Save Payment.!!';
			$message = $this->msg($msg);
			redirect('Payment/Add_payment');

		}

	}//save_payment

	public function Payment_form(){

		$data['title'] = "OHMS | Payment Form";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/payment_form');
		$this->load->view('backend/template_footer');
	}

	public function save_member_payment(){

		$data['member_id'] = $this->input->post('member_id');
		$data['payment_date'] = $this->input->post('payment_date');
		$data['amount'] = $this->input->post('amount');

	    $payment_for = $this->input->post('payment_for');
    	$data['payment_for'] = implode(",", $payment_for);
    	$data['payment_method'] = $this->input->post('payment_method');

		$result = $this->payment_model->commonInsert('tbl_paid_payment',$data);

		if($result){

			$msg = 'Payment has been save successfully.!!';
			$message = $this->msg($msg);
			redirect('Payment/Payment_form');

		}else{

			$msg = 'Failed to Save Payment.!!';
			$message = $this->msg($msg);
			redirect('Payment/Payment_form');

		}

	}//save_member_payment

	
}//CI_Controller

?>