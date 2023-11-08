<?php
class Model_kuesioner extends CI_Model {

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

  // public function ambil_kuesioner($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $sampel = NULL)
  // {
  //   $this->db->select('*');
  //   $this->db->FROM('kuesioner');
  //   $this->db->order_by('no_ruta', 'asc');
  //   if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
  //   if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
  //   if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
  //   $query = $this->db->get();
  //   $result = $query->result_array();
  //   return $result;
  // }

  public function ambil_kuesioner($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $sampel = NULL)
  {
    $sql = "
    SELECT tahun, id_prov, id_kab, id_kec, id_desa, blok_sensus, no_ruta, nama_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel, status_entri
    FROM sub_trk";
    if ($tahun != NULL) $sql .=" WHERE tahun = '{$tahun}'";
    if ($id_prov != NULL) $sql .=" AND id_prov = '{$id_prov}'";
    if ($id_kab != NULL) $sql .=" AND id_kab = '{$id_kab}'";
    if ($sampel != NULL) $sql .=" AND sampel = '{$sampel}'";
    $sql .="UNION
    SELECT tahun, id_prov, id_kab, id_kec, id_desa, blok_sensus, no_ruta, nama_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel, status_entri
    FROM sub_tp";
    if ($tahun != NULL) $sql .=" WHERE tahun = '{$tahun}'";
    if ($id_prov != NULL) $sql .=" AND id_prov = '{$id_prov}'";
    if ($id_kab != NULL) $sql .=" AND id_kab = '{$id_kab}'";
    if ($sampel != NULL) $sql .=" AND sampel = '{$sampel}'";
    $sql .="UNION
    SELECT tahun, id_prov, id_kab, id_kec, id_desa, blok_sensus, no_ruta, nama_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel, status_entri
    FROM sub_ikt";
    if ($tahun != NULL) $sql .=" WHERE tahun = '{$tahun}'";
    if ($id_prov != NULL) $sql .=" AND id_prov = '{$id_prov}'";
    if ($id_kab != NULL) $sql .=" AND id_kab = '{$id_kab}'";
    if ($sampel != NULL) $sql .=" AND sampel = '{$sampel}'";
    $sql .="UNION
    SELECT tahun, id_prov, id_kab, id_kec, id_desa, blok_sensus, no_ruta, nama_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel, status_entri
    FROM sub_tpr";
    if ($tahun != NULL) $sql .=" WHERE tahun = '{$tahun}'";
    if ($id_prov != NULL) $sql .=" AND id_prov = '{$id_prov}'";
    if ($id_kab != NULL) $sql .=" AND id_kab = '{$id_kab}'";
    if ($sampel != NULL) $sql .=" AND sampel = '{$sampel}'";
    $sql .="ORDER BY CAST(no_ruta AS INT) ASC";

    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
    // if ($tahun != NULL) $sql .=" WHERE tahun = '{$tahun}'";
    // if ($id_prov != NULL) $sql .=" AND id_prov = '{$id_prov}'";
    // if ($id_kab != NULL) $sql .=" AND id_kab = '{$id_kab}'";
    // if ($sampel != NULL) $sql .=" AND sampel = '{$sampel}'";
  }

  // public function ambil_kuesioner($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $sampel = NULL)
  // {
  //   $this->db->select('tahun, id_prov, id_kab, id_kec, no_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel');
  //   $this->db->FROM('sub_tp');
  //   $query = $this->db->get();
  //   $subQuery1 = $this->db->_compile_select();
  //   $this->db->_reset_select();
  //
  //   $this->db->select('tahun, id_prov, id_kab, id_kec, no_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel');
  //   $this->db->FROM('sub_ikt');
  //   $query = $this->db->get();
  //   $subQuery2 = $this->db->_compile_select();
  //   $this->db->_reset_select();
  //
  //   $this->db->select('tahun, id_prov, id_kab, id_kec, no_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel');
  //   $this->db->FROM('sub_tpr');
  //   $query = $this->db->get();
  //   $subQuery3 = $this->db->_compile_select();
  //   $this->db->_reset_select();
  //
  //   $this->db->select('tahun, id_prov, id_kab, id_kec, no_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel');
  //   $this->db->FROM('sub_trk');
  //   $query = $this->db->get();
  //   $subQuery4 = $this->db->_compile_select();
  //   $this->db->_reset_select();
  //
  //   $this->db->query("select * from ($subQuery1 UNION $subQuery2 UNION $subQuery3 UNION $subQuery4) as unionTable");
  //
  //   if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
  //   if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
  //   if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
  //   $this->db->order_by('no_ruta', 'asc');
  //   $query = $this->db->get();
  //   $result = $query->result_array();
  //   return $result;
  // }

  // public function ambil_kuesioner($jenis = NULL, $tahun = NULL, $id_prov = NULL, $id_kab = NULL, $sampel = NULL)
  // {
  //   $this->db->select('*');
  //   $this->db->FROM('sub_'$jenis);
  //   $this->db->order_by('no_ruta', 'asc');
  //   if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
  //   if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
  //   if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
  //   $query = $this->db->get();
  //   $result = $query->result_array();
  //   return $result;
  // }

