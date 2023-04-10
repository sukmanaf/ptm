<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detailPenetapanModelModel extends CI_Model {

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


	public function getJnsPemberdayaan()
	{
		$data = $this->db->get('wa_jenis_pemberdayaan')->result();
		$str='<option value="">-- Pilih Jenis Pemberdayaan --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->id.'">'.$value->jenis_pemberdayaan.'</option>';
		}
		return $str;
	}
	public function getResponden($id)
	{
		$this->db->where('id_targetkk_desa', $id);
		$data = $this->db->get('wa_kuesioner_re')->result();
		$str='<option value="">-- Pilih Nama --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->nik.'">'.$value->nik.' - '.$value->nama_responden_utama.'</option>';
		}
		return $str;
	}

	public function cekNik($nik='')
	{
		$this->db->where('nik', $nik);
		return $this->db->get('wa_model_pemberdayaan_daftar_subjek')->num_rows();
	}

	public function cekDup($id)
	{
		$this->db->select('id_jenis_pemberdayaan');
		$this->db->where('id_targetkk_desa', $id);
		$data =  $this->db->get('wa_model_pemberdayaan')->result();
		$a=[];
		foreach ($data as $key => $value) {
			array_push($a, $value->id_jenis_pemberdayaan);
		}

		return $a;
	}


}

/* End of file detailPenlokModel.php */
/* Location: ./application/models/detailPenlokModel.php */