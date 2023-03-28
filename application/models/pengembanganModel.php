<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengembanganModel extends CI_Model {

	public function getSektorUsaha($nik)
	{
		$this->db->join('wa_kelompok_usaha', 'wa_kelompok_usaha.id = wa_anggota_kelompok_usaha.id_kelompok_usaha', 'left');
		$this->db->join('ms_kuesioner_re10a', 'wa_kelompok_usaha.kode_sektor_usaha = ms_kuesioner_re10a.kode_sektor_usaha', 'left');
		$this->db->where('wa_anggota_kelompok_usaha.nik', $nik);
		return $this->db->get('wa_anggota_kelompok_usaha')->row_array();
	}

	
	public function get_detail($id='')
	{
		$this->db->select('dt_pengembangan_rencana_usaha.*,wa_kuesioner_re.nama_responden_utama');
		$this->db->join('wa_kuesioner_re', 'wa_kuesioner_re.nik = dt_pengembangan_rencana_usaha.nik', 'left');
		$this->db->where('kode_desa_kelurahan', $id);
		return $this->db->get('dt_pengembangan_rencana_usaha')->result();
	}


	

}

/* End of file pengembanganModel.php */
/* Location: ./application/models/pengembanganModel.php */