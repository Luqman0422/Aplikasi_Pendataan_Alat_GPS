<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_dashboard');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("LoginController"));
		}
	}

	public function index()
	{
		$gps = $this->M_dashboard->get_GPS("gps");
		$user = $this->M_dashboard->get_users("users");
		$data = array(
			'gps' => $gps,
			'users' => $user,
			'nav' => "Dashboard",
			'user' => $this->M_user->getById($this->session->userdata('User_Id'))
		);
		$this->load->view('home',$data);
	}
}
