<div class="p-4">
	<?php if ($this->ion_auth->is_admin()): ?>
		<div class="card mt-4">
			<div class="card-header"><b>Ferifikasi Pindah Wilayah Kerja Masuk</b></div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						Yakin melakukan ferifikasi pindah wilayah kerja pada pegawai ini?
						Tekan Tombol Ferifikasi berikut ini.
					</div>
					<div class="col">
						<a href="<?php echo base_url('index.php/admin/csmutasi/verifikasi_masuk/'.$hasil->id_pindah_wilayah_kerja_masuk) ?>" class="btn btn-success btn-sm ">Verifikasi Pegawai</a>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
	<div class="card mt-4">
		<div class="card-header">Detail Pindah Wilayah Kerja Masuk</div>
		<div class="card-body">
			<form action="#" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nama Pegawai</label>
								<input type="text" name="nm_pegawai" value="<?php echo $hasil->nm_pegawai ?>" class="form-control border-dark" placeholder="Nama Pegawai">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>NIP</label>
								<input type="text" name="nip" class="form-control border-dark" placeholder="NIP Pegawai" value="<?php echo $hasil->nip ?>">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Instansi</label>
								<input type="text" name="instansi" class="form-control border-dark" placeholder="Nama Instansi" value="<?php echo $hasil->instansi ?>">
								<small class="form-text text-muted">Hanya dapat menggunakan angka huruf</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tanggal Masuk Pegawai</label>
								<input type="text" id="datepicker1" name="tgl_masuk" class="form-control border-dark" placeholder="Tanggal Masuk" value="<?php echo $hasil->tgl_masuk ?>">
								<small class="form-text text-muted">Isi dengan tanggal masuk pertama kali pada instansi sebelumnya.</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Instansi Lama</label>
								<input type="text" name="instansi_lama" class="form-control border-dark" placeholder="Nama Instansi Lama" value="<?php echo $hasil->instansi_lama ?>">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Instansi Baru</label>
								<input type="text" name="instansi_baru" class="form-control border-dark" placeholder="Nama Pegawai" value="<?php echo $hasil->instansi_baru ?>">
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Pangkat</label>
								<select class="form-control border-dark" name="id_pangkat">
									<option value="<?php echo $hasil->id_pangkat ?>">--<?php echo $this->Admin_m->detail_data_order('master_pangkat','id_pangkat',$hasil->id_pangkat)->nm_pangkat; ?>--</option>
									<?php foreach ($pangkat as $data): ?>
										<option value="<?php echo $data->id_pangkat ?>"><?php echo $data->nm_pangkat; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Golongan</label>
								<select class="form-control border-dark" name="id_golongan">
									<option value="<?php echo $hasil->id_golongan ?>">--<?php echo $this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil->id_golongan)->golongan; ?>--</option>
									<?php foreach ($golongan as $data): ?>
										<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Jabatan</label>
								<select class="form-control border-dark" name="id_jabatan">
									<option value="<?php echo $hasil->id_golongan ?>">--<?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil->id_jabatan)->nama_jabatan; ?>--</option>
									<?php foreach ($jabatan as $data): ?>
										<option value="<?php echo $data->id_jabatan ?>"><?php echo $data->nama_jabatan; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tanggal Permohonan Pindah</label>
								<input type="text" name="tgl_permohonan" class="form-control border-dark" placeholder="Tanggal Masuk" value="<?php echo $hasil->tgl_permohonan ?>">
								<small class="form-text text-muted">Isi dengan tanggal saat melakukan permohonan pindah</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Pejabat</label>
								<input type="text" name="pejabat" class="form-control border-dark" placeholder="Pejabat" value="<?php echo $hasil->pejabat ?>">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Alamat Ibu Kota</label>
								<textarea class="form-control border-dark" name="alamat_ibu_kota" placeholder="Masukan Alamat Ibu Kota"><?php echo $hasil->alamat_ibu_kota; ?></textarea>
								<small class="form-text text-muted">Hanya dapat menggunakan angka dna huruf</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tembusan 1</label>
								<input type="text" name="tembusan_1" class="form-control border-dark" placeholder="Tembusan 1" value="<?php echo $hasil->tembusan_1 ?>">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Tembusan 2</label>
								<input type="text" name="tembusan_2" class="form-control border-dark" placeholder="Tembusan 2" value="<?php echo $hasil->tembusan_2 ?>">
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Tembusan 3</label>
								<input type="text" name="tembusan_3" class="form-control border-dark" placeholder="Tembusan 3" value="<?php echo $hasil->tembusan_3 ?>">
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Unit Kerja</label>
								<select class="form-control border-dark" name="unit_kerja">
									<option value="<?php echo $hasil->unit_kerja ?>">--<?php echo $this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$hasil->unit_kerja)->lokasi_kerja; ?>--</option>
									<?php foreach ($skpd as $dtskpd): ?>
										<option value="<?php echo $dtskpd->id_lokasi_kerja ?>"><?php echo $dtskpd->lokasi_kerja; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control border-dark" name="ket" placeholder="Masukan Keterangan"><?php echo $hasil->ket; ?></textarea>
								<small class="form-text text-muted"></small>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<form action="<?php echo base_url('index.php/admin/csmutasi/cpwk_masuk2/'.@$hasil->no_reg_pindah) ?>" method="post" enctype="multipart/form-data">
	<div class="mt-4">
		<div class="card">
			<div class="card-header">
				<b class="text-primary">Form Upload Dokumen</b>
			</div>
			<div class="card-body">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Persyaratan</th>
							<th scope="col">Upload File</th>
							<th scope="col">View</th>
							<th scope="col">Status Doc</th>
							<th scope="col">Ket</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Surat Permohonan (Di Disposisi Bupati)</td>
							<td>
								<input type="file" name="upload_1">
							</td>
							<td>
								<?php if (@$formupload->upload_1 == TRUE): ?>
									<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_1) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
									<?php else: ?>
										<span class="btn btn-secondary btn-sm w-100">View</span>
									<?php endif ?>
							</td>
							<td>
								<?php if (@$formupload->verifikasi_1 == TRUE && @$formupload->verifikasi_1 !==0): ?>
								<?php $veri1 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_1); ?>
								<span class="<?php echo $veri1->kode_status; ?>"><?php echo $veri1->nm_status; ?></span>
								<?php else: ?>
								<span class="danger">tidak ada file</span>
								<?php endif ?>
								</td>
								<td><?php echo @$formupload->ket_1; ?></td>
								</tr>
						<tr>
							<th scope="row">2</th>
							<td>Foto Copy Kartu Pegawai (Legalisir)</td>
							<td><input type="file" name="upload_2"></td>
							<td>
								<?php if (@$formupload->upload_2 == TRUE): ?>
									<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_2) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
									<?php else: ?>
										<span class="btn btn-secondary btn-sm w-100">View</span>
									<?php endif ?>
								</td>
								<td>
									<?php if (@$formupload->verifikasi_2 == TRUE && @$formupload->verifikasi_2 !==0): ?>
										<?php $veri2 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_2); ?>
										<span class="<?php echo $veri2->kode_status; ?>"><?php echo $veri2->nm_status; ?></span>
										<?php else: ?>
											<span class="danger">tidak ada file</span>
										<?php endif ?>
									</td>
									<td><?php echo @$formupload->ket_2; ?></td>
								</tr>
						<tr>
									<th scope="row">3</th>
									<td>Foto Copy SK PNS 80% (Legalisir)</td>
									<td><input type="file" name="upload_3"></td>
									<td>
										<?php if (@$formupload->upload_3 == TRUE): ?>
											<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_3) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
											<?php else: ?>
												<span class="btn btn-secondary btn-sm w-100">View</span>
											<?php endif ?>
										</td>
										<td>
											<?php if (@$formupload->verifikasi_3 == TRUE && @$formupload->verifikasi_3 !==0): ?>
												<?php $veri3 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_3); ?>
												<span class="<?php echo $veri3->kode_status; ?>"><?php echo $veri3->nm_status; ?></span>
												<?php else: ?>
													<span class="danger">tidak ada file</span>
												<?php endif ?>
											</td>
											<td><?php echo @$formupload->ket_3; ?></td>
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>Foto Copy SK PNS 100% (Legalisir)</td>
											<td><input type="file" name="upload_4"></td>
											<td>
												<?php if (@$formupload->upload_4== TRUE): ?>
													<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_4) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
													<?php else: ?>
														<span class="btn btn-secondary btn-sm w-100">View</span>
													<?php endif ?>
												</td>
												<td>
													<?php if (@$formupload->verifikasi_4 == TRUE && @$formupload->verifikasi_4 !==0): ?>
														<?php $veri4 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_4); ?>
														<span class="<?php echo $veri4->kode_status; ?>"><?php echo $veri4->nm_status; ?></span>
														<?php else: ?>
															<span class="danger">tidak ada file</span>
														<?php endif ?>
													</td>
													<td><?php echo @$formupload->ket_4; ?></td>
												</tr>
												<tr>
													<th scope="row">5</th>
													<td>Foto Copy SK Pangkat Terakhir (Legalisir)</td>
													<td><input type="file" name="upload_5"></td>
													<td>
														<?php if (@$formupload->upload_5 == TRUE): ?>
															<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_5) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
															<?php else: ?>
																<span class="btn btn-secondary btn-sm w-100">View</span>
															<?php endif ?>
														</td>
														<td>
															<?php if (@$formupload->verifikasi_5 == TRUE && @$formupload->verifikasi_5 !==0): ?>
																<?php $veri5 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_5); ?>
																<span class="<?php echo $veri5->kode_status; ?>"><?php echo $veri5->nm_status; ?></span>
																<?php else: ?>
																	<span class="danger">tidak ada file</span>
																<?php endif ?>
															</td>
															<td><?php echo @$formupload->ket_5; ?></td>
														</tr>

														<tr>
															<th scope="row">6</th>
															<td>Foto Copy SK Pelantikan Di Legalisir (Legalisir)</td>
															<td><input type="file" name="upload_6"></td>
															<td>
																<?php if (@$formupload->upload_6 == TRUE): ?>
																	<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_6) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
																	<?php else: ?>
																		<span class="btn btn-secondary btn-sm w-100">View</span>
																	<?php endif ?>
																</td>
																<td>
																	<?php if (@$formupload->verifikasi_6 == TRUE && @$formupload->verifikasi_6 !==0): ?>
																		<?php $veri6 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_6); ?>
																		<span class="<?php echo $veri5->kode_status; ?>"><?php echo $veri6->nm_status; ?></span>
																		<?php else: ?>
																			<span class="danger">tidak ada file</span>
																		<?php endif ?>
																	</td>
																	<td><?php echo @$formupload->ket_6; ?></td>
																</tr>

																<tr>
															<th scope="row">7</th>
															<td>SKP Asli 2 Tahun Terakhir</td>
															<td><input type="file" name="upload_7"></td>
															<td>
																<?php if (@$formupload->upload_7 == TRUE): ?>
																	<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_7) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
																	<?php else: ?>
																		<span class="btn btn-secondary btn-sm w-100">View</span>
																	<?php endif ?>
																</td>
																<td>
																	<?php if (@$formupload->verifikasi_7 == TRUE && @$formupload->verifikasi_7 !==0): ?>
																		<?php $veri7 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_7); ?>
																		<span class="<?php echo $veri5->kode_status; ?>"><?php echo $veri7->nm_status; ?></span>
																		<?php else: ?>
																			<span class="danger">tidak ada file</span>
																		<?php endif ?>
																	</td>
																	<td><?php echo @$formupload->ket_7; ?></td>
																</tr>

																<tr>
															<th scope="row">8</th>
															<td>Foto Copy Ijazah Terakhir (Legalisir)</td>
															<td><input type="file" name="upload_8"></td>
															<td>
																<?php if (@$formupload->upload_8 == TRUE): ?>
																	<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_8) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
																	<?php else: ?>
																		<span class="btn btn-secondary btn-sm w-100">View</span>
																	<?php endif ?>
																</td>
																<td>
																	<?php if (@$formupload->verifikasi_8 == TRUE && @$formupload->verifikasi_8 !==0): ?>
																		<?php $veri8 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_8); ?>
																		<span class="<?php echo $veri5->kode_status; ?>"><?php echo $veri8->nm_status; ?></span>
																		<?php else: ?>
																			<span class="danger">tidak ada file</span>
																		<?php endif ?>
																	</td>
																	<td><?php echo @$formupload->ket_8; ?></td>
																</tr>

																<tr>
															<th scope="row">9</th>
															<td>Foto Copy SK Tugas Suami/Istri yang Dilegalisir (Kalau Ada)</td>
															<td><input type="file" name="upload_9"></td>
															<td>
																<?php if (@$formupload->upload_9 == TRUE): ?>
																	<a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_9) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
																	<?php else: ?>
																		<span class="btn btn-secondary btn-sm w-100">View</span>
																	<?php endif ?>
																</td>
																<td>
																	<?php if (@$formupload->verifikasi_9 == TRUE && @$formupload->verifikasi_9 !==0): ?>
																		<?php $veri9 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_9); ?>
																		<span class="<?php echo $veri5->kode_status; ?>"><?php echo $veri9->nm_status; ?></span>
																		<?php else: ?>
																			<span class="danger">tidak ada file</span>
																		<?php endif ?>
																	</td>
																	<td><?php echo @$formupload->ket_9; ?></td>
																</tr>


															</tbody>
														</table>
														<button type="submit" value="submit" name="submit" class="btn btn-danger float-right mt-2">Upload Dokumen</button>
													</form>
												</div>
											</div>
										</div>
									</div>