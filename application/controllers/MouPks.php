<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOUPks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - MOU & PKS';
		$this->skin->view('mou_pks/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('wa_moupks');
		$data = [];
		foreach ($get as $key => $value) {
			$pksmou = strtoupper($value->jenis_perjanjian);
			$jnspksmou = $value->status_perjanjian == 'proses' ? 'Dalam Proses' : 'Sudah Ada';
			$tgl = tanggal_indonesia($value->tanggal_mulai).' - '.tanggal_indonesia($value->tanggal_akhir);
			$a = [
				$key+1,@$value->nomor,@$pksmou,@$jnspksmou,$tgl,$value->keterangan,
				'<a type="button" href="'.base_url('moupks/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'.
					'<button type="button" id="view" onclick="show_evidence('.$value->id.')" class="btn btn-warning "><i class="fas fa-eye"></i></button>'
				];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['tahapan']=$this->db->get('ms_tahapan_moupks')->result();
		$data['title']= 'Home - MOU & PKS - Baru';
		$this->skin->view('mou_pks/add',$data);
	}

	public function create()
	{

		$nip = $this->input->post('nip',true);
		if (strlen($nip) != 18) {
			echo json_encode(['sts' => 'fail','message' => 'Jumlah NIp Harus 18!']);
			exit();
		}

	
		$data = [
					'nip'	=> $this->input->post('nip',true),
					'nama_pejabat'	=> $this->input->post('nama_pejabat',true),
					'jenis_perjanjian'	=> $this->input->post('jenis_perjanjian',true),
					'status_perjanjian'	=> $this->input->post('status_perjanjian',true),
					'tanggal_mulai'	=> $this->input->post('tanggal_mulai',true),
					'tanggal_akhir'	=> $this->input->post('tanggal_akhir',true),
					'keterangan'	=> $this->input->post('keterangan',true),
					'nama_stackholder'	=> $this->input->post('nama_stackholder',true),
					'judul'	=> $this->input->post('judul',true),
					'nomor'	=> $this->input->post('nomor',true),
					'tahapan'	=> $this->input->post('tahapan',true) == '' ? 0 : $this->input->post('tahapan',true),
				];


		$ins =  $this->db->insert('wa_moupks', $data);
  		$insert_id = $this->db->insert_id();

		foreach ($_FILES as $key => $value) {
        		
            if ($_FILES[$key]['name']) {
            	// die('masuk');
				$date = date('Ymdhis').rand();
				$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
				$jenis_perjanjian = $this->input->post('jenis_perjanjian',true);
				$status_perjanjian = $this->input->post('status_perjanjian',true);
        		$jenis_evidence = str_replace('upload_evidence', '', $key);
				$jenis_evidence = $this->input->post('jenis_evidence'.$jenis_evidence,true);
				$name = $insert_id.'_'.$jenis_perjanjian.'_'.$jenis_evidence.'_'.$date.'.'.$ext;
        		// exit();
        		$_FILES[$key]['name'] = $name;      
        	}
	    }

		if ($ins) {
			if ($_FILES) {
			$this->do_upload($insert_id);	
		}

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['tahapan']=$this->db->get('ms_tahapan_moupks')->result();
		$data['title']= 'Home - MOU & PKS - Edit';
		$data['data'] = $this->global->get_by_one('wa_moupks',$id,'id');
		$this->db->where('id', $id);
    	$data['evidence'] = $this->db->get('v_evidence_moupks')->result();
		$this->skin->view('mou_pks/edit',$data);

	}

	public function update()
	{
		$id = $this->input->post('id',true);
		foreach ($_FILES as $key => $value) {
        		
            if ($_FILES[$key]['name']) {
            	// die('masuk');
        		// check type fle upload
				$date = date('Ymdhis').rand();
				$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
				$jenis_perjanjian = $this->input->post('jenis_perjanjian',true);
				$status_perjanjian = $this->input->post('status_perjanjian',true);
        		$jenis_evidence = str_replace('upload_evidence', '', $key);
				$jenis_evidence = $this->input->post('jenis_evidence'.$jenis_evidence,true);
				$name = $id.'_'.$jenis_perjanjian.'_'.$jenis_evidence.'_'.$date.'.'.$ext;
        		// exit();
        		$_FILES[$key]['name'] = $name;      
        	}
	    }

		$data = [
					'nip'	=> $this->input->post('nip',true),
					'nama_pejabat'	=> $this->input->post('nama_pejabat',true),
					'jenis_perjanjian'	=> $this->input->post('jenis_perjanjian',true),
					'status_perjanjian'	=> $this->input->post('status_perjanjian',true),
					'tanggal_mulai'	=> $this->input->post('tanggal_mulai',true),
					'tanggal_akhir'	=> $this->input->post('tanggal_akhir',true),
					'keterangan'	=> $this->input->post('keterangan',true),
					'nama_stackholder'	=> $this->input->post('nama_stackholder',true),
					'judul'	=> $this->input->post('judul',true),
					'nomor'	=> $this->input->post('nomor',true),
					'tahapan'	=> $this->input->post('tahapan',true) == '' ? 0 : $this->input->post('tahapan',true),
				];

		
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('wa_moupks', $data);
		}else{
			$ins =  $this->db->insert('wa_moupks', $data);

		}
		if ($ins) {
			if ($_FILES) {
			$this->do_upload($id);	
			}
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
		$del = $this->db->delete('wa_moupks');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

	public function getEvidence($sts='',$num,$tahapan='')
	{

		if ($tahapan != '') {
			$this->db->where('id_tahapan like \'%'.$tahapan.'%\'');
		}
		$this->db->where('jns_evidence', $sts);
		$data['get'] = $this->db->get('ms_evidence_moupks')->result();
		$data['num'] = $num;
		$data['append'] = $this->load->view('mou_pks/append_evidence', $data, TRUE);
		echo json_encode($data);
	}


	public function deleteEvidence($id='')
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('fl_mou_pks');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}


	public function do_upload($id)
        {
        	$date = date('Ymdhis');
        	foreach ($_FILES as $key => $value) {
        		
	            if ($_FILES[$key]['name']) {
	            	// die('masuk');
	        		// check type fle upload
					$ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
					$jenis_perjanjian = $this->input->post('jenis_perjanjian',true);
					$status_perjanjian = $this->input->post('status_perjanjian',true);
	        		$jenis_evidence = str_replace('upload_evidence', '', $key);
					$jenis_evidence = $this->input->post('jenis_evidence'.$jenis_evidence,true);
					// $name = $id.'_'.$jenis_perjanjian.'_'.$jenis_evidence.'_'.$date.'.'.$ext;
	    //     		// exit();
	    //     		$_FILES[$key]['name'] = $name;       
	        		$allowed_type = array('image/jpeg'=>1,'image/jpg'=>1,'image/png'=>1,'image/gif'=>1,'application/pdf'=>1);
					$filetype = mime_content_type($_FILES[$key]['tmp_name']);

					if (@$allowed_type[$filetype]) {
					}else{
						echo json_encode(['sts' => 'fail', 'msg' => 'Type FIle Salah atatu File Rusak!']);
						exit();
					}	


	    		
					

	    			// $_FILES['files']['name'] = $name;

	                $config['upload_path']          = './uploads/mou_pks/';
	                $config['allowed_types']        = 'pdf|jpeg|jpg|png';
	                // $config['file_name']			= $name;
	                // $config['max_size']             = 100;
	                // $config['max_width']            = 1024;
	                // $config['max_height']           = 768;

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload($key))
	                {
	                	                        $error = array('error' => $this->upload->display_errors());

						 echo  json_encode(['sts' => 'fail','msg' => 'Upload gagal!','error' => $error]);
	                	                       ;
	                }
	                else
	                {
	                	
	                		$data = [
	                    			'file_name' => $this->upload->data()['file_name'],
	                    			'dir_name' => 'uploads/mou_pks/'.$this->upload->data()['file_name'],
	                    			'moupks_id' => $id,
	                    			'jenis_evidence' => $jenis_evidence,
	                    			'jenis_perjanjian' => $jenis_perjanjian,
	                    			'status_perjanjian' => $status_perjanjian,
	                    		];
	                    	$this->db->insert('fl_mou_pks', $data);

										    	
	                }
	        	}else{
						// echo json_encode(['sts' => 'success','msg' => 'Upload Lampiran Sukses!']);
	        	}
        	}
        	
        }
    public function get_evidence($id='')
    {
    	$this->db->where('id', $id);
    	$get = $this->db->get('v_evidence_moupks')->result();
    	$str='';
    	if ($get) {
    		foreach ($get as $key => $value) {
    			$no = $key+1;
    			$str .= '<tr><td>'.$no.'</td><td>'.$value->nama.'</td><td><a type="button" target="_blank" href="'.base_url().$value->dir_name.'" class="btn btn-warning"><i class="fas fa-eye"></i></a></td></tr>';
    		}
    	}

    	echo json_encode($str);

    }
}

/* End of file moupks.php */
/* Location: ./application/controllers/Master_skala_usaha.php */