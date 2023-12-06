<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		middleware_user("1");
	}

	public function index()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "dashboard",
			"title" => "Dashboard",

			"userCount" => $this->ModelUser->count(),
			"carCount" => $this->ModelCar->count(),
			"rentCount" => $this->ModelRent->count(),
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/index", $data);
		$this->load->view("admin/footer", $data);
	}

	public function rent_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "rents",
			"title" => "Rent List",
			"rents" => $this->ModelRent->get()->result()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/rent_list", $data);
		$this->load->view("admin/footer", $data);
	}

	public function rent_detail($rent_id)
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "rents",
			"title" => "Rent Detail - $rent_id",
			"rent" => $this->ModelRent->getDetail($rent_id)->row()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/rent_detail", $data);
		$this->load->view("admin/footer", $data);
	}

	public function user_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "users",
			"title" => "User List",
			"users" => $this->ModelUser->get()->result()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/user_list", $data);
		$this->load->view("admin/footer", $data);
	}

	public function user_edit($user_id)
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
		$this->form_validation->set_rules("role_id", "Role", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$userEdit = $this->ModelUser->getWhere(["users.id" => $user_id])->row();

			$data = [
				"user" => $user,
				"activeLink" => "users",
				"title" => "Edit User",
				"roles" => $this->ModelRole->get()->result(),
				"userEdit" => $userEdit
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/user_edit", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"name" => htmlspecialchars($this->input->POST("name", true)),
				"phone" => htmlspecialchars($this->input->POST("phone", true)),
				"address" => htmlspecialchars($this->input->POST("address", true)),
				"role_id" => htmlspecialchars($this->input->POST("role_id", true)),
			];
			$this->ModelUser->updateProfile($data, $user_id);

			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data pengguna telah diperbaharui.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  		</div>');
			redirect("admin/user_list");
		}

	}

	public function user_add()
	{
		$this->form_validation->set_rules("name", "Nama", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("role_id", "Role", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("phone", "Nomor Handphone", "required|trim|numeric|min_length[10]|max_length[14]", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
			"min_length" => "%s terlalu pendek",
			"max_length" => "%s terlalu panjang",
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]|valid_email', [
			'required' => '%s tidak boleh kosong!',
			'is_unique' => '%s sudah digunakan!',
			'valid_email' => '%s tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password_confirmation]', [
			'required' => '%s tidak boleh kosong!',
			'matches' => '%s tidak cocok!',
			'min_length' => '%s minimal 5 karakter!'
		]);
		$this->form_validation->set_rules('password_confirmation', 'Password Konfirmasi', 'required|trim|matches[password]', [
			'required' => '%s tidak boleh kosong!',
			'matches' => '%s tidak cocok!',
		]);
		$this->form_validation->set_rules("address", "Alamat", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$data = [
				"user" => $user,
				"activeLink" => "users",
				"title" => "Add User",
				"roles" => $this->ModelRole->get()->result()
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/user_add", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"name" => htmlspecialchars($this->input->POST("name", true)),
				"phone" => htmlspecialchars($this->input->POST("phone", true)),
				"email" => htmlspecialchars($this->input->POST("email", true)),
				"password" => password_hash($this->input->POST("password"), PASSWORD_DEFAULT),
				"address" => htmlspecialchars($this->input->POST("address", true)),
				"role_id" => htmlspecialchars($this->input->POST("role_id", true))
			];
			$this->ModelUser->insert($data);

			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data pengguna telah berhasil ditambah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect("admin/user_list");
		}

	}

	public function user_delete($user_id)
	{
		$this->ModelUser->deleteWhere(["id" => $user_id]);
		$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data pengguna telah berhasil dihapus.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect("admin/user_list");
	}

	public function car_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "cars",
			"title" => "Car List",
			"cars" => $this->ModelCar->get()->result()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/car_list", $data);
		$this->load->view("admin/footer", $data);
	}

	public function car_add()
	{
		$this->form_validation->set_rules('number_plate', 'Plat Nomor', 'required|trim|min_length[3]|max_length[11]|is_unique[cars.number_plate]', [
			'required' => '%s tidak boleh kosong!',
			"min_length" => "%s terlalu pendek",
			"max_length" => "%s terlalu panjang",
			"is_unique" => "%s telah terdaftar"
		]);
		$this->form_validation->set_rules("merk", "Merk", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("type_id", "Tipe Mobil", "required", [
			"required" => "Pilih salah satu %s",
		]);
		$this->form_validation->set_rules("transmition", "Transmisi", "required", [
			"required" => "Pilih salah satu %s",
		]);
		$this->form_validation->set_rules("seat", "Jumlah Kursi", "required|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);
		$this->form_validation->set_rules("year", "Tahun", "required", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("price", "Harga Sewa", "required|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$data = [
				"user" => $user,
				"activeLink" => "cars",
				"title" => "Car Add",
				"types" => $this->ModelType->get()->result()
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/car_add", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$number_plate = $this->input->POST("number_plate");
			$merk = $this->input->POST("merk");
			$transmition = $this->input->POST("transmition");
			$type_id = $this->input->POST("type_id");
			$seat = $this->input->POST("seat");
			$year = $this->input->POST("year");
			$price = $this->input->POST("price");
			$image = $_FILES['image']['name'];

			if ($image) {
				$config['upload_path'] = './assets/img/cars/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = '3000';
				$config['file_name'] = 'cars_' . time();
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
					$data = [
						"user" => $user,
						"activeLink" => "cars",
						"title" => "Car Add",
						"types" => $this->ModelType->get()->result(),
						"error" => ["image" => $this->upload->display_errors("<small class='text-danger'>", "</small>")]
					];
					$this->load->view("admin/header", $data);
					$this->load->view("admin/sidebar", $data);
					$this->load->view("admin/topbar", $data);
					$this->load->view("admin/car_add", $data);
					$this->load->view("admin/footer", $data);
				} else {
					$car_id = getCar_id();
					$data = [
						"id" => $car_id,
						"number_plate" => $number_plate,
						"merk" => $merk,
						"transmition" => $transmition,
						"seat" => $seat,
						"year" => $year,
						"price" => $price,
						"image" => $this->upload->data()["file_name"],
						"type_id" => $type_id
					];
					$this->ModelCar->insert($data);
					$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data mobil telah berhasil ditambah.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
					redirect("admin/car_list");
				}
			}

		}
	}

	public function car_delete($car_id)
	{
		$car = $this->ModelCar->getById($car_id)->row();
		unlink(FCPATH . 'assets/img/cars/' . $car->image);

		$this->ModelCar->deleteWhere(["id" => $car_id]);
		$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data mobil telah berhasil dihapus.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
		redirect("admin/car_list");
	}

	public function car_edit($car_id)
	{
		$this->form_validation->set_rules("merk", "Merk", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("type_id", "Tipe Mobil", "required", [
			"required" => "Pilih salah satu %s",
		]);
		$this->form_validation->set_rules("transmition", "Transmisi", "required", [
			"required" => "Pilih salah satu %s",
		]);
		$this->form_validation->set_rules("seat", "Jumlah Kursi", "required|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);
		$this->form_validation->set_rules("year", "Tahun", "required", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("price", "Harga Sewa", "required|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
			$data = [
				"user" => $user,
				"activeLink" => "cars",
				"title" => "Car Edit",
				"types" => $this->ModelType->get()->result(),
				"car" => $this->ModelCar->getById($car_id)->row()
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/car_edit", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$dataCar = [];

			$merk = $this->input->POST("merk");
			$transmition = $this->input->POST("transmition");
			$type_id = $this->input->POST("type_id");
			$seat = $this->input->POST("seat");
			$year = $this->input->POST("year");
			$price = $this->input->POST("price");

			$image = $_FILES['image']['name'];
			if ($image) {
				$config['upload_path'] = './assets/img/cars/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = '3000';
				$config['file_name'] = 'cars_' . time();
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();
					$data = [
						"user" => $user,
						"activeLink" => "cars",
						"title" => "Car Edit",
						"types" => $this->ModelType->get()->result(),
						"car" => $this->ModelCar->getById($car_id)->row(),
						"error" => ["image" => $this->upload->display_errors("<small class='text-danger'>", "</small>")]
					];
					$this->load->view("admin/header", $data);
					$this->load->view("admin/sidebar", $data);
					$this->load->view("admin/topbar", $data);
					$this->load->view("admin/car_edit", $data);
					$this->load->view("admin/footer", $data);
				} else {
					$car = $this->ModelCar->getById($car_id)->row();
					unlink(FCPATH . 'assets/img/cars/' . $car->image);

					$dataCar = [
						"merk" => $merk,
						"transmition" => $transmition,
						"seat" => $seat,
						"year" => $year,
						"price" => $price,
						"image" => $this->upload->data()["file_name"],
						"type_id" => $type_id
					];
					$this->ModelCar->update($dataCar, $car_id);
					$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data mobil telah berhasil diubah.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
					redirect("admin/car_list");
				}
			} else {
				$dataCar = [
					"merk" => $merk,
					"transmition" => $transmition,
					"seat" => $seat,
					"year" => $year,
					"price" => $price,
					"type_id" => $type_id
				];
				$this->ModelCar->update($dataCar, $car_id);
				$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data mobil telah berhasil diubah.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect("admin/car_list");
			}

		}
	}

	public function role_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "roles",
			"title" => "Role List",
			"roles" => $this->ModelRole->get()->result()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/role_list", $data);
		$this->load->view("admin/footer", $data);
	}

	public function role_add()
	{
		$this->form_validation->set_rules("role", "Role", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "roles",
				"title" => "Role Add",
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/role_add", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"role" => $this->input->POST("role")
			];

			$this->ModelRole->insert($data);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data role telah berhasil ditambah.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect("admin/role_list");
		}
	}

	public function role_edit($role_id)
	{
		$this->form_validation->set_rules("role", "Role", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "roles",
				"title" => "Role Edit",
				"role" => $this->ModelRole->getWhere($role_id)->row()
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/role_edit", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"role" => $this->input->POST("role")
			];

			$this->ModelRole->update($data, $role_id);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data role telah berhasil diperbaharui.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect("admin/role_list");
		}
	}
	public function role_delete($role_id)
	{
		$this->ModelRole->deleteWhere(["id" => $role_id]);
		$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data role telah berhasil dihapus.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect("admin/role_list");
	}

	public function type_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "types",
			"title" => "Type Car List",
			"types" => $this->ModelType->get()->result()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/type_list", $data);
		$this->load->view("admin/footer", $data);
	}

	public function type_add()
	{
		$this->form_validation->set_rules("type", "Tipe", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "types",
				"title" => "Type Car Add",
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/type_add", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"type" => $this->input->POST("type")
			];

			$this->ModelType->insert($data);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data tipe mobil telah berhasil ditambah.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect("admin/type_list");
		}
	}

	public function type_edit($type_id)
	{
		$this->form_validation->set_rules("type", "Tipe", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "types",
				"title" => "Type Car Edit",
				"type" => $this->ModelType->getWhere($type_id)->row()
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/type_edit", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"type" => $this->input->POST("type")
			];

			$this->ModelType->update($data, $type_id);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data tipe mobil telah berhasil diperbaharui.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect("admin/type_list");
		}
	}
	public function type_delete($type_id)
	{
		$this->ModelType->deleteWhere(["id" => $type_id]);
		$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data tipe mobil telah berhasil dihapus.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect("admin/type_list");
	}


	public function bank_list()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "banks",
			"title" => "Bank List",
			"banks" => $this->ModelBank->get()->result()
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/bank_list", $data);
		$this->load->view("admin/footer", $data);
	}

	public function bank_add()
	{
		$this->form_validation->set_rules("bank", "Bank", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("number", "Nomor Rekening", "required|trim|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);
		$this->form_validation->set_rules("name", "Atas Nama", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "banks",
				"title" => "Bank Add",
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/bank_add", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"bank" => $this->input->POST("bank"),
				"number" => $this->input->POST("number"),
				"name" => $this->input->POST("name"),
			];

			$this->ModelBank->insert($data);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data bank telah berhasil ditambah.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect("admin/bank_list");
		}
	}

	public function bank_edit($bank_id)
	{
		$this->form_validation->set_rules("bank", "Bank", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("number", "Nomor Rekening", "required|trim|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);
		$this->form_validation->set_rules("name", "Atas Nama", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);

		if (!$this->form_validation->run()) {
			$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

			$data = [
				"user" => $user,
				"activeLink" => "banks",
				"title" => "Bank Edit",
				"bank" => $this->ModelBank->getWhere($bank_id)->row()
			];
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/bank_edit", $data);
			$this->load->view("admin/footer", $data);
		} else {
			$data = [
				"bank" => $this->input->POST("bank"),
				"number" => $this->input->POST("number"),
				"name" => $this->input->POST("name"),
			];

			$this->ModelBank->update($data, $bank_id);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Selamat!</strong> Data bank telah berhasil diperbaharui.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect("admin/bank_list");
		}
	}
	public function bank_delete($bank_id)
	{
		$this->ModelBank->deleteWhere(["id" => $bank_id]);
		$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Selamat!</strong> Data bank telah berhasil dihapus.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect("admin/bank_list");
	}

	public function profile()
	{
		$user = $this->ModelUser->getWhere(["email" => $this->session->userdata("email")])->row();

		$data = [
			"user" => $user,
			"activeLink" => "profile",
			"title" => "Profile",
		];
		$this->load->view("admin/header", $data);
		$this->load->view("admin/sidebar", $data);
		$this->load->view("admin/topbar", $data);
		$this->load->view("admin/profile", $data);
		$this->load->view("admin/footer", $data);
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

			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/edit_profile", $data);
			$this->load->view("admin/footer", $data);
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
			redirect("admin/profile");
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
			$this->load->view("admin/header", $data);
			$this->load->view("admin/sidebar", $data);
			$this->load->view("admin/topbar", $data);
			$this->load->view("admin/edit_password", $data);
			$this->load->view("admin/footer", $data);
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
				redirect("admin/profile");
			} else {
				$this->session->set_flashdata("alert", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf!</strong> Password lama tidak sesuai.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect("admin/edit_password");
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