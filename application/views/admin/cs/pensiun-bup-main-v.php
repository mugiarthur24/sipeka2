<div class="p-4">
	<div class="card">
		<div class="card-header">
			<div class="media">
				<div class="media-body">
					<h5 class="mt-0 mb-1">Daftar Permintaan Pensiun BUP (Batas Usia Pensiun)</h5>
				</div>
				<div class="ml-3">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addpensiunbup">
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
					<td class="text-center">Status</td>
					<td colspan="2" class="text-center"></td>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td class="text-center"><?php echo $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$data->id_pegawai)->nip; ?></td>
						<td class=""><a href="<?php echo base_url('index.php/admin/cspensiun/detail_pensiunbup/'.$data->id_form_pensiunbup) ?>"><?php echo $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$data->id_pegawai)->nama_pegawai; ?></a></td>
						<td class="text-center"><?php echo date('d F Y',strtotime($data->tgl_create)); ?></td>
						<?php $dtstatus = $this->Admin_m->detail_data_order('status','id_status',$data->id_sts_1) ?>
						<?php if ($data->verifikasi_1 == '2' && $data->verifikasi_2 == '2' && $data->verifikasi_3 == '2' && $data->verifikasi_4 == '2' && $data->verifikasi_5 == '2' && $data->verifikasi_6 == '2' && $data->verifikasi_7 == '2' && $data->verifikasi_8 == '2' && $data->verifikasi_9 == '2' && $data->verifikasi_10 == '2' && $data->verifikasi_11 == '2' && $data->verifikasi_11 == '2' && $data->verifikasi_12 == '2' && $data->verifikasi_13 == '2' && $data->verifikasi_14 == '2' && $data->verifikasi_15 == '2' && $data->verifikasi_16 == '2' && $data->verifikasi_17 == '2' && $data->verifikasi_18 == '2' && $data->verifikasi_19 == '2' && $data->verifikasi_20 == '2' && $data->verifikasi_21 == '2' && $data->verifikasi_22 == '2' && $data->verifikasi_23 == '2'): ?>
							<td class="text-center text-success">Telah Diverifikasi</td>
							<td class="text-center"><a href="<?php echo base_url('index.php/admin/csmutasi/ctk_pwkk/'.$data->id_form_pensiunbup) ?>"><img src="<?php echo base_url('asset/img/printer.svg') ?>" width="25" height="25"></a></td>
						<?php else: ?>
							<td class="text-center text-danger">Menunggu</td>
						<td class="text-center"><i class="fa fa-times"></i></td>
						<?php endif ?>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpensiunbup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/cspensiun/pensiunbup') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Cari Pegawai</label>
								<input type="text" name="tgl_masuk" id="caripegawaipensiunbup" class="form-control border-dark" placeholder="Masukkan Nama Pegawai">
								<small class="form-text text-muted">isi dengan nama atau nip pegawai.</small>
							</div>
							<table class="w-100 table" id="hasilcari" width="100%"></table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
		// 
$('#caripegawaipensiunbup').keyup(function() { // Jika select box id kurir dipilih
  	var katakuncip = $('#caripegawaipensiunbup').val();
  	$.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/cspensiun/caripegawaipensiunbup/'); ?>",
           data: 'string=' + katakuncip, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#hasilcari').html(jadi); // Berikan hasilnya ke id biaya
          }
      });
  });
// 
  
</script>