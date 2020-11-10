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

    //DELETE DATA KARYAWAN
    public function delKaryawan($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->delete("karyawan");
    }

    // GET DATA BAGIAN KARYAWAN
    public function getBagian()
    {
        return $this->db->get("bagian_karyawan")->result();
    }
}

?>