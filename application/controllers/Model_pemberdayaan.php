<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pemberdayaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Model Pemberdayaan ';
		$this->skin->view('model_pemberdayaan/index', $data);
	}

	public function get_all()
	{
		$get = $this->global->get_all('wa_jenis_pemberdayaan');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->jenis_pemberdayaan,
				'<a type="button" href="' . base_url('model_pemberdayaan/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['nik'] = $this->db->get('wa_kuesioner_re')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Model Pemberdayaan - Baru';
		$this->skin->view('model_pemberdayaan/add', $data);
	}

	public function create()
	{

		$data = [
			'jenis_pemberdayaan'	=> $this->input->post('jenis_pemberdayaan', true),
		];

		$ins =  $this->db->insert('wa_jenis_pemberdayaan', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Model Pemberdayaan - Baru';
		$data['data'] = $this->global->get_by_one('wa_jenis_pemberdayaan', $id, 'id');
		$this->skin->view('model_pemberdayaan/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'jenis_pemberdayaan'	=> $this->input->post('jenis_pemberdayaan', true)
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_jenis_pemberdayaan', $data);
		} else {
			$ins =  $this->db->insert('wa_jenis_pemberdayaan', $data);
		}
		if ($ins) {
			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function delete($id = '')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('wa_jenis_pemberdayaan');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file model_pemberdayaan.php */
/* Location: ./application/controllers/model_pemberdayaan.php */