<?php
class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    belumlogin();
    $this->load->model('admin/Dashboard_Model');
  }

  public function index()
  {
    $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
    $data['total_transaksi']  = $this->Dashboard_Model->TotTransaksi();
    $data['total_catering']  = $this->Dashboard_Model->TotCatering();
    $data['total_booking']  = $this->Dashboard_Model->TotBooking();
    $data['total_pengguna']  = $this->Dashboard_Model->TotPembeli();
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/dashboard', $data);
  }
}
