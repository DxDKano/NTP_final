<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
    private $rowtp=27;
    private $rowtrk=38;
    private $rowikt=64;
    private $rowtpr=37;

  public function __construct() {
		parent::__construct();
		if ($this->session->has_userdata('username')) {
		} else {
			redirect('Login');
		}
	}

  public function coba()
  {
    $data['user']  = $this->Model_login->ambil_user('dhuhal');
    if ($data['user']['level'] == '1') {
      $data['user']['level'] = 'Pengentri';
    } elseif ($data['user']['level'] == '2') {
      $data['user']['level'] = 'Supervisor';
    } elseif ($data['user']['level'] == '4') {
      $data['user']['level'] = 'Web Designer';
    } elseif ($data['user']['level'] == '5') {
      $data['user']['level'] = 'Administrator';
    }
    echo json_encode($data['user']['level']);exit();
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
    $this->load->view('Download/download');
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }

  function getNameColumn($num){
      $numeric = $num % 26;
      $letter = chr(65 + $numeric );
      $num2 = intval($num/26);
      if ($num2 > 0){
          return $this->getNameColumn($num2-1).$letter;
      }else{
          return  $letter;
      }
  }

  public function raw_data()
  {
    // Load plugin PHPExcel nya

    // Load Data tahun dan prov
    $tahun = $this->input->post('tahun_download');
    $subsektor = $this->input->post('subsektor_download');

      $spreadsheet = new Spreadsheet();
      $activeWorksheet = $spreadsheet->getActiveSheet();
      $baris=2;

      $data = array();
      $tmp = array();

    if ($subsektor == "1") {
        $activeWorksheet->setTitle("TP");
        $blok= $this->Model_download->data_tp($tahun);
        $blok3= $this->Model_download->data_tp_blok3($tahun);
        $blok4= $this->Model_download->data_tp_blok4($tahun);
        $blok4f= $this->Model_download->data_tp_blok4f($tahun);
        $blok5= $this->Model_download->data_tp_blok5($tahun);
        $blok6= $this->Model_download->data_tp_blok6($tahun);

        foreach ($blok as $key=>$value){
            $tmp = array(
                "inti"=>$value,
                "blok3"=>$blok3[$key],
                "blok4"=>$blok4[$key],
                "blok4f"=>$blok4f[$key],
                "blok5"=>$blok5[$key],
                "blok6"=>$blok6[$key]
            );
            $data[$key] = $tmp;
        }


        $activeWorksheet->setCellValue('A1' , "NO");
        $kolom = 1;
        $baris=1;
        foreach ($tmp as $key=>$value){//ini blok
            $value2 = $value[0];
            foreach ($value2 as $key3=>$value3) {
                $activeWorksheet->setCellValue($this->getNameColumn($kolom) . $baris, $key3);
                $kolom++;
            }
        }

    }elseif ($subsektor == "3"){//tpr perkebunan
        $activeWorksheet->setTitle("TPR");
        $blok= $this->Model_download->data_tpr($tahun);
        $blok3= $this->Model_download->data_tpr_blok3($tahun);
        $blok4= $this->Model_download->data_tpr_blok4($tahun);
        $blok4f= $this->Model_download->data_tpr_blok4f($tahun);
        $blok5= $this->Model_download->data_tpr_blok5($tahun);
        $blok6= $this->Model_download->data_tpr_blok6($tahun);

        foreach ($blok as $key=>$value){
            $tmp = array(
                "inti"=>$value,
                "blok3"=>$blok3[$key],
                "blok4"=>$blok4[$key],
                "blok4f"=>$blok4f[$key],
                "blok5"=>$blok5[$key],
                "blok6"=>$blok6[$key]
            );
            $data[$key] = $tmp;
        }


        $activeWorksheet->setCellValue('A1' , "NO");
        $kolom = 1;
        $baris=1;
        foreach ($tmp as $key=>$value){//ini blok
            $value2 = $value[0];
            foreach ($value2 as $key3=>$value3) {
                $activeWorksheet->setCellValue($this->getNameColumn($kolom) . $baris, $key3);
                $kolom++;
            }
        }
    }elseif ($subsektor == "4"){//trk peternakan
        $activeWorksheet->setTitle("TRK");
        $blok= $this->Model_download->data_trk($tahun);
        $blok3a= $this->Model_download->data_trk_blok3a($tahun);
        $blok3b= $this->Model_download->data_trk_blok3b($tahun);
        $blok4= $this->Model_download->data_trk_blok4($tahun);
        $blok5= $this->Model_download->data_trk_blok5($tahun);
        $blok6= $this->Model_download->data_trk_blok6($tahun);

        foreach ($blok as $key=>$value){
            $tmp = array(
                "inti"=>$value,
                "blok3a"=>$blok3a[$key],
                "blok3b"=>$blok3b[$key],
                "blok4"=>$blok4[$key],
                "blok5"=>$blok5[$key],
                "blok6"=>$blok6[$key]
            );
            $data[$key] = $tmp;
        }


        $activeWorksheet->setCellValue('A1' , "NO");
        $kolom = 1;
        $baris=1;
        foreach ($tmp as $key=>$value){//ini blok
            $value2 = $value[0];
            foreach ($value2 as $key3=>$value3) {
                $activeWorksheet->setCellValue($this->getNameColumn($kolom) . $baris, $key3);
                $kolom++;
            }
        }
    }elseif ($subsektor == "5"){//ikt ikan tangkap
        $activeWorksheet->setTitle("IKT");
        $blok= $this->Model_download->data_ikt($tahun);
        $blok4= $this->Model_download->data_ikt_blok4($tahun);
        $blok5= $this->Model_download->data_ikt_blok5($tahun);
        $blok5d= $this->Model_download->data_ikt_blok5d($tahun);
        $blok6= $this->Model_download->data_ikt_blok6($tahun);
        $blok7= $this->Model_download->data_ikt_blok7($tahun);

        foreach ($blok as $key=>$value){
            $tmp = array(
                "inti"=>$value,
                "blok4"=>$blok4[$key],
                "blok5"=>$blok5[$key],
                "blok5d"=>$blok5d[$key],
                "blok6"=>$blok6[$key],
                "blok7"=>$blok7[$key]
            );
            $data[$key] = $tmp;
        }


        $activeWorksheet->setCellValue('A1' , "NO");
        $kolom = 1;
        $baris=1;
        foreach ($tmp as $key=>$value){//ini blok
            $value2 = $value[0];
            foreach ($value2 as $key3=>$value3) {
                $activeWorksheet->setCellValue($this->getNameColumn($kolom) . $baris, $key3);
                $kolom++;
            }
        }

    }

      $baris=2;
      $no=1;

      foreach ($data as $item) {//ini kues
          $kolom = 1;
          $barismax=$baris;

          $activeWorksheet->setCellValue("A$baris" , ($no));
          foreach ($item as $key => $value) {//ini blok
              $tmpbaris=$baris;//buat balikin ke baris paling atas di kuesionernya
              foreach ($value as $key2 => $value2) {//ini komoditas
                  $tmpkolom = $kolom;
                  foreach ($value2 as $key3 => $value3) {//ini kolom
                      $activeWorksheet->setCellValueExplicit($this->getNameColumn($tmpkolom) . $tmpbaris, $value3, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

                      $tmpkolom++;
                  }
                  $tmpbaris++;
                  $barismax = $tmpbaris>$barismax?$tmpbaris:$barismax;
              }
              $kolom = $tmpkolom;
          }
          $baris=$barismax;
          $no++;
      }


      //echo json_encode($data);
      $writer = new Xlsx($spreadsheet);
      $name="file/".time().".xlsx";
      $writer->save($name);
      //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      $data = file_get_contents($name);

      $base64 = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' . base64_encode($data);
      echo $base64;

      unlink($name);
  }


}
