<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{	

    private $_table = "users";

    public $User_Name;
    public $User_Email;
    public $User_Address;
    public $User_Password;
    public $User_Sex;
    public $User_Birthday;
    public $User_Photo;
    public $User_Role;

    public function rules()
    {
        return [

            ['field' => 'User_Name',
            'label' => 'User_Name',
            'rules' => 'required'],

            ['field' => 'User_Email',
            'label' => 'User_Email',
            'rules' => 'required'],
            
            ['field' => 'User_Address',
            'label' => 'User_Address',
            'rules' => 'required'],

            ['field' => 'User_Password',
            'label' => 'User_Password',
            'rules' => 'required'],
            
            ['field' => 'User_Sex',
            'label' => 'User_Sex',
            'rules' => 'required'],
            
            ['field' => 'User_Birthday',
            'label' => 'User_Birthday',
            'rules' => 'required'],
       
            ['field' => 'User_Role',
            'label' => 'User_Role',
            'rules' => 'required']
        ];
    }

    public function getAll($number,$offset)
    {
        return $this->db->where("User_Role","user")->order_by("User_Id","ASC")->get($this->_table,$number,$offset)->result();
    }

    function jumlah_data(){
		return $this->db->get($this->_table)->num_rows();
	}
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["User_Id" => $id])->row();
    }

    public function emailWhereIN($email){
        return $this->db->where_in('User_Email', $email)
                        ->get('users');
    }

    public function save()
    {
        $post = $this->input->post();
        $this->User_Name = $post["User_Name"];
        $this->User_Email = $post["User_Email"];
        $this->User_Address = $post["User_Address"];
        $this->User_Password = md5($post["User_Password"]);
        $this->User_Sex = $post["User_Sex"];
        $this->User_Birthday = $post["User_Birthday"];
        $this->User_Photo = $this->uploadImage();
        $this->User_Role = $post["User_Role"];
        $this->db->insert($this->_table, $this);
    }

    public function uploadImage()
    {
        $config['upload_path']          = 'assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('User_Photo')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    public function update()
    {
        $post = $this->input->post();
        $this->User_Name = $post["User_Name"];
        $this->User_Email = $post["User_Email"];
        $this->User_Address = $post["User_Address"];
        $this->User_Password = md5($post["User_Password"]);
        $this->User_Sex = $post["User_Sex"];
        $this->User_Birthday = $post["User_Birthday"];
        if (!empty($_FILES["User_Photo"]["name"])) {
            $this->User_Photo = $this->uploadImage();
        } else {
            $this->User_Photo = $post["Old_Photo"];
        }
        $this->User_Role = $post["User_Role"];
        $this->db->update($this->_table, $this, array('User_Id' => $post['User_Id']));
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        $filename = explode(".", $user->User_Photo)[0];
        array_map('unlink', glob(FCPATH."assets/img/$filename.*"));
        return $this->db->delete($this->_table, array("User_Id" => $id));
    }	

    public function edit_profile($user_id, $data)
    {
        return $this->db->where('User_Id', $user_id)
                        ->update('users', $data);
    }	

    public function changePass($user_id, $data){
        return $this->db->where('User_Id', $user_id)
                        ->update('users', $data);
    }

}
