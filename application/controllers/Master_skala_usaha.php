<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_skala_usaha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - MAsterdata - Admin Pusat - Master Skala Usaha';
		$this->skin->view('Master_skala_usaha/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('ms_skala_usaha');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->jenis_usaha,@$value->kecil,@$value->menengah,@$value->besar,
				'<a type="button" href="'.base_url('master_skala_usaha/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
				
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Baru';
		$this->skin->view('master_skala_usaha/add',$data);
	}

	public function create()
	{
	
		$data = [
					'jenis_usaha'	=> $this->input->post('jenis_usaha',true),
					'kecil'	=> $this->input->post('kecil',true),
					'menengah'	=> $this->input->post('menengah',true),
					'besar'	=> $this->input->post('besar',true),
				];

		$ins =  $this->db->insert('ms_skala_usaha', $data);
		if ($ins) {
			

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['title']= 'Home - Master Data - Admin Pusat - master_skala_usaha - Baru';
		$data['data'] = $this->global->get_by_one('ms_skala_usaha',$id,'id');
		$this->skin->view('master_skala_usaha/edit',$data);

	}

	public function update()
	{
		$id = $this->input->post('id',true);
		$data = [
					'jenis_usaha'	=> $this->input->post('jenis_usaha',true),
					'kecil'	=> $this->input->post('kecil',true),
					'menengah'	=> $this->input->post('menengah',true),
					'besar'	=> $this->input->post('besar',true),
				];
		
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_skala_usaha', $data);
		}else{
			$ins =  $this->db->insert('ms_skala_usaha', $data);

		}
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('ms_skala_usaha');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

}

/* End of file Master_skala_usaha.php */
/* Location: ./application/controllers/Master_skala_usaha.php */