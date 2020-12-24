<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');
		$this->load->model('proses_model');

		if (!$this->session->userdata('id_user')) {
			redirect('login');
		}

	}

	public function index2(){
		$this->load->view('dashboard/structure/html-header');
		$this->load->view('dashboard/structure/ctn-sidebar');
		$this->load->view('dashboard/structure/ctn-topbar');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/structure/ctn-footer');
		$this->load->view('dashboard/structure/html-footer');
	}
	
	public function index(){
	    $this->db->select('score.ID, final.hasil_akhir, score.tgl_ujian');
	    $this->db->from('tbl_user_score as score');
	    $this->db->join('tbl_user_score_final as final', 'score.ID = final.id_jawaban', 'left');
	    $this->db->where('score.submit', 1);
	    $this->db->where('score.id_user', $this->session->userdata('id_user'));
	    $data['score'] = $this->db->get();
	    
	    
		$this->load->view('dashboard/structure/html-header');
		$this->load->view('dashboard/structure/ctn-sidebar');
		$this->load->view('dashboard/structure/ctn-topbar');
		$this->load->view('dashboard/tes-prediction', $data);
		$this->load->view('dashboard/structure/ctn-footer');
		$this->load->view('dashboard/structure/html-footer');
	}
	
	public function profile(){
	
		$data['user'] = $this->db->get_where('tbl_visitor', ['ID' => $this->session->userdata('id_user')])->row();

		$this->load->view('dashboard/structure/html-header');
		$this->load->view('dashboard/structure/ctn-sidebar');
		$this->load->view('dashboard/structure/ctn-topbar');
		$this->load->view('dashboard/user', $data);
		$this->load->view('dashboard/structure/ctn-footer');
		$this->load->view('dashboard/structure/html-footer');

	}

	public function prediction(){
	    $this->db->select('score.ID, final.hasil_akhir, score.tgl_ujian');
	    $this->db->from('tbl_user_score as score');
	    $this->db->join('tbl_user_score_final as final', 'score.ID = final.id_jawaban', 'left');
	    $this->db->where('score.submit', 1);
	    $this->db->where('score.id_user', $this->session->userdata('id_user'));
	    $data['score'] = $this->db->get();
	    
	    
		$this->load->view('dashboard/structure/html-header');
		$this->load->view('dashboard/structure/ctn-sidebar');
		$this->load->view('dashboard/structure/ctn-topbar');
		$this->load->view('dashboard/tes-prediction', $data);
		$this->load->view('dashboard/structure/ctn-footer');
		$this->load->view('dashboard/structure/html-footer');
	}

	public function updateProfile(){

		$first_name = htmlspecialchars($this->input->post('firstName', true));
		$last_name 	= htmlspecialchars($this->input->post('lastName', true));
		$telp 		= htmlspecialchars($this->input->post('telp', true));
		$gender 	= htmlspecialchars($this->input->post('gender', true));
		$pass 		= $this->input->post('password1');
		$about 		= htmlspecialchars($this->input->post('about', true));
		$status 	= htmlspecialchars($this->input->post('status_diri', true));
		
		$x = [
			'first_name' => $first_name,
			'last_name'	=> $last_name,
			'contact' 	=> $telp,
			'about_me' => $about,
			'gender'  => $gender,
			'status_diri' => $status
		];

		$this->db->set($x);
		if ($pass != '') {
			$this->db->set('password', password_hash($pass, PASSWORD_DEFAULT));
		}
		$this->db->where('ID', $this->session->userdata('id_user'));
		$this->db->update('tbl_visitor');


		redirect('dashboard/profile');
	
	}
	
	public function detailJawaban($id){
		
		$ID = $id;
		$data['peserta'] = $this->proses_model->cek_jawabanBaru($ID)->row();
		$data['key1'] = $this->db->get_where('tbl_section_one_key', ['id_paket' => 3, ])->result();
		$data['key2'] = $this->db->get_where('tbl_section_two_key', ['id_paket' => 3, ])->result();
		$data['key3'] = $this->db->get_where('tbl_section_three_key', ['id_paket' => 3, ])->result();

		$this->load->view('theme/travel/header', $data);
		$this->load->view('new/c-pembahasan', $data);
		$this->load->view('theme/travel/footer', $data);
	
	}

}