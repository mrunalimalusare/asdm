<?php
defined('BASEPATH') OR exit('Permission not granted...');

class AdminModel extends CI_Model{

    public function user_data($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('tbl_users');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

}