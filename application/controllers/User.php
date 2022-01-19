<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model', 'app');
		$this->load->model('user_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'PresensiAPP';
		$id = $this->session->userdata('id_users');
		$data['pengumuman'] = $this->app->getPengumuman();
		$user = $this->app->getUser($id);
		$data['user'] = $user;
		$data['page'] = 'app';
		$data['pengguna'] = $this->app->pengguna();
		$this->load->view('template/templateUser', $data);
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
					$this->session->set_flashdata('salah', 'Data gagal diubah'); 
					redirect(base_url("user"));
				}
			}

			$this->app->updateProfile($id, $data);
			$this->session->set_flashdata('message', 'Data profil berhasil diubah'); 
				redirect(base_url('user'));
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

			redirect(base_url('user'));
		}else{
			$id = $this->session->userdata('id_users');
			$data = [
				'password' => hashEncrypt($this->input->post('new_password')),
			];

			$this->app->updatePassword($id, $data);
			$this->session->set_flashdata('message', 'Password berhasil diupdate.');

			redirect(base_url('user'));
		}		
	}

	public function entri()
	{
		$data['title'] = 'Entri presensi';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['user'] = $user;
		$data['page'] = 'user/kehadiran/entri';
		$data['pengguna'] = $this->app->pengguna();
		$data['absen'] = $this->app->getEntriSiswa($id);
		$this->load->view('template/templateUser', $data);
	}

	public function input_absensi()
	{
		$today = date('Y-m-d');
		$time = date('H:i:s');
		$masuk = $this->db->get_where('time', ['id_time' => 1])->row_array();
		$pulang = $this->db->get_where('time', ['id_time' => 2])->row_array();
		$absen = $this->db->get_where('presents', ['user_id' => $this->session->userdata('id_users'), 'date' => $today])->row_array();
		if($this->input->post('tipe')=='M' && !empty($absen['time'])) {
			$this->session->set_flashdata('salah', 'Anda sudah melakukan presensi masuk hari ini');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='P' && !empty($absen['time_pulang'])) {
			$this->session->set_flashdata('salah', 'Anda sudah melakukan presensi pulang hari ini');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='M' && $time <= $masuk['start'] ) {
			$this->session->set_flashdata('salah', 'Belum saatnya presensi');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='M' && $time >= $masuk['finish'] ) {
			date_default_timezone_set('Asia/Jakarta');
			$data = [
				'user_id'		=> $this->session->userdata('id_users'),
				'date'			=> date('Y-m-d'),
				'time'			=> date('H:i:s'),
				'time_pulang'	=> null,
				'information'	=> 'T',
				'status'		=> 0,
				'latitude'		=> $this->input->post('latNow'),
				'longitude'		=> $this->input->post('lngNow')

			];
			$this->user->insertEntri($data);
			$this->session->set_flashdata('message', 'Entri presensi berhasil. Silahkan tunggu konfirmasi oleh administator.');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='P' && $time <= $pulang['start'] ) {
			$this->session->set_flashdata('salah', 'Belum saatnya presensi');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='P' && $time >= $pulang['finish'] ) {
			$this->session->set_flashdata('salah', 'Belum saatnya presensi');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='M' && empty($absen['time'])) {
			date_default_timezone_set('Asia/Jakarta');
			$data = [
				'user_id'		=> $this->session->userdata('id_users'),
				'date'			=> date('Y-m-d'),
				'time'			=> date('H:i:s'),
				'time_pulang'	=> null,
				'information'	=> $this->input->post('tipe'),
				'status'		=> 0,
				'latitude'		=> $this->input->post('latNow'),
				'longitude'		=> $this->input->post('lngNow')

			];

			$this->user->insertEntri($data);
			$this->session->set_flashdata('message', 'Entri presensi berhasil. Silahkan tunggu konfirmasi oleh administator.');

			redirect(base_url('user/entri'));
		} else ($this->input->post('tipe')=='P' && !empty($absen['time']) && empty($absen['time_pulang'])); {
			date_default_timezone_set('Asia/Jakarta');
			$id = $this->session->userdata('id_users');
			$data = [
				'time_pulang'	=> date('H:i:s')
			];

			$this->user->updateEntri($id, $data, $today);
			$this->session->set_flashdata('message', 'Entri presensi berhasil. Silahkan tunggu konfirmasi oleh administator.');

			redirect(base_url('user/entri'));
		}
		
	}

	public function ijin()
	{
		$surat			= $_FILES['surat'];
		if ($surat=''){}else{
			$config['upload_path']	='./assets/surat';
			$config['allowed_types']='jpg|jpeg|png|pdf';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('surat')){
				$this->session->set_flashdata('salah', 'Gagal mengunggah file!');
				redirect(base_url('user/entri'));
			}else{
				$surat=$this->upload->data('file_name');
			}
		}
		$data = [
			'user_id'		=> $this->session->userdata('id_users'),
			'date'			=> date('Y-m-d'),
			'time'			=> date('H:i:s'),
			'information'	=> $this->input->post('tipe'),
			'keterangan'	=> $this->input->post('keterangan'),
			'status'		=> 0,
			'surat'			=> $surat,
			'latitude'		=> $this->input->post('latNow1'),
			'longitude'		=> $this->input->post('lngNow1')			
		];

		$this->user->insertEntri($data);
		$this->session->set_flashdata('message', 'Entri presensi berhasil. Silahkan tunggu konfirmasi oleh administator.');

		redirect(base_url('user/entri'));
	}

	public function tabel_absensisiswa()
	{
		$data['title'] = 'Tabel presensi';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['user'] = $user;
		$data['page'] = 'user/kehadiran/tabel';
		$data['absen'] = $this->app->getAbsensisiswa($id);
		$data['masuk'] = $this->user->getMasuk();
		$data['sakit'] = $this->user->getSakit($id);
		$data['ijin'] = $this->user->getIjin($id);
		$data['terlambat'] = $this->user->getTerlambat($id);
		$this->load->view('template/templateUser', $data);
	}

	public function fullcalender_load()
	{
		$id = $this->session->userdata('id_users');
		$load = $this->app->getAbsensisiswa($id);
		foreach ($load as $row) {
			$data[] = array(
				'title' => $row['information'],
				'start' => $row['date'],
				'color' => 'green'
			);
		}
		echo json_encode($data);
	}

	public function kartu()
	{
		$data['user'] = $this->app->getUser($this->session->userdata('id_users'));
		$this->load->view('user/profile/kartu', $data);
	}

	public function ciqrcode($kode)
    {
        qrcode::png(
            $kode,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 1
        );
    }
}