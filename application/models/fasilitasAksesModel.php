<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasAksesModel extends CI_Model {

	public function getSektorUsaha($nik)
		{
			$this->db->join('wa_kelompok_usaha', 'wa_kelompok_usaha.id = wa_anggota_kelompok_usaha.id_kelompok_usaha', 'left');
			$this->db->join('ms_kuesioner_re10a', 'wa_kelompok_usaha.kode_sektor_usaha = ms_kuesioner_re10a.kode_sektor_usaha', 'left');
			$this->db->where('wa_anggota_kelompok_usaha.nik', $nik);
			return $this->db->get('wa_anggota_kelompok_usaha')->row_array();
		}
	
	public function getProv($value='')
	{
		$this->db->join('ms_kab_kota', 'ms_kab_kota.kode_provinsi = ms_provinsi.kode');
		$this->db->join('ms_kecamatan', 'ms_kab_kota.kode = ms_kecamatan.kode_kab_kota');
		$this->db->join('ms_desa_kelurahan', 'ms_desa_kelurahan.kode_kecamatan = ms_kecamatan.kode');
		$this->db->join('wa_targetkk_desa', 'ms_desa_kelurahan.kode = wa_targetkk_desa.kode_desa_kelurahan');
		$this->db->select('ms_desa_kelurahan.*');
		return $this->db->get('ms_desa_kelurahan')->result();
	}


	public function get_detail($id='')
	{
		$this->db->select('dt_fasilitasi_akses_pemasaran.*,wa_kuesioner_re.nama_responden_utama');
		$this->db->join('wa_kuesioner_re', 'wa_kuesioner_re.nik = dt_fasilitasi_akses_pemasaran.nik', 'left');
		$this->db->where('kode_desa_kelurahan', $id);
		return $this->db->get('dt_fasilitasi_akses_pemasaran')->result();
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

/* End of file fasilitasAksesModel.php */
/* Location: ./application/models/fasilitasAksesModel.php */