<?php

class Peserta_model extends CI_Model{

	public function getAllFree(){
		$this->db->select('f.ID as f_id, f.tgl_tes, f.institute, f.sumber_info, f.motivasi, f.submit, f.contact, u.email, u.username, u.first_name, u.last_name')
				->from('tbl_paket_free as f')
				->join('tbl_visitor as u', 'f.id_visitor = u.ID','left');
		return $this->db->get();
	}

	public function getAllMember(){
		$this->db->select('m.ID as m_id, m.submit, m.contact, m.timestamp, u.email, u.username, b.metode, p.kategori, m.bukti')
				->from('tbl_paket_member as m')
				->join('tbl_visitor as u', 'm.id_visitor = u.ID','left')
				->join('mst_pembayaran as b', 'm.id_pembayaran = b.ID','left')
				->join('tbl_paket_kategori as p', 'm.id_pilihan_paket = p.ID','left');
		return $this->db->get();
	}

}