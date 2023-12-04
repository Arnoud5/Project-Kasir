<?php defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

class Report_sales extends CI_Controller
{
    
    public function index()
    {
        
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();


        if($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'report/sales/filter_laporan_sales');
        }else{

            $data['laporan'] = $this->db->query("SELECT * FROM sales s, user u WHERE s.create_by = u.user_id AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY invoice ASC")->result();
            $this->template->load('template', 'report/sales/laporan_sales_data', $data);
        }
    }



    public function pdf()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data['laporan'] = $this->db->query("SELECT * FROM sales s, user u WHERE s.create_by = u.user_id AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY invoice ASC")->result();
        $html = $this->load->view('report/sales/laporan_sales_pdf', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        
    }

    public function excel()
    {
        
        $dari   = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        
        $data['title'] = "Print Laporan Sales";
        $data['laporan'] = $this->db->query("SELECT * FROM sales s, user u WHERE s.create_by = u.user_id AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY invoice ASC")->result();

        $this->load->view('report/sales/laporan_sales_excel', $data);
    }


    public function _rules()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        $this->form_validation->set_message('required', '%s Wajib Diisi!');
    }

    
} 