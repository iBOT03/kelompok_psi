<?php

class About extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Tentang kami";
        $data['beranda'] = "";
        $data['menu'] = "";
        $data['galeri'] = "";
        $data['booking'] = "";
        $data['tentang'] = "active";
        $data['kontak'] = "";
        $data['login'] = "";
        $this->load->view('user/templates/header', $data);
        $this->load->view('tentang/index');
        $this->load->view('user/templates/footer');
    }
}
