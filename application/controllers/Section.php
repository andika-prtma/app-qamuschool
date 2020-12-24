<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->model('auth_model');
		$this->load->model('proses_model');
		$this->load->library('form_validation');
		$this->load->helper('use_helper');
	}


	public function index($id){
		$data['title'] = 'Section 1';
		$data['batch'] = $this->proses_model->getAll('mst_batch');
		$data['audio'] = $this->proses_model->getAll('tbl_section_one');
		$data['pilihan'] = $this->proses_model->getAll('tbl_section_one_option');
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('section/section1');
		$this->load->view('templates/footer');
	}

	public function tambahSoal($id){
		switch ($id) {
			case '1':
				$data = [
					'id_batch' 	=> $this->input->post('batch'),
					'id_audio'	=> $this->input->post('audio'), 
					'nomor' 	=> $this->input->post('nomor'), 
					'answerA' 	=> $this->input->post('answerA'),
					'answerB' 	=> $this->input->post('answerB'),
					'answerC'	=> $this->input->post('answerC'),
					'answerD' 	=> $this->input->post('answerD')
				];

				$this->proses_model->insertData('tbl_section_one_option', $data);
				redirect('section/index/1');

				break;
			
			default:
				# code...
				break;
		}
	}

	public function section_listening(){
		$ci = get_instance();

	$kode  = $ci->session->userdata('code_tes');
	$id    = $ci->session->userdata('id');
	$email = $ci->session->userdata('email');
	$tgl   = DATE("Y-m-d");

// 	$cek = $ci->db->query("SELECT * FROM tbl_user_score AS score 
// 					LEFT JOIN tbl_user_regist AS regist 
// 					ON regist.ID = score.id_user
// 					WHERE regist.email = '$email' AND score.submit = '1' AND regist.kode = '$kode' 
// 				");
// 	if ($cek->num_rows() > 0){
// 		redirect('/');
// 	}
		// $this->use_helper->konfirmasi_ujian();
		$id_user = $this->session->userdata('id_user');
		$data['filename'] = $this->db->get('tbl_section_one')->row();
		$data['pilihan']  = $this->db->get('tbl_section_one_option');
		$data['jawaban']  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' ")->row_array();
		$this->load->view('soal/soal',$data);
	}

	public function section_structure(){
		$ci = get_instance();

	$kode  = $ci->session->userdata('code_tes');
	$id    = $ci->session->userdata('id');
	$email = $ci->session->userdata('email');


// 	$cek = $ci->db->query("SELECT * FROM tbl_user_score AS score 
// 					LEFT JOIN tbl_user_regist AS regist 
// 					ON regist.ID = score.id_user
// 					WHERE regist.email = '$email' AND score.submit = '1' AND regist.kode = '$kode'
// 				");
// 	if ($cek->num_rows() > 0){
// 		redirect('/');
// 	}
		$id_user = $this->session->userdata('id');
		$data['soal']	= $this->db->get('tbl_section_two');
		$data['pilihan']  = $this->db->get('tbl_section_two_option');
		$data['jawaban']  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' ")->row_array();
		$this->load->view('soal/section2',$data);
	}

	public function section_reading(){
		$ci = get_instance();

	$kode  = $ci->session->userdata('code_tes');
	$id    = $ci->session->userdata('id');
	$email = $ci->session->userdata('email');


// 	$cek = $ci->db->query("SELECT * FROM tbl_user_score AS score 
// 					LEFT JOIN tbl_user_regist AS regist 
// 					ON regist.ID = score.id_user
// 					WHERE regist.email = '$email' AND score.submit = '1' AND regist.kode = '$kode'
// 				");
// 	if ($cek->num_rows() > 0){
// 		redirect('/');
// 	}
		$id_user = $this->session->userdata('id');
		$data['soal']	= $this->db->get('tbl_section_three');
		$data['pilihan']  = $this->db->get('tbl_section_three_option');
		$data['jawaban']  = $this->db->query("SELECT * FROM tbl_user_score WHERE id_user='$id_user' ")->row_array();
		$this->load->view('soal/section3',$data);
	}

	public function hasil(){
		$data['user'] = $this->db->get_where('tbl_user_score', ['id_user' => $this->session->userdata('id')])->row();
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

	
		$this->load->view('theme/travel/header');
		$this->load->view('soal/hasil', $data);
		$this->load->view('theme/travel/footer');

	}

	private function _defaultscore($scr){
		$score = $this->db->get_where('mst_default_score', ['jawaban_benar' => $scr])->row();

		return $score;
	}

	public function expired()
	{
		echo
		'
			<h1>Sorry, 
					time is up</h1>
		';
	}
	public function sendmail(){
// 		$data['user'] = $this->db->get_where('tbl_user_score', ['id_user' => $this->session->userdata('id')])->row();
// 		$data['scoreListening'] = $this->_defaultscore($data['user']->true_one);
// 		$data['scoreStructure'] = $this->_defaultscore($data['user']->true_two);
// 		$data['scoreReading']	= $this->_defaultscore($data['user']->true_three);

// 		$skorAkhir = intval($data['scoreListening']->listening)+intval($data['scoreStructure']->structure)+intval($data['scoreReading']->reading);
// 		$skorAkhir = $skorAkhir*10;
// 		$data['skorAkhir'] = $skorAkhir/3;

		//$email = $this->session->userdata('email');
		//$nama = ucwords($this->session->userdata('first_name')).' '.ucwords($this->session->userdata('last_name'));
		$email = 'andika.rach4@gmail.com';
		//Original CI
		$this->load->library('email');
        $config = array();
        // $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.googlemail.com';
        $config['smtp_user'] = 'andikarachadi@gmail.com';
        $config['smtp_pass'] = 'voidgenome';
        //$config['smtp_port'] = 465;
        //$config['mailtype'] = 'html';
        // $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
 $config['smtp_port']='465';
 $config['smtp_timeout']='30';
 $config['charset']='utf-8';
 $config['protocol'] = 'smtp';
 $config['mailpath'] = '/usr/sbin/sendmail';
 $config['charset'] = 'iso-8859-1';
 $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        //original CI

		$this->email->from('andikarachadi@gmail.com', 'Qamuschool');
		$this->email->to($email);
		$this->email->subject('Qamuschool | Simulation score Toefl');
		$this->email->message('test');
// 		$this->email->message($this->load->view('soal/send_email', $data, TRUE));

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	
	}

}