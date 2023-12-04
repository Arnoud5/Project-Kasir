<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sales extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('sales_m', 'sales');		
	}

	public function index()
	{
		$data['row'] = $this->sales->get_sales();
		$this->template->load('template', 'transaction/sales/sales_data', $data);
	}

	public function sales_product($sales_id = null)
	{
		$detail = $this->sales->get_sales_detail($sales_id)->result();
		echo json_encode($detail);
	}

	

}
