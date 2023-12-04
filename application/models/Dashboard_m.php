<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_model{


	public function get_data($table)
	{
		return $this->db->get($table);
	}

}
