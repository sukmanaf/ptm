<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->skin->view('dashboard/index', $data);
		$this->load->view('dashboard/js');
	}
	function tampil_data_dashboard($id = '', $tahun = '', $wilayah = '')
	{

		$this->db->where('kode_desa_kelurahan is NOT NULL', NULL, true);
		if ($tahun != '') {
			$this->db->like('tgl_kunjungan_pertama', $tahun);
		}
		if ($wilayah != '') {
			if (strlen($wilayah) == 2) {
				$this->db->where('substring(kode_desa_kelurahan,1,2)', $wilayah);
			} else if (strlen($wilayah) == 4) {
				$this->db->where('substring(kode_desa_kelurahan,1,4)', $wilayah);
			} else if (strlen($wilayah) == 6) {
				$this->db->where('substring(kode_desa_kelurahan,1,6)', $wilayah);
			} else if (strlen($wilayah) == 8) {
				$this->db->where('kode_desa_kelurahan', $wilayah);
			}
		}
		if ($id == 'sektor_usaha') {
			$sql = $this->db->get('v_dashboard_sektor_usaha')->result_array();
			$sql_sektor = $this->db->get('ms_kuesioner_re10a')->result_array();
			if (count($sql) == 0) {
				$datax = array();
			} else {
				for ($a = 0; $a < count($sql_sektor); $a++) {
					for ($i = 0; $i < count($sql); $i++) {
						if ($sql[$i]['deskripsi'] == $sql_sektor[$a]['deskripsi']) {
							$datax[] = array(
								'name'   => $sql_sektor[$a]['deskripsi'],
								'jumlah'     => $sql[$i]['jumlah']
							);
						} else {
							if ($i == 0) {
								$datax[] = array(
									'name'   => $sql_sektor[$a]['deskripsi'],
									'jumlah'     => 0
								);
							}
						}
					}
				}
			}
		} elseif ($id == 'jenjang_pendidikan') {
			$sql = $this->db->get('v_dashboard_jenjang_pendidikan')->result_array();
			$sql_sektor = $this->db->get('ms_kuesioner_ar07')->result_array();
			if (count($sql) == 0) {
				$datax = array();
			} else {
				for ($a = 0; $a < count($sql_sektor); $a++) {
					for ($i = 0; $i < count($sql); $i++) {
						if ($sql[$i]['id_pendidikan'] == $sql_sektor[$a]['id_pendidikan']) {
							$datax[] = array(
								'name'   => $sql_sektor[$a]['pendidikan'],
								'jumlah'     => $sql[$i]['jumlah']
							);
						} else {
							if ($i == 0) {
								$datax[] = array(
									'name'   => $sql_sektor[$a]['pendidikan'],
									'jumlah'     => 0
								);
							}
						}
					}
				}
			}
		} elseif ($id == 'agraria') {
			$sql_sektor = array('1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
			// print_r($sql_sektor);
			// die();
			if ($wilayah == '') {
				$this->db->select_sum('jumlah');
				$this->db->select('bulan');
				$this->db->group_by("bulan");
			}
			$sql = $this->db->get('v_dashboard_akses_reforma_agraria')->result_array();
			// $sql_sektor = $this->db->get('ms_kuesioner_ar07')->result_array();
			if (count($sql) == 0) {
				$datax = array();
			} else {
				for ($a = 1; $a < count($sql_sektor) + 1; $a++) {

					// echo $sql_sektor[$a];
					// echo $sql_sektor[$a];
					for ($i = 0; $i < count($sql); $i++) {
						if (strlen($a) < 2) {
							$a = '0' + $a;
						}
						if ($sql[$i]['bulan'] == $a) {
							$datax[] = array(
								'name'   => $sql_sektor[$a],
								'jumlah'     => $sql[$i]['jumlah']
							);
						} else {
							if ($i == 0) {
								$datax[] = array(
									'name'   => $sql_sektor[$a],
									'jumlah'     => 0
								);
							}
						}
					}
				}
			}
		} elseif ($id == 'kelompok_usaha') {
			$sql_sektor = array('1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
			// print_r($sql_sektor);
			// die();
			if ($wilayah == '') {
				$this->db->select_sum('jumlah');
				$this->db->select('bulan');
				$this->db->group_by("bulan");
			}
			$sql = $this->db->get('v_dashboard_kelompok_usaha')->result_array();
			// $sql_sektor = $this->db->get('ms_kuesioner_ar07')->result_array();
			if (count($sql) == 0) {
				$datax = array();
			} else {
				for ($a = 1; $a < 13; $a++) {
					// echo $sql_sektor[$a];
					// echo $sql_sektor[$a];
					for ($i = 0; $i < count($sql); $i++) {
						if ($sql[$i]['bulan'] == $a) {
							$datax[] = array(
								'name'   => $sql_sektor[$a],
								'jumlah'     => $sql[$i]['jumlah']
							);
						} else {
							if ($i == 0) {
								$datax[] = array(
									'name'   => $sql_sektor[$a],
									'jumlah'     => 0
								);
							}
						}
					}
				}
			}
		}



		echo json_encode($datax);
	}
	public function get_all($idtab = '', $tahun)
	{
		$data = [];

		if ($idtab == 'pertama') {
			$this->db->where('tahun_anggaran', $tahun);
			$get = $this->global->get_all('v_dashboard');
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
			$get = $this->global->get_all('v_dashboard_kab');
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
		$this->skin->view('dashboard/add', $data);
	}

	public function create()
	{

		$data = [
			'kode_sektor_usaha'	=> $this->input->post('kode_sektor_usaha', true),
			'kode_subsektor_usaha'	=> $this->input->post('kode_dashboard', true),
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

		$data['title'] = 'Home - Master Data - Admin Pusat - dashboard - Baru';
		$data['data'] = $this->global->get_by_one('ms_kuesioner_re10b', $id, 'id');
		$this->skin->view('dashboard/edit', $data);
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$data = [
			'kode_sektor_usaha'	=> $this->input->post('kode_sektor_usaha', true),
			'kode_subsektor_usaha'	=> $this->input->post('kode_dashboard', true),
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

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */