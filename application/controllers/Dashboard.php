<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		check_not_login();

		$query = $this->db->query("SELECT sales_detail.item_id, item.name, (SELECT SUM(sales_detail.qty)) AS sold
			From sales_detail
			INNER JOIN sales ON sales_detail.sales_id = sales.sales_id
			INNER JOIN item ON sales_detail.item_id = item.item_id
			WHERE MID(sales.create_date, 6, 2) = DATE_FORMAT(CURDATE(), '%m')
			GROUP BY sales_detail.item_id
			ORDER BY sold DESC
			LIMIT 10");		   

		$data['row'] = $query->result();

		$this->load->model('dashboard_m');	

		$this->template->load('template', 'dashboard', $data);
	}


}
