<?php 
  class Profile_Model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function get_bagian($email)
    {
      $this->db->select('*');
      $this->db->from('karyawan');
      $this->db->join('bagian_karyawan', 'bagian_karyawan.id_bagian = karyawan.id_bagian', 'left');
      $this->db->where('email', $email);
      $query = $this->db->get()->row_array();
      return $query;
    }

    public function edit_pass($cekpass, $email)
    {
      $this->db->set('password',  $cekpass);
      $this->db->where('email', $email);
      $this->db->update('karyawan');
      return $this->db;
    }
  }
?>