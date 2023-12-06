<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLicense extends CI_Model
{
	public function insert($data)
	{
		return $this->db->insert("licenses", $data);
	}
}
