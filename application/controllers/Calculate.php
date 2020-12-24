<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calculate extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->model('auth_model');
		$this->load->model('proses_model');
		$this->load->library('form_validation');
	}

	public function index(){
		echo "<h1>Forbidden.</h1>";
	}

	public function listening_proses(){
		$jawaban_user = [];
		for ($i=1; $i <= 50; $i++) { 
			$inputan = $this->input->post('answer_'.$i);
			array_push($jawaban_user, [
				'nomor' => $i,
				'jawab' => $inputan,
			]);
		}
		
		$betul = 0;
		foreach ($jawaban_user as $jwb) {
			$key = $this->db->get_where("tbl_section_one_key", ['nomor' => $jwb['nomor'],'id_paket' => intval($this->session->userdata('paket')) ])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}
		$score = $this->_defaultscore($betul);

		$data = [
			'id_user' => $this->session->userdata('id_user'),
			'section_one' => json_encode($jawaban_user),
			'true_one'	=> $betul,
			'start_test' => $this->session->userdata('time_start')
		];
		$id_user = $this->session->userdata('id_user');

		$cek = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' AND submit='0' LIMIT 1 ");
		if ($cek->num_rows() > 0){
			$this->db->set('section_one', json_encode($jawaban_user));
			$this->db->set('true_one',    $betul);
			$this->db->where('id_user', $id_user);
			$this->db->update('tbl_user_score');
			$this->session->set_userdata(['id_score' => $cek->row()->ID]);
		}else{
			
			$this->db->insert('tbl_user_score', $data);
			$this->session->set_userdata(['id_score' => $this->db->insert_id()]);
		}


		redirect('simulation/sectionStructure');
	}

	public function structure_proses(){
		$jawaban_user = [];
		for ($i=1; $i <= 40; $i++) { 
			$inputan = $this->input->post('answer_'.$i);
			array_push($jawaban_user, [
				'nomor' => $i,
				'jawab' => $inputan,
			]);
		}
		
		$betul = 0;
		foreach ($jawaban_user as $jwb) {
			$key = $this->db->get_where("tbl_section_two_key", ['nomor' => $jwb['nomor'],'id_paket' => intval($this->session->userdata('paket')) ])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}

		$score = $this->_defaultscore($betul);

		$data = [
			'id_user' 	  => $this->session->userdata('id_user'),
			'section_two' => json_encode($jawaban_user),
			'true_two'	  => $betul
		];
		
		$this->db->set('section_two', $data['section_two']);
		$this->db->set('true_two', $data['true_two']);
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('ID', $this->session->userdata('id_score'));
		$this->db->update('tbl_user_score');
		
		if ($this->input->post('kembali')=='kembali'){
		    redirect("simulation/sectionListening");
		}else{
		    redirect('simulation/sectionReading');    
		}
	}
   
	public function reading_proses(){
		$jawaban_user = [];
		for ($i=1; $i <= 50; $i++) { 
			$inputan = $this->input->post('answer_'.$i);
			array_push($jawaban_user, [
				'nomor' => $i,
				'jawab' => $inputan, 
			]);
		}
		
		$betul = 0;
		foreach ($jawaban_user as $jwb) {
			$key = $this->db->get_where("tbl_section_three_key", ['nomor' => $jwb['nomor'],'id_paket' => intval($this->session->userdata('paket')) ])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}
		$score = $this->_defaultscore($betul);				
		$data = [
			'id_user' 	  => $this->session->userdata('id_user'),
			'section_three' => json_encode($jawaban_user),
			'true_three' 	 => $betul
		];
		
		$this->db->set('section_three', $data['section_three']);
		$this->db->set('true_three', $data['true_three']);
		
		if ($this->input->post('kembali')!='kembali'){
		    $this->db->set('submit', 1);   
		}  
		$this->db->set('tgl_ujian', DATE("Y-m-d"));
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('ID', $this->session->userdata('id_score'));
		$this->db->update('tbl_user_score');
		if ($this->input->post('kembali')=='kembali'){
		    redirect("simulation/sectionStructure");
		}else{
		    redirect("simulation/report");    
		}
	}

	public function reading_proses_ajax(){
		$jawaban_user = array();
		for ($i=1; $i <= 50; $i++) { 
			$inputan = $this->input->post('answer_'.$i);
			array_push($jawaban_user, array(
				'nomor' => $i,
				'jawab' => $inputan, 
			));
		}
		
		$betul = 0;
		foreach ($jawaban_user as $jwb) {
			$key = $this->db->get_where("tbl_section_three_key", ['nomor' => $jwb['nomor'], 'id_paket' => intval($this->session->userdata('paket'))])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}
		$score = $this->_defaultscore($betul);				
		$data = [
			'id_user' 	  => $this->session->userdata('id_user'),
			'section_three' => json_encode($jawaban_user),
			'true_three' 	 => $betul
		];
		
		$this->db->set('section_three', $data['section_three']);
		$this->db->set('true_three', $data['true_three']);
		
// 		if ($this->input->post('kembali')!='kembali'){
		    $this->db->set('submit', 0);   
// 		}  
		$this->db->set('tgl_ujian', DATE("Y-m-d"));
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('ID', $this->session->userdata('id_score'));
		$this->db->update('tbl_user_score');
		 
		
	}

	private function _defaultscore($scr){
		$score = $this->db->get_where('mst_default_score', ['jawaban_benar' => $scr])->row();
		return $score;
	}
	
	public function backHome(){
	   // var_dump($this->session->userdata());
	   redirect('home');
	    
	}
	
	public function backDashboard(){
	   // var_dump($this->session->userdata());
	   redirect('dashboard');
	    
	}


}