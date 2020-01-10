<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mutasi_m extends CI_Model
{
	public function jumlah_data($string,$skpd){
		$this->db->from('honorer');
		if (!empty($string)) {
			$this->db->like('nama',$string);
		}
		if (!empty($skpd)) {
			$this->db->where('id_lokasi_kerja',$string);
		}
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function searcing_data($sampai,$dari,$string,$skpd){
		// $this->db->select('data_pegawai.*,master_golongan');
		
		$this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = honorer.id_lokasi_kerja');
		if (!empty($string)) {
			$this->db->like('honorer.nama',$string);}
		if (!empty($skpd)) {
			$this->db->where('honorer.id_lokasi_kerja',$skpd);
		}
		$this->db->order_by('nama','asc');
		$query = $this->db->get('honorer',$sampai,$dari);
		return $query->result();
	}
	public function lastid(){
		$this->db->order_by('id_pindah_wilayah_kerja_masuk','desc');
		$query = $this->db->get('data_pidah_wilayah_kerja_masuk');
		return $query->row();
	}
	public function lastidpensiun(){
		$this->db->order_by('id_pensiun','desc');
		$query = $this->db->get('data_pensiun');
		return $query->row();
	}
	public function detail_pegawai($id){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->join('master_agama', 'master_agama.id_agama = data_pegawai.agama');
		$this->db->where('id_honorer',$id);
		$query = $this->db->get('data_pegawai');
		return $query->row();
	}
	public function select_data($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function detail_mutasi($id){
		$this->db->where('id_pindah_wilayah_kerja_masuk', $id);
		$query = $this->db->get('data_pidah_wilayah_kerja_masuk');
		return $query->row();
	}
	public function detail_pensiun($id){
		$this->db->where('id_pensiun', $id);
		$query = $this->db->get('data_pensiun');
		return $query->row();
	}
	public function detail_ijinbelajar($id){
		$this->db->where('id_ijin_belajar', $id);
		$query = $this->db->get('data_ijin_belajar');
		return $query->row();
	}
	public function detail_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->row();
	}
	function insert_data($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function update_data($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	public function cari_pegawai($string){
		$this->db->like('nama_pegawai', $string);
		$this->db->limit('5');
		$query = $this->db->get('data_pegawai');
		return $query->result();
	}
	public function last_golongan($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_riwayat_golongan.id_golongan');
		$this->db->order_by('id_riwayat_golongan','desc');
		$query = $this->db->get('data_riwayat_golongan');
		return $query->row();
	}
	public function last_pangkat($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_pangkat', 'master_pangkat.id_pangkat = data_riwayat_pangkat.id_pangkat');
		$this->db->order_by('id_riwayat_pangkat','desc');
		$query = $this->db->get('data_riwayat_pangkat');
		return $query->row();
	}
	public function last_eselon($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_eselon', 'master_eselon.id_eselon = data_riwayat_eselon.id_eselon');
		$this->db->order_by('id_riwayat_eselon','desc');
		$query = $this->db->get('data_riwayat_eselon');
		return $query->row();
	}
	public function last_jabatan($id){
		$this->db->where('id_pegawai',$id);
		// $this->db->join('master_jabatan', 'master_jabatan.id_jabatan = data_riwayat_jabatan.id_jabatan');
		$this->db->order_by('id_riwayat_jabatan','desc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
	public function last_satuan_kerja($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_satuan_kerja', 'master_satuan_kerja.id_satuan_kerja = data_riwayat_jabatan.id_satuan_kerja');
		$this->db->order_by('id_riwayat_jabatan','desc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
	public function get_pwkm(){
		$this->db->join('form_pwkmasuk', 'form_pwkmasuk.id_pegawai = data_pidah_wilayah_kerja_masuk.id_pindah_wilayah_kerja_masuk');
		$this->db->order_by('id_pindah_wilayah_kerja_masuk','desc');
		$query = $this->db->get('data_pidah_wilayah_kerja_masuk');
		return $query->result();
	}
}
