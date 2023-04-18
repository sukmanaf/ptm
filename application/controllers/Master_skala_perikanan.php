<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_skala_perikanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('GlobalModel','global');
	}

	public function index()
	{
		$data['title'] = 'Home - Masterdata - Admin Pusat - Master Skala Perikanan';
		$this->skin->view('Master_skala_perikanan/index',$data);
	}
	
	public function get_all()
	{
		$get=$this->global->get_all('ms_skala_perikanan');
		$data = [];
		foreach ($get as $key => $value) {
			$a = [
				$key+1,@$value->jenis_usaha,
					'<a type="button" href="'.base_url('Master_skala_perikanan/edit/').$value->id.'" class="btn btn-success"><i class="fas fa-edit"></i></a>'.
					'<button type="button" id="del" onclick="dels('.$value->id.')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button>'
				
			];
			array_push($data,$a);
		}

		echo json_encode($data);
	}


	public function add()
	{

		$data['nik']=$this->db->get('wa_kuesioner_re')->result();
		$data['title']= 'Home - Masterdata - Admin Pusat - Master Skala Perikanan - Baru';
		$this->skin->view('master_skala_perikanan/add',$data);
	}

	public function create()
	{

		$data = [
					'abalone_hukum' => $this->input->post('abalone_hukum',true),
				    'abalone_modal' => $this->input->post('abalone_modal',true),
				    'abalone_pekerja' => $this->input->post('abalone_pekerja',true),
				    'abalone_penjualan' => $this->input->post('abalone_penjualan',true),
				    'abalone_teknologi' => $this->input->post('abalone_teknologi',true),
				    'abalone_volume' => $this->input->post('abalone_volume',true),
				    'air_payau_hukum' => $this->input->post('air_payau_hukum',true),
				    'air_payau_modal' => $this->input->post('air_payau_modal',true),
				    'air_payau_pekerja' => $this->input->post('air_payau_pekerja',true),
				    'air_payau_teknologi' => $this->input->post('air_payau_teknologi',true),
				    'air_payau_volume' => $this->input->post('air_payau_volume',true),
				    'air_tawar_hukum' => $this->input->post('air_tawar_hukum',true),
				    'air_tawar_modal' => $this->input->post('air_tawar_modal',true),
				    'air_tawar_pekerja' => $this->input->post('air_tawar_pekerja',true),
				    'air_tawar_teknologi' => $this->input->post('air_tawar_teknologi',true),
				    'air_tawar_volume' => $this->input->post('air_tawar_volume',true),
				    'bandeng_hukum' => $this->input->post('bandeng_hukum',true),
				    'bandeng_modal' => $this->input->post('bandeng_modal',true),
				    'bandeng_pekerja' => $this->input->post('bandeng_pekerja',true),
				    'bandeng_penjualan' => $this->input->post('bandeng_penjualan',true),
				    'bandeng_teknologi' => $this->input->post('bandeng_teknologi',true),
				    'bandeng_volume_ekstensif' => $this->input->post('bandeng_volume_ekstensif',true),
				    'bandeng_volume_intensif' => $this->input->post('bandeng_volume_intensif',true),
				    'ikan_hukum' => $this->input->post('ikan_hukum',true),
				    'ikan_modal' => $this->input->post('ikan_modal',true),
				    'ikan_pekerja' => $this->input->post('ikan_pekerja',true),
				    'ikan_penjualan' => $this->input->post('ikan_penjualan',true),
				    'ikan_teknologi' => $this->input->post('ikan_teknologi',true),
				    'ikan_volume' => $this->input->post('ikan_volume',true),
				    'jenis_usaha' => $this->input->post('jenis_usaha',true),
				    'kad_hukum' => $this->input->post('kad_hukum',true),
				    'kad_modal' => $this->input->post('kad_modal',true),
				    'kad_pekerja' => $this->input->post('kad_pekerja',true),
				    'kad_penjualan' => $this->input->post('kad_penjualan',true),
				    'kad_teknologi' => $this->input->post('kad_teknologi',true),
				    'kad_volume' => $this->input->post('kad_volume',true),
				    'kat_hukum' => $this->input->post('kat_hukum',true),
				    'kat_modal' => $this->input->post('kat_modal',true),
				    'kat_pekerja' => $this->input->post('kat_pekerja',true),
				    'kat_penjualan' => $this->input->post('kat_penjualan',true),
				    'kat_teknologi' => $this->input->post('kat_teknologi',true),
				    'kat_volume' => $this->input->post('kat_volume',true),
				    'kekerangan_hukum' => $this->input->post('kekerangan_hukum',true),
				    'kekerangan_modal' => $this->input->post('kekerangan_modal',true),
				    'kekerangan_pekerja' => $this->input->post('kekerangan_pekerja',true),
				    'kekerangan_penjualan' => $this->input->post('kekerangan_penjualan',true),
				    'kekerangan_teknologi' => $this->input->post('kekerangan_teknologi',true),
				    'kekerangan_volume' => $this->input->post('kekerangan_volume',true),
				    'keramba_hukum' => $this->input->post('keramba_hukum',true),
				    'keramba_modal' => $this->input->post('keramba_modal',true),
				    'keramba_pekerja' => $this->input->post('keramba_pekerja',true),
				    'keramba_penjualan' => $this->input->post('keramba_penjualan',true),
				    'keramba_teknologi' => $this->input->post('keramba_teknologi',true),
				    'keramba_volume' => $this->input->post('keramba_volume',true),
				    'kja_hukum' => $this->input->post('kja_hukum',true),
				    'kja_modal' => $this->input->post('kja_modal',true),
				    'kja_pekerja' => $this->input->post('kja_pekerja',true),
				    'kja_penjualan' => $this->input->post('kja_penjualan',true),
				    'kja_teknologi' => $this->input->post('kja_teknologi',true),
				    'kja_volume' => $this->input->post('kja_volume',true),
				    'mina_padi_hukum' => $this->input->post('mina_padi_hukum',true),
				    'mina_padi_modal' => $this->input->post('mina_padi_modal',true),
				    'mina_padi_pekerja' => $this->input->post('mina_padi_pekerja',true),
				    'mina_padi_penjualan' => $this->input->post('mina_padi_penjualan',true),
				    'mina_padi_teknologi' => $this->input->post('mina_padi_teknologi',true),
				    'mina_padi_volume' => $this->input->post('mina_padi_volume',true),
				    'policulture_hukum' => $this->input->post('policulture_hukum',true),
				    'policulture_modal' => $this->input->post('policulture_modal',true),
				    'policulture_pekerja' => $this->input->post('policulture_pekerja',true),
				    'policulture_penjualan' => $this->input->post('policulture_penjualan',true),
				    'policulture_teknologi' => $this->input->post('policulture_teknologi',true),
				    'policulture_volume_ekstensif' => $this->input->post('policulture_volume_ekstensif',true),
				    'policulture_volume_intensif' => $this->input->post('policulture_volume_intensif',true),
				    'rumput_laut_hukum' => $this->input->post('rumput_laut_hukum',true),
				    'rumput_laut_modal' => $this->input->post('rumput_laut_modal',true),
				    'rumput_laut_pekerja' => $this->input->post('rumput_laut_pekerja',true),
				    'rumput_laut_penjualan' => $this->input->post('rumput_laut_penjualan',true),
				    'rumput_laut_teknologi' => $this->input->post('rumput_laut_teknologi',true),
				    'rumput_laut_volume' => $this->input->post('rumput_laut_volume',true),
				    'udang_hukum' => $this->input->post('udang_hukum',true),
				    'udang_modal' => $this->input->post('udang_modal',true),
				    'udang_pekerja' => $this->input->post('udang_pekerja',true),
				    'udang_penjualan' => $this->input->post('udang_penjualan',true),
				    'udang_teknologi' => $this->input->post('udang_teknologi',true),
				    'udang_volume_ekstensif' => $this->input->post('udang_volume_ekstensif',true),
				    'udang_volume_intensif' => $this->input->post('udang_volume_intensif',true),
				];
			// $data =[
			// 'abalone_hukum' => 'SIUP',
		 //    'abalone_modal' => '100',
		 //    'abalone_pekerja' => '3',
		 //    'abalone_penjualan' => '360',
		 //    'abalone_teknologi' => 'Insektif',
		 //    'abalone_volume' => '9',
		 //    'air_payau_hukum' => 'TDUP',
		 //    'air_payau_modal' => '100',
		 //    'air_payau_pekerja' => '4',
		 //    'air_payau_teknologi' => 'sepenggal',
		 //    'air_payau_volume' => '100',
		 //    'air_tawar_hukum' => 'TDUK',
		 //    'air_tawar_modal' => '50',
		 //    'air_tawar_pekerja' => '4',
		 //    'air_tawar_teknologi' => 'sepenggal',
		 //    'air_tawar_volume' => '2000',
		 //    'bandeng_hukum' => 'SIUP',
		 //    'bandeng_modal' => '40',
		 //    'bandeng_pekerja' => '4',
		 //    'bandeng_penjualan' => '150',
		 //    'bandeng_teknologi' => 'Eksentif',
		 //    'bandeng_volume_ekstensif' => '5',
		 //    'bandeng_volume_intensif' => '< 6',
		 //    'ikan_hukum' => 'SIUP',
		 //    'ikan_modal' => '100',
		 //    'ikan_pekerja' => '3',
		 //    'ikan_penjualan' => '500',
		 //    'ikan_teknologi' => 'Insektif',
		 //    'ikan_volume' => '2',
		 //    'jenis_usaha' => 'pengendali air',
		 //    'kad_hukum' => 'SIUP',
		 //    'kad_modal' => '50',
		 //    'kad_pekerja' => '2',
		 //    'kad_penjualan' => '60', 
		 //    'kad_teknologi' => 'Intensif',
		 //    'kad_volume' => '500',
		 //    'kat_hukum' => 'SIUP',
		 //    'kat_modal' => '50',
		 //    'kat_pekerja' => '2',
		 //    'kat_penjualan' => '60',
		 //    'kat_teknologi' => 'Intensif',
		 //    'kat_volume' => '1000',
		 //    'kekerangan_hukum' => 'SIUP',
		 //    'kekerangan_modal' => '100',
		 //    'kekerangan_pekerja' => '3',
		 //    'kekerangan_penjualan' => '400',
		 //    'kekerangan_teknologi' => 'Insektif',
		 //    'kekerangan_volume' => '10',
		 //    'keramba_hukum' => 'SIUP',
		 //    'keramba_modal' => '50',
		 //    'keramba_pekerja' => '2',
		 //    'keramba_penjualan' => '60',
		 //    'keramba_teknologi' => 'Intensif',
		 //    'keramba_volume' => '30',
		 //    'kja_hukum' => 'SIUP',
		 //    'kja_modal' => '50',
		 //    'kja_pekerja' => '2',
		 //    'kja_penjualan' => '60',
		 //    'kja_teknologi' => 'Intensif',
		 //    'kja_volume' => '50',
		 //    'mina_padi_hukum' => 'SIUP',
		 //    'mina_padi_modal' => '5',
		 //    'mina_padi_pekerja' => '2',
		 //    'mina_padi_penjualan' => '6',
		 //    'mina_padi_teknologi' => 'Intensif',
		 //    'mina_padi_volume' => '2',
		 //    'policulture_hukum' => 'SIUP',
		 //    'policulture_modal' => '45',
		 //    'policulture_pekerja' => '6',
		 //    'policulture_penjualan' => '175',
		 //    'policulture_teknologi' => 'Eksentif',
		 //    'policulture_volume_ekstensif' => '5',
		 //    'policulture_volume_intensif' => '-',
		 //    'rumput_laut_hukum' => 'SIUP',
		 //    'rumput_laut_modal' => '100',
		 //    'rumput_laut_pekerja' => '3',
		 //    'rumput_laut_penjualan' => '420',
		 //    'rumput_laut_teknologi' => 'Non Insektif',
		 //    'rumput_laut_volume' => '7',
		 //    'udang_hukum' => 'SIUP',
		 //    'udang_modal' => '60',
		 //    'udang_pekerja' => '4',
		 //    'udang_penjualan' => '200',
		 //    'udang_teknologi' => 'Eksentif',
		 //    'udang_volume_ekstensif' => '5',
		 //    'udang_volume_intensif' => '< 3'];
		$ins =  $this->db->insert('ms_skala_perikanan', $data);
		if ($ins) {
			

			echo json_encode(['sts' => 'success','message' => 'Data Berhasil Disimpan!']);
		}else{
			echo json_encode(['sts' => 'fail','message' => 'Data Gagal DIsimpan!']);
		}

	}

	public function edit($id='')
	{
		$data['id'] = $id;
		$data['title']= 'Home - Masterdata - Admin Pusat - Master Skala Perikanan - Baru';
		$data['data'] = $this->global->get_by_one('ms_skala_perikanan',$id,'id');
		$this->skin->view('master_skala_perikanan/edit',$data);

	}

	public function update()
	{
		$id = $this->input->post('id',true);
		$data = $data = [
					'abalone_hukum' => $this->input->post('abalone_hukum',true),
				    'abalone_modal' => $this->input->post('abalone_modal',true),
				    'abalone_pekerja' => $this->input->post('abalone_pekerja',true),
				    'abalone_penjualan' => $this->input->post('abalone_penjualan',true),
				    'abalone_teknologi' => $this->input->post('abalone_teknologi',true),
				    'abalone_volume' => $this->input->post('abalone_volume',true),
				    'air_payau_hukum' => $this->input->post('air_payau_hukum',true),
				    'air_payau_modal' => $this->input->post('air_payau_modal',true),
				    'air_payau_pekerja' => $this->input->post('air_payau_pekerja',true),
				    'air_payau_teknologi' => $this->input->post('air_payau_teknologi',true),
				    'air_payau_volume' => $this->input->post('air_payau_volume',true),
				    'air_tawar_hukum' => $this->input->post('air_tawar_hukum',true),
				    'air_tawar_modal' => $this->input->post('air_tawar_modal',true),
				    'air_tawar_pekerja' => $this->input->post('air_tawar_pekerja',true),
				    'air_tawar_teknologi' => $this->input->post('air_tawar_teknologi',true),
				    'air_tawar_volume' => $this->input->post('air_tawar_volume',true),
				    'bandeng_hukum' => $this->input->post('bandeng_hukum',true),
				    'bandeng_modal' => $this->input->post('bandeng_modal',true),
				    'bandeng_pekerja' => $this->input->post('bandeng_pekerja',true),
				    'bandeng_penjualan' => $this->input->post('bandeng_penjualan',true),
				    'bandeng_teknologi' => $this->input->post('bandeng_teknologi',true),
				    'bandeng_volume_ekstensif' => $this->input->post('bandeng_volume_ekstensif',true),
				    'bandeng_volume_intensif' => $this->input->post('bandeng_volume_intensif',true),
				    'ikan_hukum' => $this->input->post('ikan_hukum',true),
				    'ikan_modal' => $this->input->post('ikan_modal',true),
				    'ikan_pekerja' => $this->input->post('ikan_pekerja',true),
				    'ikan_penjualan' => $this->input->post('ikan_penjualan',true),
				    'ikan_teknologi' => $this->input->post('ikan_teknologi',true),
				    'ikan_volume' => $this->input->post('ikan_volume',true),
				    'jenis_usaha' => $this->input->post('jenis_usaha',true),
				    'kad_hukum' => $this->input->post('kad_hukum',true),
				    'kad_modal' => $this->input->post('kad_modal',true),
				    'kad_pekerja' => $this->input->post('kad_pekerja',true),
				    'kad_penjualan' => $this->input->post('kad_penjualan',true),
				    'kad_teknologi' => $this->input->post('kad_teknologi',true),
				    'kad_volume' => $this->input->post('kad_volume',true),
				    'kat_hukum' => $this->input->post('kat_hukum',true),
				    'kat_modal' => $this->input->post('kat_modal',true),
				    'kat_pekerja' => $this->input->post('kat_pekerja',true),
				    'kat_penjualan' => $this->input->post('kat_penjualan',true),
				    'kat_teknologi' => $this->input->post('kat_teknologi',true),
				    'kat_volume' => $this->input->post('kat_volume',true),
				    'kekerangan_hukum' => $this->input->post('kekerangan_hukum',true),
				    'kekerangan_modal' => $this->input->post('kekerangan_modal',true),
				    'kekerangan_pekerja' => $this->input->post('kekerangan_pekerja',true),
				    'kekerangan_penjualan' => $this->input->post('kekerangan_penjualan',true),
				    'kekerangan_teknologi' => $this->input->post('kekerangan_teknologi',true),
				    'kekerangan_volume' => $this->input->post('kekerangan_volume',true),
				    'keramba_hukum' => $this->input->post('keramba_hukum',true),
				    'keramba_modal' => $this->input->post('keramba_modal',true),
				    'keramba_pekerja' => $this->input->post('keramba_pekerja',true),
				    'keramba_penjualan' => $this->input->post('keramba_penjualan',true),
				    'keramba_teknologi' => $this->input->post('keramba_teknologi',true),
				    'keramba_volume' => $this->input->post('keramba_volume',true),
				    'kja_hukum' => $this->input->post('kja_hukum',true),
				    'kja_modal' => $this->input->post('kja_modal',true),
				    'kja_pekerja' => $this->input->post('kja_pekerja',true),
				    'kja_penjualan' => $this->input->post('kja_penjualan',true),
				    'kja_teknologi' => $this->input->post('kja_teknologi',true),
				    'kja_volume' => $this->input->post('kja_volume',true),
				    'mina_padi_hukum' => $this->input->post('mina_padi_hukum',true),
				    'mina_padi_modal' => $this->input->post('mina_padi_modal',true),
				    'mina_padi_pekerja' => $this->input->post('mina_padi_pekerja',true),
				    'mina_padi_penjualan' => $this->input->post('mina_padi_penjualan',true),
				    'mina_padi_teknologi' => $this->input->post('mina_padi_teknologi',true),
				    'mina_padi_volume' => $this->input->post('mina_padi_volume',true),
				    'policulture_hukum' => $this->input->post('policulture_hukum',true),
				    'policulture_modal' => $this->input->post('policulture_modal',true),
				    'policulture_pekerja' => $this->input->post('policulture_pekerja',true),
				    'policulture_penjualan' => $this->input->post('policulture_penjualan',true),
				    'policulture_teknologi' => $this->input->post('policulture_teknologi',true),
				    'policulture_volume_ekstensif' => $this->input->post('policulture_volume_ekstensif',true),
				    'policulture_volume_intensif' => $this->input->post('policulture_volume_intensif',true),
				    'rumput_laut_hukum' => $this->input->post('rumput_laut_hukum',true),
				    'rumput_laut_modal' => $this->input->post('rumput_laut_modal',true),
				    'rumput_laut_pekerja' => $this->input->post('rumput_laut_pekerja',true),
				    'rumput_laut_penjualan' => $this->input->post('rumput_laut_penjualan',true),
				    'rumput_laut_teknologi' => $this->input->post('rumput_laut_teknologi',true),
				    'rumput_laut_volume' => $this->input->post('rumput_laut_volume',true),
				    'udang_hukum' => $this->input->post('udang_hukum',true),
				    'udang_modal' => $this->input->post('udang_modal',true),
				    'udang_pekerja' => $this->input->post('udang_pekerja',true),
				    'udang_penjualan' => $this->input->post('udang_penjualan',true),
				    'udang_teknologi' => $this->input->post('udang_teknologi',true),
				    'udang_volume_ekstensif' => $this->input->post('udang_volume_ekstensif',true),
				    'udang_volume_intensif' => $this->input->post('udang_volume_intensif',true),
				];
		
		if ($id) {
			$this->db->where('id', $id);
			$ins =  $this->db->update('ms_skala_perikanan', $data);
		}else{
			$ins =  $this->db->insert('ms_skala_perikanan', $data);

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
		$del = $this->db->delete('ms_skala_perikanan');
		if ($del) {
			echo json_encode(['sts' => 'success']);
		}else{
			echo json_encode(['sts' => 'fail']);
		}
	}

}

/* End of file Master_skala_perikanan.php */
/* Location: ./application/controllers/Master_skala_perikanan.php */