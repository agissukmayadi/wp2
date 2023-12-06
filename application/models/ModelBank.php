<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBank extends CI_Model
{
	public function get()
	{
		return $this->db->get('banks');
	}

	public function insert($data)
	{
		$this->db->insert("banks", $data);
	}

	public function deleteWhere($where)
	{
		$this->db->delete('banks', $where);
	}

	public function update($data, $role_id)
	{
		$this->db->where("id", $role_id);
		$this->db->update("banks", $data);
	}

	public function getWhere($role_id)
	{
		$this->db->where("id", $role_id);
		return $this->db->get("banks");
	}
}