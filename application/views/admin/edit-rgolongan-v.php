<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_rgolongan/'.$hasil->id_pegawai.'/'.$detail->id_riwayat_golongan) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="text-info">GOLONGAN</label>
				<select class="form-control border-dark" name="id_golongan">
					<option value="<?php echo @$detail->id_golongan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$detail->id_golongan)->golongan; ?>--</option>
					<?php foreach ($golongan as $data): ?>
						<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label class="text-info" for="nomor_sk">NOMOR SK</label>
				<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK"  value="<?php echo $detail->nomor_sk?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
				<input type="date" class="form-control border-dark" id="tanggal_sk" name="tanggal_sk" placeholder="TANGGAL SK" value="<?php echo $detail->tanggal_sk ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tmt_golongan">TMT GOLONGAN</label>
				<input type="date" class="form-control border-dark" id="tmt_golongan" name="tmt_golongan" placeholder="TMT GOLONGAN" value="<?php echo $detail->tmt_golongan ?>">
			</div>
			<div class="form-group">
				<label class="text-info">NOMOR BKN</label>
				<input type="text" class="form-control border-dark" name="nomor_bkn" placeholder="Masukan Nomor BKN" value="<?php echo $detail->nomor_bkn ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_bkn">TANGGAL BKN</label>
				<input type="date" class="form-control border-dark" id="tanggal_bkn" name="tanggal_bkn" placeholder="TANGGAL SELESAI" value="<?php echo $detail->tanggal_bkn ?>">
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA</label>
				<input type="text" class="form-control border-dark" name="masa_kerja" placeholder="Masukan Masa Kerja" value="<?php echo $detail->masa_kerja ?>">
			</div>
			<div class="form-group">
				<label class="text-info">Status Golongan</label>
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