<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->model("login_model");
    }
    
	public function index($msg= ''){

        $data['msg']=$msg;
		$this->load->view('backend/login',$data);
    }
    
    public function process(){

        $login_type = $this->input->post('login_type');
        $user_name = $this->input->post('user_name');
        $passwords = $this->input->post('password');
        $password = md5($passwords);

        if($login_type == 1){

            $result = $this->login_model->validate($user_name,$password);

            if(! $result){

                $msg = '<font color=red>Invalid Username/Password.</font><br />';
                $this->index($msg);

            }else{

                $data = array(
                    'login_type' => $login_type,
                    'user_id' => $result->id,
                    'user_name' => $result->user_name,
                    'photo' => $result->photo
                    );
                $this->session->set_userdata($data);
                redirect('dashboard');
            }

        }elseif($login_type == 2){

            $result = $this->login_model->check_member_login($user_name,$password);

            if(! $result){

                $msg = '<font color=red>Invalid Username/Password.</font><br />';
                $this->index($msg);

            }else{

                $data = array(
                    'login_type' => $login_type,
                    'user_id' => $result->mem_id,
                    'user_name' => $result->user_name,
                    'photo' => $result->photo
                    );
                $this->session->set_userdata($data);
                redirect('dashboard/member_dashboard');
            }

        }

    }
	
	//checking login
	function is_logged_in(){
		$this->session->userdata('is_logged_in');
		if(is_logged_in == true){
			redirect('dashboard');
		}
    }
	
}//Login
?>