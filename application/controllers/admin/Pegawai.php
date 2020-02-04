<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Pegawai_m');
        $this->load->library('resize');
    }
    public function index($rowno=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $getuser = $this->ion_auth->user()->row();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $getuser;
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/pegawai-v';
                if ($this->ion_auth->in_group($level)) {
                    $data['dtpt'] = $this->Admin_m->select_data('info_pt');
                }
                $data['page'] = 'admin/pegawai-v';
                   $search_text = "";
                   if($post == TRUE ){
                       $search_text = $post;
                       $this->session->set_userdata($post);
                   }else{
                       $post = array();
                       if($this->session->userdata('string') != NULL){
                        $post['string'] = $this->session->userdata('string');
                       }
                       if($this->session->userdata('id_satuan_kerja') != NULL){
                        $post['id_satuan_kerja'] = $this->session->userdata('id_satuan_kerja');
                       }
                       $search_text = $post;
                   }
                   // Row per page
                   $rowperpage = 10;
                   // Row position
                   if($rowno != 0){
                     $rowno = ($rowno-1) * $rowperpage;
                 }
                if ($this->ion_auth->in_group('skpd')) {
                    $allcount = $this->Pegawai_m->getrecordCountskpd($getuser->id_mhs_pt,$search_text);
                   // Get records
                   $users_record = $this->Pegawai_m->getDataskpd($getuser->id_mhs_pt,$rowno,$rowperpage,$search_text);
                }else{
                    $allcount = $this->Pegawai_m->getrecordCount($search_text);
                   // Get records
                   $users_record = $this->Pegawai_m->getData($rowno,$rowperpage,$search_text);
                }
                // Pagination Configuration
                 $config['base_url'] = base_url().'/index.php/admin/pegawai/index/';
                 $config['use_page_numbers'] = TRUE;
                 $config['total_rows'] = $allcount;
                 $config['per_page'] = $rowperpage;
                 // style pagging
                 $config['first_link']       = 'Pertama';
                 $config['last_link']        = 'Terakhir';
                 $config['next_link']        = 'Selanjutnya';
                 $config['prev_link']        = 'Sebelumnya';
                 $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-sm justify-content-center">';
                 $config['full_tag_close']   = '</ul></nav></div>';
                 $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                 $config['num_tag_close']    = '</span></li>';
                 $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                 $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                 $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                 $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                 $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                 $config['prev_tagl_close']  = '</span>Next</li>';
                 $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                 $config['first_tagl_close'] = '</span></li>';
                 $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                 $config['last_tagl_close']  = '</span></li>';
                // Initialize
                 $this->pagination->initialize($config);
                 $data['skpd'] = $this->Pegawai_m->select_data('master_lokasi_kerja');
                 $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                 $data['agama'] = $this->Pegawai_m->select_data('master_agama');
                 $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                 $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                 $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                 $data['pangkat'] = $this->Pegawai_m->select_data('master_pangkat');
                 $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                 $data['hasil'] = $users_record;
                 $data['row'] = $rowno;
                 $data['jmldata'] = $allcount;
                 $data['search'] = $search_text;
                 $data['post'] = $search_text;
                 $data['pagination'] = $this->pagination->create_links();
                 // echo "<pre>";print_r($search_text);echo "</pre>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                // // if ($id =='0') {
                // //     $id = $this->ion_auth->user()->row();
                // // }
                // echo "<pre>";print_r($this->ion_auth->user()->row());echo "<pre/>";exit();
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($id);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'datadiri';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                 $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['agama'] = $this->Pegawai_m->select_data('master_agama');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                $data['bagian'] = 'admin/data-pegawai-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_keluarga($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'keluarga';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['keluarga'] = $this->Pegawai_m->data_keluarga($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['stat_kawin'] = $this->Pegawai_m->select_data('master_status_kawin');
                $data['stat_keluarga'] = $this->Pegawai_m->select_data('master_status_dalam_keluarga');
                $data['bagian'] = 'admin/data-keluarga-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_rgolongan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rgol';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['rgolongan'] = $this->Pegawai_m->data_rgolongan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['bagian'] = 'admin/data-rgolongan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_rpangkat($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['titelbag'] = 'rpang';
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['rpangkat'] = $this->Pegawai_m->data_rpangkat($id);
                $data['pangkat'] = $this->Pegawai_m->select_data('master_pangkat');
                $data['bagian'] = 'admin/data-rpangkat-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_rjabatan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rjab';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['rjabatan'] = $this->Pegawai_m->data_rjabatan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['bagian'] = 'admin/data-rjabatan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_reselon($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'eselon';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['reselon'] = $this->Pegawai_m->data_reselon($id);
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['bagian'] = 'admin/data-reselon-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pendidikan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'pendidikan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['pendidikan'] = $this->Pegawai_m->data_pendidikan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['ipendidikan'] = $this->Pegawai_m->select_data('master_pendidikan');
                $data['bagian'] = 'admin/data-pendidikan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pelatihan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'pelatihan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['pelatihan'] = $this->Pegawai_m->data_pelatihan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-pelatihan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_penghargaan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-penghargaan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_seminar($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['titelbag'] = 'diklat';
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['seminar'] = $this->Pegawai_m->data_seminar($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-seminar-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_organisasi($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['titelbag'] = 'unit';
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['organisasi'] = $this->Pegawai_m->data_organisasi($id);
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-organisasi-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_gaji_pokok($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['gaji_pokok'] = $this->Pegawai_m->data_gaji_pokok($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-gaji_pokok-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_hukuman($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['titelbag'] = 'disiplin';
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['hukuman'] = $this->Pegawai_m->data_hukuman($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-hukuman-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_dp3($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'skp';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['dp3'] = $this->Pegawai_m->data_dp3($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['bagian'] = 'admin/data-dp3-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_pegawai' => $post['nama_pegawai'],
                    'nip'=>$post['nip'],
                    'nip_lama'=>$post['nip_lama'],
                    'no_kartu_pegawai'=>$post['no_kartu_pegawai'],
                    'no_npwp'=>$post['no_npwp'],
                    'kartu_askes_pegawai'=>$post['kartu_askes_pegawai'],
                    'tempat_lahir'=>$post['tempat_lahir'],
                    'tanggal_lahir'=>$post['tanggal_lahir'],
                    'nomor_kk'=>$post['nomor_kk'],
                    'nomor_ktp'=>$post['nomor_ktp'],
                    'jenis_kelamin'=>$post['jenis_kelamin'],
                    'agama'=>$post['agama'],
                    'id_golongan'=>$post['id_golongan'],
                    'status_pegawai'=>$post['status_pegawai'],
                    'tanggal_pengangkatan_cpns'=>$post['tanggal_pengangkatan_cpns'],
                    'alamat'=>$post['alamat'],
                    'gaji_pokok'=>$post['gaji_pokok'],
                    'tmt_pns'=>$post['tmt_pns'],
                    'gelar_dpn'=>$post['gelar_dpn'],
                    'gelar_belakang'=>$post['gelar_belakang'],
                    'no_hp'=>$post['no_hp'],
                    'email'=>$post['email'],
                    'id_satuan_kerja'=>$post['skpd']
                );
                $this->Pegawai_m->insert_data('data_pegawai',$datainput);
                // Buat Akun User
                $username = $post['nip'];
                $email = $post['email'];
                $password = 'password';
                $group = array('2');

                $additional_data = array(
                    'first_name' => $post['nama_pegawai'],
                    'last_name' => 'Busel',
                    'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'phone' => '123456789',
                    'repassword' => $password,
                    'id_pegawai' => $this->Admin_m->last_id_p()->id_pegawai,
                    );
                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                // 
                $pesan = 'Data pegawai baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_keluarga($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_anggota_keluarga' => $post['nama_anggota_keluarga'],
                    'id_pegawai' => $idpegawai,
                    'tanggal_lahir'=>$post['tanggal_lahir_thn'].'-'.$post['tanggal_lahir_bln'].'-'.$post['tanggal_lahir_hr'],
                    'status_keluarga'=>$post['status_keluarga'],
                    'status_kawin'=>$post['status_kawin'],
                    'tanggal_nikah'=>$post['tanggal_nikah_thn'].'-'.$post['tanggal_nikah_bln'].'-'.$post['tanggal_nikah_hr'],
                    'tanggal_cerai_meninggal'=>$post['tanggal_cerai_meninggal_thn'].'-'.$post['tanggal_cerai_meninggal_bln'].'-'.$post['tanggal_cerai_meninggal_hr'],
                    'tanggal_meninggal'=>$post['tanggal_meninggal_thn'].'-'.$post['tanggal_meninggal_bln'].'-'.$post['tanggal_meninggal_hr'],
                    'pekerjaan'=>$post['pekerjaan'],
                    'no_kartu'=>$post['no_kartu']
                );
                $this->Pegawai_m->insert_data('data_keluarga',$datainput);
                $pesan = 'Data kerluarga baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_keluarga/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_rgolongan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_golongan'=>$post['id_golongan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk'],
                    'tmt_golongan'=>$post['tmt_golongan'],
                    'nomor_bkn'=>$post['nomor_bkn'],
                    'tanggal_bkn'=>$post['tanggal_bkn'],
                    'masa_kerja' =>$post['masa_kerja'],
                    'status' =>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skgol'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_riwayat_golongan',$datainput);
                $pesan = 'Data riwayat golongan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_rpangkat($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_pangkat'=>$post['id_pangkat'],
                    'status'=>$post['status'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk'],
                    'tanggal_mulai'=>$post['tanggal_mulai'],
                    'tanggal_selesai'=>$post['tanggal_selesai'],
                    'masa_kerja' =>$post['masa_kerja'],
                    'masa_kerja_bulan' =>$post['masa_kerja_bulan'],
                    'masa_kerja_tahun' =>$post['masa_kerja_tahun'],
                    'status_pangkat' =>$post['status_pangkat']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skgol'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_riwayat_pangkat',$datainput);
                $pesan = 'Data riwayat pangkat baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_rjabatan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'id_satuan_kerja'=>$post['id_satuan_kerja'],
                    'id_eselon'=>$post['id_eselon'],
                    'tmt_jabatan_rj'=>$post['tmt_jabatan_rj'],
                    'tanggal_sk_rj'=>$post['tanggal_sk_rj'],
                    'tmt_pelantikan_rj'=>$post['tmt_pelantikan_rj'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'status'=>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skjab'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['tanggal_sk_rj']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_riwayat_jabatan',$datainput);
                $pesan = 'Data riwayat jabatan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_pendidikan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'tingkat_pendidikan' => $post['tingkat_pendidikan'],
                    'id_pegawai' => $idpegawai,
                    'jurusan'=>$post['jurusan'],
                    'sekolah'=>$post['sekolah'],
                    'tempat_sekolah'=>$post['tempat_sekolah'],
                    'tanggal_lulus'=>$post['tanggal_lulus'],
                    'nomor_ijazah'=>$post['nomor_ijazah'],
                    'id_status'=>$post['id_status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('ijazah'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_ijazah']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                // echo "<pre>";print_r($datainput);echo "<pre/>";exit();
                $this->Pegawai_m->insert_data('data_pendidikan',$datainput);
                $pesan = 'Data pendidikan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_pelatihan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_kursus' => $post['nama_kursus'],
                    'id_pegawai' => $idpegawai,
                    'lama_kursus'=>$post['lama_kursus'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                    'no_sertifikat'=>$post['no_sertifikat'],
                    'instansi'=>$post['instansi'],
                    'instansi_penyelenggara'=>$post['instansi_penyelenggara']
                );
                $this->Pegawai_m->insert_data('data_pelatihan',$datainput);
                $pesan = 'Data pelatihan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pelatihan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_penghargaan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'jenis_penghargaan' => $post['jenis_penghargaan'],
                    'id_pegawai' => $idpegawai,
                    'no_keputusan' => $post['no_keputusan'],
                    'tanggal'=>$post['tanggal'],
                    'tahun' => $post['tahun']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('sertifikat'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['no_keputusan']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_penghargaan',$datainput);
                $pesan = 'Data Penghargaan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_seminar($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'uraian' => $post['uraian'],
                    'id_pegawai' => $idpegawai,
                    'lokasi'=>$post['lokasi'],
                    'tanggal'=>$post['tanggal']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('sertifikat'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_seminar',$datainput);
                $pesan = 'Data seminar baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_organisasi($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_satuan_kerja'=>$post['id_satuan_kerja'],
                    'id_pegawai' => $idpegawai,
                    'nomor'=>$post['nomor'],
                    'tanggal'=>$post['tanggal'],
                    'status'=>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('sk'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_organisasi',$datainput);
                $pesan = 'Data organisasi baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_gaji_pokok($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nomor_sk' => $post['nomor_sk'],
                    'id_pegawai' => $idpegawai,
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'dasar_perubahan'=>$post['dasar_perubahan'],
                    'gaji_pokok'=>$post['gaji_pokok'],
                    'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                    'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                    'masa_kerja'=>$post['masa_kerja'],
                    'pejabat_menetapkan'=>$post['pejabat_menetapkan']
                );
                $this->Pegawai_m->insert_data('data_gaji_pokok',$datainput);
                $pesan = 'Data gaji pokok baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_gaji_pokok/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_hukuman($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'uraian' => $post['uraian'],
                    'id_pegawai' => $idpegawai,
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk'],
                    'tanggal_mulai'=>$post['tanggal_mulai'],
                    'tanggal_selesai'=>$post['tanggal_selesai'],
                    'no_sk_pembatalan' =>$post['no_sk_pembatalan']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('sk'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['tanggal_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_hukuman',$datainput);
                $pesan = 'Data hukuman baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_dp3($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'tahun' => $post['tahun'],
                    'id_pegawai' => $idpegawai,
                    'orientasi_pelayanan'=>$post['orientasi_pelayanan'],
                    'integritas'=>$post['integritas'],
                    'komitmen'=>$post['komitmen'],
                    'disiplin'=>$post['disiplin'],
                    'kerjasama'=>$post['kerjasama'],
                    'kepemimpinan'=>$post['kepemimpinan'],
                    'nilai_skp'=>$post['nilai_skp'],
                    'id_pejabat_penilai'=>$post['id_pejabat_penilai'],
                    'id_atasan_pejabat_penilai'=>$post['id_atasan_pejabat_penilai'],
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'id_status_penilai'=>$post['id_status_penilai'],
                    'id_status_atasan'=>$post['id_status_atasan'],
                );
                $this->Pegawai_m->insert_data('data_dp3',$datainput);
                $pesan = 'Data riwayat jabatan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_dp3/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_rgolongan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rgol';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_golongan','id_riwayat_golongan',$idr);
                $data['bagian'] = 'admin/edit-rgolongan-v';
                $data['jeniskp'] = $this->Admin_m->select_data('master_status_jabatan');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_rpangkat($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rpang';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_pangkat','id_riwayat_pangkat',$idr);
                $data['bagian'] = 'admin/edit-rpangkat-v';
                $data['rpangkat'] = $this->Pegawai_m->data_rpangkat($id);
                $data['pangkat'] = $this->Pegawai_m->select_data('master_pangkat');
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_rgolongan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_golongan'=>$post['id_golongan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk'],
                    'tmt_golongan'=>$post['tmt_golongan'],
                    'nomor_bkn'=>$post['nomor_bkn'],
                    'tanggal_bkn'=>$post['tanggal_bkn'],
                    'masa_kerja' =>$post['masa_kerja'],
                    'status' =>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skgol'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_riwayat_golongan','id_riwayat_golongan',$idr,$datainput);
                $pesan = 'Data riwayat golongan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_rpangkat($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pangkat'=>$post['id_pangkat'],
                    'status'=>$post['status'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk'],
                    'tanggal_mulai'=>$post['tanggal_mulai'],
                    'tanggal_selesai'=>$post['tanggal_selesai'],
                    'masa_kerja' =>$post['masa_kerja'],
                    'masa_kerja_bulan' =>$post['masa_kerja_bulan'],
                    'masa_kerja_tahun' =>$post['masa_kerja_tahun'],
                    'status_pangkat' =>$post['status_pangkat']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skpangkat'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_riwayat_pangkat','id_riwayat_pangkat',$idr,$datainput);
                $pesan = 'Data riwayat pangkat baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_reselon($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_eselon'=>$post['id_eselon'],
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'status'=>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skeselon'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->insert_data('data_riwayat_eselon',$datainput);
                $pesan = 'Data riwayat esleon baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_reselon($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'eselon';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_eselon','id_riwayat_eselon',$idr);
                $data['bagian'] = 'admin/edit-reselon-v';
                $data['reselon'] = $this->Pegawai_m->data_reselon($id);
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_reselon($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_eselon'=>$post['id_eselon'],
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'status'=>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skeselon'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_riwayat_eselon','id_riwayat_eselon',$idr,$datainput);
                $pesan = 'Data riwayat eselon baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_rjabatan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rjab';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_jabatan','id_riwayat_jabatan',$idr);
                // echo "<pre/>";print_r($data['detail']);echo "<pre/>";exit();
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['bagian'] = 'admin/edit-rjabatan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_rjabatan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'id_satuan_kerja'=>$post['id_satuan_kerja'],
                    'id_eselon'=>$post['id_eselon'],
                    'tmt_jabatan_rj'=>$post['tmt_jabatan_rj'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk_rj'=>$post['tanggal_sk_rj'],
                    'tmt_pelantikan_rj'=>$post['tmt_pelantikan_rj'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'status'=>$post['status']
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('skjab'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['tanggal_sk_rj']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_riwayat_jabatan','id_riwayat_jabatan',$idr,$datainput);
                $pesan = 'Data riwayat jabatan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_pendidikan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'pendidikan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_pendidikan','id_pendidikan',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['ipendidikan'] = $this->Pegawai_m->select_data('master_pendidikan');
                $data['bagian'] = 'admin/edit-pendidikan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_pendidikan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post) ;echo "<pre/>";exit();
                $datainput = array(
                    'tingkat_pendidikan' => $post['tingkat_pendidikan'],
                    'id_pegawai' => $idpegawai,
                    'jurusan'=>$post['jurusan'],
                    'sekolah'=>$post['sekolah'],
                    'tempat_sekolah'=>$post['tempat_sekolah'],
                    'tanggal_lulus'=>$post['tanggal_lulus'],
                    'nomor_ijazah'=>$post['nomor_ijazah'],
                    'id_status'=>$post['id_status'],
                );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('ijazah'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor_ijazah']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_pendidikan','id_pendidikan',$idr,$datainput);
                $pesan = 'Data riwayat pendidikan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_pegawai($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post) ;echo "<pre/>";exit();
                $datainput = array(
                    'nama_pegawai' => $post['nama_pegawai'],
                    'nip'=>$post['nip'],
                    'nip_lama'=>$post['nip_lama'],
                    'no_kartu_pegawai'=>$post['no_kartu_pegawai'],
                    'no_npwp'=>$post['no_npwp'],
                    'kartu_askes_pegawai'=>$post['kartu_askes_pegawai'],
                    'tempat_lahir'=>$post['tempat_lahir'],
                    'tanggal_lahir'=>$post['tanggal_lahir'],
                    'nomor_kk'=>$post['nomor_kk'],
                    'nomor_ktp'=>$post['nomor_ktp'],
                    'jenis_kelamin'=>$post['jenis_kelamin'],
                    'agama'=>$post['agama'],
                    'status_pegawai'=>$post['status_pegawai'],
                    'tanggal_pengangkatan_cpns'=>$post['tanggal_pengangkatan_cpns_thn'].'-'.$post['tanggal_pengangkatan_cpns_bln'].'-'.$post['tanggal_pengangkatan_cpns_hr'],
                    'alamat'=>$post['alamat'],
                    'gaji_pokok'=>$post['gaji_pokok'],
                    'tmt_pns'=>$post['tmt_pns_thn'].'-'.$post['tmt_pns_bln'].'-'.$post['tmt_pns_hr'],
                    'tmt_cpns'=>$post['tmt_cpns_thn'].'-'.$post['tmt_cpns_bln'].'-'.$post['tmt_cpns_hr'],
                    'gelar_dpn'=>$post['gelar_dpn'],
                    'gelar_belakang'=>$post['gelar_belakang'],
                    'no_hp'=>$post['no_hp'],
                    'email'=>$post['email'],
                    'id_satuan_kerja'=>$post['skpd']
                );
                $this->Pegawai_m->update_data('data_pegawai','id_pegawai',$idpegawai,$datainput);
                $pesan = 'Data riwayat pegawai baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_foto_pegawai(){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                if (!empty($_FILES["fotop"])) {
                    $config['file_name'] = strtolower(url_title('pegawai'.'-'.$post['id_pegawai'].'-'.date('ymd').'-'.time('hms')));
                    $config['upload_path'] = './asset/img/pegawai/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('fotop')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('eror', $error );
                        redirect(base_url('index.php/admin/pegawai/detail/'.$post['id_pegawai']));
                    }
                    else{
                        $file = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$post['id_pegawai'])->foto;
                        if ($file != "avatar.png") {
                            unlink("asset/img/pegawai/$file");
                        }
                        $img = $this->upload->data('file_name');
                        $data['foto'] = $img;
                        $this->Admin_m->update('data_pegawai','id_pegawai',$post['id_pegawai'],$data);
                        $file = "asset/img/pegawai/$img";
                        //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
                        $resizedFile = "asset/img/pegawai/$img";
                        $this->resize->smart_resize_image(null , file_get_contents($file), 250 , 250 , false , $resizedFile , true , false ,100 );
                        $pesan = 'Foto Pegawai Berhasil diubah';
                        $this->session->set_flashdata('message', $pesan );
                        redirect(base_url('index.php/admin/pegawai/detail/'.$post['id_pegawai']));
                    }
                }
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_pelatihan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'pelatihan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_pelatihan','id_pelatihan',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-pelatihan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_pelatihan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_kursus' => $post['nama_kursus'],
                    'lama_kursus'=>$post['lama_kursus'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                    'no_sertifikat'=>$post['no_sertifikat'],
                    'instansi'=>$post['instansi'],
                    'instansi_penyelenggara'=>$post['instansi_penyelenggara']
                );
                $this->Pegawai_m->update_data('data_pelatihan','id_pelatihan',$idr,$datainput);
                $pesan = 'Data riwayat pelatihan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pelatihan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_penghargaan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_penghargaan','id_penghargaan',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-penghargaan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_penghargaan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(

                   'jenis_penghargaan' => $post['jenis_penghargaan'],
                   'no_keputusan' => $post['no_keputusan'],
                   'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                   'tahun' => $post['tahun']
               );

                $this->Pegawai_m->update_data('data_penghargaan','id_penghargaan',$idr,$datainput);
                $pesan = 'Data riwayat penghargaan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_seminar($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'seminar';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_seminar','id_seminar',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-seminar-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_seminar($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                   'uraian' => $post['uraian'],
                   'lokasi'=>$post['lokasi'],
                   'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr']
               );
                $this->Pegawai_m->update_data('data_seminar','id_seminar',$idr,$datainput);
                $pesan = 'Data riwayat seminar baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_organisasi($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'organisasi';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_organisasi','id_organisasi',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['bagian'] = 'admin/edit-organisasi-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_organisasi($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                   'id_satuan_kerja'=>$post['id_satuan_kerja'],
                   'nomor'=>$post['nomor'],
                   'tanggal'=>$post['tanggal'],
                   'status'=>$post['status']
               );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('sk'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['nomor']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_organisasi','id_organisasi',$idr,$datainput);
                $pesan = 'Data riwayat organisasi baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_gaji_pokok($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_gaji_pokok','id_gaji_pokok',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-gaji_pokok-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_gaji_pokok($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                   'nomor_sk' => $post['nomor_sk'],
                   'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                   'dasar_perubahan'=>$post['dasar_perubahan'],
                   'gaji_pokok'=>$post['gaji_pokok'],
                   'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                   'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                   'masa_kerja'=>$post['masa_kerja'],
                   'pejabat_menetapkan'=>$post['pejabat_menetapkan']
               );
                $this->Pegawai_m->update_data('data_gaji_pokok','id_gaji_pokok',$idr,$datainput);
                $pesan = 'Data riwayat gaji pokok baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_gaji_pokok/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_hukuman($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'hukuman';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_hukuman','id_hukuman',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-hukuman-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_hukuman($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(

                 'uraian' => $post['uraian'],
                 'nomor_sk'=>$post['nomor_sk'],
                 'tanggal_sk'=>$post['tanggal_sk'],
                 'tanggal_mulai'=>$post['tanggal_mulai'],
                 'tanggal_selesai'=>$post['tanggal_selesai'],
                 'no_sk_pembatalan' =>$post['no_sk_pembatalan']
               );
                if (!empty($_FILES["upload"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('sk'.'-'.$idpegawai.'-'.date('Ymd').'-'.$post['tanggal_sk']));
                    $config['upload_path'] = './asset/dokumen/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('upload')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error );
                        redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $datainput['upload'] = $img;
                    }
                }
                $this->Pegawai_m->update_data('data_hukuman','id_hukuman',$idr,$datainput);
                $pesan = 'Data riwayat hukuman baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_dp3($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'dp3';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_dp3','id_dp3',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-dp3-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_dp3($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                 'tahun' => $post['tahun'],
                    'id_pegawai' => $idpegawai,
                    'orientasi_pelayanan'=>$post['orientasi_pelayanan'],
                    'integritas'=>$post['integritas'],
                    'komitmen'=>$post['komitmen'],
                    'disiplin'=>$post['disiplin'],
                    'kerjasama'=>$post['kerjasama'],
                    'kepemimpinan'=>$post['kepemimpinan'],
                    'nilai_skp'=>$post['nilai_skp'],
                    'id_pejabat_penilai'=>$post['id_pejabat_penilai'],
                    'id_atasan_pejabat_penilai'=>$post['id_atasan_pejabat_penilai'],
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'id_status_penilai'=>$post['id_status_penilai'],
                    'id_status_atasan'=>$post['id_status_atasan'],
               );
                $this->Pegawai_m->update_data('data_dp3','id_dp3',$idr,$datainput);
                $pesan = 'Data riwayat dp3 baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_dp3/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_keluarga($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'keluarga';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_keluarga','id_data_keluarga',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['stat_kawin'] = $this->Pegawai_m->select_data('master_status_kawin');
                $data['stat_keluarga'] = $this->Pegawai_m->select_data('master_status_dalam_keluarga');
                $data['bagian'] = 'admin/edit-keluarga-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function update_keluarga($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_anggota_keluarga' => $post['nama_anggota_keluarga'],
                    'tanggal_lahir'=>$post['tanggal_lahir_thn'].'-'.$post['tanggal_lahir_bln'].'-'.$post['tanggal_lahir_hr'],
                    'status_keluarga'=>$post['status_keluarga'],
                    'status_kawin'=>$post['status_kawin'],
                    'tanggal_nikah'=>$post['tanggal_nikah_thn'].'-'.$post['tanggal_nikah_bln'].'-'.$post['tanggal_nikah_hr'],
                    'tanggal_cerai_meninggal'=>$post['tanggal_cerai_meninggal_thn'].'-'.$post['tanggal_cerai_meninggal_bln'].'-'.$post['tanggal_cerai_meninggal_hr'],
                    'tanggal_meninggal'=>$post['tanggal_meninggal_thn'].'-'.$post['tanggal_meninggal_bln'].'-'.$post['tanggal_meninggal_hr'],
                    'pekerjaan'=>$post['pekerjaan'],
                    'no_kartu'=>$post['no_kartu']
                );
                $this->Pegawai_m->update_data('data_keluarga','id_data_keluarga',$idr,$datainput);
                $pesan = 'Data riwayat keluarga baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_keluarga/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_dp3($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_dp3','id_dp3',$idr);
                $pesan = 'Data riwayat dp3 baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_dp3/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_keluarga($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_keluarga','id_data_keluarga',$idr);
                $pesan = 'Data riwayat keluarga baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_keluarga/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }

    public function delete_rgolongan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_golongan','id_riwayat_golongan',$idr);
                $pesan = 'Data riwayat golongan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_reselon($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_eselon','id_riwayat_eselon',$idr);
                $pesan = 'Data riwayat eselon baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_rjabatan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_jabatan','id_riwayat_jabatan',$idr);
                $pesan = 'Data riwayat jabatan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_pendidikan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_pendidikan','id_pendidikan',$idr);
                $pesan = 'Data riwayat pendidikan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_pelatihan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_pelatihan','id_pelatihan',$idr);
                $pesan = 'Data riwayat pelatihan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pelatihan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_penghargaan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_penghargaan','id_penghargaan',$idr);
                $pesan = 'Data riwayat penghargaan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_seminar($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_seminar','id_seminar',$idr);
                $pesan = 'Data riwayat seminar baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_organisasi($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_organisasi','id_organisasi',$idr);
                $pesan = 'Data riwayat organisasi baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_gaji_pokok($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_gaji_pokok','id_gaji_pokok',$idr);
                $pesan = 'Data riwayat gaji baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_gaji_pokok/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_hukuman($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_hukuman','id_hukuman',$idr);
                $pesan = 'Data riwayat hukuman baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_pegawai($id_pegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_pegawai','id_pegawai',$id_pegawai);
                $pesan = 'Data Pegawai berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function uploadImage() {
        $this->load->helper(array('form', 'url'));  
        $config['upload_path'] = 'assets/images/pegawai';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $config['width'] = 75;
        $config['height'] = 50;
        if (isset($_FILES['foto']['nama_pegawai'])) {
            $filename = "-" . $_FILES['foto']['nama_pegawai'];
            $config['file_name'] = substr(md5(time()), 0, 28) . $filename;
        }
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $field_name = "foto";
        $this->load->library('upload', $config);
        if ($this->input->post('selsub')) {
            if (!$this->upload->do_upload('foto')) {
                //no file uploaded or failed upload
                $error = array('error' => $this->upload->display_errors());
            } else {
                $dat = array('upload_data' => $this->upload->data());
                $this->resize($dat['upload_data']['full_path'],           $dat['upload_data']['file_name']);
            }
            $ip = $_SERVER['REMOTE_ADDR'];
            if (empty($dat['upload_data']['file_name'])) {
                $catimage = '';
            } else {
                $catimage = $dat['upload_data']['file_name'];
            }
            $data = array(            
                'ctg_image' => $catimage,
                'ctg_dated' => time()
            );
            $this->b2bcategory_model->form_insert($data);

        }
    }
    public function cetak_data_pegawai($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                $data['pelatihan'] = $this->Pegawai_m->data_pelatihan($id);
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['pelatihan'] = $this->Admin_m->select_data_order('data_pelatihan','id_pegawai',$id);
                $data['penghargaan'] = $this->Admin_m->select_data_order('data_penghargaan','id_pegawai',$id);
                $data['seminar'] = $this->Admin_m->select_data_order('data_seminar','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);
                $data['hukuman'] = $this->Admin_m->select_data_order('data_hukuman','id_pegawai',$id);
                $data['data_dp3'] = $this->Admin_m->select_data_order('data_dp3','id_pegawai',$id);
                // pagging setting
                $this->load->view('admin/cetak-detail-pegawai-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }

public function lap_pegawaiperpendidikan(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Laporan Pegawai Per-Pendidikan';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/lyt-pgwpendidikan-v';
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
public function ctk_pegawaiperpendidikan(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Laporan Pegawai Per-Pendidikan';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['golongan'] = $this->Pegawai_m->get_golongan();
                $data['aside'] = 'nav/nav';
                
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                // pagging setting
                // $cek =$this->Pegawai_m->jml_peg1('17','25');
                // echo"<pre>";print_r($cek);echo "<pre/>";exit();
                $this->load->view('admin/lap_pegawai_perpendidikan',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }

    public function lap_dpcp($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                
                $data['dtgolongan'] = $this->Admin_m->last_golongan($id);
                $data['dtpangkat'] = $this->Admin_m->last_pangkat($id);
                $data['dtjabatan'] = $this->Admin_m->last_jabatan($id);
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);

                // pagging setting
                $this->load->view('admin/lap-dpcp-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function lap_daftar_riwayat_pekerjaan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                $data['dtgolongan'] = $this->Admin_m->last_golongan($id);
                $data['dtpangkat'] = $this->Admin_m->last_pangkat($id);
                $data['dtjabatan'] = $this->Admin_m->last_jabatan($id);
               
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);

                // pagging setting
                $this->load->view('admin/lap-daftar-riwayat-pekerjaan-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function lap_surat_pernyataan_tidak_sedang_menjalani_proses_pidana($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                $data['dtgolongan'] = $this->Admin_m->last_golongan($id);
                $data['dtpangkat'] = $this->Admin_m->last_pangkat($id);
                $data['dtjabatan'] = $this->Admin_m->last_jabatan($id);
               
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);

                // pagging setting
                $this->load->view('admin/lap-surat-pernyataan-tidak-sedang-menjalani-proses-pidana-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function lap_surat_pernyataan_disiplin($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                $data['dtgolongan'] = $this->Admin_m->last_golongan($id);
                $data['dtpangkat'] = $this->Admin_m->last_pangkat($id);
                $data['dtjabatan'] = $this->Admin_m->last_jabatan($id);
               
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);

                // pagging setting
                $this->load->view('admin/lap-surat-pernyataan-disiplin-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function lap_daftar_susunan_keluarga($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                $data['dtgolongan'] = $this->Admin_m->last_golongan($id);
                $data['dtpangkat'] = $this->Admin_m->last_pangkat($id);
                $data['dtjabatan'] = $this->Admin_m->last_jabatan($id);
               
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);

                // pagging setting
                $this->load->view('admin/lap-daftar-susunan-keluarga-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function lap_pegawaipergolongan(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Laporan Pegawai Per-Golongan';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['golongan'] = $this->Pegawai_m->get_golongan();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/lyt-pgwgolongan-v';
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function ctk_pegawaipergolongan(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','user01');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Laporan Pegawai Per-Golongan';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['golongan'] = $this->Pegawai_m->get_golongan();
                $data['aside'] = 'nav/nav';
                
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                // pagging setting
                // $cek =$this->Pegawai_m->jml_peg1('17','25');
                // echo"<pre>";print_r($cek);echo "<pre/>";exit();
                $this->load->view('admin/lap_pegawai_pergolongan',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    function uploadexcel(){
      $post = $this->input->post();
      if (!is_dir('asset/upload/')) {
          mkdir('asset/upload/');
      }
      if (!preg_match("/.(xls|xlsx)$/i", $_FILES["fileupload"]["name"]) ) {

          echo "pastikan file yang anda pilih xls|xlsx";
          exit();

      } else {
          move_uploaded_file($_FILES["fileupload"]["tmp_name"],'asset/upload/'.$_FILES['fileupload']['name']);
          $semester = array("fileupload"=>$_FILES["fileupload"]["name"]);

      }
      $objPHPExcel = PHPExcel_IOFactory::load('asset/upload/'.$_FILES['fileupload']['name']);
      $data = $objPHPExcel->getActiveSheet()->toArray();
      $error_count = 0;
      $error = array();
      $sukses = 0;
      foreach ($data as $key => $val) {
        if ($key>0){
            if ($val[0]!='') {
                $ceknip = $this->Admin_m->detail_data_order('data_pegawai','nip',trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)));
                if ($ceknip == TRUE) {
                    $dataupdate = array(
                        'nama_pegawai' =>filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tempat_lahir' =>filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tanggal_lahir' =>filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tmt_cpns' =>filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tmt_pns' =>filter_var($val[6], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'jenis_kelamin' =>filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'agama' =>filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'id_satuan_kerja' =>filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'status_pegawai' =>filter_var($val[10], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),   
                    );
                    $this->Admin_m->update('data_pegawai','id_pegawai',$ceknip->id_pegawai,$dataupdate);
                }else{
                    $carijk = $this->Admin_m->cari_jk(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                    if ($carijk == TRUE) {
                        $jk = $carijk->id_jk;
                    }else{
                        $newjk = array(
                            'id_jk'=>filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'kode_jk'=>filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'nm_jk'=>filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        );
                        $this->Admin_m->create('jk',$newjk);
                        $new_jk = $this->Admin_m->cari_jk(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                        $jk = $new_jk->id_jk;
                    }
                    $cariagama = $this->Admin_m->cari_agama(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                    if ($cariagama == TRUE) {
                        $agama = $cariagama->id_agama;
                    }else{
                        $newagama = array(
                            'id_agama'=>filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'nm_agama'=>filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        );
                        $this->Admin_m->create('master_agama',$newagama);
                        $new_agama = $this->Admin_m->cari_agama(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                        $agama = $new_agama->id_agama;
                    }
                    $cariskpd = $this->Admin_m->cari_skpd(filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                    if ($cariskpd == TRUE) {
                        $skpd = $cariskpd->id_satuan_kerja;
                    }else{
                        $newskpd = array(
                            'id_satuan_kerja'=>filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'nama_satuan_kerja'=>filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'parent_unit'=>filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'alamat'=>filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        );
                        $this->Admin_m->create('master_satuan_kerja',$newskpd);
                        $new_skpd = $this->Admin_m->cari_skpd(filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                        $skpd = $new_skpd->id_satuan_kerja;
                    }
                    $caristatus = $this->Admin_m->cari_status(filter_var($val[10], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                    if ($caristatus == TRUE) {
                        $status = $caristatus->id_status_pegawai;
                    }else{
                        $newstatus = array(
                            'id_status_pegawai'=>filter_var($val[10], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                            'nama_status'=>filter_var($val[10], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        );
                        $this->Admin_m->create('master_status_pegawai',$newstatus);
                        $new_status = $this->Admin_m->cari_status(filter_var($val[10], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                        $status = $new_status->id_status_pegawai;
                    }
                    $data = array(
                        'nama_pegawai' =>filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'nip' =>preg_replace("/[^0-9]/", "",trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH))),
                        'tempat_lahir' =>filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tanggal_lahir' =>filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tmt_cpns' =>filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'tmt_pns' =>filter_var($val[6], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'jenis_kelamin' =>$jk,
                        'agama' =>$agama,
                        'id_satuan_kerja' =>$skpd,
                        'status_pegawai' =>$status,   
                    );
                    $this->Admin_m->create('data_pegawai',$data);
                    // membuat user
                    $infopt = $this->Admin_m->info_pt(1);
                    $username = preg_replace("/[^0-9]/", "",trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)));
                    $email = strtolower(url_title(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH).'@buselkab.go.id'));
                    $password = 'password';
                    $group = array('2');
                    $getpegawai = $this->Admin_m->detail_data_order('data_pegawai','nip',preg_replace("/[^0-9]/", "",trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH))));
                    $additional_data = array(
                        'id_pegawai'=>$getpegawai->id_pegawai,
                        'first_name' => filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                        'last_name' => $infopt->nama_info_pt,
                        'company' => $infopt->nama_info_pt,
                        'phone' => '123456789',
                        'repassword' => $password,
                        );
                    $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                }  
            }
        }
    }
    unlink("asset/upload/".$_FILES['fileupload']['name']);
    $msg = 'Data berhasil di upload';
    $this->session->set_flashdata('message', $msg);
    redirect(base_url('index.php/admin/pegawai/'));
    }

}
?>