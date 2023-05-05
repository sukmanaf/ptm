<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kantor_pertanahan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Klasifikasi Sektor Usaha ';
		$this->skin->view('kantor_pertanahan/index', $data);
	}

	function tampildata($table = '', $colum = '', $val_colum = '', $combo = '')
	{
		// $table='data_kegiatan';
		$tab = explode("~", $table)[0];

		if ($combo != '') {
			$nama = explode("~", $table)[1];
			$kode = explode("~", $table)[2];
			$this->db->select("$nama as nama");
			$this->db->select("$kode as kode");
		}
		if ($colum == '') {
			$data = $this->db->get($tab)->result_array();
		} else {
			$val_colum = str_replace('~', '/', $val_colum);
			$data = $this->db->get_where($tab, array($colum => str_replace('_', ' ', $val_colum)))->result_array();
		}
		echo json_encode($data);
	}
	public function get_all()
	{
		$get = $this->global->get_all('v_kantor_pertanahan');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1,  @$value->nama_provinsi,@$value->nama_kantor,
				// '<a type="button" href="' . base_url('kantor_pertanahan/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
				// 	'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['key'] = $this->db->get('ms_kuesioner_re10a')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Sektor Usaha - Baru';
		$this->skin->view('kantor_pertanahan/add', $data);
	}

	public function create()
	{

		$data = [
			'kode_sektor_usaha'	=> $this->input->post('kode_sektor_usaha', true),
			'kode_subsektor_usaha'	=> $this->input->post('kode_sub_sektor_usaha', true),
			'kode_jenis_subsektor_usaha'	=> $this->input->post('kode_jenis_sub_sektor_usaha', true),
			'deskripsi'	=> $this->input->post('deskripsi', true),
		];

		$ins =  $this->db->insert('ms_kuesioner_re10c', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{


		$data['title'] = 'Home - Master Data - Admin Pusat - Jenis Sub Sektor Usaha - Baru';
		$data['data'] = $this->global->get_by_one('ms_kuesioner_re10c', $id, 'id');
		$data['id'] = $id;
		$this->skin->view('kantor_pertanahan/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'kode_sektor_usaha'	=> $this->input->post('kode_sektor_usaha', true),
			'kode_subsektor_usaha'	=> $this->input->post('kode_sub_sektor_usaha', true),
			'kode_jenis_subsektor_usaha'	=> $this->input->post('kode_jenis_sub_sektor_usaha', true),
			'deskripsi'	=> $this->input->post('deskripsi', true),
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_kuesioner_re10c', $data);
		} else {
			$ins =  $this->db->insert('ms_kuesioner_re10c', $data);
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
		$del = $this->db->delete('ms_kuesioner_re10c');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file kantor_pertanahan.php */
/* Location: ./application/controllers/kantor_pertanahan.php */