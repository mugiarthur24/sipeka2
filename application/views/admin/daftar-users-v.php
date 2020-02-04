<div class="p-4">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6"><h5 class="text-info">Daftar Users</h5></div>
				
				<div class="col-md-6"><button class="btn btn-danger btn-sm" style="float:right" data-toggle="modal" data-target="#addobat"><i class="fa fa-plus-circle"></i> Tambah User</button></div>
			</div>
			<div class="mt-4">
				<form action="<?php echo base_url('index.php/admin/users/index') ?>" method="post">
					<div class="form-group">
						<label> Cari User</label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="string" class="form-control" placeholder="ketikkan user " <?php if (!empty($post['string']) ): ?>
								value="<?php echo $post['string'] ?>"
								<?php endif ?>>
								<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian</small>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="mt-4">
				<div class="table-responsive">
					<table id="add-row" class="display table table-striped table-hover">
						<tr>
							<td>NO</td>
							<td>NAMA</td>
							<td>USERNAME</td>
							<td>EMAIL</td>
							<td>LEVEL</td>
							<td colspan="2">ACTION</td>
						</tr>
						<?php $no = 1 ?>
						<?php foreach ($hasil as $data): ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data->first_name.' '.$data->last_name; ?></td>
								<td><?php echo $data->username; ?></td>
								<td><?php echo $data->email; ?></td>
								<td></td>
								<td><a class="text-info" href="<?php echo base_url('index.php/admin/users/edit/'.$data->id) ?>">edit</a></td>
								<td><a class="text-info" href="<?php echo base_url('index.php/admin/users/delete/'.$data->id) ?>">hapus</a></td>
							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
					</table>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addobat" tabindex="-1" role="dialog" aria-labelledby="addobat" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addobat">Tambah Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/users/proses_create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="first_name">Nama Depan</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan" required>
								<small id="first_name" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="last_name">Nama Belakang</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
								<small id="last_name" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username, John, eka234 dll" required>
						<small id="username" class="form-text text-muted">hanya dapat menggunakan gabungan angka dan huruf dan tanpa spasi</small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="jhon@gmail.com" required>
						<small id="email" class="form-text text-muted">Gunakan penulisan email yang benar</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="*******" required>
						<small id="password" class="form-text text-muted">Minimal 8 karakter atau lebih menggunakan kombinasi huruf dan angka</small>
					</div>
					<div class="form-group">
						<label for="repassword">Ulangi Password</label>
						<input type="password" class="form-control" name="repassword" id="repassword" placeholder="*******" required>
						<small id="repassword" class="form-text text-muted">Masukan ulang password anda diatas</small>
					</div>
					<div class="form-group" style="margin-top: 30px;">
						<label class="control-label">Groups</label><br/>
						<?php foreach ($groups as $gg): ?>
							<?php if ($gg->id=='3'): ?>
								<input type="checkbox" name="groups" value="<?php echo $gg->id; ?>" checked> <?php echo $gg->name; ?>
								<?php else: ?>
									<input type="checkbox" name="groups[]" value="<?php echo $gg->id; ?>"> <?php echo $gg->name; ?>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>