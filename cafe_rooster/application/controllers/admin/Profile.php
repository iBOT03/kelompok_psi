<?php 
    class Profile extends CI_Controller
    {
      public function __construct()
      {
        parent::__construct();
        belumlogin();
        $this->load->library('form_validation');
        $this->load->model("admin/Profile_Model");
      }

      public function index()
      {
        $data['judul'] = 'My Profile';
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['bagian'] = $this->Profile_Model->get_bagian();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/Profile', $data);
        $this->load->view('admin/templates/footer');
      }
    }
 ?>