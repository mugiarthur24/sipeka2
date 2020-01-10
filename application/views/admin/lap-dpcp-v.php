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
			<div class="col"></div>
			<div class="col text-center" style="margin-top: 15px">
				<table width="100%">
					<tr>
						<td align="text-center"><img src="<?php echo base_url('asset/img/lembaga/logo-garuda-pancasila-gold.jpg') ?>" width="50px" height="50"></td>
					</tr>
					<tr>
						<td>BADAN KEPEGAWAIAN NEGARA</td>
					</tr>
				</table>
			</div>
			<div class="col text-left">
				<table style="font-size: 8px">
					<tr >
						<td>ANAK LAMPIRAN 2</td>
					</tr>
					<tr >
						<td>PERATURAN BADAN KEPEGAWAIAN NEGARA </td>
					</tr>
					<tr >
						<td>REPUBLIK INDONESIA</td>
					</tr>
					<tr >
						<td>NOMOR 2 TAHUN 2018</td>
					</tr>
					<tr >
						<td>TENTANG</td>
					</tr>
					<tr >
						<td>PEDOMAN PEMBERIAN PERTIMBANGAN TEKNIS PENSIUN PEGAWAI NEGERI SIPIL, </td>
					</tr>
					<tr>
						<td>DAN PENSIUN JANDA/DUDA PEGAWAI NEGERI SIPIL</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<table style="font-size: 10px">
					<tr>
						<td>INSTANSI</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>PROVINSI</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>KAB/KOTA</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>UNIT KERJA</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>PEMBAYARAN</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>BUP</td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
			</div>
			<div>
			</div>

		</div>
		<div class="text-center" style="font-size: 12px"><b>DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP) PEGAWAI NEGERI SIPIL YANG MENCAPAI BATAS USIA PENSIUN/YANG AKAN DI BERHENTIKAN/YANG MENINGGAL DUNIA, TEWAS, ATAU HILANG*)</b></div>

		<div class="row">
			<div class="col">
				<table style="font-size: 10px">
					<tr>
						<td>1.</td>
						<td>KETERANGAN PRIBADI</td>
					</tr>
					<tr>
						<td></td>
						<td>A. NAMA</td>
						<td>:</td>
						<td><?php echo $hasil->nama_pegawai; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>B. NIP</td>
						<td>:</td>
						<td><?php echo $hasil->nip; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>C. TEMPAT/TANGGAL LAHIR</td>
						<td>:</td>
						<td><?php echo $hasil->tempat_lahir; ?> / <?php echo $hasil->tanggal_lahir; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>D. JABATAN</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>E. PANGKAT/GOL. RU/TMT</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>F. GAJI POKOK TERAKHIR</td>
						<td>:</td>
						<td>Rp.</td>
					</tr>
					<tr>
						<td></td>
						<td>G. MASA KERJA KP TERAKHIR</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>H. MASA KERJA GOLONGAN</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>I. MASA KERJA PNS</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>J. MASA KERJA PENSIUN</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>K. CLTN</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>L. PENINJAUAN MASA KERJA </td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>M. PENDIDIKAN DASAR PENGANGKATAN PERTAMA </td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="col">
				<table style="font-size: 10px">
					<tr>
						<td>2.</td>
						<td>KETERANGAN KELUARGA</td>
					</tr>
				</table>
				<table style="font-size: 10px">
					<tr>
						<td></td>
						<td colspan="7">A. ISTRI/SUAMI</td>
					</tr>
					<tr>
						<td></td>
						<td>NO.</td>
						<td>NIK</td>
						<td>NAMA</td>
						<td>TGL. LAHIR</td>
						<td>TGL. KAWIN</td>
						<td>TGL. CERAI/MD</td>
						<td>ISTERI KE</td>
					</tr>
				</table>
				<table style="font-size: 10px">
					<tr>
						<td></td>
						<td colspan="6">B. ANAK KANDUNG</td>
					</tr>
					<tr>
						<td></td>
						<td>NO.</td>
						<td>NIK</td>
						<td>NAMA</td>
						<td>TGL. LAHIR</td>
						<td>NAMA AYAH/IBU</td>
						<td>KETERANGAN</td>
					</tr>
				</table>
				<table style="font-size: 10px">
					<tr>
						<td>3.</td>
						<td>ALAMAT SESUDAH PENSIUN</td>
						<td>:</td>
					</tr>
				</table>
				<div style="font-size: 10px">4. DEMIKIAN DPCP INI DI BUAT DENGAN SEBENARNYA DIPERGUNAKAN SEBAGAIMANA MESTINYA</div>
			</div>
		</div>
		<div class="row" style="font-size: 10px;">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col text-center">
				<div class="col">
				<div class="text-center">MENGETAHUI,<br/>
					PEJABAT PENGELOLA KEPEGAWAIAN<br/>
					INSTANSI/UNIT KERJA,
					<br/><br/><br/><br/>
					<u><b>______________</b></u><br/>
					NIP. __________	

				</div>
			</div>
			</div>
			<div class="col">
				<div class="text-center">___________,_______,<br/>
					PEGAWAI NEGERI SIPIL<br/>
					YANG BERSANGKUTAN,
					<br/><br/><br/><br/>
					<u><b>______________</b></u><br/>
					NIP. __________	

				</div>
			</div>
		</div>
	</body>
	</html>