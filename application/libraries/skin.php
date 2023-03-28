<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skin
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	

	public function view($name='',$val)
	{
		$data['body']=$this->ci->load->view($name, $val, true);
		// echo $data['body'];exit();
		$this->ci->load->view('layout/dashboard', $data);
	}

}

/* End of file skin.php */
/* Location: ./application/libraries/skin.php */
