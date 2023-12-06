<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		middleware_user("2");
	}

	public function index()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "dashboard",
			"title" => "Dashboard",

			"rentPendingCount" => $this->ModelRent->pendingCount(),
			"rentPickUpCount" => $this->ModelRent->pickUpCount(),
			"rentInvalidCount" => $this->ModelRent->invalidCount(),
			"rentSuccessCount" => $this->ModelRent->successCount(),

			"rents" => $this->ModelRent->get()->result()
		];
		$this->load->view("employee/header", $data);
		$this->load->view("employee/sidebar", $data);
		$this->load->view("employee/topbar", $data);
		$this->load->view("employee/index", $data);
		$this->load->view("employee/footer", $data);
	}

	public function rent_verification($rent_id)
	{
		$this->form_validation->set_rules("status", "Verifikasi", "required|trim", [
			"required" => "%s harus dipilih"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "dashboard",
				"title" => "Rent Verification",

				"rent" => $this->ModelRent->getDetail($rent_id)->row()
			];
			$this->load->view("employee/header", $data);
			$this->load->view("employee/sidebar", $data);
			$this->load->view("employee/topbar", $data);
			$this->load->view("employee/rent_verification", $data);
			$this->load->view("employee/footer", $data);
		} else {
			$data = [
				"status" => $this->input->post("status")
			];

			$this->ModelRent->updateById($data, $rent_id);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data sewa telah berhasil diverifikasi.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  		</div>');
			redirect("employee");
		}
	}

	public function rent_pickup($rent_id)
	{
		$this->form_validation->set_rules("status", "Verifikasi", "required|trim", [
			"required" => "%s harus dipilih"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "dashboard",
				"title" => "Rent Pick Up",

				"rent" => $this->ModelRent->getDetail($rent_id)->row()
			];
			$this->load->view("employee/header", $data);
			$this->load->view("employee/sidebar", $data);
			$this->load->view("employee/topbar", $data);
			$this->load->view("employee/rent_pickup", $data);
			$this->load->view("employee/footer", $data);
		} else {
			$data = [
				"status" => $this->input->post("status")
			];

			$this->ModelRent->updateById($data, $rent_id);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Pengambilan mobil telah berhasil.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  		</div>');
			redirect("employee");
		}
	}

	public function rent_return($rent_id)
	{
		$this->form_validation->set_rules("actual_return_date", "Tanggal Pengembalian", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		$this->form_validation->set_rules("late_cost", "Denda Keterlambatan", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "dashboard",
				"title" => "Rent Return",

				"rent" => $this->ModelRent->getDetail($rent_id)->row()
			];
			$this->load->view("employee/header", $data);
			$this->load->view("employee/sidebar", $data);
			$this->load->view("employee/topbar", $data);
			$this->load->view("employee/rent_return", $data);
			$this->load->view("employee/footer", $data);
		} else {
			$rent = $this->ModelRent->getDetail($rent_id)->row();

			$data = [
				"actual_return_date" => $this->input->post("actual_return_date"),
				"late_cost" => $this->input->post("late_cost"),
				"total_cost" => $rent->total_cost + $this->input->post("late_cost"),
				"status" => "SUCCESS",
			];

			$this->ModelRent->updateById($data, $rent_id);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Pengembalian mobil telah berhasil.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  		</div>');
			redirect("employee");
		}
	}

	public function rent_detail($rent_id)
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "dashboard",
			"title" => "Dashboard",

			"rent" => $this->ModelRent->getDetail($rent_id)->row()
		];
		$this->load->view("employee/header", $data);
		$this->load->view("employee/sidebar", $data);
		$this->load->view("employee/topbar", $data);
		$this->load->view("employee/rent_detail", $data);
		$this->load->view("employee/footer", $data);
	}

	public function profile()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "profile",
			"title" => "Profile",
		];
		$this->load->view("employee/header", $data);
		$this->load->view("employee/sidebar", $data);
		$this->load->view("employee/topbar", $data);
		$this->load->view("employee/profile", $data);
		$this->load->view("employee/footer", $data);
	}

	public function edit_profile()
	{
		$this->form_validation->set_rules("name", "Nama", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("phone", "Nomor Handphone", "required|trim|numeric|min_length[10]|max_length[14]", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
			"min_length" => "%s terlalu pendek",
			"max_length" => "%s terlalu panjang",
		]);
		$this->form_validation->set_rules("address", "Alamat", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "profile",
				"title" => "Edit Profile",
			];

			$this->load->view("employee/header", $data);
			$this->load->view("employee/sidebar", $data);
			$this->load->view("employee/topbar", $data);
			$this->load->view("employee/edit_profile", $data);
			$this->load->view("employee/footer", $data);
		} else {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$data = [
				"name" => htmlspecialchars($this->input->POST("name", true)),
				"phone" => htmlspecialchars($this->input->POST("phone", true)),
				"address" => htmlspecialchars($this->input->POST("address", true)),
			];
			$this->ModelUser->updateProfile($data, $user->id);

			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data profile telah berhasil diperbaharui.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect("employee/profile");
		}

	}

	public function edit_password()
	{
		$this->form_validation->set_rules('oldPassword', 'Password Lama', 'required', [
			'required' => '%s tidak boleh kosong!',
		]);

		$this->form_validation->set_rules('newPassword', 'Password Baru', 'required|trim|min_length[5]|matches[passwordConfirmation]', [
			'required' => '%s tidak boleh kosong!',
			'matches' => '%s tidak cocok!',
			'min_length' => '%s minimal 5 karakter!'
		]);
		$this->form_validation->set_rules('passwordConfirmation', 'Password Konfirmasi', 'required|trim|matches[newPassword]', [
			'required' => '%s tidak boleh kosong!',
			'matches' => '%s tidak cocok!',
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$data = [
				"user" => $user,
				"activeLink" => "profile",
				"title" => "Edit Password",
			];
			$this->load->view("employee/header", $data);
			$this->load->view("employee/sidebar", $data);
			$this->load->view("employee/topbar", $data);
			$this->load->view("employee/edit_password", $data);
			$this->load->view("employee/footer", $data);
		} else {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$oldPassword = $this->input->POST("oldPassword");
			$newPassword = password_hash($this->input->POST("newPassword"), PASSWORD_DEFAULT);

			if (password_verify($oldPassword, $user->password)) {
				$data = [
					"password" => $newPassword
				];
				$this->ModelUser->updateProfile($data, $user->id);
				$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Password telah berhasil diperbaharui.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect("employee/profile");
			} else {
				$this->session->set_flashdata("alert", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf!</strong> Password lama tidak sesuai.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect("employee/edit_password");
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect("auth");
	}
}