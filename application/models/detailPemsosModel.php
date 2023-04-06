<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPemsosModel extends CI_Model {

	public function getData($id='')
	{
		$this->db->where('targetkk_id', $id);
		return $this->db->get('v_dt_targetkk_perkota')->result();
	}

	public function getDataDetail($id='')
	{
		$this->db->where('id_targetkk_desa', $id);
		$this->db->order_by('id', 'desc');
		return $this->db->get('wa_kuesioner_re')->result();
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


	public function getSubsektor($kode='')
	{
		$this->db->where("kode_sektor_usaha = '".$kode."'");
		return $this->db->get('ms_kuesioner_re10b')->result();
	}
	public function getJnsSubsektor($kode='')
	{
		$this->db->where("kode_subsektor_usaha = '".$kode."'");
		return $this->db->get('ms_kuesioner_re10c')->result();
	}

	public function terdaftar()
	{
		$data = $this->db->get('ms_kuesioner_re01')->result();
		$str='<option value="">-- Pilih --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->kode_status_tanah_terdaftar.'">'.$value->deskripsi.'</option>';
		}
		return $str;
	}
	public function tidakTerdaftar()
	{
		$data = $this->db->get('ms_kuesioner_re02')->result();
		$str='<option value="">-- Pilih --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->kode_status_tanah_belum_terdaftar.'">'.$value->deskripsi.'</option>';
		}
		return $str;
	}
	public function fieldstaff()
	{
		$data = $this->db->get('wa_surveyor')->result();
		$str='<option value="">-- Pilih Fieldstaff --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->npk.'">'.$value->npk.' - '.$value->fullname.'</option>';
		}
		return $str;
	}
	public function hub_kk()
	{
		$data = $this->db->get('ms_kuesioner_ar02')->result();
		$str='<option value="">-- Pilih Hubungan --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->kode_hubungan_dgn_kk.'">'.$value->kode_hubungan_dgn_kk.' - '.$value->deskripsi.'</option>';
		}
		return $str;
	}
	public function pekerjaan()
	{
		$data = $this->db->get('ms_kuesioner_ar06')->result();
		$str='<option value="">-- Pilih Pekerjaan --</option>';
		foreach ($data as $key => $value) {
			$str .= '<option value="'.$value->kode_pekerjaan.'">'.$value->kode_pekerjaan.' - '.$value->deskripsi.'</option>';
		}
		return $str;
	}

}

/* End of file detailPenlokModel.php */
/* Location: ./application/models/detailPenlokModel.php */