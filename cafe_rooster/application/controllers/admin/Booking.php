<?php
class Booking extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/booking_Model');
    }
    
    public function index()
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->booking_Model->getBooking();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/booking/booking', $data);
        $this->load->view('admin/templates/footer');
    }
}