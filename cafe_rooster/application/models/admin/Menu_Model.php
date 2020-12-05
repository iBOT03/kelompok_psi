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

    // delete menu
    public function deletemenu($idMenu)
    {
      $this->db->where('id_menu', $idMenu);
        return $this->db->delete("menu");
    }  

    // INSERT DATA MENU
    public function addMenu($data = array())
    {
        return $this->db->insert("menu", $data);
    }
    
    //EDIT DATA MENU
    public function editmenu($namamenu, $hargamenu, $gambarmenu, $deskripsimenu )
    {
      $hasil = $this->db->query("UPDATE menu SET nama_menu='$namamenu' , harga_menu='$hargamenu', gambar_menu='$gambarmenu', deskripsi_menu='$deskripsimenu'");
      return $hasil;
    }

    //EDIT DATA KATEGORI
    public function upKategori($data = array(), $id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->update("kategori_menu", $data);
    }

    //GET DETAIL DATA KATEGORI
    public function detail($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get("kategori_menu")->result();
    }

    // GET DATA KATEGORI MENU
    public function getkategori()
    {
        return $this->db->get("kategori_menu")->result();
    }

    //DELETE DATA KATEGORI
    public function delKategori($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete("kategori_menu");
    }

    // INSERT DATA KATEGORI MENU
    public function addKategori($data = array())
    {
        return $this->db->insert("kategori_menu", $data);
    }
  }
