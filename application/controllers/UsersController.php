<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
        $this->load->library('form_validation');
		$this->load->library('pagination');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("LoginController"));
        }
        
        if($this->session->userdata('User_Role') != "admin"){
			redirect(base_url("LoginController"));
		}
	}

	function index()
	{
        //konfigurasi pagination
        $config['base_url'] = site_url('UsersController/index'); //site url
        $config['total_rows'] = $this->M_user->jumlah_data(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
		$data["nav"] = "User";
		$data["users"] = $this->M_user->getAll($config["per_page"], $data['page']);
		$data["user"] = $this->M_user->getById($this->session->userdata('User_Id'));
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('users', $data);
	}

	public function add()
    {
        $user = $this->M_user;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Save Successfully');
			redirect(base_url("UsersController"));
        } else {
			$this->session->set_flashdata('failed', 'Save Failed, Please Make Sure to Insert Correctly');
            redirect(base_url("UsersController"));		
        }

    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('UsersController');
       
        $user = $this->M_user;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Save Successfully');
			redirect('UsersController');
        } else {
			$this->session->set_flashdata('failed', 'Save Failed, Please Make Sure to Insert Correctly');
            redirect(base_url("UsersController"));		
        }
	}

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_user->delete($id)) {
            $this->session->set_flashdata('success', 'Delete Successfully');
            redirect(site_url('UsersController'));
        } else {
			$this->session->set_flashdata('failed', 'Delete Failed');
            redirect(base_url("UsersController"));		
        }
    }
}
