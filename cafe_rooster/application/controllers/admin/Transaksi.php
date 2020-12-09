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
        //load library
        $this->load->library('pagination');

        
        $config['total_rows'] = $this->Menu_Model->hitung();
        $config['per_page'] = 6;

        //inisialisasi
        $this->pagination->initialize($config);


        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['start'] = $this->uri->segment(4);
        $data['menu'] = $this->Menu_Model->sebagian_produk($config['per_page'], $data['start']);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/transaksi/transaksi', $data);
        $this->load->view('admin/templates/footer');
    }
}
