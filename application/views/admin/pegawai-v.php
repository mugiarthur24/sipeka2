<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					Data Pegawai <span class="text-secondary">jumlah Pegawai Ditemukan <?php echo $jmldata; ?></span>
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
				<form action="<?php echo base_url('index.php/admin/pegawai/') ?>" method="post">
					<div class="form-group">
						<label> Cari Pegawai</label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="string" class="form-control" placeholder="Masukan Nama, NIP Baru atau NIP Lama" <?php if (!empty($post['string']) ): ?>
								value="<?php echo $post['string'] ?>"
							<?php endif ?>>
								<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian pegawai</small>
							</div>
							<?php if ($this->ion_auth->in_group('admin')): ?>
								<div class="col-md-6">
									<select class="form-control" name="id_satuan_kerja" onchange="this.form.submit()">
										<?php if (!empty($post['id_satuan_kerja'])): ?>
											<option value="<?php echo $post['id_satuan_kerja'] ?>"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$post['id_satuan_kerja'])->nama_satuan_kerja ?></option>
											<option value="">Semua lokasi</option>
											<?php else: ?>
												<option value="">Semua lokasi</option>
											<?php endif ?>
											<?php foreach ($skpd as $data): ?>
												<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
											<?php endforeach ?>
									</select>
									<small class="form-text text-muted">Pilih Unit Organisasi</small>
								</div>
							<?php endif ?>
						</div>
					</div>
				</form>
				<div class="table-responsive">
					<font size="5">
						<table id="add-row" class="display table table-striped table-hover">
							<thead>
								<tr>
									<td class="text-center">No</td>
									<td class="text-center">Nama Pegawai</td>
									<td class="text-center">NIP</td>
									<td class="text-center">SKPD</td>
									<td class="text-center">Status</td>
									<td class="text-center">Aksi</td>
								</tr>
							</thead>
							<tbody>
								<?php $no = $row+1 ?>
								<?php foreach ($hasil as $data): ?>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class=""><a class="text-info" href="<?php echo base_url('index.php/admin/pegawai/detail/'.$data['id_pegawai']) ?>"><?php echo strtoupper($data['nama_pegawai']); ?></a></td>
										<td class=""><?php echo $data['nip']; ?></td>
										<td><?php echo @$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data['id_satuan_kerja'])->nama_satuan_kerja; ?></td>
										<td class="text-center"><?php echo $data['nama_status']; ?></td>
										<td class="">
											<a href="<?php echo base_url('index.php/admin/pegawai/delete_pegawai/'.$data['id_pegawai']) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30"></a>
										</td>
									</tr>
									<?php $no++ ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</font>
				</div>
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpegawai" tabindex="-1" role="dialog" aria-labelledby="addpegawaii" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="addpegawaii">Tambah Data Pegawai</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nama_pegawai">Gelar Depan</label>
								<input type="text" class="form-control border-dark" id="gelar_dpn" name="gelar_dpn" placeholder="Gelar Depan" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nama_pegawai">Nama Lengkap</label>
								<input type="text" class="form-control border-dark" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Lengkap Tanpa Gelar" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nama_pegawai">Gelar Belakang</label>
								<input type="text" class="form-control border-dark" id="gelar_belakang" name="gelar_belakang" placeholder="Gelar Belakang" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nip">NIP</label>
								<input type="text" class="form-control border-dark" id="nip" name="nip" placeholder="NIP" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nip_lama">NIP Lama</label>
								<input type="text" class="form-control border-dark" id="nip_lama" name="nip_lama" placeholder="NIP Lama">
							</div>
							<div class="form-group">
								<label class="text-info" for="no_kartu_pegawai">Nomor Kartu Pegawai</label>
								<input type="text" class="form-control border-dark" id="no_kartu_pegawai" name="no_kartu_pegawai" placeholder="Nomor Kartu Pegawai">
							</div>
							<div class="form-group">
								<label class="text-info" for="nomor_kk">Nomor Kartu Keluarga</label>
								<input type="text" class="form-control border-dark" id="NO_KK" name="nomor_kk" placeholder="Nomor Kartu Keluarga">
							</div>
							<div class="form-group">
								<label class="text-info" for="no_ktp">Nomor KTP</label>
								<input type="text" class="form-control border-dark" id="nomor_ktp" name="nomor_ktp" placeholder="Nomor KTP">
							</div>
							<div class="form-group">
								<label class="text-info" for="no_npwp">NPWP</label>
								<input type="text" class="form-control border-dark" id="no_npwp" name="no_npwp" placeholder="NPWP">
							</div>
							<div class="form-group">
								<label class="text-info" for="kartu_askes_pegawai">Nomor Kartu Askes Pegawai</label>
								<input type="text" class="form-control border-dark" id="kartu_askes_pegawai" name="kartu_askes_pegawai" placeholder="Nomor Kartu Askes Pegawai">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control border-dark" id="tempat_lahir" name="tempat_lahir" placeholder="Kota Kelahiran/Tempat Lahir">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_lahir">Tanggal Lahir</label>
								<input type="text" class="form-control border-dark" id="tanggal_lahir" name="tanggal_lahir" placeholder="12-01-1993">
							</div>
							<div class="form-group">
								<label class="text-info" for="jenis_kelamin">Jenis Kelamin</label>
								<select class="form-control border-dark" name="jenis_kelamin">
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="agama">Agama</label>
								<select class="form-control border-dark" name="agama">
									<?php foreach ($agama as $data): ?>
										<option value="<?php echo $data->id_agama ?>"><?php echo $data->nm_agama; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="no_hp">Nomor Handphone</label>
								<input type="text" class="form-control border-dark" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
							</div>
							<div class="form-group">
								<label class="text-info" for="email">Email</label>

								<input type="text" class="form-control border-dark" id="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label class="text-info" for="status_pegawai">Status Pegawai</label>
								<select class="form-control border-dark" name="status_pegawai">
									<?php foreach ($status as $data): ?>
										<option value="<?php echo $data->id_status_pegawai ?>"><?php echo $data->nama_status; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="gaji_pokok">Gaji Pokok</label>
								<input type="text" class="form-control border-dark" id="gaji_pokok" name="gaji_pokok" placeholder="Gaji Pokok">
							</div>
							<div class="form-group">
								<label class="text-info" for="skpd">SKPD</label>
								<?php if ($this->ion_auth->in_group('skpd')): ?>
									<input type="hidden" name="skpd" value="<?php echo $users->id_mhs_pt ?>">
									<div class="form-control border-dark"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$users->id_mhs_pt)->nama_satuan_kerja; ?></div>
									<?php else: ?>
										<select class="form-control border-dark" name="skpd">
											<?php foreach ($skpd as $data): ?>
												<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
											<?php endforeach ?>
										</select>
									<?php endif ?>
								</div>
								<div class="form-group">
									<label class="text-info" for="tmt_cpns">Tanggal Pengangkatan CPNS</label>
									<div class="row">
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tanggal_pengangkatan_cpns_hr" placeholder="DD" >
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tanggal_pengangkatan_cpns_bln" placeholder="BB" >
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tanggal_pengangkatan_cpns_thn" placeholder="TTTT" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="text-info" for="id_golongan">Golongan</label>
									<select class="form-control border-dark" name="id_golongan">
										<?php foreach ($golongan as $data): ?>
											<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group">
									<label class="text-info" for="tmt_cpns">TMT CPNS</label>
									<div class="row">
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tmt_cpns_hr" placeholder="DD" >
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tmt_cpns_bln" placeholder="BB" >
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tmt_cpns_thn" placeholder="TTTT" >
										</div>
									</div>
								</div>	
								<div class="form-group">
									<label class="text-info" for="tmt_pns">TMT PNS</label>
									<div class="row">
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tmt_pns_hr" placeholder="DD" >
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tmt_pns_bln" placeholder="BB" >
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control border-dark" name="tmt_pns_thn" placeholder="TTTT" >
										</div>
									</div>
								</div>			
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="text-info" for="alamat">Alamat Pegawai</label>
											<textarea id="alamat" name="alamat" class="form-control border-dark" placeholder="Masukan alamat"></textarea>
										</div>
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
<div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?php echo base_url('index.php/admin/pegawai/uploadexcel') ?>" enctype="multipart/form-data" method="post">
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
						<a href="<?php echo base_url('asset/dokumen/format-upload.xlsx') ?>">Download Template</a>
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