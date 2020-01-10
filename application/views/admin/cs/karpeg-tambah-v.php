
<div class="p-4">
  <div class="card">
    <div class="card-header">
      <h3>Formulir Kartu Pegawai</h3>
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
        <form action="<?php echo base_url('index.php/admin/cskartu/karpeg2/'.$hasil->id_pegawai) ?>" method="post" enctype="multipart/form-data">
          <div class="table-responsive">
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
                <td>Surat Pengantar dari Instansi / BKD</td>
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
                <td>Salinan/ Foto Copy Sah SK CPNS</td>
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
                <td>Salinan/Foto Copy Sah SK PNS</td>
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
                <td>Pas Photo Ukuran 2 x 3 sebanyak 3 (tiga) lembar</td>
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
                <td>Salinan/Foto Copy Sah Surat Tanda Tamat Pelatihan Prajabatan ( STTPP )</td>
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
                <td>Mengisi formulir permintaan penggantian Kartu Pegawai ( KARPEG ) sesuai Edaran Kepala BAKN Nomor : 01/SE/1975, tanggal 9 Januari 1975 Lampiran XI (* Dilampirkan untuk pergantian KARPEG)</td>
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
                <td>Salinan/Foto Copy Sah SK Kenaikan Pangkat Terakhir (* Dilampirkan untuk pergantian KARPEG)</td>
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
            </tbody>
          </table>
        </div>
          <button type="submit" name="submit" value="submit" class="btn btn-danger float-right mt-2">Upload Dokumen</button>
        </form>
      </div>
    </div>
  </div>
</div>
