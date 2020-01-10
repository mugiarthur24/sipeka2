<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12">
				<div class="media-body">
					<h4>Laporan Pegawai Per Golongan</h4>
				</div>
				<div>
					<a href="<?php echo base_url('index.php/admin/pegawai/ctk_pegawaipergolongan') ?>" class="btn btn-info" target="_blank">Cetak</a>
				</div>
			</div>
			<hr/>
			<div class="table-responsive">
			<table class="w-100" border="1" style="font-size: 13px;">
			<tr>
				<td rowspan="3" class="text-center">NO</td>
				<td rowspan="3" class="text-center">GOLONGAN</td>
				<td rowspan="3" class="text-center">I</td>
				<td colspan="7" class="text-center">ESELON</td>
				<td colspan="7" class="text-center">NON ESELON</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">II</td>
				<td colspan="2" class="text-center">II</td>
				<td colspan="2" class="text-center">IV</td>
				<td rowspan="2" class="text-center">JUMLAH</td>
				<td colspan="4" class="text-center">TENAGA FUNGSIONAL</td>
				<td rowspan="2" class="text-center">STAF</td>
				<td rowspan="2" class="text-center">JUMLAH</td>
			</tr>
			<tr>
				<td class="text-center">II.a</td>
				<td class="text-center">II.b</td>
				<td class="text-center">III.a</td>
				<td class="text-center">III.b</td>
				<td class="text-center">IV.a</td>
				<td class="text-center">IV.b</td>
				<td class="text-center">GURU/PENGAWAS</td>
				<td class="text-center">KESEHATAN</td>
				<td class="text-center">PENYULUH</td>
				<td class="text-center">JUMLAH</td>
			</tr>
			<tr>
				<td class="text-center">1</td>
				<td class="text-center">2</td>
				<td class="text-center">3</td>
				<td colspan="2" class="text-center">4</td>
				<td colspan="2" class="text-center">5</td>
				<td colspan="2" class="text-center">6</td>
				<td class="text-center">7</td>
				<td colspan="3" class="text-center">8</td>
				<td class="text-center">9</td>
				<td class="text-center">10</td>
				<td class="text-center">11</td>

			</tr>
				<?php $nogol = 1 ?>
				<?php foreach ($golongan as $data): ?>
					<?php 
					$romawi = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
					$getromawi = $romawi[$data->kode];
					 ?>
					<tr>
						<td class="text-center"><?php echo $nogol; ?></td>
						<td class="text-left"><b>GOLONGAN <?php echo $getromawi ?></b></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<?php $getgolbykod = $this->Pegawai_m->get_golongan_kode($data->kode) ?>
					<?php $nosubgol = 1 ?>
					<?php foreach ($getgolbykod as $key): ?>
						<tr>
							<td class="text-center"><?php echo $nosubgol; ?></td>
							<td class="text-left"><?php echo $key->golongan; ?></td>
							<td class="text-center"></td>
							<td class="text-center"><?php echo $ese1 = $this->Pegawai_m->jml_peg($key->id_golongan,'25'); ?></td>
							<td class="text-center"><?php echo $ese2 = $this->Pegawai_m->jml_peg($key->id_golongan,'26'); ?></td>
							<td class="text-center"><?php echo $ese3 = $this->Pegawai_m->jml_peg($key->id_golongan,'27'); ?></td>
							<td class="text-center"><?php echo $ese4 = $this->Pegawai_m->jml_peg($key->id_golongan,'28'); ?></td>
							<td class="text-center"><?php echo $ese5 =$this->Pegawai_m->jml_peg($key->id_golongan,'29'); ?></td>
							<td class="text-center"><?php echo $ese6 =$this->Pegawai_m->jml_peg($key->id_golongan,'30'); ?></td>
							<td class="text-center"><?php echo $ese1+$ese2+$ese3+$ese4+$ese5+$ese6; ?></td>
							<td class="text-center"><?php echo $nonese1 =$this->Pegawai_m->jml_peg_non($key->id_golongan,'GURU/PENGAWAS'); ?></td>
							<td class="text-center"><?php echo $nonese2 =$this->Pegawai_m->jml_peg_non($key->id_golongan,'KESEHATAN'); ?></td>
							<td class="text-center"><?php echo $nonese3 =$this->Pegawai_m->jml_peg_non($key->id_golongan,'PENYULUH'); ?></td>
							<td class="text-center"><?php echo $nonese1+$nonese2+$nonese3; ?></td>
							<td class="text-center"><?php echo $staf =$this->Pegawai_m->jml_peg_non($key->id_golongan,'STAF'); ?></td>
							<td class="text-center"><?php echo $ese1+$ese2+$ese3+$ese4+$ese5+$ese6+$nonese1+$nonese2+$nonese3; ?></td>
						</tr>
						<?php $nosubgol++ ?>
					<?php endforeach ?>
				<tr>
					<td class="text-center"></td>
					<td class="text-center">JUMLAH</td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
				</tr>
				<?php $nogol++ ?>
				<?php endforeach ?>
				
				<tr>
					<td colspan="2" class="text-center">TOTAL GOL. I,II,III DAN IV</td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
				</tr>
		</table>
		</div>
		</div>
	</div>
</div>
