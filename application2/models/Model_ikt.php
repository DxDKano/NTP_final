<?php
class Model_ikt extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

	public function ambil_sub_ikt_blok4($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $type_blok = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->from('sub_ikt_blok4');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->where('subsektor', $id_subsektor);
		if ($type_blok != NULL) $this->db->where('type_blok', $type_blok);
		if ($id_komoditas != NULL) $this->db->like('b4_k3', $id_komoditas,'after');
		$this->db->order_by('b4_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function ambil_sub_ikt_blok5($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $type_blok = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_ikt_blok5');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
    if ($type_blok != NULL) $this->db->where('type_blok', $type_blok);
		if ($id_komoditas != NULL) $this->db->LIKE('b5_k4', $id_komoditas,'after');
		$this->db->order_by('b5_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

  public function ambil_sub_ikt_blok5d($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_ikt_blok5d');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b5_k4', $id_komoditas,'after');
		$this->db->order_by('b5_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function ambil_sub_ikt_blok6($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_ikt_blok6');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b6_k3', $id_komoditas,'after');
		$this->db->order_by('b6_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function ambil_sub_ikt_blok7($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_ikt_blok7');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b7_k4', $id_komoditas,'after');
    $this->db->order_by('b7_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

  private function mapingSubIKTBlok4($data,$payload,$sampel){

		foreach ($payload as $item){
			$data[]=array(
				"uuid"=>$item->uuid,
				"tahun"=>$sampel['tahun'],
				"id_prov"=>$sampel['id_prov'],
				"id_kab"=>$sampel['id_kab'],
				"id_kec"=>$sampel['id_kec'],
				"id_desa"=>$sampel['id_desa'],
				"blok_sensus"=>$sampel['blok_sensus'],
				"no_ruta"=>$sampel['no_ruta'],
				"nama_ruta"=>$sampel['nama_ruta'],
				"alamat_ruta"=>$sampel['alamat_ruta'],
				"subsektor"=>$sampel['subsektor'],
				"kode_komoditas"=>$sampel['kode_komoditas'],
				"komoditas"=>$sampel['komoditas'],
				"sampel"=>$sampel['sampel'],
				"type_blok"=>$item->type_blok,
				"b4_k1"=>$item->p1,
				"b4_k2"=>$item->p2,
				"b4_k3"=>$item->p3,
				"b4_k4"=>$item->p4,
				"b4_k5"=>$item->p5,
				"b4_k6"=>$item->p6,
        "b4_k7"=>$item->p7,
        "b4_k8"=>$item->p8,
			);
		}
		return $data;
	}

	private function mapingSubIKTBlok5($data,$payload,$sampel){

		foreach ($payload as $item){
			$data[]=array(
				"uuid"=>$item->uuid,
				"tahun"=>$sampel['tahun'],
				"id_prov"=>$sampel['id_prov'],
				"id_kab"=>$sampel['id_kab'],
				"id_kec"=>$sampel['id_kec'],
				"id_desa"=>$sampel['id_desa'],
				"blok_sensus"=>$sampel['blok_sensus'],
				"no_ruta"=>$sampel['no_ruta'],
				"nama_ruta"=>$sampel['nama_ruta'],
				"alamat_ruta"=>$sampel['alamat_ruta'],
				"subsektor"=>$sampel['subsektor'],
				"kode_komoditas"=>$sampel['kode_komoditas'],
				"komoditas"=>$sampel['komoditas'],
				"sampel"=>$sampel['sampel'],
        "type_blok"=>$item->type_blok,
				"b5_k1"=>$item->p1,
				"b5_k2"=>$item->p2,
				"b5_k3"=>$item->p3,
				"b5_k4"=>$item->p4,
				"b5_k5"=>$item->p5,
				"b5_k6"=>$item->p6,
			);
		}
		return $data;
	}

  private function mapingSubIKTBlok5d($data,$payload,$sampel){

    foreach ($payload as $item){
      $data[]=array(
        "uuid"=>$item->uuid,
        "tahun"=>$sampel['tahun'],
        "id_prov"=>$sampel['id_prov'],
        "id_kab"=>$sampel['id_kab'],
        "id_kec"=>$sampel['id_kec'],
        "id_desa"=>$sampel['id_desa'],
        "blok_sensus"=>$sampel['blok_sensus'],
        "no_ruta"=>$sampel['no_ruta'],
        "nama_ruta"=>$sampel['nama_ruta'],
        "alamat_ruta"=>$sampel['alamat_ruta'],
        "subsektor"=>$sampel['subsektor'],
        "kode_komoditas"=>$sampel['kode_komoditas'],
        "komoditas"=>$sampel['komoditas'],
        "sampel"=>$sampel['sampel'],
        "b5_k1"=>$item->p1,
        "b5_k2"=>$item->p2,
        "b5_k3"=>$item->p3,
        "b5_k4"=>$item->p4,
        "b5_k5"=>$item->p5,
        "b5_k6"=>$item->p6,
        "b5_k7"=>$item->p7,
      );
    }
    return $data;
  }

	private function mapingSubIKTBlok6($data,$payload,$sampel){

		foreach ($payload as $item){
			$data[]=array(
				"uuid"=>$item->uuid,
				"tahun"=>$sampel['tahun'],
				"id_prov"=>$sampel['id_prov'],
				"id_kab"=>$sampel['id_kab'],
				"id_kec"=>$sampel['id_kec'],
				"id_desa"=>$sampel['id_desa'],
				"blok_sensus"=>$sampel['blok_sensus'],
				"no_ruta"=>$sampel['no_ruta'],
				"nama_ruta"=>$sampel['nama_ruta'],
				"alamat_ruta"=>$sampel['alamat_ruta'],
				"subsektor"=>$sampel['subsektor'],
				"kode_komoditas"=>$sampel['kode_komoditas'],
				"komoditas"=>$sampel['komoditas'],
				"sampel"=>$sampel['sampel'],
				"b6_k1"=>$item->p1,
				"b6_k2"=>$item->p2,
				"b6_k3"=>$item->p3,
				"b6_k4"=>$item->p4,
				"b6_k5"=>$item->p5,
				"b6_k6"=>$item->p6,
        "b6_k7"=>$item->p7,
			);
		}
		return $data;
	}

  private function mapingSubIKTBlok7($data,$payload,$sampel){

    foreach ($payload as $item){
      $data[]=array(
        "uuid"=>$item->uuid,
        "tahun"=>$sampel['tahun'],
        "id_prov"=>$sampel['id_prov'],
        "id_kab"=>$sampel['id_kab'],
        "id_kec"=>$sampel['id_kec'],
        "id_desa"=>$sampel['id_desa'],
        "blok_sensus"=>$sampel['blok_sensus'],
        "no_ruta"=>$sampel['no_ruta'],
        "nama_ruta"=>$sampel['nama_ruta'],
        "alamat_ruta"=>$sampel['alamat_ruta'],
        "subsektor"=>$sampel['subsektor'],
        "kode_komoditas"=>$sampel['kode_komoditas'],
        "komoditas"=>$sampel['komoditas'],
        "sampel"=>$sampel['sampel'],
        "b7_k1"=>$item->p1,
        "b7_k2"=>$item->p2,
        "b7_k3"=>$item->p3,
        "b7_k4"=>$item->p4,
        "b7_k5"=>$item->p5,
        "b7_k6"=>$item->p6,
      );
    }
    return $data;
  }


	public function hapusBlok($table,$uuids) {
		$this->db->trans_start();
		$this->db->where_in('uuid',$uuids);
		$this->db->delete($table);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function isi_halaman1($payload = NULL) {
		$this->db->trans_start();
		$data=array(
      "kode_petugas"=>$payload->kode_petugas,
      "b1_r8"=>$payload->b1_r8,
      "b1_r9"=>$payload->b1_r9,
			"nama_pcl"=>$payload->b2->p1a,
			"kode_pcl"=>$payload->b2->p2a,
			"tanggal_pcl"=>$payload->b2->p3a,
			"tanggal_pml"=>$payload->b2->p3b,
			"tanggal_edit"=>date("Y-m-d H:i")
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

  public function isi_halaman2($sampel,$payload = NULL) {
		$this->db->trans_start();

    $data=array(
			"b4_a_k6_total"=>$payload->b4_a_k6_total
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);

    $data3=array(
      "b3_r1_k3"=>$payload->b3_r1_k3,
      "b3_r1_k4"=>$payload->b3_r1_k4,
      "b3_r1_k5"=>$payload->b3_r1_k5,
      "b3_r1_k6"=>$payload->b3_r1_k6,
      "b3_r1_k7"=>$payload->b3_r1_k7,
      "b3_r1_k8"=>$payload->b3_r1_k8,
      "b3_r1_k9"=>$payload->b3_r1_k9,
      "b3_r1_k10"=>$payload->b3_r1_k10,
      "b3_r2_k3"=>$payload->b3_r2_k3,
      "b3_r2_k4"=>$payload->b3_r2_k4,
      "b3_r2_k5"=>$payload->b3_r2_k5,
      "b3_r2_k6"=>$payload->b3_r2_k6,
      "b3_r2_k7"=>$payload->b3_r2_k7,
      "b3_r2_k8"=>$payload->b3_r2_k8,
      "b3_r2_k9"=>$payload->b3_r2_k9,
      "b3_r2_k10"=>$payload->b3_r2_k10,
      "b3_r3_k3"=>$payload->b3_r3_k3,
      "b3_r3_k4"=>$payload->b3_r3_k4,
      "b3_r3_k5"=>$payload->b3_r3_k5,
      "b3_r3_k6"=>$payload->b3_r3_k6,
      "b3_r3_k7"=>$payload->b3_r3_k7,
      "b3_r3_k8"=>$payload->b3_r3_k8,
      "b3_r3_k9"=>$payload->b3_r3_k9,
      "b3_r3_k10"=>$payload->b3_r3_k10,
      "b3_r4_k6"=>$payload->b3_r4_k6,
      "b3_r4_k7"=>$payload->b3_r4_k7,
      "b3_r4_k8"=>$payload->b3_r4_k8,
      "b3_r4_k9"=>$payload->b3_r4_k9,
      "b3_r4_k10"=>$payload->b3_r4_k10,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data3, $where);

	  $data4 = array();
	  if(count($payload->b4_a)>0) {
		  $data4 = $this->mapingSubIKTBlok4($data4, $payload->b4_a, $sampel);
	  }

	  foreach ($data4 as $item){
		  $this->db->replace('sub_ikt_blok4', $item);
	  }
	  if(count($payload->b4_del)>0){
		  $this->hapusBlok("sub_ikt_blok4",$payload->b4_del);
	  }
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function isi_halaman3($sampel,$payload = NULL) {
		$this->db->trans_start();

    $data=array(
			"b4_b_k6_total"=>$payload->b4_b_k6_total
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);

		$data4 = array();
		if(count($payload->b4_b)>0) {
			$data4 = $this->mapingSubIKTBlok4($data4, $payload->b4_b, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_ikt_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_ikt_blok4",$payload->b4_del);
		}
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman4($sampel,$payload = NULL) {
		$this->db->trans_start();

    $data=array(
			"b5_a_k6_total"=>$payload->b5_a_k6_total,
      "b5_b_k6_total"=>$payload->b5_b_k6_total
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);

		$data5 = array();
		if(count($payload->b5_a)>0) {
			$data5 = $this->mapingSubIKTBlok5($data5, $payload->b5_a, $sampel);
		}
		if(count($payload->b5_b)>0){
			$data5=$this->mapingSubIKTBlok5($data5, $payload->b5_b,$sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_ikt_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_ikt_blok5",$payload->b5_del);
		}
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman5($sampel,$payload = NULL) {
		$this->db->trans_start();

    $data=array(
			"b5_c_k6_total"=>$payload->b5_c_k6_total
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);

    $data5 = array();
		if(count($payload->b5_c)>0) {
			$data5 = $this->mapingSubIKTBlok5($data5, $payload->b5_c, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_ikt_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_ikt_blok5",$payload->b5_del);
		}
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman6($sampel,$payload = NULL) {
		$this->db->trans_start();

    $data=array(
			"b5_d_k7_total"=>$payload->b5_d_k7_total
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);

    $data5 = array();
    if(count($payload->b5_d)>0) {
      $data5 = $this->mapingSubIKTBlok5d($data5, $payload->b5_d, $sampel);
    }
    foreach ($data5 as $item){
      $this->db->replace('sub_ikt_blok5d', $item);
    }
    if(count($payload->b5_del)>0){
      $this->hapusBlok("sub_ikt_blok5d",$payload->b5_del);
    }
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
  public function isi_halaman7($sampel,$payload = NULL) {
		$this->db->trans_start();
    $data6 = array();
    $data7 = array();
    if(count($payload->b6_r2)>0) {
      $data6 = $this->mapingSubIKTBlok6($data6, $payload->b6_r2, $sampel);
    }
    foreach ($data6 as $item){
      $this->db->replace('sub_ikt_blok6', $item);
    }
    if(count($payload->b6_del)>0){
      $this->hapusBlok("sub_ikt_blok6",$payload->b6_del);
    }

    if(count($payload->b7)>0) {
      $data7 = $this->mapingSubIKTBlok7($data7, $payload->b7, $sampel);
    }
    foreach ($data7 as $item){
      $this->db->replace('sub_ikt_blok7', $item);
    }
    if(count($payload->b6_del)>0){
      $this->hapusBlok("sub_ikt_blok7",$payload->b7_del);
    }
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman8($sampel,$payload = NULL) {
		$this->db->trans_start();

		$data=array(
      "status_entri"=>"sudah",
			"catatan"=>$payload->b8
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_ikt', $data, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function isianBlok4($data,$jenis){
		$uuid=$data['uuid'];
		return "<tr class='tr_b4_{$jenis}'>
					<td colspan='1'>{$data['b4_k1']}</td>
					<td colspan='1'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b4_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b4_k3']}'></td>
					<td colspan='2'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b4_k4']}'></td>
					<td colspan='1'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b4_k5']}'></td>
					<td colspan='1'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b4_k6']}'></td>
          <td colspan='1'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b4_k7']}'></td>
          <td colspan='1'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p8' data-uuid='{$uuid}' value='{$data['b4_k8']}'></td>
					<td colspan='1'><button type='button'
								class='btn btn-danger btn-hapus-b4-{$jenis}'
								data-uuid='{$uuid}'>
						<i class='ri ri-close-fill'>
					</button></td>
				</tr>";
	}

	public function isianBlok5($data,$jenis)
	{
		$uuid = $data['uuid'];
		return "<tr class='tr_b5_{$jenis}'>
          <td colspan='1'>{$data['b5_k1']}</td>
          <td colspan='1'><input type='text' class='form-control b5-{$jenis}-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b5_k2']}'></td>
          <td colspan='1'><input type='text' class='form-control b5-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b5_k3']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b5_k4']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b5_k5']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b5_k6']}'></td>
          <td colspan='1'><button type='button'
                class='btn btn-danger btn-hapus-b5-{$jenis}'
                data-uuid='{$uuid}'>
            <i class='ri ri-close-fill'>
          </button></td>
        </tr>";
	}

  // public function isianBlok5d($data,$jenis)
  // {
  //   $uuid = $data['uuid'];
  //   return "<tr class='tr_b5_{$jenis}'>
  //         <td colspan='1'>{$data['b5_k1']}</td>
  //         <td colspan='1'><input type='text' class='form-control b5-{$jenis}-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b5_k2']}'></td>
  //         <td colspan='1'><input type='text' class='form-control b5-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b5_k3']}'></td>
  //         <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b5_k4']}'></td>
  //         <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b5_k5']}'></td>
  //         <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b5_k6']}'></td>
  //         <td colspan='1'><input type='number' class='form-control b5-{$jenis}-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b5_k7']}'></td>
  //         <td colspan='1'><button type='button'
  //               class='btn btn-danger btn-hapus-b5-{$jenis}'
  //               data-uuid='{$uuid}'>
  //           <i class='ri ri-close-fill'>
  //         </button></td>
  //       </tr>";
  // }

  public function isianBlok5d($data)
  {
    $uuid = $data['uuid'];
    return "<tr class='tr_b5_d}'>
          <td colspan='1'>{$data['b5_k1']}</td>
          <td colspan='1'><input type='text' class='form-control b5-d-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b5_k2']}'></td>
          <td colspan='1'><input type='text' class='form-control b5-d-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b5_k3']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-d-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b5_k4']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-d-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b5_k5']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-d-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b5_k6']}'></td>
          <td colspan='1'><input type='number' class='form-control b5-d-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b5_k7']}'></td>
          <td colspan='1'><button type='button'
                class='btn btn-danger btn-hapus-b5-d'
                data-uuid='{$uuid}'>
            <i class='ri ri-close-fill'>
          </button></td>
        </tr>";
  }

	public function isianBlok6($data)
	{
		$uuid = $data['uuid'];
		return "<tr class='tr_b6_r2'>
					<td colspan='1'>{$data['b6_k1']}</td>
					<td colspan='3'><input type='text' class='form-control b6-r2-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b6_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b6-r2-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b6_k3']}'></td>
					<td colspan='2'><input type='number' class='form-control b6-r2-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b6_k4']}'></td>
					<td colspan='2'><input type='number' class='form-control b6-r2-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b6_k5']}'></td>
          <td colspan='2'><input type='number' class='form-control b6-r2-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b6_k6']}'></td>
          <td colspan='2'><input type='number' class='form-control b6-r2-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b6_k7']}'></td>
					<td colspan='1'><button type='button'
								class='btn btn-danger btn-hapus-b6-r2'
								data-uuid='{$uuid}'>
						<i class='ri ri-close-fill'>
					</button></td>
				</tr>";
	}

  public function isianBlok7($data)
	{
		$uuid = $data['uuid'];
		return "<tr class='tr_b7'>
					<td colspan='1'>{$data['b7_k1']}</td>
					<td colspan='4'><input type='text' class='form-control b7-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b7_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b7-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b7_k3']}'></td>
					<td colspan='2'><input type='text' class='form-control b7-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b7_k4']}'></td>
					<td colspan='3'><input type='number' class='form-control b7-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b7_k5']}'></td>
					<td colspan='2'><input type='number' class='form-control b7-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b7_k6']}'></td>
					<td colspan='1'><button type='button'
								class='btn btn-danger btn-hapus-b7'
								data-uuid='{$uuid}'>
						<i class='ri ri-close-fill'>
					</button></td>
				</tr>";
	}

  public function ambil_ikt_b3($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL)
  {
    $this->db->select('*');
    $this->db->FROM('sub_ikt');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
    $query = $this->db->get();
    $result = $query->row_array();
		return $result;
  }
}
