<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpan_data_api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('GlobalModel', 'global');
    }

    public function index()
    {
        $apiData = file_get_contents('https://api-interop.atrbpn.go.id/api/internal/dirjenpenataan/dirptm/datadesa');

        // Ubah data dari format JSON ke array PHP
        $dataArray = json_decode($apiData, true);

        // Load model database

        // Looping untuk setiap data dalam array
        foreach ($dataArray as $data) {
            // Simpan data ke database menggunakan model
            $this->global->insertData($data);
            // print_r("<pre>");
            // print_r($key);
            // print_r("</pre>");
        }
    }
}

/* End of file sektor_usaha.php */
/* Location: ./application/controllers/sektor_usaha.php */