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
            $this->load->view('templates/header', $data);
            $this->load->view('home/index');
            $this->load->view('templates/footer');
        }
    }