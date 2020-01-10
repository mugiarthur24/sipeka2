<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_seminar/'.$hasil->id_pegawai.'/'.$detail->id_seminar) ?>" method="post">
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