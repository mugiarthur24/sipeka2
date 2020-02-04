<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12">
				<div class="media-body">
					<h4>Laporan Data Pegawai Per SKPD</h4>
				</div>
				<div>
					<a href="<?php echo base_url('index.php/admin/export/dataexcel') ?>" class="btn btn-info">Cetak Nominatif Pegawai</a>
				</div>
			</div>
			<hr/>
			<div class="table-responsive">
			<table id="add-row" class="display table table-striped table-hover">
				<?php
				$table = '				

				<tr class="table-info">
				<th>No.</th>
				<th>ODP</th>
				<th>Parent Unit</th>
				<th></th>
				</tr>';


				$no = 1;
				foreach ($datas as $d) {
					$table .= '
					<tr>
					<td>'.$no++.'</td>
					<td>'.$d->nama_satuan_kerja.'</td>
					<td>'.$d->parent_unit.'</td>
					<td><a href="'.base_url('index.php/admin/export/ex_by_skpd/').'/'.$d->id_satuan_kerja.'" style="color:green">Cetak (xls)<a/></td>
					</tr>';
				}
				$table .='
				</table>';

				echo $table;
				?>
				
			</table>
		</div>
		</div>
	</div>
</div>
