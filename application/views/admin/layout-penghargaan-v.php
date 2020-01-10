<a href="<?php echo base_url('index.php/admin/export/ex_by_penghargaan/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Jenis Penghargaan</th>
		<th>No. Keputusan</th>
		<th>Tanggal</th>
		<th>Tahun</th>
	</tr>
	<?php $no = 1 ?>
	<?php foreach ($hasil as $data): ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nip; ?></td>
			<td><?php echo $data->nama_pegawai; ?></td>
			<td><?php echo $data->jenis_penghargaan; ?></td>
			<td><?php echo $data->no_keputusan; ?></td>
			<td><?php echo $data->tanggal; ?></td>
			<td><?php echo $data->tahun; ?></td>
		</tr>
		<?php $no++ ?>
	<?php endforeach ?>
</table>
</div>