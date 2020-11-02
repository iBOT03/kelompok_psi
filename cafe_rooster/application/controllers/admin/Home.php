<?php 
  class Home extends CI_Controller
  {
    public function index()
    {
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/sidebar'); 
      $this->load->view('admin/home/index'); 
      $this->load->view('admin/templates/footer'); 
    }
  }
?>