<div class="p-4">
	<div class="card">
		<div class="card-header">
			<b class="text-primary">Detail Pegawai</b>
		</div>
		<div class="card-body">
			asd
		</div>
	</div>
	<div class="card mt-4">
		<div class="card-header">
			<b class="text-primary">Rincian Form Upload</b>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Persyaratan</th>
						<th scope="col">Dokumen</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP), ASLI</td>
						<td>
							<?php if ($hasil->upload_1 !== NULL ): ?>
								<a href="<?php echo base_url('asset/dokumen/'.$hasil->upload_1) ?>" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;Lihat Dokumen</a>
							<?php else: ?>
								<span class="text-danger">file kosong</span>
							<?php endif ?>
						</td>
						<td>
							<?php $sts1 = $this->Admin_m->detail_data_order('status','id_status',$hasil->id_sts_1)?>
							<span class="<?php echo $sts1->kode_status ?>"><?php echo $sts1->nm_status ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>SURAT REKOMENDASI/SURAT KEPUTUSAN YANG DI TTD BUPATI</td>
						<td>
							<?php if ($hasil->upload_2 !== NULL ): ?>
								<a href="<?php echo base_url('asset/dokumen/'.$hasil->upload_2) ?>" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;Lihat Dokumen</a>
							<?php else: ?>
								<span class="text-danger">file kosong</span>
							<?php endif ?>
						</td>
						<td>
							<?php $sts2 = $this->Admin_m->detail_data_order('status','id_status',$hasil->id_sts_2)?>
							<span class="<?php echo $sts2->kode_status ?>"><?php echo $sts2->nm_status ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>FOTO COPY SK CPNS (80%), DILEGALISIR</td>
						<td>
							<?php if ($hasil->upload_3 !== NULL ): ?>
								<a href="<?php echo base_url('asset/dokumen/'.$hasil->upload_3) ?>" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;Lihat Dokumen</a>
							<?php else: ?>
								<span class="text-danger">file kosong</span>
							<?php endif ?>
						</td>
						<td>
							<?php $sts3 = $this->Admin_m->detail_data_order('status','id_status',$hasil->id_sts_3)?>
							<span class="<?php echo $sts3->kode_status ?>"><?php echo $sts3->nm_status ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>FOTO COPY SK CPNS (100%), DILEGALISIR</td>
						<td><input type="file" name="upload_4"></td>
					</tr>
					<tr>
						<th scope="row">5</th>
						<td>FOTO COPY SK KENAIKAN PANGKAT TERAKHIR, DILEGALISIR</td>
						<td><input type="file" name="upload_5"></td>
					</tr>
					<tr>
						<th scope="row">6</th>
						<td>FOTO COPY KGB TERAKHIR, DILEGALISIR</td>
						<td><input type="file" name="upload_6"></td>
					</tr>
					<tr>
						<th scope="row">7</th>
						<td>FOTO COPY KARTU PEGAWAI, DILEGALISIR</td>
						<td><input type="file" name="upload_7"></td>
					</tr>
					<tr>
						<th scope="row">8</th>
						<td>DP-3/SKP 1 TAHUN TERAHIR, ASLI</td>
						<td><input type="file" name="upload_8"></td>
					</tr>
					<tr>
						<th scope="row">9</th>
						<td>DAFTAR RIWAYAT PEKERJAAN, ASLI</td>
						<td><input type="file" name="upload_9"></td>
					</tr>
					<tr>
						<th scope="row">10</th>
						<td>SURAT PERNYATAAN TIDAK PERNAH DIJATUHI HUKUMAN DISIPLIN TINGKAT SEDANG/BERAT, ASLI</td>
						<td><input type="file" name="upload_10"></td>
					</tr>
					<tr>
						<th scope="row">11</th>
						<td>SURAT PERNYATAAN TIDAK SEDANG MENJALANI PROSES PIDANA ATAU PERNAH DIPIDANA PENJARA BERDASARKAN PUTUSAN PENGADILAN YANG TELAH BERKEKUATAN HUKUM TETAP DI INSPEKTORAT, ASLI</td>
						<td><input type="file" name="upload_11"></td>
					</tr>
					<tr>
						<th scope="row">12</th>
						<td>FOTO COPY SURAT / AKTA NIKAH, DISAHKAN</td>
						<td><input type="file" name="upload_12"></td>
					</tr>
					<tr>
						<th scope="row">13</th>
						<td>FOTO COPY KARTU ISTERI / KARTU SUAMI, DISAHKAN</td>
						<td><input type="file" name="upload_13"></td>
					</tr>
					<tr>
						<th scope="row">14</th>
						<td>FOTO COPY KONVERSI NIP BARU, DISAHKAN</td>
						<td><input type="file" name="upload_14"></td>
					</tr>
					<tr>
						<th scope="row">15</th>
						<td>KP-4 TERAKHIR, ASLI</td>
						<td><input type="file" name="upload_15"></td>
					</tr>
					<tr>
						<th scope="row">16</th>
						<td>DAFTAR SUSUNAN KELUARGA, ASLI</td>
						<td><input type="file" name="upload_16"></td>
					</tr>
					<tr>
						<th scope="row">17</th>
						<td>FOTO COPY KTP PNS + SUAMI / ISTRI, DILEGALISIR</td>
						<td><input type="file" name="upload_17"></td>
					</tr>
					<tr>
						<th scope="row">18</th>
						<td>FOTO COPY KARTU KELUARGA, DILEGALISIR</td>
						<td><input type="file" name="upload_18"></td>
					</tr>
					<tr>
						<th scope="row">19</th>
						<td>FOTO COPY NPWP</td>
						<td><input type="file" name="upload_19"></td>
					</tr>
					<tr>
						<th scope="row">20</th>
						<td>FOTO COPY AKTA KELAHIRAN ANAK (YANG MASIH DI TANGGUNG), DILEGALISIR</td>
						<td><input type="file" name="upload_20"></td>
					</tr>
					<tr>
						<th scope="row">21</th>
						<td>SURAT KET. AKTIF KULIAH (BAGI ANAK TANGGUNGAN YANG MASIH KULIAH), ASLI</td>
						<td><input type="file" name="upload_21"></td>
					</tr>
					<tr>
						<th scope="row">22</th>
						<td>FOTO COPY TASPEN</td>
						<td><input type="file" name="upload_22"></td>
					</tr>
					<tr>
						<th scope="row">23</th>
						<td>SURAT KET. ANAK KANDUNG (BAGI ANAK TANGGUNGAN YANG DILAHIRKAN IBUNYA BERUSIA 40 TAHUN KEATAS, ASLI</td>
						<td><input type="file" name="upload_23"></td>
					</tr>
					<tr>
						<th scope="row">24</th>
						<td>PAS FOTO TERBARU UKURAN 3 X 4 CM WARNA SEBANYAK 12 LEMBAR (PAKAIAN DINAS)</td>
						<td><input type="file" name="upload_24"></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>