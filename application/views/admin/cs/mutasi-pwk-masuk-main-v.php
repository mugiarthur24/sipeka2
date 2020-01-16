<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/datetime/js/bootstrap-datepicker.js') ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('asset/datetime/css/bootstrap-datepicker.css') ?>" />
<div class="p-4">
	<div class="card">
		<div class="card-header">
			<div class="media">
				<div class="media-body">
					<h5 class="mt-0 mb-1">Daftar Pindah Wilayah Kerja (Masuk)</h5>
				</div>
				<div class="ml-3">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addpwkm">
					  <i class="fa fa-plus"></i> Tambah Data
					</button>
				</div>
			</div>
			
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table">
				<tr>
					<td class="text-center">No</td>
					<td class="text-center">Nip</td>
					<td class="text-center">Nama Pegawai</td>
					<td class="text-center">Tanggal</td>
					<td class="text-center">Status</td>
					<td colspan="2" class="text-center"></td>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td class="text-center"><?php echo $data->nip; ?></td>
						<td class=""><a href="<?php echo base_url('index.php/admin/csmutasi/detail_pwk_masuk/'.@$data->id_pindah_wilayah_kerja_masuk) ?>"><?php echo $data->nm_pegawai; ?></a></td>
						<td class="text-center"><?php echo date('d F Y',strtotime($data->tgl_create)); ?></td>
						<?php $dtstatus = $this->Admin_m->detail_data_order('status','id_status',$data->id_sts_1) ?>
						<?php if ($data->verifikasi_1 == '2' && $data->verifikasi_2 == '2' && $data->verifikasi_3 == '2' && $data->verifikasi_4 == '2' && $data->verifikasi_5 == '2' && $data->verifikasi_6 == '2' && $data->verifikasi_7 == '2' && $data->verifikasi_8 == '2' && $data->verifikasi_9 == '2'): ?>
							<td class="text-center text-success">Telah Diverifikasi</td>
						<td class="text-center"><a href="<?php echo base_url('index.php/admin/csmutasi/ctk_pwkm/'.$data->id_pindah_wilayah_kerja_masuk) ?>" target="_blank"><img src="<?php echo base_url('asset/img/printer.svg') ?>" width="25" height="25"></a>
						</td>
						<?php else: ?>
							<td class="text-center text-danger">Menunggu</td>
						<td class="text-center"><i class="fa fa-times"></i></td>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpwkm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/csmutasi/cpwk_masuk') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nama Pegawai</label>
								<input type="text" name="nm_pegawai" class="form-control border-dark" placeholder="Nama Pegawai">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>NIP</label>
								<input type="text" name="nip" class="form-control border-dark" placeholder="NIP Pegawai">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Instansi</label>
								<input type="text" name="instansi" class="form-control border-dark" placeholder="Nama Instansi">
								<small class="form-text text-muted">Hanya dapat menggunakan angka huruf</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tanggal Masuk Pegawai</label>
								<input type="text" id="datepicker1" name="tgl_masuk" class="form-control border-dark" placeholder="Tanggal Masuk">
								<small class="form-text text-muted">Isi dengan tanggal masuk pertama kali pada instansi sebelumnya.</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Instansi Lama</label>
								<input type="text" name="instansi_lama" class="form-control border-dark" placeholder="Nama Instansi Lama">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Instansi Baru</label>
								<input type="text" name="instansi_baru" class="form-control border-dark" placeholder="Nama Pegawai">
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Pangkat</label>
								<select class="form-control" name="id_pangkat">
									<?php foreach ($pangkat as $data): ?>
										<option value="<?php echo $data->id_pangkat ?>"><?php echo $data->nm_pangkat; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Golongan</label>
								<select class="form-control" name="id_golongan">
									<?php foreach ($golongan as $data): ?>
										<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Jabatan</label>
								<select class="form-control" name="id_jabatan">
									<?php foreach ($jabatan as $data): ?>
										<option value="<?php echo $data->id_jabatan ?>"><?php echo $data->nama_jabatan; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tanggal Permohonan Pindah</label>
								<input type="text" name="tgl_permohonan" class="form-control border-dark" placeholder="Tanggal Masuk">
								<small class="form-text text-muted">Isi dengan tanggal saat melakukan permohonan pindah</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Pejabat</label>
								<input type="text" name="pejabat" class="form-control border-dark" placeholder="Pejabat">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Alamat Ibu Kota</label>
								<textarea class="form-control border-dark" name="alamat_ibu_kota" placeholder="Masukan Alamat Ibu Kota"></textarea>
								<small class="form-text text-muted">Hanya dapat menggunakan angka dna huruf</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tembusan 1</label>
								<input type="text" name="tembusan_1" class="form-control border-dark" placeholder="Tembusan 1">
								<small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tembusan 2</label>
								<input type="text" name="tembusan_2" class="form-control border-dark" placeholder="Tembusan 2">
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tembusan 3</label>
								<input type="text" name="tembusan_3" class="form-control border-dark" placeholder="Tembusan 3">
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Unit Kerja</label>
								<select class="form-control border-dark" name="unit_kerja">
									<?php foreach ($skpd as $dtskpd): ?>
										<option value="<?php echo $dtskpd->id_lokasi_kerja ?>"><?php echo $dtskpd->lokasi_kerja; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control border-dark" name="ket" placeholder="Masukan Keterangan"></textarea>
								<small class="form-text text-muted"></small>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="submit" value="submit" class="btn btn-danger"><i class="fa fa-plus"></i> Simpan data pindah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$( document ).ready(function() {
	    $('#sandbox-container input').datepicker({
			format: "dd-mm-yyyy"
		});
	});
</script>