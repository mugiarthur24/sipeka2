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
		<div class="row" style="margin-top: 6px;">
			<div class="col text-center">
				<table width="100%" style="font-size: 14px">
					<tr>
						<td align="text-center"><img src="<?php echo base_url('asset/img/lembaga/logo-garuda-pancasila-gold.jpg') ?>" width="100px" height="100"></td>
					</tr>
					<tr>
						<td><b>BUPATI BUTON SELATAN<br/>PROVINSI SULAWESI TENGGARA</b></td>
					</tr>
					<tr>
						<td><b>PETIKAN</b><br/><b>KEPUTUSAN BUPATI BUTON SELATAN</b><br/><b>NOMOR : 361 TAHUN 2018</b></td>
					</tr>
					<tr>
						<td><b>TENTANG</b></td>
					</tr>
					<tr>
						<td><b>PEMINDAHAN DAN PENEMPATAN PEGAWAI NEGERI SIPIL</b><br/><b>LINGKUP PEMERINTAH KABUPATEN BUTON SELATAN</b></td>
					</tr>
					<tr>
						<td><b>BUPATI BUTON SELATAN,</b></td>
					</tr>
					
				</table>
			</div>
		</div>
		<div><br/>
			<div class="row">
				<table>
					<tr>
						<td></td>
						<td class="justify">
							<table style="font-size: 12px" width="100%">
								<tr>
									<td>Menimbang</td>
									<td>:</td>
									<td>dst;</td>
								</tr>
								<tr>
									<td>Mengingat</td>
									<td>:</td>
									<td>dst;</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align: center;">M E M U T U S K A N :</td>
								</tr>
								<tr>
									<td width="30%">Menetapkan</td>
									<td>:</td>
									<td></td>
								</tr>
								<tr>
									<td>KESATU</td>
									<td>:</td>
									<td>Memindahkan dan menempatkan Pegawai Negeri Sipil di Lingkup Pemerintah Kabupaten Buton Selatan, nomor urut : 11</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>
										<table style="font-size: 12px" width="100%">
											<tr>
												<td width="25%">Nama</td>
												<td>:</td>
												<td><?php echo strtoupper($hasil->nama_pegawai); ?></td>
											</tr>
											<tr>
												<td>NIP</td>
												<td>:</td>
												<td><?php echo strtoupper($hasil->nip); ?></td>
											</tr>
											<tr>
												<td>Pangkat/Golongan Ruang</td>
												<td>:</td>
												<td><?php echo @$this->Mutasi_m->last_pangkat($hasil->id_pegawai)->nm_pangkat.', '.@$this->Mutasi_m->last_golongan($hasil->id_pegawai)->golongan; ?></td>
											</tr>
											<tr>
												<td>Unit Kerja Lama</td>
												<td>:</td>
												<td><?php echo @$this->Mutasi_m->last_satuan_kerja($hasil->id_pegawai)->nama_satuan_kerja; ?></td>
											</tr>
											<tr>
												<td><b>Baru</b></td>
												<td>:</td>
												<td></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td width="25%">KEDUA</td>
									<td>:</td>
									<td>Segala biaya yang timbul akibat pelaksanaan keputusan ini, dibebankan pada Anggaran Pendapatan dan Belanja Daerah Kabupaten Buton Selatan.</td>
								</tr>
								<tr>
									<td>KETIGA</td>
									<td>:</td>
									<td>Keputusan ini mulai berlaku sejak tanggal ditetapkan, dengan ketentuan bahwa apabila di kemudian hari ternyata terdapat kekeliruan dalam penetapannya, akan diadakan perubahan dan perbaikan sebagaimana mestinya.</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>
										<table>
											<tr>
												<td colspan="2">PETIKAN Keputusan ini disampaikan kepada :</td>
											</tr>
											<tr>
												<td width="5%">1.</td>
												<td>Inspektur Kabupaten Buton Selatan di Batauga;</td>
											</tr>
											<tr>
												<td>2.</td>
												<td>Kepala Badan Keuangan Daerah Kabupaten Buton Selatan di Batauga;</td>
											</tr>
											<tr>
												<td>3.</td>
												<td>Kepala Dinas, Badan, Kantor, Unit Kerja yang terkait Lingkup Pemerintah Kabupaten Buton Selatan di Batauga;</td>
											</tr>
											<tr>
												<td>4.</td>
												<td>Pegawai Negeri Sipil Daerah yang bersangkutan ;</td>
											</tr>
											<tr>
												<td>5.</td>
												<td>A R S I P</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

			</div>

		</div>
	</div>
	<div class="row" style="font-size: 12px;">
		<div class="col text-center">
			<div class="text-center"><i>Petikan sesuai dengan aslinya</i><br/><br/>
				a.n BUPATI BUTON SELATAN<br/>
				SEKRETARIAT DAERAH
				<br/>
				<br/><br/>
				<u><b><?php echo strtoupper($infopt->nm_bupati); ?></b></u><br/>
				Pembina UtamaMuda, IV/c<br/>
				NIP. 19611231 199103 1 053

			</div>
		</div>
		<div class="col">
			<div class="text-center">Ditetapkan di Batauga,<br/>
				Pada Tanggal <br/><br/>
				<?php echo strtoupper($infopt->jab_bupati); ?>,<br/>
				<br/><br/>
				<u><b><?php echo strtoupper($infopt->nm_bupati); ?></b></u><br/>

			</div>
		</div>
	</div>
	<div style="page-break-after: always;"></div>
	
</div>
</body>
</html>