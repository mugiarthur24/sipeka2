<?php if ($this->ion_auth->is_admin()): ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cssuket/tugasbelajar_main/') ?>">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/diploma.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Surat Tugas Belajar</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
			<a href="<?php echo base_url('index.php/admin/cssuket/ijinbelajar_main/') ?>">
				<div class="card text-white bg-warning mb-3">
					<div class="card-body text-center">
						<span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/checklist.svg') ?>" width="100" height="100"></span><br/><br/>
						<span class="text-dark">Surat Ijin Belajar</span>
					</div>
				</div>
			</a>
		</div>
		<div class="col">
            <a href="#">
                <div class="card text-white bg-success mb-3" >
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/student.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Surat Keterangan Kuliah</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
</div>

<?php else: ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cssuket/tugasbelajar_main/') ?>">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/diploma.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Surat Tugas Belajar</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
			<a href="<?php echo base_url('index.php/admin/cssuket/ijinbelajar_main/') ?>">
				<div class="card text-white bg-warning mb-3">
					<div class="card-body text-center">
						<span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/checklist.svg') ?>" width="100" height="100"></span><br/><br/>
						<span class="text-dark">Surat Ijin Belajar</span>
					</div>
				</div>
			</a>
		</div>
		<div class="col">
            <a href="#">
                <div class="card text-white bg-success mb-3" >
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/student.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Surat Keterangan Kuliah</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>Persyaratan Surat Tugas Belajar</B></div>
					<hr/>
					<table class="table">
						<thead class="thead-light">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Persyaratan</th>
								<th scope="col">Download</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>SK 80 %	</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>SK 100 %</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>SK Pangkat Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>SK Jabatan</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>SKP 2 Tahun Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Rekapan Daftar Hadir 3 (Tiga) Bulan Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Ijazah Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>Surat Ket. Aktif Kuliah / Surat Ket. Lulus</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>Foto Copy Akreditas Kampus</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>Foto Copy Kartu Mahasiswa</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">11</th>
								<td>Surat Keterangan Kesesuaian Kinerja</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">12</th>
								<td>Surat Pernyataan Menanggung Sendiri Biaya Pendidikan / Atau Mendapat Sponsor / Beasiswa</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">13</th>
								<td>Surat Pernyataan Kesediaan Melaporkan Hasil Akademik Setiap Semester</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">14</th>
								<td>Surat Keterangan Tidak Melakukan Pelanggaran Disiplin Tingkat Sedang atau Berat dalam 1 (satu) Tahun Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">15</th>
								<td>Surat Pernyataan tidak Sedang Menduduki Jabatan Fungsiional Maupun Struktural</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">16</th>
								<td>Surat Rekomendasi Dari Kepala OPD</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">17</th>
								<td>Surat Permohonan yang di Tujukan Kepada Bupati Buton Selatan dan Telah di Disposisi</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>Persyaratan Surat Ijin Belajar</B></div>
					<hr/>
					<table class="table">
						<thead class="thead-light">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Persyaratan</th>
								<th scope="col">Download</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>SK 80 %	</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>SK 100 %</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>SK Pangkat Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>SK Jabatan</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>SKP 2 Tahun Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Rekapan Daftar Hadir 3 (Tiga) Bulan Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Ijazah Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>Surat Ket. Aktif Kuliah / Surat Ket. Lulus</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>Surat Pernyataan Menanggung Sendiri Biaya Pendidikan</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>Surat Pernyataan Tidak Akan Menuntut Penyesuaian Ijazah</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">11</th>
								<td>Surat Pernyataan Tidak Melalaikan Tugas Pokok Sebagai PNS</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">12</th>
								<td>Surat Pernyataan Kesediaan Melaporkan Hasil Akademik Setiap Semester</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">13</th>
								<td>Surat Keterangan Tidak Melakukan Pelanggaran Disiplin Tingkat Sedang atau Berat dalam 1 (satu) Tahun Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">14</th>
								<td>Rekomendasi Ijin Belajar dari Kepala Organisasi Perangkat Daerah</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">15</th>
								<td>Surat Permohonan yang Ditujukan Kepada Bupati Buton Selatan dan Telah di Disposisi</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php endif ?>