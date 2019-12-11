<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function do_login(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$where = array(
			'User_Email' => $email,
			'User_Password' => $password
		);
		$data = $this->M_login->login("users",$where)->row();
		$cek = $this->M_login->login("users",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'User_Id' => $data->User_Id,
				'User_Name' => $data->User_Name,
				'User_Role' => $data->User_Role,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("HomeController"));
 
		}else{
			$this->session->set_flashdata('msg','Email Atau Password Salah');
			redirect(base_url('LoginController'));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('LoginController'));
	}
}
