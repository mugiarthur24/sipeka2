<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Unit Organisasi</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addorganisasi"><i class="fa fa-plus-circle"></i> Tambah Data Organisasi</button>
		</div>
	</div>
	<hr/>
	
		<div class="table-responsive">
			<table id="basic-datatables" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<td class="text-center">No</td>
						<td class="text-center">Unit Organisasi</td>
						<td class="text-center">Nomor</td>
						<td class="text-center">Tanggal</td>
						<td class="text-center">Upload</td>
						<td class="text-center">Status</td>
						<td class="text-center" colspan="2">Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php if ($organisasi == TRUE): ?>
						<?php $no = 1 ?>
						<?php foreach ($organisasi as $data): ?>
							<tr>
								<td class=" text-center"><?php echo $no; ?></td>
								<td class=""><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja; ?></td>
								<td class=""><?php echo $data->nomor; ?></td>
								<td class=""><?php echo date('d F Y', strtotime($data->tanggal)); ?></td>
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
									<a href="<?php echo base_url('index.php/admin/pegawai/edit_organisasi/'.$hasil->id_pegawai.'/'.$data->id_organisasi) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
								</td>
								<td class="">
									<a href="<?php echo base_url('index.php/admin/pegawai/delete_organisasi/'.$hasil->id_pegawai.'/'.$data->id_organisasi) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
								</td>
							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td class=" text-center" colspan="7">Belum ada data organisasi</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addorganisasi" tabindex="-1" role="dialog" aria-labelledby="addorganisasi" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addorganisasi">Tambah Data Organisasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/pegawai/create_organisasi/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="text-info" for="id_satuan_kerja">SATUAN KERJA</label>
									<select class="form-control border-dark" name="id_satuan_kerja">
										<?php foreach ($satuankerja as $data): ?>
											<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">					
								<div class="form-group">
									<label class="text-info" for="nomor">NOMOR</label>
									<input type="text" class="form-control border-dark" id="nomor" name="nomor" placeholder="NOMOR" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="text-info" for="tanggal">TANGGAL</label>
									<input type="date" class="form-control border-dark" id="tanggal" name="tanggal" placeholder="TANGGAL" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
										<label class="text-info">Status</label>
										<select name="status" class="form-control border-dark">
											<option value="0">Tidak Aktif</option>
											<option value="1">Aktif</option>
										</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="text-info">Upload SK</label>
									<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="upload" id="uploadBtn">
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