<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');

		//is_logged_in();
	}

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Qamuschool | Admin Login';
			$this->load->view('panel/login/header', $data);
			$this->load->view('panel/login/index');
			$this->load->view('panel/login/footer');
		} else {
			$this->_login();
		}
	}

	private function _login(){
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('tbl_user_login', ['email' => $email])->row();
		if ($user) {
			//jika user active
			if ($user->is_active == 1) {
				// if (password_verify($password, $user->password)) {
				if($password == $user->password){
					$data = [
						'email' 		=> $user->email,
						'id_role' 		=> $user->id_role,
						'username' 		=> $user->username,
						'first_name' 	=> $user->first_name,
						'last_name'		=> $user->last_name,
						'id_user'		=> $user->ID
					];
					$this->session->set_userdata($data);
					redirect('admin/home');
					// ====== Jika mau buat halaman user validation disini
					// if ($user->id_role == 1) {
					// 	redirect('admin');
					// } else {
					// 	redirect('user');
					// }
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
					redirect('admin');	
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated</div>');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
			redirect('admin');
		}		
	}

	public function home(){
		redirectLogin();
		$data['title'] = 'Qamuschool | Dashboard';
				
		$this->load->view('panel/home/header', $data);
		$this->load->view('panel/home/sidebar');
		$this->load->view('panel/home/topbar');
		$this->load->view('panel/home/index');
		$this->load->view('panel/home/footer-content');
		$this->load->view('panel/home/footer', $data);
	}

	public function logout(){
		// $this->session->sess_destroy();
		$this->session->unset_userdata([
			'email',
			'id_role',
			'username',
			'first_name',
			'last_name',
			'id_user',
		]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout!</div>');
		redirect('admin');
	}


}