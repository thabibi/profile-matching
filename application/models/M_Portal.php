<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Portal extends CI_Model
{

    protected $user = "ak_data_system_user";
    protected $level = "ak_data_system_level";
    protected $info = "ak_data_system_info";
    protected $instansi = "ak_data_system_instansi";

    public function get_sysinfo()
    {
        return $this->db->get($this->info)->row();
    }

    public function get_instansi()
    {
        return $this->db->get($this->instansi)->row();
    }

    public function cek_validasi()
    {
        $password = $this->db->where('user_login',$this->input->post('user_login'))->get($this->user)->row('user_pass');
        return password_verify($this->input->post('user_pass'), $password);
    }

    public function get_user()
    {
        return $this->db->join($this->level,$this->level . '.level_id=' .$this->user . '.level_id')->where($this->user . '.user_login',$this->input->post('user_login'))->get($this->user)->row();
    }

    public function update_login()
    {
        return $this->db->where('user_login',$this->input->post('user_login'))->update($this->user, array('last_login' => date('Y-m-d H:i:s')));
    }
}
