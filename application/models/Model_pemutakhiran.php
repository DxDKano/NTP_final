<?php
class Model_pemutakhiran extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function ambil_pengguna($username = NULL) {
    $this->db->where('username', $username);
    $query = $this->db->get('pengguna');
    $hasil = $query->row_array();
    return $hasil;
  }
  public function ambil_tahun($tahun = NULL) {
    $this->db->distinct();
    $this->db->select('tahun');
    $this->db->FROM('pemutakhiran');
    if ($tahun != NULL) {$this->db->where('tahun', $tahun);}
    $this->db->order_by('tahun', 'DESC');
    $query = $this->db->get();
    $hasil = $query->result_array();
    return $hasil;
  }

  public function ambil_sampel($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $sampel = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('pemutakhiran');
    $this->db->order_by('no_ruta', 'asc');
    if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($sampel != NULL) $this->db->WHERE('sampel', $sampel);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function ambil_target($tahun = NULL, $id_prov = NULL, $id_kab = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('subsektor_target');
    if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function ambil_sampel_nurt_array($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $no_ruta = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('pemutakhiran');
    $this->db->order_by('no_ruta', 'asc');
    if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
    $query = $this->db->get();
    $result = $query->row_array();
    return $result;
  }

  public function ambil_kecamatan($id_prov = NULL, $id_kab = NULL, $id_kec = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('kecamatan');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function ambil_desa($id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('desa');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function ambil_komoditas($id_subsektor = NULL, $id_komoditas = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('komoditas');
    if ($id_subsektor != NULL) $this->db->WHERE('id_subsektor', $id_subsektor);
    if ($id_komoditas != NULL) $this->db->WHERE('id_komoditas', $id_komoditas);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function isi_terima_sampel($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $no_ruta = NULL, $data = NULL) {
    $this->db->trans_start();
    // var_dump($data);
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_prov', $id_prov);
    $this->db->WHERE('id_kab', $id_kab);
    $this->db->WHERE('no_ruta', $no_ruta);
    $this->db->update('pemutakhiran', $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_tambah_sampel($data = NULL) {
    $this->db->trans_start();
    $this->db->insert('pemutakhiran', $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_kuesioner_sampel($data = NULL) {
    $this->db->trans_start();
    $this->db->insert('kuesioner', $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_kuesioner_sub_sampel($kode, $data = NULL) {
    $this->db->trans_start();
    $this->db->insert('sub_'.$kode, $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_kuesioner_konsumsi($data = NULL)
  {
    $this->db->trans_start();
    $this->db->insert('sub_k', $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_edit_sampel($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $no_ruta = NULL, $data = NULL) {
    $this->db->trans_start();
    // var_dump($data);
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_prov', $id_prov);
    $this->db->WHERE('id_kab', $id_kab);
    $this->db->WHERE('no_ruta', $no_ruta);
    $this->db->update('pemutakhiran', $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_ekuesioner_sampel($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $no_ruta = NULL, $data = NULL) {
    $this->db->trans_start();
    // var_dump($data);
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_prov', $id_prov);
    $this->db->WHERE('id_kab', $id_kab);
    $this->db->WHERE('no_ruta', $no_ruta);
    $this->db->update('kuesioner', $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function isi_ekuesioner_sub_sampel($kode, $tahun = NULL, $id_prov = NULL, $id_kab = NULL, $no_ruta = NULL, $data = NULL) {
    $this->db->trans_start();
    // var_dump($data);
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_prov', $id_prov);
    $this->db->WHERE('id_kab', $id_kab);
    $this->db->WHERE('no_ruta', $no_ruta);
    $this->db->update('sub_'.$kode, $data);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function hapus_kuesioner_sub_sampel($kode_sebelum, $tahun, $id_prov, $id_kab, $id_kec, $id_desa, $no_ruta) {
    $this->db->trans_start();
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_prov', $id_prov);
    $this->db->WHERE('id_kab', $id_kab);
    $this->db->WHERE('id_kec', $id_kec);
    $this->db->WHERE('id_desa', $id_desa);
    $this->db->WHERE('no_ruta', $no_ruta);
    $this->db->delete('sub_'.$kode_sebelum);
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }

  public function ambil_status_tabel($filter_tahun = NULL, $id_prov = NULL, $id_kab = NULL) {
    $SQL1="
    SELECT c.subsektor, IFNULL(c.target_awal,0) AS target_awal, IFNULL(d.realisasi,0) AS realisasi
      FROM
      (SELECT a.id_subsektor, a.subsektor, b.target_awal
        FROM
        (SELECT id_subsektor, subsektor FROM subsektor) a
          LEFT JOIN
          (SELECT id_subsektor, target AS target_awal FROM subsektor_target st
          WHERE st.tahun = ".$filter_tahun." and st.id_prov = ".$id_prov." and st.id_kab = ".$id_kab.") b
          ON a.id_subsektor=b.id_subsektor) c
          LEFT JOIN
          (SELECT subsektor ,COUNT(*) AS realisasi FROM pemutakhiran p
  				WHERE p.tahun = ".$filter_tahun." and p.id_prov = ".$id_prov." and p.id_kab = ".$id_kab." and p.status_pemutakhiran = 'sudah'
                  GROUP BY subsektor) d
                  ON c.id_subsektor=d.subsektor
                  ORDER BY c.id_subsektor
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
  }

  public function ambil_operator_monitoring($filter_tahun = NULL, $id_prov = NULL, $id_kab = NULL) {
    $SQL1="
    SELECT a.nama, IFNULL(b.realisasi,0) AS realisasi
    FROM
        (SELECT nama, kode_petugas FROM pengguna
      	WHERE id_prov=".$id_prov." and id_kab=".$id_kab.") a
          	LEFT JOIN
          	(SELECT kode_petugas, COUNT(*) AS realisasi FROM pemutakhiran p
               WHERE p.tahun = ".$filter_tahun." and p.id_prov = ".$id_prov." and p.id_kab = ".$id_kab." and p.status_pemutakhiran = 'sudah'
               GROUP BY kode_petugas) b
               ON a.kode_petugas=b.kode_petugas
               ORDER BY a.nama
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
  }

  public function ambil_kecamatan_monitoring($filter_tahun = NULL, $id_prov = NULL, $id_kab = NULL) {
    $SQL1="
    SELECT a.nama_kec, IFNULL(b.realisasi,0) AS realisasi
    FROM
        (SELECT nama_kec, id_kec FROM kecamatan
        WHERE id_prov=".$id_prov." and id_kab=".$id_kab.") a
            LEFT JOIN
            (SELECT id_kec, COUNT(*) AS realisasi FROM pemutakhiran p
               WHERE p.tahun = ".$filter_tahun." and p.id_prov = ".$id_prov." and p.id_kab = ".$id_kab." and p.status_pemutakhiran = 'sudah'
               GROUP BY id_kec) b
               ON a.id_kec=b.id_kec
               ORDER BY a.id_kec
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
  }
}
