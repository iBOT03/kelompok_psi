<?php

    class Home extends CI_Controller {

        public function index(){

            $data['judul'] = "Welcome to Cafe Rooster Probolinggo";
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/navbar');
            $this->load->view('user/home');
            $this->load->view('user/templates/footer');
        }

        public function booking()
        {
            $this->load->view('user/templates/header');
            $this->load->view('user/templates/navbar');
            $this->load->view('user/booking');
            $this->load->view('user/templates/footer');
        }
    }