<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class App_model extends CI_Model {

    public function getUser($id) {
        return $this->db->get_where('users', ['id_users'=>$id])->row_array();
    }

    public function insertUser($data)
	{
		$this->db->insert('users', $data);
	}

    public function insertKelas($data)
	{
		$this->db->insert('positions', $data);
	}

    public function insertPengumuman($data)
    {
        $this->db->insert('pengumuman', $data);
    }

    public function updatePengumuman($id, $data)
    {
        $this->db->update('pengumuman', $data, ['id_pengumuman' => $id]);
		return $this->db->affected_rows();
    }
    
    public function getPengumuman() {
        $this->db->limit(3);
        $this->db->order_by('id_pengumuman', 'desc');
        return $this->db->get('pengumuman')->result_array();
    }
    
    public function pengguna() {
        return $this->db->get('users')->num_rows();
    }

    public function updateUser($id, $data)
	{
		$this->db->update('users', $data, ['id_users' => $id]);
		return $this->db->affected_rows();
	}

    public function updatePassword($id, $data)
	{
		$this->db->update('users', $data, ['id_users' => $id]);
		return $this->db->affected_rows();
	}

    public function updateKelas($id, $data)
	{
		$this->db->update('positions', $data, ['id_positions' => $id]);
		return $this->db->affected_rows();
	}

    public function updateJam($id, $data)
    {
        $this->db->update('time', $data, ['id_time' => $id]);
		return $this->db->affected_rows();
    }

    public function deleteUser($id)
	{
		$this->db->where('id_users', $id);
      $this->db->delete('users');
	}

    public function detailPengumuman($id)
    {
        return $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->row_array();
    }

    public function deleteKelas($id)
	{
		$this->db->where('id_positions', $id);
      $this->db->delete('positions');
	}

    public function deletePengumuman($id)
	{
		$this->db->where('id_pengumuman', $id);
      $this->db->delete('pengumuman');
	}

    public function updateProfile($id, $data)
	{
		$this->db->update('users', $data, ['id_users' => $id]);
	}
	
	public function uploadImage(){
      $config = [
        'upload_path'     => './image',
		'encrypt_name'    => TRUE,
        'allowed_types'   => 'jpg|jpeg|png|JPG|PNG|JPEG|pdf',
        'max_size'        => 3000,
        'max_width'       => 0,
        'max_height'      => 0,
        'overwrite'       => TRUE,
        'file_ext_tolower'=> TRUE
      ];
  
      $this->load->library('upload', $config);
		
		if($this->upload->do_upload('photo')){
			return $this->upload->data('file_name');
		}
   }

   public function getKonfirmasi($position)
   {
    $format = "Y-m-d";
    $this->db->select('presents.*, users.username');
    $this->db->from('presents');
      $this->db->join('users', 'users.id_users = presents.user_id');
      $this->db->join('positions', 'positions.id_positions = users.position_id');
    if (!empty($position)) {
        $this->db->where('id_positions', $position);
    }
    $this->db->where('status', 0);
    return $this->db->get()->result_array();
   }

   public function jmlKonfirmasiapp()
   {
    return $this->db->get_where('presents', ['status' => 0])->num_rows();
   }

   public function getKonfirmasiapp()
   {
    // SELECT `users`.*, `positions`.`id_positions` FROM `users` JOIN `positions` ON `positions`.`id_positions` = `users`.`position_id` JOIN `presents` ON `presents`.`user_id` = `users`.`id_users` WHERE `presents`.`date` = '2021-10-23' AND `status` = 0
    $format = "Y-m-d";
    $this->db->select('users.*, positions.id_positions, positions.position_name, presents.information');
    $this->db->from('users');
    $this->db->join('positions', 'positions.id_positions = users.position_id');
    $this->db->join('presents', 'presents.user_id = users.id_users');
    $this->db->where('status', 0);
    $this->db->limit(5);
    $this->db->order_by('id_presents', 'desc');
    return $this->db->get()->result_array();
   }

   public function getabsensiperhari($position, $tanggal)
   {
    $format = "Y-m-d";
    $this->db->select('presents.*, users.username, positions.position_name');
    $this->db->from('presents');
    $this->db->join('users', 'users.id_users = presents.user_id');
    $this->db->join('positions', 'positions.id_positions = users.position_id');

    if(empty($tanggal)) {
        $this->db->where('presents.date', date($format));
    }else {
        $this->db->where('presents.date', date($tanggal));
    }
    if (!empty($position)) {
        $this->db->where('id_positions', $position);
    }
    $this->db->where('status', 1);
    $this->db->order_by('id_presents', 'desc');
    return $this->db->get()->result_array();
   }

   public function getAbsensi($id)
	{
		$this->db->select('presents.user_id, presents.date, presents.time, presents.information,presents.status');
		$this->db->from('presents');
		$this->db->where('id_presents', $id);
		return $this->db->get()->row_array();
	}

    public function updateAbsensi($id, $data)
	{
		$this->db->update('presents', $data, ['id_presents' => $id]);
	}

    public function getKelassiswa()
    {
        // SELECT `positions`.*, `users`.`position_id` FROM `positions` JOIN `users` ON `users`.`position_id` = `positions`.`id_positions`
        $this->db->select('positions.*, users.position_id');
        $this->db->from('positions');
        $this->db->join('users', 'users.position_id = positions.id_positions');
      return $this->db->get()->result_array();
    }

    public function getRekap($position, $start, $end)
	{
        // SELECT `presents`.*, `users`.`username`, `users`.`nisn`, `positions`.`position_name`, `positions`.`id_positions`, count(IF(information = "M", 1, NULL)) as masuk, count(IF(information = "I", 1, NULL)) as ijin, count(IF(information = "S", 1, NULL)) as sakit FROM `presents` JOIN `users` ON `users`.`id_users` = `presents`.`user_id` JOIN `positions` ON `positions`.`id_positions` = `users`.`position_id` WHERE `id_positions` IS NULL AND `presents`.`date` BETWEEN '' AND '' AND `status` = 1 GROUP BY `presents`.`user_id` ORDER BY `positions`.`position_name` ASC
		$this->db->select('presents.*, users.username, users.nisn, positions.position_name, positions.id_positions, count(IF(information = "M", 1, NULL)) as masuk, count(IF(information = "I", 1, NULL)) as ijin, count(IF(information = "S", 1, NULL)) as sakit');
		$this->db->from('presents');
		$this->db->join('users', 'users.id_users = presents.user_id');
		$this->db->join('positions', 'positions.id_positions = users.position_id');
		$this->db->where('id_positions', $position);
        $this->db->where("presents.date BETWEEN '$start' AND '$end'");
        $this->db->where('status', 1);
		$this->db->group_by('presents.user_id');
		$this->db->order_by('positions.position_name', 'asc');
		return $this->db->get()->result_array();
	}

    public function getAbsensisiswa($id)
    {
        $bulan = "m";
        $this->db->join('users', 'users.id_users = presents.user_id');
        $this->db->where('user_id', $this->session->userdata('id_users'));
		$this->db->like('date', date('m'));
		$this->db->order_by('id_presents', 'desc');
		return $this->db->get('presents')->result_array();
    
    }
    public function getEntriSiswa($id)
    {
        $this->db->join('users', 'users.id_users = presents.user_id');
        $this->db->where('user_id', $this->session->userdata('id_users'));
		$this->db->like('date', date('Y-m-d'));
		$this->db->order_by('id_presents', 'desc');
		return $this->db->get('presents')->result_array();
    }

    public function getRekapSiswa($id)
	{
		$this->db->select('presents.*, count(IF(information = "M", 1, NULL)) as masuk, count(IF(information = "I", 1, NULL)) as ijin, count(IF(information = "S", 1, NULL)) as sakit');
		$this->db->from('presents');
		$this->db->where('user_id', $id);
        $this->db->where('status', 1);
		return $this->db->get()->result_array();
	}

    public function exportExcel($position, $start, $end)
	{
		$this->db->select('presents.*, users.username, users.nisn, positions.position_name, positions.id_positions, count(IF(information = "M", 1, NULL)) as masuk, count(IF(information = "I", 1, NULL)) as ijin, count(IF(information = "S", 1, NULL)) as sakit');
		$this->db->from('presents');
		$this->db->join('users', 'users.id_users = presents.user_id');
		$this->db->join('positions', 'positions.id_positions = users.position_id');
        $this->db->where('id_positions', $position);
        $this->db->where("presents.date BETWEEN '$start' AND '$end'");
        $this->db->where('status', 1);
		$this->db->group_by('presents.user_id');
		$this->db->order_by('positions.position_name', 'asc');
		return $this->db->get()->result_array();
	}

    public function exportPDF($position, $start, $end)
    {
        $this->db->select('presents.*, users.username, users.nisn, positions.position_name, positions.id_positions, count(IF(information = "M", 1, NULL)) as masuk, count(IF(information = "I", 1, NULL)) as ijin, count(IF(information = "S", 1, NULL)) as sakit');
		$this->db->from('presents');
		$this->db->join('users', 'users.id_users = presents.user_id');
		$this->db->join('positions', 'positions.id_positions = users.position_id');
        $this->db->where('id_positions', $position);
        $this->db->where("presents.date BETWEEN '$start' AND '$end'");
        $this->db->where('status', 1);
		$this->db->group_by('presents.user_id');
		$this->db->order_by('positions.position_name', 'asc');
		return $this->db->get()->result_array();
    }

    public function exportCetak($position, $start, $end)
    {
        $this->db->select('presents.*, users.username, users.nisn, positions.position_name, positions.id_positions, count(IF(information = "M", 1, NULL)) as masuk, count(IF(information = "I", 1, NULL)) as ijin, count(IF(information = "S", 1, NULL)) as sakit');
		$this->db->from('presents');
		$this->db->join('users', 'users.id_users = presents.user_id');
		$this->db->join('positions', 'positions.id_positions = users.position_id');
        $this->db->where('id_positions', $position);
        $this->db->where("presents.date BETWEEN '$start' AND '$end'");
        $this->db->where('status', 1);
		$this->db->group_by('presents.user_id');
		$this->db->order_by('positions.position_name', 'asc');
		return $this->db->get()->result_array();
    }

    public function getRekapAppMasuk()
	{
		$this->db->where('status', 1);
		$this->db->where('date', date('Y-m-d'));
		$this->db->where('information', 'M');
		return $this->db->get('presents')->num_rows();
	}

    public function getRekapAppSakit()
	{
		$this->db->where('status', 1);
		$this->db->where('date', date('Y-m-d'));
		$this->db->where('information', 'S');
		return $this->db->get('presents')->num_rows();
	}

    public function getRekapAppIjin()
	{
		$this->db->where('status', 1);
		$this->db->where('date', date('Y-m-d'));
		$this->db->where('information', 'I');
		return $this->db->get('presents')->num_rows();
	}

    public function jumlahsiswa()
    {
        $this->db->where('role_id', 2);
		return $this->db->get('users')->num_rows();
    }

    public function getJam()
    {
        return $this->db->get('time')->result_array();
    }

}