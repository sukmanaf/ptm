<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi_anggaran_ketiga extends CI_Controller
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
		$this->skin->view('realisasi_anggaran_ketiga/index', $data);
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
		$get = $this->global->get_all('v_realisasi_anggaran_ketiga');
		$data = [];

		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->tahun_anggaran, @$value->nama_provinsi,
				@$value->nama_kab_kota,
				rupiah(@$value->anggaran_rencana_usaha),
				rupiah(@$value->anggaran_akses_pemasaran),
				rupiah(@$value->anggaran_insfratruktur_pendukung),
				rupiah(@$value->anggaran_diseminasi),
				rupiah(@$value->realisasi_rencana_usaha),
				rupiah(@$value->realisasi_akses_pemasaran),
				rupiah(@$value->realisasi_insfratruktur_pendukung),
				rupiah(@$value->realisasi_diseminasi),
				rupiah(@$value->sisa_anggaran_rencana_usaha),
				rupiah(@$value->sisa_anggaran_akses_pemasaran),
				rupiah(@$value->sisa_anggaran_insfratruktur_pendukung),
				rupiah(@$value->sisa_anggaran_diseminasi),
				rupiah(@$value->persentase_rencana_usaha),
				rupiah(@$value->persentase_akses_pemasaran),
				rupiah(@$value->persentase_insfratruktur_pendukung),
				rupiah(@$value->persentase_diseminasi),
				'<a type="button" href="' . base_url('realisasi_anggaran_ketiga/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
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
		$this->skin->view('realisasi_anggaran_ketiga/add', $data);
	}

	public function create()
	{

		$data = [
			'tahun_anggaran'	=> $this->input->post('tahun_anggaran', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
			'anggaran_rencana_usaha'	=> ($this->input->post('anggaran_rencana_usaha', true) == '') ? NULL : $this->input->post('anggaran_rencana_usaha', true),
			'realisasi_rencana_usaha'	=> ($this->input->post('realisasi_rencana_usaha', true) == '') ? NULL : $this->input->post('realisasi_rencana_usaha', true),
			'sisa_anggaran_rencana_usaha'	=> ($this->input->post('sisa_anggaran_rencana_usaha', true) == '') ? NULL : $this->input->post('sisa_anggaran_rencana_usaha', true),
			'persentase_rencana_usaha'	=> ($this->input->post('persentase_rencana_usaha', true) == '') ? NULL : $this->input->post('persentase_rencana_usaha', true),
			'anggaran_akses_pemasaran'	=> ($this->input->post('anggaran_akses_pemasaran', true) == '') ? NULL : $this->input->post('anggaran_akses_pemasaran', true),
			'realisasi_akses_pemasaran'	=> ($this->input->post('realisasi_akses_pemasaran', true) == '') ? NULL : $this->input->post('realisasi_akses_pemasaran', true),
			'sisa_anggaran_akses_pemasaran'	=> ($this->input->post('sisa_anggaran_akses_pemasaran', true) == '') ? NULL : $this->input->post('sisa_anggaran_akses_pemasaran', true),
			'persentase_akses_pemasaran'	=> ($this->input->post('persentase_akses_pemasaran', true) == '') ? NULL : $this->input->post('persentase_akses_pemasaran', true),
			'anggaran_insfratruktur_pendukung'	=> ($this->input->post('anggaran_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('anggaran_insfratruktur_pendukung', true),
			'realisasi_insfratruktur_pendukung'	=> ($this->input->post('realisasi_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('realisasi_insfratruktur_pendukung', true),
			'sisa_anggaran_insfratruktur_pendukung'	=> ($this->input->post('sisa_anggaran_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('sisa_anggaran_insfratruktur_pendukung', true),
			'persentase_insfratruktur_pendukung'	=> ($this->input->post('persentase_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('persentase_insfratruktur_pendukung', true),
			'anggaran_diseminasi'	=> ($this->input->post('anggaran_diseminasi', true) == '') ? NULL : $this->input->post('anggaran_diseminasi', true),
			'realisasi_diseminasi'	=> ($this->input->post('realisasi_diseminasi', true) == '') ? NULL : $this->input->post('realisasi_diseminasi', true),
			'sisa_anggaran_diseminasi'	=> ($this->input->post('sisa_anggaran_diseminasi', true) == '') ? NULL : $this->input->post('sisa_anggaran_diseminasi', true),
			'persentase_diseminasi'	=> ($this->input->post('persentase_diseminasi', true) == '') ? NULL : $this->input->post('persentase_diseminasi', true)
		];

		$ins =  $this->db->insert('wa_anggaran_ketiga', $data);
		if ($ins) {

			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - realisasi_anggaran_ketiga - Baru';
		$data['data'] = $this->global->get_by_one('ms_kuesioner_re10a', $id, 'id');
		$data['id'] = $id;
		$this->skin->view('realisasi_anggaran_ketiga/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'tahun_anggaran'	=> $this->input->post('tahun_anggaran', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
			'anggaran_rencana_usaha'	=> ($this->input->post('anggaran_rencana_usaha', true) == '') ? NULL : $this->input->post('anggaran_rencana_usaha', true),
			'realisasi_rencana_usaha'	=> ($this->input->post('realisasi_rencana_usaha', true) == '') ? NULL : $this->input->post('realisasi_rencana_usaha', true),
			'sisa_anggaran_rencana_usaha'	=> ($this->input->post('sisa_anggaran_rencana_usaha', true) == '') ? NULL : $this->input->post('sisa_anggaran_rencana_usaha', true),
			'persentase_rencana_usaha'	=> ($this->input->post('persentase_rencana_usaha', true) == '') ? NULL : $this->input->post('persentase_rencana_usaha', true),
			'anggaran_akses_pemasaran'	=> ($this->input->post('anggaran_akses_pemasaran', true) == '') ? NULL : $this->input->post('anggaran_akses_pemasaran', true),
			'realisasi_akses_pemasaran'	=> ($this->input->post('realisasi_akses_pemasaran', true) == '') ? NULL : $this->input->post('realisasi_akses_pemasaran', true),
			'sisa_anggaran_akses_pemasaran'	=> ($this->input->post('sisa_anggaran_akses_pemasaran', true) == '') ? NULL : $this->input->post('sisa_anggaran_akses_pemasaran', true),
			'persentase_akses_pemasaran'	=> ($this->input->post('persentase_akses_pemasaran', true) == '') ? NULL : $this->input->post('persentase_akses_pemasaran', true),
			'anggaran_insfratruktur_pendukung'	=> ($this->input->post('anggaran_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('anggaran_insfratruktur_pendukung', true),
			'realisasi_insfratruktur_pendukung'	=> ($this->input->post('realisasi_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('realisasi_insfratruktur_pendukung', true),
			'sisa_anggaran_insfratruktur_pendukung'	=> ($this->input->post('sisa_anggaran_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('sisa_anggaran_insfratruktur_pendukung', true),
			'persentase_insfratruktur_pendukung'	=> ($this->input->post('persentase_insfratruktur_pendukung', true) == '') ? NULL : $this->input->post('persentase_insfratruktur_pendukung', true),
			'anggaran_diseminasi'	=> ($this->input->post('anggaran_diseminasi', true) == '') ? NULL : $this->input->post('anggaran_diseminasi', true),
			'realisasi_diseminasi'	=> ($this->input->post('realisasi_diseminasi', true) == '') ? NULL : $this->input->post('realisasi_diseminasi', true),
			'sisa_anggaran_diseminasi'	=> ($this->input->post('sisa_anggaran_diseminasi', true) == '') ? NULL : $this->input->post('sisa_anggaran_diseminasi', true),
			'persentase_diseminasi'	=> ($this->input->post('persentase_diseminasi', true) == '') ? NULL : $this->input->post('persentase_diseminasi', true),
			
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_anggaran_ketiga', $data);
		} else {
			$ins =  $this->db->insert('wa_anggaran_ketiga', $data);
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
		$del = $this->db->delete('wa_anggaran_ketiga');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file realisasi_anggaran_ketiga.php */
/* Location: ./application/controllers/realisasi_anggaran_ketiga.php */