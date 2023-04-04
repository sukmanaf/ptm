<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail_instansi_swasta extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Detail Instansi / Swasta ';
		$this->skin->view('detail_instansi_swasta/index', $data);
	}

	public function get_all()
	{
		$get = $this->global->get_all('v_detail_instansi_swasta');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->nama, @$value->jenis, @$value->nama_instansi, @$value->alamat_instansi, @$value->contac_person, @$value->email, @$value->nomor_telp,
				'<a type="button" href="' . base_url('detail_instansi_swasta/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['key'] = $this->db->get('ms_instansi')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Detail Instansi Swasta - Baru';
		$this->skin->view('detail_instansi_swasta/add', $data);
	}

	public function create()
	{

		$data = [
			'instansi_id'	=> $this->input->post('instansi_id', true),
			'nama_instansi'	=> $this->input->post('nama_instansi', true),
			'contac_person'	=> $this->input->post('contac_person', true),
			'alamat_instansi'	=> $this->input->post('alamat_instansi', true),
			'email'	=> $this->input->post('email', true),
			'nomor_telp'	=> $this->input->post('nomor_telp', true),
		];

		$ins =  $this->db->insert('ms_instansi_detail', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['key'] = $this->db->get('ms_instansi')->result();

		$data['title'] = 'Home - Master Data - Admin Pusat - Detail Instansi Swasta - Baru';
		$data['data'] = $this->global->get_by_one('ms_instansi_detail', $id, 'id');
		$this->skin->view('detail_instansi_swasta/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'instansi_id'	=> $this->input->post('instansi_id', true),
			'nama_instansi'	=> $this->input->post('nama_instansi', true),
			'contac_person'	=> $this->input->post('contac_person', true),
			'alamat_instansi'	=> $this->input->post('alamat_instansi', true),
			'email'	=> $this->input->post('email', true),
			'nomor_telp'	=> $this->input->post('nomor_telp', true),
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_instansi_detail', $data);
		} else {
			$ins =  $this->db->insert('ms_instansi_detail', $data);
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
		$del = $this->db->delete('ms_instansi_detail');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file detail_instansi_swasta.php */
/* Location: ./application/controllers/detail_instansi_swasta.php */