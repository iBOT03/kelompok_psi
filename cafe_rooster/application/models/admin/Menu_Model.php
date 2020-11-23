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
      // return $this->db->get('menu')->result();
      $this->db->select('*');
      $this->db->from('menu, kategori_menu');
      $this->db->where('menu.id_kategori = kategori_menu.id_kategori');
      // $this->db->join('kategori_menu', 'kategori_menu.id_kategori = menu.id_kategori');
      $query = $this->db->get()->result_array();
      return $query;
    }

    // public function bagian_menu()
    // {
    //   $this->db->select('*');
    //   $this->db->from('menu');
    //   $this->db->join('kategori_menu', 'kategori_menu.id_kategori = menu.id_kategori', 'left');
    //   $query = $this->db->get()->result_array();
    //   return $query;
    // }

    // INSERT DATA MENU
    public function addMenu($data = array())
    {
        return $this->db->insert("menu", $data);
    }

    // GET DATA KATEGORI MENU
    public function getkategori()
    {
        return $this->db->get("kategori_menu")->result();
    }
  }
