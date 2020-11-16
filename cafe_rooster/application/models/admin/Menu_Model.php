<?php 
  class Menu_Model extends CI_Model 
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function data_menu()
    {
      return $this->db->get('menu')->result();
    }
  }
  
?>