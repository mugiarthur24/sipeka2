<div class="p-4">
	<div class="row">
		<div class="col">
			<div class="card card-profile">
				<div class="card-header" style="background-image: url(<?php echo base_url('asset/img/blogpost.jpg'); ?>)">
					<div class="profile-picture">
						<div class="avatar avatar-xxl">
							<?php if (!empty($hasil->foto)): ?>
								<img id="preview" class="avatar-img mr-3 rounded-circle" src="<?php echo base_url('asset/img/pegawai/'.$hasil->foto) ?>" alt="<?php echo $hasil->foto ?>">
							<?php else: ?>
								<img id="preview" class="avatar-img mr-3 rounded-circle" src="<?php echo base_url('asset/img/pegawai/avatar.png') ?>" alt="foto kosong">
							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="user-profile text-center">
						<div class="name"><?php echo $hasil->nama_pegawai; ?></div>
						<div class="job">NIP : <?php echo $hasil->nip; ?></div>
						<div class="desc">Status : <?php echo $hasil->nama_status; ?></div>
						<div class="view-profile">
							
						</div>
					</div>
				</div>
				<div class="card-footer">
					<form action="<?php echo base_url('index.php/admin/pegawai/update_foto_pegawai') ?>" method="post" enctype="multipart/form-data">
						<div class="row user-stats text-center">
							<div class="col">
								<div class="title">Pilih File Foto</div>
								<input type="file" name="fotop" id="uploadBtn"></br>
								<input type="hidden" name="id_pegawai" value="<?php echo $hasil->id_pegawai;?>">
								<span>Ukuran File Maks. 2 MB</span>
							</div>
							<div class="col">
								<div class="title">Simpan Perubahan</div>
								<button type="submit" name="submit" value="submit" class="btn btn-danger btn-sm"><i class="icon-check"></i> Simpan</button>
							</div>
							<div class="col">
								<div class="title">Cetak Data Pengawai</div>
								<a href="<?php echo base_url('index.php/admin/pegawai/cetak_data_pegawai/'.$hasil->id_pegawai) ?>" target="_blank" class="btn btn-danger btn-sm"><i class="icon-printer"></i> Cetak Data Pegawai</a>
							</div>
						</div>
					</form>
				</div>
			</div>
				<div class="mt-4">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Navigator Pegawai</div>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center">
							<li class="nav-item">
								<?php if ($titelbag == 'datadiri'): ?>
									<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail/'.$hasil->id_pegawai); ?>"><i class="flaticon-profile "></i>Data Diri</a>
									<?php else: ?>
										<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail/'.$hasil->id_pegawai); ?>"><i class="flaticon-profile text-info"></i>Data Diri</a>
									<?php endif ?>
								</li>
								<li class="nav-item">
									<?php if ($titelbag == 'rgol'): ?>
										<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_rgolongan/'.$hasil->id_pegawai); ?>"><i class="flaticon-interface-6"></i> Riwayat Golongan</a>
										<?php else: ?>
											<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_rgolongan/'.$hasil->id_pegawai); ?>"><i class="flaticon-interface-6 text-info"></i> Riwayat Golongan</a>
										<?php endif ?>
									</li>
									<li class="nav-item">
										<?php if ($titelbag == 'rjab'): ?>
											<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_rjabatan/'.$hasil->id_pegawai); ?>"><i class="flaticon-shapes"></i> Riwayat Jabatan</a>
											<?php else: ?>
												<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_rjabatan/'.$hasil->id_pegawai); ?>"><i class="flaticon-shapes text-info"></i> Riwayat Jabatan</a>
											<?php endif ?>
										</li>
										<li class="nav-item">
											<?php if ($titelbag == 'rpang'): ?>
												<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_rpangkat/'.$hasil->id_pegawai); ?>"><i class="flaticon-agenda"></i> Riwayat Pangkat</a>
												<?php else: ?>
													<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_rpangkat/'.$hasil->id_pegawai); ?>"><i class="flaticon-agenda text-info"></i> Riwayat Pangkat</a>
												<?php endif ?>
											</li>
											<li class="nav-item">
												<?php if ($titelbag == 'eselon'): ?>
													<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_reselon/'.$hasil->id_pegawai); ?>"><i class="flaticon-tool text-info"></i> Riwayat Eselon</a>
													<?php else: ?>
														<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_reselon/'.$hasil->id_pegawai); ?>"><i class="flaticon-tool text-info"></i> Riwayat Eselon</a>
													<?php endif ?>
												</li>
												<li class="nav-item">
													<?php if ($titelbag == 'pendidikan'): ?>
														<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_pendidikan/'.$hasil->id_pegawai); ?>"><i class="flaticon-desk text-info"> </i> Riwayat Pendidikan</a>
														<?php else: ?>
															<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_pendidikan/'.$hasil->id_pegawai); ?>"><i class="flaticon-desk text-info"></i> Riwayat Pendidikan</a>
														<?php endif ?>
													</li>
														<li class="nav-item">
														<?php if ($titelbag == 'diklat'): ?>
															<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_seminar/'.$hasil->id_pegawai); ?>"><i class="flaticon-user-2 text-info"></i> Riwayat Diklat</a>
															<?php else: ?>
																<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_seminar/'.$hasil->id_pegawai); ?>"><i class="flaticon-user-2 text-info"></i> Riwayat Diklat</a>
															<?php endif ?>
														</li>
														<li class="nav-item">
														<?php if ($titelbag == 'penghargaan'): ?>
															<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_penghargaan/'.$hasil->id_pegawai); ?>"><i class="flaticon-star text-info"></i> Riwayat Penghargaan</a>
															<?php else: ?>
																<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_penghargaan/'.$hasil->id_pegawai); ?>"><i class="flaticon-star text-info"></i> Riwayat Penghargaan</a>
															<?php endif ?>
														</li>
														<li class="nav-item">
														<?php if ($titelbag == 'unit'): ?>
															<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_organisasi/'.$hasil->id_pegawai); ?>"><i class="flaticon-diagram text-info"></i>Riwayat ODP</a>
															<?php else: ?>
																<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_organisasi/'.$hasil->id_pegawai); ?>"><i class="flaticon-diagram text-info"></i>Riwayat ODP</a>
															<?php endif ?>
														</li>
														<li class="nav-item">
														<?php if ($titelbag == 'disiplin'): ?>
															<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_hukuman/'.$hasil->id_pegawai); ?>"><i class="flaticon-graph text-info"></i>Riwayat Disiplin</a>
															<?php else: ?>
																<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_hukuman/'.$hasil->id_pegawai); ?>"><i class="flaticon-graph text-info"></i>Riwayat Disiplin</a>
															<?php endif ?>
														</li>
														<li class="nav-item">
														<?php if ($titelbag == 'skp'): ?>
															<a class="nav-link active" href="<?php echo base_url('index.php/admin/pegawai/detail_dp3/'.$hasil->id_pegawai); ?>"><i class="flaticon-price-tag text-info"></i>Riwayat SKP</a>
															<?php else: ?>
																<a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail_dp3/'.$hasil->id_pegawai); ?>"><i class="flaticon-price-tag text-info"></i>Riwayat SKP</a>
															<?php endif ?>
														</li>
													</ul>
						</div>
					</div>
				</div>
				<div class="card mt-4">
					<div class="card-body">
						<?php $this->view($bagian); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.value;
		};
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#uploadBtn").change(function(){
			readURL(this);
		});
	</script>