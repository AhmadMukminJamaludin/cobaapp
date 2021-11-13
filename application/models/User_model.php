<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getPengguna()
	{
		return $this->db->get_where('users')->result_array();
	}

	public function getPenggunaKelas($kelas)
	{
		$query = ("SELECT * FROM `users` JOIN `positions` ON `positions`.`id_positions` = `users`.`position_id` WHERE position_id = '$kelas'");
		return $this->db->query($query)->result_array();
	}

	public function getKelas()
	{
		return $this->db->get('positions')->result_array();
	}

	public function detailPengguna($id)
	{
		return $this->db->get_where('users', ['id_users' => $id])->row_array();
	}

	public function detailKelas($id)
	{
		return $this->db->get_where('positions', ['id_positions' => $id])->row_array();
	}

	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insertEntri($data)
	{
		$this->db->insert('presents', $data);
	}

	public function updateEntri($id, $data, $today)
	{
		$this->db->update('presents', $data, ['user_id' => $id, 'date' => $today]);
		return $this->db->affected_rows();
	}

	public function getMasuk()
	{
		$this->db->where('user_id', $this->session->userdata('id_users'));
		$this->db->where('status', 1);
		$this->db->like('month(presents.date)',ltrim(date('m'),0));
		$this->db->where('information', 'M');
		return $this->db->get('presents')->num_rows();
	}

	public function getSakit($id)
	{
		$this->db->where('user_id', $id);
		$this->db->where('status', 1);
		$this->db->like('date', date('m'));
		$this->db->where('information', 'S');
		return $this->db->get('presents')->num_rows();
	}

	public function getIjin($id)
	{
		$this->db->where('user_id', $id);
		$this->db->where('status', 1);
		$this->db->like('date', date('m'));
		$this->db->where('information', 'I');
		return $this->db->get('presents')->num_rows();
	}
}