<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi_kinerja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel', 'global');
	}

	public function index()
	{
		$data['title'] = 'Home - Dashboard Realisasi ';
		$this->skin->view('prestasi_kinerja/index', $data);
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
	public function get_all($idtab = '', $tahun)
	{
		$data = [];

		if ($idtab == 'pertama') {
			$this->db->where('tahun_anggaran', $tahun);
			$get = $this->global->get_all('v_prestasi_kinerja');
			foreach ($get as $key => $value) {
				$a = [
					$key + 1,
					"<div data-toggle='modal' style='cursor:pointer;' data-target='#modal-xl' onclick=to_kab('" . @$value->kode_provinsi . "','pertama_kab')>" . @$value->nama_provinsi . "</div>",
					number_format(@$value->anggaran_penlok),
					number_format(@$value->realisasi_penlok),
					number_format(@$value->anggaran_penyuluhan),
					number_format(@$value->realisasi_penyuluhan),
					number_format(@$value->anggaran_pemsos),
					number_format(@$value->realisasi_pemsos),
					number_format(@$value->anggaran_pemberdayaan),
					number_format(@$value->realisasi_pemberdayaan),
					number_format(@$value->anggaran_penyusunan_data),
					number_format(@$value->realisasi_penyusunan_data)

				];
				array_push($data, $a);
			}
		}

		echo json_encode($data);
	}

	public function get_kab($idprov = '', $idtab)
	{
		$data = [];

		if ($idtab == 'pertama_kab') {
			$this->db->where('kode_provinsi', $idprov);
			$get = $this->global->get_all('v_prestasi_kinerja_kab');
			foreach ($get as $key => $value) {
				$a = [
					$key + 1,
					@$value->nama_provinsi,
					@$value->nama_kab_kota,
					number_format(@$value->anggaran_penlok),
					number_format(@$value->realisasi_penlok),
					number_format(@$value->anggaran_penyuluhan),
					number_format(@$value->realisasi_penyuluhan),
					number_format(@$value->anggaran_pemsos),
					number_format(@$value->realisasi_pemsos),
					number_format(@$value->anggaran_pemberdayaan),
					number_format(@$value->realisasi_pemberdayaan),
					number_format(@$value->anggaran_penyusunan_data),
					number_format(@$value->realisasi_penyusunan_data)

				];
				array_push($data, $a);
			}
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['key'] = $this->db->get('ms_kuesioner_re10a')->result();
		$data['title'] = 'Home - Master Data - Admin Pusat - Sektor Usaha - Baru';
		$this->skin->view('prestasi_kinerja/add', $data);
	}

	public function create()
	{

		$data = [
			'kode_sektor_usaha'	=> $this->input->post('kode_sektor_usaha', true),
			'kode_subsektor_usaha'	=> $this->input->post('kode_prestasi_kinerja', true),
			'deskripsi'	=> $this->input->post('deskripsi', true),
		];

		$ins =  $this->db->insert('ms_kuesioner_re10b', $data);
		if ($ins) {


			echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
		} else {
			echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function edit($id = '')
	{
		$data['key'] = $this->db->get('ms_kuesioner_re10a')->result();

		$data['title'] = 'Home - Master Data - Admin Pusat - prestasi_kinerja - Baru';
		$data['data'] = $this->global->get_by_one('ms_kuesioner_re10b', $id, 'id');
		$this->skin->view('prestasi_kinerja/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'kode_sektor_usaha'	=> $this->input->post('kode_sektor_usaha', true),
			'kode_subsektor_usaha'	=> $this->input->post('kode_prestasi_kinerja', true),
			'deskripsi'	=> $this->input->post('deskripsi', true)
		];

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_kuesioner_re10b', $data);
		} else {
			$ins =  $this->db->insert('ms_kuesioner_re10b', $data);
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
		$del = $this->db->delete('ms_kuesioner_re10b');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		} else {
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file prestasi_kinerja.php */
/* Location: ./application/controllers/prestasi_kinerja.php */