<?php defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

class Report_stock_in extends CI_Controller
{
    
    public function index()
    {
        
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();


        if($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'report/stock_in/filter_laporan_stock_in');
        }else{

            $data['laporan'] = $this->db->query("SELECT i.name as item_name, s.name as supp_name, st.type, st.detail, st.qty, st.price, st.date, u.name as kasir FROM stock st, supplier s, item i, user u WHERE st.item_id = i.item_id AND st.supplier_id = s.supplier_id AND st.create_by = u.user_id AND st.type = 'in' AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY st.create_date ASC")->result();
            $this->template->load('template', 'report/stock_in/laporan_stock_in_data', $data);
        }
    }

    
    public function pdf()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data['laporan'] = $this->db->query("SELECT i.name as item_name, s.name as supp_name, st.type, st.detail, st.qty, st.price, st.date, u.name as kasir FROM stock st, supplier s, item i, user u WHERE st.item_id = i.item_id AND st.supplier_id = s.supplier_id AND st.create_by = u.user_id AND st.type = 'in' AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY st.create_date ASC")->result();
        $html = $this->load->view('report/stock_in/laporan_stock_in_pdf', $data, true);
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
        $data['laporan'] = $this->db->query("SELECT i.name as item_name, s.name as supp_name, st.type, st.detail, st.qty, st.price, st.date, u.name as kasir FROM stock st, supplier s, item i, user u WHERE st.item_id = i.item_id AND st.supplier_id = s.supplier_id AND st.create_by = u.user_id AND st.type = 'in' AND date(date) >= '$dari' AND date(date) <= '$sampai' ORDER BY st.create_date ASC")->result();

        $this->load->view('report/stock_in/laporan_stock_in_excel', $data);
    }


    public function _rules()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        $this->form_validation->set_message('required', '%s Wajib Diisi!');
    }

    
} 