<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_baku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Report - Baku ';
		$this->skin->view('report_baku/index', $data);
	}

	function tampildata($table = '', $colum = '', $val_colum = '', $combo = '')
	{
		// $table='data_kegiatan';
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];


		$tab = explode("~", $table)[0];

		if ($combo != '') {
			$nama = explode("~", $table)[1];
			$kode = explode("~", $table)[2];
			$this->db->select("$nama as nama");
			$this->db->select("$kode as kode");
		}

		if ($colum == '') {
			if ($role == 5 && $tab == 'ms_kab_kota') {
				$this->db->where('kode', $kabkot);
			}
			$data = $this->db->get($tab)->result_array();
		} else {
			$val_colum = str_replace('~', '/', $val_colum);
			if ($role == 5 && $tab == 'ms_kab_kota') {
				$this->db->where('kode', $kabkot);
			}
			$data = $this->db->get_where($tab, array($colum => str_replace('_', ' ', $val_colum)))->result_array();
		}
		echo json_encode($data);
	}
	public function get_all()
	{
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		if ($role == 5) {
			$this->db->where('kode_kab_kota', $kabkot);
		}
		$get = $this->global->get_all('v_report_baku');
		$data = [];
		foreach ($get as $key => $value) {
			// $this->db->where('targetkk_id', @$value->id);
			// $dt = $this->db->get('fl_field_staff')->row();
			if (@$value->dir_name != NULL) {
				$val = "<a title ='File Tersedia !!' class='btn btn-primary btn-md' target='_blank' href='" . base_url(@$value->dir_name) . "'><i class='fa fa-download'></i></a>";
				// $val = $dt->file_name;
			} else {
				$val = "<a title ='Tidak Ada File !!' class='btn btn-primary btn-md' href='#'><i class='fa fa-download'></i></a>";
			}
			$a = [
				$key + 1, @$value->npk, @$value->fullname, @$value->phone, @$value->assignment_end_date, @$value->nama_provinsi, @$value->nama_kab_kota,
				'<a type="button" href="' . base_url('report_baku/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>' .
					$val

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$role = $this->session->userdata('login')['role_user'];
		$prov = $this->session->userdata('login')['kode_provinsi'];
		if ($role == 5) {
			$this->db->where('kode', $prov);
		}
		$data['key'] = $this->db->get('ms_provinsi')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Data Field Staff - Baru';
		$this->skin->view('report_baku/add', $data);
	}

	public function create()
	{

		$data = [
			'npk'	=> ($this->input->post('npk', true) == '') ? NULL : $this->input->post('npk', true),
			'fullname'	=> ($this->input->post('nama', true) == '') ? NULL : $this->input->post('nama', true),
			'phone'	=> ($this->input->post('hp', true) == '') ? NULL : $this->input->post('hp', true),
			'assignment_end_date'	=> ($this->input->post('tgl_akhir', true) == '') ? '0000-00-00' : $this->input->post('tgl_akhir', true),
			'kode_provinsi'	=> ($this->input->post('kode_provinsi', true) == '') ? NULL : $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> ($this->input->post('kode_kab_kota', true) == '') ? NULL : $this->input->post('kode_kab_kota', true),
		];

		$ins =  $this->db->insert('wa_surveyor', $data);
		$id = $this->db->insert_id();

		if (is_uploaded_file($_FILES['files']['tmp_name'])) {
			$sourcePath = $_FILES['files']['tmp_name'];
			$namf = $_FILES['files']['name'];
			$rep = str_replace(" ", "_", $namf);
			$fil = date('Ymd') . date("his") . $rep;
			$targetPath = "uploads/report_baku/" . $fil;
			move_uploaded_file($sourcePath, FCPATH . $targetPath);
			$data_f = [
				'targetkk_id' => $id,
				'file_name' => $fil,
				'dir_name' => $targetPath,
			];
			$ins =  $this->db->insert('fl_field_staff', $data_f);
		}
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
		$this->skin->view('report_baku/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'npk'	=> ($this->input->post('npk', true) == '') ? NULL : $this->input->post('npk', true),
			'fullname'	=> ($this->input->post('nama', true) == '') ? NULL : $this->input->post('nama', true),
			'phone'	=> ($this->input->post('hp', true) == '') ? NULL : $this->input->post('hp', true),
			'assignment_end_date'	=> ($this->input->post('tgl_akhir', true) == '') ? '0000-00-00' : $this->input->post('tgl_akhir', true),
			'kode_provinsi'	=> ($this->input->post('kode_provinsi', true) == '') ? NULL : $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> ($this->input->post('kode_kab_kota', true) == '') ? NULL : $this->input->post('kode_kab_kota', true),
		];


		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_surveyor', $data);
		} else {
			$ins =  $this->db->insert('wa_surveyor', $data);
		}

		if (is_uploaded_file($_FILES['files']['tmp_name'])) {
			$this->db->delete('fl_field_staff', array('targetkk_id' => $id));
			$sourcePath = $_FILES['files']['tmp_name'];
			$namf = $_FILES['files']['name'];
			$rep = str_replace(" ", "_", $namf);
			$fil = date('Ymd') . date("his") . $rep;
			$targetPath = "uploads/report_baku/" . $fil;
			move_uploaded_file($sourcePath, FCPATH . $targetPath);
			$data_f = [
				'targetkk_id' => $id,
				'file_name' => $fil,
				'dir_name' => $targetPath,
			];
			$ins =  $this->db->insert('fl_field_staff', $data_f);
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

/* End of file report_baku.php */
/* Location: ./application/controllers/report_baku.php */