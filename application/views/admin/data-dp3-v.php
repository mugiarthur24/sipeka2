<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Data SKP</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#adddp3"><i class="fa fa-plus-circle"></i> Tambah Data SKP</button>
		</div>
	</div>
	<hr/>
	<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover">
		<thead>
			<tr>
				<td class="text-center">No</td>
				<td class="">Tahun</td>
				<td class="">Jenis Jab</td>
				<td class="">Nilai SKP</td>
				<td class="">Pejabat Penilai</td>
				<td class="">Atasan Pejabat Penilai</td>
				<td class="" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($dp3 == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($dp3 as $data): ?>
					<tr>
						<td class=" text-center"><?php echo $no; ?></td>
						<td class=""><?php echo $this->Admin_m->detail_data_order('master_jenis_jabatan','id_jenis_jabatan',$data->id_jenis_jabatan)->nama_jenis_jabatan; ?></td>
						<td class=""><?php echo $data->tahun; ?></td>
						<td class=""><?php echo $data->rata_rata; ?></td>
						<td class=""><?php echo $data->pejabat_penilai; ?></td>
						<td class=""><?php echo $data->atasan_pejabat_penilai; ?></td>
						<td class="">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_dp3/'.$hasil->id_pegawai.'/'.$data->id_dp3) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
						</td>
						<td class="">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_dp3/'.$hasil->id_pegawai.'/'.$data->id_dp3) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class=" text-center" colspan="8">Belum ada data SKP</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
</div>
<!-- Modal -->
<div class="modal fade" id="adddp3" tabindex="-1" role="dialog" aria-labelledby="adddp3" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="adddp3">Tambah Data SKP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_dp3/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="tahun">TAHUN</label>
								<input type="text" class="form-control border-dark" id="tahun" name="tahun" placeholder="TAHUN" >
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
									<label class="text-info" for="id_jenis_jabatan">JENIS JABATAN</label>
									<select class="form-control border-dark" name="id_jenis_jabatan">
										<?php foreach ($jnsjabatan as $data): ?>
											<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
										<?php endforeach ?>
									</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="orientasi_pelayanan">ORIENTASI PELAYANAN</label>
								<input type="text" class="form-control border-dark" id="orientasi_pelayanan" name="orientasi_pelayanan" placeholder="ORIENTASI PELAYANAN" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="integritas">INTEGRITAS</label>
								<input type="text" class="form-control border-dark" id="integritas" name="integritas" placeholder="INTEGRITAS" >
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="disiplin">DISIPLIN</label>
								<input type="text" class="form-control border-dark" id="disiplin" name="disiplin" placeholder="DISIPLIN">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="kerjasama">KERJASAMA</label>
								<input type="text" class="form-control border-dark" id="kerjasama" name="kerjasama" placeholder="KERJASAMA">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="kepemimpinan">KEPEMIMPINAN</label>
								<input type="text" class="form-control border-dark" id="kepemimpinan" name="kepemimpinan" placeholder="KEPEMIMPINAN">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="nilai_skp	">NILAI SKP</label>
								<input type="text" class="form-control border-dark" id="nilai_skp	" name="nilai_skp	" placeholder="NILAI SKP">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="text-info" for="id_pejabat_penilai">PEJABAT PENILAI</label>
								<input type="text" class="form-control border-dark" id="id_pejabat_penilai" name="id_pejabat_penilai" placeholder="PEJABAT PENILAI">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="id_atasan_pejabat_penilai	">ATASAN PEJABAT PENILAI</label>
								<input type="text" class="form-control border-dark" id="id_atasan_pejabat_penilai	" name="id_atasan_pejabat_penilai	" placeholder="ATASAN PEJABAT PENILAI">
							</div>
						</div>
					</div>
						
					<div class="modal-footer">
						<button type="submit" name="submit" value="submit" class="btn btn-danger">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>