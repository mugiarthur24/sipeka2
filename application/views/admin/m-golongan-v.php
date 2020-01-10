<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12">
				<div class="media-body">
					<h4>Data Master Golongan</h4>
				</div>
				<div class="media-right">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addmastergolongan"><i class="fa fa-plus"></i> Tambah Data </button>
				</div>
			</div>
			<hr/>
			<table id="add-row" class="display table table-striped table-hover table-sm" style="font-size: 13px">
				<tr >
					<td>No</td>
					<td>Golongan</td>
					<td>Uraian</td>
					<td>Level</td>
					<td colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data->golongan; ?></td>
						<td><?php echo $data->uraian; ?></td>
						<td><?php echo $data->level; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/master/edit/golongan/'.$data->id_golongan) ?>">Edit</a></td>
						<td><a href="<?php echo base_url('index.php/admin/master/delete/golongan/'.$data->id_golongan) ?>">Hapus</td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addmastergolongan" tabindex="-1" role="dialog" aria-labelledby="addmastergolongan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmastergolongan">Tambah Data Master Golongan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_golongan') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="golongan">NAMA GOLONGAN</label>
									<input type="text" class="form-control border-dark" id="golongan" name="golongan" placeholder="GOLONGAN" >
								</div>
								<div class="form-group">
									<label class="text-info" for="uraian">URAIAN</label>
									<input type="text" class="form-control border-dark" id="uraian" name="uraian" placeholder="URAIAN" >
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