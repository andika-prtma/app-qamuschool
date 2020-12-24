<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simulation extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');
		$this->load->model('proses_model');
		redirectLogin();
	}

	public function index(){

		$kode = $this->input->post('code_tes');
		$paket = 4;
		$cek = $this->db->get_where('tbl_kode', ['kode' => $kode, 'is_active' => 1]);
		if ($cek->num_rows() > 0 ) {
			$data = $cek->row_array();
			$this->session->set_userdata(['kode_soal' => $cek->row()->kode]);
		    $this->session->set_userdata('kode',$cek->row()->kode);
		    $this->session->set_userdata('id_kode',$cek->row()->ID);
		    $this->session->set_userdata('paket',$paket);
 	   		$this->load->view('theme/travel/header');
  			$this->load->view('new/c-notes', $data);
   			$this->load->view('theme/travel/footer'); 
		} else {
			echo 
		   	'<script type="text/javascript">
                alert("Kode sudah tidak aktif");
				location.assign("'.base_url().'dashboard/prediction-test");
			</script>';
		}
	}

	public function start(){
		$this->session->set_userdata('time_start', time());
		$log = [
			'id_visitor' => intval($this->session->userdata('id_user')),
			'id_kode' => $this->session->userdata('kode_soal'),
			'created_at' => time()
		];

		$this->auth_model->insertData('tbl_visitor_log', $log);
		redirect('simulation/sectionListening');
	}

	public function sectionListening(){

		$kode  		= $this->session->userdata('code_tes');
		$id_user 	= $this->session->userdata('id_user');
		$id_paket 	= intval($this->session->userdata('paket'));
		$email 		= $this->session->userdata('email');
		// $tgl   = DATE("Y-m-d");

		$data['audio'] = $this->db->get_where('tbl_section_one', ['id_paket' => $id_paket])->row();
		$data['option']  = $this->db->get_where('tbl_section_one_option', ['id_paket' => $id_paket]);
		$data['jawaban']  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' AND submit='0' ")->row_array();
		$this->load->view('new/section/listening',$data);
	}


	public function sectionStructure(){
		$id_paket 	= intval($this->session->userdata('paket'));

		$id_user = $this->session->userdata('id_user');
		$data['soal']	= $this->db->get_where('tbl_section_two', ['id_paket' => $id_paket]);
		$data['jawaban']  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' AND submit='0' ")->row_array();
		$this->load->view('new/section/structure',$data);
	}

	public function sectionReading(){
		$id_paket 	= intval($this->session->userdata('paket'));

		$id_user = $this->session->userdata('id_user');
		$data['soal']	= $this->db->get_where('tbl_section_three', ['id_paket' => $id_paket]);
		$data['pilihan']  = $this->db->get('tbl_section_three_option');
		$data['jawaban']  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' AND submit='0' ")->row_array();
		
		$cek  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' ORDER BY ID DESC limit 1 ")->row();
		if($cek->submit == '1'){
		    redirect("simulation/report");
		}
		$this->load->view('new/section/reading',$data);
	}

	public function report(){
	    $uuu = $this->session->userdata('id_user');
	    $data['user'] = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user = '$uuu' AND submit = '1' ORDER BY ID DESC LIMIT 1 ")->row();
// 		$data['user'] = $this->db->get_where('tbl_user_score', ['id_user' => $this->session->userdata('id_user')])->row();
		$listening = 0;
		if($data['user']->true_one != null){
		    $listening = $data['user']->true_one;
		}
		
		$structure = 0;
		if($data['user']->true_two != null){
		    $structure = $data['user']->true_two;
		}
		
		$reading = 0;
		if($data['user']->true_three != null){
		    $reading = $data['user']->true_three;
		}
	    $u = $data['user']->ID;
		$this->db->query("UPDATE tbl_user_score SET submit='1' WHERE ID='$u' ");
		$data['scoreListening'] = $this->_defaultscore($listening);
		$data['scoreStructure'] = $this->_defaultscore($structure);
		$data['scoreReading']	= $this->_defaultscore($reading);

		$skorAkhir = intval($data['scoreListening']->listening)+intval($data['scoreStructure']->structure)+intval($data['scoreReading']->reading);
		$skorAkhir = $skorAkhir*10;
		$data['skorAkhir'] = $skorAkhir/3;
        
		$final = [
			'id_jawaban' => $data['user']->ID,
			'convert_section1' 	=> $this->_defaultscore($listening)->listening,
			'convert_section2' 	=> $this->_defaultscore($structure)->structure,
			'convert_section3' 	=> $this->_defaultscore($reading)->reading,
			'hasil_akhir'		=> round($skorAkhir/3)
		];

		$this->session->set_userdata(['id_jawaban' => $u]);

		$this->db->insert('tbl_user_score_final', $final);
		$this->db->set('finish_test', time());
        $this->db->where('ID', $data['user']->ID);
        $this->db->update('tbl_user_score');
		
		$this->load->view('theme/travel/header');
		$this->load->view('soal/hasil', $data);
		$this->load->view('theme/travel/footer');
	}

	private function _defaultscore($scr){
		$score = $this->db->get_where('mst_default_score', ['jawaban_benar' => $scr])->row();

		return $score;
	}

	public function explanation(){
		$ID = $this->session->userdata('id_jawaban');
		$data['peserta'] = $this->proses_model->cek_jawabanBaru($ID)->row();
		$data['key1'] = $this->db->get_where('tbl_section_one_key', ['id_paket' => 4, ])->result();
		$data['key2'] = $this->db->get_where('tbl_section_two_key', ['id_paket' => 4, ])->result();
		$data['key3'] = $this->db->get_where('tbl_section_three_key', ['id_paket' => 4, ])->result();

		$this->load->view('theme/travel/header', $data);
		$this->load->view('new/c-pembahasan', $data);
		$this->load->view('theme/travel/footer', $data);
	}
	
	public function answerKey(){
		$ID = $this->session->userdata('id_jawaban');
		$user = $this->session->userdata('id_user');

		$qr = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user = '$user' AND submit='1' ORDER BY ID DESC LIMIT 1 ")->row();
		$data['peserta'] = $this->proses_model->cek_jawabanBaru($qr->ID)->row();
		$data['key1'] = $this->db->get_where('tbl_section_one_key', ['id_paket' => 3, ])->result();
		$data['key2'] = $this->db->get_where('tbl_section_two_key', ['id_paket' => 3, ])->result();
		$data['key3'] = $this->db->get_where('tbl_section_three_key', ['id_paket' => 3, ])->result();

		$this->load->view('theme/travel/header', $data);
		$this->load->view('new/c-pembahasan', $data);
		$this->load->view('theme/travel/footer', $data);
	}
}