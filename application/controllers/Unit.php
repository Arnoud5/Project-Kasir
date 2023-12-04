<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('unit_m');		
	}

	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);
	}


	public function edit($id)
	{
		$query = $this->unit_m->get($id);
		if($query->num_rows() > 0)
		{
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);
			$this->template->load('template', 'product/unit/unit_form', $data);
		}else{
			echo "<script>alert('Data Tidak Ditemukan!');";
			echo "window.location='".site_url('unit')."';</script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			if($this->unit_m->check_unit($post['name'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Unit $post[name] Sudah Terdaftar!");
				redirect('unit/add');
			} else {
				$this->unit_m->add($post);
			}
		} else if(isset($_POST['edit'])) {
			if($this->unit_m->check_unit($post['name'], $post['id'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Unit $post[name] Sudah Terdaftar!");
				redirect('unit/edit/'.$post['id']);
			} else {
				$this->unit_m->edit($post);
			}
		}
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
		}
		redirect('unit');
	}
}
