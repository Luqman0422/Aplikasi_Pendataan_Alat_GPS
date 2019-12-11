<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_GPS extends CI_Model{	

    private $_table = "gps";

    public $Brand_GPS;
    public $Model_GPS;
    public $GPS_Name;
    public $Waranty_Month;
    public $Buy_Date;
    public $Sold_Date;
    public $Sold_To;
    public $Photo;
    public $Description;

    public function rules()
    {
        return [

            ['field' => 'Brand_GPS',
            'label' => 'Brand_GPS',
            'rules' => 'required'],
            
            ['field' => 'Model_GPS',
            'label' => 'Model_GPS',
            'rules' => 'required'],

            ['field' => 'GPS_Name',
            'label' => 'GPS_Name',
            'rules' => 'required'],
            
            ['field' => 'Waranty_Month',
            'label' => 'Waranty_Month',
            'rules' => 'required'],

            ['field' => 'Buy_Date',
            'label' => 'Buy_Date',
            'rules' => 'required'],
            
            ['field' => 'Sold_Date',
            'label' => 'Sold_Date',
            'rules' => 'required'],
            
            ['field' => 'Sold_To',
            'label' => 'Sold_To',
            'rules' => 'required']
        ];
    }

    public function getAll($number,$offset)
    {
        return $this->db->order_by("Id_GPS","ASC")->get($this->_table,$number,$offset)->result();
    }

    function jumlah_data(){
		return $this->db->get($this->_table)->num_rows();
	}
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["Id_GPS" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        
        $this->Brand_GPS = $post["Brand_GPS"];
        $this->Model_GPS = $post["Model_GPS"];
        $this->GPS_Name = $post["GPS_Name"];
        $this->Waranty_Month = $post["Waranty_Month"];
        $this->Buy_Date = $post["Buy_Date"];
        $this->Sold_Date = $post["Sold_Date"];
        $this->Sold_To = $post["Sold_To"];
        $this->Photo = $this->uploadImage();
        $this->Description = $post["Description"];
        $this->db->insert($this->_table, $this);
    }

    private function uploadImage()
    {
        $config['upload_path']          = 'assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Photo')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    public function update()
    {
        $post = $this->input->post();
        $this->Brand_GPS = $post["Brand_GPS"];
        $this->Model_GPS = $post["Model_GPS"];
        $this->GPS_Name = $post["GPS_Name"];
        $this->Waranty_Month = $post["Waranty_Month"];
        $this->Buy_Date = $post["Buy_Date"];
        $this->Sold_Date = $post["Sold_Date"];
        $this->Sold_To = $post["Sold_To"];
        if (!empty($_FILES["Photo"]["name"])) {
            $this->Photo = $this->uploadImage();
            $gps = $this->getById($id);
            if($gps->Photo != "default.jpg"):
            $filename = explode(".", $gps->Photo)[0];
            array_map('unlink', glob(FCPATH."assets/img/$filename.*"));
            endif;
        } else {
            $this->Photo = $post["Old_Photo"];
        }
        $this->Description = $post["Description"];
        $this->db->update($this->_table, $this, array('Id_GPS' => $post['Id_GPS']));
    }

    public function delete($id)
    {
        $gps = $this->getById($id);
        if($gps->Photo != "default.jpg"):
        $filename = explode(".", $gps->Photo)[0];
        array_map('unlink', glob(FCPATH."assets/img/$filename.*"));
        endif;
        return $this->db->delete($this->_table, array("Id_GPS" => $id));
    }	

   
}
