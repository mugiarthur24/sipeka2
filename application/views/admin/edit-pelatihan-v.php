<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_pelatihan/'.$hasil->id_pegawai.'/'.$detail->id_pelatihan) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-info" for="nama_kursus">NAMA KURSUS</label>
						<input type="text" class="form-control border-dark" id="nama_kursus" name="nama_kursus" placeholder="NAMA KURSUS" value="<?php echo $detail->nama_kursus?>">
					</div>
					<div class="form-group">
						<label class="text-info" for="lama_kursus">LAMA KURSUS (JAM)</label>
						<input type="text" class="form-control border-dark" id="lama_kursus" name="lama_kursus" placeholder="LAMA KURSUS (JAM)" value="<?php echo $detail->lama_kursus?>">
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
						<label for="no_sertifikat">NOMOR SERTIFIKAT</label>
						<input type="text" class="form-control border-dark" id="no_sertifikat" name="no_sertifikat" placeholder="NO SERTIFIKAT" value="<?php echo $detail->no_sertifikat?>">
					</div>
					<div class="form-group">
						<label for="instansi">INSTANSI</label>
						<input type="text" class="form-control border-dark" id="instansi" name="instansi" placeholder="INSTANSI" value="<?php echo $detail->instansi?>">
					</div>
					<div class="form-group">
		     			<label for="instansi_penyelenggara">INSTANSI PENYELENGGARA</label>
						<input type="text" class="form-control border-dark" id="instansi_penyelenggara" name="instansi_penyelenggara" placeholder="INSTANSI PENYELENGGARA" value="<?php echo $detail->instansi_penyelenggara?>">
					</div>
				</div>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan data</button>
		</form>
	</div>