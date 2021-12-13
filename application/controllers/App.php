<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model', 'app');
		$this->load->library('Pdf');
		is_admin();
	}

	public function index()
	{
		$data['title'] = 'AbsensiAPP';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);

		$data['pengumuman'] = $this->app->getPengumuman();
		$data['jmlabsen'] = $this->app->jmlKonfirmasiapp();
		$data['absen'] = $this->app->getKonfirmasiapp();
		$data['page'] = 'app';
		$data['user'] = $user;
		$data['pengguna'] = $this->app->pengguna();

		$kalender = array(
			'start_day' => 'monday',
			'day_type' => 'short'
		);
		$this->load->library('calendar', $kalender);
		$data['kalender'] = $this->calendar->generate();

		$masuk = $this->app->getRekapAppMasuk();
		$sakit = $this->app->getRekapAppSakit();
		$ijin = $this->app->getRekapAppIjin();
		$jumlah = $this->app->jumlahsiswa();
		$data['masuk'] = $masuk/$jumlah*100;
		$data['sakit'] = $sakit/$jumlah*100;
		$data['ijin'] = $ijin/$jumlah*100;

		$data['jammasuk'] = $this->db->get_where('time', ['id_time' => 1])->row_array();
		$data['jampulang'] = $this->db->get_where('time', ['id_time' => 2])->row_array();
		$this->load->view('template/template', $data);
			
	}

	public function profile()
	{
		$this->form_validation->set_rules('username', 'Nama', 'required|trim',[
			'required' => 'Nama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$id = $this->session->userdata('id');
			$user = $this->app->getUser($id);

			$data['pengumuman'] = $this->app->getPengumuman();
			$data['page'] = 'app';
			$data['user'] = $user;
			$this->load->view('template/template', $data);
		}else{
			$id = $this->input->post('id');

			$data = [
				'username'	=> $this->input->post('username'),
				'email' 	=> $this->input->post('email'),
				'alamat'	=> $this->input->post('alamat'),
				'gender'	=> $this->input->post('gender'),
			];

			if(!empty( $this->input->post('photo'))){
				$upload 	 = $this->app->uploadImage();

				// Jika upload berhasil
				if($upload){
					// Ambil data user
					$imageProfile = $this->app->getUser($id);
					// Hapus foto user sebelum di update
					if(file_exists('image/' . $imageProfile['photo']) && $imageProfile['photo']){
						unlink('image/' . $imageProfile['photo']);
					}
					
					// Timpa data foto dengan nama yg baru
					$data['photo'] = $upload;
				}else{
					$this->session->set_flashdata('message', 'Data profil berhasil diubah'); 
					redirect(base_url("app"));
				}
			}

			$this->app->updateProfile($id, $data);
			$this->session->set_flashdata('message', 'Data profil berhasil diubah'); 
			redirect(base_url('app'));
			
		}
	}
	
	public function ubah_password()
	{
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim',[
			'required' => 'Password baru tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[new_password]',[
			'required' => 'Konfirmasi password tidak boleh kosong.',
			'matches'  => 'Konfirmasi password tidak sesuai'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('salah', 'Password gagal diupdate.');

			redirect(base_url('app'));
		}else{
			$id = $this->session->userdata('id_users');
			$data = [
				'password' => hashEncrypt($this->input->post('new_password')),
			];

			$this->app->updatePassword($id, $data);
			$this->session->set_flashdata('message', 'Password berhasil diupdate.');

			redirect(base_url('app'));
		}		
	}

	public function add() 
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
			'required' 	  => 'Email tidak boleh kosong.',
			'valid_email' => 'Email tidak valid',
		   'is_unique'	  => 'Email sudah terdaftar.' 
		]);

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'Tambah data pengguna';
			$id = $this->session->userdata('id_users');
			$user = $this->app->getUser($id);
			$data['kelas'] = $this->db->get('positions')->result_array();
			$data['user'] = $user;
			$data['page'] = 'adduser';
			$this->load->view('template/template', $data);
		}else{
			$data = [
				'username'		=> $this->input->post('nama'),
				'nisn'			=> $this->input->post('nisn'),
				'position_id'	=> $this->input->post('position_id'),
				'email' 		=> strtolower($this->input->post('email')),
				'password' 		=> hashEncrypt($this->input->post('password')),
				'gender'		=> $this->input->post('gender'),
				'alamat'		=> $this->input->post('alamat'),
				'role_id' 		=> 2
			];
			
			$this->app->insertUser($data);
			$this->session->set_flashdata('message', 'Data Pengguna berhasil ditambahkan');
			redirect(base_url('data'));
		}
	}

	public function tabel_konfirmasi()
	{
		$data['title'] = 'Konfirmasi absensi';
		$position = $this->input->get('position_id');
		$data['kelas'] = $this->db->get('positions')->result_array();
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['absen'] = $this->app->getKonfirmasi($position);
		$data['user'] = $user;
		$data['page'] = 'admin/absensi/konfirmasi';
		$this->load->view('template/template', $data);
	}

	public function konfirmasi($id)
	{
		$data = $this->app->getAbsensi($id);
		$data['status'] = 1;
		
		$this->app->updateAbsensi($id, $data);
		$this->session->set_flashdata('message', 'Absensi berhasil dikonfirmasi.');

		redirect(base_url('app/tabel_konfirmasi'));
	}

	public function tolak($id)
	{
		$data = $this->app->getAbsensi($id);
		$data['status'] = 2;
		
		$this->app->updateAbsensi($id, $data);
		$this->session->set_flashdata('message', 'Absensi berhasil dikonfirmasi.');

		redirect(base_url('app/tabel_konfirmasi'));
	}

	public function tabel_absensi()
	{
		$data['title'] = 'Tabel data absensi';
		$position = $this->input->get('position_id');
		$tanggal = $this->input->get('tanggal');
		$data['kelas'] = $this->db->get('positions')->result_array();
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['absen'] = $this->app->getabsensiperhari($position, $tanggal);
		$data['user'] = $user;
		$data['page'] = 'admin/absensi/tabel';
		$this->load->view('template/template', $data);
	}

	public function tabel_rekap()
	{
		$data['title'] = 'REKAPITULASI ABSENSI';
		$position = $this->input->get('position_id');
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$data['kelas'] = $this->db->get('positions')->result_array();
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['absen'] = $this->app->getRekap($position, $start, $end);
		$data['url_export'] = 'export_excel?position_id='.$position.'&start='.$start.'&end='.$end;
		$data['url_exportPDF'] = 'export_pdf?position_id='.$position.'&start='.$start.'&end='.$end;
		$data['url_exportCetak'] = 'export_cetak?position_id='.$position.'&start='.$start.'&end='.$end;
		$data['user'] = $user;
		$data['page'] = 'admin/absensi/rekap';
		$this->load->view('template/template', $data);
	}

	public function export_excel(){
		$position = $_GET['position_id'];
		$start = $_GET['start'];
		$end = $_GET['end'];
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Jamaludin')
							   ->setLastModifiedBy('Jamaludin')
							   ->setTitle("Data Absensi")
							   ->setSubject("Siswa")
							   ->setDescription("Laporan Semua Data Absensi Siswa")
							   ->setKeywords("Data Absensi");

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

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAPITULASI DATA ABSENSI SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "MA Walisongo Pecangaan Jepara"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "Tanggal : ".$start." s/d ".$end); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A3:G3'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A6', "NO"); // Set kolom A4 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B6', "NISN"); // Set kolom B4 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C6', "NAMA"); // Set kolom C4 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D6', "KELAS"); // Set kolom D4 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E6', "HADIR"); // Set kolom E4 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F6', "SAKIT"); // Set kolom E4 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('G6', "IJIN"); // Set kolom E4 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G6')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$siswa = $this->app->exportExcel($position, $start, $end);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nisn']);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['username']);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['position_name']);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['masuk']);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['sakit']);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['ijin']);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("REKAPITULASI ABSENSI SISWA");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="print-'.date('Y-m-d').'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function export_pdf()
	{
		$position = $_GET['position_id'];
		$start = $_GET['start'];
		$end = $_GET['end'];
		$data['title'] = 'Ekspor PDF';
		$data['absen'] = $this->app->exportPDF($position, $start, $end);
		$this->load->view('admin/absensi/printpdf', $data);
	}

	public function export_cetak()
	{
		$position = $_GET['position_id'];
		$start = $_GET['start'];
		$end = $_GET['end'];
		$data['absen'] = $this->app->exportCetak($position, $start, $end);
		$this->load->view('admin/absensi/cetak', $data);
	}

	public function pengumuman()
	{
		$data['title'] = 'Tambah pengumuman';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['kelas'] = $this->db->get('positions')->result_array();
		$data['user'] = $user;
		$data['page'] = 'admin/master_data/add_pengumuman';
		$data['pengumuman'] = $this->app->getPengumuman();
		$this->load->view('template/template', $data);
	}

	public function add_pengumuman()
	{
		$this->form_validation->set_rules('pengumuman', 'Pengumuman', 'required',[
			'required' 	  => 'Pengumuman tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			redirect(base_url('app/pengumuman'));
		}else{
			$data = [
				'tanggal' => date('Y-m-d'),
				'jam'		=> date('H:i:s'),
				'pengumuman' => $this->input->post('pengumuman')
			];

			$this->app->insertPengumuman($data);
			$this->session->set_flashdata('message', 'Pengumuman berhasil ditambahkan.');

			redirect(base_url('app/pengumuman'));
		}
	}

	public function update_pengumuman($id)
	{
		$id = $this->input->post('id_pengumuman');
		$data = [
			'tanggal' => date('Y-m-d'),
			'jam'		=> date('H:i:s'),
			'pengumuman' => $this->input->post('pengumuman')
		];

		$this->app->updatePengumuman($id, $data);
		$this->session->set_flashdata('message', 'Pengumuman berhasil diubah.');

		redirect(base_url('app/pengumuman'));
	}

	public function delete_pengumuman($id)
	{
		$hapus = $this->app->detailPengumuman($id);
		$this->app->deletePengumuman($id);
		$this->session->set_flashdata('message', 'Data kelas berhasil dihapus.');
        redirect(base_url('app/pengumuman'));
	}

	public function pengaturan()
	{
		$data['title'] = 'Pengaturan';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['kelas'] = $this->db->get('positions')->result_array();
		$data['user'] = $user;
		$data['page'] = 'admin/pengaturan';
		$data['jam'] = $this->app->getJam();
		$this->load->view('template/template', $data);
	}

	public function updatejam($id)
	{
		$id = $this->input->post('id_time');
		$data = [
			'start' => $this->input->post('start'),
        	'finish' => $this->input->post('finish')
		];

		$this->app->updateJam($id, $data);
		$this->session->set_flashdata('message', 'Jam berhasil diubah.');

		redirect(base_url('app/pengaturan'));
	}
}
