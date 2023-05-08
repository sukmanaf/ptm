<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_koperasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - Masterdata - Admin Daerah - Master Koperasi';
		$this->skin->view('Master_koperasi/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('ms_koperasi');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->nama_koperasi,@$value->no_badan_hukum,
				'<a type="button" href="'.base_url('master_koperasi/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
				
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add()
	{
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		$prov = $this->session->userdata('login')['kode_provinsi'];
		if ($role == 7 || $role == 5) {
			$this->db->where('kode', $prov);
			$data['provinsi']=$this->db->get('ms_provinsi')->result();
		}else{
			$data['provinsi']=$this->db->get('ms_provinsi')->result();
		}
		if ($role == 7 || $role == 5) {
			$this->db->where('kode', $kabkot);
			$data['kab_kota']=$this->db->get('ms_kab_kota')->result();
		}else{
			$data['kab_kota']=[];
		}

		//$data['sektor_usaha']=$this->db->get('ms_kuesioner_re10a')->result();
		$data['title']= 'Home - Masterdata - Admin Daerah - Master Koperasi - Baru';
		$this->skin->view('master_koperasi/add',$data);
	}

	public function create()
	{
			

		$sess = $this->session->userdata('login');
			
		$data = [
					'nik'	=> $this->input->post('nik',true),
					'no_badan_hukum'	=> $this->input->post('no_badan_hukum',true),
					'sertifikat'	=> $this->input->post('sertifikat',true),
					'nama_koperasi'	=> $this->input->post('nama_koperasi',true),
					'kode_provinsi'	=> $this->input->post('provinsi',true),
					'kode_kab_kota'	=> $this->input->post('kabupaten',true),
					'alamat_koperasi'	=> $this->input->post('alamat',true),
					'deskripsi'	=> $this->input->post('deskripsi',true),
					'jenis_koperasi'	=> $this->input->post('jenis_koperasi',true),					
					'tanggal_badan_hukum'	=> $this->input->post('tanggal_badan_hukum',true),
					//'status'	=> $this->input->post('status',true),
					'created_on'	=> date('Y-m-d H:i:s'),
					'created_by'	=> $sess['username'],
					'updated_on'	=> date('Y-m-d H:i:s'),
					'updated_by'	=> $sess['username']
					
				];

		
		
		$ins =  $this->db->insert('ms_koperasi', $data);
		$id = $this->db->insert_id();
		if ($ins) {
			

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}




	public function edit($id='')
	{
		$data['id'] = $id;
		$role = $this->session->userdata('login')['role_user'];
		$data['data'] = $this->global->get_by_one('ms_koperasi',$id,'id');
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		$prov = $this->session->userdata('login')['kode_provinsi'];
		if ($role == 7 || $role == 5) {
			$this->db->where('kode', $prov);
			$data['provinsi']=$this->db->get('ms_provinsi')->result();
		}else{
			$data['provinsi']=$this->db->get('ms_provinsi')->result();
		}
		if ($role == 7 || $role == 5) {
			$this->db->where('kode', $kabkot);
			$data['kab_kota']=$this->db->get('ms_kab_kota')->result();
		}else{
			$data['kab_kota']=$this->db->get('ms_kab_kota')->result();
		}
		$data['title']= 'Home - Masterdata - Admin Daerah - Master Keoperasi - Edit';
		$data['data'] = $this->global->get_by_one('ms_koperasi',$id,'id');
		
		$this->skin->view('master_koperasi/edit',$data);

	}

	public function update()
	{
		
		$id = $this->input->post('id',true);
		$sess = $this->session->userdata('login');
			
		$data = [
					'nik'	=> $this->input->post('nik',true),
					'no_badan_hukum'	=> $this->input->post('no_badan_hukum',true),
					'sertifikat'	=> $this->input->post('sertifikat',true),
					'nama_koperasi'	=> $this->input->post('nama_koperasi',true),
					'kode_provinsi'	=> $this->input->post('provinsi',true),
					'kode_kab_kota'	=> $this->input->post('kabupaten',true),
					'alamat_koperasi'	=> $this->input->post('alamat_koperasi',true),
					'deskripsi'	=> $this->input->post('deskripsi',true),
					'jenis_koperasi'	=> $this->input->post('jenis_koperasi',true),					
					'tanggal_badan_hukum'	=> $this->input->post('tanggal_badan_hukum',true),
					'updated_on'	=> date('Y-m-d H:i:s')
				];
				
		//echo $id;
		//if ($id) {
		//	die('bisa');
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_koperasi', $data);
		// }else{
		// 	die('eror2');
		// 	$ins =  $this->db->insert('ms_koperasi', $data);

		// }
		if ($ins) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal Disimpan!']);
		}
	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('ms_koperasi');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

	public function getKab($kode='')
	{
		$data=$this->global->get_by_result('ms_kab_kota',$kode,'kode_provinsi');
		$str='<option value="">-- Pilih Kabupaten/Kota --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
			}
		}

		echo json_encode($str);
	}
}

/* End of file Master_koperasi.php */
/* Location: ./application/controllers/Master_koperasi.php */