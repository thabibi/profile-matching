<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Nilai_siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
            $this->load->model('M_nilai_siswa','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Nav"] = "MASTER";
        $data["Title"] = "NILAI SISWA";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_nilai_siswa",
            'js' => 'js/js_page_nilai_siswa'
        );
        $data["Breadcrumb"] = array(
            'Nilai Siswa'
        );
        $this->load->view('v_main', $data);
    }

    public function list_data() {
        header('Content-Type: application/json');
        echo $this->m->list_data();
    }

    public function simpan() {
        $id = $this->input->post('nilai_id');
        if($id=="") {
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'subkriteria_id' => $this->input->post('subkriteria_id'),
                'siswa_nilai' => $this->input->post('siswa_nilai'),
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
                'user_id' => $this->input->post('user_id'),
                'subkriteria_id' => $this->input->post('subkriteria_id'),
                'siswa_nilai' => $this->input->post('siswa_nilai'),
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
            'nilai_id' => $result->nilai_id,
            'user_id' => $result->user_id,
            'subkriteria_id' => $result->subkriteria_id,
            'siswa_nilai' => $result->siswa_nilai
        );
        echo json_encode($data);
    }

    public function get_nilai_siswa() {
        $result = $this->m->get_nilai_siswa();
        echo json_encode($result);
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