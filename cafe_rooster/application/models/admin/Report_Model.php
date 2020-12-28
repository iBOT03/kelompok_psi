<?php
class Report_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $query = $this->db->get('pesan');
        return $query->result();
    }

    public function getDataTrans() 
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('detail_pesan', 'detail_pesan.id_menu = menu.id_menu');
        //$this->db->join('detail_pesan', 'detail_pesan.id_pesan = pesan.id_pesan');
        //$this->db->where();

        $query = $this->db->get();
        return $query->result();
        //$this->db->join('karyawan', 'karyawan.id_karyawan = pesan.id_karyawan');
    }

    public function getDetail()
    {
        $query = $this->db->query("SELECT * FROM detail_pesan, pesan WHERE detail_pesan.id_pesan = pesan.id_pesan")->result();
        return $query;
    }

    public function total()
    {
        $this->db->select_sum('total_harga_pesan');
        $query = $this->db->get('detail_pesan');
        if ($query->num_rows() > 0) {
            return $query->row()->total_harga_pesan;
        } else {
            return 0;
        }
    }

    public function nota($id)
    {
        return $this->db->join('pesan', 'pesan.id_pesan = detail_pesan.id_pesan', 'left')
        ->join('menu', 'menu.id_menu = detail_pesan.id_menu', 'left')
        ->join('karyawan', 'karyawan.id_karyawan = pesan.id_karyawan', 'inner')
        ->where('detail_pesan.id_pesan', $id)->get('detail_pesan')->result();
    }

    
}