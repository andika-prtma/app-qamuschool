<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');		
		$this->load->model('login_model');		
	}

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == false) {
		
			$this->load->view("home-new/structure/html_header");
			$this->load->view("home-new/structure/ctn_header");
			$this->load->view("home-new/login/hero");
			$this->load->view("home-new/login/login");
			$this->load->view("home-new/structure/ctn_footer");
			$this->load->view("home-new/structure/html_footer");
		} else {
			$this->procLogin();
		}
	}

	private function procLogin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->login_model->validation(['email' => $email])->row();

		if ($user) {
			if (password_verify($password, $user->password)) {
					$data = [
						'id_user' 		=> $user->ID,
						'first_name'	=> $user->first_name,
						'last_name'		=> $user->last_name,
						'email'			=> $user->email,
						'username'		=> $user->username,
						'telp'			=> $user->contact
					];

					$location = $this->db->get_where("tbl_visitor_location", ['id_visitor' => $user->ID])->row();
					$loc = [
						'lng' => $location->lng,
						'lat' => $location->lat,
						'timezone' => $location->timezone
					];
				$this->session->set_userdata($data);
				$this->session->set_userdata($loc);
				if (!$this->session->userdata('direct')) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Welcome</div>');
					redirect('home');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Login Berhasil<br> Silahkan isi data data apabila ingin mendaftar</div>');
					redirect($this->session->userdata('direct'));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
				redirect('login');	
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
			redirect('login');
		}
	}

	public function register(){

		$this->form_validation->set_rules('firstName', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_visitor.email]',['is_unique' => 'This email already exist']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_visitor.username]',['is_unique' => 'This username already exist']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' 	 => 'Password does not match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('alamat', 'Location', 'required|trim');
		$this->form_validation->set_rules('telp', 'No. Telp', 'required|trim|min_length[10]');

		if ($this->form_validation->run() == false) {
			$this->load->view("home-new/structure/html_header");
			$this->load->view("home-new/structure/ctn_header");
			$this->load->view("home-new/login/hero");
			$this->load->view("home-new/login/register");
			$this->load->view("home-new/structure/ctn_footer");
			$this->load->view("home-new/structure/html_footer");	
		} else {
			$first_name = htmlspecialchars($this->input->post('firstName', true));
			$last_name 	= htmlspecialchars($this->input->post('lastName', true));
			$email 		= htmlspecialchars($this->input->post('email', true));
			$username 	= htmlspecialchars($this->input->post('username', true));
			$telp 		= htmlspecialchars($this->input->post('telp', true));
			$lng = $this->input->post('lng');
			$lat = $this->input->post('lat');
			$loc = $this->input->post('alamat');
			$zone = $this->timeZone($lat, $lng);

			$data 	= [ 	
				'first_name'	=> $first_name,
				'last_name'		=> $last_name,
				'email'			=> $email,
				'username'		=> $username,
				'contact'		=> $telp,
				'password'  	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'created_at' 	=> time()
			];
			$this->auth_model->insertData('tbl_visitor', $data);
			$id_user = $this->db->insert_id();
			$loc  = [
				'id_visitor' => $id_user,
				'location' => $loc,
				'lng' => $lng,
				'lat' => $lat,
				'timezone' => $zone
			];
			$this->auth_model->insertData('tbl_visitor_location', $loc);


			$user = [
				'id_user' 		=> $id_user,
				'first_name'	=> $first_name,
				'last_name'		=> $last_name,
				'email'			=> $email,
				'username'		=> $username,
				'lng' 			=> $lng,
				'lat' 			=> $lat,
				'timezone'		=> $zone,
				'telp'			=> $telp
			];

			$this->session->set_userdata($user);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun sudah dibuat. Anda bisa mulai test simulasi</div>');
			redirect('home');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	private function timeZone($lat, $lng){
		$api = waktu("http://api.timezonedb.com/v2.1/get-time-zone?key=1WDUKNF8BW8T&format=json&by=position&lat=".$lat."&lng=".$lng);
    
		$x   = json_decode($api['content']);
    	
    	return $x->zoneName;
	}
	
	public function forgotPassword(){
	    $this->load->view("home-new/structure/html_header");
		$this->load->view("home-new/structure/ctn_header");
		$this->load->view("home-new/login/hero");
		$this->load->view("home-new/login/forgot-password");
		$this->load->view("home-new/structure/ctn_footer");
		$this->load->view("home-new/structure/html_footer");
	}
	
	public function changeProses(){
	    $email = $this->input->post('email');
	    $cek = $this->db->get_where('tbl_visitor', ['email' => $email])->row();
	    if($cek){
	       $this->session->set_userdata('changeEmail', $email);
	       redirect ('login/inputPassword');
	    } else {
	        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun tidak terdaftar</div>');
			redirect('login/forgotPassword');
	    }
	}
	
	public function inputPassword(){
	   
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' 	 => 'Password does not match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view("home-new/structure/html_header");
    		$this->load->view("home-new/structure/ctn_header");
    		$this->load->view("home-new/login/hero");
    		$this->load->view("home-new/login/input-password");
    		$this->load->view("home-new/structure/ctn_footer");
    		$this->load->view("home-new/structure/html_footer");
		} else {
			$email = $this->session->userdata('changeEmail');
            
            $this->db->set('password', password_hash($this->input->post('password1'), PASSWORD_DEFAULT));
            $this->db->where('email', $email);
            $this->db->update('tbl_visitor');
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password sudah dirubah, silahkan login kembali</div>');
			redirect('login');
	    }
	}
	

}