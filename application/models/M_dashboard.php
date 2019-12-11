<?php

class M_dashboard extends CI_Model{	
	function get_GPS($table){		
        $this->db->select('COUNT("Id_GPS") as total_gps');
		return $this->db->get($table)->row();
    }	
    
    function get_users($table){		
        $this->db->select('COUNT("User_Id") as total_user')
             ->where("User_Role","user");
        return $this->db->get($table)->row();
    }	
}
