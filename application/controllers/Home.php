<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
		$data["user"] = $user;

		$this->load->view("home/header", $data);
		$this->load->view('home/index', $data);
		$this->load->view("home/footer", $data);
	}
	public function car_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
		$data["user"] = $user;

		$rent_date = $this->input->GET("rent_date", true);
		$return_date = $this->input->GET("return_date", true);
		$cars = $this->ModelCar->getByDate($rent_date, $return_date)->result();
		$types = $this->ModelType->get()->result();

		$data["rent_date"] = $rent_date;
		$data["return_date"] = $return_date;
		$data["cars"] = $cars;
		$data["types"] = $types;

		$this->load->view("home/header", $data);
		$this->load->view('home/car_list', $data);
		$this->load->view("home/footer", $data);
	}
}
