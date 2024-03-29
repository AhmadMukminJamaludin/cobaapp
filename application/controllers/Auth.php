<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
		$this->load->model('user_model', 'user');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required'		=> 'Email tidak boleh kosong',
			'valid_email'	=> 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required',[
			'required'		=> 'Password tidak boleh kosong'
		]);

		if($this->form_validation->run() == FALSE){
			$this->load->view('auth');
		}else{
			$password 	= $this->input->post('password');
			$user 		= $this->auth->checkEmail();
			
			// Cek user berdasarkan email
			if(isset($user)){
				// Cek password sesuai atau tidak
				if(hashEncryptVerify($password, $user['password']) == TRUE){
					$this->session->set_userdata($user);
					$this->session->set_userdata('auth', TRUE);
					
					if($user['role_id'] == 1){						
						redirect('app');
					}else{
						redirect('user');
					}
				}else{
					// Jika password tidak sesuai
					$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">
						Password yang anda masukan salah!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'); 
					redirect('auth');
				}
			}else{
				// Jika email tidak sesuai
				$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">
						Email yang anda masukan salah!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
			
		redirect('auth');
	}

	public function absen_in_auth()
	{
		$this->load->view('absen_in_auth');
	}

	function autofill()
	{
		$id=$_GET['id_users'];
        $cari =$this->auth->autofill_m($id)->result();
        echo json_encode($cari);
	}

	public function input_absensi()
	{
		date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');
		$time = date('H:i:s');
		$masuk = $this->db->get_where('time', ['id_time' => 1])->row_array();
		$pulang = $this->db->get_where('time', ['id_time' => 2])->row_array();
		$absen = $this->db->get_where('presents', ['user_id' => $this->session->userdata('id_users'), 'date' => $today])->row_array();
		if($this->input->post('tipe')=='M' && !empty($absen['time'])) {
			$this->session->set_flashdata('salah', 'Anda sudah melakukan presensi masuk hari ini');
			redirect(base_url('auth/absen_in_auth'));
		} elseif ($this->input->post('tipe')=='P' && !empty($absen['time_pulang'])) {
			$this->session->set_flashdata('salah', 'Anda sudah melakukan presensi pulang hari ini');
			redirect(base_url('auth/absen_in_auth'));
		} elseif ($this->input->post('tipe')=='M' && $time <= $masuk['start'] ) {
			$this->session->set_flashdata('salah', 'Belum saatnya presensi');
			redirect(base_url('auth/absen_in_auth'));
		} elseif ($this->input->post('tipe')=='M' && $time >= $masuk['finish'] ) {
			date_default_timezone_set('Asia/Jakarta');
			$data = [
				'user_id'		=> $this->input->post('qrcode'),
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
			redirect(base_url('auth/absen_in_auth'));
		} elseif ($this->input->post('tipe')=='P' && $time <= $pulang['start'] ) {
			$this->session->set_flashdata('salah', 'Belum saatnya presensi');
			redirect(base_url('auth/absen_in_auth'));
		} elseif ($this->input->post('tipe')=='P' && $time >= $pulang['finish'] ) {
			$this->session->set_flashdata('salah', 'Belum saatnya presensi');
			redirect(base_url('auth/absen_in_auth'));
		} elseif ($this->input->post('tipe')=='M' && empty($absen['time'])) {
			date_default_timezone_set('Asia/Jakarta');
			$data = [
				'user_id'		=> $this->input->post('qrcode'),
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

			redirect(base_url('auth/absen_in_auth'));
		} else ($this->input->post('tipe')=='P' && !empty($absen['time']) && empty($absen['time_pulang'])); {
			date_default_timezone_set('Asia/Jakarta');
			$id = $this->input->post('qrcode');
			$data = [
				'time_pulang'	=> date('H:i:s')
			];

			$this->user->updateEntri($id, $data, $today);
			$this->session->set_flashdata('message', 'Entri presensi berhasil. Silahkan tunggu konfirmasi oleh administator.');

			redirect(base_url('auth/absen_in_auth'));
		}
		
	}
}