<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi_anggaran extends CI_Controller
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
		$this->skin->view('realisasi_anggaran/index', $data);
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
		$get = $this->global->get_all('v_realisasi_anggaran');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key + 1, @$value->tahun_anggaran, @$value->nama_provinsi,
				@$value->nama_kab_kota,
				@$value->target_kk,
				@$value->anggaran_penlok,
				@$value->anggaran_penyuluhan,
				@$value->anggaran_pemsos,
				@$value->anggaran_pemberdayaan,
				@$value->anggaran_penyusunan_data,
				@$value->realisasi_penlok,
				@$value->realisasi_penyuluhan,
				@$value->realisasi_pemsos,
				@$value->realisasi_pemberdayaan,
				@$value->realisasi_penyusunan_data,
				@$value->sisa_anggaran_penlok,
				@$value->sisa_anggaran_penyuluhan,
				@$value->sisa_anggaran_pemsos,
				@$value->sisa_anggaran_pemberdayaan,
				@$value->sisa_anggaran_penyusunan_data,
				@$value->persentase_penlok,
				@$value->persentase_penyuluhan,
				@$value->persentase_pemsos,
				@$value->persentase_pemberdayaan,
				@$value->persentase_penyusunan_data,
				'<a type="button" href="' . base_url('realisasi_anggaran/edit/') . $value->id . '" class="btn btn-success"><i class="fas fa-edit"></i></a>' .
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
		$this->skin->view('realisasi_anggaran/add', $data);
	}

	public function create()
	{

		$data = [
			'tahun_anggaran'	=> $this->input->post('tahun_anggaran', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
			'target_kk'	=> ($this->input->post('target_kk', true) == '') ? NULL : $this->input->post('target_kk', true),
			'anggaran_penlok'	=> ($this->input->post('anggaran_penlok', true) == '') ? NULL : $this->input->post('anggaran_penlok', true),
			'realisasi_penlok'	=> ($this->input->post('realisasi_penlok', true) == '') ? NULL : $this->input->post('realisasi_penlok', true),
			'sisa_anggaran_penlok'	=> ($this->input->post('sisa_anggaran_penlok', true) == '') ? NULL : $this->input->post('sisa_anggaran_penlok', true),
			'persentase_penlok'	=> ($this->input->post('persentase_penlok', true) == '') ? NULL : $this->input->post('persentase_penlok', true),
			'anggaran_penyuluhan'	=> ($this->input->post('anggaran_penyuluhan', true) == '') ? NULL : $this->input->post('anggaran_penyuluhan', true),
			'realisasi_penyuluhan'	=> ($this->input->post('realisasi_penyuluhan', true) == '') ? NULL : $this->input->post('realisasi_penyuluhan', true),
			'sisa_anggaran_penyuluhan'	=> ($this->input->post('sisa_anggaran_penyuluhan', true) == '') ? NULL : $this->input->post('sisa_anggaran_penyuluhan', true),
			'persentase_penyuluhan'	=> ($this->input->post('persentase_penyuluhan', true) == '') ? NULL : $this->input->post('persentase_penyuluhan', true),
			'anggaran_pemsos'	=> ($this->input->post('anggaran_pemsos', true) == '') ? NULL : $this->input->post('anggaran_pemsos', true),
			'realisasi_pemsos'	=> ($this->input->post('realisasi_pemsos', true) == '') ? NULL : $this->input->post('realisasi_pemsos', true),
			'sisa_anggaran_pemsos'	=> ($this->input->post('sisa_anggaran_pemsos', true) == '') ? NULL : $this->input->post('sisa_anggaran_pemsos', true),
			'persentase_pemsos'	=> ($this->input->post('persentase_pemsos', true) == '') ? NULL : $this->input->post('persentase_pemsos', true),
			'anggaran_pemberdayaan'	=> ($this->input->post('anggaran_pemberdayaan', true) == '') ? NULL : $this->input->post('anggaran_pemberdayaan', true),
			'realisasi_pemberdayaan'	=> ($this->input->post('realisasi_pemberdayaan', true) == '') ? NULL : $this->input->post('realisasi_pemberdayaan', true),
			'sisa_anggaran_pemberdayaan'	=> ($this->input->post('sisa_anggaran_pemberdayaan', true) == '') ? NULL : $this->input->post('sisa_anggaran_pemberdayaan', true),
			'persentase_pemberdayaan'	=> ($this->input->post('persentase_pemberdayaan', true) == '') ? NULL : $this->input->post('persentase_pemberdayaan', true),
			'anggaran_penyusunan_data'	=> ($this->input->post('anggaran_penyusunan_data', true) == '') ? NULL : $this->input->post('anggaran_penyusunan_data', true),
			'realisasi_penyusunan_data'	=> ($this->input->post('realisasi_penyusunan_data', true) == '') ? NULL : $this->input->post('realisasi_penyusunan_data', true),
			'sisa_anggaran_penyusunan_data'	=> ($this->input->post('sisa_anggaran_penyusunan_data', true) == '') ? NULL : $this->input->post('sisa_anggaran_penyusunan_data', true),
			'persentase_penyusunan_data'	=> ($this->input->post('persentase_penyusunan_data', true) == '') ? NULL : $this->input->post('persentase_penyusunan_data', true),
		];

		$ins =  $this->db->insert('wa_realisasi_anggaran', $data);
		if ($ins) {

			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - realisasi_anggaran - Baru';
		$data['data'] = $this->global->get_by_one('ms_kuesioner_re10a', $id, 'id');
		$data['id'] = $id;
		$this->skin->view('realisasi_anggaran/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'tahun_anggaran'	=> $this->input->post('tahun_anggaran', true),
			'kode_provinsi'	=> $this->input->post('kode_provinsi', true),
			'kode_kab_kota'	=> $this->input->post('kode_kab_kota', true),
			'target_kk'	=> ($this->input->post('target_kk', true) == '') ? NULL : $this->input->post('target_kk', true),
			'anggaran_penlok'	=> ($this->input->post('anggaran_penlok', true) == '') ? NULL : $this->input->post('anggaran_penlok', true),
			'realisasi_penlok'	=> ($this->input->post('realisasi_penlok', true) == '') ? NULL : $this->input->post('realisasi_penlok', true),
			'sisa_anggaran_penlok'	=> ($this->input->post('sisa_anggaran_penlok', true) == '') ? NULL : $this->input->post('sisa_anggaran_penlok', true),
			'persentase_penlok'	=> ($this->input->post('persentase_penlok', true) == '') ? NULL : $this->input->post('persentase_penlok', true),
			'anggaran_penyuluhan'	=> ($this->input->post('anggaran_penyuluhan', true) == '') ? NULL : $this->input->post('anggaran_penyuluhan', true),
			'realisasi_penyuluhan'	=> ($this->input->post('realisasi_penyuluhan', true) == '') ? NULL : $this->input->post('realisasi_penyuluhan', true),
			'sisa_anggaran_penyuluhan'	=> ($this->input->post('sisa_anggaran_penyuluhan', true) == '') ? NULL : $this->input->post('sisa_anggaran_penyuluhan', true),
			'persentase_penyuluhan'	=> ($this->input->post('persentase_penyuluhan', true) == '') ? NULL : $this->input->post('persentase_penyuluhan', true),
			'anggaran_pemsos'	=> ($this->input->post('anggaran_pemsos', true) == '') ? NULL : $this->input->post('anggaran_pemsos', true),
			'realisasi_pemsos'	=> ($this->input->post('realisasi_pemsos', true) == '') ? NULL : $this->input->post('realisasi_pemsos', true),
			'sisa_anggaran_pemsos'	=> ($this->input->post('sisa_anggaran_pemsos', true) == '') ? NULL : $this->input->post('sisa_anggaran_pemsos', true),
			'persentase_pemsos'	=> ($this->input->post('persentase_pemsos', true) == '') ? NULL : $this->input->post('persentase_pemsos', true),
			'anggaran_pemberdayaan'	=> ($this->input->post('anggaran_pemberdayaan', true) == '') ? NULL : $this->input->post('anggaran_pemberdayaan', true),
			'realisasi_pemberdayaan'	=> ($this->input->post('realisasi_pemberdayaan', true) == '') ? NULL : $this->input->post('realisasi_pemberdayaan', true),
			'sisa_anggaran_pemberdayaan'	=> ($this->input->post('sisa_anggaran_pemberdayaan', true) == '') ? NULL : $this->input->post('sisa_anggaran_pemberdayaan', true),
			'persentase_pemberdayaan'	=> ($this->input->post('persentase_pemberdayaan', true) == '') ? NULL : $this->input->post('persentase_pemberdayaan', true),
			'anggaran_penyusunan_data'	=> ($this->input->post('anggaran_penyusunan_data', true) == '') ? NULL : $this->input->post('anggaran_penyusunan_data', true),
			'realisasi_penyusunan_data'	=> ($this->input->post('realisasi_penyusunan_data', true) == '') ? NULL : $this->input->post('realisasi_penyusunan_data', true),
			'sisa_anggaran_penyusunan_data'	=> ($this->input->post('sisa_anggaran_penyusunan_data', true) == '') ? NULL : $this->input->post('sisa_anggaran_penyusunan_data', true),
			'persentase_penyusunan_data'	=> ($this->input->post('persentase_penyusunan_data', true) == '') ? NULL : $this->input->post('persentase_penyusunan_data', true),
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_realisasi_anggaran', $data);
		} else {
			$ins =  $this->db->insert('wa_realisasi_anggaran', $data);
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
		$del = $this->db->delete('wa_realisasi_anggaran');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file realisasi_anggaran.php */
/* Location: ./application/controllers/realisasi_anggaran.php */