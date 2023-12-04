<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_m extends CI_Model {

	public function NoFaktur()
	{
		$tgl = date('Ymd');
		$query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) as no_urut from sales where DATE(date)='$tgl'");
		$hasil = $query->getRowArray();
		if ($hasil['no_urut'] > 0) {
			$tmp = $hasil['no_urut'] + 1;
			$kd = printf("%04s", $tmp);
		}else{
			$kd= "0001";
		}
		$no_faktur = date('Ymd').$kd;
		return $no_faktur;
	}

	public function invoice_no()
	{
		$sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
		FROM sales 
		WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			$row = $query->row();
			$n = ((int)$row->invoice_no) + 1;
			$no = sprintf("%'.04d", $n);
		}else {
			$no = "0001";
		}
		$invoice = "NT".date('ymd').$no;
		return $invoice;
	}

	public function get_cart($params = null)
	{
		$this->db->select('cart.*, item.name as item_name, cart.price as cart_price, item.barcode as barcode, item.stock as stock');
		$this->db->from('cart');
		$this->db->join('item', 'item.item_id = cart.item_id');
		if($params != null) {
			$this->db->where($params);
		}
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get();
		return $query;
	}

	public function add_cart($post)
	{
		$query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM cart");
		if($query->num_rows() > 0){
			$row = $query->row();
			$car_no = ((int)$row->cart_no) + 1;
		} else {
			$car_no = "1";
		}

		$params = array(
			'cart_id' => $car_no,
			'item_id' => $post['item_id'],
			'price' => $post['price'],
			'qty' => $post['qty'],
			'total' => ($post['price'] * $post['qty']),
			'user_id' => $this->session->userdata('user_id'),
			// 'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id')
		);
		$this->db->insert('cart', $params);
	}

	function update_cart_qty($post)
	{
		$sql = "UPDATE cart SET price = '$post[price]',
		qty = qty + '$post[qty]',
		total = '$post[price]' * qty
		WHERE item_id = '$post[item_id]'";
		$this->db->query($sql);
	}

	public function del_cart($params = null)
	{
		if($params != null) {
			$this->db->where($params);
		}
		$this->db->delete('cart');
	}

	public function edit_cart($post)
	{
		$params = array(
			'price' => $post['price'],
			'qty' => $post['qty'],
			'discount' => $post['discount'],
			'total' => $post['total'],
		);
		$this->db->where('cart_id', $post['cart_id']);
		$this->db->update('cart', $params);
	}

	public function add_sales($post)
	{
		$params = array(
			'invoice' => $this->invoice_no(),
			'customer_id' => $post['customer_id'] == "" ? null : $post['customer_id'],
			'total_price' => $post['subtotal'],
			'discount' => $post['discount'],
			'final_price' => $post['grandtotal'],
			'cash' => $post['cash'],
			'change' => $post['change'],
			'note' => $post['note'],
			'date' => $post['date'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		);
		$this->db->insert('sales', $params);
		return $this->db->insert_id();
	}

	function add_sales_detail($params)
	{
		$this->db->insert_batch('sales_detail', $params);
	}

	public function get_sales($id = null)
	{
		$this->db->select('*, customer.name as customer_name, user.username as user_name,
			sales.create_date as sales_created');
		$this->db->from('sales');
		$this->db->join('customer', 'sales.customer_id = customer.customer_id', 'left');
		$this->db->join('user', 'sales.create_by = user.user_id');
		if($id != null) {
			$this->db->where('sales_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_data($table){
		return $this->db->get($table);
	}

	public function get_sales_detail($sales_id = null)
	{
		$this->db->from('sales_detail');
		$this->db->join('item', 'sales_detail.item_id = item.item_id');
		if($sales_id != null){
			$this->db->where('sales_detail.sales_id', $sales_id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function del_sales($id)
	{
		$this->db->where('sales_id', $id);
		$this->db->delete('sales');
	}


}