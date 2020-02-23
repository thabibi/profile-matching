<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
            $this->load->model('M_project','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Nav"] = "MASTER";
        $data["Title"] = "PROJECT";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_project",
            'js' => 'js/js_page_project'
        );
        $data["Breadcrumb"] = array(
            'Project'
        );
        $this->load->view('v_main', $data);
    }

    public function list_data() {
        header('Content-Type: application/json');
        echo $this->m->list_data();
    }

    public function simpan() {
        $id = $this->input->post('project_id');
        if($id=="") {
            $data = array(
                'project_nama' => strtoupper($this->input->post('project_nama')),
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
                'project_nama' => strtoupper($this->input->post('project_nama')),
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
            'project_id' => $result->project_id,
            'project_nama' => $result->project_nama
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