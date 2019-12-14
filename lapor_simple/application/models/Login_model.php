<?php

class Login_model extends CI_Model
{
	  function cek_mahasiswa($username, $password)
  {
    $query = $this->db->query("SELECT * FROM mahasiswa WHERE email='$username' AND password=MD5('$password') LIMIT 1");
    return $query;
  }
}