<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('stock');
		if($id != null) {
			$this->db->where('stock_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function del($id)
	{
		$this->db->where('stock_id', $id);
		$this->db->delete('stock');
	}

	public function get_stock_in()
	{
		$this->db->select ('stock.stock_id, stock.price as stock_in_price, item.barcode, item.name as item_name, qty, date, detail, supplier.name as supplier_name, item.item_id');
		$this->db->from('stock');
		$this->db->join('item', 'stock.item_id = item.item_id');
		$this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
		$this->db->where('type', 'in');
		$this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function add_stock_in($post)
	{
		$params = [
			'item_id' => $post['item_id'],
			'type' => 'in',
			'detail' => $post['detail'],
			'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
			'qty' => $post['qty'],
			'price' => $post['price'],
			'date' => $post['date'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->insert('stock', $params);
	}


	public function get_stock_out()
	{
		$this->db->select ('stock.stock_id, item.barcode, item.name as item_name, qty, date, detail, supplier.name as supplier_name, item.item_id');
		$this->db->from('stock');
		$this->db->join('item', 'stock.item_id = item.item_id');
		$this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
		$this->db->where('type', 'out');
		$this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function add_stock_out($post)
	{
		$params = [
			'item_id' => $post['item_id'],
			'type' => 'out',
			'detail' => $post['detail'],
			'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
			'qty' => $post['qty'],
			'date' => $post['date'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->insert('stock', $params);
	}

	public function ambil_id_mobil($id)
	{
		$hasil = $this->db->where('stock_id', $id)->get('stock');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

}