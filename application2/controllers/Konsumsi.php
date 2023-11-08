<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumsi extends CI_Controller {

  public function __construct() {
		parent::__construct();
	  date_default_timezone_set('Asia/Jakarta');
		if ($this->session->has_userdata('username')) {
		} else {
			redirect('Login');
		}
	}

  public function index() {
    $username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
    if ($data['user']['level'] == '1') {
      $data['user']['level'] = 'Pengentri';
    } elseif ($data['user']['level'] == '2') {
      $data['user']['level'] = 'Supervisor';
    } elseif ($data['user']['level'] == '4') {
      $data['user']['level'] = 'Web Designer';
    } elseif ($data['user']['level'] == '5') {
      $data['user']['level'] = 'Administrator';
    }
    $this->load->view('Layout/top');
    $this->load->view('Layout/header', $data);
    $this->load->view('Layout/sidebar', $data);
    // $this->load->view('Layout/settings');
    $this->load->view('Beranda/beranda');
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }
  public function ambilDesa(){
	  $get = $this->input->post();
	  echo json_encode(array(
		  "ok"=>true,
		  "data"=>$this->Model_kuesioner->ambil_desa($get['idprov'],$get['idkab'],$get['idkec'])
	  ));
  }

  public function coba()
  {
    $subsek = $this->Model_kuesioner->ambil_sub('k','2022','71','07','010','001','26');
    switch ($subsek['subsektor']) {
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
    $data['sub'] = $this->Model_kuesioner->ambil_sub($kode,'2022','71','07','010','001','26');
    echo json_encode($data['sub']);
  }

	public function halaman1() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['title'] = "Halaman 1";
		$data['halaman'] = 1;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas(intval($data['subsektor']));
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/tabs');
		$this->load->view('Kuesioner/Konsumsi/halaman1');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman1(){
		$data = json_decode(file_get_contents("php://input"));
		$this->Model_konsumsi->isi_halaman1($data);

		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman2() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['title'] = "Halaman 2";
		$data['halaman'] = 2;
    $subsek = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
    switch ($subsek['subsektor']) {
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
		$data['sub'] = $this->Model_kuesioner->ambil_sub($kode,$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b3_a'] = $this->Model_konsumsi->ambil_sub_k_blok3($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'21010');
		$data['isianBlok3a'] = "";
		foreach ($data['sub_b3_a'] as $item){
			$data['isianBlok3a'].=" ".$this->Model_konsumsi->isianBlok3($item,"a");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman2(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
    switch ($data->subsek) {
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
		$sampel = $this->Model_kuesioner->ambil_sub($kode,$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman2($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman3() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 3;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_1'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","1");
		$data['sub_b4_a_2'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","2");
		$data['isianBlok4a1'] = "";
		$data['isianBlok4a2'] = "";
		foreach ($data['sub_b4_a_1'] as $item){
			$data['isianBlok4a1'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","1");
		}
		foreach ($data['sub_b4_a_2'] as $item){
			$data['isianBlok4a2'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","2");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_1'] = $this->Model_konsumsi->ambil_jenis_barang('11','1101');
		$data['list_jenis_barang_b4_a_2'] = $this->Model_konsumsi->ambil_jenis_barang('11','1102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman3(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman3($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman4() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 4;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_3'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","3");
		$data['isianBlok4a3'] = "";
		foreach ($data['sub_b4_a_3'] as $item){
			$data['isianBlok4a3'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","3");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_3'] = $this->Model_konsumsi->ambil_jenis_barang('11','1103');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman4(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman4($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman5() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 5;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_4'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","4");
		$data['isianBlok4a4'] = "";
		foreach ($data['sub_b4_a_4'] as $item){
			$data['isianBlok4a4'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","4");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_4'] = $this->Model_konsumsi->ambil_jenis_barang('11','1104');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman5(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman5($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman6() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 6;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_5'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","5");
		$data['isianBlok4a5'] = "";
		foreach ($data['sub_b4_a_5'] as $item){
			$data['isianBlok4a5'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","5");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_5'] = $this->Model_konsumsi->ambil_jenis_barang('11','1105');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman6(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman6($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman7() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 7;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_6'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","6");
		$data['sub_b4_a_7'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","7");
		$data['isianBlok4a6'] = "";
		foreach ($data['sub_b4_a_6'] as $item){
			$data['isianBlok4a6'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","6");
		}
		$data['isianBlok4a7'] = "";
		foreach ($data['sub_b4_a_7'] as $item){
			$data['isianBlok4a7'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","7");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_6'] = $this->Model_konsumsi->ambil_jenis_barang('11','1106');
		$data['list_jenis_barang_b4_a_7'] = $this->Model_konsumsi->ambil_jenis_barang('11','1107');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman7(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman7($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman8() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 8;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_8'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","8");
		$data['isianBlok4a8'] = "";
		foreach ($data['sub_b4_a_8'] as $item){
			$data['isianBlok4a8'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","8");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_8'] = $this->Model_konsumsi->ambil_jenis_barang('11','1108');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman8(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman8($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman9() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 9;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_9'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","9");
		$data['sub_b4_a_10'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","10");
		$data['isianBlok4a9'] = "";
		foreach ($data['sub_b4_a_9'] as $item){
			$data['isianBlok4a9'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","9");
		}
		$data['isianBlok4a10'] = "";
		foreach ($data['sub_b4_a_10'] as $item){
			$data['isianBlok4a10'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","10");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_9'] = $this->Model_konsumsi->ambil_jenis_barang('11','1109');
		$data['list_jenis_barang_b4_a_10'] = $this->Model_konsumsi->ambil_jenis_barang('11','1110');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman9(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman9($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman10() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 10;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a_11'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","11");
		$data['sub_b4_a_12'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","12");
		$data['isianBlok4a11'] = "";
		foreach ($data['sub_b4_a_11'] as $item){
			$data['isianBlok4a11'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","11");
		}
		$data['isianBlok4a12'] = "";
		foreach ($data['sub_b4_a_12'] as $item){
			$data['isianBlok4a12'].=" ".$this->Model_konsumsi->isianBlok4($item,"a","12");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_a_11'] = $this->Model_konsumsi->ambil_jenis_barang('11','1111');
		$data['list_jenis_barang_b4_a_12'] = $this->Model_konsumsi->ambil_jenis_barang('11','1112');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman10(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman10($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman11() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 11;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_b_1'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","1");
		$data['sub_b4_b_2'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","2");
		$data['isianBlok4b1'] = "";
		foreach ($data['sub_b4_b_1'] as $item){
			$data['isianBlok4b1'].=" ".$this->Model_konsumsi->isianBlok4($item,"b","1");
		}
		$data['isianBlok4b2'] = "";
		foreach ($data['sub_b4_b_2'] as $item){
			$data['isianBlok4b2'].=" ".$this->Model_konsumsi->isianBlok4($item,"b","2");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_b_1'] = $this->Model_konsumsi->ambil_jenis_barang('12','1201');
		$data['list_jenis_barang_b4_b_2'] = $this->Model_konsumsi->ambil_jenis_barang('12','1202');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman11(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman11($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman12() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 12;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_b_3'] = $this->Model_konsumsi->ambil_sub_tp_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","3");
		$data['isianBlok4b3'] = "";
		foreach ($data['sub_b4_b_3'] as $item){
			$data['isianBlok4b3'].=" ".$this->Model_konsumsi->isianBlok4($item,"b","3");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b4_b_3'] = $this->Model_konsumsi->ambil_jenis_barang('12','1203');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman12(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman12($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman13() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 13;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_a_1'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","1");
		$data['isianBlok5a1'] = "";
		foreach ($data['sub_b5_a_1'] as $item){
			$data['isianBlok5a1'].=" ".$this->Model_konsumsi->isianBlok5($item,"a","1");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_a_1'] = $this->Model_konsumsi->ambil_jenis_barang('13','1301');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman13(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman13($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman14() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 14;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_a_2'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","2");
		$data['sub_b5_a_3'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","3");
		$data['isianBlok5a2'] = "";
		foreach ($data['sub_b5_a_2'] as $item){
			$data['isianBlok5a2'].=" ".$this->Model_konsumsi->isianBlok5($item,"a","2");
		}
		$data['isianBlok5a3'] = "";
		foreach ($data['sub_b5_a_3'] as $item){
			$data['isianBlok5a3'].=" ".$this->Model_konsumsi->isianBlok5($item,"a","3");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_a_2'] = $this->Model_konsumsi->ambil_jenis_barang('13','1302');
		$data['list_jenis_barang_b5_a_3'] = $this->Model_konsumsi->ambil_jenis_barang('13','1303');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman14(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman14($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman15() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 15;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_a_4'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"a","4");
		$data['isianBlok5a4'] = "";
		foreach ($data['sub_b5_a_4'] as $item){
			$data['isianBlok5a4'].=" ".$this->Model_konsumsi->isianBlok5($item,"a","4");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_a_4'] = $this->Model_konsumsi->ambil_jenis_barang('13','1304');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman15(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman15($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman16() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 16;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_b_1'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","1");
		$data['sub_b5_b_2'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","2");
		$data['isianBlok5b1'] = "";
		foreach ($data['sub_b5_b_1'] as $item){
			$data['isianBlok5b1'].=" ".$this->Model_konsumsi->isianBlok5($item,"b","1");
		}
		$data['isianBlok5b2'] = "";
		foreach ($data['sub_b5_b_2'] as $item){
			$data['isianBlok5b2'].=" ".$this->Model_konsumsi->isianBlok5($item,"b","2");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_b_1'] = $this->Model_konsumsi->ambil_jenis_barang('14','1401');
		$data['list_jenis_barang_b5_b_2'] = $this->Model_konsumsi->ambil_jenis_barang('14','1402');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman16(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman16($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman17() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 17;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_b_3'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","3");
		$data['sub_b5_b_4'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"b","4");
		$data['isianBlok5b3'] = "";
		foreach ($data['sub_b5_b_3'] as $item){
			$data['isianBlok5b3'].=" ".$this->Model_konsumsi->isianBlok5($item,"b","3");
		}
		$data['isianBlok5b4'] = "";
		foreach ($data['sub_b5_b_4'] as $item){
			$data['isianBlok5b4'].=" ".$this->Model_konsumsi->isianBlok5($item,"b","4");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_b_3'] = $this->Model_konsumsi->ambil_jenis_barang('14','1403');
		$data['list_jenis_barang_b5_b_4'] = $this->Model_konsumsi->ambil_jenis_barang('14','1404');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman17(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman17($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman18() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 18;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_c_1'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"c","1");
		$data['sub_b5_c_2'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"c","2");
		$data['isianBlok5c1'] = "";
		foreach ($data['sub_b5_c_1'] as $item){
			$data['isianBlok5c1'].=" ".$this->Model_konsumsi->isianBlok5($item,"c","1");
		}
		$data['isianBlok5c2'] = "";
		foreach ($data['sub_b5_c_2'] as $item){
			$data['isianBlok5c2'].=" ".$this->Model_konsumsi->isianBlok5($item,"c","2");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_c_1'] = $this->Model_konsumsi->ambil_jenis_barang('15','1501');
		$data['list_jenis_barang_b5_c_2'] = $this->Model_konsumsi->ambil_jenis_barang('15','1502');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman18(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman18($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman19() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 19;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_c_3'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"c","3");
		$data['sub_b5_d_1'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"d","1");
		$data['isianBlok5c3'] = "";
		foreach ($data['sub_b5_c_3'] as $item){
			$data['isianBlok5c3'].=" ".$this->Model_konsumsi->isianBlok5($item,"c","3");
		}
		$data['isianBlok5d1'] = "";
		foreach ($data['sub_b5_d_1'] as $item){
			$data['isianBlok5d1'].=" ".$this->Model_konsumsi->isianBlok5($item,"d","1");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_c_3'] = $this->Model_konsumsi->ambil_jenis_barang('15','1503');
		$data['list_jenis_barang_b5_d_1'] = $this->Model_konsumsi->ambil_jenis_barang('16','1601');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman19(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman19($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman20() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 20;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_d_2'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"d","2");
		$data['sub_b5_d_3'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"d","3");
		$data['isianBlok5d2'] = "";
		foreach ($data['sub_b5_d_2'] as $item){
			$data['isianBlok5d2'].=" ".$this->Model_konsumsi->isianBlok5($item,"d","2");
		}
		$data['isianBlok5d3'] = "";
		foreach ($data['sub_b5_d_3'] as $item){
			$data['isianBlok5d3'].=" ".$this->Model_konsumsi->isianBlok5($item,"d","3");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_d_2'] = $this->Model_konsumsi->ambil_jenis_barang('16','1602');
		$data['list_jenis_barang_b5_d_3'] = $this->Model_konsumsi->ambil_jenis_barang('16','1603');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman20(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman20($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman21() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 21;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_d_4'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"d","4");
		$data['sub_b5_e_1'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"e","1");
		$data['sub_b5_e_2'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"e","2");
		$data['isianBlok5d4'] = "";
		foreach ($data['sub_b5_d_4'] as $item){
			$data['isianBlok5d4'].=" ".$this->Model_konsumsi->isianBlok5($item,"d","4");
		}
		$data['isianBlok5e1'] = "";
		foreach ($data['sub_b5_e_1'] as $item){
			$data['isianBlok5e1'].=" ".$this->Model_konsumsi->isianBlok5($item,"e","1");
		}
		$data['isianBlok5e2'] = "";
		foreach ($data['sub_b5_e_2'] as $item){
			$data['isianBlok5e2'].=" ".$this->Model_konsumsi->isianBlok5($item,"e","2");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_d_4'] = $this->Model_konsumsi->ambil_jenis_barang('16','1604');
		$data['list_jenis_barang_b5_e_1'] = $this->Model_konsumsi->ambil_jenis_barang('17','1701');
		$data['list_jenis_barang_b5_e_2'] = $this->Model_konsumsi->ambil_jenis_barang('17','1702');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman21(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman21($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman22() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 22;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_e_3'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"e","3");
		$data['sub_b5_e_4'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"e","4");
		$data['sub_b5_f_1'] = $this->Model_konsumsi->ambil_sub_k_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],"f","1");
		$data['isianBlok5e3'] = "";
		foreach ($data['sub_b5_e_3'] as $item){
			$data['isianBlok5e3'].=" ".$this->Model_konsumsi->isianBlok5($item,"e","3");
		}
		$data['isianBlok5e4'] = "";
		foreach ($data['sub_b5_e_4'] as $item){
			$data['isianBlok5e4'].=" ".$this->Model_konsumsi->isianBlok5($item,"e","4");
		}
		$data['isianBlok5f1'] = "";
		foreach ($data['sub_b5_f_1'] as $item){
			$data['isianBlok5f1'].=" ".$this->Model_konsumsi->isianBlok5($item,"f","1");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['komoditas'] = $this->Model_kuesioner->ambil_komoditas($data['sub']['kode_komoditas']);
		$data['list_jenis_barang_b5_e_3'] = $this->Model_konsumsi->ambil_jenis_barang('17','1703');
		$data['list_jenis_barang_b5_e_4'] = $this->Model_konsumsi->ambil_jenis_barang('17','1704');
		$data['list_jenis_barang_b5_f_1'] = $this->Model_konsumsi->ambil_jenis_barang('18','1801');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman22(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman22($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman23() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 23;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman23(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman23($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}

	public function halaman24() {
		$get = $this->input->get();
		$username = $_SESSION['username'];
		$data['user'] = $this->Model_login->ambil_user($username);
		if ($data['user']['level'] == '1') {
			$data['user']['level'] = 'Pengentri';
		} elseif ($data['user']['level'] == '2') {
			$data['user']['level'] = 'Supervisor';
		} elseif ($data['user']['level'] == '4') {
			$data['user']['level'] = 'Web Designer';
		} elseif ($data['user']['level'] == '5') {
			$data['user']['level'] = 'Administrator';
		}
		$data['halaman'] = 24;
		$data['title'] = "Halaman {$data['halaman']}";
		$data['sub'] = $this->Model_kuesioner->ambil_sub('k',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Konsumsi/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function submithalaman24(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('k',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_konsumsi->isi_halaman24($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}


}
