<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cetak_rekomendasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
          $this->load->model('M_siswa','m');
          $this->load->model('M_faktor','n');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Title"] = "CETAK REKOMENDASI";
        $data["Siswa"] = $this->m->get_siswa();
        $data["Rekomendasi"] = $this->n->get_rekomendasi();
        $data["Kriteria"] = $this->n->get_kriteria();
        $data["User"] = $this->n->get_user();
        $this->load->view('v_cetak_rekomendasi', $data);
    }

    public function list_data() {
        header('Content-Type: application/json');
        echo $this->m->list_data();
    }

    public function simpan() {
        $id = $this->input->post('bobot_id');
        if($id=="") {
            $data = array(
                'bobot_selisih' => $this->input->post('bobot_selisih'),
                'bobot_nilai' => $this->input->post('bobot_nilai'),
                'bobot_keterangan' => $this->input->post('bobot_keterangan'),
                'created_by' => $this->session->userdata('nama'),
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->m->simpan($data);
            $pesan = array(
                'kode' => 'success',
                'pesan' => 'Data berhasil di simpan'
            );
        } else {
            $data = array(
                'bobot_selisih' => $this->input->post('bobot_selisih'),
                'bobot_nilai' => $this->input->post('bobot_nilai'),
                'bobot_keterangan' => $this->input->post('bobot_keterangan'),
                'updated_by' => $this->session->userdata('nama'),
                'updated_date' => date('Y-m-d H:i:s')
            );
            $this->m->edit($data);
            $pesan = array(
                'kode' => 'success',
                'pesan' => 'Data berhasil di perbaharui'
            );
        }
        echo json_encode($pesan);
    }

    public function get_data() {
        $result = $this->m->get_data();
        $data = array(
            'bobot_id' => $result->bobot_id,
            'bobot_selisih' => $result->bobot_selisih,
            'bobot_nilai' => $result->bobot_nilai,
            'bobot_keterangan' => $result->bobot_keterangan
        );
        echo json_encode($data);
    }

    public function hapus() {
        $data = array(
            'deleted' => TRUE,
            'updated_by' => $this->session->userdata('nama'),
            'updated_date' => date('Y-m-d H:i:s')
        );
        $this->m->edit($data);
        $pesan = array(
            'kode' => 'success',
            'pesan' => 'Data berhasil di hapus'
        );
        echo json_encode($pesan);
    }

    public function options() {
        $searchTerm = $this->input->get('q');
        $response = $this->m->options($searchTerm);
        echo json_encode($response);
    }

}