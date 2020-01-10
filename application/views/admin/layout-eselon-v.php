<table class="table">
					<tr>
						<th>No</th>
						<th>Nama Eselon</th>
						<th></th>
					</tr>
					<?php $no = 1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data->nama_eselon; ?></td>
							<td><a href="<?php echo base_url('index.php/admin/export/ex_by_eselon/'.$data->id_eselon) ?>" style="color:green">Export</a></td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</table>