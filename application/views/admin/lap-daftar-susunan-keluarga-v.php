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
		
		<div class="row">
			<div class="col text-center">
				<div class="text-center"><b>DAFTAR SUSUNAN KELUARGA</b><br/>
				</div>
				
				<table style="font-size: 12px" width="100%" class="text-left">
					<tr>
						<td>NAMA</td>
						<td>:</td>
						<td><?php echo $hasil->nama_pegawai; ?></td>
					</tr>
					<tr>
						<td>NIP</td>
						<td>:</td>
						<td><?php echo $hasil->nip; ?></td>
					</tr>
					<tr>
						<td>PANGKAT/GOLONGAN RUANG</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>JABATAN</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>NO. SERI KARPEG</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>ALAMAT SEKARANG</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>ALAMAT SESUDAH PENSIUN</td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
				<br/>
				
				<table style="font-size: 12px" width="100%" class="text-left">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Nip</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pangkat/Gol. Ruang</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Unit Kerja</td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
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