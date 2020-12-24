<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hitung extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->model('auth_model');
		$this->load->model('proses_model');
		$this->load->library('form_validation');
	}

	public function index(){
		for ($i=0; $i < 10 ; $i++) { 
			$title = 'answer_'.$i;
			echo $title.'<br>';
		}
	}

	public function listening_proses(){
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
			$key = $this->db->get_where("tbl_section_one_key", ['nomor' => $jwb['nomor'],'id_paket' => intval($this->session->userdata('paket')) ])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}
		$score = $this->_defaultscore($betul);

		$data = [
			'id_user' => $this->session->userdata('id_user'),
			'section_one' => json_encode($jawaban_user),
			'true_one'	=> $betul
		];
		$id_user = $this->session->userdata('id_user');

		$cek = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' ");
		if ($cek->num_rows() > 0){
			$this->db->set('section_one', json_encode($jawaban_user));
			$this->db->set('true_one',    $betul);
			$this->db->where('id_user', $id_user);
			$this->db->update('tbl_user_score');
		}else{
			
			$this->db->insert('tbl_user_score', $data);
		}


		redirect('section/section_structure');
	}

	public function structure_proses(){
		$jawaban_user = array();
		for ($i=1; $i <= 40; $i++) { 
			$inputan = $this->input->post('answer_'.$i);
			array_push($jawaban_user, array(
				'nomor' => $i,
				'jawab' => $inputan,

			));
		}
		
		$betul = 0;
		foreach ($jawaban_user as $jwb) {
			$key = $this->db->get_where("tbl_section_two_key", ['nomor' => $jwb['nomor']])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}

		$score = $this->_defaultscore($betul);

		$data = [
			'id_user' 	  => $this->session->userdata('id'),
			'section_two' => json_encode($jawaban_user),
			'true_two'	  => $betul
		];
		
		$this->db->set('section_two', $data['section_two']);
		$this->db->set('true_two', $data['true_two']);
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user_score');
		
		if ($this->input->post('kembali')=='kembali'){
		    redirect("section/section_listening");
		}else{
		    redirect('section/section_reading');    
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
			$key = $this->db->get_where("tbl_section_three_key", ['nomor' => $jwb['nomor']])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}
		$score = $this->_defaultscore($betul);				
		$data = [
			'id_user' 	  => $this->session->userdata('id'),
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
		$this->db->update('tbl_user_score');
		 
		
	}
	
	public function reading_proses(){
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
			$key = $this->db->get_where("tbl_section_three_key", ['nomor' => $jwb['nomor']])->row();
			if ($jwb['jawab'] == $key->jawaban) {
			 	$betul++;
			 }
		}
		$score = $this->_defaultscore($betul);				
		$data = [
			'id_user' 	  => $this->session->userdata('id'),
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
		$this->db->update('tbl_user_score');
		if ($this->input->post('kembali')=='kembali'){
		    redirect("section/section_structure");
		}else{
		    redirect("section/hasil");    
		}
		
	}

	public function kode_proses(){
	    date_default_timezone_set("Asia/Jakarta");
		$kode = $this->input->post('code_tes');
		$cek = $this->db->get_where('tbl_kode', ['kode' => $kode]);
		if ($cek->num_rows() > 0 ) {
		    $data = $cek->row_array();
		    if ( (DATE("Y-m-d H:i")>= DATE("Y-m-d H:i",$data['start_date'])) AND (DATE("Y-m-d H:i")<=DATE("Y-m-d H:i",$data['finish_date'] )) ){
		        $data['sekarang'] = DATE('H');
		        $data['besok']      = DATE('H', $data['start_date']);
		       	$this->session->set_userdata('code_tes',$kode);
    			$this->load->view('theme/travel/header');
    			$this->load->view('soal/data_user', $data);
    			$this->load->view('theme/travel/footer'); 
		    } else {
		        echo 
		        '
		            <script type="text/javascript">
                      alert("Waktu belum Tersedia");
                      location.assign("'.base_url().'welcome");
                    </script>
		        ';
    // 			redirect("welcome");
    		}
		
		} else {
			redirect("home");
		}
	}

	private function _defaultscore($scr){
		$score = $this->db->get_where('mst_default_score', ['jawaban_benar' => $scr])->row();
		return $score;
	}
	
	public function logout(){
	   $this->session->sess_destroy();
	   redirect('home');
	    
	}


}