	public function ambil_kuesioner_konsumsi($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $sampel = NULL)
	{
		$sql = "
    SELECT tahun, id_prov, id_kab, id_kec, id_desa, blok_sensus, no_ruta, nama_ruta, alamat_ruta, subsektor, kode_komoditas, komoditas, sampel, status_entri
    FROM sub_k";
		if ($tahun != NULL) $sql .=" WHERE tahun = '{$tahun}'";
		if ($id_prov != NULL) $sql .=" AND id_prov = '{$id_prov}'";
		if ($id_kab != NULL) $sql .=" AND id_kab = '{$id_kab}'";
		if ($sampel != NULL) $sql .=" AND sampel = '{$sampel}'";

		$query = $this->db->query($sql);
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

	public function ambil_kabupaten($id_prov = NULL, $id_kab = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('kabupaten');
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		$query = $this->db->get();
		$result = $query->result_array();
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
    if ($id_komoditas != NULL) $this->db->LIKE('id_komoditas', $id_komoditas,'after');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function ambil_subsektor($id_subsektor = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('subsektor');
    if ($id_subsektor != NULL) $this->db->WHERE('id_subsektor', $id_subsektor);
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

  public function isi_ubah_sampel($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $no_ruta = NULL, $data = NULL) {
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

	public function ambil_sub($jenis,$tahun,$id_prov,$id_kab,$id_kec,$id_desa,$no_ruta)
	{
		$sql = "SELECT a.*, b.nama_prov,c.nama_kab,d.nama_kec,e.nama_desa,f.subsektor AS nama_subsektor
			FROM sub_{$jenis} a
			LEFT JOIN propinsi b ON a.id_prov=b.id_prov
			LEFT JOIN kabupaten c ON a.id_prov=c.id_prov AND a.id_kab=c.id_kab
			LEFT JOIN kecamatan d ON a.id_prov=d.id_prov AND a.id_kab=d.id_kab AND a.id_kec=d.id_kec
			LEFT JOIN desa e ON a.id_prov=e.id_prov AND a.id_kab=e.id_kab AND a.id_kec=e.id_kec AND a.id_desa=e.id_desa
			LEFT JOIN subsektor f ON a.subsektor=f.id_subsektor
			WHERE a.tahun=? AND a.id_prov=? AND a.id_kab=? AND a.id_kec=? AND a.id_desa=? AND a.no_ruta=?";

		$query = $this->db->query($sql,array($tahun,$id_prov,$id_kab,$id_kec,$id_desa,$no_ruta));
		$result = $query->result_array()[0];
		return $result;
	}

  public function ambil_status_tabel_kor($filter_tahun = NULL, $id_prov = NULL, $id_kab = NULL) {
    $SQL1="
    SELECT e.subsektor, IFNULL(e.target_awal,0) AS target_awal, IFNULL(e.target,0) AS target, IFNULL(f.realisasi,0) AS realisasi
    FROM
        (SELECT c.id_subsektor, c.subsektor, c.target_awal, d.target
              FROM
              (SELECT a.id_subsektor, a.subsektor, b.target_awal
                FROM
                (SELECT id_subsektor, subsektor FROM subsektor
                WHERE id_subsektor = '1') a
                  LEFT JOIN
                  (SELECT id_subsektor, target AS target_awal FROM subsektor_target st
                  WHERE st.tahun = ".$filter_tahun." and st.id_prov = ".$id_prov." and st.id_kab = ".$id_kab.") b
                  ON a.id_subsektor=b.id_subsektor) c
                      LEFT JOIN
                      (SELECT subsektor ,COUNT(*) AS target FROM sub_tp tp
                      WHERE tp.tahun = ".$filter_tahun." and tp.id_prov = ".$id_prov." and tp.id_kab = ".$id_kab."
                      GROUP BY subsektor) d
                      ON c.id_subsektor=d.subsektor) e
                        	LEFT JOIN
                          (SELECT subsektor ,COUNT(*) AS realisasi FROM sub_tp tp
                          WHERE tp.tahun = ".$filter_tahun." and tp.id_prov = ".$id_prov." and tp.id_kab = ".$id_kab." and tp.status_entri = 'sudah'
                          GROUP BY subsektor) f
                          ON e.id_subsektor=f.subsektor
    UNION
    SELECT e.subsektor, IFNULL(e.target_awal,0) AS target_awal, IFNULL(e.target,0) AS target, IFNULL(f.realisasi,0) AS realisasi
    FROM
        (SELECT c.id_subsektor, c.subsektor, c.target_awal, d.target
              FROM
              (SELECT a.id_subsektor, a.subsektor, b.target_awal
                FROM
                (SELECT id_subsektor, subsektor FROM subsektor
                WHERE id_subsektor = '3') a
                  LEFT JOIN
                  (SELECT id_subsektor, target AS target_awal FROM subsektor_target st
                  WHERE st.tahun = ".$filter_tahun." and st.id_prov = ".$id_prov." and st.id_kab = ".$id_kab.") b
                  ON a.id_subsektor=b.id_subsektor) c
                      LEFT JOIN
                      (SELECT subsektor ,COUNT(*) AS target FROM sub_tpr tpr
                      WHERE tpr.tahun = ".$filter_tahun." and tpr.id_prov = ".$id_prov." and tpr.id_kab = ".$id_kab."
                      GROUP BY subsektor) d
                      ON c.id_subsektor=d.subsektor) e
                        	LEFT JOIN
                          (SELECT subsektor ,COUNT(*) AS realisasi FROM sub_tpr tpr
                          WHERE tpr.tahun = ".$filter_tahun." and tpr.id_prov = ".$id_prov." and tpr.id_kab = ".$id_kab." and tpr.status_entri = 'sudah'
                          GROUP BY subsektor) f
                          ON e.id_subsektor=f.subsektor
    UNION
    SELECT e.subsektor, IFNULL(e.target_awal,0) AS target_awal, IFNULL(e.target,0) AS target, IFNULL(f.realisasi,0) AS realisasi
    FROM
        (SELECT c.id_subsektor, c.subsektor, c.target_awal, d.target
              FROM
              (SELECT a.id_subsektor, a.subsektor, b.target_awal
                FROM
                (SELECT id_subsektor, subsektor FROM subsektor
                WHERE id_subsektor = '4') a
                  LEFT JOIN
                  (SELECT id_subsektor, target AS target_awal FROM subsektor_target st
                  WHERE st.tahun = ".$filter_tahun." and st.id_prov = ".$id_prov." and st.id_kab = ".$id_kab.") b
                  ON a.id_subsektor=b.id_subsektor) c
                      LEFT JOIN
                      (SELECT subsektor ,COUNT(*) AS target FROM sub_trk trk
                      WHERE trk.tahun = ".$filter_tahun." and trk.id_prov = ".$id_prov." and trk.id_kab = ".$id_kab."
                      GROUP BY subsektor) d
                      ON c.id_subsektor=d.subsektor) e
                        	LEFT JOIN
                          (SELECT subsektor ,COUNT(*) AS realisasi FROM sub_trk trk
                          WHERE trk.tahun = ".$filter_tahun." and trk.id_prov = ".$id_prov." and trk.id_kab = ".$id_kab." and trk.status_entri = 'sudah'
                          GROUP BY subsektor) f
                          ON e.id_subsektor=f.subsektor
    UNION
    SELECT e.subsektor, IFNULL(e.target_awal,0) AS target_awal, IFNULL(e.target,0) AS target, IFNULL(f.realisasi,0) AS realisasi
    FROM
        (SELECT c.id_subsektor, c.subsektor, c.target_awal, d.target
              FROM
              (SELECT a.id_subsektor, a.subsektor, b.target_awal
                FROM
                (SELECT id_subsektor, subsektor FROM subsektor
                WHERE id_subsektor = '5') a
                  LEFT JOIN
                  (SELECT id_subsektor, target AS target_awal FROM subsektor_target st
                  WHERE st.tahun = ".$filter_tahun." and st.id_prov = ".$id_prov." and st.id_kab = ".$id_kab.") b
                  ON a.id_subsektor=b.id_subsektor) c
                      LEFT JOIN
                      (SELECT subsektor ,COUNT(*) AS target FROM sub_ikt ikt
                      WHERE ikt.tahun = ".$filter_tahun." and ikt.id_prov = ".$id_prov." and ikt.id_kab = ".$id_kab."
                      GROUP BY subsektor) d
                      ON c.id_subsektor=d.subsektor) e
                        	LEFT JOIN
                          (SELECT subsektor ,COUNT(*) AS realisasi FROM sub_ikt ikt
                          WHERE ikt.tahun = ".$filter_tahun." and ikt.id_prov = ".$id_prov." and ikt.id_kab = ".$id_kab." and ikt.status_entri = 'sudah'
                          GROUP BY subsektor) f
                          ON e.id_subsektor=f.subsektor
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

  public function update_sudah($id_prov, $id_kab, $id_kec, $id_desa, $no_ruta)
  {
    $this->db->WHERE('id_prov', $id_prov);
    $this->db->WHERE('id_kab', $id_kab);
    $this->db->WHERE('id_kec', $id_kec);
    $this->db->WHERE('id_desa', $id_desa);
    $this->db->WHERE('no_ruta', $no_ruta);
    $this->db->update('sub_tp', array('status_entri' => 'sudah'));
    return true;
  }

  public function update_sudah_blok3()
  {
    $this->db->select('id_prov, id_kab, id_kec, id_desa, no_ruta');
    $this->db->FROM('sub_tp_blok3');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
}
