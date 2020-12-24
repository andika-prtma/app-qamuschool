<?php 

function is_logged_in(){
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		$id_role 	= $ci->session->userdata('id_role');
		$menu 		= $ci->uri->segment(1);

		$ci->load->model('auth_model');
		$queryMenu = $ci->auth_model->checkMenu($menu)->row();

		$menu_id = $queryMenu->ID;

		$data = ['id_role' => $id_role,
				 'id_menu' => $menu_id];
		$userAccess = $ci->auth_model->checkAccess($data);

		if ($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}

}

function check_access($id_role, $id_menu){
	$ci = get_instance();

	$result = $ci->db->get_where('tbl_user_access_menu', ['id_role' => $id_role, 'id_menu' => $id_menu]);

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}


function konfirmasi_ujian(){
	$ci = get_instance();

	$kode  = $ci->session->userdata('code_tes');
	$id    = $ci->session->userdata('id');
	$email = $ci->session->userdata('email');


	$cek = $ci->db->query("SELECT * FROM tbl_user_score AS score 
					LEFT JOIN tbl_user_regist AS regist 
					ON regist.ID = score.id_user
					WHERE regist.email = $email AND score.submit = 1 AND regist.kode = $kode
				");
	if ($cek->num_rows() > 0){
		redirect('/');
	}else{
		return FALSE;
	}
}

function _defaultscore($scr){
	$ci = get_instance();
	if ($scr == null) {
		$scr = 0;
	}
	$score = $ci->db->get_where('mst_default_score', ['jawaban_benar' => $scr])->row();
	return $score;
}

function _finalscore($s1, $s2, $s3){
	$jumlah = intval($s1)+intval($s2)+intval($s3);
	$jumlah = $jumlah*10;
	$akhir  = $jumlah/3;

	return $akhir;
}

function redirectLogin(){
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		$ci->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Silahkan Login</div>');
		redirect('admin');
	} else {
		return false;
	}
}

function cek_login_free(){
	$ci = get_instance();

	if (!$ci->session->userdata('email')) {
		$ci->session->set_userdata('direct', 'daftar-free');
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan Login terlebih dahulu</div>');
		redirect('login');
	}
}

function cek_login_member(){
	$ci = get_instance();

	if (!$ci->session->userdata('email')) {
		$ci->session->set_userdata('direct', 'daftar-member');
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan Login terlebih dahulu</div>');
		redirect('login');
	}
}