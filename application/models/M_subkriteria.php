<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_subkriteria extends CI_Model {

    protected $subkriteria = "ak_data_subkriteria";
    protected $kriteria = "ak_data_kriteria";

    public function list_data() {
        $this->datatables->select('subkriteria_id,kriteria_nama,subkriteria_kode,subkriteria_nama,subkriteria_keterangan');
        $this->datatables->from($this->subkriteria);
        $this->datatables->join($this->kriteria,$this->kriteria.'.kriteria_id='.$this->subkriteria.'.kriteria_id');
        $this->datatables->where($this->subkriteria . '.deleted', FALSE);
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','subkriteria_id');
        return $this->datatables->generate();
    }

    public function generate_kode() {
        $total_rows = $this->db->where($this->subkriteria.'.deleted',FALSE)->get($this->subkriteria)->num_rows();
        return "SK-".str_pad($total_rows+1,2,"0",STR_PAD_LEFT);
    }

    public function simpan($data) {
        return $this->db->insert($this->subkriteria,$data);
    }

    public function edit($data) {
        return $this->db->where($this->subkriteria.'.subkriteria_id',$this->input->post('subkriteria_id'))->update($this->subkriteria,$data);
    }

    public function get_data() {
        return $this->db->where($this->subkriteria.'.subkriteria_id',$this->input->post('subkriteria_id'))->get($this->subkriteria)->row();
    }

    public function options($search) {
        return $this->db->select('subkriteria_id as id, subkriteria_id as value, subkriteria_nama as text')->like($this->subkriteria.'.subkriteria_nama',$search,'both')->where($this->subkriteria.'.deleted',FALSE)->get($this->subkriteria)->result();
    }

}