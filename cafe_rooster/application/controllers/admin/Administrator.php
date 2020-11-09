<?php
class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/Karyawan_Model");
    }

    public function index()
    {
        $data = array("karyawan" => $this->Karyawan_Model->getKaryawan());
        $this->load->view("admin/administrator/administrator", $data);
    }

    public function tambah()
    {        
        $this->load->view("admin/administrator/tambahadministrator");
    }
}
