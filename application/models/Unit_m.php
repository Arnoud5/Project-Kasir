<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model {


	public function get($id = null)
	{
		$this->db->from('unit');
		if($id != null) {
			$this->db->where('unit_id', $id);
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
		$this->db->insert('unit', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'update_by' => $this->session->userdata('user_id'),
		];
		$this->db->where('unit_id', $post['id']);
		$this->db->update('unit', $params);
	}

	function check_unit($code, $id = null) {
		$this->db->from('unit');
		$this->db->where('name', $code);
		if($id != null) {
			$this->db->where('unit_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

}