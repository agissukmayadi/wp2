<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function car_filter()
	{
		$type = $this->input->get('type');
		$transmition = $this->input->get('transmition');
		$price = $this->input->get('price');
		$rent_date = $this->input->get('rent_date');
		$return_date = $this->input->get('return_date');

		$cars = $this->ModelCar->getFilter($rent_date, $return_date, $type, $transmition, $price)->result_array();
		$data = [
			"cars" => $cars
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		// Set content type to JSON
		header("Access-Control-Allow-Origin: *");
	}

}
