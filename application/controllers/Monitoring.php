<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->has_userdata('username')) {
		} else {
			redirect('Login');
		}
	}

	public function index() {
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
    $this->load->view('Monitoring/tabel', $data);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
	}

	public function progres() {
		// $username = $_SESSION['username'];
		// $user = $this->Model_beranda->ambil_pengguna($username);
		$filter_tahun = $this->input->post('filter_tahun');
		$list_kip = $this->Model_monitoring->ambil_list_kip($filter_tahun);
		$daftar_kip = array ();
		$jumlah = count($this->Model_monitoring->ambil_list_kip($filter_tahun));
		foreach ($list_kip as $key => $value) {
			array_push($daftar_kip,$value['kip']);
		}
		$convert_kip = implode(",",$daftar_kip);
		$rawdata = $this->Model_monitoring->ambil_grafik($filter_tahun, $convert_kip);
		$selesai = 0;
		$progres = array(
			'kategori' => array(),
			'belum_selesai' => array(),
			'selesai' => array()
		);
		foreach ($rawdata as $key => $value) {
			array_push($progres['kategori'], $value['kategori']);
			$jumlah_selesai = 0;
			if ($value['jumlah_selesai'] != null) $jumlah_selesai = (int) 	$value['jumlah_selesai'];
			$jumlah_belum_selesai = (int) $value['jumlah_semua'] - $jumlah_selesai;
			if ($jumlah_belum_selesai < 0) $jumlah_belum_selesai = 0;
			array_push($progres['belum_selesai'], $jumlah_belum_selesai);
			array_push($progres['selesai'], $jumlah_selesai);
		}
		echo json_encode($progres);
	}

	public function tabel() {
		$username = $_SESSION['username'];
		$tipe_pengguna = $_SESSION['tipe_pengguna'];
		$data['user'] = $this->Model_beranda->ambil_pengguna($username);
		$data['notifikasi'] = $this->Model_notifikasi->ambil_notifikasiByNip($username);
		// $data['tahun'] = $this->Model_penerimaan_dokumen->ambil_tahun();
		$this->load->view('Layout/top');
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Monitoring/tabel', $data);
		$this->load->view('Layout/bottom');
	}

	public function datatable_tabel_entri() {
		$filter_tahun = $this->input->post('filter_tahun');
		$list_kip = $this->Model_monitoring->ambil_list_kip($filter_tahun);
		$daftar_kip = array ();
		$jumlah = count($this->Model_monitoring->ambil_list_kip($filter_tahun));
		foreach ($list_kip as $key => $value) {
			array_push($daftar_kip,$value['kip']);
		}
		$convert_kip = implode(",",$daftar_kip);
		$data = $this->Model_monitoring->ambil_status_tabel($filter_tahun, $convert_kip);
		$jumlah = count($this->Model_monitoring->ambil_status_tabel($filter_tahun, $convert_kip));
		for ($i = 0; $i < $jumlah; $i++) {
			$awal = number_format(100,2);
			$berjalan = number_format(100,2);
			if ($data[$i]['target_awal'] != 0){
				$awal = ($data[$i]['realisasi_awal']/$data[$i]['target_awal'])*100;
				$awal = number_format($awal,2);
			};
			$data[$i]['kode_awal'] = '<div class="progress">
	  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$awal.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$awal.'%">'.$awal.'%</div>
			</div>';
			if ($data[$i]['target_berjalan'] != 0){
				$berjalan = ($data[$i]['realisasi_berjalan']/$data[$i]['target_berjalan'])*100;
				$berjalan = number_format($berjalan,2);
			};
			$data[$i]['kode_berjalan'] = '<div class="progress">
	  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$berjalan.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$berjalan.'%">'.$berjalan.'%</div>
			</div>';
		}
		$tabel_entri  = array_map(array($this, 'array_map_tabel_entri'),$data);
		echo json_encode(array(
			'data' => $tabel_entri
		));
	}

	public function array_map_tabel_entri($array) {
    return array(
      $array['nama_prov'],
      $array['target_awal'],
      $array['target_berjalan'],
      $array['realisasi_awal'],
      $array['realisasi_berjalan'],
			$array['kode_awal'],
			$array['kode_berjalan']
    );
  }

	public function status() {
		$username = $_SESSION['username'];
		$tipe_pengguna = $_SESSION['tipe_pengguna'];
		$data['user'] = $this->Model_beranda->ambil_pengguna($username);
		$data['notifikasi'] = $this->Model_notifikasi->ambil_notifikasiByNip($username);
		// $data['tahun'] = $this->Model_penerimaan_dokumen->ambil_tahun();
		$this->load->view('Layout/top');
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Monitoring/status', $data);
		$this->load->view('Layout/bottom');
	}

	public function datatable_tabel_status() {
		$filter_tahun = $this->input->post('filter_tahun');
		$data = $this->Model_monitoring->ambil_status_monitoring($filter_tahun);
		$tabel_entri  = array_map(array($this, 'array_map_tabel_status'),$data);
		echo json_encode(array(
			'data' => $tabel_entri
		));
	}

	public function array_map_tabel_status($array) {
    return array(
      $array['nama_prov'],
      $array['aktif'],
      $array['tutup'],
      $array['sementara'],
      $array['bukan']
    );
  }

	public function log_out() {
	    $this->session->sess_destroy();
	    redirect('Login');
	}

}
