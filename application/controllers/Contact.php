<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$this->load->model('menu_model');
		$this->load->model('proses_model');

	}

	public function index(){
		echo "Contact";
	}

	public function user(){
		$send = [
			'first_name' 	=> htmlspecialchars($this->input->post('first_name')),
			'last_name' 	=> htmlspecialchars($this->input->post('last_name')),
			'email' 		=> htmlspecialchars($this->input->post('email')),
			'contact' 		=> htmlspecialchars($this->input->post('contact')),
			'question' 		=> htmlspecialchars($this->input->post('Message'))
		];

		$this->db->insert('tbl_question_user', $send);
		redirect('welcome');
	}

	public function registrasi(){
		$email = htmlspecialchars($this->input->post('email'));
		$first_name = htmlspecialchars($this->input->post('first_name'));
		$last_name = htmlspecialchars($this->input->post('last_name'));

		$user = [
			'email' 		=> $email,
			'first_name' 	=> $first_name,
			'last_name' 	=> $last_name,
			'kode'			=> $this->session->userdata('code_tes'),
			'created_at'	=> time()
		];
		
		$cek_akun = $this->db->query("SELECT r.ID FROM tbl_user_regist as r LEFT JOIN tbl_user_score as s on s.id_user=r.ID WHERE r.email='$email' AND s.submit='0' ");
        if ($cek_akun->num_rows() > 0){ 
            $x = $cek_akun->row_array();
	        $id = $x['ID'];
        }else{
            $this->db->insert('tbl_user_regist', $user);
	        $id = $this->db->insert_id();
        }
	

		$sess = [
			'id' 		 => $id,
			'email' 	 => $email,
			'first_name' => $first_name,
			'last_name'  => $last_name,
			'time'  	 => time(),
			'zone'       => $this->input->post('zone')
		];
		$this->session->set_userdata($sess);
		redirect('section/section_listening');
	}
	
	public function check_jawaban(){
	    $this->load->view('theme/travel/header');
        $this->load->view('soal/jawaban');
    	$this->load->view('templates/footer'); 
	}
	
	public function ambil_jawaban(){
	    $email = $this->input->post('email');
	    $data['peserta'] = $this->proses_model->cek_jawaban($email)->row();
	    
	    $this->load->view('theme/travel/header');
	    $this->load->view('soal/list_jawaban', $data);
    	$this->load->view('templates/footer'); 
	}


}