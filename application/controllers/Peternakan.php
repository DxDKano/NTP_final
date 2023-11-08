<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peternakan extends CI_Controller {

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
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
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
		$this->load->view('Kuesioner/Peternakan/tabs');
		$this->load->view('Kuesioner/Peternakan/halaman1');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman1(){
		$data = json_decode(file_get_contents("php://input"));
		$this->Model_trk->isi_halaman1($data);

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
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b3_a'] = $this->Model_trk->ambil_sub_trk_blok3a($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
		$data['isianBlok3a'] = "";
		foreach ($data['sub_b3_a'] as $item){
			$data['isianBlok3a'].=" ".$this->Model_trk->isianBlok3a($item,"a");
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
		$this->load->view('Kuesioner/Peternakan/halaman2');
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
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman2($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}
	public function ambilKodePengeluaranKomoditas($kelompok){
		$post = $this->input->post();
		echo json_encode(array(
			"ok"=>true,
			"data"=>array(
				array(
					"nama"=>"Bibit Padi",
					"satuan"=>"Ikat",
					"kode"=>"2101001"
				),
				array(
					"nama"=>"Benih Padi",
					"satuan"=>"Kg",
					"kode"=>"2101002"
				),

			)
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
		$data['title'] = "Halaman 3";
		$data['halaman'] = 3;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b3_b'] = $this->Model_trk->ambil_sub_trk_blok3b($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
    $data['isianBlok3b'] = "";
		foreach ($data['sub_b3_b'] as $item){
			$data['isianBlok3b'].=" ".$this->Model_trk->isianBlok3b($item,"b");
    }
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		$data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(4,'510');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Peternakan/halaman3');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman3(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman3($sampel,$data);
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
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_a1'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'a1');
    $data['sub_b4_a2'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'a2');
		$data['sub_b4_b1'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'b1');
		$data['isianBlok4a1'] = "";
    $data['isianBlok4a2'] = "";
		$data['isianBlok4b1'] = "";
		foreach ($data['sub_b4_a1'] as $item){
			$data['isianBlok4a1'].=" ".$this->Model_trk->isianBlok4($item,"a1");
		}
    foreach ($data['sub_b4_a2'] as $item){
			$data['isianBlok4a2'].=" ".$this->Model_trk->isianBlok4($item,"a2");
		}
		foreach ($data['sub_b4_b1'] as $item){
			$data['isianBlok4b1'].=" ".$this->Model_trk->isianBlok4($item,"b1");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		// $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		// $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Peternakan/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman4(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman4($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));exit();
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
		$data['halaman'] = '5';
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b4_b2'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'b2');
    $data['sub_b4_c'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'c');
		$data['isianBlok4b2'] = "";
    $data['isianBlok4c'] = "";
		foreach ($data['sub_b4_b2'] as $item){
			$data['isianBlok4b2'].=" ".$this->Model_trk->isianBlok4($item,"b2");
		}
    foreach ($data['sub_b4_c'] as $item){
			$data['isianBlok4c'].=" ".$this->Model_trk->isianBlok4($item,"c");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		// $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		// $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Peternakan/halaman'.$data['halaman']);
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman5(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman5($sampel,$data);
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
    $data['halaman'] = '6';
    $data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
    $data['sub_b4_d'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'d');
    $data['sub_b4_e'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'e');
    $data['isianBlok4d'] = "";
    $data['isianBlok4e'] = "";
    foreach ($data['sub_b4_d'] as $item){
      $data['isianBlok4d'].=" ".$this->Model_trk->isianBlok4($item,"d");
    }
    foreach ($data['sub_b4_e'] as $item){
      $data['isianBlok4e'].=" ".$this->Model_trk->isianBlok4($item,"e");
    }
    $data['get'] = $get;
    $data['id_prov'] = $_SESSION['kode_prov'];
    $data['id_kab'] = $_SESSION['kode_kab'];
    $data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
    $data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
    $data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
    // $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
    // $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
    $this->load->view('Layout/top');
    $this->load->view('Layout/header', $data);
    $this->load->view('Layout/sidebar', $data);
    // $this->load->view('Layout/settings');
    $this->load->view('Kuesioner/Peternakan/halaman'.$data['halaman']);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }

  public function submithalaman6(){
    $get = $this->input->get();
    $data = json_decode(file_get_contents("php://input"));
    $sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

    $this->Model_trk->isi_halaman6($sampel,$data);
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
    $data['halaman'] = '7';
    $data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
    $data['sub_b4_f'] = $this->Model_trk->ambil_sub_trk_blok4($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor'],'f');
    $data['isianBlok4f'] = "";
    foreach ($data['sub_b4_f'] as $item){
      $data['isianBlok4f'].=" ".$this->Model_trk->isianBlok4($item,"f");
    }
    $data['get'] = $get;
    $data['id_prov'] = $_SESSION['kode_prov'];
    $data['id_kab'] = $_SESSION['kode_kab'];
    $data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
    $data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
    $data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
    // $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
    // $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
    $this->load->view('Layout/top');
    $this->load->view('Layout/header', $data);
    $this->load->view('Layout/sidebar', $data);
    // $this->load->view('Layout/settings');
    $this->load->view('Kuesioner/Peternakan/halaman'.$data['halaman']);
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }

  public function submithalaman7(){
    $get = $this->input->get();
    $data = json_decode(file_get_contents("php://input"));
    $sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

    $this->Model_trk->isi_halaman7($sampel,$data);
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
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b5'] = $this->Model_trk->ambil_sub_trk_blok5($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
		$data['isianBlok5'] = "";
		foreach ($data['sub_b5'] as $item){
			$data['isianBlok5'].=" ".$this->Model_trk->isianBlok5($item,"b5");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		// $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		// $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Peternakan/halaman8');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman8(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman8($sampel,$data);
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
		$data['title'] = "Halaman 9";
		$data['halaman'] = 9;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['sub_b6'] = $this->Model_trk->ambil_sub_trk_blok6($get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta'],$data['sub']['subsektor']);
		$data['isianBlok6'] = "";
		foreach ($data['sub_b6'] as $item){
			$data['isianBlok6'].=" ".$this->Model_trk->isianBlok6($item,"b6");
		}
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		// $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		// $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Peternakan/halaman9');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman9(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman9($sampel,$data);
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
		$data['title'] = "Halaman 7";
		$data['halaman'] = 7;
		$data['sub'] = $this->Model_kuesioner->ambil_sub('trk',$get['tahun'],$get['id_prov'],$get['id_kab'],$get['id_kec'],$get['id_desa'],$get['no_ruta']);
		$data['get'] = $get;
		$data['id_prov'] = $_SESSION['kode_prov'];
		$data['id_kab'] = $_SESSION['kode_kab'];
		$data['kabupaten'] = $this->Model_kuesioner->ambil_kabupaten($data['id_prov'], $data['id_kab'])[0];
		$data['kecamatan'] = $this->Model_kuesioner->ambil_kecamatan($data['id_prov'], $data['id_kab']);
		$data['subsektor'] = $this->Model_kuesioner->ambil_subsektor();
		// $data['komoditas_a'] = $this->Model_kuesioner->ambil_komoditas(1,'2101');
		// $data['komoditas_b'] = $this->Model_kuesioner->ambil_komoditas(1,'2102');
		$this->load->view('Layout/top');
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		// $this->load->view('Layout/settings');
		$this->load->view('Kuesioner/Peternakan/halaman10');
		$this->load->view('Layout/footer');
		$this->load->view('Layout/bottom');
	}

	public function submithalaman10(){
		$get = $this->input->get();
		$data = json_decode(file_get_contents("php://input"));
		$sampel = $this->Model_kuesioner->ambil_sub('trk',$data->tahun,$data->id_prov,$data->id_kab,$data->id_kec,$data->id_desa,$data->no_ruta);

		$this->Model_trk->isi_halaman10($sampel,$data);
		echo json_encode(array(
			"ok"=>true,
			"data"=>$data
		));
	}
}
