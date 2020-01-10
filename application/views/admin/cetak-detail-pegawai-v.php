<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
	<style type="text/css">
	.colpading{padding: 0px 4px}
	.penuh{width: 100%}
</style>
</head>
<body onload="window:print()">
	<table class="penuh" border="1">
		<tr>
			<td class="colpading text-center bdkiri bdkanan bdatas colpading">
				<img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px">
			</td>
			<td class="colpading bdkanan bdatas colpading text-center">
				<h3 style="margin-bottom: 0px"><?php echo $unit_org->nama_satuan_kerja; ?></h3><br/>
				<span><?php echo $unit_org->alamat; ?></span>
			</td>
		</tr>
	</table>
	<table class="penuh" border="1" style="margin-top: 14px;">
		<tr>
			<td colspan="3" class="colpading bdatas bdkiri bdkanan"><b>Data Diri</b></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Nama Lengkap</td>
			<td class="colpading bdkanan"><?php echo $hasil->gelar_dpn; ?> <?php echo $hasil->nama_pegawai; ?> <?php echo $hasil->gelar_belakang; ?></td>
			<td class="colpading bdkanan text-center" rowspan="4">
				<img src="<?php echo base_url('asset/img/pegawai/'.@$hasil->foto) ?>" width="100px">
			</td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">NIP Lama</td>
			<td class="colpading bdkanan"><?php echo $hasil->nip_lama; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">NIP Baru</td>
			<td class="colpading bdkanan"><?php echo $hasil->nip; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">No Kartu Pegawai</td>
			<td class="colpading bdkanan"><?php echo $hasil->no_kartu_pegawai; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Agama</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $agama->nm_agama; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">TTL</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->tempat_lahir; ?> / <?php echo $hasil->tanggal_lahir; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Nomor Kartu Keluarga</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->nomor_kk; ?> </td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Nomor KTP</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->nomor_ktp; ?> </td>
		</tr>

		<tr>
			<td class="colpading bdkiri bdkanan">Status Pegawai</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $statpeg->nama_status; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Usia</td>
			<td class="colpading bdkanan colspan2" colspan="2"><?php echo $hasil->usia; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Alamat</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->alamat; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Tgl Pengangkatan</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->tanggal_pengangkatan_cpns; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">No NPWP</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->no_npwp; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Lokasi Kerja</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $unit_org->nama_satuan_kerja; ?></td>
		</tr>
		<tr>
			<td class="colpading bdkiri bdkanan">Gaji Pokok</td>
			<td class="colpading bdkanan" colspan="2"><?php echo $hasil->gaji_pokok; ?></td>
		</tr>
	</table>
</td>
</tr>
</table>
<table class="penuh" border="1" style="margin-top: 14px">
	<tr>
		<td colspan="7" class="colpading bdatas bdkiri bdkanan"><b>Data Keluarga</b></td>
	</tr>
	<tr>
		<td class="colpading bdkiri bdkanan">Nama Anggota Keluarga</td>
		<td class="colpading bdkiri bdkanan">Tanggal Lahir</td>
		<td class="colpading bdkiri bdkanan">Hubungan Keluarga</td>
		<td class="colpading bdkiri bdkanan">Status Kawin</td>
		<td class="colpading bdkiri bdkanan">Tanggal Nikah</td>
		<td class="colpading bdkiri bdkanan">Pekerjaan</td>
		<td class="colpading bdkiri bdkanan">No Kartu Suami/Istri</td>

	</tr>
	<?php foreach ($keluarga as $data): ?>
		<tr>
			<td class="colpading bdkanan"><?php echo $data->nama_anggota_keluarga ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal_lahir ?></td>
			<td class="colpading bdkanan"><?php echo $data->status_keluarga ?></td>
			<td class="colpading bdkanan"><?php echo $data->status_kawin ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal_nikah ?></td>
			<td class="colpading bdkanan"><?php echo $data->pekerjaan ?></td>
			<td class="colpading bdkanan"><?php echo $data->no_kartu ?></td>
		</tr>
	<?php endforeach ?>
</table>
<table class="penuh" border="1" style="margin-top: 14px">
	<tr>
		<td colspan="7" class="colpading bdatas bdkiri bdkanan"><b>Data Riwayat Golongan</b></td>
	</tr>
	<tr>
		<td class="colpading bdkiri bdkanan">Golongan</td>
		<td class="colpading bdkiri bdkanan">No SK</td>
		<td class="colpading bdkiri bdkanan">Tgl SK</td>
		<td class="colpading bdkiri bdkanan">TMT Golongan</td>
		<td class="colpading bdkiri bdkanan">No Bkn</td>
		<td class="colpading bdkiri bdkanan">Tanggal Bkn</td>
		<td class="colpading bdkiri bdkanan">Masa Kerja</td>
	</tr>
	<?php foreach ($golongan as $data): ?>
		<tr>
			<td class="colpading bdkanan bdkiri"><?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$data->id_golongan)->golongan; ?></td>
			<td class="colpading bdkanan"><?php echo $data->nomor_sk ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal_sk ?></td>
			<td class="colpading bdkanan"><?php echo $data->tmt_golongan ?></td>
			<td class="colpading bdkanan"><?php echo $data->nomor_bkn ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal_bkn ?></td>
			<td class="colpading bdkanan"><?php echo $data->masa_kerja ?></td>
		</tr>
	<?php endforeach ?>
