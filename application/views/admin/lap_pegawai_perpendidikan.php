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
		<table class="w-100" border="1" style="font-size: 13px;">
			<tr>
				<td rowspan="4" class="text-center">No</td>
				<td rowspan="4" class="text-center">Satuan Kerja<br/>Dan/Atau<br/>Kecamatan</td>
				<td colspan="24" class="text-center">PNS</td>
				<td rowspan="4" class="text-center">Jumlah</td>
			</tr>
			<tr>
				<td colspan="3" class="text-center">Golongan I</td>
				<td colspan="7" class="text-center">Golongan II</td>
				<td colspan="7" class="text-center">Golongan III</td>
				<td colspan="7" class="text-center">Golongan IV</td>
			</tr>
			<tr>
				<td colspan="3" class="text-center">Tingkat <br/>Pendidikan</td>
				<td colspan="7" class="text-center">Tingkat <br/>Pendidikan</td>
				<td colspan="7" class="text-center">Tingkat Pendidikan</td>
				<td colspan="7" class="text-center">Tingkat Pendidikan</td>

			</tr>
			<tr>
				<td class="text-center">SD</td>
				<td class="text-center">SMP</td>
				<td class="text-center">SMA</td>
				<td class="text-center">SD</td>
				<td class="text-center">SMP</td>
				<td class="text-center">SMA</td>
				<td class="text-center">D1</td>
				<td class="text-center">D2</td>
				<td class="text-center">D3</td>
				<td class="text-center">S1</td>
				<td class="text-center">SMA</td>
				<td class="text-center">D1</td>
				<td class="text-center">D2</td>
				<td class="text-center">D3</td>
				<td class="text-center">S1</td>
				<td class="text-center" style="font-size: 9px">S1(p)</td>
				<td class="text-center">S2</td>
				<td class="text-center">SMA</td>
				<td class="text-center">D1</td>
				<td class="text-center">D2</td>
				<td class="text-center">D3</td>
				<td class="text-center">S1</td>
				<td class="text-center">S2</td>
				<td class="text-center">S3</td>
			</tr>
			<tr>
				<td class="text-center">1</td>
				<td class="text-center">2</td>
				<td class="text-center">3</td>
				<td class="text-center">4</td>
				<td class="text-center">5</td>
				<td class="text-center">6</td>
				<td class="text-center">7</td>
				<td class="text-center">8</td>
				<td class="text-center">9</td>
				<td class="text-center">10</td>
				<td class="text-center">11</td>
				<td class="text-center">12</td>
				<td class="text-center">13</td>
				<td class="text-center">14</td>
				<td class="text-center">15</td>
				<td class="text-center">16</td>
				<td class="text-center">17</td>
				<td class="text-center">18</td>
				<td class="text-center">19</td>
				<td class="text-center">20</td>
				<td class="text-center">21</td>
				<td class="text-center">22</td>
				<td class="text-center">23</td>
				<td class="text-center">24</td>
				<td class="text-center">25</td>
				<td class="text-center">26</td>
				<td class="text-center">27</td>
			</tr>
			<?php $no = 1 ?>
			<?php foreach ($skpd as $data): ?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td class="text-left"><?php echo $data->nama_satuan_kerja; ?></td>
					<td class="text-center">
						<?php echo $kol1= $this->Pegawai_m->jml_pend($data->id_satuan_kerja,'1','1') ?>
					</td>
					<td class="text-center">
						<?php echo $kol2= $this->Pegawai_m->jml_pend($data->id_satuan_kerja,'1','2') ?>
					</td>
					<td class="text-center">
						<?php echo $kol3= $this->Pegawai_m->jml_pend($data->id_satuan_kerja,'1','3') ?>
					</td>
					<td class="text-center">
						<?php echo $kol4=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','1') ?>
					</td>

					<td class="text-center">
						<?php echo $kol5=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','2') ?>
					</td>
					<td class="text-center">
						<?php echo $kol6=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','3') ?>
					</td>
					<td class="text-center">
						<?php echo $kol7=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','4') ?>
					</td>
					<td class="text-center">
						<?php echo $kol8=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','5') ?>
					</td>
					<td class="text-center">
						<?php echo $kol9=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','6') ?>
					</td>
					<td class="text-center">
						<?php echo $kol10=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'2','8') ?>
					</td>
					
					<td class="text-center">
						<?php echo $kol11=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'3','3') ?>
					</td>
					<td class="text-center">
						<?php echo $kol12=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'3','4') ?>
					</td>
					<td class="text-center">
						<?php echo $kol13=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'3','5') ?>
					</td>
					<td class="text-center">
						<?php echo $kol14=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'3','6') ?>
					</td>
					<td class="text-center">
						<?php echo $kol15=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'3','8') ?>
					</td>
					<td>
						
					</td>
					<td class="text-center">
						<?php echo $kol16=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'3','9') ?>
					</td>

					<td class="text-center">
						<?php echo $kol17=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','3') ?>
					</td>
					<td class="text-center">
						<?php echo $kol18=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','4') ?>
					</td>
					<td class="text-center">
						<?php echo $kol19=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','5') ?>
					</td>
					<td class="text-center">
						<?php echo $kol20=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','6') ?>
					</td>
					<td class="text-center">
						<?php echo $kol21=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','8') ?>
					</td>
					<td class="text-center">
						<?php echo $kol22=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','9') ?>
					</td>
					<td class="text-center">
						<?php echo $kol23=$this->Pegawai_m->jml_pend($data->id_satuan_kerja,'4','10') ?>
					</td>
					<td class="text-center">
						<?php echo $kol1+$kol2+$kol3+$kol4+$kol5+$kol6+$kol7+$kol8+$kol9+$kol10+$kol11+$kol12+$kol13+$kol14+$kol15+$kol16+$kol17+$kol18+$kol19+$kol20+$kol21+$kol22+$kol23; ?>
					</td>
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