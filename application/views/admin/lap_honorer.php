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
				<table style="border-bottom:3px solid;" align="center">
					<tr height=20px>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="80px"></td>
						<td>
							<div class="text-center">PEMERINTAH KABUPATEN BUTON SELATAN</div>
							<h5>BADAN KEPEGAWAIAN DAN PENGEMBANGAN SDM</h5>
							<div class="text-center">Jalan Gajah Mada Nomor .... Kode Pos: 93752</div>
							<div class="text-center"><b>B A T A U G A</b></div>
						</td>
					</tr>
				</table>
				
				<div align="text-center"><b>JUMLAH DATA HONORER / MAGANG</b></div>

			</div>


		<table class="w-100" border="1" style="font-size: 13px;">
				<tr>
					<td class="text-center">No</td>
					<td class="text-center">Nama</td>
					<td class="text-center">Tempat / Tgl Lahir</td>
					<td class="text-center">TMT</td>
					<td class="text-center">TAT</td>
					<td class="text-center">Unit Kerja Induk</td>
				</tr>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($skpd as $data): ?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td class="text-center"><?php echo @$data->nama; ?></td>
						<td class="text-center"><?php echo @$data->tempat_lahir; ?>, <?php echo @$data->tanggal_lahir; ?></td>
						<td class="text-center"><?php echo @$data->tmt; ?></td>
						<td class="text-center"><?php echo @$data->tat; ?></td>
						<td class="text-left"><?php echo $this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja; ?></td>
					</tr>
			
			<?php $no++ ?>
			<?php endforeach ?>
			</table>

	</div>
	<div class="row" style="font-size: 12px;">
			<div class="col text-center">

			</div>
			<div class="col">
				<div class="text-center">Batauga, <?php echo date('d F Y') ?></div><br/>
				<div class="text-center">Mengetahui,<br/>
					Plt. Kepala Badan Kepegawaian dan Pengembangan SDM<br/>
					Kab. Buton Selatan,
					<br/><br/><br/><br/>
					<u><b>LAODE FIRMAN HAMZA, S.Pd., M.M</b></u><br/>
					Pembina, IV/A <br/>
					NIP. 19730108 200502 1 001	

				</div>
			</div>
		</div>
</body>
</html>