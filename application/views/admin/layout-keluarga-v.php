<a href="<?php echo base_url('index.php/admin/export/ex_by_keluarga/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Tgl Lahir</th>
		<th>Hub. Keluarga</th>
		<th>Status Kawin</th>
		<th>Tgl Nikah</th>
		<th>Tgl Cerai</th>
		<th>Tgl Meninggal</th>
		<th>Pekerjaan</th>
		<th>No Kartu Suami/Istri</th>
	</tr>
	<?php $no = 1 ?>
	<?php foreach ($hasil as $data): ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nama_anggota_keluarga; ?></td>
			<td><?php echo $data->tanggal_lahir; ?></td>
			<td><?php echo $data->status_keluarga; ?></td>
			<td><?php echo $data->status_kawin; ?></td>
			<td><?php echo $data->tanggal_nikah; ?></td>
			<td><?php echo $data->tanggal_cerai_meninggal; ?></td>
			<td><?php echo $data->tanggal_meninggal; ?></td>
			<td><?php echo $data->pekerjaan; ?></td>
			<td><?php echo $data->no_kartu; ?></td>
		</tr>
		<?php $no++ ?>
	<?php endforeach ?>
</table>
</div>