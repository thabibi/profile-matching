<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Rekomendasi_nilai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
            $this->load->model('M_rekomendasi_nilai','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Nav"] = "MASTER";
        $data["Title"] = "REKOMENDASI NILAI";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_rekomendasi_nilai",
            'js' => 'js/js_page_rekomendasi_nilai'
        );
        $data["Breadcrumb"] = array(
            'Rekomendasi Nilai'
        );
        $this->load->view('v_main', $data);
    }

    public function list_data_akademik() {
        header('Content-Type: application/json');
        echo $this->m->list_data_akademik();
    }

    public function list_data_non_akademik() {
        header('Content-Type: application/json');
        echo $this->m->list_data_non_akademik();
    }

    public function simpan() {
        $id = $this->input->post('rekomendasi_nilai_id');
        if($id=="") {
            $data = array(
                'kriteria_id' => $this->input->post('kriteria_id'),
                'subkriteria_id' => $this->input->post('subkriteria_id'),
                'rekomendasi_id' => $this->input->post('rekomendasi_id'),
                'rekomendasi_nilai_bobot' => $this->input->post('rekomendasi_nilai_bobot'),
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
                'kriteria_id' => $this->input->post('kriteria_id'),
                'subkriteria_id' => $this->input->post('subkriteria_id'),
                'rekomendasi_id' => $this->input->post('rekomendasi_id'),
                'rekomendasi_nilai_bobot' => $this->input->post('rekomendasi_nilai_bobot'),
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
            'rekomendasi_nilai_id' => $result->rekomendasi_nilai_id,
            'kriteria_id' => $result->kriteria_id,
            'subkriteria_id' => $result->subkriteria_id,
            'rekomendasi_id' => $result->rekomendasi_id,
            'rekomendasi_nilai_bobot' => $result->rekomendasi_nilai_bobot
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