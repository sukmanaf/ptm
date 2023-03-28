<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penlok_targetkk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('Penlok_targetkkModel','penetapan');
	}

	public function index()
	{
		$data['title'] = 'Home - Entry Subject Object - Tahun Pertama - Penetapan Lokasi dan Target KK';
		$this->skin->view('penlok_targetkk/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('v_dt_penlok_targetkk');
		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		foreach ($get as $key => $value) {
			
			$a = [
				$key+1,@$value->nip,@$value->nama_pejabat,@$value->nama_kab_kota,@$value->tahun,@$value->tanggal_sk1,
				'<a class="btn btn-success" targer="_blank" href="'.base_url('uploads/penlok_targetkk/').$value->file_foto_sk1.'"><i class="fa fa-file"></i></a>'
				,
				@$value->tanggal_sk2,
				'<a class="btn btn-success" targer="_blank" href="'.base_url('uploads/penlok_targetkk/').$value->file_foto_sk2.'"><i class="fa fa-file"></i></a>'
				,@$value->target_kk,@$value->target_kk,@$value->tanggal_upload,
					'<a type="button"  style="display:inline" href="'.base_url('penlok_targetkk/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-magnifying-glass" ></i></a>'.
				'<a type="button" href="'.base_url('penlok_targetkk/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function get_detail($id)
	{
		$get = $this->penetapan->get_detail($id);

		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,$value->nama_responden_utama,$value->keterangan,
					'<button type="button" id="edit" onclick="editS('.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function get_edit($id='')
	{
		$data = $this->global->get_by_one('dt_penetapan',$id,'id');
		echo json_encode($data);
		
	}

	public function add()
	{

		$data['prov']=$this->global->get_all('ms_provinsi');
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Baru';
		$this->skin->view('penlok_targetkk/add',$data);
	}

	public function create()
	{

		
	

		$data = [
					'nip'	=> $this->input->post('nip',true),
					'tahun' => $this->input->post('tahun',true),
					'tahun_anggaran' => $this->input->post('tahun_anggaran',true),
				    'kode_provinsi' => $this->input->post('kode_provinsi',true),
				    'kode_kab_kota' => $this->input->post('kode_kab_kota',true),
				    'nip' => $this->input->post('nip',true),
				    'nama_pejabat' => $this->input->post('nama_pejabat',true),
				    'target_kk' => $this->input->post('target_kk',true),
				    'no_sk1' => $this->input->post('no_sk1',true),
				    'tanggal_sk1' => $this->input->post('tanggal_sk1',true),
				    'tentang_sk1' => $this->input->post('tentang_sk1',true),
				    'file_foto_sk1' => $this->input->post('file_foto_sk1',true),
				    'no_sk2' => $this->input->post('no_sk2',true),
				    'tanggal_sk2' => $this->input->post('tanggal_sk2',true),
				    'tentang_sk2' => $this->input->post('tentang_sk2',true),
				    'file_foto_sk2' => $this->input->post('file_foto_sk2',true),
				    'tanggal_upload' => date('Y-m-d'),
				];

		$ins =  $this->db->insert('wa_targetkk', $data);
		$id = $this->db->insert_id();
		if ($ins) {
			foreach ($_FILES as $key => $value) {
	    		$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
	    		$name = $id.'sk'.str_replace('file_foto_sk','',$key).'.'.$ext;
	    		$_FILES[$key]['name']=$name;
			}
			$this->upload_sk1($id);
			$this->upload_sk2($id);
			// exit();
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['id']=$id;
		$data['prov']=$this->global->get_all('ms_provinsi');
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Edit';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$this->skin->view('penlok_targetkk/edit',$data);

	}


	public function update()
	{
		$id = $this->input->post('id',true);
		$data = [
					'nik'	=> $this->input->post('nik',true),
					'keterangan'	=> $this->input->post('keterangan',true),
					'kode_desa_kelurahan'	=> $this->input->post('kode_desa_kelurahan',true),
				];
		
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('dt_penetapan', $data);
		}else{
			$ins =  $this->db->insert('dt_penetapan', $data);

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
		$del = $this->db->delete('dt_penetapan');
		if ($del) {
			$this->db->where('file_id', $id);
			$data = $this->db->get('fl_penetapan')->result();

			foreach ($data as $key => $value) {
				unlink($value->dir_name);
			}
			$this->db->where('file_id', $id);
			$this->db->delete('fl_penetapan');
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

	public function upload_sk1($id)
        {

        		
        	if ($_FILES['file_foto_sk1']) {
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['file_foto_sk1']['tmp_name']);
				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	

				if (!empty($check) && $id == '') {
					echo json_encode(['sts' => 'fail', 'msg' => 'Jenis Lampiran Sudah Ada!']);
					exit();
				}
                $config['upload_path']          = './uploads/penlok_targetkk/';
                $config['allowed_types']        = 'pdf|jpeg|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file_foto_sk1'))
                {
     //            	$error = array('error' => $this->upload->display_errors());
					// echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error,'type' =>$filetype]);
					return false;
                }
                else
                {
                	$data = [
	                    			'file_foto_sk1' => $this->upload->data()['file_name'],
	                			];
	           
                	$this->db->where('id', $id);
					$this->db->update('wa_targetkk', $data);
    				return true; 
	         
                }
        	}
        }

	public function upload_sk2($id)
        {

        		
        	if ($_FILES['file_foto_sk2']) {
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['file_foto_sk2']['tmp_name']);
				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	
    			$ext = pathinfo($_FILES['file_foto_sk2']['name'], PATHINFO_EXTENSION);
    			$name = 'sk2'.'.'.$ext;
				if (!empty($check) && $id == '') {
					echo json_encode(['sts' => 'fail', 'msg' => 'Jenis Lampiran Sudah Ada!']);
					exit();
				}

    			// $_FILES['file_foto_sk2']['name'] = $name;
                $config['upload_path']          = './uploads/penlok_targetkk/';
                $config['allowed_types']        = 'pdf|jpeg|jpg|png';
                
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file_foto_sk2'))
                {
     //            	$error = array('error' => $this->upload->display_errors());
					// echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error,'type' =>$filetype]);
					return false;
                }
                else
                {
                	$data = [
	                    			'file_foto_sk2' => $this->upload->data()['file_name'],
	                			];
	           
                	$this->db->where('id', $id);
					$this->db->update('wa_targetkk', $data);
    				return true; 


                }
        	}
        }
}

/* End of file Penetapan_lokasi_target.php */
/* Location: ./application/controllers/Penetapan_lokasi_target.php */