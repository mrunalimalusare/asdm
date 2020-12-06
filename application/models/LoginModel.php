<?php
defined('BASEPATH') OR exit('Permission not granted...');

class LoginModel extends CI_Model{
    
    public function register_user($fullname,$email,$password){
        $data = array(
            "full_name" => $fullname,
            "email"     => $email,
            "password"  => $password
        );
        $query = $this->db->insert('tbl_users', $data);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function forgetpassword($fullname,$email){
        $this->db->where('full_name', $fullname);
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_users');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }

    public function logindata($email,$password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_users');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
}