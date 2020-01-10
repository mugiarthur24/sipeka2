<a href="<?php echo base_url('index.php/admin/export/ex_by_skp/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Tahun</th>
		<th>Rata-Rata</th>
		<th>Pejabat Penilai</th>
		<th>Atasan Pejabat Penilai</th>
		<th>Mengetahui</th>
	</tr>
	<?php $no = 1 ?>
	<?php foreach ($hasil as $data): ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nip; ?></td>
			<td><?php echo $data->nama_pegawai; ?></td>
			<td><?php echo $data->tahun; ?></td>
			<td><?php echo $data->rata_rata; ?></td>
			<td><?php echo $data->pejabat_penilai; ?></td>
			<td><?php echo $data->atasan_pejabat_penilai; ?></td>
			<td><?php echo $data->mengetahui; ?></td>
		</tr>
		<?php $no++ ?>
	<?php endforeach ?>
</table>
</div>