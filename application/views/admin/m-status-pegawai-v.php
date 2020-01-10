<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12">
				<div class="media-body">
					<h4>Data Status Pegawai</h4>
				</div>
				<div class="media-right">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addmasterstatuspegawai"><i class="fa fa-plus"></i> Tambah Data </button>
				</div>
			</div>
			<hr/>
			<table id="add-row" class="display table table-striped table-hover table-sm">
				<tr >
					<td>No</td>
					<td>Nama Status</td>
					<td colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data->nama_status; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/master/edit/status_pegawai/'.$data->id_status_pegawai) ?>">Edit</a></td>
						<td><a href="<?php echo base_url('index.php/admin/master/delete/status_pegawai/'.$data->id_status_pegawai) ?>">Hapus</a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addmasterstatuspegawai" tabindex="-1" role="dialog" aria-labelledby="addmasterstatuspegawai" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addmasterstatuspegawai">Tambah Data Status Pegawai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/master/create_master_status_pegawai') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nama_status">NAMA STATUS</label>
								<input type="text" class="form-control border-dark" id="nama_status" name="nama_status" placeholder="NAMA STATUS" >
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