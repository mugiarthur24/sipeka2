<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					Data Honorer <span class="text-secondary">jumlah Honorer Ditemukan <?php echo $jmldata; ?></span>
				</div>
				<div class="col-md-6">
					<div class="btn-group float-right mb-2">
						<button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-plus"></i>Tambah Data Pegawai
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" data-toggle="modal" data-target="#addpegawai">Manual</a>
							<a class="dropdown-item" data-toggle="modal" href="#" data-target="#excel">Mengunakan Excel</a>
						</div>
					</div>
				</div>
			</div>
			<div>
				<form action="<?php echo base_url('index.php/admin/honorer/index/') ?>" method="get">
					<div class="form-group">
						<label> Cari Honorer</label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="string" class="form-control" placeholder="Masukan Nama, NIP Baru atau NIP Lama">
								<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian honorer</small>
							</div>
							<div class="col-md-6">
								<select class="form-control" name="skpd" onchange="this.form.submit()">
									<option value=""> Pilih Lokasi </option>
									<option value=""> Semua Lokasi </option>
									<?php foreach ($skpd as $dtskpd): ?>
										<option value="<?php echo $dtskpd->id_lokasi_kerja ?>"><?php echo $dtskpd->lokasi_kerja; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih Unit Organisasi</small>
							</div>
						</div>
					</div>
				</form>
				<div class="table-responsive">
					<font size="5">
						<table id="add-row" class="display table table-striped table-hover">
							<thead>
								<tr>
									<td class="text-center">No</td>
									<td class="text-center">Nama Honorer</td>
									<td class="text-center">TMT</td>
									<td class="text-center">TAT</td>
									<td class="text-center">Unit Organisasi</td>
									<td colspan="2" class="text-center" style="width: 10%">Aksi</td>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1 ?>
								<?php foreach ($hasil as $data): ?>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td><?php echo strtoupper($data->nama); ?></td>
										<td><?php echo $data->tmt; ?></td>
										<td><?php echo $data->tat; ?></td>
										<td><?php echo @$this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja; ?></td>
										<td class=" text-center">
											<a href="<?php echo base_url('index.php/admin/honorer/edit_honorer/'.$data->id_honorer) ?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
												<i class="fa fa-edit"></i>
											</button></a>
										</td>
										<td class="text-center">
											<a href="<?php echo base_url('index.php/admin/honorer/delete_honorer/'.$data->id_honorer) ?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
												<i class="fa fa-times"></i>
											</button></a>
										</td>
									</tr>
									<?php $no++ ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</font>
				</div>
				<?php echo $pagging; ?>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpegawai" tabindex="-1" role="dialog" aria-labelledby="addpegawaii" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addpegawaii">Tambah Data Honorer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/honorer/create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="nama">Nama Lengkap</label>
								<input type="text" class="form-control border-dark" id="nama" name="nama" placeholder="Nama Lengkap Tanpa Gelar" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control border-dark" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="tanggal_lahir">Tanggal Lahir</label>
								<input type="text" class="form-control border-dark" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="alamat">Alamat</label>
								<input type="text" class="form-control border-dark" id="alamat" name="alamat" placeholder="Alamat" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="pendidikan">Pendidikan</label>
								<input type="text" class="form-control border-dark" id="pendidikan" name="pendidikan" placeholder="Pendidikan" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="jurusan">Jurusan</label>
								<input type="text" class="form-control border-dark" id="jurusan" name="jurusan" placeholder="Jurusan" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="tat">TAT</label>
								<input type="text" class="form-control border-dark" id="tat" name="tat" placeholder="TAT">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="tmt">TMT</label>
								<input type="text" class="form-control border-dark" id="tmt" name="tmt" placeholder="TMT">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="id_lokasi_kerja">Unit Organisasi</label>
								<select class="form-control border-dark" name="id_lokasi_kerja">
									<?php foreach ($skpd as $dtskpd): ?>
										<option value="<?php echo $dtskpd->id_lokasi_kerja ?>"><?php echo $dtskpd->lokasi_kerja; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-info" for="no_hp">Nomor Handphone</label>
								<input type="text" class="form-control border-dark" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
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
<div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?php echo base_url('index.php/admin/honorer/uploadexcel') ?>" enctype="multipart/form-data" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="modal-body">
					<label>Masukan File Excel</label><br/>
					<input type="file" name="fileupload">
					<div class="alert alert-info mt-2">
						Gunakan Format Excel berikut untuk melakukan Upload Massal, Fitur ini hanya suport dengan menggunakan format di bawah ini.<br/>
						<a href="<?php echo base_url('asset/dokumen/format-upload - honorer.xlsx') ?>">Download Template</a>
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" value="submit" class="btn btn-danger">Upload File Excel</button>
				</div>
			</div>
		</form>
	</div>
</div>