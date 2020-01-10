<?php if ($this->ion_auth->is_admin()): ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cspensiun/pensiun_main/') ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/employee.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pensiun Dini</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cspensiun/pensiunbup_main/') ?>">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/employees.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Batas Usia Pensiun (BUP)</span>
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
            <a href="<?php echo base_url('index.php/admin/cspensiun/pensiun_main/') ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/employee.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pensiun Dini</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cspensiun/pensiunbup_main/') ?>">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/employees.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Batas Usia Pensiun (BUP)</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>SYARAT-SYARAT PENSIUN DINI</B></div>
					<hr/>
					<div class="table-responsive">
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
								<td>DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP), ASLI</td>
								<td><a href="<?php echo base_url('index.php/admin/pegawai/lap_dpcp/'.@$hasil->id_pegawai) ?>">Download</a></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>SURAT REKOMENDASI/SURAT KEPUTUSAN YANG DI TTD BUPATI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>FOTO COPY SK CPNS (80%), DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>FOTO COPY SK CPNS (100%), DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>FOTO COPY SK KENAIKAN PANGKAT TERAKHIR, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>FOTO COPY KGB TERAKHIR, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>FOTO COPY KARTU PEGAWAI, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>DP-3/SKP 1 TAHUN TERAHIR, ASLI</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>DAFTAR RIWAYAT PEKERJAAN, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>SURAT PERNYATAAN TIDAK PERNAH DIJATUHI HUKUMAN DISIPLIN TINGKAT SEDANG/BERAT, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">11</th>
								<td>SURAT PERNYATAAN TIDAK SEDANG MENJALANI PROSES PIDANA ATAU PERNAH DIPIDANA PENJARA BERDASARKAN PUTUSAN PENGADILAN YANG TELAH BERKEKUATAN HUKUM TETAP DI INSPEKTORAT, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">12</th>
								<td>FOTO COPY SURAT / AKTA NIKAH, DISAHKAN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">13</th>
								<td>FOTO COPY KARTU ISTERI / KARTU SUAMI, DISAHKAN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">14</th>
								<td>FOTO COPY KONVERSI NIP BARU, DISAHKAN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">15</th>
								<td>KP-4 TERAKHIR, ASLI</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">16</th>
								<td>DAFTAR SUSUNAN KELUARGA, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">17</th>
								<td>FOTO COPY KTP PNS + SUAMI / ISTRI, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">18</th>
								<td>FOTO COPY KARTU KELUARGA, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">19</th>
								<td>FOTO COPY NPWP</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">20</th>
								<td>FOTO COPY AKTA KELAHIRAN ANAK (YANG MASIH DI TANGGUNG), DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">21</th>
								<td>SURAT KET. AKTIF KULIAH (BAGU ANAK TANGGUNGAN YANG MASIH KULIAH, ASLI</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">22</th>
								<td>FOTO COPY TASPEN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">23</th>
								<td>SURAT KET. ANAK KANDUNG (BAGI ANAK TANGGUNGAN YANG DILAHIRKAN IBUNYA BERUSIA 40 TAHUN KEATAS, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">24</th>
								<td>PAS FOTO TERBARU UKURAN 3 X 4 CM WARNA SEBANYAK 12 LEMBAR (PAKAIAN DINAS)</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div align="text-center"><B>SYARAT-SYARAT PENSIUN BATAS USIA PENSIUN (BUP)</B></div>
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
								<td>DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP), ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>FOTO COPY SK CPNS (80%), DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>FOTO COPY SK CPNS (100%), DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>FOTO COPY SK KENAIKAN PANGKAT TERAKHIR, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>FOTO COPY KGB TERAKHIR, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>FOTO COPY KARTU PEGAWAI, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>DP-3/SKP 1 TAHUN TERAHIR, ASLI</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>DAFTAR RIWAYAT PEKERJAAN, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>SURAT PERNYATAAN TIDAK PERNAH DIJATUHI HUKUMAN DISIPLIN TINGKAT SEDANG/BERAT, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>SURAT PERNYATAAN TIDAK SEDANG MENJALANI PROSES PIDANA ATAU PERNAH DIPIDANA PENJARA BERDASARKAN PUTUSAN PENGADILAN YANG TELAH BERKEKUATAN HUKUM TETAP DI INSPEKTORAT, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">11</th>
								<td>FOTO COPY SURAT / AKTA NIKAH, DISAHKAN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">12</th>
								<td>FOTO COPY KARTU ISTERI / KARTU SUAMI, DISAHKAN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">13</th>
								<td>FOTO COPY KONVERSI NIP BARU, DISAHKAN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">14</th>
								<td>KP-4 TERAKHIR, ASLI</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">15</th>
								<td>DAFTAR SUSUNAN KELUARGA, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">16</th>
								<td>FOTO COPY KTP PNS + SUAMI / ISTRI, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">17</th>
								<td>FOTO COPY KARTU KELUARGA, DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">18</th>
								<td>FOTO COPY NPWP</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">19</th>
								<td>FOTO COPY AKTA KELAHIRAN ANAK (YANG MASIH DI TANGGUNG), DILEGALISIR</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">20</th>
								<td>SURAT KET. AKTIF KULIAH (BAGU ANAK TANGGUNGAN YANG MASIH KULIAH, ASLI</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">21</th>
								<td>FOTO COPY TASPEN</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">22</th>
								<td>SURAT KET. ANAK KANDUNG (BAGI ANAK TANGGUNGAN YANG DILAHIRKAN IBUNYA BERUSIA 40 TAHUN KEATAS, ASLI</td>
								<td>Download</td>
							</tr>
							<tr>
								<th scope="row">23</th>
								<td>PAS FOTO TERBARU UKURAN 3 X 4 CM WARNA SEBANYAK 12 LEMBAR (PAKAIAN DINAS)</td>
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