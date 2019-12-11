<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("LoginController"));
		}

		if($this->session->userdata('User_Role') != "user"){
			redirect(base_url("LoginController"));
		}
	}

	function index()
	{
		$data["nav"] = "Profile";
		$data["user"] = $this->M_user->getById($this->session->userdata('User_Id'));
		$this->load->view('profile', $data);
	}

	public function edit_profile($id = null)
    {
        $post = $this->input->post(); 
        $data["User_Id"] = $post["User_Id"];
        $data["User_Name"] = $post["User_Name"];
        $data["User_Address"] = $post["User_Address"];
        $data["User_Email"] = $post["User_Email"];
        $data["User_Sex"] = $post["User_Sex"];
        $data["User_Birthday"] = $post["User_Birthday"];
        if (!empty($_FILES["User_Photo"]["name"])) {
            $data["User_Photo"] = $this->M_user->uploadImage();
        } else {
            $data["User_Photo"]  = $post["Old_Photo"];
        }

        $dataUser = $this->M_user->getById($id);
         
        $emailWhereIn = $this->M_user->emailWhereIN($data["User_Email"])->num_rows();
        if ($emailWhereIn > 0 && $data["User_Email"] != $dataUser->User_Email) {
            $this->session->set_flashdata('failed', 'Email is being used by another user');      
    		redirect('ProfileController');
        } else {
            $this->M_user->edit_profile($id, $data);      
            $this->session->set_flashdata('success', 'Save Successfully');      
    		redirect('ProfileController');
        }        

    }
	

	public function change_password($id = null)
    {
        $password_lama 			= $this->input->post('Current_Password');
		$password_baru  		= $this->input->post('New_Password');
		$password_konfirmasi	= $this->input->post('Confirmation_New_Password');

		$detail = $this->M_user->getById($id);

		if (md5($password_lama) != $detail->User_Password) {
			$this->session->set_flashdata('failed', 'Old Password is Wrong!!');      
			redirect('ProfileController');
		} else if ($password_baru != $password_konfirmasi) {
			$this->session->set_flashdata('failed', 'Confirmation Password is Wrong!');      
			redirect('ProfileController');
		} else {	
			$data = array (
				'User_Password' => md5($password_konfirmasi)
			);
			$this->M_user->changePass($id, $data);
			$this->session->set_flashdata('success', 'Change Password Successfully');      
			redirect('ProfileController');
		}
	}
}
