<?php
class Karyawan_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // GET DATA KARYAWAN
    public function getKaryawan()
    {
        return $this->db->get("karyawan")->result();
    }

    // INSERT DATA KARYAWAN
    public function addKaryawan($data = array())
    {
        return $this->db->insert("karyawan", $data);
    }

    //CHANGE STATUS KARYAWAN
    public function setAktif($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update('karyawan', ['status' => '1']);
    }
    public function setMati($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update('karyawan', ['status' => '2']);
    }

    // GET DATA BAGIAN KARYAWAN
    public function getBagian()
    {
        return $this->db->get("bagian_karyawan")->result();
    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM bagian_karyawan, karyawan WHERE bagian_karyawan.id_bagian = karyawan.id_bagian")->result();
        return $query;
    }

    //UPDATE DATA KARYAWAN
    public function upKaryawan($data = array(), $id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->update("karyawan", $data);
    }

    public function detail($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->get("karyawan")->result();
    }

    public function getDetail($id)
    {
        $query = $this->db->query("SELECT * FROM karyawan, bagian_karyawan WHERE karyawan.id_bagian = bagian_karyawan.id_bagian AND karyawan.id_karyawan = '$id'")->result();
        return $query;
    }

    public  function getBagKar()
    {
        $query = $this->db->get('bagian_karyawan');
        return $query->result_array();
    }
}
