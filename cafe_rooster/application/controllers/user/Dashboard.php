<?php
class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    Ubelumlogin();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('pembeli', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('user/templates/sidebar', $data);
    $this->load->view('user/dashboard', $data);
  }
}
