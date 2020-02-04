<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Honorer extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Honorer_m');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/honorer-v';
                $jumlah = $this->Honorer_m->jumlah_data(@$post['string'],@$post['skpd']);
                $config['base_url'] = base_url().'/index.php/admin/honorer/index/';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = '10';
                $config['first_page'] = 'Awal';
                $config['last_page'] = 'Akhir';
                $config['next_page'] = '&laquo;';
                $config['prev_page'] = '&raquo;';
                // bootstap style
                $config['first_link']       = 'Pertama';
                $config['last_link']        = 'Terakhir';
                $config['next_link']        = 'Selanjutnya';
                $config['prev_link']        = 'Sebelumnya';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
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
                //inisialisasi config
                $this->pagination->initialize($config);
                $data['skpd'] = $this->Honorer_m->select_data('master_lokasi_kerja');
                $data['status'] = $this->Honorer_m->select_data('master_status_pegawai');
                $data['agama'] = $this->Honorer_m->select_data('master_agama');
                $data['golongan'] = $this->Honorer_m->select_data('master_golongan');
                $data['eselon'] = $this->Honorer_m->select_data('master_eselon');
                $data['sjabatan'] = $this->Honorer_m->select_data('master_status_jabatan');

                // pengaturan searching
                $data['jmldata'] = $jumlah;
                $data['nmr'] = $offset;
                $data['hasil'] = $this->Honorer_m->searcing_data($config['per_page'],$offset,@$post['string'],@$post['skpd']);
                $data['pagging'] = $this->pagination->create_links();
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
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama' => $post['nama'],
                    'alamat'=>$post['alamat'],
                    'pendidikan'=>$post['pendidikan'],
                    'jurusan'=>$post['jurusan'],
                    'tat'=>$post['tat'],
                    'id_lokasi_kerja'=>$post['id_lokasi_kerja'],
                    'tmt'=>$post['tmt'],
                    'tanggal_lahir'=>$post['tanggal_lahir'],
                    'tempat_lahir'=>$post['tempat_lahir'],
                    'no_hp'=>$post['no_hp'],
                );
                $this->Honorer_m->insert_data('honorer',$datainput);
                $pesan = 'Data Honorer baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_honorer($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Honorer_m->detail_data('honorer','id_honorer',$id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['detail'] = $result;
                $data['skpd'] = $this->Honorer_m->select_data('master_lokasi_kerja');
                $data['page'] = 'admin/edit-honorer-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
public function update_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama' => $post['nama'],
                    'alamat'=>$post['alamat'],
                    'pendidikan'=>$post['pendidikan'],
                    'jurusan'=>$post['jurusan'],
                    'tat'=>$post['tat'],
                    'id_lokasi_kerja'=>$post['id_lokasi_kerja'],
                    'tmt'=>$post['tmt'],
                    'tanggal_lahir'=>$post['tanggal_lahir'],
                    'tempat_lahir'=>$post['tempat_lahir'],
                    'no_hp'=>$post['no_hp'],
                );
                // echo "<pre>";print_r($datainput);echo "<pre/>";exit();

                $this->Honorer_m->update_data('honorer','id_honorer',$post['id_honorer'],$datainput);
                $pesan = 'Data Honorer golongan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    
    public function delete_honorer($id_honorer){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Honorer_m->delete_data('honorer','id_honorer',$id_honorer);
                $pesan = 'Data Honorer berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function lap_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Laporan Data Pegawai Honorer / Magang';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/lyt-honorer-v';
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Honorer_m->select_data('honorer');
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
public function ctk_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Laporan Data Honorer / Magang';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Honorer_m->select_data('honorer');
                // pagging setting
                // $cek =$this->Pegawai_m->jml_peg1('17','25');
                // echo"<pre>";print_r($cek);echo "<pre/>";exit();
                $this->load->view('admin/lap_honorer',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function ctk_sk_kolektif(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'SK Kolektif Magang';
                $data['titelbag'] = 'penghargaan';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                
                // $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['skpd'] = $this->Honorer_m->select_data('honorer');
                // pagging setting
                // $cek =$this->Pegawai_m->jml_peg1('17','25');
                // echo"<pre>";print_r($cek);echo "<pre/>";exit();
                $this->load->view('admin/ctk_sk_kolektif_magang-v',$data);
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
                $lastid = $this->Honorer_m->lasthonorer();
                if ($lastid==TRUE) {
                    $getid = $lastid->id_honorer+1;
                }else{
                    $getid = 1;
                }
                $getlok = $this->Honorer_m->getlok(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                if ($getlok == TRUE) {
                    $dtlok = $getlok->id_lokasi_kerja;
                }else{
                    $dtlok = '0';
                }
                $nohonorer = date('dmY').str_pad($getid, 4, '0', STR_PAD_LEFT);
                $datacreate = array(
                    'no_honorer'=>$nohonorer,
                    'nama' =>filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'alamat' =>filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'tat' =>filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'id_lokasi_kerja' =>$dtlok,
                    'tmt' =>filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'no_hp' =>filter_var($val[6], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'tempat_lahir' =>filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'tanggal_lahir' =>filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'pendidikan' =>filter_var($val[9], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'jurusan' =>filter_var($val[10], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),

                );
                $this->Admin_m->create('honorer',$datacreate); 
            }
        }
    }
    unlink("asset/upload/".$_FILES['fileupload']['name']);
    $msg = 'Data berhasil di upload';
    $this->session->set_flashdata('message', $msg);
    redirect(base_url('index.php/admin/honorer/'));
    }
}
?>