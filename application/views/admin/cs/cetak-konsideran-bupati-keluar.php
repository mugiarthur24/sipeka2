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
				<table width="100%">
					<tr>
						<td align="text-center"><img src="<?php echo base_url('asset/img/lembaga/logo-garuda-pancasila-gold.jpg') ?>" width="100px" height="100"></td>
					</tr>
					<tr>
						<td><h5>BUPATI BUTON SELATAN</h5></td>
					</tr>
				</table>
			</div>
		</div>
	<div>
		<div class="row">
			<div class="col"></div>
			<div class="col" style="font-size: 12px">
				<p class="">Batauga, <?php echo $hasil->tgl_permohonan; ?><br/>
			</div>
		</div>
		<div class="row">
			<div class="col" style="font-size: 12px">
				<table>
					<tr>
						<td width="50%">Nomor</td>
						<td width="70%">:</td>
					</tr>
					<tr>
						<td>Lampiran</td>
						<td>: 1 (satu) Berkas</td>
					</tr>
					<tr>
						<td>Perihal</td>
						<td>: Persetujuan Pindah</td>
					</tr>
					<tr>
						<td></td>
						<td>: Wilayah Kerja</td>
					</tr>
				</table>
			</div>
			<div class="col" style="font-size: 12px">
				<table>
					<tr>
						<td></td>
						<td>Kepada</td>
					</tr>
					<tr>
						<td align="text-left">Yth.</td>
						<td>Gubernur Sulawesi Tenggara</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					<tr>
					<tr>
						<td></td>
						<td>di -</td>
					<tr>
					<tr>
						<td></td>
						<td>Baubau</td>
					<tr>
				</table>
			</div>
		</div>
			<br/>
			<div class="row">
				<table>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="justify">
							<div align="text-left" style="font-size: 12px">Memperhatikan surat Walikota Baubau Nomor: ____________ tanggal _________ Perihal Persetujuan Pindah Wilayah Kerja dan Surat Permohonan Saudara <b><?php echo strtoupper($hasil->nm_pegawai) ?></b> NIP. <b><?php echo $hasil->nip; ?></b> Tanggal <?php echo $hasil->tgl_permohonan ?> perihal pindah wilayah kerja, maka kami yang bertanda tangan di bawah ini :</div>
								<table style="font-size: 12px" width="100%">
									<tr>
										<td width="25%">Nama</td>
										<td>:</td>
										<td><b><?php echo strtoupper($infopt->nm_bupati); ?></b></td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td>:</td>
										<td><b><?php echo strtoupper($infopt->jab_bupati); ?></b></td>
									</tr>
									<tr>
										<td colspan="3">Dengan ini menyatakan dengan sesungguhnya bahwa Pegawai Negeri Sipil yang tersebut dibawah ini:</td>
										
									</tr>
									<tr>
										<td width="25%">Nama</td>
										<td>:</td>
										<td><b><?php echo strtoupper($hasil->nm_pegawai); ?></b></td>
									</tr>
									<tr>
										<td>NIP</td>
										<td>:</td>
										<td><b><?php echo strtoupper($hasil->nip); ?></b></td>
									</tr>
									<tr>
										<td>Pangkat/gol.Ruang</td>
										<td>:</td>
										<td><b><?php echo $this->Admin_m->detail_data_order('master_pangkat','id_pangkat',$hasil->id_pangkat)->nm_pangkat.', '.$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_golongan)->golongan; ?></b></td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td>:</td>
										<td><b><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil->id_jabatan)->nama_jabatan; ?></b></td>
									</tr>
									<tr>
										<td>Unit Kerja</td>
										<td>:</td>
										<td><b><?php echo $this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$hasil->unit_kerja)->lokasi_kerja; ?></b></td>
									</tr>
									<tr>
										<td>Instansi</td>
										<td>:</td>
										<td><b><?php echo $hasil->instansi; ?></b></td>
									</tr>
								</table>
								
							<div style="font-size: 12px">disetujui untuk pindah wilayah kerja dari Pemerintah Kabupaten Buton Selatan Provinsi Sulawesi Tenggara menjadi Pegawai Negeri Sipil Daerah pada Pemerintah Kota Baubau Provinsi Sulawesi Tenggara, dengan ketentuan bahwa Pegawai Negeri Sipil Daerah yang bersangkutan tetap melaksanakan tugas sehari-hari pada instansi lama sampai dengan adanya penetapan dan atau keputusan pemindahannya pada instansi baru.</div>
							<br/>
							<div style="font-size: 12px">Demikian disampaikan untuk menjadi bahan pertimbangan selanjutnya, atas perhatian dan kerja samanya diucapkan terimakasih.
							</div>
						</td>
					</tr>
				</table>
					
		</div>

				</div>
			</div>
		<div class="row" style="font-size: 12px;">
			<div class="col text-center">

			</div>
			<div class="col">
				<div class="text-center">Mengetahui,<br/>
					<?php echo strtoupper($infopt->jab_bupati); ?>,<br/>
					<br/><br/>
					<u><b><?php echo strtoupper($infopt->nm_bupati); ?></b></u><br/>

				</div>
			</div>
		</div>
		<div class="row" style="font-size: 12px;">
			<div class="col" >
			<p><b>Tembusan disampaikan dengan hormat kepada :</b></p>
			<ol>
				<li>Walikota Baubau di Baubau;</li>
				<li>Kepala Kantor Regional IV BKN Makassar di Makassar;</li>
				<li>Kepala Badan Kepegawaian Daerah Provinsi Sulawesi Tenggara di Kendari;</li>
				<li>Inspektur Kabupaten Buton Selatan di Batauga;</li>
				<li>Kepala Badan Keuangan Daerah Kabupaten Buton Selatan di Batauga;</li>
				<li>Kepala Badan Kepegawaian dan PSDM Kabupaten Buton Selatan di Batauga;</li>
				<li>Kepala Badan Kepegawaian dan PSDM Kota Baubau di Baubau;</li>
				<li>Sdr.<?php echo strtoupper($hasil->nm_pegawai); ?>;</li>
				<li>Arsip.</li>
			</ol>
			</div>
		</div>
		<div style="page-break-after: always;"></div>
	
</div>
</body>
</html>