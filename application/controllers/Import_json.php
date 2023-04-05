<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_json extends CI_Controller {

	public function index()
	{
		
	}

	public function importProv($value='')
	{
		$json = file_get_contents(base_url('uploads/desa_rev.json'));
		$data = json_decode($json,true);
		// echo "<pre>";
		// print_r ($data['data']);
		// echo "</pre>";exit();
		$data = $data['data'];
		$arr[0] = [
				'desaid' => '0003EEF2C68C4F27E053131D0B0ABF43',
		    'kecamatanid' => 'A5D4480F8BC6C405E0400B0A9A1442E8',
		    'kabupatenid' => '45c77ffccfa6446fbd63aac96e4c93a7',
		    'propinsiid' => '78f021d61acf42ada688505f3ae514dd',
		    'tipedesa' => 'Desa',
		    'tipekabupaten' => 'Kabupaten',
		    'kodedesa' => '24041599',
		    'namadesa' => 'Kapitan',
		    'namakecamatan' => 'Laen Manen', 
		    'namakabupaten' => 'Malaka',
		    'namapropinsi' => 'Nusa Tenggara Timur'
		];
		// echo "<pre>";
		// print_r ($arr);
		// echo "</pre>";exit();
		$datas = [];
		$kode= [];
		$x=0;
		foreach ($data as $key => $value) {
			// echo "<pre>";
			// print_r (substr($value['kodedesa'], 0, 2));
			// echo "</pre>";exit();
			// $prov=substr($value['kodedesa'], 0, 2);	
			// $kab=substr($value['kodedesa'], 0, 4);	
			// $kec=substr($value['kodedesa'], 0, 6);
			if(is_numeric($value['kodedesa']) && substr($value['kodedesa'],0,2) != 00){

				$a['id'] = substr($value['kodedesa'],0,2);
				$a['kode'] = substr($value['kodedesa'],0,2);
				$a['nama_provinsi'] = $value['namapropinsi'];

				if (!in_array($a['kode'], $kode)) {
					array_push($kode, $a['kode']);
					array_push($datas, $a);
				}
			}	
			
			
		}

		// echo "<pre>";
		// print_r ($datas);
		// echo "</pre>";
			
		// foreach ($datas as $key => $value) {
		// 	$this->db->insert('ms_provinsi',$value);
		// }
	}

	public function importKab($value='')
	{
		$json = file_get_contents(base_url('uploads/desa_rev.json'));
		$data = json_decode($json,true);
		// echo "<pre>";
		// print_r ($data['data']);
		// echo "</pre>";exit();
		$data = $data['data'];
		$arr[0] = [
				'desaid' => '0003EEF2C68C4F27E053131D0B0ABF43',
		    'kecamatanid' => 'A5D4480F8BC6C405E0400B0A9A1442E8',
		    'kabupatenid' => '45c77ffccfa6446fbd63aac96e4c93a7',
		    'propinsiid' => '78f021d61acf42ada688505f3ae514dd',
		    'tipedesa' => 'Desa',
		    'tipekabupaten' => 'Kabupaten',
		    'kodedesa' => '24041599',
		    'namadesa' => 'Kapitan',
		    'namakecamatan' => 'Laen Manen', 
		    'namakabupaten' => 'Malaka',
		    'namapropinsi' => 'Nusa Tenggara Timur'
		];
		// echo "<pre>";
		// print_r ($arr);
		// echo "</pre>";exit();
		$datas = [];
		$kode= [];
		$x=0;
		foreach ($data as $key => $value) {
			// echo "<pre>";
			// print_r (substr($value['kodedesa'], 0, 2));
			// echo "</pre>";exit();
			// $prov=substr($value['kodedesa'], 0, 2);	
			// $kab=substr($value['kodedesa'], 0, 4);	
			// $kec=substr($value['kodedesa'], 0, 6);
			if(is_numeric($value['kodedesa']) && substr($value['kodedesa'],0,4) != 0000){

				$a['kode_provinsi'] = substr($value['kodedesa'],0,2);
				$a['kode'] = substr($value['kodedesa'],0,4);
				$a['nama_kab_kota'] = $value['namakabupaten'];

				if (!in_array($a['kode'], $kode)) {
					array_push($kode, $a['kode']);
					array_push($datas, $a);
				}
			}	
			
			
		}

		echo "<pre>";
		print_r ($datas);
		echo "</pre>";
			
		// foreach ($datas as $key => $value) {
		// 	$this->db->insert('ms_kab_kota',$value);
		// }
	}
	public function importKec($value='')
	{
		$json = file_get_contents(base_url('uploads/desa_rev.json'));
		$data = json_decode($json,true);
		// echo "<pre>";
		// print_r ($data['data']);
		// echo "</pre>";exit();
		$data = $data['data'];
		$arr[0] = [
				'desaid' => '0003EEF2C68C4F27E053131D0B0ABF43',
		    'kecamatanid' => 'A5D4480F8BC6C405E0400B0A9A1442E8',
		    'kabupatenid' => '45c77ffccfa6446fbd63aac96e4c93a7',
		    'propinsiid' => '78f021d61acf42ada688505f3ae514dd',
		    'tipedesa' => 'Desa',
		    'tipekabupaten' => 'Kabupaten',
		    'kodedesa' => '24041599',
		    'namadesa' => 'Kapitan',
		    'namakecamatan' => 'Laen Manen', 
		    'namakabupaten' => 'Malaka',
		    'namapropinsi' => 'Nusa Tenggara Timur'
		];
		// echo "<pre>";
		// print_r ($arr);
		// echo "</pre>";exit();
		$datas = [];
		$kode= [];
		$x=0;
		foreach ($data as $key => $value) {
			// echo "<pre>";
			// print_r (substr($value['kodedesa'], 0, 2));
			// echo "</pre>";exit();
			// $prov=substr($value['kodedesa'], 0, 2);	
			// $kab=substr($value['kodedesa'], 0, 4);	
			// $kec=substr($value['kodedesa'], 0, 6);
			if(is_numeric($value['kodedesa']) && substr($value['kodedesa'],0,6) != 000000){

				$a['kode_kab_kota'] = substr($value['kodedesa'],0,4);
				$a['kode'] = substr($value['kodedesa'],0,6);
				$a['nama_kecamatan'] = $value['namakecamatan'];

				if (!in_array($a['kode'], $kode)) {
					array_push($kode, $a['kode']);
					array_push($datas, $a);
				}
			}	
			
			
		}

		echo "<pre>";
		print_r ($datas);
		echo "</pre>";
			
		// foreach ($datas as $key => $value) {
		// 	$this->db->insert('ms_kecamatan',$value);
		// }
	}

	public function importKel($value='')
	{
		$json = file_get_contents(base_url('uploads/desa_rev.json'));
		$data = json_decode($json,true);
		// echo "<pre>";
		// print_r ($data['data']);
		// echo "</pre>";exit();
		$data = $data['data'];
		$arr[0] = [
				'desaid' => '0003EEF2C68C4F27E053131D0B0ABF43',
		    'kecamatanid' => 'A5D4480F8BC6C405E0400B0A9A1442E8',
		    'kabupatenid' => '45c77ffccfa6446fbd63aac96e4c93a7',
		    'propinsiid' => '78f021d61acf42ada688505f3ae514dd',
		    'tipedesa' => 'Desa',
		    'tipekabupaten' => 'Kabupaten',
		    'kodedesa' => '24041599',
		    'namadesa' => 'Kapitan',
		    'namakecamatan' => 'Laen Manen', 
		    'namakabupaten' => 'Malaka',
		    'namapropinsi' => 'Nusa Tenggara Timur'
		];
		// echo "<pre>";
		// print_r ($arr);
		// echo "</pre>";exit();
		$datas = [];
		$kode= [];
		$x=0;
		foreach ($data as $key => $value) {
			if($key >= 20859){

				if(is_numeric($value['kodedesa']) && substr($value['kodedesa'],0,8) != 00000000){

					$a['kode_kecamatan'] = substr($value['kodedesa'],0,6);
					$a['kode'] = substr($value['kodedesa'],0,8);
					$a['nama_desa_kelurahan'] = $value['namadesa'];

					if (!in_array($a['kode'], $kode)) {
						array_push($kode, $a['kode']);
						array_push($datas, $a);
					}
				}	
			}
			
			
		}

		echo "<pre>";
		print_r ($datas);
		echo "</pre>";
			
		foreach ($datas as $key => $value) {
			$this->db->insert('ms_desa_kelurahan',$value);
		}
	}
}

/* End of file Import_json.php */
/* Location: ./application/controllers/Import_json.php */