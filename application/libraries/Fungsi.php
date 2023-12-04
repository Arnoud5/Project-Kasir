<?php 

Class Fungsi {

	protected $ci;

	function __construct() {
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$user_id = $this->ci->session->userdata('user_id');
		$user_data = $this->ci->user_m->get($user_id)->row();
		return $user_data;
	}

	function PdfGenerator($html, $filename) {
		$dompdf = new Dompdf\Dompdf();
		$dompdf -> loadHtml($html);
		$dompdf -> setPaper('A4', 'landscape');
		$dompdf -> render();
		$dompdf -> stream($filename, array('Attachment' => 0));
	}

}

 ?>