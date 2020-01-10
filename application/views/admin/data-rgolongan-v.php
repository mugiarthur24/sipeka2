<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Riwayat Golongan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addrgolongan"><i class="icon-plus"></i>&nbsp; Tambah Data Riwayat Golongan</button>
		</div>
	</div>
	<hr/>
	<div class="table-responsive">
		<table id="add-row" class="display table table-striped table-hover">
			<thead>
				<tr>
					<td class="text-center">No</td>
					<td class="">Gol</td>
					<td width="100">No SK</td>
					<td class="">Tgl SK</td>
					<td class="">Masa Kerja</td>
					<td class="">Upload</td>
					<td class="">Status</td>
					<td class="text-center" colspan="2">Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php if ($rgolongan == TRUE): ?>
					<?php $no = 1 ?>
					<?php foreach ($rgolongan as $data): ?>
						<tr>
							<td class=" text-center"><?php echo $no; ?></td>
							<td class=""><?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$data->id_golongan)->golongan; ?></td>
							<td class=""><?php echo $data->nomor_sk; ?></td>
							<td class=""><?php echo date('d F Y', strtotime($data->tanggal_sk)) ; ?></td>
							<td class=""><?php echo $data->masa_kerja; ?></td>
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
							<td class="">
								<a href="<?php echo base_url('index.php/admin/pegawai/edit_rgolongan/'.$hasil->id_pegawai.'/'.$data->id_riwayat_golongan) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
							</td>
							<td class="">
								<a href="<?php echo base_url('index.php/admin/pegawai/delete_rgolongan/'.$hasil->id_pegawai.'/'.$data->id_riwayat_golongan) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
							</td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td class=" text-center" colspan="10">Belum ada data Riwayat Golongan</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="addrgolongan" tabindex="-1" role="dialog" aria-labelledby="addrgolongan" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addrgolongan">Tambah Data Riwayat Golongan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/pegawai/create_rgolongan/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-info" for="id_golongan">GOLONGAN</label>
										<select class="form-control border-dark" name="id_golongan">
											<?php foreach ($golongan as $data): ?>
												<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label class="text-info" for="nomor_sk">NOMOR SK</label>
										<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK">
									</div>
									<div class="form-group">
										<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
										<input type="date" class="form-control border-dark" id="tanggal_sk" name="tanggal_sk" placeholder="TGL SK">
									</div>
									<div class="form-group">
										<label class="text-info" for="tmt_golongan">TMT GOLONGAN</label>
										<input type="date" class="form-control border-dark" id="tmt_golongan" name="tmt_golongan" placeholder="TMT GOLONGAN">
									</div>
									<div class="form-group">
										<label class="text-info" for="nomor_bkn">NOMOR BKN</label>
										<input type="text" class="form-control border-dark" id="nomor_bkn" name="nomor_bkn" placeholder="NOMOR BKN">
									</div>
									<div class="form-group">
										<label class="text-info" for="tanggal_bkn">TANGGAL BKN</label>
										<input type="date" class="form-control border-dark" id="tanggal_bkn" name="tanggal_bkn" placeholder="TANGGAL BKN">
									</div>
									<div class="form-group">
										<label class="text-info" for="masa_kerja">MASA KERJA</label>
										<input type="text" class="form-control border-dark" id="masa_kerja" name="masa_kerja" placeholder="MASA KERJA">
									</div>
									<div class="form-group">
										<label class="text-info">Status Golongan</label>
										<select name="status" class="form-control border-dark">
											<option value="0">Tidak Aktif</option>
											<option value="1">Aktif</option>
										</select>
									</div>
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