<?php 

class User_model extends CI_Model{
	
	public function getUser($data){
		return $this->db->get_where('tbl_user', $data);
	}
}