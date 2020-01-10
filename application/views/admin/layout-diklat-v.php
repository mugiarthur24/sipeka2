<a href="<?php echo base_url('index.php/admin/export/ex_by_diklat/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Nama Diklat/Kursus</th>
		<th>Lama Kursus (Jam)</th>
		<th>Tanggal</th>
		<th>No. Sertifikat</th>
		<th>Instansi</th>
		<th>Instansi Penyelenggara</th>
	</tr>
	<?php $no = 1 ?>
	<?php foreach ($hasil as $data): ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nip; ?></td>
			<td><?php echo $data->nama_pegawai; ?></td>
			<td><?php echo $data->nama_kursus; ?></td>
			<td><?php echo $data->lama_kursus; ?></td>
			<td><?php echo $data->tanggal; ?></td>
			<td><?php echo $data->no_sertifikat; ?></td>
			<td><?php echo $data->instansi; ?></td>
			<td><?php echo $data->instansi_penyelenggara; ?></td>
		</tr>
		<?php $no++ ?>
	<?php endforeach ?>
</table>
</div>