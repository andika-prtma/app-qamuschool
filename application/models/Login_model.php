<?php 

class Login_model extends CI_Model{
	
	public function validation($data){
		return $this->db->get_where('tbl_visitor', $data);
	}

}