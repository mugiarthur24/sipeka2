<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_m');
    $this->load->library('Excel');
  }
  function dataexcel(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'NOMINATIF PEGAWAI BUSEL';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "cita" );
      $file->getProperties ()->setLastModifiedBy ( "simpegbusel" );
      $file->getProperties ()->setTitle ( "NOMINATIF PEGAWAI BUSEL" );
      $file->getProperties ()->setSubject ( "NOMINATIF PEGAWAI BUSEL" );
      $file->getProperties ()->setDescription ( "NOMINATIF PEGAWAI BUSEL" );
      $file->getProperties ()->setKeywords ( "NOMINATIF PEGAWAI BUSEL" );
      $file->getProperties ()->setCategory ( "NOMINATIF PEGAWAI BUSEL" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "NOMINATIF PEGAWAI BUSEL" );
      $sheet->mergeCells('A1:AG1');
      $sheet->setCellValue ( "A1", "DAFTAR NOMINATIF PNS LINGKUP PEMERINTAH KABUPATEN BUTON SELATAN" );
      $sheet->mergeCells('A2:AG2');
      $sheet->setCellValue ( "A2", "" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->mergeCells('A4:A5');
      $sheet->setCellValue ( "A4", "NO" );
      $sheet->mergeCells('B4:B5');
      $sheet->setCellValue ( "B4", "NAMA" );
      $sheet->mergeCells('C4:C5');
      $sheet->setCellValue ( "C4", "NIP" );
      $sheet->mergeCells('D4:E5');
      $sheet->setCellValue ( "D4", "TEMPAT DAN TGL LAHIR" );
      $sheet->setCellValue ( "D5", "TEMPAT" );
      $sheet->setCellValue ( "E5", "TEMPAT" );
      $sheet->mergeCells('F4:H4');
      $sheet->setCellValue ( "F4", "CPNS/PNS" );
      $sheet->setCellValue ( "F5", "GOL AWAL " );
      $sheet->setCellValue ( "G5", "CPNS TMT" );
      $sheet->setCellValue ( "H5", "PNS TMT" );
      $sheet->mergeCells('I4:K4');
      $sheet->setCellValue ( "I4", "GOL.RUANG" );
      $sheet->setCellValue ( "I5", "PANGKAT" );
      $sheet->setCellValue ( "J5", "GOL" );
      $sheet->setCellValue ( "K5", "TMT" );
      $sheet->mergeCells('L4:L5');
      $sheet->setCellValue ( "L4", "L/P" );
      $sheet->mergeCells('M4:M5');
      $sheet->setCellValue ( "M4", "STATUS PERKAWINAN" );
      $sheet->mergeCells('N4:N5');
      $sheet->setCellValue ( "N4", "AGAMA" );
      $sheet->mergeCells('O4:Q4');
      $sheet->setCellValue ( "O4", "PENDIDIKAN" );
      $sheet->setCellValue ( "O5", "TINGKAT PENDIDIKAN" );
      $sheet->setCellValue ( "P5", "JURUSAN" );
      $sheet->setCellValue ( "Q5", "TAHUN LULUS" );
      $sheet->mergeCells('R4:T4');
      $sheet->setCellValue ( "R4", "JABATAN" );
      $sheet->setCellValue ( "R5", "NAMA JABATAN" );
      $sheet->setCellValue ( "S5", "ESELON" );
      $sheet->setCellValue ( "T5", "TAHUN LULUS" );
      $sheet->mergeCells('U4:U5');
      $sheet->setCellValue ( "U4", "Diklat Penjenjangan / Kursus" );
      $sheet->setCellValue ( "V4", "Pegawai Pindah Masuk" );
      $sheet->setCellValue ( "V5", "Prov/Kab/Kota Sebelum Pindah Ke Pemkab Busel" );
      $sheet->mergeCells('W4:W5');
      $sheet->setCellValue ( "W4", "SKPD" );

      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data('data_pegawai');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nama_pegawai));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "D".$nocel, strtoupper($data->tempat_lahir) );
        $sheet->setCellValue ( "E".$nocel, strtoupper($data->tanggal_lahir) );
        $sheet->setCellValue ( "F".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "G".$nocel, strtoupper($data->tmt_cpns) );
        $sheet->setCellValue ( "H".$nocel, strtoupper($data->tmt_pns) );
        $sheet->setCellValue ( "I".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "J".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "K".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "L".$nocel, strtoupper($data->jenis_kelamin) );
        $sheet->setCellValue ( "M".$nocel, strtoupper($data->status_pegawai) );
        $sheet->setCellValue ( "N".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "O".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "P".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "Q".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "R".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "T".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "U".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "V".$nocel, strtoupper($data->nip) );
        $sheet->setCellValue ( "W".$nocel, strtoupper($this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja));

        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_nominatif_pegawai.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function dataexcel_honorer(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'List Laporan Data Honorer';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "List Laporan Data Honorer" );
      $file->getProperties ()->setSubject ( "Daftar Honorer" );
      $file->getProperties ()->setDescription ( "Daftar Honorer" );
      $file->getProperties ()->setKeywords ( "Daftar Honorer" );
      $file->getProperties ()->setCategory ( "Daftar Honorer" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
      
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Honorer" );
      $sheet->mergeCells('A1:I1');
      $sheet->setCellValue ( "A1", "DAFTAR PEGAWAI HONORER" );
      $sheet->mergeCells('A2:I2');
      $sheet->setCellValue ( "A2", "DI LINGKUP PEMERINTAH KABUPATEN BUTON" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A5", "No" );
      $sheet->setCellValue ( "B5", "NAMA" );
      $sheet->setCellValue ( "C5", "ALAMAT" );
      $sheet->setCellValue ( "D5", "TEMPAT LAHIR" );
      $sheet->setCellValue ( "E5", "TANGGAL LAHIR" );
      $sheet->setCellValue ( "F5", "TMT" );
      $sheet->setCellValue ( "G5", "TAT" );
      $sheet->setCellValue ( "H5", "NOMOR HP" );
      $sheet->setCellValue ( "I5", "LOKASI KERJA" );
      
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 6;
      $hasil = $this->Admin_m->select_data('honorer');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nama));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->alamat) );
        $sheet->setCellValue ( "D".$nocel, strtoupper($data->tempat_lahir));
        $sheet->setCellValue ( "E".$nocel, strtoupper($data->tanggal_lahir));
        $sheet->setCellValue ( "F".$nocel, strtoupper($data->tmt));
        $sheet->setCellValue ( "G".$nocel, strtoupper($data->tat));
        $sheet->setCellValue ( "H".$nocel, strtoupper($data->no_hp));
        $sheet->setCellValue ( "I".$nocel, strtoupper($this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja));      
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /*start - BLOK AUTOSIZE*/
  $sheet ->getColumnDimension ( "A" )->setWidth(4);
  $sheet ->getColumnDimension ( "B" )->setWidth(00);
  $sheet ->getColumnDimension ( "C" )->setWidth(25);
  $sheet ->getColumnDimension ( "D" )->setWidth(35);
  $sheet ->getColumnDimension ( "E" )->setWidth(20);
  $sheet ->getColumnDimension ( "F" )->setWidth(20);
  $sheet ->getColumnDimension ( "G" )->setWidth(20);
  $sheet ->getColumnDimension ( "H" )->setWidth(20);
  $sheet ->getColumnDimension ( "I" )->setWidth(20);
  
