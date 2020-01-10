<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cspensiun extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Pensiun_m');
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
                    $data['title'] = 'Pensiun '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pensiun-v';
                    $data['hasil']= $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datauser->id_pegawai);
                // pagging setting
                    $this->load->view('admin/dashboard-v',$data);
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiun_masuk(){
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
                    $data['title'] = 'Pensiun Dini '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                    $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                    $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                    $data['hasil'] = $this->Pensiun_m->get_pensiundini();
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
    public function pwk_keluar(){
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
                    $data['hasil'] = $this->Admin_m->select_data('data_pindah_wilayah_kerja_keluar');
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/mutasi-pwk-keluar-main-v';
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
    public function tambah_pensiundini($idpegawai){
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
                    $data['title'] = 'Pensiun Dini'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Pensiun_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Pensiun_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Pensiun_m->last_jabatan($idpegawai);
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
    
    public function pensiunbup_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cspensiun/pensiunbup_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Layanan Pensiun BUP '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_pensiunbup');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pensiun-bup-main-v';
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
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Pensiun Dini'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Pensiun_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Pensiun_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Pensiun_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pensiun-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiunbup_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiunbup','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Pensiun BUP'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Pensiun_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Pensiun_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Pensiun_m->last_jabatan($idpegawai);
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pensiun-bup-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

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
    public function cpwk_keluar(){
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
                    redirect(base_url('index.php/admin/csmutasi/pwk_keluar/'));
                }
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    // public function pensiun(){
    //     if ($this->ion_auth->logged_in()) {
    //         $level = array('admin','members');
    //         if (!$this->ion_auth->in_group($level)) {
    //             $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
    //             $this->session->set_flashdata('message', $pesan );
    //             redirect(base_url('index.php/admin/dashboard'));
    //         }else{
    //             $datauser = $this->ion_auth->user()->row();
    //             // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
    //             if ($datauser->cs_mutasi == 0) {
    //                 $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
    //                 $this->session->set_flashdata('message', $pesan );
    //                 redirect(base_url('index.php/admin/dashboard'));
    //             }else{
    //                 $post = $this->input->post();
    //                 $lastid = $this->Mutasi_m->lastidpensiun();
    //                 if ($lastid == true) {
    //                     $kode = $lastidpensiun->id_pensiun+1;
    //                 }else{
    //                     $kode = 1;
    //                 }
    //                 $data = array(
    //                     'id_pensiun'=>'P'.str_pad($kode, 6, "0", STR_PAD_LEFT),
    //                     'no_cetak'=>'CTK'.str_pad($kode, 6, "0", STR_PAD_LEFT),
    //                     'tgl_permohonan'=>$post['tgl_permohonan'],
    //                     'id_pegawai'=>$post['id_pegawai'],
    //                     'id_pangkat'=>$post['id_pangkat'],
    //                     'id_golongan'=>$post['id_golongan'],
    //                     'id_jabatan'=>$post['id_jabatan'],
    //                     'id_satuan_kerja'=>$post['id_satuan_kerja'],
    //                     'no_kartu_pegawai'=>$post['no_kartu_pegawai'],
    //                     'nomor_hp'=>$post['nomor_hp'],
    //                     'alamat_rumah_skr'=>$post['alamat_rumah_skr'],
    //                     'alamat_rumah_pensiun'=>$post['alamat_rumah_pensiun'],
    //                     'status'=>'1',
    //                     'tgl_create'=>date('Y-m-d'),
    //                     'waktu_create'=>date('h:i:s'),
    //                 );
    //                 $this->Admin_m->insert_data('data_pensiun',$data);
    //                 // echo "<pre/>";print_r($data);echo "<pre>";exit();
    //                 $pesan = 'Data Pensiun Berhasil di tambahkan';
    //                 $this->session->set_flashdata('message', $pesan );
    //                 redirect(base_url('index.php/admin/cspensiun/pensiun_main/'));
    //             }
                
    //         }
    //     }else{
    //         $pesan = 'Login terlebih dahulu';
    //         $this->session->set_flashdata('message', $pesan );
    //         redirect(base_url('index.php/login'));
    //     }
    // }
    public function pensiunbup(){
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
                    redirect(base_url('index.php/admin/cspensiun/pensiunbup_main/'));
                }
                
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
        $hasil = $this->Pensiun_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/csmutasi/tambah_pwk_keluar/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripegawaipensiun(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Pensiun_m->cari_pegawaipensiun($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cspensiun/pensiun_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripegawaipensiunbup(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Pensiun_m->cari_pegawaipensiunbup($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cspensiun/pensiunbup_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function detail_pwk_m($id){
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
                    $hasil = $this->Admin_m->detail_data_order('data_pidah_wilayah_kerja_masuk',
                        'id_pindah_wilayah_kerja_masuk',$id);
                    $data['title'] = 'Detail PWK Masuk - '.$hasil->no_reg_pindah;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['hasil'] = $hasil;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/mutasi-pwk-masuk-detail-v';
                    $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                    $data['status'] = $this->Admin_m->select_data('status');
                    $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                    $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
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
    public function pensiun2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pensiun',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-1'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-2'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-3'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-4'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-5'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-6'.'-'.date('Ymd').'-'.time('Hms')));
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
                       $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-7'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_8"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-8'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-9'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 10
                if (!empty($_FILES["upload_10"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-10'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 11
                if (!empty($_FILES["upload_11"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-11'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 12
                if (!empty($_FILES["upload_12"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-12'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_12')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img12 = $this->upload->data('file_name');
                        $data['upload_12'] = $img12;
                         $data['verifikasi_12'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 13
                if (!empty($_FILES["upload_13"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-13'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_13')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img13 = $this->upload->data('file_name');
                        $data['upload_13'] = $img13;
                         $data['verifikasi_13'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 14
                if (!empty($_FILES["upload_14"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-14'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_14')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img14 = $this->upload->data('file_name');
                        $data['upload_14'] = $img14;
                         $data['verifikasi_14'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 15
                if (!empty($_FILES["upload_15"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-15'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_15')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img15 = $this->upload->data('file_name');
                        $data['upload_15'] = $img15;
                         $data['verifikasi_15'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 16
                if (!empty($_FILES["upload_16"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-16'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_16')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img16 = $this->upload->data('file_name');
                        $data['upload_16'] = $img16;
                         $data['verifikasi_16'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 17
                if (!empty($_FILES["upload_17"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-17'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_17')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img17 = $this->upload->data('file_name');
                        $data['upload_17'] = $img17;
                         $data['verifikasi_17'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 18
                if (!empty($_FILES["upload_18"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-18'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_18')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img18 = $this->upload->data('file_name');
                        $data['upload_18'] = $img18;
                         $data['verifikasi_18'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 19
                if (!empty($_FILES["upload_19"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-19'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_19')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img19 = $this->upload->data('file_name');
                        $data['upload_19'] = $img19;
                         $data['verifikasi_19'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 20
                if (!empty($_FILES["upload_20"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-20'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_20')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img20 = $this->upload->data('file_name');
                        $data['upload_20'] = $img20;
                         $data['verifikasi_20'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 21
                if (!empty($_FILES["upload_21"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-21'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_21')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img21 = $this->upload->data('file_name');
                        $data['upload_21'] = $img21;
                         $data['verifikasi_21'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 22
                if (!empty($_FILES["upload_22"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-22'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_22')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img22 = $this->upload->data('file_name');
                        $data['upload_22'] = $img22;
                         $data['verifikasi_22'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 23
                if (!empty($_FILES["upload_23"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-23'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_23')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img23 = $this->upload->data('file_name');
                        $data['upload_23'] = $img23;
                         $data['verifikasi_23'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }
                // upload 24
                if (!empty($_FILES["upload_24"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-24'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_24')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img24 = $this->upload->data('file_name');
                        $data['upload_24'] = $img24;
                         $data['verifikasi_24'] = '1';
                        $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$data);
                    }
                }

                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cspensiun/pensiun_tambah/'.$getpegawai->id_pegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiunbup2($nip){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$nip);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiunbup','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pensiunbup',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiunbup','id_pegawai',$getpegawai->id_pegawai);
                // echo "<pre>";print_r($cekfomupload);echo "<pre>";exit();
                $pesaneror = array();
                // upload 1
                if (!empty($_FILES["upload_1"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-1'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 2
                if (!empty($_FILES["upload_2"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-2'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 3
                if (!empty($_FILES["upload_3"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-3'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 4
                if (!empty($_FILES["upload_4"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-4'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 5
                if (!empty($_FILES["upload_5"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-5'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 6
                if (!empty($_FILES["upload_6"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-6'.'-'.date('Ymd').'-'.time('Hms')));
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
                       $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 7
                if (!empty($_FILES["upload_7"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-7'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 8
                if (!empty($_FILES["upload_8"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-8'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 9
                if (!empty($_FILES["upload_9"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-9'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 10
                if (!empty($_FILES["upload_10"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-10'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 11
                if (!empty($_FILES["upload_11"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-11'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 12
                if (!empty($_FILES["upload_12"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-12'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_12')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img12 = $this->upload->data('file_name');
                        $data['upload_12'] = $img12;
                         $data['verifikasi_12'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 13
                if (!empty($_FILES["upload_13"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-13'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_13')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img13 = $this->upload->data('file_name');
                        $data['upload_13'] = $img13;
                         $data['verifikasi_13'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 14
                if (!empty($_FILES["upload_14"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-14'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_14')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img14 = $this->upload->data('file_name');
                        $data['upload_14'] = $img14;
                         $data['verifikasi_14'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 15
                if (!empty($_FILES["upload_15"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-15'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_15')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img15 = $this->upload->data('file_name');
                        $data['upload_15'] = $img15;
                         $data['verifikasi_15'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 16
                if (!empty($_FILES["upload_16"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-16'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_16')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img16 = $this->upload->data('file_name');
                        $data['upload_16'] = $img16;
                         $data['verifikasi_16'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 17
                if (!empty($_FILES["upload_17"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-17'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_17')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img17 = $this->upload->data('file_name');
                        $data['upload_17'] = $img17;
                         $data['verifikasi_17'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 18
                if (!empty($_FILES["upload_18"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-18'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_18')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img18 = $this->upload->data('file_name');
                        $data['upload_18'] = $img18;
                         $data['verifikasi_18'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 19
                if (!empty($_FILES["upload_19"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-19'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_19')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img19 = $this->upload->data('file_name');
                        $data['upload_19'] = $img19;
                         $data['verifikasi_19'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 20
                if (!empty($_FILES["upload_20"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-20'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_20')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img20 = $this->upload->data('file_name');
                        $data['upload_20'] = $img20;
                         $data['verifikasi_20'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 21
                if (!empty($_FILES["upload_21"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-21'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_21')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img21 = $this->upload->data('file_name');
                        $data['upload_21'] = $img21;
                         $data['verifikasi_21'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 22
                if (!empty($_FILES["upload_22"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-22'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_22')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img22 = $this->upload->data('file_name');
                        $data['upload_22'] = $img22;
                         $data['verifikasi_22'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                // upload 23
                if (!empty($_FILES["upload_23"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-23'.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload_23')){
                        $error = $this->upload->display_errors();
                        $pesaneror[]=$error;
                    }
                    else{
                        $img23 = $this->upload->data('file_name');
                        $data['upload_23'] = $img23;
                         $data['verifikasi_23'] = '1';
                        $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$data);
                    }
                }
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cspensiun/pensiunbup_tambah/'.$getpegawai->id_pegawai));
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
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cspensiun/pensiun_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Layanan Pensiun '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_pensiun');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pensiun-main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pensiun($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cspensiun/pensiun_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_pensiun','id_form_pensiun',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detail Pensiun - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pensiun-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pensiunbup($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cspensiun/pensiunbup_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $datamutasi = $this->Admin_m->detail_data_order('form_pensiunbup','id_form_pensiunbup',$id);
                $datapegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$datamutasi->id_pegawai);
                $formupload = $this->Admin_m->detail_data_order('form_pensiunbup','id_pegawai',$datapegawai->id_pegawai);
                $data['title'] = 'Detail Pensiun BUP - '.$datapegawai->nip;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pegawai'] = $datapegawai;
                $data['hasil'] = $datamutasi;
                $data['formupload'] = $formupload;
                $data['dtsts'] = $this->Admin_m->select_data('status');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pensiun-bup-detail-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiunbup_action($nip){
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
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiunbup','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-1'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-2'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('penpensiunbupsiun'.'-'.$getpegawai->nip.'-3'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-4'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-5'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-6'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-7'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-8'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-9'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-10'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-11'.'-'.date('Ymd').'-'.time('Hms')));
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
                    // upload 12
                    if (!empty($_FILES["upload_12"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-12'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_12')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img12 = $this->upload->data('file_name');
                            $datass['upload_12'] = $img12;
        
                        }
                    }
                    // upload 13
                    if (!empty($_FILES["upload_13"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-13'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_13')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img13 = $this->upload->data('file_name');
                            $datass['upload_13'] = $img13;
        
                        }
                    }
                    // upload 14
                    if (!empty($_FILES["upload_14"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-14'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_14')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img14 = $this->upload->data('file_name');
                            $datass['upload_14'] = $img14;
        
                        }
                    }
                    // upload 15
                    if (!empty($_FILES["upload_15"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-15'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_15')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img15 = $this->upload->data('file_name');
                            $datass['upload_15'] = $img15;
        
                        }
                    }
                    // upload 16
                    if (!empty($_FILES["upload_16"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-16'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_16')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img16 = $this->upload->data('file_name');
                            $datass['upload_16'] = $img16;
        
                        }
                    }
                    // upload 17
                    if (!empty($_FILES["upload_17"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-17'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_17')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img17 = $this->upload->data('file_name');
                            $datass['upload_17'] = $img17;
        
                        }
                    }
                    // upload 18
                    if (!empty($_FILES["upload_18"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-18'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_18')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img18 = $this->upload->data('file_name');
                            $datass['upload_18'] = $img18;
        
                        }
                    }
                    // upload 19
                    if (!empty($_FILES["upload_19"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-19'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_19')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img19 = $this->upload->data('file_name');
                            $datass['upload_19'] = $img19;
        
                        }
                    }
                    // upload 20
                    if (!empty($_FILES["upload_20"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-20'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_20')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img20 = $this->upload->data('file_name');
                            $datass['upload_20'] = $img20;
        
                        }
                    }
                    // upload 21
                    if (!empty($_FILES["upload_21"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-21'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_21')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img21 = $this->upload->data('file_name');
                            $datass['upload_21'] = $img21;
        
                        }
                    }
                    // upload 22
                    if (!empty($_FILES["upload_22"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-22'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_22')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img22 = $this->upload->data('file_name');
                            $datass['upload_22'] = $img22;
        
                        }
                    }
                    // upload 23
                    if (!empty($_FILES["upload_23"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiunbup'.'-'.$getpegawai->nip.'-23'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_23')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img23 = $this->upload->data('file_name');
                            $datass['upload_23'] = $img23;
        
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
                    if ($post['action12'] == TRUE) {
                         $datass['verifikasi_12'] = $post['action12'];
                    }
                    if ($post['action13'] == TRUE) {
                         $datass['verifikasi_13'] = $post['action13'];
                    }
                    if ($post['action14'] == TRUE) {
                         $datass['verifikasi_14'] = $post['action14'];
                    }
                    if ($post['action15'] == TRUE) {
                         $datass['verifikasi_15'] = $post['action15'];
                    }
                    if ($post['action16'] == TRUE) {
                         $datass['verifikasi_16'] = $post['action16'];
                    }
                    if ($post['action17'] == TRUE) {
                         $datass['verifikasi_17'] = $post['action17'];
                    }
                    if ($post['action18'] == TRUE) {
                         $datass['verifikasi_18'] = $post['action18'];
                    }
                    if ($post['action19'] == TRUE) {
                         $datass['verifikasi_19'] = $post['action19'];
                    }
                    if ($post['action20'] == TRUE) {
                         $datass['verifikasi_20'] = $post['action20'];
                    }
                    if ($post['action21'] == TRUE) {
                         $datass['verifikasi_21'] = $post['action21'];
                    }
                    if ($post['action22'] == TRUE) {
                         $datass['verifikasi_22'] = $post['action22'];
                    }
                    if ($post['action23'] == TRUE) {
                         $datass['verifikasi_23'] = $post['action23'];
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
                    $datass['ket_12'] = $post['ket12'];
                    $datass['ket_13'] = $post['ket13'];
                    $datass['ket_14'] = $post['ket14'];
                    $datass['ket_15'] = $post['ket15'];
                    $datass['ket_16'] = $post['ket16'];
                    $datass['ket_17'] = $post['ket17'];
                    $datass['ket_18'] = $post['ket18'];
                    $datass['ket_19'] = $post['ket19'];
                    $datass['ket_20'] = $post['ket20'];
                    $datass['ket_21'] = $post['ket21'];
                    $datass['ket_22'] = $post['ket22'];
                    $datass['ket_23'] = $post['ket23'];
                   
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_pensiunbup','id_form_pensiunbup',$cekfomupload->id_form_pensiunbup,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cspensiun/detail_pensiunbup/'.$cekfomupload->id_form_pensiunbup));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pensiun_action($nip){
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
                $cekfomupload = $this->Admin_m->detail_data_order('form_pensiun','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == TRUE) {
                    // upload 1
                    if (!empty($_FILES["upload_1"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-1'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-2'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-3'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-4'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-5'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-6'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-7'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-8'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-9'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-10'.'-'.date('Ymd').'-'.time('Hms')));
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
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-11'.'-'.date('Ymd').'-'.time('Hms')));
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
                    // upload 12
                    if (!empty($_FILES["upload_12"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-12'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_12')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img12 = $this->upload->data('file_name');
                            $datass['upload_12'] = $img12;
        
                        }
                    }
                    // upload 13
                    if (!empty($_FILES["upload_13"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-13'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_13')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img13 = $this->upload->data('file_name');
                            $datass['upload_13'] = $img13;
        
                        }
                    }
                    // upload 14
                    if (!empty($_FILES["upload_14"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-14'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_14')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img14 = $this->upload->data('file_name');
                            $datass['upload_14'] = $img14;
        
                        }
                    }
                    // upload 15
                    if (!empty($_FILES["upload_15"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-15'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_15')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img15 = $this->upload->data('file_name');
                            $datass['upload_15'] = $img15;
        
                        }
                    }
                    // upload 16
                    if (!empty($_FILES["upload_16"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-16'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_16')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img16 = $this->upload->data('file_name');
                            $datass['upload_16'] = $img16;
        
                        }
                    }
                    // upload 17
                    if (!empty($_FILES["upload_17"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-17'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_17')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img17 = $this->upload->data('file_name');
                            $datass['upload_17'] = $img17;
        
                        }
                    }
                    // upload 18
                    if (!empty($_FILES["upload_18"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-18'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_18')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img18 = $this->upload->data('file_name');
                            $datass['upload_18'] = $img18;
        
                        }
                    }
                    // upload 19
                    if (!empty($_FILES["upload_19"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-19'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_19')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img19 = $this->upload->data('file_name');
                            $datass['upload_19'] = $img19;
        
                        }
                    }
                    // upload 20
                    if (!empty($_FILES["upload_20"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-20'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_20')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img20 = $this->upload->data('file_name');
                            $datass['upload_20'] = $img20;
        
                        }
                    }
                    // upload 21
                    if (!empty($_FILES["upload_21"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-21'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_21')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img21 = $this->upload->data('file_name');
                            $datass['upload_21'] = $img21;
        
                        }
                    }
                    // upload 22
                    if (!empty($_FILES["upload_22"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-22'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_22')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img22 = $this->upload->data('file_name');
                            $datass['upload_22'] = $img22;
        
                        }
                    }
                    // upload 23
                    if (!empty($_FILES["upload_23"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-23'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_23')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img23 = $this->upload->data('file_name');
                            $datass['upload_23'] = $img23;
        
                        }
                    }
                    // upload 24
                    if (!empty($_FILES["upload_24"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('pensiun'.'-'.$getpegawai->nip.'-24'.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './asset/dokumen/';
                        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('upload_24')){
                            $error = $this->upload->display_errors();
                            $pesaneror[]=$error;
                        }
                        else{
                            $img24 = $this->upload->data('file_name');
                            $datass['upload_24'] = $img24;
        
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
                    if ($post['action12'] == TRUE) {
                         $datass['verifikasi_12'] = $post['action12'];
                    }
                    if ($post['action13'] == TRUE) {
                         $datass['verifikasi_13'] = $post['action13'];
                    }
                    if ($post['action14'] == TRUE) {
                         $datass['verifikasi_14'] = $post['action14'];
                    }
                    if ($post['action15'] == TRUE) {
                         $datass['verifikasi_15'] = $post['action15'];
                    }
                    if ($post['action16'] == TRUE) {
                         $datass['verifikasi_16'] = $post['action16'];
                    }
                    if ($post['action17'] == TRUE) {
                         $datass['verifikasi_17'] = $post['action17'];
                    }
                    if ($post['action18'] == TRUE) {
                         $datass['verifikasi_18'] = $post['action18'];
                    }
                    if ($post['action19'] == TRUE) {
                         $datass['verifikasi_19'] = $post['action19'];
                    }
                    if ($post['action20'] == TRUE) {
                         $datass['verifikasi_20'] = $post['action20'];
                    }
                    if ($post['action21'] == TRUE) {
                         $datass['verifikasi_21'] = $post['action21'];
                    }
                    if ($post['action22'] == TRUE) {
                         $datass['verifikasi_22'] = $post['action22'];
                    }
                    if ($post['action23'] == TRUE) {
                         $datass['verifikasi_23'] = $post['action23'];
                    }
                    if ($post['action24'] == TRUE) {
                         $datass['verifikasi_24'] = $post['action24'];
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
                    $datass['ket_12'] = $post['ket12'];
                    $datass['ket_13'] = $post['ket13'];
                    $datass['ket_14'] = $post['ket14'];
                    $datass['ket_15'] = $post['ket15'];
                    $datass['ket_16'] = $post['ket16'];
                    $datass['ket_17'] = $post['ket17'];
                    $datass['ket_18'] = $post['ket18'];
                    $datass['ket_19'] = $post['ket19'];
                    $datass['ket_20'] = $post['ket20'];
                    $datass['ket_21'] = $post['ket21'];
                    $datass['ket_22'] = $post['ket22'];
                    $datass['ket_23'] = $post['ket23'];
                    $datass['ket_24'] = $post['ket24'];
                    // echo "<pre>";print_r($datass);echo "<pre>";exit();
                    $this->Admin_m->update('form_pensiun','id_form_pensiun',$cekfomupload->id_form_pensiun,$datass);
                }
                $pesan = 'Status dokumen berhasil diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/cspensiun/detail_pensiun/'.$cekfomupload->id_form_pensiun));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
}
?>
