<?php
class Model_tpr extends CI_Model {

  public function __construct() {
    $this->load->database();
  }


	public function ambil_jenis_barang($sektor = NULL,$subsektor=NULL){

		$sql = "SELECT id_komoditas_makanan AS kode,komoditas_makanan AS nama,satuan
				FROM komoditas_makanan ";
		$params = array();
		if(!is_null($sektor)){
			$sql .= " WHERE id_sektor_makanan=? ";
			$params[] = $sektor;
			if(!is_null($subsektor)){
				$sql .= " AND id_subsektor_makanan=? ";
				$params[] = $subsektor;
			}
		}
		$query = $this->db->query($sql,$params);
		$rs =array();
		foreach ($query->result_array() as $item){
			$rs[$item['nama']] = $item;
		}
		return $rs;
	}


	public function ambil_sub_tpr_blok3($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $type_blok = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tpr_blok3');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
    if ($type_blok != NULL) $this->db->where('type_blok', $type_blok);
		if ($id_komoditas != NULL) $this->db->LIKE('b3_k2', $id_komoditas,'after');
		$this->db->order_by('b3_k1A');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_tpr_blok4($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $type_blok = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->from('sub_tpr_blok4');
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
	public function ambil_sub_tpr_blok4f($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->from('sub_tpr_blok4f');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->where('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->like('b4_k3', $id_komoditas,'after');
		$this->db->order_by('b4f_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_tpr_blok5($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tpr_blok5');
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
	public function ambil_sub_tpr_blok6($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tpr_blok6');
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
	public function ambil_sub_tpr_blok7($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tpr_blok7');
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

  private function mapingSubTprBlok3($data,$payload,$sampel){

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
			  "b3_k1"=>$item->p1,
			  "b3_k2"=>$item->p2a,
			  "b3_k2A"=>$item->p2b,
			  "b3_k3"=>$item->p3,
			  "b3_k4"=>$item->p4,
			  "b3_k5"=>$item->p5,
			  "b3_k6"=>$item->p6,
			  "b3_k7"=>$item->p7,
			  "b3_k8"=>$item->p8,
			  "b3_k9"=>$item->p9,
			  "b3_k10"=>$item->p10,
			  "b3_k11"=>$item->p11,
			  "b3_k12"=>$item->p12,
			  "b3_k13"=>$item->p13,
			  "b3_k14"=>$item->p14,
		  );
	  }
	  return $data;
  }
  private function mapingSubTprBlok4($data,$payload,$sampel){

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
	private function mapingSubTprBlok4f($data,$payload,$sampel){

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
				"b4f_k1"=>$item->p1,
				"b4f_k2"=>$item->p2,
				"b4f_k3"=>$item->p3,
				"b4f_k4"=>$item->p4,
				"b4f_k5"=>$item->p5,
				"b4f_k6"=>$item->p6,
				"b4f_k7"=>$item->p7,
			);
		}
		return $data;
	}
	private function mapingSubTprBlok5($data, $payload, $sampel){

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
	private function mapingSubTprBlok6($data, $payload, $sampel){

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


	private function mapingBlok4($jenis, $subjenis, $data, $payload, $sampel){

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
				"jenis"=>$jenis,
				"subjenis"=>$subjenis,
				"b4_k1"=>$item->p1,
				//"b4_k1b"=>$item->p1b,
				"b4_k2"=>$item->p2,
				"b4_k3"=>$item->p3,
				"b4_k4"=>$item->p4,
				"b4_k5"=>$item->p5,
				"b4_k6"=>$item->p6,
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
		$this->db->update('sub_tpr', $data, $where);
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
	  $data4 = array();
	  if(count($payload->b3_a)>0){
		  $data3=$this->mapingSubTprBlok3($data3,$payload->b3_a,$sampel);
	  }
	  foreach ($data3 as $item){
		  $this->db->replace('sub_tpr_blok3', $item);
	  }
	  if(count($payload->b3_del)>0){
		  $this->hapusBlok("sub_tpr_blok3",$payload->b3_del);
	  }
	  $data=array(
		  "b3_a_total"=>$payload->b3_a_total,
	  );
	  $where = array(
		  "tahun"=>$payload->tahun,
		  "id_prov"=>$payload->id_prov,
		  "id_kab"=>$payload->id_kab,
		  "id_kec"=>$payload->id_kec,
		  "id_desa"=>$payload->id_desa,
		  "no_ruta"=>$payload->no_ruta,
	  );
	  $this->db->update('sub_tpr', $data, $where);
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
		if(count($payload->b3_b)>0){
			$data3=$this->mapingSubTprBlok3($data3,$payload->b3_b,$sampel);
		}
		foreach ($data3 as $item){
			$this->db->replace('sub_tpr_blok3', $item);
		}
		if(count($payload->b3_del)>0){
			$this->hapusBlok("sub_tpr_blok3",$payload->b3_del);
		}
		$data=array(
			"b3_b_total"=>$payload->b3_b_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_tpr', $data, $where);
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
		if(count($payload->b4_a)>0) {
			$data4 = $this->mapingSubTprBlok4($data4, $payload->b4_a, $sampel);
		}
		if(count($payload->b4_b1)>0) {
			$data4 = $this->mapingSubTprBlok4($data4, $payload->b4_b1, $sampel);
		}
		if(count($payload->b4_b2)>0) {
			$data4 = $this->mapingSubTprBlok4($data4, $payload->b4_b2, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_tpr_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_tpr_blok4",$payload->b4_del);
		}
		$data=array(
			"b4_a_total"=>$payload->b4_a_total,
			"b4_b_total"=>$payload->b4_b_total,
			"b4_b1_total"=>$payload->b4_b_1_total,
			"b4_b2_total"=>$payload->b4_b_2_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_tpr', $data, $where);
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
		if(count($payload->b4_c)>0) {
			$data4 = $this->mapingSubTprBlok4($data4, $payload->b4_c, $sampel);
		}
		if(count($payload->b4_d)>0) {
			$data4 = $this->mapingSubTprBlok4($data4, $payload->b4_d, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_tpr_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_tpr_blok4",$payload->b4_del);
		}
		$data=array(
			"b4_c_total"=>$payload->b4_c_total,
			"b4_d_total"=>$payload->b4_d_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_tpr', $data, $where);
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
		if(count($payload->b4_e)>0) {
			$data4 = $this->mapingSubTprBlok4($data4, $payload->b4_e, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_tpr_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_tpr_blok4",$payload->b4_del);
		}
		$data=array(
			"b4_e_total"=>$payload->b4_e_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_tpr', $data, $where);
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
		$data4f = array();
		if(count($payload->b4_f)>0) {
			$data4f = $this->mapingSubTprBlok4f($data4f, $payload->b4_f, $sampel);
		}
		foreach ($data4f as $item){
			$this->db->replace('sub_tpr_blok4f', $item);
		}
		if(count($payload->b4f_del)>0){
			$this->hapusBlok("sub_tpr_blok4f",$payload->b4f_del);
		}
		$data=array(
			"b4_f_total"=>$payload->b4_f_total,
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_tpr', $data, $where);
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
		$this->db->update('sub_tpr', $data, $where);
		$data5 = array();
		$data6 = array();
		if(count($payload->b5_r2)>0) {
			$data5 = $this->mapingSubKbBlok5($data5, $payload->b5_r2, $sampel);
		}
		if(count($payload->b6)>0) {
			$data6 = $this->mapingSubKbBlok6($data6, $payload->b6, $sampel);
		}

		foreach ($data5 as $item){
			$this->db->replace('sub_tpr_blok5', $item);
		}
		foreach ($data6 as $item){
			$this->db->replace('sub_tpr_blok6', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_tpr_blok5",$payload->b5_del);
		}
		if(count($payload->b6_del)>0){
			$this->hapusBlok("sub_tpr_blok6",$payload->b6_del);
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
		$this->db->update('sub_tpr', $data, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}


	public function isianBlok3($data,$jenis){
		$uuid=$data['uuid'];
		return "<tr class='tr_b3_{$jenis}'>
				<td>{$data['b3_k1']}</td>
				<td>{$data['b3_k2']}<br>{$data['b3_k2A']}</td>
				<td><input name='b3_{$jenis}_3[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b3_k3']}'></td>
				<td><input name='b3_{$jenis}_4[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b3_k4']}'></td>
				<td><input name='b3_{$jenis}_5[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b3_k5']}'></td>
				<td><input name='b3_{$jenis}_6[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b3_k6']}'></td>
				<td><input name='b3_{$jenis}_7[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b3_k7']}'></td>
				<td><input name='b3_{$jenis}_8[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p8' data-uuid='{$uuid}' value='{$data['b3_k8']}'></td>
				<td><input name='b3_{$jenis}_9[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p9' data-uuid='{$uuid}' value='{$data['b3_k9']}'></td>
				<td><input name='b3_{$jenis}_10[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p10' data-uuid='{$uuid}' value='{$data['b3_k10']}'></td>
				<td><input name='b3_{$jenis}_11[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p11' data-uuid='{$uuid}' value='{$data['b3_k11']}'></td>
				<td><input name='b3_{$jenis}_12[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p12' data-uuid='{$uuid}' value='{$data['b3_k12']}'></td>
				<td><input name='b3_{$jenis}_13[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p13' data-uuid='{$uuid}' value='{$data['b3_k13']}'></td>
				<td><input name='b3_{$jenis}_14[]' type='number' class='form-control b3-{$jenis}-input' data-keyx='p14' data-uuid='{$uuid}' value='{$data['b3_k14']}'></td>
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
