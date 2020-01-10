<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/update_organisasi/'.$hasil->id_pegawai.'/'.$detail->id_organisasi) ?>" method="post">
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
					<div class="row">
						<div class="col-md-4">
							<input type="text" class="form-control border-dark" id="tanggal" name="tanggal_hr" placeholder="HH" value="<?php echo substr($detail->tanggal,8,2)?>">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control border-dark" id="tanggal" name="tanggal_bln" placeholder="BB" value="<?php echo substr($detail->tanggal,5,2)?>">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control border-dark" id="tanggal" name="tanggal_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal,0,4)?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan data</button>
	</form>
</div>