<table class="table table-bordered table-hover table-responsive">
					<tr>
						<th>No</th>
						<th>Nama Pelatihan</th>
						<th></th>
					</tr>
					<?php $no = 1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data->nama_pelatihan; ?></td>
							<td><a href="<?php echo base_url('index.php/admin/export/ex_by_pelatihan/'.$data->id_pelatihan) ?>" style="color:green">Export</a></td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</table>