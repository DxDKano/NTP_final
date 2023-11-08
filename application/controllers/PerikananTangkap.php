<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerikananTangkap extends CI_Controller {

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

  public function coba()
  {
    $data['sub'] = $this->Model_kuesioner->ambil_sub('ikt','2022','71','07','010','001','34');
    $data['b3'] = $this->Model_ikt->ambil_ikt_b3('2022','71','07','010','001','34');
    echo json_encode($data['sub']);
    echo json_encode($data['b3']);
  }

  public function ambilDesa(){
	  $get = $this->input->post();
	  echo json_encode(array(
		  "ok"=>true,
		  "data"=>$this->Model_kuesioner->ambil_desa($get['idprov'],$get['idkab'],$get['idkec'])
	  ));
  }
	public function blok1() {
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
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/TanamanPangan/blok1');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submitblok1(){
	  echo json_encode(array(
		  "ok"=>true
	  ));
	}


	public function blok2() {
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
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/TanamanPangan/blok2');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submitblok2(){
		echo json_encode(array(
			"ok"=>true
		));
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
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/tabs');
		$this->load->view('Kuesioner/PerikananTangkap/halaman1');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman1(){
		$data = json_decode(file_get_contents("php://input"));
		$this->Model_ikt->isi_halaman1($data);

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
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
    // $data['b3'] = $this->Model_ikt->ambil_ikt_b3($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a'] = $this->Model_ikt->ambil_sub_ikt_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'a');
		$data['isianBlok4a'] = "";
		foreach ($data['sub_b4_a'] as $item){
			$data['isianBlok4a'].=" ".$this->Model_tp->isianBlok4($item,"a");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman2');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}
	public function ambilKomoditas(){
		$get = $this->input->post();
		echo json_encode(array(
			"ok"=>true,
			"data"=>$this->Model_komoditas->ambil_komoditas($get['idsubsektor'],$get['idkomoditas'])
		));
	}


	public function submithalaman2(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman2($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}
	// public function ambilKodePengeluaranKomoditas($kelompok){
	// 	$post = $this->input->post();
	// 	echo json_encode(array(
	// 		"ok"=>true,
	// 		"data"=>array(
	// 			array(
	// 				"nama"=>"Bibit Padi",
	// 				"satuan"=>"Ikat",
	// 				"kode"=>"2101001"
	// 			),
	// 			array(
	// 				"nama"=>"Benih Padi",
	// 				"satuan"=>"Kg",
	// 				"kode"=>"2101002"
	// 			),
  //
	// 		)
	// 	));
	// }
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
		$data['title'] = "Halaman 3";
		$data['halaman'] = 3;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_b'] = $this->Model_ikt->ambil_sub_ikt_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'b');
		$data['isianBlok4b'] = "";
		foreach ($data['sub_b4_b'] as $item){
			$data['isianBlok4b'].=" ".$this->Model_ikt->isianBlok4($item,"b");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman3');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman3(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman3($sampel,$data);
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
		$data['title'] = "Halaman 4";
		$data['halaman'] = 4;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_a'] = $this->Model_ikt->ambil_sub_ikt_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'a');
		$data['sub_b5_b'] = $this->Model_ikt->ambil_sub_ikt_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'b');
		$data['isianBlok5a'] = "";
		$data['isianBlok5b'] = "";
		foreach ($data['sub_b5_a'] as $item){
			$data['isianBlok5a'].=" ".$this->Model_ikt->isianBlok5($item,"a");
		}
		foreach ($data['sub_b5_b'] as $item){
			$data['isianBlok5b'].=" ".$this->Model_ikt->isianBlok5($item,"b");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman4');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman4(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman4($sampel,$data);
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
		$data['title'] = "Halaman 5";
		$data['halaman'] = 5;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_c'] = $this->Model_ikt->ambil_sub_ikt_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'c');
		$data['isianBlok5c'] = "";
		foreach ($data['sub_b5_c'] as $item){
			$data['isianBlok5c'].=" ".$this->Model_ikt->isianBlok5($item,"c");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman5');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman5(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman5($sampel,$data);
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
		$data['title'] = "Halaman 6";
		$data['halaman'] = 6;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5_d'] = $this->Model_ikt->ambil_sub_ikt_blok5d($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
		$data['isianBlok5d'] = "";
		foreach ($data['sub_b5_d'] as $item){
			$data['isianBlok5d'].=" ".$this->Model_ikt->isianBlok5d($item,"d");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman6');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman6(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman6($sampel,$data);
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
		$data['title'] = "Halaman 7";
		$data['halaman'] = 7;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
    $data['sub_b6'] = $this->Model_ikt->ambil_sub_ikt_blok6($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
    $data['sub_b7'] = $this->Model_ikt->ambil_sub_ikt_blok7($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
    $data['isianBlok6'] = "";
    $data['isianBlok7'] = "";
		foreach ($data['sub_b6'] as $item){
			$data['isianBlok6'].=" ".$this->Model_ikt->isianBlok6($item,"b6");
		}
		foreach ($data['sub_b7'] as $item){
			$data['isianBlok7'].=" ".$this->Model_ikt->isianBlok7($item,"b7");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman7');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman7(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman7($sampel,$data);
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
		$data['title'] = "Halaman 8";
		$data['halaman'] = 8;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('ikt',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/PerikananTangkap/halaman8');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman8(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('ikt',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_ikt->isi_halaman8($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}
}
