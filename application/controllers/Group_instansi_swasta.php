<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group_instansi_swasta extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Group Instansi Swasta ';
		$this->skin->view('group_instansi_swasta/index', $data);
	}

	public function get_all()
	{
		$get = $this->global->get_all('ms_instansi');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->nama, @$value->jenis,
				'<a type="button" href="' . base_url('group_instansi_swasta/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{
		$data['key'] = ['Perbankan', 'Instansi Pemerintah', 'BUMN', 'Instansi Swasta'];
		$data['title'] = 'Home - Master Data - Admin Pusat - Sektor Usaha - Baru';
		$this->skin->view('group_instansi_swasta/add', $data);
	}

	public function create()
	{

		$data = [
			'nama'	=> $this->input->post('nama', true),
			'jenis'	=> $this->input->post('jenis', true),
		];

		$ins =  $this->db->insert('ms_instansi', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{

		$data['title'] = 'Home - Master Data - Admin Pusat - Group Instansi Swasta - Baru';
		$data['key'] = ['Perbankan', 'Instansi Pemerintah', 'BUMN', 'Instansi Swasta'];
		$data['data'] = $this->global->get_by_one('ms_instansi', $id, 'id');
		$this->skin->view('group_instansi_swasta/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'nama'	=> $this->input->post('nama', true),
			'jenis'	=> $this->input->post('jenis', true),
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_instansi', $data);
		} else {
			$ins =  $this->db->insert('ms_instansi', $data);
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
		$del = $this->db->delete('ms_instansi');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file group_instansi_swasta.php */
/* Location: ./application/controllers/group_instansi_swasta.php */