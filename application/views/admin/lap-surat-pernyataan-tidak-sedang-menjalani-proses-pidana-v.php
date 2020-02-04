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
				<div class="text-center"><b>SURAT PERNYATAAN</b><br/>
				<b>TIDAK SEDANG MENJALANI PROSES PIDANA ATAU PERNAH DIPIDANA PENJARA BERDASARKAN PUTUSAN PENGADILAN YANG TELAH BERKEKUATAN HUKUM TETAP</b><br/>
				Nomor :
				</div>
				<div style="text-align: left; font-size: 12px">Yang bertanda tangan di bawah ini :</div>
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
				</table>
				<br/>
				<div style="text-align: left; font-size: 12px">Dengan ini menyatakan dengan sesungguhnya, bahwa Pegawai Negeri Sipil :</div>
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
		<br/>
		<div align="text-justify" style="font-size: 12px">Tidak sedang menjalani proses pidana atau pernah pidana penjara berdasarkan putusan pengadilan yang telah berkekuatan hokum tetap karena melakukan tindak pidana kejahatan jabatan atau tindak pidana kejahatan yang ada hubungannya dengan jabatan dan/ atau pidana umum.</div>
		<div align="text-justify" style="font-size: 12px">Demikian surat pernyataan ini saya buat dengan sesungguhnya dengan mengingat sumpah jabatan dan apabila dikemudian hari ternyata isi surat pernyataan ini tidak benar yang mengakibatkan kerugian bagi negara maka saya bersedia menanggung kerugian negara sesuai dengan ketentuan peraturan perundang-undangan.</div>
		
		
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