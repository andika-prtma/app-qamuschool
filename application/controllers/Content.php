<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Navbar Management';
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();
		$data['navbar'] = $this->menu_model->getData('tbl_content_navbar');

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('content/index');
		$this->load->view('templates/footer');
	}

	public function navbar(){
		$data['title'] = 'Navbar Management';
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();
		$data['navbar'] = $this->menu_model->getData('tbl_content_navbar');

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('content/navbar');
		$this->load->view('templates/footer');
	}

	public function sub_navbar(){
		$id = $this->input->post('id');
		$data['subnavbar'] = $this->db->get_where('tbl_content_navbar_sub', ['id_navbar' => $id]);
		$this->load->view("content/sub_navbar", $data);
	}

	public function tambahNavbar(){
		$data = ['name' => $this->input->post("name")];
		$this->db->insert('tbl_content_navbar', $data);
		redirect('content/navbar');
	}

	public function tambahSubNavbar(){
		$data = [
			'name' 		=> $this->input->post("name"),
			'id_navbar' => $this->input->post("id_navbar"),
			'link' 		=> $this->input->post("link"),
		];
		$this->db->insert('tbl_content_navbar_sub', $data);
		redirect('content/navbar');
	}

	public function viewTPC(){
		$data['navbar'] = $this->db->get('tbl_content_navbar');
		$this->load->view('theme/travel/header');
		$this->load->view('theme/travel/navbar', $data);
		$this->load->view('theme/travel/tpc');
		$this->load->view('theme/travel/footer');
	}

	public function viewFSC(){
		$data['navbar'] = $this->db->get('tbl_content_navbar');
		$this->load->view('theme/travel/header');
		$this->load->view('theme/travel/navbar', $data);
		$this->load->view('theme/travel/fsc');
		$this->load->view('theme/travel/footer');
	}

	public function viewFLC(){
		$data['navbar'] = $this->db->get('tbl_content_navbar');
		$this->load->view('theme/travel/header');
		$this->load->view('theme/travel/navbar', $data);
		$this->load->view('theme/travel/flc');
		$this->load->view('theme/travel/footer');
	}
}