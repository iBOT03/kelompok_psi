<?php
class Catering_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function Catering()
  {
    // return $this->db->get('menu')->result();
    $this->db->select('*');
    $this->db->from('catering');
    $this->db->where('status_transaksi' == 2);
    $query = $this->db->get()->result_array();
    return $query;
  }

  // GET DATA BOOKING
  public function getCatering()
  {
    return $this->db->get("catering")->result();
  }

  public function detail($id)
    {
        $this->db->where('id_catering', $id);
        return $this->db->get("catering")->result();
    }

    //UPDATE DATA CATERING
    public function konfirmasi($data = array(), $id)
    {
        $this->db->where('id_catering', $id);
        return $this->db->update("catering", $data);
    }
}
