<?php 

class Menu_model extends CI_Model{
	
	public function getData($table){
		return $this->db->get($table);
	}

	public function getDataMenu($table){
		$this->db->where('ID != ', 1);
		return $this->db->get($table);
	}

	public function getSubData(){
		$this->db->select('sub.*, menu.menu')
				->from('tbl_user_sub_menu as sub')
				->join('tbl_user_menu as menu', 'sub.id_menu = menu.ID', 'join');
		return $this->db->get();
	}

	public function deleteData($id, $table){
		$this->db->where('ID', $id);
		$this->db->delete($table);
	}
}