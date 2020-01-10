
<div class="p-4">
  <?php if ($this->ion_auth->in_group(array('admin'))): ?>
    <div class="card">
      <div class="card-header">
        <h3>Formulir Mutasi Pindah Wilayah Kerja (Keluar)</h3>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url('index.php/admin/csmutasi/cpwk_keluar/'.$hasil->nip) ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tgl_masuk" class="form-control border-dark" placeholder="Tanggal Masuk">
                        <small class="form-text text-muted">Isi dengan tanggal masuk pertama kali pada instansi sebelumnya.</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="hidden" name="id_pegawai" value="<?php echo $hasil->id_pegawai ?>">
                        <div class="form-control border-dark"><?php echo $hasil->nama_pegawai; ?></div>
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>NIP</label>
                        <div class="form-control border-dark"><?php echo $hasil->nip; ?></div>
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Pangkat</label>
                         <?php if ($pangkat == TRUE): ?>
                          <input type="hidden" name="id_pangkat" value="<?php echo $pangkat->id_pangkat ?>">
                          <div class="form-control border-success text-success"><?php echo $pangkat->nm_pangkat; ?></div>
                        <?php else: ?>
                          <div class="form-control border-danger text-danger">Data Pangkat belum di isi</div>
                          <small class="form-text text-danger">Harap Isi data jabatan pada menu Kepegawaian->PNS->Data Riwayat Pangkat</small>
                        <?php endif ?>
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Golongan</label>
                        <?php if ($golongan == TRUE): ?>
                           <input type="hidden" name="id_golongan" value="<?php echo $golongan->id_golongan ?>">
                          <div class="form-control border-success text-success"><?php echo $golongan->golongan; ?></div>
                        <?php else: ?>
                          <div class="form-control border-danger text-danger">Data Golongan belum di isi</div>
                          <small class="form-text text-danger">Harap Isi data jabatan pada menu Kepegawaian->PNS->Data Riwayat Golongan</small>
                        <?php endif ?>
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <?php if ($jabatan == TRUE): ?>
                          <input type="hidden" name="id_jabatan" value="<?php echo $jabatan->nm_jabatan ?>">
                          <div class="form-control border-success text-success"><?php echo $jabatan->nm_jabatan; ?></div>
                        <?php else: ?>
                          <div class="form-control border-danger text-danger">Data Jabatan belum di isi</div>
                          <small class="form-text text-danger">Harap Isi data jabatan pada menu Kepegawaian->PNS->Data Riwayat Jabatan</small>
                        <?php endif ?>
                        
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Unit Organisasi Asal</label>
                        <input type="hidden" name="id_satuan_kerja" value="<?php echo $hasil->id_satuan_kerja ?>">
                        <div class="form-control border-dark"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$hasil->id_satuan_kerja)->nama_satuan_kerja; ?></div>
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Tanggal Permohonan</label>
                        <input type="text" name="tgl_permohonan_asal" class="form-control border-dark" placeholder="Tanggal Permohonan">
                        <small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Nomor SK</label>
                        <input type="text" name="no_sk_tujuan" class="form-control border-dark" placeholder="Nomor SK">
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Tanggal SK</label>
                        <input type="text" name="tgl_sk_tujuan" class="form-control border-dark" placeholder="Tanggal SK">
                        <small class="form-text text-muted"></small>
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Pejabat Daerah</label>
                      <input type="text" name="pejabat_daerah" class="form-control border-dark" placeholder="Pejabat Daerah">
                      <small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Pejabat Propinsi</label>
                      <input type="text" name="pejabat_provinsi" class="form-control border-dark" placeholder="Pejabat Provinsi">
                      <small class="form-text text-muted">Hanya dapat menggunakan angka dna huruf</small>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Ibu Kota Provinsi</label>
                      <input type="text" name="ibu_kota_provinsi" class="form-control border-dark" placeholder="Ibu Kota Provinsi">
                      <small class="form-text text-muted">Hanya dapat menggunakan angka dna huruf</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Instansi Lama</label>
                      <input type="text" name="instansi_lama" class="form-control border-dark" placeholder="Instansi Lama">
                      <small class="form-text text-muted">Pilih dari salah satu data diatas</small>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Instansi Baru</label>
                      <input type="text" name="instansi_baru" class="form-control border-dark" placeholder="Instansi Baru">
                      <small class="form-text text-muted">Pilih dari salah satu data diatas</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Tembusan 1</label>
                      <input type="text" name="tembusan_1" class="form-control border-dark" placeholder="Tembusan 1">
                      <small class="form-text text-muted">Hanya dapat menggunakan huruf dan angka</small>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Tembusan 2</label>
                      <input type="text" name="tembusan_2" class="form-control border-dark" placeholder="Tembusan 2">
                      <small class="form-text text-muted">Pilih dari salah satu data diatas</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <?php if ($pangkat == TRUE && $golongan == TRUE && $jabatan == TRUE): ?>
                  <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan data pindah</button>
                  <?php else: ?>
                    <div class="text-danger">* Harap lengkapi data Kepegawaian terlebih dahulu agar dapat melakukan simpan data formulir ini.</div>
                <?php endif ?>
              </div>
        </form>
      </div>
    </div>
  <?php endif ?>

