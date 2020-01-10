<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pegawai_m extends CI_Model
{
	public function jumlah_data($string,$skpd){
		$this->db->from('data_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
			$this->db->or_like('nip',$string);
			$this->db->or_like('nip_lama',$string);
		}
		if (!empty($skpd)) {
			$this->db->where('id_satuan_kerja',$string);
		}
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jml(){
		$this->db->from('data_pegawai');
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function getData($rowno,$rowperpage,$search) {

		$this->db->from('data_pegawai');
		if (!empty($search['string'])) {
			$this->db->like('data_pegawai.nama_pegawai',$search['string']);
			// $this->db->or_like('data_pegawai.nip',$search['string']);
		}
		if (!empty($search['id_satuan_kerja'])) {
			$this->db->where('data_pegawai.id_satuan_kerja',$search['id_satuan_kerja']);
		}
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('data_pegawai.nama_pegawai','asc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,data_pegawai.*,master_status_pegawai.nama_status');
		// echo "<pre>";print_r($search['skpd']);echo "</pre>";exit();
		$this->db->from('data_pegawai');
		if (!empty($search['string'])) {
			$this->db->like('data_pegawai.nama_pegawai',$search['string']);
			// $this->db->or_like('data_pegawai.nip',$search['string']);
		}
		if (!empty($search['id_satuan_kerja'])) {
			$this->db->where('data_pegawai.id_satuan_kerja',$search['id_satuan_kerja']);
		}
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->order_by('data_pegawai.nama_pegawai','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function searcing_data($sampai,$dari,$string,$skpd){
		// $this->db->select('data_pegawai.*,master_golongan');
		// $this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
			$this->db->or_like('data_pegawai.nip',$string);
			$this->db->or_like('nip_lama',$string);
		}
		if (!empty($skpd)) {
			$this->db->where('id_satuan_kerja',$skpd);
		}
		$this->db->order_by('nama_pegawai','asc');
		$query = $this->db->get('data_pegawai',$sampai,$dari);
		return $query->result();
	}
	public function detail_pegawai($id){
		// $this->db->select('data_pegawai.*,master_golongan');
		// $this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->join('master_agama', 'master_agama.id_agama = data_pegawai.agama');
		$this->db->where('id_pegawai',$id);
		$query = $this->db->get('data_pegawai');
		return $query->row();
	}
	public function select_data($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function detail_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->row();
	}
	public function data_keluarga($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_keluarga');
		return $query->result();
	}
	public function data_rgolongan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_golongan');
		return $query->result();
	}
	public function data_rpangkat($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_pangkat');
		return $query->result();
	}
	public function data_reselon($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_eselon');
		return $query->result();
	}
	public function data_rjabatan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->result();
	}
	public function data_pendidikan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_pendidikan');
		return $query->result();
	}
	public function data_pelatihan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_pelatihan');
		return $query->result();
	}
	public function data_penghargaan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_penghargaan');
		return $query->result();
	}
	public function data_seminar($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_seminar');
		return $query->result();
	}
	public function data_organisasi($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_organisasi');
		return $query->result();
	}
	public function get_golongan(){
		$this->db->select('kode');
		$this->db->order_by('kode','desc');
		$this->db->group_by('kode');
		$query = $this->db->get('master_golongan');
		return $query->result();
	}
	public function get_golongan_kode($kode){
		$this->db->where('kode', $kode);
		$this->db->order_by('golongan','asc');
		$query = $this->db->get('master_golongan');
		return $query->result();
	}
	public function data_gaji_pokok($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_gaji_pokok');
		return $query->result();
	}
	public function data_hukuman($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_hukuman');
		return $query->result();
	}
	public function data_dp3($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_dp3');
		return $query->result();
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
	public function jmlpgwskpd($id){
		$this->db->from('data_pegawai');
		$this->db->where('id_satuan_kerja',$id);
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function alljabatan(){
		$this->db->group_by('nm_jabatan');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->result();
	}
	public function jml_pend($skpd,$golongan,$pend){
		$this->db->from('data_pegawai');
		$this->db->where('master_golongan.kode',$golongan);
		$this->db->where('data_pendidikan.tingkat_pendidikan',$pend);
		$this->db->where('data_pegawai.id_satuan_kerja',$skpd);
		$this->db->where('data_riwayat_golongan.status','1');
		$this->db->where('data_pendidikan.id_status','1');
		$this->db->join('data_riwayat_golongan', 'data_riwayat_golongan.id_pegawai = data_pegawai.id_pegawai');
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_riwayat_golongan.id_golongan');
		$this->db->join('data_pendidikan', 'data_pendidikan.id_pegawai = data_pegawai.id_pegawai');
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jml_peg($golongan,$eselon){
		$this->db->from('data_pegawai');
		$this->db->join('data_riwayat_golongan', 'data_riwayat_golongan.id_pegawai = data_pegawai.id_pegawai');
		$this->db->join('data_riwayat_eselon', 'data_riwayat_eselon.id_pegawai = data_pegawai.id_pegawai');
		$this->db->where('data_riwayat_golongan.id_golongan',$golongan);
		$this->db->where('data_riwayat_eselon.id_eselon',$eselon);
		$this->db->where('data_riwayat_golongan.status','1');
		$this->db->where('data_riwayat_eselon.status','1');
		
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jml_peg1($golongan,$eselon){
		// $this->db->from('data_pegawai');
		$this->db->join('data_riwayat_golongan', 'data_riwayat_golongan.id_pegawai = data_pegawai.id_pegawai');
		$this->db->join('data_riwayat_eselon', 'data_riwayat_eselon.id_pegawai = data_pegawai.id_pegawai');
		$this->db->where('data_riwayat_golongan.id_golongan',$golongan);
		$this->db->where('data_riwayat_eselon.id_eselon',$eselon);
		$this->db->where('data_riwayat_golongan.status','1');
		$this->db->where('data_riwayat_eselon.status','1');
		
		$query = $this->db->get('data_pegawai');
		return $query->result();
	}
	public function jml_peg_non($golongan,$jabatan){
		$this->db->from('data_pegawai');
		$this->db->join('data_riwayat_golongan', 'data_riwayat_golongan.id_pegawai = data_pegawai.id_pegawai');
		$this->db->join('data_riwayat_jabatan', 'data_riwayat_jabatan.id_pegawai = data_pegawai.id_pegawai');
		$this->db->where('data_riwayat_golongan.id_golongan',$golongan);
		$this->db->where('data_riwayat_jabatan.nm_jabatan',$jabatan);
		$this->db->where('data_riwayat_golongan.status','1');
		$this->db->where('data_riwayat_jabatan.status','1');
		
		$rs = $this->db->count_all_results();
		return $rs;
	}
}
