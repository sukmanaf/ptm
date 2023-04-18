<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diseminasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('diseminasiModel','diseminasi');
	}

	public function index()
	{
		$data['title'] = 'Home - Entry Subject Object - Tahun Ketiga - Diseminasi Model Akses Reforma Agrari';
		$this->skin->view('diseminasi/index',$data);
	}
	
	public function get_all()
	{
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		if ($role == 5) {
			$this->db->where('kode_kab_kota', $kabkot);
		}
		$get=$this->global->get_all('v_dt_penlok_ketiga');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				
				$key+1,@$value->nama_provinsi,@$value->nama_kab_kota,@$value->tahun,@$value->target_kk,
				rupiah(@$value->anggaran_diseminasi),rupiah(@$value->realisasi_diseminasi),
				'<a type="button" style="display:inline" href="'.base_url('diseminasi/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-upload"></i></a>'.
				'<a type="button" style="display:inline" href="'.base_url('detail_diseminasi/data/').$value->id.'" class="btn btn-success"><i class="fas fa-search"></i></a>'.
				'<button type="button" id="realisasi" onclick="realisasi(\''.$value->kode_kab_kota.'\','.$value->tahun_anggaran.',\''.$value->nama_kab_kota.'\')" class="btn btn-warning "><i class="fas fa-edit"></i></button>'.
				'<a type="button" title="Download PDF" target="_blank" style="display:inline" href="'.base_url('export_pdf/diseminasi/').$value->kode_kab_kota.'" class="btn btn-info btn-sm">Export Pendampingan</a>'.
				'<a type="button" title="Download PDF" target="_blank" style="display:inline" href="'.base_url('export_pdf/diseminasi_not_in/').$value->kode_kab_kota.'" class="btn btn-info btn-sm">Export Tidak Pendampingan </a>'
					
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function get_detail($id)
	{
		$get = $this->diseminasi->get_detail($id);

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

	public function get_upload($id)
	{
		$get = $this->global->get_by_result('fl_diseminasi',$id,'kode_desa_kelurahan');

		$data = [];
		foreach ($get as $key => $value) {

			$a = [
				$key+1,$value->lampiran_name,
					'<a target="_black" href="'.base_url().$value->dir_name.'" class="btn btn-warning"><i class="fas fa-eye"></i></a>'.
					'<button type="button" id="edit" onclick="editS('.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function get_edit($id='')
	{
		$data = $this->global->get_by_one('dt_diseminasi',$id,'id');
		echo json_encode($data);
		
	}

	public function get_edit_upload($id='')
	{
		$data = $this->global->get_by_one('fl_diseminasi',$id,'id');
		echo json_encode($data);
		
	}

	public function add()
	{

		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Diseminasi Model Akses Reforma Agrari - Baru';
		$this->skin->view('diseminasi/add',$data);
	}

	public function create()
	{
	
		$data = [
					'nik'	=> $this->input->post('nik',true),
					'keterangan'	=> $this->input->post('keterangan',true),
				];

		$ins =  $this->db->insert('dt_diseminasi', $data);
		if ($ins) {
			

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['id']=$id;
		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Diseminasi Model Akses Reforma Agrari - Baru';
		$data['data'] = $this->global->get_by_one('dt_diseminasi',$id,'id');
		$this->skin->view('diseminasi/edit',$data);

	}

	public function upload($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Diseminasi Model Akses Reforma Agrari - Upload';
		$data['data'] = $this->global->get_by_one('dt_diseminasi',$id,'id');
		$this->skin->view('diseminasi/upload',$data);

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
			$ins =  $this->db->update('dt_diseminasi', $data);
		}else{
			$ins =  $this->db->insert('dt_diseminasi', $data);

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
		$del = $this->db->delete('dt_diseminasi');
		if ($del) {
			
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}
	public function delete_upload($id='')
	{
			$a = $this->global->get_by_one('fl_diseminasi',$id,'id')['dir_name'];
			unlink($a);
			$this->db->where('id', $id);
			$del = $this->db->delete('fl_diseminasi');
		if($del)
		{
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

public function do_upload()
        {

        	if ($_FILES['files']) {
        		// check type fle upload
        		$allowed_type = array('application/pdf'=>1);
				$filetype = mime_content_type($_FILES['files']['tmp_name']);

				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
					exit();
				}	


    			$ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
    			$jns_lampiran = $this->input->post('jenis_lampiran',true);
    			$kode_desa = $this->input->post('kode_desa_kelurahan',true);
    			$id = $this->input->post('id',true);
    			$name = $kode_desa.'_'.$jns_lampiran.'_'.date('Ymdhis').'.'.$ext;
    			$lampiran_name = ucfirst(str_replace('_', ' ', $jns_lampiran));
				$check = $this->global->get_by_arr('fl_diseminasi',[ 'jenis_lampiran' => $jns_lampiran, 'kode_desa_kelurahan' => $kode_desa]);
				if (!empty($check) && $id == '') {
					echo json_encode(['sts' => 'fail', 'msg' => 'Jenis Lampiran Sudah Ada!']);
					exit();
				}

    			$_FILES['files']['name'] = $name;

                $config['upload_path']          = './uploads/diseminasi/';
                $config['allowed_types']        = 'pdf';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('files'))
                {
                	
					echo json_encode(['sts' => 'fail','msg' => 'Upload Lampiran Sukses!']);
                }
                else
                {
                        // $data = array('upload_data' => $this->upload->data());
                	$data = [
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/diseminasi/'.$this->upload->data()['file_name'],
	                    			'jenis_lampiran' => $jns_lampiran,
	                    			'lampiran_name' => $lampiran_name,
	                    			'kode_desa_kelurahan' => $kode_desa,
	                			];
	                if($id){
						$a = $this->global->get_by_one('fl_diseminasi',$id,'id')['dir_name'];
						unlink($a);
	                	$this->db->where('id', $id);
    					$this->db->update('fl_diseminasi', $data);
	                }else{

    					$this->db->insert('fl_diseminasi', $data);
	                }
					echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);


                        // $this->load->view('upload_success', $data);
                }
        	}
        }

	 public function do_upload_old($file,$file_id)
    {
    	// return $file;
    	$arr = [];
    	$lastName = date('Ymdhis'); 
    	foreach ($file as $key => $value) {

    		if(!empty($value['name'])){
    			$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
    			
    			// $config=[];
	            $config['upload_path']          = './uploads/';
	            $config['allowed_types']        = 'pdf';
	            // $config['file_name']        	= $key.'_'.$lastName.'.'.$ext;
    			// array_push($arr,  $config);
	            // $config['max_size']             = 100;
	            // $config['max_width']            = 1024;
	            // $config['max_height']           = 768;

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload($key))
	            {
	                if (!empty($arr)) {
	                	
	                    foreach ($arr as $key => $value) {
	                    	unlink($value['dir_name']);
	                    }
	                }
	            }
	            else
	            {
	                    $data = [
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/'.$this->upload->data()['file_name'],
	                    			'jenis' => $key,
	                    			'lampiran_name' => $key,
	                    			'file_id' => $file_id,
	                			];

	                    array_push($arr, $data);

	                    // $this->load->view('upload_success', $data);
	            }
    		}
    	}
    	$this->db->insert_batch('fl_desiminasi', $arr);
    	return $arr;
    }

    public function detailNik($nik="")
    {
		$keanggotaan = $this->global->get_by_one('wa_anggota_kelompok_usaha',$nik,'nik') == ''?'Tidak Ada': $this->global->get_by_one('wa_anggota_kelompok_usaha',$nik,'nik');
		$kelompok = $this->diseminasi->getSektorUsaha($nik) == '' ? 'Tidak Ada' : $this->diseminasi->getSektorUsaha($nik)['nama_kelompok_usaha'];
		$sektor_usaha = $this->diseminasi->getSektorUsaha($nik) == '' ? 'Tidak Ada' : $this->diseminasi->getSektorUsaha($nik)['deskripsi'];
		$luas = $this->global->get_by_one('wa_kuesioner_th',$nik,'nik') == '' ? '0' :$this->global->get_by_one('wa_kuesioner_th',$nik,'nik')['luas_tanah_sertipikat_terdaftar'];
    	
    	echo json_encode([
			'res' =>'success',
			'keanggotaan' => $keanggotaan,
			'kelompok' => $kelompok,
			'sektor_usaha' => $sektor_usaha,
			'luas' => $luas == '' ? 0:  $luas ,
		]);
    }

	public function getRealisasi($kab='',$tahun)
	{
		$data=$this->diseminasi->getRealisasi($kab,$tahun);
		echo json_encode($data);
	}
	
	public function edit_realisasi()
	{
		$data =[
					'realisasi_diseminasi' => str_replace('.', '', $this->input->post('realisasi',true))

					];
			$this->db->where('kode_kab_kota', $this->input->post('kode_kab_kota',true));
			$this->db->where('tahun_anggaran', $this->input->post('tahun_anggaran',true));
		$ins =	$this->db->update('wa_anggaran_ketiga', $data);
		if($ins){
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}
}


/* End of file diseminasi.php */
/* Location: ./application/controllers/diseminasi.php */