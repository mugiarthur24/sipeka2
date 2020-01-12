<div class="p-4">
  <div class="card">
    <div class="card-header">
      <h3>Formulir Pensiun Karena Tindak Pidana</h3>
    </div>
    <div class="container">
      <div class="row">
      <div class="col">
        <div class="card card-profile">
        <div class="card-header" style="background-image: url(<?php echo base_url('asset/img/blogpost.jpg'); ?>)">
          <div class="profile-picture">
            <div class="avatar avatar-xxl">
              <?php if (!empty($hasil->foto)): ?>
                <img id="preview" class="avatar-img mr-3 rounded-circle" src="<?php echo base_url('asset/img/pegawai/'.$hasil->foto) ?>" alt="<?php echo $hasil->foto ?>">
              <?php else: ?>
                <img id="preview" class="avatar-img mr-3 rounded-circle" src="<?php echo base_url('asset/img/pegawai/avatar.png') ?>" alt="foto kosong">
              <?php endif ?>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="user-profile text-center">
            <div class="name"><?php echo $hasil->nama_pegawai; ?></div>
            <div class="job">NIP : <?php echo $hasil->nip; ?></div>            
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
        <form action="<?php echo base_url('index.php/admin/cspensiun/pensiunpidana2/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
          <div class="table-responsive">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Persyaratan</th>
                <th scope="col">Upload File</th>
                <th scope="col">Preview</th>
                <th scope="col">Status Doc</th>
                <th scope="col">Ket</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP), ASLI</td>
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
                        <td>FOTO COPY SK CPNS (80%), DILEGALISIR</td>
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
                            <td>FOTO COPY SK CPNS (100%), DILEGALISIR</td>
                            <td><input type="file" name="upload_3"></td>
                            <td>
                              <?php if (@$formupload->upload_3== TRUE): ?>
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
                                <td>FOTO COPY SK KENAIKAN PANGKAT TERAKHIR, DILEGALISIR</td>
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
                                      <span class="<?php echo $veri4->kode_status; ?>"><?php echo $veri5->nm_status; ?></span>
                                      <?php else: ?>
                                        <span class="danger">tidak ada file</span>
                                      <?php endif ?>
                                    </td>
                                    <td><?php echo @$formupload->ket_4; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">5</th>
                                    <td>FOTO COPY KGB TERAKHIR, DILEGALISIR</td>
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
                                    <td>FOTO COPY KARTU PEGAWAI, DILEGALISIR</td>
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
                                    <td>DAFTAR RIWAYAT PEKERJAAN, ASLI</td>
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
                                    <td>FOTO COPY SURAT / AKTA NIKAH, DISAHKAN</td>
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
                                    <td>FOTO COPY KARTU ISTERI / KARTU SUAMI, DISAHKAN</td>
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
                                    <td>FOTO COPY KONVERSI NIP BARU, DISAHKAN</td>
                                    <td><input type="file" name="upload_10"></td>
                                    <td>
                                      <?php if (@$formupload->upload_10 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_10) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                         <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_10 == TRUE && @$formupload->verifikasi10 !==0): ?>
                                          <?php $veri10 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_10); ?>
                                          <span class="<?php echo $veri10->kode_status; ?>"><?php echo $veri10->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_10; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">11</th>
                                    <td>KP-4 TERAKHIR, ASLI</td>
                                    <td><input type="file" name="upload_11"></td>
                                    <td>
                                      <?php if (@$formupload->upload_11 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_11) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_11 == TRUE && @$formupload->verifikasi_11 !==0): ?>
                                          <?php $veri11 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_11); ?>
                                          <span class="<?php echo $veri11->kode_status; ?>"><?php echo $veri11->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_11; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">12</th>
                                    <td>DAFTAR SUSUNAN KELUARGA, ASLI</td>
                                    <td><input type="file" name="upload_12"></td>
                                    <td>
                                      <?php if (@$formupload->upload_12 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_12) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_12 == TRUE && @$formupload->verifikasi_12 !==0): ?>
                                          <?php $veri12 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_12); ?>
                                          <span class="<?php echo $veri12->kode_status; ?>"><?php echo $veri12->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_12; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">13</th>
                                    <td>FOTO COPY KTP PNS + SUAMI / ISTRI, DILEGALISIR</td>
                                    <td><input type="file" name="upload_13"></td>
                                    <td>
                                      <?php if (@$formupload->upload_13 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_13) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_13 == TRUE && @$formupload->verifikasi_13 !==0): ?>
                                          <?php $veri14 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_13); ?>
                                          <span class="<?php echo $veri13->kode_status; ?>"><?php echo $veri13->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_13; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">14</th>
                                    <td>FOTO COPY KARTU KELUARGA, DILEGALISIR</td>
                                    <td><input type="file" name="upload_14"></td>
                                    <td>
                                      <?php if (@$formupload->upload_14 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_14) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_14 == TRUE && @$formupload->verifikasi_14 !==0): ?>
                                          <?php $veri14 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_14); ?>
                                          <span class="<?php echo $veri14->kode_status; ?>"><?php echo $veri14->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_14; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">15</th>
                                    <td>FOTO COPY AKTA KELAHIRAN ANAK (YANG MASIH DI TANGGUNG), DILEGALISIR</td>
                                    <td><input type="file" name="upload_15"></td>
                                    <td>
                                      <?php if (@$formupload->upload_15 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_15) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                         <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_15 == TRUE && @$formupload->verifikasi_15 !==0): ?>
                                          <?php $veri15 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_15); ?>
                                          <span class="<?php echo $veri15->kode_status; ?>"><?php echo $veri15->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_15; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">16</th>
                                    <td>SURAT KET. AKTIF KULIAH (BAGI ANAK TANGGUNGAN YANG MASIH KULIAH), ASLI</td>
                                    <td><input type="file" name="upload_16"></td>
                                    <td>
                                      <?php if (@$formupload->upload_16 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_16) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_16 == TRUE && @$formupload->verifikasi_16 !==0): ?>
                                          <?php $veri16 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_16); ?>
                                          <span class="<?php echo $veri16->kode_status; ?>"><?php echo $veri16->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_16; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">17</th>
                                    <td>FOTO COPY NPWP</td>
                                    <td><input type="file" name="upload_17"></td>
                                    <td>
                                      <?php if (@$formupload->upload_17 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_17) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_17 == TRUE && @$formupload->verifikasi_17 !==0): ?>
                                          <?php $veri17 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_17); ?>
                                          <span class="<?php echo $veri17->kode_status; ?>"><?php echo $veri17->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_17; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">18</th>
                                    <td>FOTO COPY TASPEN</td>
                                    <td><input type="file" name="upload_18"></td>
                                    <td>
                                      <?php if (@$formupload->upload_18 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_18) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_18 == TRUE && @$formupload->verifikasi_18 !==0): ?>
                                          <?php $veri18 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_18); ?>
                                          <span class="<?php echo $veri18->kode_status; ?>"><?php echo $veri18->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_18; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">19</th>
                                    <td>SURAT KET. ANAK KANDUNG (BAGI ANAK TANGGUNGAN YANG DILAHIRKAN IBUNYA BERUSIA 40 TAHUN KEATAS, ASLI</td>
                                    <td><input type="file" name="upload_19"></td>
                                    <td>
                                      <?php if (@$formupload->upload_19 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_19) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_19 == TRUE && @$formupload->verifikasi_19 !==0): ?>
                                          <?php $veri19 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_19); ?>
                                          <span class="<?php echo $veri19->kode_status; ?>"><?php echo $veri19->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_19; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">20</th>
                                    <td>PAS FOTO TERBARU UKURAN 3 X 4 CM WARNA SEBANYAK 12 LEMBAR (PAKAIAN DINAS)</td>
                                    <td><input type="file" name="upload_20"></td>
                                    <td>
                                      <?php if (@$formupload->upload_20 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_20) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_20 == TRUE && @$formupload->verifikasi_20 !==0): ?>
                                          <?php $veri20 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_20); ?>
                                          <span class="<?php echo $veri20->kode_status; ?>"><?php echo $veri20->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_20; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">21</th>
                                    <td>PUTUSAN PENGADILAN YANG TELAH INKRAH</td>
                                    <td><input type="file" name="upload_21"></td>
                                    <td>
                                      <?php if (@$formupload->upload_21 == TRUE): ?>
                                        <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_21) ?>" target="_blank" class="btn btn-success btn-sm w-100">View</a>
                                        <?php else: ?>
                                          <span class="btn btn-secondary btn-sm w-100">View</span>
                                        <?php endif ?>
                                      </td>
                                      <td>
                                        <?php if (@$formupload->verifikasi_21 == TRUE && @$formupload->verifikasi_21 !==0): ?>
                                          <?php $veri21 = $this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_21); ?>
                                          <span class="<?php echo $veri21->kode_status; ?>"><?php echo $veri21->nm_status; ?></span>
                                          <?php else: ?>
                                            <span class="danger">tidak ada file</span>
                                          <?php endif ?>
                                        </td>
                                        <td><?php echo @$formupload->ket_21; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                              <button class="btn btn-danger float-right mt-2">Upload Dokumen</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>