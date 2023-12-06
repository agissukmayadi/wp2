<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelRole extends CI_Model
{
	public function get()
	{
		return $this->db->get("roles");
	}

	public function insert($data)
	{
		$this->db->insert("roles", $data);
	}

	public function deleteWhere($where)
	{
		$this->db->delete('roles', $where);
	}

	public function update($data, $role_id)
	{
		$this->db->where("id", $role_id);
		$this->db->update("roles", $data);
	}

	public function getWhere($role_id)
	{
		$this->db->where("id", $role_id);
		return $this->db->get("roles");
	}
}