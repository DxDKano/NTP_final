<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index() {
    if($this->session->username!=NULL){
      redirect('Beranda');
    } else {
      $this->load->view('Login/login');
    }
  }

  public function log_in() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    if ($username != '' || $password != '') {
      // echo json_encode($username);
      // echo json_encode($password);exit();
      $pengguna = $this->Model_login->ambil_pengguna($username);
      // echo json_encode($pengguna);exit();
      if($password == $pengguna['password']) {
        //set session
        $data_sess = array(
          'username' => $pengguna['username'],
          'kode_prov' => $pengguna['id_prov'],
          'kode_kab' => $pengguna['id_kab'],
          'tipe_pengguna' => $pengguna['level']
        );
        $this->session->set_userdata($data_sess);
        redirect('Beranda');
      } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show text-center">Maaf, username atau password tidak valid!</div>');
        redirect('Login');
      }
    } else {
      $this->session->set_flashdata('error', '<div><p style="color: #ff3232">Maaf, username atau password tidak valid!</p></div>');
      redirect('Login');
    }
  }
}
