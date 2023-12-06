<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		middleware_user("3");
	}

	public function set_rent()
	{
		$car_id = $this->input->POST("car_id");
		$rent_date = $this->input->POST("rent_date");
		$return_date = $this->input->POST("return_date");
		$rent_cost = $this->input->POST("rent_cost");
		$data = [
			"car_id" => $car_id,
			"rent_date" => $rent_date,
			"return_date" => $return_date,
			"rent_cost" => $rent_cost,
		];
		$this->session->set_userdata($data);

		redirect("customer/rent");
	}

	public function rent()
	{
		$this->form_validation->set_rules('bank_id', 'Bank Tujuan', 'required', [
			'required' => 'Pilih salah satu %s!',
		]);
		$this->form_validation->set_rules("payment_number", "Nomor Rekening", "required|trim|numeric|min_length[8]|max_length[16]", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
			"min_length" => "%s terlalu pendek",
			"max_length" => "%s terlalu panjang",
		]);
		$this->form_validation->set_rules("payment_name", "Nama Rekening", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("amount", "Total Pembayaran", "required|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);

		$this->form_validation->set_rules("license_number", "Nomor Rekening", "required|trim|numeric|min_length[8]|max_length[16]", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
			"min_length" => "%s terlalu pendek",
			"max_length" => "%s terlalu panjang",
		]);


		if (!$this->form_validation->run()) {
			$car_id = $this->session->userdata("car_id");
			$rent_date = $this->session->userdata("rent_date");
			$return_date = $this->session->userdata("return_date");
			$rent_cost = $this->session->userdata("rent_cost");
			$data = [
				"user" => $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row(),
				"car" => $this->ModelCar->getById($car_id)->row(),
				"rent_date" => $rent_date,
				"return_date" => $return_date,
				"rent_cost" => $rent_cost,
				"banks" => $this->ModelBank->get()->result()
			];
			$this->load->view("home/header", $data);
			$this->load->view('customer/rent', $data);
			$this->load->view("home/footer", $data);
		} else {
			$car_id = $this->session->userdata("car_id");
			$rent_date = $this->session->userdata("rent_date");
			$return_date = $this->session->userdata("return_date");
			$rent_cost = $this->session->userdata("rent_cost");

			$bank_id = $this->input->POST("bank_id");
			$payment_number = $this->input->POST("payment_number");
			$payment_name = $this->input->POST("payment_name");
			$amount = $this->input->POST("amount");
			$payment_attachment = "";

			$license_number = $this->input->POST("license_number");
			$license_attachment = "";

			$payment_file = $_FILES['payment_attachment']['name'];
			if ($payment_file) {
				$config['upload_path'] = './assets/img/payments/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = '3000';
				$config['file_name'] = 'payment_' . time();
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('payment_attachment')) {
					$car_id = $this->session->userdata("car_id");
					$rent_date = $this->session->userdata("rent_date");
					$return_date = $this->session->userdata("return_date");
					$rent_cost = $this->session->userdata("rent_cost");

					$data = [
						"user" => $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row(),
						"car" => $this->ModelCar->getById($car_id)->row(),
						"rent_date" => $rent_date,
						"return_date" => $return_date,
						"rent_cost" => $rent_cost,
						"banks" => $this->ModelBank->get()->result(),
						"error" => ["payment_attachment" => $this->upload->display_errors("<small class='text-danger'>", "</small>")]
					];

					$this->load->view("home/header", $data);
					$this->load->view('customer/rent', $data);
					$this->load->view("home/footer", $data);
				} else {
					$upload_data = $this->upload->data();
					$payment_attachment = $upload_data["file_name"];

					$license_file = $_FILES['license_attachment']['name'];
					if ($license_file) {
						$config['upload_path'] = './assets/img/licenses/';
						$config['allowed_types'] = 'jpeg|jpg|png';
						$config['max_size'] = '3000';
						$config['file_name'] = 'license_' . time();
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('license_attachment')) {
							unlink(FCPATH . 'assets/img/payments/' . $payment_attachment);

							$car_id = $this->session->userdata("car_id");
							$rent_date = $this->session->userdata("rent_date");
							$return_date = $this->session->userdata("return_date");
							$rent_cost = $this->session->userdata("rent_cost");
							$data = [
								"user" => $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row(),
								"car" => $this->ModelCar->getById($car_id)->row(),
								"rent_date" => $rent_date,
								"return_date" => $return_date,
								"rent_cost" => $rent_cost,
								"banks" => $this->ModelBank->get()->result(),
								"error" => ["license_attachment" => $this->upload->display_errors("<small class='text-danger'>", "</small>")]
							];

							$this->load->view("home/header", $data);
							$this->load->view('customer/rent', $data);
							$this->load->view("home/footer", $data);
						} else {
							$upload_data = $this->upload->data();
							$license_attachment = $upload_data["file_name"];

							$rent_id = getRent_id();
							$dataRent = [
								"id" => $rent_id,
								"rent_date" => $rent_date,
								"return_date" => $return_date,
								"actual_return_date" => null,
								"rent_cost" => $rent_cost,
								"late_cost" => 0,
								"total_cost" => $rent_cost,
								"user_id" => $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row()->id,
								"car_id" => $car_id,
								"status" => "PENDING"
							];
							$this->ModelRent->insert($dataRent);

							$dataPayment = [
								"number" => $payment_number,
								"name" => $payment_name,
								"amount" => $amount,
								"attachment" => $payment_attachment,
								"bank_id" => $bank_id,
								"rent_id" => $rent_id
							];
							$this->ModelPayment->insert($dataPayment);

							$dataLicense = [
								"number" => $license_number,
								"attachment" => $license_attachment,
								"rent_id" => $rent_id
							];
							$this->ModelLicense->insert($dataLicense);

							$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Selamat,</strong> Transaksi sewa anda berhasil dikirim, transaksi akan diverifikasi terlebih dahulu maksimal 1x24 Jam.
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
							</div>');
							redirect("customer/rent_list");
						}
					}

				}
			}
		}
	}

	public function rent_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
		$data = [
			"user" => $user,
			"rents" => $this->ModelRent->getWhereJoinCar($user->id)->result()
		];
		$this->load->view("home/header", $data);
		$this->load->view('customer/rent_list', $data);
		$this->load->view("home/footer", $data);
	}

	public function rent_detail($rent_id)
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
		$data = [
			"user" => $user,
			"rent" => $this->ModelRent->getDetail($rent_id)->row()
		];
		$this->load->view("home/header", $data);
		$this->load->view('customer/rent_detail', $data);
		$this->load->view("home/footer", $data);

	}

	public function profile()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
		$data = [
			"user" => $user
		];
		$this->load->view("home/header", $data);
		$this->load->view('customer/profile', $data);
		$this->load->view("home/footer", $data);
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
				"user" => $user
			];
			$this->load->view("home/header", $data);
			$this->load->view('customer/edit_profile', $data);
			$this->load->view("home/footer", $data);
		} else {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$data = [
				"name" => htmlspecialchars($this->input->POST("name", true)),
				"phone" => htmlspecialchars($this->input->POST("phone", true)),
				"address" => htmlspecialchars($this->input->POST("address", true)),
			];
			$this->ModelUser->updateProfile($data, $user->id);

			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Selamat,</strong> Profil anda berhasil diubah.
			<button type="button" class="btn-close" data-bs-dismiss="alert"
				aria-label="Close"></button>
			</div>');
			redirect("customer/profile");
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
				"user" => $user
			];
			$this->load->view("home/header", $data);
			$this->load->view('customer/edit_password', $data);
			$this->load->view("home/footer", $data);
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
				<strong>Selamat,</strong> Password anda berhasil diubah.
				<button type="button" class="btn-close" data-bs-dismiss="alert"
					aria-label="Close"></button>
				</div>');
				redirect("customer/profile");
			} else {
				$this->session->set_flashdata("alert", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf,</strong> Password Lama tidak sesuai.
				<button type="button" class="btn-close" data-bs-dismiss="alert"
					aria-label="Close"></button>
				</div>');
				redirect("customer/edit_password");
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
