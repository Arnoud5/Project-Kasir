<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('sales_m');		
		$this->load->model(['customer_m', 'item_m']);
	}

	public function index()
	{
		$customer = $this->customer_m->get()->result();
		$item = $this->item_m->get()->result();
		$cart = $this->sales_m->get_cart();
		$data = array(
			'customer' => $customer,
			'item' =>  $item,
			'cart' => $cart,
			'invoice' => $this->sales_m->invoice_no(),
		);
		$this->template->load('template', 'transaction/sales/sales_form', $data);
	}

	function get_item() {
		$barcode = $this->input->post('barcode');
		$item = $this->item_m->get_barcode($barcode)->row();
		if($this->db->affected_rows() > 0) {
			$params = array("success" => true, "item" => $item);
		} else{
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function process()
	{
		$data = $this->input->post(null, TRUE);

		if(isset($_POST['add_cart'])) {
			$item_id = $this->input->post('item_id');
			$check_cart = $this->sales_m->get_cart(['cart.item_id' => $item_id])->num_rows();
			if($check_cart > 0){
				$this->sales_m->update_cart_qty($data);
			}else{
				$this->sales_m->add_cart($data);
			}

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}

			echo json_encode($params);
		}

		if(isset($_POST['edit_cart'])) {
			$this->sales_m->edit_cart($data);
			
			if($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['process_payment'])) {
			$sales_id = $this->sales_m->add_sales($data);
			$cart = $this->sales_m->get_cart()->result();
			$row = [];
			foreach ($cart as $c => $value) {
				array_push($row, array(
					'sales_id' => $sales_id,
					'item_id' => $value->item_id,
					'price' => $value->price,
					'qty' => $value->qty,
					'discount_item' => $value->discount,
					'total' => $value->total,
					'create_by' => $this->session->userdata('user_id'),
					'update_by' => $this->session->userdata('user_id'),
				)
			);
			}
			$this->sales_m->add_sales_detail($row);
			$this->sales_m->del_cart(['user_id' => $this->session->userdata('user_id')]);

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true, "sales_id" => $sales_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

	}

	function cart_data() 
	{
		$cart = $this->sales_m->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaction/sales/cart_data', $data);
	}

	public function cart_del()
	{
		if(isset($_POST['cancel_payment'])) {
			$this->sales_m->del_cart(['user_id' => $this->session->userdata('user_id')]);
		} else{
			$cart_id = $this->input->post('cart_id');
			$this->sales_m->del_cart(['cart_id' => $cart_id]);
		}

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}

		echo json_encode($params);
	}

	public function cetak($id)
	{
		$data = array(
			'sales' => $this->sales_m->get_sales($id)->row(),
			'sales_detail' => $this->sales_m->get_sales_detail($id)->result(),
		);
		$this->load->view('transaction/sales/receipt_print', $data);
	}

	public function del($id)
	{
		$this->sales_m->del_sales($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Penjualan Berhasil Dihapus!');
			window.location='".site_url('data_sales')."';</script>";
		} else {
			echo "<script>alert('Data Penjualan Gagal Dihapus!');
			window.location='".site_url('data_sales')."';</script>";
		}
	}

	

}
