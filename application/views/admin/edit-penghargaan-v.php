<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_penghargaan/'.$hasil->id_pegawai.'/'.$detail->id_penghargaan) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-info" for="jenis_penghargaan">JENIS PENGHARGAAN</label>
						<input type="text" class="form-control border-dark" id="jenis_penghargaan" name="jenis_penghargaan" placeholder="JENIS PENGHARGAAN" value="<?php echo $detail->jenis_penghargaan?>">
					</div>
					<div class="form-group">
						<label class="text-info" for="no_keputusan">NO. KEPUTUSAN</label>
						<input type="text" class="form-control border-dark" id="no_keputusan" name="no_keputusan" placeholder="NO KEPUTUSAN" value="<?php echo $detail->no_keputusan?>">
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
					<div class="form-group">
						<label class="text-info" for="tahun">TAHUN</label>
						<input type="text" class="form-control border-dark" id="tahun" name="tahun" placeholder="TAHUN" value="<?php echo $detail->tahun?>">
					</div>
				</div>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan data</button>
		</form>
	</div>