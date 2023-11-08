<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
    $this->load->view('Beranda/beranda');
    $this->load->view('Layout/footer');
    $this->load->view('Layout/bottom');
  }

  public function log_out() {
	    $this->session->sess_destroy();
	    redirect('Login');
	}
}
