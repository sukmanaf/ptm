<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitasi_akses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('fasilitasAksesModel','fasilitasi_akses');
	}

	public function index()
	{
		$data['title'] = 'Home - Master Data - Admin Pusat - Fasilitas Akses Pemasaran';
		$this->skin->view('fasilitasi_akses/index',$data);
	}
	public function get_all()
	{

		$get=$this->global->get_all('v_fasilitasi_akses');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,$value->nama_provinsi,$value->nama_kab_kota,$value->nama_kecamatan,$value->nama_desa_kelurahan,
				'<a type="button" href="'.base_url('fasilitasi_akses/edit/').$value->kode_kel.'" class="btn btn-success"><i class="fas fa-plus"></i></a>'


			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}
	public function get_detail($id)
	{
		$get = $this->fasilitasi_akses->get_detail($id);

		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";
		foreach ($get as $key => $value) {
			$keuangan = $value->keuangan == 'lainnya' ? $value->keuangan_lainnya : $value->keuangan;
			$sdm = $value->sdm == 'lainnya' ? $value->sdm_lainnya : $value->sdm;
			$produksi = $value->produksi == 'lainnya' ? $value->produksi_lainnya : $value->produksi;
			$inovasitekno = $value->inovasitekno == 'lainnya' ? $value->inovasitekno_lainnya : $value->inovasitekno;
			$komersialisasi = $value->komersialisasi == 'lainnya' ? $value->komersialisasi_lainnya : $value->komersialisasi;
			$pengembangan_akses_pemasaran = $value->pengembangan_akses_pemasaran != 1 ? 'Offline' : 'Online';
			$a = [
				$key+1,$value->nik,$value->nama_responden_utama,$keuangan,$sdm,$produksi,$inovasitekno,$komersialisasi,
					'<button type="button" id="edit" onclick="editS('.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function get_edit($id='')
	{
		$data = $this->global->get_by_one('dt_fasilitasi_akses_pemasaran',$id,'id');
		echo json_encode($data);
		
	}

	public function add()
	{

		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		
		$data['title']= 'Home - Master Data - Admin Pusat - Fasilitas Akses Pemasaran - Baru';
		$this->skin->view('fasilitasi_akses/add',$data);
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
					'pengembangan_akses_pemasaran'	=> $this->input->post('pengembangan_akses_pemasaran',true),
					'kendala'	=> $this->input->post('kendala',true),				];
		$ins =  $this->db->insert('tes_data', $data);
		if ($ins) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}

	}

	public function edit($id='')
	{
		$data['id'] = $id;
		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Master Data - Admin Pusat - Fasilitas Akses Pemasaran - Edit';
		$data['data'] = $this->global->get_by_one('tes_data',$id,'id');
		$this->skin->view('fasilitasi_akses/edit',$data);

	}

	public function update()
	{
		$nik = $this->input->post('nik',true);
		$id = $this->input->post('id',true);
		$luas_tanah = $this->input->post('luas_tanah',true) == '' ? 0:$this->input->post('luas_tanah',true);
		$kapasitas = $this->input->post('kapasitas',true) == '' ? 0:$this->input->post('kapasitas',true);
		$data = [
					'nik'	=> $nik,
					'kode_desa_kelurahan' 	=> $this->input->post('kode_desa_kelurahan',true),
					'keuangan'	=> $this->input->post('keuangan',true),
					'keuangan_lainnya'	=> $this->input->post('keuangan_text',true),
					'sdm'	=> $this->input->post('sdm',true),
					'sdm_lainnya'	=> $this->input->post('sdm_text',true),
					'produksi'	=> $this->input->post('produksi',true),
					'produksi_lainnya'	=> $this->input->post('produksi_text',true),
					'inovasitekno'	=> $this->input->post('inovasitekno',true),
					'inovasitekno_lainnya'	=> $this->input->post('inovasitekno_text',true),
					'komersialisasi'	=> $this->input->post('komersialisasi',true),
					'komersialisasi_lainnya'	=> $this->input->post('komersialisasi_text',true),
					'pengembangan_akses_pemasaran'	=> $this->input->post('p_akses_pemasaran',true)
				];
	
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('dt_fasilitasi_akses_pemasaran', $data);
		}else{
			$ins =  $this->db->insert('dt_fasilitasi_akses_pemasaran', $data);

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
		$del = $this->db->delete('dt_fasilitasi_akses_pemasaran');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}


    public function detailNik($nik="")
    {
		$keanggotaan = $this->global->get_by_one('wa_anggota_kelompok_usaha',$nik,'nik') == ''?'Tidak Ada': $this->global->get_by_one('wa_anggota_kelompok_usaha',$nik,'nik');
		$kelompok = $this->pengembangan->getSektorUsaha($nik) == '' ? 'Tidak Ada' : $this->pengembangan->getSektorUsaha($nik)['nama_kelompok_usaha'];
		$sektor_usaha = $this->pengembangan->getSektorUsaha($nik) == '' ? 'Tidak Ada' : $this->pengembangan->getSektorUsaha($nik)['deskripsi'];
		$luas = $this->global->get_by_one('wa_kuesioner_th',$nik,'nik') == '' ? '0' :$this->global->get_by_one('wa_kuesioner_th',$nik,'nik')['luas_tanah_sertipikat_terdaftar'];

    	echo json_encode([
    				'res' =>'success',
    				'keanggotaan' => $keanggotaan,
    				'kelompok' => $kelompok,
    				'sektor_usaha' => $sektor_usaha,
    				'luas' => $luas,
    			]);
    }
}


/* End of file fasilitasi_akses.php */
/* Location: ./application/controllers/Pengembangan.php */