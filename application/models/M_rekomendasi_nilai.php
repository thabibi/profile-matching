<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_rekomendasi_nilai extends CI_Model {

    protected $kriteria = "ak_data_kriteria";
    protected $subkriteria = "ak_data_subkriteria";
    protected $rekomendasi = "ak_data_rekomendasi";
    protected $rekomendasi_nilai = "ak_data_rekomendasi_nilai";

    public function list_data_akademik() {
        $this->datatables->select('rekomendasi_nilai_id,kriteria_nama,subkriteria_nama,rekomendasi_kode,rekomendasi_nilai_bobot');
        $this->datatables->from($this->rekomendasi_nilai);
        $this->datatables->where($this->rekomendasi_nilai . '.deleted', FALSE);
        $this->datatables->where($this->kriteria . '.kriteria_id', 1);
        $this->datatables->join($this->kriteria,$this->kriteria.'.kriteria_id='.$this->rekomendasi_nilai.'.kriteria_id');
        $this->datatables->join($this->subkriteria,$this->subkriteria.'.subkriteria_id='.$this->rekomendasi_nilai.'.subkriteria_id');
        $this->datatables->join($this->rekomendasi,$this->rekomendasi.'.rekomendasi_id='.$this->rekomendasi_nilai.'.rekomendasi_id');
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','rekomendasi_nilai_id');
        return $this->datatables->generate();
    }

    public function list_data_non_akademik() {
        $this->datatables->select('rekomendasi_nilai_id,kriteria_nama,subkriteria_nama,rekomendasi_kode,rekomendasi_nilai_bobot');
        $this->datatables->from($this->rekomendasi_nilai);
        $this->datatables->where($this->rekomendasi_nilai . '.deleted', FALSE);
        $this->datatables->where($this->kriteria . '.kriteria_id', 2);
        $this->datatables->join($this->kriteria,$this->kriteria.'.kriteria_id='.$this->rekomendasi_nilai.'.kriteria_id');
        $this->datatables->join($this->subkriteria,$this->subkriteria.'.subkriteria_id='.$this->rekomendasi_nilai.'.subkriteria_id');
        $this->datatables->join($this->rekomendasi,$this->rekomendasi.'.rekomendasi_id='.$this->rekomendasi_nilai.'.rekomendasi_id');
        $this->datatables->add_column('view', '<button type="button" id="edit" class="btn btn-warning btn-sm" data="$1">Edit</button>  <button type="button" id="hapus" class="btn btn-danger btn-sm" data="$1">Hapus</button>','rekomendasi_nilai_id');
        return $this->datatables->generate();
    }

    public function simpan($data) {
        return $this->db->insert($this->rekomendasi_nilai,$data);
    }

    public function edit($data) {
        return $this->db->where($this->rekomendasi_nilai.'.rekomendasi_nilai_id',$this->input->post('rekomendasi_nilai_id'))->update($this->rekomendasi_nilai,$data);
    }

    public function get_data() {
        return $this->db->where($this->rekomendasi_nilai.'.rekomendasi_nilai_id',$this->input->post('rekomendasi_nilai_id'))->get($this->rekomendasi_nilai)->row();
    }

    public function options($search) {
        return $this->db->select('rekomendasi_nilai_id as id, rekomendasi_nilai_id as value, rekomendasi_kode as text')->like($this->rekomendasi_nilai.'.rekomendasi_kode',$search,'both')->where($this->rekomendasi_nilai.'.deleted',FALSE)->get($this->rekomendasi)->result();
    }

}