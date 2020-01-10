<a href="<?php echo base_url('index.php/admin/export/ex_by_unitorg/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Unit Organisasi</th>
		<th>Nomor</th>
		<th>Tanggal</th>
	</tr>
	<?php $no = 1 ?>
	<?php foreach ($hasil as $data): ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nip; ?></td>
			<td><?php echo $data->nama_pegawai; ?></td>
			<td><?php echo $data->nama_satuan_kerja; ?></td>
			<td><?php echo $data->nomor; ?></td>
			<td><?php echo $data->tanggal; ?></td>
		</tr>
		<?php $no++ ?>
	<?php endforeach ?>
</table>
</div>