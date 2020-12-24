<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		is_logged_in();
	}

	public function index(){
		$data['title'] = 'My Profile';
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/index');
		$this->load->view('templates/footer');
	}

	public function edit(){
		$data['title'] = 'Edit Profile';
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();
		$old_img = $data['user']->image;
		$this->form_validation->set_rules('fullname', 'Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/edit');
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('fullname');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					if ($old_img != 'default.jpg') {
						unlink(FCPATH.'assets/img/profile/'.$old_img);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}


			$this->db->set('name', $name);
			$this->db->where("email", $email);
			$this->db->update('tbl_user');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Profile Update</div>');
			redirect('user');
		}
	}

	public function changePassword(){
		$data['title'] = 'Change Password';
		$data['user']  = $this->user_model->getUser(['email'=> $this->session->userdata('email')])->row();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/change-password');
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post("current_password");
			$new_password = $this->input->post("new_password1");
			if (!password_verify($current_password, $data['user']->password)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
				redirect('user/changePassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('user/changePassword');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata("email"));
					$this->db->update('tbl_user');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password changed</div>');
					redirect('user/changePassword');
				}
			}
		}
	}
	
	public function testmail(){
		//Original CI
		$this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'andikarachadi@gmail.com';
        $config['smtp_pass'] = 'voidgenome';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        //original CI

		$this->email->from('andikarachadi@gmail.com', 'Andika');
		$this->email->to('andika.rach4@gmail.com');

		$this->email->subject('Test');
		$this->email->message('Testtttt');
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}