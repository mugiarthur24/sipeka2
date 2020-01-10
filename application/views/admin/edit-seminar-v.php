<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_seminar/'.$hasil->id_pegawai.'/'.$detail->id_seminar) ?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="col-md-12">
						<div class="form-group">
							<label class="text-info" for="uraian">URAIAN</label>
							<input type="text" class="form-control border-dark" id="uraian" name="uraian" placeholder="URAIAN" value="<?php echo $detail->uraian?>">
						</div>
						<div class="form-group">
							<label class="text-info" for="lokasi">LOKASI</label>
							<input type="text" class="form-control border-dark" id="lokasi" name="lokasi" placeholder="LOKASI" value="<?php echo $detail->lokasi?>">
						</div>
						<div class="form-group">
							<label class="text-info" for="tanggal">TANGGAL</label>
							<input type="date" class="form-control border-dark" id="tanggal" name="tanggal" placeholder="TANGGAL" value="<?php echo $detail->tanggal?>">
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