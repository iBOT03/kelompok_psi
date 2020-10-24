<?php

class Booking extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Pesan meja";
        $data['beranda'] = "";
        $data['menu'] = "";
        $data['galeri'] = "";
        $data['booking'] = "active";
        $data['tentang'] = "";
        $data['kontak'] = "";
        $data['login'] = "";
        $this->load->view('templates/header', $data);
        $this->load->view('booking/index');
        $this->load->view('templates/footer');
    }
}
