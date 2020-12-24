<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Qamuschool extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');
		$this->load->model('proses_model');

		is_logged_in();
	}

	public function index(){
		$data['title'] = 'Data Peserta';
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();
		$data['peserta'] = $this->proses_model->getDataPeserta();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('peserta/index');
		$this->load->view('templates/footer');

	}
}