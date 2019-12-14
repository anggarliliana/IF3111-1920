<?php

class Simple_masuk
{
	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
		// Load data model user
		$this->CI->load->model('user_model');
	}

	// Fungsi masuk
	public function masuk($username, $password)
	{
		$check	=	$this->CI->user_model->masuk($username, $password);
		// Jika ada data user, maka crrate session masuk
		if ($check) {
			$id_user		=	$check->id_user;
			$nama			=	$check->nama;
			$akses_level	=	$check->akses_level;

			// Create session
			$this->CI->session->set_userdata('id_user', $id_user);
			$this->CI->session->set_userdata('nama', $nama);
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('akses_level', $akses_level);

			//redirect ke halaman admin yang diproteksi
			redirect(base_url('admin/dashboard_admin'), 'refresh');
		} else {
			// Kalau tidak ada (usernama password salah), maka jangan masuk lagi
			$this->CI->session->set_flashdata('warning', 'Username atau password salah');
			redirect(base_url('masuk'), 'refresh');
		}
	}

	// Fungsi cek masuk
	public function cek_masuk()
	{
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum masuk');
			redirect(base_url('masuk'), 'refresh');
		}
	}

	// Fungso keluar
	public function keluar()
	{
		// Mmembuang semua session yang telah diset pada saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');

		// Setelah session dibuang, maka redirect ke masuk
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil keluar');
		redirect(base_url('masuk'), 'refresh');
	}
}
