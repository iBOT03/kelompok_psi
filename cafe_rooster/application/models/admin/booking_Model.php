<?php
class Booking_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
 
  public function data_booking()
  {
    // return $this->db->get('menu')->result();
    $this->db->select('*');
    $this->db->from('booking');
    $this->db->where('status_transaksi' == 1);
    $query = $this->db->get()->result_array();
    return $query;
  }

  // GET DATA BOOKING
  public function getBooking()
  {
    return $this->db->get("booking")->result();
  }

  public function konfirmasi($id)
    {
        $this->db->where('id_booking', $id);
        $this->db->update('booking', ['status' => '2']);
    }
}
