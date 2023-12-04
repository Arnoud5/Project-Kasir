<?php defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

class Report_stock_out extends CI_Controller
{
    
    public function index()
    {
        
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();


        if($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'report/stock_out/filter_laporan_stock_out');
        }else{

            $data['laporan'] = $this->db->query("SELECT i.name as item_name, st.type, st.detail, st.qty, st.price, st.date, u.name as kasir FROM stock st, item i, user u WHERE st.item_id = i.item_id AND st.create_by = u.user_id AND st.type = 'out' AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY st.create_date ASC")->result();
            $this->template->load('template', 'report/stock_out/laporan_stock_out_data', $data);
        }
    }

    
    public function pdf()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data['laporan'] = $this->db->query("SELECT i.name as item_name, st.type, st.detail, st.qty, st.price, st.date, u.name as kasir FROM stock st, item i, user u WHERE st.item_id = i.item_id AND st.create_by = u.user_id AND st.type = 'out' AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY st.create_date ASC")->result();
        $html = $this->load->view('report/stock_out/laporan_stock_out_pdf', $data, true);
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
        $data['laporan'] = $this->db->query("SELECT i.name as item_name, st.type, st.detail, st.qty, st.price, st.date, u.name as kasir FROM stock st, item i, user u WHERE st.item_id = i.item_id AND st.create_by = u.user_id AND st.type = 'out' AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY st.create_date ASC")->result();

        $this->load->view('report/stock_out/laporan_stock_out_excel', $data);
    }


    public function _rules()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        $this->form_validation->set_message('required', '%s Wajib Diisi!');
    }

    
} 