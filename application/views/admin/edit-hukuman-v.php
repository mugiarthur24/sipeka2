<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_hukuman/'.$hasil->id_pegawai.'/'.$detail->id_hukuman) ?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="col-md-12">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="uraian">URAIAN</label>
								<input type="text" class="form-control border-dark" id="uraian" name="uraian" placeholder="URAIAN" value="<?php echo $detail->uraian?>">
							</div>
							<div class="form-group">
								<label class="text-info" for="nomor_sk">NOMOR SK</label>
								<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK" value="<?php echo $detail->nomor_sk?>">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
								<input type="date" class="form-control border-dark" id="tanggal_sk" name="tanggal_sk" placeholder="TANGGAL SK" value="<?php echo $detail->tanggal_sk?>">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_mulai">TANGGAL MULAI</label>
								<input type="date" class="form-control border-dark" id="tanggal_mulai" name="tanggal_mulai" placeholder="TANGGAL MULAI" value="<?php echo $detail->tanggal_mulai?>">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_selesai">TANGGAL SELESAI</label>
								<input type="date" class="form-control border-dark" id="tanggal_selesai" name="tanggal_selesai" placeholder="TANGGAL SELESAI" value="<?php echo $detail->tanggal_selesai?>">
							</div>
							<div class="form-group">
								<label class="text-info" for="no_sk_pembatalan">NOMOR SK PEMBATALAN</label>
								<input type="text" class="form-control border-dark" id="no_sk_pembatalan" name="no_sk_pembatalan" placeholder="NOMOR SK PEMBATALAN" value="<?php echo $detail->no_sk_pembatalan?>">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-8">
										<input type="file" name="upload">
									</div>
									<div class="col-md-4">
										<?php if (@$detail->upload == TRUE): ?>
											<a href="<?php echo base_url('asset/dokumen/'.$detail->upload) ?>" target="_blank" class="btn btn-success btn-sm w-100">Lihat File</a>
											<?php else: ?>
												<span class="btn btn-secondary btn-sm w-100">Lihat File</span>
											<?php endif ?>
										</div>	
									</div>
								</div>
							</div>
					</div>
					<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan data</button>
				</form>
			</div>
		</div>