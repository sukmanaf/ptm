<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_penetapan_model extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('detailPenetapanModelModel','penetapan_model');
	}

	public function index()
	{
		return false;
	}

	public function data($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - penetapan_model - Desa';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$this->skin->view('detail_penetapan_model/index',$data);
	}

	public function get_all($id)
	{
		$get=$this->penetapan_model->getData($id);
		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->nama_kab_kota,@$value->nama_kecamatan,@$value->nama_desa_kelurahan,@$value->jumlah,@$value->target_batas_waktu_penyelesaian,
				'<a type="button" href="'.base_url('detail_penetapan_model/add/').$id.'/'.$value->id.'" class="btn btn-success"><i class="fas fa-plus"></i></a>'.
				'<a type="button" href="'.base_url('detail_penetapan_model/list_pemberdayaan/').$id.'/'.$value->id.'" class="btn btn-primary"><i class="fas fa-search"></i></a>'
				// '<a type="button"  style="display:inline" href="'.base_url('penetapan_model/upload/').$value->id.'" class="btn btn-success"><i class="fas fa-edit" ></i></a>'
				// '<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add($id,$id_targetkk_desa)
	{
		$data['id']=$id;
		$data['id_targetkk_desa']=$id_targetkk_desa;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - penetapan_model - Desa - Baru';
		$data['jnsPemberdayaan'] = $this->penetapan_model->getJnsPemberdayaan();
		$data['addPemberdayaan'] = $this->load->view('detail_penetapan_model/append',$data,true);
		$data['data'] = $this->global->get_by_one('v_kuesioner_re',$id_targetkk_desa,'id_targetkk_desa');
		$data['targetKK'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		// echo "<pre>";
		// print_r ($data['data']);
		// echo "</pre>";exit();
		$this->skin->view('detail_penetapan_model/add',$data);
	}

	public function create()
	{

		$data=[];
		$id_jenis_pemberdayaan = $this->input->post('id_jenis_pemberdayaan',true);
		$jumlah_subjek = $this->input->post('jumlah_subjek',true);
		$targetkk = $this->input->post('id_targetkk_desa',true);

		$cekDup = $this->penetapan_model->cekDup($targetkk);
		
		foreach ($id_jenis_pemberdayaan as $key => $value) {
			if (in_array($id_jenis_pemberdayaan[$key], $cekDup)) {
				echo json_encode(['sts' => 'fail','message' => 'Model Penetapan Sudah Ada!']);
				exit();
			}
			$a = [
					'tahun_anggaran' => $this->input->post('tahun_anggaran',true),
				    'kode_provinsi' => $this->input->post('kode_provinsi',true),
				    'kode_kab_kota' => $this->input->post('kode_kab_kota',true),
				    'kode_kecamatan' => $this->input->post('kode_kecamatan',true),
				    'kode_desa_kelurahan' => $this->input->post('kode_desa_kelurahan',true),
				    'id_targetkk_desa' => $this->input->post('id_targetkk_desa',true),
				    'id_jenis_pemberdayaan' => $id_jenis_pemberdayaan[$key],
				    'jumlah_subjek' => $jumlah_subjek[$key],
				];
				array_push($data,$a);
		}

		$ins =  $this->db->insert_batch('wa_model_pemberdayaan', $data);
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id_target,$id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - penetapan_model - Desa - Edit';
		$data['datakab'] = $this->penetapan_model->getDataKab($id_target);
		$data['datakab']['kuota_terpakai'] = $this->penetapan_model->getKuota($id_target);

		$data['data'] = $this->global->get_by_one('wa_targetkk_desa',$id,'id');
		$data['kec'] = $this->penetapan_model->getKec($data['datakab']['kode_kab_kota']);
		$data['data']['nama_kecamatan'] = $this->penetapan_model->getNamaKec($data['data']['kode_desa_kelurahan'])['nama_kecamatan'];
		$data['data']['kode_kecamatan'] = $this->penetapan_model->getNamaKec($data['data']['kode_desa_kelurahan'])['kode_kecamatan'];
		$this->skin->view('detail_penetapan_model/edit',$data);

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
		$data=$this->penetapan_model->getKel($kode);
		$str='<option  value="">-- Pilih Desa/Kelurahan --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->kode.'">'.$value->nama_desa_kelurahan.'</option>';
			}
		}
		echo json_encode($str);
	}

	public function getAppend($num='')
	{
		$data['num'] = $num;
		$data['jnsPemberdayaan'] = $this->penetapan_model->getJnsPemberdayaan();
		$data['addPemberdayaan'] = $this->load->view('detail_penetapan_model/append',$data,true);

		echo json_encode($data);
	}

	// ================
	public function list_pemberdayaan($id='',$id_targetkk_desa='')
	{
		$data['id']=$id;
		$data['id_targetkk_desa']=$id_targetkk_desa;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - penetapan_model - Desa';
		$data['data'] = $this->global->get_by_result('v_model_pemberdayaan',$id_targetkk_desa,'id_targetkk_desa');
		$data['targetKK'] = $this->global->get_by_one('v_kuesioner_re',$id_targetkk_desa,'id_targetkk_desa');

		$this->skin->view('detail_penetapan_model/list_pemberdayaan',$data);
	}
	public function list_anggota_pemberdayaan($id='',$id_targetkk_desa='')
	{
		$data['id']=$id;
		$data['id_targetkk_desa']=$id_targetkk_desa;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - penetapan_model - Desa';
		$data['data'] = $this->global->get_by_one('v_model_pemberdayaan',$id,'id');
		$data['responden'] = $this->penetapan_model->getResponden($id_targetkk_desa);

		$data['targetKK'] = $this->global->get_by_one('v_kuesioner_re',$id_targetkk_desa,'id_targetkk_desa');

		$this->skin->view('detail_penetapan_model/list_anggota_pemberdayaan',$data);
	}

	public function get_list_pemberdayaan($id)
	{
		$get = $this->global->get_by_result('v_model_pemberdayaan',$id,'id_targetkk_desa');
		$data = [];

		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->jenis_pemberdayaan,@$value->jumlah_target,@$value->jumlah_subjek,
				'<a type="button" href="'.base_url('detail_penetapan_model/list_anggota_pemberdayaan/').$value->id.'/'.$value->id_targetkk_desa.'" class="btn btn-success"><i class="fas fa-plus"></i></a>'
				// '<a type="button" href="'.base_url('detail_penetapan_model/list_pemberdayaan/').$id.'/'.$value->id.'" class="btn btn-primary"><i class="fas fa-search"></i></a>'
				// '<a type="button"  style="display:inline" href="'.base_url('penetapan_model/upload/').$value->id.'" class="btn btn-success"><i class="fas fa-edit" ></i></a>'
				// '<button type="button" id="angggota" onclick="anggota('.$value->id.')" class="btn btn-primary"><i class="fas fa-person"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function get_list_anggota_pemberdayaan($id)
	{
		$get = $this->global->get_by_result('v_anggota_model_pemberdayaan',$id,'id_model_pemberdayaan');
		$data = [];

		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->nik,@$value->nama_responden_utama,
				// '<a type="button" href="'.base_url('detail_penetapan_model/list_anggota_pemberdayaan/').$value->id.'/'.$value->id_targetkk_desa.'" class="btn btn-danger"><i class="fas fa-trash"></i></a>'
				// '<a type="button" href="'.base_url('detail_penetapan_model/list_pemberdayaan/').$id.'/'.$value->id.'" class="btn btn-primary"><i class="fas fa-search"></i></a>'
				// '<a type="button"  style="display:inline" href="'.base_url('penetapan_model/upload/').$value->id.'" class="btn btn-success"><i class="fas fa-edit" ></i></a>'
				'<button type="button" id="angggota" onclick="del('.$value->id.')" class="btn btn-danger"><i class="fas fa-trash"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function create_anggota()
	{
		$nik	= $this->input->post('nik',true);
		$checkNik = $this->penetapan_model->cekNik($nik);
		// $checkJmlAng = $this->penetapan_model->cekJmlAng($nik);
		$id = $this->input->post('id',true);
		$target_kk = $this->input->post('target_kk',true);

		if ($checkNik > 0) {
			echo json_encode(['sts' => 'fail','message' => 'Nama Sudah Terdaftar!']);
			exit();
		}
		$jmlNik = $this->global->get_by_result('v_anggota_model_pemberdayaan',$id,'id_model_pemberdayaan');
		if (count($jmlNik) >= $target_kk) {
			echo json_encode(['sts' => 'fail','message' => 'Jumlah Anggota Penuh!']);
			exit();
		}
		
		$data = [
					'nik'	=> $this->input->post('nik',true),
					'id_targetkk_desa' => $this->input->post('id_targetkk_desa',true),
					'id_model_pemberdayaan' => $this->input->post('id',true),
					
				];


		$ins =  $this->db->insert('wa_model_pemberdayaan_daftar_subjek', $data);
		$id = $this->db->insert_id();
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

		public function delete_anggota($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('wa_model_pemberdayaan_daftar_subjek');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}
}

/* End of file Detail_penetapan_model.php */
/* Location: ./application/controllers/Detail_penetapan_model.php */