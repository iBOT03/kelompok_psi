<?php

class Admin extends CI_Controller
{

    public function index()
    {

        $data['judul'] = "Dashboard Admin";
        $this->load->view('templates/headerAdmin', $data);
        // $this->load->view('admin/index');
        $this->load->view('templates/footerAdmin');
    }
}
