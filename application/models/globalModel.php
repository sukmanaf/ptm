<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalModel extends CI_Model {

	public function get_all($table='',$order_by='',$order='asc')
	{
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		if (!empty($order_by)) {
			$this->db->order_by($order_by, $order);
		}
		return $this->db->get($table)->result();
	}

	public function get_by_one($table='',$id='',$idnya='id')
	{

		$this->db->where($idnya, $id);
		return $this->db->get($table, 1)->row_array();
	}

	public function get_by_result($table='',$id='',$idnya='id')
	{

		$this->db->where($idnya, $id);
		return $this->db->get($table)->result();
	}
	public function get_by_arr($table,$arr='')
	{
		$this->db->where($arr);
		return $this->db->get($table)->result();
	}

	public function print_fasilitasi_infrastruktur($jns='sarana')
	{
		$this->db->where('sarana_prasarana', $jns);
		$data = $this->db->get('v_print_fasilitasi_infrastruktur')->result();

		$keys=[];
		foreach ($data as $key => $value) {

				if (!in_array($value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan ,$keys)) {
					array_push($keys, $value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan);
				}
		}
		$datas =[];
		foreach ($keys as $key => $value) {
			$datas[$value]=[];
			// echo "<pre>";
			// print_r ($datas);
			// echo "</pre>";
			// exit();
			foreach ($data as $k => $v) {
				if ($value == $v->kode_desa_kelurahan.' - '.$v->nama_desa_kelurahan) {
					array_push($datas[$value],$v);
				}
			}
			// array_push($datas, $value);

		}

		return $datas;
	}


	public function print_fasilitasi_akses()
	{
		$data = $this->db->get('v_print_fasilitas_akses')->result();

		$keys=[];
		foreach ($data as $key => $value) {

				if (!in_array($value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan ,$keys)) {
					array_push($keys, $value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan);
				}
		}
		$datas =[];
		foreach ($keys as $key => $value) {
			$datas[$value]=[];
			foreach ($data as $k => $v) {
				if ($value == $v->kode_desa_kelurahan.' - '.$v->nama_desa_kelurahan) {
					array_push($datas[$value],$v);
				}
			}
			// array_push($datas, $value);

		}

		return $datas;
	}
	public function print_pengembangan()
	{
		$data = $this->db->get('v_print_pengembangan_rancangan_usaha')->result();

		$keys=[];
		foreach ($data as $key => $value) {

				if (!in_array($value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan ,$keys)) {
					array_push($keys, $value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan);
				}
		}
		$datas =[];
		foreach ($keys as $key => $value) {
			$datas[$value]=[];
			foreach ($data as $k => $v) {
				if ($value == $v->kode_desa_kelurahan.' - '.$v->nama_desa_kelurahan) {
					array_push($datas[$value],$v);
				}
			}
			// array_push($datas, $value);

		}

		return $datas;
	}
	public function print_diseminasi()
	{
		$data = $this->db->get('v_print_diseminasi')->result();

		$keys=[];
		foreach ($data as $key => $value) {

				if (!in_array($value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan ,$keys)) {
					array_push($keys, $value->kode_desa_kelurahan.' - '.$value->nama_desa_kelurahan);
				}
		}
		$datas =[];
		foreach ($keys as $key => $value) {
			$datas[$value]=[];
			foreach ($data as $k => $v) {
				if ($value == $v->kode_desa_kelurahan.' - '.$v->nama_desa_kelurahan) {
					array_push($datas[$value],$v);
				}
			}
			// array_push($datas, $value);

		}

		return $datas;
	}
}

/* End of file globalModel.php */
/* Location: ./application/models/globalModel.php */