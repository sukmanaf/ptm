<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'racorp.pubg@gmail.com',  // Email gmail
            'smtp_pass'   => 'adgpmvusafasveyh',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            // 'smtp_port'   => 587,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        // $this->load->library('email', $config);
        $this->load->library('email');
        $this->email->initialize($config);


        // $this->load->library('email', $config);
        $this->load->library('email');
        $this->email->initialize($config);

        // Email dan nama pengirim
        $this->email->from('racorp.pubg@gmail.com', 'Tes Email');

        // Email penerima
        $this->email->to('sf14.lulus@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

        // Isi email
        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            // echo 'Error! email tidak dapat dikirim.';
            show_error($this->email->print_debugger());
        }
    }
}