<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_rpangkat/'.$hasil->id_pegawai.'/'.$detail->id_riwayat_pangkat) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="text-info">GOLONGAN</label>
				<select class="form-control border-dark" name="id_pangkat">
					<option value="<?php echo @$detail->id_pangkat ?>">--<?php echo @$this->Admin_m->detail_data_order('master_pangkat','id_pangkat',$detail->id_pangkat)->nm_pangkat; ?>--</option>
					<?php foreach ($pangkat as $data): ?>
						<option value="<?php echo $data->id_pangkat ?>"><?php echo $data->nm_pangkat; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label class="text-info" for="status">STATUS</label>
				<input type="text" class="form-control border-dark" id="status" name="status" placeholder="STATUS"  value="<?php echo $detail->status?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="nomor_sk">NOMOR SK</label>
				<input type="text" class="form-control border-dark" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK"  value="<?php echo $detail->nomor_sk?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
				<input type="date" class="form-control border-dark" id="tanggal_sk" name="tanggal_sk" placeholder="TANGGAL SK"  value="<?php echo $detail->tanggal_sk?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_mulai">TANGGAL MULAI</label>
				<input type="date" class="form-control border-dark" id="tanggal_mulai" name="tanggal_mulai" placeholder="TANGGAL MULAI"  value="<?php echo $detail->tanggal_mulai?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_selesai">TANGGAL SELESAI</label>
				<input type="date" class="form-control border-dark" id="tanggal_selesai" name="tanggal_selesai" placeholder="TANGGAL SELESAI"  value="<?php echo $detail->tanggal_selesai?>">
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA</label>
				<input type="text" class="form-control border-dark" name="masa_kerja" placeholder="Masukan Masa Kerja" value="<?php echo $detail->masa_kerja ?>">
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA BULAN</label>
				<input type="text" class="form-control border-dark" name="masa_kerja_bulan" placeholder="Masukan Masa Kerja Bulan" value="<?php echo $detail->masa_kerja_bulan ?>">
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA TAHUN</label>
				<input type="text" class="form-control border-dark" name="masa_kerja_tahun" placeholder="Masukan Masa Kerja Tahun" value="<?php echo $detail->masa_kerja_tahun ?>">
			</div>
			<div class="form-group">
				<label class="text-info">Status Pangkat</label>
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