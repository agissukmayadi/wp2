<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelRent extends CI_Model
{
	public function get()
	{
		$this->db->select('rents.* , cars.id AS car_id, cars.merk, users.name');
		$this->db->from('rents');
		$this->db->join('cars', 'cars.id = rents.car_id');
		$this->db->join('users', 'users.id = rents.user_id');
		$this->db->order_by("rents.id", "DESC");
		return $this->db->get();
	}
	public function insert($data)
	{
		$this->db->insert("rents", $data);
	}
	public function getWhereJoinCar($user_id)
	{
		$this->db->select('rents.* , cars.id AS car_id, cars.merk, cars.price, cars.image');
		$this->db->from('rents');
		$this->db->join('cars', 'cars.id = rents.car_id');
		$this->db->where("rents.user_id", $user_id);
		$this->db->order_by("rents.id", "DESC");
		return $this->db->get();
	}

	public function getDetail($rent_id)
	{
		$this->db->select('rents.* , cars.id AS car_id, cars.merk, cars.transmition, cars.seat, cars.year, cars.price, cars.image, types.type, payments.number AS payment_number, payments.name AS payment_name, payments.amount, payments.attachment AS payment_attachment, banks.bank, banks.number AS bank_number, banks.name AS bank_name, licenses.number AS license_number, licenses.attachment AS license_attachment, users.name AS user_name, users.phone, users.email, users.address, users.role_id');
		$this->db->from("rents");
		$this->db->join("users", "users.id = rents.user_id");
		$this->db->join('cars', 'cars.id = rents.car_id');
		$this->db->join("types", "types.id = cars.type_id");
		$this->db->join("payments", "payments.rent_id = rents.id");
		$this->db->join("banks", "banks.id = payments.bank_id");
		$this->db->join("licenses", "licenses.rent_id = rents.id");
		$this->db->where("rents.id", $rent_id);
		return $this->db->get();
	}

	public function updateById($data, $rent_id)
	{
		$this->db->where("id", $rent_id);
		$this->db->update('rents', $data);
	}

	public function count()
	{
		$this->db->FROM('rents');
		return $this->db->count_all_results();
	}

	public function pendingCount()
	{
		$this->db->from("rents");
		$this->db->where("status", "PENDING");
		return $this->db->count_all_results();
	}
	public function pickUpCount()
	{
		$this->db->from("rents");
		$this->db->where("status", "PICKED UP");
		return $this->db->count_all_results();
	}

	public function invalidCount()
	{
		$this->db->from("rents");
		$this->db->where_in("status", ["INVALID LICENSE", "INVALID PAYMENT"]);
		return $this->db->count_all_results();
	}

	public function successCount()
	{
		$this->db->from("rents");
		$this->db->where("status", "SUCCESS");
		return $this->db->count_all_results();
	}
}