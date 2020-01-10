<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/update_organisasi/'.$hasil->id_pegawai.'/'.$detail->id_organisasi) ?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="text-info">SATUAN KERJA</label>
					<select class="form-control border-dark" name="id_satuan_kerja">
						<option value="<?php echo $detail->id_satuan_kerja ?>">--<?php echo @$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$detail->id_satuan_kerja)->nama_satuan_kerja; ?>--</option>
						<?php foreach ($satuankerja as $data): ?>
							<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="nomor">NOMOR</label>
					<input type="text" class="form-control border-dark" id="nomor" name="nomor" placeholder="NOMOR" value="<?php echo $detail->nomor?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal">TANGGAL</label>
					<input type="date" class="form-control border-dark" id="tanggal" name="tanggal" placeholder="TANGGAL" value="<?php echo $detail->tanggal?>">
				</div>
				<div class="form-group">
				<label class="text-info">Status</label>
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