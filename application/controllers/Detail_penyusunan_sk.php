<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_penyusunan_sk extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('detailPenyusunanSkModel','penyusunan');
	}

	public function index()
	{
		return false;
	}

	public function data($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Penyuluhan - Desa';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$this->skin->view('detail_penyusunan_sk/index',$data);
	}

	public function get_all($id)
	{
		$get=$this->penyusunan->getData($id);
		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->nama_kab_kota,@$value->nama_kecamatan,@$value->nama_desa_kelurahan,@$value->jumlah,@$value->target_batas_waktu_penyelesaian,''
				// // '<a type="button" href="'.base_url('detail_penyusunan_sk/edit/').$id.'/'.$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
				// '<a type="button"  style="display:inline" href="'.base_url('penyuluhan/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-upload" ></i></a>'
				// '<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add($id)
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Penyuluhan - Desa - Baru';
		$data['data'] = $this->penyusunan->getDataKab($id);
		$data['data']['kuota_terpakai'] = $this->penyusunan->getKuota($id);
		$data['kec'] = $this->penyusunan->getKec($data['data']['kode_kab_kota']);

		$this->skin->view('detail_penyusunan_sk/add',$data);
	}

	public function create()
	{
		
		$kd_desa = $this->input->post('kode_desa_kelurahan',true);
		$jml = $this->input->post('jumlah',true);
		$sisa = $this->input->post('sisa',true);
		
		$check = $this->penyusunan->cekDesaKel($kd_desa);

		if ($check > 0) {
			echo json_encode(['sts' => 'fail','message' => 'Desa Kelurahan Sudah ada!']);
			exit();
		}
		if ($jml > $sisa) {
			echo json_encode(['sts' => 'fail','message' => 'Jumlah Target KK tidak Bisa Melebihi Sisa Kuota!']);
			exit();
		}

		$data = [

					'targetkk_id'	=> $this->input->post('targetkk_id',true),
					'kode_desa_kelurahan'	=> $this->input->post('kode_desa_kelurahan',true),
					'jumlah' => $this->input->post('jumlah',true),
					'target_batas_waktu_penyelesaian' => $this->input->post('target_batas_waktu_penyelesaian',true) == '' ? null : $this->input->post('target_batas_waktu_penyelesaian',true),
				];

		$ins =  $this->db->insert('wa_targetkk_desa', $data);
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id_target,$id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Penyuluhan - Desa - Edit';
		$data['datakab'] = $this->penyusunan->getDataKab($id_target);
		$data['datakab']['kuota_terpakai'] = $this->penyusunan->getKuota($id_target);

		$data['data'] = $this->global->get_by_one('wa_targetkk_desa',$id,'id');
		$data['kec'] = $this->penyusunan->getKec($data['datakab']['kode_kab_kota']);
		$data['data']['nama_kecamatan'] = $this->penyusunan->getNamaKec($data['data']['kode_desa_kelurahan'])['nama_kecamatan'];
		$data['data']['kode_kecamatan'] = $this->penyusunan->getNamaKec($data['data']['kode_desa_kelurahan'])['kode_kecamatan'];
		$this->skin->view('detail_penyusunan_sk/edit',$data);

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
			$ins =  $this->db->update('wa_targetkk_desa', $data);
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}


	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('wa_targetkk_desa');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

		public function getKel($kode='')
	{
		$data=$this->penyusunan->getKel($kode);
		$str='<option  value="">-- Pilih Desa/Kelurahan --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->kode.'">'.$value->nama_desa_kelurahan.'</option>';
			}
		}
		echo json_encode($str);
	}
}

/* End of file Detail_penyusunan_sk.php */
/* Location: ./application/controllers/Detail_penyusunan_sk.php */