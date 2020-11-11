<?php 
  class Profile_Model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function get_bagian()
    {
      $this->db->select('*');
      $this->db->from('karyawan');
      $this->db->join('bagian_karyawan', 'bagian_karyawan.id_bagian = karyawan.id_bagian', 'left');
      $query = $this->db->get()->result_array();
      return $query;
    }
  }
?>