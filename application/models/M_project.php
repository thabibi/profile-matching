<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_project extends CI_Model {

    protected $project = "ak_data_project";

    public function list_data() {
        $this->datatables->select('project_id,project_nama');
        $this->datatables->from($this->project);
        $this->datatables->where($this->project . '.deleted', FALSE);
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','project_id');
        return $this->datatables->generate();
    }

    public function simpan($data) {
        return $this->db->insert($this->project,$data);
    }

    public function edit($data) {
        return $this->db->where($this->project.'.project_id',$this->input->post('project_id'))->update($this->project,$data);
    }

    public function get_data() {
        return $this->db->where($this->project.'.project_id',$this->input->post('project_id'))->get($this->project)->row();
    }

    public function options($search) {
        return $this->db->select('project_id as id, project_id as value, project_nama as text')->like($this->project.'.project_nama',$search,'both')->where($this->project.'.deleted',FALSE)->get($this->project)->result();
    }

}