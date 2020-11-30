<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Ubelumlogin();
    }

    public function index()
    {

        $data['judul'] = "Welcome to Cafe Rooster Probolinggo";
        // $this->load->view('user/templates/header', $data);
        $data['user'] = $this->db->get_where('pembeli', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->view('user/templates/navbar', $data);
        $this->load->view('user/home/home');
        // $this->load->view('user/templates/footer');
    }

    public function booking()
    {
        $this->load->view('user/templates/header');
        $this->load->view('user/templates/navbar');
        $this->load->view('user/booking');
        $this->load->view('user/templates/footer');
    }
}
