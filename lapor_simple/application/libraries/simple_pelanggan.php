<?php

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
		// Load data model user
		$this->CI->load->model('pelanggan_model');
	}

	// Fungsi masuk
	public function masuk($email, $password)
	{
		$check    =    $this->CI->pelanggan_model->login($email, $password);
		// Jika ada data user, maka crrate session masuk
		if ($check) {
			$id_pelanggan   =    $check->id_pelanggan;
			$nama_pelanggan =    $check->nama_pelanggan;

			// Create session
			$this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->CI->session->set_userdata('email', $email);


			//redirect ke halaman admin yang diproteksi
			redirect(base_url('dasbor'), 'refresh');
		} else {
			// Kalau tidak ada (usernama password salah), maka jangan masuk lagi
			$this->CI->session->set_flashdata('warning', 'Username atau password salah');
			redirect(base_url('login'), 'refresh');
		}
	}

	// Fungsi cek masuk
	public function cek_login()
	{
		if ($this->CI->session->userdata('email') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum masuk');
			redirect(base_url('login'), 'refresh');
		}
	}

	// Fungsi keluar
	public function logout()
	{
		// Mmembuang semua session yang telah diset pada saat login
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');

		// Setelah session dibuang, maka redirect ke masuk
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil keluar');
		redirect(base_url('login'), 'refresh');
	}
}
