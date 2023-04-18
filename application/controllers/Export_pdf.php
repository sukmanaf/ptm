<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_pdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('pdf');
		$this->load->library('pdf_mc_table');
		$this->load->model('globalModel','global');
		$this->load->model('diseminasiModel','diseminasi');
	}
	public function index()
	{
		
	}


	public function fasilitasi_infrastruktur_sarana($kode)
	{

		$datas = $this->global->print_fasilitasi_infrastruktur($kode,'sarana');		


		$pdf = new FPDF('L', 'mm','Letter');
		foreach ($datas as $key => $value) {
	        $pdf->AddPage();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(0,7,'REKAPITULASI DATA PEMETAAN SOSIAL INFRASTRUKTUR SUBJEK REFORMA AGRARIA TAHUN 2023',0,1,'C');
	        $pdf->Cell(10,7,'',0,1);
	        $pdf->SetFont('Arial','',10);
	        $pdf->Cell(30,5,'Propinsi',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_provinsi = ucfirst($value[0]->nama_provinsi);
	        $pdf->Cell(225,5,$nama_provinsi,0,1,'L');
	        $pdf->Cell(30,5,'Kab/Kota',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kab_kota = ucfirst($value[0]->nama_kab_kota);
	        $pdf->Cell(225,5,$nama_kab_kota,0,1,'L');
	        $pdf->Cell(30,5,'Desa/Kel',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kecamatan = ucfirst($value[0]->nama_kecamatan);
	        $pdf->Cell(225,5,$nama_kecamatan,0,1,'L');
	        $pdf->Cell(30,5,'Jumlah KK',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_desa_kelurahan = ucfirst($value[0]->nama_desa_kelurahan);
	        $pdf->Cell(225,5,$nama_desa_kelurahan,0,1,'L');
	        $pdf->Cell(260,10,'',0,1,'L');

			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(67, 88, 186);
	        //parameter list for reference
			// $pdf->Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])

	        $pdf->Cell(10,14,'No',1,0,'C',true);
	        $pdf->Cell(55,14,'Jenis Prasarana',1,0,'C',true);
	        $pdf->Cell(65,7,'Keberadaan %',1,0,'C',true);
	        $pdf->Cell(70,7,'Kondisi %',1,0,'C',true);
	        $pdf->Cell(65,7,'Kepemilikan %',1,1,'C',true);

	        $pdf->Cell(10,7,'',0,0,'C');
	        $pdf->Cell(55,7,'',0,0,'C');
			$pdf->SetFillColor(199, 144, 42);
	        $pdf->Cell(20,7,'Ada',1,0,'C',true);
	        $pdf->Cell(22,7,'Tidak Ada',1,0,'C',true);
	        $pdf->Cell(23,7,'Kosong',1,0,'C',true);
	        $pdf->Cell(18,7,'Baik',1,0,'C',true);
	        $pdf->Cell(18,7,'Cukup ',1,0,'C',true);
	        $pdf->Cell(17,7,'Kurang',1,0,'C',true);
	        $pdf->Cell(17,7,'Kosong',1,0,'C',true);
	        $pdf->Cell(22,7,'Individu ',1,0,'C',true);
	        $pdf->Cell(22,7,'Komunal',1,0,'C',true);
	        $pdf->Cell(21,7,'Lainnya',1,1,'C',true);

			$pdf->SetTextColor(0,0,0);
	        foreach ($value as $k => $v) {
		        $pdf->Cell(10,7,$k+1,1,0,'C');
		        $pdf->Cell(55,7,$v->jenis_prasarana,1,0,'C');
		        $pdf->Cell(20,7,$v->keberadaan_ada,1,0,'C');
		        $pdf->Cell(22,7,$v->keberadaan_tidak_ada,1,0,'C');
		        $pdf->Cell(23,7,$v->keberadaan_kosong,1,0,'C');
		        $pdf->Cell(18,7,$v->kondisi_baik,1,0,'C');
		        $pdf->Cell(18,7,$v->kondisi_cukup,1,0,'C');
		        $pdf->Cell(17,7,$v->kondisi_kurang,1,0,'C');
		        $pdf->Cell(17,7,$v->kondisi_kosong,1,0,'C');
		        $pdf->Cell(22,7,$v->kepemilikan_individu,1,0,'C');
		        $pdf->Cell(22,7,$v->kepemilikan_komunal,1,0,'C');
		        $pdf->Cell(21,7,$v->kepemilikan_lainnya,1,1,'C');
	        }

	        // $pdf->Cell(225,7,'',0,1,'L');
	        
		}
	    
	        // $pdf->SetFont('Arial','',10);

        // $pegawai = $this->db->get('pegawai')->result();
        // $no=0;
        // foreach ($pegawai as $data){
        //     $no++;
        //     $pdf->Cell(10,6,$no,1,0, 'C');
        //     $pdf->Cell(90,6,$data->nama,1,0);
        //     $pdf->Cell(120,6,$data->alamat,1,0);
        //     $pdf->Cell(40,6,$data->telp,1,1);
        // }
        $pdf->Output();
	
	}
	public function fasilitasi_infrastruktur_prasarana($kode)
	{

		$datas = $this->global->print_fasilitasi_infrastruktur($kode,'prasarana');		
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		$pdf = new FPDF('L', 'mm','Letter');
		foreach ($datas as $key => $value) {
	        $pdf->AddPage();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(0,7,'REKAPITULASI DATA PEMETAAN SOSIAL INFRASTRUKTUR SUBJEK REFORMA AGRARIA TAHUN 2023',0,1,'C');
	        $pdf->Cell(10,7,'',0,1);
	        $pdf->SetFont('Arial','',10);
	        $pdf->Cell(30,5,'Propinsi',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_provinsi = ucfirst($value[0]->nama_provinsi);
	        $pdf->Cell(225,5,$nama_provinsi,0,1,'L');
	        $pdf->Cell(30,5,'Kab/Kota',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kab_kota = ucfirst($value[0]->nama_kab_kota);
	        $pdf->Cell(225,5,$nama_kab_kota,0,1,'L');
	        $pdf->Cell(30,5,'Desa/Kel',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kecamatan = ucfirst($value[0]->nama_kecamatan);
	        $pdf->Cell(225,5,$nama_kecamatan,0,1,'L');
	        $pdf->Cell(30,5,'Jumlah KK',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_desa_kelurahan = ucfirst($value[0]->nama_desa_kelurahan);
	        $pdf->Cell(225,5,$nama_desa_kelurahan,0,1,'L');
	        $pdf->Cell(260,10,'',0,1,'L');

			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(67, 88, 186);
	        //parameter list for reference
			// $pdf->Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])

	        $pdf->Cell(10,14,'No',1,0,'C',true);
	        $pdf->Cell(55,14,'Jenis Prasarana',1,0,'C',true);
	        $pdf->Cell(65,7,'Keberadaan %',1,0,'C',true);
	        $pdf->Cell(75,7,'Kondisi %',1,0,'C',true);
	        $pdf->Cell(60,7,'Kepemilikan %',1,1,'C',true);

	        $pdf->Cell(10,7,'',0,0,'C');
	        $pdf->Cell(55,7,'',0,0,'C');
			$pdf->SetFillColor(199, 144, 42);
	        $pdf->Cell(20,7,'Ada',1,0,'C',true);
	        $pdf->Cell(22,7,'Tidak Ada',1,0,'C',true);
	        $pdf->Cell(23,7,'Keterangan',1,0,'C',true);
	        $pdf->Cell(18,7,'Baik',1,0,'C',true);
	        $pdf->Cell(18,7,'Cukup ',1,0,'C',true);
	        $pdf->Cell(19,7,'Kurang',1,0,'C',true);
	        $pdf->Cell(20,7,'Keterangan',1,0,'C',true);
	        $pdf->Cell(20,7,'Individu ',1,0,'C',true);
	        $pdf->Cell(20,7,'Komunal',1,0,'C',true);
	        $pdf->Cell(20,7,'Lainnya',1,1,'C',true);

			$pdf->SetTextColor(0,0,0);
	        foreach ($value as $k => $v) {
		        $pdf->Cell(10,7,$k+1,1,0,'C');
		        $pdf->Cell(55,7,$v->jenis_prasarana,1,0,'C');
		        $pdf->Cell(20,7,$v->keberadaan_ada,1,0,'C');
		        $pdf->Cell(22,7,$v->keberadaan_tidak_ada,1,0,'C');
		        $pdf->Cell(23,7,$v->keberadaan_keterangan,1,0,'C');
		        $pdf->Cell(18,7,$v->kondisi_baik,1,0,'C');
		        $pdf->Cell(18,7,$v->kondisi_cukup,1,0,'C');
		        $pdf->Cell(19,7,$v->kondisi_kurang,1,0,'C');
		        $pdf->Cell(20,7,$v->kondisi_keterangan,1,0,'C');
		        $pdf->Cell(20,7,$v->kepemilikan_individu,1,0,'C');
		        $pdf->Cell(20,7,$v->kepemilikan_komunal,1,0,'C');
		        $pdf->Cell(20,7,$v->kepemilikan_lainnya,1,1,'C');
	        }

	        // $pdf->Cell(225,7,'',0,1,'L');
	        
		}
	    
	        // $pdf->SetFont('Arial','',10);

        // $pegawai = $this->db->get('pegawai')->result();
        // $no=0;
        // foreach ($pegawai as $data){
        //     $no++;
        //     $pdf->Cell(10,6,$no,1,0, 'C');
        //     $pdf->Cell(90,6,$data->nama,1,0);
        //     $pdf->Cell(120,6,$data->alamat,1,0);
        //     $pdf->Cell(40,6,$data->telp,1,1);
        // }
        $pdf->Output();
	
	}


	public function pengembangan_usaha_a($kode)
	{

		$datas = $this->global->print_pengembangan($kode);		
		
		$pdf = new PDF_MC_Table('L', 'mm','Letter');
		foreach ($datas as $k => $v) {
			
		    $pdf->AddPage();

			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,"DATABASE SUBJEK PARA TAHUN 2021 PADA KEGIATAN PENGEMBANGAN USAHA DAN",0,1,'C');
			$pdf->Cell(0,5,"FASILITASI AKSES PEMASARAN TAHUN 2023 (KETIGA)",0,1,'C');
			$pdf->Cell(0,5,"KATEGORI 1",0,1,'C');
			$pdf->Cell(0,10,"",0,1,'C');
			$pdf->SetFont('Arial','',10);
	        
	        $pdf->Cell(30,5,'Propinsi',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_provinsi = ucfirst($v[0]->nama_provinsi);
	        $pdf->Cell(225,5,$nama_provinsi,0,1,'L');
	        $pdf->Cell(30,5,'Kab/Kota',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kab_kota = ucfirst($v[0]->nama_kab_kota);
	        $pdf->Cell(225,5,$nama_kab_kota,0,1,'L');
	        $pdf->Cell(30,5,'Desa/Kel',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kecamatan = ucfirst($v[0]->nama_kecamatan);
	        $pdf->Cell(225,5,$nama_kecamatan,0,1,'L');
	        $pdf->Cell(30,5,'Jumlah KK',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_desa_kelurahan = ucfirst($v[0]->nama_desa_kelurahan);
	        $pdf->Cell(225,5,$nama_desa_kelurahan,0,1,'L');
	        $pdf->Cell(260,10,'',0,1,'L');
			$pdf->SetWidths(Array(10,35,27,25,25,20,22,20,20,22,22,20));
			$pdf->SetLineHeight(5);
			$pdf->SetAligns(Array('C','L','C','C','C','C','C','C','C','C','C','C'));
			$pdf->SetFont('Arial','B',8);
			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(67, 88, 186);

			$pdf->Cell(10,14,"No",1,0,'C',true);
			$pdf->Cell(35,14,"Nama Subjek",1,0,'C',true);
			$pdf->Cell(27,14,"NIK",1,0,'C',true);
			$pdf->Cell(25,3.5,"Keanggotaan ","LTR",0,'C',true);
			$pdf->Cell(25,3.5,"","LTR",0,'C',true);
			$pdf->Cell(20,3.5,"","LTR",0,'C',true);
			$pdf->Cell(22,3.5,"","LTR",0,'C',true);
			$pdf->Cell(20,3.5,"","LTR",0,'C',true);
			$pdf->Cell(20,3.5,"Kapasitas ","LTR",0,'C',true);
			$pdf->Cell(22,3.5,"","LTR",0,'C',true);
			$pdf->Cell(22,3.5,"","LTR",0,'C',true);
			$pdf->Cell(20,3.5,"","TR",1,'C',true);

			$pdf->Cell(72,3.5," ",0,0,'C');
			$pdf->Cell(25,3.5,"Dalam ","L",0,'C',true);
			$pdf->Cell(25,3.5,"Nama","L",0,'C',true);
			$pdf->Cell(20,3.5,"Sektor","L",0,'C',true);
			$pdf->Cell(22,3.5,"Komoditas","L",0,'C',true);
			$pdf->Cell(20,3.5,"Luas","L",0,'C',true);
			$pdf->Cell(20,3.5,"Penjualan ","L",0,'C',true);
			$pdf->Cell(22,3.5,"Akses","L",0,'C',true);
			$pdf->Cell(22,3.5,"Kebutuhan","L",0,'C',true);
			$pdf->Cell(20,3.5,"","LR",1,'C',true);

			$pdf->Cell(72,3.5," ",0,0,'C');
			$pdf->Cell(25,3.5,"kelompok ","L",0,'C',true);
			$pdf->Cell(25,3.5,"Kelompok","L",0,'C',true);
			$pdf->Cell(20,3.5,"Usaha","L",0,'C',true);
			$pdf->Cell(22,3.5,"/ Jenis","L",0,'C',true);
			$pdf->Cell(20,3.5,"Aset","L",0,'C',true);
			$pdf->Cell(20,3.5,"Tahunan ","L",0,'C',true);
			$pdf->Cell(22,3.5,"Pemasaran","L",0,'C',true);
			$pdf->Cell(22,3.5,"Akses","L",0,'C',true);
			$pdf->Cell(20,3.5,"Kendala","LR",1,'C',true);

			$pdf->Cell(72,3.5," ",0,0,'C');
			$pdf->Cell(25,3.5,"(Jika Ada) ","LB",0,'C',true);
			$pdf->Cell(25,3.5,"Jika Ada","LB",0,'C',true);
			$pdf->Cell(20,3.5,"","LB",0,'C',true);
			$pdf->Cell(22,3.5,"Usaha","LB",0,'C',true);
			$pdf->Cell(20,3.5,"Tanah","LB",0,'C',true);
			$pdf->Cell(20,3.5,"(rerata) ","LB",0,'C',true);
			$pdf->Cell(22,3.5,"","LB",0,'C',true);
			$pdf->Cell(22,3.5,"","LB",0,'C',true);
			$pdf->Cell(20,3.5,"","LBR",1,'C',true);

			$pdf->SetTextColor(0,0,0);

			$pdf->SetFont('Arial','',8);
			foreach ($v as $key => $value) {
			// echo "<pre>";
			// 	print_r ($v);
			// 	echo "</pre>";exit();	
			 $pdf->Row(Array(
					$key+1,
					$value->nama_responden_utama,
					$value->nik,
					$value->kelompok,
					$value->nama_kelompok,
					$value->sektor_usaha,
					$value->sektor_usaha,
					$value->luas_tanah,
					$value->kapasitas,
					$value->akses_pemasaran,
					$value->kebutuhan_akses,
					$value->kendala,
			 ));
			}
		}

		// =========================
		
        $pdf->Output();
	
	}
	public function pengembangan_usaha_b($kode)
	{

		$datas = $this->global->print_pengembangan($kode);		
		
		$pdf = new PDF_MC_Table('L', 'mm','Letter');
		foreach ($datas as $k => $v) {

		    $pdf->AddPage();

			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,"DATABASE SUBJEK PARA TAHUN 2021 PADA KEGIATAN PENGEMBANGAN USAHA DAN",0,1,'C');
			$pdf->Cell(0,5,"FASILITASI AKSES PEMASARAN TAHUN 2023 (KETIGA)",0,1,'C');
			$pdf->Cell(0,5,"KATEGORI 2",0,1,'C');
			$pdf->Cell(0,10,"",0,1,'C');

			$pdf->SetFont('Arial','',8);
			$pdf->Cell(30,5,'Propinsi',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_provinsi = ucfirst($v[0]->nama_provinsi);
	        $pdf->Cell(225,5,$nama_provinsi,0,1,'L');
	        $pdf->Cell(30,5,'Kab/Kota',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kab_kota = ucfirst($v[0]->nama_kab_kota);
	        $pdf->Cell(225,5,$nama_kab_kota,0,1,'L');
	        $pdf->Cell(30,5,'Desa/Kel',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kecamatan = ucfirst($v[0]->nama_kecamatan);
	        $pdf->Cell(225,5,$nama_kecamatan,0,1,'L');
	        $pdf->Cell(30,5,'Jumlah KK',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_desa_kelurahan = ucfirst($v[0]->nama_desa_kelurahan);
	        $pdf->Cell(225,5,$nama_desa_kelurahan,0,1,'L');
	        $pdf->Cell(260,10,'',0,1,'L');

			$pdf->SetWidths(Array(10,55,35,45,45,25,45,45,25,45));
			$pdf->SetLineHeight(5);
			$pdf->SetAligns(Array('C','L','C','C','C','C','C','C','C','C','C','C'));
			$pdf->SetFont('Arial','B',8);
			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(67, 88, 186);

			$pdf->Cell(10,10,"No",1,0,'C',true);
			$pdf->Cell(55,10,"Nama Subjek",1,0,'C',true);
			$pdf->Cell(35,10,"NIK",1,0,'C',true);
			$pdf->Cell(45,5,"Keanggotaan Dalam ","LTR",0,'C',true);
			$pdf->Cell(45,5,"Nama Kelompok ","LTR",0,'C',true);
			$pdf->Cell(25,5,"Luas Aset ","LTR",0,'C',true);
			$pdf->Cell(45,5,"Keterangan ","LTR",1,'C',true);

			$pdf->Cell(100,5,"",0,0,'C');
			$pdf->Cell(45,5,"Kelompok (Jika Ada) ","LBR",0,'C',true);
			$pdf->Cell(45,5,"(Jika Ada)","LBR",0,'C',true);
			$pdf->Cell(25,5,"Tanah ","LBR",0,'C',true);
			$pdf->Cell(45,5,"(Jika Ada)","LBR",1,'C',true);

			$pdf->SetTextColor(0,0,0);

			$pdf->SetFont('Arial','',8);
			foreach ($v as $key => $value) {
				
			 $pdf->Row(Array(
					$key+1,
					$value->nama_responden_utama,
					$value->nik,
					$value->kelompok,
					$value->nama_kelompok,
					$value->luas_tanah,
					$value->keterangan,
			 ));
			}
		}
		// // =========================
		
        $pdf->Output();
	
	}

	public function fasilitasi_akses($kode)
	{

		$datas = $this->global->print_fasilitasi_akses($kode,'sarana');		
		// echo "<pre>";
		// print_r ($datas);
		// echo "</pre>";exit();
		// $pdf = new FPDF('L', 'mm','Letter');
		$pdf = new PDF_MC_Table('L', 'mm','Letter');

		foreach ($datas as $key => $value) {
	        $pdf->AddPage();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(0,7,'CHECKLIST KEBUTUHAN PENGEMBANGAN USAHA DAN FASILITASI AKSES PEMASARAN',0,1,'C');
	        $pdf->Cell(0,7,'REFORMA AGRARIA TAHUN 2023 ',0,1,'C');
	        $pdf->Cell(10,7,'',0,1);
	        $pdf->SetFont('Arial','',10);
	        $pdf->Cell(30,5,'Propinsi',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_provinsi = ucfirst($value[0]->nama_provinsi);
	        $pdf->Cell(225,5,$nama_provinsi,0,1,'L');
	        $pdf->Cell(30,5,'Kab/Kota',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kab_kota = ucfirst($value[0]->nama_kab_kota);
	        $pdf->Cell(225,5,$nama_kab_kota,0,1,'L');
	        $pdf->Cell(30,5,'Desa/Kel',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kecamatan = ucfirst($value[0]->nama_kecamatan);
	        $pdf->Cell(225,5,$nama_kecamatan,0,1,'L');
	        $pdf->Cell(30,5,'Jumlah KK',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_desa_kelurahan = ucfirst($value[0]->nama_desa_kelurahan);
	        $pdf->Cell(225,5,$nama_desa_kelurahan,0,1,'L');
	        $pdf->Cell(260,10,'',0,1,'L');

	        $pdf->SetFont('Arial','',8);
			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(67, 88, 186);
	        //parameter list for reference
			// $pdf->Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])

	        $pdf->Cell(10,18,'No',1,0,'C',true);
	        $pdf->Cell(50,18,'Nama Subjek',1,0,'C',true);
	        $pdf->Cell(25,5,'nama','LRT',0,'C',true);
	        $pdf->Cell(25,5,'','LRT',0,'C',true);
	        $pdf->Cell(25,5,'','LRT',0,'C',true);
	        $pdf->Cell(60,5,' Pengembangan','LRT',0,'C',true);
	        $pdf->Cell(30,5,' Pengembangan','LRT',0,'C',true);
	        $pdf->Cell(30,5,'Pengembangan ','LRT',1,'C',true);

	        $pdf->Cell(60,0,'',0,0,'C');
	        $pdf->Cell(25,5,'Kelompok','LR',0,'C',true);
	        $pdf->Cell(25,5,'Skala','LR',0,'C',true);
	        $pdf->Cell(25,5,'Komoditas','LR',0,'C',true);
	        $pdf->Cell(60,5,'Management Bisnis','LBR',0,'C',true);
	        $pdf->Cell(30,5,'Produk','LBR',0,'C',true);
	        $pdf->Cell(30,5,'Akses Pemasaran ','LBR',1,'C',true);

	        $pdf->Cell(60,0,'',0,0,'C');
	        $pdf->Cell(25,5,'(Jika Ada)','RL',0,'C',true);
	        $pdf->Cell(25,5,'Usaha','RL',0,'C',true);
	        $pdf->Cell(25,5,'/ Produk','RL',0,'C',true);
			$pdf->SetFillColor(199, 144, 42);
	        $pdf->Cell(20,8,'Keuangan','RL',0,'C',true);
	        $pdf->Cell(20,8,'SDM','RL',0,'C',true);
	        $pdf->Cell(20,8,'Produksi ','RL',0,'C',true);
	        $pdf->Cell(15,4,'Inovasi ','RL',0,'C',true);
	        $pdf->Cell(15,4,'Komersiali ','RL',0,'C',true);
	        $pdf->Cell(15,8,'Online ','RL',0,'C',true);
	        $pdf->Cell(15,8,'Offline ','RL',1,'C',true);
	        
	        $pdf->Cell(60,0,'',1,0,'C');
	        $yy = $pdf->getY();
	        $xx = $pdf->getx();
	        $pdf->setY($yy-4);
	        $pdf->setX($xx);
			$pdf->SetFillColor(67, 88, 186);

	        $pdf->Cell(25,4,'','RL',0,'C',true);
	        $pdf->Cell(25,4,'','RL',0,'C',true);
	        $pdf->Cell(25,4,'','RL',0,'C',true);
	        $pdf->Cell(60,0,'',0,0,'C');
			$pdf->SetFillColor(199, 144, 42);

	        $pdf->Cell(15,4,'Teknologi',"RL",0,'C',true);
	        $pdf->Cell(15,4,'sasi',"RL",1,'C',true);
	        // $pdf->Cell(10,7,'',0,0,'C');
	        // $pdf->Cell(55,7,'',0,0,'C');
	        // $pdf->Cell(20,7,'Ada',1,0,'C',true);
	        // $pdf->Cell(22,7,'Tidak Ada',1,0,'C',true);
	        // $pdf->Cell(23,7,'Kosong',1,0,'C',true);
	        // $pdf->Cell(18,7,'Baik',1,0,'C',true);
	        // $pdf->Cell(18,7,'Cukup ',1,0,'C',true);
	        // $pdf->Cell(17,7,'Kurang',1,0,'C',true);
	        // $pdf->Cell(17,7,'Kosong',1,0,'C',true);
	        // $pdf->Cell(22,7,'Individu ',1,0,'C',true);
	        // $pdf->Cell(22,7,'Komunal',1,0,'C',true);
	        // $pdf->Cell(21,7,'Lainnya',1,1,'C',true);

			$pdf->SetTextColor(0,0,0);
			$pdf->SetWidths(Array(10,50,25,25,25,20,20,20,15,15,15,15));
			$pdf->SetLineHeight(5);
			$pdf->SetAligns(Array('C','L','C','C','C','C','C','C','C','C','C','C'));
			foreach ($value as $k => $v) {
				$keuangan = $v->keuangan == 'lainnya' ? $v->keuangan_lainnya : $v->keuangan;
				$sdm = $v->sdm == 'lainnya' ? $v->sdm_lainnya : $v->sdm;
				$produksi = $v->produksi == 'lainnya' ? $v->produksi_lainnya : $v->produksi;
				$inovasitekno = $v->inovasitekno == 'lainnya' ? $v->inovasitekno_lainnya : $v->inovasitekno;
				$komersialisasi = $v->komersialisasi == 'lainnya' ? $v->komersialisasi_lainnya : $v->komersialisasi;
				$online = $v->pengembangan_akses_pemasaran == 1 ? '4' : '6';
				$Offline = $v->pengembangan_akses_pemasaran == 0 ? '4' : '6';
				$xx = $pdf->getX();
				$yy = $pdf->getY();
				$pdf->Row(Array(
					$k+1,
					$v->nama_responden_utama,
					$v->kelompok,
					$v->nama_kelompok,
					@$v->skala_usaha,
					$keuangan,
					$sdm,
					$produksi,
					$inovasitekno,
					$komersialisasi,
			 	));
				$newY = $pdf->getY();
				$y = $newY-$yy;
				$pdf->SetFont('ZapfDingbats','', 10);
	        	$pdf->setY($yy);
	        	$pdf->Cell(225,0,'','RL',0,'C');
	        	$pdf->Cell(15,$y,$online,'RBTL',0,'C');
	        	$pdf->Cell(15,$y,$Offline,'RBTL',1,'C');
	        	$pdf->SetFont('Arial','',8);


			}	        
		}
	    

        $pdf->Output();
	
	}

	
	public function diseminasi($kode)
	{

		$datas = $this->global->print_diseminasi($kode);		
		
		$pdf = new PDF_MC_Table('L', 'mm','Letter');
		foreach ($datas as $k => $v) {
		    $pdf->AddPage();

			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,"Subjek Yang Mendapatkan Pendampingan Kegiatan Pengembangan Usaha Dan Akses Pemasaran",0,1,'C');
			$pdf->Cell(0,10,"",0,1,'C');

			$pdf->SetFont('Arial','',8);
			$pdf->Cell(30,5,'Propinsi',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_provinsi = ucfirst($v[0]->nama_provinsi);
	        $pdf->Cell(225,5,$nama_provinsi,0,1,'L');
	        $pdf->Cell(30,5,'Kab/Kota',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kab_kota = ucfirst($v[0]->nama_kab_kota);
	        $pdf->Cell(225,5,$nama_kab_kota,0,1,'L');
	        $pdf->Cell(30,5,'Desa/Kel',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');
	        $nama_kecamatan = ucfirst($v[0]->nama_kecamatan);
	        $pdf->Cell(225,5,$nama_kecamatan,0,1,'L');
	        $pdf->Cell(30,5,'Jumlah KK',0,0,'L');
	        $pdf->Cell(5,5,':',0,0,'L');

	        $nama_desa_kelurahan = ucfirst($v[0]->nama_desa_kelurahan);
	        $pdf->Cell(225,5,$nama_desa_kelurahan,0,1,'L');
	        $pdf->Cell(260,10,'',0,1,'L');

			$pdf->SetWidths(Array(10,60,35,35,35,40,40));
			$pdf->SetLineHeight(5);
			$pdf->SetAligns(Array('C','L','C','C','C','C','C'));
			$pdf->SetFont('Arial','B',8);
			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(67, 88, 186);

			$pdf->Cell(10,7,"No",1,0,'C',true);
			$pdf->Cell(60,7,"Nama Subject",1,0,'C',true);
			$pdf->Cell(35,7,"NIK",1,0,'C',true);
			$pdf->Cell(35,7,"Nama Kelompok Usaha",1,0,'C',true);
			$pdf->Cell(35,7,"Komoditas /Produk",1,0,'C',true);
			$pdf->Cell(40,7,"Jenis Pendampingan",1,0,'C',true);
			$pdf->Cell(40,7,"Keterangan",1,1,'C',true);


			$pdf->SetTextColor(0,0,0);

			$pdf->SetFont('Arial','',8);
			foreach ($v as $key => $value) {
				
			 $pdf->Row(Array(
					$key+1,
					$value->nama_responden_utama,
					$value->nik,
					$value->nama_kelompok,
					$value->nama_kelompok,
					$value->nama_kelompok,
					$value->keterangan,
			 ));
			}
		}
		// =========================
		
        $pdf->Output();
	
	}

	public function diseminasi_not_in($kode)
	{

		$datas = $this->global->print_diseminasi_not_in($kode);		
			
		// echo "<pre>";
		// print_r ($datas);
		// echo "</pre>";exit();
		$pdf = new PDF_MC_Table('P', 'mm','Letter');
		foreach ($datas as $k => $v) {
		    $pdf->AddPage();

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,5,"Subjek Yang Tidak Mendapatkan Pendampingan Kegiatan ",0,1,'C');
		$pdf->Cell(0,5,"Pengembangan Usaha Dan Akses Pemasaran",0,1,'C');
		$pdf->Cell(0,10,"",0,1,'C');

		$pdf->SetWidths(Array(10,70,35,40,40));
		$pdf->SetLineHeight(5);
		$pdf->SetAligns(Array('C','L','C','C','C'));
		$pdf->SetFont('Arial','B',8);
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFillColor(67, 88, 186);

		$pdf->Cell(10,7,"No",1,0,'C',true);
		$pdf->Cell(70,7,"Nama Subject",1,0,'C',true);
		$pdf->Cell(35,7,"NIK",1,0,'C',true);
		$pdf->Cell(40,7,"Jenis Usaha",1,0,'C',true);
		$pdf->Cell(40,7,"Keterangan",1,1,'C',true);


		$pdf->SetTextColor(0,0,0);

		$pdf->SetFont('Arial','',8);
		foreach ($v as $key => $value) {
			
		 $pdf->Row(Array(
				$key+1,
				$value->nama_responden_utama,
				$value->nik,
				$value->keterangan,
				$value->keterangan,
		 ));
		}

		}
				// =========================
		
        $pdf->Output();
	
	}

}

/* End of file export_pdf.php */
/* Location: ./application/controllers/export_pdf.php */