
<div class="p-4">

  <div class="card">
    <div class="card-header">
      <h3>Form Pemberhentian PNS</h3>
    </div>
    <div class="card-body">
      <form action="<?php echo base_url('index.php/admin/csmutasi/cpwk_keluar/'.$hasil->nip) ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
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
                <label>Jabatan Lama</label>
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
                  <label>Jenis Jabatan</label>
                  <select class="form-control border-dark" name="id_jenis_jabatan">
                    <?php foreach ($jns_jabatan as $data): ?>
                      <option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Jabatan Baru</label>
                  <input type="text" class="form-control border-dark" id="id_jabatan" name="nm_jabatan" placeholder="Nama Jabatan">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Nomor SK</label>
                  <input type="text" name="no_sk_tujuan" class="form-control border-dark" placeholder="Nomor SK">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                  <th scope="col">Berkas</th>
                  <th scope="col">Upload</th>
                  <th scope="col">View</th>
                  <th scope="col" width="15%">Status</th>
                  <th scope="col">Ket</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>SK</td>
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
                  </tbody>
                </table>
                <button type="submit" value="submit" name="submit" class="btn btn-primary float-right mt-2">Simpan Data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
