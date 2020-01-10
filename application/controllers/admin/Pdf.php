<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->library('TCPDF/tcpdf');
    }
 
    public function index()
    {
    	// $this->load->library('pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'Simpan ke PDF', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
        $table = '
            <table width="100%">
                'foreach ($variable as $key => $value) {
                    echo "
                        <tr>
                            <td align='text-center'><img src='".base_url('asset/img/lembaga/logo-garuda-pancasila-gold.jpg')."'></td>
                        </tr>
                    ";
                }'
            </table>;
        ';
        $pdf->writeHTML($tabel);
        $pdf->Output('file-pdf-codeigniter.pdf', 'D');
    }
 
}