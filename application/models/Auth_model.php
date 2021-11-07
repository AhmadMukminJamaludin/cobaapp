<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function checkEmail()
	{
		return $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();
	}

	function autofill_m($id)
	{
		$query= ("SELECT * FROM `users` JOIN `positions` ON `positions`.`id_positions` = `users`.`position_id` WHERE id_users = '$id'");
        return  $this->db->query($query);
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
}