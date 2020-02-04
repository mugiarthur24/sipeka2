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

<div class="container-fluid">
		<div class="row" style="margin-top: 9px;">
			<div class="col text-center">
				<table width="100%" style="border-bottom:3px solid;">
					<tr height=20px>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
						<td>
							<h5><?php echo strtoupper($infopt->nama_info_pt); ?></h5>
							<div class="text-center">Alamat : <?php echo $infopt->alamat_pt; ?> <?php echo $infopt->kontak_4; ?></div>
							<div class="text-center"><?php echo $infopt->kontak_3; ?></div>
							<h5>BATAUGA</h5>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<h5 class="text-center"><u>DAFTAR RIWAYAT PEKERJAAN</u></h5><br />
				
				<table style="font-size: 12px" width="100%" class="text-left">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $hasil->nama_pegawai; ?></td>
					</tr>
					<tr>
						<td>Nip</td>
						<td>:</td>
						<td><?php echo $hasil->nip; ?></td>
					</tr>
					<tr>
						<td>Pangkat/Gol. Ruang TMT</td>
						<td>:</td>
						<td><?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_pangkat)->uraian.' / ' .@$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_pangkat)->golongan; ?></td>
					</tr>
					<tr>
						<td>Eselon</td>
						<td>:</td>
						<td><?php echo @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$this->Admin_m->detail_data_order('data_riwayat_eselon','id_pegawai',$pegawai->id_pegawai)->id_eselon)->id_eselon; ?></td>
					</tr>
					<tr>
						<td>Status Perkawinan</td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<br/>
		<table width="100%" border="1" class="w-100" style="font-size: 12px" align="center">
			<tr>
				<td rowspan="2" class="text-center">NO</td>
				<td rowspan="2" class="text-center">PANGKAT</td>
				<td rowspan="2" class="text-center">GOLONGAN RUANG PENGGAJIAN</td>
				<td rowspan="2" class="text-center">BERLAKU TERHITUNG MULAI TANGGAL</td>
				<td rowspan="2" class="text-center">GAJI POKOK</td>
				<td colspan="3" class="text-center">SURAT KEPUTUSAN</td>
				<td rowspan="2" class="text-center">KET</td>
			</tr>
			<tr>
				<td>PEJABAT</td>
				<td>NOMOR</td>
				<td>TANGGAL</td>
			</tr>
			<?php $no = 1 ?>
			<?php foreach ($hasil as $data): ?>
			<tr>
				<td class="text-center"><?php echo $no; ?></td>
				<td><?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_pangkat)->uraian.' / ' .@$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_pangkat)->golongan; ?></td>
				<td><?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_pangkat)->uraian.' / ' .@$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_pangkat)->golongan; ?></td>
			</tr>
			<?php $no++ ?>
			<?php endforeach ?>
		</table>
		
		
	</div>
	
	<div class="row" style="margin-top: 14px;">
		<div class="col"></div>
		<div class="col">
			<div style="width: 100%;font-size: 12px; margin-top: 14px;" class="text-center">
				Batauga, <br/>
				Kepala Dinas <br/>

				<br/>
				<br/>
				<br/>
				<b>NIP : </b>
			</div>
		</div>
	</div>

	</body>
</html>