/*end - BLOG AUTOSIZE*/

// Add a drawing to the worksheet
// $sheet = new PHPExcel_Worksheet_Drawing();
// $sheet->setName(‘bg’);
// $sheet->setDescription(‘bg’);
// $sheet->setPath(‘.img/lembaga/bg.png’);
// $sheet->setCoordinates(‘D2’);
// $sheet->setHeight(100);
// $sheet->setWidth(100);
// $sheet->setWorksheet($objPHPExcel->getActiveSheet());

/*start - BLOCK UNTUK BORDER*/
$thick = array ();
$thick['borders']=array();
$thick['borders']['allborders']=array();
$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THICK ;
$sheet->getStyle ( 'A5:I5' )->applyFromArray ($thick);

$thin = array ();
$thin['borders']=array();
$thin['borders']['allborders']=array();
$thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
$sheet->getStyle ( 'A5:I12' )->applyFromArray ($thin);
/*end - BLOCK UNTUK BORDER*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_honorer.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function dataexcel_pegawaiall(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'List Laporan Data Pegawai';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "List Laporan Data Pegawai" );
      $file->getProperties ()->setSubject ( "Daftar Pegawai" );
      $file->getProperties ()->setDescription ( "Daftar Pegawai" );
      $file->getProperties ()->setKeywords ( "Daftar Pegawai" );
      $file->getProperties ()->setCategory ( "Daftar Pegawai" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Data Pegawai" );
      $sheet->mergeCells('A1:G1');
      $sheet->setCellValue ( "A1", "DAFTAR PEGAWAI KABUPATEN BUTON" );
      $sheet->mergeCells('A2:G2');
      $sheet->setCellValue ( "A2", "PEMERINTAH KABUPATEN BUTON" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A5", "No" );
      $sheet->setCellValue ( "B5", "NAMA PEGAWAI" );
      $sheet->setCellValue ( "C5", "NIP" );
      $sheet->setCellValue ( "D5", "NIP LAMA" );
      $sheet->setCellValue ( "E5", "TEMPAT LAHIR" );
      $sheet->setCellValue ( "F5", "TANGGAL LAHIR" );
      $sheet->setCellValue ( "G5", "AGAMA" );
      $sheet->setCellValue ( "G6", "NOMOR KARTU KELUARGA" );
      $sheet->setCellValue ( "G7", "NOMOR KARTU PEGAWAI" );
      $sheet->setCellValue ( "G8", "NO KTP" );
      $sheet->setCellValue ( "G9", "JENIS KELAMIN" );
      $sheet->setCellValue ( "G10", "STATUS PEGAWAI" );
      $sheet->setCellValue ( "G11", "ALAMAT" );
      $sheet->setCellValue ( "G12", "NO. HP" );
      $sheet->setCellValue ( "G13", "EMAIL" );
      $sheet->setCellValue ( "G14", "NO. NPWP" );
      $sheet->setCellValue ( "G15", "GOLOGAN" );
      $sheet->setCellValue ( "G16", "JABATAN" );
      $sheet->setCellValue ( "G17", "SATUAN KERJA" );
      $sheet->setCellValue ( "G18", "TMT CPNS" );
      $sheet->setCellValue ( "G19", "TMT PNS" );
      $sheet->setCellValue ( "G20", "SATUAN KERJA" );

      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 6;
      $hasil = $this->Admin_m->select_data('data_pegawai');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->nama_pegawai );
        $sheet->setCellValue ( "C".$nocel, $data->nip );
        $sheet->setCellValue ( "D".$nocel, $data->nip_lama );
        $sheet->setCellValue ( "E".$nocel, $data->tempat_lahir );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal_lahir );
        
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nama));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->alamat) );
        $sheet->setCellValue ( "D".$nocel, strtoupper($data->nomor_sk));
        $sheet->setCellValue ( "E".$nocel, strtoupper($this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja) );
        $sheet->setCellValue ( "F".$nocel, strtoupper($data->tmt));
        $sheet->setCellValue ( "G".$nocel, strtoupper($data->no_hp) );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function data_pegawai(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "simpeg" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Daftar Pegawai" );
      $file->getProperties ()->setSubject ( "Daftar Pegawai" );
      $file->getProperties ()->setDescription ( "Daftar Pegawai" );
      $file->getProperties ()->setKeywords ( "Daftar Pegawai" );
      $file->getProperties ()->setCategory ( "Daftar Pegawai" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Listing Nominatif PNS" );
      $sheet->mergeCells('A1:AA1');
      $sheet->setCellValue ( "A1", "DAFTAR LISTING NOMINATIF PNS" );
      $sheet->mergeCells('A2:AA2');
      $sheet->setCellValue ( "A2", "DI LINGKUP PEMERINTAH KABUPATEN BUTON" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      
      $sheet->mergeCells('A4:A6');
      $sheet->setCellValue ( "A4", "No" );
      $sheet->mergeCells('B4:C4');
      $sheet->setCellValue ( "B4", "NIP" );
      $sheet->mergeCells('B5:B6');
      $sheet->setCellValue ( "B5", "NIP Lama" );
      $sheet->mergeCells('C5:C6');
      $sheet->setCellValue ( "C5", "NIP Baru" );
      $sheet->mergeCells('D4:D6');
      $sheet->setCellValue ( "D4", "Nama" );
      $sheet->mergeCells('E4:E6');
      $sheet->setCellValue ( "E4", "Gelar Depan" );
      $sheet->mergeCells('F4:F6');
      $sheet->setCellValue ( "F4", "Gelar Belakang" );
      $sheet->mergeCells('G4:H4');
      $sheet->setCellValue ( "G4", "Tempat Tanggal Lahir" );
      $sheet->mergeCells('G5:G6');
      $sheet->setCellValue ( "G5", "Tempat Lahir" );
      $sheet->mergeCells('H5:H6');
      $sheet->setCellValue ( "H5", "Tanggal Lahir" );
      $sheet->mergeCells('I4:K4');
      $sheet->setCellValue ( "I4", "CPNS/PNS" );
      $sheet->mergeCells('I5:I6');
      $sheet->setCellValue ( "I5", "Gol Awal" );
      $sheet->mergeCells('J5:J6');
      $sheet->setCellValue ( "J5", "TMT CPNS" );
      $sheet->mergeCells('K5:K6');
      $sheet->setCellValue ( "K5", "TMT PNS" );
      $sheet->mergeCells('L4:L6');
      $sheet->setCellValue ( "L4", "L/p" );
      $sheet->mergeCells('M4:P4');
      $sheet->setCellValue ( "M4", "Golongan Ruang" );
      $sheet->mergeCells('M5:M6');
      $sheet->setCellValue ( "M5", "Gol Akhir" );
      $sheet->mergeCells('N5:N6');
      $sheet->setCellValue ( "N5", "TMT" );
      $sheet->mergeCells('O5:P5');
      $sheet->setCellValue ( "O5", "Masa Kerja" );
      $sheet->setCellValue ( "O6", "MK Thn" );
      $sheet->setCellValue ( "P6", "MK Bln" );
      $sheet->mergeCells('Q4:V4');
      $sheet->setCellValue ( "Q4", "Jabatan" );
      $sheet->mergeCells('Q5:S5');
      $sheet->setCellValue ( "Q5", "Struktural" );
      $sheet->setCellValue ( "Q6", "Eselon" );
      $sheet->setCellValue ( "R6", "TMT Struktural" );
      $sheet->setCellValue ( "S6", "NM Jab Struktural" );
      $sheet->mergeCells('T5:U5');
      $sheet->setCellValue ( "T5", "Fungsional Tertentu" );
      $sheet->setCellValue ( "T6", "FT Tertentu" );
      $sheet->setCellValue ( "U6", "FT Nm Jabatan" );
      $sheet->setCellValue ( "V5", "Fungsional Umum" );
      $sheet->setCellValue ( "V6", "Nama Jabatan" );
      $sheet->mergeCells('W4:W6');
      $sheet->setCellValue ( "W4", "Unit Kerja" );
      $sheet->mergeCells('X4:X6');
      $sheet->setCellValue ( "X4", "Unit Kerja Induk" );
      $sheet->mergeCells('Y4:Z4');
      $sheet->setCellValue ( "Y4", "Pendidikan" );
      $sheet->mergeCells('Y5:Y6');
      $sheet->setCellValue ( "Y5", "Nama Pendidikan Terakhir" );
      $sheet->mergeCells('Z5:Z6');
      $sheet->setCellValue ( "Z5", "Lulus" );
      $sheet->mergeCells('AA4:AA6');
      $sheet->setCellValue ( "AA4", "Ked.Huk" );

      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 8;
      $hasil = $this->Admin_m->data_pegawai();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        // echo "<pre>";print_r($this->Admin_m->jabatan_min2($data->id_pegawai));echo "<pre>";
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->nip );
        $sheet->setCellValue ( "C".$nocel, $data->nip_lama );
        $sheet->setCellValue ( "D".$nocel, $data->nama_pegawai );
        $sheet->setCellValue ( "E".$nocel, $data->gelar_dpn );
        $sheet->setCellValue ( "F".$nocel, $data->gelar_belakang );
        $sheet->setCellValue ( "G".$nocel, $data->tempat_lahir );
        $sheet->setCellValue ( "H".$nocel, $data->tanggal_lahir );
        $sheet->setCellValue ( "I".$nocel, @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$data->id_golongan)->golongan);
        $sheet->setCellValue ( "J".$nocel, $data->tmt_cpns );
        $sheet->setCellValue ( "K".$nocel, $data->tmt_pns );
        $sheet->setCellValue ( "L".$nocel, $data->jenis_kelamin );
        $sheet->setCellValue ( "M".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->golongan);
        $sheet->setCellValue ( "N".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->tanggal_mulai);
        $sheet->setCellValue ( "O".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->masa_kerja_bulan );
        $sheet->setCellValue ( "P".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->masa_kerja_tahun );
        $sheet->setCellValue ( "Q".$nocel, @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon );
        $sheet->setCellValue ( "R".$nocel, @$this->Admin_m->jabatan_min($data->id_pegawai)->tanggal_mulai);
        if (@$this->Admin_m->detail_data_order('data_riwayat_jabatan','id_pegawai',$data->id_pegawai)->id_jenis_jabatan == 1) {
          $sheet->setCellValue ( "S".$nocel, @$this->Admin_m->jabatan_min2($data->id_pegawai)->nm_jabatan );
        }
        if (@$this->Admin_m->detail_data_order('data_riwayat_jabatan','id_pegawai',$data->id_pegawai)->id_jenis_jabatan == 2) {
           $sheet->setCellValue ( "T".$nocel, @$this->Admin_m->jabatan_min2($data->id_pegawai)->nm_jabatan );
        }
        if (@$this->Admin_m->detail_data_order('data_riwayat_jabatan','id_pegawai',$data->id_pegawai)->id_jenis_jabatan == 3) {
            $sheet->setCellValue ( "U".$nocel, @$this->Admin_m->jabatan_min2($data->id_pegawai)->nm_jabatan );
        }
        $sheet->setCellValue ( "V".$nocel, @$this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$data->id_jabatn)->nama_jabatan );
        $sheet->setCellValue ( "W".$nocel, @$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja);
        $sheet->setCellValue ( "X".$nocel, @$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->parent_unit);
        $sheet->setCellValue ( "Y".$nocel, @$this->Admin_m->detail_data_order('data_pendidikan','id_pegawai',$data->id_pegawai)->sekolah );
        $sheet->setCellValue ( "Z".$nocel, @$this->Admin_m->detail_data_order('data_pendidikan','id_pegawai',$data->id_pegawai)->tanggal_lulus );
        $sheet->setCellValue ( "AA".$nocel, $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$data->status_pegawai)->nama_status );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar_listing_nominatif_pegawai.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function exceldaftargel2(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Butonkab" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.go.id" );
      $file->getProperties ()->setTitle ( "List Pegawai" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Dosen" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Noreg" );
      $sheet->setCellValue ( "C1", "Nama" );
      $sheet->setCellValue ( "D1", "Pilihan 1" );
      $sheet->setCellValue ( "E1", "Pilihan 2" );
      $sheet->setCellValue ( "F1", "Pilihan 3" );
      $sheet->setCellValue ( "G1", "Kelompok" );
      $sheet->setCellValue ( "H1", "Jurusan" );
      $sheet->setCellValue ( "I1", "Email" );
      $sheet->setCellValue ( "J1", "No Hp" );
      $sheet->setCellValue ( "K1", "L/P" );
      $sheet->setCellValue ( "L1", "Agama" );
      $sheet->setCellValue ( "M1", "Tgl Lhr" );
      $sheet->setCellValue ( "N1", "Tmp Lhr" );
      $sheet->setCellValue ( "O1", "Asal Sekolah" );
      $sheet->setCellValue ( "P1", "NEM" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $data['hasil'] = $this->Peserta_m->databayargel2();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        
        // echo "<pre>";print_r($this->Peserta_m->detagama($data->id_agama));echo "<pre/>";exit();
       
        if ($this->Peserta_m->detagama($data->id_agama) == TRUE) {
           $agama = $this->Peserta_m->detagama($data->id_agama)->nm_agama;
        }else{
          $agama = 'Tidak Diisi';
        }
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->noreg );
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
        $abjad = 1;
        foreach ($this->Peserta_m->priopilgel2($data->id_mhs) as $datas) {
          if ($abjad == 1) {
          	$abj = 'D';
          }elseif ($abjad == 2) {
          	$abj = 'E';
          }else{
          	$abj = 'F';
          }
          $sheet->setCellValue ( $abj.$nocel, strtoupper($datas->nama_prodi) );
          $abjad++;
        }
        // echo "<pre>";print_r($this->Peserta_m->priopil($data->id_mhs));echo "<pre/>";exit();
        if ($data->kelompok == 1 ) {
          $sheet->setCellValue ( "G".$nocel, 'IPA ');
        }elseif ($data->kelompok == 2) {
          $sheet->setCellValue ( "G".$nocel, 'IPS ');
        }else{
          $sheet->setCellValue ( "G".$nocel, 'IPC ');
        }
        $sheet->setCellValue ( "H".$nocel, $data->jurse);
        $sheet->setCellValue ( "I".$nocel, $data->email_mhs);
        $sheet->setCellValue ( "J".$nocel, $data->no_hp_mhs);
        $sheet->setCellValue ( "K".$nocel, strtoupper($data->gender_mhs));
        $sheet->setCellValue ( "L".$nocel, strtoupper($agama));
        $sheet->setCellValue ( "M".$nocel, $data->tgl_lhr_mhs);
        $sheet->setCellValue ( "N".$nocel, strtoupper($data->tmpt_lahir));
        $sheet->setCellValue ( "O".$nocel, strtoupper($data->asal_sekolah));
        $sheet->setCellValue ( "P".$nocel, $data->nem);
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta gelombang ke 2.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function exceldaftargel3(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
      $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Dosen" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Noreg" );
      $sheet->setCellValue ( "C1", "Nama" );
      $sheet->setCellValue ( "D1", "Pilihan 1" );
      $sheet->setCellValue ( "E1", "Pilihan 2" );
      $sheet->setCellValue ( "F1", "Pilihan 3" );
      $sheet->setCellValue ( "G1", "Kelompok" );
      $sheet->setCellValue ( "H1", "Jurusan" );
      $sheet->setCellValue ( "I1", "Email" );
      $sheet->setCellValue ( "J1", "No Hp" );
      $sheet->setCellValue ( "K1", "L/P" );
      $sheet->setCellValue ( "L1", "Agama" );
      $sheet->setCellValue ( "M1", "Tgl Lhr" );
      $sheet->setCellValue ( "N1", "Tmp Lhr" );
      $sheet->setCellValue ( "O1", "Asal Sekolah" );
      $sheet->setCellValue ( "P1", "NEM" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $data['hasil'] = $this->Peserta_m->databayargel3();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        
        // echo "<pre>";print_r($this->Peserta_m->detagama($data->id_agama));echo "<pre/>";exit();
       
        if ($this->Peserta_m->detagama($data->id_agama) == TRUE) {
           $agama = $this->Peserta_m->detagama($data->id_agama)->nm_agama;
        }else{
          $agama = 'Tidak Diisi';
        }
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->noreg );
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
        $abjad = 1;
        foreach ($this->Peserta_m->priopilgel2($data->id_mhs) as $datas) {
          if ($abjad == 1) {
            $abj = 'D';
          }elseif ($abjad == 2) {
            $abj = 'E';
          }else{
            $abj = 'F';
          }
          $sheet->setCellValue ( $abj.$nocel, strtoupper($datas->nama_prodi) );
          $abjad++;
        }
        // echo "<pre>";print_r($this->Peserta_m->priopil($data->id_mhs));echo "<pre/>";exit();
        if ($data->kelompok == 1 ) {
          $sheet->setCellValue ( "G".$nocel, 'IPA ');
        }elseif ($data->kelompok == 2) {
          $sheet->setCellValue ( "G".$nocel, 'IPS ');
        }else{
          $sheet->setCellValue ( "G".$nocel, 'IPC ');
        }
        $sheet->setCellValue ( "H".$nocel, $data->jurse);
        $sheet->setCellValue ( "I".$nocel, $data->email_mhs);
        $sheet->setCellValue ( "J".$nocel, $data->no_hp_mhs);
        $sheet->setCellValue ( "K".$nocel, strtoupper($data->gender_mhs));
        $sheet->setCellValue ( "L".$nocel, strtoupper($agama));
        $sheet->setCellValue ( "M".$nocel, $data->tgl_lhr_mhs);
        $sheet->setCellValue ( "N".$nocel, strtoupper($data->tmpt_lahir));
        $sheet->setCellValue ( "O".$nocel, strtoupper($data->asal_sekolah));
        $sheet->setCellValue ( "P".$nocel, $data->nem);
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta gelombang ke 2.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_keluarga(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Keluarga';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Golongan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Keluarga" );
      $sheet->mergeCells('A1:J1');
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "Nama" );
      $sheet->setCellValue ( "C6", "Tgl Lahir" );
      $sheet->setCellValue ( "D6", "Hub. keluarga" );
      $sheet->setCellValue ( "E6", "Status Kawin" );
      $sheet->setCellValue ( "F6", "Tgl Nikah" );
      $sheet->setCellValue ( "G6", "Tgl Cerai" );
      $sheet->setCellValue ( "H6", "Tgl Meninggal" );
      $sheet->setCellValue ( "I6", "Pekerjaan" );
      $sheet->setCellValue ( "J6", "No Kartu Suami/Istri" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_keluarga(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->nama_anggota_keluarga );
        $sheet->setCellValue ( "C".$nocel, $data->tanggal_lahir );
        $sheet->setCellValue ( "D".$nocel, $data->status_keluarga );
        $sheet->setCellValue ( "E".$nocel, $data->status_kawin );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal_nikah );
        $sheet->setCellValue ( "G".$nocel, $data->tanggal_cerai_meninggal );
        $sheet->setCellValue ( "H".$nocel, $data->tanggal_meninggal );
        $sheet->setCellValue ( "I".$nocel, $data->pekerjaan );
        $sheet->setCellValue ( "J".$nocel, $data->no_kartu);
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_data_keluarga.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_jabatan(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Jabatan';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Golongan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Jabatan" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Jenis Jabatan" );
      $sheet->setCellValue ( "E6", "Nama Jabatan" );
      $sheet->setCellValue ( "F6", "Eselon" );
      $sheet->setCellValue ( "G6", "No SK" );
      $sheet->setCellValue ( "H6", "Tgl SK" );
      $sheet->setCellValue ( "I6", "TMT Jabatan" );
      $sheet->setCellValue ( "J6", "TMT Pelantikan" );
      $sheet->setCellValue ( "K6", "SKPD" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_jabatan(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->nip );
        $sheet->setCellValue ( "C".$nocel, $data->nama_pegawai );
        $sheet->setCellValue ( "D".$nocel, $data->nama_jenis_jabatan );
        $sheet->setCellValue ( "E".$nocel, $data->nm_jabatan );
        $sheet->setCellValue ( "F".$nocel, $data->nama_eselon );
        $sheet->setCellValue ( "G".$nocel, $data->nomor_sk );
        $sheet->setCellValue ( "H".$nocel, $data->tanggal_sk_rj );
        $sheet->setCellValue ( "I".$nocel, $data->tmt_jabatan_rj );
        $sheet->setCellValue ( "J".$nocel, $data->tmt_pelantikan_rj );
        $sheet->setCellValue ( "K".$nocel, $data->nama_satuan_kerja );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_data_jabatan.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
  function ex_by_gol(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Golongan';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Golongan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Golongan" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Golongan" );
      $sheet->setCellValue ( "E6", "Nomor SK" );
      $sheet->setCellValue ( "F6", "Tanggal SK" );
      $sheet->setCellValue ( "G6", "TMT Golongan" );
      $sheet->setCellValue ( "H6", "Nomor BKN" );
      $sheet->setCellValue ( "I6", "Tanggal BKN" );
      $sheet->setCellValue ( "J6", "Masa Kerja" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_gol(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->golongan );
        $sheet->setCellValue ( "E".$nocel, $data->nomor_sk );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal_sk );
        $sheet->setCellValue ( "G".$nocel, $data->tmt_golongan );
        $sheet->setCellValue ( "H".$nocel, $data->nomor_bkn );
        $sheet->setCellValue ( "I".$nocel, $data->tanggal_bkn );
        $sheet->setCellValue ( "J".$nocel, $data->masa_kerja );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_pergolongan.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_pendidikan(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Pendidikan';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Pendidikan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Pendidikan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Pendidikan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Pendidikan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Pendidikan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Pendidikan" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Tingkat Pendidikan" );
      $sheet->setCellValue ( "E6", "Jurusan" );
      $sheet->setCellValue ( "F6", "Sekolah" );
      $sheet->setCellValue ( "G6", "Alamat Sekolah" );
      $sheet->setCellValue ( "H6", "Tanggal Lulus" );
      $sheet->setCellValue ( "I6", "Nomor Ijazah" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_pendidikan(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->pendidikan );
        $sheet->setCellValue ( "E".$nocel, $data->jurusan );
        $sheet->setCellValue ( "F".$nocel, $data->sekolah );
        $sheet->setCellValue ( "G".$nocel, $data->tempat_sekolah );
        $sheet->setCellValue ( "H".$nocel, $data->tanggal_lulus );
        $sheet->setCellValue ( "I".$nocel, $data->nomor_ijazah );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_pendidikan.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_diklat(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Diklat';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Diklat" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Diklat" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Diklat" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Diklat" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Diklat" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Diklat" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Nama Diklat/Kursus" );
      $sheet->setCellValue ( "E6", "Lama Diklat (Jam)" );
      $sheet->setCellValue ( "F6", "Tanggal" );
      $sheet->setCellValue ( "G6", "No Sertifikasi" );
      $sheet->setCellValue ( "H6", "Instansi" );
      $sheet->setCellValue ( "I6", "Instansi Penyelenggara" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_diklat(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->nama_kursus );
        $sheet->setCellValue ( "E".$nocel, $data->lama_kursus );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal );
        $sheet->setCellValue ( "G".$nocel, $data->no_sertifikat );
        $sheet->setCellValue ( "H".$nocel, $data->instansi );
        $sheet->setCellValue ( "I".$nocel, $data->instansi_penyelenggara );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_diklat.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_disiplin(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Disiplin';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Disiplin" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Disiplin" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Disiplin" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Disiplin" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Disiplin" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Disiplin" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Uraian" );
      $sheet->setCellValue ( "E6", "No. SK" );
      $sheet->setCellValue ( "F6", "Tanggal SK" );
      $sheet->setCellValue ( "G6", "Tanggal Mulai" );
      $sheet->setCellValue ( "H6", "Tanggal Selesai" );
      $sheet->setCellValue ( "I6", "No SK Pembatalan" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_disiplin(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->uraian );
        $sheet->setCellValue ( "E".$nocel, $data->nomor_sk );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal_sk );
        $sheet->setCellValue ( "G".$nocel, $data->tanggal_mulai );
        $sheet->setCellValue ( "H".$nocel, $data->tanggal_selesai );
        $sheet->setCellValue ( "I".$nocel, $data->no_sk_pembatalan );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_disiplin.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_skp(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-SKP';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-SKP" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-SKP" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-SKP" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-SKP" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-SKP" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-SKP" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Tahun" );
      $sheet->setCellValue ( "E6", "Kesetiaan" );
      $sheet->setCellValue ( "F6", "Prestasi" );
      $sheet->setCellValue ( "G6", "Tangung Jawab" );
      $sheet->setCellValue ( "H6", "Ketaatan" );
      $sheet->setCellValue ( "I6", "Kejujuran" );
      $sheet->setCellValue ( "J6", "Kerjasama" );
      $sheet->setCellValue ( "K6", "Prakarsa" );
      $sheet->setCellValue ( "L6", "Kepemimpinan" );
      $sheet->setCellValue ( "M6", "Rata-Rata" );
      $sheet->setCellValue ( "M6", "Pejabat Penilai" );
      $sheet->setCellValue ( "O6", "Atasan Pejabat Penilai" );
      $sheet->setCellValue ( "P6", "Mengetahui" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_skp(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->tahun );
        $sheet->setCellValue ( "E".$nocel, $data->kesetiaan );
        $sheet->setCellValue ( "F".$nocel, $data->prestasi );
        $sheet->setCellValue ( "G".$nocel, $data->tanggung_jawab );
        $sheet->setCellValue ( "H".$nocel, $data->ketaatan );
        $sheet->setCellValue ( "I".$nocel, $data->kejujuran );
        $sheet->setCellValue ( "J".$nocel, $data->kerjasama );
        $sheet->setCellValue ( "K".$nocel, $data->prakarsa );
        $sheet->setCellValue ( "L".$nocel, $data->kepemimpinan );
        $sheet->setCellValue ( "M".$nocel, $data->rata_rata );
        $sheet->setCellValue ( "N".$nocel, $data->pejabat_penilai );
        $sheet->setCellValue ( "O".$nocel, $data->atasan_pejabat_penilai );
        $sheet->setCellValue ( "P".$nocel, $data->mengetahui );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_skp.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_seminar(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Seminar';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Seminar" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Seminar" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Seminar" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Seminar" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Seminar" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Seminar" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Uraian" );
      $sheet->setCellValue ( "E6", "Lokasi" );
      $sheet->setCellValue ( "F6", "Tanggal" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_seminar(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->uraian );
        $sheet->setCellValue ( "E".$nocel, $data->lokasi );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_seminar.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_unitorg(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Unitorg';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Unitorg" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Unitorg" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Unitorg" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Unitorg" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Unitorg" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Unitorg" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Nama Satuan Kerja" );
      $sheet->setCellValue ( "E6", "Nomor" );
      $sheet->setCellValue ( "F6", "Tanggal" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_unitorg(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->nama_satuan_kerja );
        $sheet->setCellValue ( "E".$nocel, $data->nomor );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_unitorg.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_penghargaan(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Penghargaan';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Penghargaan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Penghargaan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Penghargaan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Penghargaan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Penghargaan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Penghargaan" );
      $sheet->setCellValue ( "A1", "PEMERINTAH KABUPATEN BUTON" );
      $sheet->mergeCells('A2:J2');
      $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KABUPATEN BUTON" );
      $sheet->mergeCells('A3:J3');
      $sheet->setCellValue ( "A3", "Pasar Wajo" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A6", "No" );
      $sheet->setCellValue ( "B6", "NIP" );
      $sheet->setCellValue ( "C6", "Nama Pegawai" );
      $sheet->setCellValue ( "D6", "Jenis Penghargaan" );
      $sheet->setCellValue ( "E6", "No Keputusan" );
      $sheet->setCellValue ( "F6", "Tanggal" );
      $sheet->setCellValue ( "G6", "Tahun" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 7;
      $hasil = $this->Admin_m->select_data_penghargaan(0);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $data->jenis_penghargaan );
        $sheet->setCellValue ( "E".$nocel, $data->no_keputusan );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal );
        $sheet->setCellValue ( "G".$nocel, $data->tahun );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_penghargaan.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_eselon($eselon){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Eselon';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Golongan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Eselon" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "NIP" );
      $sheet->setCellValue ( "C1", "Nama Pegawai" );
      $sheet->setCellValue ( "D1", "Eselon" );
      $sheet->setCellValue ( "E1", "SKPD" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $this->Admin_m->data_pegawai5($eselon);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon );
        $sheet->setCellValue ( "E".$nocel, $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_pereslon.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_skpd($skpd){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-SKPD';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Golongan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Golongan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-SKPD" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "NIP" );
      $sheet->setCellValue ( "C1", "Nama Pegawai" );
      $sheet->setCellValue ( "D1", "SKPD" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $this->Admin_m->data_pegawai6($skpd);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_perskpd.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_by_pelatihan($pelatihan){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Pegawai Per-Pelatihan';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.butonkab.com" );
      $file->getProperties ()->setTitle ( "Laporan Pegawai Per-Pelatihan" );
      $file->getProperties ()->setSubject ( "Laporan Pegawai Per-Pelatihan" );
      $file->getProperties ()->setDescription ( "Laporan Pegawai Per-Pelatihan" );
      $file->getProperties ()->setKeywords ( "Laporan Pegawai Per-Pelatihan" );
      $file->getProperties ()->setCategory ( "Laporan Pegawai Per-Pelatihan" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Pegawai Per-Pelatihan" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "NIP" );
      $sheet->setCellValue ( "C1", "Nama Pegawai" );
      $sheet->setCellValue ( "D1", "Pelatihan" );
      $sheet->setCellValue ( "E1", "SKPD" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $this->Admin_m->data_pegawai3($pelatihan);
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {

        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nip));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_pegawai) );
        $sheet->setCellValue ( "D".$nocel, $this->Admin_m->detail_data_order('master_pelatihan','id_pelatihan',$data->id_pelatihan)->nama_pelatihan );
        $sheet->setCellValue ( "E".$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_pegawai_perpelatihan.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function excelalldaftar(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
      $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Peserta Mahasiswa Baru" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Noreg" );
      $sheet->setCellValue ( "C1", "Nama" );
      $sheet->setCellValue ( "D1", "Status" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $data['hasil'] = $this->Peserta_m->alldaftar();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->noreg );
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
        if ($data->pembayaran == 1) {
          $sheet->setCellValue ( "D".$nocel, 'Sudah Membayar' );
        }else{
          $sheet->setCellValue ( "D".$nocel, 'Belum Membayar' );
        }
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
}
?>