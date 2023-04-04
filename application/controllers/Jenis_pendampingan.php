<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pendampingan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Jenis Pendampingan ';
		$this->skin->view('jenis_pendampingan/index', $data);
	}

	public function get_all()
	{
		$get = $this->global->get_all('wa_jenis_pendampingan');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->jenis_pendampingan,
				'<a type="button" href="' . base_url('jenis_pendampingan/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['title'] = 'Home - Master Data - Admin Pusat - Jenis Pendampingan - Baru';
		$this->skin->view('jenis_pendampingan/add', $data);
	}

	public function create()
	{

		$data = [
			'jenis_pendampingan'	=> $this->input->post('jenis_pendampingan', true),
		];

		$ins =  $this->db->insert('wa_jenis_pendampingan', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Jenis Pendampingan - Baru';
		$data['data'] = $this->global->get_by_one('wa_jenis_pendampingan', $id, 'id');
		$this->skin->view('jenis_pendampingan/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'jenis_pendampingan'	=> $this->input->post('jenis_pendampingan', true)
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_jenis_pendampingan', $data);
		} else {
			$ins =  $this->db->insert('wa_jenis_pendampingan', $data);
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
		$del = $this->db->delete('wa_jenis_pendampingan');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file jenis_pendampingan.php */
/* Location: ./application/controllers/jenis_pendampingan.php */