<form action="<?php echo base_url('index.php/admin/csmutasi/cpwk_keluar2/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
  <div class="mt-4">
    <div class="card">
      <div class="card-header">
        <b class="text-primary">Form Upload Dokumen</b>
      </div>
      <div class="card-body">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Persyaratan</th>
                <th scope="col">Upload File</th>
                <th scope="col">View</th>
                <th scope="col" width="15%">Status Doc</th>
                <th scope="col">Ket</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Surat Permohonan (Di Disposisi Bupati)</td>
                <td>
                  <input type="file" name="upload_1">
                </td>
                 <td>
                  <?php if (@$formupload->upload_1 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_1) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_1 == TRUE && @$formupload->verifikasi_1 !==0): ?>
                  <?php $veri1 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_1); ?>
                <span class="<?php echo $veri1->kode_status; ?>"><?php echo $veri1->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
                <td><?php echo @$formupload->ket_1; ?></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>SK Lulus Butuh Asli dari Daerah yang Dituju</td>
                <td><input type="file" name="upload_2"></td>
                 <td>
                  <?php if (@$formupload->upload_2 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_2) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_2 == TRUE && @$formupload->verifikasi_2 !==0): ?>
                  <?php $veri2 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_2); ?>
                <span class="<?php echo $veri2->kode_status; ?>"><?php echo $veri2->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_2; ?></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Foto Copy Kartu Pegawai (Legalisir)</td>
                <td><input type="file" name="upload_3"></td>
                 <td>
                  <?php if (@$formupload->upload_3 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_3) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_3 == TRUE && @$formupload->verifikasi_3 !==0): ?>
                  <?php $veri3 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_3); ?>
                <span class="<?php echo $veri3->kode_status; ?>"><?php echo $veri3->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_3; ?></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Foto Copy CPNS/80% (Legalisir)</td>
                <td><input type="file" name="upload_4"></td>
                 <td>
                  <?php if (@$formupload->upload_4 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_4) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_4 == TRUE && @$formupload->verifikasi_4 !==0): ?>
                  <?php $veri4 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_4); ?>
                <span class="<?php echo $veri4->kode_status; ?>"><?php echo $veri4->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_4; ?></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Foto Copy PNS/100% (Legalisir)</td>
                <td><input type="file" name="upload_5"></td>
                 <td>
                  <?php if (@$formupload->upload_5 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_5) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_5 == TRUE && @$formupload->verifikasi_5 !==0): ?>
                  <?php $veri5 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_5); ?>
                <span class="<?php echo $veri5->kode_status; ?>"><?php echo $veri5->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_5; ?></td>
              </tr>

              <tr>
                <th scope="row">6</th>
                <td>Foto SK Pangkat Terakhir (legalisir)</td>
                <td><input type="file" name="upload_6"></td>
                 <td>
                  <?php if (@$formupload->upload_6 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_6) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_6 == TRUE && @$formupload->verifikasi_6 !==0): ?>
                  <?php $veri6 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_6); ?>
                <span class="<?php echo $veri6->kode_status; ?>"><?php echo $veri6->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_6; ?></td>
              </tr>

              <tr>
                <th scope="row">7</th>
                <td>Foto Copy Pelantikan Terakhir (bagi yang menduduki jabatan (Legalisir)</td>
                <td><input type="file" name="upload_7"></td>
                 <td>
                  <?php if (@$formupload->upload_7 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_7) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_7 == TRUE && @$formupload->verifikasi_7 !==0): ?>
                  <?php $veri7 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_7); ?>
                <span class="<?php echo $veri7->kode_status; ?>"><?php echo $veri7->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_7; ?></td>
              </tr>

              <tr>
                <th scope="row">8</th>
                <td>SKP Asli 2 Tahun Terakhir (Legalisir)</td>
                <td><input type="file" name="upload_8"></td>
                 <td>
                  <?php if (@$formupload->upload_8 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_8) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_8 == TRUE && @$formupload->verifikasi_8 !==0): ?>
                  <?php $veri8 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_8); ?>
                <span class="<?php echo $veri8->kode_status; ?>"><?php echo $veri8->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_8; ?></td>
              </tr>

              <tr>
                <th scope="row">9</th>
                <td>Foto Copy Ijazah Terakhir (Legalisir)</td>
                <td><input type="file" name="upload_9"></td>
                 <td>
                  <?php if (@$formupload->upload_9 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_9) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_9 == TRUE && @$formupload->verifikasi_9 !==0): ?>
                  <?php $veri9 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_9); ?>
                <span class="<?php echo $veri9->kode_status; ?>"><?php echo $veri9->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_9; ?></td>
              </tr>

              <tr>
                <th scope="row">10</th>
                <td>Foto Copy SK Tugas Suami/Istri (Legalisir) bagi yang ikut suami</td>
                <td><input type="file" name="upload_10"></td>
                 <td>
                  <?php if (@$formupload->upload_10 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_10) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm w-100">View</span>
                  <?php endif ?>
              </td>
                <td>
                <?php if (@$formupload->verifikasi_10 == TRUE && @$formupload->verifikasi_10 !==0): ?>
                  <?php $veri10 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_10); ?>
                <span class="<?php echo $veri10->kode_status; ?>"><?php echo $veri10->nm_status; ?></span>
                <?php else: ?>
                  <span class="danger">tidak ada file</span>
                <?php endif ?>
              </td>
              <td><?php echo @$formupload->ket_10; ?></td>
              </tr>
            </tbody>
          </table>
          <button type="submit" value="submit" name="submit" class="btn btn-primary float-right mt-2">Upload Dokumen</button>
        </form>
      </div>
    </div>
  </div>
</div>
