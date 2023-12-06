<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPayment extends CI_Model
{

	public function insert($data)
	{
		return $this->db->insert("payments", $data);
	}
}
