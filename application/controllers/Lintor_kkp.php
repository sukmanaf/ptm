<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lintor_kkp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('GlobalModel', 'global');
    }

    public function index()
    {
        $data['title'] = 'Home - Manajemen File- Lintor KKP ';
        $this->skin->view('lintor_kkp/index', $data);
    }
    function download_template()
    {
        $data['db'] = $this->db->get('wa_lintor_kkp')->result_array();

        $this->load->view('lintor_kkp/temp_excel', $data);
    }
    public function generateXls()
    {
        // create file name
        $fileName = 'data-' . time() . '.xlsx';
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->db->get('wa_lintor_kkp')->result();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nomor');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Petani');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Alamat KTP dan Domisili');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nomor SK pengesahan');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Nomor Register');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Nama Kelompok Tani');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Bantuan/Fasiltasi/Pendampingan yang Pernah Diberikan ');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Keterangan');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->nomor);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->nama_petani);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->alamat);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->nomor_sk_pengesahan);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->nomor_register);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->nama_kelompok_tani);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->bantuan_pernah_diterima);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->keterangan);
            $rowCount++;
        }
        $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');
    }

    function tampildata($table = '', $colum = '', $val_colum = '', $combo = '')
    {
        // $table='data_kegiatan';
        $tab = explode("~", $table)[0];

        if ($combo != '') {
            $nama = explode("~", $table)[1];
            $kode = explode("~", $table)[2];
            $this->db->select("$nama as nama");
            $this->db->select("$kode as kode");
        }
        if ($colum == '') {
            $data = $this->db->get($tab)->result_array();
        } else {
            $val_colum = str_replace('~', '/', $val_colum);
            $data = $this->db->get_where($tab, array($colum => str_replace('_', ' ', $val_colum)))->result_array();
        }
        echo json_encode($data);
    }
    public function get_all()
    {
        $get = $this->global->get_all('wa_lintor_kkp');
        $data = [];
        foreach ($get as $key => $value) {

            $a = [
                @$value->nomor,
                @$value->nama_nelayan,
                @$value->alamat,
                @$value->nik,
                @$value->nomor_kusuka,
                @$value->nomor_kartu_nelayan,
                @$value->nomor_aqua_card,
                @$value->nama_kelompok,
                @$value->bantuan_pernah_diterima,
                @$value->keterangan,

            ];
            array_push($data, $a);
        }

        echo json_encode($data);
    }


    public function add()
    {

        $data['key'] = $this->db->get('ms_provinsi')->result();
        $data['title'] = 'Home - Manajemen File - Lintor KKP ';
        $this->skin->view('lintor_kkp/add', $data);
    }

    public function create()
    {
        error_reporting(5);
        $this->load->library('excel');


        if (is_uploaded_file($_FILES['files']['tmp_name'])) {
            $this->db->where('1', '1');
            $this->db->delete('wa_lintor_kkp');
            $path = $_FILES["files"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nomor = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nik = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $nomor_kusuka = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $nomor_kartu_nelayan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $nomor_aqua_card = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $nama_kelompok = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $bantuan_pernah_diterima = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $keterangan = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $temp_data[] = array(
                        'nomor'    => $nomor,
                        'nama_nelayan'    => $nama,
                        'alamat'    => $alamat,
                        'nik'    => $nik,
                        'nomor_kusuka'    => $nomor_kusuka,
                        'nomor_kartu_nelayan'    => $nomor_kartu_nelayan,
                        'nomor_aqua_card'    => $nomor_aqua_card,
                        'nama_kelompok'    => $nama_kelompok,
                        'bantuan_pernah_diterima'    => $bantuan_pernah_diterima,
                        'keterangan'    => $keterangan,
                    );
                }
            }
            // print_r($temp_data);
            $insert = $this->db->insert_batch('wa_lintor_kkp', $temp_data);
            if ($insert) {
                echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
            } else {
                echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
            }
        } else {
            echo "Tidak ada file yang masuk";
        }
    }

    public function edit($id = '')
    {


        $data['title'] = 'Home - Master Data - Admin Pusat - Lintor KKP - Baru';
        $data['data'] = $this->global->get_by_one('wa_surveyor', $id, 'id');
        $data['id'] = $id;
        $this->skin->view('lintor_kkp/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id', true);
        $data = [
            'npk' => $this->input->post('npk', true),
            'fullname' => $this->input->post('nama', true),
            'phone' => $this->input->post('hp', true),
            'assignment_end_date' => $this->input->post('tgl_akhir', true),
            'kode_provinsi' => $this->input->post('kode_provinsi', true),
            'kode_kab_kota' => $this->input->post('kode_kab_kota', true),
        ];


        if ($id) {
            $this->db->where('id', $id);
            $ins = $this->db->update('wa_surveyor', $data);
        } else {
            $ins = $this->db->insert('wa_surveyor', $data);
        }

        if (is_uploaded_file($_FILES['files']['tmp_name'])) {
            $this->db->delete('fl_field_staff', array('targetkk_id' => $id));
            $sourcePath = $_FILES['files']['tmp_name'];
            $namf = $_FILES['files']['name'];
            $rep = str_replace(" ", "_", $namf);
            $fil = date('Ymd') . date("his") . $rep;
            $targetPath = "uploads/lintor_kkp/" . $fil;
            move_uploaded_file($sourcePath, FCPATH . $targetPath);
            $data_f = [
                'targetkk_id' => $id,
                'file_name' => $fil,
                'dir_name' => $targetPath,
            ];
            $ins = $this->db->insert('fl_field_staff', $data_f);
        }
        if ($ins) {
            echo json_encode(['sts' => 'success', 'message' => 'Data Berhasil Disimpan!']);
        } else {
            echo json_encode(['sts' => 'fail', 'message' => 'Data Gagal DIsimpan!']);
        }
    }

    public function delete($id = '')
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('wa_surveyor');
        if ($del) {
            echo json_encode(['sts' => 'success']);
        } else {
            echo json_encode(['sts' => 'fail']);
        }
    }
}

/* End of file lintor_kkp.php */
/* Location: ./application/controllers/lintor_kkp.php */