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
        $this->form_validation->set_rules('tglAcara', 'Tanggal Acara', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('user/templates/header');
            $this->load->view('user/home/home');
            $this->load->view('user/templates/footer');
        } else {
            $this->load->model('user/Booking_model');
            $this->Booking_model->tambahDataBooking();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil melakukan booking, silahkan cek di menu anda untuk pembayaran.</div>');
            redirect('home');
        }
    }
}
