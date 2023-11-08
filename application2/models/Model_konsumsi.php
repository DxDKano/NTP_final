<?php
class Model_konsumsi extends CI_Model {

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

	public function ambil_sub_k_blok3($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_k_blok3');
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$this->db->order_by('b3_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function ambil_sub_tp_blok4($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $jenis = NULL, $subjenis = NULL)
	{

		$this->db->select('*');
		$this->db->FROM('sub_k_blok4');
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($no_ruta != NULL) $this->db->WHERE('jenis', $jenis);
		if ($no_ruta != NULL) $this->db->WHERE('subjenis', $subjenis);
		$this->db->order_by('b4_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function ambil_sub_k_blok5($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $jenis = NULL, $subjenis = NULL)
	{

		$this->db->select('*');
		$this->db->FROM('sub_k_blok5');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($no_ruta != NULL) $this->db->WHERE('jenis', $jenis);
		if ($no_ruta != NULL) $this->db->WHERE('subjenis', $subjenis);
		$this->db->order_by('b5_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

  private function mapingBlok3($data, $payload, $sampel){

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
			  "b3_k1"=>$item->p1,
			  "b3_k2"=>$item->p2,
			  "b3_k3"=>$item->p3,
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
				"b4_k1b"=>$item->p1b,
				"b4_k2"=>$item->p2,
				"b4_k3"=>$item->p3,
				"b4_k4"=>$item->p4,
				"b4_k5"=>$item->p5,
				"b4_k6"=>$item->p6,
			);
		}
		return $data;
	}
	private function mapingBlok5($jenis, $subjenis, $data, $payload, $sampel){

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
				"b5_k1"=>$item->p1,
				"b5_k1b"=>$item->p1b,
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

	private function mapingBlok6($payload){
	  return array(
			  "b6_1" => $payload->b6_1,
			  "b6_1_a" => $payload->b6_1_a,
			  "b6_1_b" => $payload->b6_1_b,
			  "b6_1_a1" => $payload->b6_1_a1,
			  "b6_1_a2" => $payload->b6_1_a2,
			  "b6_1_a3" => $payload->b6_1_a3,
			  "b6_1_a4" => $payload->b6_1_a4,
			  "b6_1_a5" => $payload->b6_1_a5,
			  "b6_1_a6" => $payload->b6_1_a6,
			  "b6_1_a7" => $payload->b6_1_a7,
			  "b6_1_a8" => $payload->b6_1_a8,
			  "b6_1_a9" => $payload->b6_1_a9,
			  "b6_1_a10" => $payload->b6_1_a10,
			  "b6_1_a11" => $payload->b6_1_a11,
			  "b6_1_a12" => $payload->b6_1_a12,
			  "b6_1_b1" => $payload->b6_1_b1,
			  "b6_1_b2" => $payload->b6_1_b2,
			  "b6_1_b3" => $payload->b6_1_b3,
			  "b6_2_bln" => $payload->b6_2_bln,
			  "b6_2_a_bln" => $payload->b6_2_a_bln,
			  "b6_2_b_bln" => $payload->b6_2_b_bln,
			  "b6_2_c_bln" => $payload->b6_2_c_bln,
			  "b6_2_d_bln" => $payload->b6_2_d_bln,
			  "b6_2_e_bln" => $payload->b6_2_e_bln,
			  "b6_2_f_bln" => $payload->b6_2_f_bln,
			  "b6_2_a1_bln" => $payload->b6_2_a1_bln,
			  "b6_2_a2_bln" => $payload->b6_2_a2_bln,
			  "b6_2_a3_bln" => $payload->b6_2_a3_bln,
			  "b6_2_a4_bln" => $payload->b6_2_a4_bln,
			  "b6_2_b1_bln" => $payload->b6_2_b1_bln,
			  "b6_2_b2_bln" => $payload->b6_2_b2_bln,
			  "b6_2_b3_bln" => $payload->b6_2_b3_bln,
			  "b6_2_b4_bln" => $payload->b6_2_b4_bln,
			  "b6_2_c1_bln" => $payload->b6_2_c1_bln,
			  "b6_2_c2_bln" => $payload->b6_2_c2_bln,
			  "b6_2_c3_bln" => $payload->b6_2_c3_bln,
			  "b6_2_d1_bln" => $payload->b6_2_d1_bln,
			  "b6_2_d2_bln" => $payload->b6_2_d2_bln,
			  "b6_2_d3_bln" => $payload->b6_2_d3_bln,
			  "b6_2_d4_bln" => $payload->b6_2_d4_bln,
			  "b6_2_e1_bln" => $payload->b6_2_e1_bln,
			  "b6_2_e2_bln" => $payload->b6_2_e2_bln,
			  "b6_2_e3_bln" => $payload->b6_2_e3_bln,
			  "b6_2_e4_bln" => $payload->b6_2_e4_bln,
			  "b6_2_thn" => $payload->b6_2_thn,
			  "b6_2_a_thn" => $payload->b6_2_a_thn,
			  "b6_2_b_thn" => $payload->b6_2_b_thn,
			  "b6_2_c_thn" => $payload->b6_2_c_thn,
			  "b6_2_d_thn" => $payload->b6_2_d_thn,
			  "b6_2_e_thn" => $payload->b6_2_e_thn,
			  "b6_2_f_thn" => $payload->b6_2_f_thn,
			  "b6_2_a1_thn" => $payload->b6_2_a1_thn,
			  "b6_2_a2_thn" => $payload->b6_2_a2_thn,
			  "b6_2_a3_thn" => $payload->b6_2_a3_thn,
			  "b6_2_a4_thn" => $payload->b6_2_a4_thn,
			  "b6_2_b1_thn" => $payload->b6_2_b1_thn,
			  "b6_2_b2_thn" => $payload->b6_2_b2_thn,
			  "b6_2_b3_thn" => $payload->b6_2_b3_thn,
			  "b6_2_b4_thn" => $payload->b6_2_b4_thn,
			  "b6_2_c1_thn" => $payload->b6_2_c1_thn,
			  "b6_2_c2_thn" => $payload->b6_2_c2_thn,
			  "b6_2_c3_thn" => $payload->b6_2_c3_thn,
			  "b6_2_d1_thn" => $payload->b6_2_d1_thn,
			  "b6_2_d2_thn" => $payload->b6_2_d2_thn,
			  "b6_2_d3_thn" => $payload->b6_2_d3_thn,
			  "b6_2_d4_thn" => $payload->b6_2_d4_thn,
			  "b6_2_e1_thn" => $payload->b6_2_e1_thn,
			  "b6_2_e2_thn" => $payload->b6_2_e2_thn,
			  "b6_2_e3_thn" => $payload->b6_2_e3_thn,
			  "b6_2_e4_thn" => $payload->b6_2_e4_thn,
		  	"catatan" => $payload->catatan,
		  	"status_entri" => "sudah",
		  	"tanggal_entri" => date("Y-m-d"),
		  );
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

	public function hitungUlangBlok4($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL){
		$this->db->select('jenis,subjenis,SUM(b4_k5) AS total');
		$this->db->FROM('sub_k_blok4');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$this->db->group_by(array('jenis','subjenis'));
		$query = $this->db->get();
		$data = array(
			'b4_a1_total'=>0,
			'b4_a2_total'=>0,
			'b4_a3_total'=>0,
			'b4_a4_total'=>0,
			'b4_a5_total'=>0,
			'b4_a6_total'=>0,
			'b4_a7_total'=>0,
			'b4_a8_total'=>0,
			'b4_a9_total'=>0,
			'b4_a10_total'=>0,
			'b4_a11_total'=>0,
			'b4_a12_total'=>0,
			'b4_a_total'=>0,
			'b4_b1_total'=>0,
			'b4_b2_total'=>0,
			'b4_b3_total'=>0,
			'b4_b_total'=>0,
		);

		foreach ($query->result_array() as $item){
			//ini untuk jenis a
			for($i=1;$i<=12;$i++) {
				if ($item['jenis'] == 'a' & $item['subjenis'] == ($i."")) {
					$data["b4_a{$i}_total"] = $item['total'];
					$data['b4_a_total'] += $item['total'];
				}
			}
			//ini untuk jenis b
			for($i=1;$i<=3;$i++) {
				if ($item['jenis'] == 'b' & $item['subjenis'] == ($i."")) {
					$data["b4_b{$i}_total"] = $item['total'];
					$data['b4_b_total'] += $item['total'];
				}
			}
		}

		$where = array(
			"tahun"=>$tahun,
			"id_prov"=>$id_prov,
			"id_kab"=>$id_kab,
			"id_kec"=>$id_kec,
			"id_desa"=>$id_desa,
			"no_ruta"=>$no_ruta,
		);
		$this->db->update('sub_k', $data, $where);

	}

	public function hitungUlangBlok5($tahun = NULL, $id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL){
		$this->db->select('jenis,subjenis,SUM(b5_k5) AS total_bln,SUM(b5_k6) AS total_thn');
		$this->db->FROM('sub_k_blok5');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$this->db->group_by(array('jenis','subjenis'));
		$query = $this->db->get();
		$data = array(
			'b5_a1_total_bln'=>0,
			'b5_a2_total_bln'=>0,
			'b5_a3_total_bln'=>0,
			'b5_a4_total_bln'=>0,
			'b5_a1_total_thn'=>0,
			'b5_a2_total_thn'=>0,
			'b5_a3_total_thn'=>0,
			'b5_a4_total_thn'=>0,
			'b5_b1_total_bln'=>0,
			'b5_b2_total_bln'=>0,
			'b5_b3_total_bln'=>0,
			'b5_b4_total_bln'=>0,
			'b5_b1_total_thn'=>0,
			'b5_b2_total_thn'=>0,
			'b5_b3_total_thn'=>0,
			'b5_b4_total_thn'=>0,
			'b5_c1_total_bln'=>0,
			'b5_c2_total_bln'=>0,
			'b5_c3_total_bln'=>0,
			'b5_c1_total_thn'=>0,
			'b5_c2_total_thn'=>0,
			'b5_c3_total_thn'=>0,
			'b5_d1_total_bln'=>0,
			'b5_d2_total_bln'=>0,
			'b5_d3_total_bln'=>0,
			'b5_d4_total_bln'=>0,
			'b5_d1_total_thn'=>0,
			'b5_d2_total_thn'=>0,
			'b5_d3_total_thn'=>0,
			'b5_d4_total_thn'=>0,
			'b5_e1_total_bln'=>0,
			'b5_e2_total_bln'=>0,
			'b5_e3_total_bln'=>0,
			'b5_e4_total_bln'=>0,
			'b5_e1_total_thn'=>0,
			'b5_e2_total_thn'=>0,
			'b5_e3_total_thn'=>0,
			'b5_e4_total_thn'=>0,
			'b5_f1_total_bln'=>0,
			'b5_a_total_bln'=>0,
			'b5_b_total_bln'=>0,
			'b5_c_total_bln'=>0,
			'b5_d_total_bln'=>0,
			'b5_e_total_bln'=>0,
			'b5_f_total_bln'=>0,
			'b5_a_total_thn'=>0,
			'b5_b_total_thn'=>0,
			'b5_c_total_thn'=>0,
			'b5_d_total_thn'=>0,
			'b5_e_total_thn'=>0,
			'b5_f_total_thn'=>0,
		);

		foreach ($query->result_array() as $item){
			$data = $this->jmlBlok5("a",$item,$data,4);
			$data = $this->jmlBlok5("b",$item,$data,4);
			$data = $this->jmlBlok5("c",$item,$data,3);
			$data = $this->jmlBlok5("d",$item,$data,4);
			$data = $this->jmlBlok5("e",$item,$data,4);
			$data = $this->jmlBlok5("f",$item,$data,1);
		}

		$where = array(
			"tahun"=>$tahun,
			"id_prov"=>$id_prov,
			"id_kab"=>$id_kab,
			"id_kec"=>$id_kec,
			"id_desa"=>$id_desa,
			"no_ruta"=>$no_ruta,
		);
		$this->db->update('sub_k', $data, $where);

	}

	public function jmlBlok5($jenis,$item,$data,$size){

		for($i=1;$i<=$size;$i++) {
			if ($item['jenis'] == $jenis & $item['subjenis'] == ($i."")) {
				$data["b5_{$jenis}{$i}_total_bln"] = $item['total_bln'];
				$data["b5_{$jenis}{$i}_total_thn"] = $item['total_thn'];
				$data["b5_{$jenis}_total_bln"] += $item['total_bln'];
				$data["b5_{$jenis}_total_thn"] += $item['total_thn'];
			}
		}
		return $data;
	}


	public function isi_halaman1($payload = NULL) {
		$this->db->trans_start();
		$data=array(
			"b1_9a"=>$payload->b1_9a,
			"b1_9b"=>$payload->b1_9b,
			"nama_pcl"=>$payload->b2->p1a,
			"kode_pcl"=>$payload->b2->p2a,
			"tanggal_pcl"=>$payload->b2->p3a,
			"tanggal_pml"=>$payload->b2->p3b,
			"tanggal_edit"=>date("Y-m-d H:i"),
			"kode_petugas"=>$payload->kode_petugas
		);
		$where = array(
			"tahun"=>$payload->tahun,
			"id_prov"=>$payload->id_prov,
			"id_kab"=>$payload->id_kab,
			"id_kec"=>$payload->id_kec,
			"id_desa"=>$payload->id_desa,
			"no_ruta"=>$payload->no_ruta,
		);
		$this->db->update('sub_k', $data, $where);
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
		  $data3=$this->mapingBlok3($data3,$payload->b3_a,$sampel);
	  }
	  foreach ($data3 as $item){
		  $this->db->replace('sub_k_blok3', $item);
	  }
	  if(count($payload->b3_a_del)>0){
		  $this->hapusBlok("sub_k_blok3",$payload->b3_a_del);
	  }
	  $data=array(
		  "b3_b1"=>$payload->b3_b_1,
		  "b3_b2"=>$payload->b3_b_2,
		  "b3_b3"=>$payload->b3_b_3,
	  );
	  $where = array(
		  "tahun"=>$payload->tahun,
		  "id_prov"=>$payload->id_prov,
		  "id_kab"=>$payload->id_kab,
		  "id_kec"=>$payload->id_kec,
		  "id_desa"=>$payload->id_desa,
		  "no_ruta"=>$payload->no_ruta,
	  );
	  $this->db->update('sub_k', $data, $where);
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
		$data4 = array();
		if(count($payload->b4_a_1)>0) {
			$data4 = $this->mapingBlok4("a","1",$data4, $payload->b4_a_1, $sampel);
		}
		if(count($payload->b4_a_2)>0) {
			$data4 = $this->mapingBlok4("a","2",$data4, $payload->b4_a_2, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a_total"=>$payload->b4_a_total,
			"b4_a1_total"=>$payload->b4_a_1_total,
			"b4_a2_total"=>$payload->b4_a_2_total,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		if(count($payload->b4_a_3)>0) {
			$data4 = $this->mapingBlok4("a","3",$data4, $payload->b4_a_3, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a3_total"=>$payload->b4_a_3_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		if(count($payload->b4_a_4)>0) {
			$data4 = $this->mapingBlok4("a","4",$data4, $payload->b4_a_4, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a4_total"=>$payload->b4_a_4_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		if(count($payload->b4_a_5)>0) {
			$data4 = $this->mapingBlok4("a","5",$data4, $payload->b4_a_5, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a5_total"=>$payload->b4_a_5_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		if(count($payload->b4_a_6)>0) {
			$data4 = $this->mapingBlok4("a","6",$data4, $payload->b4_a_6, $sampel);
		}
		if(count($payload->b4_a_7)>0) {
			$data4 = $this->mapingBlok4("a","7",$data4, $payload->b4_a_7, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a6_total"=>$payload->b4_a_6_total,
			"b4_a7_total"=>$payload->b4_a_7_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		$data4 = array();
		if(count($payload->b4_a_8)>0) {
			$data4 = $this->mapingBlok4("a","8",$data4, $payload->b4_a_8, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a8_total"=>$payload->b4_a_8_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		$data4 = array();
		if(count($payload->b4_a_9)>0) {
			$data4 = $this->mapingBlok4("a","9",$data4, $payload->b4_a_9, $sampel);
		}
		if(count($payload->b4_a_10)>0) {
			$data4 = $this->mapingBlok4("a","10",$data4, $payload->b4_a_10, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a9_total"=>$payload->b4_a_9_total,
			"b4_a10_total"=>$payload->b4_a_10_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		$data4 = array();
		if(count($payload->b4_a_11)>0) {
			$data4 = $this->mapingBlok4("a","11",$data4, $payload->b4_a_11, $sampel);
		}
		if(count($payload->b4_a_12)>0) {
			$data4 = $this->mapingBlok4("a","12",$data4, $payload->b4_a_12, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_a11_total"=>$payload->b4_a_11_total,
			"b4_a12_total"=>$payload->b4_a_12_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman11($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data4 = array();
		if(count($payload->b4_b_1)>0) {
			$data4 = $this->mapingBlok4("b","1",$data4, $payload->b4_b_1, $sampel);
		}
		if(count($payload->b4_b_2)>0) {
			$data4 = $this->mapingBlok4("b","2",$data4, $payload->b4_b_2, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_b_total"=>$payload->b4_b_total,
			"b4_b1_total"=>$payload->b4_b_1_total,
			"b4_b2_total"=>$payload->b4_b_2_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman12($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data4 = array();
		if(count($payload->b4_b_3)>0) {
			$data4 = $this->mapingBlok4("b","3",$data4, $payload->b4_b_3, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_k_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_k_blok4",$payload->b4_del);
		}

		$datasub = array(
			"b4_b3_total"=>$payload->b4_b_3_total,
		);
		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman13($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_a_1)>0) {
			$data5 = $this->mapingBlok5("a","1",$data5, $payload->b5_a_1, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_a1_total_bln"=>$payload->b5_a_1_total_bln,
			"b5_a1_total_thn"=>$payload->b5_a_1_total_thn,
			"b5_a_total_bln"=>$payload->b5_a_total_bln,
			"b5_a_total_thn"=>$payload->b5_a_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman14($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_a_2)>0) {
			$data5 = $this->mapingBlok5("a","2",$data5, $payload->b5_a_2, $sampel);
		}
		if(count($payload->b5_a_3)>0) {
			$data5 = $this->mapingBlok5("a","3",$data5, $payload->b5_a_3, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_a2_total_bln"=>$payload->b5_a_2_total_bln,
			"b5_a2_total_thn"=>$payload->b5_a_2_total_thn,
			"b5_a3_total_bln"=>$payload->b5_a_3_total_bln,
			"b5_a3_total_thn"=>$payload->b5_a_3_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman15($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_a_4)>0) {
			$data5 = $this->mapingBlok5("a","4",$data5, $payload->b5_a_4, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_a4_total_bln"=>$payload->b5_a_4_total_bln,
			"b5_a4_total_thn"=>$payload->b5_a_4_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman16($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_b_1)>0) {
			$data5 = $this->mapingBlok5("b","1",$data5, $payload->b5_b_1, $sampel);
		}
		if(count($payload->b5_b_2)>0) {
			$data5 = $this->mapingBlok5("b","2",$data5, $payload->b5_b_2, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_b1_total_bln"=>$payload->b5_b_1_total_bln,
			"b5_b1_total_thn"=>$payload->b5_b_1_total_thn,
			"b5_b2_total_bln"=>$payload->b5_b_2_total_bln,
			"b5_b2_total_thn"=>$payload->b5_b_2_total_thn,
			"b5_b_total_bln"=>$payload->b5_b_total_bln,
			"b5_b_total_thn"=>$payload->b5_b_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman17($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_b_3)>0) {
			$data5 = $this->mapingBlok5("b","3",$data5, $payload->b5_b_3, $sampel);
		}
		if(count($payload->b5_b_4)>0) {
			$data5 = $this->mapingBlok5("b","4",$data5, $payload->b5_b_4, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_b3_total_bln"=>$payload->b5_b_3_total_bln,
			"b5_b3_total_thn"=>$payload->b5_b_3_total_thn,
			"b5_b4_total_bln"=>$payload->b5_b_4_total_bln,
			"b5_b4_total_thn"=>$payload->b5_b_4_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman18($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_c_1)>0) {
			$data5 = $this->mapingBlok5("c","1",$data5, $payload->b5_c_1, $sampel);
		}
		if(count($payload->b5_c_2)>0) {
			$data5 = $this->mapingBlok5("c","2",$data5, $payload->b5_c_2, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_c1_total_bln"=>$payload->b5_c_1_total_bln,
			"b5_c1_total_thn"=>$payload->b5_c_1_total_thn,
			"b5_c2_total_bln"=>$payload->b5_c_2_total_bln,
			"b5_c2_total_thn"=>$payload->b5_c_2_total_thn,
			"b5_c_total_bln"=>$payload->b5_c_total_bln,
			"b5_c_total_thn"=>$payload->b5_c_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman19($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_c_3)>0) {
			$data5 = $this->mapingBlok5("c","3",$data5, $payload->b5_c_3, $sampel);
		}
		if(count($payload->b5_d_1)>0) {
			$data5 = $this->mapingBlok5("d","1",$data5, $payload->b5_d_1, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_c3_total_bln"=>$payload->b5_c_3_total_bln,
			"b5_c3_total_thn"=>$payload->b5_c_3_total_thn,
			"b5_d1_total_bln"=>$payload->b5_d_1_total_bln,
			"b5_d1_total_thn"=>$payload->b5_d_1_total_thn,
			"b5_d_total_bln"=>$payload->b5_d_total_bln,
			"b5_d_total_thn"=>$payload->b5_d_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman20($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_d_2)>0) {
			$data5 = $this->mapingBlok5("d","2",$data5, $payload->b5_d_2, $sampel);
		}
		if(count($payload->b5_d_3)>0) {
			$data5 = $this->mapingBlok5("d","3",$data5, $payload->b5_d_3, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_d2_total_bln"=>$payload->b5_d_2_total_bln,
			"b5_d2_total_thn"=>$payload->b5_d_2_total_thn,
			"b5_d3_total_bln"=>$payload->b5_d_3_total_bln,
			"b5_d3_total_thn"=>$payload->b5_d_3_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman21($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_d_4)>0) {
			$data5 = $this->mapingBlok5("d","4",$data5, $payload->b5_d_4, $sampel);
		}
		if(count($payload->b5_e_1)>0) {
			$data5 = $this->mapingBlok5("e","1",$data5, $payload->b5_e_1, $sampel);
		}
		if(count($payload->b5_e_2)>0) {
			$data5 = $this->mapingBlok5("e","2",$data5, $payload->b5_e_2, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_d4_total_bln"=>$payload->b5_d_4_total_bln,
			"b5_d4_total_thn"=>$payload->b5_d_4_total_thn,
			"b5_e1_total_bln"=>$payload->b5_e_1_total_bln,
			"b5_e1_total_thn"=>$payload->b5_e_1_total_thn,
			"b5_e2_total_bln"=>$payload->b5_e_2_total_bln,
			"b5_e2_total_thn"=>$payload->b5_e_2_total_thn,
			"b5_e_total_bln"=>$payload->b5_e_total_bln,
			"b5_e_total_thn"=>$payload->b5_e_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman22($sampel,$payload = NULL) {
		$this->db->trans_start();
		$data5 = array();
		if(count($payload->b5_e_3)>0) {
			$data5 = $this->mapingBlok5("e","3",$data5, $payload->b5_e_3, $sampel);
		}
		if(count($payload->b5_e_4)>0) {
			$data5 = $this->mapingBlok5("e","4",$data5, $payload->b5_e_4, $sampel);
		}
		if(count($payload->b5_f_1)>0) {
			$data5 = $this->mapingBlok5("f","1",$data5, $payload->b5_f_1, $sampel);
		}
		foreach ($data5 as $item){
			$this->db->replace('sub_k_blok5', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_k_blok5",$payload->b5_del);
		}

		$datasub = array(
			"b5_e3_total_bln"=>$payload->b5_e_3_total_bln,
			"b5_e3_total_thn"=>$payload->b5_e_3_total_thn,
			"b5_e4_total_bln"=>$payload->b5_e_4_total_bln,
			"b5_e4_total_thn"=>$payload->b5_e_4_total_thn,
			"b5_f1_total_bln"=>$payload->b5_f_1_total_bln,
			"b5_f1_total_thn"=>$payload->b5_f_1_total_thn,
			"b5_f_total_bln"=>$payload->b5_f_total_bln,
			"b5_f_total_thn"=>$payload->b5_f_total_thn,
		);


		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman23($sampel,$payload = NULL) {
		$this->db->trans_start();

		$datasub = $this->mapingBlok6($payload);

		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
		if ($this->db->trans_status() !== false){
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function isi_halaman24($sampel,$payload = NULL) {
		$this->db->trans_start();

		$datasub = $this->mapingBlok6($payload);

		$where = array(
			"tahun"=>$sampel['tahun'],
			"id_prov"=>$sampel['id_prov'],
			"id_kab"=>$sampel['id_kab'],
			"id_kec"=>$sampel['id_kec'],
			"id_desa"=>$sampel['id_desa'],
			"no_ruta"=>$sampel['no_ruta'],
		);
		$this->db->update('sub_k', $datasub, $where);
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
		return "<tr class='text-center tr_b3_a'>
				<td style='width: 5%;'>{$data['b3_k1']}</td>
				<td style='width: 35%;'><input type='text' class='form-control b3-a-input' data-keyx='p2' data-uuid='{$uuid}' value='{$data['b3_k2']}'></td>
				<td style='width: 5%;'><input type='number' class='form-control b3-a-input' data-keyx='p3' data-uuid='{$uuid}' value='{$data['b3_k3']}'></td>
				<td style='width: 5%;'><input type='number' class='form-control b3-a-input' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b3_k4']}'></td>
				<td style='width: 5%;'><input type='number' class='form-control b3-a-input' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b3_k5']}'></td>
				<td style='width: 10%;'><input type='number' class='form-control b3-a-input' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b3_k6']}'></td>
				<td style='width: 8%;'><input type='number' class='form-control b3-a-input' data-keyx='p7' data-uuid='{$uuid}' value='{$data['b3_k7']}'></td>
				<td style='width: 6%;'><input type='number' class='form-control b3-a-input' data-keyx='p8' data-uuid='{$uuid}' value='{$data['b3_k8']}'></td>
				<td style='width: 6%;'><input type='number' class='form-control b3-a-input' data-keyx='p9' data-uuid='{$uuid}' value='{$data['b3_k9']}'></td>
				<td style='width: 10%;'><input type='number' class='form-control b3-a-input' data-keyx='p10' data-uuid='{$uuid}' value='{$data['b3_k10']}'></td>
				<td style='width: 5%;'><button type='button'
							class='btn btn-danger btn-hapus-b3-a'
							data-uuid='{$uuid}'>
					<i class='ri ri-close-fill'>
				</button></td>
			</tr>";
	}

	public function isianBlok4($data,$sub,$no){
	  $stringId = "b4_{$sub}_{$no}";
		$stringClass = "b4-{$sub}-{$no}";
		$uuid=$data['uuid'];
		return "
					<tr class='tr_{$stringId}'>
						<td class='text-center'>
							<div class='row'>
								<div class='col-1'>
									{$data['b4_k1']}
								</div>
								<div class='col-11'>
									<input type='text' class='form-control {$stringClass}-auto' data-keyx='p1' data-uuid='{$uuid}' value='{$data['b4_k1b']}'  list='list-{$stringClass}' >
								</div>
							</div>


						</td>
						<td class='text-center' id='p2-{$uuid}'>{$data['b4_k2']}</td>
						<td class='text-center' id='p3-{$uuid}'>{$data['b4_k3']}</td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b4_k4']}' data-tipe='float'></td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b4_k5']}'></td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b4_k6']}'></td>
						<td class='text-center'><button type='button'
									class='btn btn-danger btn-hapus-{$stringClass}'
									data-uuid='{$uuid}'>
							<i class='ri ri-close-fill'>
						</button></td>
					</tr>";
	}

	public function isianBlok5($data,$sub,$no){
		$stringId = "b5_{$sub}_{$no}";
		$stringClass = "b5-{$sub}-{$no}";
		$uuid=$data['uuid'];
		return "
					<tr class='tr_{$stringId}'>
						<td class='text-center'>
							<div class='row'>
								<div class='col-1'>
									{$data['b5_k1']}
								</div>
								<div class='col-11'>
									<input type='text' class='form-control {$stringClass}-auto' data-keyx='p1' data-uuid='{$uuid}' value='{$data['b5_k1b']}'  list='list-{$stringClass}' >
								</div>
							</div>


						</td>
						<td class='text-center' id='p2-{$uuid}'>{$data['b5_k2']}</td>
						<td class='text-center' id='p3-{$uuid}'>{$data['b5_k3']}</td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p4' data-uuid='{$uuid}' value='{$data['b5_k4']}' data-tipe='float'></td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p5' data-uuid='{$uuid}' value='{$data['b5_k5']}'></td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b5_k6']}'></td>
						<td class='text-center'><input type='number' class='form-control {$stringClass}' data-keyx='p6' data-uuid='{$uuid}' value='{$data['b5_k7']}'></td>
						<td class='text-center'><button type='button'
									class='btn btn-danger btn-hapus-{$stringClass}'
									data-uuid='{$uuid}'>
							<i class='ri ri-close-fill'>
						</button></td>
					</tr>";
	}



}
