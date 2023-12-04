<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {


	public function get($id = null)
	{
		$this->db->from('supplier');
		if($id != null) {
			$this->db->where('supplier_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['name'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'description' => $post['description'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->insert('supplier', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'description' => $post['description'],
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->where('supplier_id', $post['id']);
		$this->db->update('supplier', $params);
	}


}