<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasInfrastrukturModel extends CI_Model {

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
		$this->db->select('ms_provinsi.*');
		$this->db->group_by('ms_provinsi.kode,ms_provinsi.id');
		$this->db->order_by('ms_provinsi.kode');
		return $this->db->get('ms_provinsi')->result();
	}
	public function getKab($prov='')
	{
		// $this->db->join('ms_kab_kota', 'ms_kab_kota.kode_provinsi = ms_provinsi.kode');
		$this->db->join('ms_kecamatan', 'ms_kab_kota.kode = ms_kecamatan.kode_kab_kota');
		$this->db->join('ms_desa_kelurahan', 'ms_desa_kelurahan.kode_kecamatan = ms_kecamatan.kode');
		$this->db->join('wa_targetkk_desa', 'ms_desa_kelurahan.kode = wa_targetkk_desa.kode_desa_kelurahan');
		$this->db->select('ms_kab_kota.*');
		$this->db->group_by('ms_kab_kota.kode,ms_kab_kota.id');
		$this->db->order_by('ms_kab_kota.kode');
		$this->db->where('ms_kab_kota.kode_provinsi', $prov);
		return $this->db->get('ms_kab_kota')->result();
	}

	public function getKec($kab='')
	{
		// $this->db->join('ms_kab_kota', 'ms_kab_kota.kode_provinsi = ms_provinsi.kode');
		// $this->db->join('ms_kecamatan', 'ms_kab_kota.kode = ms_kecamatan.kode_kab_kota');
		$this->db->join('ms_desa_kelurahan', 'ms_desa_kelurahan.kode_kecamatan = ms_kecamatan.kode');
		$this->db->join('wa_targetkk_desa', 'ms_desa_kelurahan.kode = wa_targetkk_desa.kode_desa_kelurahan');
		$this->db->select('ms_kecamatan.*');
		$this->db->group_by('ms_kecamatan.kode,ms_kecamatan.id');
		$this->db->order_by('ms_kecamatan.kode');
		$this->db->where('ms_kecamatan.kode_kab_kota', $kab);
		return $this->db->get('ms_kecamatan')->result();
	}


	public function getKel($kec='')
	{
		// $this->db->join('ms_desa_kelurahan', 'ms_desa_kelurahan.kode_kecamatan = ms_kecamatan.kode');
		$this->db->join('wa_targetkk_desa', 'ms_desa_kelurahan.kode = wa_targetkk_desa.kode_desa_kelurahan');
		$this->db->select('ms_desa_kelurahan.*,wa_targetkk_desa.jumlah');
		$this->db->group_by('ms_desa_kelurahan.kode,ms_desa_kelurahan.id,wa_targetkk_desa.jumlah');
		$this->db->order_by('ms_desa_kelurahan.kode');
		$this->db->where('ms_desa_kelurahan.kode_kecamatan', $kec);
		return $this->db->get('ms_desa_kelurahan')->result();
	}

	public function get_detail_desa($id='',$jns='prasarana')
	{
		$this->db->where('sarana_prasarana', $jns);
		$this->db->where('kode_desa_kelurahan', $id);
		$this->db->order_by('id', 'desc');
		return $this->db->get('dt_fasilitasi_infrastruktur')->result();
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

/* End of file fasilitasInfrastrukturModel.php */
/* Location: ./application/models/fasilitasInfrastrukturModel.php */