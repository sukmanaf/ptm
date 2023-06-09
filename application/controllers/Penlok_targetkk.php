<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penlok_targetkk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('Penlok_targetkkModel','penlok');
	}

	public function index()
	{
		$data['title'] = 'Home - Entry Subject Object - Tahun Pertama - Penetapan Lokasi dan Target KK';
		$this->skin->view('penlok_targetkk/index',$data);
	}
	
	public function get_all()
	{
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		if ($role == 5) {
			$this->db->where('kode_kab_kota', $kabkot);
		}
		$get=$this->global->get_all('v_dt_penlok_targetkk');
		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->nama_provinsi,@$value->nama_kab_kota,@$value->tahun_anggaran,@$value->target_kk,rupiah($value->anggaran_penlok),rupiah($value->realisasi_penlok),

					'<div style="display:inline-flex">
					<a type="button"  style="display:inline" href="'.base_url('detail_penlok/data/').$value->id.'" class="btn btn-primary"><i class="fas fa-search" ></i></a>'.
					'<a type="button"  style="display:inline" href="'.base_url('penlok_targetkk/upload/').$value->id.'" class="btn btn-warning"><i class="fas fa-upload" ></i></a>'.
					'<a type="button" href="'.base_url('penlok_targetkk/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button></div>'
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
		$data = $this->global->get_by_one('wa_targetkk',$id,'id');
		echo json_encode($data);
		
	}

	public function add()
	{

		$data['prov']=$this->penlok->getProv();
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Penetapan Lokasi dan Target KK - Baru';
		$this->skin->view('penlok_targetkk/add',$data);
	}

	public function create()
	{
		// echo "<pre>";
		// print_r ($_POST);
		// echo "</pre>";exit();
		$thn_anggaran = $this->input->post('tahun_anggaran',true);
		$kd_kabkot = $this->input->post('kode_kab_kota',true);
		$nip = $this->input->post('nip',true);
		
		$checkWil = $this->penlok->cekWIlTahun($kd_kabkot,$thn_anggaran);

		if ($checkWil > 0) {

			echo json_encode(['sts' => 'fail','message' => 'kota/Kabupaten dan Tahun Anggran Sudah ada!']);
			exit();
		}

		if (strlen($nip) != 18) {
			echo json_encode(['sts' => 'fail','message' => 'Jumlah NIp Harus 18!']);
			exit();
		}

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
				    'tanggal_sk1' => $this->input->post('tanggal_sk1',true) == '' ? null : $this->input->post('tanggal_sk1',true),
				    'tentang_sk1' => $this->input->post('tentang_sk1',true),
				    'file_foto_sk1' => $this->input->post('file_foto_sk1',true),
				    'no_sk2' => $this->input->post('no_sk2',true),
				    'tanggal_sk2' => $this->input->post('tanggal_sk2',true) == '' ? null : $this->input->post('tanggal_sk2',true),
				    'tentang_sk2' => $this->input->post('tentang_sk2',true),
				    'file_foto_sk2' => $this->input->post('file_foto_sk2',true),
				    'tanggal_upload' => date('Y-m-d'),
				];


		$ins =  $this->db->insert('wa_targetkk', $data);
		$id = $this->db->insert_id();
		if ($ins) {
			$data =[
					'realisasi_penlok' => str_replace('.', '', $this->input->post('realisasi_anggaran',true))

					];
			$this->db->where('kode_kab_kota', $this->input->post('kode_kab_kota',true));
			$this->db->where('tahun_anggaran', $this->input->post('tahun_anggaran',true));
			$this->db->update('wa_realisasi_anggaran', $data);
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['id']=$id;
		$data['prov']=$this->penlok->getProv();
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Penetapan Lokasi dan Target KK - Edit';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$data['anggaran'] = $this->global->get_by_arr('wa_realisasi_anggaran',['kode_kab_kota' => $data['data']['kode_kab_kota'],'tahun_anggaran'  => $data['data']['tahun_anggaran']])[0];
		$this->skin->view('penlok_targetkk/edit',$data);

	}


	public function update()
	{
		
		$thn_anggaran = $this->input->post('tahun_anggaran',true);
		$kd_kabkot = $this->input->post('kode_kab_kota',true);
		$thn_anggaran_old = $this->input->post('tahun_anggaran_old',true);
		$kd_kabkot_old = $this->input->post('kode_kab_kota_old',true);
		$nip = $this->input->post('nip',true);
		
		if (($kd_kabkot != $kd_kabkot_old) && ($thn_anggaran != $thn_anggaran_old)) {
			$checkWil = $this->penlok->cekWIlTahun($kd_kabkot,$thn_anggaran);
			if ($checkWil > 0) {
				echo json_encode(['sts' => 'fail','message' => 'kota/Kabupaten dan Tahun Anggran Sudah ada!']);
				exit();
			}
		}

		if (strlen($nip) != 18) {
			echo json_encode(['sts' => 'fail','message' => 'Jumlah NIp Harus 18!']);
			exit();
		}

		$id = $this->input->post('id',true);
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
				    'no_sk2' => $this->input->post('no_sk2',true),
				    'tanggal_sk2' => $this->input->post('tanggal_sk2',true),
				    'tentang_sk2' => $this->input->post('tentang_sk2',true),
				    'tanggal_upload' => date('Y-m-d'),
				];
		
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_targetkk', $data);

		if ($ins) {
				$data =[
						'realisasi_penlok' => str_replace('.', '', $this->input->post('realisasi_anggaran',true))

						];
			$this->db->where('kode_kab_kota', $this->input->post('kode_kab_kota',true));
			$this->db->where('tahun_anggaran', $this->input->post('tahun_anggaran',true));
			$this->db->update('wa_realisasi_anggaran', $data);
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}


	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('wa_targetkk');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

	public function getKab($kode='')
	{
		$data=$this->penlok->getKab($kode);

		$str='<option data-tahun="" data-target="" value="">-- Pilih Kabupaten/Kota --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
			}
		}
		echo json_encode($str);
	}
	public function getKabEdit($kode='',$kab)
	{
		$data=$this->penlok->getKab($kode);

		$str='<option data-tahun="" data-target="" value="">-- Pilih Kabupaten/Kota --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				if ($value->kode == $kab) {
					$str.='<option selected value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
				}else{
					$str.='<option  value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
				}
			}
		}
		echo json_encode($str);
	}


	public function getYearAnggaran($kode='')
	{
		$data=$this->penlok->getYearAnggaran($kode);

		$str='<option data-anggaran="" data-target="" value="">-- Pilih Tahun --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option data-anggaran="'.$value->anggaran_penlok.'" data-target="'.$value->target_kk.'" value="'.$value->tahun_anggaran.'">'.$value->tahun_anggaran.'</option>';
			}
		}
		echo json_encode($str);
	}

	public function getYearAnggaranEdit($kode='',$tahun)
	{
		$data=$this->penlok->getYearAnggaran($kode);

		$str='<option data-anggaran="" data-target="" value="">-- Pilih Tahun --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				if ($value->tahun_anggaran == $tahun) {
					$str.='<option selected data-anggaran="'.$value->anggaran_penlok.'" data-target="'.$value->target_kk.'" value="'.$value->tahun_anggaran.'">'.$value->tahun_anggaran.'</option>';
				}else{
					$str.='<option data-anggaran="'.$value->anggaran_penlok.'" data-target="'.$value->target_kk.'" value="'.$value->tahun_anggaran.'">'.$value->tahun_anggaran.'</option>';
				}
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
                $foto = $this->global->get_by_one('wa_targetkk',$id,'id')['file_foto_sk1'];
                if (file_exists($config['upload_path'].$foto)) {
                	rename($config['upload_path'].$foto,$config['upload_path'].$foto.'_old');
				}
                if ( ! $this->upload->do_upload('file_foto_sk1'))
                {
     //            	$error = array('error' => $this->upload->display_errors());
					// echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error,'type' =>$filetype]);
                	rename($config['upload_path'].$foto.'_old',$config['upload_path'].$foto);
					return false;
                }
                else
                {
                	if (file_exists($config['upload_path'].$foto.'_old')) {

                		unlink($config['upload_path'].$foto.'_old');
                	}
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
                $foto = $this->global->get_by_one('wa_targetkk',$id,'id')['file_foto_sk2'];

                if (file_exists($config['upload_path'].$foto)) {
                	rename($config['upload_path'].$foto,$config['upload_path'].$foto.'_old');
				}
                if ( ! $this->upload->do_upload('file_foto_sk2'))
                {
     //            	$error = array('error' => $this->upload->display_errors());
					// echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error,'type' =>$filetype]);
					return false;
                }
                else
                {
                	if (file_exists($config['upload_path'].$foto.'_old')) {

                		unlink($config['upload_path'].$foto.'_old');
                	}
                	$data = [
	                    			'file_foto_sk2' => $this->upload->data()['file_name'],
	                			];
	           
                	$this->db->where('id', $id);
					$this->db->update('wa_targetkk', $data);
    				return true; 


                }
        	}
        }

    public function upload($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Penetapan Lokasi dan Target KK - Upload';
		$data['data'] = $this->global->get_by_one('dt_pengembangan_rencana_usaha',$id,'id');
		$this->skin->view('penlok_targetkk/upload',$data);

	}
	public function get_upload($id)
	{
		$get = $this->global->get_by_result('wa_targetkk_file',$id,'targetkk_id');

		$data = [];
		foreach ($get as $key => $value) {

			$a = [
				$key+1,$value->nama_sk,$value->no_sk,$value->tentang,tanggal_indonesia($value->tanggal_sk),tanggal_indonesia_jam($value->created),
					'<a target="_black" href="'.base_url().$value->dir_name.'" class="btn btn-warning"><i class="fas fa-eye"></i></a>'.
					// '<button type="button" id="edit" onclick="editS('.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	 public function do_upload()
        {
        	// echo "<pre>";
        	// print_r ($_POST);
        	// echo "</pre>";exit();
        	if ($_FILES['files']) {
    			$ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
    			$jns_sk = $this->input->post('jenis_sk',true);
    			$id_targetkk = $this->input->post('id_targetkk',true);
    			$name = $id_targetkk.'_'.$jns_sk.'_'.date('Ymdhis').'.'.$ext;
    			$nama_sk = ucfirst(str_replace('_', ' ', $jns_sk));
			}
    		$id = $this->input->post('id',true);
        	$data = [
        			'jenis_sk' => $jns_sk,
        			'nama_sk' => $nama_sk,
        			'targetkk_id' => $id_targetkk,
        			'no_sk' => $this->input->post('no_sk',true),
        			'tentang' => $this->input->post('tentang_sk',true),
        			'tanggal_sk' => $this->input->post('tanggal_sk',true),
    			];
    		if($id){
            	$this->db->where('id', $id);
				$ins = $this->db->update('wa_targetkk_file', $data);
				if ($_FILES['files']) {
					$this->proses_uploads($id,@$name);
				}
            }else{

				$this->db->insert('wa_targetkk_file', $data);
				 $insert_id = $this->db->insert_id();
				$this->proses_uploads($insert_id,@$name);
            }
        	
        }

       public function proses_uploads($id='',$name="")
       {
       		if ($_FILES['files']['name']) {
        		// check type fle upload
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['files']['tmp_name']);

				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	


    		
				

    			// $_FILES['files']['name'] = $name;

                $config['upload_path']          = './uploads/penlok_targetkk/';
                $config['allowed_types']        = 'pdf|jpeg|jpg|png';
                $config['file_name']			= $name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('files'))
                {
                	                        $error = array('error' => $this->upload->display_errors());

					echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error]);
                }
                else
                {
                        // $data = array('upload_data' => $this->upload->data());
                	$data = [
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/penlok_targetkk/'.$this->upload->data()['file_name'],
	                			];
	                	$this->db->where('id', $id);
    					$this->db->update('wa_targetkk_file', $data);
					echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);


                        // $this->load->view('upload_success', $data);
                }
        	}else{
					echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);
        	}
       }

        public function get_edit_upload($id='')
	{
		$data = $this->global->get_by_one('wa_targetkk_file',$id,'id');
		echo json_encode($data);
		
	}

		public function delete_upload($id='')
	{
		
		$this->db->where('id', $id);
		$del = $this->db->delete('wa_targetkk_file');
		if($del)
		{
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

}

/* End of file Penetapan_lokasi_target.php */
/* Location: ./application/controllers/Penetapan_lokasi_target.php */