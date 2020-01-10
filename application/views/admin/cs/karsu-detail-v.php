<div class="p-4">
	<div class="card mt-4">
		<div class="card-header">
			<b class="text-primary">Detail Pegawai</b>
		</div>
		<div class="card-body">
			
		</div>
	</div>

<div class="mt-4">
  <div class="card">
    <div class="card-header">
      <b class="text-primary">Form Upload Dokumen</b>
    </div>
    <div class="card-body">
    	<?php if ($formupload == FALSE): ?>
    		<div class="alert alert-danger">
    			<b>Perhatian</b><br>Pegawai ini belum melakukan upload file sama sekali
    		</div>
    	<?php endif ?>
      <form action="<?php echo base_url('index.php/admin/cskartu/karsu_action/'.$pegawai->id_pegawai) ?>" method="post" enctype='multipart/form-data'>
        <div class="table-responsive">
       <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Persyaratan</th>
                <th scope="col">Upload File</th>
                <th scope="col">Preview</th>
                <th scope="col">Status Doc</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Surat Pengantar dari Instansi/BKD/BKPP/Kantor Kepegawaian Daerah</td>
                <td>
                  <input type="file" name="upload_1">
                </td>
                 <td>
                  <?php if (@$formupload->upload_1 == TRUE): ?>
                    <a href="<?php echo base_url('asset/dokumen/'.$formupload->upload_1) ?>" target="_blank" class="btn btn-danger btn-sm w-100">View</a>
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
              <td>
                <select name="action1">
                  <option value="<?php $formupload->verifikasi_1 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_1)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket1" placeholder="keterangan"><?php echo $formupload->ket_1; ?></textarea>
              </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Mengisi formulir laporan perkawinan pertama sesuai SE Ka.BAKN Nomor : 08/SE/1983, tanggal 26 April 1983 Lampiran I-A</td>
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
               <td>
                <select name="action2">
                  <option value="<?php $formupload->verifikasi_2 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_2)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket2" placeholder="keterangan"><?php echo $formupload->ket_2; ?></textarea>
              </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Salinan/Foto Copy Sah Akta Nikah</td>
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
               <td>
                <select name="action3">
                  <option value="<?php $formupload->verifikasi_3 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_3)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket3" placeholder="keterangan"><?php echo $formupload->ket_3; ?></textarea>
              </td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Salinan/Foto Copy Sah susunan daftar keluarga PNS</td>
                <td><input type="file" name="upload_4"></td>
                 <td>
                  <?php if (@$formupload->upload_4== TRUE): ?>
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
               <td>
                <select name="action4">
                  <option value="<?php $formupload->verifikasi_4 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_4)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket4" placeholder="keterangan"><?php echo $formupload->ket_4; ?></textarea>
              </td>
              </tr>

              <tr>
                <th scope="row">5</th>
                <td>Salinan/Foto Copy Sah Kartu Pegawai ( KARPEG )</td>
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
               <td>
                <select name="action5">
                  <option value="<?php $formupload->verifikasi_5 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_5)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket5" placeholder="keterangan"><?php echo $formupload->ket_5; ?></textarea>
              </td>
              </tr>

              <tr>
                <th scope="row">6</th>
                <td>Salinan/Foto Copy sah SK kenaikan Pangkat terakhir</td>
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
               <td>
                <select name="action6">
                  <option value="<?php $formupload->verifikasi_5 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_6)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket6" placeholder="keterangan"><?php echo $formupload->ket_6; ?></textarea>
              </td>
              </tr>

              <tr>
                <th scope="row">7</th>
                <td>Phas foto ukuran 2 x 3 sebanyak 3 (tiga) lembar</td>
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
               <td>
                <select name="action7">
                  <option value="<?php $formupload->verifikasi_7 ?>">-- <?php echo @$this->Admin_m->detail_data_order('status','id_status',$formupload->verifikasi_7)->nm_status; ?> --</option>
                  <?php foreach ($dtsts as $key): ?>
                    <option value="<?php echo $key->id_status ?>"><?php echo $key->nm_status ?></option>
                  <?php endforeach ?>
                </select>
                <textarea name="ket7" placeholder="keterangan"><?php echo $formupload->ket_7; ?></textarea>
              </td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-danger float-right mt-2">Save Dokumen</button>
      </form>
    </div>
  </div>
</div>
</div>