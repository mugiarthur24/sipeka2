<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Seminar/Kursus</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addseminar"><i class="fa fa-plus-circle"></i> Tambah Data Seminar</button>
		</div>
	</div>
	<hr/>
	<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover">
		<thead>
			<tr>
				<td class="text-center">No</td>
				<td class="">Uraian</td>
				<td class="">Lokasi</td>
				<td class="">Tanggal</td>
				<td class="" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($seminar == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($seminar as $data): ?>
					<tr>
						<td class=" text-center"><?php echo $no; ?></td>
						<td class=""><?php echo $data->uraian; ?></td>
						<td class=""><?php echo $data->lokasi; ?></td>
						<td class=""><?php echo date('d F Y', strtotime($data->tanggal)); ?></td></td>
						<td class="">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_seminar/'.$hasil->id_pegawai.'/'.$data->id_seminar) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
						</td>
						<td class="">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_seminar/'.$hasil->id_pegawai.'/'.$data->id_seminar) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class=" text-center" colspan="6">Belum ada data seminar</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
</div>
<!-- Modal -->
<div class="modal fade" id="addseminar" tabindex="-1" role="dialog" aria-labelledby="addseminar" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addseminar">Tambah Data Seminar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_seminar/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="uraian">URAIAN</label>
								<input type="text" class="form-control border-dark" id="uraian" name="uraian" placeholder="URAIAN">
							</div>
							<div class="form-group">
								<label class="text-info" for="lokasi">LOKASI</label>
								<input type="text" class="form-control border-dark" id="lokasi" name="lokasi" placeholder="LOKASI">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal">TANGGAL</label>
								<div class="row">
									<div class="col-md-4">
										<input type="text" class="form-control border-dark" id="tanggal" name="tanggal_hr" placeholder="HH">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control border-dark" id="tanggal" name="tanggal_bln" placeholder="BB">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control border-dark" id="tanggal" name="tanggal_thn" placeholder="TTTT">
									</div>
								</div>
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