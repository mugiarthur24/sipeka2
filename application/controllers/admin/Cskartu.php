<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cskartu extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Kartu_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                    $data['title'] = 'Kartu Pegawai '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/kartu-v';
                // pagging setting
                    $this->load->view('admin/dashboard-v',$data);
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karpeg_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cskartu/karpeg_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Kartu Pegawai '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_karpeg');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/karpeg-main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsu_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cskartu/karsu_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Kartu Istri '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_karsu');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/karsu-main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsi_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cskartu/karsi_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Kartu Istri '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_karsi');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/karsi-main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tambah_karpeg($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                if ($datauser->cs_mutasi == 0) {
                    $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/dashboard'));
                }else{
                    $post = $this->input->get();
                    $data['title'] = 'Tambah Data'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Mutasi_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Mutasi_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Mutasi_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/karpeg-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);
                }

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karpeg_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karpeg','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Kartu Pegawai'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Kartu_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Kartu_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Kartu_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/karpeg-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsu_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsu','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Kartu Suami'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Kartu_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Kartu_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Kartu_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/karsu-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsi_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsi','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Kartu Istri'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Kartu_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Kartu_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Kartu_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/karsi-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function caripegawai(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Kartu_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cskartu/karpeg_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripegawaikarsu(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Kartu_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cskartu/karsu_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripegawaikarsi(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Kartu_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cskartu/karsi_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripegawaipensiun(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Mutasi_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/csmutasi/pensiun_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function update_stat_verif_pwkm(){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $data = array('status' => $post['id_status']);
                $this->Admin_m->update('data_pidah_wilayah_kerja_masuk','id_pindah_wilayah_kerja_masuk',$post['id_pindah_wilayah_kerja_masuk'],$data);

                $pesan = 'Dokumen Berhasil ditambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/detail_pwk_m/'.$post['id_pindah_wilayah_kerja_masuk']));

                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karpeg2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karpeg','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_karpeg',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_karpeg','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_1')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_1'] = $img;
                        $data['verifikasi_1'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_2')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img2 = $this->upload->data('file_name');
                        $data['upload_2'] = $img2;
                         $data['verifikasi_2'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-fcsk2'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_3')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img3 = $this->upload->data('file_name');
                        $data['upload_3'] = $img3;
                         $data['verifikasi_3'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_4')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img4 = $this->upload->data('file_name');
                        $data['upload_4'] = $img4;
                         $data['verifikasi_4'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_5')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img5 = $this->upload->data('file_name');
                        $data['upload_5'] = $img5;
                         $data['verifikasi_5'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-formulir'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_6')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img6 = $this->upload->data('file_name');
                        $data['upload_6'] = $img6;
                         $data['verifikasi_6'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-sttpp2'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_7')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img7 = $this->upload->data('file_name');
                        $data['upload_7'] = $img7;
                         $data['verifikasi_7'] = '1';
                        $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$data);
                    }
                }
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cskartu/karpeg_tambah/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsi2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsi','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_karsi',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsi','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-sp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_1')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_1'] = $img;
                        $data['verifikasi_1'] = '1';
                        $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-formulir'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_2')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img2 = $this->upload->data('file_name');
                        $data['upload_2'] = $img2;
                         $data['verifikasi_2'] = '1';
                        $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-akta'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_3')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img3 = $this->upload->data('file_name');
                        $data['upload_3'] = $img3;
                         $data['verifikasi_3'] = '1';
                        $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-fcpns'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_4')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img4 = $this->upload->data('file_name');
                        $data['upload_4'] = $img4;
                         $data['verifikasi_4'] = '1';
                        $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-fckarpeg'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_5')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img5 = $this->upload->data('file_name');
                        $data['upload_5'] = $img5;
                         $data['verifikasi_5'] = '1';
                        $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-fcpangkat'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_6')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img6 = $this->upload->data('file_name');
                        $data['upload_6'] = $img6;
                         $data['verifikasi_6'] = '1';
                       $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_7')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img7 = $this->upload->data('file_name');
                        $data['upload_7'] = $img7;
                         $data['verifikasi_7'] = '1';
                        $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$data);
                    }
                }
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cskartu/karsi_tambah/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsu2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsu','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_karsu',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsu','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-sp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_1')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_1'] = $img;
                        $data['verifikasi_1'] = '1';
                        $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-formulir'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_2')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img2 = $this->upload->data('file_name');
                        $data['upload_2'] = $img2;
                         $data['verifikasi_2'] = '1';
                        $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-akta'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_3')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img3 = $this->upload->data('file_name');
                        $data['upload_3'] = $img3;
                         $data['verifikasi_3'] = '1';
                        $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-fcpns'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_4')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img4 = $this->upload->data('file_name');
                        $data['upload_4'] = $img4;
                         $data['verifikasi_4'] = '1';
                        $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-fckarpeg'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_5')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img5 = $this->upload->data('file_name');
                        $data['upload_5'] = $img5;
                         $data['verifikasi_5'] = '1';
                        $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-fcpangkat'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_6')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img6 = $this->upload->data('file_name');
                        $data['upload_6'] = $img6;
                         $data['verifikasi_6'] = '1';
                       $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_7')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img7 = $this->upload->data('file_name');
                        $data['upload_7'] = $img7;
                         $data['verifikasi_7'] = '1';
                        $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$data);
                    }
                }
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cskartu/karsu_tambah/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_karpeg($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cskartu/karpeg_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_karpeg','id_form_karpeg',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_karpeg','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detail Kartu Pegawai - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/karpeg-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_karsi($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cskartu/karsi_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_karsi','id_form_karsi',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_karsi','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detail Kartu Istri - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/karsi-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_karsu($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cskartu/karsu_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_karsu','id_form_karsu',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_karsu','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detail Kartu Suami - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/karsu-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karpeg_action($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karpeg','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_1')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img = $this->upload->data('file_name');
                            $datass['upload_1'] = $img;
                        }
                    }
                    // upload 2
                    if (!empty($_FILES["upload_2"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_2')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img2 = $this->upload->data('file_name');
                            $datass['upload_2'] = $img2;
                        }
                    }
                    // upload 3
                    if (!empty($_FILES["upload_3"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-fcsk2'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_3')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img3 = $this->upload->data('file_name');
                            $datass['upload_3'] = $img3;
                        }
                    }
                    // upload 4
                    if (!empty($_FILES["upload_4"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_4')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img4 = $this->upload->data('file_name');
                            $datass['upload_4'] = $img4;
                        }
                    }
                    // upload 5
                    if (!empty($_FILES["upload_5"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_5')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img5 = $this->upload->data('file_name');
                            $datass['upload_5'] = $img5;
        
                        }
                    }
                    // upload 6
                    if (!empty($_FILES["upload_6"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_6')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img6 = $this->upload->data('file_name');
                            $datass['upload_6'] = $img6;
        
                        }
                    }
                    // upload 7
                    if (!empty($_FILES["upload_7"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karpeg'.'-'.$getpegawai->nip.'-sttpp2'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_7')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img7 = $this->upload->data('file_name');
                            $datass['upload_7'] = $img7;
        
                        }
                    }
                    if ($post['action1'] == TRUE) {
                         $datass['verifikasi_1'] = $post['action1'];
                    }
                    if ($post['action2'] == TRUE) {
                         $datass['verifikasi_2'] = $post['action2'];
                    }
                    if ($post['action3'] == TRUE) {
                         $datass['verifikasi_3'] = $post['action3'];
                    }
                    if ($post['action4'] == TRUE) {
                         $datass['verifikasi_4'] = $post['action4'];
                    }
                    if ($post['action5'] == TRUE) {
                         $datass['verifikasi_5'] = $post['action5'];
                    }
                    if ($post['action6'] == TRUE) {
                         $datass['verifikasi_6'] = $post['action6'];
                    }
                    if ($post['action7'] == TRUE) {
                         $datass['verifikasi_7'] = $post['action7'];
                    }
                    $datass['ket_1'] = $post['ket1'];
                    $datass['ket_2'] = $post['ket2'];
                    $datass['ket_3'] = $post['ket3'];
                    $datass['ket_4'] = $post['ket4'];
                    $datass['ket_5'] = $post['ket5'];
                    $datass['ket_6'] = $post['ket6'];
                    $datass['ket_7'] = $post['ket7'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_karpeg','id_form_karpeg',$cekfomupload->id_form_karpeg,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cskartu/detail_karpeg/'.$cekfomupload->id_form_karpeg));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsi_action($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsi','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_1')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img = $this->upload->data('file_name');
                            $datass['upload_1'] = $img;
                        }
                    }
                    // upload 2
                    if (!empty($_FILES["upload_2"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_2')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img2 = $this->upload->data('file_name');
                            $datass['upload_2'] = $img2;
                        }
                    }
                    // upload 3
                    if (!empty($_FILES["upload_3"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-fcsk2'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_3')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img3 = $this->upload->data('file_name');
                            $datass['upload_3'] = $img3;
                        }
                    }
                    // upload 4
                    if (!empty($_FILES["upload_4"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_4')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img4 = $this->upload->data('file_name');
                            $datass['upload_4'] = $img4;
                        }
                    }
                    // upload 5
                    if (!empty($_FILES["upload_5"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_5')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img5 = $this->upload->data('file_name');
                            $datass['upload_5'] = $img5;
        
                        }
                    }
                    // upload 6
                    if (!empty($_FILES["upload_6"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_6')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img6 = $this->upload->data('file_name');
                            $datass['upload_6'] = $img6;
        
                        }
                    }
                    // upload 7
                    if (!empty($_FILES["upload_7"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsi'.'-'.$getpegawai->nip.'-sttpp2'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_7')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img7 = $this->upload->data('file_name');
                            $datass['upload_7'] = $img7;
        
                        }
                    }
                    if ($post['action1'] == TRUE) {
                         $datass['verifikasi_1'] = $post['action1'];
                    }
                    if ($post['action2'] == TRUE) {
                         $datass['verifikasi_2'] = $post['action2'];
                    }
                    if ($post['action3'] == TRUE) {
                         $datass['verifikasi_3'] = $post['action3'];
                    }
                    if ($post['action4'] == TRUE) {
                         $datass['verifikasi_4'] = $post['action4'];
                    }
                    if ($post['action5'] == TRUE) {
                         $datass['verifikasi_5'] = $post['action5'];
                    }
                    if ($post['action6'] == TRUE) {
                         $datass['verifikasi_6'] = $post['action6'];
                    }
                    if ($post['action7'] == TRUE) {
                         $datass['verifikasi_7'] = $post['action7'];
                    }
                    $datass['ket_1'] = $post['ket1'];
                    $datass['ket_2'] = $post['ket2'];
                    $datass['ket_3'] = $post['ket3'];
                    $datass['ket_4'] = $post['ket4'];
                    $datass['ket_5'] = $post['ket5'];
                    $datass['ket_6'] = $post['ket6'];
                    $datass['ket_7'] = $post['ket7'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_karsi','id_form_karsi',$cekfomupload->id_form_karsi,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cskartu/detail_karsi/'.$cekfomupload->id_form_karsi));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function karsu_action($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_karsu','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_1')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img = $this->upload->data('file_name');
                            $datass['upload_1'] = $img;
                        }
                    }
                    // upload 2
                    if (!empty($_FILES["upload_2"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_2')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img2 = $this->upload->data('file_name');
                            $datass['upload_2'] = $img2;
                        }
                    }
                    // upload 3
                    if (!empty($_FILES["upload_3"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-fcsk2'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_3')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img3 = $this->upload->data('file_name');
                            $datass['upload_3'] = $img3;
                        }
                    }
                    // upload 4
                    if (!empty($_FILES["upload_4"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_4')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img4 = $this->upload->data('file_name');
                            $datass['upload_4'] = $img4;
                        }
                    }
                    // upload 5
                    if (!empty($_FILES["upload_5"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_5')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img5 = $this->upload->data('file_name');
                            $datass['upload_5'] = $img5;
        
                        }
                    }
                    // upload 6
                    if (!empty($_FILES["upload_6"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_6')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img6 = $this->upload->data('file_name');
                            $datass['upload_6'] = $img6;
        
                        }
                    }
                    // upload 7
                    if (!empty($_FILES["upload_7"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karsu'.'-'.$getpegawai->nip.'-sttpp2'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_7')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img7 = $this->upload->data('file_name');
                            $datass['upload_7'] = $img7;
        
                        }
                    }
                    if ($post['action1'] == TRUE) {
                         $datass['verifikasi_1'] = $post['action1'];
                    }
                    if ($post['action2'] == TRUE) {
                         $datass['verifikasi_2'] = $post['action2'];
                    }
                    if ($post['action3'] == TRUE) {
                         $datass['verifikasi_3'] = $post['action3'];
                    }
                    if ($post['action4'] == TRUE) {
                         $datass['verifikasi_4'] = $post['action4'];
                    }
                    if ($post['action5'] == TRUE) {
                         $datass['verifikasi_5'] = $post['action5'];
                    }
                    if ($post['action6'] == TRUE) {
                         $datass['verifikasi_6'] = $post['action6'];
                    }
                    if ($post['action7'] == TRUE) {
                         $datass['verifikasi_7'] = $post['action7'];
                    }
                    $datass['ket_1'] = $post['ket1'];
                    $datass['ket_2'] = $post['ket2'];
                    $datass['ket_3'] = $post['ket3'];
                    $datass['ket_4'] = $post['ket4'];
                    $datass['ket_5'] = $post['ket5'];
                    $datass['ket_6'] = $post['ket6'];
                    $datass['ket_7'] = $post['ket7'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_karsu','id_form_karsu',$cekfomupload->id_form_karsu,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cskartu/detail_karsu/'.$cekfomupload->id_form_karsu));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }


}
?>
