<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_nilai_siswa extends CI_Model {

    protected $siswa_nilai = "ak_data_siswa_nilai";
    protected $subkriteria = "ak_data_subkriteria";
    protected $user = "ak_data_system_user";

    public function list_data() {
        if($this->session->userdata('level')!="Siswa") :
            $this->datatables->select('nilai_id,user_nama,subkriteria_nama,siswa_nilai');
            $this->datatables->from($this->siswa_nilai);
            $this->datatables->where($this->siswa_nilai . '.deleted', FALSE);
            $this->datatables->join($this->user,$this->user . '.user_id='. $this->siswa_nilai.'.user_id');
            $this->datatables->join($this->subkriteria,$this->subkriteria . '.subkriteria_id='. $this->siswa_nilai.'.subkriteria_id');
            $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','nilai_id');
            return $this->datatables->generate();
        else :
            $this->datatables->select('nilai_id,user_nama,subkriteria_nama,siswa_nilai');
            $this->datatables->from($this->siswa_nilai);
            $this->datatables->where($this->siswa_nilai . '.deleted', FALSE);
            $this->datatables->where($this->user . '.user_id', $this->session->userdata('id'));
            $this->datatables->join($this->user,$this->user . '.user_id='. $this->siswa_nilai.'.user_id');
            $this->datatables->join($this->subkriteria,$this->subkriteria . '.subkriteria_id='. $this->siswa_nilai.'.subkriteria_id');
            $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','nilai_id');
            return $this->datatables->generate();
        endif;
    }

    public function simpan($data) {
        return $this->db->insert($this->siswa_nilai,$data);
    }

    public function edit($data) {
        return $this->db->where($this->siswa_nilai.'.nilai_id',$this->input->post('nilai_id'))->update($this->siswa_nilai,$data);
    }

    public function get_data() {
        return $this->db->join($this->subkriteria,$this->subkriteria . '.subkriteria_id='. $this->siswa_nilai.'.subkriteria_id')->where($this->siswa_nilai.'.nilai_id',$this->input->post('nilai_id'))->get($this->siswa_nilai)->row();
    }

    public function get_nilai_siswa() {
        return $this->db->join($this->subkriteria,$this->subkriteria . '.subkriteria_id='. $this->siswa_nilai.'.subkriteria_id')->where($this->siswa_nilai.'.user_id',$this->input->post('user_id'))->get($this->siswa_nilai)->result();
    }

    public function options($search) {
        return $this->db->select('nilai_id as id, nilai_id as value, bobot_keterangan as text')->like($this->siswa_nilai.'.rekomendasi_kode',$search,'both')->where($this->siswa_nilai.'.deleted',FALSE)->get($this->rekomendasi)->result();
    }

}