<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');

	}

	public function index(){
		$this->load->view("home/s-header");
		$this->load->view("home/c-header");
		$this->load->view("home/content/event-list");
		$this->load->view("home/c-footer");
		$this->load->view("home/s-footer");
	}

	public function v_event(){
		$this->load->view("home/s-header");
		$this->load->view("home/c-header");
		$this->load->view("home/content/event-view");
		$this->load->view("home/c-footer");
		$this->load->view("home/s-footer");
	}
}