<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');
		$this->load->model('proses_model');
		$this->load->model('superadmin_model');
	}

	public function index2(){
		$this->load->view("home/s-header");
		$this->load->view("home/c-header");
		$this->load->view("home/c-main");
		$this->load->view("home/c-footer");
		$this->load->view("home/s-footer");
		
	}

	public function v_toefl_preparation(){
		$this->load->view("home/s-header");
		$this->load->view("home/c-header");
		$this->load->view('home/content/toefl-preparation');
		$this->load->view("home/c-footer");
		$this->load->view("home/s-footer");
	}

	public function v_coming_soon(){
		$this->load->view("home/s-header");
		$this->load->view("home/c-header");
		$this->load->view('home/content/coming-soon');
		$this->load->view("home/c-footer");
		$this->load->view("home/s-footer");
	}

	public function index(){
		$data = [
			'html_header' => 'home-new/structure/html_header',
			'ctn_header' => 'home-new/structure/ctn_header',
			'hero' => 'home-new/index/hero',
			'welcome' => 'home-new/index/welcome',
			'pengenalan' => 'home-new/index/pengenalan',
			'ctn_program' => 'home-new/structure/ctn_program',
			'cta' => 'home-new/index/cta',
			//'ctn_price' => 'home-new/structure/ctn_price',
			'ctn_quotes' => 'home-new/structure/ctn_quotes',
			'ctn_faq' => 'home-new/structure/ctn_faq_bg',
			'ctn_kontak' => 'home-new/structure/ctn_kontak',
			'ctn_footer' => 'home-new/structure/ctn_footer',
			'html_footer' => 'home-new/structure/html_footer',
		];

		$this->load->view('home-new/index',$data);
	}

	public function v_online_prediction(){
		$data = [
			'html_header' => 'home-new/structure/html_header',
			'ctn_header' => 'home-new/structure/ctn_header',
			'hero' => 'home-new/program/prediction/hero',
			'about' => 'home-new/program/prediction/about',
			'soal' => 'home-new/program/prediction/soal',
			'metode' => 'home-new/program/prediction/metode',
			'ctn_price' => 'home-new/structure/ctn_price_bg',
			'cta' => 'home-new/program/prediction/cta',
			'ctn_quotes' => 'home-new/structure/ctn_quotes',
			'ctn_kontak' => 'home-new/structure/ctn_kontak',
			'ctn_footer' => 'home-new/structure/ctn_footer',
			'html_footer' => 'home-new/structure/html_footer',
		];

		$this->load->view('home-new/online-toefl-prediction',$data);
	}

	public function v_materi_preparation(){
		$data = [
			'html_header' => 'home-new/structure/html_header',
			'ctn_header' => 'home-new/structure/ctn_header',
			'hero' => 'home-new/program/preparation/hero',
			'about' => 'home-new/program/preparation/about',
			'metode' => 'home-new/program/preparation/metode',
			'silabus' => 'home-new/program/preparation/silabus',
			'cta' => 'home-new/program/preparation/cta',
			'ctn_price' => 'home-new/structure/ctn_price_bg',
			'ctn_kontak' => 'home-new/structure/ctn_kontak',
			'ctn_footer' => 'home-new/structure/ctn_footer',
			'html_footer' => 'home-new/structure/html_footer',
		];

		$this->load->view('home-new/materi-toefl-preparation',$data);
	}

	public function v_event(){
		$data = [
			'html_header' => 'home-new/structure/html_header',
			'ctn_header' => 'home-new/structure/ctn_header',
			'hero' => 'home-new/event/hero-new',
			'table' => 'home-new/event/table',
			'ctn_price' => 'home-new/structure/ctn_price',
			'ctn_quotes' => 'home-new/structure/ctn_quotes',
			'ctn_kontak' => 'home-new/structure/ctn_kontak',
			'ctn_footer' => 'home-new/structure/ctn_footer',
			'html_footer' => 'home-new/structure/html_footer',
			'ctn_faq' => 'home-new/structure/ctn_faq',
		];

		$this->load->view('home-new/event',$data);
	}

	public function v_pendaftaran(){
		$this->load->view("home-new/structure/html_header");
		$this->load->view("home-new/structure/ctn_header");
		$this->load->view("home-new/event/hero-new");
		$this->load->view("home-new/pendaftaran/pendaftaran");
		$this->load->view("home-new/structure/ctn_footer");
		$this->load->view("home-new/structure/html_footer");
	}

	public function v_paket_free(){
		cek_login_free();
		$this->form_validation->set_rules('institute', 'institute', 'trim|required');
		$this->form_validation->set_rules('info', 'sumber info', 'trim|required');
		$this->form_validation->set_rules('motivasi', 'motivasi', 'trim|required');
		$this->form_validation->set_rules('telp', 'No Telp', 'trim|required');
		
		if ($this->form_validation->run() == false) {
			$this->load->view("home-new/structure/html_header");
			$this->load->view("home-new/structure/ctn_header");
		    $this->load->view("home-new/event/hero-new");
			$this->load->view("home-new/pendaftaran/paket_free");
			$this->load->view("home-new/structure/ctn_footer");
			$this->load->view("home-new/structure/html_footer");
		} else {
			$this->paymentFree();
		}
	}

	public function v_paket_member(){
		
		cek_login_member();
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tbl_visitor.username]',['is_unique' => 'This username already exist']);

		
		if ($this->form_validation->run() == false) {
		    $data['metode'] = $this->db->get('mst_pembayaran');
		    $data['kategori'] = $this->db->get('tbl_paket_kategori');
			$this->load->view("home-new/structure/html_header");
    		$this->load->view("home-new/structure/ctn_header");
    		$this->load->view("home-new/event/hero-new");
    		$this->load->view("home-new/pendaftaran/paket_member", $data);
    		$this->load->view("home-new/structure/ctn_footer");
    		$this->load->view("home-new/structure/html_footer");
		} else {
			$this->paymentFree();
		}
	}

	public function paymentFree(){
		$tgl_test 	= htmlspecialchars($this->input->post("tgl_test"));
		$institute 	= htmlspecialchars($this->input->post("institute"));
		$info 		= htmlspecialchars($this->input->post("info"));
		$motivasi 	= htmlspecialchars($this->input->post("motivasi"));
		$telp 		= htmlspecialchars($this->input->post('telp'));
		$username 	= htmlspecialchars($this->input->post('username'));

		$payment = [
			'id_visitor' => $this->session->userdata('id_user'),
			'tgl_tes' => $tgl_test,
			'institute' => $institute,
			'sumber_info' => $info,
			'motivasi' => $motivasi,
			'contact' => $telp,
			'timestamp' => time()
		];

		$this->db->insert('tbl_paket_free', $payment);

		$this->db->set('username', $username);
		$this->db->set('type_member', 1);
		$this->db->where("ID", $this->session->userdata('id_user'));
		$this->db->update('tbl_visitor');
		$this->session->set_userdata('pembayaran', '0');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil, silahkan join ke grup whatsapp dengan link berikut: <a href="https://chat.whatsapp.com/KoiCVKr1098GSo8HsbvWCH" target="_blank">https://chat.whatsapp.com/KoiCVKr1098GSo8HsbvWCH</a> </div>');
		redirect('pendaftaran');
	}

	public function paymentMember(){
		$username 	= htmlspecialchars($this->input->post('username'));		
		$payment = [
			'id_visitor' => $this->session->userdata('id_user'),
			'id_pembayaran' => $this->input->post('bayar'),
			'id_pilihan_paket' => $this->input->post('paket'),
			'contact' => $this->input->post('telp'),
			'timestamp' => time()
		];

		$this->db->insert('tbl_paket_member', $payment);
		$id = $this->db->insert_id();
		mkdir("uploads/member/$id");

		$nameFile = $this->uploadFiles("./uploads/member/$id", 'bukti');
		$this->db->set('bukti', $nameFile);
		$this->db->where('ID', $id);
		$this->db->update('tbl_paket_member');

		$this->db->set('username', $username);
		$this->db->set('type_member', 2);
		$this->db->where("ID", $this->session->userdata('id_user'));
		$this->db->update('tbl_visitor');
    
    
        $this->session->set_userdata('username',$username);
		$x = $this->session->userdata('email');
		$y = $this->session->userdata('first_name');

		$this->session->set_userdata('pembayaran', '1');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil, silahkan contact admin untuk mendapatkan link grup: <a href="https://api.whatsapp.com/send?phone=6282115029525&text=Hi%20ka,%20saya:'.$y.'%0A%0AEmail%20saya%20:'.$x.'%0A%0ASudah%20mengisi%20form%20payment%20confirmation,%20boleh%20minta%20link%20grupnya%3F" target="_blank">Chat admin</a> </div>');
		redirect('pendaftaran');
	}

	public function uploadFiles($path, $file){
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file)){
            $error = array('error' => $this->upload->display_errors());
        }else{
			$data = array('upload_data' => $this->upload->data());
			return $this->upload->data('file_name');
        }
	}

	public function les(){
		$data = [
			'html_header' => 'home-new/structure/html_header',
			'ctn_header' => 'home-new/structure/ctn_header',
			'hero' => 'home-new/private/hero',
			'table' => 'home-new/private/table',
			'ctn_quotes' => 'home-new/structure/ctn_quotes',
			'ctn_kontak' => 'home-new/structure/ctn_kontak',
			'ctn_footer' => 'home-new/structure/ctn_footer',
			'html_footer' => 'home-new/structure/html_footer',
			'ctn_faq' => 'home-new/structure/ctn_faq',
		];

		$this->load->view('home-new/private',$data);
	}



}