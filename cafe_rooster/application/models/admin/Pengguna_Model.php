<?php
class Pengguna_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // GET DATA PENGGUNA
    public function getPengguna()
    {
        return $this->db->get("pembeli")->result();
    }

    // INSERT DATA PENGGUNA
    public function addPengguna($data = array())
    {
        return $this->db->insert("pembeli", $data);
    }

    //CHANGE STATUS PENGGUNA
    public function setAktif($id)
    {
        $this->db->where('id_pembeli', $id);
        $this->db->update('pembeli', ['status' => '1']);
    }
    public function setMati($id)
    {
        $this->db->where('id_pembeli', $id);
        $this->db->update('pembeli', ['status' => '2']);
    }
}