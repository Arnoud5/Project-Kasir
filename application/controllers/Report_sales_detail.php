<?php defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

class Report_sales_detail extends CI_Controller
{
    
    public function index()
    {
        
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();


        if($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'report/sales_detail/filter_laporan_sales_detail');
        }else{

            $data['laporan'] = $this->db->query("SELECT s.invoice as invoice, i.name as item_name, sd.price as item_price, sd.total, sd.qty, sd.discount_item, u.name as kasir FROM sales s, sales_detail sd, item i, user u WHERE s.sales_id = sd.sales_id AND sd.item_id = i.item_id AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY s.invoice ASC")->result();
            $this->template->load('template', 'report/sales_detail/laporan_sales_detail_data', $data);
        }
    }


    public function pdf()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data['laporan'] = $this->db->query("SELECT s.invoice as invoice, i.name as item_name, sd.price as item_price, sd.total, sd.qty, sd.discount_item FROM sales s, sales_detail sd, item i WHERE s.sales_id = sd.sales_id AND sd.item_id = i.item_id AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY s.invoice ASC")->result();
        $html = $this->load->view('report/sales_detail/laporan_sales_detail_pdf', $data, true);
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
        $data['laporan'] = $this->db->query("SELECT s.invoice as invoice, i.name as item_name, sd.price as item_price, sd.total, sd.qty, sd.discount_item FROM sales s, sales_detail sd, item i WHERE s.sales_id = sd.sales_id AND sd.item_id = i.item_id AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY s.invoice ASC")->result();

        $this->load->view('report/sales_detail/laporan_sales_detail_excel', $data);
    }


    public function _rules()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        $this->form_validation->set_message('required', '%s Wajib Diisi!');
    }

    
} 