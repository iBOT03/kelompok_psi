<?php
class Lap_Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/Report_Model");
        $this->load->model("admin/Transaksi_Model");
        belumlogin();
        //cek();
    }

    public function index()
    {        
       
        $data['admin']  = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();   
        $data['report'] = $this->Report_Model->getDataTrans();
        $data['total']  = $this->Report_Model->total();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view("admin/transaksi/lap_transaksi", $data);
        $this->load->view('admin/templates/footer');
    }
}