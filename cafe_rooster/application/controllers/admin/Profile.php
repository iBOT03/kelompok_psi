<?php 
    class Profile extends CI_Controller
    {
      public function __construct()
      {
        parent::__construct();
        belumlogin();
        $this->load->library('form_validation');
      }

      public function index()
      {
        $judul['judul'] = 'My Profile';
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $judul);
        $this->load->view('admin/Profile', $data);
        $this->load->view('admin/templates/footer');
      }
    }
 ?>