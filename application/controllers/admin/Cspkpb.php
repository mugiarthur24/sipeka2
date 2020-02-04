<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cspkpb extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Pkpb_m');
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
                    $data['title'] = 'Pengangkatan dan Pemberhentian '.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pengangkatan-pemberhentian-v';
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
    public function pengangkatan_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cspkpb/pengangkatan_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Pengangkatan '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_pengangkatan');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pengangkatan-main-v';
                                    // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pemberhentian_main(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                if ($this->ion_auth->in_group('members')) {
                    redirect( base_url('index.php/admin/cspkpb/pemberhentian_tambah/'.$datauser->id_pegawai));
                }
                    // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                $post = $this->input->get();
                $data['title'] = 'Pemberhentian '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $datauser;
                $data['pangkat'] = $this->Admin_m->select_data('master_pangkat');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['jabatan'] = $this->Admin_m->select_data('master_jabatan');
                $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');
                $data['hasil'] = $this->Admin_m->select_data('form_pemberhentian');
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/cs/pemberhentian-main-v';
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
        $hasil = $this->Pkpb_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cspkpb/pengangkatan_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripegawai2(){
        $post = $this->input->post();
        $cari = $post["string"];
        // echo $post['string'];
        $hasil = $this->Pkpb_m->cari_pegawai($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/cspkpb/pemberhentian_tambah/'.$data->id_pegawai.'/').'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function pengangkatan_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pengangkatan','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Pengangkatan Pegawai'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Pkpb_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Pkpb_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Pkpb_m->last_jabatan($idpegawai);
                    $data['jns_jabatan'] = $this->Admin_m->select_data('master_jenis_jabatan');
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pengangkatan-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pemberhentian_tambah($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','kartu');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $datauser = $this->ion_auth->user()->row();
                $pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$idpegawai);
                $cekfomupload = $this->Admin_m->detail_data_order('form_pemberhentian','id_pegawai',$pegawai->id_pegawai);
                    $post = $this->input->get();
                    $data['title'] = 'Pemberhentian Pegawai'.$this->Admin_m->info_pt(1)->nama_info_pt;
                    $data['infopt'] = $this->Admin_m->info_pt(1);
                    $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                    $data['users'] = $datauser;
                    $data['pangkat'] = $this->Pkpb_m->last_pangkat($idpegawai);
                    $data['golongan'] = $this->Pkpb_m->last_golongan($idpegawai);
                    $data['jabatan'] = $this->Pkpb_m->last_jabatan($idpegawai);
                    $data['jns_jabatan'] = $this->Admin_m->select_data('master_jenis_jabatan');
                    // echo "<pre>";print_r($data['jabatan']);echo "<pre>";exit();
                    $data['skpd'] = $this->Admin_m->select_data('master_lokasi_kerja');

                    $data['hasil'] = $pegawai;
                    $data['formupload'] = $cekfomupload;
                    $data['aside'] = 'nav/nav';
                    $data['page'] = 'admin/cs/pemberhentian-tambah-v';
                    // pagging setting
                    $this->load->view('admin/dashboard-v',$data);

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pengangkatan_create($nip){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datauser = $this->ion_auth->user()->row();
                // echo "<pre>";print_r($datauser->cs_mutasi);echo "<pre/>";exit();
                if ($datauser->cs_mutasi == 0) {
                    $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/dashboard'));
                }else{
                    $getform = $this->Admin_m->detail_data_order('form_pengangkatan','nip',$nip);
                    if ($getform == TRUE) {
                        $lastpengangkatan = $this->Mutasi_m->lastpengangkatan();
                        if ($lastpengangkatan == true) {
                            $kode = $lastpengangkatan->id_pindah_wilayah_kerja_masuk+1;
                        }else{
                            $kode = 1;
                        }
                        $datas = array(
                            'nip'=>$nip,
                            'id_pegawai'=>$post['id_pegawai'],
                            'jabatan_lama'=>$post['jabatan_lama'],
                            'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                            'nm_jabatan'=>$post['nm_jabatan'],
                            'id_satuan_kerja'=>$post['id_satuan_kerja'],
                            'nomor_sk'=>$post['nomor_sk'],
                            'status'=>'1',
                            'tgl_create'=>date('Y-m-d'),
                        );
                        $this->Admin_m->insert_data('form_pengangkatan',$datas);
                    }else{
                        $datasa = array(
                            'nip'=>$nip,
                            'id_pegawai'=>$post['id_pegawai'],
                            'jabatan_lama'=>$post['jabatan_lama'],
                            'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                            'nm_jabatan'=>$post['nm_jabatan'],
                            'id_satuan_kerja'=>$post['id_satuan_kerja'],
                            'nomor_sk'=>$post['nomor_sk'],
                            'status'=>'1',
                            'tgl_create'=>date('Y-m-d'),
                        );
                        $this->Admin_m->update_data('form_pengangkatan','nip',$nip,$datasa);
                    }
                    $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','nip',$nip);
                    $cekfomupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$getpegawai->id_pegawai);
                if ($cekfomupload == FALSE) {
                    $dps = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'id_status'=>1,
                        'tgl_create'=>date('Y-m-d')
                    );
                    $this->Admin_m->insert_data('form_pensiun',$dps);
                }
                $cekfomupload = $this->Admin_m->detail_data_order('form_pwkkeluar','id_pegawai',$getpegawai->id_pegawai);
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
                
                if (!empty($data)) {
                    $this->Admin_m->update('form_pwkkeluar','id_form_pwkkeluar',$cekfomupload->id_form_pwkkeluar,$data);
                }
                $pesan = 'Form berhasil di upload';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/csmutasi/pwk_keluar/'.$nip));
                }
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
}
?>
