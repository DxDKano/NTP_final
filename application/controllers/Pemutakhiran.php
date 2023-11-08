<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemutakhiran extends CI_Controller {

  public function __construct() {
		parent::__construct();
		if ($this->session->has_userdata('username')) {
		} else {
			redirect('Login');
		}
	}

  public function index() {
    redirect('Pemutakhiran/entri_data');
  }

  public function coba()
  {
    $data = $this->Model_pemutakhiran->ambil_status_tabel('2022', '71', '07');
    echo json_encode($data);

  }

  public function entri_data()
  {
    // $id_prov = '71';
    // $id_kab = '07';
    $data['id_prov'] = $_SESSION['kode_prov'];
    $data['id_kab'] = $_SESSION['kode_kab'];
    $data['tahun'] = $this->Model_pemutakhiran->ambil_tahun();
    $username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
    $data['kecamatan'] = $this->Model_pemutakhiran->ambil_kecamatan('71', '07');
    $this->load->view('Layout/top');
    $this->load->view('Layout/header', $data);
    $this->load->view('Layout/sidebar', $data);
    // $this->load->view('Layout/settings');
    $this->load->view('Pemutakhiran/entri_data', $data);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }

  public function ajax_data_kabupaten($id_prov) {
    $list_kab = $this->Model_pegawai->ambil_data_kabupaten($id_prov);
    $html = '<option disabled selected value="-">-- Pilih Kabupaten --</option>';
    foreach ($list_kab as $key => $value) {
      $html = $html.'<option value="'.$value['id_kab'].'"> ['.$value['id_kab'].'] '.$value['nama_kab'].'</option>';
    }
    echo $html;
  }

  public function ajax_data_kabupaten_selected($id_prov) {
    $list_kab = $this->Model_pegawai->ambil_data_kabupaten($id_prov);
    $id_kab_user = $_SESSION['kode_kab'];
    if ($id_kab_user != '00') {
      $id_kab_prov = $this->Model_pegawai->ambil_data_bps($id_prov);
    } else {
      $id_kab_prov = $this->Model_pegawai->ambil_data_bps($id_kab_user);
    }
    $html = '<option disabled selected value="-">-- Pilih Kabupaten --</option>';
    foreach ($list_kab as $key => $value) {
      if ($id_kab_prov[0]['id_kab']==$value['id_kab']){
        $s="selected='selected'";
      }
      else{
        $s="";
      }
      $html = $html.'<option value="'.$value['id_kab'].'" '.$s.'> ['.$value['id_kab'].'] '.$value['nama_kab'].'</option>';
    }
    echo $html;
  }

  public function datatable_sampel()
  {
    $filter_tahun = $this->input->post('filter_tahun');
    $filter_sampel = $this->input->post('filter_sampel');
    // $filter_sampel = '1';
    $id_prov = $_SESSION['kode_prov'];
    $id_kab = $_SESSION['kode_kab'];
    $data = $this->Model_pemutakhiran->ambil_sampel($filter_tahun, $id_prov, $id_kab, $filter_sampel);
    $jumlah = count($this->Model_pemutakhiran->ambil_sampel($filter_tahun, $id_prov, $id_kab, $filter_sampel));
    for ($i = 0; $i < $jumlah; $i++) {
      $desa = $this->Model_pemutakhiran->ambil_desa($id_prov, $id_kab, $data[$i]['id_kec'], $data[$i]['id_desa']);
      $data[$i]['desa'] = $desa['0']['nama_desa'];
      if ($data[$i]['status_pemutakhiran'] == 'sudah') {
        if ($data[$i]['kol_23'] == '1') {
          $data[$i]['status_sampel'] = 'Eligible';
        } else {
          $data[$i]['status_sampel'] = 'Tidak';
        }
      }else {
        $data[$i]['status_sampel'] = '-';
      }
      // $data[$i]['kode'] = '-';
      if ($data[$i]['status_pemutakhiran'] == 'belum'){
        // $data[$i]['kode'] = "<center>
        // <button id='terima_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-check-lg' onclick='show_modal_sampel(".$data[$i]['no_ruta'].",".$data[$i]['id_prov'].",".$data[$i]['id_kab'].")'></i></span></button>
        // <button id='terima_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-check-lg' onclick='show_modal_sampel2(\"".$data[$i]['no_ruta']."\")'></i></span></button>
        // <button id='edit_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-pencil-square' onclick='show_modal_edit(\"".$data[$i]['no_ruta']."\"".$data[$i]['id_prov']."\"".$data[$i]['id_kab']."\")'></i></span></button>
        // </center>";

        $data[$i]['kode'] = "<center>
        <button id='terima_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-check-lg' onclick='show_modal_sampel(\"".$data[$i]['no_ruta']."\")'></i></span></button>
        <button id='edit_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-pencil-square' onclick='show_emodal_sampel(\"".$data[$i]['no_ruta']."\")'></i></span></button>
        </center>";
        // <a href='#Modal_edit_direktori' class='btn btn-primary' data-toggle='modal' data-target='#Modal_edit_direktori' data-direktori='".$data[$i]."'><span class='icon'><i class='fas fa-edit'></i></span></a>
        // <a href='#Modal_edit_direktori' class='btn btn-primary' data-toggle='modal' data-target='#Modal_edit_direktori' data-prov='".$data[$i]['kode_prov']."' data-kab='".$data[$i]['kode_kab']."' data-kec='".$data[$i]['kode_kec']."' data-desa='".$data[$i]['kode_desa']."' data-kip='".$data[$i]['kip']."' data-usaha='".$data[$i]['nama_usaha']."' data-alamat='".$data[$i]['alamat_usaha']."' data-kegiatan='".$data[$i]['jenis_kegiatan']."'><span class='icon'><i class='fas fa-edit'></i></span></a>
      }
      if ($data[$i]['status_pemutakhiran'] == 'sudah') {
        $data[$i]['kode'] = "<center>
        <button id='terima_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-check-lg' onclick='show_modal_sampel(\"".$data[$i]['no_ruta']."\")'></i></span></button>
        <button id='edit_sampel' type='button' class='btn btn-primary'><span class='icon'><i class='bi bi-pencil-square' onclick='show_emodal_sampel(\"".$data[$i]['no_ruta']."\")'></i></span></button>
        </center>";
      }
    }

    $sampel = array_map(array($this, 'array_map_sampel'),$data);
    echo json_encode(array(
      'data' => $sampel
    ));
  }

  public function array_map_sampel($array)
  {
    return array(
      $array['no_ruta'],
      $array['desa'],
      $array['nama_ruta'],
      $array['alamat_ruta'],
      $array['status_pemutakhiran'],
      $array['status_sampel'],
      $array['kode']
    );
  }

  // public function tambah_sampel_desa($id_prov,$id_kab,$id_kec) {
  //   $list_desa = $this->Model_pemutakhiran->ambil_desa($id_prov, $id_kab, $id_kec);
  //   $html = '<option></option>';
  //   foreach ($list_desa as $key => $value) {
  //     $html = $html.'<option value="'.$value['id_desa'].'">'.$value['nama_desa'].'</option>';
  //   }
  //   echo $html;
  // }

  public function ambil_data_sampel($no_ruta, $id_prov, $id_kab, $tahun)
  {
    $sampel = $this->Model_pemutakhiran->ambil_sampel_nurt_array($tahun, $id_prov, $id_kab, $no_ruta);
    echo json_encode($sampel);
  }

  public function data_sampel_kecamatan($id_prov,$id_kab) {
    $list_kec = $this->Model_pemutakhiran->ambil_kecamatan($id_prov, $id_kab);
    $html = '<option></option>';
    foreach ($list_kec as $key => $value) {
      $html = $html.'<option value="'.$value['id_kec'].'">'.$value['nama_kec'].'</option>';
    }
    echo $html;
  }

  public function data_sampel_desa($id_prov,$id_kab,$id_kec) {
    $list_desa = $this->Model_pemutakhiran->ambil_desa($id_prov, $id_kab, $id_kec);
    $html = '<option></option>';
    foreach ($list_desa as $key => $value) {
      $html = $html.'<option value="'.$value['id_desa'].'">'.$value['nama_desa'].'</option>';
    }
    echo $html;
  }

  public function ambil_data_komoditas($subsektor) {
    $list_komoditas = $this->Model_pemutakhiran->ambil_komoditas($subsektor);
    $html = '<option></option>';
    foreach ($list_komoditas as $key => $value) {
      $html = $html.'<option value="'.$value['id_komoditas'].'">'.$value['komoditas'].'</option>';
    }
    echo $html;
  }

  public function terima_sampel($tahun)
  {
    $id_prov = $this->input->post('provinsi_terima_sampel');
    $id_kab = $this->input->post('kabupaten_terima_sampel');
    $id_kec = $this->input->post('kecamatan_terima_sampel');
    $id_desa = $this->input->post('desa_terima_sampel');
    $no_ruta = $this->input->post('nurt_terima_sampel');
    $username = $_SESSION['username'];
		$user['user'] = $this->Model_login->ambil_user($username);
    $sampel = $this->Model_pemutakhiran->ambil_sampel_nurt_array($tahun, $id_prov, $id_kab, $no_ruta);
    $data = array(
      'kol_17' => !empty($this->input->post('pencacahan_terima_sampel'))? $this->input->post('pencacahan_terima_sampel'):NULL,
      'kol_18' => !empty($this->input->post('kol_10_terima'))? $this->input->post('kol_10_terima'):NULL,
      'kol_19' => !empty($this->input->post('kol_11_terima'))? $this->input->post('kol_11_terima'):NULL,
      'kol_20' => !empty($this->input->post('kol_12_terima'))? $this->input->post('kol_12_terima'):NULL,
      'kol_21' => !empty($this->input->post('kol_13_terima'))? $this->input->post('kol_13_terima'):NULL,
      'kol_22' => !empty($this->input->post('kol_14_terima'))? $this->input->post('kol_14_terima'):NULL,
      'kol_23' => !empty($this->input->post('kol_15_terima'))? $this->input->post('kol_15_terima'):NULL,
      'status_pemutakhiran' => 'sudah',
      'kode_petugas' => $user['user']['kode_petugas'],
      'tanggal_pemutakhiran' => date('Y-m-d')
    );

    $kode = $this->cek_kode_subsektor($sampel['subsektor']);
    // switch ($sampel['subsektor']) {
    //   case 1:
    //       $kode = "tp";
    //       break;
    //   case 2:
    //       $kode = "th";
    //       break;
    //   case 3:
    //       $kode = "tpr";
    //       break;
    //   case 4:
    //       $kode = "trk";
    //       break;
    //   case 5:
    //       $kode = "ikt";
    //       break;
    //   case 6:
    //       $kode = "ikb";
    //       break;
    //   case 7:
    //       $kode = "htn";
    //       break;
    // }

    $status = $this->input->post('kol_15_terima');

    $this->db->trans_start();
    $this->Model_pemutakhiran->isi_terima_sampel($tahun, $id_prov, $id_kab, $no_ruta, $data);
    if ($status == "1") {
      $kuesioner = array(
        'tahun' => $sampel['tahun'],
        'id_prov' => $sampel['id_prov'],
        'id_kab' => $sampel['id_kab'],
        'id_kec' => $sampel['id_kec'],
        'id_desa' => $sampel['id_desa'],
        'blok_sensus' => $sampel['blok_sensus'],
        'no_ruta' => $sampel['no_ruta'],
        'nama_ruta' => $sampel['nama_ruta'],
        'alamat_ruta' => $sampel['alamat_ruta'],
        'subsektor' => $sampel['subsektor'],
        'kode_komoditas' => $sampel['kode_komoditas'],
        'komoditas' => $sampel['komoditas'],
        'status_entri' => $sampel['status_entri'],
        'kode_petugas' => $user['user']['kode_petugas']
        // 'tanggal_pemutakhiran' => date('Y-m-d')
      );

      // $this->Model_pemutakhiran->isi_kuesioner_sampel($kuesioner);
      $this->Model_pemutakhiran->isi_kuesioner_sub_sampel($kode, $kuesioner);
      $this->Model_pemutakhiran->isi_kuesioner_konsumsi($kuesioner);
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
  		  $this->db->trans_rollback();
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show"><strong>Maaf penerimaan dokumen gagal!</strong> Terjadi masalah query<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		    redirect('Pemutakhiran');
		} else {
  	   $this->db->trans_commit();
       $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show"><strong>Sukes!</strong> Penerimaan dokumen telah berhasil <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
       redirect('Pemutakhiran');
		}



    // 'id_prov' => $this->input->post('provinsi_terima_sampel'),
    // 'id_kab' => $this->input->post('kabupaten_terima_sampel'),
    // 'id_kec' => $this->input->post('kecamatan_terima_sampel'),
    // 'id_desa' => $this->input->post('desa_terima_sampel'),
    // 'nurt' => $this->input->post('provinsi_terima_sampel'),
    // $id_prov = $this->input->post('provinsi_terima_sampel');
    // $id_kab = $this->input->post('kabupaten_terima_sampel');
    // $id_kec = $this->input->post('kecamatan_terima_sampel');
    // $id_desa = $this->input->post('desa_terima_sampel');
    // $nurt = $this->input->post('nurt_terima_sampel');
    // $nama = $this->input->post('nama_terima_sampel');
    // $alamat = $this->input->post('alamat_terima_sampel');
    // $subsektor = $this->input->post('subsektor_terima_sampel');
    // $komoditas = $this->input->post('komoditas_terima_sampel');
    // $pencacahan = $this->input->post('pencacahan_terima_sampel');
    // $kol_10 = $this->input->post('kol_10_terima');
    // $kol_11 = $this->input->post('kol_11_terima');
    // $kol_12 = $this->input->post('kol_12_terima');
    // $kol_13 = $this->input->post('kol_13_terima');
    // $kol_14 = $this->input->post('kol_14_terima');
    // $kol_15 = $this->input->post('kol_15_terima');
  }

  public function edit_sampel($tahun)
  {
    $id_prov = $this->input->post('provinsi_edit_sampel');
    $id_kab = $this->input->post('kabupaten_edit_sampel');
    $id_kec = $this->input->post('kecamatan_edit_sampel');
    $id_desa = $this->input->post('desa_edit_sampel');
    $no_ruta = $this->input->post('nurt_edit_sampel');
    $username = $_SESSION['username'];
		$user['user'] = $this->Model_login->ambil_user($username);
    $sampel = $this->Model_pemutakhiran->ambil_sampel_nurt_array($tahun, $id_prov, $id_kab, $no_ruta);
    $kode_komoditas = $this->input->post('komoditas_edit_sampel');
    $komoditas = $this->Model_pemutakhiran->ambil_komoditas(NULL, $kode_komoditas);
    $data = array(
      'tahun' => $tahun,
      'id_prov' => $this->input->post('provinsi_edit_sampel'),
      'id_kab' => $this->input->post('kabupaten_edit_sampel'),
      'id_kec' => $this->input->post('kecamatan_edit_sampel'),
      'id_desa' => $this->input->post('desa_edit_sampel'),
      'blok_sensus' => $sampel['blok_sensus'],
      'no_ruta' => $this->input->post('nurt_edit_sampel'),
      'nama_ruta' => $this->input->post('nama_edit_sampel'),
      'alamat_ruta' => $this->input->post('alamat_edit_sampel'),
      'subsektor' => $this->input->post('subsektor_ubah_sampel'),
      'kode_komoditas' => $this->input->post('komoditas_edit_sampel'),
      'komoditas' => $komoditas['0']['komoditas'],
      'kode_petugas' => $user['user']['kode_petugas'],
      'tanggal_pemutakhiran' => date('Y-m-d')
    );

    $kode = $this->cek_kode_subsektor($this->input->post('subsektor_ubah_sampel'));
    $kode_sebelum = $this->cek_kode_subsektor($sampel['subsektor']);
    $kuesioner_sebelum = $this->Model_kuesioner->ambil_sub($kode_sebelum,$tahun,$id_prov,$id_kab,$id_kec,$id_desa,$no_ruta);
    if ($kuesioner_sebelum != NULL) {
      $terisi = true;
    } else {
      $terisi = false;
    }
    // switch ($this->input->post('subsektor_ubah_sampel')) {
    //   case 1:
    //       $kode = "tp";
    //       break;
    //   case 2:
    //       $kode = "th";
    //       break;
    //   case 3:
    //       $kode = "tpr";
    //       break;
    //   case 4:
    //       $kode = "trk";
    //       break;
    //   case 5:
    //       $kode = "ikt";
    //       break;
    //   case 6:
    //       $kode = "ikb";
    //       break;
    //   case 7:
    //       $kode = "htn";
    //       break;
    // }
    $status = $sampel['kol_23'];

    $this->db->trans_start();
    $this->Model_pemutakhiran->isi_edit_sampel($tahun, $id_prov, $id_kab, $no_ruta, $data);
    if ($status == "1") {
      $kuesioner = array(
        'tahun' => $tahun,
        'id_prov' => $this->input->post('provinsi_edit_sampel'),
        'id_kab' => $this->input->post('kabupaten_edit_sampel'),
        'id_kec' => $this->input->post('kecamatan_edit_sampel'),
        'id_desa' => $this->input->post('desa_edit_sampel'),
        'blok_sensus' => $sampel['blok_sensus'],
        'no_ruta' => $this->input->post('nurt_edit_sampel'),
        'nama_ruta' => $this->input->post('nama_edit_sampel'),
        'alamat_ruta' => $this->input->post('alamat_edit_sampel'),
        'subsektor' => $this->input->post('subsektor_ubah_sampel'),
        'kode_komoditas' => $this->input->post('komoditas_edit_sampel'),
        'komoditas' => $komoditas['0']['komoditas'],
        'status_entri' => $sampel['status_entri'],
        'kode_petugas' => $user['user']['kode_petugas']
        // 'tanggal_pemutakhiran' => date('Y-m-d')
      );

      // $this->Model_pemutakhiran->isi_ekuesioner_sampel($tahun, $id_prov, $id_kab, $no_ruta, $kuesioner);
      if ($terisi == true AND $kode == $kode_sebelum) {
        $this->Model_pemutakhiran->isi_ekuesioner_sub_sampel($kode, $tahun, $id_prov, $id_kab, $no_ruta, $kuesioner);
      }
      if ($terisi == true AND $kode != $kode_sebelum) {
        $this->Model_pemutakhiran->hapus_kuesioner_sub_sampel($kode_sebelum, $tahun, $id_prov, $id_kab, $id_kec, $id_desa, $no_ruta);
        $this->Model_pemutakhiran->isi_kuesioner_sub_sampel($kode, $kuesioner);
      }
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
  		  $this->db->trans_rollback();
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show"><strong>Maaf penerimaan dokumen gagal!</strong> Terjadi masalah query<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		    redirect('Pemutakhiran');
		} else {
  	   $this->db->trans_commit();
       $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show"><strong>Sukes!</strong> Penerimaan dokumen telah berhasil <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
       redirect('Pemutakhiran');
		}
  }

  public function penambahan_sampel($tahun)
  {
    $username = $_SESSION['username'];
		$user['user'] = $this->Model_login->ambil_user($username);
    $kode_komoditas = $this->input->post('komoditas_tambah_sampel');
    $komoditas = $this->Model_pemutakhiran->ambil_komoditas(NULL, $kode_komoditas);
    $data = array(
      'tahun' => $tahun,
      'id_prov' => $this->input->post('provinsi_tambah_sampel'),
      'id_kab' => $this->input->post('kabupaten_tambah_sampel'),
      'id_kec' => $this->input->post('kecamatan_tambah_sampel'),
      'id_desa' => $this->input->post('desa_tambah_sampel'),
      'blok_sensus' => '000B',
      'no_ruta' => $this->input->post('nurt_tambah_sampel'),
      'nama_ruta' => $this->input->post('nama_tambah_sampel'),
      'alamat_ruta' => $this->input->post('alamat_tambah_sampel'),
      'subsektor' => $this->input->post('subsektor_tambah_sampel'),
      'kode_komoditas' => $this->input->post('komoditas_tambah_sampel'),
      'komoditas' => $komoditas['0']['komoditas'],
      'kol_17' => !empty($this->input->post('pencacahan_tambah_sampel'))? $this->input->post('pencacahan_tambah_sampel'):NULL,
      'kol_18' => !empty($this->input->post('kol_10_tambah'))? $this->input->post('kol_10_tambah'):NULL,
      'kol_19' => !empty($this->input->post('kol_11_tambah'))? $this->input->post('kol_11_tambah'):NULL,
      'kol_20' => !empty($this->input->post('kol_12_tambah'))? $this->input->post('kol_12_tambah'):NULL,
      'kol_21' => !empty($this->input->post('kol_13_tambah'))? $this->input->post('kol_13_tambah'):NULL,
      'kol_22' => !empty($this->input->post('kol_14_tambah'))? $this->input->post('kol_14_tambah'):NULL,
      'kol_23' => !empty($this->input->post('kol_15_tambah'))? $this->input->post('kol_15_tambah'):NULL,
      'sampel' => '3',
      'status_pemutakhiran' => 'sudah',
      'status_entri' => 'belum',
      'kode_petugas' => $user['user']['kode_petugas'],
      'tanggal_pemutakhiran' => date('Y-m-d')
    );

    $kode = $this->cek_kode_subsektor($this->input->post('subsektor_tambah_sampel'));
    // switch ($this->input->post('subsektor_tambah_sampel')) {
    //   case 1:
    //       $kode = "tp";
    //       break;
    //   case 2:
    //       $kode = "th";
    //       break;
    //   case 3:
    //       $kode = "tpr";
    //       break;
    //   case 4:
    //       $kode = "trk";
    //       break;
    //   case 5:
    //       $kode = "ikt";
    //       break;
    //   case 6:
    //       $kode = "ikb";
    //       break;
    //   case 7:
    //       $kode = "htn";
    //       break;
    // }

    $status = $this->input->post('kol_15_tambah');

    $this->db->trans_start();
    $this->Model_pemutakhiran->isi_tambah_sampel($data);
    if ($status == "1") {
      $kuesioner = array(
        'tahun' => $tahun,
        'id_prov' => $this->input->post('provinsi_tambah_sampel'),
        'id_kab' => $this->input->post('kabupaten_tambah_sampel'),
        'id_kec' => $this->input->post('kecamatan_tambah_sampel'),
        'id_desa' => $this->input->post('desa_tambah_sampel'),
        'blok_sensus' => '000B',
        'no_ruta' => $this->input->post('nurt_tambah_sampel'),
        'nama_ruta' => $this->input->post('nama_tambah_sampel'),
        'alamat_ruta' => $this->input->post('alamat_tambah_sampel'),
        'subsektor' => $this->input->post('subsektor_tambah_sampel'),
        'kode_komoditas' => $this->input->post('komoditas_tambah_sampel'),
        'komoditas' => $komoditas['0']['komoditas'],
        'status_entri' => 'belum',
        'kode_petugas' => $user['user']['kode_petugas']
        // 'tanggal_pemutakhiran' => date('Y-m-d')
      );
      // $this->Model_pemutakhiran->isi_kuesioner_sampel($kuesioner);
      $this->Model_pemutakhiran->isi_kuesioner_sub_sampel($kode, $kuesioner);
      $this->Model_pemutakhiran->isi_kuesioner_konsumsi($kuesioner);
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
  		  $this->db->trans_rollback();
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show"><strong>Maaf penerimaan dokumen gagal!</strong> Terjadi masalah query<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		    redirect('Pemutakhiran');
		} else {
  	   $this->db->trans_commit();
       $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show"><strong>Sukes!</strong> Penerimaan dokumen telah berhasil <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
       redirect('Pemutakhiran');
		}
  }

  public function cek_kode_subsektor($subsektor_cek)
  {
    switch ($subsektor_cek) {
      case 1:
          $kode = "tp";
          break;
      case 2:
          $kode = "th";
          break;
      case 3:
          $kode = "tpr";
          break;
      case 4:
          $kode = "trk";
          break;
      case 5:
          $kode = "ikt";
          break;
      case 6:
          $kode = "ikb";
          break;
      case 7:
          $kode = "htn";
          break;
    }
    return $kode;
  }

  public function Monitoring()
  {
    $data['id_prov'] = $_SESSION['kode_prov'];
    $data['id_kab'] = $_SESSION['kode_kab'];
    $data['tahun'] = $this->Model_pemutakhiran->ambil_tahun();
    $username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
    $data['kecamatan'] = $this->Model_pemutakhiran->ambil_kecamatan('71', '07');
    $this->load->view('Layout/top');
    $this->load->view('Layout/header', $data);
    $this->load->view('Layout/sidebar', $data);
    // $this->load->view('Layout/settings');
    $this->load->view('Pemutakhiran/tabel', $data);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }

  public function datatable_monitoring()
  {
    $filter_tahun = $this->input->post('filter_tahun');
    $filter_monitoring = $this->input->post('filter_monitoring');
    $id_prov = $_SESSION['kode_prov'];
    $id_kab = $_SESSION['kode_kab'];
    if ($filter_monitoring == '01') {
  		$data = $this->Model_pemutakhiran->ambil_status_tabel($filter_tahun, $id_prov, $id_kab);
  		$jumlah = count($this->Model_pemutakhiran->ambil_status_tabel($filter_tahun, $id_prov, $id_kab));
  		for ($i = 0; $i < $jumlah; $i++) {
  			$realisasi_persen = number_format(100,2);
  			if ($data[$i]['target_awal'] != 0){
  				$realisasi_persen = ($data[$i]['realisasi']/$data[$i]['target_awal'])*100;
  				$realisasi_persen = number_format($realisasi_persen,2);
  			};
  			$data[$i]['kode_persentase'] = '<div class="progress">
  	  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$realisasi_persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$realisasi_persen.'%">'.$realisasi_persen.'%</div>
  			</div>';
  		}
  		$tabel_monitoring  = array_map(array($this, 'array_map_tabel_monitoring'),$data);
  		echo json_encode(array(
  			'data' => $tabel_monitoring
  		));
    } elseif ($filter_monitoring == '02') {
  		$data = $this->Model_pemutakhiran->ambil_operator_monitoring($filter_tahun, $id_prov, $id_kab);
  		$tabel_monitoring  = array_map(array($this, 'array_map_tabel_operator'),$data);
  		echo json_encode(array(
  			'data' => $tabel_monitoring
  		));
    } elseif ($filter_monitoring == '03') {
      $data = $this->Model_pemutakhiran->ambil_kecamatan_monitoring($filter_tahun, $id_prov, $id_kab);
  		$tabel_monitoring  = array_map(array($this, 'array_map_tabel_kecamatan'),$data);
  		echo json_encode(array(
  			'data' => $tabel_monitoring
  		));
    }
	}

	public function array_map_tabel_monitoring($array) {
    return array(
      $array['subsektor'],
      $array['target_awal'],
      $array['realisasi'],
			$array['kode_persentase']
    );
  }

  public function array_map_tabel_operator($array) {
    return array(
      $array['nama'],
      $array['realisasi']
    );
  }

  public function array_map_tabel_kecamatan($array) {
    return array(
      $array['nama_kec'],
      $array['realisasi']
    );
  }
}
