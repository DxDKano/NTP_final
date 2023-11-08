<?php
class Model_tp extends CI_Model {

  public function __construct() {
    $this->load->database();
  }




	public function ambil_sub_tp_blok3($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tp_blok3');
    if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
    if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
    if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
    if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
    if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		if ($id_subsektor != NULL) $this->db->WHERE('subsektor', $id_subsektor);
		if ($id_komoditas != NULL) $this->db->LIKE('b3_k2', $id_komoditas,'after');
		$this->db->order_by('b3_k1');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function ambil_sub_tp_blok4($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $type_blok = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->from('sub_tp_blok4');
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
	public function ambil_sub_tp_blok4f($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->from('sub_tp_blok4f');
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
	public function ambil_sub_tp_blok5($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tp_blok5');
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
	public function ambil_sub_tp_blok6($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tp_blok6');
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
	public function ambil_sub_tp_blok7($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL, $id_subsektor = NULL, $id_komoditas = NULL)
	{
		$this->db->select('*');
		$this->db->FROM('sub_tp_blok7');
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

  private function mapingSubTpBlok3($data,$payload,$sampel){

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
		  );
	  }
	  return $data;
  }
  private function mapingSubTpBlok4($data,$payload,$sampel){

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
	private function mapingSubTpBlok4f($data,$payload,$sampel){

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
	private function mapingSubTpBlok5($data,$payload,$sampel){

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
	private function mapingSubTpBlok6($data,$payload,$sampel){

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
		$this->db->update('sub_tp', $data, $where);
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
		  $data3=$this->mapingSubTpBlok3($data3,$payload->b3_a,$sampel);
	  }
	  if(count($payload->b3_b)>0){
		  $data3=$this->mapingSubTpBlok3($data3,$payload->b3_b,$sampel);
	  }
	  /*if(count($data3)>0) {
		  $this->db->insert_batch('sub_tp_blok3', $data3);
	  }*/
	  foreach ($data3 as $item){
		  $this->db->replace('sub_tp_blok3', $item);
	  }
	  if(count($payload->b4_a1)>0) {
		  $data4 = $this->mapingSubTpBlok4($data4, $payload->b4_a1, $sampel);
	  }
	  if(count($payload->b4_a2)>0) {
		  $data4 = $this->mapingSubTpBlok4($data4, $payload->b4_a2, $sampel);
	  }
	  if(count($payload->b4_b1)>0) {
		  $data4 = $this->mapingSubTpBlok4($data4, $payload->b4_b1, $sampel);
	  }
	  /*if(count($data4)>0) {
		  $this->db->insert_batch('sub_tp_blok4', $data4);
	  }*/
	  foreach ($data4 as $item){
		  $this->db->replace('sub_tp_blok4', $item);
	  }
	  if(count($payload->b3_del)>0){
		  $this->hapusBlok("sub_tp_blok3",$payload->b3_del);
	  }
	  if(count($payload->b4_del)>0){
		  $this->hapusBlok("sub_tp_blok4",$payload->b4_del);
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
		$data4 = array();
		if(count($payload->b4_b2)>0) {
			$data4 = $this->mapingSubTpBlok4($data4, $payload->b4_b2, $sampel);
		}
		if(count($payload->b4_c)>0) {
			$data4 = $this->mapingSubTpBlok4($data4, $payload->b4_c, $sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_tp_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_tp_blok4",$payload->b4_del);
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
		$data4 = array();
		if(count($payload->b4_d)>0) {
			$data4 = $this->mapingSubTpBlok4($data4, $payload->b4_d, $sampel);
		}
		if(count($payload->b4_e)>0){
			$data4=$this->mapingSubTpBlok4($data4,$payload->b4_e,$sampel);
		}
		foreach ($data4 as $item){
			$this->db->replace('sub_tp_blok4', $item);
		}
		if(count($payload->b4_del)>0){
			$this->hapusBlok("sub_tp_blok4",$payload->b4_del);
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
		$data4f = array();
		if(count($payload->b4_f)>0) {
			$data4f = $this->mapingSubTpBlok4f($data4f, $payload->b4_f, $sampel);
		}
		foreach ($data4f as $item){
			$this->db->replace('sub_tp_blok4f', $item);
		}
		if(count($payload->b4f_del)>0){
			$this->hapusBlok("sub_tp_blok4f",$payload->b4f_del);
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
		$this->db->update('sub_tp', $data, $where);
		$data5 = array();
		$data6 = array();
		if(count($payload->b5_r2)>0) {
			$data5 = $this->mapingSubTpBlok5($data5, $payload->b5_r2, $sampel);
		}
		if(count($payload->b6)>0) {
			$data6 = $this->mapingSubTpBlok6($data6, $payload->b6, $sampel);
		}

		foreach ($data5 as $item){
			$this->db->replace('sub_tp_blok5', $item);
		}
		foreach ($data6 as $item){
			$this->db->replace('sub_tp_blok6', $item);
		}
		if(count($payload->b5_del)>0){
			$this->hapusBlok("sub_tp_blok5",$payload->b5_del);
		}
		if(count($payload->b6_del)>0){
			$this->hapusBlok("sub_tp_blok6",$payload->b6_del);
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
		$this->db->update('sub_tp', $data, $where);
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

	public function validasi($tahun = NULL,$id_prov = NULL, $id_kab = NULL, $id_kec = NULL, $id_desa = NULL, $no_ruta = NULL){

	  $val_arr=array();

	  $this->db->select('*');
		$this->db->FROM('sub_k');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$query = $this->db->get();
		$k = $query->row_array();
		$k_exist = $query->num_rows()>0;

		$this->db->select('*');
		$this->db->FROM('sub_tp_blok3');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$query = $this->db->get();
		$b3 = $query->result_array();

		$this->db->select('*');
		$this->db->FROM('sub_tp_blok4');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$query = $this->db->get();
		$b4 = $query->result_array();

		$this->db->select('*');
		$this->db->FROM('sub_tp_blok4f');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$query = $this->db->get();
		$b4f = $query->result_array();

		$this->db->select('*');
		$this->db->FROM('sub_tp_blok5');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$query = $this->db->get();
		$b5 = $query->result_array();

		$this->db->select('*');
		$this->db->FROM('sub_tp_blok6');
		if ($tahun != NULL) $this->db->WHERE('tahun', $tahun);
		if ($id_prov != NULL) $this->db->WHERE('id_prov', $id_prov);
		if ($id_kab != NULL) $this->db->WHERE('id_kab', $id_kab);
		if ($id_kec != NULL) $this->db->WHERE('id_kec', $id_kec);
		if ($id_desa != NULL) $this->db->WHERE('id_desa', $id_desa);
		if ($no_ruta != NULL) $this->db->WHERE('no_ruta', $no_ruta);
		$query = $this->db->get();
		$b6 = $query->result_array();



		//cek apakah k ada
		if(!$k_exist){
			$val_arr[]=array(
				"kode"=>"tp_k",
				"lokasi"=>"Kuesioner K",
				"error"=>"Kuesioner K belum ada",
				"solusi"=>"Laporkan ke admin",
				"button"=>array(
					array(
						"label"=>"Entri Data",
						"url"=>base_url("/Kuesioner/entri_data")
					)
				)
			);
		}

		// halaman 32
		if(count($b3)!=intval($k['b3_b2'])){
			$val_arr[]=array(
				"kode"=>"slide32_tp_b3_1",
				"lokasi"=>"Kuesioner TP Blok III",
				"error"=>"banyaknya komoditas tidak sesuai dengan isian kuesioner SPDT17-K Subblok III.B rincian 2.",
				"solusi"=>"Periksa banyaknya komoditas yang terisi apakah sudah sesuai dengan isian kuesioner SPDT17-K Subblok III.B rincian 2.",
				"button"=>array(
					array(
						"label"=>"TP Blok III",
						"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
					),
					array(
						"label"=>"K Blok IIIB",
						"url"=>base_url("Konsumsi/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
					),

				),
			);
		}
		//halaman 36
		$type_blok_b4 = array();
		foreach ($b4 as $item){
			if(isset($type_blok_b4[$item['type_blok']])){
				$type_blok_b4[$item['type_blok']]+=1;
			}else {
				$type_blok_b4[$item['type_blok']]=1;
			}
		}
		//=====

		foreach ($b3 as $item){
			// halaman 33
			if($item["b3_k3"]==''){
				$val_arr[]=array(
					"kode"=>"slide33_tp_b3_2",
					"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} kolom (3)",
					"error"=>"Terdapat Kolom (3) yang kosong",
					"solusi"=>"Pastikan kolom (3) harus terisi.",
					"button"=>array(
						array(
							"label"=>"TP Blok III",
							"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);

			}
			//=====
			if($item["b3_k3"]==''){
				$val_arr[]=array(
					"kode"=>"slide34_tp_b3_3",
					"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} kolom (4)",
					"error"=>"Terdapat Kolom (4) yang kosong",
					"solusi"=>"Pastikan kolom (4) harus terisi.",
					"button"=>array(
						array(
							"label"=>"TP Blok III",
							"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);

			}
			//=====
			if(intval($item["b3_k4"])>intval($item["b3_k3"])){
				$val_arr[]=array(
					"kode"=>"slide34_tp_b3_4",
					"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (3) dan  kolom (4)",
					"error"=>"Terdapat kolom (4) > kolom (3)",
					"solusi"=>"Pastikan kolom (4) ≤  kolom (3) pada setiap rincian komoditas yang terisi.",
					"button"=>array(
						array(
							"label"=>"TP Blok III",
							"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);
			}
			//=====
			//halaman 34
			if(intval($item["b3_k6"])>intval($item["b3_k5"])){
				$val_arr[]=array(
					"kode"=>"slide34_tp_b3_5",
					"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (5) dan  kolom (6)",
					"error"=>"Terdapat kolom (6) > kolom (5)",
					"solusi"=>"Pastikan kolom (6) ≤  kolom (5) pada setiap rincian komoditas yang terisi.",
					"button"=>array(
						array(
							"label"=>"TP Blok III",
							"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);
			}
			//=====
			//halaman 34
			if(intval($item["b3_k5"])!=(intval($item["b3_k6"])+intval($item["b3_k8"])+intval($item["b3_k9"]))){
				$val_arr[]=array(
					"kode"=>"slide34_tp_b3_5",
					"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (5), kolom (6), kolom (8), kolom (9)",
					"error"=>"Terdapat kolom (5) tidak sama dengan kolom (6) + kolom (8) + kolom (9)",
					"solusi"=>"Pastikan kolom (5) = kolom (6) + kolom (8) + kolom (9) pada setiap rincian komoditas yang terisi",
					"button"=>array(
						array(
							"label"=>"TP Blok III",
							"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);
			}
			//=====
			//halaman 35
			if(intval($item["b3_k10"])>7){
				$val_arr[]=array(
					"kode"=>"slide35_tp_b3_6",
					"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (10)",
					"error"=>"Terdapat kolom (10) > 7",
					"solusi"=>"Pastikan Kolom (10) ≤ 7",
					"button"=>array(
						array(
							"label"=>"TP Blok III",
							"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);
			}
			//=====
			//halaman 36
			if((intval($item["b3_k11"])==2||intval($item["b3_k11"])==3)){
				if(!isset($item["b3_k12"]) || intval($item["b3_k12"])==0) {
					$val_arr[] = array(
						"kode" => "slide36_tp_b3_7",
						"lokasi" => "Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (12)",
						"error" => "Terdapat kolom (12) yang tidak terisi",
						"solusi" => "Pastikan kolom (12) harus terisi bila kolom (11) berkode 2 atau 3.",
						"button" => array(
							array(
								"label" => "TP Blok III",
								"url" => base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
							),

						),
					);
				}

				if(substr( $item["b3_k2"],0,4)=="2101" && !isset($type_blok_b4["a1"]) ){
					$val_arr[]=array(
						"kode"=>"slide36_tp_b3_8",
						"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (11)",
						"error"=>"Terdapat salah isian pada kolom (11)",
						"solusi"=>"Jika isian kolom (11) berkode 2 atau 3 (bagi hasil) maka isian pada Blok IV harus ada isian yang terkait komponen dari bagi hasil tersebut.",
						"button"=>array(
							array(
								"label"=>"TP Blok III",
								"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
							),

						),
					);
				}

				if(substr($item["b3_k2"],0,4)=="2102" && !isset($type_blok_b4["a2"]) ){
					$val_arr[]=array(
						"kode"=>"slide36_tp_b3_9",
						"lokasi"=>"Kuesioner TP Blok III No {$item['b3_k1']}. {$item['b3_k2A']} Kolom (11)",
						"error"=>"Terdapat salah isian pada kolom (11)",
						"solusi"=>"Jika isian kolom (11) berkode 2 atau 3 (bagi hasil) maka isian pada Blok IV harus ada isian yang terkait komponen dari bagi hasil tersebut.",
						"button"=>array(
							array(
								"label"=>"TP Blok III",
								"url"=>base_url("TanamanPangan/halaman2?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
							),

						),
					);
				}
			}
			//=====
			//=====
			//halaman 37
			//belum dibuat
			//=====

		}


		foreach ($b4 as $item) {

			//halaman 38
			if( intval($item["b4_k5"])>0 && intval($item["b4_k6"])==0){
				$subblok=strtoupper($item['type_blok']);
				$hal=2;
				switch ($item['type_blok']){
					case 'a1':$hal=2;break;
					case 'a2':$hal=2;break;
					case 'b1':$hal=2;break;
					case 'b2':$hal=3;break;
					case 'c':$hal=3;break;
					case 'd':$hal=4;break;
					case 'e':$hal=4;break;
				}

				$val_arr[]=array(
					"kode"=>"slide38_tp_b4_1",
					"lokasi"=>"Kuesioner TP Blok IV {$subblok} No {$item['b4_k1']}. {$item['b4_k2']} Kolom (5) dan kolom (6)",
					"error"=>"Jika kolom (5) ada isian, maka kolom (6) harus ada isian",
					"solusi"=>"Isi kolom (6) atau kosongkan kolom (5)",
					"button"=>array(
						array(
							"label"=>"TP Blok IV {$subblok}",
							"url"=>base_url("TanamanPangan/halaman{$hal}?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);
			}
			//=====
			//halaman 39
			//belum dibuat
			//=====


		}


		foreach ($b5 as $item) {
			//halaman 40
			if(intval($item['b5_k4'])>0 && (intval($item['b5_k5'])==0||intval($item['b5_k6'])==0)){
				$val_arr[]=array(
					"kode"=>"slide40_tp_b5_1",
					"lokasi"=>"Kuesioner TP Blok V {$subblok} No {$item['b5_k1']}. {$item['b5_k2']} Kolom (5) dan kolom (6)",
					"error"=>"Jika rincian 2 kolom (4) terisi maka kolom (5) dan (6) harus terisi.",
					"solusi"=>"Isi kolom (5) dan (6) atau kosongkan kolom (4)",
					"button"=>array(
						array(
							"label"=>"TP Blok V",
							"url"=>base_url("TanamanPangan/halaman6?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);

			}
			//=====
			//halaman 40
			if((intval($item['b5_k6'])==2 || intval($item['b5_k6'])==3) && intval($item['b5_k7'])==0){
				$val_arr[]=array(
					"kode"=>"slide40_tp_b5_1",
					"lokasi"=>"Kuesioner TP Blok V {$subblok} No {$item['b5_k1']}. {$item['b5_k2']} Kolom (7)",
					"error"=>"Jika rincian 2 kolom (6) berkode 2 atau 3 maka kolom (7) harus terisi.",
					"solusi"=>"Isi kolom (7) atau ubah kolom (6) menjadi kode 1",
					"button"=>array(
						array(
							"label"=>"TP Blok V",
							"url"=>base_url("TanamanPangan/halaman6?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);

			}
			//=====
		}


		foreach ($b6 as $item) {
			//halaman 41
			if(intval($item['b6_k5'])>0 && intval($item['b6_k6'])==0 || intval($item['b6_k6'])>0 && intval($item['b6_k5'])==0){
				$val_arr[]=array(
					"kode"=>"slide41_tp_b6_1",
					"lokasi"=>"Kuesioner TP Blok VI {$subblok} No {$item['b6_k1']}. {$item['b6_k2']} Kolom (5) dan kolom (6)",
					"error"=>"Jika kolom (5) ada isian, maka kolom (6) harus ada isian dan berlaku sebaliknya",
					"solusi"=>"Isi kolom (5) dan (6) atau kosongkan keduanya",
					"button"=>array(
						array(
							"label"=>"TP Blok VI",
							"url"=>base_url("TanamanPangan/halaman6?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);

			}
			//=====
			//halaman 40
			if((intval($item['b5_k6'])==2 || intval($item['b5_k6'])==3) && intval($item['b5_k7'])==0){
				$val_arr[]=array(
					"kode"=>"slide40_tp_b5_1",
					"lokasi"=>"Kuesioner TP Blok V {$subblok} No {$item['b5_k1']}. {$item['b5_k2']} Kolom (7)",
					"error"=>"Jika rincian 2 kolom (6) berkode 2 atau 3 maka kolom (7) harus terisi.",
					"solusi"=>"Isi kolom (7) atau ubah kolom (6) menjadi kode 1",
					"button"=>array(
						array(
							"label"=>"TP Blok V",
							"url"=>base_url("TanamanPangan/halaman6?tahun={$tahun}&id_prov={$id_prov}&id_kab={$id_kab}&id_kec={$id_kec}&id_desa={$id_desa}&no_ruta={$no_ruta}")
						),

					),
				);

			}
			//=====
		}




		return $val_arr;

	}

}
