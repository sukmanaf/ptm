<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiseminasiModel extends CI_Model {

	public function print_not($value='')
	{
		$this->db->select('wa_kuesioner_re.nik,');
		$this->db->join('dt_diseminasi', 'dt_diseminasi.nik = wa_kuesioner_re.nik', 'left');
		$this->db->join('wa_anggota_kelompok_usaha', 'wa_anggota_kelompok_usaha.nik = wa_kuesioner_re.nik', 'left');
		$this->db->join('wa_kelompok_usaha', 'wa_kelompok_usaha.id = wa_anggota_kelompok_usaha.id_kelompok_usaha', 'left');
		$this->db->where('dt_diseminasi.nik is null');
		return $this->db->get('wa_kuesioner_re')->result();
	}


	public function getSektorUsaha($nik)
		{
			$this->db->join('wa_kelompok_usaha', 'wa_kelompok_usaha.id = wa_anggota_kelompok_usaha.id_kelompok_usaha', 'left');
			$this->db->join('ms_kuesioner_re10a', 'wa_kelompok_usaha.kode_sektor_usaha = ms_kuesioner_re10a.kode_sektor_usaha', 'left');
			$this->db->where('wa_anggota_kelompok_usaha.nik', $nik);
			return $this->db->get('wa_anggota_kelompok_usaha')->row_array();
		}

			public function get_detail($id='')
	{
		$this->db->select('dt_diseminasi.*,wa_kuesioner_re.nama_responden_utama');
		$this->db->join('wa_kuesioner_re', 'wa_kuesioner_re.nik = dt_diseminasi.nik', 'left');
		$this->db->join('wa_anggota_kelompok_usaha', 'wa_anggota_kelompok_usaha.nik = wa_kuesioner_re.nik', 'left');
		$this->db->join('wa_kelompok_usaha', 'wa_kelompok_usaha.id = wa_anggota_kelompok_usaha.id_kelompok_usaha', 'left');
		$this->db->where('dt_diseminasi.kode_desa_kelurahan', $id);
		return $this->db->get('dt_diseminasi')->result();
	}

	public function getData($id='')
	{
		$this->db->where('targetkk_id', $id);
		return $this->db->get('v_dt_targetkk_perkota')->result();
	}
	public function getRealisasi($kab='',$tahun='')
	{
		$this->db->where('wa_anggaran_ketiga.tahun_anggaran', $tahun);
		$this->db->where('wa_anggaran_ketiga.kode_kab_kota', $kab);
		$this->db->join('ms_kab_kota', 'ms_kab_kota.kode = wa_anggaran_ketiga.kode_kab_kota', 'left');
		return $this->db->get('wa_anggaran_ketiga')->row_array();
	}

}

/* End of file diseminasiModel.php */
/* Location: ./application/models/diseminasiModel.php */