<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('form_validation');
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

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->auth_model->validation(['email' => $email])->row();

		//jika user ada
		if ($user) {
			//jika user active
			if ($user->is_active == 1) {
				if (password_verify($password, $user->password)) {
					$data = ['email' => $user->email,
							'id_role' => $user->id_role];
					$this->session->set_userdata($data);
					if ($user->id_role == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
					redirect('auth');	
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
			redirect('auth');
		}


	}


	public function registration(){
		$this->goDefaultPage();
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]',['is_unique' => 'This email already exist']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' 	 => 'Password does not match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [ 	'name'		=> htmlspecialchars($this->input->post('name', true)),
						'email'		=> htmlspecialchars($email),
						'image'		=> 'default.jpg',
						'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
						'id_role'	=> 2,
						'is_active'	=> 0,
						'date_created' => time()
					];
			//siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token'	=> $token,
				'date_created' => time()
			];

			$this->auth_model->insertData('tbl_user', $data);
			$this->auth_model->insertData('tbl_user_token', $user_token);
			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created. Please activate your account</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type){
		$email = $this->input->post('email');
		// $config = [
		// 	'protocol' 	=> 'smtp',
		// 	'smtp_host' => 'ssl://smtp.googlemail.com',
		// 	'smtp_user' => 'muhammadridwanshidiq1201@gmail.com',
		// 	'smtp_pass' => 'Ridwan321#@!',
		// 	'smtp_port' => 465,
		// 	'mailtype'	=> 'html',
		// 	'charset'	=> 'utf-8',
		// 	'newline'	=> "\r\n"
		// ];
		// $this->load->library('email', $config);
		// WPU 

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
		$this->email->to($this->input->post('email'));
		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="'. base_url('auth/verify').'?email='.$email.'&token='.urlencode($token).'">Activate</a>');
		} else if ($type == 'forgot'){
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="'. base_url('auth/resetPassword').'?email='.$email.'&token='.urlencode($token).'">Reset</a>');
		} 

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify(){
		$email = $this->input->get('email');
		$token = $this->input->get("token");

		$user  = $this->db->get_where("tbl_user", ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where("tbl_user_token", ['token' => $token])->row();
			if ($user_token) {
				if (time() - $user_token->date_created < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('tbl_user');

					$this->db->delete('tbl_user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$email.' has been activated! Please Login</div>');
					redirect('auth');
				} else {
					$this->db->delete('tbl_user', ['email' => $email]);
					$this->db->delete('tbl_user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your activation failed! Token Expired.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your activation failed! Token invalid.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your activation failed! Wrong email.</div>');
			redirect('auth');

		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout!</div>');
		redirect('auth');
	}

	public function blocked(){
		$this->load->view("auth/blocked");
	}

	public function goDefaultPage(){
		switch ($this->session->userdata('id_role')) {
			case '1':
				redirect('admin');
				break;
			case '2':
				redirect('user');
				break;
		}
	}

	public function forgotPassword(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post("email");
			$user  = $this->db->get_where('tbl_user', ['email' => $email, 'is_active' => 1 ])->row();
			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('tbl_user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset password!</div>');
				redirect('auth/forgotPassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or not registered!</div>');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function resetPassword(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user  = $this->db->get_where("tbl_user", ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row();
			if ($user_token) {
				$this->session->set_userdata("reset_email", $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password failed! Wrong token</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password failed! Wrong email</div>');
			redirect('auth');
		}
	}

	public function changePassword(){
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');	
		$this->form_validation->set_rules('password2', 'Repeat password', 'trim|required|min_length[5]|matches[password1]');
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set("password", $password);
			$this->db->where('email', $email);
			$this->db->update('tbl_user');
			$this->db->delete('tbl_user_token', ['email' => $email]);
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been change! Please login</div>');
			redirect('auth');
		}
	}
}