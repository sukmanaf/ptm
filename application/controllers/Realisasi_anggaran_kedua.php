<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi_anggaran_kedua extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Realisasi Anggaran ';
		$this->skin->view('realisasi_anggaran_kedua/index', $data);
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
		$get = $this->global->get_all('v_realisasi_anggaran_kedua');
		$data = [];

		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->tahun_anggaran, @$value->nama_provinsi,
				@$value->nama_kab_kota,
				rupiah(@$value->anggaran_kelembagaan),
				rupiah(@$value->anggaran_kewirausahaan),
				rupiah(@$value->anggaran_kerjasama),
				rupiah(@$value->anggaran_penyusunan_sk),
				rupiah(@$value->realisasi_kelembagaan),
				rupiah(@$value->realisasi_kewirausahaan),
				rupiah(@$value->realisasi_kerjasama),
				rupiah(@$value->realisasi_penyusunan_sk),
				rupiah(@$value->sisa_anggaran_kelembagaan),
				rupiah(@$value->sisa_anggaran_kewirausahaan),
				rupiah(@$value->sisa_anggaran_kerjasama),
				rupiah(@$value->sisa_anggaran_penyusunan_sk),
				rupiah(@$value->persentase_kelembagaan),
				rupiah(@$value->persentase_kewirausahaan),
				rupiah(@$value->persentase_kerjasama),
				rupiah(@$value->persentase_penyusunan_sk),
				'<a type="button" href="' . base_url('realisasi_anggaran_kedua/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
					'<button type="button" id="del" onclick="dels(' . $value->id . ')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data, $a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['nik'] = $this->db->get('wa_kuesioner_re')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Realisasi Anggaran - Baru';
		$this->skin->view('realisasi_anggaran_kedua/add', $data);
	}

	public function create()
	{

		$data = [
			'tahun_anggaran'	=> $this->input->post('tahun_anggaran', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
			'target_kk'	=> ($this->input->post('target_kk', true) == '') ? NULL : $this->input->post('target_kk', true),
			'anggaran_kelembagaan'	=> ($this->input->post('anggaran_kelembagaan', true) == '') ? NULL : $this->input->post('anggaran_kelembagaan', true),
			'realisasi_kelembagaan'	=> ($this->input->post('realisasi_kelembagaan', true) == '') ? NULL : $this->input->post('realisasi_kelembagaan', true),
			'sisa_anggaran_kelembagaan'	=> ($this->input->post('sisa_anggaran_kelembagaan', true) == '') ? NULL : $this->input->post('sisa_anggaran_kelembagaan', true),
			'persentase_kelembagaan'	=> ($this->input->post('persentase_kelembagaan', true) == '') ? NULL : $this->input->post('persentase_kelembagaan', true),
			'anggaran_kewirausahaan'	=> ($this->input->post('anggaran_kewirausahaan', true) == '') ? NULL : $this->input->post('anggaran_kewirausahaan', true),
			'realisasi_kewirausahaan'	=> ($this->input->post('realisasi_kewirausahaan', true) == '') ? NULL : $this->input->post('realisasi_kewirausahaan', true),
			'sisa_anggaran_kewirausahaan'	=> ($this->input->post('sisa_anggaran_kewirausahaan', true) == '') ? NULL : $this->input->post('sisa_anggaran_kewirausahaan', true),
			'persentase_kewirausahaan'	=> ($this->input->post('persentase_kewirausahaan', true) == '') ? NULL : $this->input->post('persentase_kewirausahaan', true),
			'anggaran_kerjasama'	=> ($this->input->post('anggaran_kerjasama', true) == '') ? NULL : $this->input->post('anggaran_kerjasama', true),
			'realisasi_kerjasama'	=> ($this->input->post('realisasi_kerjasama', true) == '') ? NULL : $this->input->post('realisasi_kerjasama', true),
			'sisa_anggaran_kerjasama'	=> ($this->input->post('sisa_anggaran_kerjasama', true) == '') ? NULL : $this->input->post('sisa_anggaran_kerjasama', true),
			'persentase_kerjasama'	=> ($this->input->post('persentase_kerjasama', true) == '') ? NULL : $this->input->post('persentase_kerjasama', true),
			'anggaran_penyusunan_sk'	=> ($this->input->post('anggaran_penyusunan_sk', true) == '') ? NULL : $this->input->post('anggaran_penyusunan_sk', true),
			'realisasi_penyusunan_sk'	=> ($this->input->post('realisasi_penyusunan_sk', true) == '') ? NULL : $this->input->post('realisasi_penyusunan_sk', true),
			'sisa_anggaran_penyusunan_sk'	=> ($this->input->post('sisa_anggaran_penyusunan_sk', true) == '') ? NULL : $this->input->post('sisa_anggaran_penyusunan_sk', true),
			'persentase_penyusunan_sk'	=> ($this->input->post('persentase_penyusunan_sk', true) == '') ? NULL : $this->input->post('persentase_penyusunan_sk', true)
		];

		$ins =  $this->db->insert('wa_anggaran_kedua', $data);
		if ($ins) {

			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - realisasi_anggaran_kedua - Baru';
		$data['data'] = $this->global->get_by_one('ms_kuesioner_re10a', $id, 'id');
		$data['id'] = $id;
		$this->skin->view('realisasi_anggaran_kedua/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'tahun_anggaran'	=> $this->input->post('tahun_anggaran', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
			'target_kk'	=> ($this->input->post('target_kk', true) == '') ? NULL : $this->input->post('target_kk', true),
			'anggaran_kelembagaan'	=> ($this->input->post('anggaran_kelembagaan', true) == '') ? NULL : $this->input->post('anggaran_kelembagaan', true),
			'realisasi_kelembagaan'	=> ($this->input->post('realisasi_kelembagaan', true) == '') ? NULL : $this->input->post('realisasi_kelembagaan', true),
			'sisa_anggaran_kelembagaan'	=> ($this->input->post('sisa_anggaran_kelembagaan', true) == '') ? NULL : $this->input->post('sisa_anggaran_kelembagaan', true),
			'persentase_kelembagaan'	=> ($this->input->post('persentase_kelembagaan', true) == '') ? NULL : $this->input->post('persentase_kelembagaan', true),
			'anggaran_kewirausahaan'	=> ($this->input->post('anggaran_kewirausahaan', true) == '') ? NULL : $this->input->post('anggaran_kewirausahaan', true),
			'realisasi_kewirausahaan'	=> ($this->input->post('realisasi_kewirausahaan', true) == '') ? NULL : $this->input->post('realisasi_kewirausahaan', true),
			'sisa_anggaran_kewirausahaan'	=> ($this->input->post('sisa_anggaran_kewirausahaan', true) == '') ? NULL : $this->input->post('sisa_anggaran_kewirausahaan', true),
			'persentase_kewirausahaan'	=> ($this->input->post('persentase_kewirausahaan', true) == '') ? NULL : $this->input->post('persentase_kewirausahaan', true),
			'anggaran_kerjasama'	=> ($this->input->post('anggaran_kerjasama', true) == '') ? NULL : $this->input->post('anggaran_kerjasama', true),
			'realisasi_kerjasama'	=> ($this->input->post('realisasi_kerjasama', true) == '') ? NULL : $this->input->post('realisasi_kerjasama', true),
			'sisa_anggaran_kerjasama'	=> ($this->input->post('sisa_anggaran_kerjasama', true) == '') ? NULL : $this->input->post('sisa_anggaran_kerjasama', true),
			'persentase_kerjasama'	=> ($this->input->post('persentase_kerjasama', true) == '') ? NULL : $this->input->post('persentase_kerjasama', true),
			'anggaran_penyusunan_sk'	=> ($this->input->post('anggaran_penyusunan_sk', true) == '') ? NULL : $this->input->post('anggaran_penyusunan_sk', true),
			'realisasi_penyusunan_sk'	=> ($this->input->post('realisasi_penyusunan_sk', true) == '') ? NULL : $this->input->post('realisasi_penyusunan_sk', true),
			'sisa_anggaran_penyusunan_sk'	=> ($this->input->post('sisa_anggaran_penyusunan_sk', true) == '') ? NULL : $this->input->post('sisa_anggaran_penyusunan_sk', true),
			'persentase_penyusunan_sk'	=> ($this->input->post('persentase_penyusunan_sk', true) == '') ? NULL : $this->input->post('persentase_penyusunan_sk', true),
			
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_anggaran_kedua', $data);
		} else {
			$ins =  $this->db->insert('wa_anggaran_kedua', $data);
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
		$del = $this->db->delete('wa_anggaran_kedua');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file realisasi_anggaran_kedua.php */
/* Location: ./application/controllers/realisasi_anggaran_kedua.php */