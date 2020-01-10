<?php if ($this->ion_auth->is_admin()): ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karsu_main/') ?>">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card_1.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Kartu Suami (KARSU)</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karsi_main/') ?>">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Kartu Istri (KARSI)</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karpeg_main/') ?>">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Kartu Pegawai (KARPEG)</span>
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
            <a href="<?php echo base_url('index.php/admin/cskartu/karsu_main/') ?>">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card_1.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Kartu Suami (KARSU)</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karsi_main/') ?>">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Kartu Istri (KARSI)</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karpeg_main/') ?>">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Kartu Pegawai (KARPEG)</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>SYARAT-SYARAT KARSU dan KARSI</B></div>
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
								<td>Surat Pengantar dari Instansi/BKD/BKPP/Kantor Kepegawaian Daerah</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Mengisi formulir laporan perkawinan pertama sesuai SE Ka.BAKN Nomor : 08/SE/1983, tanggal 26 April 1983 Lampiran I-A</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Salinan/Foto Copy Sah Akta Nikah</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Salinan/Foto Copy Sah susunan daftar keluarga PNS</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Salinan/Foto Copy Sah Kartu Pegawai ( KARPEG )</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Salinan/Foto Copy sah SK kenaikan Pangkat terakhir</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Phas foto ukuran 2 x 3 sebanyak 3 (tiga) lembar</td>
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
					<div align="text-center"><B>SYARAT-SYARAT KARPEG</B></div>
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
								<td>Surat Pengantar dari Instansi / BKD</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Salinan/ Foto Copy Sah SK CPNS</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Salinan/Foto Copy Sah SK PNS</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Pas Photo Ukuran 2 x 3 sebanyak 3 (tiga) lembar</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Salinan/Foto Copy Sah Surat Tanda Tamat Pelatihan Prajabatan ( STTPP )</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Mengisi formulir permintaan penggantian Kartu Pegawai ( KARPEG ) sesuai Edaran Kepala BAKN Nomor : 01/SE/1975, tanggal 9 Januari 1975 Lampiran XI (* Dilampirkan untuk pergantian KARPEG)</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Salinan/Foto Copy Sah SK Kenaikan Pangkat Terakhir (* Dilampirkan untuk pergantian KARPEG)</td>
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