<?php
class Lap_Catering extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/Report_Model");
        belumlogin();
        //cek();
    }

    public function index()
    {        
       
        $data['admin']  = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();   
        $data['report'] = $this->Report_Model->getDataCat();
        $data['total']  = $this->Report_Model->totalCat();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view("admin/catering/lap_catering", $data);
        $this->load->view('admin/templates/footer');
    }

    public function print()
    {        
       
        $data['admin']  = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();   
        $data['report'] = $this->Report_Model->getDataCat();
        $data['total']  = $this->Report_Model->totalCat();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view("admin/catering/print", $data);
        $this->load->view('admin/templates/footer');
    }
}