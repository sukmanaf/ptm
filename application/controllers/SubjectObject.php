<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectObject extends CI_Controller {

	public function index()
	{
		$this->skin->view('subject_object/select_year',null);
	}

	public function tahun_pertama($value='')
	{
		$this->skin->view('subject_object/tahun_pertama',null);
		
	}


	public function tahun_kedua($value='')
	{
		$this->skin->view('subject_object/tahun_kedua',null);
		
	}


	public function tahun_ketiga($value='')
	{
		$this->skin->view('subject_object/tahun_ketiga',null);
		
	}




}

/* End of file SubjectObject.php */
/* Location: ./application/controllers/SubjectObject.php */