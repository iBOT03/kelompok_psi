<?php
class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    belumlogin();
  }

  public function index()
  {
    $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/dashboard', $data);
  }
}
