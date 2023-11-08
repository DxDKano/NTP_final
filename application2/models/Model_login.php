<?php
class Model_login extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function ambil_pengguna($username = NULL) {
    $this->db->where('username', $username);
    $query = $this->db->get('pengguna');
    $hasil = $query->row_array();
    return $hasil;
  }

  public function ambil_user($username = NULL) {
    $this->db->select('id_prov, id_kab, kode_petugas, username, nama, foto, level');
    $this->db->where('username', $username);
    $query = $this->db->get('pengguna');
    $hasil = $query->row_array();
    return $hasil;
  }

}
