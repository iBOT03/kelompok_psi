<?php
class Catering extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/Catering_Model');
    }
    
    public function index()
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['catering'] = $this->Catering_Model->getCatering();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/catering/catering', $data);
        $this->load->view('admin/templates/footer');
    }
}