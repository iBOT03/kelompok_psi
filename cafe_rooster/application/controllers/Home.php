<?php

    class Home extends CI_Controller {

        public function index(){

            $data['judul'] = "Welcome to Cafe Rooster Probolinggo";
            $data['beranda'] = "active";
            $data['menu'] = "";
            $data['galeri'] = "";
            $data['booking'] = "";
            $data['tentang'] = "";
            $data['kontak'] = "";
            $data['login'] = "";
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/home/index');
            $this->load->view('user/templates/footer');
        }
    }