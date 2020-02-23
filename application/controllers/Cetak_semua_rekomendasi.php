<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cetak_semua_rekomendasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
          $this->load->model('M_faktor','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Title"] = "CETAK REKOMENDASI";
        $data["Rekomendasi"] = $this->m->get_rekomendasi();
        $data["Kriteria"] = $this->m->get_kriteria();
        $data["User"] = $this->m->get_user();
        $this->load->view('v_cetak_semua_rekomendasi', $data);
    }

}