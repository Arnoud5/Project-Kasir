<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {


	public function get($id = null)
	{
		$this->db->from('customer');
		if($id != null) {
			$this->db->where('customer_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['name'],
			'gender' => $post['gender'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->insert('customer', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'gender' => $post['gender'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->where('customer_id', $post['id']);
		$this->db->update('customer', $params);
	}


}