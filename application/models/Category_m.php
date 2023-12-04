<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {


	public function get_data($limit, $start)
	{
		$query = $this->db->get('category', $limit, $start);
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('category');
		if($id != null) {
			$this->db->where('category_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['name'],
			'create_by' => $this->session->userdata('user_id'),
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->insert('category', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->where('category_id', $post['id']);
		$this->db->update('category', $params);
	}

	function check_category($code, $id = null) {
		$this->db->from('category');
		$this->db->where('name', $code);
		if($id != null) {
			$this->db->where('category_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

}