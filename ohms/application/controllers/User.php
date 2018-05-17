<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("user_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "OHMS | All User list";
		$data['users'] = $this->user_model->get_users();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_view');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "OHMS | Add New User";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_form');
		$this->load->view('backend/template_footer');
		
	}
	
	public function edit($id=''){
		
		$data['title'] = "OHMS | Edit User";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['user'] = $this->user_model->user_edit($id);	
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_edit');
		$this->load->view('backend/template_footer');
			
	}
	

	public function save_user(){

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'required|max_length[11]'); 
		$this->form_validation->set_rules('address', 'Address', 'required'); 

		if($this->form_validation->run() == FALSE){

			$this->load->view('backend/template_header');
			$this->load->view('backend/template_left');
			$this->load->view('backend/user_form');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['user_name'] = $this->input->post('user_name');
			$data['password'] = md5($this->input->post('password'));
			$data['email'] = $this->input->post('email');
			$data['contact'] = $this->input->post('contact');
			$data['address'] = $this->input->post('address');
			$data['created_datetime'] = date("Y-m-d h:i:s");

			$data['photo'] = $this->uploadPhoto();

			$result = $this->user_model->commonInsert('user',$data);
			if($result){
				$msg = $data['first_name'].' has been created successfully';
				$message = $this->msg($msg);
				redirect('user/index');
			}else{
				$msg = $data['first_name'].' Failed to Add User!!';
				$message = $this->msg($msg);
				redirect('user/index');
			}
			
		}//if
		
	}//save_user

	public function update_user(){

		$UserID = $this->input->post('id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$user_name = $this->input->post('user_name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');

		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('user_name', $user_name);
		$this->db->set('email', $email);
		$this->db->set('contact', $contact);
		$this->db->set('address', $address);

		if(isset($UserID) && $UserID != ''){

			$data = array('id' => $UserID);
			$prev_info = $this->db->get_where("user",$data)->row();
			if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
				unlink($prev_info->photo);
			}
		}

		if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){

			$photo = $this->updatePhoto();
		}

		$result = $this->user_model->commonUpdate($UserID, 'user');

		if($result){
			$msg = $first_name.' has been updated successfully';
			$message = $this->msg($msg);
			redirect('user/index');

		}else{
			$msg = $first_name.' Failed to update!!';
			$message = $this->msg($msg);
			redirect('user/index');

		}
			
	}//update_user

    public function DeleteUser($UserId=''){

		$result = $this->user_model->Delete_User($UserId);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('user/index');
		}
	}
	

