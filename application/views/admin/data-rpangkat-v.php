<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Riwayat pangkat</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addrpangkat"><i class="icon-plus"></i>&nbsp; Tambah Data Riwayat pangkat</button>
		</div>
	</div>
	<hr/>
	<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover">
		<thead>
			<tr>
				<td class="p-1 text-center">No</td>
				<td class="p-1 text-center">Pangkat</td>
				<td class="p-1 text-center">Upload</td>
				<td class="p-1 text-center">Status</td>
				<td class="p-1 text-center" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($rpangkat == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($rpangkat as $data): ?>
					<tr>
						<td class=" text-center"><?php echo $no; ?></td>
						<td class=""><?php echo @$this->Admin_m->detail_data_order('master_pangkat','id_pangkat',$data->id_pangkat)->nm_pangkat; ?></td>
						<td class=""><?php if ($data->upload == TRUE): ?>
							<a href="<?php echo base_url('asset/dokumen/'.$data->upload) ?>" target="_blank" class="btn btn-danger btn-sm w-100">View</a>
							<?php else: ?>
								tidak ada file
                  			<?php endif ?></td>
							<td class="">
								<?php if ($data->status_pangkat == '0'): ?>
									Tidak Aktif
									<?php else: ?>
									Aktif	
								<?php endif ?>
							</td>
						<td class=" text-center" width="50px">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_rpangkat/'.$hasil->id_pegawai.'/'.$data->id_riwayat_pangkat) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
						</td>
						<td class=" text-center" width="50px">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_rpangkat/'.$hasil->id_pegawai.'/'.$data->id_riwayat_pangkat) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td class=" text-center" colspan="5">Belum ada data Riwayat pangkat</td>
					</tr>
				<?php endif ?>
			</tbody>
		</table>
	</div>
		<!-- Modal -->
		<div class="modal fade" id="addrpangkat" tabindex="-1" role="dialog" aria-labelledby="addrpangkat" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addrpangkat">Tambah Data Riwayat pangkat</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/pegawai/create_rpangkat/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="id_pangkat">PANGKAT</label>
										<select class="form-control border-dark" name="id_pangkat">
											<?php foreach ($pangkat as $data): ?>
												<option value="<?php echo $data->id_pangkat ?>"><?php echo $data->nm_pangkat; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="status">STATUS</label>
										<input type="text" class="form-control border-dark" id="status" name="status" placeholder="STATUS">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="nomor_sk">NOMOR SK</label>
										<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
										<input type="date" class="form-control border-dark" id="tanggal_sk" name="tanggal_sk" placeholder="TANGGAL SK">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="tanggal_mulai">TANGGAL MULAI</label>
										<input type="date" class="form-control border-dark" id="tanggal_mulai" name="tanggal_mulai" placeholder="TANGGAL MULAI">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="tanggal_selesai">TANGGAL SELESAI</label>
										<input type="date" class="form-control border-dark" id="tanggal_selesai" name="tanggal_selesai" placeholder="TANGGAL SELESAI">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="masa_kerja">MASA KERJA</label>
										<input type="text" class="form-control border-dark" id="masa_kerja" name="masa_kerja" placeholder="MASA KERJA">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="masa_kerja_bulan">MASA KERJA BULAN</label>
										<input type="text" class="form-control border-dark" id="masa_kerja_bulan" name="masa_kerja_bulan" placeholder="MASA KERJA BULAN">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info" for="masa_kerja_tahun">MASA KERJA TAHUN</label>
										<input type="text" class="form-control border-dark" id="masa_kerja_tahun" name="masa_kerja_tahun" placeholder="MASA KERJA TAHUN">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="text-info">Status Pangkat</label>
										<select name="status_pangkat" class="form-control border-dark" >
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