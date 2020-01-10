 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Model_data extends CI_Model {
  function getData() {
    $query = $this->db->get('master_satuan_kerja');
	return $query->result();
  }
  function data_pegawai($idgol){
  	$this->db->select('data_riwayat_golongan.*,data_pegawai.nip,data_pegawai.nama_pegawai');
  	$this->db->where('data_riwayat_golongan.id_golongan',$idgol);
  	$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = data_riwayat_golongan.id_pegawai');
  	$query = $this->db->get('data_riwayat_golongan');
  	return $query->result();
  }
}
