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
		$data['title'] = 'AbsensiAPP';
		$id = $this->session->userdata('id_users');
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

	public function entri()
	{
		$data['title'] = 'Entri absensi';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['user'] = $user;
		$data['page'] = 'user/kehadiran/entri';
		$data['pengguna'] = $this->app->pengguna();
		$this->load->view('template/templateUser', $data);
	}

	public function input_absensi()
	{
		$today = date('Y-m-d');
		$absen = $this->db->get_where('presents', ['user_id' => $this->session->userdata('id_users'), 'date' => $today])->row_array();
		if($this->input->post('tipe')=='M' && !empty($absen['time'])) {
			$this->session->set_flashdata('salah', 'Anda sudah melakukan absen masuk hari ini');
			redirect(base_url('user/entri'));
		} elseif ($this->input->post('tipe')=='P' && !empty($absen['time_pulang'])) {
			$this->session->set_flashdata('salah', 'Anda sudah melakukan absen pulang hari ini');
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
			$this->session->set_flashdata('message', 'Entri absensi berhasil. Silahkan tunggu konfirmasi oleh administator.');

			redirect(base_url('user/entri'));
		} else ($this->input->post('tipe')=='P' && empty($absen['time'])); {
			date_default_timezone_set('Asia/Jakarta');
			$id = $this->session->userdata('id_users');
			$data = [
				'time_pulang'	=> date('H:i:s')
			];

			$this->user->updateEntri($id, $data, $today);
			$this->session->set_flashdata('message', 'Entri absensi berhasil. Silahkan tunggu konfirmasi oleh administator.');

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
		$this->session->set_flashdata('message', 'Entri kehadiran berhasil. Silahkan tunggu konfirmasi oleh administator.');

		redirect(base_url('user/entri'));
	}

	public function tabel_absensisiswa()
	{
		$data['title'] = 'Tabel absensi';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
		$data['user'] = $user;
		$data['page'] = 'user/kehadiran/tabel';
		$data['absen'] = $this->app->getAbsensisiswa();
		$this->load->view('template/templateUser', $data);
	}
}