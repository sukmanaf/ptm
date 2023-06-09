<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_skala_peternakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - Masterdata - Admin Pusat - Master Skala Peternakan';
		$this->skin->view('Master_skala_peternakan/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('ms_skala_peternakan');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->jenis_usaha,@$value->mikro,@$value->kecil,@$value->menengah,@$value->keterangan,
				'<a type="button" href="'.base_url('master_skala_peternakan/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
				
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Masterdata - Admin Pusat - Master Skala Peternakan - Baru';
		$this->skin->view('master_skala_peternakan/add',$data);
	}

	public function create()
	{
	
		$data = [
					'jenis_usaha'	=> $this->input->post('jenis_usaha',true),
					'mikro'	=> $this->input->post('mikro',true),
					'kecil'	=> $this->input->post('kecil',true),
					'menengah'	=> $this->input->post('menengah',true),
					'keterangan'	=> $this->input->post('keterangan',true),
				];

		$ins =  $this->db->insert('ms_skala_peternakan', $data);
		if ($ins) {
			

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['title']= 'Home - Masterdata - Admin Pusat - Master Skala Perikanan - Baru';
		$data['data'] = $this->global->get_by_one('ms_skala_peternakan',$id,'id');
		$this->skin->view('master_skala_peternakan/edit',$data);

	}

	public function update()
	{
		$id = $this->input->post('id',true);
		$data = [
					'jenis_usaha'	=> $this->input->post('jenis_usaha',true),
					'mikro'	=> $this->input->post('mikro',true),
					'kecil'	=> $this->input->post('kecil',true),
					'menengah'	=> $this->input->post('menengah',true),
					'keterangan'	=> $this->input->post('keterangan',true),
				];
		
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_skala_peternakan', $data);
		}else{
			$ins =  $this->db->insert('ms_skala_peternakan', $data);

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
		$del = $this->db->delete('ms_skala_peternakan');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

}

/* End of file Master_skala_peternakan.php */
/* Location: ./application/controllers/Master_skala_peternakan.php */