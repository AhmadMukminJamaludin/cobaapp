<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model', 'app');
		$this->load->model('user_model', 'user');
        $this->load->library('ciqrcode');
	}

	public function index()
	{
        $data['title'] = 'Data pengguna';
		$id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);

		$data['pengguna'] = $this->user->getPengguna();
		$data['page'] = 'admin/master_data/data_pengguna';
		$data['user'] = $user;

		$this->load->view('template/template', $data);			
	}

	public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Upload gagal!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>'.$this->upload->display_errors().'</div>');
            //redirect halaman
			      echo(error_log);

            redirect('data');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'username'           => $row['A'],
                                    'email'              => $row['B'],
                                    'password'      	 => $row['C'],
                                    'alamat'             => $row['D'],
                                    'gender'             => $row['E'],
                                    'photo'              => $row['F'],
                                    'role_id'            => $row['G'],
                                    'nisn'               => $row['H'],
                                    'position_id'        => $row['I'],

                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('users', $data);
            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('message', 'Data berhasil diupload');
            //redirect halaman
            redirect('Data');

        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim',[
			'required' => 'Nama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
            $data['title'] = 'Edit pengguna';
			$id_users = $this->session->userdata('id_users');
            $user = $this->app->getUser($id_users);

            $data['users'] = $this->user->detailPengguna($id);
            $data['kelas'] = $this->db->get('positions')->result_array();
            $data['page'] = 'admin/master_data/edit_pengguna';
            $data['user'] = $user;
            $this->load->view('template/template', $data);
		}else{
			$id = $this->input->post('id');

			$data = [
				'username'	=> $this->input->post('username'),
				'nisn'	=> $this->input->post('nisn'),
				'email' 	=> $this->input->post('email'),
				'position_id' => $this->input->post('position_id'),
				'alamat'	=> $this->input->post('alamat'),
				'gender'	=> $this->input->post('gender'),
			];

			$this->app->updateUser($id, $data);
			$this->session->set_flashdata('message', 'Data pengguna berhasil diubah'); 

			redirect(base_url('data'));
			}
    }

    public function delete($id)
    {
        $pengguna	= $this->user->detailPengguna($id);
		$this->app->deleteUser($id);
		$this->session->set_flashdata('message', 'Data siswa berhasil dihapus.');
        redirect(base_url('data'));
    }

    public function kelas()
    {
        $data['title'] = 'Data Kelas';
        $id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);

		$data['kelas'] = $this->user->getKelas();
        $data['page'] = 'admin/master_data/data_kelas';
		$data['user'] = $user;
		$this->load->view('template/template', $data);
    }

    public function addKelas()
    {
        $this->form_validation->set_rules('name', 'name', 'required',[
			'required' 	  => 'Nama tidak boleh kosong.',
		]);

		if($this->form_validation->run() == FALSE){
            $data['title'] = 'Tambah data kelas';
			$id = $this->session->userdata('id_users');
            $user = $this->app->getUser($id);
            $data['page'] = 'admin/master_data/add_kelas';
            $data['user'] = $user;
            $this->load->view('template/template', $data);
		}else{        
        $data = [
            'position_name'		=> $this->input->post('name'),
        ];
        
        $this->app->insertKelas($data);
        $this->session->set_flashdata('message', 'Data kelas berhasil ditambahkan');
        redirect(base_url('data/kelas'));
        }
    }

    public function deletekelas($id)
    {
        $kelas	= $this->user->detailKelas($id);
		$this->app->deleteKelas($id);
		$this->session->set_flashdata('message', 'Data kelas berhasil dihapus.');
        redirect(base_url('data/kelas'));
    }

    public function editkelas($id)
    {
        $id = $this->input->post('id');        
        $data = [
            'position_name'		=> $this->input->post('name'),
        ];
        
        $this->app->updateKelas($id, $data);
        $this->session->set_flashdata('message', 'Data kelas berhasil diubah');
        redirect(base_url('data/kelas'));
    }

    public function siswa()
    {
        $data['title'] = 'Data siswa';
        $id = $this->session->userdata('id_users');
		$user = $this->app->getUser($id);
        $data['kelas'] = $this->db->get('positions')->result_array();
        $kelas = $this->input->get('position_id');
		$data['pengguna'] = $this->user->getPenggunaKelas($kelas);
        $data['kelassiswa'] = $this->app->getKelassiswa();
        $data['page'] = 'admin/master_data/data_siswa';
		$data['user'] = $user;
		$this->load->view('template/template', $data);
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