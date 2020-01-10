<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12">
				<div class="media-body">
					<h4>Data Eselon</h4>
				</div>
				<div class="media-right">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addmastereselon"><i class="fa fa-plus"></i> Tambah Data </button>
				</div>
			</div>
			<hr/>
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover">
					<tr >
						<td>No</td>
						<td>Nama Eselon</td>
						<td colspan="2" style="width: 10%" class="text-center">Action</td>
					</tr>
					<?php $no=1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data->nama_eselon; ?></td>
							<td><a href="<?php echo base_url('index.php/admin/master/edit/eselon/'.$data->id_eselon) ?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
								<i class="fa fa-edit"></i>
							</button></a></td>
							<td><a href="<?php echo base_url('index.php/admin/master/delete/eselon/'.$data->id_eselon) ?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
								<i class="fa fa-times"></i>
							</button></td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addmastereselon" tabindex="-1" role="dialog" aria-labelledby="addmastereselon" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addmastereselon">Tambah Data Eselon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/master/create_master_eselon') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nama_eselon">NAMA ESELON</label>
								<input type="text" class="form-control border-dark" id="nama_eselon" name="nama_eselon" placeholder="NAMA ESELON" >
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