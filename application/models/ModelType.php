<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelType extends CI_Model
{
	public function get()
	{
		return $this->db->get("types");
	}

	public function insert($data)
	{
		$this->db->insert("types", $data);
	}

	public function deleteWhere($where)
	{
		$this->db->delete('types', $where);
	}

	public function update($data, $role_id)
	{
		$this->db->where("id", $role_id);
		$this->db->update("types", $data);
	}

	public function getWhere($role_id)
	{
		$this->db->where("id", $role_id);
		return $this->db->get("types");
	}
}