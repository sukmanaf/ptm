<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_pengembangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('pengembanganModel','pengembangan');
	}

	public function index()
	{
		// $data['title'] = 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha';
		// $this->skin->view('detail_pengembangan/index',$data);
		return false;
	}

	public function data($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Desa';
		$data['data'] = $this->global->get_by_one('wa_targetkk',$id,'id');
		$this->skin->view('detail_pengembangan/index',$data);
	}
	
	public function get_all($id)
	{

		$get=$this->pengembangan->getData($id);

		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,$value->nama_kab_kota,$value->nama_kecamatan,$value->nama_desa_kelurahan,
				// '<a type="button" style="display:inline" href="'.base_url('pengembangan/upload/').$value->id.'" class="btn btn-primary"><i class="fas fa-upload"></i></a>'.
				'<a type="button" style="display:inline" href="'.base_url('detail_pengembangan/edit/').$id.'/'.$value->id.'/'.$value->kode_desa_kelurahan.'" class="btn btn-success"><i class="fas fa-plus"></i></a>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

		public function get_detail($id)
	{
		$get = $this->pengembangan->get_detail($id);

		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";
		foreach ($get as $key => $value) {

			$a = [
				$key+1,$value->nama_responden_utama,$value->kapasitas,$value->akses_pemasaran,$value->kebutuhan_akses,$value->kendala,$value->keterangan,
					'<button type="button" id="edit" onclick="editS('.$value->id.')" class="btn btn-success edit"><i class="fas fa-edit"></i></button>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'

			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

		public function get_upload($id)
	{
		$get = $this->global->get_by_result('fl_pengembangan_rencana_usaha',$id,'kode_desa_kelurahan');

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
		$data = $this->global->get_by_one('dt_pengembangan_rencana_usaha',$id,'id');
		echo json_encode($data);
		
	}
	public function get_edit_upload($id='')
	{
		$data = $this->global->get_by_one('fl_pengembangan_rencana_usaha',$id,'id');
		echo json_encode($data);
		
	}

	public function add()
	{

		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Baru';
		$this->skin->view('detail_pengembangan/add',$data);
	}

	public function create()
	{

		$nik = $this->input->post('nik',true);
		$nama = $this->global->get_by_one('wa_kuesioner_re',$nik,'nik')['nama_responden_utama'];
		$luas_tanah = $this->input->post('luas_tanah',true) == '' ? 0:$this->input->post('luas_tanah',true);
		$kapasitas = $this->input->post('kapasitas',true) == '' ? 0:$this->input->post('kapasitas',true);
		$allowed_type = array('application/pdf'=>1);
		$message = [
			'lampiran1' => 'Tipe File Lampiran 1 Salah!',
			'lampiran2' => 'Tipe File Lampiran 2 Salah!',
			'lampiran3' => 'Tipe File Lampiran 3 Salah!',
			'lampiran4' => 'Tipe File Lampiran 4 Salah!'
		];
		foreach ($_FILES as $key => $value) {
			if(!empty($value['name'])){
    			$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
				$_FILES[$key]['name'] = $nik.'_'.$key.'_'.date('YmdHis').'.'.$ext;

				$filetype = mime_content_type($value['tmp_name']);
				if (@$allowed_type[$filetype]) {
				}else{
					echo json_encode(['sts' => 'fail', 'message' => $message[$key]]);
					exit();
				}
			}
			
		}


	
		
		$data = [
					'nik'	=> $nik,
					'kapasitas'	=> $kapasitas,
					'akses_pemasaran'	=> $this->input->post('akses_pemasaran',true),
					'kebutuhan_akses'	=> $this->input->post('keanggotaan',true),
					'kendala'	=> $this->input->post('kendala',true),
					'keterangan'	=> $this->input->post('keterangan',true),
				];

		$ins =  $this->db->insert('dt_pengembangan_rencana_usaha', $data);
		if ($ins) {
			

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id_targetkk='',$id_targetkk_desa,$kode_desa_kelurahan)
	{
		$data['id']=$id_targetkk_desa;
		$data['id_targetkk']=$id_targetkk;
		$data['kode_desa_kelurahan']=$kode_desa_kelurahan;
		$this->db->where('id_targetkk_desa', $id_targetkk_desa);
		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Baru';
		$data['data'] = $this->global->get_by_one('dt_pengembangan_rencana_usaha',$id_targetkk_desa,'id_targetkk_desa');
		$data['penlok'] = $this->global->get_by_one('wa_targetkk_desa',$id_targetkk_desa,'id');
		$this->skin->view('detail_pengembangan/edit',$data);

	}

	public function upload($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Ketiga - Penggunaan Rancangan Usaha - Upload';
		$data['data'] = $this->global->get_by_one('dt_pengembangan_rencana_usaha',$id,'id');
		$this->skin->view('detail_pengembangan/upload',$data);

	}

	public function update()
	{

		$nik = $this->input->post('nik',true);
		$id_targetkk_desa = $this->input->post('id_targetkk_desa',true);
		$batas = $this->input->post('batas',true);
		$check = $this->pengembangan->checkNik($nik,$id_targetkk_desa);
		if ($check > 0) {
			echo json_encode(['sts' => 'fail','message' => 'NIK Sudah ada!']);
			exit();
		}
		$id = $this->input->post('id',true);
		$luas_tanah = $this->input->post('luas_tanah',true) == '' ? 0:$this->input->post('luas_tanah',true);
		$kapasitas = $this->input->post('kapasitas',true) == '' ? 0:$this->input->post('kapasitas',true);
		$data = [
					'nik'	=> $this->input->post('nik',true),
					'kapasitas'	=> $this->input->post('kapasitas',true),
					'akses_pemasaran'	=> $this->input->post('akses_pemasaran',true),
					'kebutuhan_akses'	=> $this->input->post('keanggotaan',true),
					'kendala'	=> $this->input->post('kendala',true),
					'keterangan'	=> $this->input->post('keterangan',true),
					'kode_desa_kelurahan'	=> $this->input->post('kode_desa_kelurahan',true),
					'id_targetkk_desa'	=> $this->input->post('id_targetkk_desa',true),
				];
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		// exit();
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('dt_pengembangan_rencana_usaha', $data);
		}else{
			$check = $this->pengembangan->checkKuota($id_targetkk_desa);
			if ($check >= $batas) {
				echo json_encode(['sts' => 'fail','message' => 'Kuota Sudah Habis!']);
				exit();
			}
			$ins =  $this->db->insert('dt_pengembangan_rencana_usaha', $data);

		}
		if ($ins) {
			echo json_encode(['sts' => 'success', 'message' => 'Dada Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail', 'message' => 'Data gagal Disimpan!']);
		}

	}

	public function delete($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('dt_pengembangan_rencana_usaha');
		if ($del) {
			// $this->db->where('file_id', $id);
			// $data = $this->db->get('fl_pengembangan_rencana_usaha')->result();

			// foreach ($data as $key => $value) {
			// 	unlink($value->dir_name);
			// }
			// $this->db->where('file_id', $id);
			// $this->db->delete('fl_pengembangan_rencana_usaha');
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}
	public function delete_upload($id='')
	{
			$a = $this->global->get_by_one('fl_pengembangan_rencana_usaha',$id,'id')['dir_name'];
			unlink($a);
			$this->db->where('id', $id);
			$del = $this->db->delete('fl_pengembangan_rencana_usaha');
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
				$check = $this->global->get_by_arr('fl_pengembangan_rencana_usaha',[ 'jenis_lampiran' => $jns_lampiran, 'kode_desa_kelurahan' => $kode_desa]);
				if (!empty($check) && $id == '') {
					echo json_encode(['sts' => 'fail', 'msg' => 'Jenis Lampiran Sudah Ada!']);
					exit();
				}

    			$_FILES['files']['name'] = $name;

                $config['upload_path']          = './uploads/pengembangan_rencana_usaha/';
                $config['allowed_types']        = 'pdf';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('files'))
                {
					echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!']);
                }
                else
                {
                        // $data = array('upload_data' => $this->upload->data());
                	$data = [
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/pengembangan_rencana_usaha/'.$this->upload->data()['file_name'],
	                    			'jenis_lampiran' => $jns_lampiran,
	                    			'lampiran_name' => $lampiran_name,
	                    			'kode_desa_kelurahan' => $kode_desa,
	                			];
	                if($id){
						$a = $this->global->get_by_one('fl_pengembangan_rencana_usaha',$id,'id')['dir_name'];
						unlink($a);
	                	$this->db->where('id', $id);
    					$this->db->update('fl_pengembangan_rencana_usaha', $data);
	                }else{

    					$this->db->insert('fl_pengembangan_rencana_usaha', $data);
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
    	$this->db->insert_batch('fl_pengembangan_rencana_usaha', $arr);
    	return $arr;
    }

    public function detailNik($nik="")
    {
		$keanggotaan = $this->global->get_by_one('wa_anggota_kelompok_usaha',$nik,'nik') == ''?'Tidak Ada': $this->global->get_by_one('wa_anggota_kelompok_usaha',$nik,'nik');
		$kelompok = $this->pengembangan->getSektorUsaha($nik) == '' ? 'Tidak Ada' : $this->pengembangan->getSektorUsaha($nik)['nama_kelompok_usaha'];
		$sektor_usaha = $this->pengembangan->getSektorUsaha($nik) == '' ? 'Tidak Ada' : $this->pengembangan->getSektorUsaha($nik)['deskripsi'];
		$luas = $this->global->get_by_one('wa_kuesioner_th',$nik,'nik') == '' ? '0' :$this->global->get_by_one('wa_kuesioner_th',$nik,'nik')['luas_tanah_sertipikat_terdaftar'];
    	
    	echo json_encode([
    				'res' =>'success',
    				'keanggotaan' => $keanggotaan,
    				'kelompok' => $kelompok,
    				'sektor_usaha' => $sektor_usaha,
    				'luas' => $luas == '' ? 0:  $luas ,
    			]);
    }
}


/* End of file Pengembangan.php */
/* Location: ./application/controllers/Pengembangan.php */