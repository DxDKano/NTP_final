<?php
class Model_beranda extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function st_today($status = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('surat_tugas');
    if ($status != NULL) $this->db->WHERE('status', $status);
    $this->db->WHERE('waktu_mulai <=', date("Y-m-d"));
    $this->db->WHERE('waktu_selesai >=', date("Y-m-d"));
    $this->db->WHERE('flag', '1');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

}
