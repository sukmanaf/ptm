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




}

/* End of file SubjectObject.php */
/* Location: ./application/controllers/SubjectObject.php */