<?php 

class Proses_model extends CI_Model{
	
	public function getAll($table){
		return $this->db->get($table);
	}

	public function insertData($tbl, $data){
		$this->db->insert($tbl, $data);
	}

	public function getDataPeserta(){
		$this->db->select('user.email, user.first_name, user.last_name, user.kode, user.created_at, score.*, final.convert_section1, final.convert_section2, final.convert_section3, final.hasil_akhir')
				->from('tbl_user_regist as user')
				->join('tbl_user_score as score', 'user.ID = score.id_user', 'left')
				->join('tbl_user_score_final as final', 'score.ID = final.id_jawaban', 'left')
				->group_by("user.email");

		return $this->db->get();
	}
	
	public function getDataPesertaExcel(){
		$this->db->select('user.email, user.first_name, user.last_name, user.kode, user.created_at, score.*, final.convert_section1, final.convert_section2, final.convert_section3, final.hasil_akhir')
				->from('tbl_user_regist as user')
				->join('tbl_user_score as score', 'user.ID = score.id_user', 'left')
				->join('tbl_user_score_final as final', 'score.ID = final.id_jawaban', 'left')
				->group_by("user.email")
				->order_by('user.kode');

		return $this->db->get();
	}
	
	public function getDataPesertaExcelBaru(){
        $this->db->select('score.tgl_ujian as tgl, user.email, user.first_name, user.type_member, user.last_name, score.*, final.convert_section1, final.convert_section2, final.convert_section3, final.hasil_akhir, score.start_test, score.finish_test, loc.location, loc.timezone, score.tgl_ujian')
                ->from('tbl_user_score_final as final')
                ->join('tbl_user_score as score', 'score.ID = final.id_jawaban', 'left')
                ->join('tbl_visitor as user', 'user.ID = score.id_user', 'left')
                ->join('tbl_visitor_location as loc', 'loc.id_visitor = user.ID', 'left');
		return $this->db->get();
	}
	
	
	//buat migrate
	public function getDataPeserta2(){
		$this->db->select('user.email, user.first_name, user.last_name, user.kode, user.created_at, score.*, final.convert_section1, final.convert_section2, final.convert_section3, final.hasil_akhir')
				->from('tbl_user_score as score')
				->join('tbl_user_regist as user', 'user.ID = score.id_user', 'left')
				->join('tbl_user_score_final as final', 'score.ID = final.id_jawaban', 'left');
				// ->group_by("user.email");

		return $this->db->get();
	}
	
	//buat cek jawaban
	public function cek_jawaban($email){
		$this->db->select('user.email, user.first_name, user.last_name, user.kode, user.created_at, score.*, final.convert_section1, final.convert_section2, final.convert_section3, final.hasil_akhir')
				->from('tbl_user_score_final as final')
				->join('tbl_user_score as score', 'score.ID = final.id_jawaban', 'left')
				->join('tbl_user_regist as user', 'user.ID = score.id_user', 'left')
				->where('user.email', $email)
				->or_where('user.kode', 'NGERJAINQAMUYUK')
				->group_by("user.email")
				->order_by('user.kode');

		return $this->db->get();
	}

	//buat cek jawaban terbaru
	public function cek_jawabanBaru($ID){
		$this->db->select('score.*, final.convert_section1, final.convert_section2, final.convert_section3, final.hasil_akhir')
				->from('tbl_user_score_final as final')
				->join('tbl_user_score as score', 'score.ID = final.id_jawaban', 'left')
				->where('score.ID', $ID)
				->group_by('score.ID');

		return $this->db->get();
	}

}