//======================= Manage Member ===============================//

	public function ManageMember(){

		$data['message'] = array();
		$data['title'] = "OHMS | All Member List";
		$data['members'] = $this->user_model->get_members();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/member_view');
		$this->load->view('backend/template_footer');
	}

	public function ViewMemberDetails(){

        $MemID = $this->input->post('id');

        $data['MemberDesc'] = $this->user_model->MembersDetails($MemID);

        $this->load->view('backend/member_detail', $data);

	}

	public function create_member(){

		$data['title'] = "OHMS | Add New Member";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_member');
		$this->load->view('backend/template_footer');
		
	}

	public function save_member(){

		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['user_name'] = $this->input->post('user_name');
		$data['mobile'] = $this->input->post('mobile');
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		$data['address'] = $this->input->post('address');

		$data['father_name'] = $this->input->post('father_name');
		$data['mother_name'] = $this->input->post('mother_name');
		$data['gardian_name'] = $this->input->post('gardian_name');
		$data['gardian_contact'] = $this->input->post('gardian_contact');
		$data['gardian_email'] = $this->input->post('gardian_email');
		$data['relation_with_gardian'] = $this->input->post('relation_with_gardian');

		$data['created_datetime'] = date("Y-m-d h:i:s");

		//$this->debug($data);

		// start form validation

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[11]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');

		$this->form_validation->set_rules('father_name', 'First Name', 'required');
		$this->form_validation->set_rules('mother_name', 'Last Name', 'required');
		$this->form_validation->set_rules('gardian_name', 'Last Name', 'required');
		$this->form_validation->set_rules('gardian_contact', 'Mobile', 'required|max_length[11]');
		$this->form_validation->set_rules('gardian_email', 'Email', 'required|valid_email');

		if($this->form_validation->run() == FALSE){

			$this->load->view('backend/template_header');
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_member');
			$this->load->view('backend/template_footer');
			return false;

		}else{
		 
			$data['photo'] = $this->uploadPhoto();

			$result = $this->user_model->commonInsert('tbl_members',
				$data);

			if($result){

				$msg = $first_name.' has been created successfully';
				$message = array('message' => $msg);
				$this->session->set_flashdata($message);
				redirect('user/create_member');

			}else{

				$msg = 'Failed to add member';
				$message = array('message' => $msg);
				$this->session->set_flashdata($message);
				redirect('user/create_member');

			}

		}//if

	}//save_member

	public function Edit_Member($MemberId=''){

		$data['title'] = "OHMS | Edit Member";	
		$data['notices'] = $this->dashboard_model->get_current_notice();			
		$data['Member_List'] = $this->user_model->Select_Member_by_id($MemberId);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_member');
		$this->load->view('backend/template_footer');
			
	}

	public function Update_Member(){

		$member_id = $this->input->post('id');
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['user_name'] = $this->input->post('user_name');
		$data['mobile'] = $this->input->post('mobile');
		$data['email'] = $this->input->post('email');
		//$data['password'] = md5($this->input->post('password'));
		$data['address'] = $this->input->post('address');

		$data['father_name'] = $this->input->post('father_name');
		$data['mother_name'] = $this->input->post('mother_name');
		$data['gardian_name'] = $this->input->post('gardian_name');
		$data['gardian_contact'] = $this->input->post('gardian_contact');
		$data['gardian_email'] = $this->input->post('gardian_email');
		$data['relation_with_gardian'] = $this->input->post('relation_with_gardian');

		//$this->debug($data);

		$result = $this->user_model->Update_Member_by_id($member_id,$data);
		if($result){
			$message = 'Update Successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');	
		}else{
			$message = 'Failed to Update';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');
		}

	}//Update_Member

	public function DeleteMember($MemberId=''){

		$result = $this->user_model->Delete_Member($MemberId);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');
		}
	}

	
//========================= Gurdian Information ============================//

	public function GurdianInformation(){

		$this->load->view('backend/template_header');
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_gurdian');
		$this->load->view('backend/template_footer');
		
	}

//========================= //Gurdian Information ============================//

	public function change_password($userID=''){

		$data['user_id'] =  $userID;
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header');
		$this->load->view('backend/template_left');
		$this->load->view('backend/password_change',$data);
		$this->load->view('backend/template_footer');
	}

	public function password_change(){
		
		$userID = $this->input->post('id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));

    	$pre_info = $this->db->select('*')->from('user')->where('id', $userID)->get()->row();

    	$pre_pass = $pre_info->password;

  		if($pre_pass == $old_pass){

			$result = $this->user_model->update_password($userID,$new_pass);

			if($result){

				$this->session->sess_destroy();
		        $msg = 'Password Updated Successfully ! Login Again.!';	
				$message = $this->msg($msg);
		        redirect("login");

			}else{

				$msg = "Fail to update password.!!!";
				$message = $this->msg($msg);
				redirect('user/change_password/'.$userID);
			}

  		}else{

			$msg = "Old Password doesn't Match.!!!";
			$message = $this->msg($msg);
			redirect('user/change_password/'.$userID);
  			
  		}
		
	
	}//Function


	public function do_logout(){

    	$this->session->sess_destroy();
        $msg = 'You have Logged Out!';	
		$message = array('message' => $msg);
		$this->session->set_flashdata($message);
        redirect("login");
    }

	
}//CI_Controller

?>