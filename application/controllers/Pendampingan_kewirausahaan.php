<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendampingan_kewirausahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('pendampinganKewirausahaanModel','pendampingan');
	}

	public function index()
	{
		$data['title'] = 'Home - Entry Subject Object - Tahun Kedua - Pendampingan Kewirausahaan';
		$this->skin->view('pendampingan_kewirausahaan/index',$data);
	}
	
	public function get_all()
	{
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		if ($role == 5) {
			$this->db->where('kode_kab_kota', $kabkot);
		}
		$get=$this->global->get_all('v_dt_penlok_kedua');
		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->nama_provinsi,@$value->nama_kab_kota,@$value->tahun,@$value->target_kk,
				rupiah(@$value->anggaran_kewirausahaan),rupiah(@$value->realisasi_kewirausahaan),
				'<a type="button" style="display:inline" href="'.base_url('detail_pendampingan_kewirausahaan/data/').$value->id.'" class="btn btn-success"><i class="fas fa-search"></i></a>'.
				'<a type="button"  style="display:inline" href="'.base_url('pendampingan_kewirausahaan/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-upload" ></i></a>'.
				'<button type="button" id="realisasi" onclick="realisasi(\''.$value->kode_kab_kota.'\','.$value->tahun_anggaran.',\''.$value->nama_kab_kota.'\')" class="btn btn-warning "><i class="fas fa-edit"></i></button>'
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

		$data['prov']=$this->pendampingan->getProv();
		$data['title']= 'Home - Entry Subject Object - Tahun Kedua - Pendampingan Kewirausahaan - Baru';
		$this->skin->view('pendampingan_kewirausahaan/add',$data);
	}

	public function create()
	{
		$thn_anggaran = $this->input->post('tahun_anggaran',true);
		$kd_kabkot = $this->input->post('kode_kab_kota',true);
		$nip = $this->input->post('nip',true);
		
		$checkWil = $this->pendampingan->cekWIlTahun($kd_kabkot,$thn_anggaran);

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
			// foreach ($_FILES as $key => $value) {
			// 	if (!empty($value['name'])) {
					
		 //    		$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
		 //    		$name = $id.'sk'.str_replace('file_foto_sk','',$key).'.'.$ext;
		 //    		$_FILES[$key]['name']=$name;
			// 		if ($key == 'file_foto_sk1') {
			// 			$this->upload_sk1($id);
						
			// 		}
			// 		if ($key == 'file_foto_sk2') {
			// 			$this->upload_sk2($id);
						
			// 		}
			// 	}
			// }
			// exit();
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['id']=$id;
		// $data['prov']=$this->pendampingan->getProv();
		$data['prov']=$this->pendampingan->getProv();
		$data['title']= 'Home - Entry Subject Object - Tahun Kedua - Pendampingan Kewirausahaan - Edit';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$this->skin->view('pendampingan_kewirausahaan/edit',$data);

	}


	public function update()
	{
		
		$thn_anggaran = $this->input->post('tahun_anggaran',true);
		$kd_kabkot = $this->input->post('kode_kab_kota',true);
		$thn_anggaran_old = $this->input->post('tahun_anggaran_old',true);
		$kd_kabkot_old = $this->input->post('kode_kab_kota_old',true);
		$nip = $this->input->post('nip',true);
		
		if (($kd_kabkot != $kd_kabkot_old) && ($thn_anggaran != $thn_anggaran_old)) {
			$checkWil = $this->pendampingan->cekWIlTahun($kd_kabkot,$thn_anggaran);
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
			// foreach ($_FILES as $key => $value) {
			// 	if (!empty($value['name'])) {
					
		 //    		$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
		 //    		$name = $id.'sk'.str_replace('file_foto_sk','',$key).'.'.$ext;
		 //    		$_FILES[$key]['name']=$name;
			// 		if ($key == 'file_foto_sk1') {
			// 			$this->upload_sk1($id);
						
			// 		}
			// 		if ($key == 'file_foto_sk2') {
			// 			$this->upload_sk2($id);
						
			// 		}
			// 	}
			// }
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
		$data=$this->pendampingan->getKab($kode);
		$str='<option data-tahun="" data-target="" value="">-- Pilih Kabupaten/Kota --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option data-tahun="'.$value->tahun_anggaran.'" data-target="'.$value->target_kk.'" value="'.$value->kode.'">'.$value->nama_kab_kota.'</option>';
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
                $config['upload_path']          = './uploads/pendampingan_kewirausahaan/';
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
                $config['upload_path']          = './uploads/pendampingan_kewirausahaan/';
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
		$data['title']= 'Home - Entry Subject Object - Tahun Kedua - Pendampingan Kewirausahaan - Upload';
		$data['data'] = $this->global->get_by_one('dt_pengembangan_rencana_usaha',$id,'id');
		$this->skin->view('pendampingan_kewirausahaan/upload',$data);

	}
	public function get_upload($id)
	{
		$get = $this->global->get_by_result('fl_pendampingan_kewirausahaan',$id,'targetkk_id');

		$data = [];
		foreach ($get as $key => $value) {

			$jenis_evidence = ucfirst(str_replace('_',' ',$value->jenis_evidence));
			$a = [
				$key+1,$jenis_evidence,tanggal_indonesia($value->tanggal_pendampingan_kewirausahaan),
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

			$ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
			$jns_evidence = $this->input->post('jenis_evidence',true);
			$id_targetkk = $this->input->post('id_targetkk',true);
			$name = $id_targetkk.'_'.$jns_evidence.'_'.date('Ymdhis').'.'.$ext;
    		$id = $this->input->post('id',true);
        	$data = [
        			'targetkk_id' => $id_targetkk,
        			'jenis_evidence' => $jns_evidence,
        			'tanggal_pendampingan_kewirausahaan' => $this->input->post('tanggal_pendampingan_kewirausahaan',true),
    			];
			if($id){
        		$this->db->where('id', $id);
				$ins = $this->db->update('fl_pendampingan_kewirausahaan', $data);
			
            }else{

				$this->db->insert('fl_pendampingan_kewirausahaan', $data);
				 $id = $this->db->insert_id();
            }

            if ($_FILES['files']['name']) {
            	// echo "<pre>";
            	// print_r ($_FILES);
            	// echo "</pre>";exit();
        		// check type fle upload
        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				$filetype = mime_content_type($_FILES['files']['tmp_name']);

				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	


    		
				

    			// $_FILES['files']['name'] = $name;

                $config['upload_path']          = './uploads/pendampingan_kewirausahaan/';
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
                	$ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
	    			$jns_evidence = $this->input->post('jenis_sk',true);
	    			$id_targetkk = $this->input->post('id_targetkk',true);
	    			$name = $id_targetkk.'_'.$jns_evidence.'_'.date('Ymdhis').'.'.$ext;
	    			$nama_sk = ucfirst(str_replace('_', ' ', $jns_evidence));
                	$data = [
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/pendampingan_kewirausahaan/'.$this->upload->data()['file_name'],
	                			];
	                	$this->db->where('id', $id);
    					$this->db->update('fl_pendampingan_kewirausahaan', $data);
					echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);


                        // $this->load->view('upload_success', $data);
                }
        	}else{
					echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);
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

                $config['upload_path']          = './uploads/pendampingan_kewirausahaan/';
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
	                    			'dir_name' => 'uploads/pendampingan_kewirausahaan/'.$this->upload->data()['file_name'],
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
		$data = $this->global->get_by_one('fl_pendampingan_kewirausahaan',$id,'id');
		echo json_encode($data);
		
	}

		public function delete_upload($id='')
	{
		
		$this->db->where('id', $id);
		$del = $this->db->delete('fl_pendampingan_kewirausahaan');
		if($del)
		{
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}


	public function getRealisasi($kab='',$tahun)
	{
		$data=$this->pendampingan->getRealisasi($kab,$tahun);
		echo json_encode($data);
	}
	
	public function edit_realisasi()
	{
		$data =[
					'realisasi_kewirausahaan' => str_replace('.', '', $this->input->post('realisasi',true))

					];
			$this->db->where('kode_kab_kota', $this->input->post('kode_kab_kota',true));
			$this->db->where('tahun_anggaran', $this->input->post('tahun_anggaran',true));
		$ins =	$this->db->update('wa_anggaran_kedua', $data);
		if($ins){
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

}

/* End of file Penetapan_lokasi_target.php */
/* Location: ./application/controllers/Penetapan_lokasi_target.php */