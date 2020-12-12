<?php  
class Transaksi_Model extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //TRANSAKSI
  public function produk()
  {
    $query = $this->db->get('menu');
    return $query->result_array();
  }

  public function sebagian_produk($limit, $start, $cari = null)
  {
    if ($cari) {
      $this->db->like('nama_menu', $cari);
      $this->db->or_like('harga_menu', $cari);
    }

    return $this->db->get('menu', $limit, $start)->result_array();
    
  }

  //pagination rows
  public function hitung()
  {
    return $this->db->get('menu')->num_rows();
  }

  //Transaksi
  public function tampil($table) {
    return $this->db->get($table);
}
  public function tambah($table, $field) {
    return $this->db->insert($table, $field);
}

public function tampil_id($table, $id) {
    return $this->db->get_where($table, $id);
}

public function ubah($table, $field, $id) {
    $this->db->where($id);
    return $this->db->update($table, $field);
}

public function hapus($table, $id) {
    return $this->db->delete($table, $id);
}

public function tampil_order($field, $table, $order) {
    $this->db->order_by($field, $order);
    return $this->db->get($table);
}

public function tampil_join($table, $tablejoin, $join, $where) {
    $this->db->join($tablejoin, $join);
    $this->db->where($where);
    return $this->db->get($table);
}

public function total($table, $total, $where) {
    $this->db->select('SUM('.$total.') as total');
    $this->db->where($where);
    return $this->db->get($table);
}

public function total_transaksi() {
    $query = $this->db->get('pesan');
    if($query->num_rows() > 0) {
        return $query->num_rows();
    } else {
        return 0;
    }
}

}
