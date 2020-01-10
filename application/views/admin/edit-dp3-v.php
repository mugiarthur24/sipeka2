<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_dp3/'.$hasil->id_pegawai.'/'.$detail->id_dp3) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="text-info" for="tahun">TAHUN</label>
				<input type="text" class="form-control border-dark" id="tahun" name="tahun" placeholder="TAHUN" value="<?php echo $detail->tahun ?>">
			</div>
			<div class="form-group">
				<label class="text-info">JENIS JABATAN</label>
				<select class="form-control border-dark" name="id_jenis_jabatan">
					<option value="<?php echo @$detail->id_jenis_jabatan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_jenis_jabatan','id_jenis_jabatan',$detail->id_jenis_jabatan)->nama_jenis_jabatan; ?>--</option>
					<?php foreach ($jnsjabatan as $data): ?>
						<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label class="text-info" for="orientasi_pelayanan">ORIENTASI PELAYANAN</label>
				<input type="text" class="form-control border-dark" id="orientasi_pelayanan" name="orientasi_pelayanan" placeholder="ORIENTASI PELAYANAN" value="<?php echo $detail->orientasi_pelayanan ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="integritas">INTEGRITAS</label>
				<input type="text" class="form-control border-dark" id="integritas" name="integritas" placeholder="INTEGRITAS" value="<?php echo $detail->integritas ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="disiplin">DISIPLIN</label>
				<input type="text" class="form-control border-dark" id="disiplin" name="disiplin" placeholder="DISIPLIN" value="<?php echo $detail->disiplin ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="kerjasama">KERJASAMA</label>
				<input type="text" class="form-control border-dark" id="kerjasama" name="kerjasama" placeholder="KERJASAMA" value="<?php echo $detail->kerjasama ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="kepemimpinan">KEPEMIMPINAN</label>
				<input type="text" class="form-control border-dark" id="kepemimpinan" name="kepemimpinan" placeholder="KEPEMIMPINAN" value="<?php echo $detail->kepemimpinan ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="nilai_skp	">NILAI SKP</label>
				<input type="text" class="form-control border-dark" id="nilai_skp	" name="nilai_skp	" placeholder="NILAI SKP" value="<?php echo $detail->nilai_skp ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="id_pejabat_penilai">PEJABAT PENILAI</label>
				<input type="text" class="form-control border-dark" id="id_pejabat_penilai" name="id_pejabat_penilai" placeholder="PEJABAT PENILAI" value="<?php echo $detail->id_pejabat_penilai ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="id_atasan_pejabat_penilai	">ATASAN PEJABAT PENILAI</label>
				<input type="text" class="form-control border-dark" id="id_atasan_pejabat_penilai	" name="id_atasan_pejabat_penilai" placeholder="ATASAN PEJABAT PENILAI" value="<?php echo $detail->id_atasan_pejabat_penilai ?>">
			</div>
		</div>
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
</form>
</div>