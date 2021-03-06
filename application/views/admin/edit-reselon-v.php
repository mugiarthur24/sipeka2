<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/update_reselon/'.$hasil->id_pegawai.'/'.$detail->id_riwayat_eselon) ?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="text-info" for="id_eselon">eselon</label>
					<select class="form-control border-dark" name="id_eselon">
						<option value="<?php echo @$detail->id_eselon ?>">--<?php echo @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$detail->id_eselon)->nama_eselon; ?>--</option>
						<?php foreach ($eselon as $data): ?>
							<option value="<?php echo $data->id_eselon ?>"><?php echo $data->nama_eselon; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="id_jenis_jabatan">JENIS JABATAN</label>
					<select class="form-control border-dark" name="id_jenis_jabatan">
						<option value="<?php echo @$detail->id_jenis_jabatan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_jenis_jabatan','id_jenis_jabatan',$detail->id_jenis_jabatan)->nama_jenis_jabatan; ?>--</option>
						<?php foreach ($jnsjabatan as $data): ?>
							<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="nm_jabatan">NAMA JABATAN</label>
					<input type="text" class="form-control border-dark" id="nm_jabatan" name="nm_jabatan" placeholder="NAMA JABATAN"  value="<?php echo $detail->nm_jabatan?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="nomor_sk">NOMOR SK</label>
					<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK"  value="<?php echo $detail->nomor_sk?>">
				</div>
				<div class="form-group">
				<label class="text-info">Status Eselon</label>
				<select class="form-control border-dark" name="status">
					<option value="<?php echo $detail->status ?>"> --<?php if ($detail->status == '0'): ?>
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
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan data</button>
	</form>
</div>