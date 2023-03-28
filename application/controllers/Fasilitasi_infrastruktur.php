<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitasi_infrastruktur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('fasilitasInfrastrukturModel','fasilitasi_infrastruktur');
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Fasilitas Infrastruktur Pendukung';
		$this->skin->view('fasilitasi_infrastruktur/index',$data);
	}
	
	public function get_all()
	{

		$get=$this->global->get_all('v_fasilitasi_infrastruktur');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,$value->nama_provinsi,$value->nama_kab_kota,$value->nama_kecamatan,$value->nama_desa_kelurahan,
				'<a type="button" href="'.base_url('fasilitasi_infrastruktur/edit/').$value->kode_kel.'" class="btn btn-success"><i class="fas fa-plus"></i></a>'


			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function get_detail_sarana($id)
	{
		$get = $this->fasilitasi_infrastruktur->get_detail_desa($id,'sarana');

		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,$value->jenis_prasarana,$value->keberadaan_tidak_ada,$value->keberadaan_ada,$value->keberadaan_kosong,$value->kondisi_baik,$value->kondisi_cukup,$value->kondisi_kurang,$value->kondisi_kosong,$value->kepemilikan_individu,$value->kepemilikan_komunal,$value->kepemilikan_lainnya,
					'<button type="button" id="edit" onclick="editSarana('.$key.','.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}
	public function get_detail_prasarana($id)
	{
		$get = $this->fasilitasi_infrastruktur->get_detail_desa($id,'prasarana');

		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,$value->jenis_prasarana,$value->keberadaan_tidak_ada,$value->keberadaan_ada,$value->keberadaan_keterangan,$value->kondisi_baik,$value->kondisi_cukup,$value->kondisi_kurang,$value->kondisi_keterangan,$value->kepemilikan_individu,$value->kepemilikan_komunal,$value->kepemilikan_lainnya,
					'<button type="button" id="edit" onclick="editPrasarana('.$key.','.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="del('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function add()
	{
		$data['prov']=$this->fasilitasi_infrastruktur->getProv();
		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Master Data - Admin Pusat - Fasilitas Infrastruktur Pendukung - Baru';
		$this->skin->view('fasilitasi_infrastruktur/add',$data);
	}

	public function create()
	{
		$nik = $this->input->post('nik',true);
		$nama = $this->global->get_by_one('wa_kuesioner_re',$nik,'nik')['nama_responden_utama'];
		$luas_tanah = $this->input->post('luas_tanah',true) == '' ? 0:$this->input->post('luas_tanah',true);
		$kapasitas = $this->input->post('kapasitas',true) == '' ? 0:$this->input->post('kapasitas',true);
		$data = [
					'nik'	=> $nik,
					'nama' 	=> $nama,
					'nama_kelompok'	=> $this->input->post('nama_kelompok',true),
					'keanggotaan'	=> $this->input->post('keanggotaan',true),
					'sektor_usaha'	=> $this->input->post('sektor_usaha',true),
					'komoditas'	=> $this->input->post('komoditas',true),
					'luas_tanah'	=> $luas_tanah,
					'kapasitas'	=> $kapasitas,
					'akses_pemasaran'	=> $this->input->post('akses_pemasaran',true),
					'kebutuhan_akses'	=> $this->input->post('keanggotaan',true),
					'kendala'	=> $this->input->post('kendala',true),				
				];
		$ins =  $this->db->insert('tes_data', $data);
		if ($ins) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}

	}

	public function edit($id='')
	{
		$data = $this->global->get_by_result('dt_fasilitasi_infrastruktur',$id, 'kode_desa_kelurahan');
		$strSarana = '';
		$strPrasarana = '';
		$arrJenis = [];
		foreach ($data as $key => $value) {
				$strSarana .= '<tr><td>'.intVal($key+1).'</td><td>'.$value->jenis_prasarana.'</td><td>'.$value->keberadaan_tidak_ada.'</td><td>'.$value->keberadaan_ada.'</td><td>'.$value->keberadaan_kosong.'</td><td>'.$value->kondisi_baik.'</td><td>'.$value->kondisi_cukup.'</td><td>'.$value->kondisi_kurang.'</td><td>'.$value->kondisi_kosong.'</td><td>'.$value->kepemilikan_individu.'</td><td>'.$value->kepemilikan_komunal.'</td><td>'.$value->kepemilikan_lainnya.'</td><td><button type="button" id="edit" onclick="edits(\''.$value->jenis_prasarana."',".intVal($key).')" class="btn btn-success hapus"><i class="fas fa-edit"></i></button><button type="button" id="delete" onclick="del('.$value->jenis_prasarana.",".intVal($key).')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button></td></tr>';
				array_push($arrJenis, $value->jenis_prasarana);
		}
		$data['sarana'] = $strSarana;
		// $data['arrJenis'] = json_encode($arrJenis);
		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Master Data - Admin Pusat - Fasilitas Infrastruktur Pendukung - Baru';
		$data['data'] = $this->global->get_by_one('tes_data',$id,'id');
		$data['id'] = $id;
		$this->skin->view('fasilitasi_infrastruktur/edit',$data);

	}

	public function update()
	{

		$luas_tanah = $this->input->post('luas_tanah',true) == '' ? 0:$this->input->post('luas_tanah',true);
		$kapasitas = $this->input->post('kapasitas',true) == '' ? 0:$this->input->post('kapasitas',true);
		$data = [
				'kode_desa_kelurahan' => $this->input->post('kode_desa_kelurahan' ,true) == '' ? 0 : $this->input->post('kode_desa_kelurahan' ,true),
			    'jenis_prasarana' => $this->input->post('jenis_prasarana' ,true) == '' ? 0 : $this->input->post('jenis_prasarana' ,true),
			    'keberadaan_ada' => $this->input->post('keberadaan_ada' ,true) == '' ? 0 : $this->input->post('keberadaan_ada' ,true),
			    'keberadaan_tidak_ada' => $this->input->post('keberadaan_tidak_ada' ,true) == '' ? 0 : $this->input->post('keberadaan_tidak_ada' ,true),
			    'keberadaan_kosong' => $this->input->post('keberadaan_kosong' ,true) == '' ? 0 : $this->input->post('keberadaan_kosong' ,true),
			    'keberadaan_keterangan' => $this->input->post('keberadaan_keterangan' ,true) == '' ? 0 : $this->input->post('keberadaan_keterangan' ,true),
			    'kondisi_baik' => $this->input->post('kondisi_baik' ,true) == '' ? 0 : $this->input->post('kondisi_baik' ,true),
			    'kondisi_cukup' => $this->input->post('kondisi_cukup' ,true) == '' ? 0 : $this->input->post('kondisi_cukup' ,true),
			    'kondisi_kurang' => $this->input->post('kondisi_kurang' ,true) == '' ? 0 : $this->input->post('kondisi_kurang' ,true),
			    'kondisi_kosong' => $this->input->post('kondisi_kosong' ,true) == '' ? 0 : $this->input->post('kondisi_kosong' ,true),
			    'kondisi_keterangan' => $this->input->post('kondisi_keterangan' ,true) == '' ? 0 : $this->input->post('kondisi_keterangan' ,true),
			    'kepemilikan_individu' => $this->input->post('kepemilikan_individu' ,true) == '' ? 0 : $this->input->post('kepemilikan_individu' ,true),
			    'kepemilikan_komunal' => $this->input->post('kepemilikan_komunal' ,true) == '' ? 0 : $this->input->post('kepemilikan_komunal' ,true),
			    'kepemilikan_lainnya' => $this->input->post('kepemilikan_lainnya' ,true) == '' ? 0 : $this->input->post('kepemilikan_lainnya' ,true),
			    'sarana_prasarana' => $this->input->post('sarana_prasarana' ,true) == '' ? 0 : $this->input->post('sarana_prasarana' ,true),
				];
		$where = ['jenis_prasarana' => $data['jenis_prasarana'],'kode_desa_kelurahan' => $data['kode_desa_kelurahan'] ];
		$cekDuplicate = $this->global->get_by_arr('dt_fasilitasi_infrastruktur',$where);
		$id = $this->input->post('id',true);
		if(!empty($cekDuplicate) && $id=='' ){
			echo json_encode(['sts' => 'fail','msg' => 'Jenis Prasarana dan Sarana Sudah ada!']);
			exit();
		}

		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('dt_fasilitasi_infrastruktur', $data);
		}else{
			$ins =  $this->db->insert('dt_fasilitasi_infrastruktur', $data);

		}
		if ($ins) {
			
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}

	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('dt_fasilitasi_infrastruktur');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

	public function getKab($kode='')
	{
		$data=$this->fasilitasi_infrastruktur->getKab($kode);
		// $data['kec']=$this->fasilitasi_infrastruktur->getKec(1104);
		// $data['desa']=$this->fasilitasi_infrastruktur->getDesa(110407);
		$str='<option value="">-- Pilih Kabupaten/Kota --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
			}
		}

		echo json_encode($str);
	}
	public function getKec($kode='')
	{
		$data=$this->fasilitasi_infrastruktur->getKec($kode);
		$str='<option value="">-- Pilih Kecamatan --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option value="'.$value->kode.'">'.$value->nama_kecamatan.'</option>';
			}
		}

		echo json_encode($str);
	}

	public function getKel($kode='')
	{
		$data=$this->fasilitasi_infrastruktur->getKel($kode);
		$str='<option value="">-- Pilih Desa/Kelurahan --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->jumlah.'">'.$value->nama_desa_kelurahan.'</option>';
			}
		}

		echo json_encode($str);
	}


}


/* End of file fasilitasi_infrastruktur.php */
/* Location: ./application/controllers/fasilitasi_infrastruktur.php */