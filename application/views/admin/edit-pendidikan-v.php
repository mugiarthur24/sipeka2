<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/update_pendidikan/'.$hasil->id_pegawai.'/'.$detail->id_pendidikan) ?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="form-group">
						<label>TINGKAT PENDIDIKAN</label>
						<select class="form-control border-dark" name="tingkat_pendidikan">
							<option value="<?php echo $detail->tingkat_pendidikan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_pendidikan','id',$detail->tingkat_pendidikan)->pendidikan; ?>--</option>
							<?php foreach ($ipendidikan as $data): ?>
								<option value="<?php echo $data->id ?>"><?php echo $data->pendidikan; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="sekolah">SEKOLAH</label>
						<input type="text" class="form-control border-dark" id="sekolah" name="sekolah" placeholder="SEKOLAH" value="<?php echo $detail->sekolah?>">
					</div>
					<div class="form-group">
						<label for="jurusan">JURUSAN</label>
						<input type="text" class="form-control border-dark" id="jurusan" name="jurusan" placeholder="JURUSAN" value="<?php echo $detail->jurusan?>">
					</div>
					<div class="form-group">
						<label for="nomor_ijazah">NOMOR IJAZAH</label>
						<input type="text" class="form-control border-dark" id="nomor_ijazah" name="nomor_ijazah" placeholder="NOMOR IJAZAH" value="<?php echo $detail->nomor_ijazah?>">
					</div>
					<div class="form-group">
						<label for="tanggal_lulus">TANGGAL IJAZAH</label>
						<input type="date" class="form-control border-dark" id="tanggal_lulus" name="tanggal_lulus" placeholder="TANGGAL IJAZAH" value="<?php echo $detail->tanggal_lulus?>">
					</div>
					<div class="form-group">
						<label for="tempat_sekolah">TEMPAT</label>
						<input type="text" class="form-control border-dark" id="tempat_sekolah" name="tempat_sekolah" placeholder="TEMPAT SEKOLAH" value="<?php echo $detail->tempat_sekolah?>">
					</div>
					<div class="form-group">
				<label class="text-info">Status</label>
				<select class="form-control border-dark" name="id_status">
					<option value="<?php echo $detail->id_status ?>"> --<?php if ($detail->id_status == '0'): ?>
					Tidak Aktif
					<?php else: ?>
						Aktif	
						<?php endif ?>--</option>
					<option value="Tidak Aktif">Tidak Aktif</option>
					<option value="Aktif">Aktif</option>
				</select>
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
				<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan data</button>
			</div>
			
		</form>
	</div>