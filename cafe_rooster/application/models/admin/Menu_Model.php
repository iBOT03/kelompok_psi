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
  public function upMenu($data = array(), $id)
  {
    $this->db->where('id_menu', $id);
    return $this->db->update("menu", $data);
  }

  //GET DETAIL DATA Menu
  public function dMenu($id)
  {
    $this->db->where('id_menu', $id);
    return $this->db->get("menu")->result();
  }
  public function getDetail($id)
  {
    $query = $this->db->query("SELECT * FROM menu, kategori_menu WHERE menu.id_kategori = kategori_menu.id_kategori AND menu.id_menu = '$id'")->result();
    return $query;
  }

  public function kategori()
  {
    $query = $this->db->get('kategori_menu');
    return $query->result_array();
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


  //TRANSAKSI
  public function produk()
  {
    $query = $this->db->get('menu');
    return $query->result_array();
  }

  public function sebagian_produk($limit, $start)
  {
    $query = $this->db->get('menu', $limit, $start);
    return $query->result_array();
  }

  public function hitung()
  {
    return $this->db->get('menu')->num_rows();
  }
}
