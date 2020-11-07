<?php 
  class Administrator extends CI_Controller
  {
    public function index()
    {
      //$this->load->view('admin/templates/header');
      //$this->load->view('admin/templates/sidebar'); 
      $this->load->view('admin/administrator'); 
      //$this->load->view('admin/templates/footer'); 
    }
  }
?>