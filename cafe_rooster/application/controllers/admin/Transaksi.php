<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/Menu_Model');
    }
    public function index()
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_Model->data_menu();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/transaksi/transaksi', $data);
        $this->load->view('admin/templates/footer');
    }
}
