<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model {


	public function get_data($limit, $start)
	{
		$query = $this->db->get('item', $limit, $start);
		return $query;
	}

	public function get($id = null)
	{
		$this->db->select('item.*,  unit.name as unit_name');
		$this->db->from('item');
		$this->db->join('unit', 'unit.unit_id = item.unit_id');
		if($id != null) {
			$this->db->where('item_id', $id);
		}
		$this->db->order_by('barcode', 'asc');
		$query = $this->db->get();
		return $query;
	}

	function get_barcode($barcode = null)
	{
		$this->db->select('item.*, category.name as category_name, unit.name as unit_name');
		$this->db->from('item');
		$this->db->join('category', 'category.category_id = item.category_id');
		$this->db->join('unit', 'unit.unit_id = item.unit_id');
		if($barcode != null) {
			$this->db->where('barcode', $barcode);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['name'],
			'category_id' => $post['category'],
			'unit_id' => $post['unit'],
			'price' => $post['price'],
			'image' => $post['image'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->insert('item', $params);
	}

	public function edit($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['name'],
			'category_id' => $post['category'],
			'unit_id' => $post['unit'],
			'price' => $post['price'],
			'update_by' => $this->session->userdata('user_id'),
		];
		if($post['image'] != null) {
			$params['image'] = $post['image'];
		}
		$this->db->where('item_id', $post['id']);
		$this->db->update('item', $params);
	}

	function check_barcode($code, $id = null) {
		$this->db->from('item');
		$this->db->where('barcode', $code);
		if($id != null) {
			$this->db->where('item_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function del($id)
	{
		$this->db->where('item_id', $id);
		$this->db->delete('item');
	}

	function update_stock_in($data)
	{
		$qty = $data['qty'];
		$id = $data['item_id'];
		$sql = "UPDATE item SET stock = stock + '$qty' WHERE item_id = '$id'";
		$this->db->query($sql);
	}

	function update_stock_out($data)
	{
		$qty = $data['qty'];
		$id = $data['item_id'];
		$sql = "UPDATE item SET stock = stock - '$qty' WHERE item_id = '$id'";
		$this->db->query($sql);
	}


}