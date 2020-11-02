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
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/booking/index');
        $this->load->view('user/templates/footer');
    }
}
