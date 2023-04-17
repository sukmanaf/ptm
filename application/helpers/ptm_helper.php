<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function tanggal_indonesia($tanggal) {

	$date = date('Y-m-d', strtotime($tanggal)); // ubah sesuai format penanggalan standart

	$bulan = array('01' => 'Januari', // array bulan konversi
		'02'                => 'Februari',
		'03'                => 'Maret',
		'04'                => 'April',
		'05'                => 'Mei',
		'06'                => 'Juni',
		'07'                => 'Juli',
		'08'                => 'Agustus',
		'09'                => 'September',
		'10'                => 'Oktober',
		'11'                => 'November',
		'12'                => 'Desember',
	);
	$date = explode('-', $date); // ubah string menjadi array dengan paramere '-'

	return $date[2] . ' ' . $bulan[$date[1]] . ' ' . $date[0]. ' ' . @$date[3]; // hasil yang di kembalikan
}

function tanggal_indonesia_jam($tanggal) {

	$date = date('Y-m-d-h:i:s', strtotime($tanggal)); // ubah sesuai format penanggalan standart

	$bulan = array('01' => 'Januari', // array bulan konversi
		'02'                => 'Februari',
		'03'                => 'Maret',
		'04'                => 'April',
		'05'                => 'Mei',
		'06'                => 'Juni',
		'07'                => 'Juli',
		'08'                => 'Agustus',
		'09'                => 'September',
		'10'                => 'Oktober',
		'11'                => 'November',
		'12'                => 'Desember',
	);
	$date = explode('-', $date); // ubah string menjadi array dengan paramere '-'

	return $date[2] . ' ' . $bulan[$date[1]] . ' ' . $date[0]. ' Pukul ' . @$date[3]; // hasil yang di kembalikan
}

function rupiah($angka,$koma=''){
	$koma = $koma == '' ? 0 : $koma;
	$hasil_rupiah = "Rp " . number_format($angka,$koma,',','.');
	return $hasil_rupiah;
 
}
 function format_number($angka,$koma=''){
	$koma = $koma == '' ? 0 : $koma;
	$hasil_rupiah =number_format($angka,$koma,',','.');
	return $hasil_rupiah;
 
}
 
?>