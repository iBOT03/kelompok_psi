<?php

class Menu extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Menu kami";
        $data['beranda'] = "";
        $data['menu'] = "active";
        $data['galeri'] = "";
        $data['booking'] = "";
        $data['tentang'] = "";
        $data['kontak'] = "";
        $data['login'] = "";
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index');
        $this->load->view('templates/footer');
    }
}
