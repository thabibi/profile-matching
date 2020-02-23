<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_kriteria extends CI_Model {

    protected $kriteria = "ak_data_kriteria";
    protected $project = "ak_data_project";

    public function list_data() {
        $this->datatables->select('kriteria_id,project_nama,kriteria_nama');
        $this->datatables->from($this->kriteria);
        $this->datatables->join($this->project,$this->project.'.project_id='.$this->kriteria.'.project_id');
        $this->datatables->where($this->kriteria . '.deleted', FALSE);
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','kriteria_id');
        return $this->datatables->generate();
    }

    public function simpan($data) {
        return $this->db->insert($this->kriteria,$data);
    }

    public function edit($data) {
        return $this->db->where($this->kriteria.'.kriteria_id',$this->input->post('kriteria_id'))->update($this->kriteria,$data);
    }

    public function get_data() {
        return $this->db->where($this->kriteria.'.kriteria_id',$this->input->post('kriteria_id'))->get($this->kriteria)->row();
    }

    public function options($search) {
        return $this->db->select('kriteria_id as id, kriteria_id as value, kriteria_nama as text')->like($this->kriteria.'.kriteria_nama',$search,'both')->where($this->kriteria.'.deleted',FALSE)->get($this->kriteria)->result();
    }

}