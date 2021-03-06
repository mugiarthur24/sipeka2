<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Riwayat eselon</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addreselon"><i class="icon-plus"></i>&nbsp; Tambah Data Riwayat Eselon</button>
		</div>
	</div>
	<hr/>
	<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover">
		<thead>
			<tr>
				<td class="p-1 text-center">No</td>
				<td class="p-1 text-center">Eselon</td>
				<td class="p-1 text-center">No SK</td>
				<td class="p-1 text-center">Upload</td>
				<td class="p-1 text-center">Status</td>
				<td class="p-1 text-center" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($reselon == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($reselon as $data): ?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td class=""><?php echo @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon; ?></td>
						<td class=""><?php echo $data->nomor_sk; ?></td>
						<td class=""><?php if ($data->upload == TRUE): ?>
							<a href="<?php echo base_url('asset/dokumen/'.$data->upload) ?>" target="_blank" class="btn btn-danger btn-sm w-100">View</a>
							<?php else: ?>
								tidak ada file
                  			<?php endif ?></td>
							<td class="">
								<?php if ($data->status == '0'): ?>
									Tidak Aktif
									<?php else: ?>
									Aktif	
								<?php endif ?>
							</td>
						<td class="text-center" width="30px">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_reselon/'.$hasil->id_pegawai.'/'.$data->id_riwayat_eselon) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
						</td>
						<td class="text-center" width="30px">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_reselon/'.$hasil->id_pegawai.'/'.$data->id_riwayat_eselon) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td class="p-1 text-center" colspan="6">Belum ada data Riwayat eselon</td>
					</tr>
				<?php endif ?>
			</tbody>
		</table>
	</div>
		<!-- Modal -->
		<div class="modal fade" id="addreselon" tabindex="-1" role="dialog" aria-labelledby="addreselon" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addreselon">Tambah Data Riwayat eselon</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/pegawai/create_reselon/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="text-info" for="id_eselon">Eselon</label>
										<select class="form-control border-dark" name="id_eselon">
											<?php foreach ($eselon as $data): ?>
												<option value="<?php echo $data->id_eselon ?>"><?php echo $data->nama_eselon; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="id_jenis_jabatan">JENIS JABATAN</label>
										<select class="form-control border-dark" name="id_jenis_jabatan">
											<?php foreach ($jnsjabatan as $data): ?>
												<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-info" for="nm_jabatan">NAMA JABATAN</label>
										<input type="text" class="form-control border-dark" id="nm_jabatan" name="nm_jabatan" placeholder="NAMA JABATAN">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="nomor_sk">NOMOR SK</label>
										<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info">Status</label>
										<select name="status" class="form-control border-dark">
											<option value="0">Tidak Aktif</option>
											<option value="1">Aktif</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info">Upload SK</label>
										<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="upload" id="uploadBtn">
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
	</div >