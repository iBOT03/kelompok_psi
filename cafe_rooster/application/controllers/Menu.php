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
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/menu/index');
        $this->load->view('user/templates/footer');
    }
}
