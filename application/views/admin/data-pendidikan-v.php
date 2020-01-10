<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Pendidikan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addpendidikan"><i class="icon-plus"></i>&nbsp; Tambah Data Pendidikan</button>
		</div>
	</div>
	<hr/>
	<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover">
		<thead>
			<tr class="">
				<td class="p-1 text-center">No</td>
				<td class="p-1">Tngkt Pendidikan</td>
				<td class="p-1">Sekolah</td>
				<td class="p-1">Jurusan</td>
				<td class="p-1">No Ijazah</td>
				<td class="p-1">Tgl Ijazah</td>
				<td class="p-1">Tempat</td>
				<td class="p-1" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($pendidikan == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($pendidikan as $data): ?>
					<tr>
						<td class=" text-center"><?php echo $no; ?></td>
						<td class=""><?php echo @$this->Admin_m->detail_data_order('master_pendidikan','id',$data->tingkat_pendidikan)->pendidikan; ?></td>
						<td class=""><?php echo $data->sekolah; ?></td>
						<td class=""><?php echo $data->jurusan; ?></td>
						<td class=""><?php echo $data->nomor_ijazah; ?></td>
						<td class=""><?php echo $data->tanggal_lulus; ?></td>
						<td class=""><?php echo $data->tempat_sekolah; ?></td>			
						<td class="">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_pendidikan/'.$hasil->id_pegawai.'/'.$data->id_pendidikan) ?>" class="text-success"><img src="<?php echo base_url('asset/img/icons8-edit.svg') ?>" width="30" height="30" rel="tooltip" title="Edit"></a>
						</td>
						<td class="">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_pendidikan/'.$hasil->id_pegawai.'/'.$data->id_pendidikan) ?>" class="text-danger"><img src="<?php echo base_url('asset/img/icons8-trash-can.svg') ?>" width="30" height="30" rel="tooltip" title="Hapus"></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="text-center" colspan="9">Belum ada data pendidikan</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpendidikan" tabindex="-1" role="dialog" aria-labelledby="addpendidikann" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addpendidikann">Tambah Data Pendidikan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_pendidikan/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="tingkat_pendidikan">TINGKAT PENDIDIKAN</label>
								<select class="form-control border-dark" name="tingkat_pendidikan">
									<?php foreach ($ipendidikan as $data): ?>
										<option value="<?php echo $data->id; ?>"><?php echo $data->pendidikan ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="sekolah">SEKOLAH</label>
								<input type="text" class="form-control border-dark" id="sekolah" name="sekolah" placeholder="SEKOLAH">
							</div>
							<div class="form-group">
								<label class="text-info" for="jurusan">JURUSAN</label>
								<input type="text" class="form-control border-dark" id="jurusan" name="jurusan" placeholder="JURUSAN" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nomor_ijazah">NOMOR IJAZAH</label>
								<input type="text" class="form-control border-dark" id="nomor_ijazah" name="nomor_ijazah" placeholder="NOMOR IJAZAH">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_lulus">TANGGAL IJAZAH</label>
								<div class="row">
									<div class="col-md-4">
										<input type="text" class="form-control border-dark" id="tanggal_lulus" name="tanggal_lulus_hr" placeholder="HH">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control border-dark" id="tanggal_lulus" name="tanggal_lulus_bln" placeholder="BB">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control border-dark" id="tanggal_lulus" name="tanggal_lulus_thn" placeholder="TTTT">
									</div>
								</div>
									<div class="form-group">
										<label class="text-info" for="tempat_sekolah">TEMPAT</label>
										<input type="text" class="form-control border-dark" id="tempat_sekolah" name="tempat_sekolah" placeholder="TEMPAT SEKOLAH">
									</div>
								</div>
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