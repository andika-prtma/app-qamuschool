<?php 

class Admin_model extends CI_Model{
	
	public function getOneData($table, $data){
		return $this->db->get_where($table, $data);
	}
	
	public function getAllDataUser(){
	    		$this->db->select('user.email, user.first_name, user.last_name, user.created_at, user.ID as userID, loc.location, loc.timezone')
				->from('tbl_visitor as user')
				->join('tbl_visitor_location as loc', 'user.ID = loc.id_visitor', 'left');
		return $this->db->get();
	}

}