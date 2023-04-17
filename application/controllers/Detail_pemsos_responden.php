<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_pemsos_responden extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
		$this->load->model('detailPemsosModel','pemsos');
	}

	public function index()
	{
		return false;
	}

	public function data($id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Pemetaan Sosial - Desa';
		$this->skin->view('detail_pemsos_responden/index',$data);
	}

	public function get_all($id)
	{
		$get=$this->pemsos->getDataDetail($id);
		$data = [];
		// echo "<pre>";
		// print_r ($get);
		// echo "</pre>";exit();
		foreach ($get as $key => $value) {
			$jk = $value->jenis_kelamin == "L" ? 'Laki-laki' : 'Perempuan';
			$btn_file='';
			if (!empty($value->file)) {
				$files = explode(',', $value->file);
				foreach ($files as $k => $v) {
					$btn_file .='<a type="button"  style="display:inline" target="_blank" href="'.base_url().$v.'" class="btn btn-warning"><i class="fas fa-eye" ></i></a>';
				}
			}
			$a = [
				$key+1,@$value->nik,@$value->nama_responden_utama,$jk,$btn_file,
				// '<a type="button" href="'.base_url('detail_pemsos_responden/edit/').$id.'/'.$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
				'<a type="button"  style="display:inline" href="'.base_url('detail_pemsos_responden/detail/').$value->id_targetkk_desa.'" class="btn btn-success"><i class="fas fa-edit" ></i></a>'
				// '<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	

	

		public function detail($id)
	{
		$data['id']=$id;
		$data['data'] = $this->global->get_by_one('v_kuesioner_re',$id,'id_targetkk_desa');
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		// ===== lk ======
		$data['sektor']=$this->global->get_all('ms_kuesioner_re10a');
		$data['terdaftar']=$this->pemsos->terdaftar();
		$data['tidakTerdaftar']=$this->pemsos->tidakTerdaftar();
		$data['fieldstaff']=$this->pemsos->fieldstaff();
		
		// ==== ar =====
		$data['hub_kk']=$this->pemsos->hub_kk();
		$data['pekerjaan']=$this->pemsos->pekerjaan();
		
		// ===== rm ====


		$data['lk']=$this->load->view('detail_pemsos_responden/lk',$data,true);
		$data['ar']=$this->load->view('detail_pemsos_responden/ar',$data,true);
		$data['rm']=$this->load->view('detail_pemsos_responden/rm',$data,true);
		

		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Pemetaan Sosial - Desa - Baru';
		$this->skin->view('detail_pemsos_responden/detail',$data);
	}
	public function add($id)
	{
		$data['id']=$id;
		$data['sektor']=$this->global->get_all('ms_kuesioner_re10a');
		$data['terdaftar']=$this->pemsos->terdaftar();
		$data['tidakTerdaftar']=$this->pemsos->tidakTerdaftar();
		$role = $this->session->userdata('login')['role_user'];
		$kabkot = $this->session->userdata('login')['kode_kab_kota'];
		if ($role == 5) {
			$this->db->where('kode_kab_kota', $kabkot);
		}
		$data['fieldstaff']=$this->pemsos->fieldstaff();
		
		$data['data'] = $this->global->get_by_one('wa_targetkk_desa',$id,'id');
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Pemetaan Sosial - Desa - Baru';
		$data['lk']=$this->load->view('detail_pemsos_responden/lk',$data['data'],true);
		$this->skin->view('detail_pemsos_responden/add',$data);
	}

	public function create()
	{
		foreach ($_FILES as $key => $value) {
			$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
				if (!empty($_FILES[$key]['name'])) {
					$filetype = mime_content_type($_FILES[$key]['tmp_name']);
					if (@$allowed_type[$filetype]) {
					}else{
						echo json_encode(['sts' => 'fail', 'message' => 'Type FIle Salah atatu File Rusak!']);
						exit();
					}			
				}
		}
		$nokk = $this->input->post('no_kk',true);

		if (strlen($nokk) != 16) {
			echo json_encode(['sts' => 'fail','message' => 'Jumlah No KK Harus 16!']);
			exit();
		}
		$istelf = $this->input->post('memiliki_no_telepon',true);
		$no_telepon = $this->input->post('no_telepon',true);
		$sts_tanah = $this->input->post('sumber_status_tanah',true);
		$tanah_terdaftar = $this->input->post('tanah_terdaftar_atau_tidak',true);
		$nik = $this->input->post('nik',true);
		$sektor_usaha = $this->input->post('sektor_usaha',true);
		$sub_sektor_usaha = $this->input->post('sub_sektor_usaha',true);
		$jenis_sub_sektor_usaha = $this->input->post('jenis_sub_sektor_usaha',true);
		$tahun_status_tanah = $this->input->post('tahun_status_tanah',true);
		$arr =[];
		foreach ($sektor_usaha as $key => $value) {
			if($sektor_usaha[$key] && $sub_sektor_usaha[$key] && $jenis_sub_sektor_usaha[$key]){
				$a=[
						'nik' => $nik,
						'kode_sektor_usaha' => $sektor_usaha[$key],
						'kode_subsektor_usaha' => $sub_sektor_usaha[$key],
						'kode_jenis_subsektor_usaha' => $jenis_sub_sektor_usaha[$key],

				];
				array_push($arr,$a);
			}
		}
		$data = [

					'tanggal_lahir'	=> $this->input->post('tanggal_lahir',true),
					'id_targetkk_desa'	=> $this->input->post('targetkk_id',true),
					'nama_responden_utama'	=> $this->input->post('nama_responden_utama',true),
					'no_urut_rt'	=> $this->input->post('no_rt',true),
					'nik' => $this->input->post('nik',true),
					'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
					'nama_kepala_keluarga' => $this->input->post('nama_kk',true),
					'jumlah_tanggungan' => $this->input->post('jml_tanggungan',true),
					'memiliki_telepon' => $this->input->post('memiliki_no_telepon',true),
					'sumber_status_tanah' => $this->input->post('sumber_status_tanah',true),
					'kode_field_staff' => $this->input->post('kode_field_staff',true),
					'kode_peninjau' => $this->input->post('kode_peninjau',true),
					'jam_mulai' => $this->input->post('jam_mulai',true),
					'jam_selesai' => $this->input->post('jam_selesai',true),
					'hasil_kunjungan_pertama' => $this->input->post('hasil_kunjungan',true),
					'tgl_kunjungan_pertama' => $this->input->post('tgl_kunjungan',true),
					'no_kk' => $this->input->post('no_kk',true),

				];

		$ins =  $this->db->insert('wa_kuesioner_re', $data);
		$insert_id = $this->db->insert_id();
		if ($ins) {
			
			if($istelf == 1){
				$a=['nik' => $nik,'nomor_telepon'=>$no_telepon];
				$this->db->insert('wa_kuesioner_re08', $a);
			}
			if($sts_tanah == 1){
				$a=['nik' => $nik,'kode_status_tanah_terdaftar'=>$tanah_terdaftar,'tahun' => $tahun_status_tanah];
				$this->db->insert('wa_kuesioner_re09a', $a);
			}
			if($sts_tanah == 2){
				$a=['nik' => $nik,'kode_status_tanah_belum_terdaftar'=>$tanah_terdaftar];
				$this->db->insert('wa_kuesioner_re09b', $a);
			}
			$this->do_upload($insert_id);


			$this->db->insert_batch('wa_kuesioner_re10', $arr);


			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id_target,$id='')
	{
		$data['id']=$id;
		$data['title']= 'Home - Entry Subject Object - Tahun Pertama - Pemetaan Sosial - Desa - Edit';
		$data['datakab'] = $this->pemsos->getDataKab($id_target);
		$data['datakab']['kuota_terpakai'] = $this->pemsos->getKuota($id_target);

		$data['data'] = $this->global->get_by_one('wa_targetkk_desa',$id,'id');
		$data['kec'] = $this->pemsos->getKec($data['datakab']['kode_kab_kota']);
		$data['data']['nama_kecamatan'] = $this->pemsos->getNamaKec($data['data']['kode_desa_kelurahan'])['nama_kecamatan'];
		$data['data']['kode_kecamatan'] = $this->pemsos->getNamaKec($data['data']['kode_desa_kelurahan'])['kode_kecamatan'];
		$this->skin->view('detail_pemsos_responden/edit',$data);

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

	public function do_upload($id)
    {
        	// echo "<pre>";
        	// print_r ($_FILES);
        	// echo "</pre>";exit();

			
    	foreach ($_FILES as $key => $value) {
            if ($_FILES[$key]['name']) {
        		
    			$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
				$name = $id.'_'.$key.'_'.date('Ymdhis').'.'.$ext;
				

    			$_FILES[$key]['name'] = $name;

                $config['upload_path']          = './uploads/kuesioner_re/';
                $config['allowed_types']        = 'pdf|jpeg|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($key))
                {
                	$error = array('error' => $this->upload->display_errors());

					echo json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error]);
                }
                else
                {
     //                    // $data = array('upload_data' => $this->upload->data());
                	$data = [
                					'wa_kuesioner_re_id' => $id,
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/kuesioner_re/'.$this->upload->data()['file_name'],
	                			];
    					$this->db->insert('fl_kuesioner_re', $data);
					// echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);


                        // $this->load->view('upload_success', $data);
                }
        	}else{
					// echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);
        	}
        }
        	
    }

		public function getSubsektor($kode='')
	{
		$data=$this->pemsos->getSubsektor($kode);
		$str='<option  value="">-- Pilih Subsektor --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->kode_subsektor_usaha.'">'.$value->deskripsi.'</option>';
			}
		}
		echo json_encode($str);
	}
		public function getJnsSubsektor($kode='')
	{
		$data=$this->pemsos->getJnsSubSektor($kode);
		$str='<option  value="">-- Pilih Jenis Subsektor --</option>';
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$str.='<option  value="'.$value->kode_jenis_subsektor_usaha.'">'.$value->deskripsi.'</option>';
			}
		}
		echo json_encode($str);
	}

	public function append($id='')
	{
		$data['id']=$id;
		$data['sektor']=$this->global->get_all('ms_kuesioner_re10a');
		$data['html'] =$this->load->view('detail_pemsos_responden/append', $data, true);
		echo json_encode($data);
	}

	public function cekNik($nik='')
	{
		$data = $this->global->get_by_one('wa_kuesioner_re',$nik,'nik');
		if(empty($data)){
			echo 1;		
		}else{
			echo 0;
		}
	}


	public function get_lk($id)
	{
		$this->db->where('id_targetkk_desa', $id);
		$get=$this->db->get('v_dt_pemsos_lk')->result();
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->nik,@$value->nama_kab_kota,@$value->nama_kecamatan,@$value->nama_desa_kelurahan,@$value->alamat,
				// '<a type="button" href="'.base_url('detail_pemsos_responden/edit/').$id.'/'.$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
				// '<a type="button" disabled  style="display:inline" href="'.base_url('detail_pemsos_responden/edit_lk/').$value->id.'" class="btn btn-success"><i class="fas fa-edit" ></i></a>'
				'<button type="button" id="del" onclick="editLk('.$value->id.')" class="btn btn-success"><i class="fas fa-edit"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}
	public function create_lk()
	{
		// echo "<pre>";
		// print_r ($_POST);
		// echo "</pre>";exit();
		

		$data = [
					'nik' => $this->input->post('nik',true),
					'id_targetkk_desa' => $this->input->post('id_targetkk_desa',true),
				    'kode_provinsi' => $this->input->post('kode_provinsi',true),
				    'kode_kab_kota' => $this->input->post('kode_kab_kota',true),
				    'kode_kecamatan' => $this->input->post('kode_kecamatan',true),
				    'kode_desa_kelurahan' => $this->input->post('kode_desa_kelurahan',true),
				    'lattitude' => $this->input->post('lat',true),
				    'longitude' => $this->input->post('lng',true),
				    'alamat' => $this->input->post('alamat',true),
				];


		$ins =  $this->db->insert('wa_kuesioner_lk', $data);
		$id = $this->db->insert_id();
		if ($ins) {
		
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit_lk($id='')
	{
		$data = $this->global->get_by_one('wa_kuesioner_lk',$id,'id');
		echo json_encode($data);
	}

	public function update_lk()
	{
		$id = $this->input->post('lkid',true);
		$data = [
				    'lattitude' => $this->input->post('xlat',true),
				    'longitude' => $this->input->post('xlng',true),
				    'alamat' => $this->input->post('xalamat',true),
				];
		$this->db->where('id', $id);
		$up = $this->db->update('wa_kuesioner_lk', $data);
		if ($up) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}
	}

		public function get_ar($id)
	{
		$this->db->where('id_targetkk_desa', $id);
		$get=$this->db->get('v_dt_pemsos_ar')->result();
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->nik,@$value->nama,@$value->nama_jenis_kelamin,@$value->nama_hubungan,
				// '<a type="button" href="'.base_url('detail_pemsos_responden/edit/').$id.'/'.$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
				// '<a type="button" disabled  style="display:inline" href="'.base_url('detail_pemsos_responden/add/').$value->id.'" class="btn btn-success"><i class="fas fa-edit" ></i></a>'
				'<button type="button" id="del" onclick="editAr('.$value->id.')" class="btn btn-success"><i class="fas fa-edit"></i></button>'
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}

	public function create_ar()
	{


		$data = [
					'nik' => $this->input->post('nik',true),
					'id_targetkk_desa' => $this->input->post('id_targetkk_desa',true),
					'nama' =>  $this->input->post('nama_anggota_keluarga',true),
				    'jenis_kelamin' =>  $this->input->post('jenis_kelamin',true),
				    'tanggal_lahir' =>  $this->input->post('tanggal_lahir',true),
				    'status_perkawinan' =>  $this->input->post('status_perkawinan',true),
				    'kode_hubungan_dgn_kk' =>  $this->input->post('hubungan_dengan_kk',true),
				    'kode_pekerjaan' =>  $this->input->post('pekerjaan',true),
				    'pendidikan' =>  $this->input->post('pendidikan',true),
				    'apakah_anggota_keluarga_bekerja' =>  $this->input->post('is_anggota_keluarga_bekerja',true),
				    'penghasilan_anggota_keluarga_yang_bekerja' =>  $this->input->post('penghasilan',true),
				];


		$ins =  $this->db->insert('wa_kuesioner_ar', $data);
		$id = $this->db->insert_id();
		if ($ins) {
		
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit_ar($id='')
	{
		$data = $this->global->get_by_one('wa_kuesioner_ar',$id,'id');
		echo json_encode($data);
	}

	public function update_ar()
	{
		$id = $this->input->post('arid',true);
		$data = [
					'nama' =>  $this->input->post('xnama_anggota_keluarga',true),
				    'jenis_kelamin' =>  $this->input->post('xjenis_kelamin',true),
				    'tanggal_lahir' =>  $this->input->post('xtanggal_lahir',true),
				    'status_perkawinan' =>  $this->input->post('xstatus_perkawinan',true),
				    'kode_hubungan_dgn_kk' =>  $this->input->post('xhubungan_dengan_kk',true),
				    'kode_pekerjaan' =>  $this->input->post('xpekerjaan',true),
				    'pendidikan' =>  $this->input->post('xpendidikan',true),
				    'apakah_anggota_keluarga_bekerja' =>  $this->input->post('xis_anggota_keluarga_bekerja',true),
				    'penghasilan_anggota_keluarga_yang_bekerja' =>  $this->input->post('xpenghasilan',true),
				];
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		$this->db->where('id', $id);
		$up = $this->db->update('wa_kuesioner_ar', $data);
		if ($up) {
			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}
	}

}

/* End of file Detail_penyuluhan.php */
/* Location: ./application/controllers/Detail_penyuluhan.php */