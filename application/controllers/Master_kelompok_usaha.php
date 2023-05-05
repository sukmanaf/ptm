<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kelompok_usaha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - Masterdata - Admin Daerah - Master Kelompok Usaha';
		$this->skin->view('Master_kelompok_usaha/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('v_dt_ms_kelompok_usaha');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->no_induk_kelompok,@$value->nama_kelompok,@tanggal_indonesia($value->tgl_bentuk_kelompok),@$value->no_sk,
				'<a type="button" target="_blank" href="'.base_url().$value->file_upload_sk.'" class="btn btn-warning"><i class="fas fa-eye"></i></a>',
				'<a type="button" href="'.base_url('master_kelompok_usaha/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
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

		$data['sektor_usaha']=$this->db->get('ms_kuesioner_re10a')->result();
		$data['title']= 'Home - Masterdata - Admin Daerah - Master Kelompok Usaha - Baru';
		$this->skin->view('master_kelompok_usaha/add',$data);
	}

	public function create()
	{
		if ($_FILES['file_upload_sk']['name']) {
        		// check type fle upload
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['file_upload_sk']['tmp_name']);

				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	
		}	

		$sess = $this->session->userdata('login');
			
		$data = [
					'no_induk_kelompok'	=> $this->input->post('no_induk_kelompok',true),
					'nama_kelompok'	=> $this->input->post('nama_kelompok',true),
					'sektor_usaha'	=> $this->input->post('sektor_usaha',true),
					'alamat'	=> $this->input->post('alamat',true),
					'kat_kel_usaha'	=> $this->input->post('kat_kel_usaha',true),
					'alamat'	=> $this->input->post('alamat',true),
					'tgl_bentuk_kelompok'	=> $this->input->post('tgl_bentuk_kelompok',true),
					'no_sk'	=> $this->input->post('no_sk',true),
					'provinsi'	=> $this->input->post('provinsi',true),
					'kabupaten'	=> $this->input->post('kabupaten',true),
					'thn_berdiri'	=> $this->input->post('thn_berdiri',true),
					'status'	=> $this->input->post('status',true),
					'created_by'	=> $sess['username'],
					'updated_by'	=> $sess['username'],



				];

		
		
		$ins =  $this->db->insert('ms_kelompok_usaha', $data);
		$id = $this->db->insert_id();

		if ($ins) {
			
			$this->do_upload($id);
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	 public function do_upload($id)
        {

			$ext = pathinfo($_FILES['file_upload_sk']['name'], PATHINFO_EXTENSION);
			$name = $id.'_file_upload_'.date('Ymdhis').'.'.$ext;

            if ($_FILES['file_upload_sk']['name']) {
            	// die('masuk');
        		// check type fle upload
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['file_upload_sk']['tmp_name']);

				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	


    		
				

    			// $_FILES['files']['name'] = $name;

                $config['upload_path']          = './uploads/kelompok_usaha/';
                $config['allowed_types']        = 'pdf|jpeg|jpg|png';
                $config['file_name']			= $name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file_upload_sk'))
                {
                	                        $error = array('error' => $this->upload->display_errors());

					 echo  json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error]);
                	                       ;
                }
                else
                {
                	
                	$data = [
	                    			'file_upload_sk' => 'uploads/kelompok_usaha/'.$this->upload->data()['file_name'],
	                			];
    	
	                	$this->db->where('id', $id);
    					$this->db->update('ms_kelompok_usaha', $data);
    					return true;
                }
        	}else{
					// echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);
        	}
        	
        }


	public function edit($id='')
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
			$data['kab_kota']=$this->db->get('ms_kab_kota')->result();
		}
		$data['title']= 'Home - Masterdata - Admin Daerah - Master Kelompok Usaha - Edit';
		$data['data'] = $this->global->get_by_one('ms_kelompok_usaha',$id,'id');
		$data['sektor_usaha']=$this->db->get('ms_kuesioner_re10a')->result();

		$this->skin->view('master_kelompok_usaha/edit',$data);

	}

	public function update()
	{
		$id = $this->input->post('id',true);
		if ($_FILES['file_upload_sk']['name']) {
        		// check type fle upload
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['file_upload_sk']['tmp_name']);

				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	
		}	

		$sess = $this->session->userdata('login');
			
		$data = [
					'no_induk_kelompok'	=> $this->input->post('no_induk_kelompok',true),
					'nama_kelompok'	=> $this->input->post('nama_kelompok',true),
					'sektor_usaha'	=> $this->input->post('sektor_usaha',true),
					'alamat'	=> $this->input->post('alamat',true),
					'kat_kel_usaha'	=> $this->input->post('kat_kel_usaha',true),
					'alamat'	=> $this->input->post('alamat',true),
					'tgl_bentuk_kelompok'	=> $this->input->post('tgl_bentuk_kelompok',true),
					'no_sk'	=> $this->input->post('no_sk',true),
					'provinsi'	=> $this->input->post('provinsi',true),
					'kabupaten'	=> $this->input->post('kabupaten',true),
					'thn_berdiri'	=> $this->input->post('thn_berdiri',true),
					'status'	=> $this->input->post('status',true),
					'updated_by'	=> $sess['username'],
					'updated_on'	=> date('Y-m-d H:i:s')
				];
				
		
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_kelompok_usaha', $data);
		}else{
			$ins =  $this->db->insert('ms_kelompok_usaha', $data);

		}
		if ($ins) {
			$this->do_upload($id);
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}
	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('ms_kelompok_usaha');
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
	public function getKabSelect($kodeProv='',$kodeKab='')
	{
		$data=$this->global->get_by_result('ms_kab_kota',$kodeProv,'kode_provinsi');
		$str='<option value="">-- Pilih Kabupaten/Kota --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				if ($value->kode == $kodeKab) {
						$str.='<option selected value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
				}else{
						$str.='<option value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
				}
			}
		}

		echo json_encode($str);
	}
}

/* End of file Master_kelompok_usaha.php */
/* Location: ./application/controllers/Master_kelompok_usaha.php */