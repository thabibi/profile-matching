<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Subkriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
            $this->load->model('M_subkriteria','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Nav"] = "MASTER";
        $data["Title"] = "SUBKRITERIA";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_subkriteria",
            'js' => 'js/js_page_subkriteria'
        );
        $data["Breadcrumb"] = array(
            'Subkriteria'
        );
        $this->load->view('v_main', $data);
    }

    public function list_data() {
        header('Content-Type: application/json');
        echo $this->m->list_data();
    }

    public function generate_kode() {
        echo $this->m->generate_kode();
    }

    public function simpan() {
        $id = $this->input->post('subkriteria_id');
        if($id=="") {
            $data = array(
                'kriteria_id' => $this->input->post('kriteria_id'),
                'subkriteria_kode' => $this->input->post('subkriteria_kode'),
                'subkriteria_nama' => $this->input->post('subkriteria_nama'),
                'subkriteria_keterangan' => $this->input->post('subkriteria_keterangan'),
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
                'subkriteria_kode' => $this->input->post('subkriteria_kode'),
                'subkriteria_nama' => $this->input->post('subkriteria_nama'),
                'subkriteria_keterangan' => $this->input->post('subkriteria_keterangan'),
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
            'subkriteria_id' => $result->subkriteria_id,
            'kriteria_id' => $result->kriteria_id,
            'subkriteria_kode' => $result->subkriteria_kode,
            'subkriteria_nama' => $result->subkriteria_nama,
            'subkriteria_keterangan' => $result->subkriteria_keterangan
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