</table>
<table class="penuh" border="1" style="margin-top: 14px">
	<tr>
		<td colspan="8" class="colpading bdatas bdkiri bdkanan"><b>Data Riwayat Jabatan</b></td>
	</tr>
	<tr>
		<td class="colpading bdkiri bdkanan">Jenis Jabatan</td>
		<td class="colpading bdkiri bdkanan">Nama Jabatan</td>
		<td class="colpading bdkiri bdkanan">Eselon</td>
		<td class="colpading bdkiri bdkanan">No SK</td>
		<td class="colpading bdkiri bdkanan">Tgl SK</td>
		<td class="colpading bdkiri bdkanan">TMT Jabatan</td>
		<td class="colpading bdkiri bdkanan">TMT Pelantikan</td>
		<td class="colpading bdkiri bdkanan">Satuan Kerja</td>		
	</tr>
	<?php foreach ($jabatan as $data): ?>
		<tr>
			<td class="colpading bdkanan bdkiri"><?php echo $this->Admin_m->detail_data_order('master_jenis_jabatan','id_jenis_jabatan',$data->id_jenis_jabatan)->nama_jenis_jabatan; ?></td>
			<td class="colpading bdkanan"><?php echo $data->nm_jabatan ?></td>
			<td class="colpading bdkanan"><?php echo $this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon;?></td>
			<td class="colpading bdkanan"><?php echo $data->nomor_sk ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal_sk_rj ?></td>
			<td class="colpading bdkanan"><?php echo $data->tmt_jabatan_rj ?></td>
			<td class="colpading bdkanan"><?php echo $data->tmt_pelantikan_rj ?></td>
			<td class="colpading bdkanan"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja; ?></td>
		</tr>
	<?php endforeach ?>
</table>
<table class="penuh" border="1" style="margin-top: 14px">
	<tr>
		<td colspan="7" class="colpading bdatas bdkiri bdkanan"><b>Data Riwayat Pendidikan</b></td>
	</tr>
	<tr>
		<td class="colpading bdkiri bdkanan">Tingkat Pendidikan</td>
		<td class="colpading bdkiri bdkanan">Sekolah</td>
		<td class="colpading bdkiri bdkanan">Jurusan</td>
		<td class="colpading bdkiri bdkanan">No Ijazah</td>
		<td class="colpading bdkiri bdkanan">Tgl Ijazah</td>
		<td class="colpading bdkiri bdkanan">Tmpt Sekolah</td>
	</tr>
	<?php foreach ($pendidikan as $data): ?>
		<tr>
			<td class="colpading bdkanan bdkiri"><?php echo $this->Admin_m->detail_data_order('master_pendidikan','id',$data->tingkat_pendidikan)->pendidikan; ?></td>
			<td class="colpading bdkanan"><?php echo $data->sekolah ?></td>
			<td class="colpading bdkanan"><?php echo $data->jurusan ?></td>
			<td class="colpading bdkanan"><?php echo $data->nomor_ijazah ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal_lulus ?></td>
			<td class="colpading bdkanan"><?php echo $data->tempat_sekolah ?></td>
		</tr>
	<?php endforeach ?>
</table>
<table class="penuh" border="1" style="margin-top: 14px">
	<tr>
		<td colspan="6" class="colpading bdatas bdkiri bdkanan"><b>Data Diklat</b></td>
	</tr>
	<tr>
		<td class="colpading bdkiri bdkanan">Uraian</td>
		<td class="colpading bdkiri bdkanan">Lokasi</td>
		<td class="colpading bdkiri bdkanan">Nomor</td>
		<td class="colpading bdkiri bdkanan">Tanggal</td>
		<td class="colpading bdkiri bdkanan">Tahun</td>
	</tr>
	<?php foreach ($pelatihan as $data): ?>
		<tr>
			<td class="colpading bdkanan bdkiri"><?php echo $data->uraian ?></td>
			<td class="colpading bdkanan"><?php echo $data->lokasi ?></td>
			<td class="colpading bdkanan"><?php echo $data->nomor ?></td>
			<td class="colpading bdkanan"><?php echo $data->tanggal ?></td>
			<td class="colpading bdkanan"><?php echo $data->tahun ?></td>
		</tr>
	<?php endforeach ?>
</table>
<table class="penuh" border="1" style="margin-top: 14px">
	<tr>
		<td colspan="2" class="colpading bdatas bdkiri bdkanan"><b>Data Penghargaan</b></td>
	</tr>
	<tr>
		<td class="colpading bdkiri bdkanan">Jenis Penghargaan</td>
		<td class="colpading bdkiri bdkanan">No. Keputusan</td>
	</tr>
	<?php foreach ($penghargaan as $data): ?>
		<tr>
			<td class="colpading bdkanan bdkiri"><?php echo $data->jenis_penghargaan ?></td>
			<td class="colpading bdkanan"><?php echo $data->no_keputusan ?></td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>