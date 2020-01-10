<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csmutasi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Mutasi_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                    $data['title'] = 'Mutasi '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/mutasi-v';
                // pagging setting
                    $this->load->view('admin/dashboard-v',$data);
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pwk_masuk(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $data['title'] = 'Customer Service Mutasi '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                    $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                    $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                    $data['hasil'] = $this->Mutasi_m->get_pwkm();
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/mutasi-pwk-masuk-main-v';
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
    public function cetak_konsideran_bupati_masuk($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Mutasi_m->detail_mutasi($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                // pagging setting
                $this->load->view('admin/cetak-konsideran-bupati-masuk',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function ctk_pwkm($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Mutasi_m->detail_mutasi($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nm_pegawai;
                $data['hasil'] = $result;
                // pagging setting
                $this->load->view('admin/cs/cetak-konsideran-bupati-masuk',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function ctk_pwkk($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Mutasi_m->detail_mutasi($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nm_pegawai;
                $data['hasil'] = $result;
                // pagging setting
                $this->load->view('admin/cs/cetak-konsideran-bupati-keluar',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pwk_keluar(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/csmutasi/tambah_pwk_keluar/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Layanan Mutasi '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_pwkkeluar');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/mutasi-pwk-keluar-main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pindah_instansi(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/csmutasi/pindahinstansi_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Layanan Mutasi '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_pindahinstansi');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pindahinstansi_main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pwk_keluar($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/csmutasi/tambah_pwk_keluar/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_pwkkeluar','id_form_pwkkeluar',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detai Mutasi Keluar - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['pangkat'] = $this->Mutasi_m->last_pangkat($datapegawai->id_pegawai);
                $data['golongan'] = $this->Mutasi_m->last_golongan($datapegawai->id_pegawai);
                $data['jabatan'] = $this->Mutasi_m->last_jabatan($datapegawai->id_pegawai);
                // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/mutasi-pwk-keluar-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tambah_pwk_keluar($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Tambah PWK Keluar'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Mutasi_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Mutasi_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Mutasi_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/mutasi-pwk-keluar-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tambah_pwk_masuk($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pidah_wilayah_kerja_masuk','nm_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkmasuk','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Tambah PWK Masuk'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Mutasi_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Mutasi_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Mutasi_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/mutasi-pwk-masuk-detail-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiun_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $data['title'] = 'Permintaan Pensiun '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                    $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                    $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                    $data['hasil'] = $this->Admin_m->select_data('data_pensiun');
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pensiun-main-v';
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
    public function pindahinstansi_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $data['title'] = 'Pindah Instansi '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                    $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                    $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                    $data['hasil'] = $this->Admin_m->select_data('form_pindahinstansi');
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pindahinstansi-main-v';
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
    public function pindahinstansi_action($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pindahinstansi','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-fcsk2'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
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
                    // upload 8
                    if (!empty($_FILES["upload_8"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_8')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img8 = $this->upload->data('file_name');
                            $datass['upload_8'] = $img8;
        
                        }
                    }
                    // upload 9
                    if (!empty($_FILES["upload_9"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_9')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img9 = $this->upload->data('file_name');
                            $datass['upload_9'] = $img9;
        
                        }
                    }
                    // upload 10
                    if (!empty($_FILES["upload_10"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_10')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img10 = $this->upload->data('file_name');
                            $datass['upload_10'] = $img10;
        
                        }
                    }
                    // upload 11
                    if (!empty($_FILES["upload_11"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-sttpp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_11')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img11 = $this->upload->data('file_name');
                            $datass['upload_11'] = $img11;
        
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
                    if ($post['action8'] == TRUE) {
                         $datass['verifikasi_8'] = $post['action8'];
                    }
                    if ($post['action9'] == TRUE) {
                         $datass['verifikasi_9'] = $post['action9'];
                    }
                    if ($post['action10'] == TRUE) {
                         $datass['verifikasi_10'] = $post['action10'];
                    }
                    if ($post['action11'] == TRUE) {
                         $datass['verifikasi_11'] = $post['action11'];
                    }
                    
                    $datass['ket_1'] = $post['ket1'];
                    $datass['ket_2'] = $post['ket2'];
                    $datass['ket_3'] = $post['ket3'];
                    $datass['ket_4'] = $post['ket4'];
                    $datass['ket_5'] = $post['ket5'];
                    $datass['ket_6'] = $post['ket6'];
                    $datass['ket_7'] = $post['ket7'];
                    $datass['ket_8'] = $post['ket8'];
                    $datass['ket_9'] = $post['ket9'];
                    $datass['ket_10'] = $post['ket10'];
                    $datass['ket_11'] = $post['ket11'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/detail_pindahinstansi/'.$cekfomupload->id_form_pindah));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pindahinstansi($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/csmutasi/pindahinstansi_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_pindahinstansi','id_form_pindah',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_pindahinstansi','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detail Pindah Instansi - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pindahinstansi-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiun_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $data['title'] = 'Tambah Permintaan Pensiun'.$this->Admin_m->info_pt(1)->nama_info_pt;
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
                    $data['page'] = 'admin/cs/pensiun-tambah-v';
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
    public function tambah_pindahinstansi($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $data['page'] = 'admin/cs/pindahinstansi-tambah-v';
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
    public function cpwk_masuk(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $post = $this->input->post();
                    $lastid = $this->Mutasi_m->lastid();
                    if ($lastid == true) {
                        $kode = $lastid->id_pindah_wilayah_kerja_masuk+1;
                    }else{
                        $kode = 1;
                    }
                    $data = array(
                        'no_reg_pindah'=>str_pad($kode, 6, "0", STR_PAD_LEFT),
                        'nm_pegawai'=>$post['nm_pegawai'],
                        'nip'=>$post['nip'],
                        'tgl_masuk'=>$post['tgl_masuk'],
                        'id_pangkat'=>$post['id_pangkat'],
                        'id_golongan'=>$post['id_golongan'],
                        'id_jabatan'=>$post['id_jabatan'],
                        'instansi'=>$post['instansi'],
                        'tgl_permohonan'=>$post['tgl_permohonan'],
                        'ket'=>$post['ket'],
                        'pejabat'=>$post['pejabat'],
                        'alamat_ibu_kota'=>$post['alamat_ibu_kota'],
                        'instansi_lama'=>$post['instansi_lama'],
                        'instansi_baru'=>$post['instansi_baru'],
                        'tembusan_1'=>$post['tembusan_1'],
                        'tembusan_2'=>$post['tembusan_2'],
                        'tembusan_3'=>$post['tembusan_3'],
                        'unit_kerja'=>$post['unit_kerja'],
                        'status'=>'1',
                        'tgl_create'=>date('Y-m-d'),
                        'waktu_create'=>date('h:i:s'),
                    );
                    $this->Admin_m->insert_data('data_pidah_wilayah_kerja_masuk',$data);
                    $pesan = 'Data Pindah Wilayah Kerja (Masuk) Berhasil di tambahkan';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/csmutasi/pwk_masuk/'));
                }
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function cpwk_keluar($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $post = $this->input->post();
                    $lastid = $this->Mutasi_m->lastid();
                    if ($lastid == true) {
                        $kode = $lastid->id_pindah_wilayah_kerja_masuk+1;
                    }else{
                        $kode = 1;
                    }
                    $data = array(
                        'no_req_pindah'=>'PWKK'.str_pad($kode, 6, "0", STR_PAD_LEFT),
                        'no_cetak'=>'CTK'.str_pad($kode, 6, "0", STR_PAD_LEFT),
                        'tgl_masuk'=>$post['tgl_masuk'],
                        'id_pegawai'=>$post['id_pegawai'],
                        'id_pangkat'=>$post['id_pangkat'],
                        'id_golongan'=>$post['id_golongan'],
                        'id_jabatan'=>$post['id_jabatan'],
                        'unit_organisasi_asal'=>$post['id_satuan_kerja'],
                        'tgl_permohonan_asal'=>$post['tgl_permohonan_asal'],
                        'no_sk_tujuan'=>$post['no_sk_tujuan'],
                        'tgl_sk_tujuan'=>$post['tgl_sk_tujuan'],
                        'pejabat_daerah'=>$post['pejabat_daerah'],
                        'pejabat_provinsi'=>$post['pejabat_provinsi'],
                        'ibu_kota_provinsi'=>$post['ibu_kota_provinsi'],
                        'instansi_lama'=>$post['instansi_lama'],
                        'instansi_baru'=>$post['instansi_baru'],
                        'tembusan_1'=>$post['tembusan_1'],
                        'tembusan_2'=>$post['tembusan_2'],
                        'status'=>'1',
                        'tgl_create'=>date('Y-m-d'),
                        'waktu_create'=>date('h:i:s'),
                    );
                    $this->Admin_m->insert_data('data_pindah_wilayah_kerja_keluar',$data);
                    // echo "<pre/>";print_r($data);echo "<pre>";exit();
                    $pesan = 'Data Pindah Wilayah Kerja (Keluar) Berhasil di tambahkan';
                    $this->session->set_flashdata('message', $pesan );
                    // redirect(base_url('index.php/admin/csmutasi/pwk_keluar/'));
                    $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','nip',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'id_status'=>1,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pensiun',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-dpcp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_1')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_1'] = $img;
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srtreq'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_2')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img2 = $this->upload->data('file_name');
                        $data['upload_2'] = $img2;
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-skcpns80'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_3')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_3'] = $img;
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-skcpns100'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_4')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_4'] = $img;
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-skpangkat'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_5')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_5'] = $img;
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-kgb'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_6')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_6'] = $img;
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-karpeg'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_7')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_7'] = $img;
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_8"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-dp3'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_8')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_8'] = $img;
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-riwayatkerja'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_9')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_9'] = $img;
                    }
                }
                // upload 10
                if (!empty($_FILES["upload_10"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srthukuman'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_10')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_10'] = $img;
                    }
                }
                // upload 11
                if (!empty($_FILES["upload_11"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srtpidana'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_11')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_11'] = $img;
                    }
                }
                // upload 12
                if (!empty($_FILES["upload_12"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-aktanikah'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_12')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_12'] = $img;
                    }
                }
                // upload 13
                if (!empty($_FILES["upload_13"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-karsu'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_13')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_13'] = $img;
                    }
                }
                // upload 14
                if (!empty($_FILES["upload_14"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-koversi'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_14')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_14'] = $img;
                    }
                }
                // upload 15
                if (!empty($_FILES["upload_15"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-kp4'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_15')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_15'] = $img;
                    }
                }
                // upload 16
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-keluarga'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_16')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_16'] = $img;
                    }
                }
                // upload 17
                if (!empty($_FILES["upload_17"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-ktp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_17')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_17'] = $img;
                    }
                }
                // upload 18
                if (!empty($_FILES["upload_18"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-kk'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_18')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_18'] = $img;
                    }
                }
                // upload 19
                if (!empty($_FILES["upload_19"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-npwp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_19')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_19'] = $img;
                    }
                }
                // upload 20
                if (!empty($_FILES["upload_20"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-aktaanak'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_20')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_20'] = $img;
                    }
                }
                // upload 21
                if (!empty($_FILES["upload_21"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-aktifkuliah'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_21')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_21'] = $img;
                    }
                }
                // upload 22
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-taspen'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_22')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_22'] = $img;
                    }
                }
                // upload 23
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srtanakkandung'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_23')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_23'] = $img;
                    }
                }
                // upload 24
                if (!empty($_FILES["upload_24"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_24')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_24'] = $img;
                    }
                }
                $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/review_form_upload/'.$nip));
                }
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pindahinstansi2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pindahinstansi','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pindahinstansi',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pindahinstansi','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-1'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-2'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-3'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-5'.'-'.date('Ymd').'-'.time('Hms')));
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
                       $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-5'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-6'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-7'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_8"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-8'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_8')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img8 = $this->upload->data('file_name');
                        $data['upload_8'] = $img8;
                         $data['verifikasi_8'] = '1';
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-9'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_9')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img9 = $this->upload->data('file_name');
                        $data['upload_9'] = $img9;
                         $data['verifikasi_9'] = '1';
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 10
                if (!empty($_FILES["upload_10"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-10'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_10')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img10 = $this->upload->data('file_name');
                        $data['upload_10'] = $img10;
                         $data['verifikasi_10'] = '1';
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }
                // upload 11
                if (!empty($_FILES["upload_11"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pindah'.'-'.$getpegawai->nip.'-11'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_11')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img11 = $this->upload->data('file_name');
                        $data['upload_11'] = $img11;
                         $data['verifikasi_11'] = '1';
                        $this->Admin_m->update('form_pindahinstansi','id_form_pindah',$cekfomupload->id_form_pindah,$data);
                    }
                }

                
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/pindahinstansi_tambah/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiun(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $post = $this->input->post();
                    $lastid = $this->Mutasi_m->lastidpensiun();
                    if ($lastid == true) {
                        $kode = $lastidpensiun->id_pensiun+1;
                    }else{
                        $kode = 1;
                    }
                    $data = array(
                        'id_pensiun'=>'P'.str_pad($kode, 6, "0", STR_PAD_LEFT),
                        'no_cetak'=>'CTK'.str_pad($kode, 6, "0", STR_PAD_LEFT),
                        'tgl_permohonan'=>$post['tgl_permohonan'],
                        'id_pegawai'=>$post['id_pegawai'],
                        'id_pangkat'=>$post['id_pangkat'],
                        'id_golongan'=>$post['id_golongan'],
                        'id_jabatan'=>$post['id_jabatan'],
                        'id_satuan_kerja'=>$post['id_satuan_kerja'],
                        'no_kartu_pegawai'=>$post['no_kartu_pegawai'],
                        'nomor_hp'=>$post['nomor_hp'],
                        'alamat_rumah_skr'=>$post['alamat_rumah_skr'],
                        'alamat_rumah_pensiun'=>$post['alamat_rumah_pensiun'],
                        'status'=>'1',
                        'tgl_create'=>date('Y-m-d'),
                        'waktu_create'=>date('h:i:s'),
                    );
                    $this->Admin_m->insert_data('data_pensiun',$data);
                    // echo "<pre/>";print_r($data);echo "<pre>";exit();
                    $pesan = 'Data Pensiun Berhasil di tambahkan';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/csmutasi/pensiun_main/'));
                }
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pindahinstansi_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pindahinstansi','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Pindah Instansi'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Mutasi_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Mutasi_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Mutasi_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pindahinstansi-tambah-v';
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
        $hasil = $this->Mutasi_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/csmutasi/tambah_pwk_keluar/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
     public function caripegawaipindah(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Mutasi_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/csmutasi/pindahinstansi_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
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
    public function detail_pwk_masuk($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/csmutasi/tambah_pwk_masuk/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('data_pidah_wilayah_kerja_masuk','id_pindah_wilayah_kerja_masuk',$id);
                @$formupload = $this->Admin_m->detail_data_order('form_pwkmasuk','id_pegawai',$datapegawai->nm_pegawai);
                $data['title'] = 'Detail Mutasi Masuk - '.$datamutasi->nm_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                // $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/mutasi-pwk-masuk-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function upload_pwkm(){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                if (!empty($_FILES["fotop"])) {
                    $config['file_name'] = strtolower(url_title('dok-pwk-m'.'-'.$post['id_pindah_wilayah_kerja_masuk'].'-'.date('ymd').'-'.time('hms')));
                    $config['upload_path'] = './asset/dokumen/sk/mutasi';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 3048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('fotop')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('eror', $error );
                        redirect(base_url('index.php/admin/csmutasi/detail_pwk_m/'.$post['id_pindah_wilayah_kerja_masuk']));
                    }
                    else{
                        $file = $this->Admin_m->detail_data_order('data_pidah_wilayah_kerja_masuk','id_pindah_wilayah_kerja_masuk',$post['id_pindah_wilayah_kerja_masuk'])->upload;
                        if ($file != "avatar.png") {
                            unlink("asset/img/pegawai/$file");
                        }
                        $img = $this->upload->data('file_name');
                        $data['upload'] = $img;
                        $this->Admin_m->update('data_pidah_wilayah_kerja_masuk','id_pindah_wilayah_kerja_masuk',$post['id_pindah_wilayah_kerja_masuk'],$data);

                        $pesan = 'Dokumen Berhasil ditambahkan';
                        $this->session->set_flashdata('message', $pesan );
                        redirect(base_url('index.php/admin/csmutasi/detail_pwk_m/'.$post['id_pindah_wilayah_kerja_masuk']));
                    }
                }
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_stat_verif_pwkm(){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
    public function proses_upload_form($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','nip',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'id_status'=>1,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pensiun',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-dpcp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_1')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_1'] = $img;
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srtreq'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_2')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img2 = $this->upload->data('file_name');
                        $data['upload_2'] = $img2;
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-skcpns80'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_3')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_3'] = $img;
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-skcpns100'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_4')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_4'] = $img;
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-skpangkat'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_5')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_5'] = $img;
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-kgb'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_6')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_6'] = $img;
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-karpeg'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_7')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_7'] = $img;
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_8"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-dp3'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_8')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_8'] = $img;
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-riwayatkerja'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_9')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_9'] = $img;
                    }
                }
                // upload 10
                if (!empty($_FILES["upload_10"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srthukuman'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_10')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_10'] = $img;
                    }
                }
                // upload 11
                if (!empty($_FILES["upload_11"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srtpidana'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_11')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_11'] = $img;
                    }
                }
                // upload 12
                if (!empty($_FILES["upload_12"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-aktanikah'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_12')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_12'] = $img;
                    }
                }
                // upload 13
                if (!empty($_FILES["upload_13"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-karsu'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_13')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_13'] = $img;
                    }
                }
                // upload 14
                if (!empty($_FILES["upload_14"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-koversi'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_14')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_14'] = $img;
                    }
                }
                // upload 15
                if (!empty($_FILES["upload_15"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-kp4'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_15')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_15'] = $img;
                    }
                }
                // upload 16
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-keluarga'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_16')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_16'] = $img;
                    }
                }
                // upload 17
                if (!empty($_FILES["upload_17"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-ktp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_17')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_17'] = $img;
                    }
                }
                // upload 18
                if (!empty($_FILES["upload_18"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-kk'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_18')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_18'] = $img;
                    }
                }
                // upload 19
                if (!empty($_FILES["upload_19"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-npwp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_19')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_19'] = $img;
                    }
                }
                // upload 20
                if (!empty($_FILES["upload_20"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-aktaanak'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_20')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_20'] = $img;
                    }
                }
                // upload 21
                if (!empty($_FILES["upload_21"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-aktifkuliah'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_21')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_21'] = $img;
                    }
                }
                // upload 22
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-taspen'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_22')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_22'] = $img;
                    }
                }
                // upload 23
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-srtanakkandung'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_23')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_23'] = $img;
                    }
                }
                // upload 24
                if (!empty($_FILES["upload_24"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('doc'.'-'.$getpegawai->nip.'-foto'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $pesaneror = array();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_24')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $data['upload_24'] = $img;
                    }
                }
                $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/review_form_upload/'.$nip));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function review_form_upload($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
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
                    $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','nip',$nip);
                    $data['title'] = 'Review Form Upload Pensiun - '.$getpegawai->nama_pegawai;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['detail'] = $getpegawai;
                    $data['hasil'] = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/review-form-upload-v';
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
     public function cpwk_keluar2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pwkkeluar',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-sppis'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-sppit'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_8')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img8 = $this->upload->data('file_name');
                        $data['upload_8'] = $img8;
                         $data['verifikasi_8'] = '1';
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_9')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img9 = $this->upload->data('file_name');
                        $data['upload_9'] = $img9;
                         $data['verifikasi_9'] = '1';
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }
                // upload 10
                if (!empty($_FILES["upload_10"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_10')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img10 = $this->upload->data('file_name');
                        $data['upload_10'] = $img10;
                         $data['verifikasi_10'] = '1';
                        $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                    }
                }

                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/tambah_pwk_keluar/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function cpwk_masuk2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkmasuk','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pwkmasuk',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkmasuk','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-sppis'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-sppit'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_8"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_8')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img8 = $this->upload->data('file_name');
                        $data['upload_8'] = $img8;
                         $data['verifikasi_8'] = '1';
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_9')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img9 = $this->upload->data('file_name');
                        $data['upload_9'] = $img9;
                         $data['verifikasi_9'] = '1';
                        $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$data);
                    }
                }

                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/tambah_pwk_masuk/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
     public function cpwk_keluar_action($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-sppis'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-sppit'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                    // upload 8
                    if (!empty($_FILES["upload_8"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_8')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img8 = $this->upload->data('file_name');
                            $datass['upload_8'] = $img8;
        
                        }
                    }
                    // upload 9
                    if (!empty($_FILES["upload_9"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_9')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img9 = $this->upload->data('file_name');
                            $datass['upload_9'] = $img9;
        
                        }
                    }
                    // upload 10
                    if (!empty($_FILES["upload_10"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pwkk'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_10')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img10 = $this->upload->data('file_name');
                            $datass['upload_10'] = $img10;
        
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
                    if ($post['action8'] == TRUE) {
                         $datass['verifikasi_8'] = $post['action8'];
                    }
                    if ($post['action9'] == TRUE) {
                         $datass['verifikasi_9'] = $post['action9'];
                    }
                    if ($post['action10'] == TRUE) {
                         $datass['verifikasi_10'] = $post['action10'];
                    }
                    $datass['ket_1'] = $post['ket1'];
                    $datass['ket_2'] = $post['ket2'];
                    $datass['ket_3'] = $post['ket3'];
                    $datass['ket_4'] = $post['ket4'];
                    $datass['ket_5'] = $post['ket5'];
                    $datass['ket_6'] = $post['ket6'];
                    $datass['ket_7'] = $post['ket7'];
                    $datass['ket_8'] = $post['ket8'];
                    $datass['ket_9'] = $post['ket9'];
                    $datass['ket_10'] = $post['ket10'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/detail_pwk_keluar/'.$cekfomupload->id_form_pwkkeluar));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function cpwk_masuk_action($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkmasuk','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-spi'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-sppis'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-sppit'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-fcsk'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pwkm'.'-'.$getpegawai->nip.'-skp'.'-'.date('Ymd').'-'.time('Hms')));
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
                    $datass['ket_1'] = $post['ket1'];
                    $datass['ket_2'] = $post['ket2'];
                    $datass['ket_3'] = $post['ket3'];
                    $datass['ket_4'] = $post['ket4'];
                    $datass['ket_5'] = $post['ket5'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_pwkmasuk','id_form_pwkmasuk',$cekfomupload->id_form_pwkmasuk,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/detail_pwk_m/'.$cekfomupload->id_form_pwkmasuk));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
}
?>
