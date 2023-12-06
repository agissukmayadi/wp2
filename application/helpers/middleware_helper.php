<?php

function middleware_user($role)
{
	$ci = get_instance();
	if ($ci->session->userdata("email")) {
		$user = $ci->ModelUser->getWhere(["email" => $ci->session->userdata("email")])->row();

		if ($user->role_id != $role) {
			$ci->session->set_flashdata("alert", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Maaf,</strong> Silahkan login terlebih dahulu.
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
							</div>');
			redirect("auth");
		}
	} else {
		$ci->session->set_flashdata("alert", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Maaf,</strong> Silahkan login terlebih dahulu.
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
							</div>');
		redirect("auth");
	}
}

function middleware_login()
{
	$ci = get_instance();
	if ($ci->session->userdata("email")) {
		$user = $ci->ModelUser->getWhere(["email" => $ci->session->userdata("email")])->row();
		if ($user->role_id == 1) {
			redirect("admin");
		} elseif ($user->role_id == 2) {
			redirect("employee");
		} else {
			redirect("home");
		}
	}
}

?>
