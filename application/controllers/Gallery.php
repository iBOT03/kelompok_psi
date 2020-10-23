<?php

class Gallery extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Galeri kami";
        $data['beranda'] = "";
        $data['menu'] = "";
        $data['galeri'] = "active";
        $data['booking'] = "";
        $data['tentang'] = "";
        $data['kontak'] = "";
        $data['login'] = "";
        $this->load->view('templates/header', $data);
        $this->load->view('galeri/index');
        $this->load->view('templates/footer');
    }
}
