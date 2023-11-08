<?php
class Model_trk extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function ambil_sub_trk_blok3a($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_trk_blok3a');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b3a_k2', $id_komoditas,'after');
		$this->db->order_by('b3a_k1');
		$query = $this->db->get();
		$result = $query->result_array();
    return $result;
	}

	public function ambil_sub_trk_blok3b($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_trk_blok3b');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b3_k2', $id_komoditas,'after');
		$this->db->order_by('b3b_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_trk_blok4($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $type_blok = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->from('sub_trk_blok4');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->where('subsektor', $id_subsektor);
		if ($type_blok != NULL) $this->db->where('type_blok', $type_blok);
		if ($id_komoditas != NULL) $this->db->like('b4_k4', $id_komoditas,'after');
		$this->db->order_by('b4_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_trk_blok5($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_trk_blok5');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b5_k3', $id_komoditas,'after');
		$this->db->order_by('b5_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_trk_blok6($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_trk_blok6');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b6_k4', $id_komoditas,'after');
		$this->db->order_by('b6_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_trk_blok7($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_trk_blok7');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b3_k2', $id_komoditas,'after');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

  private function mapingSubTrkBlok3a($data,$payload,$sampel){

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
			  "b3a_k1"=>$item->p1,
			  "b3a_k2"=>$item->p2,
			  "b3a_k3"=>$item->p3,
			  "b3a_k4"=>$item->p4,
			  "b3a_k5"=>$item->p5,
			  "b3a_k6"=>$item->p6,
			  "b3a_r1_k3"=>$item->p7,
        "b3a_r1_k4"=>$item->p8,
        "b3a_r2_k3"=>$item->p9,
        "b3a_r2_k4"=>$item->p10,
        "b3a_r3_k3"=>$item->p11,
        "b3a_r3_k4"=>$item->p12,
        "b3a_r4_k3"=>$item->p13,
        "b3a_r4_k4"=>$item->p14,
        "b3a_r5_k3"=>$item->p15,
        "b3a_r5_k4"=>$item->p16,
        "b3a_r6_k3"=>$item->p17,
        "b3a_r6_k4"=>$item->p18,
        "b3a_r7_k3"=>$item->p19,
        "b3a_r7_k4"=>$item->p20,
        "b3a_r8_k3"=>$item->p21,
        "b3a_r9_k3"=>$item->p22,
        "b3a_r9_k4"=>$item->p23,
        "b3a_r10_k3"=>$item->p24,
        "b3a_r10_k4"=>$item->p25,
        "b3a_r11_k4"=>$item->p26,
        "b3a_r12_k4"=>$item->p27,
		  );
	  }
	  return $data;
  }
  private function mapingSubTrkBlok3b($data,$payload,$sampel){

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
			  "b3b_k1"=>$item->p1,
			  "b3b_k2"=>$item->p2a,
			  "b3b_k2A"=>$item->p2b,
			  "b3b_k3"=>$item->p3,
			  "b3_k4"=>$item->p4,
			  "b3_k5"=>$item->p5,
			  "b3_k6"=>$item->p6,
			  "b3_k7"=>$item->p7,
			  "b3_k8"=>$item->p8,
			  "b3_k9"=>$item->p9,
			  "b3_k10"=>$item->p10,
		  );
	  }
	  return $data;
  }
  private function mapingSubTrkBlok4($data,$payload,$sampel){

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
			);
		}
		return $data;
	}
	private function mapingSubTrkBlok5($data,$payload,$sampel){

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
	private function mapingSubTrkBlok6($data,$payload,$sampel){

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
		$this->db->update('sub_trk', $data, $where);
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
	  $data3 = array();
	  if(count($payload->b3_a)>0){
		  $data3=$this->mapingSubTrkBlok3a($data3,$payload->b3_a,$sampel);
	  }

	  foreach ($data3 as $item){
		  $this->db->replace('sub_trk_blok3a', $item);
	  }
	  if(count($payload->b3_del)>0){
		  $this->hapusBlok("sub_trk_blok3a",$payload->b3_del);
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
		$data3 = array();
		if(count($payload->b3_b)>0) {
			$data3 = $this->mapingSubTrkBlok3b($data3, $payload->b3_b, $sampel);
		}
		foreach ($data3 as $item){
			$this->db->replace('sub_trk_blok3b', $item);
		}
		if(count($payload->b3_del)>0){
			$this->hapusBlok("sub_trk_blok3b",$payload->b3_del);
		}
    $data=array(
      "b3b_k6_total"=>$payload->b3b_k6_total,
    );
    $where = array(
      "tahun"=>$payload->tahun,
      "id_prov"=>$payload->id_prov,
      "id_kab"=>$payload->id_kab,
      "id_kec"=>$payload->id_kec,
      "id_desa"=>$payload->id_desa,
      "no_ruta"=>$payload->no_ruta,
    );
    $this->db->update('sub_trk', $data, $where);
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
		$data4 = array();
		if(count($payload->b4_a1)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_a1, $sampel);
		}
    if(count($payload->b4_a2)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_a2, $sampel);
		}
		if(count($payload->b4_b1)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_b1, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_trk_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_trk_blok4",$payload->b4_del);
		}
		$data=array(
      "b4a_k6_total"=>$payload->b4a_k6_total,
			"b4a1_k6_total"=>$payload->b4a1_k6_total,
      "b4a2_k6_total"=>$payload->b4a2_k6_total,
			"b4b_k6_total"=>$payload->b4b_k6_total,
			"b4b1_k6_total"=>$payload->b4b1_k6_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_trk', $data, $where);
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
		$data4 = array();
		if(count($payload->b4_b2)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_b2, $sampel);
		}
    if(count($payload->b4_c)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_c, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_trk_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_trk_blok4",$payload->b4_del);
		}
		$data=array(
			"b4b2_k6_total"=>$payload->b4b2_k6_total,
      "b4c_k6_total"=>$payload->b4c_k6_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_trk', $data, $where);
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
		$data4 = array();
		if(count($payload->b4_d)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_d, $sampel);
		}
    if(count($payload->b4_e)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_e, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_trk_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_trk_blok4",$payload->b4_del);
		}
		$data=array(
			"b4d_k6_total"=>$payload->b4d_k6_total,
      "b4e_k6_total"=>$payload->b4e_k6_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_trk', $data, $where);
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
		$data4 = array();
		if(count($payload->b4_f)>0) {
			$data4 = $this->mapingSubTrkBlok4($data4, $payload->b4_f, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_trk_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_trk_blok4",$payload->b4_del);
		}
		$data=array(
			"b4f_k6_total"=>$payload->b4f_k6_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_trk', $data, $where);
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
			"b5_r1"=>$payload->b5_r1
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_trk', $data, $where);
		$data5 = array();
		if(count($payload->b5_r2)>0) {
			$data5 = $this->mapingSubTrkBlok5($data5, $payload->b5_r2, $sampel);
		}

		foreach ($data5 as $item){
			$this->db->replace('sub_trk_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_trk_blok5",$payload->b5_del);
		}
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

  public function isi_halaman9($sampel,$payload = NULL) {
    $this->db->trans_start();

    $data6 = array();
    if(count($payload->b6)>0) {
      $data6 = $this->mapingSubTrkBlok6($data6, $payload->b6, $sampel);
    }
    foreach ($data6 as $item){
      $this->db->replace('sub_trk_blok6', $item);
    }
    if(count($payload->b6_del)>0){
      $this->hapusBlok("sub_trk_blok6",$payload->b6_del);
    }
    if ($this->db->trans_status() !== false){
      $this->db->trans_commit();
      return true;
    } else {
      $this->db->trans_rollback();
      return false;
    }
  }
	public function isi_halaman10($sampel,$payload = NULL) {
		$this->db->trans_start();

		$data=array(
      "status_entri"=>"sudah",
			"catatan"=>$payload->b7
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_trk', $data, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}



	public function isianBlok3a($data,$jenis){
		$uuid=$data['uuid'];
		return "<table class='table table-sm table-bordered small tr_b3_{$jenis}'>
      <thead class='text-center top-0'>
      <tr>
        <td>No</td>
        <td>Jenis Ternak/Unggas</td>
        <td>Kode<br>(Diisi Pengawas)</td>
        <td colspan='2'>Jenis Kegiatan<br>1. Pengembangbiakan<br>2. Penggemukan<br>4. Lainnya</td>
        <td colspan='2'>Status Pengelolaan Ternak/Unggas<br>1. Milik Sendiri<br>2. Bagi Hasil<br>3. Milik Sendiri dan Bagi Hasil</td>
        <td>Persentase (%)<br>Bagi Hasil Jika<br>Kolom (5) Berkode<br>2 atau 3</td>
        <td>Aksi</td>
      </tr>
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td colspan='2'>4</td>
        <td colspan='2'>5</td>
        <td>6</td>
        <td>7</td>
      </tr>
      </thead>
      <tbody>
      <tr>
				<td>{$data['b3a_k1']}</td>
				<td><input type='text' class='form-control b3-{$jenis}-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b3a_k2']}'></td>
        <td><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b3a_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b3a_k4']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b3a_k5']}'></td>
        <td><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b3a_k6']}'></td>
        <td rowspan='14'><button type='button'
							class='btn btn-danger btn-hapus-b3-{$jenis}'
							data-uuid='{$uuid}'>
					<i class='ri ri-close-fill'>
				</button></td>
      </tr>
      <tr>
        <td>No</td>
        <td colspan='3'>Rincian Mutasi Ternak/Unggas</td>
        <td colspan='2'>Banyaknya</td>
        <td colspan='2'>Nilai<br>(000Rp)</td>
      </tr>
      <tr>
        <td>1</td>
        <td colspan='3'>Jumlah Ternak/Unggas Stok Akhir</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b3a_r1_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p8' data-uuid='{$uuid}' value='{$data['b3a_r1_k4']}'></td>
			</tr>
      <tr>
        <td>2</td>
        <td colspan='3'>Penjualan</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p9' data-uuid='{$uuid}' value='{$data['b3a_r2_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p10' data-uuid='{$uuid}' value='{$data['b3a_r2_k4']}'></td>
			</tr>
      <tr>
        <td>3</td>
        <td colspan='3'>Pemotongan</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p11' data-uuid='{$uuid}' value='{$data['b3a_r3_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p12' data-uuid='{$uuid}' value='{$data['b3a_r3_k4']}'></td>
			</tr>
      <tr>
        <td>4</td>
        <td colspan='3'>Kematian</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p13' data-uuid='{$uuid}' value='{$data['b3a_r4_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p14' data-uuid='{$uuid}' value='{$data['b3a_r4_k4']}'></td>
			</tr>
      <tr>
        <td>5</td>
        <td colspan='3'>Pengurangan Lain</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p15' data-uuid='{$uuid}' value='{$data['b3a_r5_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p16' data-uuid='{$uuid}' value='{$data['b3a_r5_k4']}'></td>
			</tr>
      <tr>
        <td>6</td>
        <td colspan='3'>Jumlah (R1+R2+R3+R4+R5)</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p17' data-uuid='{$uuid}' value='{$data['b3a_r6_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p18' data-uuid='{$uuid}' value='{$data['b3a_r6_k4']}'></td>
			</tr>
      <tr>
        <td>7</td>
        <td colspan='3'>Pembelian Ternak/Day Old Chick (DOC)</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p19' data-uuid='{$uuid}' value='{$data['b3a_r7_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p20' data-uuid='{$uuid}' value='{$data['b3a_r7_k4']}'></td>
			</tr>
      <tr>
        <td>8</td>
        <td colspan='3'>Kelahiran/Penetasan</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p21' data-uuid='{$uuid}' value='{$data['b3a_r8_k3']}'></td>
        <td colspan='2' class='table-secondary'></td>
			</tr>
      <tr>
        <td>9</td>
        <td colspan='3'>Penambahan Lain</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p22' data-uuid='{$uuid}' value='{$data['b3a_r9_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p23' data-uuid='{$uuid}' value='{$data['b3a_r9_k4']}'></td>
			</tr>
      <tr>
        <td>10</td>
        <td colspan='3'>Jumlah Ternak/Unggas Stok Awal<br>Khusus untuk kolom (3) (R6-R7-R8-R9)</td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p24' data-uuid='{$uuid}' value='{$data['b3a_r10_k3']}'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p25' data-uuid='{$uuid}' value='{$data['b3a_r10_k4']}'></td>
			</tr>
      <tr>
        <td>11</td>
        <td colspan='3'>Jumlah (R7+R9+R10)</td>
        <td colspan='2' class='table-secondary'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p26' data-uuid='{$uuid}' value='{$data['b3a_r11_k4']}'></td>
			</tr>
      <tr>
        <td>12</td>
        <td colspan='3'>Nilai Pertambahan Bobot Ternak/Unggas Kolom (4) (R6-R11)</td>
        <td colspan='2' class='table-secondary'></td>
        <td colspan='2'><input type='number' class='form-control b3-{$jenis}-input' data-keyx='p27' data-uuid='{$uuid}' value='{$data['b3a_r12_k4']}'></td>
			</tr>
      </tbody>
      </table>";
	}

  public function isianBlok3b($data,$jenis){
		$uuid=$data['uuid'];
    return "<tr class='tr_b3_{$jenis}'>
				<td>{$data['b3b_k1']}</td>
				<td>{$data['b3b_k2']}<br>{$data['b3b_k2A']}</td>
				<td><input name='b3_{$jenis}_3[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b3b_k3']}'></td>
				<td><input name='b3_{$jenis}_4[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b3_k4']}'></td>
				<td><input name='b3_{$jenis}_5[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b3_k5']}'></td>
				<td><input name='b3_{$jenis}_6[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b3_k6']}'></td>
				<td><input name='b3_{$jenis}_7[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b3_k7']}'></td>
				<td><input name='b3_{$jenis}_8[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p8' data-uuid='{$uuid}' value='{$data['b3_k8']}'></td>
				<td><input name='b3_{$jenis}_9[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p9' data-uuid='{$uuid}' value='{$data['b3_k9']}'></td>
				<td><input name='b3_{$jenis}_10[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p10' data-uuid='{$uuid}' value='{$data['b3_k10']}'></td>
        <td><button type='button'
							class='btn btn-danger btn-hapus-b3-{$jenis}'
							data-uuid='{$uuid}'>
					<i class='ri ri-close-fill'>
				</button></td>
			</tr>";
	}

	public function isianBlok4($data,$jenis){
		$uuid=$data['uuid'];
		return "<tr class='tr_b4_{$jenis}'>
					<td colspan='1'>{$data['b4_k1']}</td>
					<td colspan='3'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b4_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b4_k3']}'></td>
					<td colspan='2'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b4_k4']}'></td>
					<td colspan='2'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b4_k5']}'></td>
					<td colspan='2'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b4_k6']}'></td>
					<td colspan='1'><button type='button'
								class='btn btn-danger btn-hapus-b4-{$jenis}'
								data-uuid='{$uuid}'>
						<i class='ri ri-close-fill'>
					</button></td>
				</tr>";
	}

	public function isianBlok4f($data,$jenis)
	{
		$uuid = $data['uuid'];
		return "<tr class='tr_b4_{$jenis}'>
					<td colspan='1'>{$data['b4f_k1']}</td>
					<td colspan='3'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b4f_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b4-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b4f_k3']}'></td>
					<td colspan='2'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b4f_k4']}'></td>
					<td colspan='2'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b4f_k5']}'></td>
					<td colspan='2'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b4f_k6']}'></td>
					<td colspan='2'><input type='number' class='form-control b4-{$jenis}-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b4f_k7']}'></td>
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
		return "<tr class='tr_b5_r2'>
					<td colspan='1'>{$data['b5_k1']}</td>
					<td colspan='3'><input type='text' class='form-control b5-r2-input' data-keyx='p2' data-uuid='${uuid}' value='{$data['b5_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b5-r2-input' data-keyx='p3' data-uuid='${uuid}' value='{$data['b5_k3']}'></td>
					<td colspan='2'><input type='number' class='form-control b5-r2-input' data-keyx='p4' data-uuid='${uuid}' value='{$data['b5_k4']}'></td>
					<td colspan='2'><input type='number' class='form-control b5-r2-input' data-keyx='p5' data-uuid='${uuid}' value='{$data['b5_k5']}'></td>
					<td colspan='2'><input type='number' class='form-control b5-r2-input' data-keyx='p6' data-uuid='${uuid}' value='{$data['b5_k6']}'></td>
					<td colspan='2'><input type='number' class='form-control b5-r2-input' data-keyx='p7' data-uuid='${uuid}' value='{$data['b5_k7']}'></td>
					<td colspan='1'><button type='button'
								class='btn btn-danger btn-hapus-b5-r2'
								data-uuid='${uuid}'>
						<i class='ri ri-close-fill'>
					</button></td>
				</tr>";
	}

	public function isianBlok6($data)
	{
		$uuid = $data['uuid'];
		return "<tr class='tr_b6'>
					<td colspan='1'>{$data['b6_k1']}</td>
					<td colspan='4'><input type='text' class='form-control b6-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b6_k2']}'></td>
					<td colspan='2'><input type='text' class='form-control b6-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b6_k3']}'></td>
					<td colspan='2'><input type='text' class='form-control b6-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b6_k4']}'></td>
					<td colspan='2'><input type='number' class='form-control b6-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b6_k5']}'></td>
					<td colspan='3'><input type='number' class='form-control b6-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b6_k6']}'></td>
					<td colspan='1'><button type='button'
								class='btn btn-danger btn-hapus-b6'
								data-uuid='{$uuid}'>
						<i class='ri ri-close-fill'>
					</button></td>
				</tr>";
	}

}
