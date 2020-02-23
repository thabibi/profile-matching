<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_rekomendasi extends CI_Model {

    protected $rekomendasi = "ak_data_rekomendasi";

    public function list_data() {
        $this->datatables->select('rekomendasi_id,rekomendasi_kode');
        $this->datatables->from($this->rekomendasi);
        $this->datatables->where($this->rekomendasi . '.deleted', FALSE);
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','rekomendasi_id');
        return $this->datatables->generate();
    }

    public function simpan($data) {
        return $this->db->insert($this->rekomendasi,$data);
    }

    public function edit($data) {
        return $this->db->where($this->rekomendasi.'.rekomendasi_id',$this->input->post('rekomendasi_id'))->update($this->rekomendasi,$data);
    }

    public function get_data() {
        return $this->db->where($this->rekomendasi.'.rekomendasi_id',$this->input->post('rekomendasi_id'))->get($this->rekomendasi)->row();
    }

    public function options($search) {
        return $this->db->select('rekomendasi_id as id, rekomendasi_id as value, rekomendasi_kode as text')->like($this->rekomendasi.'.rekomendasi_kode',$search,'both')->where($this->rekomendasi.'.deleted',FALSE)->get($this->rekomendasi)->result();
    }

}