<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anomali extends CI_Controller {

  public function __construct() {
		parent::__construct();
		if ($this->session->has_userdata('username')) {
		} else {
			redirect('Login');
		}
	}

	public function coba()
	{
		$data = $this->Model_tabulasi->daftar_tabulasi_tabel_6('17', 'ltp_halaman2_tab');
		echo json_encode($data);exit();
		$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;
		foreach ($data as $row => $value) {
			$kode_1 = $kode_1 + (int) $value['produksi_lk'];
			$kode_2 = $kode_2 + (int) $value['produksi_pr'];
			$kode_3 = $kode_3 + (int) $value['non_lk'];
			$kode_4 = $kode_4 + (int) $value['non_pr'];
			$jumlah = $jumlah + (int) $value['jumlah'];
		}

		$push['nama_prov'] = '<b>JUMLAH</b>';
		$push['produksi_lk'] = $kode_1;
		$push['produksi_pr'] = $kode_2;
		$push['non_lk'] = $kode_3;
		$push['non_pr'] = $kode_4;
		$push['jumlah'] = $jumlah;

		array_push($data,$push);
		$data_fix  = array_map(array($this, 'array_map_tabel_6'),$data);
	}

  public function index() {
    redirect('Anomali/tanaman_pangan');
  }

	public function tanaman_pangan() {
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
    $this->load->view('Anomali/anomali', $data);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
	}

	public function konsumsi() {
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
    $this->load->view('Anomali/anomali', $data);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
	}

	public function ajax_ambil_anomali()
	{
		$filter_anom = $this->input->post('filter_anom');
    $filter_tahun = $this->input->post('filter_tahun');

		//table tabulasi number 1.1
		if ($filter_anom == '1') {
			$data = $this->Model_anomali->daftar_anomali_1($filter_tahun);
			$data_fix  = array_map(array($this, 'array_map_tabel_1'),$data);
		}

		//table tabulasi number 1.2
		if ($filter_anom == '2') {
      $data = $this->Model_anomali->daftar_anomali_2($filter_tahun);
			$data_fix  = array_map(array($this, 'array_map_tabel_2'),$data);
		}

		//table tabulasi number 1.3
		if ($filter_anom == '3') {
			$data = $this->Model_kuesioner->ambil_sub("tp",$filter_tahun);


			foreach ($data as $row => $value) {

			}

			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_3'),$data);
		}

		//table tabulasi number 1.4
		if ($filter_anom == '4') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_4($filter_tahun, 'ltp_halaman1');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['tnp_cabang'];
				$kode_2 = $kode_2 + (int) $value['pusat'];
				$kode_3 = $kode_3 + (int) $value['cabang'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['tnp_cabang'] = $kode_1;
			$push['pusat'] = $kode_2;
			$push['cabang'] = $kode_3;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_4'),$data);
		}

		//table tabulasi number 1.5
		if ($filter_anom == '5') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_5($filter_tahun, 'ltp_halaman1');
			$kode_1 = 0;$kode_2 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['penangkapan'];
				$kode_2 = $kode_2 + (int) $value['penangkapan_pengolahan'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['penangkapan'] = $kode_1;
			$push['penangkapan_pengolahan'] = $kode_2;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_5'),$data);
		}

		//table tabulasi number 2.1
		if ($filter_anom == '6') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_6($filter_tahun, 'ltp_halaman2');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['produksi_lk'];
				$kode_2 = $kode_2 + (int) $value['produksi_pr'];
				$kode_3 = $kode_3 + (int) $value['non_lk'];
				$kode_4 = $kode_4 + (int) $value['non_pr'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_lk'] = $kode_1;
			$push['produksi_pr'] = $kode_2;
			$push['non_lk'] = $kode_3;
			$push['non_pr'] = $kode_4;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_6'),$data);
		}

		//table tabulasi number 2.2
		if ($filter_anom == '7') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_7($filter_tahun, 'ltp_halaman2');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['produksi_ttp'];
				$kode_2 = $kode_2 + (int) $value['produksi_tdk_ttp'];
				$kode_3 = $kode_3 + (int) $value['non_ttp'];
				$kode_4 = $kode_4 + (int) $value['non_tdk_ttp'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ttp'] = $kode_1;
			$push['produksi_tdk_ttp'] = $kode_2;
			$push['non_ttp'] = $kode_3;
			$push['non_tdk_ttp'] = $kode_4;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_7'),$data);
		}

		//table tabulasi number 2.3
		if ($filter_anom == '8') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_8($filter_tahun, 'ltp_halaman2');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$kode_7 = 0;$kode_8 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['tdk_sklh'];
				$kode_2 = $kode_2 + (int) $value['tdk_sd'];
				$kode_3 = $kode_3 + (int) $value['sd'];
				$kode_4 = $kode_4 + (int) $value['smp'];
				$kode_5 = $kode_5 + (int) $value['sma'];
				$kode_6 = $kode_6 + (int) $value['smk'];
				$kode_7 = $kode_7 + (int) $value['akademi'];
				$kode_8 = $kode_8 + (int) $value['d4'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['tdk_sklh'] = $kode_1;
			$push['tdk_sd'] = $kode_2;
			$push['sd'] = $kode_3;
			$push['smp'] = $kode_4;
			$push['sma'] = $kode_5;
			$push['smk'] = $kode_6;
			$push['akademi'] = $kode_7;
			$push['d4'] = $kode_8;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 2.4
		if ($filter_anom == '9') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_9($filter_tahun, 'ltp_halaman2');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$kode_7 = 0;$kode_8 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['tdk_sklh'];
				$kode_2 = $kode_2 + (int) $value['tdk_sd'];
				$kode_3 = $kode_3 + (int) $value['sd'];
				$kode_4 = $kode_4 + (int) $value['smp'];
				$kode_5 = $kode_5 + (int) $value['sma'];
				$kode_6 = $kode_6 + (int) $value['smk'];
				$kode_7 = $kode_7 + (int) $value['akademi'];
				$kode_8 = $kode_8 + (int) $value['d4'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['tdk_sklh'] = $kode_1;
			$push['tdk_sd'] = $kode_2;
			$push['sd'] = $kode_3;
			$push['smp'] = $kode_4;
			$push['sma'] = $kode_5;
			$push['smk'] = $kode_6;
			$push['akademi'] = $kode_7;
			$push['d4'] = $kode_8;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 2.5
		if ($filter_anom == '10') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_10($filter_tahun, 'ltp_halaman2');
			$prolk = $this->Model_tabulasi->tabulasi_prolk_nasional($filter_tahun, 'ltp_halaman2');
			$propr = $this->Model_tabulasi->tabulasi_propr_nasional($filter_tahun, 'ltp_halaman2');
			$nonlk = $this->Model_tabulasi->tabulasi_nonlk_nasional($filter_tahun, 'ltp_halaman2');
			$nonpr = $this->Model_tabulasi->tabulasi_nonpr_nasional($filter_tahun, 'ltp_halaman2');
			$jumlah_nas = $this->Model_tabulasi->tabulasi_jumlah_10_nasional($filter_tahun, 'ltp_halaman2');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['produksi_lk'] = $prolk[0]['produksi_lk_nas'];
			$push['produksi_pr'] = $propr[0]['produksi_pr_nas'];
			$push['non_lk'] = $nonlk[0]['non_lk_nas'];
			$push['non_pr'] = $nonpr[0]['non_pr_nas'];
			$push['jumlah'] = $jumlah_nas[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['produksi_lk'] = floor($data[$i]['produksi_lk']);
					$data[$i]['produksi_pr'] = floor($data[$i]['produksi_pr']);
					$data[$i]['non_lk'] = floor($data[$i]['non_lk']);
					$data[$i]['non_pr'] = floor($data[$i]['non_pr']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}

			$data_fix  = array_map(array($this, 'array_map_tabel_6'),$data);
		}

		//table tabulasi number 2.6
		if ($filter_anom == '11') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_11($filter_tahun, 'ltp_halaman2');
			$prottp = $this->Model_tabulasi->tabulasi_prottp_nasional($filter_tahun, 'ltp_halaman2');
			$protdkttp = $this->Model_tabulasi->tabulasi_protdkttp_nasional($filter_tahun, 'ltp_halaman2');
			$nonttp = $this->Model_tabulasi->tabulasi_nonttp_nasional($filter_tahun, 'ltp_halaman2');
			$nontdkttp = $this->Model_tabulasi->tabulasi_nontdkttp_nasional($filter_tahun, 'ltp_halaman2');
			$jumlah_nas = $this->Model_tabulasi->tabulasi_jumlah_11_nasional($filter_tahun, 'ltp_halaman2');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['produksi_ttp'] = $prottp[0]['produksi_ttp_nas'];
			$push['produksi_tdk_ttp'] = $protdkttp[0]['produksi_tdk_ttp_nas'];
			$push['non_ttp'] = $nonttp[0]['non_ttp_nas'];
			$push['non_tdk_ttp'] = $nontdkttp[0]['non_tdk_ttp_nas'];
			$push['jumlah'] = $jumlah_nas[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['produksi_ttp'] = floor($data[$i]['produksi_ttp']);
					$data[$i]['produksi_tdk_ttp'] = floor($data[$i]['produksi_tdk_ttp']);
					$data[$i]['non_ttp'] = floor($data[$i]['non_ttp']);
					$data[$i]['non_tdk_ttp'] = floor($data[$i]['non_tdk_ttp']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}


			$data_fix  = array_map(array($this, 'array_map_tabel_7'),$data);
		}

		//table tabulasi number 2.7
		if ($filter_anom == '12') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_12($filter_tahun, 'ltp_halaman2');
			$tdk_sklh = $this->Model_tabulasi->tabulasi_tdksklh_nasional($filter_tahun, 'ltp_halaman2');
			$tdk_sd = $this->Model_tabulasi->tabulasi_tdksd_nasional($filter_tahun, 'ltp_halaman2');
			$sd = $this->Model_tabulasi->tabulasi_sd_nasional($filter_tahun, 'ltp_halaman2');
			$smp = $this->Model_tabulasi->tabulasi_smp_nasional($filter_tahun, 'ltp_halaman2');
			$sma = $this->Model_tabulasi->tabulasi_sma_nasional($filter_tahun, 'ltp_halaman2');
			$smk = $this->Model_tabulasi->tabulasi_smk_nasional($filter_tahun, 'ltp_halaman2');
			$akademi = $this->Model_tabulasi->tabulasi_akademi_nasional($filter_tahun, 'ltp_halaman2');
			$d4 = $this->Model_tabulasi->tabulasi_d4_nasional($filter_tahun, 'ltp_halaman2');
			$jumlah = $this->Model_tabulasi->tabulasi_jumlah_12_nasional($filter_tahun, 'ltp_halaman2');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['tdk_sklh'] = $tdk_sklh[0]['tdk_sklh_nas'];
			$push['tdk_sd'] = $tdk_sd[0]['tdk_sd_nas'];
			$push['sd'] = $sd[0]['sd_nas'];
			$push['smp'] = $smp[0]['smp_nas'];
			$push['sma'] = $sma[0]['sma_nas'];
			$push['smk'] = $smk[0]['smk_nas'];
			$push['akademi'] = $akademi[0]['akademi_nas'];
			$push['d4'] = $d4[0]['d4_nas'];
			$push['jumlah'] = $jumlah[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['tdk_sklh'] = floor($data[$i]['tdk_sklh']);
					$data[$i]['tdk_sd'] = floor($data[$i]['tdk_sd']);
					$data[$i]['sd'] = floor($data[$i]['sd']);
					$data[$i]['smp'] = floor($data[$i]['smp']);
					$data[$i]['sma'] = floor($data[$i]['sma']);
					$data[$i]['smk'] = floor($data[$i]['smk']);
					$data[$i]['akademi'] = floor($data[$i]['akademi']);
					$data[$i]['d4'] = floor($data[$i]['d4']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}

			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 2.8
		if ($filter_anom == '13') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_13($filter_tahun, 'ltp_halaman2');
			$tdk_sklh = $this->Model_tabulasi->tabulasi_tdksklh13_nasional($filter_tahun, 'ltp_halaman2');
			$tdk_sd = $this->Model_tabulasi->tabulasi_tdksd13_nasional($filter_tahun, 'ltp_halaman2');
			$sd = $this->Model_tabulasi->tabulasi_sd13_nasional($filter_tahun, 'ltp_halaman2');
			$smp = $this->Model_tabulasi->tabulasi_smp13_nasional($filter_tahun, 'ltp_halaman2');
			$sma = $this->Model_tabulasi->tabulasi_sma13_nasional($filter_tahun, 'ltp_halaman2');
			$smk = $this->Model_tabulasi->tabulasi_smk13_nasional($filter_tahun, 'ltp_halaman2');
			$akademi = $this->Model_tabulasi->tabulasi_akademi13_nasional($filter_tahun, 'ltp_halaman2');
			$d4 = $this->Model_tabulasi->tabulasi_d413_nasional($filter_tahun, 'ltp_halaman2');
			$jumlah = $this->Model_tabulasi->tabulasi_jumlah_13_nasional($filter_tahun, 'ltp_halaman2');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['tdk_sklh'] = $tdk_sklh[0]['tdk_sklh_nas'];
			$push['tdk_sd'] = $tdk_sd[0]['tdk_sd_nas'];
			$push['sd'] = $sd[0]['sd_nas'];
			$push['smp'] = $smp[0]['smp_nas'];
			$push['sma'] = $sma[0]['sma_nas'];
			$push['smk'] = $smk[0]['smk_nas'];
			$push['akademi'] = $akademi[0]['akademi_nas'];
			$push['d4'] = $d4[0]['d4_nas'];
			$push['jumlah'] = $jumlah[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['tdk_sklh'] = floor($data[$i]['tdk_sklh']);
					$data[$i]['tdk_sd'] = floor($data[$i]['tdk_sd']);
					$data[$i]['sd'] = floor($data[$i]['sd']);
					$data[$i]['smp'] = floor($data[$i]['smp']);
					$data[$i]['sma'] = floor($data[$i]['sma']);
					$data[$i]['smk'] = floor($data[$i]['smk']);
					$data[$i]['akademi'] = floor($data[$i]['akademi']);
					$data[$i]['d4'] = floor($data[$i]['d4']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}

			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 3.
		if ($filter_anom == '14') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_14($filter_tahun, 'ltp_halaman4');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['pengangkutan_boat'];
				$kode_2 = $kode_2 + (int) $value['pengangkutan_tempel'];
				$kode_3 = $kode_3 + (int) $value['pengangkutan_motor'];
				$kode_4 = $kode_4 + (int) $value['penangkapan_boat'];
				$kode_5 = $kode_5 + (int) $value['penangkapan_tempel'];
				$kode_6 = $kode_6 + (int) $value['penangkapan_motor'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['pengangkutan_boat'] = $kode_1;
			$push['pengangkutan_tempel'] = $kode_2;
			$push['pengangkutan_motor'] = $kode_3;
			$push['penangkapan_boat'] = $kode_4;
			$push['penangkapan_tempel'] = $kode_5;
			$push['penangkapan_motor'] = $kode_6;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_14'),$data);
		}

		//table tabulasi number 4.1.
		if ($filter_anom == '15') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_15($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['volume'] = number_format($data[$i]['volume'],2,".","");
				$data[$i]['nilai'] = $data[$i]['nilai']/1000;
				$data[$i]['nilai'] = number_format($data[$i]['nilai'],2,".","");
				$data[$i]['negeri'] = number_format($data[$i]['negeri'],2,".","");
				$data[$i]['ekspor'] = number_format($data[$i]['ekspor'],2,".","");
				$data[$i]['baku'] = number_format($data[$i]['baku'],2,".","");
				$data[$i]['sisa'] = number_format($data[$i]['sisa'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['volume'];
				$kode_2 = $kode_2 + (double) $value['nilai'];
				$kode_3 = $kode_3 + (double) $value['negeri'];
				$kode_4 = $kode_4 + (double) $value['ekspor'];
				$kode_5 = $kode_5 + (double) $value['baku'];
				$kode_6 = $kode_6 + (double) $value['sisa'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");
			$kode_6 = number_format($kode_6,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['volume'] = $kode_1;
			$push['nilai'] = $kode_2;
			$push['negeri'] = $kode_3;
			$push['ekspor'] = $kode_4;
			$push['baku'] = $kode_5;
			$push['sisa'] = $kode_6;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_15'),$data);
		}

		//table tabulasi number 4.2.
		if ($filter_anom == '16') {
			$ikan_1 = '01,02,03,04,05';
			$ikan_2 = '06';
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;
			$row1 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 1, 'ltp_halaman3');
			$row2 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 2, 'ltp_halaman3');
			$row3 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 3, 'ltp_halaman3');
			$row4 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 4, 'ltp_halaman3');
			$row5 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 5, 'ltp_halaman3');

			for ($i = 0; $i < count($row1); $i++){
				$data[$i]['nama_prov'] = $row1[$i]['nama_prov'];
				$data[$i]['produksi_ikan1'] = (double) $row1[$i]['produksi_ikan1'] + (double) $row2[$i]['produksi_ikan1'] + (double) $row3[$i]['produksi_ikan1'] + (double) $row4[$i]['produksi_ikan1'] + (double) $row5[$i]['produksi_ikan1'];
				$data[$i]['nilai_ikan1'] = (double) $row1[$i]['nilai_ikan1'] + (double) $row2[$i]['nilai_ikan1'] + (double) $row3[$i]['nilai_ikan1'] + (double) $row4[$i]['nilai_ikan1'] + (double) $row5[$i]['nilai_ikan1'];
				$data[$i]['produksi_ikan2'] = (double) $row1[$i]['produksi_ikan2'] + (double) $row2[$i]['produksi_ikan2'] + (double) $row3[$i]['produksi_ikan2'] + (double) $row4[$i]['produksi_ikan2'] + (double) $row5[$i]['produksi_ikan2'];
				$data[$i]['nilai_ikan2'] = (double) $row1[$i]['nilai_ikan2'] + (double) $row2[$i]['nilai_ikan2'] + (double) $row3[$i]['nilai_ikan2'] + (double) $row4[$i]['nilai_ikan2'] + (double) $row5[$i]['nilai_ikan2'];
			}

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi_ikan1'] = number_format($data[$i]['produksi_ikan1'],2,".","");
				$data[$i]['nilai_ikan1'] = $data[$i]['nilai_ikan1']/1000;
				$data[$i]['nilai_ikan1'] = number_format($data[$i]['nilai_ikan1'],2,".","");
				$data[$i]['produksi_ikan2'] = number_format($data[$i]['produksi_ikan2'],2,".","");
				$data[$i]['nilai_ikan2'] = $data[$i]['nilai_ikan2']/1000;
				$data[$i]['nilai_ikan2'] = number_format($data[$i]['nilai_ikan2'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi_ikan1'];
				$kode_2 = $kode_2 + (double) $value['nilai_ikan1'];
				$kode_3 = $kode_3 + (double) $value['produksi_ikan2'];
				$kode_4 = $kode_4 + (double) $value['nilai_ikan2'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ikan1'] = $kode_1;
			$push['nilai_ikan1'] = $kode_2;
			$push['produksi_ikan2'] = $kode_3;
			$push['nilai_ikan2'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_16'),$data);
		}

		//table tabulasi number 4.3.
		if ($filter_anom == '17') {
			$ikan_1 = '07';
			$ikan_2 = '08';
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;
			$row1 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 1, 'ltp_halaman3');
			$row2 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 2, 'ltp_halaman3');
			$row3 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 3, 'ltp_halaman3');
			$row4 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 4, 'ltp_halaman3');
			$row5 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 5, 'ltp_halaman3');

			for ($i = 0; $i < count($row1); $i++){
				$data[$i]['nama_prov'] = $row1[$i]['nama_prov'];
				$data[$i]['produksi_ikan1'] = (double) $row1[$i]['produksi_ikan1'] + (double) $row2[$i]['produksi_ikan1'] + (double) $row3[$i]['produksi_ikan1'] + (double) $row4[$i]['produksi_ikan1'] + (double) $row5[$i]['produksi_ikan1'];
				$data[$i]['nilai_ikan1'] = (double) $row1[$i]['nilai_ikan1'] + (double) $row2[$i]['nilai_ikan1'] + (double) $row3[$i]['nilai_ikan1'] + (double) $row4[$i]['nilai_ikan1'] + (double) $row5[$i]['nilai_ikan1'];
				$data[$i]['produksi_ikan2'] = (double) $row1[$i]['produksi_ikan2'] + (double) $row2[$i]['produksi_ikan2'] + (double) $row3[$i]['produksi_ikan2'] + (double) $row4[$i]['produksi_ikan2'] + (double) $row5[$i]['produksi_ikan2'];
				$data[$i]['nilai_ikan2'] = (double) $row1[$i]['nilai_ikan2'] + (double) $row2[$i]['nilai_ikan2'] + (double) $row3[$i]['nilai_ikan2'] + (double) $row4[$i]['nilai_ikan2'] + (double) $row5[$i]['nilai_ikan2'];
			}

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi_ikan1'] = number_format($data[$i]['produksi_ikan1'],2,".","");
				$data[$i]['nilai_ikan1'] = $data[$i]['nilai_ikan1']/1000;
				$data[$i]['nilai_ikan1'] = number_format($data[$i]['nilai_ikan1'],2,".","");
				$data[$i]['produksi_ikan2'] = number_format($data[$i]['produksi_ikan2'],2,".","");
				$data[$i]['nilai_ikan2'] = $data[$i]['nilai_ikan2']/1000;
				$data[$i]['nilai_ikan2'] = number_format($data[$i]['nilai_ikan2'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi_ikan1'];
				$kode_2 = $kode_2 + (double) $value['nilai_ikan1'];
				$kode_3 = $kode_3 + (double) $value['produksi_ikan2'];
				$kode_4 = $kode_4 + (double) $value['nilai_ikan2'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");


			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ikan1'] = $kode_1;
			$push['nilai_ikan1'] = $kode_2;
			$push['produksi_ikan2'] = $kode_3;
			$push['nilai_ikan2'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_16'),$data);
		}

		//table tabulasi number 4.4.
		if ($filter_anom == '18') {
			$ikan_1 = '09,10,11';
			$ikan_2 = '12,13,14,15,16,17,18,19,99';
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;
			$row1 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 1, 'ltp_halaman3');
			$row2 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 2, 'ltp_halaman3');
			$row3 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 3, 'ltp_halaman3');
			$row4 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 4, 'ltp_halaman3');
			$row5 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 5, 'ltp_halaman3');

			for ($i = 0; $i < count($row1); $i++){
				$data[$i]['nama_prov'] = $row1[$i]['nama_prov'];
				$data[$i]['produksi_ikan1'] = (double) $row1[$i]['produksi_ikan1'] + (double) $row2[$i]['produksi_ikan1'] + (double) $row3[$i]['produksi_ikan1'] + (double) $row4[$i]['produksi_ikan1'] + (double) $row5[$i]['produksi_ikan1'];
				$data[$i]['nilai_ikan1'] = (double) $row1[$i]['nilai_ikan1'] + (double) $row2[$i]['nilai_ikan1'] + (double) $row3[$i]['nilai_ikan1'] + (double) $row4[$i]['nilai_ikan1'] + (double) $row5[$i]['nilai_ikan1'];
				$data[$i]['produksi_ikan2'] = (double) $row1[$i]['produksi_ikan2'] + (double) $row2[$i]['produksi_ikan2'] + (double) $row3[$i]['produksi_ikan2'] + (double) $row4[$i]['produksi_ikan2'] + (double) $row5[$i]['produksi_ikan2'];
				$data[$i]['nilai_ikan2'] = (double) $row1[$i]['nilai_ikan2'] + (double) $row2[$i]['nilai_ikan2'] + (double) $row3[$i]['nilai_ikan2'] + (double) $row4[$i]['nilai_ikan2'] + (double) $row5[$i]['nilai_ikan2'];
			}

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi_ikan1'] = number_format($data[$i]['produksi_ikan1'],2,".","");
				$data[$i]['nilai_ikan1'] = $data[$i]['nilai_ikan1']/1000;
				$data[$i]['nilai_ikan1'] = number_format($data[$i]['nilai_ikan1'],2,".","");
				$data[$i]['produksi_ikan2'] = number_format($data[$i]['produksi_ikan2'],2,".","");
				$data[$i]['nilai_ikan2'] = $data[$i]['nilai_ikan2']/1000;
				$data[$i]['nilai_ikan2'] = number_format($data[$i]['nilai_ikan2'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi_ikan1'];
				$kode_2 = $kode_2 + (double) $value['nilai_ikan1'];
				$kode_3 = $kode_3 + (double) $value['produksi_ikan2'];
				$kode_4 = $kode_4 + (double) $value['nilai_ikan2'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ikan1'] = $kode_1;
			$push['nilai_ikan1'] = $kode_2;
			$push['produksi_ikan2'] = $kode_3;
			$push['nilai_ikan2'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_16'),$data);
		}

		//table tabulasi number 5.
		if ($filter_anom == '19') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_19($filter_tahun, 'ltp_halaman2');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['ttp'] = $data[$i]['ttp']/1000;
				$data[$i]['ttp'] = number_format($data[$i]['ttp'],2,".","");
				$data[$i]['tdk_ttp'] = $data[$i]['tdk_ttp']/1000;
				$data[$i]['tdk_ttp'] = number_format($data[$i]['tdk_ttp'],2,".","");
				$data[$i]['lainnya'] = $data[$i]['lainnya']/1000;
				$data[$i]['lainnya'] = number_format($data[$i]['lainnya'],2,".","");
				$data[$i]['pekerja'] = $data[$i]['pekerja']/1000;
				$data[$i]['pekerja'] = number_format($data[$i]['pekerja'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['ttp'];
				$kode_2 = $kode_2 + (double) $value['tdk_ttp'];
				$kode_3 = $kode_3 + (double) $value['lainnya'];
				$kode_4 = $kode_4 + (double) $value['pekerja'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['ttp'] = $kode_1;
			$push['tdk_ttp'] = $kode_2;
			$push['lainnya'] = $kode_3;
			$push['pekerja'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_19'),$data);
		}

		//table tabulasi number 6.1.
		if ($filter_anom == '20') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_20($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['air'] = $data[$i]['air']/1000;
				$data[$i]['air'] = number_format($data[$i]['air'],2,".","");
				$data[$i]['gas'] = $data[$i]['gas']/1000;
				$data[$i]['gas'] = number_format($data[$i]['gas'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['bbm'];
				$kode_2 = $kode_2 + (double) $value['listrik'];
				$kode_3 = $kode_3 + (double) $value['air'];
				$kode_4 = $kode_4 + (double) $value['gas'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['bbm'] = $kode_1;
			$push['listrik'] = $kode_2;
			$push['air'] = $kode_3;
			$push['gas'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_20'),$data);
		}

		//table tabulasi number 6.2.
		if ($filter_anom == '21') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_21($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['air'] = $data[$i]['air']/1000;
				$data[$i]['air'] = number_format($data[$i]['air'],2,".","");
				$data[$i]['gas'] = $data[$i]['gas']/1000;
				$data[$i]['gas'] = number_format($data[$i]['gas'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['bbm'];
				$kode_2 = $kode_2 + (double) $value['listrik'];
				$kode_3 = $kode_3 + (double) $value['air'];
				$kode_4 = $kode_4 + (double) $value['gas'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['bbm'] = $kode_1;
			$push['listrik'] = $kode_2;
			$push['air'] = $kode_3;
			$push['gas'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_20'),$data);
		}

		//table tabulasi number 6.3.
		if ($filter_anom == '22') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_22($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['air'] = $data[$i]['air']/1000;
				$data[$i]['air'] = number_format($data[$i]['air'],2,".","");
				$data[$i]['gas'] = $data[$i]['gas']/1000;
				$data[$i]['gas'] = number_format($data[$i]['gas'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['bbm'];
				$kode_2 = $kode_2 + (double) $value['listrik'];
				$kode_3 = $kode_3 + (double) $value['air'];
				$kode_4 = $kode_4 + (double) $value['gas'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['bbm'] = $kode_1;
			$push['listrik'] = $kode_2;
			$push['air'] = $kode_3;
			$push['gas'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_20'),$data);
		}

		//table tabulasi number 7.
		if ($filter_anom == '23') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_23($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['umpan'] = $data[$i]['umpan']/1000;
				$data[$i]['umpan'] = number_format($data[$i]['umpan'],2,".","");
				$data[$i]['garam_es'] = $data[$i]['garam_es']/1000;
				$data[$i]['garam_es'] = number_format($data[$i]['garam_es'],2,".","");
				$data[$i]['kemasan'] = $data[$i]['kemasan']/1000;
				$data[$i]['kemasan'] = number_format($data[$i]['kemasan'],2,".","");
				$data[$i]['konsumsi'] = $data[$i]['konsumsi']/1000;
				$data[$i]['konsumsi'] = number_format($data[$i]['konsumsi'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['umpan'];
				$kode_2 = $kode_2 + (double) $value['garam_es'];
				$kode_3 = $kode_3 + (double) $value['kemasan'];
				$kode_4 = $kode_4 + (double) $value['konsumsi'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['umpan'] = $kode_1;
			$push['garam_es'] = $kode_2;
			$push['kemasan'] = $kode_3;
			$push['konsumsi'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_23'),$data);
		}

		//table tabulasi number 8.
		if ($filter_anom == '24') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_24($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['jasa'] = $data[$i]['jasa']/1000;
				$data[$i]['jasa'] = number_format($data[$i]['jasa'],2,".","");
				$data[$i]['tanah'] = $data[$i]['tanah']/1000;
				$data[$i]['tanah'] = number_format($data[$i]['tanah'],2,".","");
				$data[$i]['gedung'] = $data[$i]['gedung']/1000;
				$data[$i]['gedung'] = number_format($data[$i]['gedung'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['jasa'];
				$kode_2 = $kode_2 + (double) $value['tanah'];
				$kode_3 = $kode_3 + (double) $value['gedung'];
				$kode_4 = $kode_4 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['jasa'] = $kode_1;
			$push['tanah'] = $kode_2;
			$push['gedung'] = $kode_3;
			$push['jumlah'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_24'),$data);
		}

		//table tabulasi number 9.
		if ($filter_anom == '25') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_25($filter_tahun, 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$kode_7 = 0;$jumlah = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['suku'] = $data[$i]['suku']/1000;
				$data[$i]['suku'] = number_format($data[$i]['suku'],2,".","");
				$data[$i]['kantor'] = $data[$i]['kantor']/1000;
				$data[$i]['kantor'] = number_format($data[$i]['kantor'],2,".","");
				$data[$i]['pajak'] = $data[$i]['pajak']/1000;
				$data[$i]['pajak'] = number_format($data[$i]['pajak'],2,".","");
				$data[$i]['penyusutan'] = $data[$i]['penyusutan']/1000;
				$data[$i]['penyusutan'] = number_format($data[$i]['penyusutan'],2,".","");
				$data[$i]['transportasi'] = $data[$i]['transportasi']/1000;
				$data[$i]['transportasi'] = number_format($data[$i]['transportasi'],2,".","");
				$data[$i]['telekomunikasi'] = $data[$i]['telekomunikasi']/1000;
				$data[$i]['telekomunikasi'] = number_format($data[$i]['telekomunikasi'],2,".","");
				$data[$i]['lain'] = $data[$i]['lain']/1000;
				$data[$i]['lain'] = number_format($data[$i]['lain'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['suku'];
				$kode_2 = $kode_2 + (double) $value['kantor'];
				$kode_3 = $kode_3 + (double) $value['pajak'];
				$kode_4 = $kode_4 + (double) $value['penyusutan'];
				$kode_5 = $kode_5 + (double) $value['transportasi'];
				$kode_6 = $kode_6 + (double) $value['telekomunikasi'];
				$kode_7 = $kode_7 + (double) $value['lain'];
				$jumlah = $jumlah + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");
			$kode_6 = number_format($kode_6,2,".","");
			$kode_7 = number_format($kode_7,2,".","");
			$jumlah = number_format($jumlah,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['suku'] = $kode_1;
			$push['kantor'] = $kode_2;
			$push['pajak'] = $kode_3;
			$push['penyusutan'] = $kode_4;
			$push['transportasi'] = $kode_5;
			$push['telekomunikasi'] = $kode_6;
			$push['lain'] = $kode_7;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_25'),$data);
		}

		//table tabulasi number 10.
		if ($filter_anom == '26') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_26($filter_tahun, 'ltp_halaman2', 'ltp_halaman3');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$jumlah = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['jumlah'] = $data[$i]['jumlah'] + $data[$i]['pekerja'];
				$data[$i]['pekerja'] = $data[$i]['pekerja']/1000;
				$data[$i]['pekerja'] = number_format($data[$i]['pekerja'],2,".","");
				$data[$i]['bahan'] = $data[$i]['bahan']/1000;
				$data[$i]['bahan'] = number_format($data[$i]['bahan'],2,".","");
				$data[$i]['jasa'] = $data[$i]['jasa']/1000;
				$data[$i]['jasa'] = number_format($data[$i]['jasa'],2,".","");
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['lainnya'] = $data[$i]['lainnya']/1000;
				$data[$i]['lainnya'] = number_format($data[$i]['lainnya'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['pekerja'];
				$kode_2 = $kode_2 + (double) $value['bahan'];
				$kode_3 = $kode_3 + (double) $value['jasa'];
				$kode_4 = $kode_4 + (double) $value['bbm'];
				$kode_5 = $kode_5 + (double) $value['listrik'];
				$kode_6 = $kode_6 + (double) $value['lainnya'];
				$jumlah = $jumlah + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");
			$kode_6 = number_format($kode_6,2,".","");
			$jumlah = number_format($jumlah,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['pekerja'] = $kode_1;
			$push['bahan'] = $kode_2;
			$push['jasa'] = $kode_3;
			$push['bbm'] = $kode_4;
			$push['listrik'] = $kode_5;
			$push['lainnya'] = $kode_6;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_26'),$data);
		}

		//table tabulasi number 11.
		if ($filter_anom == '27') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_27($filter_tahun, 'ltp_halaman2');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi'] = $data[$i]['produksi']/1000;
				$data[$i]['produksi'] = number_format($data[$i]['produksi'],2,".","");
				$data[$i]['jasa'] = $data[$i]['jasa']/1000;
				$data[$i]['jasa'] = number_format($data[$i]['jasa'],2,".","");
				$data[$i]['keuntungan'] = $data[$i]['keuntungan']/1000;
				$data[$i]['keuntungan'] = number_format($data[$i]['keuntungan'],2,".","");
				$data[$i]['penerimaan'] = $data[$i]['penerimaan']/1000;
				$data[$i]['penerimaan'] = number_format($data[$i]['penerimaan'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi'];
				$kode_2 = $kode_2 + (double) $value['jasa'];
				$kode_3 = $kode_3 + (double) $value['keuntungan'];
				$kode_4 = $kode_4 + (double) $value['penerimaan'];
				$jumlah = $jumlah + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$jumlah = number_format($jumlah,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi'] = $kode_1;
			$push['jasa'] = $kode_2;
			$push['keuntungan'] = $kode_3;
			$push['penerimaan'] = $kode_4;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_27'),$data);
		}

		echo json_encode(array('data' => $data_fix));
	}

	public function ajax_ambil_tabulasi_publikasi()
	{
		$filter_anom = $this->input->post('filter_tab');
    $filter_tahun = $this->input->post('filter_tahun');

		//table tabulasi number 1.1
		if ($filter_anom == '1') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_1($filter_tahun, 'ltp_halaman1_tab');
			$pma = 0;$pmdn = 0;$lainnya = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$pma = $pma + (int) $value['pma'];
				$pmdn = $pmdn + (int) $value['pmdn'];
				$lainnya = $lainnya + (int) $value['lainnya'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['pma'] = $pma;
			$push['pmdn'] = $pmdn;
			$push['lainnya'] = $lainnya;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_1'),$data);
		}

		//table tabulasi number 1.2
		if ($filter_anom == '2') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_1($filter_tahun, 'ltp_halaman1_tab');
			$pma_nas = $this->Model_tabulasi->tabulasi_pma_nasional($filter_tahun, 'ltp_halaman1_tab');
			$pmdn_nas = $this->Model_tabulasi->tabulasi_pmdn_nasional($filter_tahun, 'ltp_halaman1_tab');
			$lainnya_nas = $this->Model_tabulasi->tabulasi_lainnya_modal_nasional($filter_tahun, 'ltp_halaman1_tab');
			$jumlah_nas = $this->Model_tabulasi->tabulasi_jumlah_modal_nasional($filter_tahun, 'ltp_halaman1_tab');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['pma'] = $pma_nas[0]['pma_nas'];
			$push['pmdn'] = $pmdn_nas[0]['pmdn_nas'];
			$push['lainnya'] = $lainnya_nas[0]['lainnya_nas'];
			$push['jumlah'] = $jumlah_nas[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
				if ($data[$i]['jumlah'] != 0){
					$data[$i]['pma'] = ($data[$i]['pma']/$data[$i]['jumlah'])*100;
					$data[$i]['pma'] = number_format($data[$i]['pma'],2);
					$data[$i]['pmdn'] = ($data[$i]['pmdn']/$data[$i]['jumlah'])*100;
					$data[$i]['pmdn'] = number_format($data[$i]['pmdn'],2);
					$data[$i]['lainnya'] = ($data[$i]['lainnya']/$data[$i]['jumlah'])*100;
					$data[$i]['lainnya'] = number_format($data[$i]['lainnya'],2);
					$data[$i]['jumlah'] = $data[$i]['pma'] + $data[$i]['pmdn'] + $data[$i]['lainnya'];
					$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2);
					// use symbol percent
					// $data[$i]['pma'] = $data[$i]['pma']." %";
					// $data[$i]['pmdn'] = $data[$i]['pmdn']." %";
					// $data[$i]['lainnya'] = $data[$i]['lainnya']." %";
					// $data[$i]['jumlah'] = $data[$i]['jumlah']." %";
				}
			}
			$data_fix  = array_map(array($this, 'array_map_tabel_1'),$data);
		}

		//table tabulasi number 1.3
		if ($filter_anom == '3') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_3($filter_tahun, 'ltp_halaman1_tab');
			$persero = 0;$pt = 0;$cv = 0;$firma = 0;$koperasi = 0;$lainnya = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$persero = $persero + (int) $value['persero'];
				$pt = $pt + (int) $value['pt'];
				$cv = $cv + (int) $value['cv'];
				$firma = $firma + (int) $value['firma'];
				$koperasi = $koperasi + (int) $value['koperasi'];
				$lainnya = $lainnya + (int) $value['lainnya'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['persero'] = $persero;
			$push['pt'] = $pt;
			$push['cv'] = $cv;
			$push['firma'] = $firma;
			$push['koperasi'] = $koperasi;
			$push['lainnya'] = $lainnya;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_3'),$data);
		}

		//table tabulasi number 1.4
		if ($filter_anom == '4') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_4($filter_tahun, 'ltp_halaman1_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['tnp_cabang'];
				$kode_2 = $kode_2 + (int) $value['pusat'];
				$kode_3 = $kode_3 + (int) $value['cabang'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['tnp_cabang'] = $kode_1;
			$push['pusat'] = $kode_2;
			$push['cabang'] = $kode_3;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_4'),$data);
		}

		//table tabulasi number 1.5
		if ($filter_anom == '5') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_5($filter_tahun, 'ltp_halaman1_tab');
			$kode_1 = 0;$kode_2 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['penangkapan'];
				$kode_2 = $kode_2 + (int) $value['penangkapan_pengolahan'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['penangkapan'] = $kode_1;
			$push['penangkapan_pengolahan'] = $kode_2;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_5'),$data);
		}

		//table tabulasi number 2.1
		if ($filter_anom == '6') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_6($filter_tahun, 'ltp_halaman2_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['produksi_lk'];
				$kode_2 = $kode_2 + (int) $value['produksi_pr'];
				$kode_3 = $kode_3 + (int) $value['non_lk'];
				$kode_4 = $kode_4 + (int) $value['non_pr'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_lk'] = $kode_1;
			$push['produksi_pr'] = $kode_2;
			$push['non_lk'] = $kode_3;
			$push['non_pr'] = $kode_4;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_6'),$data);
		}

		//table tabulasi number 2.2
		if ($filter_anom == '7') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_7($filter_tahun, 'ltp_halaman2_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['produksi_ttp'];
				$kode_2 = $kode_2 + (int) $value['produksi_tdk_ttp'];
				$kode_3 = $kode_3 + (int) $value['non_ttp'];
				$kode_4 = $kode_4 + (int) $value['non_tdk_ttp'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ttp'] = $kode_1;
			$push['produksi_tdk_ttp'] = $kode_2;
			$push['non_ttp'] = $kode_3;
			$push['non_tdk_ttp'] = $kode_4;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_7'),$data);
		}

		//table tabulasi number 2.3
		if ($filter_anom == '8') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_8($filter_tahun, 'ltp_halaman2_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$kode_7 = 0;$kode_8 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['tdk_sklh'];
				$kode_2 = $kode_2 + (int) $value['tdk_sd'];
				$kode_3 = $kode_3 + (int) $value['sd'];
				$kode_4 = $kode_4 + (int) $value['smp'];
				$kode_5 = $kode_5 + (int) $value['sma'];
				$kode_6 = $kode_6 + (int) $value['smk'];
				$kode_7 = $kode_7 + (int) $value['akademi'];
				$kode_8 = $kode_8 + (int) $value['d4'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['tdk_sklh'] = $kode_1;
			$push['tdk_sd'] = $kode_2;
			$push['sd'] = $kode_3;
			$push['smp'] = $kode_4;
			$push['sma'] = $kode_5;
			$push['smk'] = $kode_6;
			$push['akademi'] = $kode_7;
			$push['d4'] = $kode_8;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 2.4
		if ($filter_anom == '9') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_9($filter_tahun, 'ltp_halaman2_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$kode_7 = 0;$kode_8 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['tdk_sklh'];
				$kode_2 = $kode_2 + (int) $value['tdk_sd'];
				$kode_3 = $kode_3 + (int) $value['sd'];
				$kode_4 = $kode_4 + (int) $value['smp'];
				$kode_5 = $kode_5 + (int) $value['sma'];
				$kode_6 = $kode_6 + (int) $value['smk'];
				$kode_7 = $kode_7 + (int) $value['akademi'];
				$kode_8 = $kode_8 + (int) $value['d4'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['tdk_sklh'] = $kode_1;
			$push['tdk_sd'] = $kode_2;
			$push['sd'] = $kode_3;
			$push['smp'] = $kode_4;
			$push['sma'] = $kode_5;
			$push['smk'] = $kode_6;
			$push['akademi'] = $kode_7;
			$push['d4'] = $kode_8;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 2.5
		if ($filter_anom == '10') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_10($filter_tahun, 'ltp_halaman2_tab');
			$prolk = $this->Model_tabulasi->tabulasi_prolk_nasional($filter_tahun, 'ltp_halaman2_tab');
			$propr = $this->Model_tabulasi->tabulasi_propr_nasional($filter_tahun, 'ltp_halaman2_tab');
			$nonlk = $this->Model_tabulasi->tabulasi_nonlk_nasional($filter_tahun, 'ltp_halaman2_tab');
			$nonpr = $this->Model_tabulasi->tabulasi_nonpr_nasional($filter_tahun, 'ltp_halaman2_tab');
			$jumlah_nas = $this->Model_tabulasi->tabulasi_jumlah_10_nasional($filter_tahun, 'ltp_halaman2_tab');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['produksi_lk'] = $prolk[0]['produksi_lk_nas'];
			$push['produksi_pr'] = $propr[0]['produksi_pr_nas'];
			$push['non_lk'] = $nonlk[0]['non_lk_nas'];
			$push['non_pr'] = $nonpr[0]['non_pr_nas'];
			$push['jumlah'] = $jumlah_nas[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['produksi_lk'] = floor($data[$i]['produksi_lk']);
					$data[$i]['produksi_pr'] = floor($data[$i]['produksi_pr']);
					$data[$i]['non_lk'] = floor($data[$i]['non_lk']);
					$data[$i]['non_pr'] = floor($data[$i]['non_pr']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}

			$data_fix  = array_map(array($this, 'array_map_tabel_6'),$data);
		}

		//table tabulasi number 2.6
		if ($filter_anom == '11') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_11($filter_tahun, 'ltp_halaman2_tab');
			$prottp = $this->Model_tabulasi->tabulasi_prottp_nasional($filter_tahun, 'ltp_halaman2_tab');
			$protdkttp = $this->Model_tabulasi->tabulasi_protdkttp_nasional($filter_tahun, 'ltp_halaman2_tab');
			$nonttp = $this->Model_tabulasi->tabulasi_nonttp_nasional($filter_tahun, 'ltp_halaman2_tab');
			$nontdkttp = $this->Model_tabulasi->tabulasi_nontdkttp_nasional($filter_tahun, 'ltp_halaman2_tab');
			$jumlah_nas = $this->Model_tabulasi->tabulasi_jumlah_11_nasional($filter_tahun, 'ltp_halaman2_tab');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['produksi_ttp'] = $prottp[0]['produksi_ttp_nas'];
			$push['produksi_tdk_ttp'] = $protdkttp[0]['produksi_tdk_ttp_nas'];
			$push['non_ttp'] = $nonttp[0]['non_ttp_nas'];
			$push['non_tdk_ttp'] = $nontdkttp[0]['non_tdk_ttp_nas'];
			$push['jumlah'] = $jumlah_nas[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['produksi_ttp'] = floor($data[$i]['produksi_ttp']);
					$data[$i]['produksi_tdk_ttp'] = floor($data[$i]['produksi_tdk_ttp']);
					$data[$i]['non_ttp'] = floor($data[$i]['non_ttp']);
					$data[$i]['non_tdk_ttp'] = floor($data[$i]['non_tdk_ttp']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}


			$data_fix  = array_map(array($this, 'array_map_tabel_7'),$data);
		}

		//table tabulasi number 2.7
		if ($filter_anom == '12') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_12($filter_tahun, 'ltp_halaman2_tab');
			$tdk_sklh = $this->Model_tabulasi->tabulasi_tdksklh_nasional($filter_tahun, 'ltp_halaman2_tab');
			$tdk_sd = $this->Model_tabulasi->tabulasi_tdksd_nasional($filter_tahun, 'ltp_halaman2_tab');
			$sd = $this->Model_tabulasi->tabulasi_sd_nasional($filter_tahun, 'ltp_halaman2_tab');
			$smp = $this->Model_tabulasi->tabulasi_smp_nasional($filter_tahun, 'ltp_halaman2_tab');
			$sma = $this->Model_tabulasi->tabulasi_sma_nasional($filter_tahun, 'ltp_halaman2_tab');
			$smk = $this->Model_tabulasi->tabulasi_smk_nasional($filter_tahun, 'ltp_halaman2_tab');
			$akademi = $this->Model_tabulasi->tabulasi_akademi_nasional($filter_tahun, 'ltp_halaman2_tab');
			$d4 = $this->Model_tabulasi->tabulasi_d4_nasional($filter_tahun, 'ltp_halaman2_tab');
			$jumlah = $this->Model_tabulasi->tabulasi_jumlah_12_nasional($filter_tahun, 'ltp_halaman2_tab');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['tdk_sklh'] = $tdk_sklh[0]['tdk_sklh_nas'];
			$push['tdk_sd'] = $tdk_sd[0]['tdk_sd_nas'];
			$push['sd'] = $sd[0]['sd_nas'];
			$push['smp'] = $smp[0]['smp_nas'];
			$push['sma'] = $sma[0]['sma_nas'];
			$push['smk'] = $smk[0]['smk_nas'];
			$push['akademi'] = $akademi[0]['akademi_nas'];
			$push['d4'] = $d4[0]['d4_nas'];
			$push['jumlah'] = $jumlah[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['tdk_sklh'] = floor($data[$i]['tdk_sklh']);
					$data[$i]['tdk_sd'] = floor($data[$i]['tdk_sd']);
					$data[$i]['sd'] = floor($data[$i]['sd']);
					$data[$i]['smp'] = floor($data[$i]['smp']);
					$data[$i]['sma'] = floor($data[$i]['sma']);
					$data[$i]['smk'] = floor($data[$i]['smk']);
					$data[$i]['akademi'] = floor($data[$i]['akademi']);
					$data[$i]['d4'] = floor($data[$i]['d4']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}

			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 2.8
		if ($filter_anom == '13') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_13($filter_tahun, 'ltp_halaman2_tab');
			$tdk_sklh = $this->Model_tabulasi->tabulasi_tdksklh13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$tdk_sd = $this->Model_tabulasi->tabulasi_tdksd13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$sd = $this->Model_tabulasi->tabulasi_sd13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$smp = $this->Model_tabulasi->tabulasi_smp13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$sma = $this->Model_tabulasi->tabulasi_sma13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$smk = $this->Model_tabulasi->tabulasi_smk13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$akademi = $this->Model_tabulasi->tabulasi_akademi13_nasional($filter_tahun, 'ltp_halaman2_tab');
			$d4 = $this->Model_tabulasi->tabulasi_d413_nasional($filter_tahun, 'ltp_halaman2_tab');
			$jumlah = $this->Model_tabulasi->tabulasi_jumlah_13_nasional($filter_tahun, 'ltp_halaman2_tab');

			$push['nama_prov'] = '<b>NASIONAL</b>';
			$push['tdk_sklh'] = $tdk_sklh[0]['tdk_sklh_nas'];
			$push['tdk_sd'] = $tdk_sd[0]['tdk_sd_nas'];
			$push['sd'] = $sd[0]['sd_nas'];
			$push['smp'] = $smp[0]['smp_nas'];
			$push['sma'] = $sma[0]['sma_nas'];
			$push['smk'] = $smk[0]['smk_nas'];
			$push['akademi'] = $akademi[0]['akademi_nas'];
			$push['d4'] = $d4[0]['d4_nas'];
			$push['jumlah'] = $jumlah[0]['jumlah_nas'];

			array_push($data,$push);

			for ($i = 0; $i < count($data); $i++) {
					$data[$i]['tdk_sklh'] = floor($data[$i]['tdk_sklh']);
					$data[$i]['tdk_sd'] = floor($data[$i]['tdk_sd']);
					$data[$i]['sd'] = floor($data[$i]['sd']);
					$data[$i]['smp'] = floor($data[$i]['smp']);
					$data[$i]['sma'] = floor($data[$i]['sma']);
					$data[$i]['smk'] = floor($data[$i]['smk']);
					$data[$i]['akademi'] = floor($data[$i]['akademi']);
					$data[$i]['d4'] = floor($data[$i]['d4']);
					$data[$i]['jumlah'] = floor($data[$i]['jumlah']);
			}

			$data_fix  = array_map(array($this, 'array_map_tabel_8'),$data);
		}

		//table tabulasi number 3.
		if ($filter_anom == '14') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_14($filter_tahun, 'ltp_halaman4_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$jumlah = 0;
			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (int) $value['pengangkutan_boat'];
				$kode_2 = $kode_2 + (int) $value['pengangkutan_tempel'];
				$kode_3 = $kode_3 + (int) $value['pengangkutan_motor'];
				$kode_4 = $kode_4 + (int) $value['penangkapan_boat'];
				$kode_5 = $kode_5 + (int) $value['penangkapan_tempel'];
				$kode_6 = $kode_6 + (int) $value['penangkapan_motor'];
				$jumlah = $jumlah + (int) $value['jumlah'];
			}

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['pengangkutan_boat'] = $kode_1;
			$push['pengangkutan_tempel'] = $kode_2;
			$push['pengangkutan_motor'] = $kode_3;
			$push['penangkapan_boat'] = $kode_4;
			$push['penangkapan_tempel'] = $kode_5;
			$push['penangkapan_motor'] = $kode_6;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_14'),$data);
		}

		//table tabulasi number 4.1.
		if ($filter_anom == '15') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_15($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['volume'] = number_format($data[$i]['volume'],2,".","");
				$data[$i]['nilai'] = $data[$i]['nilai']/1000;
				$data[$i]['nilai'] = number_format($data[$i]['nilai'],2,".","");
				$data[$i]['negeri'] = number_format($data[$i]['negeri'],2,".","");
				$data[$i]['ekspor'] = number_format($data[$i]['ekspor'],2,".","");
				$data[$i]['baku'] = number_format($data[$i]['baku'],2,".","");
				$data[$i]['sisa'] = number_format($data[$i]['sisa'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['volume'];
				$kode_2 = $kode_2 + (double) $value['nilai'];
				$kode_3 = $kode_3 + (double) $value['negeri'];
				$kode_4 = $kode_4 + (double) $value['ekspor'];
				$kode_5 = $kode_5 + (double) $value['baku'];
				$kode_6 = $kode_6 + (double) $value['sisa'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");
			$kode_6 = number_format($kode_6,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['volume'] = $kode_1;
			$push['nilai'] = $kode_2;
			$push['negeri'] = $kode_3;
			$push['ekspor'] = $kode_4;
			$push['baku'] = $kode_5;
			$push['sisa'] = $kode_6;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_15'),$data);
		}

		//table tabulasi number 4.2.
		if ($filter_anom == '16') {
			$ikan_1 = '01,02,03,04,05';
			$ikan_2 = '06';
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;
			$row1 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 1, 'ltp_halaman3_tab');
			$row2 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 2, 'ltp_halaman3_tab');
			$row3 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 3, 'ltp_halaman3_tab');
			$row4 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 4, 'ltp_halaman3_tab');
			$row5 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 5, 'ltp_halaman3_tab');

			for ($i = 0; $i < count($row1); $i++){
				$data[$i]['nama_prov'] = $row1[$i]['nama_prov'];
				$data[$i]['produksi_ikan1'] = (double) $row1[$i]['produksi_ikan1'] + (double) $row2[$i]['produksi_ikan1'] + (double) $row3[$i]['produksi_ikan1'] + (double) $row4[$i]['produksi_ikan1'] + (double) $row5[$i]['produksi_ikan1'];
				$data[$i]['nilai_ikan1'] = (double) $row1[$i]['nilai_ikan1'] + (double) $row2[$i]['nilai_ikan1'] + (double) $row3[$i]['nilai_ikan1'] + (double) $row4[$i]['nilai_ikan1'] + (double) $row5[$i]['nilai_ikan1'];
				$data[$i]['produksi_ikan2'] = (double) $row1[$i]['produksi_ikan2'] + (double) $row2[$i]['produksi_ikan2'] + (double) $row3[$i]['produksi_ikan2'] + (double) $row4[$i]['produksi_ikan2'] + (double) $row5[$i]['produksi_ikan2'];
				$data[$i]['nilai_ikan2'] = (double) $row1[$i]['nilai_ikan2'] + (double) $row2[$i]['nilai_ikan2'] + (double) $row3[$i]['nilai_ikan2'] + (double) $row4[$i]['nilai_ikan2'] + (double) $row5[$i]['nilai_ikan2'];
			}

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi_ikan1'] = number_format($data[$i]['produksi_ikan1'],2,".","");
				$data[$i]['nilai_ikan1'] = $data[$i]['nilai_ikan1']/1000;
				$data[$i]['nilai_ikan1'] = number_format($data[$i]['nilai_ikan1'],2,".","");
				$data[$i]['produksi_ikan2'] = number_format($data[$i]['produksi_ikan2'],2,".","");
				$data[$i]['nilai_ikan2'] = $data[$i]['nilai_ikan2']/1000;
				$data[$i]['nilai_ikan2'] = number_format($data[$i]['nilai_ikan2'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi_ikan1'];
				$kode_2 = $kode_2 + (double) $value['nilai_ikan1'];
				$kode_3 = $kode_3 + (double) $value['produksi_ikan2'];
				$kode_4 = $kode_4 + (double) $value['nilai_ikan2'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ikan1'] = $kode_1;
			$push['nilai_ikan1'] = $kode_2;
			$push['produksi_ikan2'] = $kode_3;
			$push['nilai_ikan2'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_16'),$data);
		}

		//table tabulasi number 4.3.
		if ($filter_anom == '17') {
			$ikan_1 = '07';
			$ikan_2 = '08';
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;
			$row1 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 1, 'ltp_halaman3_tab');
			$row2 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 2, 'ltp_halaman3_tab');
			$row3 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 3, 'ltp_halaman3_tab');
			$row4 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 4, 'ltp_halaman3_tab');
			$row5 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 5, 'ltp_halaman3_tab');

			for ($i = 0; $i < count($row1); $i++){
				$data[$i]['nama_prov'] = $row1[$i]['nama_prov'];
				$data[$i]['produksi_ikan1'] = (double) $row1[$i]['produksi_ikan1'] + (double) $row2[$i]['produksi_ikan1'] + (double) $row3[$i]['produksi_ikan1'] + (double) $row4[$i]['produksi_ikan1'] + (double) $row5[$i]['produksi_ikan1'];
				$data[$i]['nilai_ikan1'] = (double) $row1[$i]['nilai_ikan1'] + (double) $row2[$i]['nilai_ikan1'] + (double) $row3[$i]['nilai_ikan1'] + (double) $row4[$i]['nilai_ikan1'] + (double) $row5[$i]['nilai_ikan1'];
				$data[$i]['produksi_ikan2'] = (double) $row1[$i]['produksi_ikan2'] + (double) $row2[$i]['produksi_ikan2'] + (double) $row3[$i]['produksi_ikan2'] + (double) $row4[$i]['produksi_ikan2'] + (double) $row5[$i]['produksi_ikan2'];
				$data[$i]['nilai_ikan2'] = (double) $row1[$i]['nilai_ikan2'] + (double) $row2[$i]['nilai_ikan2'] + (double) $row3[$i]['nilai_ikan2'] + (double) $row4[$i]['nilai_ikan2'] + (double) $row5[$i]['nilai_ikan2'];
			}

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi_ikan1'] = number_format($data[$i]['produksi_ikan1'],2,".","");
				$data[$i]['nilai_ikan1'] = $data[$i]['nilai_ikan1']/1000;
				$data[$i]['nilai_ikan1'] = number_format($data[$i]['nilai_ikan1'],2,".","");
				$data[$i]['produksi_ikan2'] = number_format($data[$i]['produksi_ikan2'],2,".","");
				$data[$i]['nilai_ikan2'] = $data[$i]['nilai_ikan2']/1000;
				$data[$i]['nilai_ikan2'] = number_format($data[$i]['nilai_ikan2'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi_ikan1'];
				$kode_2 = $kode_2 + (double) $value['nilai_ikan1'];
				$kode_3 = $kode_3 + (double) $value['produksi_ikan2'];
				$kode_4 = $kode_4 + (double) $value['nilai_ikan2'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");


			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ikan1'] = $kode_1;
			$push['nilai_ikan1'] = $kode_2;
			$push['produksi_ikan2'] = $kode_3;
			$push['nilai_ikan2'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_16'),$data);
		}

		//table tabulasi number 4.4.
		if ($filter_anom == '18') {
			$ikan_1 = '09,10,11';
			$ikan_2 = '12,13,14,15,16,17,18,19,99';
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;
			$row1 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 1, 'ltp_halaman3_tab');
			$row2 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 2, 'ltp_halaman3_tab');
			$row3 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 3, 'ltp_halaman3_tab');
			$row4 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 4, 'ltp_halaman3_tab');
			$row5 = $this->Model_tabulasi->daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, 5, 'ltp_halaman3_tab');

			for ($i = 0; $i < count($row1); $i++){
				$data[$i]['nama_prov'] = $row1[$i]['nama_prov'];
				$data[$i]['produksi_ikan1'] = (double) $row1[$i]['produksi_ikan1'] + (double) $row2[$i]['produksi_ikan1'] + (double) $row3[$i]['produksi_ikan1'] + (double) $row4[$i]['produksi_ikan1'] + (double) $row5[$i]['produksi_ikan1'];
				$data[$i]['nilai_ikan1'] = (double) $row1[$i]['nilai_ikan1'] + (double) $row2[$i]['nilai_ikan1'] + (double) $row3[$i]['nilai_ikan1'] + (double) $row4[$i]['nilai_ikan1'] + (double) $row5[$i]['nilai_ikan1'];
				$data[$i]['produksi_ikan2'] = (double) $row1[$i]['produksi_ikan2'] + (double) $row2[$i]['produksi_ikan2'] + (double) $row3[$i]['produksi_ikan2'] + (double) $row4[$i]['produksi_ikan2'] + (double) $row5[$i]['produksi_ikan2'];
				$data[$i]['nilai_ikan2'] = (double) $row1[$i]['nilai_ikan2'] + (double) $row2[$i]['nilai_ikan2'] + (double) $row3[$i]['nilai_ikan2'] + (double) $row4[$i]['nilai_ikan2'] + (double) $row5[$i]['nilai_ikan2'];
			}

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi_ikan1'] = number_format($data[$i]['produksi_ikan1'],2,".","");
				$data[$i]['nilai_ikan1'] = $data[$i]['nilai_ikan1']/1000;
				$data[$i]['nilai_ikan1'] = number_format($data[$i]['nilai_ikan1'],2,".","");
				$data[$i]['produksi_ikan2'] = number_format($data[$i]['produksi_ikan2'],2,".","");
				$data[$i]['nilai_ikan2'] = $data[$i]['nilai_ikan2']/1000;
				$data[$i]['nilai_ikan2'] = number_format($data[$i]['nilai_ikan2'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi_ikan1'];
				$kode_2 = $kode_2 + (double) $value['nilai_ikan1'];
				$kode_3 = $kode_3 + (double) $value['produksi_ikan2'];
				$kode_4 = $kode_4 + (double) $value['nilai_ikan2'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi_ikan1'] = $kode_1;
			$push['nilai_ikan1'] = $kode_2;
			$push['produksi_ikan2'] = $kode_3;
			$push['nilai_ikan2'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_16'),$data);
		}

		//table tabulasi number 5.
		if ($filter_anom == '19') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_19($filter_tahun, 'ltp_halaman2_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['ttp'] = $data[$i]['ttp']/1000;
				$data[$i]['ttp'] = number_format($data[$i]['ttp'],2,".","");
				$data[$i]['tdk_ttp'] = $data[$i]['tdk_ttp']/1000;
				$data[$i]['tdk_ttp'] = number_format($data[$i]['tdk_ttp'],2,".","");
				$data[$i]['lainnya'] = $data[$i]['lainnya']/1000;
				$data[$i]['lainnya'] = number_format($data[$i]['lainnya'],2,".","");
				$data[$i]['pekerja'] = $data[$i]['pekerja']/1000;
				$data[$i]['pekerja'] = number_format($data[$i]['pekerja'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['ttp'];
				$kode_2 = $kode_2 + (double) $value['tdk_ttp'];
				$kode_3 = $kode_3 + (double) $value['lainnya'];
				$kode_4 = $kode_4 + (double) $value['pekerja'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['ttp'] = $kode_1;
			$push['tdk_ttp'] = $kode_2;
			$push['lainnya'] = $kode_3;
			$push['pekerja'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_19'),$data);
		}

		//table tabulasi number 6.1.
		if ($filter_anom == '20') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_20($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['air'] = $data[$i]['air']/1000;
				$data[$i]['air'] = number_format($data[$i]['air'],2,".","");
				$data[$i]['gas'] = $data[$i]['gas']/1000;
				$data[$i]['gas'] = number_format($data[$i]['gas'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['bbm'];
				$kode_2 = $kode_2 + (double) $value['listrik'];
				$kode_3 = $kode_3 + (double) $value['air'];
				$kode_4 = $kode_4 + (double) $value['gas'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['bbm'] = $kode_1;
			$push['listrik'] = $kode_2;
			$push['air'] = $kode_3;
			$push['gas'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_20'),$data);
		}

		//table tabulasi number 6.2.
		if ($filter_anom == '21') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_21($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['air'] = $data[$i]['air']/1000;
				$data[$i]['air'] = number_format($data[$i]['air'],2,".","");
				$data[$i]['gas'] = $data[$i]['gas']/1000;
				$data[$i]['gas'] = number_format($data[$i]['gas'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['bbm'];
				$kode_2 = $kode_2 + (double) $value['listrik'];
				$kode_3 = $kode_3 + (double) $value['air'];
				$kode_4 = $kode_4 + (double) $value['gas'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['bbm'] = $kode_1;
			$push['listrik'] = $kode_2;
			$push['air'] = $kode_3;
			$push['gas'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_20'),$data);
		}

		//table tabulasi number 6.3.
		if ($filter_anom == '22') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_22($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['air'] = $data[$i]['air']/1000;
				$data[$i]['air'] = number_format($data[$i]['air'],2,".","");
				$data[$i]['gas'] = $data[$i]['gas']/1000;
				$data[$i]['gas'] = number_format($data[$i]['gas'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['bbm'];
				$kode_2 = $kode_2 + (double) $value['listrik'];
				$kode_3 = $kode_3 + (double) $value['air'];
				$kode_4 = $kode_4 + (double) $value['gas'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['bbm'] = $kode_1;
			$push['listrik'] = $kode_2;
			$push['air'] = $kode_3;
			$push['gas'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_20'),$data);
		}

		//table tabulasi number 7.
		if ($filter_anom == '23') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_23($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['umpan'] = $data[$i]['umpan']/1000;
				$data[$i]['umpan'] = number_format($data[$i]['umpan'],2,".","");
				$data[$i]['garam_es'] = $data[$i]['garam_es']/1000;
				$data[$i]['garam_es'] = number_format($data[$i]['garam_es'],2,".","");
				$data[$i]['kemasan'] = $data[$i]['kemasan']/1000;
				$data[$i]['kemasan'] = number_format($data[$i]['kemasan'],2,".","");
				$data[$i]['konsumsi'] = $data[$i]['konsumsi']/1000;
				$data[$i]['konsumsi'] = number_format($data[$i]['konsumsi'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['umpan'];
				$kode_2 = $kode_2 + (double) $value['garam_es'];
				$kode_3 = $kode_3 + (double) $value['kemasan'];
				$kode_4 = $kode_4 + (double) $value['konsumsi'];
				$kode_5 = $kode_5 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['umpan'] = $kode_1;
			$push['garam_es'] = $kode_2;
			$push['kemasan'] = $kode_3;
			$push['konsumsi'] = $kode_4;
			$push['jumlah'] = $kode_5;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_23'),$data);
		}

		//table tabulasi number 8.
		if ($filter_anom == '24') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_24($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['jasa'] = $data[$i]['jasa']/1000;
				$data[$i]['jasa'] = number_format($data[$i]['jasa'],2,".","");
				$data[$i]['tanah'] = $data[$i]['tanah']/1000;
				$data[$i]['tanah'] = number_format($data[$i]['tanah'],2,".","");
				$data[$i]['gedung'] = $data[$i]['gedung']/1000;
				$data[$i]['gedung'] = number_format($data[$i]['gedung'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['jasa'];
				$kode_2 = $kode_2 + (double) $value['tanah'];
				$kode_3 = $kode_3 + (double) $value['gedung'];
				$kode_4 = $kode_4 + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['jasa'] = $kode_1;
			$push['tanah'] = $kode_2;
			$push['gedung'] = $kode_3;
			$push['jumlah'] = $kode_4;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_24'),$data);
		}

		//table tabulasi number 9.
		if ($filter_anom == '25') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_25($filter_tahun, 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$kode_7 = 0;$jumlah = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['suku'] = $data[$i]['suku']/1000;
				$data[$i]['suku'] = number_format($data[$i]['suku'],2,".","");
				$data[$i]['kantor'] = $data[$i]['kantor']/1000;
				$data[$i]['kantor'] = number_format($data[$i]['kantor'],2,".","");
				$data[$i]['pajak'] = $data[$i]['pajak']/1000;
				$data[$i]['pajak'] = number_format($data[$i]['pajak'],2,".","");
				$data[$i]['penyusutan'] = $data[$i]['penyusutan']/1000;
				$data[$i]['penyusutan'] = number_format($data[$i]['penyusutan'],2,".","");
				$data[$i]['transportasi'] = $data[$i]['transportasi']/1000;
				$data[$i]['transportasi'] = number_format($data[$i]['transportasi'],2,".","");
				$data[$i]['telekomunikasi'] = $data[$i]['telekomunikasi']/1000;
				$data[$i]['telekomunikasi'] = number_format($data[$i]['telekomunikasi'],2,".","");
				$data[$i]['lain'] = $data[$i]['lain']/1000;
				$data[$i]['lain'] = number_format($data[$i]['lain'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['suku'];
				$kode_2 = $kode_2 + (double) $value['kantor'];
				$kode_3 = $kode_3 + (double) $value['pajak'];
				$kode_4 = $kode_4 + (double) $value['penyusutan'];
				$kode_5 = $kode_5 + (double) $value['transportasi'];
				$kode_6 = $kode_6 + (double) $value['telekomunikasi'];
				$kode_7 = $kode_7 + (double) $value['lain'];
				$jumlah = $jumlah + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");
			$kode_6 = number_format($kode_6,2,".","");
			$kode_7 = number_format($kode_7,2,".","");
			$jumlah = number_format($jumlah,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['suku'] = $kode_1;
			$push['kantor'] = $kode_2;
			$push['pajak'] = $kode_3;
			$push['penyusutan'] = $kode_4;
			$push['transportasi'] = $kode_5;
			$push['telekomunikasi'] = $kode_6;
			$push['lain'] = $kode_7;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_25'),$data);
		}

		//table tabulasi number 10.
		if ($filter_anom == '26') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_26($filter_tahun, 'ltp_halaman2_tab', 'ltp_halaman3_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$kode_5 = 0;$kode_6 = 0;$jumlah = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['jumlah'] = $data[$i]['jumlah'] + $data[$i]['pekerja'];
				$data[$i]['pekerja'] = $data[$i]['pekerja']/1000;
				$data[$i]['pekerja'] = number_format($data[$i]['pekerja'],2,".","");
				$data[$i]['bahan'] = $data[$i]['bahan']/1000;
				$data[$i]['bahan'] = number_format($data[$i]['bahan'],2,".","");
				$data[$i]['jasa'] = $data[$i]['jasa']/1000;
				$data[$i]['jasa'] = number_format($data[$i]['jasa'],2,".","");
				$data[$i]['bbm'] = $data[$i]['bbm']/1000;
				$data[$i]['bbm'] = number_format($data[$i]['bbm'],2,".","");
				$data[$i]['listrik'] = $data[$i]['listrik']/1000;
				$data[$i]['listrik'] = number_format($data[$i]['listrik'],2,".","");
				$data[$i]['lainnya'] = $data[$i]['lainnya']/1000;
				$data[$i]['lainnya'] = number_format($data[$i]['lainnya'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['pekerja'];
				$kode_2 = $kode_2 + (double) $value['bahan'];
				$kode_3 = $kode_3 + (double) $value['jasa'];
				$kode_4 = $kode_4 + (double) $value['bbm'];
				$kode_5 = $kode_5 + (double) $value['listrik'];
				$kode_6 = $kode_6 + (double) $value['lainnya'];
				$jumlah = $jumlah + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$kode_5 = number_format($kode_5,2,".","");
			$kode_6 = number_format($kode_6,2,".","");
			$jumlah = number_format($jumlah,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['pekerja'] = $kode_1;
			$push['bahan'] = $kode_2;
			$push['jasa'] = $kode_3;
			$push['bbm'] = $kode_4;
			$push['listrik'] = $kode_5;
			$push['lainnya'] = $kode_6;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_26'),$data);
		}

		//table tabulasi number 11.
		if ($filter_anom == '27') {
			$data = $this->Model_tabulasi->daftar_tabulasi_tabel_27($filter_tahun, 'ltp_halaman2_tab');
			$kode_1 = 0;$kode_2 = 0;$kode_3 = 0;$kode_4 = 0;$jumlah = 0;

			for ($i = 0; $i < count($data); $i++){
				$data[$i]['produksi'] = $data[$i]['produksi']/1000;
				$data[$i]['produksi'] = number_format($data[$i]['produksi'],2,".","");
				$data[$i]['jasa'] = $data[$i]['jasa']/1000;
				$data[$i]['jasa'] = number_format($data[$i]['jasa'],2,".","");
				$data[$i]['keuntungan'] = $data[$i]['keuntungan']/1000;
				$data[$i]['keuntungan'] = number_format($data[$i]['keuntungan'],2,".","");
				$data[$i]['penerimaan'] = $data[$i]['penerimaan']/1000;
				$data[$i]['penerimaan'] = number_format($data[$i]['penerimaan'],2,".","");
				$data[$i]['jumlah'] = $data[$i]['jumlah']/1000;
				$data[$i]['jumlah'] = number_format($data[$i]['jumlah'],2,".","");
			}

			foreach ($data as $row => $value) {
				$kode_1 = $kode_1 + (double) $value['produksi'];
				$kode_2 = $kode_2 + (double) $value['jasa'];
				$kode_3 = $kode_3 + (double) $value['keuntungan'];
				$kode_4 = $kode_4 + (double) $value['penerimaan'];
				$jumlah = $jumlah + (double) $value['jumlah'];
			}

			$kode_1 = number_format($kode_1,2,".","");
			$kode_2 = number_format($kode_2,2,".","");
			$kode_3 = number_format($kode_3,2,".","");
			$kode_4 = number_format($kode_4,2,".","");
			$jumlah = number_format($jumlah,2,".","");

			$push['nama_prov'] = '<b>JUMLAH</b>';
			$push['produksi'] = $kode_1;
			$push['jasa'] = $kode_2;
			$push['keuntungan'] = $kode_3;
			$push['penerimaan'] = $kode_4;
			$push['jumlah'] = $jumlah;

			array_push($data,$push);
			$data_fix  = array_map(array($this, 'array_map_tabel_27'),$data);
		}

		echo json_encode(array('data' => $data_fix));
	}

	public function array_map_tabel_1($array)
  {
    return array(
      $array['no_ruta'],
			$array['nama_ruta'],
      $array['b3_k2A'],
      $array['b3_k4'],
      $array['b3_k5'],
      $array['produktivitas'],
      $array['produktivitas_bawah'],
      $array['produktivitas_atas']
    );
  }

	public function array_map_tabel_2($array)
  {
    return array(
      $array['no_ruta'],
			$array['nama_ruta'],
      $array['b3_k2A'],
      $array['b3_k6'],
      $array['b3_k7'],
      $array['nilai_perkilo'],
      $array['batas_bawah'],
      $array['batas_atas']
    );
  }

	public function array_map_tabel_4($array)
  {
    return array(
      $array['nama_prov'],
      $array['tnp_cabang'],
      $array['pusat'],
      $array['cabang'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_5($array)
  {
    return array(
      $array['nama_prov'],
      $array['penangkapan'],
      $array['penangkapan_pengolahan'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_6($array)
  {
    return array(
      $array['nama_prov'],
      $array['produksi_lk'],
      $array['produksi_pr'],
			$array['non_lk'],
			$array['non_pr'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_7($array)
  {
    return array(
      $array['nama_prov'],
      $array['produksi_ttp'],
      $array['produksi_tdk_ttp'],
			$array['non_ttp'],
			$array['non_tdk_ttp'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_8($array)
  {
    return array(
      $array['nama_prov'],
			$array['d4'],
			$array['akademi'],
			$array['smk'],
			$array['sma'],
			$array['smp'],
			$array['sd'],
			$array['tdk_sd'],
      $array['tdk_sklh'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_14($array)
  {
    return array(
      $array['nama_prov'],
			$array['pengangkutan_boat'],
			$array['pengangkutan_tempel'],
			$array['pengangkutan_motor'],
			$array['penangkapan_boat'],
			$array['penangkapan_tempel'],
			$array['penangkapan_motor'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_15($array)
  {
    return array(
      $array['nama_prov'],
			$array['volume'],
			$array['nilai'],
			$array['negeri'],
			$array['ekspor'],
			$array['baku'],
			$array['sisa']
    );
  }

	public function array_map_tabel_16($array)
  {
    return array(
      $array['nama_prov'],
			$array['produksi_ikan1'],
			$array['nilai_ikan1'],
			$array['produksi_ikan2'],
			$array['nilai_ikan2']
    );
  }

	public function array_map_tabel_19($array)
  {
    return array(
      $array['nama_prov'],
			$array['ttp'],
			$array['tdk_ttp'],
			$array['lainnya'],
			$array['pekerja'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_20($array)
  {
    return array(
      $array['nama_prov'],
			$array['bbm'],
			$array['listrik'],
			$array['air'],
			$array['gas'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_23($array)
  {
    return array(
      $array['nama_prov'],
			$array['umpan'],
			$array['garam_es'],
			$array['kemasan'],
			$array['konsumsi'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_24($array)
  {
    return array(
      $array['nama_prov'],
			$array['jasa'],
			$array['tanah'],
			$array['gedung'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_25($array)
  {
    return array(
      $array['nama_prov'],
			$array['suku'],
			$array['kantor'],
			$array['pajak'],
			$array['penyusutan'],
			$array['transportasi'],
			$array['telekomunikasi'],
			$array['lain'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_26($array)
  {
    return array(
      $array['nama_prov'],
			$array['pekerja'],
			$array['bahan'],
			$array['jasa'],
			$array['bbm'],
			$array['listrik'],
			$array['lainnya'],
			$array['jumlah']
    );
  }

	public function array_map_tabel_27($array)
  {
    return array(
      $array['nama_prov'],
			$array['produksi'],
			$array['jasa'],
			$array['keuntungan'],
			$array['penerimaan'],
			$array['jumlah']
    );
  }
}
