<?php

class Contact extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Pesan meja";
        $data['beranda'] = "";
        $data['menu'] = "";
        $data['galeri'] = "";
        $data['booking'] = "";
        $data['tentang'] = "";
        $data['kontak'] = "active";
        $data['login'] = "";
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/kontak/index');
        $this->load->view('user/templates/footer');
    }
}
