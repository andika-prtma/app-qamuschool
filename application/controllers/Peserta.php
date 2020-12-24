<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('peserta_model');
		$this->load->library('form_validation');
		redirectLogin();
	}

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$this->goDefaultPage();
		if ($this->form_validation->run() == false) {
		
			$data['title'] = 'Qamuschool | Admin Page';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}

	}

	public function daftar_free(){
		$data['title'] 	= 'Qamuschool | Paket Free';
		$data['free']	= $this->peserta_model->getAllFree();

		$this->load->view('panel/peserta/structure/header', $data);
		$this->load->view('panel/home/sidebar');
		$this->load->view('panel/home/topbar');
		$this->load->view('panel/peserta/daftar-free', $data);
		$this->load->view('panel/home/footer-content');
		$this->load->view('panel/peserta/structure/footer');
	}

	public function daftar_member(){
		$data['title'] 	= 'Qamuschool | Paket Free';
		$data['member']	= $this->peserta_model->getAllMember();

		$this->load->view('panel/peserta/structure/header', $data);
		$this->load->view('panel/home/sidebar');
		$this->load->view('panel/home/topbar');
		$this->load->view('panel/peserta/daftar-member', $data);
		$this->load->view('panel/home/footer-content');
		$this->load->view('panel/peserta/structure/footer');
	}
}