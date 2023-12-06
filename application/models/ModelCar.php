<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCar extends CI_Model
{
	public function get()
	{
		$this->db->select('cars.* , types.type');
		$this->db->from('cars');
		$this->db->join('types', 'types.id = cars.type_id');
		return $this->db->get();
	}
	public function getById($id)
	{
		$this->db->select('cars.* , types.type');
		$this->db->from('cars');
		$this->db->join('types', 'types.id = cars.type_id');
		$this->db->where("cars.id", $id);
		return $this->db->get();
	}

	public function getByDate($rent_date, $return_date)
	{
		$status_values = ['PENDING', 'PAID', 'PICKED UP'];

		$subquery = $this->db
			->select('car_id')
			->from('rents')
			->where('rent_date <=', $return_date)
			->where('return_date >=', $rent_date)
			->where_in('status', $status_values)
			->get_compiled_select();

		$this->db->select('cars.*, DATEDIFF("' . $return_date . '","' . $rent_date . '") * cars.price AS totalPrice');
		$this->db->from('cars');
		$this->db->where("cars.id NOT IN ($subquery)", NULL, FALSE);
		$this->db->order_by("price", "ASC");


		return $this->db->get();
	}

	public function getFilter($rent_date, $return_date, $type, $transmition, $price)
	{
		$status_values = ['PENDING', 'PAID', 'PICKED UP'];
		$subquery = $this->db
			->select('car_id')
			->from('rents')
			->where('rent_date <=', $return_date)
			->where('return_date >=', $rent_date)
			->where_in('status', $status_values)
			->get_compiled_select();

		$this->db->select('cars.*, DATEDIFF("' . $return_date . '","' . $rent_date . '") * cars.price AS totalPrice');
		$this->db->from('cars');
		$this->db->where("cars.id NOT IN ($subquery)", NULL, FALSE);
		if ($type != '*') {
			$this->db->where("type_id", $type);
		}
		if ($transmition != "*") {
			$this->db->where("transmition", $transmition);
		}
		$this->db->order_by("price", $price);
		return $this->db->get();
	}

	public function count()
	{
		$this->db->FROM('cars');
		return $this->db->count_all_results();
	}

	public function insert($data)
	{
		$this->db->insert("cars", $data);
	}

	public function deleteWhere($where)
	{
		$this->db->delete('cars', $where);
	}

	public function update($data, $car_id)
	{
		$this->db->where("id", $car_id);
		$this->db->update('cars', $data);
	}
}
