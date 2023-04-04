<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_field_staff extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Data Field Staff ';
		$this->skin->view('data_field_staff/index', $data);
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
		$get = $this->global->get_all('v_data_field_staff');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->npk, @$value->fullname, @$value->phone, @$value->assignment_end_date, @$value->nama_provinsi, @$value->nama_kab_kota,
				'<a type="button" href="' . base_url('data_field_staff/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['key'] = $this->db->get('ms_provinsi')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Data Field Staff - Baru';
		$this->skin->view('data_field_staff/add', $data);
	}

	public function create()
	{

		$data = [
			'npk'	=> $this->input->post('npk', true),
			'fullname'	=> $this->input->post('nama', true),
			'phone'	=> $this->input->post('hp', true),
			'assignment_end_date'	=> $this->input->post('tgl_akhir', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
		];

		$ins =  $this->db->insert('wa_surveyor', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{


		$data['title'] = 'Home - Master Data - Admin Pusat - Data Field Staff - Baru';
		$data['data'] = $this->global->get_by_one('wa_surveyor', $id, 'id');
		$data['id'] = $id;
		$this->skin->view('data_field_staff/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'npk'	=> $this->input->post('npk', true),
			'fullname'	=> $this->input->post('nama', true),
			'phone'	=> $this->input->post('hp', true),
			'assignment_end_date'	=> $this->input->post('tgl_akhir', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
		];
		print_r($data);
		die();

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_surveyor', $data);
		} else {
			$ins =  $this->db->insert('wa_surveyor', $data);
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
		$del = $this->db->delete('wa_surveyor');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file data_field_staff.php */
/* Location: ./application/controllers/data_field_staff.php */