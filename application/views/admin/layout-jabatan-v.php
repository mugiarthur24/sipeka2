<a href="<?php echo base_url('index.php/admin/export/ex_by_jabatan/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive" >
	<table class="table table-bordered table-hover ">
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama Pegawai</th>
			<th>Jenis Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Eselon</th>
			<th>No. SK</th>
			<th>Tgl SK</th>
			<th>TMT Jabatan</th>
			<th>TMT Pelantikan</th>
			<th>SKPD</th>
		</tr>
		<?php $no = 1 ?>
		<?php foreach ($hasil as $data): ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data->nip; ?></td>
				<td><?php echo $data->nama_pegawai; ?></td>
				<td><?php echo $data->nama_jenis_jabatan; ?></td>
				<td><?php echo $data->nm_jabatan; ?></td>
				<td><?php echo $data->nama_eselon; ?></td>
				<td><?php echo $data->nomor_sk; ?></td>
				<td><?php echo $data->tanggal_sk_rj; ?></td>
				<td><?php echo $data->tmt_jabatan_rj; ?></td>
				<td><?php echo $data->tmt_pelantikan_rj; ?></td>
				<td><?php echo $data->nama_satuan_kerja; ?></td>
			</tr>
			<?php $no++ ?>
		<?php endforeach ?>
	</table>
</div>
	