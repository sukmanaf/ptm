<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detailPembentukanKerjasamaModel extends CI_Model {

	public function getData($id='')
	{
		$this->db->where('targetkk_id', $id);
		return $this->db->get('v_dt_targetkk_perkota')->result();
	}

	public function getDataKab($id)
	{
		$this->db->select('wa_targetkk.*,ms_kab_kota.nama_kab_kota');
		$this->db->join('ms_kab_kota', 'ms_kab_kota.kode = wa_targetkk.kode_kab_kota', 'left');$this->db->where('wa_targetkk.id', $id);
		return $this->db->get('wa_targetkk')->row_array();
	}

	public function getKec($id)
	{
		$this->db->where("kode_kab_kota = '".$id."'");
		return $this->db->get('ms_kecamatan')->result();
	}

	public function getNamaKec($id)
	{
		$this->db->where("ms_desa_kelurahan.kode = '".$id."'");
		$this->db->join('ms_desa_kelurahan', 'ms_desa_kelurahan.kode_kecamatan = ms_kecamatan.kode', 'left');
		return $this->db->get('ms_kecamatan')->row_array();
	}

	public function getKel($id)
	{
		$this->db->where("kode_kecamatan = '".$id."'");
		return $this->db->get('ms_desa_kelurahan')->result();
	}

	public function getKuota($id='')
	{
		$this->db->select('sum(jumlah) as jml');
		$this->db->where('targetkk_id', $id);
		$data =  $this->db->get('wa_targetkk_desa')->row_array()['jml'];
		return $data == '' ? 0:$data;
	}
	

		public function cekDesaKel($kd_desa)
	{
		$this->db->where('kode_desa_kelurahan', $kd_desa);
		return $this->db->get('wa_targetkk_desa')->num_rows();;
	}

}

/* End of file detailPenlokModel.php */
/* Location: ./application/models/detailPenlokModel.php */