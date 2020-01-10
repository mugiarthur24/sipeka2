<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12">
				<div class="media-body">
					<h4>Data Master Jabatan</h4>
				</div>
				<div class="media-right">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addmasterjabatan"><i class="fa fa-plus"></i> Tambah Data </button>
				</div>
			</div>
			<hr/>
			<table class="display table table-striped table-hover table-sm" style="font-size: 13px">
				<tr >
					<td>No</td>
					<td>Nama Jabatan</td>
					<td>Level</td>
					<td colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data->nama_jabatan; ?></td>
						<td><?php echo $data->level; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/master/edit/jabatan/'.$data->id_jabatan) ?>">Edit</a></td>
						<td><a href="<?php echo base_url('index.php/admin/master/delete/jabatan/'.$data->id_jabatan) ?>">Hapus</td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addmasterjabatan" tabindex="-1" role="dialog" aria-labelledby="addmasterjabatan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmasterjabatan">Tambah Data Master Pelatihan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_jabatan') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="nama_jabatan">NAMA JABATAN</label>
									<input type="text" class="form-control border-dark" id="nama_jabatan" name="nama_jabatan" placeholder="NAMA JABATAN" >
								</div>
								<div class="form-group">
									<label class="text-info" for="level">LEVEL</label>
									<input type="text" class="form-control border-dark" id="level" name="level" placeholder="LEVEL" >
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>