<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

function __construct()
    {
     
		parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Sektor Usaha';
		$this->skin->view('pengembangan/index',$data);
	}
	
	public function masuk()
	{
		echo "<pre>";
		print_r ($_POST);
		echo "</pre>";
	}

	public function tes2()
	{
		$this->load->view('login2');
	}
}

/* End of file tes.php */
/* Location: ./application/controllers/tes.php */