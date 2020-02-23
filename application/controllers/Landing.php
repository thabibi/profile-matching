<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if(!$isLogin) {
            $this->load->model('M_Portal','m');
        } else {
            redirect('user/dashboard_master');
        }
    }

    public function index() {
        $data["Title"] = "LANDING PAGE";
        $data["Template"] = "templates/public/";
        $data["Components"] = array(
            'main' => '/v_public',
            'header' => $data['Template'] . "/components/v_header",
            'content' => "v_landing"
        );
        $data['Info'] = $this->m->get_sysinfo();
        $this->load->view('v_main', $data);
    }

}