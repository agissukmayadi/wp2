<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
	public function insert($data)
	{
		return $this->db->insert('users', $data);
	}

	public function getWhere($data)
	{
		$this->db->select("users.*, roles.role");
		$this->db->join("roles", "roles.id = users.role_id");
		return $this->db->get_where('users', $data);
	}
	public function updateProfile($data, $user_id)
	{
		$this->db->where("id", $user_id);
		$this->db->update('users', $data);
	}

	public function count()
	{
		$this->db->FROM('users');
		return $this->db->count_all_results();
	}

	public function get()
	{
		$this->db->select("users.*, roles.role");
		$this->db->join("roles", "roles.id = users.role_id");
		$this->db->from("users");
		return $this->db->get();
	}

	public function deleteWhere($where)
	{
		$this->db->delete('users', $where);
	}
}
