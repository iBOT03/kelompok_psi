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
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['judul'] = "Welcome to Cafe Rooster Probolinggo";
        // $this->load->view('user/templates/header', $data);
        $data['user'] = $this->db->get_where('pembeli', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->view('user/templates/navbar', $data);


        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home/home', $data);
        $this->load->view('user/templates/footer');
    }

    public function booking()
    {
        $data['judul'] = "Booking Meja";
        $this->form_validation->set_rules('tglAcara', 'Tanggal Acara', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/home/booking');
            $this->load->view('user/templates/footer');
        } else {
            $this->Model_booking->tambahDataBooking();
            redirect('home');
        }
    }
}
