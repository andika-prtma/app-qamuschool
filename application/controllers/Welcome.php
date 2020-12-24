<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('proses_model');
	}

	public function index(){
		$data['navbar'] = $this->db->get('tbl_content_navbar');


		$this->load->view('theme/travel/header');
		$this->load->view('theme/travel/navbar', $data);
		$this->load->view('theme/travel/index');
		$this->load->view('theme/travel/footer');
	}

	 

	//this is for load travel template
	public function travel_theme(){
	}

	public function json(){
		$jawaban = $this->db->get_where('tbl_user_score', ['id_user' => '13'])->row();

		echo $jawaban->section_one;

	}

	public function ini_buat_drop(){
		$hapus = $this->db->query("DELETE FROM tbl_user_score");
		$hapus = $this->db->query("DELETE FROM tbl_user_regist");
		if ($hapus){
			echo "Done";
		}
	}
	
	public function checking(){
	    $jawaban = $this->db->query("SELECT * FROM tbl_user_score WHERE ID = '124' ")->row();
	    
	    
	    foreach(json_decode($jawaban->section_one) as $jb){
	        echo $jb->nomor. ' '.$jb->jawab.'<br>';
	    }
	}
	public function jscountdown(){
		$this->load->view('test');
	}
	
	public function check_countdown(){
	    $this->load->view('time/run');
	}
	
	public function timezone(){
	   // date_default_timezone_set('Asia/Jayapura');
	   // echo date('H:i');
	   // date_default_timezone_set('Asia/Jakarta');
	   // echo date('H:I');
	    date_default_timezone_set('Asia/Makassar');
	    echo date('H:i');
	}
	
	public function jumlah_join(){
		$user = $this->proses_model->getDataPeserta()->num_rows();

		echo $user;
	}

	public function insert_nilai(){
		$user = $this->proses_model->getDataPeserta()->result();

		foreach ($user as $u) {
			$s1 = 0;
			$s2 = 0;
			$s3 = 0;

			if ($u->true_one != null) {
				$s1 = $u->true_one;
			}

			if ($u->true_two != null) {
				$s2 = $u->true_two;
			}

			if ($u->true_three != null) {
				$s3 = $u->true_three;
			}

			$nilai1 = intval(_defaultscore($s1)->listening);
			$nilai2 = intval(_defaultscore($s2)->structure);
			$nilai3 = intval(_defaultscore($s3)->reading);

			// $nilai1 = intval($nilai1->listening);
			// $nilai2 = intval($nilai2->structure);
			// $nilai3 = intval($nilai3->reading);
			$akhir = _finalscore($nilai1, $nilai2, $nilai3);
			$daftar = [
				'id_jawaban' 		=> $u->ID,
				'convert_section1'  => $nilai1,
				'convert_section2'  => $nilai2,
				'convert_section3'  => $nilai3,
				'hasil_akhir'  		=> round($akhir),
			];
	
			$this->db->insert('tbl_user_score_final', $daftar);
		}
			echo "done";
	}
	
	public function extreme(){
		$user = $this->db->group_by('email')->get('tbl_user_regist')->result();

		$kosong = 0;
		foreach ($user as $us) {
			$cek = $this->db->get_where('tbl_user_score', ['id_user' => $us->ID])->num_rows();
			if ($cek > 0) {
				$kosong++;
			}
		}

		echo $kosong;
	}
	
	public function export_excel(){

	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();

	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('My Notes Code')
	                 ->setLastModifiedBy('My Notes Code')
	                 ->setTitle("Data Peserta")
	                 ->setSubject("Qamuschool")
	                 ->setDescription("Data peserta")
	                 ->setKeywords("Data Peserta");

	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PESERTA"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Email"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "First Name"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Last Name"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Score Section 1"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Score Section 2"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Score Section 3"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Final Score"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jumlah Betul Section 1"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('K3', "Jumlah Betul Section 2"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('L3', "Jumlah Betul Section 3"); // Set kolom E3 dengan tulisan "ALAMAT"
	    

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
	   

	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $peserta = $this->proses_model->getDataPesertaExcelBaru()->result();

	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($peserta as $data){ // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, ' ');
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, strtolower($data->email));
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, ucwords(strtolower($data->first_name)));
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, ucwords(strtolower($data->last_name)));
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->convert_section1);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->convert_section2);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->convert_section3);
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->hasil_akhir);
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->true_one);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->true_two);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->true_three);
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }

	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(5); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Data Peserta");
	    $excel->setActiveSheetIndex(0);

	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Peserta.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');

	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');

	}
	
	public function export_excel_baru(){
        date_default_timezone_set('Asia/Jakarta');
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();

	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('My Notes Code')
	                 ->setLastModifiedBy('My Notes Code')
	                 ->setTitle("Data Peserta")
	                 ->setSubject("Qamuschool")
	                 ->setDescription("Data peserta")
	                 ->setKeywords("Data Peserta");

	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PESERTA"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Tanggal"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Email"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "First Name"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Last Name"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Score Section 1"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Score Section 2"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Score Section 3"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Final Score"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jumlah Betul Section 1"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('K3', "Jumlah Betul Section 2"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('L3', "Jumlah Betul Section 3"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('M3', "Waktu Mulai"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('N3', "Waktu Selesai"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('O3', "Location"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('P3', "Timezone"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Tanggal Ujian"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('R3', "Type Member"); // Set kolom E3 dengan tulisan "ALAMAT"
	    

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
	   

	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $peserta = $this->proses_model->getDataPesertaExcelBaru()->result();

	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($peserta as $data){ // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tgl);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, strtolower($data->email));
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, ucwords(strtolower($data->first_name)));
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, ucwords(strtolower($data->last_name)));
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->convert_section1);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->convert_section2);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->convert_section3);
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->hasil_akhir);
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->true_one);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->true_two);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->true_three);
	      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, date('d-m-Y H:i', $data->start_test));
	      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, date('d-m-Y H:i', $data->finish_test));
	      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->location);
	      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->timezone);
	      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->tgl_ujian);
	      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->type_member);
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }

	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(5); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Data Peserta");
	    $excel->setActiveSheetIndex(0);

	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Peserta.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');

	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');

	}
	
	
	public function new_theme(){
	    $this->load->view('landing_page/top');
	    $this->load->view('landing_page/navbar');
	    $this->load->view('landing_page/header');
	    $this->load->view('landing_page/index');
	    $this->load->view('landing_page/footer');
	    $this->load->view('landing_page/bottom');
	}
	
	public function new_tpc(){
	    $this->load->view('landing_page/top');
	    $this->load->view('landing_page/navbar');
	    $this->load->view('landing_page/header');
	    $this->load->view('landing_page/content/tpc');
	    $this->load->view('landing_page/footer');
	    $this->load->view('landing_page/bottom');
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
	
	public function oi(){
// 		$link = 'http://api.timezonedb.com/v2.1/get-time-zone?key=1WDUKNF8BW8T&format=json&by=position&lat=40.689247&lng=-74.044502';
// 		print_r(json_decode(file_get_contents($link)));

    $api = $this->teste('http://api.timezonedb.com/v2.1/get-time-zone?key=1WDUKNF8BW8T&format=json&by=position&lat=-3.6386665&lng=128.1688559');
    $x   = json_decode($api['content']);
    var_dump($x->zoneName);
    date_default_timezone_set($x->zoneName);
    echo date('Y-m-d H:i:s');

	}
	
	public function teste($url, $cookiesIn = ''){
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => true,     //return headers in addition to content
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLINFO_HEADER_OUT    => true,
            CURLOPT_SSL_VERIFYPEER => true,     // Validate SSL Cert
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_COOKIE         => $cookiesIn
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $rough_content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header_content = substr($rough_content, 0, $header['header_size']);
        $body_content = trim(str_replace($header_content, '', $rough_content));
        $pattern = "#Set-Cookie:\\s+(?<cookie>[^=]+=[^;]+)#m"; 
        preg_match_all($pattern, $header_content, $matches); 
        $cookiesOut = implode("; ", $matches['cookie']);

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['headers']  = $header_content;
        $header['content'] = $body_content;
        $header['cookies'] = $cookiesOut;
    return $header;

	}
	
	public function map(){
	    $this->load->view('test');
	}
	
	public function active_code($kode, $param){
	    $this->db->set('is_active', $param);
        $this->db->where('kode', strtoupper($kode));
        $this->db->update('tbl_kode');
        echo "Success";
	}
	
	public function import_view(){
	    $this->load->view('import_excel');
	}
	
	public function import_soal(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('welcome/import_view');

        } else {

            $data_upload = $this->upload->data();

            $excelreader    = new PHPExcel_Reader_Excel2007();
            $loadexcel      = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet          = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                if($numrow > 1){
                    array_push($data, [
                        // 'id_batch'   => $row['A'],
                        // 'id_pilihan' => $row['A'],
                        'id_soal' => $row['A'],
                        //'id_audio'   => $row['B'],
                        // 'id_section_three' => $row['A'],
                        // 'id_kode' => $row['A'],
                        'id_paket'  => $row['B'],
                        'nomor'     => $row['C'],
                        'jawaban'   => $row['D']
                        // 'answerA'    => $row['D'],
                        // 'answerB'    => $row['E'],
                        // 'answerC'    => $row['F'],
                        // 'answerD'    => $row['G'],
                        // 'soal' => $row['D']
                    ]);
                }
                $numrow++;
            }
						
            			
            $this->db->insert_batch('tbl_section_three_key', $data);
            echo "success";
            // delete file from server
            // unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            // $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            
            //var_dump($data);
            // foreach ($data as $usr) {
            //     echo $usr['nomor'].'<br>';
            // }

        }
    }
	
	public function ses(){
	    var_dump($this->session->userdata());
	}
	

	


}
