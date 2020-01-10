<a href="<?php echo base_url('index.php/admin/export/ex_by_pendidikan/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Tingkat Pendidikan</th>
		<th>Nama Sekolah</th>
		<th>Jurusan</th>
		<th>No. Ijazah</th>
		<th>Tgl Ijazah</th>
		<th>Tempat Sekolah</th>
	</tr>
	<?php $no = 1 ?>
	<?php foreach ($hasil as $data): ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nip; ?></td>
			<td><?php echo $data->nama_pegawai; ?></td>
			<td><?php echo $data->pendidikan; ?></td>
			<td><?php echo $data->sekolah; ?></td>
			<td><?php echo $data->jurusan; ?></td>
			<td><?php echo $data->nomor_ijazah; ?></td>
			<td><?php echo $data->tanggal_lulus; ?></td>
			<td><?php echo $data->tempat_sekolah; ?></td>
		</tr>
		<?php $no++ ?>
	<?php endforeach ?>
</table>
</div>