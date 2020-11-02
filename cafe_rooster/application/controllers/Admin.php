<?php

class Admin extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Dashboard Admin";
        $this->load->view('admin/templates/headerAdmin', $data);
        // $this->load->view('admin/dashboard/index');
        $this->load->view('admin/templates/footerAdmin');
    }
}
