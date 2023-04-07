<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_baru extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home  - Admin  - User Baru ';
		$this->skin->view('user_baru/index', $data);
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
		$get = $this->global->get_all('v_user_baru');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1,
				@$value->username,
				@$value->npk,
				@$value->fullname,
				@$value->role_name,
				@$value->email,
				@$value->phone,
				'<a type="button" href="' . base_url('user_baru/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['nik'] = $this->db->get('wa_kuesioner_re')->result();
		$data['title'] = 'Home  - Admin  - User Baru - Baru';
		$data['id'] = '';
		$this->skin->view('user_baru/add', $data);
		$this->load->view('user_baru/js');
	}

	public function create()
	{
		$passwordhash = hash('sha256', $this->input->post('password', true));
		$data = [
			'role_user'	=> ($this->input->post('role', true) == '') ? NULL : $this->input->post('role', true),
			'npk'	=> ($this->input->post('npk', true) == '') ? NULL : $this->input->post('npk', true),
			'username'	=> ($this->input->post('username', true) == '') ? NULL : $this->input->post('username', true),
			'fullname'	=> ($this->input->post('fullname', true) == '') ? NULL : $this->input->post('fullname', true),
			'email'	=> ($this->input->post('email', true) == '') ? NULL : $this->input->post('email', true),
			'phone'	=> ($this->input->post('telepon', true) == '') ? NULL : $this->input->post('telepon', true),
			'kode_provinsi'	=> ($this->input->post('kode_provinsi', true) == '') ? NULL : $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> ($this->input->post('kode_kab_kota', true) == '') ? NULL : $this->input->post('kode_kab_kota', true),
			'password'	=> ($passwordhash == '') ? NULL : $passwordhash,

		];

		$ins =  $this->db->insert('ms_user', $data);
		if ($ins) {

			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['title'] = 'Home  - Admin  - User Baru - Baru';
		$data['id'] = $id;
		$this->skin->view('user_baru/edit', $data);
		$this->load->view('user_baru/js');
	}

	public function update()
	{
		$passwordhash = hash('sha256', $this->input->post('password', true));
		$id = $this->input->post('id', true);
		$password = $this->input->post('password', true);
		$a = array();
		if ($password != '') {
			$a = array(
				'password' => $passwordhash

			);
		}
		$data = [
			'role_user'	=> ($this->input->post('role', true) == '') ? NULL : $this->input->post('role', true),
			'npk'	=> ($this->input->post('npk', true) == '') ? NULL : $this->input->post('npk', true),
			'username'	=> ($this->input->post('username', true) == '') ? NULL : $this->input->post('username', true),
			'fullname'	=> ($this->input->post('fullname', true) == '') ? NULL : $this->input->post('fullname', true),
			'email'	=> ($this->input->post('email', true) == '') ? NULL : $this->input->post('email', true),
			'phone'	=> ($this->input->post('telepon', true) == '') ? NULL : $this->input->post('telepon', true),
			'kode_provinsi'	=> ($this->input->post('kode_provinsi', true) == '') ? NULL : $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> ($this->input->post('kode_kab_kota', true) == '') ? NULL : $this->input->post('kode_kab_kota', true)

		];
		$data = array_merge($a, $data);
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_user', $data);
		} else {
			$ins =  $this->db->insert('ms_user', $data);
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
		$del = $this->db->delete('ms_user');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file user_baru.php */
/* Location: ./application/controllers/user_baru.php */