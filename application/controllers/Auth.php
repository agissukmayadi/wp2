<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		middleware_login();
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => '%s tidak boleh kosong!',
			'valid_email' => '%s tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => '%s tidak boleh kosong!',
		]);

		if (!$this->form_validation->run()) {
			$this->load->view("auth/login");
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = htmlspecialchars($this->input->POST("email", true));
		$password = $this->input->POST("password");

		$user = $this->ModelUser->getWhere(["email" => $email])->row();
		if ($user) {
			if (password_verify($password, $user->password)) {
				$data = [
					"email" => $user->email,
					"role_id" => $user->role_id
				];
				$this->session->set_userdata($data);

				if ($user->role_id == 1) {
					redirect("admin");
				} elseif ($user->role_id == 2) {
					redirect("employee");
				} else {
					redirect("home");
				}
			} else {
				$this->session->set_flashdata("alert", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf,</strong> Password yang anda masukan salah.
				<button type="button" class="btn-close" data-bs-dismiss="alert"
					aria-label="Close"></button>
				</div>');
				redirect("auth");
			}
		} else {
			$this->session->set_flashdata("alert", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf,</strong> Email yang anda masukan tidak terdaftar.
				<button type="button" class="btn-close" data-bs-dismiss="alert"
					aria-label="Close"></button>
				</div>');
			redirect("auth");
		}
	}
	public function register()
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
			$this->load->view("auth/register");
		} else {
			$data = [
				"name" => htmlspecialchars($this->input->POST("name", true)),
				"phone" => htmlspecialchars($this->input->POST("phone", true)),
				"email" => htmlspecialchars($this->input->POST("email", true)),
				"password" => password_hash($this->input->POST("password"), PASSWORD_DEFAULT),
				"address" => htmlspecialchars($this->input->POST("address", true)),
				"role_id" => 3
			];
			$this->ModelUser->insert($data);
			$this->session->set_flashdata("alert", '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Selamat,</strong> Akun anda berhasil diregistrasi.
			<button type="button" class="btn-close" data-bs-dismiss="alert"
				aria-label="Close"></button>
			</div>');
			redirect("auth");
		}
	}
}