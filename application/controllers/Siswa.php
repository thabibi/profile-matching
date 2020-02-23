<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
            $this->load->model('M_siswa','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Nav"] = "MASTER";
        $data["Title"] = "SISWA";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_siswa",
            'js' => 'js/js_page_siswa'
        );
        $data["Breadcrumb"] = array(
            'Master',
            'User'
        );
        if($this->session->userdata('level')=="Siswa") :
            $data["Siswa"] = $this->m->get_siswa();
        endif;
        $this->load->view('v_main', $data);
    }

    public function list_data() {
        header('Content-Type: application/json');
        echo $this->m->list_data();
    }

    public function simpan() {
        $id = $this->input->post('user_id');
        if($id=="") {
            if($this->m->cek_user($id)==0) :
                $data = array(
                    'level_id' => 4,
                    'user_kode' => $this->m->generate_kode(),
                    'user_nama' => $this->input->post('user_nama'),
                    'user_login' => $this->input->post('user_login'),
                    'user_pass' => password_hash($this->input->post('user_login'), PASSWORD_BCRYPT),
                    'user_jurusan' => $this->input->post('user_jurusan'),
                    'user_tahun_angkatan' => $this->input->post('user_tahun_angkatan'),
                    'user_jenis_kelamin' => $this->input->post('user_jenis_kelamin'),
                    'user_tempat_lahir' => $this->input->post('user_tempat_lahir'),
                    'user_tanggal_lahir' => $this->input->post('user_tanggal_lahir'),
                    'user_alamat' => $this->input->post('user_alamat'),
                    'user_nomor_telepon' => $this->input->post('user_nomor_telepon'),
                    'user_email' => $this->input->post('user_email'),
                    'created_by' => $this->session->userdata('nama'),
                    'created_date' => date('Y-m-d H:i:s')
                );
                $this->m->simpan($data);
                $pesan = array(
                    'kode' => 'success',
                    'pesan' => 'Data berhasil di simpan'
                );
            else :
                $pesan = array(
                    'kode' => 'error',
                    'pesan' => 'Data nis tersebut sudah terdaftar!'
                );
            endif;
        } else {
            $data = array(
                'level_id' => 4,
                'user_nama' => $this->input->post('user_nama'),
                'user_login' => $this->input->post('user_login'),
                'user_pass' => password_hash($this->input->post('user_login'), PASSWORD_BCRYPT),
                'user_jurusan' => $this->input->post('user_jurusan'),
                'user_tahun_angkatan' => $this->input->post('user_tahun_angkatan'),
                'user_jenis_kelamin' => $this->input->post('user_jenis_kelamin'),
                'user_tempat_lahir' => $this->input->post('user_tempat_lahir'),
                'user_tanggal_lahir' => $this->input->post('user_tanggal_lahir'),
                'user_alamat' => $this->input->post('user_alamat'),
                'user_nomor_telepon' => $this->input->post('user_nomor_telepon'),
                'user_email' => $this->input->post('user_email'),
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
            'user_id' => $result->user_id,
            'level_id' => $result->level_id,
            'user_kode' => $result->user_kode,
            'user_nama' => $result->user_nama,
            'user_login' => $result->user_login,
            'user_jurusan' => $result->user_jurusan,
            'user_tahun_angkatan' => $result->user_tahun_angkatan,
            'user_jenis_kelamin' => $result->user_jenis_kelamin,
            'user_tempat_lahir' => $result->user_tempat_lahir,
            'user_tanggal_lahir' => $result->user_tanggal_lahir,
            'user_alamat' => $result->user_alamat,
            'user_nomor_telepon' => $result->user_nomor_telepon,
            'user_email' => $result->user_email
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

    public function options_user() {
        $searchTerm = $this->input->get('q');
        $response = $this->m->options_user($searchTerm);
        echo json_encode($response);
    }

}