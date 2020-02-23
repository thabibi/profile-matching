<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_siswa extends CI_Model {

    protected $user = "ak_data_system_user";
    protected $level = "ak_data_system_level";

    public function list_data() {
        if($this->session->userdata('level')!="Siswa") :
            $this->datatables->select('user_id,user_kode,user_nama,level_nama,user_login,user_email,user_jurusan,user_tahun_angkatan,user_jenis_kelamin,user_tempat_lahir,user_tanggal_lahir,user_alamat,user_nomor_telepon');
            $this->datatables->from($this->user);
            $this->datatables->join($this->level,$this->level.'.level_id='.$this->user.'.level_id');
            $this->datatables->where($this->user . '.deleted', FALSE);
            $this->datatables->where($this->user . '.level_id', 4);
            $this->datatables->add_column('view', '<button type="button" id="nilai" class="btn btn-success btn-sm" data="$1">Lihat Nilai</button> <button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','user_id');
            return $this->datatables->generate();
        else : 
            $this->datatables->select('user_id,user_kode,user_nama,level_nama,user_login,user_email,user_jurusan,user_tahun_angkatan,user_jenis_kelamin,user_tempat_lahir,user_tanggal_lahir,user_alamat,user_nomor_telepon');
            $this->datatables->from($this->user);
            $this->datatables->join($this->level,$this->level.'.level_id='.$this->user.'.level_id');
            $this->datatables->where($this->user . '.deleted', FALSE);
            $this->datatables->where($this->user . '.user_id', $this->session->userdata('id'));
            $this->datatables->add_column('view', '<button type="button" id="nilai" class="btn btn-success btn-sm" data="$1">Lihat Nilai</button> <button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','user_id');
            return $this->datatables->generate();
        endif;
    }

    public function generate_kode() {
        $total_rows = $this->db->where($this->user.'.deleted',FALSE)->get($this->user)->num_rows();
        return "USR/".date('my').'/'.str_pad($total_rows+1,4,"0",STR_PAD_LEFT);
    }

    public function cek_user() {
        return $this->db->where($this->user.'.user_login',$this->input->post('user_login'))->get($this->user)->num_rows();
    }

    public function get_siswa() {
        return $this->db->where($this->user.'.user_id',$this->session->userdata('id'))->get($this->user)->row();
    }

    public function simpan($data) {
        return $this->db->insert($this->user,$data);
    }

    public function edit($data) {
        return $this->db->where($this->user.'.user_id',$this->input->post('user_id'))->update($this->user,$data);
    }

    public function get_data() {
        return $this->db->where($this->user.'.user_id',$this->input->post('user_id'))->get($this->user)->row();
    }

    public function options($search) {
        return $this->db->select('level_id as id, level_id as value, level_nama as text')->like($this->level.'.level_nama',$search,'both')->where($this->level.'.level_id!=',1)->where($this->level.'.deleted',FALSE)->get($this->level)->result();
    }

    public function options_user($search) {
        return $this->db->select('user_id as id, user_id as value, user_nama as text')->like($this->user.'.user_nama',$search,'both')->where($this->user.'.user_id!=',1)->where($this->user.'.deleted',FALSE)->get($this->user)->result();
    }

}