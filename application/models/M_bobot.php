<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_bobot extends CI_Model {

    protected $bobot = "ak_data_bobot";

    public function list_data() {
        $this->datatables->select('bobot_id,bobot_selisih,bobot_nilai,bobot_keterangan');
        $this->datatables->from($this->bobot);
        $this->datatables->where($this->bobot . '.deleted', FALSE);
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','bobot_id');
        return $this->datatables->generate();
    }

    public function simpan($data) {
        return $this->db->insert($this->bobot,$data);
    }

    public function edit($data) {
        return $this->db->where($this->bobot.'.bobot_id',$this->input->post('bobot_id'))->update($this->bobot,$data);
    }

    public function get_data() {
        return $this->db->where($this->bobot.'.bobot_id',$this->input->post('bobot_id'))->get($this->bobot)->row();
    }

    public function options($search) {
        return $this->db->select('bobot_id as id, bobot_id as value, bobot_keterangan as text')->like($this->bobot.'.rekomendasi_kode',$search,'both')->where($this->bobot.'.deleted',FALSE)->get($this->rekomendasi)->result();
    }

}