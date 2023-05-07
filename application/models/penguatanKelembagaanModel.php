<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class PenguatanKelembagaanModel extends CI_Model {
 
 		public function getProv($value='')
	{
		$this->db->select('ms_provinsi.*');
		$this->db->join('ms_provinsi', 'ms_provinsi.kode = wa_anggaran_kedua.kode_provinsi', 'left');
		$this->db->group_by('ms_provinsi.kode,ms_provinsi.id,ms_provinsi.nama_provinsi');
		return $this->db->get('wa_anggaran_kedua')->result();
	}
 public function getKab($prov='')
	{
		$this->db->select('ms_kab_kota.*,wa_anggaran_kedua.target_kk,wa_anggaran_kedua.tahun_anggaran');
		$this->db->join('ms_kab_kota', 'ms_kab_kota.kode = wa_anggaran_kedua.kode_kab_kota', 'left');
		$this->db->where('ms_kab_kota.kode_provinsi', $prov);
		$this->db->group_by('ms_kab_kota.id,wa_anggaran_kedua.tahun_anggaran,ms_kab_kota.kode,wa_anggaran_kedua.target_kk,ms_kab_kota.nama_kab_kota,ms_kab_kota.kode_provinsi');
		return $this->db->get('wa_anggaran_kedua')->result();
	}

	public function cekWIlTahun($kd_kabkot,$tahun)
	{
		$this->db->where('kode_kab_kota', $kd_kabkot);
		$this->db->where('tahun_anggaran', $tahun);
		return $this->db->get('wa_targetkk')->num_rows();;
	}

	public function getRealisasi($kab='',$tahun)
	{
		$this->db->where('wa_anggaran_kedua.tahun_anggaran', $tahun);
		$this->db->where('wa_anggaran_kedua.kode_kab_kota', $kab);
		$this->db->join('ms_kab_kota', 'ms_kab_kota.kode = wa_anggaran_kedua.kode_kab_kota', 'left');
		return $this->db->get('wa_anggaran_kedua')->row_array();
	}
 }
 
 /* End of file penyuluhanModel.php */
 /* Location: ./application/models/penyuluhanModel.php */ 