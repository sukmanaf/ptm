<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_penguatan_kelembagaan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('detailPenguatanKelembagaanModel','penguatan');
	}

	public function index()
	{
		return false;
	}

	public function data($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Kedua - Penguatan Kelembagaan - Desa';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$this->skin->view('detail_penguatan_kelembagaan/index',$data);
	}

	public function get_all($id)
	{
		$get=$this->penguatan->getData($id);
		$data = [];
		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->nama_kab_kota,@$value->nama_kecamatan,@$value->nama_desa_kelurahan,@$value->jumlah,@$value->target_batas_waktu_penyelesaian,
				 '<a type="button" href="'.base_url('detail_penguatan_kelembagaan/add/').$id.'/'.$value->id.'" class="btn btn-warning"><i class="fas fa-plus"></i></a>'.''
				// '<a type="button"  style="display:inline" href="'.base_url('penyuluhan/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-upload" ></i></a>'
				// '<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}
	public function get_anggota($id)
	{
		$get=$this->penguatan->getAnggota($id);
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		$data = [];
		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->nama_kelompok,@$value->nama_responden_utama,@$value->status_anggota,
				 // '<a type="button" href="'.base_url('detail_penguatan_kelembagaan/add/').$id.'/'.$value->id.'" class="btn btn-warning"><i class="fas fa-plus"></i></a>'.''
				// '<a type="button"  style="display:inline" href="'.base_url('penyuluhan/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-upload" ></i></a>'
				'<button type="button" id="del" onclick="edits('.$value->id.')" class="btn btn-success hapus"><i class="fas fa-edit"></i></button>'.
				'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add($id,$id_targetkk_desa)
	{

		$data['id']=$id;
		$data['id_targetkk_desa']=$id_targetkk_desa;
		$data['title']= 'Home - Entry Subject Object - Tahun Kedua - Penguatan Kelembagaan - Desa - Baru';
		$data['kelompok_usaha']=$this->penguatan->getKelompokUsaha($id_targetkk_desa);
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		$this->db->where('id_targetkk_desa', $id_targetkk_desa);
		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$this->skin->view('detail_penguatan_kelembagaan/add',$data);
	}

	public function create()
	{
		$id = $this->input->post('id',true);
		$data = [

					'id_kelompok_usaha'	=> $this->input->post('id_kelompok_usaha',true),
					'nik'	=> $this->input->post('nik',true),
					'status_anggota' => $this->input->post('status_anggota',true),
				];
			// echo "<pre>";
			// print_r ($data);
			// echo "</pre>";exit();
		if ($id) {
			$this->db->where('id', $id);
			$ins = $this->db->update('wa_kelompok_usaha', $data);
		}else{
			$nik = $this->input->post('nik',true);
			$checkNik = $this->penguatan->cekNik($nik);
			if ($checkNik > 0) {
				echo json_encode(['sts' => 'fail','message' => 'Nama Sudah Terdaftar!']);
				exit();
			}
			$ins =  $this->db->insert('wa_kelompok_usaha', $data);
		}
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id_target,$id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Kedua - Penguatan Kelembagaan - Desa - Edit';
		$data['datakab'] = $this->penguatan->getDataKab($id_target);
		$data['datakab']['kuota_terpakai'] = $this->penguatan->getKuota($id_target);

		$data['data'] = $this->global->get_by_one('wa_kelompok_usaha',$id,'id');
		$data['kec'] = $this->penguatan->getKec($data['datakab']['kode_kab_kota']);
		$data['data']['nama_kecamatan'] = $this->penguatan->getNamaKec($data['data']['kode_desa_kelurahan'])['nama_kecamatan'];
		$data['data']['kode_kecamatan'] = $this->penguatan->getNamaKec($data['data']['kode_desa_kelurahan'])['kode_kecamatan'];
		$this->skin->view('detail_penguatan_kelembagaan/edit',$data);

	}


	public function update()
	{
		
		$id = $this->input->post('id',true);
		$data = [
					
					'targetkk_id'	=> $this->input->post('targetkk_id',true),
					'kode_desa_kelurahan'	=> $this->input->post('kode_desa_kelurahan',true),
					'jumlah' => $this->input->post('jumlah',true),
					'target_batas_waktu_penyelesaian' => $this->input->post('target_batas_waktu_penyelesaian',true) == '' ? null : $this->input->post('target_batas_waktu_penyelesaian',true),
				];
		
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_kelompok_usaha', $data);
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}


	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('wa_kelompok_usaha');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

		public function getKel($kode='')
	{
		$data=$this->penguatan->getKel($kode);
		$str='<option  value="">-- Pilih Desa/Kelurahan --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->kode.'">'.$value->nama_desa_kelurahan.'</option>';
			}
		}
		echo json_encode($str);
	}

	public function getDetailAnggota($id='')
	{
		$this->db->where('id', $id);
		echo json_encode($this->db->get('wa_kelompok_usaha')->row_array());
	}
}

/* End of file Detail_penguatan_kelembagaan.php */
/* Location: ./application/controllers/Detail_penguatan_kelembagaan.php */