<?php if ($this->ion_auth->is_admin()): ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/csmutasi/pwk_masuk/') ?>">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/cabinet.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pindah Wilayah Kerja (Masuk)</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/csmutasi/pwk_keluar/') ?>">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/teamwork.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pindah Wilayah Kerja (Keluar)</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/csmutasi/pindahinstansi_main/') ?>">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/hotel.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pindah Instansi</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="#">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/contract.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Nota Tugas</span>
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
            <a href="<?php echo base_url('index.php/admin/csmutasi/pwk_keluar/') ?>">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/teamwork.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pindah Wilayah Kerja (Keluar)</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/csmutasi/pindah_instansi/') ?>">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/hotel.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pindah Instansi</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="#">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/contract.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Nota Tugas</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>Persyaratan Pindah Wilayah Kerja (Masuk)</B></div>
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
								<td>Surat Permohonan (Di Disposisi Bupati)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Foto Copy Kartu Pegawai (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Foto Copy SK PNS 80% (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Foto Copy SK PNS 100% (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Foto Copy SK Pangkat Terakhir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Foto Copy SK Pelantikan Di Legalisir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>SKP Asli 2 Tahun Terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>Foto Copy Ijazah Terakhir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>Foto Copy SK Tugas Suami/Istri yang Dilegalisir (Kalau Ada)</td>
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
					<div align="text-center"><B>Persyaratan Pindah Wilayah Kerja (Keluar)</B></div>
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
								<td>Surat Permohonan (Di Disposisi Bupati)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>SK Lulus Butuh Asli dari Daerah yang Dituju</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Foto Copy Kartu Pegawai (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Foto Copy CPNS/80% (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Foto Copy PNS/100% (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Foto SK Pangkat Terakhir (legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Foto Copy Pelantikan Terakhir (bagi yang menduduki jabatan (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>SKP Asli 2 Tahun Terakhir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>Foto Copy Ijazah Terakhir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>Foto Copy SK Tugas Suami/Istri (Legalisir) bagi yang ikut suami</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>Persyaratan Pindah Instansi</B></div>
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
								<td>Foto Copy SK BKN/Gubernur (Di Disposisi Bupati)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>SK Lulus Bupati Asli</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>SK Pelepasan Asli</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Foto Copy Kartu Pegawai (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Foto Copy SK CPNS/80% (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Foto Copy SK PNS/100% (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Foto Copy SK Pangkat Terakhir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>Foto Copy Pelantikan Terakhir (bagi yang menduduki jabatan) (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>SKP Asli 2 Tahun Terakhir (Legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>Foto Copy Ijazah Terakhir (legalisir)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">11</th>
								<td>Surat Pernyataan dari Pimpinan (siap menerima) Bagi Tenaga Guru lampirkan data SALK</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		<div class="col">
			
		</div>

	</div>
</div>

 <?php endif ?>