<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GPSController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_GPS');
		$this->load->model('M_user');
		$this->load->library('pagination');
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("LoginController"));
		}
	}

	function index()
	{
        //konfigurasi pagination
        $config['base_url'] = site_url('GPSController/index'); //site url
        $config['total_rows'] = $this->M_GPS->jumlah_data(); //total row
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
 
		$data["gps"] = $this->M_GPS->getAll($config["per_page"], $data['page']);
		$data["user"] = $this->M_user->getById($this->session->userdata('User_Id'));
		$data["nav"] = "GPS";
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('gps', $data);
	}

	public function add()
    {
        $gps = $this->M_GPS;
        $validation = $this->form_validation;
        $validation->set_rules($gps->rules());

        if ($validation->run()) {
            $gps->save();
            $this->session->set_flashdata('success', 'Save Successfully');
			redirect(base_url("GPSController"));
        } else {
			$this->session->set_flashdata('failed', 'Save Failed, Please Make Sure to Insert Correctly');
            redirect(base_url("GPSController"));		
        }

    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('GPSController');
       
        $gps = $this->M_GPS;
        $validation = $this->form_validation;
        $validation->set_rules($gps->rules());

        if ($validation->run()) {
            $gps->update();
            $this->session->set_flashdata('success', 'Save Successfully');
			redirect(base_url("GPSController"));
        } else {
			$this->session->set_flashdata('failed', 'Save Failed, Please Make Sure to Insert Correctly');
            redirect(base_url("GPSController"));		
        }     
	}

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_GPS->delete($id)) {
            $this->session->set_flashdata('success', 'Delete Successfully');
			redirect(base_url("GPSController"));
        } else {
            $this->session->set_flashdata('failed', 'Delete Failed');
			redirect(base_url("GPSController"));
        }
    }
}
